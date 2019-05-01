<div class="container mb10">
    <div class="row mb30">
        <input type="hidden" id="cover-local" value="">
        @foreach($covers as $cover)

            <div class="col col-lg align-center" style="margin-bottom: 8px;">

                <img onclick="select_localcover('{{ asset("img/" .$cover->cover_image) }}')" src="{{ asset("img/" .$cover->cover_image) }}" style="width: 120px; height: 70px;">
            </div>

        @endforeach
    </div>
</div>