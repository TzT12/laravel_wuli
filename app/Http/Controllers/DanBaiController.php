<?php

namespace App\Http\Controllers;

use App\Models\DanBai;
use Illuminate\Http\Request;

class DanBaiController extends Controller
{
    /**
     * 从前端接收单摆答案并自动判分
     */
    public function Zt_gainAnswer(Request $request){
        $data = DanBai::Zt_gainAnswer($request);
        return $data ?
            json_success('提交成功!',$data,  200):
            json_fail('提交失败',null, 100 ) ;
    }
}
