<?php
$GLOBALS['TCA']['tx_minishop_domain_model_booking']['columns']['crdate']['config']['type'] = 'passthrough';

$GLOBALS['TCA']['tx_minishop_domain_model_booking']['columns']['country']['config']['items'] = [['LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:file_upload.actions.all.empty', '']];
$GLOBALS['TCA']['tx_minishop_domain_model_booking']['columns']['country']['config']['eval'] = 'required';
$GLOBALS['TCA']['tx_minishop_domain_model_booking']['columns']['country']['config']['minitems'] = 1;
unset($GLOBALS['TCA']['tx_minishop_domain_model_booking']['columns']['country']['config']['minitems']);
