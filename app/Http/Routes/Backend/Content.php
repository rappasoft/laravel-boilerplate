<?php

Route::group(['prefix'=>'content', 'namespace'=>'Content'], function(){
    Route::resource('article', 'ArticleController', ['except' => ['show']]);
    
    Route::get('article', 'ArticleController@index')->name('admin.content.article');
    Route::get('article/create', 'ArticleController@create')->name('admin.content.article.create');
    Route::get('article/view/{id}', 'ArticleController@view')->name('admin.content.article.view');
    Route::get('article/edit/{id}', 'ArticleController@edit')->name('admin.content.article.edit');
    Route::post('article/update/{id}', 'ArticleController@update')->name('admin.content.article.update');
    Route::get('article/destroy/{id}', 'ArticleController@destroy')->name('admin.content.article.destroy');
    Route::get('article/restore/{id}', 'ArticleController@restore')->name('admin.content.article.restore');
//    Route::post('article/store', 'ArticleController@create')->name('admin.content.article.store');
    
    Route::resource('article-category', 'ArticleCategoryController', ['except' => ['show']]);
    
    Route::get('article-category', 'ArticleCategoryController@index')->name('admin.content.article-category');
    Route::get('article-category/create', 'ArticleCategoryController@create')->name('admin.content.article-category.create');
    Route::get('article-category/view/{id}', 'ArticleCategoryController@view')->name('admin.content.article-category.view');
    Route::get('article-category/edit/{id}', 'ArticleCategoryController@edit')->name('admin.content.article-category.edit');
    Route::post('article-category/update/{id}', 'ArticleCategoryController@update')->name('admin.content.article-category.update');
    Route::get('article-category/destroy/{id}', 'ArticleCategoryController@destroy')->name('admin.content.article-category.destroy');
    Route::get('article-category/restore/{id}', 'ArticleCategoryController@restore')->name('admin.content.article-category.restore');
});