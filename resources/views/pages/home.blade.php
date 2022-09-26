@extends('layout')

@section('content')
    <div class="pt-[80px]">

        @if (isset(Page::getMedia('hero_section_image')[0]))
            <x-shared.hero-section :title="Page::get('hero_section_title')" :description="Page::get('hero_section_description')" :bgColor="Page::get('hero_section_bg')">
                {{ Page::getMedia('hero_section_image')[0]('image')->attributes(['class' => 'w-full']) }}
            </x-shared.hero-section>
        @endif

        @if (count($brandsToSelect))
            <div id="v-filter-section">
                <c-filter-section :brands="{{ json_encode($brandsToSelect) }}" />
            </div>
        @endif

        <div class="relative p-0 py-12 tab-small:p-16 full-HD:px-32">
            <x-home.contacts />
            <x-home.brands-section :brands="$brandsToSelect" />
        </div>

        @if (isset(Page::getMedia('promoted_vehicule_image')[0]))
            <div id="v-promoted-section" class="main-top-padding">
                <x-shared.promoted-section :text="Page::get('promoted_vehicule_text')" :description="Page::get('promoted_vehicule_description')" :link="Page::get('promoted_vehicule_link')">
                    {{ Page::getMedia('promoted_vehicule_image')[0]('image')->attributes(['class' => 'w-full']) }}
                </x-shared.promoted-section>
            </div>
        @endif

        @if (isset(Page::getMedia('business_left_image')[0]) && isset(Page::getMedia('business_right_image')[0]))
                <x-shared.marketing-section carModelsAvailable="{{ $carModelsAvailable }}" yearsInBusiness="{{ $yearsInBusiness }}" :leftText="Page::get('business_left_text')"
                    :rightText="Page::get('business_right_text')" :learnMoreLink="PAge::get('business_learn_more_link')">
                    @slot('leftImage')
                        {{ Page::getMedia('business_left_image')[0]('image') }}
                    @endslot
                    @slot('rightImage')
                        {{ Page::getMedia('business_right_image')[0]('image') }}
                    @endslot
                </x-shared.marketing-section>
        @endif

        @if (Page::option('videos_carousel')->video_elements && count(Page::option('videos_carousel')->video_elements))
            <div id="v-video-carousel" class="container-center">
                <c-video-carousel :elements="{{ json_encode(Page::option('videos_carousel')->video_elements) }}" />
            </div>
        @endif

        @if (Page::option('testimonials')->testimonials && count(Page::option('testimonials')->testimonials))
            <div id="v-customers-carousel" class="container-center">
                <c-customers-carousel title="{{ Page::option('testimonials')->title }}"
                    :testimonials="{{ json_encode(Page::option('testimonials')->testimonials) }}" />
            </div>
        @endif

        @if (isset(Page::getMedia('img_text_image')[0]))
            <div class="container-center">
                <x-shared.img-text :text="Page::get('img_text_text')">
                    {{ Page::getMedia('img_text_image')[0]('image')->attributes(['class' => 'object-cover w-full']) }}
                </x-shared.img-text>
            </div>
        @endif

        @if (count($featuredCars))
            <div id="v-car-carousel" class="container-center">
                <c-car-carousel :cars="{{ $featuredCars }}">
            </div>
        @endif


        <x-shared.bottom-section />

    </div>
    <x-layout.footer />
@endsection
