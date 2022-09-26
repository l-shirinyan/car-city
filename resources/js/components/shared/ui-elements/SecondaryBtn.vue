<template>
    <a
        :href="arrow ? '/contact' : ''"
        id="footer-btn"
        class="z-max cursor-pointer h-[50px] w-[50px] tab-small:w-[80px] tab-small:h-[80px] rounded-[50%] bg-secondary 2K:h-[112px] 2K:w-[112px] flex justify-center items-center"
    >
        <span
            v-if="!arrow"
            class="text-xs font-bold leading-6 text-white tab-small:text-m tab-small:leading-9 2K:text-xl 2K:leading-x42"
            >Play</span
        >
        <img
            v-else
            class="rotate-180 w-[20px] tab-small:w-[24px] 2K:w-[32px]"
            src="/images/icons/c-carousel-arrow.svg"
            alt="arrow"
        />
    </a>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'c-secondary-btn',
    props: {
        arrow: {
            type: Boolean,
        },
    },
    data() {
        return {}
    },
})
</script>

<style scoped>
img {
    filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(288deg)
        brightness(102%) contrast(102%);
}
</style>
