@if(isset(Page::option('bottom_section')->getMedia('certified_service')[0]) && isset(Page::option('bottom_section')->getMedia('parts')[0]) && isset(Page::option('bottom_section')->getMedia('bodyshop')[0]))
<div class="container-center">
    <div
        class="
        bg-bg-light
        bottom-section
        px-4
        py-20
        flex flex-col
        gap-y-10
        mob-360:px-6
        tab-small:py-24 tab-small:px-x60 tab-small:gap-y-20
        HD:py-[120px]
        full-HD:px-x140
        full-HD:flex-row
        full-HD:justify-between
        full-HD:gap-y-0
        full-HD:gap-x-[123px]
        full-HD:py-40
        2K:px-section-lg 2K:gap-x-[198px]
        ">
        <div>
            <div class="overflow-hidden cursor-pointer">
                <div class="h-full w-full max-h-96 HD:max-h-max">
                    {{ Page::option('bottom_section')->getMedia('certified_service')[0]('image')->attributes(['class' => 'object-cover h-full w-full max-h-96 HD:max-h-max']) }}
                </div>
            </div>
            <div class="items-center justify-between tab-small:flex tab-small:pt-6 full-HD:pt-4 2K:pt-6">
                <h4
                    class="pt-4 font-bold leading-9 text-grey-900 text-m mob-360:leading-8 mob-428:leading-9 tab-small:text-lg tab-small:pt-0 full-HD:text-xl full-HD:leading-x42 2K:text-xxl 2K:leading-lg">
                    Certified Services
                </h4>
                <div
                    class="text-btn flex items-center pt-2 text-xs font-bold leading-6 cursor-pointer select-none text-grey-900 tab-small:text-m tab-small:leading-9 tab-small:pt-0 2K:text-xl 2K:leading-x42">
                    <span class="duration-200 border-b border-grey-900"> Schedule now </span>

                    <img class="duration-200 ml-4 w-[20px] tab-small:w-[24px] 2K:w-[32px]"
                        src="{{ asset('/images/icons/c-black-arrow.svg') }}" alt="black-arrow" />
                </div>
            </div>
        </div>
        <div
            class="
            flex flex-col
            gap-y-10
            tab-small:flex-row
            tab-small:justify-between
            tab-small:gap-y-0
            tab-small:gap-x-x30
            full-HD:gap-y-14 full-HD:flex-col
            2K:gap-y-[53.5px]
        ">
            <div>
                <div class="overflow-hidden cursor-pointer scale-box">
                    {{ Page::option('bottom_section')->getMedia('parts')[0]('image') }}
                </div>
                <div class="flex items-center justify-between pt-4 tab-small:pt-6 full-HD:pt-4 2K:pt-6">
                    <h4
                        class="font-bold leading-9 text-grey-900 text-m mob-360:leading-8 mob-428:leading-9 tab-small:text-lg full-HD:text-xl full-HD:leading-x42 2K:text-xxl 2K:leading-lg">
                        Parts
                    </h4>
                    <div
                        class="text-btn flex items-center text-xs font-bold leading-6 cursor-pointer select-none text-grey-900 tab-small:text-m tab-small:leading-9 2K:text-xl 2K:leading-x42">
                        <span class="duration-200 border-b border-grey-900"> View </span>
                        <img class="duration-200 ml-4 w-[20px] tab-small:w-[24px] 2K:w-[32px]"
                            src="{{ asset('/images/icons/c-black-arrow.svg') }}" alt="black-arrow" />
                    </div>
                </div>
            </div>
            <div>
                <div class="overflow-hidden cursor-pointer scale-box">
                    {{ Page::option('bottom_section')->getMedia('bodyshop')[0]('image') }}
                </div>
                <div class="flex items-center justify-between pt-4 tab-small:pt-6 full-HD:pt-4 2K:pt-6">
                    <h4
                        class="font-bold leading-9 text-grey-900 text-m mob-360:leading-8 mob-428:leading-9 tab-small:text-lg full-HD:text-xl full-HD:leading-x42 2K:text-xxl 2K:leading-lg">
                        Bodyshop
                    </h4>
                    <div
                        class="text-btn flex items-center text-xs font-bold leading-6 cursor-pointer select-none text-grey-900 tab-small:text-m tab-small:leading-9 2K:text-xl 2K:leading-x42">
                        <span class="duration-200 border-b border-grey-900"> View </span>
                        <img class="duration-200 ml-4 w-[20px] tab-small:w-[24px] 2K:w-[32px]"
                            src="{{ asset('/images/icons/c-black-arrow.svg') }}" alt="black-arrow" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


<style>
    .text-btn:hover span {
        color: #0158A8 !important;
        border-bottom: 1px solid #0158A8;
    }

    .text-btn:hover img {
        filter: invert(22%) sepia(97%) saturate(1670%) hue-rotate(193deg) brightness(89%) contrast(99%);
    }
</style>         
