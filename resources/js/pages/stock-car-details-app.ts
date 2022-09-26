import { createApp } from 'vue'

import VehicleImage360 from "../../js/components/shared/carousels/Image360.vue"
import VehicleImagesCarousel from "../../js/components/shared/carousels/ImagesCarousel.vue"

if (document.querySelector('#v-stock-car-details')) {
    createApp({
        components:{
            VehicleImagesCarousel,
            VehicleImage360
                },
        data() {
            return {
                navigatorCanShare: null,
                galleryOpened: false,
                threeSixtyOpened: false,
            }
        },
        methods: {
            shareMe(vehicle) {
                if (this.navigatorCanShare) {
                    navigator.share({
                        title: `Carcity`,
                        text: `${vehicle.name}`,
                        url: `${vehicle.card.car_url}`,
                    })
                } else {
                    window.location.href = `mailto:friend?subject=Carcity&body=${vehicle.name},${vehicle.card.car_url}`
                }
            },
        },
        mounted() {
            this.navigatorCanShare = navigator.canShare
        },
    }).mount('#v-stock-car-details')
}
