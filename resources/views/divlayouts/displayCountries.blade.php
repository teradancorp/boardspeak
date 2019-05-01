@foreach($countries as $country)

    <div class="pl5 pt5 h5 small" style="">
        <a href="#" onclick="doSelectCountry('{{ $country->cny_name }}', '{{ $country->iso_2 }}', {{ $country->id }})">{{ $country->cny_name }}</a>

    </div>

@endforeach
