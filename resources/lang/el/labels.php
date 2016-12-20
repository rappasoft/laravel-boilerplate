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
        'all' => 'Όλα',
        'yes' => 'Ναι',
        'no' => 'Όχι',
        'custom' => 'Custom',
        'actions' => 'Ενέργειες',
		'active' => 'Ενεργό',
        'buttons' => [
            'save' => 'Αποθήκευση',
            'update' => 'Ανανέωση',
        ],
        'hide' => 'Απόκρυψη',
		'inactive' => 'Ανενεργό',
        'none' => 'Κανένα',
        'show' => 'Εμφάνιση',
        'toggle_navigation' => 'Αλλαγή περιήγησης',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Δημιουργία ρόλου',
                'edit' => 'Επεξεργασία ρόλου',
                'management' => 'Διαχείρηση ρόλων',

                'table' => [
                    'number_of_users' => 'Αριθμός χρηστών',
                    'permissions' => 'Άδειες',
                    'role' => 'Ρόλος',
                    'sort' => 'Ταξινόμησε',
                    'total' => 'σύνολο ρόλου|σύνολο ρόλων',
                ],
            ],

            'users' => [
                'active' => 'Ενεργοί χρήστες',
                'all_permissions' => 'Όλες οι άδειες',
                'change_password' => 'Αλλαγή κωδικού',
                'change_password_for' => 'Αλλαγή κωδικού για τον :user',
                'create' => 'Δημιουργία χρήστη',
                'deactivated' => 'Ανενεργοί χρήστες',
                'deleted' => '΄Διεγραμμένοι χρήστες',
                'edit' => 'Έπεξεργασία χρήστη',
                'management' => '΄Διαχείρηση χρήστη',
                'no_permissions' => 'Χωρίς άδειες',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Άδειες',

                'table' => [
                    'confirmed' => 'Confirmed',
                    'created' => 'Δημιουργήθηκε',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Τελευταία ενημέρωση',
                    'name' => 'Όνομα',
                    'no_deactivated' => 'Δεν υπάρχουν ανενεργοί χρήστες',
                    'no_deleted' => 'Δεν υπάρχουν διεγραμμένοι χρήστες',
                    'roles' => '΄Ρόλοι',
                    'total' => 'user total|users total',
                ],

				'tabs' => [
					'titles' => [
						'overview' => 'Overview',
						'history' => 'Ιστορία',
					],

					'content' => [
						'overview' => [
							'avatar' => 'Avatar',
							'confirmed' => 'Επιβεβαιωμένο',
							'created_at' => 'Δημιουργήθηκε την',
							'deleted_at' => 'Διαγράφηκε την',
							'email' => 'E-mail',
							'last_updated' => 'Τελευταία ενημέρωση',
							'name' => 'Όνομα',
							'status' => 'Status',
						],
					],
				],

				'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Country Alpha Codes',
                'alpha2' => 'Country Alpha 2 Codes',
                'alpha3' => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us' => [
                    'us' => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed' => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
