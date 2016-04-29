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
        'all' => 'Todos',
        'yes' => 'Sí',
        'no' => 'No',
        'custom' => 'Personalizado',
        'actions' => 'Acciónes',
        'buttons' => [
            'save' => 'Guardar',
            'update' => 'Actualizar',
        ],
        'hide' => 'Ocultar',
        'none' => 'Ningúno',
        'show' => 'Mostrar',
        'toggle_navigation' => 'Abrir/Cerrar menú de navegación',
    ],

    'backend' => [
        'access' => [
            'permissions' => [
                'create' => 'Crear Permiso',
                'dependencies' => 'Dependencias',
                'edit' => 'Modificar Permiso',

                'groups' => [
                    'create' => 'Crear Grupo',
                    'edit' => 'Modificar Grupo',

                    'table' => [
                        'name' => 'Nombre',
                    ],
                ],

                'grouped_permissions' => 'Permisos agrupados',
                'label' => 'Permisos',
                'management' => 'Administración de Permisos',
                'no_groups' => 'No hay Permisos en el Grupo.',
                'no_permissions' => 'No hay Permisos disponibles.',
                'no_roles' => 'No hay Roles disponibles.',
                'no_ungrouped' => 'Actualmente no hay Permisos desagrupados.',

                'table' => [
                    'dependencies' => 'Dependencias',
                    'group' => 'Grupo',
                    'group-sort' => 'Orden del Grupo',
                    'name' => 'Nombre',
                    'permission' => 'Permisos',
                    'roles' => 'Roles',
                    'system' => 'Sistema',
                    'total' => 'Todos los Permisos',
                    'users' => 'Usuarios',
                ],

                'tabs' => [
                    'general' => 'General',
                    'groups' => 'Todos los Grupos',
                    'dependencies' => 'Dependencias',
                    'permissions' => 'Todos los Permisos',
                ],

                'ungrouped_permissions' => 'Permisos desagrupados',
            ],

            'roles' => [
                'create' => 'Crear Rol',
                'edit' => 'Modificar Rol',
                'management' => 'Administración de Roles',

                'table' => [
                    'number_of_users' => 'Número de Usuarios',
                    'permissions' => 'Permisos',
                    'role' => 'Rol',
                    'sort' => 'Orden',
                    'total' => 'Todos los Roles',
                ],
            ],

            'users' => [
                'active' => 'Usuarios activos',
                'all_permissions' => 'Todos los Permisos',
                'change_password' => 'Cambiar la contraseña',
                'change_password_for' => 'Cambiar la contraseña para :user',
                'create' => 'Crear Usuario',
                'deactivated' => 'Usuarios desactivados',
                'deleted' => 'Usuarios eliminados',
                'dependencies' => 'Dependencias',
                'edit' => 'Modificar Usuario',
                'management' => 'Administración de Usuarios',
                'no_other_permissions' => 'Sin otros Permisos',
                'no_permissions' => 'Sin Permisos',
                'no_roles' => 'No hay Roles disponibles.',
                'permissions' => 'Permisos',
                'permission_check' => 'Activando un permiso con dependencias, las mismas se activarán también.',

                'table' => [
                    'confirmed' => 'Confirmado',
                    'created' => 'Creado',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Ultima modificación',
                    'name' => 'Nombre',
                    'no_deactivated' => 'Ningún Usuario desactivado disponible',
                    'no_deleted' => 'Ningún Usuario eliminado disponible',
                    'other_permissions' => 'Otros Permisos',
                    'roles' => 'Roles',
                    'total' => 'Todos los Usuarios',
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Iniciar Sesión',
            'login_button' => 'Iniciar Sesión',
            'login_with' => 'Iniciar Sesión mediante :social_media',
            'register_box_title' => 'Registrarse',
            'register_button' => 'Registrarse',
            'remember_me' => 'Recordarme',
        ],

        'passwords' => [
            'forgot_password' => 'Se ha olvidado la contraseña?',
            'reset_password_box_title' => 'Reiniciar contraseña',
            'reset_password_button' => 'Reiniciar contraseña',
            'send_password_reset_link_button' => 'Enviar el e-mail de verificación',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Código Alfa de País',
                'alpha2' => 'Código Alfa 2 de País',
                'alpha3' => 'Código Alfa 3 de País',
                'numeric' => 'Código Numérico de País',
            ],

            'macro_examples' => 'Ejemplos de Macro',

            'state' => [
                'mexico' => 'Listado de Estados de México',
                'us' => [
                    'us' => 'Estados Unidos',
                    'outlying' => 'Territorios Periféricos de Estados Unidos',
                    'armed' => 'Fuerzas Armadas de Estados Unidos',
                ],
            ],

            'territories' => [
                'canada' => 'Listado de Provincias y Territorios de Canada',
            ],

            'timezone' => 'Zonas horarias',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Cambiar la contraseña',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Creado el',
                'edit_information' => 'Modificar la información',
                'email' => 'E-mail',
                'last_updated' => 'Ultima modificación',
                'name' => 'Nombre',
                'update_information' => 'Actualizar la información',
            ],
        ],

    ],
];
