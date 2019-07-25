<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//基础路由
Route::get('/basic1', function () {
    return 'hello World';
});

//基础路由
Route::post('/basic2', function () {
    return 'Basic2';
});

//多请求路由
Route::match(['get', 'post'], 'multy1', function () {
    return 'multy1';
});

//多请求路由，响应所以请求
Route::any('multy2', function () {
    return 'multy2';
});

//路由参数
//Route::get('user/{id}', function ($id) {
//    return 'User-id-' . $id;
//});
//
//Route::get('user/{name?}', function ($name = null) {
//    return 'User-name-' . $name;
//});

//Route::get('user/{name?}', function ($name = 'sean') {
//    return 'User-name-' . $name;
//});

//Route::get('user/{name?}', function ($name = 'sean') {
//    return 'User-name-' . $name;
//})->where('name', '[A-Za-z]+');

//Route::get('user/{name?}', function ($id, $name = 'sean') {
//    return 'User-id-' . $id . 'User-name-' . $name;
//})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

//路由别名
//Route::get('/user/center', ['as' => 'center', function() {
//    return route('center');
//}]);

//路由群组
Route::group(['prefix' => 'member'], function () {
    Route::get('/user/center', ['as' => 'center', function() {
        return route('center');
    }]);
    Route::any('multy2', function () {
        return 'member-multy2';
    });
});

//在路由中输出视图
Route::get('/view', function () {
    return view('welcome');
});