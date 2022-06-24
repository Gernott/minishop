<?php
namespace TYPO3Kurs\Minishop\Domain\Repository;


use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

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
 * The repository for Products
 */
class ProductRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];



    /**
     * Returns all objects which are cheaper then the argument
     *
     *
     * @param float $price
     * @return QueryResultInterface|array
     */
    public function findCheaperThen(float $price)
    {
        $query = $this->createQuery();
        $query->matching(
            $query->lessThan('price', $price)
        );
        return $query->execute();
    }





}
