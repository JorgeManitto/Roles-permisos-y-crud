@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create</h2></div>

                <div class="card-body">
                   @include('roles.message')

                  <form action="{{ route('role.store')}}" method="POST">
                    @csrf
                        <div class="container">
                            <h3>Requiered data</h3>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="name"
                                name="name" value="{{old('name')}}">
                              </div>

                              <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" placeholder="slug"
                                name="slug" value="{{old('slug')}}">
                              </div>
                              

                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" placeholder="description" class="form-control" id="description" rows="3"
                                >{{old('description')}}</textarea>
                              </div>
                               
                              <hr>
                              <h4>Full-access</h4>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes">
                                <label class="custom-control-label" for="fullaccessyes"
                                @if (old('full-access')== 'yes')
                                checked
                                @endif
                                >Yes</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" >
                                <label class="custom-control-label" for="fullaccessno"
                                @if (old('full-access')== 'no')
                                checked
                                @endif
                                @if (old('full-access')=== null)
                                checked
                                @endif
                                >No</label>
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

                              <input type="submit" value="guardar" class="btn btn-info mt-5">
                        </div>


                </form>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
