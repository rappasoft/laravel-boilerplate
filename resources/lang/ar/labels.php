<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Labels Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines are used in labels throughout the system.
	| Regardless where it is placed, a label can be listed here so it is easily
	| found in a intuitive way.
	|
	*/

	'general' => [
		'all' => 'الكل',
		'yes' => 'نعم',
		'no' => 'لا',
		'custom' => 'مخصص',
		'actions' => 'إجراءات',
		'buttons' => [
			'save' => 'حفظ',
			'update' => 'تحديث',
		],
		'hide' => 'إخفاء',
		'none' => 'لا شيء',
		'show' => 'إظاهر',
		'toggle_navigation' => 'تبديل شريط التنقل',
	],

	'backend' => [
		'access' => [
			'roles' => [
				'create' => 'إنشاء دور جديد',
				'edit' => 'تعديل دور',
				'management' => 'إدارة الأدوار',

				'table' => [
					'number_of_users' => 'عدد المستخدمين',
					'permissions' => 'الصلاحيات',
					'role' => 'الدور',
					'sort' => 'الترتيب',
					'total' => 'مجموع الدور|مجموع الأدوار',
				],
			],

			'users' => [
				'active' => 'المستخدمون النشطون',
				'all_permissions' => 'جميع الصلاحيات',
				'change_password' => 'تغيير كلمة المرور',
				'change_password_for' => 'تغيير كلمة المرور للمستخدم :user',
				'create' => 'إنشاء مستخدم جديد',
				'deactivated' => 'المستخدمون المعطلون',
				'deleted' => 'المستخدمون المحذوفون',
				'edit' => 'تعديل المستخدم',
				'management' => 'إدارة المستخدمين',
				'no_permissions' => 'بدون صلاحيات',
				'no_roles' => 'بدون أي أدوار.',
				'permissions' => 'صلاحيات',

				'table' => [
					'confirmed' => 'مؤكد',
					'created' => 'تم الإنشاء',
					'email' => 'البريد الإلكتروني',
					'id' => 'ID',
					'last_updated' => 'آخر تحديث',
					'name' => 'الإسم',
					'no_deactivated' => 'لا يوجد أي مستخدمين معطلين',
					'no_deleted' => 'لا يوحد أي مستخدمين محذوفين',
					'roles' => 'الأدوار',
					'total' => 'مجموع المستخدم|مجموع المستخدمين',
				],
			],
		],
	],

	'frontend' => [

		'auth' => [
			'login_box_title' => 'تسجيل الدخول',
			'login_button' => 'تسجيل الدخول',
			'login_with' => 'تسجيل الدخول بواسطة :social_media',
			'register_box_title' => 'تسجيل',
			'register_button' => 'تسجيل',
			'remember_me' => 'تذكرني',
		],

		'passwords' => [
			'forgot_password' => 'نسيت كلمة مرورك؟',
			'reset_password_box_title' => 'إعادة تعيين كلمة المرور',
			'reset_password_button' => 'إعادة تعيين كلمة المرور',
			'send_password_reset_link_button' => 'إرسال رابط إعادة تعيين كلمة المرور',
		],

		'macros' => [
			'country' => [
				'alpha' => 'كود الدول',
				'alpha2' => 'كود الدول 2',
				'alpha3' => 'كود الدول 3',
				'numeric' => 'أرقام أكواد الدول',
			],

			'macro_examples' => 'أمثلة ماكرو',

			'state' => [
				'mexico' => 'قائمة ولاية ماكسيكو',
				'us' => [
					'us' => 'ولايات الولايات المتحدة الأمريكية',
					'outlying' => 'الأراضي البعيدة عن الولايات المتحدة الأمريكية',
					'armed' => 'القوات المسلحة الأمريكية',
				],
			],

			'territories' => [
				'canada' => 'مقاطعة كندا وقائمة أراضيها',
			],

			'timezone' => 'المناطق الزمنية',
		],

		'user' => [
			'passwords' => [
				'change' => 'تغيير كلمة المرور',
			],

			'profile' => [
				'avatar' => 'الصورة الشخصية',
				'created_at' => 'تم الإنشاء في',
				'edit_information' => 'تعديل البيانات',
				'email' => 'البريد الإلكتروني',
				'last_updated' => 'آخر تحديث تم في',
				'name' => 'الإسم',
				'update_information' => 'تحديث البيانات',
			],
		],

	],
];