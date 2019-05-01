@extends('layouts/layout_plain');

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <?php
            if(session('cover-type') == 0)
                $img = "/storage/boardcovers/".session('cover-image');
            else
                $img = session('cover-image');
            ?>
            <div class="col-9 mt70" style="background-image:url('{{ $img }}'); background-size: cover; background-repeat:no-repeat; width:100%; height: 80%; ">
                <div class="row">
                    <div class="align-left text-white pl20 pt100">
                        @if(session('board-name-hide') == 0)
                            <h3 class="discussion-title">{{session('board-name')}}</h3>
                        @endif
                        @if(session('board-description-hide') == 0)
                            <div class="row mt20">
                                <div class="col-12">
                                    <p class="pl20">{{session('board-description')}}</p>
                                </div>
                            </div>
                            @endif
                    </div>

                </div>
            </div>

        </div>

        <div class="row pb10 create-a-board">
            <div class="col-12 col-md-8 offset-md-2 ">
                <h1 class="audiowide text-muted">Board Summary</h1>
                <div class="card text-dark mb50">
                    <div class="card-body p10">
                        <div class="row">
                            <div class="col-12">

                                <div class="row mb10">
                                    <div class="col-12 col-sm-3 mb10">
                                        Board name
                                    </div>
                                    <div class="col-12 col-sm-9">
                                        <input type="text" name="board-name" class="form-control form-rounded" disabled value="{{ session('board-name') }}">
                                    </div>
                                </div>
                                <div class="row mb10">
                                    <div class="col-12 col-sm-3 mb10">
                                        Describe your group’s mission
                                    </div>
                                    <div class="col-12 col-sm-9">
                                        <input type="text" class="form-control form-rounded" name="board-description" disabled value="{{ session('board-description') }}">
                                    </div>
                                </div>
                                <div class="row mb10">
                                    <div class="col-12 col-sm-3 mb10">
                                        Group Board Category
                                    </div>
                                    <div class="col-12 col-sm-9">
                                        <input type="text" class="form-control form-rounded" disabled value="{{ session('main-category-display') }}">
                                    </div>
                                </div>
                                <!--?php
                                    if(session('cover-type') == 0)
                                        $img = "/storage/boardcovers/".session('cover-image');
                                    else
                                        $img = session('cover-image');
                                ?>
                                <div class="add-cover-cont mt10" style="background-image:url('{{ $img }}'); min-height: 220px;" >
                                    <div class="board-info" style="padding: 20px; margin-top: 100px;">
                                        <h4 class="board-title text-white audiowide" >{{ session('board-name') }}</h4>
                                        <p class="board-description text-white" style="font-size: 12px;">{{ session('board-description') }}</p>
                                    </div>
                                </div-->
                                <div class="row mb10">
                                    <div class="col-12 mb10 align-center">
                                        @if (Auth::check())
                                            <button type="button" onclick="window.location='{{ url("board/save") }}'" class="btn btn-createboard btn-dashboard mt15 font-weight-bold plr20">
                                                Save <i class="fa fa-save ml5"></i>
                                            </button>
                                        @else
                                            <a href="" data-toggle="modal" data-target="#loginform">
                                                Log In
                                            </a>
                                        @endif

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection