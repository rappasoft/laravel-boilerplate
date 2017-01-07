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
                'delete_user_confirm'  => 'Er du sikker på at du vil slette denne bruger permanent? Alle steder hvor denne bruger er refereret vil sandsynligvis give en fejl. Fortsæt på eget ansvar. Denne handling kan ikke fortrydes.',
                'if_confirmed_off'     => '(Hvis bekræftelse er slået fra)',
                'restore_user_confirm' => 'Genskab brugeren til dens oprindelige tilstand?',
            ],
        ],

        'dashboard' => [
            'title'   => 'Administrativ betjeningspanel',
            'welcome' => 'Velkommen',
        ],

        'general' => [
            'all_rights_reserved' => 'Alle rettigheder forbeholdes.',
            'are_you_sure'        => 'Er du sikker?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Fortsæt',
            'member_since'        => 'Medlem siden',
            'minutes'             => ' minutter',
            'search_placeholder'  => 'Søg...',
            'timeout'             => 'Du er af sikkerhedsmæssige årsager blevet logget ud automatisk, da du ikke har været aktiv i ',

            'see_all' => [
                'messages'      => 'Se alle beskeder',
                'notifications' => 'Vis alle',
                'tasks'         => 'Vis alle opgaver',
            ],

            'status' => [
                'online'  => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages'      => '{0} Du har ingen beskeder|{1} Du hare 1 besked|[2,Inf] Du har :number beskeder',
                'notifications' => '{0} Du har ingen notifikationer|{1} Du har 1 notifikation|[2,Inf] Du har :number notifikationer',
                'tasks'         => '{0} Du har ingen opgaver|{1} Du har 1 opgave|[2,Inf] Du har :number opgaver',
            ],
        ],

        'search' => [
            'empty'      => 'Please enter a search term.',
            'incomplete' => 'You must write your own search logic for this system.',
            'title'      => 'Search Results',
            'results'    => 'Search Results for :query',
        ],

        'welcome' => '<p>Dette er temaet AdminLTE som er udviklet af <a href="https://almsaeedstudio.com/" target="_blank">https://almsaeedstudio.com/</a>. Dette er en skrabet udgave med kun det nødvendige design og kode for at få det hele til at fungere. Download den fulde version for at tilføje flere komponenter til dit betjeningspanel.</p>
<p>Alle funktionaliteter er blot til fremvisning med undtagelse af <strong>Brugeradministrationen</strong> til venstre. Denne opsætning indeholder derfor en fuld funktionel adgangskontrol til at administrere brugere/roller/rettigheder.</p>
<p>Vær opmærksom på at dette er et videregående projekt og der kan derfor forekomme fejl eller andre problemer, som jeg ikke er stødt på endnu. Jeg vil gøre mit bedste for at rette dem når jeg modtager dem.</p>
<p>Håber at du er glad for indsatsen jeg har givet dette projekt. Du er velkommen til at besøge os på <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a> for mere information og du kan samtidig med indberette <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">fejl her</a>.</p>
<p><strong>Dette projekt er rimelig omfattende at vedligeholde med de mange opdateringer Laravel indfører i deres master branch, så alle former for hjælp er værdsat.</strong></p>
<p>- Anthony Rappa</p>',
    ],
    'emails' => [
        'auth' => [
            'error'                   => 'Whoops!',
            'greeting'                => 'Hello!',
            'regards'                 => 'Regards,',
            'trouble_clicking_button' => 'If you’re having trouble clicking the ":action_text" button, copy and paste the URL below into your web browser:',
            'thank_you_for_using_app' => 'Thank you for using our application!',

            'password_reset_subject'    => 'Dit link til at nulstille adgangskoden',
            'password_cause_of_email'   => 'You are receiving this email because we received a password reset request for your account.',
            'password_if_not_requested' => 'If you did not request a password reset, no further action is required.',
            'reset_password'            => 'Klik her for at nulstille din adgangskode',

            'click_to_confirm' => 'Klik her for at bekræfte din konto:',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Rettighedsbaseret - ',
                'role'       => 'Rollebasseret - ',
            ],

            'js_injected_from_controller' => 'Javascript indsat fra en Controller',

            'using_blade_extensions' => 'Anvender Blade-udvidelser',

            'using_access_helper' => [
                'array_permissions'     => 'Anvender \'Acess Helper\' med en liste af rettighedsnavne eller rettighedsid\'er hvor brugeren skal opfylde alle rettigheder.',
                'array_permissions_not' => 'Anvender \'Access Helper\' med en liste af rettighedsnavne eller id\'er hvor brugeren ikke behøver at opfylde alle rettigheder.',
                'array_roles'           => 'Anvender \'Access Helper\' med en liste af rollenavne eller rolleid\'er hvor brugeren skal opfylde alle rettigheder.',
                'array_roles_not'       => 'Anvender \'Access Helper\' med en liste af rollenavne eller rolleid\'er hvor brugeren ikke behøver at opfylde alle rettigheder.',
                'permission_id'         => 'Anvender \'Access Helper\' med rettighedsid',
                'permission_name'       => 'Anvender \'Access Helper\' med rettighedsnavn',
                'role_id'               => 'Anvender \'Access Helper\' med rolleid',
                'role_name'             => 'Anvender \'Access Helper\' med rollenavn',
            ],

            'view_console_it_works'          => 'Vis konsol og du burde kunne se \'it works!\', som kommer fra FrontendController@index',
            'you_can_see_because'            => 'Du kan se dette fordi du har rollen \':role\'!',
            'you_can_see_because_permission' => 'Du kan se dette fordi du har rettigheden \':permission\'!',
        ],

        'user' => [
            'profile_updated'  => 'Profil opdateret.',
            'password_updated' => 'Adgangskode opdateret.',
        ],

        'welcome_to' => 'Velkommen til :place',
    ],
];
