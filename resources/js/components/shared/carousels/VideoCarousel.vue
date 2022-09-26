<template>
    <div
        class="
            pl-4
            mob-360:pl-6
            tab-small:pl-x60
            full-HD:pl-x140
            2K:pl-section-lg
        "
    >
        <Carousel
            snapAlign="start"
            ref="videoCarousel"
            :breakpoints="carouselBreakpoints"
        >
            <Slide v-for="(item, i) in elementsComputed" :key="`car_${i}`">
                <video-player
                    v-if="item"
                    :src="`/storage/${item.video}`"
                    :title="item.title"
                    :subtitle="item.subtitle"
                />
            </Slide>
            <template #addons>
                <div class="mt-li tab-small:mt-normal 2K:mt-20">
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
import videoPlayer from '../VideoPlayer.vue'

interface DataObject {
    carouselBreakpoints: Object
}

export default defineComponent({
    name: 'c-video-carousel',
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
        videoPlayer,
    },
    props: {
        elements: {
            type: Array,
        },
    },

    data(): DataObject {
        return {
            carouselBreakpoints: {
                0: {
                    itemsToShow: 1.23,
                },
                360: {
                    itemsToShow: 1.38,
                },
                428: {
                    itemsToShow: 1.37,
                },
                834: {
                    itemsToShow: 1.14,
                },
                1024: {
                    itemsToShow: 1.25,
                },
                1368: {
                    itemsToShow: 1.206,
                },
                2560: {
                    itemsToShow: 1.38,
                },
            },
        }
    },
    mounted() {
        this.$watch(
            () => {
              const carousel = (this.$refs.videoCarousel as any)
              return carousel.data.currentSlide.value
            },
            (val) => {
                const carousel = (this.$refs.videoCarousel as any)
                carousel.data.currentSlide.value =
                    Math.ceil(val)
            }
        )
    },
    computed: {
        elementsComputed() {
            if (this.elements?.length) {
                return this.elements.map(function (e: any) {
                    return { ...e.attributes }
                })
            }

            return []
        },
    },
})
</script>
<style scoped>
.play-btn {
    top: calc(50% - 25px);
    left: calc(50% - 25px);
    opacity: 0;
    transition-duration: 0.9s;
}
.video-box:hover img {
    transform: scale(1.25);
}
.video-box:hover .play-btn {
    opacity: 1;
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
    .play-btn {
        top: calc(50% - 40px);
        left: calc(50% - 40px);
    }
    .carousel__pagination ::v-deep(.carousel__pagination-button) {
        height: 8px;
    }
    .carousel__pagination ::v-deep(.carousel__pagination-button--active) {
        width: 63px;
    }
    .carousel__pagination {
        gap: 32px;
    }
}
@media (min-width: 2560px) {
    .play-btn {
        top: calc(50% - 56px);
        left: calc(50% - 56px);
    }
    .carousel__pagination ::v-deep(.carousel__pagination-button) {
        height: 14px;
        width: 40px;
    }
    .carousel__pagination ::v-deep(.carousel__pagination-button--active) {
        width: 100px;
    }
}
</style>
