<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Node;

class PingController extends Controller
{
    //
    public function index(){

    while(true){
        $findWordTTL="TTL expired in transit.";
        $findWordLoss="100% loss";
        $dataIPAcc=Device::with('node')->where('type','=','IP Access')->get();
        $dataRS232=Device::with('node')->where('type','=','Media RS232 to LAN')->get();
        $dataVoIP=Device::with('node')->where('type','=','VoIP')->get();
        $dataVGForth=Device::with('node')->where('type','=','Voice Gateway')->orWhere('type','=','Forth')->get();
        $dataSIP=Device::with('node')->where('type','=','SIP Phone')->get();
        $dataRoIP=Device::with('node')->where('type','=','RoIP')->get();

        for($i=0;$i<count($dataIPAcc);$i++){
            $out=PingFunction($dataIPAcc[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusIPAcc[$dataIPAcc[$i]['id']]=["DOWN",$dataIPAcc[$i]['node']['abbrEN']];
            }
            else{
                $statusIPAcc[$dataIPAcc[$i]['id']]=["UP",$dataIPAcc[$i]['node']['abbrEN']];
            }
        }

        for($i=0;$i<count($dataRS232);$i++){
            $out=PingFunction($dataRS232[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusRS232[$dataRS232[$i]['id']]=["DOWN",$dataRS232[$i]['node']['abbrEN']];
            }
            else{
                $statusRS232[$dataRS232[$i]['id']]=["UP",$dataRS232[$i]['node']['abbrEN']];
            }
        }

        for($i=0;$i<count($dataVoIP);$i++){
            $out=PingFunction($dataVoIP[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusVoIP[$dataVoIP[$i]['id']]=["DOWN",$dataVoIP[$i]['node']['abbrEN']];
            }
            else{
                $statusVoIP[$dataVoIP[$i]['id']]=["UP",$dataVoIP[$i]['node']['abbrEN']];
            }
        }

        for($i=0;$i<count($dataVGForth);$i++){
            $out=PingFunction($dataVGForth[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusVGForth[$dataVGForth[$i]['id']]=["DOWN",$dataVGForth[$i]['node']['abbrEN']];
            }
            else{
                $statusVGForth[$dataVGForth[$i]['id']]=["UP",$dataVGForth[$i]['node']['abbrEN']];
            }
        }

        for($i=0;$i<count($dataSIP);$i++){
            $out=PingFunction($dataSIP[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusSIP[$dataSIP[$i]['id']]=["DOWN",$dataSIP[$i]['node']['abbrEN']];
            }
            else{
                $statusSIP[$dataSIP[$i]['id']]=["UP",$dataSIP[$i]['node']['abbrEN']];
            }
        }

        for($i=0;$i<count($dataRoIP);$i++){
            $out=PingFunction($dataRoIP[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusRoIP[$dataRoIP[$i]['id']]=["DOWN",$dataRoIP[$i]['node']['abbrEN']];
            }
            else{
                $statusRoIP[$dataRoIP[$i]['id']]=["UP",$dataRoIP[$i]['node']['abbrEN']];
            }
        }


        // return view('ping',[
        //     'statusIPAcc'=>$statusIPAcc,
        //     'statusRS232'=>$statusRS232,
        //     'statusVoIP'=>$statusVoIP,
        //     'statusVGForth'=>$statusVGForth,
        //     'statusSIP'=>$statusSIP,
        //     'statusRoIP'=>$statusRoIP,
        //     'dataRS232'=>$dataRS232
        // ]);

        return view('dashboard',[
            'statusIPAcc'=>$statusIPAcc,
            'statusRS232'=>$statusRS232,
            'statusVoIP'=>$statusVoIP,
            'statusVGForth'=>$statusVGForth,
            'statusSIP'=>$statusSIP,
            'statusRoIP'=>$statusRoIP
        ]);

        sleep(120);
    }



    }
}
