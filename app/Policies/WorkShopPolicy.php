<?php

namespace App\Policies;

use App\User;
use App\Models\WorkShop;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkShopPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the workShop.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WorkShop  $workShop
     * @return mixed
     */
    public function view(User $user, WorkShop $workShop)
    {
        //
        
       return $user->id == $workShop->user_id;
    }

    /**
     * Determine whether the user can create workShops.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the workShop.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WorkShop  $workShop
     * @return mixed
     */
    public function update(User $user, WorkShop $workShop)
    {
        //
    }

    /**
     * Determine whether the user can delete the workShop.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WorkShop  $workShop
     * @return mixed
     */
    public function delete(User $user, WorkShop $workShop)
    {
        //
    }
}
