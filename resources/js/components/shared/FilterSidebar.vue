<template>
    <div>
        <div
            @click="toggleOpenSidebar"
            class="
                filter-btn-box
                absolute
                left-4
                top-[251px]
                select-none
                cursor-pointer
                flex
                justify-between
                items
                center
                w-full
                min-w-[137px]
                max-w-[260px]
                rounded-[32px]
                border border-grey-500
                px-[14px]
                py-[13px]
                mob-360:left-6
                mob-428:px-4
                tab-small:hidden
            "
        >
            <div class="flex items-center">
                <img
                    class="w-[24px] h-[24px]"
                    src="../../../../public/images/icons/c-filter.svg"
                    alt="filter"
                />
                <span class="pl-2 text-xs font-medium leading-6 text-grey-900"
                    >Filters</span
                >
            </div>
            <div
                v-if="filterData.count"
                class="
                    w-[24px]
                    h-[24px]
                    rounded-[50%]
                    bg-secondary
                    text-white text-xxs
                    leading-5
                    flex
                    justify-center
                    items-center
                "
            >
                {{ filterData.count }}
            </div>
        </div>
        <div
            :class="isOpened ? 'block' : 'hidden'"
            id="sidebar"
            class="
                fixed
                h-screen
                overflow-auto
                top-0
                left-0
                z-max
                w-full
                tab-small:block
                filter-sidebar
                bg-white
                py-4
                px-4
                tab-small:h-auto tab-small:w-[281px] tab-small:static
                mob-360:px-6
                tab-small:py-normal tab-small:pr-4
                HD:w-[346px]
                full-HD:w-[338px] full-HD:pr-2 full-HD:pl-8 full-HD:py-16
                2K:py-20 2K:pl-x200 2K:pr-0 2K:w-[564px]
            "
        >
            <div class="filter-header">
                <div
                    class="flex items-center justify-between pb-4 tab-small:pb-0"
                >
                    <div
                        class="flex items-center tab-small:justify-between tab-small:w-full"
                    >
                        <div
                            class="font-bold leading-normal text-x20 tab-small:text-m tab-small:leading-9 text-grey-900 2K:text-xl 2K:leading-x42"
                        >
                            Filetrs
                            <span v-if="filterData.count"
                                >({{ filterData.count }})</span
                            >
                        </div>
                        <div
                            @click="deleteFilterData('clear-all')"
                            v-if="filterData.count"
                            class="flex items-center ml-4 cursor-pointer select-none tab-small:ml-0"
                        >
                            <img
                                class="
                                    w-[20px]
                                    h-[20px]
                                    mr-x10
                                    tab-small:hidden
                                "
                                src="../../../../public/images/icons/c-delete.svg"
                                alt="delete"
                            />
                            <div
                                class="text-xs font-bold leading-6 border-b border-grey-900 text-grey-900 2K:text-m 2K:leading-9"
                            >
                                Clear All
                            </div>
                        </div>
                    </div>
                    <img
                        @click="toggleOpenSidebar"
                        class="
                            select-none
                            cursor-pointer
                            w-[24px]
                            h-[24px]
                            tab-small:hidden
                        "
                        src="../../../../public/images/icons/c-close.svg"
                        alt="close"
                    />
                </div>
                <div
                    class="
                        divider
                        absolute
                        left-0
                        top-[62px]
                        w-full
                        h-[1px]
                        bg-grey-900
                        tab-small:hidden
                    "
                ></div>
                <div
                    v-if="filterData.items.length"
                    class="flex flex-wrap mt-10 chips-box 2K:mt-14 gap-x-2 gap-y-4"
                >
                    <div
                        v-for="(item, i) in filterData.items"
                        :key="`filter_${i}`"
                        class="
                            px-2
                            py-1
                            text-xxs
                            leading-5
                            text-gray/700
                            font-medium
                            select-none
                            border border-gray/400
                            rounded-[27px]
                            flex
                            items-center
                            capitalize
                            tab-small:py-2
                            tab-small:px-x10
                            tab-small:text-xs
                            tab-small:leading-6
                        "
                    >
                        <span>{{ item.text }}</span>
                        <img
                            class="cursor-pointer select-none"
                            src="../../../../public/images/icons/c-close-gray.svg"
                            alt="close"
                            @click="deleteFilterData('clear', item)"
                        />
                    </div>
                </div>
            </div>
            <div class="pb-[83px] filter-body mt-10 2K:mt-14">
                <c-accordion
                    title="Make"
                    :show-index="1"
                    :data="
                        filterData.items.filter((item) => item.id === 'make')
                    "
                >
                    <template #content>
                        <checkbox-group
                            index="make"
                            :data="checkboxDataMake"
                            :checked-list="activeFilters.make"
                            @toggle-check="changeFilterValue"
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    class="mt-8"
                    title="Model"
                    :data="
                        filterData.items.filter((item) => item.id === 'model')
                    "
                    :show-index="2"
                >
                    <template #content>
                        <c-custom-select
                            class="mt-8"
                            :outlined="true"
                            :filterItems="['aaa', 'bbb', 'any']"
                            :activeValue="activeFilters.model"
                            :isDark="false"
                            @change="
                                (val) => changeFilterValue(val, 'model')
                            "
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    class="mt-8"
                    title="Price"
                    :data="
                        filterData.items.filter((item) => item.id === 'price')
                    "
                    :show-index="3"
                >
                    <template #content>
                        <div class="flex gap-4">
                            <div class="w-[50%]">
                                <c-custom-select
                                    :outlined="true"
                                    :filterItems="['$5000', '$7000', 'any']"
                                    :activeValue="activeFilters.price.min"
                                    :isDark="false"
                                    :label="'Min'"
                                    @change="
                                        (val) =>
                                            changeFilterValue(
                                                val,
                                                'price',
                                                'min'
                                            )
                                    "
                                />
                            </div>
                            <div class="w-[50%]">
                                <c-custom-select
                                    :outlined="true"
                                    :filterItems="['$8000', '$10000', 'any']"
                                    :activeValue="activeFilters.price.max"
                                    :isDark="false"
                                    :label="'Max'"
                                    @change="
                                        (val) =>
                                            changeFilterValue(
                                                val,
                                                'price',
                                                'max'
                                            )
                                    "
                                />
                            </div>
                        </div>
                    </template>
                </c-accordion>
                <c-accordion
                    class="mt-8"
                    title="Fuel & Consumption"
                    :show-index="4"
                    :data="
                        filterData.items.filter((item) => item.id === 'fuel')
                    "
                >
                    <template #content>
                        <checkbox-group
                            index="fuel"
                            :data="checkboxDataFuel"
                            :checked-list="activeFilters.fuel.type"
                            @toggle-check="
                                (val, index) =>
                                    changeFilterValue(val, index, 'type')
                            "
                        />
                        <c-custom-select
                            class="mt-8"
                            :outlined="true"
                            :filterItems="[
                                'any',
                                '20 and above',
                                '30 and above',
                                '40 and above',
                            ]"
                            :activeValue="activeFilters.fuel.consumption"
                            :isDark="false"
                            label="Fuel consumption"
                            @change="
                                (val) =>
                                    changeFilterValue(
                                        val,
                                        'fuel',
                                        'consumption'
                                    )
                            "
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    :data="
                        filterData.items.filter((item) => item.id === 'color')
                    "
                    class="mt-8"
                    title="Color"
                    :show-index="5"
                >
                    <template #content>
                        <checkbox-group
                            index="color"
                            :data="checkboxDataColor"
                            :checked-list="activeFilters.color"
                            @toggle-check="changeFilterValue"
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    class="mt-8"
                    :data="
                        filterData.items.filter((item) => item.id === 'body')
                    "
                    title="Body type"
                    :show-index="6"
                >
                    <template #content>
                        <checkbox-group
                            index="body"
                            :data="checkboxDataBody"
                            :checked-list="activeFilters.body"
                            @toggle-check="changeFilterValue"
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    :data="
                        filterData.items.filter(
                            (item) => item.id === 'transmission'
                        )
                    "
                    class="mt-8"
                    title="Transmission"
                    :show-index="7"
                >
                    <template #content>
                        <checkbox-group
                            index="transmission"
                            :data="checkboxDataTransmission"
                            :checked-list="activeFilters.transmission"
                            @toggle-check="changeFilterValue"
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    class="mt-8"
                    :data="
                        filterData.items.filter(
                            (item) => item.id === 'engineSize'
                        )
                    "
                    title="Engine size"
                    :show-index="8"
                >
                    <template #content>
                        <div class="flex gap-4">
                            <div class="w-[50%]">
                                <c-custom-select
                                    :outlined="true"
                                    :filterItems="['aaaa', 'bbbb', 'any']"
                                    :activeValue="activeFilters.engineSize.min"
                                    :isDark="false"
                                    :label="'Min'"
                                    @change="
                                        (val) =>
                                            changeFilterValue(
                                                val,
                                                'engineSize',
                                                'min'
                                            )
                                    "
                                />
                            </div>
                            <div class="w-[50%]">
                                <c-custom-select
                                    :outlined="true"
                                    :filterItems="['aaaaa', 'bbbb', 'any']"
                                    :activeValue="activeFilters.engineSize.max"
                                    :isDark="false"
                                    :label="'Max'"
                                    @change="
                                        (val) =>
                                            changeFilterValue(
                                                val,
                                                'engineSize',
                                                'max'
                                            )
                                    "
                                />
                            </div>
                        </div>
                    </template>
                </c-accordion>
                <c-accordion
                    :data="
                        filterData.items.filter((item) => item.id === 'doors')
                    "
                    class="mt-8"
                    title="Doors"
                    :show-index="9"
                >
                    <template #content>
                        <checkbox-group
                            index="doors"
                            :data="checkboxDataDoors"
                            :checked-list="activeFilters.doors"
                            @toggle-check="changeFilterValue"
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    :data="
                        filterData.items.filter((item) => item.id === 'seats')
                    "
                    class="mt-8"
                    title="Seats"
                    :show-index="10"
                >
                    <template #content>
                        <checkbox-group
                            index="seats"
                            :data="checkboxDataSeats"
                            :checked-list="activeFilters.seats"
                            @toggle-check="changeFilterValue"
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    :data="
                        filterData.items.filter((item) => item.id === 'hand')
                    "
                    class="mt-8"
                    title="Hand drive"
                    :show-index="11"
                >
                    <template #content>
                        <checkbox-group
                            index="hand"
                            :data="checkboxDataHand"
                            :checked-list="activeFilters.hand"
                            @toggle-check="changeFilterValue"
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    class="mt-8"
                    :data="
                        filterData.items.filter(
                            (item) => item.id === 'driveType'
                        )
                    "
                    title="Drive type"
                    :show-index="12"
                >
                    <template #content>
                        <checkbox-group
                            index="driveType"
                            :data="checkboxDataDriveType"
                            :checked-list="activeFilters.driveType"
                            @toggle-check="changeFilterValue"
                        />
                    </template>
                </c-accordion>
                <c-accordion
                    class="mt-8"
                    title="Condition"
                    :data="
                        filterData.items.filter(
                            (item) => item.id === 'condition'
                        )
                    "
                    :show-index="13"
                >
                    <template #content>
                        <c-custom-select
                            class="mt-8"
                            :outlined="true"
                            :filterItems="['aaa', 'bbb', 'All']"
                            :activeValue="activeFilters.condition"
                            :isDark="false"
                            @change="
                                (val) => changeFilterValue(val, 'condition')
                            "
                        />
                    </template>
                </c-accordion>
            </div>
            <div
                class="
                    mt-[83px]
                    flex
                    justify-center
                    w-full
                    shadow-container
                    bg-white
                    fixed
                    bottom-0
                    left-0
                    p-4
                    mob-360:px-6
                    tab-small:hidden
                "
            >
                <c-search-btn
                    @click="toggleOpenSidebar"
                    class="max-w-[380px]"
                    :is-dark="true"
                    :title="'Search cars'"
                />
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import checkboxGroup from './CheckboxGroup.vue'
import cCustomSelect from './ui-elements/CustomSelect.vue'
import cSearchBtn from './ui-elements/SearchBtn.vue'
import cAccordion from './ui-elements/Accordion.vue'

