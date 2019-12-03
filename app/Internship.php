<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use Uuids;
    /**
     * Set auto-increment to false.
     *
     * @var bool
     */
    public $incrementing = false;

    public function company()
    {
        return $this->belongsTo('\App\Company', 'company_id');
    }

    protected $with = ['jobApplications'];

    public function jobApplications()
    {
        return $this->hasMany('\App\JobApplication');
    }
}
