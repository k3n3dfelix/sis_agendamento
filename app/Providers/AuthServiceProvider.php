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
        'App\Models\Usuarios' => 'App\Policies\UsuariosPolicy',
        'App\Models\Tipos' => 'App\Policies\TiposPolicy',
        'App\Models\Aulas' => 'App\Policies\AulasPolicy',
        'App\Models\Agenda' => 'App\Policies\AgendaPolicy',
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
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
