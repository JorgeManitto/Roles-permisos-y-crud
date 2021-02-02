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
                                name="name" value="{{old('name',$user->name)}}">
                              </div>

                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="email"
                                name="email" value="{{old('email',$user->email)}}">
                              </div>
                              

                              <div class="form-group">
                                <label for="roles">Rol</label>
                                <br>
                                <select class="form-control" name="roles" id="roles">

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
                              <input type="submit" value="guardar" class="btn btn-primary mt-5">
                        </div>


                </form>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
