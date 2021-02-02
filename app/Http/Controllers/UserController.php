<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\J_Permission\Models\Role;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess','user.index');

        $users =  User::with('roles')->orderBy('id','Desc')->paginate(2);
        Paginator::useBootstrap();
        
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $this->authorize('view',[$user, ['user.show','userown.show']]);

        $roles = Role::orderBy('name','Asc')->get();
    
        return view('users.view', compact('roles','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',[$user, ['user.edit','userown.edit']]);

        $roles = Role::orderBy('name','Asc')->get();
    
        return view('users.edit', compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|max:50|unique:users,name,'.$user->id,
            'email' => 'required|max:50|unique:users,email,'.$user->id,
            ]);


        $user ->update($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('user.index')
                ->with('status','User update successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('haveaccess','user.destroy');
        $user->delete();
        return redirect()->route('user.index')
        ->with('status','User removed successfully');
    }
}
