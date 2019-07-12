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
                'already_exists' => 'Bu rol hazırda mövcuddur. Xahiş olunur başqa ad seçin.',
                'cant_delete_admin' => 'Admin rolunu silə bilməzsiniz.',
                'create_error' => 'Rolu yaradarkən xəta baş verdi. Yenidən cəhd edin.',
                'delete_error' => 'Rolu silərkən xəta baş verdi. Yenidən cəhd edin.',
                'has_users' => 'İstifadəçiyə təhkim olunmuş useri silə bilməzsiniz.',
                'needs_permission' => 'Bu rol üçün ən az bir məsuliyyət əlavə etməlisiniz.',
                'not_found' => 'Rol mövcud deyil.',
                'update_error' => 'Rolu yeniləyərkən xəta baş verdi. Yenidən cəhd edin.',
            ],

            'users' => [
                'already_confirmed' => 'İstifadəçi artıq təsdiqlənib.',
                'cant_confirm' => 'İstifadəçini təsdiqləyərkən xəta baş verdi.',
                'cant_deactivate_self' => 'Bunu özünüzə edə bilməzsiniz.',
                'cant_delete_admin' => 'Super admini silə bilməzsinz.',
                'cant_delete_self' => 'Özünüzü silə bilməzsiniz.',
                'cant_delete_own_session' => 'Öz sessiyanızı silə bilməzsiniz.',
                'cant_restore' => 'Bu istifadəçi silinməyib onu yenidən yükləyə bilməzsiniz.',
                'cant_unconfirm_admin' => 'Super admini təsdiqlənməmiş vəziyyətə gətirə bilməzsiniz.',
                'cant_unconfirm_self' => 'Özünüzü təsdiqlənməmiş vəziyyətinə gətirə bilməzsiniz.',
                'create_error' => 'İstifadəçini yaradarkən problem baş verdi. Yenidən cəhd edin',
                'delete_error' => 'İstifadəçini silərkən problem baş verdi. Yenidən cəhd edin',
                'delete_first' => 'İstifadəçi davamlı silinməmişdən əvvəl silinməlidir.',
                'email_error' => 'İstifadə etdiyiniz Email başqa istifadəçiyə aiddir.',
                'mark_error' => 'İstifadəçini yeniləyərkən problem baş verdi. Yenidən cəhd edin',
                'not_confirmed' => 'İstifadəçi təsdiqlənmədi.',
                'not_found' => 'İstifadəçi mövcud deyil.',
                'restore_error' => 'İstifadəçini yenidən yükləyərkən problem baş verdi. Yenidən cəhd edin',
                'role_needed_create' => 'Siz ən azı 1 rol seçməlisiniz..',
                'role_needed' => 'Siz ən azı 1 rol seçməlisiniz.',
                'social_delete_error' => 'İstifadəçidən sosial hesabı silərkən problem yarandı',
                'update_error' => 'İstifadəçini yeniləyərkən problem baş verdi. Yenidən cəhd edin',
                'update_password_error' => 'İstifadəçinin şifrəsini yeniləyərkən problem baş verdi. Yenidən cəhd edin',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Hesabınız artıq təsdiqlənib.',
                'confirm' => 'Hesabınızı təsdiqlə!',
                'created_confirm' => 'Hesabınız uğurla yaradıldı. Sizin email adresinizə təsdiqləmə linki göndərdik.',
                'created_pending' => 'Təsdiqləmə linki sizə göndərilib.Hesabınız aktiv olduqda sizə bu barədə email göndəriləcək',
                'mismatch' => 'Şifrələr uyğun deyil.',
                'not_found' => 'Təsdiqləmə kodu movcud deyil.',
                'pending' => 'Sizin hesabınız təsdiqləmə gözləyir.',
                'resend' => 'Hesabınız təsdiqlənməyib. Xahiş olunur göndərilən emaildən təsdiqləmə linkinə klik edin, və ya <a href=":url">klik edərək</a> emaili yenidən göndərin.',
                'success' => 'Hesabınız uğurla təsdiqləndi!',
                'resent' => 'Yeni təsdiqləmə linki emailə uğurla göndərildi.',
            ],

            'deactivated' => 'Hesabınız uğurla deaktivləşdirildi.',
            'email_taken' => 'Email ünvanı başqası tərəfindən istifadə edilir.',

            'password' => [
                'change_mismatch' => 'Köhnə şifrə yanlışdır.',
                'reset_problem' => 'Şifrəni yeniləyərkən problem yaşandı, Xahiş olunur şifrənizi sıfırlamağa yenidən cəhd edin.',
            ],

            'registration_disabled' => 'Qeydiyyat hazırda bağlıdır.',
        ],
    ],
];
