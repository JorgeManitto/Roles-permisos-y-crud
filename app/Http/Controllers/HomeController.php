<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\User;
use App\Models\J_Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs =  Blog::orderBy('id','Desc')->paginate(4);
        Paginator::useBootstrap();
        
        $user_name = User::get();
      
        return view('home',compact('blogs','user_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess','blog.create');

        $id = auth()->user()->id;
      
        return view('blog.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->validate([

            'title' => 'required|max:50|unique:blog,title',
            'content' => 'required|max:500', 
            'user_id' => '',  

        ]);
    
        $blog = Blog::create($request->all());

        return redirect()->route('home.index')
        ->with('status','Publish successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        //Gate::authorize('haveaccess','blog.show');
        $blog = Blog::find($id);
      
        return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = blog::find($id);
 
        $this->authorize('update',[$blog, ['blog.edit','editown.blog']]);

        //Gate::authorize('haveaccess','blog.edit');
        
        
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        

        $request->validate([

            'title' => 'required|max:50|unique:blog,title,'.$blog->id,
            'content' => 'required|max:500,'.$blog->id, 
            'user_id' => '',  

        ]);
        
        $blog->update($request->all());

        return redirect()->route('home.index')
        ->with('status','Public update successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Gate::authorize('haveaccess','blog.destroy');
        $blog = blog::find($id);

        $this->authorize('delete',[$blog, ['blog.destroy','destroyown.blog']]);

        $blog->delete();
        return redirect()->route('home.index')
        ->with('status','Public removed successfully');
    }
}
