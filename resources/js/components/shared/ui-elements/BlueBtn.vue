<template>
    <a :href="link">
        <button
            class="border border-primary blue-btn duration-200 w-full bg-primary h-[52px] rounded-[40px] tab-small:w-[205px] tab-small:h-[68px] 2K:w-[245px] 2K:h-[84px]"
        >
            <div
                class="duration-200 flex items-center justify-center text-xs font-bold leading-6 text-white content tab-small:text-x20 tab-small:leading-normal 2K:leading-9 2K:text-m"
            >
                <span>{{ title }}</span>
                <img
                    v-if="isWithArrow"
                    class="duration-200 rotate-180 w-[24px] ml-4 2K:w-[32px]"
                    src="/images/icons/c-carousel-arrow.svg"
                    alt="arrow"
                />
            </div>
        </button>
    </a>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'blue-btn',
    props: {
        link: {
            type: String,
            default: '/',
        },
        title: {
            type: String,
            default: 'Discover',
        },
        isWithArrow: {
            type: Boolean,
            default: true,
        }
    },
    data() {
        return {}
    },
})
</script>

<style scoped>
.blue-btn:hover {
    background-color: #fff;
    border: 1px solid #D1D5DB;
}
.blue-btn:hover div {
    color: #0158A8;
}
.blue-btn:hover img {
    filter: none;
}
.content img {
      filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(288deg)
            brightness(102%) contrast(102%);
}
</style>
