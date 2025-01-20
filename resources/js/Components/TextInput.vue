<script setup>
const model = defineModel({
    type: null,
    required: true,
});

defineProps({
    name: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'text',
    },
    message: String
})
</script>
<template>
    <div class="mb-4">
        <label :for="name" class="mb-1">{{label}}</label>
        <input :type="type" :id="name" v-model="model" :class="{'!ring-red-500' : message}">
        <small class="error" v-if="message">{{ message }}</small>
    </div>
</template>