<script setup>
import { ref, onMounted } from "vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
    posts: Object,
});

const items = ref([...props.posts.data]);
const nextPageUrl = ref(props.posts.next_page_url);
const loading = ref(false);

const loadMore = () => {
    if (!nextPageUrl.value || loading.value) return;
    loading.value = true;

    router.get(
        nextPageUrl.value,
        {},
        {
            preserveScroll: true,
            preserveState: true,
            replace: true,
            onSuccess: (page) => {
                items.value.push(...page.props.posts.data);
                nextPageUrl.value = page.props.posts.next_page_url;
            },
            onFinish: () => {
                loading.value = false;
            },
        }
    );
};

onMounted(() => {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            loadMore();
        }
    });

    observer.observe(document.querySelector("#scroll-trigger"));
});
</script>

<template>
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">
            📌 Posts <Link href="/posts/create">Create</Link>
        </h1>

        <div class="space-y-4">
            <div
                v-for="post in items"
                :key="post.id"
                class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition"
            >
                <h2 class="font-semibold text-xl text-gray-900 mb-2">
                    {{ post.title }}
                </h2>
                <p class="text-gray-600 leading-relaxed">
                    {{ post.body }}
                </p>
            </div>
        </div>

        <!-- Scroll trigger -->
        <div id="scroll-trigger" class="h-10"></div>

        <!-- Loading indicator -->
        <div v-if="loading" class="flex justify-center py-6">
            <svg
                class="animate-spin h-6 w-6 text-blue-500"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >
                <circle
                    class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4"
                ></circle>
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8v8H4z"
                ></path>
            </svg>
        </div>
    </div>
</template>
