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
        'all'     => 'Tout',
        'yes'     => 'Oui',
        'no'      => 'Non',
        'custom'  => 'Personnalisé',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Enregistrer',
            'update' => 'Mettre à jour',
        ],
        'hide'              => 'Cacher',
        'inactive'          => 'Inactive',
        'none'              => 'Aucun',
        'show'              => 'Voir',
        'toggle_navigation' => 'Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Créer un rôle',
                'edit'       => 'Editer un rôle',
                'management' => 'Gestion des rôles',

                'table' => [
                    'number_of_users' => "Nombre d'utilisateurs",
                    'permissions'     => 'Permissions',
                    'role'            => 'Rôle',
                    'sort'            => 'Ordre',
                    'total'           => 'rôle total|rôles total',
                ],
            ],

            'users' => [
                'active'              => 'Utilisateurs actifs',
                'all_permissions'     => 'Toutes les permissions',
                'change_password'     => 'Modifier le mot de passe',
                'change_password_for' => 'Modifier le mot de passe pour :user',
                'create'              => 'Créer un utilisateur',
                'deactivated'         => 'Utilisateurs désactivés',
                'deleted'             => 'Utilisateurs supprimés',
                'edit'                => 'Éditer un utilisateur',
                'management'          => 'Gestion des utilisateurs',
                'no_permissions'      => 'Aucune permission',
                'no_roles'            => 'Aucun rôle à affecter.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmé',
                    'created'        => 'Création',
                    'email'          => 'Email',
                    'id'             => 'ID',
                    'last_updated'   => 'Mise à jour',
                    'name'           => 'Nom',
                    'no_deactivated' => "Pas d'utilisateurs désactivés",
                    'no_deleted'     => "Pas d'utilisateurs supprimés",
                    'roles'          => 'Rôles',
                    'total'          => 'utilisateur total|utilisateurs total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Aperçu',
                        'history'  => 'Historique',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmé',
                            'created_at'   => 'Créé le',
                            'deleted_at'   => 'Supprimé le',
                            'email'        => 'E-mail',
                            'last_updated' => 'Mise à jour',
                            'name'         => 'Nom',
                            'status'       => 'Statut',
                        ],
                    ],
                ],

                'view' => 'Voir utilisateur',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Connexion',
            'login_button'       => 'Entrer',
            'login_with'         => 'Se connecter avec :social_media',
            'register_box_title' => "S'enregistrer",
            'register_button'    => 'Créer le compte',
            'remember_me'        => 'Se souvenir de moi',
        ],

        'passwords' => [
            'forgot_password'                 => 'Avez-vous oublié votre mot de passe&nbsp;?',
            'reset_password_box_title'        => 'Réinitialisation du mot de passe',
            'reset_password_button'           => 'Réinitialiser le mot de passe',
            'send_password_reset_link_button' => 'Envoyer le lien de réinitialisation',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Pays Alpha Codes',
                'alpha2'  => 'Pays Alpha 2 Codes',
                'alpha3'  => 'Pays Alpha 3 Codes',
                'numeric' => 'Pays Numéros Codes',
            ],

            'macro_examples' => 'Exemples de macros',

            'state' => [
                'mexico' => 'Mexico State List',
                'us'     => [
                    'us'       => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed'    => 'US Armed Forces',
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
                'avatar'             => 'Avatar',
                'created_at'         => 'Date de création',
                'edit_information'   => 'Éditer les informations',
                'email'              => 'Email',
                'last_updated'       => 'Date de mise à jour',
                'name'               => 'Nom',
                'update_information' => 'Mettre à jour les informations',
            ],
        ],

    ],
];
