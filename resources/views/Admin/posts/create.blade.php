@extends('layouts.admin')

@section('header')
    Create Posts
@endsection


@section('content')

    @include('includes.tiny-editor')


    {!! Form::open(['action' => 'AdminPostsController@store','files' => true]) !!}

    <div class="form-group">
        {!!  Form::text('title', null ,['placeholder' => 'Title', 'class' => 'form-control'])!!}
    </div>

    <div class="form-group">
        {!!  Form::select('category_id',['' => 'Category :'] + $categories, ['class' => 'form-control'])!!}
    </div>



    <div class="form-group">
        {!!  Form::textarea('body', null ,['placeholder' => 'Type the content ...', 'class' => 'form-control', 'rows' => 3,'id'=>'mytextarea'])!!}
    </div>

    {{--<div class="form-group">--}}
        {{--{!!  Form::select('category_id',array('' =>'Category :',1 => 'Tech',2 => 'Health'), '' ,['class' => 'form-control'])!!}--}}
    {{--</div>--}}




    <div class="form-group">
        {!!  Form::file('photo_id')!!}
    </div>




    <div class="form-group">
        {!!  Form::submit('Create',['class' => 'btn btn-primary'])  !!}
    </div>

    {!! Form::close() !!}

    @include('includes.form-errors')
@endsection