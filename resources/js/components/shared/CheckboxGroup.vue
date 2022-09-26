<template>
    <div>
        <div
            class="flex items-center justify-between mt-4 2K:mt-6"
            v-for="(checkbox, i) in data"
            :key="`checkbox_${i}`"
        >
            <div class="flex items-center">
                <div
                    class="
                        w-[20px]
                        h-[20px]
                        rounded-[4px]
                        border border-border-color
                        select-none
                        cursor-pointer
                        flex
                        justify-center
                        items-center
                        bg-white
                    "
                    :class="{
                        'bg-primary': checkedElements.find(
                            (item) => item === checkbox.id
                        ),
                    }"
                    @click="toggleCheck(checkbox.id)"
                >
                    <img
                        src="../../../../public/images/icons/c-checked.svg"
                        alt="checked"
                    />
                </div>
                <div
                    class="ml-2 w-[30px] h-[20px] rounded-[3px]"
                    v-if="checkbox.color"
                    :style="{
                        'background-color': checkbox.color,
                        border:
                            checkbox.id === 'white' ? '1px solid #9CA3AF' : '',
                    }"
                ></div>
                <span
                    class="
                        text-base
                        leading-m
                        font-medium
                        ml-2
                        2K:text-x20 2K:leading-normal
                    "
                    >{{ checkbox.label }}</span
                >
            </div>
            <div class="text-gray/400 font-medium text-xs leading-6">
                ({{ checkbox.count }})
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
const checkedElements: Array<unknown> = []
export default defineComponent({
    name: 'checkbox-group',
    props: {
        data: Array,
        checkedList: {
            type: Array,
            default: [],
        },
        index: String,
    },
    data() {
        return {
            checkedElements: checkedElements,
        }
    },
    methods: {
        toggleCheck(id: string) {
            if (this.checkedElements.includes(id)) {
                this.checkedElements = this.checkedElements.filter(
                    (item) => item !== id
                )
            } else {
                this.checkedElements.push(id)
                if (id === 'any') {
                    this.checkedElements = this.checkedElements.filter(
                        (item) => item === 'any'
                    )
                } else {
                    if (this.checkedElements.includes('any')) {
                        this.checkedElements = this.checkedElements.filter(
                            (item) => item !== 'any'
                        )
                    }
                }
            }
            this.$emit('toggle-check', this.checkedElements, this.index)
        },
    },
    created() {
        this.checkedElements = this.checkedList
    },
    watch: {
        checkedList(v) {
            if (v.length) {
                this.checkedElements = v
            } else {
                this.checkedElements = v
                this.checkedElements.push('any')
            }
        },
    },
})
</script>
