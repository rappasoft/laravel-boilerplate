<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Strings Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines are used in strings throughout the system.
	| Regardless where it is placed, a string can be listed here so it is easily
	| found in a intuitive way.
	|
	*/

	'backend' => [
		'access' => [
			'users' => [
				'delete_user_confirm' => 'هل أنت متأكد من رغبتك في حذف هذا المستخدم نهائياً؟ إذا إخترت المتابعة سيتم ظهور خطأ في أي مكان يتعلق برقم ID هذا المستخدم.تابع بحذر وعلى مسؤوليتك الكاملة. لايمكن إستعادة المستخدم مرة أخرى إذا إخترت المتابعة.',
				'if_confirmed_off' => '(إذا كان خيار التفعيل مفعلاً في الإعدادات)',
				'restore_user_confirm' => 'إستعادة هذا المستخدم إلى حالته الأصلية؟',
			],
		],

		'dashboard' => [
			'title' => 'لوحة تحكم الإدارة',
			'welcome' => 'أهلاً وسهلاً',
		],

		'general' => [
			'all_rights_reserved' => 'جميع الحقوق محفوظة.',
			'are_you_sure' => 'هل أنت متأكد؟',
			'boilerplate_link' => 'Laravel 5 Boilerplate',
			'continue' => 'متابعة',
			'member_since' => 'عضو منذ',
			'minutes' => ' minutes',
			'search_placeholder' => 'بحث...',
			'timeout' => 'You were automatically logged out for security reasons since you had no activity in ',

			'see_all' => [
				'messages' => 'رؤية جميع الرسائل',
				'notifications' => 'عرض الكل',
				'tasks' => 'عرض جميع المهمات',
			],

			'status' => [
				'online' => 'موجود',
				'offline' => 'غير موجود',
			],

			'you_have' => [
				'messages' => '{0} ليس لديك أي رسائل|{1} لديك رسالة واحدة|{2} لديك رسالتان|[3,10] لديك :number رسائل|[11,inf] لديك :number رسالة',
				'notifications' => '{0} ليس لديك أي إشعارات|{1} لديك إشعار واحد|{2} لديك إشعاران|[3,10] لديك :number إشعارات|[11,inf] لديك :number إشعاراً',
				'tasks' => '{0} ليس لديك أي مهمات|{1} لديك مهمة واحدة|{2} لديك مهمتان|[3,10] لديك :number مهمات|[11,inf] لديك :number مهمة',
			],
		],
	],

	'emails' => [
		'auth' => [
			'password_reset_subject' => 'رابط إعادة تعيين كلمة المرور',
			'reset_password' => 'إضغط هنا لإعادة تعيين كلمة مرورك',
		],
	],

	'frontend' => [
		'email' => [
			'confirm_account' => 'إضغط هنا لتفعيل account:',
		],

		'test' => 'تجربة',

		'tests' => [
			'based_on' => [
				'permission' => 'صلاحية بناء ًعلى - ',
				'role' => 'دور بناء ًعلى - ',
			],

			'js_injected_from_controller' => 'Javascript Injected from a Controller',

			'using_blade_extensions' => 'إستخدام Blade Extensions',

			'using_access_helper' => [
				'array_permissions' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does have to possess all.',
				'array_permissions_not' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does not have to possess all.',
				'array_roles' => 'Using Access Helper with Array of Role Names or ID\'s where the user does have to possess all.',
				'array_roles_not' => 'Using Access Helper with Array of Role Names or ID\'s where the user does not have to possess all.',
				'permission_id' => 'Using Access Helper with Permission ID',
				'permission_name' => 'Using Access Helper with Permission Name',
				'role_id' => 'Using Access Helper with Role ID',
				'role_name' => 'Using Access Helper with Role Name',
			],

			'view_console_it_works' => 'View console, you should see \'it works!\' which is coming from FrontendController@index',
			'you_can_see_because' => 'أنت ترى هذا لأن لديك دور \':role\'!',
			'you_can_see_because_permission' => 'أنت ترى هذا لإن لديك صلاحية \':permission\'!',
		],

		'user' => [
			'profile_updated' => 'تم تحديث الملف الشخصي بنجاح.',
			'password_updated' => 'تم تحديث كلمة المرور بنجاح.',
		],

		'welcome_to' => 'مرحبا بك في :place',
	],
];