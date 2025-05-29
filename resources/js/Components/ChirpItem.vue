<script setup>
import { ref } from 'vue';
import Dropdown from './Dropdown.vue';
import DropdownButton from './DropdownButton.vue';
import DropdownLink from './DropdownLink.vue';
import ChirpForm from './ChirpForm.vue';

const editing = ref(false)

defineProps({
  chirp: Object,
})
</script>

<template>
  <div class="p-6 flex space-x-2">
    <svg
      class="h-6 w-6 text-gray-600 dark:text-gray-400 -scale-x-100"
      fill="none"
      stroke="currentColor"
      stroke-width="1.5"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
      aria-hidden="true"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"
      ></path>
    </svg>
    <div class="flex-1">
      <div class="flex justify-between items-center">
        <div>
          <span class="text-gray-900 dark:text-gray-500">
            {{ chirp.user.name }}
          </span>
          <small class="ml-2 text-sm text-gray-500 dark:text-gray-600">
            {{ chirp.created_at }}
          </small>
          <small v-if="chirp.edited" class="text-sm text-gray-500 dark:text-gray-600">
            &middot; edited
          </small>
        </div>
      </div>
      <ChirpForm v-if="editing" :chirp="chirp" @cancel="editing = false" class="mt-4"/>
      <p v-else class="mt-4 text-lg text-gray-700 dark:text-gray-900">
        {{ chirp.message }}
      </p>
    </div>
    <Dropdown v-if="chirp.user.id === $page.props.auth.user.id">
      <template #trigger>
        <button>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 text-gray-400"
            viewBox="0 0 20 20"
            fill="currentColor">
            <path
              d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"
            />
          </svg>
        </button>
      </template>
      <template #content>
        <DropdownButton @click="editing = true" >Edit</DropdownButton>
        <DropdownLink as="button" :href="route('chirps.destroy', chirp.id)" method="delete" :preserve-state="false">Eliminar</DropdownLink>
      </template>
    </Dropdown>
  </div>
</template>

<style scoped></style>