<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('permissao', function ($usuario, $permissao) {
            $permissoes = session('permissoes');

            if (isset($permissoes) && !empty($permissoes) && in_array($permissao, $permissoes)) {
                return true;
            } else {
                return false;
            }
        });
    }
}
