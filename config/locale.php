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
		 * Index 2 of sub-array is whether or not to use RTL (right-to-left) css for this language
		 */
		'ar'    => ['ar', 'ar_AR', true],
		'da'    => ['da', 'da_DK', false],
		'de'    => ['de', 'de_DE', false],
		'en'    => ['en', 'en_US', false],
		'es'    => ['es', 'es_ES', false],
		'fr'    => ['fr', 'fr_FR', false],
		'it'    => ['it', 'it_IT', false],
		'nl'    => ['nl', 'nl_NL', false],
		'pt-BR' => ['pt_BR', 'pt_BR', false],
		'sv'    => ['sv', 'sv_SE', false],
		'th'    => ['th', 'th_TH', false],
	],
];