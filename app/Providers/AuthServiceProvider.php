<?php

namespace App\Providers;

use App\Models\Csv;
use App\Models\CsvData;
use App\Policies\CsvDataPolicy;
use App\Policies\CsvPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Csv::class => CsvPolicy::class,
        CsvData::class => CsvDataPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
