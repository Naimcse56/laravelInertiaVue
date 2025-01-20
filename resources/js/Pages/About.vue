<script setup>
    defineProps({
        user: String
    })
</script>

<template>
    <Head title="About" />
    <h1>Hello Buddy ! This is {{ user }}'s' Page</h1>
</template>