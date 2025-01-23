<script setup>
import { reactive } from 'vue';
import { useForm  } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';

const form = useForm({
    email: null,
    password: null,
    remember: null,
});

const submit = () => {
    form.post(route('login'), {
        onError: () => form.reset('password'),
    });
}

</script>
<template>
    <Head :title="` ${$page.component}`" />
    <h1 class="title">Login Your Account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput type="email" name="email" label="Email" v-model="form.email" :message="form.errors.email"/>
            <TextInput type="password" name="password" label="Password" v-model="form.password" :message="form.errors.password"/>
            <div class="flex item-center justify-between mb-2">
                <div class="flex item-center gap-2">
                    <input type="checkbox" v-model="form.remember">
                    <label for="remeber">Remeber me</label>
                </div>
                <div>
                    <p class="text-slate-600">Need an account? <Link :href="route('register')" class="text-link">Register</Link></p>
                </div>
            </div>
            <div>
                <button class="primary-btn" :disabled="form.processing">Login Now</button>
            </div>
        </form>
    </div>
</template>