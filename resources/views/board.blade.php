@extends('layouts.layout_video');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                        <div class="modal fade" id="loginform" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content col-12 align-center" style="background-color: darkslategray">
                                    <div class="modal-header align-center text-white">
                                        LOG-IN
                                    </div>
                                    <div class="align-center pt-5">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-8">
                                                    <input id="email" style="width: 250px" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right text-white">{{ __('Password') }}</label>

                                                <div class="col-md-8">
                                                    <input id="password" style="width: 250px" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-12 align-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label text-white" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-12 align-center">
                                                    <button type="submit" class="btn btn-primary" style="width: 200px">
                                                        {{ __('Login') }}
                                                    </button><br>

                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>

                                        </form>





                                    </div>

                                    <!--div class="modal-footer"><button type="button" class="btn btn-primary m-t-10" data-dismiss="modal"></div-->
                                </div>

                            </div>
                        </div>
            </div>
        </div>
    </div>




    <div class="container-fluid ptb80 bg-white text-gray">
        <div class="container">

            <!--<div class="row mb40">-->
            <!--<div class="col-12 align-center">-->
            <!--<h2>KEEP EVERYONE ON THE SAME PAGE! <br /><h4>Create your interactive bulletin board and collaborate effectively!</h4></h2>-->
            <!--</div>-->
            <!--</div>-->

            <div class="row mb40">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 align-center">
                                <h2 class="latest-update">{{ $country }}</h2>
                            </div>

                            <div class="col-12 mt20 d-none d-md-block d-lg-block">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Find Communities, Resources, etc" aria-describedby="basic-addon2" style="width: 30%;">
                                    <input type="text" class="form-control" placeholder="Philippines" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-createboard btn-dashboard active">Directory</button>
                                        <button class="btn btn-boardspeak plr30" type="button">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt20 d-block d-md-none .d-lg-none">
                                <div class="row plr10">
                                    <div class="col-12 plr5 mb10">
                                        <input type="text" class="form-control" placeholder="Find Communities, Resources, etc" aria-describedby="basic-addon2">
                                    </div>
                                    <div class="col-12 plr5 mb10">
                                        <input type="text" class="form-control" placeholder="Philippines" aria-describedby="basic-addon2">
                                    </div>
                                    <div class="col-12 plr5 align-right">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-createboard btn-dashboard active">Directory</button>
                                            <button class="btn btn-boardspeak " type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt80">
                <div class="col-12 align-center">
                    <h2 >HOW IT WORKS</h2>
                    <h5>Create a group, invite member & collaborate!</h5>
                </div>

                <div class="row mt10">
                    <div class="col-12 col-sm-4">
                        <div class="how-it-works">
                            <div class="hiw-icon" style="background-image: url('img/graphics/chat.png')"></div>
                            <!--<img src="{% static 'img/graphics/chat.png' %}">-->
                            <div class="hiw-content">
                                <h5>JOIN Groups</h5>
                                <p>
                                    Explore and discover groups where you can participate and get involved with.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="how-it-works">
                            <div class="hiw-icon" style="background-image: url('img/graphics/group.png')"></div>
                            <!--<img src="{% static 'img/graphics/group.svg' %}">-->
                            <div class="hiw-content">
                                <h5>CREATE Groups</h5>
                                <p>
                                    Starts a board and build a community by inviting members & friends!
                                </p>
                                <a href="/board/create" class="btn btn-boardspeak">Start a Board</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="how-it-works">
                            <div class="hiw-icon" style="background-image: url('img/graphics/handshake.png')"></div>
                            <!--<img src="{% static 'img/graphics/handshake.png' %}">-->
                            <div class="hiw-content">
                                <h5>COLLABORATE</h5>
                                <p>
                                    Discuss ideas, work on a project together, plan marketing campaigns, etc. All in one place!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt50">
                <div class="col-12">
                    <h3 class="content-title">Featured Boards</h3>
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
    </div>


    <div class="container-fluid ptb80 text-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="content-title">
                        Popular Posts
                    </h3>
                </div>
            </div>
            <div class="row plr15 mt20 categ-card-cont">
                <div class="col-12">

                    <!--div id="latest-post" class="owl-carousel owl-theme nflix-slider">
                        <div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-ads" style="background-image: url({% static 'img/cover/sample-ad.png' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <!--<h5>Let's Talk Business</h5>-->
                                    <!--/div>
                                </div>
                            </a>
                        </div>

                        <div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(54,106,219,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/graphics.jpg' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <span class="grid-post-label trans300">Reviews</span>
                                        <h5 class="trans300">Design & Designers</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(224,51,106,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/animals.jpg' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <span class="grid-post-label">Outdoor</span>
                                        <h5>Discovering Wildlife</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/business.png' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <span class="grid-post-label">Industry</span>
                                        <h5>Let's Talk Business</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/sports.jpg' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <span class="grid-post-label">Sports</span>
                                        <h5>All about sports</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div-->

                    <div class="owl-carousel owl-theme nflix-slider mt10">

                        <!--div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(54,106,219,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/graphics.jpg' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <span class="grid-post-label trans300">Reviews</span>
                                        <h5 class="trans300">Design & Designers</h5>
                                    </div>
                                </div>
                            </a>
                        </div-->

                        <!--div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(224,51,106,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/animals.jpg' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <span class="grid-post-label">Outdoor</span>
                                        <h5>Discovering Wildlife</h5>
                                    </div>
                                </div>
                            </a>
                        </div-->

                        <!--div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/business.png' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <span class="grid-post-label">Industry</span>
                                        <h5>Let's Talk Business</h5>
                                    </div>
                                </div>
                            </a>
                        </div-->

                        <!--div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/sports.jpg' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <span class="grid-post-label">Sports</span>
                                        <h5>All about sports</h5>
                                    </div>
                                </div>
                            </a>
                        </div-->

                        <!--div class="grid-item ">
                            <a href="{% url 'board:post' 1 %}">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(54,106,219,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/graphics.jpg' %});">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <span class="grid-post-label trans300">Reviews</span>
                                        <h5 class="trans300">Design & Designers</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div-->

                    <!--<div class="grid latest-post-grid">-->
                    <!--<div class="grid-sizer"></div>-->
                    <!--<div class="grid-item col-width3 col-height2">-->
                    <!--<a href="#">-->
                    <!--<div class="grid-post">-->
                    <!--<div class="grid-post-header bg-ads" style="background-image: url({% static 'img/cover/sample-ad.png' %});">-->

                    <!--</div>-->
                    <!--<div class="grid-post-content text-grey">-->
                    <!--&lt;!&ndash;<h5>Let's Talk Business</h5>&ndash;&gt;-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--</div>-->
                    <!--<div class="grid-item col-width6 col-height2">-->
                    <!--<a href="#">-->
                    <!--<div class="grid-post">-->
                    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(54,106,219,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/graphics.jpg' %});">-->

                    <!--</div>-->
                    <!--<div class="grid-post-content text-grey">-->
                    <!--<span class="grid-post-label">Reviews</span>-->
                    <!--<h5>Design & Designers</h5>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--</div>-->
                    <!--<div class="grid-item col-width3">-->
                    <!--<a href="#">-->
                    <!--<div class="grid-post">-->
                    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(224,51,106,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/animals.jpg' %});">-->

                    <!--</div>-->
                    <!--<div class="grid-post-content text-grey">-->
                    <!--<span class="grid-post-label">Outdoor</span>-->
                    <!--<h5>Discovering Wildlife</h5>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--</div>-->
                    <!--<div class="grid-item col-width3">-->
                    <!--<a href="#">-->
                    <!--<div class="grid-post">-->
                    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/business.png' %});">-->

                    <!--</div>-->
                    <!--<div class="grid-post-content text-grey">-->
                    <!--<span class="grid-post-label">Industry</span>-->
                    <!--<h5>Let's Talk Business</h5>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--</div>-->

                    <!--<div class="grid-item col-width8 col-height2">-->
                    <!--<a href="#">-->
                    <!--<div class="grid-post">-->
                    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/sports.jpg' %});">-->

                    <!--</div>-->
                    <!--<div class="grid-post-content text-grey">-->
                    <!--<span class="grid-post-label">Sports</span>-->
                    <!--<h5>All about sports</h5>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--</div>-->
                    <!--<div class="grid-item col-width4 col-height2">-->
                    <!--<a href="#">-->
                    <!--<div class="grid-post">-->
                    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(214,174,68,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/group.jpg' %});">-->

                    <!--</div>-->
                    <!--<div class="grid-post-content text-grey">-->
                    <!--<span class="grid-post-label">Industry</span>-->
                    <!--<h5>Fisher's Discussions</h5>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--</div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid ptb80 bg-white text-grey">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="content-title">
                        Classified Ads
                    </h3>
                </div>
            </div>
            <div class="row plr15 mt20 categ-card-cont">
                <div class="col-12">
                    <div class="owl-carousel owl-theme nflix-slider">
                        <div class="grid-item ">
                            <a href="#">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-ads" style="background-image: url('img/cover/sample-ad.png');">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <!--<h5>Let's Talk Business</h5>-->
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="grid-item ">
                            <a href="#">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-ads" style="background-image: url('img/cover/sample-ad.png');">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <!--<h5>Let's Talk Business</h5>-->
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="grid-item ">
                            <a href="#">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-ads" style="background-image: url('img/cover/sample-ad.png');">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <!--<h5>Let's Talk Business</h5>-->
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="grid-item ">
                            <a href="#">
                                <div class="grid-post">
                                    <div class="grid-post-header bg-ads" style="background-image: url('img/cover/sample-ad.png');">

                                    </div>
                                    <div class="grid-post-content text-grey">
                                        <!--<h5>Let's Talk Business</h5>-->
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!--<div class="grid latest-post-grid">-->
                    <!--<div class="grid-sizer"></div>-->
                    <!--<div class="grid-item col-width4 col-height2">-->
                    <!--<a href="#">-->
                    <!--<div class="grid-post">-->
                    <!--<div class="grid-post-header bg-ads" style="background-image: url({% static 'img/cover/sample-ad.png' %});">-->

                    <!--</div>-->
                    <!--<div class="grid-post-content text-grey">-->
                    <!--&lt;!&ndash;<h5>Let's Talk Business</h5>&ndash;&gt;-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--</div>-->
                    <!--<div class="grid-item col-width4 col-height2">-->
                    <!--<a href="#">-->
                    <!--<div class="grid-post">-->
                    <!--<div class="grid-post-header bg-ads" style="background-image: url({% static 'img/cover/sample-ad.png' %});">-->

                    <!--</div>-->
                    <!--<div class="grid-post-content text-grey">-->
                    <!--&lt;!&ndash;<h5>Let's Talk Business</h5>&ndash;&gt;-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--</div>-->

                    <!--<div class="grid-item col-width4 col-height2">-->
                    <!--<a href="#">-->
                    <!--<div class="grid-post">-->
                    <!--<div class="grid-post-header bg-ads" style="background-image: url({% static 'img/cover/sample-ad.png' %});">-->

                    <!--</div>-->
                    <!--<div class="grid-post-content text-grey">-->
                    <!--&lt;!&ndash;<h5>Let's Talk Business</h5>&ndash;&gt;-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--</div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>

    <!--<div class="container-fluid ptb80 text-white">-->
    <!--<div class="container">-->
    <!--<div class="row">-->
    <!--<div class="col-12">-->
    <!--<h3 class="content-title">-->
    <!--Popular Posts-->
    <!--</h3>-->
    <!--</div>-->
    <!--</div>-->
    <!--<div class="row plr15 mt20 categ-card-cont">-->
    <!--<div class="col-12">-->

    <!--<div id="latest-post" class="owl-carousel owl-theme nflix-slider">-->
    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(214,174,68,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/group.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Industry</span>-->
    <!--<h5>Fisher's Discussions</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(54,106,219,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/graphics.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Reviews</span>-->
    <!--<h5>Design & Designers</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(224,51,106,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/animals.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Outdoor</span>-->
    <!--<h5>Discovering Wildlife</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/business.png' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Industry</span>-->
    <!--<h5>Let's Talk Business</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/sports.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Sports</span>-->
    <!--<h5>All about sports</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--</div>-->

    <!--<div class="owl-carousel owl-theme nflix-slider mt10">-->

    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(54,106,219,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/graphics.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label trans300">Reviews</span>-->
    <!--<h5 class="trans300">Design & Designers</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(224,51,106,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/animals.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Outdoor</span>-->
    <!--<h5>Discovering Wildlife</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/business.png' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Industry</span>-->
    <!--<h5>Let's Talk Business</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/sports.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Sports</span>-->
    <!--<h5>All about sports</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--<div class="grid-item ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(54,106,219,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/graphics.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label trans300">Reviews</span>-->
    <!--<h5 class="trans300">Design & Designers</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--</div>-->

    <!--<div class="grid latest-post-grid">-->
    <!--<div class="grid-sizer"></div>-->

    <!--<div class="grid-item col-width3 col-height2">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(214,174,68,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/group.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Industry</span>-->
    <!--<h5>Fisher's Discussions</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--<div class="grid-item col-width6 col-height2">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(157,64,216,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/sports.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Sports</span>-->
    <!--<h5>All about sports</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->


    <!--<div class="grid-item col-width3 ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(224,51,106,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/animals.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Outdoor</span>-->
    <!--<h5>Discovering Wildlife</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--<div class="grid-item col-width3 ">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(224,51,106,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/animals.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Outdoor</span>-->
    <!--<h5>Discovering Wildlife</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->


    <!--<div class="grid-item col-width8 col-height2">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(232,237,87,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/business.png' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Industry</span>-->
    <!--<h5>Let's Talk Business</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--<div class="grid-item col-width4 col-height2">-->
    <!--<a href="#">-->
    <!--<div class="grid-post">-->
    <!--<div class="grid-post-header bg-cover" style="background-image:linear-gradient(135deg, rgba(54,106,219,0.7), rgba(255,255,255,0.5)), url({% static 'img/cover/graphics.jpg' %});">-->

    <!--</div>-->
    <!--<div class="grid-post-content text-grey">-->
    <!--<span class="grid-post-label">Review</span>-->
    <!--<h5>Design & Designers</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->

    <div class="container-fluid ptb80 text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="content-title">
                        Categories to Explore
                    </h3>
                </div>
                <div class="col-12 col-sm-6 align-right">
                <span class="categ-search-cont">
                    <input type="text" class="categ-search" placeholder="Search category..."/>
                    <button type="button" class="categ-search-btn">
                        <i class="fas fa-search fa-fw text-white"></i>
                    </button>
                </span>
                </div>
            </div>
            <div class="row plr15 mt20 categ-card-cont">

                <div class="owl-carousel owl-theme nflix-slider">

                    <div class=" mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph1.png' %});">
                                <h4 class="text-white">Category 1</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class=" mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph2.jpg' %});">
                                <h4 class="text-white">Category 2</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class=" mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph3.jpg' %});">
                                <h4 class="text-white">Category 3</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class=" mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph4.jpg' %});">
                                <h4 class="text-white">Category 4</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class=" mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph5.jpeg' %});">
                                <h4 class="text-white">Category 5</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class=" mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph6.jpeg' %});">
                                <h4 class="text-white">Category 6</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>

                </div>

                <div class="owl-carousel owl-theme nflix-slider">

                    <div class="mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph7.jpeg' %});">
                                <h4 class="text-white">Category 7</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph8.jpeg' %});">
                                <h4 class="text-white">Category 8</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph2.jpg' %});">
                                <h4 class="text-white">Category 9</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph8.jpeg' %});">
                                <h4 class="text-white">Category 10</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph5.jpeg' %});">
                                <h4 class="text-white">Category 11</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="mt10">
                        <a href="{% url "board:category" 1 %}" class="categ-card-link">
                        <div class="categ-card">
                            <div class="front-card" style="background-image:linear-gradient(135deg, rgba(67,43,102,0.4),rgba(255,255,255,0.3)), url({% static 'img/graphics/graph1.png' %});">
                                <h4 class="text-white">Category 12</h4>
                            </div>
                            <div class="back-card">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore......</p>
                            </div>
                        </div>
                        </a>
                    </div>

                </div>

            </div>
            <div class="row mt20">
                <div class="col-12 align-right">
                    <a href="#" class="load-more text-white">
                        Load More Categories <i class="fas fa-chevron-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {% endblock %}


    {% block footer%}
    {% include 'base/partials/footer.html' %}
    {% endblock %}

    {% block javascript %}
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
@endsection()