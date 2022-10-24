<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DanBai extends Model
{
    use Notifiable ;

    protected $table = 'danbai';
    protected $guarded = [];
    public $timestamps = true;

    /**
     *从前端接收单摆答案并自动判分
     */
    public static function Zt_gainAnswer($request){
        $grade_xtp = 0;
        $class = $request['class'];
        $account = auth('api')->user()->account;
        $tk1 = $request['tk1'];
        if ($tk1 == 1.967){
            $grade_xtp += 5;
        }
        $a1 = $request['a1'];
        if ($a1 == 1.662){
            $grade_xtp += 3;
        }
        $a2 = $request['a2'];
        if ($a2 == 1.702){
            $grade_xtp += 3;
        }
        $a3 = $request['a3'];
        if ($a3 == 1.672){
            $grade_xtp += 3;
        }
        $a4 = $request['a4'];
        if ($a4 == 1.672){
            $grade_xtp += 3;
        }
        $a5 = $request['a5'];
        if ($a5 == 1.692){
            $grade_xtp += 3;
        }
        $a6 = $request['a6'];
        if ($a6 == 1.721){
            $grade_xtp += 3;
        }
        $a7 = $request['a7'];
        if ($a7 == 1.687){
            $grade_xtp += 3;
        }
        $a8 = $request['a8'];
        if ($a8 == 0.025){
            $grade_xtp += 3;
        }
        $a9 = $request['a9'];
        if ($a9 == 0.015){
            $grade_xtp += 3;
        }
        $a10 = $request['a10'];
        if ($a10 == 0.015){
            $grade_xtp += 3;
        }
        $a11 = $request['a11'];
        if ($a11 == 0.015){
            $grade_xtp += 3;
        }
        $a12 = $request['a12'];
        if ($a12 == 0.005){
            $grade_xtp += 3;
        }
        $a13 = $request['a13'];
        if ($a13 == 0.034){
            $grade_xtp += 3;
        }
        $a14 = $request['a14'];
        if ($a14 == 0.018){
            $grade_xtp += 3;
        }
        $b1 = $request['b1'];
        if ($b1 == 1.687){
            $grade_xtp += 2;
        }
        $b2 = $request['b2'];
        if ($b2 == 0.018){
            $grade_xtp += 2;
        }
        $b3 = $request['b3'];
        if ($b3 == 91.78){
            $grade_xtp += 5;
        }
        $py = $request['py'];//老师批阅
        $xz1 = $request['xz1'];
        if ($xz1 == 'C'){
            $grade_xtp += 5;
        }
        $xz2 = $request['xz2'];
        if ($xz2 == 'C'){
            $grade_xtp += 5;
        }
        $xz3 = $request['xz3'];
        if ($xz3 == 'A'){
            $grade_xtp += 5;
        }
        try {
            $data = self::create([
                'class' => $class,
                'account' => $account,
                'tk1' => $tk1,
                'a1' => $a1,
                'a2' => $a2,
                'a3' => $a3,
                'a4' => $a4,
                'a5' => $a5,
                'a6' => $a6,
                'a7' => $a7,
                'a8' => $a8,
                'a9' => $a9,
                'a10' => $a10,
                'a11' => $a11,
                'a12' => $a12,
                'a13' => $a13,
                'a14' => $a14,
                'b1' => $b1,
                'b2' => $b2,
                'b3' => $b3,
                'py' => $py,
                'xz1' => $xz1,
                'xz2' => $xz2,
                'xz3' => $xz3,
                'grade_xtp' => $grade_xtp,
            ]);
            return $data ?
                $data :
                false;
        }catch (\Exception $e) {
            logError('学生注册失败!', [$e->getMessage()]);
            die($e->getMessage());
            return false;
        }
    }
}
