<?php
namespace Typo3OnAws\AwsGettingStarted\Hooks;

/*
 * TYPO3 Extension "AWS Getting Started Screen"
 *
 * Author: Michael Schams <schams.net>
 * https://typo3-on-aws.org
 */

use TYPO3\CMS\Core\TypoScript\TemplateService;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class TypoScriptHook
 * Inspired by EXT:bolt - https://github.com/b13/bolt
 *
 * @package TYPO3
 * @subpackage aws_getting_started
 */
class TypoScriptHook
{
    /**
     * Extension key
     *
     * @access protected
     * @var string
     */
    protected $extensionKey = 'aws_getting_started';

    /**
     * Hook into the default TypoScript to add custom typoscript template
     *
     * @param array $hookParameters
     * @param TemplateService $templateService
     * @return void
     */
    public function addCustomTypoScriptTemplate(&$hookParameters, TemplateService $templateService)
    {
        // Let's copy the rootline value, as $templateService->processTemplate() might reset it
        $rootLine = $hookParameters['rootLine'];
        if (!is_array($rootLine) || empty($rootLine)) {
            return;
        }

        $hasRootTemplate = (bool)$templateService->getRootId();

        // Read constants and setup files
        $path = ExtensionManagementUtility::extPath($this->extensionKey);
        $constantsFile = $path . 'Configuration/TypoScript/constants.typoscript';
        if (file_exists($constantsFile)) {
            $constants = (string)@file_get_contents($constantsFile);
        }
        $setupFile = $path . 'Configuration/TypoScript/setup.typoscript';
        if (file_exists($setupFile)) {
            $setup = (string)@file_get_contents($setupFile);
        }

        // Prepare a fake row for sys_template
        $row = [
            'uid' => $this->$extensionKey,
            'constants' => $constants ? $constants : '',
            'config' => $setup ? $setup : '',
            'tstamp' => $setup ? filemtime($setupFile) : time(),
            'root' => !$hasRootTemplate,
            'clear' => 3,
            'nextlevel' => 0,
            'static_file_mode' => 1,
            'title' => 'Root template',
        ];

        // Add the constants and setup info
        $templateService->processTemplate(
            $row,
            'sys_' . $row['uid'],
            $hookParameters['absoluteRootLine'][0]['uid'],
            'sys_' . $row['uid']
        );

        if (!$hasRootTemplate) {
            array_pop($templateService->constants);
            array_unshift($templateService->constants, $constants);
            array_pop($templateService->config);
            array_unshift($templateService->config, $setup);
            $hookParameters['rootLine'] = $rootLine;
        }
    }
}
