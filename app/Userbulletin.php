<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userbulletin extends Model
{
    //
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bulletin()
    {
        return $this->belongsTo(Bulletin::class);
    }
}
