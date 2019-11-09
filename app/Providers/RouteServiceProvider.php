<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
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
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();


        // 2019/11/5 Ông tạ van nam tạo ra
        // @author Namtv
        $this->mapProductRoutes();
        $this->mapPostRoutes();
        $this->mapControllerRoutes();
        $this->mapSlideshowRoutes();
        $this->mapContactRoutes();
        $this->mapEventRoutes();
        $this->mapCategoryRoutes();
        $this->mapPostsRoutes();


        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapProductRoutes()
    {
    Route::middleware('web','auth','mod.check')
             ->prefix('admin2/product')
             ->namespace($this->namespace)
             ->group(base_path('routes/product.php'));
    }

    protected function mapPostRoutes()
    {
        Route::middleware('web','auth','mod.check')
             ->prefix('admin2/post')
             ->namespace($this->namespace)
             ->group(base_path('routes/post.php'));
    }


    protected function mapControllerRoutes()
    {
        Route::middleware('web','auth','mod.check')
             ->prefix('admin2/category')
             ->namespace($this->namespace)
             ->group(base_path('routes/category.php'));
    }

    protected function mapSlideshowRoutes()
    {
        Route::middleware('web','auth','mod.check')
             ->prefix('admin2/slideshow')
             ->namespace($this->namespace)
             ->group(base_path('routes/slideshow.php'));
    }

    protected function mapContactRoutes()
    {
        Route::middleware('web','auth','mod.check')
             ->prefix('admin2/contact')
             ->namespace($this->namespace)
             ->group(base_path('routes/contact.php'));
    }

    protected function mapEventRoutes()
    {
        Route::middleware('web','auth','mod.check')
             ->prefix('admin2/event')
             ->namespace($this->namespace)
             ->group(base_path('routes/event.php'));
    }

    protected function mapCategoryRoutes()
    {
        Route::middleware('web','auth','mod.check')
             ->prefix('admin2/category')
             ->namespace($this->namespace)
             ->group(base_path('routes/category.php'));
    }

    protected function mapPostsRoutes()
    {
        Route::middleware('web','auth','mod.check')
             ->prefix('admin2/tintuc')
             ->namespace($this->namespace)
             ->group(base_path('routes/tintuc.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}