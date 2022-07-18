<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'tranlate' => true,
    'translate_from' => 'fa',
    'translate_to' => 'en',
    'field' => 'slug',
    'pattern' => '',
    //decimal_leading_zero, roman, numbers_in_word, cardinal_number, ordinal_number
    'iteration_symbol' => 'decimal',
    'custom_iteration_symbols' => [
        'alphabet' => range('a', 'z')
    ]
];