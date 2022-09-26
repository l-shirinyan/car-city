<template>
    <div class="fixed top-0 left-0 h-full w-full z-max flex justify-center items-center">
        <div class="backdrop-blur-lg bg-blure-bg absolute top-0 left-0 h-full w-full -z-1">
        </div>
        <img @click="$emit('close')" class="cursor-pointer absolute top-5 right-5"
            src="/storage/images/icons/close-carousel.svg" width="25" alt="close carousel">

        <pano-viewer class="absolute top-0 bottom-0 left-0 right-0 mx-0 my-12 HD:m-20" width="400" height="400"
            :image="imageUrl" />
    </div>
</template>
<script>
import { PanoViewer } from "@egjs/vue3-view360";

export default {
    props: {
        imageUrl: {
            type: String
        }
    },
    components: {
        PanoViewer
    }
}
</script>

<style>

</style>