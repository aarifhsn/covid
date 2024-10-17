<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import { router } from "@inertiajs/vue3"; // Import router to handle routes
import axios from "axios"; // Import axios

const search = ref("");

const getData = () => {
    axios
        .get(route("dashboard", { search: search.value })) // Assuming "route" is defined globally
        .then((response) => {
            console.log(response);
        })
        .catch((error) => {
            console.log(error);
        });
};
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
                        <input
                            type="search"
                            name="search"
                            id="search"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            v-model="search"
                            @input="getData"
                        />
                        <!-- Display searched value -->
                        <div
                            v-if="search"
                            class="mt-4 p-4 bg-indigo-100 rounded-md shadow-md"
                        >
                            <p class="text-indigo-600 font-semibold">
                                You searched for:
                                <span class="font-bold">{{ search }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
