<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobApplication extends Model
{
    public function internship() 
    {
        return $this->belongsTo('\App\Internship');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

}
