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
                'delete_user_confirm'  => 'Hành động không thể hoàn tác và có thể dẫn đến lỗi. Bạn có chắc chắn muốn xóa vĩnh viễn người dùng này?',
                'if_confirmed_off'     => '(Nếu xác thực không được bật)',
                'restore_user_confirm' => 'Khôi phục thành viên về trạng thái ban đầu?',
            ],
        ],

        'dashboard' => [
            'title'   => 'Trang điều khiển',
            'welcome' => 'Chào mừng',
        ],

        'general' => [
            'all_rights_reserved' => 'Tất cả quyền được bảo vệ.',
            'are_you_sure'        => 'Bạn có chắc về hành động này?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Tiếp tục',
            'member_since'        => 'Thành viên từ',
            'minutes'             => ' phút',
            'search_placeholder'  => 'Tìm kiếm...',
            'timeout'             => 'Phiên đăng nhập hết hạn vì không có bất cứ hoạt động nào diễn ra trên tài khoản trong ',

            'see_all' => [
                'messages'      => 'Xem tất cả',
                'notifications' => 'Xem tất cả',
                'tasks'         => 'Xem tất cả',
            ],

            'status' => [
                'online'  => 'Trực tuyến',
                'offline' => 'Không trực tuyến',
            ],

            'you_have' => [
                'messages'      => '{0} Không có tin nhắn nào mới|{1} Bạn có 1 tin nhắn|[2,Inf] Bạn có :number tin nhắn',
                'notifications' => '{0} Không có thông báo nào mới|{1} Bạn có 1 thông báo|[2,Inf] Bạn có :number thông báo',
                'tasks'         => '{0} Không có nhiệm vụ nào mới|{1} Bạn có 1 nhiệm vụ|[2,Inf] Bạn có :number nhiệm vụ',
            ],
        ],

        'search' => [
            'empty'      => 'Vui lòng nhập vào từ khóa.',
            'incomplete' => 'You must write your own search logic for this system.',
            'title'      => 'Kết quả tìm kiếm',
            'results'    => 'Kết quả tìm kiếm cho :query',
        ],
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Tài khoản đã được kích hoạt thành công.',
            'error'                   => 'Whoops!',
            'greeting'                => 'Xin chào!',
            'regards'                 => 'Trân trọng,',
            'trouble_clicking_button' => 'Nếu bạn gặp sự cố khi nhấp vào nút ":action_text", hãy sao chép và dán liên kết dưới vào trình duyệt web của bạn:',
            'thank_you_for_using_app' => 'Cảm ơn bạn đã tin dùng hệ thống của chúng tôi!',

            'password_reset_subject'    => 'Khôi phục mật khẩu',
            'password_cause_of_email'   => 'Bạn nhận được e-mail này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.',
            'password_if_not_requested' => 'Nếu bạn không yêu cầu đặt lại mật khẩu, bạn hãy bỏ qua e-mail này mà không cần thực hiện thêm hành động nào.',
            'reset_password'            => 'Nhấn vào đây để đặt lại mật khẩu',

            'click_to_confirm' => 'Nhấn vào đây để xác thực tài khoản:',
        ],

        'contact' => [
            'email_body_title' => 'Bạn có một liên hệ mới: Dưới đây là thông tin chi tiết:',
            'subject' => 'Một mẫu liên hệ :app_name mới!',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Quyền cơ bản - ',
                'role'       => 'Vai trò cơ bản - ',
            ],

            'js_injected_from_controller' => 'Javascript Injected from a Controller',

            'using_blade_extensions' => 'Kiểm tra quyền truy cập bằng cú pháp Blade',

            'using_access_helper' => [
                'array_permissions'     => 'Được phép truy cập nếu đúng tên \'Quyền\' (Permission) hoặc ID: tên và id thuộc 2 \'Quyền\' khác nhau',
                'array_permissions_not' => 'Được phép truy cập nếu đúng tên \'Quyền\' (Permission) hoặc ID: tên và id cùng chung 1 \'Quyền\'',
                'array_roles'           => 'Được phép truy cập nếu đúng tên \'Vai Trò\' (Nhóm Quyền - Role) hoặc ID: tên và id thuộc 2 \'Vai Trò\' khác nhau',
                'array_roles_not'       => 'Được phép truy cập nếu đúng tên \'Vai Trò\' (Nhóm Quyền - Role) hoặc ID: tên và id cùng chung 1 \'Vai Trò\'',
                'permission_id'         => 'Kiểm tra quyền truy cập bằn ID \'Quyền\' (Permission)',
                'permission_name'       => 'Kiểm tra quyền truy cập bằn tên \'Quyền\' (Permission)',
                'role_id'               => 'Kiểm tra quyền truy cập bằng ID \'Vai Trò\' (nhóm quyền - Role)',
                'role_name'             => 'Kiểm tra quyền truy cập bằng tên \'Vai Trò\' (nhóm quyền - Role)',
            ],

            'view_console_it_works'          => 'View console, you should see \'it works!\' which is coming from FrontendController@index',
            'you_can_see_because'            => 'Bạn có thể nhìn thấy nó vì bạn sở hữu vai trò (nhóm quyền - Role) \':role\'!',
            'you_can_see_because_permission' => 'Bạn có thể nhìn thấy nó vì bạn sở hữu quyền (Permission) \':permission\'!',
        ],

        'general' => [
            'joined'        => 'Tham gia',
        ],

        'user' => [
            'change_email_notice' => 'Nếu bạn thay đổi e-mail của bạn, bạn sẽ được đăng xuất cho đến khi bạn xác nhận địa chỉ e-mail mới.',
            'email_changed_notice' => 'Bạn phải xác nhận địa chỉ e-mail mới của bạn trước khi bạn có thể đăng nhập lại.',
            'profile_updated'  => 'Cập nhật thông tin thành công.',
            'password_updated' => 'Mật khẩu đã được thay đổi.',
        ],

        'welcome_to' => 'Chào mừng đến với :place',
    ],
];
