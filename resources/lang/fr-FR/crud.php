<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CRUD Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in CRUD operations throughout the
    | system.
    | Regardless where it is placed, a CRUD label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'actions' => 'Actions',
    'permissions' => [
        'name' => 'Nom',
        'permission' => 'Permission',
        'dependencies' => 'Dépendances',
        'roles' => 'Rôles',
        'system' => 'Système ?',
        'total' => 'permission(s) total',
        'users' => 'Utilisateurs',
        'group' => 'Groupe',
        'group-sort' => 'Trier groupe',
        'groups' => [
            'name' => 'Nom du groupe',
        ],
    ],
    'roles' => [
        'number_of_users' => '# Utilisateurs',
        'permissions' => 'Permissions',
        'role' => 'Rôle',
        'total' => 'rôle(s) total',
        'sort' => 'Trier',
    ],
    'users' => [
        'confirmed' => 'Confirmé',
        'created' => 'Créé',
        'delete_permanently' => 'Supprimé définitivement',
        'email' => 'E-mail',
        'id' => 'ID',
        'last_updated' => 'Dernière mise à jour',
        'name' => 'Nom',
        'no_banned_users' => 'Aucun utilisateur banni',
        'no_deactivated_users' => 'Aucun utilisateur désactivé',
        'no_deleted_users' => 'Aucun utilisateur supprimé',
        'other_permissions' => 'Autres permissions',
        'restore_user' => "Ré-activer l'utilisateur",
        'roles' => 'Rôles',
        'total' => 'utilisateur(s) total',
    ],

    /*
    |--------------------------------------------------------------------------
    | CRUD Language Lines outside view Files
    |--------------------------------------------------------------------------
    |
    | These lines are being marked as obsolete by the localization helper
    | because they will only be found outside view files.
    |
    */
    'activate_user_button' => "Activer l'utilisateur",
    'ban_user_button' => "Bannir l'utilisateur",
    'change_password_button' => "Changer le mot de passe",
    'deactivate_user_button' => "Désactiver l'utilisateur",
    'delete_button' => 'Supprimer',
    'edit_button' => 'Éditer',

];
