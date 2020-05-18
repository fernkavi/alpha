<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\StatusRecord;
use App\Device;
use App\DisplayStatusRecord;

class CompareIps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:compareip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Compare ping result 5 and save into display_status_records table';

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
        //
        $allDeviceId=Device::select('*')->get();
        for($i=0;$i<count($allDeviceId);$i++){
            $status2=StatusRecord::select('status')->where('device_id',$allDeviceId[$i]['id'])->orderBy('id','DESC')->take(2)->get();
            $status=CompareStatus2($status2);

            $formerStatus=DisplayStatusRecord::select('status')->where('device_id',$allDeviceId[$i]['id'])->orderBy('id','DESC')->first();

            if($status!=$formerStatus['status']){
                $dataSave=[
                    'device_id'=>$allDeviceId[$i]['id'],
                    'status'=>$status
                ];
                $statusSave=new DisplayStatusRecord($dataSave);
                $statusSave->save();
            }


        }

    }
}
