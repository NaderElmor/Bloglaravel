@extends('layouts.admin')



@section('header')
    Photos
@endsection



@section('content')
    @if(Session::has('deletedUser'))
        <p class="alert alert-danger">{{session('deletedUser')}}</p>
    @endif


    <form action="/delete/media" method="post" class="form-inline">
        <div class="form-group">
            <select name="chBoxArray" class="form-control">

                <option value="delete">Delete</option>

            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn-primary">
        </div>

        <table class="table table-hover">

            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>ID</th>
                <th>Photo</th>
                <th>Created</th>
                <th>Delete</th>
            </tr>
            </thead>

            <tbody>
            @if($photos)
                @foreach($photos as $photo)

                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="chBoxArray[]" value="{{$photo->id}}"></td>
                        <td>{{$photo->id}}</td>
                        <td><img height="50" src="{{$photo->file}}"></td>
                        <td>{{$photo->created_at->diffForHumans()}}</td>

                        <td>
                            {{--delete form--}}
                            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}


                            <div class="form-group">
                                {!!  Form::submit('Delete',['class' => 'btn btn-danger  '])  !!}
                            </div>

                            {!! Form::close() !!}


                        </td>
                    </tr>

                @endforeach()
            @endif()
            </tbody>

        </table>
    </form>


@endsection

@section('scripts')

    this is for multible/bulk selection
    <script>
        $(document).ready(function () {

            $('#options').on('click',function () {

                if(this.checked)
                {
                    $('.checkBoxes').each(function () {

                        this.checked = true;
                    });
                }
                else
                {
                    $('.checkBoxes').each(function () {

                        this.checked = false;
                    });
                }
            });

        });
    </script>

@stop