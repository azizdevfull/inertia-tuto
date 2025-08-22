<template>
    <div class="p-6 text-center">
        <h1 class="text-3xl font-bold text-blue-600">{{ welcomeText }}</h1>
        <p class="mt-2 text-gray-600">Home sahifasi</p>

        <!-- Inertia link -->
        <Link href="/about" class="text-indigo-600 underline">
            About sahifasiga o‘tish →
        </Link>
        <Link href="/posts">Posts</Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    welcomeText: String,
});
</script>
