@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">

                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col" colspan="2"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td> {{$user->name}} </td>
                    <td>{{$user->email}}</td>
                    <td>{{implode(',', $user->roles()->get()->pluck('name')->toArray())}}</td>
                    @can('edit-users')
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                    </td>
                    @endcan
                    @can('delete-users')
                    <td>
                    <form action="{{route('admin.users.destroy',$user)}}"  class="float-left" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger">Delete</button>
                     </form>
                    </td>
                    @endcan
                    </tr>
                    @endforeach
                
                </tbody>
                </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
