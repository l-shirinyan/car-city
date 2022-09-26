<template>
    <button :class="isDark ? 'bg-primary' : 'bg-white search-btn'" class="w-full duration-200 py-3 rounded-btn 2K:py-5">
        <div>
            <span :class="isDark  ? 'text-white' : 'text-primary'" class="duration-200 text-base font-bold leading-m">{{ title}}</span>
            <span v-if="nbResults >- 1" :class="isDark  ? 'text-white' : 'text-primary'" class="duration-200 ml-1 text-base text-primary leading-m opacity-60">({{ nbResults }})</span>
        </div>
    </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
    name: "search-btn",
    props: {
        nbResults: {
            type: Number,
            default: 0
        },
        title: {
            type: String,
            default: "Search",
        },
        isDark: {
            type: Boolean,
            default: false,
        }
    },
    data() {
        return {};
    },
});
</script>

<style scoped>
.search-btn:hover {
    background-color: #0158A8;
}
.search-btn:hover span {
    color: #fff !important;
}
</style>