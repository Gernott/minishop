<?php


$GLOBALS['TCA']['tx_minishop_domain_model_product']['columns']['slug'] = [
    'label' => 'slug',
    'exclude' => 1,
    'config' => [
        'type' => 'slug',
        'generatorOptions' => [
            'fields' => ['title'],
            'fieldSeparator' => '/',
            'prefixParentPageSlug' => true,
            'replacements' => [
                '/' => '',
            ],
        ],
        'fallbackCharacter' => '-',
        'eval' => 'uniqueInSite',
        'default' => ''
    ]
];

$GLOBALS['TCA']['tx_minishop_domain_model_product']['interface']['showRecordFieldList'] .= ',slug';
$GLOBALS['TCA']['tx_minishop_domain_model_product']['types']['1']['showitem'] .= ',slug';
