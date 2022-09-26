<div class="container-center flex flex-col tab-small:flex-row justify-between gap-14">

    <div
        class="
        flex flex-col
        gap-y-8
        tab-small:gap-y-24 tab-small:w-[317px]
        HD:w-[412px] HD:gap-y-x120
        full-HD:w-[529px] full-HD:gap-y-40
        2K:w-[771px] 2K:gap-y-44
      ">
        <h2
            class="
                text-grey-900
                font-bold
                text-m
                leading-9
                tab-small:text-xl tab-small:leading-x42
                full-HD:text-xxl full-HD:leading-lg
                2K:leading-[78px] 2K:text-6xl
                ">
            {{ $leftText }}
        </h2>
        <picture class="relative">
            <div class="flex justify-end">
                <div class="animated-block absolute duration-[0.8s] direct w-full h-full z-4 bg-white"></div>
            </div>

            {{ $leftImage }}

            @if (!!$carModelsAvailable)
                <div
                    class="animated-small-box absolute py-2 bg-white bottom-3 left-3 px-x10 tab-small:bottom-6 tab-small:left-6 tab-small:px-4 2K:left-10 2K:bottom-10 2K:py-x10 2K:px-8">
                    <div
                        class="font-bold leading-normal text-grey-900 text-x20 tab-small:text-m tab-small:leading-x42 2K:text-xxl 2K:leading-lg">
                        {{ $carModelsAvailable }}+
                    </div>
                    <div
                        class="
          text-grey-900
          pt-[2px]
          text-xxs
          leading-5
          w-[111px]
          mob-428:w-[149px]
          tab-small:w-[134px]
          tab-small:pt-2
          tab-small:text-xs
          tab-small:leading-6
          2K:pt-3 2K:text-m 2K:leading-9 2K:w-[140px]
        ">
                        Cars models
                    </div>
                </div>
            @endif
        </picture>
    </div>
    <div
        class="
        flex flex-col
        gap-y-8
        tab-small:flex-col-reverse tab-small:gap-y-12 tab-small:w-[317px]
        HD:w-[412px]
        full-HD:w-[529px] full-HD:gap-y-x120
        2K:w-[768px] 2K:gap-y-32
      ">

        <div class="HD:w-[359px] full-HD:w-[434px] 2K:w-[640px]">
            @if (strlen($rightText))
                <p
                    class="text-xs leading-6 text-gray/700 tab-small:text-m tab-small:leading-9 2K:text-xl 2K:leading-x48 2K:text-grey-900">
                    {{ $rightText }}
                </p>
            @endif
            @if (strlen($learnMoreLink))
                <a href="{{ $learnMoreLink }}"
                    class="text-btn flex pt-10 text-xs font-bold leading-6 cursor-pointer select-none text-grey-900 tab-small:text-m tab-small:leading-9 full-HD:pt-20 2K:leading-x42 2K:text-xl">
                    <span class="border-b duration-200 border-grey-900">Learn more</span>
                    <img class="ml-4 w-[20px] duration-200 tab-small:w-[24px] 2K:w-[32px]"
                        src="{{ asset('/images/icons/c-black-arrow.svg') }}" alt="black-arrow" />
                </a>
            @endif
        </div>

        @if (strlen($rightImage))
            <picture class="relative">
                <div class="animated-block absolute w-full h-full z-4 bg-white"></div>

                {{ $rightImage }}


                @if (!!$yearsInBusiness)
                    <div
                        class="animated-small-box  absolute py-2 bg-white bottom-3 right-3 px-x10 tab-small:bottom-6 tab-small:right-6 tab-small:px-4 2K:right-10 2K:bottom-10 2K:py-x10 2K:px-8">
                        <div
                            class="font-bold leading-normal text-grey-900 text-x20 tab-small:text-m tab-small:leading-x42 2K:text-xxl 2K:leading-lg">
                            {{ $yearsInBusiness }}+
                        </div>
                        <p
                            class="
            text-grey-900
            pt-[2px]
            text-xxs
            leading-5
            mob-428:w-[149px]
            tab-small:w-[134px]
            tab-small:pt-2
            tab-small:text-xs
            tab-small:leading-6
            2K:pt-3 2K:text-m 2K:leading-9 2K:w-[190px]
            ">
                            Years in business
                        </p>
                    </div>
                @endif
            </picture>
        @endif
    </div>
</div>

<style>
    .text-btn:hover span {
        color: #0158A8 !important;
        border-bottom: 1px solid #0158A8;
    }

    .text-btn:hover img {
        filter: invert(22%) sepia(97%) saturate(1670%) hue-rotate(193deg) brightness(89%) contrast(99%);
    }
</style>
