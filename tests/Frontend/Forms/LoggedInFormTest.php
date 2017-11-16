<?php

use Tests\BrowserKitTestCase;

/**
 * Class LoggedInFormTest.
 */
class LoggedInFormTest extends BrowserKitTestCase
{
    public function testUpdateProfileRequiredFields()
    {
        if (config('access.users.change_email')) {
            $this->actingAs($this->user)
                 ->visit('/account')
                 ->type('', 'first_name')
                 ->type('', 'last_name')
                 ->type('', 'email')
                 ->press('Update')
                 ->seePageIs('/account')
                 ->see('The first name field is required.')
                 ->see('The last name field is required.')
                 ->see('The email field is required.');
        } else {
            $this->actingAs($this->user)
                 ->visit('/account')
                 ->type('', 'first_name')
                 ->type('', 'last_name')
                 ->press('Update')
                 ->seePageIs('/account')
                 ->see('The first name field is required.')
                 ->see('The last name field is required.');
        }
    }

    public function testUpdateProfileForm()
    {
        $rand = rand();

        config(['access.users.change_email' => true]);
        config(['access.users.confirm_email' => true]);

        $this->actingAs($this->user)
            ->visit('/account')
            ->see('My Account')
            ->type($this->user->first_name.'_'.$rand, 'first_name')
            ->type($this->user->last_name.'_'.$rand, 'last_name')
            ->type('2_'.$this->user->email, 'email')
            ->press('Update')
            ->seePageIs('/login')
            ->see('You must confirm your new e-mail address before you can log in again.')
            ->seeInDatabase(config('access.table_names.users'),
                [
                    'email' => '2_'.$this->user->email,
                    'first_name' => $this->user->first_name.'_'.$rand,
                    'last_name' => $this->user->last_name.'_'.$rand,
                    'confirmed' => 0,
                ]);

        config(['access.users.confirm_email' => false]);

        $this->actingAs($this->user)
            ->visit('/account')
            ->see('My Account')
            ->type($this->user->first_name.'_'.$rand, 'first_name')
            ->type($this->user->last_name.'_'.$rand, 'last_name')
            ->type('2_'.$this->user->email, 'email')
            ->press('Update')
            ->seePageIs('/account')
            ->see('Profile successfully updated.')
            ->seeInDatabase(config('access.table_names.users'),
                [
                    'email' => '2_'.$this->user->email,
                    'first_name' => $this->user->first_name.'_'.$rand,
                    'last_name' => $this->user->last_name.'_'.$rand,
                    'confirmed' => 0,
                ]);

        config(['access.users.change_email' => false]);

        $this->actingAs($this->user)
            ->visit('/account')
            ->see('My Account')
            ->type($this->user->first_name.'_'.$rand, 'first_name')
            ->type($this->user->last_name.'_'.$rand, 'last_name')
            ->press('Update')
            ->seePageIs('/account')
            ->see('Profile successfully updated.')
            ->seeInDatabase(config('access.table_names.users'),
                [
                    'first_name' => $this->user->first_name.'_'.$rand,
                    'last_name' => $this->user->last_name.'_'.$rand,
                ]);
    }

    public function testChangePasswordRequiredFields()
    {
        $this->actingAs($this->user)
             ->visit('/account')
             ->type('', 'old_password')
             ->type('', 'password')
             ->type('', 'password_confirmation')
             ->press('Update Password')
             ->seePageIs('/account')
             ->see('The old password field is required.')
             ->see('The password field is required.');
    }

    public function testChangePasswordForm()
    {
        $password = '87654321';

        $this->actingAs($this->user)
             ->visit('/account')
             ->see('My Account')
             ->type('1234', 'old_password')
             ->type($password, 'password')
             ->type($password, 'password_confirmation')
             ->press('Update Password')
             ->seePageIs('/account')
             ->see('Password successfully updated.');
    }
}
