<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;   // for dependecy injection
//use Request;                   // Illuminate\Support\Facades\Request
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::latest('published_at')->published()->orderBy('created_at', 'desc')->get(); //Article::order_by('published_at' => 'desc'); (default = created_at)

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

    //Using Form Request - separate validation fron controller login
    public function store(ArticleRequest $request) 
    {
    	Article::create($request->all());

    	return redirect('articles');
    }

    public function edit($id) 
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request) 
    {
        $article = Article::findOrFail($id);
        
        $article->update($request->all());

        return redirect('articles');
    }

    //Validate within controller login - more feasible for basic stuff e.g. MPS should definitely us Form Request (logic itself is quite long)
    // public function store(\Illuminate\Http\Request $request) 
    // {
    //     $rules = [
    //         'title' => 'required|min:3',
    //         'body' => 'required',
    //         'published_at' => 'required|date'
    //     ];

    //     $this->validate($request, $rules);

    //     Article::create($request->all());

    //     return redirect('articles');
    // }
}