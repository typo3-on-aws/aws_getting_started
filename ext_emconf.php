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
    'version' => '11.1.0',
    'state' => 'stable',
    'clearcacheonload' => true,
    'author' => 'Michael Schams <schams.net>',
    'author_email' => '',
    'author_company' => 'schams.net',
    'constraints' => [
        'depends' => [
            'php' => '7.4.0-7.4.99',
            'typo3' => '11.0.0-11.5.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ]
    ]
];
