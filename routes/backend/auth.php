<?php

use App\Domains\Auth\Http\Controllers\Backend\Role\RoleController;
use App\Domains\Auth\Http\Controllers\Backend\User\DeactivatedUserController;
use App\Domains\Auth\Http\Controllers\Backend\User\DeletedUserController;
use App\Domains\Auth\Http\Controllers\Backend\User\UserController;
use App\Domains\Auth\Http\Controllers\Backend\User\UserPasswordController;
use App\Domains\Auth\Http\Controllers\Backend\User\UserSessionController;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.auth'.
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    'middleware' => config('boilerplate.access.middleware.confirm'),
], function () {
    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function () {
        Route::group([
            'middleware' => 'role:'.config('boilerplate.access.role.admin'),
        ], function () {
            Route::get('deleted', [DeletedUserController::class, 'index'])
                ->name('deleted')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.user.index')
                        ->push(__('Deleted Users'), route('admin.auth.user.deleted'));
                });

            Route::get('create', [UserController::class, 'create'])
                ->name('create')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.user.index')
                        ->push(__('Create User'), route('admin.auth.user.create'));
                });

            Route::post('/', [UserController::class, 'store'])->name('store');

            Route::group(['prefix' => '{user}'], function () {
                Route::get('edit', [UserController::class, 'edit'])
                    ->name('edit')
                    ->breadcrumbs(function (Trail $trail, User $user) {
                        $trail->parent('admin.auth.user.show', $user)
                            ->push(__('Edit'), route('admin.auth.user.edit', $user));
                    });

                Route::patch('/', [UserController::class, 'update'])->name('update');
                Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => '{deletedUser}'], function () {
                Route::patch('restore', [DeletedUserController::class, 'update'])->name('restore');
                Route::delete('permanently-delete', [DeletedUserController::class, 'destroy'])->name('permanently-delete');
            });
        });

        Route::group([
            'middleware' => 'permission:admin.access.user.list|admin.access.user.deactivate|admin.access.user.reactivate|admin.access.user.clear-session|admin.access.user.impersonate|admin.access.user.change-password',
        ], function () {
            Route::get('deactivated', [DeactivatedUserController::class, 'index'])
                ->name('deactivated')
                ->middleware('permission:admin.access.user.reactivate')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.user.index')
                        ->push(__('Deactivated Users'), route('admin.auth.user.deactivated'));
                });

            Route::get('/', [UserController::class, 'index'])
                ->name('index')
                ->middleware('permission:admin.access.user.list|admin.access.user.deactivate|admin.access.user.clear-session|admin.access.user.impersonate|admin.access.user.change-password')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.dashboard')
                        ->push(__('User Management'), route('admin.auth.user.index'));
                });

            Route::group(['prefix' => '{user}'], function () {
                Route::get('/', [UserController::class, 'show'])
                    ->name('show')
                    ->middleware('permission:admin.access.user.list')
                    ->breadcrumbs(function (Trail $trail, User $user) {
                        $trail->parent('admin.auth.user.index')
                            ->push($user->name, route('admin.auth.user.show', $user));
                    });

                Route::patch('mark/{status}', [DeactivatedUserController::class, 'update'])
                    ->name('mark')
                    ->where(['status' => '[0,1]'])
                    ->middleware('permission:admin.access.user.deactivate|admin.access.user.reactivate');

                Route::post('clear-session', [UserSessionController::class, 'update'])
                    ->name('clear-session')
                    ->middleware('permission:admin.access.user.clear-session');

                Route::get('password/change', [UserPasswordController::class, 'edit'])
                    ->name('change-password')
                    ->middleware('permission:admin.access.user.change-password')
                    ->breadcrumbs(function (Trail $trail, User $user) {
                        $trail->parent('admin.auth.user.show', $user)
                            ->push(__('Change Password'), route('admin.auth.user.change-password', $user));
                    });

                Route::patch('password/change', [UserPasswordController::class, 'update'])
                    ->name('change-password.update')
                    ->middleware('permission:admin.access.user.change-password');
            });
        });
    });

    Route::group([
        'prefix' => 'role',
        'as' => 'role.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [RoleController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Role Management'), route('admin.auth.role.index'));
            });

        Route::get('create', [RoleController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.role.index')
                    ->push(__('Create Role'), route('admin.auth.role.create'));
            });

        Route::post('/', [RoleController::class, 'store'])->name('store');

        Route::group(['prefix' => '{role}'], function () {
            Route::get('edit', [RoleController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, Role $role) {
                    $trail->parent('admin.auth.role.index')
                        ->push(__('Editing :role', ['role' => $role->name]), route('admin.auth.role.edit', $role));
                });

            Route::patch('/', [RoleController::class, 'update'])->name('update');
            Route::delete('/', [RoleController::class, 'destroy'])->name('destroy');
        });
    });
});
