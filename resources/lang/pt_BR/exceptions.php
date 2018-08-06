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
                'has_users'         => 'Você não pode excluir um papel com usuários associados.',
                'needs_permission'  => 'Você deve selecionar pelo menos uma permissão para este papel.',
                'not_found'         => 'Este papel não existe.',
                'update_error'      => 'Houve um problema ao atualizar esse papel. Por favor, tente novamente.',
            ],
            'users' => [
                'already_confirmed'     => 'Este usuário já está confirmado.',
                'cant_confirm'          => 'Ocorreu um problema ao confirmar este usuário.',
                'cant_deactivate_self'  => 'Você não pode fazer isso com você mesmo.',
                'cant_delete_admin'     => 'Você não pode excluir um super administrador.',
                'cant_delete_self'      => 'Você não pode se excluir.',
                'cant_delete_own_session' => 'Você não pode deletar sua própria sessão.',
                'cant_restore'          => 'Este usuário não encontra-se excluído. Não foi possível restaurá-lo.',
                'cant_unconfirm_admin'  => 'Você não pode des-confirmar o super administrador.',
                'cant_unconfirm_self'   => 'Você não pode des-confirmar a si mesmo.',
                'create_error'          => 'Houve um problema ao criar esse usuário. Por favor, tente novamente.',
                'delete_error'          => 'Houve um problema ao excluir esse usuário. Por favor, tente novamente.',
                'delete_first'          => 'Este usuário precisa primeiro ser excluído para poder ser apagado permanentemente.',
                'email_error'           => 'Esse endereço de e-mail pertence a um usuário diferente.',
                'mark_error'            => 'Houve um problema ao atualizar esse usuário. Por favor, tente novamente',
                'not_confirmed'         => 'Este usuário não está confirmado.',
                'not_found'             => 'Esse usuário não existe.',
                'restore_error'         => 'Houve um problema ao restaurar esse usuário. Por favor, tente novamente.',
                'role_needed_create'    => 'Você deve escolher pelo menos uma função.',
                'role_needed'           => 'Você deve escolher pelo menos uma função.',
                'session_wrong_driver'  => 'Você deve configurar seu Session Driver para Database para usar esta função.',
                'social_delete_error'   => 'Houve um problema ao tentar remover a mídia social do usuário.',
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
                'created_pending'   => 'Sua conta foi criada com sucesso e aguarda aprovação. Enviaremos um e-mail para você assim que sua conta for aprovada.',
                'mismatch'          => 'Seu código de confirmação não corresponde.',
                'not_found'         => 'Esse código de confirmação não existe.',
                'pending'           => 'Sua conta aguarda aprovação para ser ativada.',
                'resend'            => 'Sua conta não está confirmada. Por favor, clique no link de confirmação em seu e-mail, ou <a href=":url">clique aqui</a> para reenviar o e-mail de confirmação.',
                'success'           => 'Sua conta foi confirmada com sucesso!',
                'resent'            => 'Um novo e-mail de confirmação foi enviado para você.',
            ],
            'deactivated' => 'Sua conta foi desativada.',
            'email_taken' => 'Esse endereço de e-mail já foi utilizado.',
            'password'    => [
                'change_mismatch' => 'Essa não é a sua senha antiga.',
                'reset_problem' => 'Houve um problema ao redefinir sua senha. Por favor, reinicie o processo de re-definição de senha.',
            ],
            'registration_disabled' => 'Registro de novas contas está atualmente bloqueado.',
        ],
    ],
];
