<?php
/*
 * 博客项目接口
 */
Route::any('/test', ['uses' => 'Blog\AppController@test']);
Route::any('/add', ['uses' => 'Blog\AppController@add']);
Route::any('/query', ['uses' => 'Blog\AppController@query']);
Route::any('/clear', ['uses' => 'Blog\AppController@clear']);