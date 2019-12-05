<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //use Uuids;
    /**
     * Set auto-increment to false.
     *
     * @var bool
     */
    //public $incrementing = false;

    protected $fillable = array('skill', 'id', 'user_id');

    public function user()
    {
        return $this->belongsTo('\App\Skill');
    }
}
