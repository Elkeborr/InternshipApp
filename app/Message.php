<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //use Uuids;
    /**
     * Set auto-increment to false.
     *
     * @var bool
     */
    //public $incrementing = false;

    public function company()
    {
        return $this->belongsTo('\App\Company');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
