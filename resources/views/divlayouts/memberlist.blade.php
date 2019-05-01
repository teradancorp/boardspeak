<div class="container mb10">
    <div class="row mb30">
        <input type="hidden" id="cover-local" value="">
        @if($members)
            @foreach($members as $member)

                <div class="col-3 align-left" style="margin-bottom: 8px;">
                    <img src="/storage/avatars/{{ $member->avatar }}" class="img-responsive discussion-avatar" style="max-width: 40px; max-height: 40px" align="left">
                    <span class="text-white small text-capitalize pl10">{{ $member->name }}</span><br>
                    @switch($member->user_role)
                        @case(16)
                        <span class="text-white small pl10">Member</span>
                        @break
                        @case(127)
                        <span class="text-white small pl10">Administrator</span>
                        @break
                        @case(255)
                        <span class="text-white small pl10">Board Owner</span>
                        @break
                    @endswitch

                </div>

            @endforeach
        @else
            No Data Found!
        @endif
    </div>
</div>