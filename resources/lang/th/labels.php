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
        'all'     => 'ทั้งหมด',
        'yes'     => 'ใช่',
        'no'      => 'ไม่',
        'custom'  => 'เลือกเอง',
        'actions' => 'การกระทำ',
    'active'      => 'ใช้งาน',
        'buttons' => [
            'save'   => 'บันทึก',
            'update' => 'แก้ไข',
        ],
        'hide'              => 'ซ่อน',
    'inactive'              => 'ไม่ใช้งาน',
        'none'              => 'ไม่มี',
        'show'              => 'แสดง',
        'toggle_navigation' => 'เปิด/ปิด เมนูนำทาง',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'สร้างบทบาท',
                'edit'       => 'แก้ไขบทบบาท',
                'management' => 'การจัดการบทบาท',

                'table' => [
                    'number_of_users' => 'จำนวนผู้ใช้',
                    'permissions'     => 'สิทธิ์',
                    'role'            => 'บทบาท',
                    'sort'            => 'เรียงตาม',
                    'total'           => 'บทบาททั้งหมด|บทบาททั้งหมด',
                ],
            ],

            'users' => [
                'active'              => 'ผู้ใช้',
                'all_permissions'     => 'สิทธิ์ทั้งหมด',
                'change_password'     => 'เปลี่ยนรหัสผ่าน',
                'change_password_for' => 'เปลี่ยนรหัสผ่านสำหรับ :user',
                'create'              => 'สร้างผู้ใช้',
                'deactivated'         => 'ผู้ใช้ที่ถูกพักการใช้งาน',
                'deleted'             => 'ผู้ใช้ที่ถูกลบ',
                'edit'                => 'แก้ไขผู้ใช้',
                'management'          => 'การจัดการผู้ใช้',
                'no_permissions'      => 'ไม่มีสิทธิ์',
                'no_roles'            => 'ไม่มีบทบาทให้เลือก',
                'permissions'         => 'สิทธิ์',

                'table' => [
                    'confirmed'      => 'ยืนยันแล้ว',
                    'created'        => 'สร้างเมื่อ',
                    'email'          => 'อีเมล',
                    'id'             => 'ID',
                    'last_updated'   => 'อัพเดทล่าสุดเมื่อ',
                    'name'           => 'ชื่อ',
                    'no_deactivated' => 'ไม่มีผู้ใช้ที่ถูกพักการใช้งาน',
                    'no_deleted'     => 'ไม่มีผู้ใช้ที่ถูกลบ',
                    'roles'          => 'บทบาท',
                    'social' => 'Social',
                    'total'          => 'ผู้ใช้ทั้งหมด|ผู้ใช้ทั้งหมด',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'ภาพรวม',
                        'history'  => 'ประวัติ',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'รูปตัวแทน',
                            'confirmed'    => 'ยืนยันเรียบร้อย',
                            'created_at'   => 'สร้างแล้วเมื่อ',
                            'deleted_at'   => 'ลบแล้วเมื่อ',
                            'email'        => 'อีเมล',
                            'last_updated' => 'ปรับปรุงล่าสุด',
                            'name'         => 'ชื่อ',
                            'status'       => 'สถานะ',
                        ],
                    ],
                ],

                'view' => 'แสดงผู้ใช้',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'เข้าสู่ระบบ',
            'login_button'       => 'เข้าสู่ระบบ',
            'login_with'         => 'เข้าสู่ระบบด้วย :social_media',
            'register_box_title' => 'ลงทะเบียน',
            'register_button'    => 'ลงทะเบียน',
            'remember_me'        => 'จดจำฉัน',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password'                 => 'ลืมรหัสผ่าน?',
            'reset_password_box_title'        => 'รีเซ็ตรหัสผ่าน',
            'reset_password_button'           => 'รีเซ็ตรหัสผ่าน',
            'send_password_reset_link_button' => 'ส่งลิงก์สำหรับรีเซ็ตรหัสผ่าน',
        ],

        'user' => [
            'passwords' => [
                'change' => 'เปลี่ยนรหัสผ่าน',
            ],

            'profile' => [
                'avatar'             => 'รูปตัวแทน',
                'created_at'         => 'สร้างเมื่อ',
                'edit_information'   => 'แก้ไขข้อมูล',
                'email'              => 'อีเมล',
                'last_updated'       => 'ปรับปรุงล่าสุดเมื่อ',
                'name'               => 'ชื่อ',
                'update_information' => 'ปรับปรุงข้อมูล',
            ],
        ],

    ],
];
