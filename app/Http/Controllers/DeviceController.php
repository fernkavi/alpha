<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
class DeviceController extends Controller
{
    //
    public function index(){
        $dataindevice=Device::with('node')->select('id','ip')->get();
        $node_id=Device::with('node')->select('node_id')->get();
        return view('dashboard',[
            'data'=>$dataindevice,

        ]);

    }
}
