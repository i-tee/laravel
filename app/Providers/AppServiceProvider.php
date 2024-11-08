<?php

namespace App\Providers;

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
     */
    public function boot(): void
    {
        // Привязываем FooterComposer к шаблону 'layouts.app' (или к любому другому шаблону, если нужно)
        view()->composer(
            'app', // Укажите имя шаблона, где нужно использовать данные
            \App\Http\View\Composers\FooterComposer::class
        );
    }
}
