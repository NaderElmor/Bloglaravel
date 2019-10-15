@extends('layouts.admin')

@section('header')
    Edit  Post
@endsection

@section('content')

    <div class="col-sm-9 col-md-offset-4" style="margin-bottom:10px;   ">
        <img class=" img-circle" height="400" width="400"  src="{{$post->photo? $post->photo->file :'http://placehold.it/300x300'}}"/>
    </div>
    <div class="col-sm-8 col-md-offset-2" >


        {{--null is to let laravel fill out the form from the database automatically--}}
        {!! Form::model($post,['method' => 'PUT', 'action' => ['AdminPostsController@update', $post->id],'files' => true]) !!}

        <div class="form-group">
            {!!  Form::text('title', null ,['placeholder' => 'Tilte', 'class' => 'form-control'])!!}
        </div>

        <div class="form-group">
            {!!  Form::textarea('body', null ,['placeholder' => 'Type the content ...', 'class' => 'form-control', 'rows' => 3])!!}
        </div>



        <div class="form-group">
            {!!  Form::select('category_id',['' => 'Category :'] + $categories, null , ['class' => 'form-control'])!!}
        </div>


        <div class="form-group">
            {!!  Form::select('user_id',['' => 'Author :'] + $users, null , ['class' => 'form-control'])!!}
        </div>

        <div class="form-group">
            {!!  Form::file('photo_id', ['class' => 'form-control'])!!}
        </div>

        <div class="col-md-offset-3"></div>


        <div class="form-group">
            {!!  Form::submit('Update',['class' => 'btn btn-primary col-sm-offset-2 col-sm-3  '])  !!}
        </div>

        {!! Form::close() !!}


        {{--delete form--}}
        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}


        <div class="form-group">
            {!!  Form::submit('Delete',['class' => 'btn btn-danger col-sm-offset-2 col-sm-3 '])  !!}
        </div>

        {!! Form::close() !!}




        @include('includes.form-errors')

        @endsection
    </div>