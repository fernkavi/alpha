<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Node;
use App\Device;
use App\StatusRecord;


class test extends Controller
{
    //
    public function index(){
        // $downDevice=StatusRecord::with('device')->where('status','down')->orderBy('id','DESC')->get();

        // print_r($downDevice);
        $id=Device::select('*')->get();
        $n=0;
        for($i=0;$i<count($id);$i++){
            // $d=StatusRecord::select('id','status')->where('device_id',$id[$i]['id'])->orderBy('id','DESC')->first();
            $status=StatusRecord::select('*')->where('device_id',$id[$i]['id'])->orderBy('id','DESC')->first();
            if($status['status']=='down'){
                // $downDevice[$n]=$d;
                // $n++;
                $down=Device::with('node')->where('id',$status['device_id'])->get();
                for($j=0;$j<count($down);$j++){
                    $downDevice[$n]=["name"=>$down[$j]['node']['hier'].$down[$j]['node']['name'],"device"=>$down[$j]['type'],"ip"=>$down[$j]['ip']];
                    // $device[$n]=$down[$i]['type'];
                    // $ip[$n]=$down[$i]['ip'];
                    // $node[$n]=$down[$i]['node']['hier'].$down[$i]['node']['name'];
                    $n++;
                }
                // $device[$n]=$down[]['type'];
                // $n++;

            }

        }

        return view('test',[
            'downDevice'=>$downDevice
        ]);
    }
}
