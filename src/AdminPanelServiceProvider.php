<?php

namespace Ddkits\Adminpanel;

use Illuminate\Support\ServiceProvider;

class AdminPanelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controllers
        $this->app->make('Ddkits\Adminpanel\Controller\AdminPanelController');
        $this->app->make('Ddkits\Adminpanel\Controller\MenusController');
        $this->app->make('Ddkits\Adminpanel\Controller\MsgsController');
        $this->app->make('Ddkits\Adminpanel\Controller\SubsController');
        $this->app->make('Ddkits\Adminpanel\Controller\RolesController');
        $this->app->make('Ddkits\Adminpanel\Controller\ProfilesController');
        $this->app->make('Ddkits\Adminpanel\Controller\SettingsController');
        $this->app->make('Ddkits\Adminpanel\Controller\SitemapsController');
        $this->app->make('Ddkits\Adminpanel\Controller\PostController');
        $this->app->make('Ddkits\Adminpanel\Controller\ContactController');
        $this->app->make('Ddkits\Adminpanel\Controller\IpbanController');
        $this->app->make('Ddkits\Adminpanel\Controller\MemberTypeController');
        // register our models
        $this->app->make('Ddkits\Adminpanel\Models\AdminPanel');
        $this->app->make('Ddkits\Adminpanel\Models\Settings');
        $this->app->make('Ddkits\Adminpanel\Models\Menus');
        $this->app->make('Ddkits\Adminpanel\Models\Msgs');
        $this->app->make('Ddkits\Adminpanel\Models\Subs');
        $this->app->make('Ddkits\Adminpanel\Models\Roles');
        $this->app->make('Ddkits\Adminpanel\Models\Profiles');
        $this->app->make('Ddkits\Adminpanel\Models\Sitemaps');
        $this->app->make('Ddkits\Adminpanel\Models\Post');
        $this->app->make('Ddkits\Adminpanel\Models\Ipban');
        $this->app->make('Ddkits\Adminpanel\Models\Contact');
        $this->app->make('Ddkits\Adminpanel\Models\MemberType');
     }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadRoutesFrom(__DIR__.'/routes.php');
         // register our DB migrations
         $this->loadMigrationsFrom( __DIR__.'/database/migrations');
         include __DIR__.'/database/seeders/DatabaseSeeder.php';
         $this->publishes([
            __DIR__.'/public' => public_path('ddkits/adminpanel'),
        ], 'public');
        // views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'adminpanel');
    }
}
