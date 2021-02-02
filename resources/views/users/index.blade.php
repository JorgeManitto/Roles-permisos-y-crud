@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                @include('users.message')

                <div class="card-body">

                  
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role(s)</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                            
                          @foreach ($users as $user)
                          
                          <tr>
                            <th scope="row">{{ $user->id}}</th>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                              @isset($user->roles[0]->name)
                              {{ $user->roles[0]->name}}
                              @endisset
                              
                            </td>
                            <td>{{ $user['full-access']}}</td>
                            <td>
                              @can('view', [$user, ['user.show','userown.show']])
                              <a href="{{ route('user.show',$user->id)}}" class="btn btn-success">Show</a>
                              @endcan
                            </td>
                            <td>
                              @can('view',[$user, ['user.edit','userown.edit']])
                              <a href="{{ route('user.edit',$user->id)}}" class="btn btn-warning">Edit</a>
                              @endcan
                            </td>
                            <td>
                              @can('haveaccess', 'user.destroy')
                              <form action="{{ route('user.destroy',$user->id)}}" method="post">
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
                      {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
