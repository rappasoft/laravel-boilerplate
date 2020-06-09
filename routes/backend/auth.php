<?php

use App\Domains\Auth\Http\Controllers\Backend\Auth\Role\RoleController;
use App\Domains\Auth\Http\Controllers\Backend\Auth\User\DeactivatedUserController;
use App\Domains\Auth\Http\Controllers\Backend\Auth\User\DeletedUserController;
use App\Domains\Auth\Http\Controllers\Backend\Auth\User\UserController;
use App\Domains\Auth\Http\Controllers\Backend\Auth\User\UserPasswordController;
use App\Domains\Auth\Http\Controllers\Backend\Auth\User\UserSessionController;

// All route names are prefixed with 'admin.auth'.
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    'middleware' => 'password.confirm:frontend.auth.password.confirm',
], function () {
    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function () {
        Route::group([
            'middleware' => 'role:'.config('boilerplate.access.roles.admin'),
        ], function () {
            Route::get('deleted', [DeletedUserController::class, 'index'])->name('deleted');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');

            Route::group(['prefix' => '{user}'], function () {
                Route::get('edit', [UserController::class, 'edit'])->name('edit');
                Route::patch('/', [UserController::class, 'update'])->name('update');
                Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => '{deletedUser}'], function () {
                Route::get('restore', [DeletedUserController::class, 'update'])->name('restore');

                if (config('boilerplate.access.users.permanently_delete')) {
                    Route::delete('permanently-delete', [DeletedUserController::class, 'destroy'])->name('permanently-delete');
                }
            });
        });

        Route::group([
            'middleware' => 'permission:access.users.list,deactivate,reactivate,clear-session,impersonate,change-password',
        ], function () {
            Route::get('deactivated', [DeactivatedUserController::class, 'index'])
                ->name('deactivated')
                ->middleware('permission:access.users.reactivate');

            Route::get('/', [UserController::class, 'index'])
                ->name('index')
                ->middleware('permission:access.users.list,deactivate,clear-session,impersonate,change-password');

            Route::group(['prefix' => '{user}'], function () {
                Route::get('/', [UserController::class, 'show'])
                    ->name('show')
                    ->middleware('permission:access.users.list');

                Route::get('mark/{status}', [DeactivatedUserController::class, 'update'])
                    ->name('mark')
                    ->where(['status' => '[0,1]'])
                    ->middleware('permission:access.users.deactivate,reactivate');

                Route::get('clear-session', [UserSessionController::class, 'update'])
                    ->name('clear-session')
                    ->middleware('permission:access.users.clear-session');

                Route::get('password/change', [UserPasswordController::class, 'edit'])
                    ->name('change-password')
                    ->middleware('permission:access.users.change-password');

                Route::patch('password/change', [UserPasswordController::class, 'update'])
                    ->name('change-password.update')
                    ->middleware('permission:access.users.change-password');
            });
        });
    });

    Route::group([
        'prefix' => 'role',
        'as' => 'role.',
        'middleware' => 'role:'.config('boilerplate.access.roles.admin'),
    ], function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('create', [RoleController::class, 'create'])->name('create');
        Route::post('/', [RoleController::class, 'store'])->name('store');

        Route::group(['prefix' => '{role}'], function () {
            Route::get('edit', [RoleController::class, 'edit'])->name('edit');
            Route::patch('/', [RoleController::class, 'update'])->name('update');
            Route::delete('/', [RoleController::class, 'destroy'])->name('destroy');
        });
    });
});
