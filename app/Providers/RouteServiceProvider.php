<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        // #1 or Route::model() 
        // Assume Route::get('foo/{bar}') in router.php
        // $router->model('bar', 'App\Bar'); // binds key 'bar' with model 'App\bar' (param #1 and #2)
        // The controller method can now read an instance of the model object itself (Laravel queries using $id behind the scenes)
        // $router->model('articles', 'App\Article'); //direct bind for simple use cases

        // #2 For more complex use cases with constraints:
        // $router->bind('articles', function($id) 
        // {
        //      // perform constraints and return model object
        //      return \App\Article::published()->findOrFail($id);
        // });

        $router->bind('articles', function($id, \Illuminate\Routing\Route $route) {
            // if ($route->getName() == 'articles.edit') //display edit form eventho unpublished
            //     return \App\Article::findOrFail($id);
            return \App\Article::published()->findOrFail($id); //only allow routes for published articles
        });

        // $router->model('tags', 'App\Tag');

        $router->bind('tags', function($name) {
            return \App\Tag::where('name', $name)->firstOrFail();
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
