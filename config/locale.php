<?php

return [
    /*
     * Whether or not to show the language picker, or just default to the default
     * locale specified in the app config file
     *
     * @var bool
     */
    'status' => true,

    /*
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
        'ar' => ['name' => 'Arabic', 'rtl' => true],
        'az' => ['name' => 'Azerbaijan', 'rtl' => false],
        'zh' => ['name' => 'Chinese Simplified', 'rtl' => false],
        'zh-TW' => ['name' => 'Chinese Traditional', 'rtl' => false],
        'da' => ['name' => 'Danish', 'rtl' => false],
        'de' => ['name' => 'German', 'rtl' => false],
        'el' => ['name' => 'Greek', 'rtl' => false],
        'en' => ['name' => 'English', 'rtl' => false],
        'es' => ['name' => 'Spanish', 'rtl' => false],
        'fa' => ['name' => 'Persian', 'rtl' => true],
        'fr' => ['name' => 'French', 'rtl' => false],
        'he' => ['name' => 'Hebrew', 'rtl' => true],
        'id' => ['name' => 'Indonesian', 'rtl' => false],
        'it' => ['name' => 'Italian', 'rtl' => false],
        'ja' => ['name' => 'Japanese', 'rtl' => false],
        'nl' => ['name' => 'Dutch', 'rtl' => false],
        'no' => ['name' => 'Norwegian', 'rtl' => false],
        'pt_BR' => ['name' => 'Brazilian Portuguese', 'rtl' => false],
        'ru' => ['name' => 'Russian', 'rtl' => false],
        'sv' => ['name' => 'Swedish', 'rtl' => false],
        'th' => ['name' => 'Thai', 'rtl' => false],
        'tr' => ['name' => 'Turkish', 'rtl' => false],
        'uk' => ['name' => 'Ukrainian', 'rtl' => false],
    ],
];
