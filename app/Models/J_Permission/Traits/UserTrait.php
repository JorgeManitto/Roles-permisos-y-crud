<?php
namespace App\Models\J_Permission\Traits;
use App\Models\J_Permission\Models\Role;
trait UserTrait{
    
    public function roles(){
        return $this->belongsToMany(Role::class)->withTimesTamps();
    }

    public function havePermission($permission){
        foreach($this->roles as $role){
            if($role['full-access'] == 'yes'){
                return true;
            }
            foreach($role->permissions as $perm){
                if($perm->slug == $permission){
                    return true;
                }
            }
        }
        return false;
    }
}