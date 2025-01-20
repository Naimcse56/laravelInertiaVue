<script setup>
    import Layout from '../Layouts/LayoutSecond.vue';
    defineOptions({layout: Layout});
    defineProps({
        user: String
    })
</script>
<template>
    <Head :title="$page.component" />
    <h1>{{ $page.props.auth.user }}</h1>  
</template>