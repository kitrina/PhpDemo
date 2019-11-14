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

/*
 * 路由
 * 简单的说就是将用户的请求转发给相应的程序进行处理
 * 作用就是建立url和程序之间的映射
 * 请求类型 get、post、put、patch、delete
 */
//基础路由get
//Route::get('/basic1', function () {
//    return 'hello World';
//});

//基础路由post
//Route::post('/basic2', function () {
//    return 'Basic2';
//});

//多请求路由
//Route::match(['get', 'post'], 'multy1', function () {
//    return 'multy1';
//});

//多请求路由，响应所有请求
//Route::any('multy2', function () {
//    return 'multy2';
//});

//路由参数
//Route::get('user/{id}', function ($id) {
//    return 'User-id-' . $id;
//});

//可选参数
//Route::get('user/{name?}', function ($name = null) {
//    return 'User-name-' . $name;
//});

//可选参数带默认值
//Route::get('user/{name?}', function ($name = 'sean') {
//    return 'User-name-' . $name;
//});

//正则表达式校验参数
//Route::get('user/{name?}', function ($name = 'sean') {
//    return 'User-name-' . $name;
//})->where('name', '[A-Za-z]+');

//多参数正则表达式校验
//Route::get('user/{id}/{name?}', function ($id, $name = 'sean') {
//    return 'User-id-' . $id . 'User-name-' . $name;
//})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

//路由别名
//Route::get('/user/center', ['as' => 'center', function() {
//    return route('center');
//}]);

//路由群组
//Route::group(['prefix' => 'member'], function () {
//    Route::get('/user/center', ['as' => 'center', function() {
//        return route('center');
//    }]);
//    Route::any('multy2', function () {
//        return 'member-multy2';
//    });
//});

//在路由中输出视图
//Route::get('/view', function () {
//    return view('welcome');
//});

/*
 * 控制器
 * 1、怎么建立一个控制器
 * 2、控制器和路由怎样进行关联
 * 3、关联控制器后，路由的特性怎么用
 */
//路由控制器关联方法一
//Route::get('/member/info', 'MemberController@info');

//路由控制器关联方法二
//Route::get('/member/info', ['uses' => 'MemberController@info']);

//post请求使用控制器
//Route::post('/member/info', ['uses' => 'MemberController@info']);

//any请求使用控制器
//Route::any('/member/info', ['uses' => 'MemberController@info']);

//控制器和别名使用
//Route::any('/member/info', [
//    'uses' => 'MemberController@info',
//    'as' => 'memberinfo'
//]);

//控制器参数绑定
//Route::any('/member/{id}', ['uses' => 'MemberController@info'])
//->where('id', '[0-9]+');

//5.2废弃
//Route::controller('member', 'MemberController');

/*
 * 视图
 */
//1、怎样新建视图
//    info.php          //laravel支持原生php
//    info.blade.php    //laravel默认模板
//2、怎样输出视图
//    return view('info');
//    return view('member/info');
//    return view('member/info', ['name' => 'sean']);

/*
 * 模型
 */
//1、怎样新建模型
//2、怎样使用模型

/*
 * 数据库
 * Laravel中提供DB facade(原始查找)、查询构造器和Eloquent ORM三种操作数据库方式
 */
//1、新建数据库表与连接数据库
//MAMP 数据库后台 http://localhost:8888/phpmyadmin
//laravel数据库设置文件/config/database.php 对应 env 文件参数
//2、使用DB facade实现CURD
//Route::any('/test1', ['uses' => 'StudentController@test1']);

/*
 * 使用查询构造器操作数据库
 * Laravel查询构造器（query builder）提供方便、流畅的接口，用来建立及执行数据库查找语法
 * 使用 PDO 参数绑定，以保护应用程序免于 SQL 注入因此传入的参数不需要额外转义特殊字符
 * 基本可以满足所有的数据库操作，而且在所有支持的数据库系统上都可以执行
 */
//1、使用查询构造器新增数据
//Route::any('/query1', ['uses' => 'StudentController@query1']);
//2、使用查询构造器修改数据
//Route::any('/query2', ['uses' => 'StudentController@query2']);
//3、使用查询构造器删除数据
//Route::any('/query3', ['uses' => 'StudentController@query3']);
//4、使用查询构造器查询数据
//Route::any('/query4', ['uses' => 'StudentController@query4']);
//5、使用查询构造器的聚合函数
//Route::any('/query5', ['uses' => 'StudentController@query5']);

/*
 * 使用ORM操作数据库
 * Laravel 所自带的 Eloquent ORM 是一个优美、简洁的 ActiveRecord 实现，用来实现数据库操作
 * 每个数据表都有一个与之对应的"模型（Model）" 用于和数据表交互
 */
//1、Eloquent ORM简介、模型的建立及查询数据
//Route::any('/orm1', ['uses' => 'StudentController@orm1']);
//2、Eloquent ORM中新增数据、自定义时间戳及批量赋值的使用
//Route::any('/orm2', ['uses' => 'StudentController@orm2']);
//3、使用Eloquent ORM修改数据
//Route::any('/orm3', ['uses' => 'StudentController@orm3']);
//4、使用Eloquent ORM删除数据
//Route::any('/orm4', ['uses' => 'StudentController@orm4']);

/*
 * Blade模板引擎
 * Blade 是 Laravel 提供的一个既简单又强大的模板引擎
 * 和其他流行的 PHP 模板引擎不一样，Blade 并不限制你在视图（view）中使用原生 PHP 代码
 * 所有 Blade 视图页面都将被编译成原生 PHP 代码并缓存起来，除非你的模板文件被修改了，否则不会重新编译
 */
//1、模板继承（section、yield、extends、parent）
//2、基础语法及include的使用
//3、流程控制（if、unless、for、foreach）
Route::any('section1', ['uses' => 'StudentController@section1']);
//4、模板中的URL（url()、action()、route()）
Route::any('urlTest', ['as' => 'url', 'uses' => 'StudentController@urlTest']);

/*
 * Controller 之 Request、Session、Response、Middleware
 */
//1、Request
//Laravel中的请求使用的是symfony/http-foundation组件
//请求里面存放了 $_GET、$_POST、$_COOKIE、$_FILES、$_SERVER等数据
Route::any('request1', ['uses' => 'StudentController@request1']);

//2、Session
//由于HTTP协定是无状态的（Stateless）的，所以session提供一种保存用户数据的方法
//Laravel支持了多种session后端驱动，并提供清楚、统一的 API。也内置支持如Memcached、Redis和数据库的后端驱动。默认使用"file"的Session驱动。
//session的配置文件配置在config/session.php中
Route::group(['middleware' => ['web']], function() {
    Route::any('session1', ['uses' => 'StudentController@session1']);
    Route::any('session2', [
        'as' => 'session2',
        'uses' => 'StudentController@session2'
    ]);
    //3、Response
    Route::any('response', ['uses' => 'StudentController@response']);
});

//4、Middleware
//Laravel中间件提供一个方便的机制来过滤进入应用程序的 HTTP 请求
// 宣传页面
Route::any('activity0', ['uses' => 'StudentController@activity0']);
// 活动页面
Route::group(['middleware' => ['activity']], function() {
    Route::any('activity1', ['uses' => 'StudentController@activity1']);
    Route::any('activity2', ['uses' => 'StudentController@activity2']);
});

/*
 * app接口测试
 */
Route::post('/app/test', ['uses' => 'AppController@test']);
Route::post('/app/test2', function () {
    return 'data';
});
Route::get('/basic1', function () {
    return 'hello World';
});
