<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    //use Uuids;
    /**
     * Set auto-increment to false.
     *
     * //@var bool
     */
    //public $incrementing = false;

    public function reviews()
    {
        return $this->hasMany('\App\Review');
    }

    public function users()
    {
        return $this->belongsTo('\App\User', 'company_id');
    }

    public function internships()
    {
        return $this->hasMany('\App\Internship');
    }

    public function tags()
    {
        return $this->hasMany('\App\AssignCompanyTags');
    }

    public function scopeOfState($query, array $state)
    {
        return $query->whereIn('state', $state);
    }

    public function scopeShow($query, $company)
    {
        return $query
        ->with('reviews')
        ->where('companies.id', $company)
        ->join('users', 'users.company_id', $company)
        ->with('tags');
    }
}
