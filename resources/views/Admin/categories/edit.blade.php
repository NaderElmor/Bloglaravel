@extends('layouts.admin')

@section('header')
    Edit  Category
@endsection

@section('content')




        {{--null is to let laravel fill out the form from the database automatically--}}
        {!! Form::model($category,['method' => 'PUT', 'action' => ['AdminCategoriesController@update', $category->id],'files' => true]) !!}

        <div class="form-group">
            {!!  Form::text('name', null ,['placeholder' => 'Category Name', 'class' => 'form-control'])!!}
        </div>




        <div class="col-md-offset-3"></div>


        <div class="form-group">
            {!!  Form::submit('Update',['class' => 'btn btn-primary col-sm-offset-2 col-sm-3  '])  !!}
        </div>

        {!! Form::close() !!}


        {{--delete form--}}
        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}


        <div class="form-group">
            {!!  Form::submit('Delete',['class' => 'btn btn-danger col-sm-offset-2 col-sm-3 '])  !!}
        </div>

        {!! Form::close() !!}




        @include('includes.form-errors')

        @endsection
    </div>