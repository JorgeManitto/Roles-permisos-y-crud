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
                    {{$blog->title}}
                    
                   <div class="" style="float: right;">
                    <a href="{{ route('home.show',$blog->id)}}">
                        <i class="far fa-eye"></i>
                    </a>

                    <a href="{{route('home.edit',$blog->id)}}">
                        <i class="far fa-edit"></i>
                    </a>
                
                
               <form action="{{route('home.destroy',$blog->id)}}" method="post"
                style="display: inline-block;">
                   @csrf
                   @method('DELETE')
                <button type="submit" style="border:none">
                    <i class="far fa-trash-alt"></i>
                </button>
               </form>
                   </div>
                </div>

                <div class="card-body">
                    {{$blog->content}}
                </div>

                <div class="card-footer">
                   <div class="float-right">
                    {{$blog->created_at}}
                   </div>
                   
                </div>
            </div>
          </div>

          @endforeach
          
        </div>
        <div class="mt-5">
            {{ $blogs->links() }}
        </div>
      </div>

@endsection


