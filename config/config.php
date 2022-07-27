<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    //like trim spaces, change characters to lowercase , changed spaces to hyphen, ...
    'do_initial' => false,
    'do_translate' => false,
    'translate_from' => 'fa',
    'translate_to' => 'en',
    //you can implement string with #string#
    'do_pattern' => false,
    'pattern' => '',
    //just use for model trait
    'field' => 'slug',
    'is_unique' => false,
    //available options for iteration_symbol : decimal, decimal_leading_zero, roman, numbers_in_word, ordinal_number
    'iteration_symbol' => 'decimal',
    'custom_iteration_symbols' => [
        'alphabet' => range('a', 'z'),
        'cardinal_number_in_word' => [
            "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten",
            "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen", "twenty",
            "twenty-one", "twenty-two", "twenty-three", "twenty-four", "twenty-five", "twenty-six", "twenty-seven", "twenty-eight", "twenty-nine", "thirty",
            "thirty-one", "thirty-two", "thirty-three", "thirty-four", "thirty-five", "thirty-six", "thirty-seven", "thirty-eight", "thirty-nine", "forty",
            "forty-one", "forty-two", "forty-three", "forty-four", "forty-five", "forty-six", "forty-seven", "forty-eight", "forty-nine", "fifty",
            "fifty-one", "fifty-two", "fifty-three", "fifty-four", "fifty-five", "fifty-six", "fifty-seven", "fifty-eight", "fifty-nine", "sixty",
            "sixty-one", "sixty-two", "sixty-three", "sixty-four", "sixty-five", "sixty-six", "sixty-seven", "sixty-eight", "sixty-nine", "seventy",
            "seventy-one", "seventy-two", "seventy-three", "seventy-four", "seventy-five", "seventy-six", "seventy-seven", "seventy-eight", "seventy-nine", "eighty",
            "eighty-one", "eighty-two", "eighty-three", "eighty-four", "eighty-five", "eighty-six", "eighty-seven", "eighty-eight", "eighty-nine", "ninety",
            "ninety-one", "ninety-two", "ninety-three", "ninety-four", "ninety-five", "ninety-six", "ninety-seven", "ninety-eight", "ninety-nine"
        ]
    ]
];