import { createApp } from 'vue'
import filterSidebar from "./../components/shared/FilterSidebar.vue"
import cCarsList from  "./../components/shared/CarsList.vue"

if (document.querySelector('#v-filter-sidebar')) {
    createApp({
        components: {
          filterSidebar,
          cCarsList
        }
    }).mount('#v-filter-sidebar')
}
