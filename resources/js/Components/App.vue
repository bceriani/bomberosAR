<template>
  <div class="flex">
    <Menu />
    <router-view></router-view>
  </div>
</template>

<script>
import Menu from './Menu.vue';

export default {
  name: 'App',
  components: {
      Menu,
  },
};
</script>
