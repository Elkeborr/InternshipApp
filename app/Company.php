<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    public function reviews()
    {
        return $this->hasMany('\App\Review');
    }

    public function internships()
    {
        return $this->hasMany('\App\Internship');
    }
}
