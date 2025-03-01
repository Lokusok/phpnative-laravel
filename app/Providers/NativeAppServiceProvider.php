<?php

namespace App\Providers;

use Illuminate\View\View;
use Illuminate\SUpport\Facades;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\Menu;
use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Facades\Settings;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Menu::create();

        Window::open()
            ->width(400)
            ->width(400)
            ->showDevTools(false)
            ->rememberState();

        // Facades\View::composer('*', function (View $view) {
        //     $view->with('theme', Settings::get('theme', 'light'));
        // });
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
        ];
    }
}
