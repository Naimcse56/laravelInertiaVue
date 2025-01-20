<script setup></script>
<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home</Link>
                </div>
                <div v-if="$page.props.auth.user">
                    <div class="space-x-6">
                        <Link :href="route('logout')" class="nav-link" method="post" as="button" type="button">Logout</Link>
                    </div>
                </div>
                <div v-else="$page.props.auth.user" class="space-x-6">
                    <Link :href="route('register')" class="nav-link">Register</Link>
                    <Link :href="route('login')" class="nav-link">Login</Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>