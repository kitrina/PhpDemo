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

Route::get('/get-demo', function () {
    getParams();
});

Route::post('/post-demo', function () {
    postParams();
});

Route::post('/post-json', function () {
    postJson();
});

function getParams()
{
    $id = $_GET['id'];
    $name = $_GET['name'];

    echo $id . ' ' . $name;
}


function postParams() {
    $first = $_GET['id'];
    $second = $_GET['name'];

    echo $first . ' ' . $second;
}

function postJson() {
    $re = file_get_contents("php://input");
    $reArr = json_decode($re, true);

    $first = $reArr['id'];
    $second = $reArr['name'];

    echo $first . ' ' . $second;
}
