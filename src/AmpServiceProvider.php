<?php

namespace c0b41\Amp;

use Illuminate\Support\ServiceProvider;

class AmpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/Amp.php' => config_path('amp.php'),
        ]);

        $this->app['router']->aliasMiddleware('amp', \c0b41\Amp\Middleware::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Amp', function(){
          return new Amp(config('app.Amp'));
        });
    }
}
