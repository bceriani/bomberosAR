<template>
    <section class="w-full">
        <h1 class="text-center mt-6 text-xl font-semibold text-gray-800 sm:text-3xl md:text-4xl">
            Personal
        </h1>

        <div class="mx-10 mt-5 rounded-lg border border-gray-200">
            <div class="overflow-x-auto rounded-t-lg">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap text-center px-4 py-2 font-medium text-gray-800">Nombre</th>
                            <th class="whitespace-nowrap text-center px-4 py-2 font-medium text-gray-800">Email</th>
                            <th class="whitespace-nowrap text-center px-4 py-2 font-medium text-gray-800">Rol</th>
                            <th class="whitespace-nowrap text-center px-4 py-2 font-medium text-gray-800">Rank</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="user in users" :key="user.id">
                            <td class="whitespace-nowrap text-center px-4 py-2 font-medium text-gray-800">{{ user.name
                                }}</td>
                            <td class="whitespace-nowrap text-center px-4 py-2 text-gray-700">{{ user.email }}</td>
                            <td class="whitespace-nowrap text-center px-4 py-2 text-gray-700">{{ user.role }}</td>
                            <td class="whitespace-nowrap text-center px-4 py-2 text-gray-700">{{ user.rank }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
                <!-- Paginación (si es necesaria) -->
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Menu',

    data() {
        return {
            users: []
        };
    },
    mounted() {
        this.fetchUsers();
    },
    methods: {
        async fetchUsers() {
            try {

                const response = await axios.get('/users');
                this.users = response.data;

            } catch (error) {

                console.error('Error fetching users:', error);
                alert('Failed to load users. Please try again later.');

                if (error.response) {
                    console.log('Error data:', error.response.data);
                    console.log('Error status:', error.response.status);
                } else {
                    console.log('Error:', error.message);
                }
            }
        }
    }
};
</script>
