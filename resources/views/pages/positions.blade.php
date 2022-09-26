@extends('layout')


@section('content')
    <div id="v-positions" class="pl-10 HD:pt-x100 full-HD:pt-[116px] 2K:pt-[184px] pt-16">
        <div class="w-[300px]">
            <phone-number-input  />
        </div>
        <div class="w-[300px]">
            <c-custom-input placeholder="Email*" rules="email"  />
        </div>
    </div>
@endsection
