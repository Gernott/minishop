<?php
namespace TYPO3Kurs\Minishop\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author winki 
 */
class BookingControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TYPO3Kurs\Minishop\Controller\BookingController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\TYPO3Kurs\Minishop\Controller\BookingController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllBookingsFromRepositoryAndAssignsThemToView()
    {

        $allBookings = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $bookingRepository = $this->getMockBuilder(\TYPO3Kurs\Minishop\Domain\Repository\BookingRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $bookingRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBookings));
        $this->inject($this->subject, 'bookingRepository', $bookingRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('bookings', $allBookings);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenBookingToBookingRepository()
    {
        $booking = new \TYPO3Kurs\Minishop\Domain\Model\Booking();

        $bookingRepository = $this->getMockBuilder(\TYPO3Kurs\Minishop\Domain\Repository\BookingRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $bookingRepository->expects(self::once())->method('add')->with($booking);
        $this->inject($this->subject, 'bookingRepository', $bookingRepository);

        $this->subject->createAction($booking);
    }
}
