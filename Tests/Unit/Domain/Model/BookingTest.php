<?php
namespace TYPO3Kurs\Minishop\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author winki 
 */
class BookingTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TYPO3Kurs\Minishop\Domain\Model\Booking
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \TYPO3Kurs\Minishop\Domain\Model\Booking();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAdressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdress()
        );
    }

    /**
     * @test
     */
    public function setAdressForStringSetsAdress()
    {
        $this->subject->setAdress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'adress',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZipReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZip()
        );
    }

    /**
     * @test
     */
    public function setZipForStringSetsZip()
    {
        $this->subject->setZip('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zip',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCityForStringSetsCity()
    {
        $this->subject->setCity('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'city',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTelephoneReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function setTelephoneForStringSetsTelephone()
    {
        $this->subject->setTelephone('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'telephone',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPositionsReturnsInitialValueForPosition()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPositions()
        );
    }

    /**
     * @test
     */
    public function setPositionsForObjectStorageContainingPositionSetsPositions()
    {
        $position = new \TYPO3Kurs\Minishop\Domain\Model\Position();
        $objectStorageHoldingExactlyOnePositions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePositions->attach($position);
        $this->subject->setPositions($objectStorageHoldingExactlyOnePositions);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOnePositions,
            'positions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addPositionToObjectStorageHoldingPositions()
    {
        $position = new \TYPO3Kurs\Minishop\Domain\Model\Position();
        $positionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $positionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($position));
        $this->inject($this->subject, 'positions', $positionsObjectStorageMock);

        $this->subject->addPosition($position);
    }

    /**
     * @test
     */
    public function removePositionFromObjectStorageHoldingPositions()
    {
        $position = new \TYPO3Kurs\Minishop\Domain\Model\Position();
        $positionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $positionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($position));
        $this->inject($this->subject, 'positions', $positionsObjectStorageMock);

        $this->subject->removePosition($position);
    }

    /**
     * @test
     */
    public function getCountryReturnsInitialValueForCountry()
    {
    }

    /**
     * @test
     */
    public function setCountryForCountrySetsCountry()
    {
    }
}
