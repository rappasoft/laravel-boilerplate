<?php

use App\Domains\Auth\Http\Controllers\Backend\Example\DeletedExampleController;
use App\Domains\Auth\Http\Controllers\Backend\Example\ExampleController;
use App\Domains\Auth\Models\Example;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
], function () {
    Route::group([
        'prefix' => 'example',
        'as' => 'example.',
    ], function () {
        Route::group([
            'middleware' => 'role:' . config('boilerplate.access.role.admin'),
        ], function () {
            Route::get('deleted', [DeletedExampleController::class, 'index'])
                ->name('deleted')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.example.index')
                        ->push(__('Deleted Examples'), route('admin.auth.example.deleted'));
                });

            Route::get('create', [ExampleController::class, 'create'])
                ->name('create')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.example.index')
                        ->push(__('Create Example'), route('admin.auth.example.create'));
                });

            Route::get('/', [ExampleController::class, 'index'])
                ->name('index')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.dashboard')
                        ->push(__('Example Management'), route('admin.auth.example.index'));
                });
            Route::post('/', [ExampleController::class, 'store'])->name('store');

            Route::group(['prefix' => '{example}'], function () {
                Route::get('/', [ExampleController::class, 'show'])
                    ->name('show')
                    ->middleware('permission:admin.access.example.list')
                    ->breadcrumbs(function (Trail $trail, Example $example) {
                        $trail->parent('admin.auth.example.index')
                            ->push($example->name, route('admin.auth.example.show', $example));
                    });

                Route::get('edit', [ExampleController::class, 'edit'])
                    ->name('edit')
                    ->breadcrumbs(function (Trail $trail, Example $example) {
                        $trail->parent('admin.auth.example.show', $example)
                            ->push(__('Edit'), route('admin.auth.example.edit', $example));
                    });

                Route::patch('/', [ExampleController::class, 'update'])->name('update');
                Route::delete('/', [ExampleController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => '{deletedExample}'], function () {
                Route::patch('restore', [DeletedExampleController::class, 'update'])->name('restore');
                Route::delete('permanently-delete', [DeletedExampleController::class, 'destroy'])->name('permanently-delete');
            });
        });
    });
});
