<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['jawaban', 'question_id'];
    public function question()
    {
        return $this->belongTo('App\Question');
    }
}
