<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Node;

class PingController extends Controller
{
    //
    public function index(){
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
                $statusIPAcc[$dataIPAcc[$i]['node']['abbrEN']]="DOWN";
            }
            else{
                $statusIPAcc[$dataIPAcc[$i]['node']['abbrEN']]="UP";
            }
        }

        for($i=0;$i<count($dataRS232);$i++){
            $out=PingFunction($dataRS232[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusRS232[$dataRS232[$i]['node']['abbrEN']]="DOWN";
            }
            else{
                $statusRS232[$dataRS232[$i]['node']['abbrEN']]="UP";
            }
        }

        for($i=0;$i<count($dataVoIP);$i++){
            $out=PingFunction($dataVoIP[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusVoIP[$dataVoIP[$i]['node']['abbrEN']]="DOWN";
            }
            else{
                $statusVoIP[$dataVoIP[$i]['node']['abbrEN']]="UP";
            }
        }

        for($i=0;$i<count($dataVGForth);$i++){
            $out=PingFunction($dataVGForth[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusVGForth[$dataVGForth[$i]['node']['abbrEN']]="DOWN";
            }
            else{
                $statusVGForth[$dataVGForth[$i]['node']['abbrEN']]="UP";
            }
        }

        for($i=0;$i<count($dataSIP);$i++){
            $out=PingFunction($dataSIP[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusSIP[$dataSIP[$i]['node']['abbrEN']]="DOWN";
            }
            else{
                $statusSIP[$dataSIP[$i]['node']['abbrEN']]="UP";
            }
        }

        for($i=0;$i<count($dataRoIP);$i++){
            $out=PingFunction($dataRoIP[$i]['ip']);
            $chkTTL=strpos($out[2],$findWordTTL);
            $chkLoss=strpos($out[5],$findWordLoss);
            if($chkTTL!==FALSE || $chkLoss!==FALSE){
                $statusRoIP[$dataRoIP[$i]['node']['abbrEN']]="DOWN";
            }
            else{
                $statusRoIP[$dataRoIP[$i]['node']['abbrEN']]="UP";
            }
        }


        return view('dashboard',[
            'statusIPAcc'=>$statusIPAcc,
            'statusRS232'=>$statusRS232,
            'statusVoIP'=>$statusVoIP,
            'statusVGForth'=>$statusVGForth,
            'statusSIP'=>$statusSIP,
            'statusRoIP'=>$statusRoIP
        ]);

    }
}
