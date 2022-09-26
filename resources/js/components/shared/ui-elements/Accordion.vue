<template>
    <div class="filter-accordion pb-8 border-b border-border-color">
        <div
            class="flex justify-between items-center cursor-pointer select-none"
            @click="changeActivAccordions(showIndex)"
        >
            <div
                class="
                    text-grey-500
                    font-medium
                    text-x20
                    leading-normal
                    2K:leading-9 2K:text-lg
                "
            >
                {{ title }}
            </div>
            <img
                class="w-[24px] 2K:w-[32px]"
                src="../../../../../public/images/icons/c-arrow.svg"
                alt="arrow"
                :class="{
                    'rotate-180': openedAccordionsList.find(
                        (item) => item === showIndex
                    ),
                }"
            />
        </div>
        <div
            class="mt-2 flex gap-2 flex-wrap"
            :class="
                openedAccordionsList.find((item) => item === showIndex)
                    ? 'hidden'
                    : 'block'
            "
        >
            <div
                class="text-xs leading-6 text-grey-500 capitalize"
                v-for="(item, i) in filterData"
                :key="`item_${i}`"
            >
                {{ item }}
            </div>
        </div>
        <div
            class="mt-x30 2K:mt-8"
            :class="
                openedAccordionsList.find((item) => item === showIndex)
                    ? 'block'
                    : 'hidden'
            "
        >
            <slot name="content"></slot>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'c-accordion',
    props: {
        showIndex: Number,
        title: String,
        data: Array,
    },
    data() {
        return {
            openedAccordionsList: [1],
        }
    },
    methods: {
        changeActivAccordions(val: number) {
            if (this.openedAccordionsList.find((item) => item === val)) {
                const index = this.openedAccordionsList.indexOf(val)
                this.openedAccordionsList.splice(index, 1)
            } else {
                this.openedAccordionsList.push(val)
            }
        },
    },
    computed: {
        filterData() {
            const elements: string[] = []
            this.data?.forEach((el: any) => {
                elements.push(el.text)
            })
            return elements
        },
    },
})
</script>
