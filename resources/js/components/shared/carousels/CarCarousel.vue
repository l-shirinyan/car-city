<template>
    <div class="w-full">
        <h3
            class="
                pr-4
                mb-6
                text-lg
                font-bold
                leading-9
                text-center
                uppercase
                carousel-title
                text-grey-900
                tab-small:text-left
                tab-small:leading-lg
                tab-small:text-xxl
                tab-small:mb-10
                full-HD:leading-title-md full-HD:text-5xl
                2K:text-7xl 2K:leading-footer-xs 2K:mb-14
            "
        >
            New and featured cars
        </h3>
        <Carousel
            :breakpoints="breakpoints"
            snapAlign="start"
            ref="cardCarousel"
            :items-to-show="2.5"
        >
            <Slide v-for="(car, i) in cars" :key="`car_${i}`">
                <car-card :car="car" />
            </Slide>

            <template #addons>
                <div
                    class="
                        flex
                        items-center
                        justify-between
                        mt-5
                        tab-small:mt-7
                        full-HD:hidden
                    "
                >
                    <pagination />
                    <div
                        class="
                            text-btn
                            flex
                            items-center
                            pr-4
                            cursor-pointer
                            select-none
                            mob-360:pr-6
                            tab-small:pr-x60
                        "
                    >
                        <div
                            class="
                                duration-200
                                text-sm
                                font-bold
                                leading-6
                                border-b border-grey-900
                                tab-small:leading-9 tab-small:text-m
                            "
                        >
                            View all
                        </div>
                        <img
                            class="
                                duration-200
                                ml-4
                                w-[20px]
                                tab-small:w-[24px]
                            "
                            src="/images/icons/c-black-arrow.svg"
                            alt="black-arrow"
                        />
                    </div>
                </div>
            </template>
        </Carousel>
        <div
            class="
                items-center
                justify-between
                hidden
                full-HD:flex full-HD:mt-7
                2K:mt-10
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
                    flex
                    items-center
                    cursor-pointer
                    pr-x140
                    2K:pr-section-lg
                "
            >
                <div
                    class="
                        duration-200
                        font-bold
                        leading-9
                        border-b border-grey-900
                        text-m
                        2K:leading-x42 2K:text-xl
                    "
                >
                    View all
                </div>
                <img
                    class="duration-200 ml-4 w-[24px] 2K:w-[32px]"
                    src="/images/icons/c-black-arrow.svg"
                    alt="black-arrow"
                />
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import CarCard from '../../global/Header/CarCard.vue'

export default defineComponent({
    name: 'c-carousel',
    components: {
        CarCard,
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    props: {
        cars: { type: Array },
    },
    data() {
        return {
            breakpoints: {
                0: {
                    itemsToShow: 1,
                },
                834: {
                    itemsToShow: 2,
                },
                1368: {
                    itemsToShow: 2.5,
                },
                1500: {
                    itemsToShow: 3.5,
                },
            },
        }
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
})
</script>
<style scoped>
.text-btn:hover div {
    color: #0158a8;
    border-bottom: 1px solid #0158a8;
}
.text-btn:hover img {
    filter: invert(22%) sepia(97%) saturate(1670%) hue-rotate(193deg)
        brightness(89%) contrast(99%);
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
    padding: 10px 18px 10px 2px;
    margin-bottom: 20px;
}

.carousel__prev,
.carousel__next {
    border: 5px solid white;
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
    .carousel__slide {
        justify-content: start;
        margin-left: 20px;
    }
}
@media (min-width: 360px) {
    .carousel__slide {
        padding: 10px 24px 10px 0;
    }
}
</style>
