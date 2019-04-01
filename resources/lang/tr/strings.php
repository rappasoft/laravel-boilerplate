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
                'delete_user_confirm' => 'Bu kullanıcıyı kalıcı olarak silmek istediğinize emin misiniz? Bu kullanıcı IDsini referans alan yerlerde hata oluşma ihtimali vardır. Sonuçlar kendi sorumluluğunuzdadır. İşlem geri alınamaz.',
                'if_confirmed_off' => '(Onay kapalıysa)',
                'restore_user_confirm' => 'Bu kullanıcı orijinal durumuna geri yüklensin mi?',
            ],
        ],

        'dashboard' => [
            'title' => 'Yönetim Panosu',
            'welcome' => 'Hoşgeldiniz',
        ],

        'general' => [
            'all_rights_reserved' => 'Tüm Hakları Saklıdır.',
            'are_you_sure' => 'Bunu yapmak istediğinize emin misiniz?',
            'boilerplate_link' => 'Laravel Boilerplate',
            'continue' => 'Devam et',
            'member_since' => 'Üyelik zamanı',
            'minutes' => ' dakika',
            'search_placeholder' => 'Ara...',
            'timeout' => 'Etkinliğiniz olmadığı için güvenlik nedeniyle oturumunuz belirtilen sürede kapandı ',

            'see_all' => [
                'messages' => 'Tüm mesajları görüntüle',
                'notifications' => 'Tümünü görüntüle',
                'tasks' => 'Tüm görevleri görüntüle',
            ],

            'status' => [
                'online' => 'Çevrimiçi',
                'offline' => 'Çevrimdışı',
            ],

            'you_have' => [
                'messages' => '{0} Mesajınız yok|{1} Mesajınız var|[2,Inf] :number mesajınız var',
                'notifications' => '{0} Bildirim yok|{1} 1 Bildirim var|[2,Inf] :number Bildirim var',
                'tasks' => '{0} Göreviniz yok|{1} 1 Görev var|[2,Inf] :number görev var',
            ],
        ],

        'search' => [
            'empty' => 'Lütfen arama kelimesi girin.',
            'incomplete' => 'Arama mantığı yazılıyor.',
            'title' => 'Arama Sonuçları',
            'results' => 'Sorgu için arama sonuçları: :query',
        ],

        'welcome' => 'Welcome to the Dashboard',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Your account has been confirmed.',
            'error' => 'HATA!',
            'greeting' => 'Merhaba!',
            'regards' => 'Saygılarımızla,',
            'trouble_clicking_button' => '":action_text" düğmesini tıklamakta zorlanıyorsanız, aşağıdaki URL\'yi kopyalayıp web tarayıcınıza yapıştırın:',
            'thank_you_for_using_app' => 'Uygulamamızı kullandığınız için teşekkürler!',

            'password_reset_subject' => 'Parolayı Sıfırla',
            'password_cause_of_email' => 'Bu e-postayı, hesabınız için bir şifre sıfırlama isteği aldığımız için aldınız.',
            'password_if_not_requested' => 'Şifre sıfırlamasını istemediyseniz, başka işlem yapmanız gerekmez.',
            'reset_password' => 'Şifrenizi sıfırlamak için buraya tıklayın',

            'click_to_confirm' => 'Hesabınızı onaylamak için burayı tıklayın:',
        ],

        'contact' => [
            'email_body_title' => 'You have a new contact form request: Below are the details:',
            'subject' => 'A new :app_name contact form submission!',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Yetki esasına dayalı - ',
                'role' => 'Role dayalı - ',
            ],

            'js_injected_from_controller' => 'Bir denetleyiciden enjekte edilen Javascript',

            'using_blade_extensions' => 'Blade uzantıları kullan',

            'using_access_helper' => [
                'array_permissions' => 'Erişim Yardımcısı, kullanıcının tamamına sahip olması gereken Yetki İsmi veya ID\'si Dizileri ile kullanılıyor',
                'array_permissions_not' => 'Erişim Yardımcısı, kullanıcının tamamına sahip olması GEREKMEYEN Yetki İsmi veya ID\'si Dizileri ile kullanılıyor',
                'array_roles' => 'Erişim Yardımcısı, kullanıcının tamamına sahip olması gereken ROL İsmi veya ID\'si Dizileri ile kullanılıyor',
                'array_roles_not' => 'Erişim Yardımcısı, kullanıcının tamamına sahip olması GEREKMEYEN Yetki İsmi veya ID\'si Dizileri ile kullanılıyor',
                'permission_id' => 'Erişim Yardımcısı, Yetki ID\'si ile kullanılıyor',
                'permission_name' => 'Erişim Yardımcısı, Yetki İsmi ile kullanılıyor',
                'role_id' => 'Erişim Yardımcısı, ROL ID\'si ile kullanılıyor',
                'role_name' => 'Erişim Yardımcısı, ROL İsmi ile kullanılıyor',
            ],

            'view_console_it_works' => 'Konsolu görüntüleyin, \'it works!\' ibaresini FrontendController@index den geldiği için görebilirsiniz.',
            'you_can_see_because' => '\':role\' rolüne sahip olduğunuz için bunu görüntülemektesiniz!',
            'you_can_see_because_permission' => '\':permission\' yetkisine sahip olduğunuz için bunu görüntülemektesiniz!',
        ],

        'general' => [
            'joined' => 'Joined',
        ],

        'user' => [
            'change_email_notice' => 'E-postanızı değiştirirseniz, yeni e-posta adresinizi teyit edene kadar oturumunuz kapatılır.',
            'email_changed_notice' => 'Tekrar tekrar oturum açabilmeniz için yeni e-posta adresinizi onaylamanız gerekir.',
            'profile_updated' => 'Profil başarıyla güncellendi.',
            'password_updated' => 'Şifre başarıyla güncellendi.',
        ],

        'welcome_to' => ':place \'e Hoşgeldiniz',
    ],
];
