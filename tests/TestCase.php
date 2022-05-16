<?php

namespace Tests;

use App\Domains\Auth\Http\Middleware\TwoFactorAuthenticationStatus;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // if mysql/mariadb : Close any transactions if mysql/mariadb
        \DB::commit();

        Artisan::call('db:seed');

        // if mysql/mariadb : open a new transaction
        \DB::beginTransaction();

        $this->withoutMiddleware(RequirePassword::class);
        $this->withoutMiddleware(TwoFactorAuthenticationStatus::class);
    }

    protected function getAdminRole()
    {
        return Role::find(1);
    }

    protected function getMasterAdmin()
    {
        return User::find(1);
    }

    protected function loginAsAdmin($admin = false)
    {
        if (! $admin) {
            $admin = $this->getMasterAdmin();
        }

        $this->actingAs($admin);

        return $admin;
    }

    protected function logout()
    {
        return auth()->logout();
    }
}
