<template>
    <div>
        <header class="bg-pink-500 text-white">
            <nav class="flex items-center justify-between p-4 mx-auto max-w-screen-lg">
                <div class="space-x-6">
                    <Link :href="route('home')">Home</Link>
                    <Link :href="route('about')">About</Link>
                    <Link :href="route('another_layout')">Another Layout</Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>