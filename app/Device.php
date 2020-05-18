<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class Device extends Model
{
    //one to many (inverse)
    public function node(){
        return $this->belongsTo(Node::class);
    }
    //one to many
    public function statusRecords(){
        return $this->hasMany(StatusRecord::class);
    }
     //one to many
    public function displayStatusRecords(){
        return $this->hasMany(DisplayStatusRecord::class);
    }
    //get all ip of ip access
    // public function getIpofipaccess(){
    //     return
    // }
    // public function getDeviceipaccess(){
    //     $d=Device::where('type','IP Access')->get();
    //     $deviceArr=Arr::add($d->id=>$d->node_id);
    //     return $deviceArr;
    // }
    // public function getDevicemediars232(){
    //     $devices=Device::where('type','Media RS232 to LAN')->get();
    //     return $devices;
    // }
}
