<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * Fillable fields for a tag.
	 * 
	 * @var [type]
	 */
	protected $fillable = [
		'name'
	];

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
