<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class  StudentController extends Controller
{
    /**
     * 注册
     */
    public function Zt_registered(Request $request){
        $count = Student::Zt_checknumber($request);  //检测账号密码是否存在
        if($count == 0)
        {
            $student_id = Student::Zt_createStudent(self::Zt_studentHandle($request));
            return  $student_id ?
                json_success('注册成功!',$student_id,200  ) :
                json_fail('注册失败!',null,100  ) ;
        }
        else{
            return
                json_success('注册失败!该工号已经注册过了！',null,100  ) ;
        }
    }

    /**
     *登录
     */

    public function Zt_login(Request $request)
    {

        $getInfo = self::Zt_getInfo($request);   //从前端获取账号密码
        $token = auth('api')->attempt($getInfo);   //获取token
        //$token = JWTAuth::fromUser($getInfo);
        return $token?
            json_success('登录成功!',$token,  200):
            json_fail('登录失败!账号或密码错误',null, 100 ) ;
    }

    /**
     *显示学生信息
     */
    public function Zt_select_info(Request $request){
        $account = auth('api')->user()->account;
        $data = Student::Zt_selectStudent($account);
        return $data?
            json_success('登录成功!',$data,  200):
            json_fail('登录失败!账号或密码错误',null, 100 ) ;

    }

    /**
     *显示学生姓名
     */
    public function Zt_select_name(Request $request){
        $account = auth('api')->user()->account;
        $data = Student::Zt_selectStudentName($account);
        return $data?
            json_success('查询学生姓名成功!',$data,  200):
            json_fail('查询学生姓名失败!',null, 100 ) ;

    }

    //封装token的返回方式
    protected function respondWithToken($token, $msg){
        return json_success( $msg, array(
            'token' => $token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ),200);
    }

    //从前端获取账号密码
    protected function Zt_getInfo($request){
        return ['account' => $request['account'], 'password' => $request['password']];
    }

    //对密码进行哈希256加密
    protected function Zt_studentHandle($request){
        $registeredInfo = $request->except('password_confirmation');
        $registeredInfo['password'] = bcrypt($registeredInfo['password']);
//        $registeredInfo['account'] = $registeredInfo['account'];
//        $registeredInfo['student_name'] = $registeredInfo['student_name'];
//        $registeredInfo['level'] = $registeredInfo['level'];
//        $registeredInfo['form'] = $registeredInfo['form'];
//        $registeredInfo['pre'] = $registeredInfo['pre'];
//        $registeredInfo['class'] = $registeredInfo['class'];
//        $registeredInfo['teacher_name'] = $registeredInfo['teacher_name'];
        return $registeredInfo;
    }
}
