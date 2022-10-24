<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ZiZu extends Model
{

    use Notifiable ;

    protected $table = 'zizu';
    protected $guarded = [];
    public $timestamps = true;
    /**
     *从前端接收单摆答案并自动判分
     */
    public static function Zt_gainAnswer($request)
    {
        $grade_xtp = 0;
        $class = $request['class'];
        $account = auth('api')->user()->account;
        $a1 = $request['a1'];
        if ($a1 == 630.0) {
            $grade_xtp += 2;
        }
        $a2 = $request['a2'];
        if ($a2 == 630.0) {
            $grade_xtp += 2;
        }
        $a3 = $request['a3'];
        if ($a3 == 630.0) {
            $grade_xtp += 2;
        }
        $a4 = $request['a4'];
        if ($a4 == 630.0) {
            $grade_xtp += 2;
        }
        $a5 = $request['a5'];
        if ($a5 == 630.0) {
            $grade_xtp += 2;
        }
        $a6 = $request['a6'];
        if ($a6 == 630.0) {
            $grade_xtp += 2;
        }
        $a7 = $request['a7'];
        if ($a7 == 630.0) {
            $grade_xtp += 2;
        }
        $b1 = $request['b1'];
        if ($b1 == 630.0) {
            $grade_xtp += 2;
        }
        $b2 = $request['b2'];
        if ($b2 == 630.0) {
            $grade_xtp += 2;
        }
        $b3 = $request['b3'];
        if ($b3 == 630.0) {
            $grade_xtp += 2;
        }
        $b4 = $request['b4'];
        if ($b4 == 71.3) {
            $grade_xtp += 2;
        }
        $b5 = $request['b5'];
        if ($b5 == 7.0) {
            $grade_xtp += 2;
        }
        $b6 = $request['b6'];
        if ($b6 == 17.0) {
            $grade_xtp += 2;
        }
        $b7 = $request['b7'];
        if ($b7 == 38.0) {
            $grade_xtp += 2;
        }
        $b8 = $request['b8'];
        if ($b8 == 90.0) {
            $grade_xtp += 2;
        }
        $b9 = $request['b9'];
        if ($b9 == 74.1) {
            $grade_xtp += 2;
        }
        $b10 = $request['b10'];
        if ($b10 == 49.7) {
            $grade_xtp += 2;
        }
        $c1 = $request['c1'];
        if ($c1 == 694.0) {
            $grade_xtp += 2;
        }
        $c2 = $request['c2'];
        if ($c2 == 173.5) {
            $grade_xtp += 2;
        }
        $c3 = $request['c3'];
        if ($c3 == 186.7) {
            $grade_xtp += 2;
        }
        $c4 = $request['c4'];
        if ($c4 == 347.0) {
            $grade_xtp += 2;
        }
        $c5 = $request['c5'];
        if ($c5 == 347.0) {
            $grade_xtp += 2;
        }
        $c6 = $request['c6'];
        if ($c6 == 746.8) {
            $grade_xtp += 2;
        }
        $c7 = $request['c7'];
        if ($c7 == 480.3) {
            $grade_xtp += 2;
        }
        $d1 = $request['d1'];
        if ($d1 == 694.0) {
            $grade_xtp += 2;
        }
        $d2 = $request['d2'];
        if ($d2 == 173.5) {
            $grade_xtp += 2;
        }
        $d3 = $request['d3'];
        if ($d3 == 186.7) {
            $grade_xtp += 2;
        }
        $d4 = $request['d4'];
        if ($d4 == 8.0) {
            $grade_xtp += 2;
        }
        $d5 = $request['d5'];
        if ($d5 == 4.1) {
            $grade_xtp += 2;
        }
        $d6 = $request['d6'];
        if ($d6 == 6.4) {
            $grade_xtp += 2;
        }
        $d7 = $request['d7'];
        if ($d7 == 86.8) {
            $grade_xtp += 2;
        }
        $d8 = $request['d8'];
        if ($d8 == 42.3) {
            $grade_xtp += 2;
        }
        $d9 = $request['d9'];
        if ($d9 == 29.2) {
            $grade_xtp += 2;
        }
        $d10 = $request['d10'];
        if ($d10 == 52.8) {
            $grade_xtp += 2;
        }
        $xz1 = $request['xz1'];
        if ($xz1 == 'A') {
            $grade_xtp += 10;
        }
        $xz2 = $request['xz2'];
        if ($xz2 == 'C') {
            $grade_xtp += 10;
        }
        $pd1 = $request['pd1'];
        if ($pd1 == 'T') {
            $grade_xtp += 6;
        }
        $pd2 = $request['pd2'];
        if ($pd2 == 'F') {
            $grade_xtp += 6;
        }
        try {
            $data = self::create([
                'class' => $class,
                'account' => $account,
                'a1' => $a1,
                'a2' => $a2,
                'a3' => $a3,
                'a4' => $a4,
                'a5' => $a5,
                'a6' => $a6,
                'a7' => $a7,
                'b1' => $b1,
                'b2' => $b2,
                'b3' => $b3,
                'b4' => $b4,
                'b5' => $b5,
                'b6' => $b6,
                'b7' => $b7,
                'b8' => $b8,
                'b9' => $b9,
                'b10' => $b10,
                'c1' => $c1,
                'c2' => $c2,
                'c3' => $c3,
                'c4' => $c4,
                'c5' => $c5,
                'c6' => $c6,
                'c7' => $c7,
                'd1' => $d1,
                'd2' => $d2,
                'd3' => $d3,
                'd4' => $d4,
                'd5' => $d5,
                'd6' => $d6,
                'd7' => $d7,
                'd8' => $d8,
                'd9' => $d9,
                'd10' => $d10,
                'xz1' => $xz1,
                'xz2' => $xz2,
                'pd1' => $pd1,
                'pd2' => $pd2,
                'grade_xtp' => $grade_xtp,
            ]);
            return $data ?
                $data :
                false;
        } catch (\Exception $e) {
            logError('学生注册失败!', [$e->getMessage()]);
            die($e->getMessage());
            return false;
        }
    }
}
