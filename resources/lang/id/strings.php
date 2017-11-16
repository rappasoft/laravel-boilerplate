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
                'delete_user_confirm'  => 'Apakah Anda yakin ingin menghapus pengguna ini secara permanen? Di mana saja di aplikasi yang merujuk id pengguna ini kemungkinan besar akan error. Lanjutkan risiko Anda sendiri. Ini tidak dapat dibatalkan.',
                'if_confirmed_off'     => '(Jika konfirmasi dimatikan)',
                'restore_user_confirm' => 'Kembalikan pengguna ini ke keadaan semula?',
            ],
        ],

        'dashboard' => [
            'title'   => 'Dasbor Administrasi',
            'welcome' => 'Selamat Datang',
        ],

        'general' => [
            'all_rights_reserved' => 'Hak Cipta Dilindungi.',
            'are_you_sure'        => 'Anda yakin?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Lanjutjan',
            'member_since'        => 'Anggota sejak',
            'minutes'             => ' menit',
            'search_placeholder'  => 'Cari...',
            'timeout'             => 'Anda secara otomatis log out untuk alasan keamanan karena Anda tidak punya aktivitas dalam ',

            'see_all' => [
                'messages'      => 'Lihat semua pesan',
                'notifications' => 'Lihat semua',
                'tasks'         => 'Lihat semua tugas',
            ],

            'status' => [
                'online'  => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages'      => '{0} Anda tidak memiliki pesan|{1} Anda memiliki 1 pesan|[2,Inf] Anda memiliki :number pesan',
                'notifications' => '{0} Anda tidak memiliki notifikasi|{1} Anda memiliki 1 notifikasi|[2,Inf] Anda memiliki :number notifikasi',
                'tasks'         => '{0} Anda tidak memiliki tugas|{1} Anda memiliki 1 tugas|[2,Inf] Anda memiliki :number tugas',
            ],
        ],

        'search' => [
            'empty'      => 'Harap masukkan kata pencarian.',
            'incomplete' => 'Anda harus menulis logika pencarian Anda sendiri untuk sistem ini.',
            'title'      => 'Hasil Pencarian',
            'results'    => 'Hasil Pencarian untuk :query',
        ],

        'welcome' => '<p>Ini adalah tema CoreUI theme oleh <a href="https://coreui.io/" target="_blank">creativeLabs</a>. Ini adalah versi yang dipreteli dengan hanya gaya dan skrip yang diperlukan untuk membuatnya berjalan. Download versi lengkap untuk mulai menambahkan komponen ke dasbor Anda.</p>
<p>Semua fungsi tersebut adalah untuk menunjukkan dengan pengecualian <strong>Manajemen Pengguna</strong>. boilerplate ini dilengkapi dengan library access control yang berfungsi penuh untuk mengelola pengguna/peran/izin.</p>
<p>Perlu diingat ini adalah sebuah pekerjaan yang sedang berjalan dan mungkin ada bug atau masalah lain yang saya belum temukan. Saya akan melakukan yang terbaik untuk memperbaikinya saat saya menemukannya.</p>
<p>Harap Anda menikmati semua pekerjaan yang saya telah lakukan disini. Silakan kunjungi ke halaman <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a> untuk informasi lebih lanjut dan melaporkan masalah apapun <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">di sini</a>.</p>
<p><strong>Proyek ini sangat menuntut untuk menjaga kelangsungan dengan perubahan yang diberikan branch master Laravel, sehingga bantuan dihargai.</strong></p>
<p>- Anthony Rappa</p>',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Your account has been confirmed.',
            'error'                   => 'Aduh!',
            'greeting'                => 'Halo!',
            'regards'                 => 'Salam,',
            'trouble_clicking_button' => 'Jika Anda mengalami kesulitan mengklik tombol ":action_text", copy dan paste URL di bawah ini ke browser Anda:',
            'thank_you_for_using_app' => 'Terima kasih telah menggunakan aplikasi kami!',

            'password_reset_subject'    => 'Ubah Sandi',
            'password_cause_of_email'   => 'Anda menerima email ini karena kami menerima permintaan reset sandi untuk akun Anda.',
            'password_if_not_requested' => 'Jika Anda tidak meminta reset sandi, tidak ada tindakan lebih lanjut diperlukan.',
            'reset_password'            => 'Klik di sini untuk reset sandi Anda',

            'click_to_confirm' => 'Klik di sini untuk mengkonfirmasi akun Anda:',
        ],

        'contact' => [
            'email_body_title' => 'You have a new contact form request: Below are the details:',
            'subject' => 'A new :app_name contact form submission!',
        ],
    ],

    'frontend' => [
        'test' => 'Tes',

        'tests' => [
            'based_on' => [
                'permission' => 'Berdasarkan Izin - ',
                'role'       => 'Berdasarkan Peran - ',
            ],

            'js_injected_from_controller' => 'Javascript Disuntikkan dari Controller',

            'using_blade_extensions' => 'Gunakan Ekstensi Blade',

            'using_access_helper' => [
                'array_permissions'     => 'Menggunakan Access Helper dengan Array dari Nama Izin atau ID dimana pengguna tidak harus memiliki semua.',
                'array_permissions_not' => 'Menggunakan Access Helper dengan Array dari Nama Izin atau ID dimana pengguna tidak perlu memiliki semua.',
                'array_roles'           => 'Menggunakan Access Helper dengan Array dari Nama Peran atau ID dimana pengguna tidak harus memiliki semua.',
                'array_roles_not'       => 'Menggunakan Access Helper dengan Array dari Nama Peran atau ID dimana pengguna tidak perlu memiliki semua.',
                'permission_id'         => 'Menggunakan Access Helper dengan ID Izin',
                'permission_name'       => 'Menggunakan Access Helper dengan Nama Izin',
                'role_id'               => 'Menggunakan Access Helper dengan ID Peran',
                'role_name'             => 'Menggunakan Access Helper dengan Nama Peran',
            ],

            'view_console_it_works'          => 'Lihat konsol, Anda akan melihat \'it works!\' yang datang dari FrontendController@index',
            'you_can_see_because'            => 'Anda dapat melihat ini karena Anda memiliki peran \':role\'!',
            'you_can_see_because_permission' => 'Anda dapat melihat ini karena Anda memiliki izin \':permission\'!',
        ],

        'general' => [
            'joined'        => 'Joined',
        ],

        'user' => [
            'change_email_notice' => 'If you change your e-mail you will be logged out until you confirm your new e-mail address.',
            'email_changed_notice' => 'You must confirm your new e-mail address before you can log in again.',
            'profile_updated'  => 'Profil berhasil diperbarui.',
            'password_updated' => 'Sandi berhasil diperbarui.',
        ],

        'welcome_to' => 'Selamat Datang di :place',
    ],
];
