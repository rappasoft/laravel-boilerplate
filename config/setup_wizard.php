<?php

// No need to repeat the default language file from the initial package, it gets merged with this one. Cool :)

return [
    'steps' => [
        'requirements' => \MarvinLabs\SetupWizard\Steps\RequirementsStep::class,
        'folders'      => \MarvinLabs\SetupWizard\Steps\FoldersStep::class,
        'env'          => \MarvinLabs\SetupWizard\Steps\EnvFileStep::class,
        'database'     => \MarvinLabs\SetupWizard\Steps\DatabaseStep::class,
        'access'       => \App\Setup\Steps\AccessStep::class,
        'admin_user'   => \App\Setup\Steps\AdministratorStep::class,
        'final'        => \MarvinLabs\SetupWizard\Steps\FinalStep::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Access Permissions
    |--------------------------------------------------------------------------
    |
    | Initial set of roles, permissions and permission groups to initialize in
    | database. This is used by the `App\Setup\Steps\AccessStep` class
    |
    */

    'access' => [
        'roles' => [
            'administrator' => [
                'name' => 'Administrator',
                'all'  => true,
            ],
            'user'          => [
                'name' => 'User',
            ],
        ],

        'groups' => [
            'access' => [
                'name'     => 'Access',
                'children' => [
                    'user'       => [
                        'name' => 'User',
                    ],
                    'role'       => [
                        'name' => 'Role',
                    ],
                    'permission' => [
                        'name' => 'Permission',
                    ],
                ],
            ],
        ],

        'permissions' => [

            /**
             * Backend views
             */
            'view-backend'                   => [
                'display_name' => 'View Backend',
                'system'       => true,
                'group'        => 'access',
                'role'         => ['administrator'],
            ],
            'view-access-management'         => [
                'display_name' => 'View Access Management',
                'system'       => true,
                'group'        => 'access',
                'dependency'   => ['view-backend',],
                'role'         => ['administrator'],
            ],

            /**
             * Access Permissions
             */

            /**
             * User
             */
            'create-users'                   => [
                'display_name' => 'Create Users',
                'system'       => true,
                'group'        => 'access.user',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],
            'edit-users'                     => [
                'display_name' => 'Edit Users',
                'system'       => true,
                'group'        => 'access.user',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],
            'delete-users'                   => [
                'display_name' => 'Delete Users',
                'system'       => true,
                'group'        => 'access.user',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],
            'change-user-password'           => [
                'display_name' => 'Change User Password',
                'system'       => true,
                'group'        => 'access.user',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],
            'deactivate-users'               => [
                'display_name' => 'Deactivate Users',
                'system'       => true,
                'group'        => 'access.user',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],
            'reactivate-users'               => [
                'display_name' => 'Re-Activate Users',
                'system'       => true,
                'group'        => 'access.user',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],
            'undelete-users'                 => [
                'display_name' => 'Restore Users',
                'system'       => true,
                'group'        => 'access.user',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],
            'permanently-delete-users'       => [
                'display_name' => 'Permanently Delete Users',
                'system'       => true,
                'group'        => 'access.user',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],
            'resend-user-confirmation-email' => [
                'display_name' => 'Resend Confirmation E-mail',
                'system'       => true,
                'group'        => 'access.user',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            /**
             * Role
             */
            'create-roles'                   => [
                'display_name' => 'Create Roles',
                'system'       => true,
                'group'        => 'access.role',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            'edit-roles' => [
                'display_name' => 'Edit Roles',
                'system'       => true,
                'group'        => 'access.role',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            'delete-roles'             => [
                'display_name' => 'Delete Roles',
                'system'       => true,
                'group'        => 'access.role',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            /**
             * Permission Group
             */
            'create-permission-groups' => [
                'display_name' => 'Create Permission Groups',
                'system'       => true,
                'group'        => 'access.permission',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            'edit-permission-groups' => [
                'display_name' => 'Edit Permission Groups',
                'system'       => true,
                'group'        => 'access.permission',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            'delete-permission-groups' => [
                'display_name' => 'Delete Permission Groups',
                'system'       => true,
                'group'        => 'access.permission',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            'sort-permission-groups' => [
                'display_name' => 'Sort Permission Groups',
                'system'       => true,
                'group'        => 'access.permission',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            /**
             * Permission
             */
            'create-permissions'     => [
                'display_name' => 'Create Permissions',
                'system'       => true,
                'group'        => 'access.permission',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            'edit-permissions' => [
                'display_name' => 'Edit Permissions',
                'system'       => true,
                'group'        => 'access.permission',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],

            'delete-permissions' => [
                'display_name' => 'Delete Permissions',
                'system'       => true,
                'group'        => 'access.permission',
                'dependency'   => ['view-backend', 'view-access-management'],
                'role'         => ['administrator'],
            ],
        ],
    ],
];