@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('home.index')}}" class="btn btn-primary mb-3">Back</a>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Publicar</h2></div>

                <div class="card-body">
                   @include('roles.message')

                  <form action="{{ route('home.store')}}" method="POST">
                    @csrf
                        <div class="container">
                            <h3>Requiered data</h3>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="title"
                                name="title" value="">
                              </div>
                              <select name="user_id" id="">
                                  <option value="1">admin</option>
                              </select>
                              <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" placeholder="content" class="form-control" id="description" rows="3"
                                ></textarea>
                              </div>
                               
                              <hr>
                              
                              <input type="submit" value="guardar" class="btn btn-info mt-1">
                        </div>


                </form>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
