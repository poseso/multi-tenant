<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\AppModelCommand;
use App\Console\Commands\AppScopeCommand;
use App\Console\Commands\AppMethodCommand;
use App\Console\Commands\AppAttributeCommand;
use App\Console\Commands\AppRepositoryCommand;
use App\Console\Commands\AppRelationshipCommand;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerGeneratorCommands();
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }

    /**
     * Register console commands.
     */
    protected function registerGeneratorCommands()
    {
        $this->commands([
            AppModelCommand::class,
            AppScopeCommand::class,
            AppMethodCommand::class,
            AppAttributeCommand::class,
            AppRepositoryCommand::class,
            AppRelationshipCommand::class,
        ]);
    }
}
