<div class="promoted-section">
    <div
        class="
        justify-between
        flex-col flex
        tab-small:flex-col-reverse
        HD:flex-row-reverse
      ">
        <div class="relative tab-small:ml-[63px] about-img-box HD:ml-24 HD:w-[55%]">
            <div class="animated-block absolute w-full h-full z-4 bg-white"></div>
            {{ $slot }}
        </div>
        <div
            class="
                      px-4
                      mob-360:px-6
                      tab-small:pr-[366px] tab-small:pl-[63px] tab-small:mb-12
                      HD:w-[45%]
                      HD:p-0 HD:ml-x60 HD:mb-0
                      full-HD:ml-x140
                      2K:ml-section-lg
                    ">
            <h3
                class="
                        info-title
                        font-bold
                        text-grey-900
                        mt-li
                        text-m
                        leading-9
                        tab-small:leading-x48 tab-small:text-3xl tab-small:mt-0
                        full-HD:text-xxl full-HD:leading-lg
                        2K:text-6xl 2K:leading-[78px]
                      ">
                {{ $text }}
            </h3>
            <p
                class="mt-4 mb-12 text-xs leading-6 text-gray/700 tab-small:mt-6 tab-small:leading-m tab-small:text-base tab-small:font-medium full-HD:text-x20 full-HD:leading-normal full-HD:mb-10 2K:mt-8 2K:mb-14 2K:text-lg 2K:leading-x42">
                {{ $description }}
            </p>
            <blue-btn link="{{$link}}"/>
        </div>
    </div>
</div>
</div>

<style scoped>
.about-img-box {

}
</style>
