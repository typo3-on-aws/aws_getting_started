<?php
namespace SchamsNet\AwsGettingStarted\Hooks;

/*
 * TYPO3 Extension "AWS Getting Started"
 *
 * Author: Michael Schams <schams.net>
 * https://typo3-on-aws.org
 */

/**
 * Class TypoScriptHook
 *
 * @package TYPO3
 * @subpackage aws_getting_started
 */
class TypoScriptHook
{
    /**
     * Path to TypoScript files (constants.txt and setup.txt)
     *
     * @access private
     * @var string
     */
    private $pathToTypoScriptFiles = 'aws_getting_started/Configuration/TypoScript';

    /**
     * Hook into the default TypoScript to add custom typoscript template
     *
     * @param array $parameters
     * @param \TYPO3\CMS\Core\TypoScript\TemplateService $parentObject
     * @return void
     */
    public function addCustomTypoScriptTemplate($parameters, $parentObject)
    {
        // Add a custom "fake" sys_template record, if no template was found in rootline
        if ($parentObject->outermostRootlineIndexWithTemplate === 0) {
            $constants = 'FILE:EXT:' . $this->pathToTypoScriptFiles . '/constants.txt';
            $setup = 'FILE:EXT:' . $this->pathToTypoScriptFiles . '/setup.txt';
            $row = [
                'uid' => 'aws_getting_started',
                'constants' => '<INCLUDE_TYPOSCRIPT: source="' . $constants . '">' . LF,
                'config' => '<INCLUDE_TYPOSCRIPT: source="' . $setup . '">' . LF,
                'root' => 1,
                'clear' => 3,
                'nextlevel' => 0,
                'static_file_mode' => 1,
                'title' => 'Root template',
            ];
            $parentObject->processTemplate(
                $row,
                'sys_' . $row['uid'],
                $parameters['absoluteRootLine'][0]['uid'],
                'sys_' . $row['uid']
            );
            $parentObject->rootId = $parameters['absoluteRootLine'][0]['uid'];
            $parentObject->rootLine[] = $parameters['absoluteRootLine'][0];
        }
    }
}
