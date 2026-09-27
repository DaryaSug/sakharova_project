<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Хук Шлюза: вызовется до всех остальных проверок политик
        Gate::before(function (User $user, string $ability) {
            if ($user->hasRole('moderator')) {
                return true; 
            }
        });
    }
}