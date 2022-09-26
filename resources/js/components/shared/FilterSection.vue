<template>
    <div
        class="
            filter-section
            py-10
            px-4
            bg-grey-900
            flex flex-col
            items-center
            gap-y-6
            mob-360:px-6 mob-360:pt-10 mob-360:pb-20
            tab-small:flex-row
            tab-small:px-x60
            tab-small:py-8
            tab-small:gap-y-0
            tab-small:gap-x-x30
            full-HD:px-[232px]
            2K:px-[618px] 2K:gap-x-x60 2K:py-12
        "
    >
        <c-custom-select
            :filter-items="brandsOptions"
            display-field="name"
            :active-value="(selectedBrand) ? selectedBrand.name : 'Any make'"
            @change="updateBrand($event)"
            size="large"
        />
        <c-custom-select
            :isDisabled="!selectedBrand"
            :active-value="(selectedModel) ? selectedModel.name : 'Any make'"
            :filter-items="modelsOptions"
            display-field="name"
            @change="updateModel($event)"
            size="large"
        />
        <c-search-btn
            class="mt-6 tab-small:mt-0"
            :nbResults="nbResults"
            @click="navigate"
        />
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import cCustomSelect from './ui-elements/CustomSelect.vue'
import cSearchBtn from './ui-elements/SearchBtn.vue'

interface BrandOption {
    name: string;
    vehicle_models: ModelOption[]
} 

interface ModelOption {
    name: string;
}

export default defineComponent({
    name: 'filter-section',
    components: {
        cCustomSelect,
        cSearchBtn,
    },
    props: {
        brands: { 
            type: [Object],
            required: true
        },
    },
    data() {
        return {
            selectedBrand: null as BrandOption | null,
            selectedModel: null as ModelOption | null,
        }
    },
    computed: {
        models() {
            if (this.selectedBrand) {
                return this.selectedBrand.vehicle_models;
            }
            return [];
        },
        nbResults() {
            // TODO: Refactor to use vehicle count instead of models
            let results = 0
            if (!this.selectedBrand) {
                this.brands?.forEach((b) => {
                    results += b.vehicle_models.length
                })
            } else {
                results += this.selectedBrand.vehicle_models.length
            }
            return results;
        },
        brandsOptions() {
            return this.brands.map((brand: BrandOption) => brand.name);
        },
        modelsOptions() {
            if (this.selectedBrand) {
                return this.selectedBrand.vehicle_models.map((model: ModelOption) => model.name);
            }
        }
    },
    methods: {
        updateBrand(name: string) {
            const selectedBrand = this.brands.find((brand: BrandOption) => brand.name === name);
            if (selectedBrand) {
                this.selectedBrand = selectedBrand;
            }
        },
        updateModel(name: string) {
            if (this.selectedBrand) {
                const selectedModel = this.selectedBrand.vehicle_models.find((model: ModelOption) => model.name === name);
                if (selectedModel) {
                    this.selectedModel = selectedModel;
                }
            }
        },
        navigate() {
            // TODO
        }
    },
})
</script>
