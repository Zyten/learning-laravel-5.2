<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
     * A user can have many articles.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles() 
    {
        return $this->hasMany('App\Article');
    }

    public function isATeamManager() 
    {
        return true;
    }
}

     //Note: $user->article() will return the relationship because it's meant to allow further chaining
     //e.g. $user->articles()->where()->get(); or $user->articles()->save(new Article($request->all()));
     //$user->article or $user->articles()->get()
     //will return Collection of articles without constraints (Eloquent uses get() behind the scene)
