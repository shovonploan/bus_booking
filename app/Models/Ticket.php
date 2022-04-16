<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Bus;
use Illuminate\Database\Eloquent\User;

class Ticket extends Model
{
    use HasFactory;

    public function bus(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function user(){
        return $this->belongsTo(Bus::class,'bus_id','id');
    }
}
