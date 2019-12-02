<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyTag extends Model
{
    public function assigncompanyTag()
    {
        return $this->hasMany('\App\AssignCompanytags', 'company_tag_id');
    }
}
