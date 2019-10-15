@extends('layouts.admin')



@section('header')
    Photos
@endsection



@section('content')
    @if(Session::has('deletedUser'))
        <p class="alert alert-danger">{{session('deletedUser')}}</p>
    @endif

    <table class="table table-hover text-center">

        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Created</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>
        @if($photos)
            @foreach($photos as $photo)

                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file}}"></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>

                    <td>
                        {{--delete form--}}
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}


                        <div class="form-group">
                            {!!  Form::submit('Delete',['class' => 'btn btn-danger col-sm-offset-2 col-sm-3 '])  !!}
                        </div>

                        {!! Form::close() !!}


                    </td>
                </tr>

            @endforeach()
        @endif()
        </tbody>

    </table>
@endsection