<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *///rendiamo disponibile in tutte le viste la tabella categories che contiene le categorie create
    public function boot(): void
    {
        if(Schema::hasTable('categories')){
            $categories = Category::all();
            View::share('categories', $categories);
        }

            if(Schema::hasTable('articles')){
                $articles = Article::all();
                View::share('articles', $articles);
            // Category::orderBy('name')->get()
        }
        Paginator::useBootstrap();
        
    }
}