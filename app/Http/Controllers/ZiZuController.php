<?php

namespace App\Http\Controllers;

use App\Models\ZiZu;
use Illuminate\Http\Request;

class ZiZuController extends Controller
{
    public function Zt_gainAnswer(Request $request){
        $data = ZiZu::Zt_gainAnswer($request);
        return $data ?
            json_success('提交成功!',$data,  200):
            json_fail('提交失败!',null, 100 ) ;
    }
}
