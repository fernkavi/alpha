<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusRecord extends Model
{
    //one to many (inverse)
    public function device(){
        return $this->belongsTo(Device::class);
    }
}
