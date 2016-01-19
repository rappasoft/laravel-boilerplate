<?php

return [

    /**
     * Whether or not to show the language picker, or just default to the default
     * locale specified in the app config file
     *
     * @var bool
     */
    'status' => true,

    /**
     * Available languages
     *
     * Add your language code to this array.
     * The code must have the same name as the language folder.
     * Be sure to add the new language in an alphabetical order.
     *
     * The language picker will not be available if there is only one language option
     * Commenting out languages will make them unavailable to the user
     *
     * @var array
     */
    'languages' => [
        /**
         * Key is the Laravel locale code
         * Index 0 of sub-array is the Carbon locale code
         * Index 1 of sub-array is the PHP locale code for setlocale()
         */
        'en' => ['en', 'en_US'],
        'fr' => ['fr', 'fr_FR'],
        'it' => ['it', 'it_IT'],
        'sv' => ['sv', 'sv_SE'],
    ],
];