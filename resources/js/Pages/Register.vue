<script setup>
import { reactive } from 'vue';
import { useForm  } from '@inertiajs/vue3'
import TextInput from '../Components/TextInput.vue';

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
            <TextInput name="name" label="Name" v-model="form.name" :message="form.errors.name"/>
            <TextInput type="email" name="email" label="Email" v-model="form.email" :message="form.errors.email"/>
            <TextInput type="password" name="password" label="Password" v-model="form.password" :message="form.errors.password"/>
            <TextInput type="password" name="password_confirmation" label="Confirm Password" v-model="form.password_confirmation" :message="form.errors.password_confirmation"/>
            <div>
                <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">Register Now</button>
            </div>
        </form>
    </div>
</template>