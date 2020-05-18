<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Device;
use App\StatusRecord;
use Illuminate\Support\Str;


class PingIps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:pingip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ping IPs and save into status_records table every 30 s';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //ping and save result into status_records
        $findDown=["TTL expired in transit.","Destination host unreachable.","Request timed out."];
        $data=Device::with('node')->get();

        for($i=0;$i<count($data);$i++){
            $ip=$data[$i]['ip'];
            // exec("ping -n 1 -w 1 $ip", $output, $status);
            // print_r($output);
            $output=PingFunction($ip);
            $chk=Str::contains($output[2],$findDown);
            if($chk==true){
                $dataSave=[
                    'device_id'=>$data[$i]['id'],
                    'status'=>"down"
                ];
                $statusSave=new StatusRecord($dataSave);
                $statusSave->save();
            }
            else{
                $dataSave=[
                    'device_id'=>$data[$i]['id'],
                    'status'=>"up"
                ];
                $statusSave=new StatusRecord($dataSave);
                $statusSave->save();
            }
        }

    }
}
