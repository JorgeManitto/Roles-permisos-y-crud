<?php
Route::get('/test', function () {
 /*
    return    Role::create([
        'name' => 'Admin',
        'slug' =>  'admin',
        'description' => 'Administrator',
        'full-access' => 'yes',

    ]);
    */
    /*
    return    Role::create([
        'name' => 'Guest',
        'slug' =>  'guest',
        'description' => 'Guest',
        'full-access' => 'no',
    ]);
    
    */
   /* 
    return    Role::create([
        'name' => 'Test',
        'slug' =>  'test',
        'description' => 'Testing',
        'full-access' => 'no',
    ]);
        */

  /*  $user = User::find(1);

    $user->roles()->sync([1,3]);

   return $user->roles;
    */
/*
    return    Permission::create([
        'name' => 'List product',
        'slug' =>  'product.list',
        'description' => 'A user can list a permission',
    ]);
*/
    $user = Role::find(2);

    $user->permissions()->sync([1,2,3,4,5,6,7,8,9]);

   return $user->permissions;
});