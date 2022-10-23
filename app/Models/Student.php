<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends  Authenticatable implements JWTSubject
{
    use Notifiable ;

    protected $table = 'student';
    protected $guarded = [];
    public $timestamps = true;
    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCusptomClaims() method.
        return ['role'=>'user'];
    }


    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
        return $this->getKey();
    }
    /**
     * 学生注册
     */
    public static function Zt_createStudent($request){
        $account = $request['account'];
        $password = $request['password'];
        $student_name = $request['student_name'];
        $level = $request['level'];
        $form = $request['form'];
        $pre = $request['pre'];
        $class = $request['class'];
        $teacher_name = $request['teacher_name'];
        $verify = $request['verify'];
        $verify_select = DB::table('verify')->where('teacher_name','=',$teacher_name)->select('verify')->value('verify');
        $account_ver = preg_match("/^\d*$/",$account);
        $password_ver = preg_match('/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,18}/', $password);
        if($account_ver == 1 && $password_ver == 1 && $verify = $verify_select){
            try {
                $student_id = self::create([
                    'account' => $account,
                    'password' => $password,
                    'student_name' => $student_name,
                    'level' => $level,
                    'form' => $form,
                    'pre' => $pre,
                    'class' => $class,
                    'teacher_name' => $teacher_name,
                ]);
                return $student_id ?
                    $student_id :
                    false;
            } catch (\Exception $e) {
                logError('学生注册失败!', [$e->getMessage()]);
                die($e->getMessage());
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     *查询该学生是否注册
     */
    public static function Zt_checknumber($request)
    {
        $student_job_number = $request['account'];
        try{
            $count = Student::select('account')
                ->where('account',$student_job_number)
                ->count();
            return $count;
        }catch (\Exception $e) {
            logError("账号查询失败！", [$e->getMessage()]);
            return false;
        }
    }
    /**
     * 显示学生信息
     */
    public static function Zt_selectStudent($account){
        try {
            $data = self::where('account','=', $account)->get();
            return $data ?
                $data :
                false;
        } catch (\Exception $e) {
            logError('操作失败', [$e->getMessage()]);
            return false;
        }
    }

    /**
     * 显示学生姓名
     */
    public static function Zt_selectStudentName($account){
        try {
            $data = self::where('account','=', $account)->value('student_name');
            return $data ?
                $data :
                false;
        } catch (\Exception $e) {
            logError('操作失败', [$e->getMessage()]);
            return false;
        }
    }
}
