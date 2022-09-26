<template>
    <div class="relative w-full">
        <div v-if="label" class="pb-1 leading-5 text-xxs text-grey-500">
            {{ label }}
        </div>
        <div
            @click="selectHandler"
            v-click-outside="closeSelect"
            class="
                select-input select-none
                w-full
                h-[52px]
                font-medium
                flex
                items-center
                justify-between
                HD:w-full
                cursor-pointer
            "
            :class="{
                'border border-grey-500 rounded-[32px] px-4': outlined,
                'border-b border-grey-500': !outlined,
                'cursor-not-allowed': isDisabled,
                'text-grey-900': isDisabled || !isDark,
                'text-white': isDark,
                'text-base leading-m': size === 'large',
                'text-xs leading-6': size === 'small',
            }"
        >
            <span class="overflow-hidden whitespace-nowrap text-ellipsis">
                {{ activeValue }}
            </span>
            <img
                :class="{
                    'disabled-icon': isDisabled || !isDark,
                    'rotate-180': showSelect,
                }"
                class="select-none w-[20px] full-HD:w-[24px]"
                src="/images/icons/c-white-arrow.svg"
                alt="arrow"
            />
        </div>
        <div
            class="
                selcet-box
                z-max
                w-full
                bg-white
                absolute
                mt-1
                h-[188px]
                overflow-auto
                shadow-selectShadow
                min-w-[155px]
            "
            v-if="showSelect"
        >
            <div
                @click="updateValue(item)"
                class="pl-4 mt-1 text-xs font-medium leading-6 bg-white cursor-pointer select-none py-x10 text-grey-900 hover:bg-gray/100"
                v-for="(item, i) in filterItems"
                :key="`mark_${i}`"
            >
                {{ item }}
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import vClickOutside from 'click-outside-vue3'

export default defineComponent({
    name: 'custom-select',
    directives: {
        clickOutside: vClickOutside.directive,
    },
    props: {
        activeValue: String,
        filterItems: Array,
        isDisabled: Boolean,
        outlined: {
            type: Boolean,
            default: false,
        },
        isDark: {
            type: Boolean,
            default: true,
        },
        label: {
            type: String,
            default: '',
        },
        size: {
            type: String,
            default: 'small',
        },
    },
    data() {
        return {
            showSelect: false,
        }
    },
    methods: {
        updateValue(item: string) {
            this.$emit('change', item)
            this.closeSelect()
        },
        selectHandler() {
            if (!this.isDisabled) {
                this.showSelect = !this.showSelect
            }
        },
        closeSelect() {
            this.showSelect = false
        },
    },
})
</script>

<style scoped>
.disabled-icon {
    filter: invert(71%) sepia(7%) saturate(448%) hue-rotate(179deg)
        brightness(92%) contrast(84%);
}
</style>
