<script>
import { RouterView } from 'vue-router';

import FooterView from './components/footerVue.vue';
import HeaderView from './components/headerVue.vue';

export default {
  components: {
    HeaderView,
    RouterView,
    FooterView
  }
}
</script>

<template>

  <HeaderView />
  <RouterView />
  <FooterView />
</template>

<style scoped></style>
