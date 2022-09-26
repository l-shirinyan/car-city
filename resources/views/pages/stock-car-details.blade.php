@extends('layout')

<div>


    @section('content')
        <div id="v-stock-car-details">
            @if (!!$mediasGallery)
                <div class="fixed top-0 left-0 h-full w-full z-max" v-if="galleryOpened">
                    <vehicle-images-carousel @close="galleryOpened=false" :images="{{ $mediasGallery }}" />
                </div>
            @endif

            @if (!!$image360)
                <div v-if="threeSixtyOpened">
                    <vehicle-image-360 @close="threeSixtyOpened=false" image-url="{{ $image360->getUrl('vehicle-media') }}" />
                </div>
            @endif


            <div class="pt-[80px]">
                <div class="container-center flex flex-col gap-12">
                    <div class="flex flex-row justify-between items-center w-full">
                        <a class="text-m font-bold">
                            ← <u>Back to result</u>
                        </a>

                        <a @click="shareMe({{ $vehicle }})"
                            class="cursor-pointer flex gap-2 items-center justify-center w-fit HD:border border-gray/400 text-primary bg-none rounded-[40px] px-3 HD:px-8 py-3">
                            <img src="/storage/images/icons/share.svg" width="20"> <span class="hidden HD:block">Share
                                this
                                car</span>
                        </a>
                    </div>

                    <div class="flex flex-col HD:flex-row gap-8 w-full">
                        <div class="w-full HD:w-1/2 full-HD:w-2/5 h-[270px] HD:h-[472px] bg-bg relative">
                            {{ $vehicle->getFirstMedia('presentation_picture')('vehicle-media')->attributes([
                                    'class' => 'object-cover w-full h-full',
                                ]) }}

                            <div class="absolute h-full w-full top-0 left-0 bg-linear">

                            </div>

                            <div
                                class="absolute right-0 bottom-0 p-3 flex flex-row gap-5 justify-end items-center w-full bg-grey-900 text-white">
                                <p class="flex flex-row gap-2 items-center cursor-pointer" @click="galleryOpened=true">
                                    <img src="/storage/images/icons/gallery.svg"> <u>Gallery
                                        1/{{ count($vehicle->getMedia('pictures')) }}</u>
                                </p>

                                @if (!!$image360)
                                    <p class="flex flex-row gap-2 items-center cursor-pointer"
                                        @click="threeSixtyOpened=true">
                                        <img src="/storage/images/icons/360.svg"> <u>360 tour</u>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="w-full HD:w-1/2 full-HD:w-3/5">
                            <h1
                                class="text-lg HD:text-5xl font-bold mb-5 gap-4 flex flex-col-reverse HD:items-center HD:flex-row HD:justify-between">
                                <span>{{ $vehicle->name }}</span>

                                <div
                                    class="flex justify-center items-center text-base leading-6 text-white bg-secondary px-4 py-3 max-w-content 2K:py-2 2K:px-6 2K:leading-normal 2K:text-x20">
                                    {{ $vehicle->status }}
                                </div>
                            </h1>
                            <p class="text-m full-HD:text-xl font-medium text-gray/400">
                                {{ implode(' ', array_filter([$vehicle->trim->engine, $vehicle->vehicleModel->body_type, $vehicle->nb_doors])) }}
                            </p>
                            <p class="text-m full-HD:text-xl font-medium text-gray/400">
                                {{ implode(' • ', array_filter([$vehicle->vehicleModel->year, $vehicle->trim->transmission, $vehicle->trim->carbon_emission, $vehicle->miles ? $vehicle->miles . ' miles' : null])) }}
                            </p>
                            <p class="text-m font-bold flex flex-row gap-3 items-center mt-8">
                                <img src="/storage/images/icons/warranty.svg" width="30" alt=""> 3 years
                                warranty
                            </p>

                            <div class="flex flex-row justify-between mt-5">
                                <span class="text-primary text-xl HD:text-3xl font-bold">
                                    ${{ number_format($vehicle->price) }}
                                </span>
                                <span class="text-xs font-normal flex flex-row items-center gap-2">
                                    <span class="text-xl HD:text-xl font-bold">${{ $monthlyPayment }}</span>/month
                                </span>
                            </div>

                            <hr class="my-8 hidden HD:block">

                            <div
                                class="flex shadow-xl HD:shadow-none flex-col HD:flex-row w-full gap-5 fixed HD:relative bottom-0 left-0 bg-white p-4 HD:p-0">
                                <a href="{{ route('show-vehicle-inquery', ['brand' => $vehicle->brand, 'vehicle' => $vehicle]) }}"
                                    class="flex items-center justify-center w-full HD:w-1/2 bg-primary h-[52px] rounded-[40px]  tab-small:h-[68px]  2K:h-[84px] text-white font-bold">
                                    I'm interested
                                </a>
                                <a
                                    class="flex items-center justify-center w-full HD:w-1/2 border border-gray/400 text-primary bg-none h-[52px] rounded-[40px]  tab-small:h-[68px]  2K:h-[84px] font-bold">
                                    <span class="hidden HD:block">Call us</span>
                                    <span class="flex HD:hidden flex-row gap-2 items-center"> <img
                                            src="/storage/images/icons/whatsapp.svg" alt=""> WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-center bg-grey-900">
                    <div class="text-white flex flex-col gap-8 HD:flex-row justify-between HD:items-center w-full">

                        <div>
                            <h2 class="text-xl HD:text-4xl font-bold mb-8">Get behind the wheel</h2>

                            <p class="text-lg HD:text-xl font-normal">
                                We're ready to help 9am-6pm Monday - Friday
                                <br>
                                and 9am-2pm on Saturdays
                            </p>
                        </div>

                        <div>
                            <a href="{{ route('show-vehicle-book-test-drive', ['brand' => $vehicle->brand, 'vehicle' => $vehicle]) }}"
                                class="mt-4 HD:mt-0 cursor-pointer flex gap-3 items-center justify-center w-full HD:w-fit text-primary bg-white rounded-[40px] px-10 py-5 text-m font-bold">
                                <span>Book a test drive</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="container-center bg-bg-light">
                    <div class="flex flex-col w-full">
                        <h1 class="uppercase text-xl HD:text-6xl font-bold mb-10">
                            Car overview
                        </h1>
                        <div class="grid grid-cols-1 HD:grid-cols-2 gap-10">
                            @if (!!$vehicle->vehicleModel->body_type)
                                <div class="pb-6 border-b border-gray/400 flex flex-row justify-between">
                                    <h3 class="text-m font-medium">Body type</h3>
                                    <p class="text-m font-bold">{{ $vehicle->vehicleModel->body_type }}</p>
                                </div>
                            @endif
                            @if (!!$vehicle->trim->carbon_emission)
                                <div class="pb-6 border-b border-gray/400 flex flex-row justify-between">
                                    <h3 class="text-m font-medium">CO₂ Emissions</h3>
                                    <p class="text-m font-bold">{{ $vehicle->trim->carbon_emission }}</p>
                                </div>
                            @endif
                            @if (!!$vehicle->color)
                                <div class="pb-6 border-b border-gray/400 flex flex-row justify-between">
                                    <h3 class="text-m font-medium">Color</h3>
                                    <p class="text-m font-bold"> {{ $vehicle->color }}</p>
                                </div>
                            @endif
                            @if (isset($vehicle->previous_owners))
                                <div class="pb-6 border-b border-gray/400 flex flex-row justify-between">
                                    <h3 class="text-m font-medium">Previous owners</h3>
                                    <p class="text-m font-bold">{{ $vehicle->previous_owners }}</p>
                                </div>
                            @endif
                            @if (isset($vehicle->trim->fuel_consumption))
                                <div class="pb-6 border-b border-gray/400 flex flex-row justify-between">
                                    <h3 class="text-m font-medium">Fuel Consumption </h3>
                                    <p class="text-m font-bold"></p>
                                </div>
                            @endif

                            @if (isset($vehicle->stock_number))
                                <div class="pb-6 border-b border-gray/400 flex flex-row justify-between">
                                    <h3 class="text-m font-medium">Stock number</h3>
                                    <p class="text-m font-bold">{{ $vehicle->stock_number }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>




                @if ($vehicle->trim->specs)
                    <div class="container-center bg-bg-light" id="v-accordion-specs">
                        <div class="flex flex-col w-full">
                            <h1 class="uppercase text-xl HD:text-6xl font-bold mb-10">
                                Car Specifications
                            </h1>

                            <accordion-specs specs="{{ json_encode($vehicle->trim->specs) }}">
                            </accordion-specs>
                        </div>


                    </div>
                @endif


                @if ($vehicle->walkaround_video)
                    <div id="v-video-player">
                        <video-player src="/storage/{{ $vehicle->walkaround_video }}" full-width />
                    </div>
                @endif


                <div class="container-center bg-grey-900">
                    <div class="text-white flex flex-col gap-8 HD:flex-row justify-between HD:items-center w-full">
                        <div>
                            <h2 class="text-xl HD:text-4xl font-bold mb-8">Have a question?</h2>
                            <p class="text-xl HD:text-xl font-normal">
                                Get answers, see the car, or find a good time for a test drive.
                                <br>
                                Take the next step and contact the seller.
                            </p>
                        </div>


                        <a href="{{ route('contact') }}"
                            class="cursor-pointer flex gap-3 items-center justify-center w-full HD:w-fit text-primary bg-white rounded-[40px] px-10 py-5 text-m font-bold">
                            <span>Contact us</span>
                        </a>
                    </div>
                </div>

                @if (Page::option('business_information')->carcity_benefits)
                    <div class="container-center bg-bg-light">
                        <div class="flex flex-col">

                            <h1 class="text-3xl HD:text-6xl font-bold uppercase mb-12 text-center HD:text-left">
                                Why buying {{ $vehicle->brand->name }} <br> with Car City?
                            </h1>

                            <div class="grid grid-cols-1 HD:grid-cols-3 gap-12">
                                @foreach (Page::option('business_information')->carcity_benefits as $benef)
                                <div class="flex flex-col gap-8 pt-8 border-t border-gray/400 text-center HD:text-left">
                                    <h3 class="text-lg font-bold">{{ $benef['attributes']['benefit_title'] }}</h3>
                                        <p class="text-base HD:text-lg font-normal">{{ $benef['attributes']['benefit_description'] }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <div class="container-center bg-grey-900">
                    <div class="text-white flex flex-col gap-8 HD:flex-row justify-between HD:items-center w-full">
                        <div>
                            <h2 class="text-xl HD:text-4xl font-bold mb-8">We value and buy cars everyday</h2>
                            <p class="text-xl HD:text-xl font-normal">
                                You can trust us to give you a fair valuation
                                <br>
                                for your car whatever condition it's in
                            </p>
                        </div>


                        <a href="{{ route('show-vehicle-value-my-car') }}"
                            class="cursor-pointer flex gap-3 items-center justify-center w-full HD:w-fit text-primary bg-white rounded-[40px] px-10 py-5 text-m font-bold">
                            <span>Value my car</span>
                        </a>
                    </div>
                </div>


                <div class="container-center bg-bg-light">
                    <div class="flex flex-col gap-10 w-full">

                        <div class="w-full HD:w-1/2">
                            <h1
                                class="text-lg HD:text-xl full-HD:text-3xl font-bold HD:uppercase mb-8 text-center HD:text-left">
                                Want to pay monthly?
                            </h1>

                            <p class="text-xs HD:text-base">
                                Keep your options open, spread your payments with clear, flexible finance that suits you.
                                Select
                                one of the options below to calculate your contract length, deposit and repayments.
                            </p>
                        </div>

                        <div id="v-financing-calculator">
                            <financing-calculator :car-price="{{ $vehicle->price }}"
                                :default-interest="{{ $defaultInterest }}" :default-period="{{ $defaultPeriodPayment }}">
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <x-layout.footer />
    @endsection
