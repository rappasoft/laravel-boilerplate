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
    */

    'general' => [
        'all'     => 'Tất cả',
        'yes'     => 'Có',
        'no'      => 'Không',
        'custom'  => 'Tùy chỉnh',
        'actions' => 'Hành động',
        'active'  => 'Kích hoạt',
        'buttons' => [
            'save'   => 'Lưu',
            'update' => 'Cập nhật',
        ],
        'hide'              => 'Ẩn',
        'inactive'          => 'Chưa kích hoạt',
        'none'              => 'Không có',
        'show'              => 'Hiện thị',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Tạo nhóm quyền',
                'edit'       => 'Chỉnh sửa nhóm quyền',
                'management' => 'Quản lý nhóm quyền',

                'table' => [
                    'number_of_users' => 'Số thành viên',
                    'permissions'     => 'Quyền',
                    'role'            => 'Nhóm quyền',
                    'sort'            => 'Sắp xếp',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Kích hoạt',
                'all_permissions'     => 'Tất cả quyền',
                'change_password'     => 'Đổi mật khẩu',
                'change_password_for' => 'Đổi mật khẩu cho :user',
                'create'              => 'Thêm thành viên',
                'deactivated'         => 'Chặn thành viên',
                'deleted'             => 'Xóa thành viên',
                'edit'                => 'Chỉnh sửa thành viên',
                'management'          => 'Quản lý thành viên',
                'no_permissions'      => 'Không có quyền',
                'no_roles'            => 'Chưa thiết lập nhóm quyền.',
                'permissions'         => 'Quyền',

                'table' => [
                    'confirmed'      => 'Xác thực',
                    'created'        => 'Khởi tạo',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Cập nhật cuối',
                    'name'           => 'Tên hiện thị',
                    'first_name'     => 'Tên gọi',
                    'last_name'      => 'Tên đệm',
                    'no_deactivated' => 'Không có thành viên nào kích hoạt',
                    'no_deleted'     => 'Không có thành viên bị xóa',
                    'roles'          => 'Nhóm quyền',
                    'social'         => 'Mạng xã hội',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Tổng quan',
                        'history'  => 'Lịch sử',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Ảnh đại diện',
                            'confirmed'    => 'Xác thực',
                            'created_at'   => 'Ngày khởi tạo',
                            'deleted_at'   => 'Ngày xóa',
                            'email'        => 'E-mail',
                            'last_updated' => 'Cập nhật cuối',
                            'name'         => 'Tên hiện thị',
                            'first_name'   => 'Tên gọi',
                            'last_name'    => 'Tên đệm',
                            'status'       => 'Trạng thái',
                        ],
                    ],
                ],

                'view' => 'Xem thành viên',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Đăng nhập',
            'login_button'       => 'Đăng nhập',
            'login_with'         => 'Đăng nhập bằng :social_media',
            'register_box_title' => 'Đăng ký',
            'register_button'    => 'Đăng ký',
            'remember_me'        => 'Ghi nhớ tài khoản',
        ],

        'contact' => [
            'box_title' => 'Liên hệ',
            'button' => 'Gửi thông tin',
        ],

        'passwords' => [
            'forgot_password'                 => 'Quên mật khẩu?',
            'reset_password_box_title'        => 'Phục hồi mật khẩu',
            'reset_password_button'           => 'Phục hồi mật khẩu',
            'send_password_reset_link_button' => 'Gửi liên kết phục hồi',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Country Alpha Codes',
                'alpha2'  => 'Country Alpha 2 Codes',
                'alpha3'  => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro mẫu',

            'state' => [
                'mexico' => 'Mexico State List',
                'us'     => [
                    'us'       => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed'    => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Đổi mật khẩu',
            ],

            'profile' => [
                'avatar'             => 'Ảnh đại diện',
                'created_at'         => 'Khởi tạo ngày',
                'edit_information'   => 'Chỉnh sửa thông tin',
                'email'              => 'E-mail',
                'last_updated'       => 'Cập nhật cuối',
                'name'               => 'Tên hiện thị',
                'first_name'         => 'Tên gọi',
                'last_name'          => 'Tên đệm',
                'update_information' => 'Cập nhật thông tin',
            ],
        ],

    ],
];
