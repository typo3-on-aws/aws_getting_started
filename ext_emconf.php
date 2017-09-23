<?php

/*
 * TYPO3 Extension "AWS Getting Started Screen"
 *
 * Author: Michael Schams <schams.net>
 * https://typo3-on-aws.org
 */

$EM_CONF[$_EXTKEY] = array (
    'title' => 'AWS Getting Started Screen',
    'description' => 'Simple start screen with basic information for the TYPO3-on-AWS machine image.',
    'category' => 'fe',
    'version' => '1.0.0',
    'state' => 'stable',
    'createDirs' => '',
    'clearcacheonload' => true,
    'author' => 'Michael Schams <schams.net>',
    'author_email' => '',
    'author_company' => '',
    'constraints' => array (
        'depends' => array (
            'php' => '7.0.0-7.99.99',
            'typo3' => '8.7.0-8.7.99',
        ),
        'conflicts' => array (
        ),
        'suggests' => array (
        ),
    ),
);
