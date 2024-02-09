<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand :to="{ name: 'home' }">Crud Exemple</b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    </b-navbar>
  </div>
</template>

<style scoped></style>

<script>
import {
  mapActions,
  mapGetters,
} from 'vuex';

export default {
  name: "Navbar",
  computed: {
    ...mapGetters({
      isAuthenticated: "auth/isAuthenticated",
    }),
  },
  methods: {
    ...mapActions({
      logout: "auth/logout",
    }),
    submit() {
      this.logout();
      this.$router.replace({
        name: "home",
      });
    },
  },
};
</script>
