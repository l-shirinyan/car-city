<template>
    <div class="w-full relative pt-[7px] full-HD:pt-[8px]">
        <input class="
                z-2
                h-[44px]
                w-full
                pr-x30
                focus:outline-none
                placeholder:text-xs
                placeholder:leading-6
                placeholder:text-grey-500
                text-xs
                leading-6
                text-grey-900
                full-HD:text-base full-HD:leading-m full-HD:h-[52px]
            " type="text" :value="inputValue" @focus="onFocus" @blur="onBlur" @input="onInput"/>
        <div class="z-1 absolute duration-[0.3s] select-none pointer-events-none" :style="{
            color: isFocused
                ? '#42BE65'
                : hasError
                ? '#FA4D56'
                : '#9CA3AF',
        }" :class="
                !inputValue?.length && !isFocused
                    ? 'leading-6 text-xs placeholder full-HD:text-base full-HD:leading-m'
                    : 'top-0 leading-[19px] text-[12px] full-HD:text-[13px]'
            ">
            {{ placeholder }}
        </div>
        <div class="
                amimation-box
                w-full
                h-[2px]
                relative
                pointer-events-none
                select-none
            ">
            <div class="z-1 absolute top-0 left-0 w-full h-[1px] bg-gray/400">
                <div class="
                        flex
                        justify-center
                        z-2
                        absolute
                        top-0
                        left-0
                        h-[2px]
                        w-full
                    ">
                    <div class="duration-[0.3s] bg-success" :class="isFocused ? 'w-full' : 'w-0'"></div>
                </div>
                <div class="
                        flex
                        justify-center
                        z-2
                        absolute
                        top-0
                        left-0
                        h-[1px]
                        w-full
                    ">
                    <div class="duration-[0.3s] bg-error" :class="!isFocused && hasError ? 'w-full' : 'w-0'"></div>
                </div>
            </div>
        </div>
        <div :class="hasError ? 'opacity-100' : 'opacity-0'"
            class="error-box text-error text-[12px] leading-[19px] h-[19px]">
            {{ errorMessage }}
        </div>
        <img :class="hasError ? 'opacity-100' : 'opacity-0'" class="
                duration-[0.3s]
                error-icon
                absolute
                top-[18px]
                right-0
                full-HD:top-[22px]
            " src="../../../../../public/images/icons/c-error.svg" alt="error" />
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'custom-input',
    props: {
        inputValue: String,
        placeholder: String,
        errorMessage: String
    },
    data() {
        return {
            isFocused: false,
            isBlured: false,
        }
    },
    methods: {
        onFocus() {
            this.isFocused = true
            this.isBlured = false
        },
        onBlur() {
            this.isFocused = false
            this.isBlured = true
        },
        onInput(e: Event) {
            const target= (<HTMLInputElement>e.target)
            this.$emit('update:inputValue', target.value)
        }
    },
    computed: {
        hasError() {
            return this.isBlured && this.errorMessage?.length || false;
        }
    }
})
</script>

<style scoped>
.placeholder {
    top: calc(50% - 18px);
}

.error-icon {
    filter: invert(44%) sepia(75%) saturate(1040%) hue-rotate(321deg) brightness(92%) contrast(115%);
}
</style>
