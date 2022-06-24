<?php
namespace TYPO3Kurs\Minishop\Domain\Model;


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
 * Booking
 */
class Booking extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * CrDate
     *
     * @var int
     */
    protected $crdate = 0;

    /**
     * Name
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * Adress
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $adress = '';

    /**
     * Zip
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $zip = '';

    /**
     * City
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $city = '';

    /**
     * Email
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $email = '';

    /**
     * Telephone
     *
     * @var string
     */
    protected $telephone = '';

    /**
     * Positions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3Kurs\Minishop\Domain\Model\Position>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $positions = null;

    /**
     * Country
     *
     * @var \SJBR\StaticInfoTables\Domain\Model\Country
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $country = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->positions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return int
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the adress
     *
     * @return string $adress
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Sets the adress
     *
     * @param string $adress
     * @return void
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the telephone
     *
     * @return string $telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Sets the telephone
     *
     * @param string $telephone
     * @return void
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Adds a Position
     *
     * @param \TYPO3Kurs\Minishop\Domain\Model\Position $position
     * @return void
     */
    public function addPosition(\TYPO3Kurs\Minishop\Domain\Model\Position $position)
    {
        $this->positions->attach($position);
    }

    /**
     * Removes a Position
     *
     * @param \TYPO3Kurs\Minishop\Domain\Model\Position $positionToRemove The Position to be removed
     * @return void
     */
    public function removePosition(\TYPO3Kurs\Minishop\Domain\Model\Position $positionToRemove)
    {
        $this->positions->detach($positionToRemove);
    }

    /**
     * Returns the positions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3Kurs\Minishop\Domain\Model\Position> $positions
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * Sets the positions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3Kurs\Minishop\Domain\Model\Position> $positions
     * @return void
     */
    public function setPositions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $positions)
    {
        $this->positions = $positions;
    }

    /**
     * Returns the fullPrice
     *
     * @return int $fullPrice
     */
    public function getFullPrice()
    {
        $fullPrice = 0;
        if ($this->getPositions()) {

            /** @var Position $position */
            foreach ($this->getPositions() as $position) {
                $fullPrice += $position->getFullPrice();
            }
        }
        return $fullPrice;
    }

    /**
     * Returns the country
     *
     * @return \SJBR\StaticInfoTables\Domain\Model\Country $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the country
     *
     * @param \SJBR\StaticInfoTables\Domain\Model\Country $country
     * @return void
     */
    public function setCountry(\SJBR\StaticInfoTables\Domain\Model\Country $country = null)
    {
        $this->country = $country;
    }
}
