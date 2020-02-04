<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    //one to many
    public function devices(){
        return $this->hasMany(Device::class);
    }

    //get full name of node
    public function getFullnameAttribute(){
        return $this->hier.$this->name;
    }
}
