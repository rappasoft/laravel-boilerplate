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
                'delete_user_confirm'  => 'Är du säker på att du vill radera denna användare permanent? Om användaren har material någonstans i programmet som pekar på sitt ID så kommer det troligtvis generera ett felmeddelande. Denna åtgärd går inte att ångra. Du fortsätter på egen risk.',
                'if_confirmed_off'     => '(Om bekräftan är avstängt)',
                'restore_user_confirm' => 'Återställ användaren till sitt ursprungliga läge.',
            ],
        ],

        'dashboard' => [
            'title'   => 'Adminpanelen',
            'welcome' => 'Välkommen',
        ],

        'general' => [
            'all_rights_reserved' => 'Alla rättigheter förbehålls.',
            'are_you_sure'        => 'Är du säker?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Fortsätt',
            'member_since'        => 'Registrerad',
            'minutes'             => ' minutes',
            'search_placeholder'  => 'Sök...',
            'timeout'             => 'You were automatically logged out for security reasons since you had no activity in ',

            'see_all' => [
                'messages'      => 'Se alla meddelanden',
                'notifications' => 'Se alla notiser',
                'tasks'         => 'Se alla punkter',
            ],

            'status' => [
                'online'  => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages'      => '{0} Du har inga meddelanden|{1} Du har 1 meddelande|[2,Inf] Du har :number meddelanden',
                'notifications' => '{0} Du har inga aviseringar|{1} Du har 1 avisering|[2,Inf] Du har :number aviseringar',
                'tasks'         => '{0} Du har inga punkter att göra|{1} Du har 1 punkt att göra|[2,Inf] Du har :number punkter att göra',
            ],
        ],

        'search' => [
            'empty'      => 'Please enter a search term.',
            'incomplete' => 'You must write your own search logic for this system.',
            'title'      => 'Search Results',
            'results'    => 'Search Results for :query',
        ],

        'welcome' => '<p>Detta är CoreUI temat som är skapat av <a href="https://coreui.io/" target="_blank">creativeLabs</a>.
Detta är en avskalad version med enbart de mest nödvändiga stilmallarna och skripten för att få det att fungera.
Ladda ner den fulla versionen och börja lägg till de komponenter du behöver.</p>
<p>Alla länkar/funktioner är här är bara exempel förutom <strong>Användare och rättigheter</strong> och <strong>Loggöversikten</strong> i sidomenyn
Denna boilerplate kommer med fullt funktionerande <em>Access Control Library</em> för att hantera användare/roller/tillstånd.</p>
<p>Tänk på att detta repo fortfarande utvecklas och att det kan förekomma buggar och fel som ännu inte upptäckts. Jag ska göra mitt bästa för att förebygga detta.</p>
<p>Hoppas att du tycker om detta projekt som jag lagt ner så mycket tid i. Besök repots <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a> för att få mer information och rapportera gärna dina tankar/fel som <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">"issues" här</a>.</p>
<p><strong>This project is very demanding to keep up with given the rate at which the master Laravel branch changes, so any help is appreciated.</strong></p>
<p>- Anthony Rappa</p>',
    ],
    'emails' => [
        'auth' => [
            'account_confirmed' => 'Your account has been confirmed.',
            'error'                   => 'Hoppsan!',
            'greeting'                => 'Hej!',
            'regards'                 => 'Hälsningar',
            'trouble_clicking_button' => 'Fungerar inte knappen ":action_text"? Kopiera då länken nedan och klistra in den i din webbläsare.',
            'thank_you_for_using_app' => 'Tack för att du använder vår hemsida!',

            'password_reset_subject'    => 'Återställ lösenord',
            'password_cause_of_email'   => 'Du får detta meddelande eftersom det begärts en återställning av lösenord för ditt konto.',
            'password_if_not_requested' => 'Om det inte var du som begärde återställning av lösenord kan du helt bortse från detta mail.',
            'reset_password'            => 'Klicka här för att återställa ditt lösenord:',

            'click_to_confirm' => 'Klicka här för att bekräfta ditt konto:',
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
                'permission' => 'Tillstånd baserad - ',
                'role'       => 'Roll baserad - ',
            ],

            'js_injected_from_controller' => 'Javascript som fått sin data direkt från en controller',

            'using_blade_extensions' => 'Avänder utbyggda &#64;Blade-funktioner',

            'using_access_helper' => [
                'array_permissions'     => 'Använder Access Helper med en array av rättighetens namn eller ID då användaren måste ha alla rättigheter.',
                'array_permissions_not' => 'Använder Access Helper med en array av rättighetens namn eller ID då användaren INTE måste ha alla rättigheter.',
                'array_roles'           => 'Använder Access Helper med en array av rollens namn eller ID då användaren måste ha alla roller.',
                'array_roles_not'       => 'Använder Access Helper med en array av roll-namn eller roll-ID då användaren INTE måste ha alla roller.',
                'permission_id'         => 'Använder Access Helper med rättighetens ID',
                'permission_name'       => 'Använder Access Helper med rättighetens namn',
                'role_id'               => 'Använder Access Helper med rollens ID',
                'role_name'             => 'Använder Access Helper med rollens namn',
            ],

            'view_console_it_works'          => 'Kolla konsollen, du borde se \'it works!\' som skickas direkt från FrontendController@index',
            'you_can_see_because'            => 'Du kan se detta för att du har rollen \':role\'!',
            'you_can_see_because_permission' => 'Du kan se detta för att du har rättiheten \':permission\'!',
        ],

        'general' => [
            'joined'        => 'Joined',
        ],

        'user' => [
            'change_email_notice' => 'If you change your e-mail you will be logged out until you confirm your new e-mail address.',
            'email_changed_notice' => 'You must confirm your new e-mail address before you can log in again.',
            'profile_updated'  => 'Din profil är nu uppdaterad.',
            'password_updated' => 'Ditt lösenord har nu uppdaterats.',
        ],

        'welcome_to' => 'Välkommen till :place',
    ],
];
