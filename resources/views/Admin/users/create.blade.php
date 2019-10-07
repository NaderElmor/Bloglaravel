@extends('layouts.admin')

@section('header')
   Create Users
@endsection

@section('content')
    {!! Form::open(['action' => 'AdminUsersController@store','files' => true]) !!}

             <div class="form-group">
                 {!!  Form::text('name', null ,['placeholder' => 'UserName', 'class' => 'form-control'])!!}
             </div>

             <div class="form-group">
                 {!!  Form::email('email', null ,['placeholder' => 'Email', 'class' => 'form-control'])!!}
             </div>


            <div class="form-group">
                {!!  Form::password('password',['placeholder' => 'Password', 'class' => 'form-control'])!!}
            </div>

             <div class="form-group">
                 {!!  Form::select('is_active',array('' =>'Activate this user?',0 => 'No',1 => 'Yes'), '' ,['class' => 'form-control'])!!}
             </div>

            <div class="form-group">
                 {!!  Form::select('role_id',['' => 'This user is :'] + $roles, ['class' => 'form-control'])!!}
             </div>

            <div class="form-group">
                {!!  Form::file('photo_id', ['class' => 'form-control'])!!}
            </div>




             <div class="form-group">
                 {!!  Form::submit('Create',['class' => 'btn btn-primary'])  !!}
             </div>

        {!! Form::close() !!}

       @include('includes.form-errors')
@endsection