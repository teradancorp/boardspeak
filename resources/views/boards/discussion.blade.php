@extends('layouts/layout_plain');

@section('content')


        <?php
        if($board->board_cover_type == 0)
            $img = "/storage/boardcovers/".$board->board_cover_img;
        else
            $img = $board->board_cover_img;

        $date = new DateTime($board->created_at);

        ?>


        <div id='loading' style="position: fixed; left: 50%; top: 50%; display: none; z-index: 100;">
            <img src="https://www.drupal.org/files/issues/ajax-loader.gif"></img>
        </div>
        <nav class="floating-menu">

            <a href="#" onclick="OpenjoinGroup();"><img src="{{ asset('img/icons/icon-join group.png') }}" width="70px;"></a>
            <a href="#"><img src="{{ asset('img/icons/icon-to do.png') }}" width="70px;"></a>
            <!--a href="/coldfusion/"><img src="{{ asset('img/icons/icon-join group.png') }}" width="70px;"></a>
            <a href="/database/"><img src="{{ asset('img/icons/icon-join group.png') }}" width="70px;"></a-->
        </nav>
        <div class="container">
            <div class="row justify-content-center">

                <div id="div-boardcover" name="div-boardcover" class="col-11 mt70" style="background-image:url('{{ $img }}'); background-size: cover; background-repeat:no-repeat; width:100%; height: 80%; ">
                    <div class="container">
                        <div class="row">
                            <div id="div-board-info" class="col-12 {{$board->board_text_position}} text-white pl20 pt100">
                                <h2 id="board-title" class="discussion-title" style="color:{{$board->board_text_color}}">{{$board->board_title}}</h2>
                                <div class="row mt20">
                                    <div class="col-12">
                                        <p id="board-description" class="pl20" style="color:{{$board->board_text_color}}">{{$board->board_description}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 align-left text-white mt30">
                                <img src="/storage/avatars/{{ $owner->avatar }}" class="img-responsive discussion-avatar" style="max-width: 70px;" align="left">
                                <p style="color:{{$board->board_text_color}}" class="ml90 mb0 mt15" style="line-height: 1;">{{ $owner->name }} <br /><small>Creator</small></p>
                            </div>

                            <div class="col-6 align-right text-white mt30">
                                <!--ul style="color:{{$board->board_text_color}}" class="discussion-info">
                                    <li>
                                        <i class="fas fa-address-book fa-fw"></i> <a style="color:{{$board->board_text_color}}"  href="#"  data-toggle="modal" data-target="#memberform">Members {{$memcount}}</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-exclamation-circle fa-fw"></i> <a style="color:{{$board->board_text_color}}"  href="#"  data-toggle="modal" data-target="#memberform">Pending Requests {{$mempending}}</a>
                                    </li>
                                </ul-->
                                <ul style="color:{{$board->board_text_color}}" class="discussion-info">
                                    <li>
                                        <i class="fas fa-users fa-fw"></i> Contributors {{$board->board_contributors}}
                                    </li>
                                    <li>
                                        <i class="fas fa-comments fa-fw"></i> Comments {{$board->board_comments}}
                                    </li>
                                </ul><br>
                                <small style="color:{{$board->board_text_color}}" class="plr10 mt20">{{$date->format('m/d/Y')}}</small>
                            </div>
                            @if (Auth::check())
                                <div class="col-6 align-left text-white mt30">
                                    @if (is_null($role))
                                        &nbsp;
                                    @else
                                        @switch($role->user_role)
                                            @case(0)
                                            <span>{{$viewer->username}} - Pending Approval</span>
                                            @break
                                            @case(2)
                                            <span>{{$viewer->username}} - Suspended Membership</span>
                                            @break
                                            @case(16)
                                            <span>{{$viewer->username}} - Member</span>
                                            @break
                                            @case(127)
                                            <span>{{$viewer->username}} - Administrator</span>@break
                                            @case(255)
                                            <span>{{$viewer->username}} - Board Owner</span>
                                            @break
                                        @endswitch
                                    @endif
                                </div>
                                <div class="col-6 align-right">
                                    @if(Auth::user()->id == $board->author_id)
                                        <a class="btn btn-primary plr20 mr20 mt20" href="/board/edit/{{$board->id}}"><i class="fa fa-bars"></i> Board Settings</a>
                                    @endif
                                    @if(is_null($role) OR $role->user_role < 16)
                                            <a id="open-board-cate" class="btn btn-primary plr20 mt20 text-white" href="#" onclick="$('#error_validation').modal('toggle');"><i class="fa fa-edit"></i> Create Post</a>
                                     @else
                                        @if($board->board_access == 1 || $role->user_role > 100)
                                            <a id="open-board-cate" class="btn btn-primary plr20 mt20 text-white" href="/post/create/{{$board->board_id_link}}"><i class="fa fa-edit"></i> Create Post</a>
                                        @else
                                            <a id="open-board-cate" class="btn btn-primary plr20 mt20 text-white" href="#" onclick="$('#error_validation').modal('toggle');"><i class="fa fa-edit"></i> Create Post</a>
                                        @endif
                                    @endif
                                </div>
                            @endif

                            <div class="col-12 pt10 pl10">
                                <ul style="color:{{$board->board_text_color}}" class="discussion-info">
                                    <li>
                                        <i class="fas fa-address-book fa-fw"></i> <a style="color:{{$board->board_text_color}}"  href="#" onclick="load_members(1, {{$board->id}});" >Group Members {{$memcount}}</a>
                                    </li>
                                    @if (Auth::check())
                                        @if(is_null($role))
                                            &nbsp;
                                        @else
                                            @if($role->user_role > 100)

                                                <li>
                                                    <i class="fas fa-exclamation-circle fa-fw"></i> <a style="color:{{$board->board_text_color}}"  href="#"  data-toggle="modal" data-target="#memberform">Pending Requests {{$mempending}}</a>
                                                </li>
                                            @endif
                                        @endif
                                    @endif
                                </ul>

                            </div>



                        </div>
                    </div>
                </div>

                <div class="col-10" style="margin-top: -75px">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('img/icons/icon-topics.png') }}" style="width:150px; height: 150px; background-color: lightgray; border-radius: 5px;">
                            </div>
                            <div class="col">
                                <img src="{{ asset('img/icons/icon-posts.png') }}" style="width:150px; height: 150px; background-color: dimgray; border-radius: 5px;">
                            </div>
                            <div class="col">
                                <img src="{{ asset('img/icons/icon-promos.png') }}" style="width:150px; height: 150px; background-color: dimgray; border-radius: 5px;">
                            </div>
                            <div class="col">
                                <img src="{{ asset('img/icons/icon-events.png') }}" style="width:150px; height: 150px; background-color: dimgray; border-radius: 5px;">
                            </div>
                            <div class="col">
                                <img src="{{ asset('img/icons/icon-tasks.png') }}" style="width:150px; height: 150px; background-color: dimgray; border-radius: 5px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12"  style="background-color: lightgray; height: 200px;">
                    <div id="ads-slider" class="owl-carousel owl-theme">


                        @if (count($posts) > 0)
                            @foreach($posts as $each_post)
                                <!--div class="grid-item col-width3"-->
                                <div class="p5 mt10" style="height: 180px;">

                                    <a href="/post/discussion/{{ $each_post->post_id_link }}">
                                        <?php
                                        if($each_post->post_image)
                                            $img = "/storage/posts/".$each_post->post_image;
                                        else
                                            $img = $each_post->post_image;
                                        ?>
                                        <div class="grid-post">
                                            <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(50,141,193,0.7), rgba(255,255,255,0.5)),url('{{ $each_post->post_image }}');">
                                            </div>
                                            <div class="grid-post-content text-grey">
                                                <span class="grid-post-label">{{ $each_post->post_topic_display }}</span>
                                                <h5>{{ $each_post->post_title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="grid-item col-width12">
                                <a href="javascript:void(0);">
                                    <div class="grid-post">
                                        <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(50,141,193,0.7), rgba(255,255,255,0.5)), url({{ asset('img/cover/coming-soon.jpg')}}">
                                        </div>
                                        <div class="grid-post-content text-grey">
                                            <span class="grid-post-label">Coming Soon</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif

                    </div>
                </div>


            </div>
        </div>



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
                                    Restricted Access.
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="memberform" role="dialog" style="min-height: 400px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content col-12 align-center" style="background-color: darkslategray">
                    <div class="modal-header align-center text-white">
                        BOARD MEMBERS LIST
                    </div>
                    <div class="align-center pt-2">
                        <div class="form-group row">
                            <!--div class="col-md-3">
                                <input type="button" onclick="load_members(1, {{$board->id}});" style="width: 150px" class="btn btn-info mb5" value="Members"><br>
                                <input type="button" onclick="load_members(0, {{$board->id}});" style="width: 150px" class="btn btn-info mb5" value="Pending Request">
                            </div-->
                            <div class="col" id="div_memberlist"></div>
                        </div>





                    </div>
                </div>

            </div>
        </div>



        <div id="membergroup" class="hoot-modal board-category" style="display: none; overflow-y: auto;">
            <div class="container ptb50">
                <div class="row">
                    <div class="col-12 align-right">
                        <a href="javascript:void(0);" onclick="ClosememberGroup()" ><i class="fa fa-times text-white"></i></a>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div id="div_memberlist" class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 text-white">
                                <!-- members will be displayed here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="joingroup" class="hoot-modal board-category" style="display: none; overflow-y: auto;">
            <div class="container ptb50">
                <div class="row">
                    <div class="col-12 align-right">
                        <a href="javascript:void(0);" onclick="ClosejoinGroup()" ><i class="fa fa-times text-white"></i></a>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div id="main-category" class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                                <div class="row mt40">
                                    <div class="col-12 align-center mb30">
                                        <h4 class="text-white" >JOIN BOARD</h4>
                                    </div>

                                    <div class="col-12 align-center mb30 text-white">
                                        @if (Auth::check())
                                        <form method="POST" action="/board/join/{{$viewer->id}}/{{$board->id}}/{{$board->is_public}}/{{$board->board_id_link}}" id="joinform">
                                            {{ csrf_field() }}
                                            @if (is_null($role))
                                                @if($board->is_public)
                                                    This is a public board! Anyone can join!<br>
                                                    <input style="width: 200px; height: 40px; border-radius: 10px" class="mt20" type="submit" value="Join Board Now" id="" class="btn-primary">
                                                @else
                                                    This is a Private Board!

                                                    <textarea required class="form-control form-rounded" name="request-message" rows="4" style="resize: none;" placeholder="Message to Admin!"></textarea>
                                                    <input style="width: 200px; height: 40px; border-radius: 10px" class="mt20" type="submit" value="Request to Join" id="" class="btn-primary">
                                                @endif
                                            @else
                                                @switch($role->user_role)
                                                    @case(0)
                                                    <span>Pending Approval</span>
                                                    @break
                                                    @case(2)
                                                    <span>Suspended Membership</span>
                                                    @break
                                                    @case(16)
                                                    <span>Group Member</span>
                                                    @break
                                                    @case(127)
                                                    <span>Group Administrator</span>
                                                    @break
                                                    @case(255)
                                                    <span>Group Super Administrator</span>
                                                    @break
                                                    @default
                                                    @if($board->is_public)
                                                        This is a public board! Anyone can join!<br>
                                                        <input style="width: 200px; height: 40px; border-radius: 10px" class="mt20" type="submit" value="Join Board Now" id="" class="btn-primary">
                                                    @else
                                                        This is a Private Board!

                                                        <textarea required class="form-control form-rounded" name="request-message" rows="4" style="resize: none;" placeholder="Message to Admin!"></textarea>
                                                        <input style="width: 200px; height: 40px; border-radius: 10px" class="mt20" type="submit" value="Request to Join" id="" class="btn-primary">
                                                    @endif
                                                    @break;

                                                @endswitch
                                            @endif


                                        @else
                                            Please Login before requesting to join a board!<br>
                                            <a href="" data-toggle="modal" data-target="#loginform" class="btn btn-createboard btn-dashboard mt15 font-weight-bold plr20">
                                                Log In
                                            </a>
                                        @endif
                                        </form>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>



    <div class="container-fluid text-white">
        <div class="container ">
            <!--div class="board-top-topic">
                <div class="single-topic align-center" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.3),rgba(0,0,0,0.4)), url({{ asset('img/cover/promos.jpg')}}">
                    <a href="#">ADS & PROMOS</a>
                </div>
                <div class="single-topic align-center" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.3),rgba(0,0,0,0.4)), url({{ asset('img/cover/events.jpg')}})">
                    <a href="#">EVENTS</a>
                </div>
                <div class="single-topic align-center" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.3),rgba(0,0,0,0.4)), url({{ asset('img/cover/rewards.jpg')}})">
                    <a href="#">REWARDS</a>
                </div>
            </div-->

            <!--div class="pt20">
                <div class="row plr5">
                    <div class="col-12 col-sm-8">
                        <a class="text-white btn-boardmenu" href="#">Topics</a>
                        <a class="text-white btn-boardmenu" href="#">Add Members</a>
                        <a class="text-white btn-boardmenu" href="#">Join Us</a>
                        <a class="text-white btn-boardmenu" href="#">Share</a>
                        <a class="text-white btn-boardmenu" href="#">More</a>
                    </div>
                    <div class="col-12 col-sm-4 align-right">
                    <span class="categ-search-cont">
                        <input type="text" class="categ-search" placeholder="Search TOPICS or POSTS..."/>
                        <button type="button" class="categ-search-btn">
                            <i class="fas fa-search fa-fw text-white"></i>
                        </button>
                    </span>
                    </div>
                </div>
            </div-->


            <!--div class="row plr5 mt20">
                <div class="col-12 col-sm-3">
                    <a href="#"><img src="{{ asset('img/graphics/addtopic.jpg')}}" style="width: 250px; height: 250px;" ></a>
                </div>
                <div class="col-12 col-sm-3">
                    <a href="#"><img src="{{ asset('img/graphics/freeads.jpg')}}" style="width: 250px; height: 250px;" ></a>
                </div>
                <div class="col-12 col-sm-3">
                    <a href="#"><img src="{{ asset('img/graphics/createevent.jpg')}}" style="width: 250px; height: 250px;" ></a>
                </div>
                <div class="col-12 col-sm-3">
                    <a href="#"><img src="{{ asset('img/graphics/assigntask.jpg')}}" style="width: 250px; height: 250px;" ></a>
                </div>
            </div-->


        </div>
    </div>


        <div class="container-fluid ptb50 text-white">
            <div class="container mt20">
                <!--div class="row plr5">
                    <div class="col-12 align-right">
                        <span class="categ-search-cont">
                            <input type="text" class="categ-search" placeholder="Search TOPICS or POSTS..."/>
                            <button type="button" class="categ-search-btn">
                                <i class="fas fa-search fa-fw text-white"></i>
                            </button>
                        </span>
                    </div>
                </div-->

                <!--div class="row plr5 mt30">
                    <div class="col-12">
                        <div class="grid latest-post-grid board-post">
                            <div class="grid-sizer"></div>

                            @if (count($posts) > 0)
                                @foreach($posts as $each_post)
                                <div class="grid-item col-width3">
                                    <a href="">
                                        <?php
                                        if($each_post->post_image)
                                            $img = "/storage/posts/".$each_post->post_image;
                                        else
                                            $img = $each_post->post_image;
                                        ?>
                                        <div class="grid-post">
                                            <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(50,141,193,0.7), rgba(255,255,255,0.5)),url('{{ $each_post->post_image }}');">
                                            </div>
                                            <div class="grid-post-content text-grey">
                                                <span class="grid-post-label">{{ $each_post->post_topic_display }}</span>
                                                <h5>{{ $each_post->post_title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            @else
                                <div class="grid-item col-width12">
                                    <a href="javascript:void(0);">
                                        <div class="grid-post">
                                            <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(50,141,193,0.7), rgba(255,255,255,0.5)), url({{ asset('img/cover/coming-soon.jpg')}}">
                                            </div>
                                            <div class="grid-post-content text-grey">
                                                <span class="grid-post-label">Coming Soon</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div-->
            </div>
        </div>



        <script>
            $(document).ready(function(){

                $(document).ajaxStart(function() {
                    //    alert(1);
                    $("#loading").show();
                });

                $( document ).ajaxStop(function() {
                    $("#loading").hide();
                });

                $('body').css("background-color", "{{ $board->board_bg_color }}");
            });

            var joingroup = new Custombox.modal({
                content: {
                    effect: 'scale',
                    target: '#joingroup',
                    fullscreen: true,
                    id: 'joingroup-modal'
                }
            });

            function OpenjoinGroup()
            {
                joingroup.open();

            }

            function ClosejoinGroup()
            {
                Custombox.modal.close("joingroup-modal");
            }

            var membergroup = new Custombox.modal({
                content: {
                    effect: 'scale',
                    target: '#membergroup',
                    fullscreen: true,
                    id: 'membergroup-modal'
                }
            });

            function OpenmemberGroup(_type, _cnt)
            {
                if(_cnt == 0)
                    return;
                membergroup.open();
                load_members(_type);

            }

            function ClosememberGroup()
            {
                Custombox.modal.close("membergroup-modal");
            }
        </script>
        <script>
            $(document).ready(function(){
                $('#ads-slider').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    dots:false,
                    autoplay:true,
                    autoplayTimeout:4000,
                    autoplayHoverPause:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        1000:{
                            items:4
                        }
                    }
                });

                $('.nflix-slider').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:false,
                    dots:false,
                    autoplay:true,
                    autoplayTimeout:4000,
                    autoplayHoverPause:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:4
                        }
                    }
                });

                $('.latest-post-grid').isotope({
                    itemSelector: '.grid-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.grid-sizer'
                    }
                });
            });
        </script>
@endsection

