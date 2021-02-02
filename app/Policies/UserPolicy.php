<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $usera
     * @return mixed
     */
    public function viewAny(User $usera)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function view(User $usera, User $user,$perm = null)
    {
        //dd($user->id);
        /*if($usera->id == 1){
            return true;
        }else{
            return $usera->id === $user->id;
        }
        */
        if($usera->havePermission($perm[0])){
            return true;
        }else{
            if($usera->havePermission($perm[1])){
                return $usera->id === $user->id;
            }else{
                return false;
            }
        }

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $usera
     * @return mixed
     */
    public function create(User $usera)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function update(User $usera, User $user, $perm = null)
    {
        if($usera->havePermission($perm[0])){
            return true;
        }else{
            if($usera->havePermission($perm[1])){
                return $usera->id === $user->id;
            }else{
                return false;
            }
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function delete(User $usera, User $user)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function restore(User $usera, User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function forceDelete(User $usera, User $user)
    {
        //
    }
}
