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
                'delete_user_confirm' => 'คุณแน่ใจว่าต้องการลบผู้ใช้นี้อย่างถาวร? ทุกที่ในระบบที่อ้างอิงถึงผู้ใช้นี้อาจเกิดข้อผิดพลาด ดำเนินการต่อด้วยการตัดสินใจของคุณเอง และการกระทำนี้ไม่สามารถย้อนกลับได้',
                'if_confirmed_off' => '(ถ้าหากการยืนยันตัวตนไม่ถูกเลือก)',
                'restore_user_confirm' => 'ต้องการกู้คืนผู้ใช้นี้กลับสู่สถานะดั้งเดิม?',
            ],
        ],

        'dashboard' => [
            'title' => 'แผงควบคุมแอดมิน',
            'welcome' => 'ยินดีต้อนรับ',
        ],

        'general' => [
            'all_rights_reserved' => 'ขอสงวนสิทธิ์',
            'are_you_sure' => 'คุณแน่ใจหรือ?',
            'boilerplate_link' => 'Laravel Boilerplate',
            'continue' => 'ทำต่อ',
            'member_since' => 'เป็นสมาชิกตั้งแต่',
            'minutes' => ' นาที',
            'search_placeholder' => 'ค้นหา...',
            'timeout' => 'คุณถูกทำให้ออกจากระบบโดยอัตโนมัติเพื่อความปลอดภัย เนื่องจากไม่มีความเคลื่อนไหวใดๆ เกิดขึ้นใน ',

            'see_all' => [
                'messages' => 'ดูข้อความทั้งหมด',
                'notifications' => 'ดูทั้งหมด',
                'tasks' => 'ดูภารกิจทั้งหมด',
            ],

            'status' => [
                'online' => 'ออนไลน์',
                'offline' => 'ออฟไลน์',
            ],

            'you_have' => [
                'messages' => '{0} คุณไม่มีข้อความใดๆ|{1} คุณมี 1 ข้อความ|[2,Inf] คุณมี :number ข้อความ',
                'notifications' => '{0} คุณไม่มีการแจ้งเตือนใดๆ|{1} คุณมี 1 การแจ้งเตือน|[2,Inf] คุณมี :number การแจ้งเตือน',
                'tasks' => '{0} คุณไม่มีภารกิจใดๆ|{1} คุณมี 1 ภารกิจ|[2,Inf] คุณมี :number ภารกิจ',
            ],
        ],

        'search' => [
            'empty' => 'กรุณาป้อนคำสืบค้น',
            'incomplete' => 'สำหรับระบบนี้คุณต้องเขียนเงื่อนไขสำหรับการสืบค้นด้วยตัวเอง',
            'title' => 'ผลการสืบค้น',
            'results' => 'ผลการสืบค้นสำหรับ :query',
        ],

        'welcome' => 'Welcome to the Dashboard',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Your account has been confirmed.',
            'error' => 'โอ้วววว!',
            'greeting' => 'สวัสดีจ้า!',
            'regards' => 'ด้วยความนับถือ,',
            'trouble_clicking_button' => 'เมื่อคุณมีปัญหาในการคลิกปุ่ม ":action_text" , โปรดคัดลอก URL ด้านล่างแล้วนำไปวางในเว็บบราวเซอร์ของคุณ:',
            'thank_you_for_using_app' => 'ขอบคุณมากสำหรับการใช้งานแอพพลิเคชั่นของเรา',

            'password_reset_subject' => 'ลิงก์สำหรับรีเซ็ตรหัสผ่านของคุณ',
            'password_cause_of_email' => 'คุณได้รับอีเมลฉบับนี้เนื่องจากมีการร้องขอการตั้งรหัสผ่านใหม่สำหรับบัญชีผู้ใช้นี้',
            'password_if_not_requested' => 'ถ้าหากว่าคุณไม่ได้เป็นคนร้องขอการตั้งรหัสผ่านใหม่ ไม่จำเป็นต้องทำสิ่งใดเพิ่มเติม',
            'reset_password' => 'คลิกที่นี่เพื่อรีเซ็ตรหัสผ่านของคุณ',

            'click_to_confirm' => 'คลิกที่นี่เพื่อยืนยันตัวตนของคุณ:',
        ],

        'contact' => [
            'email_body_title' => 'You have a new contact form request: Below are the details:',
            'subject' => 'A new :app_name contact form submission!',
        ],
    ],

    'frontend' => [
        'test' => 'การทดสอบ',

        'tests' => [
            'based_on' => [
                'permission' => 'เกี่ยวกับสิทธิ์ - ',
                'role' => 'เกี่ยวกับบทบาท - ',
            ],

            'js_injected_from_controller' => 'ใส่ Javascript ผ่าน Controller',

            'using_blade_extensions' => 'การใช้ Blade Extensions',

            'using_access_helper' => [
                'array_permissions' => 'ใช้ Access Helper กับ Array ของชื่อสิทธิ์ หรือ ID ซึ่งผู้ใช้ต้องเป็นผู้ที่มีสิทธิ์ครบทั้งหมด',
                'array_permissions_not' => 'ใช้ Access Helper กับ Array ของชื่อสิทธิ์ หรือ ID ซึ่งผู้ใช้ไม่จำเป็นต้องเป็นผู้ที่มีสิทธิ์ครบทั้งหมด',
                'array_roles' => 'ใช้ Access Helper กับ Array ของชื่อบทบาท หรือ ID ซึ่งผู้ใช้ต้องเป็นผู้ที่มีบทบาทครบทั้งหมด',
                'array_roles_not' => 'ใช้ Access Helper กับ Array ของชื่อบทบาท หรือ ID ซึ่งผู้ใช้ไม่จำเป็นต้องเป็นผู้ที่มีบทบาทครบทั้งหมด',
                'permission_id' => 'ใช้ Access Helper กับ ID ของสิทธิ์',
                'permission_name' => 'ใช้ Access Helper กับชื่อของสิทธิ์',
                'role_id' => 'ใช้ Access Helper กับ ID ของบทบาท',
                'role_name' => 'ใช้ Access Helper กับชื่อของบทบาท',
            ],

            'view_console_it_works' => 'ดูที่คอนโซลล็อก คุณจะเห็นข้อความ \'it works!\' ซึ่งมาจาก FrontendController@index',
            'you_can_see_because' => 'คุณสามารถเห็นข้อความนี้เนื่องจากคุณมีบทบาทของ \':role\'!',
            'you_can_see_because_permission' => 'คุณสามารถเห็นข้อความนี้เนื่องจากคุณมีสิทธิ์ของ \':permission\'!',
        ],

        'general' => [
            'joined' => 'Joined',
        ],

        'user' => [
            'change_email_notice' => 'If you change your e-mail you will be logged out until you confirm your new e-mail address.',
            'email_changed_notice' => 'You must confirm your new e-mail address before you can log in again.',
            'profile_updated' => 'ข้อมูลโปรไฟล์ถูกอัพเดทสำเร็จแล้ว',
            'password_updated' => 'รหัสผ่านถูกอัพเดทสำเร็จแล้ว',
        ],

        'welcome_to' => 'ยินดีต้อนรับสู่ :place',
    ],
];
