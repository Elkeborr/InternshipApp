<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    //use Uuids;
    /**
     * Set auto-increment to false.
     *
     * @var bool
     */
    //public $incrementing = false;

    public function company()
    {
        return $this->belongsTo('\App\Company', 'company_id');
    }

    protected $with = ['jobApplications'];

    public function jobApplications()
    {
        return $this->hasMany('\App\JobApplication');
    }

    public function like()
    {
        return $this->hasMany('\App\Like');
    }

    public function scopeOfLimit($query)
    {
        return $query->with('jobApplications')
        ->where('status', true)
        ->where('available_spots', '>', 0)->take(6)->latest()->get();
    }

    public function scopeOfAll($query)
    {
        return $query->where('status', true)
        ->where('available_spots', '>', 0)
        ->with('jobApplications')->latest()->get();
    }

    public function scopeOfState($query, array $state)
    {
        return $query->join('companies', 'internships.company_id', '=', 'companies.id')
        ->whereIn('companies.state', $state);
    }

    public function scopeOfTag($query, array $tag)
    {
        return $query->join('companies', 'internships.company_id', '=', 'companies.id')
        ->join('assign_company_tags', 'assign_company_tags.company_id', '=', 'companies.id')
        ->whereIn('company_tag_id', $tag);
    }

    public function scopeOfTagAndState($query, array $tag, array $state)
    {
        return $query->join('companies', 'internships.company_id', '=', 'companies.id')
        ->join('assign_company_tags', 'assign_company_tags.company_id', '=', 'companies.id')
        ->whereIn('company_tag_id', $tag)
        ->whereIn('state', $state);
    }
}
