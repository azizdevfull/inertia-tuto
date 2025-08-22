<template>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Create Post</h1>

        <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block">Title</label>
                <input
                    v-model="form.title"
                    type="text"
                    class="border p-2 w-full"
                />
            </div>

            <div class="mb-4">
                <label class="block">Content</label>
                <textarea
                    v-model="form.content"
                    class="border p-2 w-full"
                ></textarea>
            </div>

            <button
                type="submit"
                class="px-4 py-2 bg-green-600 text-white rounded"
            >
                Save
            </button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    content: "",
});

const submit = () => {
    form.post("/posts");
};
</script>
