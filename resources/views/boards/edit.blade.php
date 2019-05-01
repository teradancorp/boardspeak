@extends('layouts/layout_plain');

@section('content')
    <form id="form_new_board" method="POST" action="/board/update/{{ $board->id }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="container">
        <div class="row pb40 create-a-board">
            <div class="col-12 col-md-8 offset-md-2 ">
                <h1 class="audiowide text-muted">Board Edit</h1>
                <div class="card text-dark mb50">
                    <div class="card-body p30">
                        <div class="row">
                            <div class="col-12">

                                <?php
                                if($board->board_cover_type == 0)
                                    $img = "/storage/boardcovers/".$board->board_cover_img;
                                else
                                    $img = $board->board_cover_img;
                                ?>
                                <div class="add-cover-cont mt10" style="background-image:url('{{ $img }}'); min-height: 220px;" >
                                    <div class="board-info" style="padding: 20px; margin-top: 100px;">
                                        <!--h4 class="board-title text-white audiowide" >{{ $board->board_title }}</h4>
                                        <p class="board-description text-white" style="font-size: 12px;">{{ $board->board_description }}</p-->
                                    </div>
                                </div>
                                <div class="row mb10 mt10">
                                    <div class="col-12 col-sm-3 mb10">
                                        Board name
                                    </div>
                                    <div class="col-12 col-sm-9">
                                        <input type="text" name="board-name" class="form-control form-rounded" value="{{ $board->board_title }}">
                                    </div>
                                </div>
                                <div class="row mb10">
                                    <div class="col-12 col-sm-3 mb10">
                                        Describe your group’s mission
                                    </div>
                                    <div class="col-12 col-sm-9">
                                        <input type="text" class="form-control form-rounded" name="board-description" value="{{ $board->board_description }}">
                                    </div>
                                </div>
                                <div class="row mb10">
                                    <div class="col-12 col-sm-3 mb10">
                                        Group Board Category
                                    </div>
                                    <div class="col-12 col-sm-9">
                                        <input type="text" class="form-control form-rounded" disabled value="{{ $board->board_main_category_display }}">
                                    </div>
                                </div>


                            </div>




                            <div class="row">
                                <div class="col-8">
                                    <h4>Topic Privacy Settings</h4>
                                </div>
                                <!--div class="col-4 align-right">
                                    <a href="javascript:void(0);" onclick="backToTopic();">Back</a>
                                </div-->


                                <div class="col-12 mt10 pl20">
                                    <!--div class="row mt20">
                                        <div class="col-6">
                                            <select class="form-control form-rounded" name="topic-privacy-settings">
                                                <option value="1">Public</option>
                                                <option value="0">Private</option>
                                            </select>
                                        </div>
                                    </div-->

                                    <div class="custom-control custom-radio mt10">
                                        <input type="radio" id="board-access1" name="board-access" class="custom-control-input" value="1" @if($board->board_access == 1) checked @endif>
                                        <label class="custom-control-label" for="board-access1">All members can post</label>
                                        <p class="text-muted">
                                            Public board topic where anyone can join and start posting
                                        </p>
                                    </div>
                                    <div class="custom-control custom-radio mt10">
                                        <input type="radio" id="board-access2" name="board-access" class="custom-control-input" value="2" @if($board->board_access == 2) checked @endif>
                                        <label class="custom-control-label" for="board-access2">Only members with access can post</label>
                                        <p class="text-muted">
                                            Private board topic where a member can request access to post. The board admin will authorize members upon request or can set and send the community code.
                                        </p>
                                    </div>

                                    <div id="com-code-main" class="row" style="display: none;">
                                        <div class="col-12 col-sm-8 offset-sm-4">
                                            <div class="custom-control custom-checkbox mt10">
                                                <input type="checkbox" id="community-code" name="enable-community-code" class="custom-control-input" value="1">
                                                <label class="custom-control-label" for="community-code">Member Access Code</label>
                                                <p class="text-muted">
                                                    Private board topic where a member can request access to post. The board admin will authorize members upon request or can set and send member access code.
                                                </p>
                                            </div>

                                            <div id="com-code-cont" style="display: none;">
                                                <label>You Code</label>
                                                <input type="text" class="form-control form-rounded" name="digit-access-code" placeholder="6-Digit Code" >
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row mb10">
                                    <div class="col-12 mb10 justify-content-center">
                                        @if (Auth::check())
                                            <button type="submit" class="btn btn-createboard btn-dashboard mt15 font-weight-bold plr20">
                                                Update <i class="fa fa-save ml5"></i>
                                            </button>
                                        @else
                                            Login to save board!
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
    </form>
@endsection