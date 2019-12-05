<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    //use Uuids;
    /**
     * Set auto-increment to false.
     *
     * @var bool
     */
    //public $incrementing = false;

    public function socials()
    {
        return $this->belongsTo('\App\Social');
    }
}
