<?php

namespace App\Providers;

use App\Factories\LibraryFactory;
use Illuminate\Support\ServiceProvider;
use App\Database\DatabaseConnectionManager;
use App\Factories\ConcreteLibraryFactory;
use App\Models\Book;
use App\Observers\BookObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(DatabaseConnectionManager::class, function ($app) {
            return DatabaseConnectionManager::getInstance();
        });

        $this->app->bind(LibraryFactory::class, ConcreteLibraryFactory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Book::observe(BookObserver::class);
    }
}
