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
                'already_exists'    => 'Αυτός ο ρόλος υπάρχει ήδη. Παρακαλώ διάλεξε άλλο όνομα.',
                'cant_delete_admin' => 'Δεν μπορείτε να διαγράψετε το ρόλο του διαχειριστή.',
                'create_error'      => 'Παρουσιάστηκε πρόβλημα κατά τη δημιουργία του ρόλου. Παρακαλώ ξαναπροσπαθήστε.',
                'delete_error'      => 'Παρουσιάστηκε πρόβλημα κατά τη διαγραφή του ρόλου. Παρακαλώ ξαναπροσπαθήστε.',
                'has_users'         => 'Δεν μπορείτε να διαγράψετε ρόλο με συνδεδεμένους χρήστες.',
                'needs_permission'  => 'Πρέπει να επιλέξετε τουλάχιστον μια άδεια για αυτό το ρόλο.',
                'not_found'         => 'Άυτός ο ρόλος δεν υπάρχει.',
                'update_error'      => 'Παρουσιάστηκε πρόβλημα κατά την ανανέωση του ρόλου. Παρακαλώ ξαναπροσπαθήστε.',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self'  => 'Δεν μπορείτε να το κάνετε αυτό στον εαυτό σας.',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'Δεν μπορείτε να διαγράψετε τον εαυτό σας.',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore'          => 'This user is not deleted so it can not be restored.',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error'          => 'There was a problem creating this user. Please try again.',
                'delete_error'          => 'There was a problem deleting this user. Please try again.',
                'delete_first'          => 'This user must be deleted first before it can be destroyed permanently.',
                'email_error'           => 'That email address belongs to a different user.',
                'mark_error'            => 'There was a problem updating this user. Please try again.',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => 'That user does not exist.',
                'restore_error'         => 'There was a problem restoring this user. Please try again.',
                'role_needed_create'    => 'You must choose at lease one role.',
                'role_needed'           => 'You must choose at least one role.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'There was a problem updating this user. Please try again.',
                'update_password_error' => 'There was a problem changing this users password. Please try again.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Your account is already confirmed.',
                'confirm'           => 'Confirm your account!',
                'created_confirm'   => 'Your account was successfully created. We have sent you an e-mail to confirm your account.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'Your confirmation code does not match.',
                'not_found'         => 'That confirmation code does not exist.',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'Your account is not confirmed. Please click the confirmation link in your e-mail, or <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">click here</a> to resend the confirmation e-mail.',
                'success'           => 'Your account has been successfully confirmed!',
                'resent'            => 'A new confirmation e-mail has been sent to the address on file.',
            ],

            'deactivated' => 'Ο λογαριασμός σας απενεργοποιήθηκε.',
            'email_taken' => 'Αυτό το e-mail χρησιμοποιείται ήδη.',

            'password' => [
                'change_mismatch' => 'Αυτός δεν είναι ο παλιός σου κωδικός.',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
