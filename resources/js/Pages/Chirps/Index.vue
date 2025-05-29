<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ChirpItem from '@/Components/ChirpItem.vue';
import ChirpForm from '@/Components/ChirpForm.vue';
defineProps(['chirps'])

</script>

<template>
    <Head title="Mondongo"/>

    <AuthenticatedLayout>

        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Chirps
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ChirpForm/>
                    </div>
                </div>
                <div class="mt-6 divide-y rounded-lg bg-gray-800 shadow-md dark:divide-gray-700 dark:bg-white">
                    <ChirpItem v-for="chirp in chirps" :key="`chirps-${chirp.id}`" :chirp="chirp"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>