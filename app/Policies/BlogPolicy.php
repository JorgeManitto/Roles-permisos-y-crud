<?php

namespace App\Policies;

use App\Models\blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class blogPolicy
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
     * @param  \App\Models\blog  $blog
     * @return mixed
     */
    public function view(User $usera, blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $usera
     * @return mixed
     */
    public function create(User $usera)
    {
        
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\blog  $blog
     * @return mixed
     */
    public function update(User $usera, blog $blog, $perm=null)
    {
        /*if($usera->id === $blog->user_id){
            return true;
        }

        dd($blog->user_id);*/
        if($usera->havePermission($perm[0])){
            return true;
        }else{
            if($usera->havePermission($perm[1])){
                return $usera->id === $blog->user_id;
            }else{
                return false;
            }
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\blog  $blog
     * @return mixed
     */
    public function delete(User $usera, blog $blog, $perm = null)
    {
        if($usera->havePermission($perm[0])){
            return true;
        }else{
            if($usera->havePermission($perm[1])){
                return $usera->id === $blog->user_id;
            }else{
                return false;
            }
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\blog  $blog
     * @return mixed
     */
    public function restore(User $usera, blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\blog  $blog
     * @return mixed
     */
    public function forceDelete(User $usera, blog $blog)
    {
        //
    }
}
