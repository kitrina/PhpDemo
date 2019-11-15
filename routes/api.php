<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * APP接口开发学习
 */
Route::get('/get-demo', function () {
   getParams();
});

Route::post('/post-form-urlencode', function () {
    postFormUrlEncode();
});

Route::post('/get-form-data', function () {
    postFormData();
});

Route::post('/post-json', function () {
    postJson();
});

function getParams()
{
    print_r($_GET);
    $id = $_GET['id'];
    $name = $_GET['name'];

    echo $id . ' ' . $name;
}

function postFormUrlEncode()
{
    print_r($_POST);
    $firstParam = $_POST['first_param'];
    $secondParam = $_POST['second_param'];

    echo $firstParam . ' ' . $secondParam;
}

function postFormData()
{
    print_r($_POST);
    $firstParam = $_POST['first_param'];
    $secondParam = $_POST['second_param'];

    echo $firstParam . ' ' . $secondParam;
}

function postJson()
{
    $re = file_get_contents("php://input");
    $reArr = json_decode($re, true);
    print_r($reArr);

    $firstParam = $reArr['first_param'];
    $secondParam = $reArr['second_param'];

    echo $firstParam . ' ' . $secondParam;
}

Route::get('/user/login', 'JwtLoginController@login');
Route::middleware(['jwt_auth'])->group(function () {
    Route::get('/user/info', 'UserController@info');
});