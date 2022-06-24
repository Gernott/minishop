<?php
namespace TYPO3Kurs\Minishop\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author winki 
 */
class PositionTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TYPO3Kurs\Minishop\Domain\Model\Position
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \TYPO3Kurs\Minishop\Domain\Model\Position();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getQuantityReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getQuantity()
        );
    }

    /**
     * @test
     */
    public function setQuantityForIntSetsQuantity()
    {
        $this->subject->setQuantity(12);

        self::assertAttributeEquals(
            12,
            'quantity',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getProductReturnsInitialValueForProduct()
    {
        self::assertEquals(
            null,
            $this->subject->getProduct()
        );
    }

    /**
     * @test
     */
    public function setProductForProductSetsProduct()
    {
        $productFixture = new \TYPO3Kurs\Minishop\Domain\Model\Product();
        $this->subject->setProduct($productFixture);

        self::assertAttributeEquals(
            $productFixture,
            'product',
            $this->subject
        );
    }
}
