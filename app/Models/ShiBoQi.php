<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ShiBoQi extends Model
{
    use Notifiable ;

    protected $table = 'shiboqi';
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
        if ($tk1 == 1000.0){
            $grade_xtp += 2;
        }
        $tk2 = $request['tk2'];
        if ($tk2 == 5.0){
            $grade_xtp += 2;
        }
        $tk3 = $request['tk3'];
        if ($tk3 == 5.0){
            $grade_xtp += 2;
        }
        $tk4 = $request['tk4'];
        if ($tk4 == 1.0){
            $grade_xtp += 2;
        }
        $tk5 = $request['tk5'];
        if ($tk5 == 1.0){
            $grade_xtp += 2;
        }
        $tk6 = $request['tk6'];
        if ($tk6 == 1000.0){
            $grade_xtp += 2;
        }
        $tk7 = $request['tk7'];
        if ($tk7 == 1000.0){
            $grade_xtp += 2;
        }
        $a1 = $request['a1'];
        if ($a1 == 500.0){
            $grade_xtp += 2;
        }
        $a2 = $request['a2'];
        if ($a2 == 1000.0){
            $grade_xtp += 2;
        }
        $a3 = $request['a3'];
        if ($a3 == 2000.0){
            $grade_xtp += 2;
        }
        $a4 = $request['a4'];
        if ($a4 == 4.0){
            $grade_xtp += 2;
        }
        $a5 = $request['a5'];
        if ($a5 == 5.0){
            $grade_xtp += 2;
        }
        $a6 = $request['a6'];
        if ($a6 == 5.0){
            $grade_xtp += 2;
        }
        $a7 = $request['a7'];
        if ($a7 == 2.0){
            $grade_xtp += 2;
        }
        $a8 = $request['a8'];
        if ($a8 == 1.0){
            $grade_xtp += 2;
        }
        $a9 = $request['a9'];
        if ($a9 == 0.5){
            $grade_xtp += 2;
        }
        $a10 = $request['a10'];
        if ($a10 == 500.0){
            $grade_xtp += 2;
        }
        $a11 = $request['a11'];
        if ($a11 == 1000.0){
            $grade_xtp += 2;
        }
        $a12 = $request['a12'];
        if ($a12 == 2000.0){
            $grade_xtp += 2;
        }
        $c1 = $request['c1'];
        if ($c1 == 2000){
            $grade_xtp += 5;
        }
        $c2 = $request['c2'];
        if ($c2 == 1000){
            $grade_xtp += 5;
        }
        $c3 = $request['c3'];
        if ($c3 == 500){
            $grade_xtp += 5;
        }
        $c4 = $request['c4'];
        if ($c4 == 1000){
            $grade_xtp += 5;
        }
        $c5 = $request['c5'];
        if ($c5 == 1000){
            $grade_xtp += 5;
        }
        $c6 = $request['c6'];
        if ($c6 == 1000){
            $grade_xtp += 5;
        }
        $sk1 = $request['sk1'];
        if ($sk1 == 'B'){
            $grade_xtp += 2;
        }
        $sk2 = $request['sk2'];
        if ($sk2 == 'E'){
            $grade_xtp += 2;
        }
        $sk3 = $request['sk3'];
        if ($sk3 == 'F'){
            $grade_xtp += 2;
        }
        $sk4 = $request['sk4'];
        if ($sk4 == 'A'){
            $grade_xtp += 2;
        }
        $sk5= $request['sk5'];
        if ($sk5 == 'D'){
            $grade_xtp += 2;
        }
        $sk6 = $request['sk6'];
        if ($sk6 == 'A'){
            $grade_xtp += 2;
        }
        $sk7 = $request['sk7'];
        if ($sk7 == 'C'){
            $grade_xtp += 2;
        }
        $sk8 = $request['sk8'];
        if ($sk8 == 'B'){
            $grade_xtp += 2;
        }
        $sk9 = $request['sk9'];
        if ($sk9 == 'D'){
            $grade_xtp += 2;
        }
        $sk10 = $request['sk10'];
        if ($sk10 == 'G'){
            $grade_xtp += 2;
        }
        $pd1= $request['pd1'];
        if ($pd1 == 'F'){
            $grade_xtp += 4;
        }
        $pd2= $request['pd2'];
        if ($pd2 == 'T'){
            $grade_xtp += 4;
        }
        $pd3 = $request['pd3'];
        if ($pd1 == 'F'){
            $grade_xtp += 4;
        }
        try {
            $data = self::create([
                'class' => $class,
                'account' => $account,
                'tk1' => $tk1 ,
                'tk2' => $tk2 ,
                'tk3' => $tk3 ,
                'tk4' => $tk4 ,
                'tk5' => $tk5 ,
                'tk6' => $tk6 ,
                'tk7' => $tk7 ,
                'a1' => $a1,
                'a2' =>$a2 ,
                'a3' =>$a3 ,
                'a4' =>$a4 ,
                'a5' =>$a5,
                'a6' =>$a6 ,
                'a7' =>$a7 ,
                'a8' =>$a8 ,
                'a9' =>$a9 ,
                'a10' =>$a10 ,
                'a11' =>$a11 ,
                'a12' =>$a12 ,
                'c1' => $c1,
                'c2' => $c2,
                'c3' => $c3,
                'c4' => $c4,
                'c5' => $c5,
                'c6' => $c6,
                'sk1' => $sk1 ,
                'sk2' => $sk2 ,
                'sk3' => $sk3 ,
                'sk4' => $sk4 ,
                'sk5' => $sk5 ,
                'sk6' => $sk6 ,
                'sk7' => $sk7 ,
                'sk8' => $sk8 ,
                'sk9' => $sk9 ,
                'sk10' => $sk10 ,
                'pd1' => $pd1 ,
                'pd2' => $pd2 ,
                'pd3' => $pd3 ,
                'grade_xtp' =>$grade_xtp ,
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
