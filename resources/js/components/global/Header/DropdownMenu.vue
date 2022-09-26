<template>
    <div class="dropdown-menu">
        <div class="w-2/5">
            <div class="mb-6 font-bold leading-10 title HD:text-lg 2K:mb-8">
                BRANDS
            </div>
            <ul>
                <li
                    v-for="brand in brands"
                    :key="brand.label"
                    class="brand-label"
                >
                    <a :href="`/${brand.slug}/showroom`">
                        {{ brand.name }}
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div
                class="mb-4 text-xl font-bold leading-10 title HD:text-lg 2K:text-lg 2K:mb-8"
            >
                FEATURED
            </div>
            <div class="flex gap-7 2K:gap-x60">
                <car-card
                    v-for="(car, i) in cars"
                    :car="car"
                    :key="`car_${i}`"
                    class="2K:block"
                    :class="{ 'HD:hidden': i === 2 }"
                />
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import CarCard from './CarCard.vue'

export default defineComponent({
    name: 'dropdown-menu',
    components: {
        CarCard,
    },
    props: {
        brands: Array,
        cars: Array,
    },
})
</script>
