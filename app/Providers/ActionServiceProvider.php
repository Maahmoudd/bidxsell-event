<?php

namespace App\Providers;

use App\Actions\CaesarEncodeAction;
use App\Actions\ICaesarEncodeAction;
use App\Actions\INumberToExcelAction;
use App\Actions\NumberToExcelAction;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(INumberToExcelAction::class, NumberToExcelAction::class);
        $this->app->bind(ICaesarEncodeAction::class, CaesarEncodeAction::class);
    }
}