export default defineComponent({
    name: 'filter-sidebar',
    components: {
        checkboxGroup,
        cCustomSelect,
        cSearchBtn,
        cAccordion,
    },
    data() {
        return {
            isOpened: false,
            checkboxDataMake: [
                {
                    label: 'Any',
                    count: 37974,
                    id: 'any',
                },
                {
                    label: 'Chrysler',
                    count: 392,
                    id: 'chrysler',
                },
                {
                    label: 'Dodge',
                    count: 392,
                    id: 'dodge',
                },
                {
                    label: 'Honda',
                    count: 392,
                    id: 'honda',
                },
                {
                    label: 'Jeep',
                    count: 392,
                    id: 'jeep',
                },
                {
                    label: 'Ram',
                    count: 392,
                    id: 'ram',
                },
                {
                    label: 'Suzuki',
                    count: 392,
                    id: 'suzuki',
                },
                {
                    label: 'Mitsubishi',
                    count: 392,
                    id: 'mitsubishi',
                },
                {
                    label: 'Mercedes-Benz',
                    count: 392,
                    id: 'mercedes-benz',
                },
            ],
            checkboxDataFuel: [
                {
                    label: 'Any',
                    count: 37974,
                    id: 'any',
                },
                {
                    label: 'Petrol',
                    count: 392,
                    id: 'petrol',
                },
                {
                    label: 'Diesel',
                    count: 392,
                    id: 'diesel',
                },
                {
                    label: 'Electric',
                    count: 392,
                    id: 'electric',
                },
                {
                    label: 'Hybrid',
                    count: 392,
                    id: 'ybrid',
                },
            ],
            checkboxDataBody: [
                {
                    label: 'Any',
                    count: 37974,
                    id: 'any',
                },
                {
                    label: 'SUV',
                    count: 392,
                    id: 'suv',
                },
                {
                    label: 'Hatchback',
                    count: 392,
                    id: 'hatchback',
                },
                {
                    label: 'Saloon',
                    count: 392,
                    id: 'saloon',
                },
                {
                    label: 'Couple',
                    count: 392,
                    id: 'couple',
                },
                {
                    label: 'MVP',
                    count: 392,
                    id: 'mvp',
                },
                {
                    label: 'Pickup',
                    count: 392,
                    id: 'pickup',
                },
            ],
            checkboxDataTransmission: [
                {
                    label: 'Any',
                    count: 37974,
                    id: 'any',
                },
                {
                    label: 'Automatic',
                    count: 392,
                    id: 'automatic',
                },
                {
                    label: 'Manual',
                    count: 392,
                    id: 'manual',
                },
            ],
            checkboxDataDoors: [
                {
                    label: 'Any',
                    count: 37974,
                    id: 'any',
                },
                {
                    label: '2 doors',
                    count: 392,
                    id: '2 doors',
                },
                {
                    label: '3 doors',
                    count: 392,
                    id: '3 doors',
                },
                {
                    label: '4 doors',
                    count: 392,
                    id: '4 doors',
                },
                {
                    label: '5 doors',
                    count: 392,
                    id: '5 doors',
                },
            ],
            checkboxDataSeats: [
                {
                    label: 'Any',
                    count: 37974,
                    id: 'any',
                },
                {
                    label: '2 seats',
                    count: 392,
                    id: '2 seats',
                },
                {
                    label: '3 seats',
                    count: 392,
                    id: '3 seats',
                },
                {
                    label: '4 seats',
                    count: 392,
                    id: '4 seats',
                },
                {
                    label: '5 seats',
                    count: 392,
                    id: '5 seats',
                },
                {
                    label: '6 seats',
                    count: 392,
                    id: '6 seats',
                },
                {
                    label: '7 seats',
                    count: 392,
                    id: '7 seats',
                },
                {
                    label: '8 seats',
                    count: 392,
                    id: '8 seats',
                },
            ],
            checkboxDataHand: [
                {
                    label: 'Any',
                    count: 37974,
                    id: 'any',
                },
                {
                    label: 'Left hand drive',
                    count: 392,
                    id: 'left hand drive',
                },
                {
                    label: 'Right hand drive',
                    count: 392,
                    id: 'right hand drive',
                },
            ],
            checkboxDataDriveType: [
                {
                    label: 'Any',
                    count: 37974,
                    id: 'any',
                },
                {
                    label: 'Four-wheel drive',
                    count: 392,
                    id: 'four-wheel',
                },
                {
                    label: 'Front-wheel drive',
                    count: 392,
                    id: 'front-wheel',
                },
                {
                    label: 'Rear-wheel drive',
                    count: 392,
                    id: 'rear-wheel',
                },
            ],
            checkboxDataColor: [
                {
                    label: 'Any',
                    count: 37974,
                    id: 'any',
                },
                {
                    label: 'Black',
                    count: 392,
                    id: 'black',
                    color: '#0C0B10',
                },
                {
                    label: 'White',
                    count: 392,
                    id: 'white',
                    color: '#FFFFFF',
                },
                {
                    label: 'Grey',
                    count: 392,
                    id: 'grey',
                    color: '#9CA3AF',
                },
                {
                    label: 'Blue',
                    count: 392,
                    id: 'blue',
                    color: 'rgba(1, 88, 168, 0.6)',
                },
                {
                    label: 'Silver',
                    count: 392,
                    id: 'silver',
                    color: '#D1D5DB',
                },
                {
                    label: 'Red',
                    count: 392,
                    id: 'red',
                    color: '#E04F4E',
                },
            ],
            activeFilters: {
                make: ['any'],
                model: 'any',
                color: ['any'],
                fuel: {
                    type: ['any'],
                    consumption: 'any',
                },
                body: ['any'],
                transmission: ['any'],
                doors: ['any'],
                seats: ['any'],
                hand: ['any'],
                driveType: ['any'],
                condition: 'any',
                price: {
                    min: 'any',
                    max: 'any',
                },
                engineSize: {
                    min: 'any',
                    max: 'any',
                },
            },
            defaultFilters: {},
        }
    },
    methods: {
        toggleOpenSidebar() {
            this.isOpened = !this.isOpened
            const body = document.getElementsByTagName('body')[0]
            if (this.isOpened) body.style.overflow = 'hidden'
            else body.style.overflow = 'auto'
        },
        changeFilterValue(val: any, index: string, subIndex) {
            if (subIndex) {
                this.activeFilters[index][subIndex] = val
            } else {
                this.activeFilters[index] = val
            }
        },
        deleteFilterData(val: string, item) {
            if (val === 'clear-all') {
                this.activeFilters = JSON.parse(
                    JSON.stringify(this.defaultFilters)
                )
            } else {
                if (Array.isArray(this.activeFilters[item.id])) {
                    this.activeFilters[item.id] = this.activeFilters[
                        item.id
                    ].filter((el: string) => el !== item.text)
                } else if (typeof this.activeFilters[item.id] === 'string') {
                    this.activeFilters[item.id] = 'any'
                } else {
                    if (item.id === 'price' || item.id === 'engineSize') {
                        this.activeFilters[item.id].min = 'any'
                        this.activeFilters[item.id].max = 'any'
                    } else {
                        if (this.activeFilters[item.id].consumption === 'any') {
                            this.activeFilters[item.id].type =
                                this.activeFilters[item.id].type.filter(
                                    (el: string) => el !== item.text
                                )
                        } else {
                            this.activeFilters[item.id].type =
                                this.activeFilters[item.id].type.filter(
                                    (el: string) => el !== item.type
                                )
                            if (this.activeFilters[item.id].type.length === 0) {
                                this.activeFilters[item.id].consumption = 'any'
                            }
                        }
                    }
                }
            }
        },
    },
    computed: {
        filterData() {
            const chips: Array<object> = []
            var filterCount = 0
            for (let i in this.activeFilters) {
                if (Array.isArray(this.activeFilters[i])) {
                    if (!this.activeFilters[i].includes('any')) {
                        this.activeFilters[i].forEach((item) => {
                            chips.push({
                                id: i,
                                text: item,
                            })
                            filterCount++
                        })
                    }
                } else if (typeof this.activeFilters[i] === 'string') {
                    if (this.activeFilters[i] !== 'any') {
                        chips.push({
                            id: i,
                            text: this.activeFilters[i],
                        })
                        filterCount++
                    }
                } else {
                    if (i === 'price' || i === 'engineSize') {
                        if (
                            this.activeFilters[i].min !== 'any' ||
                            this.activeFilters[i].max !== 'any'
                        ) {
                            chips.push({
                                id: i,
                                text: `${this.activeFilters[i].min} - ${this.activeFilters[i].max}`,
                            })
                            filterCount++
                        }
                    } else {
                        if (!this.activeFilters[i].type.includes('any')) {
                            this.activeFilters[i].type.forEach((item) => {
                                if (
                                    this.activeFilters[i].consumption === 'any'
                                ) {
                                    chips.push({
                                        id: i,
                                        text: item,
                                    })
                                    filterCount++
                                } else {
                                    chips.push({
                                        id: i,
                                        type: item,
                                        text: `${item} - ${this.activeFilters[i].consumption}`,
                                    })
                                    filterCount++
                                }
                            })
                        } else if (
                            this.activeFilters[i].consumption !== 'any'
                        ) {
                            chips.push({
                                id: i,
                                text: this.activeFilters[i].consumption,
                            })
                            filterCount++
                        }
                    }
                }
            }
            return {
                items: chips,
                count: filterCount,
            }
        },
    },
    mounted() {
        this.defaultFilters = JSON.parse(JSON.stringify(this.activeFilters))
    },
})
</script>

<style scoped>
.filter-sidebar::-webkit-scrollbar {
    width: 0 !important;
}

.filter-btn-box {
    width: calc(50% - 26px);
}

@media (min-width: 360px) {
    .filter-btn-box {
        width: calc(50% - 32px);
    }
}
</style>
