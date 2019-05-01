@extends('layouts/layout_plain');

@section('content')
    <div id='loading' style="position: fixed; left: 50%; top: 50%; display: none; z-index: 100;">
        <img src="https://www.drupal.org/files/issues/ajax-loader.gif"></img>
    </div>

    <header class="" style="background-size: cover; background-image:linear-gradient(135deg, rgba(67,43,102,0.3),rgba(0,0,0,0.6)), url({{asset('img/cover/business1.png')}})">
        <div class="container">
            <div class="row pb40">
                <div class="col-12 align-left text-white">
                    <h1 class="post-board-title">Let's Talk Business</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid bg-white">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="#">Let's Talk Business</a></li>
                <li><a href="#">Tech</a></li>
                <li><a href="#">Technology</a></li>
            </ul>
        </div>
    </div>


    <div class="container-fluid pt20 pb50 bg-white">

        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8">
                    <h1 class="text-muted">{{ $post->post_title }}</h1>
                    <hr />
                    <div class="single-post">
                        <div class="post-content">
                            <p class="text-justify">
                                <img src="{{ $post->post_image }}" class="img-responsive post-img" style="width: 420px;" align="left" />
                                {{ $post->post_description }}
                            </p>

                        </div>
                        {{ $post->post_permalink }}
                    </div>



                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="post-comment mt40">
                                <div class="col-12 discussion-container">
                                    <h5>Leave a Comment</h5>
                                    <div class="single-discussion text-dark ptb20">
                                        <form method="POST" action="/post/postComment" id="myform">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-2">
                                                    <input type="hidden" name="text-post-id" value="{{ $post->id }}">
                                                    <input type="hidden" name="text-post-id-link" value="{{ $post->post_id_link }}">
                                                    <input type="hidden" name="text-author-id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="text-author-username" value="{{ Auth::user()->username }}">
                                                    <img src="/storage/avatars/{{  Auth::user()->avatar }}" class="img-responsive discussion-avatar" style="max-width: 70px;" align="left">
                                                </div>
                                                <div class="col-10">
                                                    <textarea name="comment" class="form-control form-rounded single-comment mt5" rows="4" style="resize: none;" placeholder="Enter comment..." required></textarea>
                                                </div>

                                                <div class="col-12 align-right">
                                                    <div class="pr10">
                                                        <button id="submit_comment" type="submit" class="btn btn-primary text-white mt10">Post Comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>




                                    @foreach($comments as $each_comment)
                                    <div class="single-discussion text-dark ptb20">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="discussion-avatar" style="background:url();" >
                                                </div>
                                            </div>

                                            <div class="col-10">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>
                                                            <b>{{ $each_comment->author_username }}</b>
                                                            <span class="ml10">&middot;&nbsp; {{ $each_comment->created_date }}</span>
                                                        </h6>
                                                    </div>
                                                    <div class="col-12 mt10">
                                                        <p>{{ $each_comment->comment_text }}</p>
                                                    </div>
                                                </div>


                                                @foreach($replies as $each_reply)
                                                @if($each_reply->comment_id == $each_comment->id)
                                                <div class="row plr10 single-comment mt10">
                                                    <div class="col-1 plr5">
                                                        <!--img src="/storage/avatars/{{ $user->avatar }}" class="img-responsive rounded-circle" style="max-width: 40px;"-->
                                                    </div>
                                                    <div class="col-11">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h6>
                                                                    <b>{{ $each_reply->author_username }}</b>
                                                                    <span class="ml10">&middot;&nbsp; {{ $each_reply->created_date }}</span>
                                                                </h6>
                                                            </div>
                                                            <div class="col-12">
                                                                <p>{{ $each_reply->reply_text }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach







                                                <div class="col-12 mb20 comment-reply" style="display: block;">
                                                    <div class="row ">
                                                        <div class="col-1 plr5">
                                                            <img src="/storage/avatars/{{ Auth::user()->avatar }}" class="img-responsive rounded-circle" style="max-width: 40px;">
                                                        </div>
                                                        <div class="col-11 plr5 single-comment-input">
                                                            <form id="{{ 'form'.$each_comment->id }}" name="frmReply" method="POST" action="/post/postReplies">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="text-post-id" value="{{ $post->id }}">
                                                                <input type="hidden" name="text-comment-id" value="{{ $each_comment->id }}">
                                                                <input type="hidden" name="text-post-id-link" value="{{ $post->post_id_link }}">
                                                                <input type="hidden" name="text-author-id" value="{{ Auth::user()->id }}">
                                                                <input type="hidden" name="text-author-username" value="{{ Auth::user()->username }}">
                                                                <textarea class="form-control form-rounded single-comment txtarea" rows="1" style="resize: none;" name="reply" required></textarea>
                                                                <i class="fa fa-paper-plane text-primary send-comment" data-comment="{{ $each_comment->id }}" onclick="sendReply(this, {{ $each_comment->id }})"></i>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach















                                </div>
                            </div>
                        </div>
                    </div>






                </div>

                <div class="col-12 col-sm-4">
                    <div class="row mt20">
                        <div class="col-12">
                            <h4 class="text-muted">Popular Post</h4>
                        </div>
                        <div class="col-12">
                            <ul class="popular-post-sidebar">
                                <li>
                                    <img src="{{asset('img/cover/animals.jpg')}}" align="left" />
                                    <a href="#" class="text-muted"><h5 class="mb0">A tour in Africa</h5></a>
                                    <p class="mb0"><small>Aug 21, 2018</small></p>
                                </li>
                                <li>
                                    <img src="{{asset('img/cover/animals.jpg')}}" align="left" />
                                    <a href="#" class="text-muted"><h5 class="mb0">A tour in Africa</h5></a>
                                    <p class="mb0"><small>Aug 21, 2018</small></p>
                                </li>
                                <li>
                                    <img src="{{asset('img/cover/animals.jpg')}}" align="left" />
                                    <a href="#" class="text-muted"><h5 class="mb0">A tour in Africa</h5></a>
                                    <p class="mb0"><small>Aug 21, 2018</small></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Error message-->
    <div class="modal fade" id="error_validation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-info text-white">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="close text-white float-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h6 class="mt20" id="error_message">
                                Please enter a comment first.
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $(document).ajaxStart(function () {
                //    alert(1);
                $("#loading").show();
            });

            $(document).ajaxStop(function () {
                $("#loading").hide();
            });
        });

            function sendReply(element, id) {

                reply = $("textarea", $(element).parent()).val();
//                alert(reply);
                if (reply.trim() == "") {
                    $('#error_validation').modal('toggle');
                    //alert("Reply cannot be empty.");
                } else {
//                    form = $(element).closest("form");
//                    comment_id = $(element).data('comment');

//                    formData = new FormData($(this)[0]);
//                    formData.append("comment", comment_id);
//                    formData.append("reply", reply);
                        var _form = '#form' + id;
                    $.ajax({
                        url: '/post/postReplies',
                        data: $(_form).serialize(),
                        type: "POST",
                        success: function (data) {
                            location.reload();
                        }
                    });
                }


            };

    </script>

@endsection
