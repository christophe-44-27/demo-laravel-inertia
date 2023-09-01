<script setup>
import AtomText from "@/components/AtomText.vue";

const props = defineProps({
    message: String
})
</script>

<template>
    <AtomText>{{ props.message }}</AtomText>
</template>
