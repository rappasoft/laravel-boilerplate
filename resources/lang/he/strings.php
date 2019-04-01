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
                'delete_user_confirm' => 'האם את/ה בטוח/ה שברצונך למחוק את המשתמש לצמיתות? כל מקום באפליקציה שקשור למשתמש זה כנראה יסבול מתקלות. ראו הוזהרתם, מחיקה לצמיתות היא בלתי הפיכה.',
                'if_confirmed_off' => '(אם האימות כבוי)',
                'no_deactivated' => 'אין משתמשים מכובים.',
                'no_deleted' => 'אין משתמשים מחוקים.',
                'restore_user_confirm' => 'לשחזר את המשתמש למצבו המקורי?',
            ],
        ],

        'dashboard' => [
            'title' => 'לוח בקרה',
            'welcome' => 'ברוכים הבאים',
        ],

        'general' => [
            'all_rights_reserved' => 'כל הזכויות שמורות.',
            'are_you_sure' => 'האם את/ה בטוח/ה שאת/ה רוצה לעשות את זה?',
            'boilerplate_link' => 'Laravel 5 Boilerplate',
            'continue' => 'המשך',
            'member_since' => 'חבר מאז',
            'minutes' => ' דקות',
            'search_placeholder' => 'חיפוש...',
            'timeout' => 'המשתמש שלך נותק אוטומטית מטעמי אבטחה, כי הוא לא פעיל כבר ',

            'see_all' => [
                'messages' => 'הצג את כל ההודעות',
                'notifications' => 'הצג הכל',
                'tasks' => 'הצג את כל המשימות',
            ],

            'status' => [
                'online' => 'מחובר/ת',
                'offline' => 'מנותק/ת',
            ],

            'you_have' => [
                'messages' => '{0} אין לך הודעות|{1} יש לך הודעה אחת|[2,Inf] יש לך :number הודעות',
                'notifications' => '{0} אין לך התראות|{1} יש לך התראה אחת|[2,Inf] יש לך :number התראות',
                'tasks' => '{0} אין לך משימות|{1} יש לך משימה אחת|[2,Inf] יש לך :number משימות',
            ],
        ],

        'search' => [
            'empty' => 'יש להקליד מילת חיפוש.',
            'incomplete' => 'אתה צריך לכתוב לוגיקת חיפוש משלך למערכת הזו.',
            'title' => 'תוצאות חיפוש',
            'results' => 'תוצאות חיפוש עבור :query',
        ],

        'welcome' => 'Welcome to the Dashboard',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'החשבון שלך אומת.',
            'error' => 'אופס!',
            'greeting' => 'אהלן!',
            'regards' => 'בברכה,',
            'trouble_clicking_button' => 'אם יש סיבוך בלחיצה על הכפתור ":action_text", אפשר להדביק את הקישור הבא בשורת הכתובת בדפדפן:',
            'thank_you_for_using_app' => 'תודה על השימוש באפליקציה שלנו!',

            'password_reset_subject' => 'איפוס סיסמה',
            'password_cause_of_email' => 'המייל הזה הגיע אליך כי מישהו ביקש לאפס את הסיסמה של החשבון שלך.',
            'password_if_not_requested' => 'אם לא ביקשת איפוס סיסמה, אין צורך בפעולה נוספת.',
            'reset_password' => 'לחצו כאן לאיפוס הסיסמה',

            'click_to_confirm' => 'לחץ/י כאן לאימות החשבון:',
        ],

        'contact' => [
            'email_body_title' => 'מישהו השאיר פנייה בטופס צור קשר. הנה הפרטים:',
            'subject' => 'פנייה חדשה מטופס צור קשר - :app_name',
        ],
    ],

    'frontend' => [
        'test' => 'בדיקה',

        'tests' => [
            'based_on' => [
                'permission' => 'מבוסס הרשאה - ',
                'role' => 'מבוסס תפקיד - ',
            ],

            'js_injected_from_controller' => 'ג\'אווה סקריפט הוזרק מהקונטרולר',

            'using_blade_extensions' => 'שימוש בהרחבות בלייד',

            'using_access_helper' => [
                'array_permissions' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does have to possess all.',
                'array_permissions_not' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does not have to possess all.',
                'array_roles' => 'Using Access Helper with Array of Role Names or ID\'s where the user does have to possess all.',
                'array_roles_not' => 'Using Access Helper with Array of Role Names or ID\'s where the user does not have to possess all.',
                'permission_id' => 'Using Access Helper with Permission ID',
                'permission_name' => 'Using Access Helper with Permission Name',
                'role_id' => 'Using Access Helper with Role ID',
                'role_name' => 'Using Access Helper with Role Name',
            ],

            'view_console_it_works' => 'View console, you should see \'it works!\' which is coming from FrontendController@index',
            'you_can_see_because' => 'את/ה יכול/ה לראות את זה כי יש לך את התפקיד \':role\'!',
            'you_can_see_because_permission' => 'את/ה יכול/ה לראות את זה כי יש לך את ההרשאה \':permission\'!',
        ],

        'general' => [
            'joined' => 'צורף',
        ],

        'user' => [
            'change_email_notice' => 'בהחלפת כתובת מייל תנותקו מהמערכת, ותצטרכו לאמת את הכתובת החדשה כדי להתחבר שוב.',
            'email_changed_notice' => 'נשלח מייל אימות לכתובת החדשה. כדי להתחבר שוב, חובה לאמת את כתובת הדוא"ל.',
            'profile_updated' => 'הפרופיל עודכן בהצלחה.',
            'password_updated' => 'הסיסמה עודכנה בהצלחה.',
        ],

        'welcome_to' => 'ברוכים הבאים ל:place',
    ],
];
