<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'TYPO3Kurs.Minishop',
            'Minishop',
            'Minishop'
        );

        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'TYPO3Kurs.Minishop',
                'web', // Make module a submodule of 'web'
                'minishop', // Submodule key
                '', // Position
                [
                    'Booking' => 'list',
                    
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:minishop/Resources/Public/Icons/user_mod_minishop.svg',
                    'labels' => 'LLL:EXT:minishop/Resources/Private/Language/locallang_minishop.xlf',
                ]
            );

        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('minishop', 'Configuration/TypoScript', 'Minishop');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_minishop_domain_model_booking', 'EXT:minishop/Resources/Private/Language/locallang_csh_tx_minishop_domain_model_booking.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_minishop_domain_model_booking');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_minishop_domain_model_position', 'EXT:minishop/Resources/Private/Language/locallang_csh_tx_minishop_domain_model_position.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_minishop_domain_model_position');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_minishop_domain_model_product', 'EXT:minishop/Resources/Private/Language/locallang_csh_tx_minishop_domain_model_product.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_minishop_domain_model_product');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder