<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;   // for dependecy injection
//use Request;                   // Illuminate\Support\Facades\Request
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Create a new articles controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create']]);
        // $this->middleware('middleware_key', ['only/except' => ['method', 'method']]);
        // $this->middleware('middleware_key');
    }

    /**
     * Display all articles
     * 
     * @return Response
     */
    public function index()
    {

    	$articles = Article::latest('published_at')->published()->orderBy('published_at', 'desc')->get(); 
        //Article::order_by('published_at' => 'desc'); (default = created_at)

    	return view('articles.index', compact('articles'));
    }

    /**
     * Display a single article
     * @param  Article      $article
     * @return Response
     */
    public function show(Article $article) 
    {
    	return view('articles.show', compact('article'));
    }

    /**
     * Display form to create a new article
     * 
     * @return Response
     */
    public function create() 
    {
        // Without middleware
        // if (Auth::guest()) {
        //     return redirect('articles');
        // }
    	return view('articles.create');
    }

    /**
     * Save a new article
     * @param  ArticleRequest $request Using Form Request to separate validation from controller logic
     * @return Response                Redirect to Articles list
     */
    public function store(ArticleRequest $request) 
    {
        $article = new Article($request->all());
        Auth::user()->articles()->save($article); //uses Eloquent relationship

        // $request['user_id'] = Auth::user()->id; //what I'd normally do
    	// Article::create($request->all()); //replaced in L15

    	return redirect('articles');
    }

    /**
     * Display form to edit an article
     * @param  Article      $article
     * @return Response
     */
    public function edit(Article $article) 
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Save updated article
     * @param  Article        $article     
     * @param  ArticleRequest $request
     * @return Response               
     */
    public function update(Article $article, ArticleRequest $request) 
    {     
        $article->update($request->all());

        return redirect('articles');
    }
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