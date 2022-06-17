<?php

namespace App\Providers;

use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\DosenRepositoryInterface;
use App\Interfaces\JudulRepositoryInterface;
use App\Interfaces\JurnalRepositoryInterface;
use App\Interfaces\MahasiswaRepositoryInterface;
use App\Interfaces\PengajuanRepositoryInterface;
use App\Interfaces\PersyaratanInterface;
use App\Interfaces\SIRepositoryInterface;
use App\Interfaces\SkripsiRepositoryInterface;
use App\Repositories\AdminRepository;
use App\Repositories\DosenRepository;
use App\Repositories\JudulRepository;
use App\Repositories\JurnalRepository;
use App\Repositories\MahasiswaRepository;
use App\Repositories\PengajuanRepository;
use App\Repositories\PersyaratanRepository;
use App\Repositories\SIRepository;
use App\Repositories\SkripsiRepository;
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
        $this->app->bind(PengajuanRepositoryInterface::class, PengajuanRepository::class);
        $this->app->bind((SkripsiRepositoryInterface::class), SkripsiRepository::class);
        $this->app->bind((PersyaratanInterface::class), PersyaratanRepository::class);
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
