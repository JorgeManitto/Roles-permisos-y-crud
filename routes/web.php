<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\J_Permission\Models\Role;
use App\Models\J_Permission\Models\Permission;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/home', HomeController::class)->name('*','home');

Route::get('/test',function(){
    
    $user = User::find(3);

    //$user->roles()->sync([2]);
    Gate::authorize('haveaccess','role.index');
    
    return $user->roles;
    //return $user->havePermission('role.index');
});

Route::resource('/role', RoleController::class)->names('role');
Route::resource('/user', UserController::class,['except'=>['create','store']])->names('user');