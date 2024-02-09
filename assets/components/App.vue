<template>
  <div>
    <navbar />
    <router-view />
  </div>
</template>
<script>
import { mapGetters } from 'vuex';

import Navbar from './Navbar';

export default {
  name: "App",
  components: {
    Navbar,
  },
};
</script>
