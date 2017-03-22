<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag) 
    {
    	$articles = $tag->articles()->published()->get(); //this is cool (due to the relationship)
    
    	return view('articles.index', compact('articles'));
    }
}
