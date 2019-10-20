<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
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
