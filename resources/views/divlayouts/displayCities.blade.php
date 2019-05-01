@foreach($cities as $city)

    <div class="pl5 pt5 h5 small" style="">
        <a href="#" onclick="doSelectCity('{{ $city->city_name }}', {{ $city->id }})">{{ $city->city_name }}</a>

    </div>

@endforeach
