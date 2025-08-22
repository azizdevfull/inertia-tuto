<template>
    <form @submit.prevent="submit">
        <input type="text" v-model="form.name" placeholder="Name" />
        <input type="email" v-model="form.email" placeholder="Email" />
        <input type="password" v-model="form.password" placeholder="Password" />
        <button type="submit">Register</button>
    </form>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
});

const submit = () => {
    form.post("/register");
};
console.log(submit);
</script>
<style lang=""></style>
