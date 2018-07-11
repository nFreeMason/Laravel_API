<?php

namespace App\Providers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        \App\Models\Reply::observe(\App\Observers\ReplyObserver::class);

        //
        //
        \API::error(function(ModelNotFoundException $exception){
            abort(404);
        });

        \API::error(function(AuthorizationException $exception){
            abort(403,$exception->getMessage());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
