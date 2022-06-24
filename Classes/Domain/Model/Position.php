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
 * Position
 */
class Position extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Quantity
     * 
     * @var int
     */
    protected $quantity = 0;

    /**
     * Product
     * 
     * @var \TYPO3Kurs\Minishop\Domain\Model\Product
     */
    protected $product = null;

    /**
     * Returns the quantity
     * 
     * @return int $quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the quantity
     * 
     * @param int $quantity
     * @return void
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns the product
     * 
     * @return \TYPO3Kurs\Minishop\Domain\Model\Product $product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Sets the product
     * 
     * @param \TYPO3Kurs\Minishop\Domain\Model\Product $product
     * @return void
     */
    public function setProduct(\TYPO3Kurs\Minishop\Domain\Model\Product $product)
    {
        $this->product = $product;
    }

    /**
     * Returns the fullPrice
     * 
     * @return int $fullPrice
     */
    public function getFullPrice()
    {
        return $this->quantity * $this->getProduct()->getPrice();
    }
}
