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
                'delete_user_confirm' => '¿Está seguro de querer eliminar este Usuario de forma permanente? Esto puede producir un error grave en aquellas partes de la aplicación que hagan referencia al mismo. Proceda con cautela. Esta operación no puede deshacerse.',
                'if_confirmed_off' => '(Si la confirmación está desactivada)',
                'no_deactivated' => 'No hay usuarios desactivados.',
                'no_deleted' => 'No hay usuarios eliminados.',
                'restore_user_confirm' => '¿Restaurar este Usuario a su estado original?',
            ],
        ],

        'dashboard' => [
            'title' => 'Panel de Administración',
            'welcome' => 'Bienvenido',
        ],

        'general' => [
            'all_rights_reserved' => 'Todos los derechos reservados.',
            'are_you_sure' => '¿Está seguro?',
            'boilerplate_link' => 'Laravel 5 Boilerplate',
            'continue' => 'Continuar',
            'member_since' => 'Miembro desde',
            'minutes' => ' minutos',
            'search_placeholder' => 'Buscar...',
            'timeout' => 'Usted ha sido automaticamente desconectado por razones de seguridad ya que no tuvo actividad en ',

            'see_all' => [
                'messages' => 'Ver todos los mensajes',
                'notifications' => 'Ver todo',
                'tasks' => 'Ver todas las tareas',
            ],

            'status' => [
                'online' => 'Conectado',
                'offline' => 'Desconectado',
            ],

            'you_have' => [
                'messages' => '{0} No tiene nuevos mensajes|{1} Tiene un nuevo mensaje|[2,Inf] Tiene :number nuevos mensajes ',
                'notifications' => '{0} No tiene nuevas notificaciones|{1} Tiene una nueva notificación|[2,Inf] Tiene :number nuevas notificaciones',
                'tasks' => '{0} No tiene nuevas tareas|{1} Tiene 1 nueva tarea|[2,Inf] Tiene :number nuevas tareas',
            ],
        ],

        'search' => [
            'empty' => 'Por favor, escriba un término de búsqueda.',
            'incomplete' => 'Debe escribir su propia lógica de búsqueda para este sistema.',
            'title' => 'Resultados de la búsqueda',
            'results' => 'Resultados de la búsqueda para :query',
        ],

        'welcome' => 'Bienenvidos al Panel de Control',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Su cuenta ha sido confirmada.',
            'error' => '¡Ups!',
            'greeting' => '¡Hola!',
            'regards' => 'Saludos,',
            'trouble_clicking_button' => 'Si tiene problemas haciendo clic en el botón ":action_text", copie y pegue el enlace en su navegador:',
            'thank_you_for_using_app' => '¡Gracias por utilizar nuestra aplicación!',

            'password_reset_subject' => 'Su enlace de reinicio de contraseña',
            'password_cause_of_email' => 'Ha recibido este correo porque hemos recibido una solicitud de reinicio de contraseña para su cuenta.',
            'password_if_not_requested' => 'Si usted no hizo la solicitud, no haga nada.',
            'reset_password' => 'Pulse aquí para reiniciar su contraseña',

            'click_to_confirm' => 'Pulse aquí para verificar su cuenta:',
        ],

        'contact' => [
            'email_body_title' => 'Tiene una nueva solicitud del formulario de contacto. A continuación los detalles:',
            'subject' => '¡Nueva solicitud del formulario de contacto :app_name!',
        ],
    ],

    'frontend' => [
        'test' => 'Prueba',

        'tests' => [
            'based_on' => [
                'permission' => 'Basado en el Permiso - ',
                'role' => 'Basado en el Rol - ',
            ],

            'js_injected_from_controller' => 'Javascript inyectado desde el Controlador',

            'using_blade_extensions' => 'Usando las extensiones de Blade',

            'using_access_helper' => [
                'array_permissions' => 'Uso de Access Helper con lista de nombres de Permisos o ID\'s donde el usuario tiene que tenerlos todos.',
                'array_permissions_not' => 'Uso de Access Helper con lista de nombres de Permisos o ID\'s donde el usuario no tiene por que tenerlos todos.',
                'array_roles' => 'Uso de Access Helper con lista de nombres de Roles o ID\'s donde el usuario tiene que tenerlos todos.',
                'array_roles_not' => 'Uso de Access Helper con lista de nombres de Roles o ID\'s donde el usuario no tiene que tenerlos todos.',
                'permission_id' => 'Uso de Access Helper mediante ID de Permiso',
                'permission_name' => 'Uso de Access Helper mediante nombre de Permiso',
                'role_id' => 'Uso de Access Helper mediante ID de Rol',
                'role_name' => 'Uso de Access Helper mediante nombre de Rol',
            ],

            'view_console_it_works' => 'Mire la consola del navegador, deberia ver \'Funciona!!\' que tiene su origen en FrontendController@index',
            'you_can_see_because' => 'Puede ver esto porque dispone del Rol \':role\'!',
            'you_can_see_because_permission' => 'Puede ver esto porque dispone del Permiso \':permission\'!',
        ],

        'general' => [
            'joined' => 'Afiliado',
        ],

        'user' => [
            'change_email_notice' => 'Si cambia su correo electrónico, se cerrará la sesión hasta que confirme su nueva dirección de correo electrónico.',
            'email_changed_notice' => 'Debe confirmar su nueva dirección de correo electrónico antes de poder iniciar sesión de nuevo.',
            'profile_updated' => 'Perfil actualizado correctamente.',
            'password_updated' => 'Contraseña actualizada correctamente.',
        ],

        'welcome_to' => 'Bienvenido a :place',
    ],
];
