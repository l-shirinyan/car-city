import { createApp } from 'vue'
import cHeader from '../components/global/Header/index.vue'
import cDropdownMenu from '../components/global/Header/DropdownMenu.vue'
import cFilterSection from '../components/shared/FilterSection.vue'
import cVideoCarousel from '../components/shared/carousels/VideoCarousel.vue'
import cCustomersCarousel from '../components/shared/carousels/CustomersCarousel.vue'
import cCarCarousel from '../components/shared/carousels/CarCarousel.vue'
import cSecondaryBtn from '../components/shared/ui-elements/SecondaryBtn.vue'
import blueBtn from '../components/shared/ui-elements/BlueBtn.vue'

if (document.querySelector('#v-header')) {
    createApp({
        components: {
            cHeader,
            cDropdownMenu,
        },
        data() {
            return {
                dropdown: false,
            }
        },
    }).mount('#v-header')
}

if (document.querySelector('#v-footer')) {
    createApp({
        components: {
            cSecondaryBtn,
        },
    }).mount('#v-footer')
}

if (document.querySelector('#v-filter-section')) {
    createApp({
        components: {
            cFilterSection,
        },
    }).mount('#v-filter-section')
}

if (document.querySelector('#v-promoted-section')) {
    createApp({
        components: {
            blueBtn,
        },
    }).mount('#v-promoted-section')
}

if (document.querySelector('#v-video-carousel')) {
    createApp({
        components: {
            cVideoCarousel,
        },
    }).mount('#v-video-carousel')
}

if (document.querySelector('#v-car-carousel')) {
    createApp({
        components: {
            cCarCarousel,
        },
    }).mount('#v-car-carousel')
}

if (document.querySelector('#v-customers-carousel')) {
    createApp({
        components: {
            cCustomersCarousel,
        },
    }).mount('#v-customers-carousel')
}
