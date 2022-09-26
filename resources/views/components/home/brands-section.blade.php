<div class="brands-section w-full flex flex-col">
    <div class="px-6 tab-small:mx-0">
        <h3
            class="text-lg font-bold leading-9 text-center uppercase brands-title text-grey-900 tab-small:text-xxl tab-small:leading-lg full-HD:text-5xl full-HD:leading-title-md 2K:text-7xl 2K:leading-footer-xs">
            Our brands
        </h3>
        <p
            class="mt-4 text-xs leading-6 text-center text-grey-900 tab-small:text-x20 tab-small:leading-normal tab-small:mt-x10 full-HD:leading-9 full-HD:text-m 2K:leading-x48 2K:text-xl 2K:mt-4">
            Select a brand to start exploring vehicles
        </p>
    </div>
    <div
        class="mt-10 brands-container grid grid-cols-2 tab-small:grid-cols-2 HD:grid-cols-3 full-HD:grid-cols-4 w-full gap-xs tab-small:gap-[6px]  HD:gap-1 2K:mt-14">

        @foreach ($brands as $brand)
            <a class="cursor-pointer bg-bg-light flex items-center justify-center select-none h-[120px] relative HD:justify-start HD:h-[160px] overflow-hidden"
                href="{{ route('brands', ['brand' => $brand]) }}">
                {{ $brand->getFirstMedia('brand_logo')('brand-media')->attributes(['class' => 'w-[102px] HD:ml-6 2K:ml-8 2K:w-[140px]']) }}

                {{ $brand->getFirstMedia('brand_vehicle_icon')('brand-media')->attributes([
                        'class' =>
                            'hidden absolute right-[-20px] w-[auto] h-[88px] HD:block 2K:w-[auto] 2K:h-[132] hover:right-[-5px] duration-[0.45s]',
                    ]) }}
            </a>
        @endforeach

        {{-- <a class="cursor-pointer bg-bg-light flex items-center justify-center select-none h-[120px] relative HD:justify-start HD:h-[160px] full-HD:h-[200px] overflow-hidden"
                href="---">
                mercedes hardcoded
            </a> --}}

    </div>
</div>
