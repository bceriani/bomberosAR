import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue';
import { createMemoryHistory, createRouter } from 'vue-router';
import App from './Components/App.vue';
import Home from './Components/Home.vue';
import Users from './Components/Users/Users.vue';
import CreateUsers from './Components/Users/CreateUsers.vue';
import Profile from './Components/Profile.vue';

const routes = [    
    { path: '/', component: Home },
    { path: '/users', component: Users },
    { path: '/users/create', component: CreateUsers },
    { path: '/profile', component: Profile },
];

const router = createRouter({
    history: createMemoryHistory(),
    routes,
});

createApp(App)
    .use(router)
    .mount('#app');
