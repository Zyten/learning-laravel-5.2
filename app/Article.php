<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
	/**
	 * Fillable fields for and Article. (From a biz perspective)
	 * e.g. Prevents client spoofing when we are using Article::create([$requet->all()]) without sanitation
	 * @var array
	 */
	protected $fillable = [
		'title',
		'body',
		'published_at',
		'user_id'
	];

	/**
	 * Additional fields to treat as Carbon instance
	 * e.g. Laravel defaults are created_at and updated_at
	 * @var array
	 */
	protected $dates = [
		'published_at'
	];
	
	/**
	 * Scope queries to articles that have been published
	 * 
	 * @param  $query
	 */
	public function scopePublished($query) 
	{
		$query->where('published_at', '<=', Carbon::now());
	}	

	/**
	 * Scope queries to articles that have no been published
	 * 
	 * @param  $query
	 */
	public function scopeUnpublished($query) 
	{
		$query->where('published_at', '>', Carbon::now());
	}

	/**
	 * Set the published_at attribute
	 * Mutate date from view (e.g. HTML formated) before db insertion
	 * @param $date
	 */
	public function setPublishedAtAttribute($date) 
	{
		//$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); //stores current time
		$this->attributes['published_at'] = Carbon::parse($date); //midnight
	}

	/**
	 * An article is owned by a user.
	 * 
	 * @return \Illuminate\Database\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the tags associated with the given article
	 * belongsToMany = many2many, hasMany = one2many, hasOne = one2one, belongsTo = many2one
	 * @return \Illuminate\Database\Relations\HasMany
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps(); 
		//withTimestamps() does not throw error for 5.2
		//nonetheless, without it the timestamp columns are not populated
	}
	
	/**
	 * Get a list of tag ids associated with the current article 
	 * Can't use getTagsAttribute() here coz we want that to return the name for listing ($article->tags)
	 * This one will return the ids for preselecting in edit form
	 * @return array
	 */
	public function getTagListAttribute() 
	{
		return $this->tags->lists('id')->all();
	}
}

	//Query scopes = custom where clause that will be used a lot thoughout the app
	//Convention = scopeName
	
	//Accessors and Mutators
	//Accessors = getters
	//Mutators are used to modify fields before insertion
	//e.g. setUserAddressAttribute() -- naming convention
