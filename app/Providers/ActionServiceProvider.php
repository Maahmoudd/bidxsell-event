<?php

namespace App\Providers;

use App\Actions\AuthAction;
use App\Actions\CaesarEncodeAction;
use App\Actions\FlattenJsonAction;
use App\Actions\IAuthAction;
use App\Actions\ICaesarEncodeAction;
use App\Actions\IFlattenJsonAction;
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
        $this->app->bind(IFlattenJsonAction::class, FlattenJsonAction::class);
        $this->app->bind(IAuthAction::class, AuthAction::class);
    }
}
