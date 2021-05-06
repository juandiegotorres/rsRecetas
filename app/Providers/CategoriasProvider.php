<?php

namespace App\Providers;

use View;
use App\CategoriaReceta;
use Illuminate\Support\ServiceProvider;

class CategoriasProvider extends ServiceProvider
{

    public function register()
    {
    }

    public function boot()
    {
        View::composer('*', function ($view) {

            $categorias = CategoriaReceta::all();
            $view->with('categorias', $categorias);
        });
    }
}
