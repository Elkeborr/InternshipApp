<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function reviews()
    {
        return $this->hasmany('\App\Review');
    }
}
