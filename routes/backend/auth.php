<?php

use App\Domains\Auth\Http\Controllers\Backend\Auth\Role\RoleController;
use App\Domains\Auth\Http\Controllers\Backend\Auth\User\UserController;

// All route names are prefixed with 'admin.auth'.
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    'middleware' => ['permission:access.*', 'password.confirm:frontend.auth.password.confirm'],
], function () {
    // User Management
    Route::group(['prefix' => 'user', 'middleware' => 'permission:access.users.*'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index')->middleware('permission:access.users.view');
        Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware(['permission:access.users.create']);
        Route::post('/', [UserController::class, 'store'])->name('user.store')->middleware(['permission:access.users.create']);

        // Specific User
        Route::group(['prefix' => '{user}'], function () {
        });
    });

    // Role Management
    Route::group(['prefix' => 'role', 'middleware' => 'permission:access.roles.*'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index')->middleware('permission:access.roles.view');
        Route::get('create', [RoleController::class, 'create'])->name('role.create')->middleware(['permission:access.roles.create']);
        Route::post('/', [RoleController::class, 'store'])->name('role.store')->middleware('permission:access.roles.create');

        Route::group(['prefix' => '{role}'], function () {
            Route::get('edit', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:access.roles.update');
            Route::patch('/', [RoleController::class, 'update'])->name('role.update')->middleware('permission:access.roles.update');
            Route::delete('/', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:access.roles.delete');
        });
    });
});
