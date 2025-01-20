<script setup>
import { reactive } from 'vue';
import { useForm  } from '@inertiajs/vue3'

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    form.post('/register', {
        onError: () => form.reset('password','password_confirmation'),
    });
}

</script>
<template>
    <Head :title="$page.component" />
    <h1 class="title">Register A New Account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label for="name">Name</label>
                <input type="text" id="name" v-model="form.name">
                <small v-if="form.errors.name">{{ form.errors.name }}</small>
            </div>
            <div class="mb-6">
                <label for="email">Email</label>
                <input type="email" id="email" v-model="form.email">
                <small v-if="form.errors.email">{{ form.errors.email }}</small>
            </div>
            <div class="mb-6">
                <label for="password">Password</label>
                <input type="password" id="password" v-model="form.password">
                <small v-if="form.errors.password">{{ form.errors.password }}</small>
            </div>
            <div class="mb-6">
                <label for="password_confirmation">Confirm Password</label>
                <input type="text" id="password_confirmation" v-model="form.password_confirmation">
                <small v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</small>
            </div>
            <div>
                <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">Register Now</button>
            </div>
        </form>
    </div>
</template>