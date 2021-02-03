<?php
$user = App\Models\blog::class;                       
?>
@extends('layouts.app')

@section('content')
       <div class="container">
           <a href="{{route('home.create')}}" class="btn btn-primary mb-3">Public</a>
          
        <div class="row">
          
            @if (session('status'))

            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>

        @endif
          @foreach ($blogs as $blog)
          <div class="col-sm">
                  
            <div class="card">

                <div class="card-header">
                    <a href="{{ route('home.show',$blog->id)}}">
                    {{$blog->title}}
                </a>  
                   <div class="" style="float: right;">
                  
                    @can('update',[$user,$blog,['blog.edit','editown.blog']])
                    <a href="{{route('home.edit',$blog->id)}}"><i class="far fa-edit"></i></a>
                    @endcan
                     
                     @can('update',[$user,$blog,['blog.destroy','destroyown.blog']])           
               <form action="{{route('home.destroy',$blog->id)}}" method="post"
                style="display: inline-block;">
                   @csrf
                   @method('DELETE')
                <button type="submit" style="border:none">
                    <i class="far fa-trash-alt"></i>
                </button>
               </form>
                    @endcan

                   </div>
                </div>

                <div class="card-body">
                    {{$blog->content}}
                </div>

                <div class="card-footer">
                   <div class="" style="float: right">

                    {{$blog->created_at}}

                   </div>
                   @foreach ($user_name as $name)
                   @if ($blog->user_id == $name->id)
                       {{$name->name}}
                   @endif                   
                   @endforeach
                </div>
            </div>
          </div>

          @endforeach
          <div>
           
           
     
          </div>
        </div>
        <div class="mt-5">
            {{ $blogs->links() }}
        </div>
      </div>

@endsection


