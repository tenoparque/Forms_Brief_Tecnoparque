<?php

namespace App\Providers;

use App\View\Composers\CustomizationComposer;
use App\View\Composers\UserRoleComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
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
        //
        View::composer(['home','auth.register','layouts.app'], UserRoleComposer::class);
        View::composer(['auth.login','layouts.app','mails.credenciales-correo','auth.passwords.email'] , CustomizationComposer::class);
    }
}
