<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = array('skill', 'id', 'user_id');

    public function user()
    {
        return $this->belongsTo('\App\Skill');
    }
}
