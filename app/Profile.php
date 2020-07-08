<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['full_name', 'description', 'image', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
