<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\J_Permission\Models\Permission;
use App\Models\J_Permission\Models\Role;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        Gate::authorize('haveaccess','role.index');

        $roles =  Role::orderBy('id','Desc')->paginate(2);
        Paginator::useBootstrap();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess','role.create');
        $permissions = Permission::all();

        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveaccess','role.create');
        $request->validate([
            'name' => 'required|max:50|unique:roles,name',
            'slug' => 'required|max:50|unique:roles,slug',
            'full-access' => 'required|in:yes,no',  

        ]);

        $role = Role::create($request->all());

        //if($request -> get('permission')){
            $role->permissions()->sync($request->get('permission'));
        //}
        return redirect()->route('role.index')
        ->with('status','Role saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        Gate::authorize('haveaccess','role.show');
        $permissions = Permission::all();

        return view('roles.view',compact('permissions','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('haveaccess','role.edit');
        $permissions = Permission::all();

        return view('roles.edit',compact('permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('haveaccess','role.edit');
        $request->validate([
            'name' => 'required|max:50|unique:roles,name,'.$role->id,
            'slug' => 'required|max:50|unique:roles,slug,'.$role->id,
            'full-access' => 'required|in:yes,no',  

        ]);

        $role ->update($request->all());

        //if($request -> get('permission')){
            $role->permissions()->sync($request->get('permission'));
        //}
        return redirect()->route('role.index')
        ->with('status','Role update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('haveaccess','role.destroy');
        $role->delete();
        return redirect()->route('role.index')
        ->with('status','Role removed successfully');
    }
}
