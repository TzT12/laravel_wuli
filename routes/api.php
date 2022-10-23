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
Route::post('student/registed','StudentController@Zt_registered');//注册
Route::post('student/login','StudentController@Zt_login');//登录
Route::get('student/select_student_info','StudentController@Zt_select_info')->middleware('jwt.auth');//显示学生个人信息
Route::get('student/select_info','StudentController@Zt_select_name')->middleware('jwt.auth');//显示学生姓名
