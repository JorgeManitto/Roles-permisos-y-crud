@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit</h2></div>

                <div class="card-body">
                   @include('roles.message')

                  <form action="{{ route('role.update',$role->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="container">
                            <h3>Requiered data</h3>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="name"
                                name="name" value="{{old('name',$role->name)}}">
                              </div>

                              <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" placeholder="slug"
                                name="slug" value="{{old('slug',$role->slug)}}">
                              </div>
                              

                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" placeholder="description" class="form-control" id="description" rows="3"
                                >{{old('description',$role->description)}}</textarea>
                              </div>
                               
                              <hr>
                              <h4>Full-access</h4>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                                @if (old('full-access')== 'yes' || $role['full-access']== 'yes')
                                checked
                                @endif>
                                <label class="custom-control-label" for="fullaccessyes">Yes</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"
                                @if (old('full-access')== 'no'|| $role['full-access']== 'no')
                                checked
                                @endif
                               >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                              </div>
                              <hr>

                              <h3>Permission List</h3>
                              
                              @foreach ($permissions as $permission)

                              <div class="custom-control custom-checkbox">

                                <input type="checkbox" class="custom-control-input" id="permission_{{   $permission->id }}" name="permission[]" value="{{ $permission->id }}">


                                <label class="custom-control-label" for="permission_{{   $permission->id }}">{{   $permission->id }}
                                -
                                {{  $permission->name   }}

                                <em>({{$permission->description}})</em>
                                
                                </label>
                              </div>

                              @endforeach
                              <a class="btn btn-success mt-5" href="{{ route('role.index',$role->id)}}">Back</a>
                              <input type="submit" value="guardar" class="btn btn-primary mt-5">
                        </div>


                </form>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
