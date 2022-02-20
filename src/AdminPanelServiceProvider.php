<?php

namespace Ddkits\Adminpanel;

use Illuminate\Support\ServiceProvider;
use Ddkits\Adminpanel\Database\Seeds\AdminpanelSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Console\Events\CommandFinished;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class AdminPanelServiceProvider extends ServiceProvider
{
    protected function registerMigrations( )
                {
                    $path = __DIR__.'/Database/Seeds';
                    foreach (glob("$path/*.php") as $filename)
                    {
                        include $filename;
                        $classes = get_declared_classes();
                        $class = end($classes);

                        $command = Request::server('argv', null);
                        if (is_array($command)) {
                            $command = implode(' ', $command);
                            if ($command == "artisan db:seed") {
                                Artisan::call('db:seed', ['--class' => $class]);
                            }
                        }

                    }
                }
    public function run()
    {
        $this->call(AdminpanelSeeder::class);
    }

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

        // middle ware
        $this->app['router']->aliasMiddleware('ipcheck', Ddkits\Adminpanel\Http\Middleware\IpCheck::class);
     }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Middle ware alive
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web',  Http\Middleware\IpCheck::class);
        // Routes
        $this->loadRoutesFrom(__DIR__.'/routes.php');
         // register our DB migrations
         $this->loadMigrationsFrom( __DIR__.'/database/migrations');
         $this->publishes([
            __DIR__.'/public' => public_path('ddkits/adminpanel'),
        ], 'public');
        // views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'adminpanel');
        // Seeds
        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }
    }
}
