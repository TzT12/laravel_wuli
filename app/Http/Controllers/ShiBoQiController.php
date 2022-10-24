<?php

namespace App\Http\Controllers;

use App\Models\ShiBoQi;
use Illuminate\Http\Request;

class ShiBoQiController extends Controller
{
    public function Zt_gainAnswer(Request $request){
        $data = ShiBoQi::Zt_gainAnswer($request);
        return $data ?
            json_success('提交成功!',$data,  200):
            json_fail('提交失败!',null, 100 ) ;
    }
}
