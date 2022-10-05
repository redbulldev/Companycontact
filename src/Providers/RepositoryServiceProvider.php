<?php

namespace Companycontact\Providers;

use Illuminate\Support\ServiceProvider;

use Companycontact\Repositories\Eloquents\ContactRepository;
use Companycontact\Repositories\Contracts\ContactRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ContactRepositoryInterface::class,ContactRepository::class);
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

