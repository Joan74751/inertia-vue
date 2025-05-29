<script setup>
import InputError from './InputError.vue';
import PrimaryButton from './PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import SecondaryButton from './SecondaryButton.vue';

const { chirp } = defineProps({
    chirp: Object
})

const form = useForm({
    message: chirp ? chirp.message : '',
})

function update(chirp) {
    form.patch(route('chirps.update', chirp), {
        onSuccess: () => form.reset(),
        preserveState: false,
    })
}

function submit() {
    if (chirp?.id) {
        update(chirp.id);
        return;
    }

    form.post(route('chirps.store'), {
        onSuccess: () => form.reset(),
        preserveState: false,
    })
}
</script>

<template>
    <form @submit.prevent="submit">
        <textarea v-model="form.message" placeholder="What's on your mind?" class="block w-full rounded-md border-gray-300 bg-white"></textarea>
        <InputError :message="form.errors.message"/>
        <PrimaryButton :disabled="form.processing" class="mt-2">
            {{ form.processing ? 'Enviando...' : 'Chirps' }}
        </PrimaryButton>
        <SecondaryButton v-if="chirp?.id" @click="$emit('cancel')" class="ml-2">
            Cancelar
        </SecondaryButton>
    </form>
</template>

<style scoped>

</style>