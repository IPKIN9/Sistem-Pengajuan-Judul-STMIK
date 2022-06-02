<?php

namespace App\Providers;

use App\Interfaces\MahasiswaRepositoryInterface;
use App\Repositories\MahasiswaRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MahasiswaRepositoryInterface::class, MahasiswaRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
