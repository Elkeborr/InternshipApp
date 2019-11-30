<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function company()
    {
        return $this->belongsTo('\App\Company');
    }

    public function users()
    {
        return $this->belongsTo('\App\User');
    }
}
