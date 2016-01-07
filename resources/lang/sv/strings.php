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
            'permissions' => [
                'edit_explanation' => 'Om du uppdaterar hierarkin/ordningen så måste du uppdatera sidan för att kunna se de ändringar du gjort.',

                'groups' => [
                    'hierarchy_saved' => 'Ändringar i hierarkin är sparade.',
                ],

                'sort_explanation' => 'Här kan du hantera hierarkin för dina tillståndsgrupper. Du kan här göra tillståndsgrupper beroende av varandra. Tillstånden är individuellt bundna till rollerna oavsett gruppens placering i hierarkin.',
            ],

            'users' => [
                'delete_user_confirm' => 'Är du säker på att du vill radera denna användare permanent? Om användaren har material någonstans i programmet som pekar på sitt ID så kommer det troligtvis generera ett felmeddelande. Denna åtgärd går inte att ångra. Du fortsätter på egen risk.',
                'if_confirmed_off' => '(Om bekräftan är avstängt)',
                'restore_user_confirm' => 'Återställ användaren till sitt ursprungliga läge.',
            ],
        ],

        'dashboard' => [
            'title' => 'Adminpanelen',
            'welcome' => 'Välkommen',
        ],

        'general' => [
            'all_rights_reserved' => 'Alla rättigheter förbehålls.',
            'are_you_sure' => 'Är du säker?',
            'boilerplate_link' => 'Laravel 5 Boilerplate',
            'continue' => 'Fortsätt',
            'member_since' => 'Registrerad',
            'search_placeholder' => 'Sök...',

            'see_all' => [
                'messages' => 'Se alla meddelanden',
                'notifications' => 'Se alla notiser',
                'tasks' => 'Se alla punkter',
            ],

            'status' => [
                'online' => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages' => '{0} Du har inga meddelanden|{1} Du har 1 meddelande|[2,Inf] Du har :number meddelanden',
                'notifications' => '{0} Du har inga aviseringar|{1} Du har 1 avisering|[2,Inf] Du har :number aviseringar',
                'tasks' => '{0} Du har inga punkter att göra|{1} Du har 1 punkt att göra|[2,Inf] Du har :number punkter att göra',
            ],
        ],
    ],

    'emails' => [
        'auth' => [
            'password_reset_subject' => 'Länk för att återställa ditt lösenord',
            'reset_password' => 'Klicka här för att återställa ditt lösenord:',
        ],
    ],

    'frontend' => [
        'email' => [
            'confirm_account' => 'Klicka här för att bekräfta ditt konto:',
        ],

        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Tillstånd baserad - ',
                'role' => 'Roll baserad - ',
            ],

            'js_injected_from_controller' => 'Javascript som fått sin data direkt från en controller',

            'using_blade_extensions' => 'Avänder utbyggda &#64;Blade-funktioner',

            'using_access_helper' => [
                'array_permissions' => 'Använder Access Helper med en array av rättighetens namn eller ID då användaren måste ha alla rättigheter.',
                'array_permissions_not' => 'Använder Access Helper med en array av rättighetens namn eller ID då användaren INTE måste ha alla rättigheter.',
                'array_roles' => 'Använder Access Helper med en array av rollens namn eller ID då användaren måste ha alla roller.',
                'array_roles_not' => 'Använder Access Helper med en array av roll-namn eller roll-ID då användaren INTE måste ha alla roller.',
                'permission_id' => 'Använder Access Helper med rättighetens ID',
                'permission_name' => 'Använder Access Helper med rättighetens namn',
                'role_id' => 'Använder Access Helper med rollens ID',
                'role_name' => 'Använder Access Helper med rollens namn',
            ],

            'view_console_it_works' => 'Kolla konsollen, du borde se \'it works!\' som skickas direkt från FrontendController@index',
            'you_can_see_because' => 'Du kan se detta för att du har rollen \':role\'!',
            'you_can_see_because_permission' => 'Du kan se detta för att du har rättiheten \':permission\'!',
        ],

        'user' => [
            'profile_updated' => 'Din profil är nu uppdaterad.',
            'password_updated' => 'Ditt lösenord har nu uppdaterats.',
        ],

        'welcome_to' => 'Välkommen till :place',
    ],
];
