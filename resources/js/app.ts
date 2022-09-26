import { createApp } from 'vue'

import './bootstrap'
import './pages/home-app'
import './pages/positions-app'
import './pages/stock-car-details-app'
import './pages/inventory-app'
import animate from './utils/animation'
import videoPlayer from './components/shared/VideoPlayer.vue'
import financingCalculator from './components/shared/FinancingCalculator.vue'
import accordionSpecs from './components/shared/AccordionSpecs.vue'
import carCard from './components/global/Header/CarCard.vue'
import formBookTestDrive from './components/forms/BookTestDrive.vue'
import formInquery from './components/forms/Inquery.vue'
import formValueMyCar from './components/forms/ValueMyCar.vue'

if (document.querySelector('#v-financing-calculator')) {
    createApp({
        components: {
            financingCalculator,
        },
    }).mount('#v-financing-calculator')
}


if (document.querySelector('#v-form-book-test-drive')) {
    createApp({
        components: {
            formBookTestDrive
        },
    }).mount('#v-form-book-test-drive')
}

if (document.querySelector('#v-form-inquery')) {
    createApp({
        components: {
            formInquery
        },
    }).mount('#v-form-inquery')
}

if (document.querySelector('#v-form-value-my-car')) {
    createApp({
        components: {
            formValueMyCar
        },
    }).mount('#v-form-value-my-car')
}

if (document.querySelector('#v-car-card')) {
    createApp({
        components: {
            carCard,
        },
    }).mount('#v-car-card')
}

if (document.querySelector('#v-video-player')) {
    createApp({
        components: {
            videoPlayer,
        },
    }).mount('#v-video-player')
}

if (document.querySelector('#v-accordion-specs')) {
    createApp({
        components: {
            accordionSpecs,
        },
    }).mount('#v-accordion-specs')
}

let animatedElements: Element[] = []

function handleScroll() {
    // Shrink Animation for blocks
    const animatedBlocks = document.querySelectorAll('.animated-block')

    animatedBlocks.forEach((block: Element) => {
        if (
            !animatedElements.includes(block) &&
            window.pageYOffset - 800 >= block.getBoundingClientRect().top
        ) {
            animate('shrink', block)
            animatedElements.push(block)
        }
    })

    // Display Animation for small boxes
    const animatedSmallBoxes = document.querySelectorAll('.animated-small-box')

    animatedSmallBoxes.forEach((box: Element) => {
        if (
            !animatedElements.includes(box) &&
            window.pageYOffset - 800 >= box.getBoundingClientRect().top
        ) {
            animate('display', box)
            animatedElements.push(box)
        }
    })
}

window.addEventListener('scroll', handleScroll)
