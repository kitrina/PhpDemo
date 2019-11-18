<?php
/*
 * 博客项目接口
 */
Route::any('/app/add', ['uses' => 'Blog\AppController@add']);
Route::any('/app/query', ['uses' => 'Blog\AppController@query']);
Route::any('/app/clear', ['uses' => 'Blog\AppController@clear']);