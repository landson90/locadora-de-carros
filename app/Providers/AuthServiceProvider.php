<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\WorkShop;
use App\policies\WorkShopPolicy;
use App\Models\Permission;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         WorkShop::class => WorkShopPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
         $permissions = Permission::all();

        foreach($permissions as $permission){

            Gate::define($permission->name, function(User $user) use ($permission){
               return $user->hasPermission($permission);
            });

            Gate::before(function(User $user, $before){
                if($user->hasProfile('Adm')){
                   
                    return true;
                }

            });
        }
    }
}