<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the navigation bar
     */
    private function composeNavigation() 
    {
        view()->composer('partials.nav', function($view) //can pass view / class name (Read more)
        {
            $view->with('latest', Article::latest()->first());
        });

        //In certain instances, the composing will not be one liner like above, there might may be 
        //multiline calculations or queries with multiple where clauses. In those cases, the ServiceProvider
        //may end up unnecessarily lengthy and muddy (with lots of long compose() methods) --> not the job of ServiceProvider
        
        //For those cases, use the line below:
        // view()->composer('partials.nav', 'App\Http\Composers\NavigationComposer'); 
        //laravel will build an object for the class and invoke the handle() method, 
        //if x mention @handle, by default a compose() method will be invoked
        
        //There may be multiple classes to handle specific compose needs / maybe juz a god class? (GlobalComposer) <-- depends on app complexity
    }
}
