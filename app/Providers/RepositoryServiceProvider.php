<?php

namespace App\Providers;

use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\DosenRepositoryInterface;
use App\Interfaces\JudulRepositoryInterface;
use App\Interfaces\JurnalRepositoryInterface;
use App\Interfaces\MahasiswaRepositoryInterface;
use App\Interfaces\SIRepositoryInterface;
use App\Repositories\AdminRepository;
use App\Repositories\DosenRepository;
use App\Repositories\JudulRepository;
use App\Repositories\JurnalRepository;
use App\Repositories\MahasiswaRepository;
use App\Repositories\SIRepository;
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
        $this->app->bind(DosenRepositoryInterface::class, DosenRepository::class);
        $this->app->bind(SIRepositoryInterface::class, SIRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(JudulRepositoryInterface::class, JudulRepository::class);
        $this->app->bind(JurnalRepositoryInterface::class, JurnalRepository::class);
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
