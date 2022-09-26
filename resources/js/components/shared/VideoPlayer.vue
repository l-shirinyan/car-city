<template>
    <div>
        <div
        @click="togglePlay(i)"
            class="cursor-pointer relative video-box overflow-hidden"
            :class="
                fullWidth
                    ? 'w-full'
                    : 'w-[231px] mob-360:w-[228px] mob-428:w-[280px] tab-small:w-[653px] HD:w-[749px] full-HD:w-[995px] 2K:w-[1462px]'
            "
        >
            <c-secondary-btn
                class="absolute z-50 play-btn left-0 right-0 mx-auto my-auto top-0 bottom-0"
                v-if="!isPlaying"
            />
            <video class="w-full" loop ref="video">
                <source :src="src" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
            <div
                class="absolute inset-0 z-0 hidden bg-linear tab-small:block"
            ></div>
            <div
                v-if="title && subtitle"
                class="absolute hidden text-left z-1 bottom-8 left-8 tab-small:block 2K:bottom-10 2K:left-10"
            >
                <div
                    class="leading-9 text-white text-m 2K:text-xl 2K:leading-x48"
                >
                    {{ title }}
                </div>
                <div
                    class="mt-4 text-white font-bold text-4xl leading-[47px] full-HD:mt-0 full-HD:text-xxl full-HD:leading-lg 2K:mt-4 2K:text-6xl 2K:leading-[78px]"
                >
                    {{ subtitle }}
                </div>
            </div>
        </div>
        <div
            class="pt-4 text-left select-none tab-small:hidden"
            v-if="title && subtitle"
        >
            <h4 class="text-xs leading-6 text-gray/700">
                {{ title }}
            </h4>
            <p class="text-base font-bold text-grey-900 leadiing-7">
                {{ subtitle }}
            </p>
        </div>
    </div>
</template>

<script>
import cSecondaryBtn from '../shared/ui-elements/SecondaryBtn.vue'

export default {
    props: {
        src: { type: String },
        title: { type: String },
        subtitle: { type: String },
        fullWidth: { type: Boolean, default: false },
    },
    components: {
        cSecondaryBtn,
    },
    data() {
        return {
            isPlaying: null,
        }
    },
    methods: {
        togglePlay() {
            const refs = this.$refs
            const video = refs['video']

            if (video.paused == true) {
                video.play()
                this.isPlaying = true
            } else {
                video.pause()
                this.isPlaying = null
            }
        },
    },
}
</script>
