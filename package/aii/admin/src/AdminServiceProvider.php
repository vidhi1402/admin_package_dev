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
        /*start::register controller*/
        $this->app->make('Aii\Admin\ContactUsController');
        $this->app->make('Aii\Admin\DashboardController');
        $this->app->make('Aii\Admin\ProductCategoryController');
        $this->app->make('Aii\Admin\ProductController');
        $this->app->make('Aii\Admin\ServiceCategoryController');
        $this->app->make('Aii\Admin\ServiceController');
        $this->app->make('Aii\Admin\ServiceSubCategoryController');
        $this->app->make('Aii\Admin\TestimonialController');
        $this->app->make('Aii\Admin\TeamMemberController');
        /*end::register controller*/

        /*view pages*/
        $this->loadViewsFrom(__DIR__.'/view/admin/', 'admin');

    }
}
