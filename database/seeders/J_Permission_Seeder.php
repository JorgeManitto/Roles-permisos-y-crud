<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\J_Permission\Models\Role;
use App\Models\J_Permission\Models\Permission;
use App\Models\User;

class J_Permission_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Role::truncate();
        User::truncate(); //esto va a borrar a los usuarios
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $useradmin = User::create([
            'name'     => 'admin',
            'email'    =>'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        $roladmin = Role::create([
            'name' => 'Admin',
            'slug' =>  'admin',
            'description' => 'Administrator',
            'full-access' => 'yes',
    
        ]);

        $userrole = Role::create([
            'name' => 'Invite',
            'slug' =>  'invite',
            'description' => 'Invited',
            'full-access' => 'no',
    
        ]);
        $useradmin->roles()->sync([ $roladmin->id]);
        
        $permission_all = [];

        //blog

        $permission = Permission::create([
            'name'  => 'Edit own blog',
            'slug'  => 'editown.blog',
            'description' => ' A user can edit own blog',
        ]);

        $permission_all[]= $permission->id;
        

        $permission = Permission::create([
            'name'  => 'Destroy own blog',
            'slug'  => 'destroyown.blog',
            'description' => ' A user can Destroy own blog',
        ]);

        $permission_all[]= $permission->id;
        
        $permission = Permission::create([
            'name'  => 'Create blog',
            'slug'  => 'blog.create',
            'description' => ' A user can Create blog',
        ]);

        $permission_all[]= $permission->id;

        $userrole->permissions()->sync($permission_all);
        
        $permission = Permission::create([
            'name'  => 'Destroy blog',
            'slug'  => 'blog.destroy',
            'description' => ' A user can delete blog',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'Show blog',
            'slug'  => 'blog.show',
            'description' => ' A user can show blog',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'Edit blog',
            'slug'  => 'blog.edit',
            'description' => ' A user can edit blog',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'List role',
            'slug'  => 'role.index',
            'description' => ' A user can list Role',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'Show role',
            'slug'  => 'role.show',
            'description' => ' A user can see Role',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'Create role',
            'slug'  => 'role.create',
            'description' => ' A user can create Role',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'Edit role',
            'slug'  => 'role.edit',
            'description' => ' A user can edit Role',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'Destroy role',
            'slug'  => 'role.destroy',
            'description' => ' A user can destroy Role',
        ]);
        $permission_all[]= $permission->id;

        //user



        $permission = Permission::create([
            'name'  => 'List user',
            'slug'  => 'user.index',
            'description' => ' A user can list user',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'Show user',
            'slug'  => 'user.show',
            'description' => ' A user can see user',
        ]);

        $permission_all[]= $permission->id;

        /*

        $permission = Permission::create([
            'name'  => 'Create user',
            'slug'  => 'user.create',
            'description' => ' A user can create user',
        ]);

        $permission_all[]= $permission->id;
        */

        $permission = Permission::create([
            'name'  => 'Edit user',
            'slug'  => 'user.edit',
            'description' => ' A user can edit user',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'Destroy user',
            'slug'  => 'user.destroy',
            'description' => ' A user can destroy user',
        ]);
        $permission_all[]= $permission->id;



        $permission = Permission::create([
            'name'  => 'Show own user',
            'slug'  => 'userown.show',
            'description' => ' A user can see own user',
        ]);

        $permission_all[]= $permission->id;

        $permission = Permission::create([
            'name'  => 'Edit own user',
            'slug'  => 'userown.edit',
            'description' => ' A user can edit own user',
        ]);

        $permission_all[]= $permission->id;

         
        //$roladmin->permissions()->sync($permission_all);
    }
}
