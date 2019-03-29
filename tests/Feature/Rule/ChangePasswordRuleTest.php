<?php

namespace Tests\Feature\Rule;

use Tests\TestCase;
use App\Rules\Auth\ChangePassword;

/**
 * Class ChangePasswordRuleTest.
 */
class ChangePasswordRuleTest extends TestCase
{
    /** @test */
    public function a_password_can_be_validated()
    {
        $rule = ['password' => [new ChangePassword]];
        $this->assertFalse(validator(['password' => '1'], $rule)->passes());
        $this->assertFalse(validator(['password' => '1#'], $rule)->passes());
        $this->assertFalse(validator(['password' => 'a1#'], $rule)->passes());
        $this->assertFalse(validator(['password' => 'aB1#'], $rule)->passes());
        $this->assertTrue(validator(['password' => 'Abcd1234#'], $rule)->passes());
    }
}
