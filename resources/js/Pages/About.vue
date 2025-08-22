<template>
    <div class="p-6 text-center">
        <h1 class="text-3xl font-bold text-green-600">{{ aboutText }}</h1>
        <p class="mt-2 text-gray-600">About sahifasi</p>

        <!-- Inertia link -->
        <Link href="/" class="text-indigo-600 underline">
            Home sahifasiga qaytish →
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    aboutText: String,
});
</script>
