@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo? $post->photo->file :'http://placehold.it/900x300'}}" alt="">

    <hr>

    <!-- Post Content -->

        <p class="lead" >{{$post->body}}</p>
    <hr>

    <!-- Blog Comments -->

    @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">

            {!! Form::open(['action' => 'PostCommentsController@store']) !!}

                    <input type="hidden" name="post_id" value="{{$post->id}}"/>

                     <div class="form-group">
                         {!!  Form::textarea('body', null ,['placeholder' => 'Leave a comment ...', 'class' => 'form-control', 'rows' => 3])!!}
                     </div>

                     <div class="form-group">
                         {!!  Form::submit('Comment ',['class' => 'btn btn-primary'])  !!}

                     </div>

                {!! Form::close() !!}

        </div>
    @endif

    <hr>

    <!-- Posted Comments -->


    @if(count($comments) > 0)
        @foreach($comments as $comment)


                <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object img-rounded"  width="55" src="{{Auth::user()->gravatar}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading  lead">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>

                <p>{{$comment->body}}</p>

                <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-info pull-right">Reply</button>

                    <div class="comment-reply">
                        {!! Form::open(['action' => 'CommentRepliesController@store']) !!}

                        <input type="hidden" name="comment_id" value="{{$comment->id}}"/>

                        <div class="form-group">
                            {!!  Form::textarea('body', null ,['placeholder' => 'Reply ...', 'class' => 'form-control', 'rows' => 2])!!}
                        </div>

                        <div class="form-group">
                            {!!  Form::submit('Reply ',['class' => 'btn btn-primary'])  !!}

                        </div>

                        {!! Form::close() !!}
                    </div>

                <hr/>
                <!-- Comment Reply -->

                @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $c_reply)
                            @if($c_reply->is_active == 1)
                            <div class="media">
                                 <a class="pull-left" href="#">
                                     <img class="media-object img-rounded"  width="45" src="{{$c_reply->photo}}" alt="">
                                 </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$c_reply->author}}
                                        <small>{{$c_reply->created_at->diffForHumans()}}</small>
                                    </h4>

                                    <p>{{$c_reply->body}}</p>
                                </div>

                             </div>
                        @endif
                    @endforeach
                 @endif

                    <!-- End Comment Reply-->
            </div>
        </div>
        </div>
            @endforeach
    @endif

@endsection

@section('scripts')
                <script>
                    $(".toggle-reply").on("click", function () {

                        $(this).next().slideToggle("slow");
                    });
                </script>
@endsection

