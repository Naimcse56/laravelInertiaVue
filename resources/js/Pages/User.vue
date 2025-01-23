<script setup>
import { ref, watch } from "vue";
import PaginationLinks from '../Components/PaginationLink.vue';
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";

const props = defineProps({
                    users: Object,
                    searchTerm: String
                });

const search = ref(props.searchTerm);

watch(
  search,
  debounce((q) => router.get("/users-list", { search: q }, { preserveState: true }), 500)
);


const dateFormat = (data) => 
    new Date(data).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>
<template>
    <Head :title="` ${$page.component}`" />
    <h1 class="title">Users List</h1>
    <div class="w-4/4 mx-auto">
        <div class="flex justify-end mb-4">
        <div class="w-1/4">
            <input type="search" placeholder="Search" v-model="search" />
        </div>
        </div>
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