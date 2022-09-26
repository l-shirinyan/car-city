<template>
    <div class="pagination-box grid gap-y-8 w-full px-4 gap-x-6 mob-360:px-6 tab-small:px-0">
        <div class="flex justify-center w-full">
            <div
                class="
                    prev-btn
                    w-full
                    h-[52px]
                    rounded-btn
                    border border-border-color
                    cursor-pointer
                    select-none
                    flex
                    items-center
                    justify-center
                    text-primary text-base
                    leading-m
                    font-bold
                    duration-300
                    hover:bg-primary hover:text-white
                    min-w-[132px] max-w-[250px]
                    tab-small:max-w-[108px]
                    tab-small:min-w-[108px]
                    2K:h-[68px]
                    2K:max-w-[144px]
                    2K:min-w-[144px]
                "
                :class="{
                    'pointer-events-none opacity-60': activePage === 1,
                }"
                @click="changeActivePage('prev')"
            >
                <span>Prev</span>
            </div>
        </div>
        <div class="numbers-box flex justify-center w-full">
            <div class="flex gap-x10">
                <div
                    class="
                        w-[44px]
                        h-[44px]
                        rounded-[50%]
                        text-grey-900
                        duration-300
                        hover:bg-primary hover:text-white
                        select-none
                        cursor-pointer
                        flex
                        items-center
                        justify-center
                        font-bold
                        text-xxs
                        leading-5
                        2K:text-base
                        2K:leading-m
                        2K:w-[68px]
                        2K:h-[68px]
                    "
                    v-for="(item, i) in visibleItems"
                    :key="`item_${i}`"
                    :class="{
                        'bg-primary text-white pointer-events-none':
                            activePage === item,
                    }"
                    @click="changeActivePage(item)"
                >
                    {{ item }}
                </div>
                <div
                    class="
                        w-[44px]
                        h-[44px]
                        rounded-[50%]
                        text-grey-900
                        duration-300
                        select-none
                        flex
                        items-center
                        justify-center
                        font-bold
                        text-xxs
                        leading-5
                        2K:text-base
                        2K:leading-m
                        2K:w-[68px]
                        2K:h-[68px]
                    "
                    v-if="!visibleItems.includes(pagesCount) && pagesCount > 5"
                >
                    ...
                </div>
                <div
                    class="
                        w-[44px]
                        h-[44px]
                        rounded-[50%]
                        text-grey-900
                        duration-300
                        hover:bg-primary hover:text-white
                        select-none
                        cursor-pointer
                        flex
                        items-center
                        justify-center
                        font-bold
                        text-xxs
                        leading-5
                        2K:text-base
                        2K:leading-m
                        2K:w-[68px]
                        2K:h-[68px]
                    "
                    v-if="!visibleItems.includes(pagesCount)"
                    :class="{
                        'bg-primary text-white pointer-events-none':
                            activePage === pagesCount,
                    }"
                    @click="changeActivePage(pagesCount)"
                >
                    {{ pagesCount }}
                </div>
            </div>
        </div>
        <div class="flex justify-center w-full">
            <div
                class="
                    next-btn
                    w-full
                    h-[52px]
                    rounded-btn
                    border border-border-color
                    cursor-pointer
                    select-none
                    flex
                    items-center
                    justify-center
                    text-primary text-base
                    leading-m
                    font-bold
                    duration-300
                    hover:bg-primary hover:text-white
                    min-w-[132px] max-w-[250px]
                    tab-small:max-w-[108px]
                    tab-small:min-w-[108px]
                    2K:h-[68px]
                    2K:max-w-[144px]
                    2K:min-w-[144px]
                "
                :class="{
                    'pointer-events-none opacity-60': activePage === pagesCount,
                }"
                @click="changeActivePage('next')"
            >
                <span>Next</span>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'pagination-box',
    props: {
        total: Number,
        perPage: Number,
    },
    data() {
        return {
            activePage: 1,
            visibleItems: [1, 2, 3, 4],
        }
    },
    methods: {
        changeActivePage(val: string | number) {
            if (val === 'next') {
                this.activePage++
            } else if (val === 'prev') {
                this.activePage--
            } else {
                if (typeof val === 'number') {
                    this.activePage = val
                }
            }
            if (
                this.activePage === Math.max(...this.visibleItems) &&
                this.activePage !== this.pagesCount &&
                this.pagesCount > 5
            ) {
                this.visibleItems.push(this.activePage + 1)
                if (this.activePage === this.pagesCount - 2) {
                    this.visibleItems.push(this.activePage + 2)
                }
                this.visibleItems.splice(0, 1)
            } else if (
                this.activePage === Math.min(...this.visibleItems) &&
                this.activePage !== 1
            ) {
                this.visibleItems.unshift(this.activePage - 1)
                if (this.visibleItems.includes(this.pagesCount)) {
                    this.visibleItems.splice(this.visibleItems.length - 2, 2)
                } else {
                    this.visibleItems.splice(this.visibleItems.length - 1, 1)
                }
            } else if (this.activePage === this.pagesCount) {
                let length = this.visibleItems.length
                if (this.pagesCount <= this.visibleItems.length) {
                    length = this.visibleItems.length
                } else length = 5
                this.visibleItems = []
                for (let i = 0; i < length; i++) {
                    this.visibleItems.unshift(this.pagesCount - i)
                }
            }
            this.$emit('change-page', this.activePage,this.pagesCount)
        },
    },
    computed: {
        pagesCount() {
            let count = 0
            if (this.total && this.perPage)
                if (this.total % this.perPage === 0)
                    count = this.total / this.perPage
                else count = Math.floor(this.total / this.perPage) + 1
            if (count < this.visibleItems.length) {
                this.visibleItems = []
                for (let i = 1; i <= count; i++) {
                    this.visibleItems.push(i)
                }
            }
            return count
        },
    },
})
</script>

<style scoped>
.next-btn {
    grid-area: next;
}
.prev-btn {
    grid-area: prev;
}
.numbers-box {
    grid-area: numbers;
}
.pagination-box {
    grid-template-areas:
        'prev next'
        'numbers numbers';
}
@media (min-width: 834px) {
    .pagination-box {
        grid-template-areas: 'prev numbers next';
    }
}
</style>