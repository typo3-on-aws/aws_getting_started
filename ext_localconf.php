<?php

/*
 * TYPO3 Extension "AWS Getting Started Screen"
 *
 * Author: Michael Schams <schams.net>
 * https://typo3-on-aws.org
 */

defined('TYPO3_MODE') or die();

// Register autoloading for TypoScript
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Core/TypoScript/TemplateService']['runThroughTemplatesPostProcessing'][] =
    \SchamsNet\AwsGettingStarted\Hooks\TypoScriptHook::class . '->addCustomTypoScriptTemplate';

$version = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getExtensionVersion('core');
list($major, $minor, $bugfix) = explode('.', $version);

if ($major == 7) {
    $extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY);
    $typoScriptPath = $extensionPath . 'Configuration/TypoScript/';

    if (is_readable($typoScriptPath . 'constants.txt')) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants(
            file_get_contents($typoScriptPath . 'constants.txt')
        );
    }
    if (is_readable($typoScriptPath . 'setup.txt')) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
            file_get_contents($typoScriptPath . 'setup.txt')
        );
    }
}
