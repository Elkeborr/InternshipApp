<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    public function company()
    {
        return $this->belongsTo('\App\Company');
    }

    protected $with = ['jobApplications'];

    public function jobApplications()
    {
        return $this->hasMany('\App\JobApplication');
    }
}
