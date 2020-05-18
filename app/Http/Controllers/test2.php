<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\StatusRecord;
use App\DisplayStatusRecord;

class test2 extends Controller
{
    //
    public function index(){
        $n=0;
        $allDeviceId=Device::select('*')->get();
        for($i=0;$i<count($allDeviceId);$i++){
            $status2=StatusRecord::select('status')->where('device_id',$allDeviceId[$i]['id'])->orderBy('id','DESC')->take(2)->get();
            $status[$n]=CompareStatus2($status2);

            // $formerStatus=DisplayStatusRecord::where('device_id',$allDeviceId[$i])->orderBy('id','desc')->first();
            // if($status==$formerStatus){
            //     break;
            // }else{
            //     $dataSave=[
            //         'device_id'=>$allDeviceId[$i],
            //         'status'=>$status
            //     ];
            //     $statusSave=new DisplayStatusRecord($dataSave);
            //     $statusSave->save();
            // }

            $n++;
        }
        return view('test2',[
            // 'allDeviceId'=>$allDeviceId,
            // 'status2'=>$status2,
            'status'=>$status
        ]);
    }
}
