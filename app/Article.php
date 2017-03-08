<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
	//These are allowed to be mass assigned using Article::create([]);
	//If not declared, can only be inserted one by one $article-field = 'val'; $article->save();
	protected $fillable = [
		'title',
		'body',
		'published_at'
	];

	//will be inserted as a Carbon date alongside created_at and updated_at
	protected $dates = [
		'published_at'
	];

	//Query scopes = custom where clause that will be used a lot thoughout the app
	public function scopePublished($query) 
	{
		$query->where('published_at', '<=', Carbon::now());
	}	

	public function scopeUnpublished($query) 
	{
		$query->where('published_at', '>', Carbon::now());
	}
	
	//Accessors and Mutators
	//Accessors = getters
	//Mutators are used to modify fields before insertion
	//e.g. setUserAddressAttribute() -- naming convention
	public function setPublishedAtAttribute($date) 
	{
		//$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); //stores current time
		$this->attributes['published_at'] = Carbon::parse($date); //midnight
	}
}
