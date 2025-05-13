<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import MyLayout from '@/Layouts/MyLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


    defineProps(['title','subtitle'])
</script>
<template>
    <AuthenticatedLayout>
        <template #title>
            <h1>{{ title }}</h1>
        </template>
        <h2>{{ subtitle }}</h2>
    </AuthenticatedLayout>
</template>