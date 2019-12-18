<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignCompanyTags extends Model
{
    //use Uuids;
    /**
     * Set auto-increment to false.
     *
     * //@var bool
     */
    //public $incrementing = false;

    public function company()
    {
        return $this->belongsTo('\App\Company', 'company_id');
    }

    public function tags()
    {
        return $this->belongsTo('\App\CompanyTag', 'company_tag_id');
    }
}
