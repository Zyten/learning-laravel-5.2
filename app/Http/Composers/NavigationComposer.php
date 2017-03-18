<?php

namespace App\Http\Composers;

use App\Article;
use Illuminate\Contracts\View\View;

class NavigationComposer {

	public function __construct(ArticleRepository $articles)
	{
		//define the dependencies here (unneeded here coz we use Eloquent model directly)
		//e.g. Repositories (Read up in future) 
		//Allows $this->articles()->someReadableName()->first(); vs Article::where1()->join()->manyMore()->first()
	}

	public function compose(View $view) //typehinting the param here is not strictly necessary - based on preference (self reminder vs freedom)
	{
        $view->with('latest', Article::latest()->first());
	}
}