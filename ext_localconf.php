<?php

/*
 * TYPO3 Extension "AWS Getting Started Screen"
 *
 * Author: Michael Schams <schams.net>
 * https://t3rrific.com/typo3-on-aws/
 */

defined('TYPO3_MODE') or die();

// Register autoloading for TypoScript
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Core/TypoScript/TemplateService']['runThroughTemplatesPostProcessing'][] =
    \Typo3OnAws\AwsGettingStarted\Hooks\TypoScriptHook::class . '->addCustomTypoScriptTemplate';
