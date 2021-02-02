@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('home.index')}}" class="btn btn-primary mb-3">Back</a>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Public</h2></div>

                <div class="card-body">
                 
               
                  <form action="" method="POST">
                    @csrf
                  
                        <div class="container">
                            <h3>Data</h3>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input readonly type="text" class="form-control" id="title" placeholder="title"
                                name="title" value="{{old('',$blog->title)}}">
                              </div>
                              <select name="user_id" id="" disabled class="mt-2">
                                  <option  value="1">admin</option>
                              </select>
                              <div class="form-group">
                                <label for="content">Content</label>
                                <textarea disabled name="content" placeholder="content" class="form-control" id="description" rows="3"
                                >{{$blog->content}}</textarea>
                              </div>
                              <div class="mt-3">
                                  Created at:
                              </div>
                              <div class="form-group">
                                <div class="float-right">
                                 {{$blog->created_at}}
                                </div>
                                
                             </div>
                              <hr>
                              
                              
                        </div>


                </form>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
