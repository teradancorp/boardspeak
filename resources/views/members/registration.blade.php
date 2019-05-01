@extends('layouts/layout_plain');

@section('content')
    <div id='loading' style="position: fixed; left: 50%; top: 50%; display: none; z-index: 100;">
        <img src="https://www.drupal.org/files/issues/ajax-loader.gif"></img>
    </div>

    <div class="container pt100">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    <!--div class="align-center" style=""><h5>Join Boardspeak now. It's free!</h5></div-->

                    <div class="card-body" style="">
                        <form method="POST" action="" id="myform">
                            {{ csrf_field() }}
                            <div class="align-center pb10" style=""><h1 class="">Join BoardSpeak Now!</h1></div>
                            <div class="alert alert-danger print-error-msg" style="display:none">

                                <ul></ul>

                            </div>
                            <div name="div_regform" id="div_regform" style="display: inherit">

                                <div class="col-12 plr10 pb15">
                                    <input type="text" name="email" id="new-email" style="background: transparent; height: 60px; padding-top: 30px;" class="form-control form-rounded pl50" placeholder="Enter Your E-mail Address" value="{{ session('email') }}" required  value="{{ old('email') }}">
                                    <div style="margin-top: -50px; margin-left: 15px; position: absolute;">
                                        <i style="background: transparent; " class="far fa-envelope fa-lg" aria-hidden="true"></i><span class="font-weight-bold pl15">Email</span>
                                    </div>

                                </div>

                                <div id="div_step2" style="display: none;" class="pb15">
                                    <div class="col-12 plr10 pb15" style="margin-top: 0px ">
                                        <input type="text"  name="new-name" style="background: transparent; height: 60px; padding-top: 30px; text-transform: capitalize" class="form-control form-rounded pl50" placeholder="Your Full Name" required  value="{{ old('name') }}">
                                        <div style="margin-top: -50px; margin-left: 15px; position: absolute;">
                                            <i style="background: transparent;" class="far fa-user-circle fa-lg" aria-hidden="true"></i><span class="font-weight-bold pl15">Your Name</span>
                                        </div>
                                    </div>


                                    <div class="col-12 plr10 pb15" style="margin-top: 0px ">
                                        <input type="text" name="new-username" id="new-username" style="background: transparent; height: 60px; padding-top: 30px; text-transform: capitalize" class="form-control form-rounded pl50" placeholder="Enter Alias" required  value="{{ old('new-username') }}">
                                        <div style="margin-top: -50px; margin-left: 15px; position: absolute;">
                                            <i style="background: transparent;" class="far fa-user-circle fa-lg" aria-hidden="true"></i><span class="font-weight-bold pl15">Alias</span>
                                        </div>
                                    </div>
                                    <!--div class="col-12 plr10 pb10 pl20 inline-block" style="" onclick="editLocation();"-->
                                    <div class="col-12 plr10 pb10 pl20 inline-block" style="" onclick="editLocation();">
                                        <input type="hidden" name="loc-city" id="loc-city" value="{{$location->city}}">
                                        <input type="hidden" name="loc-country" id="loc-country" value="{{$location->country}}">
                                        <input type="hidden" name="loc-code" id="loc-code" value="{{$location->iso_code}}">
                                        <input type="hidden" name="dummy-city" id="dummy-city" value="{{$location->city}}">
                                        <input type="hidden" name="dummy-country" id="dummy-country" value="{{$location->country}}">
                                        <input type="hidden" name="dummy-code" id="dummy-code" value="{{$location->iso_code}}">
                                        <input type="hidden" name="dummy-cntryID" id="dummy-cntryID" value="">

                                        <input type="text" disabled name="text_location" id="text_location" style="background: transparent;" class="form-control form-rounded pl50" placeholder="" required value="{{ $location->city . ', ' . $location->country }}">
                                        <i style="background: transparent; margin-top: -27px; margin-left: 12px; position: absolute;" class="fas fa-map-marker-alt plr10"></i>
                                    </div>
                                    <div class="col-12 plr10 pb10 pl20 inline-block align-right" style="">
                                        <img id="loc_flag" src="{{ asset('img/flags/'.strtolower($location->iso_code).'.svg') }}" style="width: 20px; margin-top: -37px; margin-right: 20px">
                                    </div>
                                    <div id="div_searchCity" class="col-12 plr80" style="display: none;">
                                        <div class="row p10" style=" border:1px solid black; border-radius: 10px;">
                                            <div class="col-1"></div>
                                            <div class="col-10">
                                                <div class="pl10 pb5 h5 small">
                                                    <span id="span_country"> {{$location->country}} </span>&nbsp; <a href="#" class="" onclick="doDisplayChangeCountry()">(change)</a>
                                                </div>

                                                <input type="text" name="text_city" id="text_city" style="background: transparent; width: 100%" class="form-control-sm pl10" placeholder="Enter City Name" value="">
                                                <button style="background: transparent; margin-top: -30px; right: 10px; position: absolute;" id="btn_searchCity" type="button" onclick="displayCities()" class="btn btn-createboard font-weight-bold">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                                <div id="div_cities"></div>
                                            </div>
                                            <div class="col-1"></div>

                                        </div>
                                    </div>

                                    <div id="div_searchCountry" class="col-12 plr80" style="display: none;">
                                        <div class="row p10" style=" border:1px solid black; border-radius: 10px;">
                                            <div class="col-1"></div>
                                            <div class="col-10">
                                                <input type="text" name="text_country" id="text_country" style="background: transparent; width: 100%" class="form-control-sm pl10" placeholder="Enter Country Name" value="">
                                                <button style="background: transparent; margin-top: -30px; right: 10px; position: absolute;" id="btn_searchCountry" type="button" onclick="displayCountries()" class="btn btn-createboard font-weight-bold">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                                <div id="div_countries"></div>
                                            </div>
                                            <div class="col-1"></div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div name="div_personalform" id="div_personalform" style="display: none;">
                                <div class="col-12 plr10 pb15">
                                    <div class="col-12 ml10">Occupation</div>
                                    <input type="text" name="text-occupation" id="text-occupation" style="background: transparent;" class="form-control form-rounded pl50" placeholder="Type of Occupation" value="" required  value="{{ old('text-occupation') }}">
                                    <div style="margin-top: -27px; margin-left: 15px; position: absolute;">
                                        <i style="background: transparent;" class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i>
                                    </div>

                                </div>
                                <div class="row plr10 pb15">
                                    <div class="col-12 ml20">Date of Birth</div>
                                    <input type="hidden" value="<?php echo date('Y') .'-'. date('n') .'-'. date('j') ?>" name="text-bday" id="text-bday">
                                    <div class="col-5">
                                        <select name="sel-month" id="sel-month" style="background: transparent; width:100%" class="form-control" onmousedown="if(this.options.length>5){this.size=5;}"  onchange="this.size=0; doPopulateDay(this.value);" onblur="this.size=0;">
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>

                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select name="sel-day" id="sel-day" style="background: transparent; width:100%" class="form-control" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0; doUpdateBday()' onblur="this.size=0;">
                                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="sel-year" id="sel-year" style="background: transparent; width:100%" class="form-control" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0; doUpdateBday()' onblur="this.size=0;">
                                            <?php
                                                $yr = date("Y");
                                                for ($i = $yr; ($yr - $i) <= 100; $i--) :
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-12 plr10 pb15">
                                    <div class="col-12 ml10">Gender</div>
                                    <select name="sel-gender" id="sel-gender" style="background: transparent; width:100%" class="form-control form-rounded pl50" onmousedown="if(this.options.length>5){this.size=5;}"  onchange="this.size=0; doPopulateDay(this.value, <?php echo date("Y"); ?>);" onblur="this.size=0;">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>

                                    </select>
                                    <div style="margin-top: -27px; margin-left: 15px; position: absolute;">
                                        <i style="background: transparent;" class="fa fa-intersex fa-lg" aria-hidden="true"></i>
                                    </div>

                                </div>
                                <div class="col-12 plr10 pb15" style="margin-top: 0px ">
                                    <input type="password"  name="text-password"  id="text-password" style="background: transparent; height: 60px; padding-top: 30px; text-transform: capitalize" class="form-control form-rounded pl50" placeholder="Enter your Password" required  value="">
                                    <div style="margin-top: -50px; margin-left: 15px; position: absolute;">
                                        <i style="background: transparent;" class="fa fa-key fa-lg" aria-hidden="true"></i><span class="font-weight-bold pl15">Password</span>
                                    </div>
                                    <div style="vertical-align: middle;" class="pt5 pb20 align-center">
                                        <input type="checkbox" onclick="togglePassword()">&nbsp; Show Password

                                    </div>
                                </div>

                            </div>


                            <div class="col-12 plr30 pb5 pt10 align-center">
                                <input style="width: 200px; height: 40px; border-radius: 10px" type="submit" value="Sign Up" id="submit_step1" class="btn-primary">
                            </div>
                            <div class="align-center" style=""><h6 class="small">By continuing to use Boardspeak, you agree to our <a href="#">Terms</a></h6></div>
                            <div class="col-12 plr30 pb5 pt20 align-center">
                                <img src="{{ asset('img/login_img.jpg') }}" style="width:200px;">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var _step = 1;
        jQuery(document).ready(function(){
            $(document).ajaxStart(function() {
                //    alert(1);
                $("#loading").show();
            });

            $( document ).ajaxStop(function() {
                $("#loading").hide();
            });
            jQuery('#submit_step1').click(function(e){
                e.preventDefault();
                $(".print-error-msg").hide();

            switch(_step) {
                case 1:
                    var token = $("input[name='_token']").val();
                    var email = $("#new-email").val();
                    if (email.length < 1)
                        return;
                    jQuery.ajax({
                        cache: false,
                        url: "/member/checkEmail",
                        type: "post",
                        data: $("#myform").serialize(),
                        success: function (data) {
                            //      alert(data);
                            if ($.isEmptyObject(data.error)) {
                                _step = 2;
                                $("#div_step2").show();
                                $("#new-email").prop("disabled", true);
                                var split = email.split("@");
                                document.getElementById('new-username').value = split[0];

                            } else {

                                printErrorMsg(data.error);

                            }
                        }

                    });
                    break;
                case 2:
                    //alert(2);
                    var token = $("input[name='_token']").val();
                    jQuery.ajax({
                        cache: false,
                        url: "/member/doneStep2",
                        type: "post",
                        data: $("#myform").serialize(),
                        success: function (data) {
                            if ($.isEmptyObject(data.error)) {
                                _step = 3;
                                $("#div_regform").hide();
                                $("#div_personalform").show();

                            } else {
                                printErrorMsg(data.error);
                            }
                        }

                    });
                    break;
                case 3:
                    //alert(3);
                    var token = $("input[name='_token']").val();
                    jQuery.ajax({
                        cache: false,
                        url: "/member/register",
                        type: "post",
                        data: $("#myform").serialize(),
                        success: function (data) {
                            //alert(data.error);
                            if ($.isEmptyObject(data.error)) {
                                window.location.href = '/user/profile';
                            } else {
                                printErrorMsg(data.error);
                            }
                        }

                    });
                    break;
            }


            });
        });

        function printErrorMsg (msg) {

            $(".print-error-msg").find("ul").html('');

            $(".print-error-msg").css('display','block');

            $.each( msg, function( key, value ) {

                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

            });

        }
    </script>
@endsection
