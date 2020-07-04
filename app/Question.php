<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['judul_pertanyaan', 'isi_pertanyaan'];

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }



}
