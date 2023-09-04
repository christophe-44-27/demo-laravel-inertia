<script setup>
const props = defineProps({
    imgClass: {
        type: String,
        default: 'w-24 h-auto items-start'
    },
    imgUrl: {
        type: String,
    }
})
</script>
<template>
    <img :src="props.imgUrl" :class="props.imgClass" alt=""/>
</template>
