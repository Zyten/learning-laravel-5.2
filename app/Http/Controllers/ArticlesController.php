<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request; // dependecy injection
use Request; 				   // alias for lluminate\Support\Facades\Request::class

use App\Article;
use App\Http\Requests;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::latest('published_at')->get(); //Article::order_by('published_at' => 'desc'); (default = created_at)

    	return view('articles.index', compact('articles'));
    }

    public function show($id) 
    {
    	$article = Article::findOrFail($id);

    	return view('articles.show', compact('article'));
    }

    public function create() 
    {
    	return view('articles.create');
    }

    public function store() 
    {
    	$input = Request::all();
    	$input['published_at'] = Carbon::now();

    	Article::create($input);

    	return redirect('articles');
    }
}