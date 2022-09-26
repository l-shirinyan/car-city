@extends('layout')
@section('content')
    <div class="full-HD:pt-20 2K:pt-[124px] pt-16">
        <div id="v-filter-sidebar" class="flex justify-between min-h-screen">
            <div>
                <filter-sidebar />
            </div>
            <c-cars-list />
        </div>
    </div>
    <x-layout.footer />
@endsection
