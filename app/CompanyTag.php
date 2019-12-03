<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyTag extends Model
{
    use Uuids;
    /**
     * Set auto-increment to false.
     *
     * @var bool
     */
    public $incrementing = false;

    public function assigncompanyTag()
    {
        return $this->hasMany('\App\AssignCompanytags', 'company_tag_id');
    }
}
