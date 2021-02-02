@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit</h2></div>

                <div class="card-body">
                   @include('users.message')

                  <form action="{{ route('user.update',$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="container">

                          <h3>Requiered data</h3>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="name"
                                name="name" value="{{old('name',$user->name)}}" disabled>
                              </div>

                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="email"
                                name="email" value="{{old('email',$user->email)}}" disabled>
                              </div>
                              

                              <div class="form-group">
                                <label for="roles">Rol</label>
                                <br>
                                <select disabled class="form-control" name="roles" id="roles">

                                  @foreach ($roles  as $role)
                                  <option value="{{$role->id}}"
                                    @isset($user->roles[0]->name)
                                    @if ($role->name == $user->roles[0]->name)
                                        selected
                                    @endif
                                    
                                    @endisset
                                    
                                    
                                    >
                                    {{$role->name}}
                                  </option>
                                  @endforeach
  
                                </select>
                              </div>
                              <hr>
                            
                              <div class="float-right">
                                <a class="btn btn-success mt-5" href="{{ route('user.index',$user->id)}}">Back</a>
                                <a class="btn btn-warning mt-5" href="{{ route('user.edit',$user->id)}}">Edit</a>                  
                                
                              </div>
                        </div>


                </form>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
