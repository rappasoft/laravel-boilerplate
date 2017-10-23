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
      |--------------------------------------------------------------------------
     */

    'general' => [
        'all'     => 'Todos',
        'yes'     => 'Sim',
        'no'      => 'Não',
        'custom'  => 'Personalizado',
        'actions' => 'Ações',
        'active'  => 'Ativo',
        'buttons' => [
            'save'   => 'Salvar',
            'update' => 'Atualizar',
        ],
        'hide'              => 'Esconder',
        'inactive'          => 'Inativo',
        'none'              => 'Nenhum',
        'show'              => 'Mostrar',
        'toggle_navigation' => 'Mostrar / Esconder Navegação',
    ],
    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Criar Papel',
                'edit'       => 'Criar Papel',
                'management' => 'Gerenciamento de Papéis',
                'table'      => [
                    'number_of_users' => 'Número de Usuários',
                    'permissions'     => 'Permissões',
                    'role'            => 'Papel',
                    'sort'            => 'Ordenar',
                    'total'           => 'total de permissao|total de permissões',
                ],
            ],
            'users' => [
                'active'              => 'Ativar Usuários',
                'all_permissions'     => 'Todas as Permissões',
                'change_password'     => 'Alterar Senha',
                'change_password_for' => 'Alterar senha para :user',
                'create'              => 'Criar Usuário',
                'deactivated'         => 'Desativar Usuários',
                'deleted'             => 'Excluir Usuários',
                'edit'                => 'Editar Usuário',
                'management'          => 'Gerenciamento Usuários',
                'no_permissions'      => 'Sem permissões',
                'no_roles'            => 'Sem papéis para definir.',
                'permissions'         => 'Permissões',
                'table'               => [
                    'confirmed'      => 'Confirmado',
                    'created'        => 'Criado',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Última atualização',
                    'name'           => 'Nome',
                    'no_deactivated' => 'Nenhum usuário desativado.',
                    'no_deleted'     => 'Nenhum usuário excluído',
                    'roles'          => 'Papéis',
                    'social' => 'Social',
                    'total'          => 'total de usuário|total de usuários',
                ],
                'tabs' => [
                    'titles' => [
                        'overview' => 'Visão Geral',
                        'history'  => 'Histórico',
                    ],
                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmado',
                            'created_at'   => 'Criado em',
                            'deleted_at'   => 'Apagado em',
                            'email'        => 'E-mail',
                            'last_updated' => 'Última atualização',
                            'name'         => 'Nome',
                            'status'       => 'Estado',
                        ],
                    ],
                ],
                'view' => 'Visualizar Usuário',
            ],
        ],
    ],
    'frontend' => [
        'auth' => [
            'login_box_title'    => 'Entrar',
            'login_button'       => 'Entrar',
            'login_with'         => 'Entrar com :social_media',
            'register_box_title' => 'Registrar',
            'register_button'    => 'Registrar',
            'remember_me'        => 'Lembrar-me',
        ],

        'contact' => [
            'box_title' => 'Contato',
            'button' => 'Enviar',
        ],

        'passwords' => [
            'forgot_password'                 => 'Esqueceu Sua Senha?',
            'reset_password_box_title'        => 'Resetar Senha',
            'reset_password_button'           => 'Resetar Senha',
            'send_password_reset_link_button' => 'Enviar link para redefinição de senha',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Códigos de País Alpha',
                'alpha2'  => 'Códigos de País Alpha 2',
                'alpha3'  => 'Códigos de País Alpha 3',
                'numeric' => 'Códigos Numéricos País',
            ],
            'macro_examples' => 'Exemplo de Macros',
            'state'          => [
                'mexico' => 'Lista de Estados do México',
                'us'     => [
                    'us'       => 'Lista de estados dos EUA',
                    'outlying' => 'Territórios Distantes EUA',
                    'armed'    => 'Forças Armadas dos EUA',
                ],
            ],
            'territories' => [
                'canada' => 'Província do Canadá e Lista de Territórios',
            ],
            'timezone' => 'Fuso horário',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Alterar Senha',
            ],
            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Criado em',
                'edit_information'   => 'Editar informações',
                'email'              => 'E-mail',
                'last_updated'       => 'Última atualização',
                'name'               => 'Nome',
                'update_information' => 'Atualizar informação',
            ],
        ],
    ],
];
