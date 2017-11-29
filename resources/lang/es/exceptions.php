<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'roles' => [
                'already_exists'    => 'Este Rol ya existe. Por favor, especifique un nombre de Rol diferente.',
                'cant_delete_admin' => 'No puede eliminar el Rol de Administrador.',
                'create_error'      => 'Hubo un problema al crear el Rol. Intentelo de nuevo.',
                'delete_error'      => 'Hubo un problema al eliminar el Rol. Intentelo de nuevo.',
                'has_users'         => 'No puede eliminar un Rol que tenga usuarios asignados.',
                'needs_permission'  => 'Debe seleccionar al menos un permiso para cada Rol.',
                'not_found'         => 'El Rol requerido no existe.',
                'update_error'      => 'Hubo un problema al modificar el Rol. Intentelo de nuevo.',
            ],

            'users' => [
                'already_confirmed'    => 'Este usuario ya fue confirmado',
                'cant_confirm' => 'Hubo un problema al confirmar la cuenta de usuario.',
                'cant_deactivate_self'  => 'No puede desactivarse a sí mismo.',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'No puede eliminarse usted mismo.',
                'cant_delete_own_session' => 'No puedes borrar tu propia sesión.',
                'cant_restore'          => 'Este usuario no fue eliminado, por lo que no se puede restaurar.',
                'cant_unconfirm_admin' => 'No puede anular la confirmación del superadministrador.',
                'cant_unconfirm_self' => 'No puedes anular tu propia confirmación.',
                'create_error'          => 'Hubo un problema al crear el Usuario. Intentelo de nuevo.',
                'delete_error'          => 'Hubo un problema al eliminar el Usuario. Intentelo de nuevo.',
                'delete_first'          => 'Este usuario debe ser eliminado primero antes de que pueda ser destruido permanentemente.',
                'email_error'           => 'Ya hay un Usuario con la dirección de E-Mail especificada.',
                'mark_error'            => 'Hubo un problema al modificar el Usuario. Intentelo de nuevo.',
                'not_confirmed'            => 'Este usuario no está confirmado.',
                'not_found'             => 'El Usuario requerido no existe.',
                'restore_error'         => 'Hubo un problema al restaurar el Usuario. Intentelo de nuevo.',
                'role_needed_create'    => 'Los Usuarios deben tener al menos un Rol.',
                'role_needed'           => 'Debes elegir al menos un Rol.',
                'session_wrong_driver'  => 'Su controlador de sesión debe configurarse en la base de datos para usar esta característica.',
                'social_delete_error' => 'Hubo un problema al eliminar la cuenta social del usuario.',
                'update_error'          => 'Hubo un problema al modificar el Usuario. Intentelo de nuevo.',
                'update_password_error' => 'Hubo un problema al cambiar la contraseña. Intentelo de nuevo.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Su cuenta ya ha sido verificada.',
                'confirm'           => 'Revise su correo y verifique su cuenta!',
                'created_confirm'   => 'Su cuenta ha sido creada. Le hemos enviado un e-mail con un enlace de verificación.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'El código de verificación no coincide.',
                'not_found'         => 'El código de verificación especificado no existe.',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'Su cuenta no ha sido verificada todavía. Por favor, revise su e-mail, o <a href="'.route('frontend.auth.account.confirm.resend', ':user_uuid').'">pulse aquí</a> para re-enviar el correo de verificación.',
                'success'           => 'Su cuenta ha sido verificada satisfactoriamente!',
                'resent'            => 'Un nuevo correo de verificación le ha sido enviado.',
            ],

            'deactivated' => 'Su cuenta ha sido desactivada.',
            'email_taken' => 'El correo especificado ya está registrado.',

            'password' => [
                'change_mismatch' => 'La contraseña antigua no coincide.',
                'reset_problem' => 'Hubo un problema al restablecer su contraseña. Por favor, vuelva a enviar el correo electrónico de restablecimiento de contraseña',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
