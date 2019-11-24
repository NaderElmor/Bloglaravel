@extends('layouts.admin')


@section('header')
    Categories
@endsection



@section('content')

    <div class="row">
        <div class="col-sm-6">
            <table class="table table-hover">

                <thead >
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>

                <tbody>
                @if($categories)
                    @foreach($categories as $category)

                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date'}}</td>
                        </tr>

                    @endforeach()
                @endif()
                </tbody>

            </table>
        </div>

        <div class="col-sm-6">

            {!! Form::open(['action' => 'AdminCategoriesController@store']) !!}

                 <div class="form-group">
                     {!!  Form::text('name', null ,['placeholder' => 'Category Name', 'class' => 'form-control'])!!}
                 </div>

                 <div class="form-group">
                    {!!  Form::submit('Create',['class' => 'btn btn-primary'])  !!}
                 </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection

