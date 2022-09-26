<template>
    <div
        class="
            list-section
            pb-x100
            tab-small:pb-x140
            HD:pb-[164px]
            full-HD:pb-x120
            2K:pb-[177px]
        "
        id="list"
    >
        <div
            class="
                px-4
                list-section-header
                pt-14
                mob-360:px-6
                tab-small:pt-12
                full-HD:px-8 full-HD:pt-16
                2K:pl-20 2K:pr-x200 2K:pt-20
            "
        >
            <h1
                id="list-title"
                class="
                    font-bold
                    leading-9
                    text-m text-grey-900
                    tab-small:text-xl tab-small:leading-x42
                    full-HD:text-4xl full-HD:leading-x48
                    2K:text-5xl 2K:leading-title-md
                "
            >
                All cars
            </h1>
            <p
                class="
                    pt-4
                    text-xs
                    font-medium
                    leading-6
                    text-gray/700
                    tab-small:text-base tab-small:leading-m
                    full-HD:pt-x20
                    2K:pt-8 2K:text-lg 2K:leading-x42
                "
            >
                The biggest range of great value,
                <br class="tab-small:hidden" />
                high-quality cars in Cayman.
            </p>
            <div
                class="
                    flex
                    items-center
                    justify-end
                    mt-8
                    tab-small:justify-between
                    tab-small:mt-10
                    tab-small:pb-4
                    tab-small:border-b
                    tab-small:border-border-color
                    2K:pb-6
                "
            >
                <div
                    class="
                        hidden
                        text-base
                        font-medium
                        tab-small:block
                        leading-m
                        text-gray/600
                        2K:text-lg 2K:leading-x42
                    "
                >
                    {{
                        `${(activePage - 1) * perPage + 1} to ${
                            activePage * perPage >= carsData.length
                                ? carsData.length
                                : activePage * perPage
                        } of ${carsData.length} results`
                    }}
                </div>
                <div
                    class="
                        flex
                        items-center
                        justify-end
                        select-box
                        tab-small:w-full
                    "
                >
                    <span
                        class="
                            hidden
                            mr-4
                            text-base
                            font-medium
                            tab-small:block
                            leading-m
                            text-grey-900
                            2K:text-lg 2K:leading-x42
                        "
                        >Sort by</span
                    >
                    <div
                        class="
                            w-full
                            max-w-[260px]
                            tab-small:w-[190px]
                            full-HD:w-[200px]
                        "
                    >
                        <c-custom-select
                            :activeValue="filterValue"
                            @change="changeActiveValue"
                            :filterItems="filterItems"
                            :outlined="true"
                            :isDark="false"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="list-section-body">
            <div
                class="w-full tab-small:px-6 full-HD:pl-8 full-HD:pr-0 2K:pl-20"
            >
                <div
                    class="
                        pb-6
                        mx-4
                        mt-10
                        text-xs
                        font-medium
                        leading-6
                        border-b
                        text-gray/600
                        border-border-color
                        mob-360:mx-6
                        tab-small:hidden
                    "
                >
                    {{
                        `${(activePage - 1) * perPage + 1} to ${
                            activePage * perPage >= carsData.length
                                ? carsData.length
                                : activePage * perPage
                        } of ${carsData.length} results`
                    }}
                </div>
                <div
                    v-if="carsData.length"
                    class="
                        grid
                        w-full
                        px-4
                        mt-14
                        cars-list
                        grid-cols-1-cols
                        HD:grid-cols-2-cols
                        full-HD:grid-cols-3-cols
                        gap-y-8
                        mob-360:px-6
                        tab-small:px-0
                        tab-small:mt-10
                        tab-small:gap-x-x30
                        tab-small:gap-y-10
                        full-HD:pr-8 full-HD:gap-y-normal
                        2K:gap-y-14 2K:gap-x-x60 2K:pr-x200
                    "
                >
                    <div
                        class="w-full max-w-[585px] my-0 mx-auto"
                        v-for="(car, i) in paginateData"
                        :key="`car_${i}`"
                    >
                        <car-card class="w-full" :car="car" />
                    </div>
                </div>
                <div
                    v-else
                    class="
                        w-full
                        bg-bg-light
                        px-4
                        py-20
                        mob-360:px-6
                        tab-small:px-0
                        HD:px-14
                        full-HD:py-40 full-HD:px-40
                        2K:px-[543px]
                    "
                >
                    <h2
                        class="
                            font-bold
                            leading-normal
                            text-x20 text-grey-900
                            tab-small:text-center
                            tab-small:text-m
                            tab-small:leading-9
                            full-HD:text-lg
                            2K:text-xxl 2K:leading-lg
                        "
                    >
                        We can't find a car like that
                    </h2>
                    <div
                        class="
                            pt-4
                            text-xs
                            leading-6
                            text-gray/700
                            tab-small:text-center
                            full-HD:pt-6
                            2K:pt-4 2K:text-lg 2K:leading-x42
                        "
                    >
                        <p>
                            We appreciate your interest in our inventory, and
                            apologize we do not have model details displaying on
                            the website at this time.
                        </p>
                        <p>
                            Please fill the form out below and our team will
                            quickly respond, or, please call us at (345) 949
                            0440 for more information.
                        </p>
                    </div>
                </div>
                <pagination
                    @change-page="changePage"
                    class="
                        pt-12
                        tab-small:pt-14
                        full-HD:pt-12 full-HD:max-w-[550px]
                        mx-auto
                        2K:pt-16 2K:max-w-[740px]
                    "
                    v-if="carsData.length"
                    :per-page="perPage"
                    :total="carsData.length"
                />
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, nextTick } from 'vue'
import CarCard from '../global/Header/CarCard.vue'
import Pagination from './ui-elements/Pagination.vue'
import cCustomSelect from './ui-elements/CustomSelect.vue'

export default defineComponent({
    name: 'cars-list',
    components: {
        CarCard,
        Pagination,
        cCustomSelect,
    },
    data() {
        return {
            perPage: 12,
            activePage: 1,
            filterItems: [
                'Just added',
                'Price low to high',
                'Price high to low',
            ],
            filterValue: 'Just added',
            carsData: [
                {
                    id: 'Honda Civic EX-L',
                    status: 'In stock',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
                {
                    id: 'Honda Civic EX-L',
                    picture: require("../../../../public/images/c-honda.svg").default,
                    status: 'In stock',
                    info: '2019 - 1.6L - Hatchback - 5 dr',
                    name: 'Honda Civic EX-L',
                    price: '15,743',
                    rent: { rentPrice: 36, rentPriceFor: 'day' },
                    moreInfo: {
                        transmission: 'Automatic',
                        fuel: 'Disel',
                        mileage: '36 389 miles',
                    },
                },
            ],
        }
    },
    computed: {
        paginateData() {
            const data: object[] = []
            this.carsData?.forEach((item: any, i) => {
                if (
                    i + 1 > (this.activePage - 1) * this.perPage &&
                    i + 1 <= this.activePage * this.perPage
                ) {
                    data.push(item)
                }
            })
            return data
        },
    },
    methods: {
        changePage(active, count) {
            this.activePage = active
            const header = document.getElementById('list-title')
            if (header) {
                header.scrollIntoView({ behavior: 'smooth', block: 'end' })
            }
            const body = document.getElementById('list')
            const sidebar = document.getElementById('sidebar')
            if (window.innerWidth >= 834) {
                sidebar!.style.height = '0px'
                this.$nextTick(() => {
                    if (body?.clientHeight) {
                        sidebar!.style.height = `${body?.clientHeight - 158}px`
                    }
                })
            }
        },
        changeActiveValue(v) {
            this.filterValue = v
        },
    },
    mounted() {
        const body = document.getElementById('list')
        const sidebar = document.getElementById('sidebar')
        if (window.innerWidth >= 834) {
            sidebar!.style.height = '0px'
            this.$nextTick(() => {
                if (body?.clientHeight) {
                    sidebar!.style.height = `${body?.clientHeight - 158}px`
                }
            })
        }
    },
})
</script>
<style scoped>
.select-box {
    width: calc(50% - 10px);
}

.list-section {
    width: 100%;
}
@media (min-width: 834px) {
    .list-section {
        width: calc(100% - 281px);
    }
    .select-box {
        width: fit-content;
    }
}
@media (min-width: 1024px) {
    .list-section {
        width: calc(100% - 346px);
    }
}
@media (min-width: 1368px) {
    .list-section {
        width: calc(100% - 338px);
    }
}
@media (min-width: 2560px) {
    .list-section {
        width: calc(100% - 564px);
    }
}
</style>
