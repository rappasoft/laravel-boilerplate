<?php

Route::group(['prefix'=>'content', 'namespace'=>'Content'], function(){
    Route::resource('article', 'ArticleController', ['except' => ['show']]);
    
    Route::get('article', 'ArticleController@index')->name('admin.content.article');
    Route::get('article/create', 'ArticleController@create')->name('admin.content.article.create');
    Route::get('article/view', 'ArticleController@view')->name('admin.content.article.view');
    Route::get('article/edit', 'ArticleController@edit')->name('admin.content.article.edit');
    Route::post('article/update', 'ArticleController@update')->name('admin.content.article.update');
    Route::get('article/destroy', 'ArticleController@destroy')->name('admin.content.article.destroy');
    Route::get('article/restore', 'ArticleController@restore')->name('admin.content.article.restore');
//    Route::post('article/store', 'ArticleController@create')->name('admin.content.article.store');
});