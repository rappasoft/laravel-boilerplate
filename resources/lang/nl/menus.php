<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Menus Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines are used in menu items throughout the system.
	| Regardless where it is placed, a menu item can be listed here so it is easily
	| found in a intuitive way.
	|
	*/

	'backend' => [
		'access' => [
			'title' => 'Toegangs Beheer',

			'roles' => [
				'all' => 'Alle Rollen',
				'create' => 'Creëer Rol',
				'edit' => 'Rol aanpassen',
				'management' => 'Rol Beheer',
				'main' => 'Rollen',
			],

			'users' => [
				'all' => 'Alle Gebruikers',
				'change-password' => 'Wachtwoord veranderen',
				'create' => 'Gebruiker aanmaken',
				'deactivated' => 'Gedeactiveerde Gebruikers',
				'deleted' => 'Verwijderde Gebruikers',
				'edit' => 'Gebruiker aanpassen',
				'main' => 'Gebruikers',
			],
		],

		'log-viewer' => [
			'main' => 'Log Viewer',
			'dashboard' => 'Dashboard',
			'logs' => 'Logs',
		],

		'sidebar' => [
			'dashboard' => 'Dashboard',
			'general' => 'Algemeen',
		],
	],

	'language-picker' => [
		'language' => 'Language',
		/**
		 * Add the new language to this array.
		 * The key should have the same language code as the folder name.
		 * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
		 * Be sure to add the new language in alphabetical order.
		 */
		'langs' => [
			'ar' => 'Arabic',
			'da' => 'Danish',
			'de' => 'German',
			'en' => 'English',
			'es' => 'Spanish',
			'fr' => 'French',
			'it' => 'Italian',
			'nl' => 'Dutch',
			'pt-BR' => 'Brazilian Portuguese',
			'sv' => 'Swedish',
			'th' => 'Thai',
		],
	],
];