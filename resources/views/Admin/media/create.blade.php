@extends('layouts.admin')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection


@section('header')
   Upload Photos
@endsection



@section('content')

    {!! Form::open(['action' => 'AdminMediasController@store', 'class' => 'dropzone']) !!}



    {!! Form::close() !!}




@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection