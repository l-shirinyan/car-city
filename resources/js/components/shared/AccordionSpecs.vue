<template>
    <div v-if="Object.keys(specifications).length">
        <template v-for="acc in accordions" :key="acc.id">
            <div v-if="specifications && specifications[acc.id]?.length" class="py-8 border-b border-gray/400 cursor-pointer hover:bg-bg-light">
                <div
                    class="flex flex-row justify-between text-m font-medium"
                    @click="show === acc.id ? show = false : show = acc.id"
                >
                    {{ acc.label }}
                    <span v-if="show === acc.id">-</span>
                    <span v-else>+</span>
                </div>
                <div class="grid grid-cols-1 HD:grid-cols-2 mt-8" v-show="show === acc.id">
                    <p
                        v-for="(spec, i) in specifications[acc.id]"
                        :key="`spec-${acc.id}-${i}`"
                    >
                        ・ {{ spec.specification }}
                    </p>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
export default {
    props: {
        specs: { type: Object },
    },
    data() {
        return {
            show: false,
            accordions: [
                {
                    label: 'Exterior',
                    id: 'exterior',
                },
                {
                    label: 'Entertainement',
                    id: 'entertainement',
                },
                {
                    label: 'Passive safety',
                    id: 'passive_safety',
                },
                {
                    label: 'Security',
                    id: 'security',
                },
                {
                    label: 'Interior',
                    id: 'interior',
                },
                {
                    label: 'Driver Convenience',
                    id: 'driver_convenience',
                },
            ],
            specifications: [],
        }
    },
    mounted() {
        this.specifications = JSON.parse(this.specs)
    },
}
</script>
