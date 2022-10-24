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
Route::prefix('student')->group(function (){
    Route::post('registed','StudentController@Zt_registered');//注册
    Route::post('login','StudentController@Zt_login');//登录
    Route::get('select_student_info','StudentController@Zt_select_info')->middleware('jwt.auth');//显示学生个人信息
    Route::get('select_info','StudentController@Zt_select_name')->middleware('jwt.auth');//显示学生姓名
    Route::post('create_answer_danbai','DanBaiController@Zt_gainAnswer')->middleware('jwt.auth');//接收实验一单摆答案并判分
    Route::post('create_answer_oumu','OuMuController@Zt_gainAnswer')->middleware('jwt.auth');//接收实验一单摆答案并判分
    Route::post('create_answer_shiboqi','ShiBoQiController@Zt_gainAnswer')->middleware('jwt.auth');//接收实验一单摆答案并判分
    Route::post('create_answer_zizu','ZiZuController@Zt_gainAnswer')->middleware('jwt.auth');//接收实验一单摆答案并判分
});
