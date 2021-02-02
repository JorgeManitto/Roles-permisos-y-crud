@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                @include('roles.message')

                <div class="card-body">

                  @can('haveaccess', 'role.create')
                    <a href="{{ route('role.create')}}" class="btn btn-primary" style="float: right;">Create</a>
                  @endcan  
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Full-access</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                            
                          @foreach ($roles as $role)
                          
                          <tr>
                            <th scope="row">{{ $role->id}}</th>
                            <td>{{ $role->name}}</td>
                            <td>{{ $role->slug}}</td>
                            <td>{{ $role->description}}</td>
                            <td>{{ $role['full-access']}}</td>
                            <td>
                              @can('haveaccess', 'role.show')
                              <a href="{{ route('role.show',$role->id)}}" class="btn btn-success">Show</a>
                              @endcan
                            </td>
                            <td>
                              @can('haveaccess', 'role.edit')
                              <a href="{{ route('role.edit',$role->id)}}" class="btn btn-warning">Edit</a>
                              @endcan
                            </td>
                            <td>
                              @can('haveaccess', 'role.destroy')
                              <form action="{{ route('role.destroy',$role->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                              </form>
                              @endcan
                            </td>
                            
                          </tr>
                            @endforeach
                        
                        </tbody>
                      </table>
                      {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
