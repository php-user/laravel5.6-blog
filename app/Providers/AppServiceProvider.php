<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Greeting;
use App\Services\GetYear;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts-site.sidebar', function($view){
            $view->with('archives', \App\Post::getArchives());
            $view->with('tags', \App\Tag::has('posts')->pluck('name'));
            $view->with('categories', \App\Category::getCategories());
        });
        
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('App\Billing\Stripe', function(){
            return new \App\Billing\Stripe(config('services.stripe.secret'));
        });

        // \App::bind(Greeting::class, function(){
        // $this->app->bind(Greeting::class, function(){
        $this->app->singleton(Greeting::class, function(){
            return new Greeting();
        });
        
        $this->app->bind(GetYear::class, function(){
            return new GetYear();
        });
        
        \Blade::directive('continue', function ($num) {
            return "<?php continue $num ?>";
        });
        
        \Blade::directive('break', function ($num) {
            return "<?php break $num ?>";
        });

        \Blade::setEchoFormat('nl2br(e(%s))');
    }
}
