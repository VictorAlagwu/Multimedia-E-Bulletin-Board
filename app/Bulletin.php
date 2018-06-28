<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    //
    protected $guarded = [];


    // protected static function boot(){
    //     parent::boot();
    //     static::addGlobalScope('replyCount', function($builder) {
    //         $builder->withCount('posts');
    //     });
    // }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function getPostCount(){
        return $this->posts()->count();
    }

    public function userbulletins()
    {
        return $this->hasMany(Userbulletin::class);
    }
}
