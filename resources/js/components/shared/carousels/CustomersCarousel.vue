<template>
    <div
        class="
            px-4
            carousel-section
            mob-360:px-6
            tab-small:px-x60
            full-HD:px-x140
            2K:px-section-lg
        "
    >
        <div class="items-center justify-between HD:flex">
            <h2
                class="
                    text-lg
                    font-bold
                    leading-9
                    uppercase
                    carousel-title
                    text-grey-900
                    tab-small:leading-lg tab-small:text-xxl
                    full-HD:leading-title-md full-HD:text-5xl
                    2K:text-7xl 2K:leading-footer-xs
                "
            >
                {{ title }}
            </h2>
            <div
                class="
                    text-btn
                    mt-4
                    mb-10
                    text-xs
                    font-bold
                    leading-6
                    cursor-pointer
                    select-none
                    text-grey-900
                    tab-small:hidden
                    HD:block HD:my-0 HD:leading-9 HD:text-m
                    2K:leading-x42 2K:text-xl
                "
            >
                <span class="duration-200 border-b border-grey-900"
                    >Write a review</span
                >
            </div>
        </div>
        <div
            class="
                items-center
                justify-between
                hidden
                tab-small:flex tab-small:mt-6 tab-small:mb-8
                full-HD:mb-10
                2K:mb-14 2K:mt-10
            "
        >
            <div class="flex gap-4 carousel-arrows">
                <div
                    class="
                        select-none
                        flex
                        justify-center
                        items-center
                        cursor-pointer
                        rounded-[50%]
                        border border-border-color
                        w-[60px]
                        h-[60px]
                        duration-[0.3s]
                        btn-hover
                        hover:bg-primary
                        2K:h-[84px] 2K:w-[84px]
                    "
                    @click="changeCarouselActiveIndex('prev')"
                >
                    <img
                        class="w-[24px] 2K:w-[32px]"
                        src="/images/icons/c-carousel-arrow.svg"
                        alt="carousel-arrow"
                    />
                </div>
                <div
                    class="
                        select-none
                        flex
                        justify-center
                        items-center
                        cursor-pointer
                        rounded-[50%]
                        border border-border-color
                        w-[60px]
                        h-[60px]
                        duration-[0.3s]
                        btn-hover
                        hover:bg-primary
                        2K:h-[84px] 2K:w-[84px]
                    "
                    @click="changeCarouselActiveIndex('next')"
                >
                    <img
                        class="rotate-180 w-[24px] 2K:w-[32px]"
                        src="/images/icons/c-carousel-arrow.svg"
                        alt="carousel-arrow"
                    />
                </div>
            </div>
            <div
                class="
                    text-btn
                    font-bold
                    leading-9
                    cursor-pointer
                    select-none
                    text-grey-900 text-m
                    HD:hidden
                "
            >
                <span class="duration-200 border-b border-grey-900"
                    >Write a review</span
                >
            </div>
        </div>
        <Carousel
            snapAlign="start"
            ref="cardCarousel"
            :items-to-show="1"
            class="tab-small:ml-section full-HD:ml-[466px] 2K:ml-[830px]"
        >
            <Slide v-for="(item, i) in testimonialsComputed" :key="`item_${i}`">
                <div class="pointer-events-none select-none slider-item">
                    <div class="flex items-center gap-x10 2K:gap-6">
                        <div class="flex gap-1 2K:gap-3">
                            <img
                                v-for="star in item.numberOfStars"
                                :key="`star_${star}`"
                                class="w-[20px] 2K:w-[24px]"
                                src="/images/icons/c-star.svg"
                                alt="star"
                            />
                        </div>
                        <p
                            class="
                                text-light-black text-xxs
                                leading-m
                                tab-small:text-grey-900
                                tab-small:leading-6
                                tab-small:text-xs
                                2K:leading-9 2K:text-m
                            "
                        >
                            {{ item.date }}
                        </p>
                    </div>
                    <p
                        class="
                            pr-4
                            mt-6
                            text-base text-left text-grey-900
                            leading-m
                            tab-small:mt-10 tab-small:leading-9 tab-small:text-m
                            full-HD:mt-8 full-HD:text-lg full-HD:leading-x42
                            2K:mt-11 2K:text-3xl 2K:leading-x54
                        "
                    >
                        {{ item.text }}
                    </p>
                    <p
                        class="
                            mt-4
                            text-xs
                            leading-6
                            text-left text-grey-900
                            opacity-60
                            tab-small:text-x20
                            tab-small:leading-normal
                            tab-small:mt-6
                            full-HD:text-m full-HD:leading-9
                            2K:mt-8 2K:text-xl 2K:leading-x48
                        "
                    >
                        {{ item.name }}
                    </p>
                </div>
            </Slide>
            <template #addons>
                <div
                    class="
                        flex
                        items-center
                        justify-between
                        mt-li
                        tab-small:hidden
                    "
                >
                    <pagination />
                </div>
            </template>
        </Carousel>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

export default defineComponent({
    name: 'c-customers-carousel',
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    props: {
        testimonials: {
            type: Array,
        },
        title: {
            type: String,
        },
    },

    methods: {
        changeCarouselActiveIndex(val: string) {
            const cardCarousel: any = this.$refs.cardCarousel
            if (val === 'prev') {
                cardCarousel.prev()
            } else if (val === 'next') {
                cardCarousel.next()
            }
        },
    },
    computed: {
        testimonialsComputed() {
            return this.testimonials && this.testimonials.length
                ? this.testimonials.map(function ({ attributes }: any) {
                      return {
                          numberOfStars: parseInt(attributes.rate),
                          date: attributes.posted_date,
                          text: attributes.content,
                          name: attributes.name,
                      }
                  })
                : []
        },
    },
})
</script>
<style scoped>
.text-btn:hover span {
    color: #0158a8;
    border-bottom: 1px solid #0158a8;
}

.carousel__pagination {
    justify-content: start;
    gap: 8px;
}

.carousel__pagination ::v-deep(.carousel__pagination-button) {
    margin: 0 !important;
    background-color: #d1d5db !important;
    height: 6px;
    width: 24px;
}

.carousel__pagination ::v-deep(.carousel__pagination-button--active) {
    background-color: #0c0b10 !important;
    width: 40px;
}

.carousel__slide {
    justify-content: start;
}

.btn-hover:hover img {
    filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(288deg)
        brightness(102%) contrast(102%);
}

@media (min-width: 834px) {
    .carousel__pagination ::v-deep(.carousel__pagination-button) {
        height: 8px;
    }

    .carousel__pagination ::v-deep(.carousel__pagination-button--active) {
        background-color: #0c0b10 !important;
        width: 63px;
    }

    .carousel__pagination {
        gap: 32px;
    }
}
</style>
