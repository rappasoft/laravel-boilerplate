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
      |--------------------------------------------------------------------------
     */

    'backend' => [
        'access' => [
            'roles' => [
                'already_exists'    => 'Esse papel já existe. Por favor, escolha um nome diferente.',
                'cant_delete_admin' => 'Você não pode excluir o papel de Administrador.',
                'create_error'      => 'Houve um problema ao criar esse papel. Por favor, tente novamente.',
                'delete_error'      => 'Houve um problema ao excluir esse papel. Por favor, tente novamente.',
                'has_users'         => 'Você não pode excluir um papel com usuários associados..',
                'needs_permission'  => 'Você deve selecionar pelo menos uma permissão para este papel.',
                'not_found'         => 'Este papel não existe.',
                'update_error'      => 'Houve um problema ao atualizar esse papel. Por favor, tente novamente.',
            ],
            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self'  => 'Você não pode fazer isso com você mesmo.',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'Você não pode se excluir.',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore'          => 'This user is not deleted so it can not be restored.',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error'          => 'Houve um problema ao criar esse usuário. Por favor, tente novamente.',
                'delete_error'          => 'Houve um problema ao excluir esse usuário. Por favor, tente novamente.',
                'delete_first'          => 'This user must be deleted first before it can be destroyed permanently.',
                'email_error'           => 'Esse endereço de e-mail pertence a um usuário diferente.',
                'mark_error'            => 'Houve um problema ao atualizar esse usuário. Por favor, tente novamente',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => 'Esse usuário não existe.',
                'restore_error'         => 'Houve um problema ao restaurar esse usuário. Por favor, tente novamente.',
                'role_needed_create'    => 'Você deve escolher pelo menos uma função.',
                'role_needed'           => 'Você deve escolher pelo menos uma função.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'Houve um problema ao atualizar esse usuário. Por favor, tente novamente.',
                'update_password_error' => 'Houve um problema ao alterar a senha do usuário. Por favor, tente novamente.',
            ],
        ],
    ],
    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Sua conta já está confirmada.',
                'confirm'           => 'Confirme sua conta!',
                'created_confirm'   => 'Sua conta foi criada com sucesso. Enviamos um e-mail para você confirmar a sua conta.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'Seu código de confirmação não corresponde.',
                'not_found'         => 'Esse código de confirmação não existe.',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'Sua conta não está confirmada. Por favor, clique no link de confirmação em seu e-mail, ou <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">clique aqui</a> para reenviar o e-mail de confirmação.',
                'success'           => 'Sua conta foi confirmada com sucesso!',
                'resent'            => 'Um novo e-mail de confirmação foi enviado para você.',
            ],
            'deactivated' => 'Sua conta foi desativada.',
            'email_taken' => 'Esse endereço de e-mail já foi utilizado.',
            'password'    => [
                'change_mismatch' => 'Essa não é a sua senha antiga.',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
