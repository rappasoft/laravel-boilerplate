<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'roles' => [
            'created' => 'Nhóm quyền đã được thêm mới thành công.',
            'deleted' => 'Xóa thành công nhóm quyền.',
            'updated' => 'Nhóm quyền đã được cập nhật.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'Hệ thống đã được thiết lập để có thể phê duyệt cách thủ công.',
            'confirmation_email'  => 'Một e-mail xác thực đã được gửi đến hộp thư mà bạn đăng ký.',
            'confirmed'              => 'Tài khoản của bạn đã được xác thực.',
            'created'             => 'Tạo tài khoản thành công.',
            'deleted'             => 'Tài khoản đã bị xóa.',
            'deleted_permanently' => 'Tài khoản đã bị xóa vĩnh viễn.',
            'restored'            => 'Tài khoản đã được phục hồi.',
            'session_cleared'      => "Đã xóa phiên đăng nhập của thành viên.",
            'social_deleted' => 'Gỡ bỏ liên kết tài khoản mạng xã hội thành công',
            'unconfirmed' => 'Hủy kích hoạt tài khoản thành công.',
            'updated'             => 'Cập nhật tài khoản thành công.',
            'updated_password'    => "Mật khẩu truy cập đã được thay đổi.",
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Thông tin liên hệ đã được gửi thành công. Chúng tôi sẽ hồi đáp bạn sớm nhất ngay khi có thể.',
        ],
    ],
];
