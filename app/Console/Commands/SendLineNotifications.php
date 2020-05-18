<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\StatusRecord;
use App\Nodes;
use App\Device;
use App\DisplayStatusRecord;

class SendLineNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:sendlinenotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Line Notification when status of device is down.';

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
        $id=Device::select('*')->get();
        $n=0;
        // $mess="อุปกรณ์ที่แสดงผลลัพธ์การ \"PING\" เป็น \"Down\" ได้แก่ ";
        for($i=0;$i<count($id);$i++){
            $status=DisplayStatusRecord::select('*')->where('device_id',$id[$i]['id'])->orderBy('id','DESC')->first();
            if($status['status']=='down'){
                $down=Device::with('node')->where('id',$status['device_id'])->get();
                for($j=0;$j<count($down);$j++){
                    $messIPAcc="อุปกรณ์ ".$down[$j]['type']." ที่ ";
                    if($down[$j]['node']['hier']=='สถานีฯ'){
                        $nodeIPAcc=$down[$j]['node']['hier']." ".$down[$j]['node']['name'];
                    }
                    else{
                        $nodeIPAcc=$down[$j]['node']['hier'].$down[$j]['node']['name'];
                    }
                    $mess=$messIPAcc.$nodeIPAcc." มีผลลัพธ์การ \"PING\" เป็น \"DOWN\"";
                    LineNotification($mess);

                }

            }
        }
    }
}
