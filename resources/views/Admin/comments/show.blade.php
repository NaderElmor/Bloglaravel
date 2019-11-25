@extends('layouts.admin')


@section('header')
    Comments
@endsection



@section('content')
    <table class="table table-hover">


        <thead >
        <tr>
            <th>ID</th>
            <th>Comment</th>
            <th>Author</th>
            <th>Post</th>
            <th>Comment replies</th>
            <th>Created</th>
            <th>Activate/Deactivate</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>
        @if($comments)
            @foreach($comments as $comment)

                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->author}}</td>
                    <td><a class="btn btn-info" href="{{route('home.post',$comment->post->id)}}"> View Post <i class="fa fa-eye"></i></a></td>
                    <td><a class="btn btn-info" href="{{route('replies.show',$comment->id)}}"> View Replies <i class="fa fa-eye"></i></a></td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>

                    <td>
                        @if($comment->is_active == 0)
                            {!! Form::model($comment,['method' => 'PUT', 'action' => ['PostCommentsController@update',$comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">
                            {!!  Form::submit('Activate', ['class' => 'btn btn-success'])  !!}

                            {!! Form::close() !!}
                        @else
                            {!! Form::model($comment,['method' => 'PUT', 'action' => ['PostCommentsController@update',$comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">
                            {!!  Form::submit('Deactivate', ['class' => 'btn btn-danger'])  !!}

                            {!! Form::close() !!}
                        @endif
                    </td>

                    <td>
                        {!! Form::model($comment,['method' => 'DELETE', 'action' => ['PostCommentsController@destroy',$comment->id]]) !!}

                        {!!  Form::submit('Delete', ['class' => 'btn btn-danger'])  !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach()
        @endif()
        </tbody>

    </table>
@endsection




