<script setup>
import { reactive } from 'vue';
import { useForm  } from '@inertiajs/vue3'
import TextInput from '../Components/TextInput.vue';
import PaginationLinks from '../Components/PaginationLink.vue';

const form = useForm({
    name: null,
    avatar: null,
    preview: null,
});

const change = (e) => {
    form.avatar = e.target.files[0];
    form.preview = URL.createObjectURL(e.target.files[0]);
}
const submit = () => {
    form.post(route('update_profile'), {
        onError: () => form.reset('name','avatar'),
    });
}

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
    <h1 class="title">Update Your Profile {{ $page.props.auth.user.name }}</h1>
    <div class="w-3/4 mx-auto">
        <form @submit.prevent="submit">
            <div class="grid place-items-center">
                <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
                    <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                        <span class="bg-white/70 pb-2 text-center">Avatar</span>
                    </label>
                    <input hidden type="file" name="avatar" id="avatar" @input="change">
                    <img :src="form.preview" class="object-cover w-28 h-28">
                </div>
                <small>{{ form.errors.avatar }}</small>
            </div>
            <TextInput name="name" label="Name" v-model="form.name" :message="form.errors.name"/>
            <div>
                <button class="primary-btn" :disabled="form.processing">Update</button>
            </div>
        </form>
    </div>
    <div class="w-4/4 mx-auto mt-2">
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