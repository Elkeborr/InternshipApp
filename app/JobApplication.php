<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobApplication extends Model
{
    use Uuids;
    /**
     * Set auto-increment to false.
     *
     * @var bool
     */
    public $incrementing = false;

    public function internship()
    {
        return $this->belongsTo('\App\Internship');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
