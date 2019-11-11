<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public function socials()
    {
        return $this->belongsTo('\App\Social');
    }
}
