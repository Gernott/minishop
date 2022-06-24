<?php

namespace TYPO3Kurs\Minishop\Controller;


use TYPO3\CMS\Extbase\Property\PropertyMapper;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Kurs\Minishop\Domain\Model\Product;

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
 * ProductController
 */
class ProductController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * productRepository
     *
     * @var \TYPO3Kurs\Minishop\Domain\Repository\ProductRepository
     */
    protected $productRepository = null;

    /**
     * @param \TYPO3Kurs\Minishop\Domain\Repository\ProductRepository $productRepository
     */
    public function injectProductRepository(\TYPO3Kurs\Minishop\Domain\Repository\ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * action show
     *
     * @param \TYPO3Kurs\Minishop\Domain\Model\Product $product
     * @return void
     */
    public function showAction(\TYPO3Kurs\Minishop\Domain\Model\Product $product)
    {
        $this->view->assign('product', $product);
    }
}
