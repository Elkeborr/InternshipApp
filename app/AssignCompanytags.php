<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignCompanyTags extends Model
{
    public function company()
    {
        return $this->belongsTo('\App\Company');
    }

    public function tags()
    {
        return $this->belongsTo('\App\CompanyTag', 'company_tag_id');
    }
}
