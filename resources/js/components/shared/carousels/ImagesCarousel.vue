<template>
    <div class="fixed top-0 left-0 h-full w-full z-max">
        <div class="flex flex-col justify-between">
            <div class="backdrop-blur-lg bg-blure-bg absolute top-0 left-0 h-full w-full -z-1"></div>

            <div class="h-12 text-white w-full flex flex-row items-center justify-between p-8">

                <span :class="{'invisible':images.length<2}">{{currentSlide+1}}/{{images.length}}</span>

                <img @click="$emit('close')" class="cursor-pointer" src="/storage/images/icons/close-carousel.svg"
                    width="25" alt="close carousel">
            </div>

            <div class="h-full flex justify-center items-center">
                <div class="flex flex-col gap-8 HD:m-10 items-center justify-center">
                    <div class="flex flex-row items-center justify-around gap-8 ">
                        <div class="hidden HD:flex select-none justify-center items-center cursor-pointer rounded-full w-40"
                            @click="this.$refs.mainCarousel.prev()">
                            <img src="/storage/images/icons/vehicle-carousel-left.svg" alt="carousel-arrow" />
                        </div>


                        <div class="bg-white py-4 HD:py-10 flex items-center">
                            <Carousel snapAlign="center-odd" ref="mainCarousel" v-model="currentSlide">
                                <Slide v-for="(image, i) in images" :key="`car_${i}`">
                                    <div class="w-full flex justify-center items-center">
                                        <img :srcset="image" class="w-2/3 HD:w-[700px]" />
                                    </div>
                                </Slide>
                            </Carousel>
                        </div>


                        <div class="hidden HD:flex select-none justify-center items-center cursor-pointer rounded-full w-40"
                            @click="this.$refs.mainCarousel.next()">
                            <img src="/storage/images/icons/vehicle-carousel-right.svg" alt="carousel-arrow" />
                        </div>
                    </div>

                    <div v-if="images.length>1" class="flex items-center justify-center gap-3">
                        <Carousel snapAlign="center" ref="subGallery" :items-to-show="5.5">
                            <Slide v-for="(image, i) in images" :key="`car_${i}`" items>
                                <div class="w-full flex justify-center items-center cursor-pointer group px-2"
                                    @click="currentSlide=i">
                                    <img :srcset="image" class="group-hover:scale-105 duration-200" />
                                </div>
                            </Slide>
                        </Carousel>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

export default defineComponent({
    name: 'c-carousel',
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    props: {
        images: { type: Array },
    },
    data() {
        return {
            currentSlide: 0
        }
    },
})
</script>
<style scoped>
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
    padding: 0px !important;
}

.carousel__prev,
.carousel__next {
    border: 5px solid white;
}

.btn-hover:hover img {
    filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(288deg) brightness(102%) contrast(102%);
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
    }
}

@media (min-width: 360px) {
    .carousel__slide {
        padding: 10px 24px 10px 0;
    }
}
</style>
