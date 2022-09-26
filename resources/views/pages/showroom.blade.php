@extends('layout')


@section('content')
    <div class="pt-[80px]">


        @if ($brand->showroom_title)
            <x-shared.hero-section :title="$brand->showroom_title" :description="$brand->showroom_subtitle">
                @slot('bgImage')
                    {{ $brand->getMedia('showroom_header_bg')[0]('brand-media')->attributes([
                            'class' => 'object-cover h-full w-full',
                        ]) }}
                @endslot
            </x-shared.hero-section>
        @endif


        @if ($brand->getFirstMedia('showroom_promoted_img'))
            <div id="v-promoted-section" class="main-top-padding">
                <x-shared.promoted-section :text="$brand->showroom_promoted_title" :description="$brand->showroom_promoted_description" :link="$brand->showroom_promoted_link">
                    {{ $brand->getFirstMedia('showroom_promoted_img')('brand-media')->attributes(['class' => 'w-full']) }}
                </x-shared.promoted-section>
            </div>
        @endif


        {{-- All models --}}
        @if (count($brand->vehicleModels))
            <div class="bg-bg-light">
                <div class="container-center flex flex-col gap-4">

                    <h1 class="text-lg HD:text-6xl font-bold uppercase mb-5 text-center HD:text-left">
                        All Models
                    </h1>
                    <div
                        class="grid grid-cols-1 mob-428:grid-cols-2 HD:grid-cols-3 full-HD:grid-cols-3 2K:grid-cols-4 gap-8 justify-between">
                        @foreach ($brand->vehicleModels as $model)
                            <div class="hover:shadow-cardShadow group">
                                <div class="h-56 HD:h-64 w-full bg-gray/400 flex justify-center items-center relative">
                                    @if ($model->getFirstMedia('image_model'))
                                        {{ $model->getFirstMedia('image_model')('model-media')->attributes([
                                                'class' => 'object-cover h-full w-full',
                                            ]) }}
                                    @else
                                        <img src="/images/c-logo.svg" class="cursor-pointer w-1/3" alt="logo" />
                                    @endif

                                    <div
                                        class="absolute bottom-0 left-0 w-full hidden group-hover:HD:grid grid-cols-2">
                                        <button
                                            class="bg-bg text-black HD:text-primary font-semibold p-4 flex justify-center items-center underline border-r-2 border-r-light-border">
                                            Full details
                                        </button>
                                        <button
                                            class=" bg-bg text-black font-semibold p-4 flex justify-center items-center underline">
                                            View inventory
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between HD:flex-col">

                                    <div class="px-3 pt-3">
                                        <h3 class="text-m HD:text-m font-bold text-grey-900">
                                            {{ $model->year }} {{ $brand->name }} {{ $model->name }}
                                        </h3>
                                        <p class="flex items-center HD:pb-8">
                                            <span class="text-base HD:text-m font-medium mr-3 text-grey-500">From</span> <span
                                                class="text-base HD:text-m font-bold text-primary">${{ number_format($model->starting_price) }}</span>
                                        </p>

                                        <div
                                        class="flex flex-row w-full justify-between HD:hidden mt-5">
                                        <button
                                            class="text-xs text-black font-bold flex justify-center items-center underline">
                                            Full details
                                        </button>
                                        <button
                                            class=" text-xs text-black font-bold flex justify-center items-center underline">
                                            View inventory
                                        </button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        @endif



        @if ($brand->showroom_video)
            <div id="v-video-player">
                <video-player src="/storage/{{ $brand->showroom_video }}" full-width />
            </div>
        @endif


        @if (Page::option('business_information')->carcity_benefits)
            <div class="container-center bg-bg-light">
                <div class="flex flex-col">

                    <h1 class="text-3xl HD:text-6xl font-bold uppercase mb-12 text-center HD:text-left">
                        Why buying {{ $brand->name }} <br> with Car City?
                    </h1>

                    <div class="grid grid-cols-1 HD:grid-cols-3 gap-12">
                        @foreach (Page::option('business_information')->carcity_benefits as $benef)
                            <div class="flex flex-col gap-8 pt-8 border-t border-gray/400 text-center HD:text-left">
                                <h3 class="text-lg font-bold">{{ $benef['attributes']['benefit_title'] }}</h3>
                                <p class="text-base HD:text-lg font-normal">
                                    {{ $benef['attributes']['benefit_description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
    <x-layout.footer />
@endsection
