@extends('layouts/layout_plain');

@section('content')
    <script src="{{ asset('js/jscolor.js') }}"></script>
    <div id='loading' style="position: fixed; left: 50%; top: 50%; display: none; z-index: 100;">
        <img src="https://www.drupal.org/files/issues/ajax-loader.gif"></img>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            $img = "/img/board_cover/default/gradient/gradient04.jpg";
            ?>
            <div id="div-boardcover" name="div-boardcover" class="col-11 mt70" style="background-image:url('{{ $img }}'); background-size: cover; background-repeat:no-repeat; width:100%; height: 80%; ">
                <div class="container">
                    <div class="row">
                        <div id="div-board-info" class="col-12 align-left text-white pl20 pt100">
                            <h3 id="board-title" class="discussion-title">Enter Board Name</h3>
                            <div class="row mt20">
                                <div class="col-12">
                                    <p id="board-description" class="pl20">Enter Board Description</p>
                                </div>
                            </div>
                        </div>
                        <?php

                        $date = new DateTime();

                        ?>

                        <div class="col-6 align-left text-white mt30">
                            <img src="/storage/avatars/user.jpg" class="img-responsive discussion-avatar" style="max-width: 70px;" align="left">
                            <p id="div-profile" class="ml90 mb0 mt15" style="line-height: 1;">Anonymous <br /><small>Creator</small></p>
                        </div>

                        <div class="col-6 align-right text-white mt50">
                            <ul id="div-users" class="discussion-info">
                                <li>
                                    <i class="fas fa-users fa-fw"></i> Contributors 0
                                </li>
                                <li>
                                    <i class="fas fa-comments fa-fw"></i> Comments 0
                                </li>
                            </ul>
                            <small id="div-date" class="plr10">{{$date->format('m/d/Y')}}</small>
                        </div>




                    </div>
                </div>
            </div>

        </div>
    </div>
    <form id="form_new_board" method="POST" action="/board/save" enctype="multipart/form-data">
    {{ csrf_field() }}
    <!--header class="discussion-header"-->

        <div class="container" style="margin-top: -130px">

            <!--div class="modal fade" id="defcover" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content col-12 align-center" style="background-color: darkslategray">
                        <div class="modal-header align-center text-white">
                            DEFAULT BOARD COVERS
                        </div>
                        <div class="align-center pt-2">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input type="button" onclick="load_defcover(2);" style="width: 150px" class="btn btn-info mb5" value="Gradient Design"><br>
                                    <input type="button" onclick="load_defcover(1);" style="width: 150px" class="btn btn-info mb5" value="Scenic Views">
                                </div>
                                <div class="col-md-9" id="div_defcover"></div>
                            </div>





                        </div>
                    </div>

                </div>
            </div-->



            <div class="row pb40 create-a-board">
                <div class="col-12 col-md-8 offset-md-2 ">
                    <h1 class="audiowide text-white">Create a Board</h1>
                    <div class="card text-dark mb50">
                        <div class="card-body p30">

                            <div class="row">
                                <div class="col-12">

                                    <div class="row mb30">
                                        <div class="col-12 col-sm-3 mb10">
                                            Board name
                                        </div>
                                        <div class="col-12 col-sm-9" style="vertical-align: middle;">
                                            <input type="text" name="board-name" class="form-control form-rounded" >
                                            <input class="ml50" type="checkbox" name="board-name-hide" onchange="doHideBoardName(this.checked)">&nbsp;Hide Board Name
                                        </div>
                                    </div>




                                    <div class="row mb30">
                                        <div class="col-12 col-sm-3 mb10">
                                            Describe your group’s mission
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <textarea class="form-control form-rounded" name="board-description" rows="4" style="resize: none;" placeholder="e.g. Let’s make this world a better place!"></textarea>
                                            <input class="ml50" type="checkbox" name="board-description-hide" onchange="doHideBoardDesc(this.checked)">&nbsp;Hide Board Description
                                        </div>
                                    </div>



                                    <div class="row mb30">
                                        <input type="hidden" name="input-text-position" value="align-left">
                                        <!--div id="text-position-opt" class="row" style="display: inherit;"-->
                                        <div class="col-12  col-sm-3 mb10">
                                            Text Position
                                        </div>
                                        <!--div class="custom-control custom-radio float-left">
                                            <input type="radio" id="position0" name="text-position" class="custom-control-input" value="default" checked>
                                            <label class="custom-control-label" for="position0">Default</label>
                                        </div-->
                                        <div class="col-12 col-sm-9" style="vertical-align: middle;">
                                            <div class="custom-control custom-radio float-left ml30">
                                                <input type="radio" id="position1" name="text-position" class="custom-control-input" value="left" checked>
                                                <label class="custom-control-label" for="position1">Left</label>
                                            </div>
                                            <div class="custom-control custom-radio float-left ml30">
                                                <input type="radio" id="position2" name="text-position" class="custom-control-input" value="center">
                                                <label class="custom-control-label" for="position2">Center</label>
                                            </div>
                                            <div class="custom-control custom-radio float-left ml30">
                                                <input type="radio" id="position3" name="text-position" class="custom-control-input" value="right">
                                                <label class="custom-control-label" for="position3">Right</label>
                                            </div>
                                        </div>
                                        <!--/div-->

                                    </div>


                                    <div class="row mb30">
                                        <div class="col-12 col-sm-3 mb10">
                                            Choose Text Color
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <input class="jscolor form-control form-rounded" name="text-color" value="FFFFFF" onchange="changeTextColor(this.value)">
                                            <!--ul id="board-bg" class="board-bg-option">
                                                <!--li class="bg-white active" data-color="white" data-toggle="tooltip" data-placement="top" title="White"></li>
                                                <li class="bg-dark-grey" data-color="dark-grey" data-toggle="tooltip" data-placement="top" title="Dark Grey"></li>
                                                <li class="bg-purple" data-color="purple" data-toggle="tooltip" data-placement="top" title="Purple"></li>
                                                <li class="bg-blue" data-color="blue" data-toggle="tooltip" data-placement="top" title="Blue"></li>
                                                <li class="bg-green" data-color="green" data-toggle="tooltip" data-placement="top" title="Green"></li>
                                                <li class="bg-yellow" data-color="yellow" data-toggle="tooltip" data-placement="top" title="Yellow"></li>
                                                <li class="bg-red" data-color="red" data-toggle="tooltip" data-placement="top" title="Red"></li-->
                                            <!--li class="bg-black-cover active" data-color="black" data-toggle="tooltip" data-placement="top" title="Black"></li>
                                            <li class="bg-bluegreen-cover" data-color="blue-green" data-toggle="tooltip" data-placement="top" title="Blue Green"></li>
                                            <li class="bg-darkgray-cover" data-color="dark-grey" data-toggle="tooltip" data-placement="top" title="Dark Grey"></li>
                                            <li class="bg-purple-cover" data-color="purple" data-toggle="tooltip" data-placement="top" title="Purple"></li>
                                            <li class="bg-blue-cover" data-color="blue" data-toggle="tooltip" data-placement="top" title="Blue"></li>
                                            <li class="bg-yellowgreen-cover" data-color="yellow-green" data-toggle="tooltip" data-placement="top" title="Yellow Green"></li>
                                            <li class="bg-indigo-cover" data-color="indigo" data-toggle="tooltip" data-placement="top" title="Indigo"></li>
                                            <li class="bg-red-cover" data-color="red" data-toggle="tooltip" data-placement="top" title="Red"></li>
                                        </ul-->
                                            <!--input type="hidden" name="background-color" value="bg-black-cover" -->
                                        </div>
                                    </div>











                                    <div class="row mb30">
                                        <div class="col-12 col-sm-3 mb10">
                                            Group Board Category
                                        </div>
                                        <div class="col-12 col-sm-9" style="text-align: right; position: relative; display: inline-block">
                                            <input type="hidden" name="main-category-session">
                                            <input type="text" name="main-category-display" style="width: 100%;" class="form-control form-rounded" disabled>
                                            <div style="position:absolute; left:0; right:0; top:0; bottom:0;" onclick="chooseCategory()"></div>
                                            <button style="background: transparent; margin-top: -35px; right: 20px; position: absolute;" id="select_category" type="button" onclick="chooseCategory()" class="btn btn-createboard font-weight-bold">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>


                                        </div>
                                    </div>

                                    <div class="row mb10">
                                        <div class="col-12 mb5">
                                            Board Cover
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <input type="hidden" id="cover-local" value="">
                                                <input type="hidden" name="cover-type" value="">
                                                <input type="hidden" name="cover-image" value="">


                                                <div class="align-center pt-2">
                                                    <div class="form-group row">
                                                        <div class="col-md-3">
                                                            <input type="button" onclick="load_defcover(2);" style="width: 150px" class="btn btn-info mb5" value="Gradient Design"><br>
                                                            <input type="button" onclick="load_defcover(1);" style="width: 150px" class="btn btn-info mb5" value="Scenic Views">
                                                            <input type="button" onclick="load_defcover(3);" style="width: 150px" class="btn btn-info mb5" value="Others">
                                                        </div>
                                                        <div class="col-md-9" id="div_defcover"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="col-12 col-sm-3 mb10">
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <div class="row">
                                                <div class="col-12 align-right">
                                                    <!--button type="button" id="select-board-gallery" class="btn btn-info mb5" data-toggle="modal" data-target="#defcover">
                                                        <i class="fa fa-school"></i> Picture Gallery
                                                    </button-->
                                                    <button type="button" id="up-board-cover" class="btn btn-info mb5">
                                                        <i class="fa fa-camera"></i> Upload <small>(up to 5mb)</small>
                                                    </button>
                                                </div>
                                            </div>
                                            <input type="file" id="cover-photo" class="form-control-file" name="boardcover" accept=".gif,.png,.jpg,.jpeg" style="display: none;">
                                            <!--div class="add-cover-cont mt10" >
                                                <div class="board-info" style="display: none; padding: 20px; margin-top: 100px;">
                                                    <h4 class="board-title text-white audiowide" ></h4>
                                                    <p class="board-description text-white" style="font-size: 12px;"></p>
                                                </div>
                                            </div-->
                                            <!--p class="align-right"><small>Background Preview</small></p-->

                                            <!--div id="text-position-opt" class="row" style="display: none;">
                                                <div class="col-12">
                                                    <p class="mb10">Text Position</p>
                                                    <!--div class="custom-control custom-radio float-left">
                                                        <input type="radio" id="position0" name="text-position" class="custom-control-input" value="default" checked>
                                                        <label class="custom-control-label" for="position0">Default</label>
                                                    </div-->
                                                    <!--div class="custom-control custom-radio float-left ml30">
                                                        <input type="radio" id="position1" name="text-position" class="custom-control-input" value="left" checked>
                                                        <label class="custom-control-label" for="position1">Left</label>
                                                    </div>
                                                    <div class="custom-control custom-radio float-left ml30">
                                                        <input type="radio" id="position2" name="text-position" class="custom-control-input" value="center">
                                                        <label class="custom-control-label" for="position2">Center</label>
                                                    </div>
                                                    <div class="custom-control custom-radio float-left ml30">
                                                        <input type="radio" id="position3" name="text-position" class="custom-control-input" value="right">
                                                        <label class="custom-control-label" for="position3">Right</label>
                                                    </div>
                                                </div>
                                            </div-->
                                        </div>

                                    </div>





                                    <div class="row mb30">
                                        <div class="col-12 col-sm-3 mb10">
                                            Choose Board Background Color
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <input class="jscolor form-control form-rounded" name="background-color" value="FFFFFF" onchange="changeBGColor(this.value)">
                                            <!--ul id="board-bg" class="board-bg-option">
                                                <!--li class="bg-white active" data-color="white" data-toggle="tooltip" data-placement="top" title="White"></li>
                                                <li class="bg-dark-grey" data-color="dark-grey" data-toggle="tooltip" data-placement="top" title="Dark Grey"></li>
                                                <li class="bg-purple" data-color="purple" data-toggle="tooltip" data-placement="top" title="Purple"></li>
                                                <li class="bg-blue" data-color="blue" data-toggle="tooltip" data-placement="top" title="Blue"></li>
                                                <li class="bg-green" data-color="green" data-toggle="tooltip" data-placement="top" title="Green"></li>
                                                <li class="bg-yellow" data-color="yellow" data-toggle="tooltip" data-placement="top" title="Yellow"></li>
                                                <li class="bg-red" data-color="red" data-toggle="tooltip" data-placement="top" title="Red"></li-->
                                            <!--li class="bg-black-cover active" data-color="black" data-toggle="tooltip" data-placement="top" title="Black"></li>
                                            <li class="bg-bluegreen-cover" data-color="blue-green" data-toggle="tooltip" data-placement="top" title="Blue Green"></li>
                                            <li class="bg-darkgray-cover" data-color="dark-grey" data-toggle="tooltip" data-placement="top" title="Dark Grey"></li>
                                            <li class="bg-purple-cover" data-color="purple" data-toggle="tooltip" data-placement="top" title="Purple"></li>
                                            <li class="bg-blue-cover" data-color="blue" data-toggle="tooltip" data-placement="top" title="Blue"></li>
                                            <li class="bg-yellowgreen-cover" data-color="yellow-green" data-toggle="tooltip" data-placement="top" title="Yellow Green"></li>
                                            <li class="bg-indigo-cover" data-color="indigo" data-toggle="tooltip" data-placement="top" title="Indigo"></li>
                                            <li class="bg-red-cover" data-color="red" data-toggle="tooltip" data-placement="top" title="Red"></li>
                                        </ul-->
                                            <!--input type="hidden" name="background-color" value="bg-black-cover" -->
                                        </div>
                                    </div>

                                    <div class="row mb30" >
                                        <div class="col-12 col-sm-3 mb10">
                                            Public Board?
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <label class="switch">
                                                <input type="checkbox" name="is_public" checked value="1">
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row mb30">
                                        <div class="col-12 col-sm-3 mb10">
                                            Board Type&nbsp;<i title="To customize&#10;the experience" class="fas fa-info-circle" style="color: red"></i>
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <select name="board-type" class="form-control form-rounded">
                                                <option value="Hobbies / Interest">Hobbies / Interest</option>
                                                <option value="Work / Business">Work / Business</option>
                                                <option value="1">Others</option>
                                            </select>
                                            <input type="text" name="board-type-specify" class="form-control form-rounded mt10" placeholder="Please specify" style="display: none;">
                                        </div>
                                    </div>

                                    <div class="row mb30">
                                        <div class="col-12 col-sm-3 mb10">
                                            Group Board Accessibility
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <select name="board-accessibility" class="form-control form-rounded">
                                                <option value="global">Global</option>
                                                <option value="location_based">Location Based</option>
                                            </select>
                                            <input type="text" name="location-based" class="form-control form-rounded mt10" placeholder="Please enter a location" style="display: none;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 align-right plr25">
                                            <button id="submitthis" type="submit" class="bt btn-default float-left" style="opacity: 0;">
                                                Submit
                                            </button>
                                            @if (Auth::check())
                                                <button id="to_main_category" type="button" onclick="checkImportantFields()" class="btn btn-createboard btn-dashboard mt15 font-weight-bold plr20">
                                                    Next <i class="fa fa-chevron-right ml5"></i>
                                                </button>
                                            @else
                                                <a href="" data-toggle="modal" data-target="#loginform" class="btn btn-createboard btn-dashboard mt15 font-weight-bold plr20">
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
        <!--/header-->
        <!--Error message-->
        <div class="modal fade" id="errorTopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-danger text-white">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="close text-white float-right" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="mt10">
                                    Enter a topic name first.
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Error message-->
        <div class="modal fade" id="errorSaving" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-danger text-white">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="close text-white float-right" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="mt10">
                                    Error saving the Board.
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Error message-->
        <div class="modal fade" id="successSaving" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-success text-white">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="close text-white float-right" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="mt10">
                                    Successfully saved the board.
                                </h5>
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
                                    You have to enter a Board Name, Description and Cover Photo to proceed.
                                </h6>
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
                                        <h4 class="text-white" >GROUP BOARD CATEGORY<br />(Choose One)</h4>
                                    </div>

                                    @foreach($categories as $each_category)
                                        <div class="col-12 col-sm-4 align-center">
                                            <button type="submit" class="btn btn-board-category {{$each_category->background_color}}" onclick="mainCategory({{$each_category->id}}, '{{$each_category->category_name}}')">
                                                <i class="fa {{ $each_category->icon }} fa-fw"></i>
                                            </button>
                                            <p class="text-white mt10 mb30">{{$each_category->category_name}}</p>
                                        </div>


                                    @endforeach

                                </div>
                            </div>

                            <input type="hidden" name="main-category" value="">

                            <div id="saved-board" class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3" style="display: none;">
                                <div class="row mt40">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4 offset-sm-4 align-center mt20">
                                                        <button class="btn btn-board-category btn-green">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        <p class="mt10 mb30">Successfully Created the Board</p>
                                                    </div>

                                                    <div class="col-12 plr20 mt10 align-right">
                                                        <a id="go_to_board" href="" class="btn btn-createboard btn-dashboard mt15 font-weight-bold plr20">
                                                            Go to board
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>






        <div id="board-saving" class="splash-screen" style="display: none; overflow-y: auto;">
            <div class="container ptb50">
                <div class="row">
                    <div class="col-12 align-center">
                        <i class="fa fa-spinner fa-spin fa-fw" style="font-size:48px;color:red"></i>
                    </div>
                </div>
            </div>

        </div>















    </form>
    <script>
        var _coverLocal = false;
        $(document).ready(function(){
            $(document).ajaxStart(function() {
            //    alert(1);
                $("#loading").show();
            });

            $( document ).ajaxStop(function() {
                $("#loading").hide();
            });

            $('#div_defcover').load('/defaultCover/2');
            $('#example').DataTable();
            $("#cover-local").change(function (){
                var fileName = $(this).val();
                //alert(fileName);
                // alert(1);
                _coverLocal = true;
                //$(".add-cover-cont").css('background-image', 'linear-gradient(135deg, rgba(67,43,102,0.3),rgba(0,0,0,0.5)), url('+fileName+')');
                $("#div-boardcover").css('background-image', 'linear-gradient(135deg, rgba(67,43,102,0.3),rgba(0,0,0,0.5)), url('+fileName+')');
                //$(".add-cover-cont").css('min-height', '220px');
                $(".board-info").show();
                $("#text-position-opt").show();
            });

            $("#cover-photo").change(function (event){

                var pic_size = $("#cover-photo")[0].files[0].size;
     //           alert(pic_size);
                if(pic_size >= 5000000){
                    $("#error_validation").modal('toggle');
                    $("#error_validation #error_message").text('Please make sure the file is less than 5MB and file extension of the cover photo is gif, png, jpg or jpeg.');
                    return;
                }
                var fileName = URL.createObjectURL(event.target.files[0]);
                //alert(fileName);
                _coverLocal = false;
                //$(".add-cover-cont").css('background-image', 'linear-gradient(135deg, rgba(67,43,102,0.3),rgba(0,0,0,0.5)), url('+fileName+')');
                //$(".add-cover-cont").css('min-height', '220px');
                $("#div-boardcover").css('background-image', 'linear-gradient(135deg, rgba(67,43,102,0.3),rgba(0,0,0,0.5)), url('+fileName+')');
                $(".board-info").show();
                $("#text-position-opt").show();
            });

//                $("input[name=board-name]").keyup(function() {
//                    var title = $(this).val().trim();
//                    $('.board-title').text(title);
//                });

            $("input[name=board-name]").keyup(function() {
                var title = $(this).val().trim();
                if(title == "")
                    title = "Enter Board Name";
                if($("input[name=board-name-hide]").prop('checked'))
                    title = '&nbsp';
                //alert(title);
                $('#board-title').html(title);
            });

//                $("textarea[name=board-description]").keyup(function(){
//                    var description = $(this).val().trim();
//                    if(description == "")
//                    {
//                        $('.board-subtitle').hide();
//                    }
//                    else
//                    {
//                        $('.board-subtitle').show();
//                    }
//                    $('.board-description').text(description);
//                });


            $("textarea[name=board-description]").keyup(function(){
                var description = $(this).val().trim();
                if(description == "")
                {
                    description = "Enter Board Description";
                }
                if($("input[name=board-description-hide]").prop('checked'))
                    description = '&nbsp';
                $('#board-description').html(description);
            });

            $('textarea[name=board-description]').keypress(function(e) {
                var tval = $('textarea[name=board-description]').val(),
                    tlength = tval.length,
                    set = 60,
                    remain = parseInt(set - tlength);
                if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
                    $('textarea[name=board-description]').val((tval).substring(0, tlength - 1));
                    return false;
                }
            });

            $("select[name=board-type]").change(function(){
                var category = $(this).val();
                if(category == 1)
                {
                    $("input[name=board-type-specify]").show();
                }
                else
                {
                    $("input[name=board-type-specify]").hide();
                }
            });

            $("select[name=board-accessibility]").change(function(){
                var category = $(this).val();
                if(category == 'location_based')
                {
                    $("input[name=location-based]").show();
                }
                else
                {
                    $("input[name=location-based]").hide();
                }
            });

            $("#up-board-cover").click(function(){
                $("#cover-photo").click();
            });

            $('[data-toggle="tooltip"]').tooltip();

            $("#board-bg li").click(function(){
                $("#board-bg li").removeClass('active');
                $(this).addClass('active');
                var bg = $(this).attr('class').split(' active').join('');
                $("input[name=background-color]").val(bg)
            });

            $("#topic-bg li").click(function(){
                $("#topic-bg li").removeClass('active');
                $(this).addClass('active');
            });

            $("input[name=text-position]").click(function(){
                var position = $('input[name=text-position]:checked').val();
                var margin = '';
                var width = '';
                var float = '';
                var text_align = '';

                if(position == 'default')
                {
                //    margin = '100px 0px 0px';
                //    width = '100%';
                //    float = 'inherit';
                    text_align = 'left';
                }
                else if(position == 'left')
                {
                //    margin = '100px 0px 0px';
                //    width = '50%';
                //    float = 'left';
                    text_align = 'left';
                    $("input[name=input-text-position]").val("align-left");
                }
                else if(position == 'center')
                {
                //    margin = '100px auto 0px';
                //    width = '50%';
                //    float = 'inherit';
                    text_align = 'center';
                    $("input[name=input-text-position]").val("align-center");
                }
                else if(position == 'right')
                {
                 //   margin = '100px 0px 0px';
                 //   width = '50%';
                 //   float = 'right';
                    text_align = 'right';
                    $("input[name=input-text-position]").val("align-right");
                }

                //$(".board-info").css('margin', margin);
                //$(".board-info").css('width', width);
                //$(".board-info").css('float', float);
                //$(".board-info").css('text-align', text_align);
                $("#div-board-info").css('text-align', text_align);
            });

            $("input[name=board-access]").click(function(){
                var access = $('input[name=board-access]:checked').val();

                if(access == "all")
                {
                    $("#com-code-main").hide();
                }
                else
                {
                    $("#com-code-main").show();
                }
            });

            $("input[name=enable-community-code]").click(function(){
                if($(this).prop('checked'))
                {
                    $("input[name=digit-access-code]").val(makeCustomCode(6));
                    $("#com-code-cont").show();
                }
                else
                {
                    $("#com-code-cont").hide();
                }
            });

            $(".icon-list .btn").click(function(){
                $(".icon-list .btn").removeClass('active');
                $(this).addClass('active');
            });

            $(".dataTables_length").closest('.col-sm-12').css('display', 'none');



            $("#form_create_board").submit(function(event){
                event.preventDefault();
                formData = new FormData($(this)[0]);
                var board_members = Array();
                //           alert('submit');
//            $('input[name="user-to-save[]"]').each(function () {
//                board_members.push($(this).val());
//            });

                //           if(board_members.length > 0) {
                if(true) {

                    formData.append('main-category', $("input[name='main-category']").val());
                    formData.append('board-sub-category', $("select[name='board-sub-category']").val());
                    formData.append('sub-category-specify', $("input[name='sub-category-specify']").val());
                    formData.append('is_subcategory_selected', $("input[name='is_subcategory_selected']").val());
                    formData.append('board-access', $("input[name='board-access']:checked").val());
                    formData.append('enable-community-code', $("input[name='enable-community-code']").val());
                    formData.append('digit-access-code', $("input[name='digit-access-code']").val());
                    formData.append('topic-privacy-settings', $("select[name='topic-privacy-settings']").val());

                    /*var names = Array();
                    var icons = Array();
                    var icon_bgs = Array();

                    $('input[name="icon-name[]"]').each(function () {
                        names.push($(this).val());
                    });

                    $('input[name="icon-icon[]"]').each(function () {
                        icons.push($(this).val());
                    });

                    $('input[name="icon-bg[]"]').each(function () {
                        icon_bgs.push($(this).val());
                    });*/


                    formData.append('icon-name', icon_names);
                    formData.append('icon', icons);
                    formData.append('icon-bg', icon_bgs);

                    formData.append('cover-local', _coverLocal)
                    if(_coverLocal == true)
                        formData.append('cover-local-img',  $('#cover-local').val())
//                formData.append('board-members', board_members);
//alert('spinner');
                    $("#save-with-spinner").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Saving Board');
                    $("#save-with-spinner").attr('disabled', 'true');

                    $.ajax({
                        url: '/insert_board/',
                        data: formData,
                        type: "POST",
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if(data.success)
                            {
                                setTimeout(function(){
                                    // $("#group-members").toggle();
                                    $("#saved-board").toggle();
                                    $("#go_to_board").attr('href', '/board/'+data.board_id);
                                }, 1300);
                            }
                            else
                            {
                                $("#errorSaving").modal('toggle');
                                $("#save-with-spinner").html('Save Board');
                                $("#save-with-spinner").attr('disabled', 'false');
                            }
                        }
                    });
                }
                else {
                    $('#errorMembers').modal('toggle');
                }
            });

        });
    </script>
    <script>

        var category = new Custombox.modal({
            content: {
                effect: 'scale',
                target: '#board-category',
                fullscreen: true,
                id: 'board-category-modal'
            }
        });

        var saveboard = new Custombox.modal({
            content: {
                effect: 'scale',
                target: '#board-saving',
                fullscreen: true,
                id: 'board-saving-modal'
            }
        });
        function checkImportantFields()
        {
            var name = $("input[name=board-name]").val();
            var description = $("input[name=board-description]").val();
            //       alert(_coverLocal);
            var maincategory = $("input[name=main-category]").val();
            var cover = "";
            if(_coverLocal == false)
            {
                cover =  $('#cover-photo').val();
                $("input[name=cover-type]").val(0);

            }
            else
            {
                cover =  $('#cover-local').val();
                $("input[name=cover-type]").val(1);

            }
            $("input[name=cover-image]").val(cover);
//        alert(cover);
            var board_type_specify = $('input[name=board-type-specify]').val();
            var location_based = $('input[name=location-based]').val();

            if(name.trim() != "" && description != "" && cover != "" && maincategory != "")
            {
//            var ext = $('#cover-photo').val().split('.').pop().toLowerCase();
                var ext = cover.split('.').pop().toLowerCase();
                if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                    $("#error_validation").modal('toggle');
                    $("#error_validation #error_message").text('Please make sure the file extension of the cover photo is gif, png, jpg or jpeg.');
                }
                else
                {
                    var pic_size = 0;
                    if(_coverLocal == false)
                        pic_size = $("#cover-photo")[0].files[0].size;
                    if(pic_size <= 5000000)
                    {
                        var error = 0;
                        var error_message = '';

                        if($('select[name=board-type]').val() == '1' && board_type_specify.trim() == "")
                        {
                            error++;
                            error_message = "specific Board Type";
                        }
                        if($('select[name=board-accessibility]').val() == 'location_based' && location_based == "")
                        {
                            if (error > 0)
                            {
                                error_message += " and";
                            }
                            error++;
                            error_message += " Location";
                        }

                        if(error == 0)
                        {
                            ////chooseCategory();
                            submitCreateBoard();
                        }
                        else
                        {
                            $("#error_validation").modal('toggle');
                            $("#error_validation #error_message").text('Please enter a '+error_message+' to proceed.');
                        }
                    }
                    else
                    {
                        $("#error_validation").modal('toggle');
                        $("#error_validation #error_message").text('Please make sure the file size of the cover photo is 5mb or below.');
                    }
                }
            }
            else
            {
                $("#error_validation").modal('toggle');
                $("#error_validation #error_message").text('You have to enter a Board Name, Description, Category and Cover Photo to proceed.');
            }
        }

        function chooseCategory()
        {
            category.open();

        }

        function closeCategory()
        {
            Custombox.modal.close("board-category-modal");
        }
        function mainCategory(main_category_id, main_category_name)
        {
            $("input[name=main-category]").val(main_category_id);
            $("input[name=main-category-display]").val(main_category_name);
            $("input[name=main-category-session]").val(main_category_name);
            closeCategory();
            ////$("#main-category").toggle();
            //   $("#sub-category").toggle();

            //   $("#sub-category").load("/board/category/subcategory/"+main_category);
            ////$("#board-category").removeClass("hoot-modal");
            ////$("#board-category").addClass("bg-white");
            ////submitCreateBoard();
        }

        function savingScreen()
        {
            saveboard.open();
        }

        function submitCreateBoard()
        {
            savingScreen();
            ////$("#submitthis").click();
            document.getElementById("form_new_board").submit();
        }

        function changeBGColor(_color){
            document.body.style.backgroundColor = _color;
        }

        function changeTextColor(_color){
            //alert(_color);
            document.getElementById('board-title').style.color = _color;
            document.getElementById('board-description').style.color = _color;
            document.getElementById('div-profile').style.color = _color;
            document.getElementById('div-users').style.color = _color;
            document.getElementById('div-date').style.color = _color;
        }

        function doHideBoardName(_val){
            var title = '&nbsp';
            //alert(_val);
            if(_val) {
                $('#board-title').html(title);
            }
            else{
                title = $("input[name=board-name]").val().trim();
                if(title == "")
                    title = "Enter Board Name";
                $('#board-title').html(title);

            }
                //alert($("input[name=board-name]").value);
        }

        function doHideBoardDesc(_val){
            var description = '&nbsp';
            if(_val) {
                $('#board-description').html(description);
            }
            else{
                description = $("textarea[name=board-description]").val().trim();
                if(description == "")
                    description = "Enter Board Description";
                $('#board-description').html(description);

            }
//                alert($("textarea[name=board-description]").value);
        }

    </script>
@endsection

