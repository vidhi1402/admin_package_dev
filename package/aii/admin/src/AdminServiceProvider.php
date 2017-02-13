<?php

namespace Aii\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //routing your web files
        include __DIR__.'/routes/web.php';

      /*Publish assets to app public directory*/
        $this->publishes([
            __DIR__ . '/public/admin' => public_path('/admin'),
        ], 'public');

        /*Publish migration to app database directory*/
        $this->publishes([
            __DIR__.'/migrations' => database_path('/migrations')
        ], 'migrations');

        /*Publish config to app config directory*/
        $this->publishes([
            __DIR__.'/config' => config_path('/')
        ], 'config');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       /* $this->app->middleware([
            Aii\Admin\Middleware\RedirectIfNotAdmin::class
        ]);*/
        /*start::register controller*/
        $this->app->make('Aii\Admin\Controller\AdminController');
        $this->app->make('Aii\Admin\Controller\ContactUsController');
        $this->app->make('Aii\Admin\Controller\DashboardController');
        $this->app->make('Aii\Admin\Controller\ProductCategoryController');
        $this->app->make('Aii\Admin\Controller\ProductController');
        $this->app->make('Aii\Admin\Controller\ServiceCategoryController');
        $this->app->make('Aii\Admin\Controller\ServiceController');
        $this->app->make('Aii\Admin\Controller\ServiceSubCategoryController');
        $this->app->make('Aii\Admin\Controller\TestimonialController');
        $this->app->make('Aii\Admin\Controller\TeamMemberController');
        $this->app->make('Aii\Admin\Controller\GalleryCategoryController');
        $this->app->make('Aii\Admin\Controller\GallerySubCategoryController');

        $this->app->make('Aii\Admin\Controller\Auth\LoginController');
        $this->app->make('Aii\Admin\Controller\Auth\RegisterController');
        /*end::register controller*/

        /*view pages*/
        $this->loadViewsFrom(__DIR__.'/view/admin/', 'admin');

    }
}
