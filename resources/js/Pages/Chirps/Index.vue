<script setup>
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
defineProps(['title','subtitle'])

const form = useForm({
    message: '',
})

function submit() {
    form.post(route('chirps.store'), {
        onSuccess: () => form.reset(),
        preserveState: false
    })
}
</script>

<template>
    <Head title="Mondongo"/>

    <AuthenticatedLayout>

        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <textarea v-model="form.message" placeholder="What's on your mind?" class="block w-full rounded-md border-gray-300 bg-white"></textarea>
                            <InputError :message="form.errors.message"/>
                            <PrimaryButton :disabled="form.processing" class="mt-2">
                                {{ form.processing ? 'Enviando...' : 'Chirps' }}
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>