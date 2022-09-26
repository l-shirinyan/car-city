<div class="section">
    <div class="w-full">
        <div class="relative flex justify-center">
            <div class="animated-block absolute w-full h-full z-10 bg-white"></div>
            {{ $slot }}
        </div>

        <h2
            class="
          text-center text-grey-900
          font-bold
          text-x20
          leading-normal
          px-4
          mob-360:px-6
          tab-small:text-xxl
          tab-small:leading-lg
          tab-small:px-x60
          tab-small:uppercase
          full-HD:px-[235px]
          full-HD:text-5xl
          full-HD:leading-title-md
          2K:mt-x120 2K:px-section-lg 2K:text-7xl 2K:leading-footer-xs
          bg-bg-light
          py-12
          HD:py-24
        ">
            {{ $text }}
        </h2>
    </div>
</div>
