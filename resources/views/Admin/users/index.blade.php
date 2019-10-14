@extends('layouts.admin')


@section('header')
Users
@endsection



@section('content')
    @if(Session::has('deletedUser'))
        <p class="alert alert-danger">{{session('deletedUser')}}</p>
    @endif

    <table class="table table-hover text-center">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Photo</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>

        <tbody>
        @if($users)
            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>

                    @if($user->is_active == 1)
                        <td class="alert alert-success">Yes</td>
                    @else
                        <td class="alert alert-danger">No</td>
                    @endif

                    <td>
                            <img height="55" width="55"  src="{{$user->photo? $user->photo->file :'http://placehold.it/50x50'}}"/>

                    </td>

                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach()
        @endif()
        </tbody>

    </table>
@endsection




