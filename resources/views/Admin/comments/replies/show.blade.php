@extends('layouts.admin')


@section('header')
    Comment Replies
@endsection



@section('content')
    <table class="table table-hover">


        <thead >
        <tr>
            <th>ID</th>
            <th>Comment</th>
            <th>Author</th>
            <th>Post</th>
            <th>Created</th>
            <th>Activate/Deactivate</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>
        @if($replies)
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->author}}</td>
                    <td><a class="btn btn-info" href="{{route('home.post',$reply->comment->post->id)}}"> View  <i class="fa fa-eye"></i></a></td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>

                    <td>
                        @if($reply->is_active == 0)
                            {!! Form::model($reply,['method' => 'PUT', 'action' => ['CommentRepliesController@update',$reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">
                            {!!  Form::submit('Activate', ['class' => 'btn btn-success'])  !!}

                            {!! Form::close() !!}
                        @else
                            {!! Form::model($reply,['method' => 'PUT', 'action' => ['CommentRepliesController@update',$reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">
                            {!!  Form::submit('Deactivate', ['class' => 'btn btn-danger'])  !!}

                            {!! Form::close() !!}
                        @endif
                    </td>

                    <td>
                        {!! Form::model($reply,['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy',$reply->id]]) !!}

                        {!!  Form::submit('Delete', ['class' => 'btn btn-danger'])  !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach()
        @endif()
        </tbody>

    </table>
@endsection




