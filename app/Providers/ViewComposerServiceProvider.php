<?php

namespace App\Providers;

use App\Tag;
use App\Blog;
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
        $this->composeSidebar();
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
    
    private function composeSidebar() {
        view()->composer('partials.sidebar', function($view){
           $view->with(['tags' => Tag::all(), 'archives' => Blog::selectRaw("DATE_FORMAT('published_at', '%M %Y')")->distinct()->get()]);
        });
    }
}
