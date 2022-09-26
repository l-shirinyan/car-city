<template>
    <div class="header">
        <div
            v-if="dropdown || isOpenPhoneMenu || isOpenBurgerMenu"
            class="backdrop-blur-lg bg-blure-bg z-[-1] absolute w-full h-screen"
        ></div>
        <div class="hidden desktop-header HD:block">
            <slot name="header-information"></slot>
            <div
                class="flex items-center justify-between px-8 bg-white subheader HD:px-5 HD:py-4 full-HD:py-6 full-HD:px-7 2K:px-containter 2K:py-10"
            >
                <img
                    src="/images/c-logo.svg"
                    class="cursor-pointer w-x105 2K:w-36"
                    alt="logo"
                    onclick="window.location='/'"
                />
                <slot name="navigation"></slot>
            </div>

            <slot name="dropdown-menu"></slot>
        </div>

        <burger-menu
            v-if="isOpenBurgerMenu"
            @close-menu="menuHandler('burger')"
        />
        <phone-menu
            v-else-if="isOpenPhoneMenu"
            @close-menu="menuHandler('phone')"
        />
        <div
            class="flex items-center justify-between py-4 bg-white mobile-header HD:hidden px-mobile-container tab-small:px-x60"
            v-else
        >
            <img
                src="/images/icons/c-burger.svg"
                class="w-6 h-6 cursor-pointer"
                @click="menuHandler('burger')"
                alt="burger menu"
            />
            <img
                src="/images/c-logo.svg"
                class="cursor-pointer w-x105"
                alt="logo"
                onclick="window.location='/'"
            />
            <img
                src="/images/icons/c-phone.svg"
                class="w-6 h-6 cursor-pointer"
                alt="phone"
                @click="menuHandler('phone')"
            />
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import BurgerMenu from './BurgerMenu.vue'
import PhoneMenu from './PhoneMenu.vue'

export default defineComponent({
    name: 'c-header',
    components: {
        BurgerMenu,
        PhoneMenu,
    },
    props: {
        dropdown: {
            type: [Boolean, String],
        },
    },
    data() {
        return {
            isOpenBurgerMenu: false,
            isOpenPhoneMenu: false,
        }
    },
    methods: {
        menuHandler(val: string) {
            if (val === 'burger') {
                this.isOpenBurgerMenu = !this.isOpenBurgerMenu
            } else {
                this.isOpenPhoneMenu = !this.isOpenPhoneMenu
            }
        },
    },
})
</script>

<style scoped>
.primary-arrow:hover img {
    filter: invert(19%) sepia(43%) saturate(6225%) hue-rotate(197deg)
        brightness(89%) contrast(99%);
}
</style>
