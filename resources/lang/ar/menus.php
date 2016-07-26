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
			'title' => 'إدارة المستخدمين',

			'roles' => [
				'all' => 'جميع الأدوار',
				'create' => 'إنشاء دور جديد',
				'edit' => 'تعديل دور',
				'management' => 'إدارة الأدوار',
				'main' => 'أدوار المتسخدمين',
			],

			'users' => [
				'all' => 'جميع المستخدمين',
				'change-password' => 'تغيير كلمة السر',
				'create' => 'إنشاء مستخدم جديد',
				'deactivated' => 'المستخدمون المعطلون',
				'deleted' => 'المستخدمون المحذفون',
				'edit' => 'تعديل مستخدم',
				'main' => 'المستخدمين',
			],
		],

		'log-viewer' => [
			'main' => 'عارض السجلات',
			'dashboard' => 'اللوحة الرئيسية',
			'logs' => 'السجلات',
		],

		'sidebar' => [
			'dashboard' => 'اللوحة الرئيسية',
			'general' => 'عام',
		],
	],

	'language-picker' => [
		'language' => 'اللغة',
		/**
		 * Add the new language to this array.
		 * The key should have the same language code as the folder name.
		 * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
		 * Be sure to add the new language in alphabetical order.
		 */
		'langs' => [
			'ar' => 'العربية (Arabic)',
			'da' => 'الدنماركية (Danish)',
			'de' => 'الألمانية (German)',
			'en' => 'الإنجليزية (English)',
			'es' => 'الأسبانية (Spanish)',
			'fr' => 'الفرنسية (French)',
			'it' => 'الإيطالية (Italian)',
			'pt-BR' => 'البرازيلية البرتغالية (Brazilian Portuguese)',
			'sv' => 'السويسرية (Swedish)',
			'th' => 'Thai',
		],
	],
];
