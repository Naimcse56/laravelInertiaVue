<template>
    <div>
        <header class="bg-pink-500 text-white">
            <nav class="flex items-center justify-between p-4 mx-auto max-w-screen-lg">
                <div class="space-x-6">
                    <Link href="/">Home</Link>
                    <Link href="/about">About</Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>