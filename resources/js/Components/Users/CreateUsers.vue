<template>
    <section class="w-full min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-8">
          <h1 class="text-center text-3xl font-semibold text-gray-800 mb-6">
            Crear Usuario
          </h1>
  
          <router-link to="/users" class="inline-block mb-6">
            <span class="group relative inline-block text-sm font-medium text-red-600 focus:outline-none focus:ring active:text-red-500">
              <span class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-red-600 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>
              <span class="relative block border border-current bg-white px-6 py-2"> Volver Atrás </span>
            </span>
          </router-link>
  
          <form @submit.prevent="createUser" class="space-y-6">
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
              <div class="relative">
                <input v-model="user.name" type="text" id="name" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm text-gray-700" placeholder="Nombre completo" required />
                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                </span>
              </div>
            </div>
  
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
              <div class="relative">
                <input v-model="user.email" type="email" id="email" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm text-gray-700" placeholder="Correo electrónico" required />
                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                  </svg>
                </span>
              </div>
            </div>
  
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
              <div class="relative">
                <input v-model="user.password" type="password" id="password" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm text-gray-700" placeholder="Contraseña" required />
                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </span>
              </div>
            </div>
  
            <div>
              <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
              <div class="relative">
                <select v-model="user.role" id="role" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm text-gray-700" required>
                  <option value="">Seleccionar Rol</option>
                  <option value="admin">Administrador</option>
                  <option value="user">Usuario</option>
                </select>
                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </div>
            </div>
  
            <div>
              <label for="rank" class="block text-sm font-medium text-gray-700 mb-1">Rango</label>
              <div class="relative">
                <input v-model="user.rank" type="number" id="rank" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm text-gray-700" placeholder="Rango" required />
                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </span>
              </div>
            </div>
  
            <div>
              <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nombre de usuario</label>
              <div class="relative">
                <input v-model="user.username" type="text" id="username" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm text-gray-700" placeholder="Nombre de usuario" required />
                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                </span>
              </div>
            </div>
  
            <div>
              <label for="picprofile" class="block text-sm font-medium text-gray-700 mb-1">Foto de perfil</label>
              <div class="relative">
                <input type="file" id="picprofile" @change="handleFileUpload" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm text-gray-700" accept="image/*" />
                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </span>
              </div>
            </div>
  
            <div class="flex items-center justify-end">
              <button type="submit" class="group relative inline-block text-sm font-medium text-green-600 focus:outline-none focus:ring active:text-green-500">
                <span class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-green-600 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>
                <span class="relative block border border-current bg-white px-8 py-3"> Crear Usuario </span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'UserCreationForm',
    data() {
      return {
        user: {
          name: '',
          email: '',
          password: '',
          role: '',
          rank: '',
          username: '',
          picprofile: null
        }
      };
    },
    methods: {
      handleFileUpload(event) {
        this.user.picprofile = event.target.files[0];
      },
      async createUser() {
        try {
          // Obtener el token CSRF
          const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  
          // Configurar el token CSRF en los headers de Axios
          axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
  
          const formData = new FormData();
          for (const key in this.user) {
            formData.append(key, this.user[key]);
          }
  
          const response = await axios.post('/users', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          });
  
          console.log('Usuario creado:', response.data);
          alert('Usuario creado con éxito');
          this.$router.push('/users');
        } catch (error) {
          console.error('Error al crear el usuario:', error);
          alert('Error al crear el usuario. Por favor, inténtelo de nuevo.');
        }
      }
    }
  };
  </script>