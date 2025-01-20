<script setup>
    import Layout from '../Layouts/LayoutSecond.vue';
    defineOptions({layout: Layout});
    defineProps({
        user: String
    })
</script>
<template>
    <Head title="Another Layout" />
    <h1>Hello Buddy ! This is {{ user }}'s' Page</h1>
</template>