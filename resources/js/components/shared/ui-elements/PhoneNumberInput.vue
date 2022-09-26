<template>
    <div class="w-full relative pt-[7px] full-HD:pt-[8px]">
        <vue-tel-input
            :inputOptions="{
                placeholder: '',
            }"
            @input="onInput"
            ref="tel-input"
            :value="phone"
            @focus="onfocus"
            validCharactersOnly
            @blur="hideFocus"
            class="
                pr-x30
                h-[44px]
                text-grey-900
                leading-6
                text-xs
                full-HD:text-base full-HD:leading-m full-HD:h-[52px]
            "
        ></vue-tel-input>
        <div
            class="z-1 absolute duration-[0.3s] select-none pointer-events-none"
            :style="{
                color: isFocused
                    ? '#42BE65'
                    : errorMessage
                    ? '#FA4D56'
                    : '#9CA3AF',
            }"
            :class="
                !phone && !isFocused
                    ? 'leading-6 text-xs placeholder full-HD:text-base full-HD:leading-m'
                    : 'top-0 leading-[19px] text-[12px] full-HD:text-[13px]'
            "
        >
            {{ placeholder }}
        </div>
        <div
            class="
                amimation-box
                w-full
                h-[2px]
                relative
                pointer-events-none
                select-none
            "
        >
            <div class="z-1 absolute top-0 left-0 w-full h-[1px] bg-gray/400">
                <div
                    class="
                        flex
                        justify-center
                        z-2
                        absolute
                        top-0
                        left-0
                        h-[2px]
                        w-full
                    "
                >
                    <div
                        class="duration-[0.3s] bg-success"
                        :class="isFocused ? 'w-full' : 'w-0'"
                    ></div>
                </div>
                <div
                    class="
                        flex
                        justify-center
                        z-2
                        absolute
                        top-0
                        left-0
                        h-[1px]
                        w-full
                    "
                >
                    <div
                        class="duration-[0.3s] bg-error"
                        :class="!isFocused && errorMessage ? 'w-full' : 'w-0'"
                    ></div>
                </div>
            </div>
        </div>
        <div
            :class="errorMessage ? 'opacity-100' : 'opacity-0'"
            class="error-box text-error text-[12px] leading-[19px] h-[19px]"
        >
            {{ errorMessage }}
        </div>
        <img
            :class="errorMessage ? 'opacity-100' : 'opacity-0'"
            class="
                duration-[0.3s]
                error-icon
                absolute
                top-[18px]
                right-0
                full-HD:top-[22px]
            "
            src="../../../../../public/images/icons/c-error.svg"
            alt="error"
        />
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { VueTelInput } from 'vue3-tel-input'
import 'vue3-tel-input/dist/vue3-tel-input.css'

export default defineComponent({
    name: 'phone-input',
    components: {
        VueTelInput,
    },
    props: {
        placeholder: {
            default: 'Phone',
            type: String,
        },
    },
    data() {
        return {
            phone: '',
            errorMessage: '',
            isFocused: false,
        }
    },
    methods: {
        onInput(phone, phoneObject, input) {
            this.phone = phoneObject.formatted
            
        },
        onfocus() {
            this.isFocused = true
            this.errorMessage = ''
        },
        hideFocus() {
            this.isFocused = false
            if (!this.phone) {
                this.errorMessage = 'Value is required'
            } else if (!(this.$refs['tel-input'] as any).phoneObject.valid) {
                this.errorMessage = 'Value is not valid phone number'
            } else {
                this.errorMessage = ''
            }
        },
    },
})
</script>

<style scoped>
.placeholder {
    top: calc(50% - 18px);
}
::v-deep .vti__dropdown {
    display: none !important;
}
::v-deep .vti__input {
    height: 100%;
    border-radius: 0;
    border: none !important;
    outline: none !important;
    padding: 0 !important;
}
::v-deep .vue-tel-input {
    border: none !important;
}
::v-deep .vue-tel-input:focus-within {
    box-shadow: none !important;
}
.error-icon {
    filter: invert(44%) sepia(75%) saturate(1040%) hue-rotate(321deg)
        brightness(92%) contrast(115%);
}
</style>
