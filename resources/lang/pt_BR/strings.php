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
      |--------------------------------------------------------------------------
     */

    'backend' => [
        'access' => [
            'users' => [
                'delete_user_confirm'  => 'Tem certeza de que deseja excluir este usuário permanentemente? Em algum lugar do aplicativo pode fazer referência ao id deste usuário e possivelmente pode ocasionar um erro. Prossiga por sua conta e risco. Isso não pode ser desfeito.',
                'if_confirmed_off'     => '(Se confirmado estiver desligado)',
                'restore_user_confirm' => 'Restaurar esse usuário ao seu estado original?',
            ],
        ],
        'dashboard' => [
            'title'   => 'Painel de Controle Administrativo',
            'welcome' => 'Bem-vindo',
        ],
        'general' => [
            'all_rights_reserved' => 'Todos os direitos reservados.',
            'are_you_sure'        => 'Tem certeza?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Continuar',
            'member_since'        => 'Membro desde',
            'minutes'             => ' minutos',
            'search_placeholder'  => 'Buscar...',
            'timeout'             => 'Você foi automaticamente desconectado por questão de segurança já que você estava inativo por ',
            'see_all'             => [
                'messages'      => 'Ver todas as mensagens',
                'notifications' => 'Ver todas as notificações',
                'tasks'         => 'Ver todas as tarefas',
            ],
            'status' => [
                'online'  => 'Online',
                'offline' => 'Offline',
            ],
            'you_have' => [
                'messages'      => '{0} Você não tem mensagens|{1} Você tem 1 mensagem|[2,Inf] Você tem :number mensagens',
                'notifications' => '{0} Você não tem notificações|{1} Você tem 1 notificação|[2,Inf] Você tem :number notificações',
                'tasks'         => '{0} Você não tem tarefas|{1} Você tem 1 tarefa|[2,Inf] Você tem :number tarefas',
            ],
        ],
        'search' => [
            'empty'      => 'Por favor, digite um termo de busca.',
            'incomplete' => 'Você deve escrever sua própria lógica de busca para este sistema.',
            'title'      => 'Resultados da busca',
            'results'    => 'Resultados da busca por :query',
        ],

        'welcome' => '<p>Este é o tema AdminLTE por <a href="https://almsaeedstudio.com/" target="_blank">https://almsaeedstudio.com/</a>. Esta é uma versão reduzida com apenas os estilos e scripts necessários para que o tema funcione. Baixe a versão completa para começar a adicionar componentes a seu painel de controle.</p>
<p>Todas as funcionalidades são meramente demonstrativas com exceção do menu <strong>Gerenciamento de Usuários</strong> à esquerda. Este <i>boilerplate</i> vem com uma biblioteca totalmente funcional de controle de acesso para gerenciar usuários/papéis/permissões.</p>
<p>Tenha em mente que este é um trabalho em andamento e podem existir <i>bugs</i> ou outros problemas pelos quais não passei. Farei o meu melhor para corrigí-los à medida em que os recebo.</p>
<p>Espero que você aproveite todo o trabalho que coloquei nisto. Por favor, visite a página do <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a> para maiores informações e reporte quaisquer <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">problemas aqui</a>.</p>
<p><strong>Este projeto tem alta demanda de atualizações, dada a taxa de novas versões que a master do Laravel vem lançando, então toda ajuda é bem-vinda :).</strong></p>
<p>- Anthony Rappa</p>',
    ],
    'emails' => [
        'auth' => [
            'account_confirmed' => 'Sua conta foi confirmada.',
            'error'                     => 'Oops!',
            'greeting'                  => 'Olá!',
            'regards'                   => 'Nossos cumprimentos,',
            'trouble_clicking_button'   => 'Se você está com problemas para clicar no botão ":action_text", copie e cole a URL abaixo no seu navegador:',
            'thank_you_for_using_app'   => 'Obrigado por utilizar o nosso sistema!',
            'password_reset_subject'    => 'Seu link para redefinição de senha',
            'password_cause_of_email'   => 'Você recebeu este email porque nós recebemos uma solicitação de redefinição de senha para a sua conta.',
            'password_if_not_requested' => 'Se você não solicitou uma redefinição de senha, nenhuma outra ação é necessária.',
            'reset_password'            => 'Clique aqui para redefinir sua senha',
            'click_to_confirm'          => 'Clique aqui para confirmar a sua conta:',
        ],

        'contact' => [
            'email_body_title' => 'Você tem um novo contato. Seguem detalhes:',
            'subject' => 'Um novo contato de :app_name!',
        ],
    ],
    'frontend' => [
        'test'  => 'Teste',
        'tests' => [
            'based_on' => [
                'permission' => 'Baseado na Permissão do Usuário - ',
                'role'       => 'Baseado no Papel do Usuário - ',
            ],
            'js_injected_from_controller' => 'Javascript Injetado de um Controller',
            'using_blade_extensions'      => 'Usando as Extensões Blade',
            'using_access_helper'         => [
                'array_permissions'     => 'Usando o "Access Helper" com um Array de Nomes de Permissões ou ID\'s onde o usuário precisa satisfazer ambas as condições.',
                'array_permissions_not' => 'Usando o "Access Helper" com um Array de Nomes de Permissões ou ID\'s onde o usuário não precisa satisfazer ambas as condições.',
                'array_roles'           => 'Usando o "Access Helper" com um Array de Nomes de Papéis ou ID\'s onde o usuário precisa satisfazer ambas as condições.',
                'array_roles_not'       => 'Usando o "Access Helper" com um Array de Nomes de Papéis ou ID\'s onde o usuário não precisa satisfazer ambas as condições.',
                'permission_id'         => 'Usando o "Access Helper" com o ID da Permissão',
                'permission_name'       => 'Usando o "Access Helper" com o Nome da Permissão',
                'role_id'               => 'Usando o "Access Helper" com o ID do Papel',
                'role_name'             => 'Usando o "Access Helper" com o Nome do Papel',
            ],
            'view_console_it_works'          => 'Veja o console, você deverá ver a mensagem \'it works!\' que está vindo de FrontendController@index',
            'you_can_see_because'            => 'Você pode ver isto porque você tem o papel de \':role\'!',
            'you_can_see_because_permission' => 'Você pode ver isto porque você tem a permissão de \':permission\'!',
        ],

        'general' => [
            'joined'        => 'Entrou',
        ],

        'user' => [
            'change_email_notice' => 'Se você alterar seu e-mail, você será deslogado até que confirme seu novo e-mail.',
            'email_changed_notice' => 'Você deve confirmar seu novo e-mail antes de fazer login novamente.',
            'profile_updated'  => 'Perfil atualizado com sucesso.',
            'password_updated' => 'Senha atualizada com sucesso.',
        ],
        'welcome_to' => 'Bem-vindo a :place',
    ],
];
