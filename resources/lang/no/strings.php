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
                'delete_user_confirm' => 'Er du sikker på at du vil slette denne brukeren permanent? Alle steder hvor denne brukeren er refereret vil sandsynligvis gi en feil. Fortsett på eget ansvar. Denne handlingen kan ikke angres på.',
                'if_confirmed_off' => '(Hvis bekreftelse er avslått)',
                'restore_user_confirm' => 'Gjennopprett brukeren til dens opprindelige tilstand?',
            ],
        ],

        'dashboard' => [
            'title' => 'Administrativ betjeningspanel',
            'welcome' => 'Velkommen',
        ],

        'general' => [
            'all_rights_reserved' => 'Alle rettigheter forbeholdes.',
            'are_you_sure' => 'Er du sikker?',
            'boilerplate_link' => 'Laravel 5 Boilerplate',
            'continue' => 'Fortsett',
            'member_since' => 'Medlem siden',
            'minutes' => ' minutter',
            'search_placeholder' => 'Søk...',
            'timeout' => 'Du er av sikkerhedsmessige årsaker blitt logget av automatisk, da du ikke har været aktiv i ',

            'see_all' => [
                'messages' => 'Se alle meldinger',
                'notifications' => 'Vis alle',
                'tasks' => 'Vis alle oppgaver',
            ],

            'status' => [
                'online' => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages' => '{0} Du har ingen meldinger|{1} Du hare 1 melding|[2,Inf] Du har :number meldinger',
                'notifications' => '{0} Du har ingen notifikationer|{1} Du har 1 notifikation|[2,Inf] Du har :number notifikationer',
                'tasks' => '{0} Du har ingen oppgaver|{1} Du har 1 oppgave|[2,Inf] Du har :number oppgaver',
            ],
        ],

        'search' => [
            'empty' => 'Please enter a search term.',
            'incomplete' => 'You must write your own search logic for this system.',
            'title' => 'Search Results',
            'results' => 'Search Results for :query',
        ],

        'welcome' => 'Welcome to the Dashboard',
    ],
    'emails' => [
        'auth' => [
            'account_confirmed' => 'Din konto har blitt godkjent.',
            'error' => 'Whoops!',
            'greeting' => 'Hello!',
            'regards' => 'Hilsen,',
            'trouble_clicking_button' => 'Hvis du har problem med å klikke på ":action_text" knappen, copy and paste URL under in i nettleseren:',
            'thank_you_for_using_app' => 'Takk for at du bruker vår applikasjon!',

            'password_reset_subject' => 'Din link til å tilbakestille passordet',
            'password_cause_of_email' => 'Du får denne mailen fordi vi har motatt en forespørsel om å tilbakestille passordet på din konto.',
            'password_if_not_requested' => 'Hvis du ikke ba om dette, trenger du ikke gjøre noe.',
            'reset_password' => 'Klikk her for at tilbakestille passordet',

            'click_to_confirm' => 'Klikk her for å bekrefte kontoen din:',
        ],

        'contact' => [
            'email_body_title' => 'You have a new contact form request: Below are the details:',
            'subject' => 'A new :app_name contact form submission!',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Rettighetsbaseret - ',
                'role' => 'Rollebaseret - ',
            ],

            'js_injected_from_controller' => 'Javascript satt inn fra en Controller',

            'using_blade_extensions' => 'Bruker Blade-utvidelser',

            'using_access_helper' => [
                'array_permissions' => 'Bruker \'Acess Helper\' med en liste av rettighedsnavne eller rettighedsid\'er hvor brukeren skal oppfylde alle rettigheder.',
                'array_permissions_not' => 'Bruker \'Access Helper\' med en liste av rettighedsnavne eller id\'er hvor brukeren ikke behøver at oppfylde alle rettigheder.',
                'array_roles' => 'Bruker \'Access Helper\' med en liste av rollenavne eller rolleid\'er hvor brukeren skal oppfylde alle rettigheder.',
                'array_roles_not' => 'Bruker \'Access Helper\' med en liste av rollenavne eller rolleid\'er hvor brukeren ikke behøver at oppfylde alle rettigheder.',
                'permission_id' => 'Bruker \'Access Helper\' med rettighedsid',
                'permission_name' => 'Bruker \'Access Helper\' med rettighedsnavn',
                'role_id' => 'Bruker \'Access Helper\' med rolleid',
                'role_name' => 'Bruker \'Access Helper\' med rollenavn',
            ],

            'view_console_it_works' => 'Vis konsol og du burde kunne se \'it works!\', som kommer fra FrontendController@index',
            'you_can_see_because' => 'Du kan se dette fordi du har rollen \':role\'!',
            'you_can_see_because_permission' => 'Du kan se dette fordi du har rettigheten \':permission\'!',
        ],

        'general' => [
            'joined' => 'Joined',
        ],

        'user' => [
            'change_email_notice' => 'Hvis du endrer emailadressen vil du bli logget av til du kan bekrefte din nye emailadresse.',
            'email_changed_notice' => 'Du må bekrefte din nye email før du kan logge inn igjen.',
            'profile_updated' => 'Profil oppdateret.',
            'password_updated' => 'Passord oppdateret.',
        ],

        'welcome_to' => 'Velkommen til :place',
    ],
];
