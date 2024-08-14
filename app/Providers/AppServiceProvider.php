<?php

namespace App\Providers;

use App\Application\Authentification\Services\Authenticator;
use App\Domain\Authentification\Contracts\AuthenticatorContract;
use App\Domain\Authentification\Strategies\BattleNetAuthentificationStrategy;
use App\Domain\Authentification\Strategies\EmailAuthentificationStrategy;
use App\Domain\User\Contracts\UserRepositoryContract;
use App\Domain\User\Factories\UserFactory;
use App\Infrastructure\Authentication\Strategies\EmailAuthenticationStrategy;
use App\Infrastructure\Persistence\Eloquent\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repository binding
        $this->app->bind(
            UserRepositoryContract::class,
            EloquentUserRepository::class
        );

        // Factory binding
        $this->app->bind(
            UserFactory::class, function ($app) {
                return new UserFactory();
        });

        // Authentication Service Binding
        $this->app->bind(
            AuthenticatorContract::class,
            Authenticator::class
        );

        // Strategy bindings
        $this->app->bind('auth.strategy.email', function () {
            return new EmailAuthentificationStrategy();
        });
        $this->app->bind('auth.strategy.battlenet', function () {
            return new BattleNetAuthentificationStrategy();
        });
        $this->app->bind('auth.strategy.google', function () {
            return new EmailAuthentificationStrategy();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
