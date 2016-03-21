<?php

// No need to repeat the default language file from the initial package, it gets merged with this one. Cool :)

return [

    'access' => [
        'slug'        => 'access',
        'title'       => 'Access control',
        'breadcrumb'  => '<i class="fa fa-lock"></i>',
        'description' => 'Initialize the access control system with default roles and permissions',
        'view'        => [
            'action_summary' => 'The following entries will be created in database',
            'roles'          => 'Roles',
            'groups'         => 'Main permission groups',
            'permissions'    => 'Permissions',
        ],
    ],

    'admin_user' => [
        'slug'        => 'administrator',
        'title'       => 'Administrator',
        'breadcrumb'  => '<i class="fa fa-user-secret"></i>',
        'description' => 'Create the user who will administer the application',
        'view'        => [
            'name'                  => 'Name',
            'email'                 => 'Email',
            'password'              => 'Password',
            'password_confirmation' => 'Confirm password',
            'role'                  => 'Role',
        ],
    ],
];