@extends('layouts.admin')


@section('header')
    Posts
@endsection



@section('content')
    @if(Session::has('deletedPost'))
        <p class="alert alert-danger">{{session('deletedPost')}}</p>
    @endif

    <table class="table table-hover">

        <thead >
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Author</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>

        <tbody>
        @if($posts)
            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->user['name'] }}</td>
                    <td>{{$post->category['name'] ? $post->category['name'] : 'No category'  }}</td>



                    <td>
                        <img height="55" width="55"  src="{{$post->photo? $post->photo->file :'http://placehold.it/50x50'}}"/>

                    </td>

                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach()
        @endif()
        </tbody>

    </table>
@endsection




