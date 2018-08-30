<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Menus Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are used in menu items throughout the system.
      | Regardless where it is placed, a menu item can be listed here so it is easily
      | found in a intuitive way.
      |
      |--------------------------------------------------------------------------
     */

    'backend' => [
        'access' => [
            'title' => 'Gerenciamento de Usuários',
            'roles' => [
                'all'        => 'Todos os Papéis',
                'create'     => 'Criar Papel',
                'edit'       => 'Editar Papel',
                'management' => 'Gerenciamento de Papéis',
                'main'       => 'Papéis',
            ],
            'users' => [
                'all'             => 'Todos os Usuários',
                'change-password' => 'Alterar Senha',
                'create'          => 'Criar Usuário',
                'deactivated'     => 'Usuários Desativados',
                'deleted'         => 'Usuários Excluídos',
                'edit'            => 'Editar Usuário',
                'main'            => 'Usuários',
                'view'            => 'Visualizar Usuário',
            ],
        ],
        'log-viewer' => [
            'main'      => 'Visualizador de Log',
            'dashboard' => 'Painel de Controle',
            'logs'      => 'Logs',
        ],
        'sidebar' => [
            'dashboard' => 'Painel de Controle',
            'general'   => 'Geral',
            'history'   => 'History',
            'system'    => 'Sistema',
        ],
    ],
    'language-picker' => [
        'language' => 'Idioma',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'العربية (Arabic)',
            'zh'    => 'Chinês Simplificado (Chinese Simplified)',
            'zh-TW' => 'Chinês Tradicional (Chinese Traditional)',
            'da'    => 'Dinamarquês (Danish)',
            'de'    => 'Alemão (German)',
            'el'    => 'Grego (Greek)',
            'en'    => 'Inglês (English)',
            'es'    => 'Espanhol (Spanish)',
            'fa'    => 'Persa (Persian)',
            'fr'    => 'Francês (French)',
            'he'    => 'Hebraico (Hebrew)',
            'id'    => 'indonésio (Indonesian)',
            'it'    => 'Italiano (Italian)',
            'ja'    => 'Japonês (Japanese)',
            'nl'    => 'Holandês (Dutch)',
            'no'    => 'Norueguês (Norwegian)',
            'pt_BR' => 'Português do Brasil (Brazilian Portuguese)',
            'ru'    => 'Russo (Russian)',
            'sv'    => 'Sueco (Swedish)',
            'th'    => 'Tailandês (Thai)',
            'tr'    => 'Turco (Turkish)',
        ],
    ],
];
