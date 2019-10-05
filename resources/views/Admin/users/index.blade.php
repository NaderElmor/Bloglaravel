@extends('layouts.admin')


@section('header')
Users
@endsection

@section('content')
    <table class="table table-hover text-center">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>

        <tbody>
        @if($users)
            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>

                    @if($user->is_active == 1)
                        <td class="alert alert-success">Yes</td>
                    @else
                        <td class="alert alert-danger">No</td>
                    @endif

                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach()
        @endif()
        </tbody>

    </table>
@endsection




