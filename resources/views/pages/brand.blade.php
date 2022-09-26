@extends('layout')

@section('seo')
    <x-shared.seo-tags title="{{ $brand->name }} | Carcity"
        description="Car City have the widest range of {{ $brand->name }} to suit any budget" :keywords="$brand->name" />
@endsection

@section('content')
    <div class="pt-[80px]">

        @if ($brand->hero_title)
            <x-shared.hero-section :title="$brand->hero_title" :description="$brand->hero_description" :bgColor="$brand->color">
                {{ $brand->getFirstMedia('brand_hero_img')('brand-media')->attributes(['class' => 'w-full']) }}
            </x-shared.hero-section>
        @endif

        <div id="v-filter-section">
            <c-filter-section :brands="{{ $brandsToSelect }}" />
        </div>

        @if (strlen($brand->promoted_title))
            <div id="v-promoted-section" class="main-top-padding">
                <x-shared.promoted-section text="{{ $brand->promoted_title }}"
                    description="{{ $brand->promoted_description }}" link="{{ $brand->promoted_link }}">
                    {{ $brand->getMedia('brand_promoted_img')[0]('brand-media') }}
                </x-shared.promoted-section>
            </div>
        @endif

        @if (isset($brand->getMedia('brand_marketing_right_img')[0]) &&
            isset($brand->getMedia('brand_marketing_left_img')[0]))
            <x-shared.marketing-section carModelsAvailable="{{$carModelsAvailable}}" yearsInBusiness="{{$yearsInBusiness}}"
                leftText="{{ $brand->marketing_title }}" rightText="{{ $brand->marketing_description }}" learnMoreLink="/">
                @slot('leftImage')
                    {{ $brand->getMedia('brand_marketing_left_img')[0]('brand-media') }}
                @endslot
                @slot('rightImage')
                    {{ $brand->getMedia('brand_marketing_right_img')[0]('brand-media') }}
                @endslot
            </x-shared.marketing-section>
        @endif
        @if (Page::option('videos_carousel')->video_elements && count(Page::option('videos_carousel')->video_elements))
            <div id="v-video-carousel" class="pt-20 tab-small:pt-24 HD:pt-x120 full-HD:pt-44 2K:pt-64">
                <c-video-carousel :elements="{{ json_encode(Page::option('videos_carousel')->video_elements) }}" />
            </div>
        @endif
        @if (Page::option('testimonials')->testimonials && count(Page::option('testimonials')->testimonials))
            <div id="v-customers-carousel" class="tab-small:pt-32 HD:pt-[160px] full-HD:pt-48 2K:pt-64 pt-20">
                <c-customers-carousel title="{{ Page::option('testimonials')->title }}"
                    :testimonials="{{ json_encode(Page::option('testimonials')->testimonials) }}" />
            </div>
        @endif

        @if (isset($brand->getMedia('img_text_image')[0]))
            <div class="pt-20 tab-small:pt-16 HD:pt-20 2K:pt-64">
                <x-shared.img-text :text="Page::get('img_text_text')">
                    {{ Page::getMedia('img_text_image')[0]('image')->attributes(['class' => 'object-cover w-full']) }}
                </x-shared.img-text>
            </div>
        @endif

        @if (count($featured))
            <div id="v-car-carousel" class="container-center w-full">
                <c-car-carousel :cars="{{ $featured }}">
            </div>
        @endif

            <x-shared.bottom-section />

    </div>
    <x-layout.footer />
@endsection
