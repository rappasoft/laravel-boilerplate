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
                'already_exists'    => 'Nhóm quyền đã tồn tại. Vui lòng chọn một tên khác.',
                'cant_delete_admin' => 'Bạn không thể xóa quyền quản trị.',
                'create_error'      => 'Đã xảy ra sự cố trong quá trình thêm mới nhóm quyền. Vui lòng thử lại.',
                'delete_error'      => 'Đã xảy ra sự cố trong quá trình xóa nhóm quyền. Vui lòng thử lại.',
                'has_users'         => 'Bạn không thể xóa nhóm quyền còn thành viên liên kết.',
                'needs_permission'  => 'Vui lòng chọn ít nhất một quyền cho nhóm quyền này.',
                'not_found'         => 'Không tìm thấy nhóm quyền.',
                'update_error'      => 'Đã xảy ra sự cố khi cập nhật nhóm quyền này. Vui lòng thử lại.',
            ],

            'users' => [
                'already_confirmed'    => 'Thành viên đã được xác thực.',
                'cant_confirm' => 'Đã xảy ra sự cố trong quá trình xác thực tài khoản.',
                'cant_deactivate_self'  => 'Bạn không thể tự hủy kích hoạt tài khoản của bạn.',
                'cant_delete_admin'  => 'Bạn không thể xóa quyền quản trị cấp cao.',
                'cant_delete_self'      => 'Bạn không thể xóa tài khoản của bạn.',
                'cant_delete_own_session' => 'Bạn không thể xóa phiên đăng nhập của chính bạn. Vui lòng đăng xuất theo cách thủ công.',
                'cant_restore'          => 'Tài khoản chưa bị xóa nên không cần phải khôi phục lại.',
                'cant_unconfirm_admin' => 'Bạn không thể hủy xác thực quản trị viên cao cấp.',
                'cant_unconfirm_self' => 'Bạn không thể hủy xác thực chính bạn.',
                'create_error'          => 'Đã xảy ra sự cố trong quá trình thêm thành viên mới. Vui lòng thử lại.',
                'delete_error'          => 'Đã xảy ra sự cố trong quá trình xóa thành viên. Vui lòng thử lại.',
                'delete_first'          => 'Để xóa vĩnh viễn thành viên, vui lòng chuyển thành viên về chế độ xóa.',
                'email_error'           => 'Địa chỉ e-mail đã được sử dựng trên một tài khoản khác.',
                'mark_error'            => 'Đã xảy ra sự cố trong quá trình cập nhật tài khoản. Vui lòng thử lại.',
                'not_confirmed'            => 'Thành viên chưa được xác thực.',
                'not_found'             => 'Không tìm thấy thành viên này.',
                'restore_error'         => 'Đã xảy ra sự cố trong quá trình khôi phục tài khoản. Vui lòng thử lại.',
                'role_needed_create'    => 'Bạn phải chọn ít nhất một nhóm quyền.',
                'role_needed'           => 'Bạn phải chọn ít nhất một nhóm quyền.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'Đã xảy ra sự cố trong quá trình cập nhật thành viên. Vui lòng thử lại.',
                'update_password_error' => 'Đã xảy ra sự cố trong quá trình thay đổi mật khẩu thành viên. Vui lòng thử lại.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Tài khoản của bạn đã được xác thực.',
                'confirm'           => 'Xác thực tài khoản!',
                'created_confirm'   => 'Tài khoản của bạn đã được tạo thành công. Chúng tôi đã gửi một e-mail để xác thực tài khoản vào hòm thư của bạn',
                'created_pending'   => 'Tài khoản của bạn đã được tạo thành công và đang chờ phê duyệt. Chúng tôi sẽ gửi e-mail cho bạn khi tài khoản sẵn sàng hoạt động.',
                'mismatch'          => 'Mã xác thực của bạn không đúng.',
                'not_found'         => 'Mã xác thực không tồn tại.',
                'pending'            => 'Tài khoản của bạn hiện đang chờ phê duyệt.',
                'resend'            => 'Tài khoản của bạn chưa được xác thực. Vui lòng nhấn vào liên kết xác thực đã được gửi đến hòm thư của bạn, hoặc <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">nhấn vào đây</a> để yêu cầu gửi lại e-mail kích hoạt.',
                'success'           => 'Tài khoản của bạn đã được xác thực thành công!',
                'resent'            => 'Một e-mail xác thực đã được gửi đến hòm thư mà bạn đăng ký.',
            ],

            'deactivated' => 'Tài khoản của bạn đã bị hủy kích hoạt.',
            'email_taken' => 'Địa chỉ e-mail đã được sử dụng.',

            'password' => [
                'change_mismatch' => 'Mật khẩu cũ không chính xác.',
                'reset_problem' => 'Đã có sự cố trong quá trình đặt lại mật khẩu. Vui lòng thực hiện lại việc đặt lại mật khẩu.',
            ],

            'registration_disabled' => 'Hệ thống hiện không hỗ trợ đăng ký tài khoản mới.',
        ],
    ],
];
