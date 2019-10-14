@extends('layouts.admin')

@section('header')
    Edit  User
@endsection

@section('content')

    <div class="col-sm-9 col-md-offset-4" style="margin-bottom:10px;   ">
        <img class=" img-circle" height="400" width="400"  src="{{$user->photo? $user->photo->file :'http://placehold.it/300x300'}}"/>
    </div>
    <div class="col-sm-8 col-md-offset-2" >


        {{--null is to let laravel fill out the form from the database automatically--}}
    {!! Form::model($user,['method' => 'PUT', 'action' => ['AdminUsersController@update', $user->id],'files' => true]) !!}

    <div class="form-group">
        {!!  Form::text('name', null ,['placeholder' => 'UserName', 'class' => 'form-control'])!!}
    </div>

    <div class="form-group">
        {!!  Form::email('email', null ,['placeholder' => 'Email', 'class' => 'form-control'])!!}
    </div>


    <div class="form-group">
        {!!  Form::password('password',['placeholder' => 'Password', 'class' => 'form-control','placeholder'=> 'Type to modify your password'])!!}
    </div>

    <div class="form-group">
        {!!  Form::select('is_active',array('' =>'Activate this user?',0 => 'Not active',1 => 'Active'), null ,['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
        {!!  Form::select('role_id',['' => 'This user is :'] + $roles, null , ['class' => 'form-control'])!!}
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
        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}


                 <div class="form-group">
                     {!!  Form::submit('Delete',['class' => 'btn btn-danger col-sm-offset-2 col-sm-3 '])  !!}
                 </div>

            {!! Form::close() !!}




    @include('includes.form-errors')

@endsection
    </div>