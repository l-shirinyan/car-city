<div
    class=" mob-428:h-[490px] tab-small:h-[672px] HD:h-[579px] full-HD:h-[699px] 2K:h-[1200px] relative h-[387px] w-full flex justify-start items-end pb-12 HD:pb-24 @if(isset($bgImage)) bg-black @else bg-bg-light @endif" >
    @if(isset($bgImage))
    <div class="absolute top-0 left-0 w-full h-full opacity-70">
        {{ $bgImage }}
    </div>
    @endif
    @if(isset($bgColor))
        <div class="bg-hero-section" style="background-color: {{ $bgColor }}"></div>
    @endif
    <div
        class="mob-428:pt-[73px] tab-small:pt-4 HD:items-center HD:flex-row-reverse HD:justify-between flex flex-col items-start pt-[46px] w-full">
        <div class=" self-end z-1 mob-428:w-[292px] tab-small:w-[309px] HD:w-[497px] full-HD:w-[653px] 2K:w-[973px] w-[228px]">
            {{ $slot }}
        </div>
        <div
            class="z-1 mob-360:px-6 mob-428:pt-[45px] tab-small:pt-4 tab-small:px-x60 HD:w-[467px] HD:px-0 HD:ml-x60 HD:pt-20 full-HD:ml-x140 full-HD:w-[549px] full-HD:pt-[153px] 2K:ml-section-lg 2K:w-[771px] 2K:pt-[319px] px-4 pt-[17px]">
            <div
                class="@if(isset($bgImage)) text-white @else text-black @endif leading-x42 mob-428:text-4xl mob-428:leading-[47px] tab-small:leading-footer-xs tab-small:text-7xl HD:text-hero-title HD:leading-[101px] full-HD:text-x85 full-HD:leading-footer-sm 2K:text-hero-lg 2K:leading-[145px] text-xl font-bold">
                {{ $title }}
            </div>
            @if (strlen($description))
                <div
                    class="@if(isset($bgImage)) text-white @else text-black @endif tab-small:text-m tab-small:leading-[31px] tab-small:pt-7 HD:pt-8 HD:text-x20 HD:leading-normal full-HD:text-m full-HD:leading-9 2K:pt-10 2K:text-xl 2K:leading-x48 pt-4 text-xs leading-6">
                    {{ $description }}
                </div>
            @endif
        </div>
    </div>
</div>
