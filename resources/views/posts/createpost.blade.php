@extends('layouts/layout_plain');

@section('content')
    <form id="" method="POST" action="/post/save/{{ $link_id }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div id="board-createpost" class="hoot-modal bg-white mt50" style="display: inherit; overflow-y: auto;">
            <div class="container ptb30">
                <div class="row">
                    <div class="col-12 align-right">
                        <a href="javascript:void(0);" onclick="closeAll();" ><i class="fa fa-times text-white"></i></a>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                                <div id="first-step-post" class="card trans200">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                &nbsp;
                                            </div>
                                            <div class="col-4 align-right">
                                                <a href="/board/discussion/{{ $link_id }}">Back</a>
                                            </div>
                                        </div>

                                        <div class="row mt20">

                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="post-title" class="form-control form-rounded" placeholder="Post Title" required  value="{{ old('post-title') }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <textarea name="post-description" class="form-control form-rounded single-comment txtarea" rows="1" style="resize: none;" placeholder="Description" required  value="{{ old('post-description') }}"></textarea>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <span>Select A Topic</span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="post-topic-display" style="width: 100%;" class="form-control form-rounded" disabled value="ANNOUNCEMENTS">
                                                </div>
                                                <button style="background: transparent; margin-top: -48px; right: 20px; position: absolute;" id="select_category" type="button" onclick="chooseCategory()" class="btn btn-createboard font-weight-bold">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                                <input type="hidden" name="post-topic-session" value="ANNOUNCEMENTS">
                                                <input type="hidden" name="post-topic" value="16">
                                            </div>
































                                            <div id="event-type-topic" class="col-12" style="display: none;">
                                                <div class="row plr10">
                                                    <div class="col-12 col-sm-6 plr5">
                                                        <label>Start Date:</label>
                                                        <input type="date" name="post-start-date" class="form-control form-rounded">
                                                    </div>
                                                    <div class="col-12 col-sm-6 plr5">
                                                        <label>Start Time:</label>
                                                        <input type="time" name="post-start-time" class="form-control form-rounded">
                                                    </div>
                                                </div>
                                                <div class="row plr10">
                                                    <div class="col-12 col-sm-6 plr5">
                                                        <label>End Date:</label>
                                                        <input type="date" name="post-end-date" class="form-control form-rounded">
                                                    </div>
                                                    <div class="col-12 col-sm-6 plr5">
                                                        <label>End Time:</label>
                                                        <input type="time" name="post-end-time" class="form-control form-rounded">
                                                    </div>
                                                </div>
                                                <div class="row plr10 mt10">
                                                    <div class="col-12">
                                                        <div class="material-switch float-right">
                                                            <span class="mr5">hidden after event</span>
                                                            <input id="is-hidden" name="is-hidden-after" type="checkbox" value="1"/>
                                                            <label for="is-hidden" class="label-primary"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt5">
                                                <div class="row plr10">
                                                    <div class="col-sm-6 col-12 plr5 mt10">
                                                        <button class="btn btn-default btn-blue mb5" onclick="return false;" title="add image"><i class="fa fa-images"></i></button> Add Image
                                                        <input type="file" id="postimage" name="postimage" class="dropify" accept=".gif,.png,.jpg,.jpeg" data-default-file="" />
                                                    </div>
                                                    <div class="col-sm-6 col-12 plr5 mt10">
                                                        <button class="btn btn-default btn-green mb5" onclick="return false;" title="add document"><i class="fa fa-file"></i></button> Add File
                                                        <input type="file" id="postfile" name="postfile" class="dropify" accept=".pdf,.png,.jpg,.jpeg" data-default-file="" />
                                                    </div>

                                                    <div class="col-12 plr5 mt10">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <button disabled class="btn btn-default btn-red" onclick="return false;" title="add link"><i class="fa fa-link"></i></button>
                                                            </div>
                                                            <input type="text" name="post-link" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt10">
                                            <div class="col-12 align-right">
                                                <!--button class="btn btn-default" onclick="closeAll()">Cancel</button>
                                                <button class="btn btn-primary" onclick="postDirection()">Next</button-->
                                                <input type="submit" value="Post">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="second-step-post" class="card trans200" style="display: none;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <a class="btn btn-skyblue selected-topic-btn">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </a>
                                                <span class="ml10 selected-topic-name">Events</span>
                                            </div>
                                            <div class="col-4 align-right">
                                                <a href="javascript:void(0);" onclick="postDirection();">Back</a>
                                            </div>
                                        </div>


                                        <form id="create-post-form" method="POST" action="">{% csrf_token %}
                                            <div class="row mt20">
                                                <div class="col-12 align-right">
                                                    <button class="btn btn-default" onclick="closeAll()">Cancel</button>
                                                    <button class="btn btn-primary" type="submit">Post</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div id="board-category" class="hoot-modal board-category" style="display: none; overflow-y: auto;">
            <div class="container ptb50">
                <div class="row">
                    <div class="col-12 align-right">
                        <a href="javascript:void(0);" onclick="closeCategory()" ><i class="fa fa-times text-white"></i></a>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div id="main-category" class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                                <div class="row mt40">
                                    <div class="col-12 align-center mb30">
                                        <h4 class="text-white" >POST TOPICS<br />(Choose One)</h4>
                                    </div>

                                    @foreach($categories as $each_category)
                                        <div class="col-12 col-sm-4 align-center">
                                            <button type="submit" class="btn btn-board-category {{$each_category->background_color}}" onclick="topicSelected({{$each_category->id}}, '{{$each_category->category_name}}')">
                                                <i class="fa {{ $each_category->icon }} fa-fw"></i>
                                            </button>
                                            <p class="text-white mt10 mb30">{{$each_category->category_name}}</p>
                                        </div>


                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </form>


    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();

            $('.dropify').dropify();
        });

        var category = new Custombox.modal({
            content: {
                effect: 'scale',
                target: '#board-category',
                fullscreen: true,
                id: 'board-category-modal'
            }
        });
        function chooseCategory()
        {
            category.open();

        }

        function closeCategory()
        {
            Custombox.modal.close("board-category-modal");
        }
        function topicSelected(topic_id, topic_name)
        {
            $("input[name=post-topic]").val(topic_id);
            $("input[name=post-topic-display]").val(topic_name);
            $("input[name=post-topic-session]").val(topic_name);
            closeCategory();
        }

    </script>
@endsection