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
        'all' => 'Tous',
        'actions' => 'Actions',
        'buttons' => [
            'save' => 'Sauvegarder',
            'update' => 'Mettre à jour',
        ],
        'hide' => 'Cacher',
        'none' => 'Aucun',
        'show' => 'Voir',
        'toggle_navigation' => 'Navigation',
    ],

    'backend' => [
        'access' => [
            'permissions' => [
                'create' => 'Créer Permission',
                'dependencies' => 'Dépendances',
                'edit' => 'Editer Permission',

                'groups' => [
                    'create' => 'Creéer Groupe',
                    'edit' => 'Editer Group',

                    'table' => [
                        'name' => 'Nom',
                    ],
                ],

                'grouped_permissions' => 'Permissions groupées',
                'label' => 'permissions',
                'management' => 'Gerstion des Permissions',
                'no_groups' => "Il n'y a pas de groupes de permission.",
                'no_permissions' => 'Pas de permission sélectionnée.',
                'no_roles' => 'Pas de rôle sélectionné',
                'no_ungrouped' => "Il n'y a pas de permissions non groupées.",

                'table' => [
                    'dependencies' => 'Dépendances',
                    'group' => 'Groupe',
                    'group-sort' => 'Tri Groupe',
                    'name' => 'Nom',
                    'permission' => 'Permission',
                    'roles' => 'Rôles',
                    'system' => 'Système',
                    'total' => 'permissions(s) total',
                    'users' => 'Utilisateurs',
                ],

                'tabs' => [
                    'general' => 'Géneral',
                    'groups' => 'Groupes',
                    'dependencies' => 'Dépendances',
                    'permissions' => 'Permissions',
                ],

                'ungrouped_permissions' => 'Permissions non groupées',
            ],

            'roles' => [
                'create' => 'Créer Rôle',
                'edit' => 'Editer Rôle',
                'management' => 'Gestion Rôle',

                'table' => [
                    'number_of_users' => "Nombre d'utilisateurs",
                    'permissions' => 'Permissions',
                    'role' => 'Rôle',
                    'sort' => 'Tri',
                    'total' => 'rôles(s) total',
                ],
            ],

            'users' => [
                'active' => 'Utilisateurs actifs',
                'all_permissions' => 'Toutes les Permissions',
                'change_password' => 'Modifier le mot de passe',
                'change_password_for' => 'Modifier le mot de passe pour :user',
                'create' => 'Créer Utilisateur',
                'deactivated' => 'Users désactivés',
                'deleted' => 'Utilisateurs supprimés',
                'dependencies' => 'Dépendances',
                'edit' => 'Editer Utilisateur',
                'management' => 'Gestion utilisateurs',
                'no_other_permissions' => "Pas d'autres Permissions",
                'no_permissions' => 'Pas de Permissions',
                'no_roles' => 'Pas de Rôle à affecter.',
                'permissions' => 'Permissions',
                'permission_check' => "Vérifier une permission vérifie aussi ses dépendances s'il y en a.",

                'table' => [
                    'confirmed' => 'Confirmé',
                    'created' => 'Créé',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Mise à jour le',
                    'name' => 'Nom',
                    'no_deactivated' => "Pas d'Utilisateurs désactivés",
                    'no_deleted' => "Pas d'Utilisateurs supprimés",
                    'other_permissions' => 'Autres Permissions',
                    'roles' => 'Rôles',
                    'total' => 'utilisateur(s) total',
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'identifiant',
            'login_button' => 'OK',
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