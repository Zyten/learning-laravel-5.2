<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * Get the articles associated with the given tag
	 * 
	 * @return \Illuminate\Database\Relations\HasMany
	 */
    public function articles()
    {
    	//Take note, can pass arguments fot the specific columns to treat as the FK
    	return $this->belongsToMany('App\Article'); 
    }
}
