function load_defcover(_type) {
    var _url = '/defaultCover/' + _type;
    //alert(_url);
    $('#div_defcover').load(_url);
 //   if(_type == 1)
 //       $('#div_defcover').load('/defaultViewCover/');
 //   else
 //       $('#div_defcover').load('/defaultGradientCover/');
}

function load_members(_type, _board) {
    $('#memberform').modal('show');
    var _url = '/board/memberList/' + _type + '/' + _board;
//alert(_board);
    //    $('#div_memberlist').html('<span class="h1 text-white">Hello</span>');
    $('#div_memberlist').load(_url);
}


function select_localcover(_val) {
    $('#cover-local').val(_val).trigger('change');
//                  _coverLocal = true;
    ////              $(".add-cover-cont").css('background-image', 'linear-gradient(135deg, rgba(67,43,102,0.3),rgba(0,0,0,0.5)), url('+fileName+')');
    ////              $(".add-cover-cont").css('min-height', '220px');
    ////              $(".board-info").show();
    ////              $("#text-position-opt").show();
    //alert(document.getElementById('cover-local').value);
    //document.getElementById('cover-local').value = _val;
    //alert(_val);
}

function displayCountries() {
    var _code = document.getElementById('text_country').value;
    var _url = '/getCountries/' + _code;
    $('#div_countries').load(_url);
}

function displayCities() {
    //alert('hello');
    var _city = document.getElementById('text_city').value;
    var _code = document.getElementById('dummy-code').value;
    var _url = '/getCities/' + _city + '/' + _code;
    //alert(encodeURI(_url));
    $('#div_cities').load(encodeURI(_url));
}

function doSelectCountry(_name, _code, _id){
    $('#dummy-country').val(_name);
    $('#dummy-code').val(_code);
    $('#dummy-cntryID').val(_id);
    document.getElementById('span_country').innerText = _name;
    $("#div_searchCountry").hide();
    $("#div_searchCity").show();

}

function doSelectCity(_name, _id){
    $('#dummy-city').val(_name);
    $('#loc-city').val(_name);
    $('#loc-country').val(document.getElementById('dummy-country').value);
    $('#loc-code').val(document.getElementById('dummy-code').value);
    document.getElementById('text_location').value = document.getElementById('loc-city').value + ', ' +  document.getElementById('loc-country').value;
    document.getElementById("loc_flag").src = '/img/flags/' + document.getElementById('loc-code').value.toLowerCase() + '.svg';
    $("#div_searchCountry").hide();
    $("#div_searchCity").hide();

}

function editLocation() {
    $("#div_searchCountry").hide();
    $("#div_searchCity").show();
}

function doDisplayChangeCountry() {
    $("#div_searchCity").hide();
    $("#div_searchCountry").show();

}

function doUpdateBday(){
    var _year = document.getElementById('sel-year').value;
    var _mon = document.getElementById('sel-month').value;
    var _day = document.getElementById('sel-day').value;
    document.getElementById('text-bday').value = _year + '-' + _mon + '-' + _day;
    //alert(document.getElementById('text-bday').value);

}

function doPopulateDay(_mon){
    //alert(document.getElementById('text_day').innerHTML);
    var _year = document.getElementById('sel-year').value;
    var _days = 0;
    switch (parseInt(_mon)){
        case 1:
            _days = 31;
            break;
        case 2:
            _days = 28;
            break;
        case 3:
            _days = 31;
            break;
        case 4:
            _days = 30;
            break;
        case 5:
            _days = 31;
            break;
        case 6:
            _days = 30;
            break;
        case 7:
            _days = 31;
            break;
        case 8:
            _days = 31;
            break;
        case 9:
            _days = 30;
            break;
        case 10:
            _days = 31;
            break;
        case 10:
            _days = 30;
            break;
        case 12:
            _days = 31;
            break;
    }
    if(_days > 0){
        document.getElementById('sel-day').innerHTML = '';
        for(var i = 1; i <= _days; i++){
            document.getElementById('sel-day').innerHTML = document.getElementById('sel-day').innerHTML + '<option value="' + i +'">' + i + '</option>';
        }
        document.getElementById('text-bday').value = _year + '-' + _mon + '-1';
        //alert(document.getElementById('text-bday').value);
    }

}


function togglePassword() {
    var x = document.getElementById("text-password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}