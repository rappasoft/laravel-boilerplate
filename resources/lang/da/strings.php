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
                'edit_explanation' => 'Hvis du har udført operationer i hierarkiet uden at opdatere denne side skal du opdatere for at afspejle ændringerne her.',

                'groups' => [
                    'hierarchy_saved' => 'Hierakiet blev gemt.',
                ],

                'sort_explanation' => 'Denne sektion tillader dig at organisere dine tilladelser i grupper. Uanset gruppen, er tilladelserne stadig individuelt tildelt hver rolle.',
            ],

            'users' => [
                'delete_user_confirm' => 'Er du sikker på at du vil slette denne bruger? Alle stedere hvor denne brugers id er benyttet some reference vil sndsynligvis gieve en fejl. Fortsæt på eget ansvar. Denne handling kan ikke fortrydes.',
                'if_confirmed_off' => '(Hvis bekræftelse er slået fra)',
                'restore_user_confirm' => 'Genskab brugeren the hans oprindelige tilstand?',
            ],
        ],

        'dashboard' => [
            'title' => 'Administrativ oversigt',
            'welcome' => 'Velkommen',
        ],

        'general' => [
            'all_rights_reserved' => 'Alle rettigheder forbeholdes.',
            'are_you_sure' => 'Er su sikker?',
            'boilerplate_link' => 'Laravel 5 Boilerplate',
            'continue' => 'Fortsøt',
            'member_since' => 'Medlem siden',
            'search_placeholder' => 'Søg...',

            'see_all' => [
                'messages' => 'Se alle beskeder',
                'notifications' => 'Vis alle',
                'tasks' => 'Vis alle opgaver',
            ],

            'status' => [
                'online' => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages' => '{0} du har ingen beskeder|{1} du hare 1 besked|[2,Inf] du har :number beskeder',
                'notifications' => '{0} du har ingen meddelser|{1} du har en meddelse|[2,Inf] du har :number meddelelser',
                'tasks' => '{0} du har ingen opgaver|{1} du har en opgave|[2,Inf] du hare :number opgaver',
            ],
        ],
    ],

    'emails' => [
        'auth' => [
            'password_reset_subject' => 'Dit link til at nulstille kodeord',
            'reset_password' => 'Tryk her for at nulstille dit kodeord',
        ],
    ],

    'frontend' => [
        'email' => [
            'confirm_account' => 'tryk her for at bekræfte din konto:',
        ],

        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Rettigheds baseret - ',
                'role' => 'Rolle basseret - ',
            ],

            'js_injected_from_controller' => 'Javascript Injected fra en  Controller',

            'using_blade_extensions' => 'Bruger Blade udvidelese',

            'using_access_helper' => [
                'array_permissions' => 'Bruger \'Acess Helper\' med et Array af rettigheders navn eller Id  hvor brugeren skal have alle.',
                'array_permissions_not' => 'Bruger \'Access Helper\' med et array af rettigheds navne eller Id hvor brugeren ikke behøver at have alle.',
                'array_roles' => 'Bruger \'Access Helper\' med et array af rolle navene eller id hvor brugeren skal have alle.',
                'array_roles_not' => 'Bruger \'Access Helper\' med array af rolle naven eller Id hvor brugeren ikke behøver at have alle.',
                'permission_id' => 'Bruger \'Access Helper\' med rettigheds id',
                'permission_name' => 'Bruger \'Access Helper\' med rettigheds navn',
                'role_id' => 'Bruger \'Access Helper\' med rolle id',
                'role_name' => 'Bruger \'Access Helper\' med rolle navn',
            ],

            'view_console_it_works' => 'Vis konsol og du vil se, \'it works!\' som kommer fra FrontendController@index',
            'you_can_see_because' => 'Du kan se dette fordi du har rolle \':role\'!',
            'you_can_see_because_permission' => 'Du kan se dette fordi du har fået tildelt rettigheden \':permission\'!',
        ],

        'user' => [
            'profile_updated' => 'Profil opdateret.',
            'password_updated' => 'Kodeord opdateret.',
        ],

        'welcome_to' => 'Velkommenn til :place',
    ],
];
