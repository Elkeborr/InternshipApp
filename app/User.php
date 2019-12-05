<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    //use Uuids;
    /*
     * Set auto-increment to false.
     *
     * @var bool
     */
    //public $incrementing = false;

    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobApplications()
    {
        return $this->hasMany('\App\JobApplication');
    }

    public function socials()
    {
        return $this->hasMany('\App\Social');
    }

    public function skills()
    {
        return $this->hasMany('\App\Skill');
    }

    public function reviews()
    {
        return $this->hasMany('\App\Review', 'user_id');
    }
}
