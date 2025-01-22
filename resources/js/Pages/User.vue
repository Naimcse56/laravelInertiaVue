<script setup>
import PaginationLinks from '../Components/PaginationLink.vue';

defineProps({
    users: String
})

const dateFormat = (data) => 
    new Date(data).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>
<template>
    <Head :title="$page.component" />
    <h1 class="title">Users List</h1>
    <div class="w-4/4 mx-auto">
        <table>
            <thead>
                <tr class="bg-slate-300">
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <th>
                        <img class="avatar" :src="user.avatar ? 'storage/'+user.avatar : ''" alt="">
                    </th>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ dateFormat(user.created_at) }}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <PaginationLinks :paginator="users" />
        </div>
    </div>
</template>