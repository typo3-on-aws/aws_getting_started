<?php

/*
 * TYPO3 Extension "AWS Getting Started Screen"
 *
 * Author: Michael Schams <schams.net>
 * https://t3rrific.com/typo3-on-aws/
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'AWS Getting Started Screen',
    'description' => 'Simple start screen with basic information for the TYPO3-on-AWS machine image',
    'category' => 'fe',
    'version' => '10.2.0',
    'state' => 'stable',
    'clearcacheonload' => true,
    'author' => 'Michael Schams <schams.net>',
    'author_email' => '',
    'author_company' => 'schams.net',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-7.3.99',
            'typo3' => '10.0.0-10.5.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ]
    ]
];
