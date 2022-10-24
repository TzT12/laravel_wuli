<?php

namespace App\Models;

use App\services\OSS;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OuMu extends Model
{
    use Notifiable ;

    protected $table = 'oumu';
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
        if ($tk1 == 500.0){
            $grade_xtp += 5;
        }
        $tk2 = $request['tk2'];
        if ($tk2 == 560.0){
            $grade_xtp += 5;
        }
        $tk3 = $request['tk3'];
        if ($tk3 == 1.5){
            $grade_xtp += 5;
        }
        $a1 = $request['a1'];
        if ($a1 == 1.5){
            $grade_xtp += 5;
        }
        $a2 = $request['a2'];
        if ($a2 == 500.0){
            $grade_xtp += 5;
        }
        $a3 = $request['a3'];
        if ($a3 == 560.0){
            $grade_xtp += 5;
        }
        $a4 = $request['a4'];
        if ($a4 == 2440.0){
            $grade_xtp += 5;
        }
        $b1 = $request['b1'];
        if ($b1 == 1.5){
            $grade_xtp += 5;
        }
        $b2 = $request['b2'];
        if ($b2 == 2440.0){
            $grade_xtp += 5;
        }
        $b3= $request['b3'];
        if ($b3 == 560.0){
            $grade_xtp += 5;
        }
        $b4 = $request['b4'];
        if ($b4 == 43.5){
            $grade_xtp += 5;
        }
        $c1 = $request['c1'];
        if ($c1 >= 2390.0 && $c1 <= 2450.0){
            $grade_xtp += 5;
        }

        $c2 = $request['c2'];
        if ($c2 >= 43 && $c2 <= 45){
            $grade_xtp += 5;
        }
        $c3 = $request['c3'];
        if ($c3 > 20 && $c3 < 275){
            $grade_xtp += 5;
        }
        $py1 = $request['py1'];//图片题
        $py1_url = self::upload($py1);
        $py2 = $request['py2'];//图片题
        $py2_url = self::upload($py2);
        $xz1 = $request['xz1'];
        if ($xz1 == 'A'){
            $grade_xtp += 5;
        }
        $xz2 = $request['xz2'];
        if ($xz2 == 'B'){
            $grade_xtp += 5;
        }
        $xz3 = $request['xz3'];
        if ($xz3 == 'C'){
            $grade_xtp += 5;
        }

        try {
            $data = self::create([
                'class' => $class,
                'account' => $account,
                'tk1' => $tk1 ,
                'tk2' => $tk2 ,
                'tk3' => $tk3 ,
                'a1' => $a1 ,
                'a2' => $a2 ,
                'a3' => $a3 ,
                'a4' => $a4 ,
                'b1' => $b1 ,
                'b2' => $b2 ,
                'b3' => $b3 ,
                'b4' => $b4 ,
                'c1' => $c1 ,
                'c2' => $c2 ,
                'c3' => $c3 ,
                'py1' => $py1_url ,
                'py2' => $py2_url ,
                'xz1' => $xz1 ,
                'xz2' => $xz2,
                'xz3' => $xz3 ,
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

    public static function upload($file){
        $tmppath = $file->getRealPath();//获取文件的真实路径
        $fileName  =rand(1000,9999) . $file->getFilename() .time() . date('ymd') . '.' .$file->getClientOriginalExtension();
        //拼接文件名
        $patnName = date('Y-m/d').'/'.$fileName;
        OSS::publicUpload('tzt912',$patnName,$tmppath,['ContentType' =>'inline']);
        //获取文件url
        $url = OSS::getPublicObjectURL('tzt912',$patnName);
        return $url;
    }
}

