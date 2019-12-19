<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //use Uuids;
    /**
     * Set auto-increment to false.
     *
     * @var bool
     */
    //public $incrementing = false;

    protected $fillable = array('id', 'company_id', 'user_id');

    public function company()
    {
        return $this->belongsTo('\App\Company');
    }

    public function users()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function scopeShowCompany($query, $company)
    {
        return $query->where('id', $company)
        ->with('users');
    }
}
