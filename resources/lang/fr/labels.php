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
        'yes' => 'Oui',
        'no' => 'Non',
        'custom' => 'Custom', // TODO TRANSLATION
        'actions' => 'Actions',
        'buttons' => [
            'save' => 'Enregistrer',
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
                'create' => 'Créer une permission',
                'dependencies' => 'Dépendances',
                'edit' => 'Éditer une permission',

                'groups' => [
                    'create' => 'Créer groupe',
                    'edit' => 'Éditer groupe',

                    'table' => [
                        'name' => 'Nom',
                    ],
                ],

                'grouped_permissions' => 'Permissions groupées',
                'label' => 'permissions',
                'management' => 'Gestion des permissions',
                'no_groups' => "Il n'y a pas de groupes de permission.",
                'no_permissions' => 'Pas de permission sélectionnée.',
                'no_roles' => 'Pas de rôle sélectionné',
                'no_ungrouped' => "Il n'y a pas de permissions non groupées.",

                'table' => [
                    'dependencies' => 'Dépendances',
                    'group' => 'Groupe',
                    'group-sort' => 'Ordre du groupe',
                    'name' => 'Nom',
                    'permission' => 'Permission',
                    'roles' => 'Rôles',
                    'system' => 'Système',
                    'total' => 'permission total|permissions total',
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
                'create' => 'Créer un rôle',
                'edit' => 'Editer un rôle',
                'management' => 'Gestion des rôles',

                'table' => [
                    'number_of_users' => "Nombre d'utilisateurs",
                    'permissions' => 'Permissions',
                    'role' => 'Rôle',
                    'sort' => 'Ordre',
                    'total' => 'rôle total|rôles total',
                ],
            ],

            'users' => [
                'active' => 'Utilisateurs actifs',
                'all_permissions' => 'Toutes les permissions',
                'change_password' => 'Modifier le mot de passe',
                'change_password_for' => 'Modifier le mot de passe pour :user',
                'create' => 'Créer Utilisateur',
                'deactivated' => 'Utilisateurs désactivés',
                'deleted' => 'Utilisateurs supprimés',
                'dependencies' => 'Dépendances',
                'edit' => 'Éditer Utilisateur',
                'management' => 'Gestion des utilisateurs',
                'no_other_permissions' => "Pas d'autres permissions",
                'no_permissions' => 'Pas de permissions',
                'no_roles' => 'Pas de Rôle à affecter.',
                'permissions' => 'Permissions',
                'permission_check' => "La sélection d'une permission sélectionne aussi ses dépendances s'il y en a.",

                'table' => [
                    'confirmed' => 'Confirmé',
                    'created' => 'Création',
                    'email' => 'Email',
                    'id' => 'ID',
                    'last_updated' => 'Mise à jour',
                    'name' => 'Nom',
                    'no_deactivated' => "Pas d'utilisateurs désactivés",
                    'no_deleted' => "Pas d'utilisateurs supprimés",
                    'other_permissions' => 'Autres permissions',
                    'roles' => 'Rôles',
                    'total' => 'utilisateur total|utilisateurs total',
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Connexion',
            'login_button' => "Entrer",
            'login_with' => "S'enregistrer avec :social_media",
            'register_box_title' => "S'enregistrer",
            'register_button' => 'Créer le compte',
            'remember_me' => 'Se souvenir de moi',
        ],

        'passwords' => [
            'forgot_password' => 'Vous avez oublié votre mot de passe&nbsp;?',
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

            'macro_examples' => 'Exemples de macros',

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
                'created_at' => 'Date de création',
                'edit_information' => 'Éditer les informations',
                'email' => 'Email',
                'last_updated' => 'Date de mise à jour',
                'name' => 'Nom',
                'update_information' => 'Mettre à jour les informations',
            ],
        ],

    ],
];
