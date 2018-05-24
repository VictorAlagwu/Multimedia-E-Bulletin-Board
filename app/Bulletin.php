<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    // public function addPost($post){
    //     return $this->posts()->create($post);
    // }
}
