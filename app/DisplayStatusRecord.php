<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisplayStatusRecord extends Model
{
    protected $table="display_status_records";
    protected $fillable=["device_id","status"];
    //one to many (inverse)
    public function device(){
        return $this->belongsTo(Device::class);
    }
}
