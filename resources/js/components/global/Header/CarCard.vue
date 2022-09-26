<template>
    <a
        class="car-card duration-[0.3s] hover:shadow-cardShadow select-none flex flex-col"
        :href="car.car_url"
    >
        <div class="pt-4 pb-7 2K:pt-10 2K:pb-11 bg-bg">
            <div
                class="ml-4 py-1 text-xs leading-6 text-white bg-secondary px-x10 max-w-content 2K:py-2 2K:px-6 2K:leading-normal 2K:text-x20 2K:ml-6"
            >
                {{ car.status }}
            </div>
            <div class="w-full flex justify-center">
                <img
                    class="w-[230px] h-[108px] mt-x10 pointer-events-none tab-small:h-[138px] tab-small:mt-[21px] tab-small:w-[291px] 2K:h-[184px] 2K:w-[403px] 2K:mt-[27px]"
                    :srcset="car.picture"
                />
            </div>
        </div>

        <div class="p-4 bg-white 2K:p-6">
            <div
                class="mb-2 font-bold leading-normal text-left text-x20 text-grey-900 tab-small:text-base tab-small:leading-7 2K:text-lg 2K:leading-9"
            >
                {{ car.name }}
            </div>
            <div
                class="text-xs leading-6 text-left text-gray/600 2K:text-x20 2K:leading-normal"
            >
                {{ car.info }}
            </div>
            <div
                v-if="car.moreInfo"
                class="flex items center gap-2 pt-4 tab-small:gap-3 2K:gap-4"
            >
                <div
                    v-for="(item, i) in car.moreInfo"
                    :key="`info_${i}`"
                    class="py-1 px-2 bg-light-primary text-xxs leading-5 text-primary 2K:text-base 2K:lading-m"
                >
                    {{ item }}
                </div>
            </div>
            <div class="mt-6 flex items-center justify-between">
                <span
                    class="font-bold leading-normal text-primary text-x20 tab-small:text-m tab-small:leading-9 2K:text-xl 2K:leading-x42"
                >
                    ${{ car.price }}
                </span>
                <div class="flex items-center" v-if="car.price_per_month">
                    <span
                        class="font-bold HD:text-x20 HD:leading-normal full-HD:text-m full-HD:leading-9 2K:text-xl 2K:leading-10"
                        >${{ car.price_per_month }}
                    </span>
                    <span
                        class="ml-1 leading-5 text-grey-500 text-xxs full-HD:text-xs full-HD:leading-6 2K:text-x20 2K:leading-normal"
                    >
                        / month
                    </span>
                </div>
            </div>
        </div>
    </a>
</template>

<script lang="ts">
export default {
    name: 'car-card',
    props: {
        car: { type: Object },
        isCarouselItem: {
            type: Boolean,
            default: false,
        },
    },
}
</script>
