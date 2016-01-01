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
                'edit' => 'Éditer Permission',

                'groups' => [
                    'create' => 'Créer Groupe',
                    'edit' => 'Éditer Groupe',

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
                'deactivated' => 'Utilisateurs désactivés',
                'deleted' => 'Utilisateurs supprimés',
                'dependencies' => 'Dépendances',
                'edit' => 'Éditer Utilisateur',
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
                    'no_deactivated' => "Pas d'utilisateurs désactivés",
                    'no_deleted' => "Pas d'utilisateurs supprimés",
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
            'forgot_password' => 'Vous avezz oublié votre mot de passe ?',
            'reset_password_box_title' => 'Réinitialisation du mot de passe',
            'reset_password_button' => 'Réinitialiser le mot de passe',
            'send_password_reset_link_button' => 'Envoyer le lien de réinitialisation',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Pays Alpha Codes',
                'alpha2' => 'Pays Alpha 2 Codes',
                'alpha3' => 'Pays Alpha 3 Codes',
                'numeric' => 'Pays Numéros Codes',
            ],

            'macro_examples' => 'Examples Macros',

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

            'timezone' => 'Fuseau horaire',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Modifier le mot de passe',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Créé le ',
                'edit_information' => 'Éditer les informations',
                'email' => 'e-mail',
                'last_updated' => 'Mise à jour le',
                'name' => 'Nom',
                'update_information' => 'Mettre à jour les informations',
            ],
        ],

    ],
];