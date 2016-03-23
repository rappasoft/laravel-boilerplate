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
                'edit_explanation' => "Si vous avez effectué des opérations dans la section hiérarchie sans rafraîchir cette page, vous devrez l'actualiser pour refléter les changements ici.",

                'groups' => [
                    'hierarchy_saved' => 'La hiérarchie est enregistrée avec succès.',
                ],

                'sort_explanation' => "Cette section vous permet d'organiser vos autorisations en groupes pour rester organisé. Quel que soit le groupe, les autorisations sont toujours assignées individuellement à chaque rôle.",
            ],

            'users' => [
                'delete_user_confirm' => "Êtes-vous sûr de vouloir supprimer cet utilisateur de façon permanente ? Toutes  les références à cet utilisateur dans l'application peuvent provoquer des erreurs et cette opération ne peut être annullée.",
                'if_confirmed_off' => '(pour le mode sans confirmation)',
                'restore_user_confirm' => 'Restaurer cet utilisateur à son statut original ?',
            ],
        ],

        'dashboard' => [
            'title' => 'Tableau de bord administrateur',
            'welcome' => 'Bienvenue',
        ],

        'general' => [
            'all_rights_reserved' => 'Tous droits réservés.',
            'are_you_sure' => 'Etes-vous sûr?',
            'boilerplate_link' => 'Laravel 5 Boilerplate',
            'continue' => 'Continue',
            'member_since' => 'Membre depuis',
            'search_placeholder' => 'Rechercher...',

            'see_all' => [
                'messages' => 'Voir tous les messages',
                'notifications' => 'Voir tous',
                'tasks' => 'Voir les nouvelles taches',
            ],

            'status' => [
                'online' => 'En ligne',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages' => "{0} Vous n'avez pas de message|{1} Vous avez 1 message|[2,Inf] Vous avez :number messages",
                'notifications' => "{0} Vous n'avez pas de notifications|{1} Vous avez 1 notification|[2,Inf] Vous avez :number notifications",
                'tasks' => "{0} Vous n'avez pas de tache|{1} Vous avez 1 tache|[2,Inf] Vous avez :number taches",
            ],
        ],
    ],

    'emails' => [
        'auth' => [
            'password_reset_subject' => 'Votre lien de réinitialisation',
            'reset_password' => 'Cliquez ici pour réinitialiser votre mot de passe',
        ],
    ],

    'frontend' => [
        'email' => [
            'confirm_account' => 'Cliquez ici pour confirmer votre compte :',
        ],

        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Helper sur la base de la permissions : ',
                'role' => 'Helper sur la base du rôle : ',
            ],

            'js_injected_from_controller' => 'Javascript Injecté depuis un Controlleur',

            'using_blade_extensions' => 'Utilisation des extensions Blade',

            'using_access_helper' => [
                'array_permissions' => "L'utilisateur doit disposer de toutes les permsissions d'un tableau, identifées soit par leur ID, soit par leur nom.",
                'array_permissions_not' => "L'utilisateur doit disposer d'au moins une des permsissions d'un tableau, identifées soit par leur ID, soit par leur nom.",
                'array_roles' => "L'utilisateur doit disposer de toutes les rôles d'un tableau, identifés soit par leur ID, soit par leur nom.",
                'array_roles_not' =>  "L'utilisateur doit disposer d'au moins un des rôles d'un tableau, identifés soit par leur ID, soit par leur nom.",
                'permission_id' => "L'utilisateur doit disposer d'une permission identifée par son ID",
                'permission_name' => "L'utilisateur doit disposer d'une permission identifée par son nom",
                'role_id' => "L'utilisateur doit disposer d'un rôle identifé par son ID",
                'role_name' => "L'utilisateur doit disposer d'un rôle identifé par son nom",
            ],

            'view_console_it_works' => 'Sur la console du navigateur, vous devriez voir  \'it works!\', ce qui est produit depuis le FrontendController@index',
            'you_can_see_because' => 'Vous voyez ce message car vous disposez du rôle \':role\'!',
            'you_can_see_because_permission' => 'Vous voyez ce message car vous disposez de la permissions \':permission\'!',
        ],

        'user' => [
            'profile_updated' => 'Profil modifié avec succès.',
            'password_updated' => 'Mot de passe modifié avec succès.',
        ],

        'welcome_to' => 'Bienvenue sur :place',
    ],
];