@extends('layouts/layout_plain');

@section('content')

    <div class="container-fluid ptb80 bg-white text-gray">
        <div class="container">

            <!--<div class="row mb40">-->
            <!--<div class="col-12 align-center">-->
            <!--<h2>KEEP EVERYONE ON THE SAME PAGE! <br /><h4>Create your interactive bulletin board and collaborate effectively!</h4></h2>-->
            <!--</div>-->
            <!--</div>-->
            <div class="row justify-content-center">

                <div class="profile-header-container">
                    <div class="profile-header-img">
                        <img class="rounded-circle" style="width: 200px; height: 200px;" src="/storage/avatars/{{ $user->avatar }}" />
                        <!-- badge -->
                        <div class="rank-label-container mt10 align-center">
                            <input type="button" onclick="window.location='{{ url("user/profile") }}'" class="btn btn-createboard btn-dashboard mt15 font-weight-bold plr20" value="{{$user->name . ' ' . $user->lastname}}">
                        </div>
                    </div>
                </div>

            </div>


            <div class="row mt40">
                <div class="col-12">
                    <h3 class="content-title">Personal Boards</h3>
                </div>
            </div>


            <div class="row">
                <div class="col-12">


                    <div id="ads-slider" class="owl-carousel owl-theme">
                        @foreach($boards as $each_board)
                        <div class="p5">
                            <a href="/board/discussion/{{ $each_board->board_id_link}}" class="categ-board-link">
                                <div class="categ-board plr15">
                                    <?php
                                        if($each_board->board_cover_type == 0)
                                            $img = "/storage/boardcovers/".$each_board->board_cover_img;
                                        else
                                            $img = $each_board->board_cover_img;

                                        $date = new DateTime($each_board->created_at);

                                    ?>
                                    <div class="row categ-board-header bg-cover" style="background-image:url('{{ $img }}');">
                                         <div class="col-12 p5 align-center">
                                              <h5 class="text-white">{{$each_board->board_title}}</h5>
                                             <p class="text-white">{{$each_board->board_description}}</p>
                                         </div>
                                    </div>
                                        <div class="col-12">
                                            <div class="row board-grid">
                                                <div class="col-12 align-right plr10 ptb5 board-card-detail plr20">
                                                    <ul class="plr20">
                                                        <li>
                                                            <i class="fas fa-users fa-fw text-white"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-comments fa-fw text-white"></i>
                                                        </li>
                                                        <li>
                                                            <small class="text-white">Since {{$date->format('m/d/Y')}}</small>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
    </div>

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
                            items:3
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
