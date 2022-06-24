<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'TYPO3Kurs.Minishop',
            'Minishop',
            [
                'Booking' => 'new, create, confirmation',
                'Product' => 'show'
            ],
            // non-cacheable actions
            [
                'Booking' => 'create, confirmation'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        minishop {
                            iconIdentifier = minishop-plugin-minishop
                            title = LLL:EXT:minishop/Resources/Private/Language/locallang_db.xlf:tx_minishop_minishop.name
                            description = LLL:EXT:minishop/Resources/Private/Language/locallang_db.xlf:tx_minishop_minishop.description
                            tt_content_defValues {
                                CType = list
                                list_type = minishop_minishop
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'minishop-plugin-minishop',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:minishop/Resources/Public/Icons/user_plugin_minishop.svg']
			);
		
    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder