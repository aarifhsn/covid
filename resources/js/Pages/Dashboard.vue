<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import axios from "axios";

const search = ref("");
const users = ref([]);
const hasSearched = ref(false);

// Function to fetch users with or without a search query
const getData = (query = "") => {
    hasSearched.value = !!query; // Mark as searched if query exists
    axios
        .get(route("dashboard"), { params: { search: query } }) // Pass search query if available
        .then((response) => {
            users.value = response.data.data; // Update users array with the response
        })
        .catch((error) => {
            console.error(error);
        });
};

onMounted(() => {
    getData();
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Search input -->
                        <input
                            type="search"
                            name="search"
                            id="search"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            v-model="search"
                            @input="getData(search)"
                        />

                        <!-- Search results or all users -->
                        <div v-if="users.length" class="mt-6">
                            <h3 class="text-lg font-semibold mb-4">Users:</h3>
                            <ul>
                                <li
                                    v-for="user in users"
                                    :key="user.id"
                                    class="mb-4"
                                >
                                    <div
                                        class="p-4 border border-gray-300 rounded-md shadow-md"
                                    >
                                        <p>
                                            <strong>ID:</strong> {{ user.id }}
                                        </p>
                                        <p>
                                            <strong>Name:</strong>
                                            {{ user.name }}
                                        </p>
                                        <p>
                                            <strong>Email:</strong>
                                            {{ user.email }}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div v-if="hasSearched && users.length === 0">
                            <p>No results found.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
