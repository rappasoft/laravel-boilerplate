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
                'delete_user_confirm'  => "Sei sicuro di voler eliminare definitivamente questo utente? Ovunque ci sia un riferimento a questo utente all'interno dell'applicazione si vedrà un errore. Procedi a tuo rischio e pericolo, non si potrà annullare questa operazione.",
                'if_confirmed_off'     => '(Se non è confermato)',
                'restore_user_confirm' => "Ripristinare l'utente al suo stato originario?",
            ],
        ],

        'dashboard' => [
            'title'   => 'Dashboard Amministrazione',
            'welcome' => 'Benvenuto',
        ],

        'general' => [
            'all_rights_reserved' => 'Tutti i diritti riservati.',
            'are_you_sure'        => 'Sei sicuro?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Continua',
            'member_since'        => 'Membro dal',
            'minutes'             => ' minutes',
            'search_placeholder'  => 'Cerca...',
            'timeout'             => 'You were automatically logged out for security reasons since you had no activity in ',

            'see_all' => [
                'messages'      => 'Visualizza tutti i messaggi',
                'notifications' => 'Visualizza tutte',
                'tasks'         => 'Visualizza tutti i compiti',
            ],

            'status' => [
                'online'  => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages'      => '{0} Non hai messaggi|{1} Hai un messaggio|[2,Inf] Hai :number messaggi',
                'notifications' => '{0} Non hai notifiche|{1} Hai una notifica|[2,Inf] Hai :number notifiche',
                'tasks'         => '{0} Non hai compiti|{1} Hai un compito|[2,Inf] Hai :number compiti',
            ],
        ],

        'search' => [
            'empty'      => 'Please enter a search term.',
            'incomplete' => 'You must write your own search logic for this system.',
            'title'      => 'Search Results',
            'results'    => 'Search Results for :query',
        ],

        'welcome' => '<p>Quello che vedi è il tema AdminLTE sviluppato da <a href="https://almsaeedstudio.com/" target="_blank">https://almsaeedstudio.com/</a>.
    Si tratta di una versione ridotta al minimo che include solo gli stili e gli script necessari per il funzionamento.
    Scarica la versione completa per aggiungere componenti alla dashboard.</p>
<p>Tutte le funzioni che vedi sono simulate, ad eccezione della <strong>Gestione utenti</strong> sulla sinistra.
    Questo modello comprende una libreria completa per il controllo degli accessi tramite utenti/ruoli/permessi.</p>
<p>Questo si tratta comunque di un work-in-progress, perciò ci potrebbero essere dei bug o altri problemi che non ho ancora risolto.
    Farò del mio meglio per risolverli mano a mano che riceverò le segnalazioni.</p>
<p>Spero che tu gradisca quanto lavoro e impegno ho messo in questo progetto.
    Per cortesia vai su <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a>
    per ulteriori informazioni e per segnalare qualsiasi <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">problema</a>.</p>
<p><strong>This project is very demanding to keep up with given the rate at which the master Laravel branch changes, so any help is appreciated.</strong></p>
<p>- Anthony Rappa</p>',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Your account has been confirmed.',
            'error'                   => 'Whoops!',
            'greeting'                => 'Hello!',
            'regards'                 => 'Regards,',
            'trouble_clicking_button' => 'If you’re having trouble clicking the ":action_text" button, copy and paste the URL below into your web browser:',
            'thank_you_for_using_app' => 'Thank you for using our application!',

            'password_reset_subject'    => 'Il tuo link per il reset della password',
            'password_cause_of_email'   => 'You are receiving this email because we received a password reset request for your account.',
            'password_if_not_requested' => 'If you did not request a password reset, no further action is required.',
            'reset_password'            => 'Clicca qui per resettare la tua password',

            'click_to_confirm' => 'Clicca qui per confermare il tuo account:',
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
                'permission' => 'Basato su permessi - ',
                'role'       => 'Basato su ruoli - ',
            ],

            'js_injected_from_controller' => 'Javascript iniettato da un controller',

            'using_blade_extensions' => 'Usando estensioni Blade',

            'using_access_helper' => [
                'array_permissions'     => "Si sta usando l'Access Helper con un array di nomi o ID di permessi, l'utente li deve possedere tutti.",
                'array_permissions_not' => "Si sta usando l'Access Helper con un array di nomi o ID di permessi, l'utente non li deve possedere tutti.",
                'array_roles'           => "Si sta usando l'Access Helper con un array di nomi o ID di ruoli, l'utente li deve possedere tutti.",
                'array_roles_not'       => "Si sta usando l'Access Helper con un array di nomi o ID di ruoli, l'utente non li deve possedere tutti.",
                'permission_id'         => "Si sta usando l'Access Helper con un ID di permesso",
                'permission_name'       => "Si sta usando l'Access Helper con un nome di permesso",
                'role_id'               => "Si sta usando l'Access Helper con un ID di ruolo",
                'role_name'             => "Si sta usando l'Access Helper con un nome di ruolo",
            ],

            'view_console_it_works'          => 'Apri la console Javascript del browser, dovresti vedere \'it works!\' generato da FrontendController@index',
            'you_can_see_because'            => 'Puoi vedere questo perché il tuo ruolo è \':role\'!',
            'you_can_see_because_permission' => 'Puoi vedere questo perché hai il permesso \':permission\'!',
        ],

        'general' => [
            'joined'        => 'Joined',
        ],

        'user' => [
            'change_email_notice' => 'If you change your e-mail you will be logged out until you confirm your new e-mail address.',
            'email_changed_notice' => 'You must confirm your new e-mail address before you can log in again.',
            'profile_updated'  => 'Profilo aggiornato con successo.',
            'password_updated' => 'Password aggiornata con successo.',
        ],

        'welcome_to' => 'Benvenuto su :place',
    ],
];
