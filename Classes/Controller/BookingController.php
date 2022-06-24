<?php

namespace TYPO3Kurs\Minishop\Controller;

use SJBR\StaticInfoTables\Domain\Repository\CountryRepository;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3Kurs\Minishop\Domain\Model\Booking;
use TYPO3Kurs\Minishop\Domain\Model\Position;
use TYPO3Kurs\Minishop\Domain\Repository\BookingRepository;
use TYPO3Kurs\Minishop\Domain\Repository\ProductRepository;

/***
 *
 * This file is part of the "Minishop" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 winki
 *
 ***/

/**
 * BookingController
 */
class BookingController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    public function __construct(
        BookingRepository $bookingRepository,
        ProductRepository $productRepository,
        CountryRepository $countryRepository,
        StandaloneView $standaloneView
    )
    {
        $this->bookingRepository = $bookingRepository;
        $this->productRepository = $productRepository;
        $this->countryRepository = $countryRepository;
        $this->standaloneView = $standaloneView;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $bookings = $this->bookingRepository->findAll();
        $this->view->assign('bookings', $bookings);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        $products = $this->productRepository->findCheaperThen(9999);
        $this->view->assign('products', $products);
        $countries = $this->countryRepository->localizedSort($this->countryRepository->findAll());
        $this->view->assign('countries', $countries);
    }


    /**
     * action create
     *
     * @param Booking $newBooking
     * @return void
     */
    public function createAction(Booking $newBooking)
    {
        foreach (array_reverse($newBooking->getPositions()->getArray()) as $position) {
            if (!$position->getQuantity() > 0) {
                $newBooking->getPositions()->detach($position);
            }
        }

        $this->bookingRepository->add($newBooking);

        /** @var PersistenceManager $persistenceManager */
        $persistenceManager = $this->objectManager->get(PersistenceManager::class);
        $persistenceManager->persistAll();
        $this->sendEmail($newBooking);
        $this->redirect('confirmation', null, null, ['booking' => $newBooking]);
    }

    /**
     * action confirmation
     *
     * @param Booking $booking
     * @return void
     */
    public function confirmationAction(Booking $booking)
    {
        $this->view->assign('booking', $booking);
    }

    /**
     * @param Booking $booking
     */
    public function sendEmail(Booking $booking)
    {
        $this->standaloneView->setTemplateRootPaths([GeneralUtility::getFileAbsFileName($this->settings['mail']['templateRootPath'])]);
        $this->standaloneView->setLayoutRootPaths([GeneralUtility::getFileAbsFileName($this->settings['mail']['layoutRootPath'])]);
        $this->standaloneView->setPartialRootPaths([GeneralUtility::getFileAbsFileName($this->settings['mail']['partialRootPath'])]);
        $this->standaloneView->setTemplate('Email');
        $this->standaloneView->assign('booking',$booking);
        $this->standaloneView->getRequest()->setControllerExtensionName($this->request->getControllerExtensionName());
        $body=$this->standaloneView->render();


        $mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
        $mail->from(new \Symfony\Component\Mime\Address($this->settings['mail']['fromMail'], $this->settings['mail']['fromName']));
        $mail->to(
            new \Symfony\Component\Mime\Address($booking->getEmail(), $booking->getName())
        );
        $mail->subject(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate
        ('mailSubject', 'Minishop'));
        $mail->text($body);
        $mail->html($body);
        $mail->send();


    }

}
