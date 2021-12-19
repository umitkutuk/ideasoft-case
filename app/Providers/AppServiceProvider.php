<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Database\Eloquent\Builder as DatabaseEloquentBuilder;
use Illuminate\Database\Query\Builder as DatabaseQueryBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerDatabaseBuilderMacros();
    }

    /**
     * Register database related macros
     * Please add entries to _ide_helper_macros.php
     */
    protected function registerDatabaseBuilderMacros()
    {
        /** @see \App\Http\Middleware\CheckPerPageQueryParameterForPagination::handle() */
        DatabaseEloquentBuilder::macro('safelyPaginate', function ($perPage = null, $columns = ['*'], $pageName = 'page', $page = null) {

            $options = config('pagination');

            $perPage = $perPage ?? request($options['param_name']) ?? $options['per_page'];

            /** @var \Illuminate\Database\Eloquent\Builder $this */
            return $this->paginate($perPage, $columns, $pageName, $page);
        });

        /** @see \App\Http\Middleware\CheckPerPageQueryParameterForPagination::handle() */
        DatabaseQueryBuilder::macro('safelyPaginate', function ($perPage = null, $columns = ['*'], $pageName = 'page', $page = null) {

            $options = config('pagination');

            $perPage = $perPage ?? request($options['param_name']) ?? $options['per_page'];

            /** @var \Illuminate\Database\Query\Builder $this */
            return $this->paginate($perPage, $columns, $pageName, $page);
        });

    }
}
