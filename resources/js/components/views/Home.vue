<template>
  <div class="d-flex flex-column min-vh-100">
    <div class="row p-md-5 py-0 bg-white flex-grow-1">
      <div
        class="col-12 col-md-6 px-md-5 py-3 d-flex justify-content-center flex-column hero"
      >
        <h1 class="figure-caption">Lorem ipsum dolor sit amet.</h1>
        <h1 class="fw-bold title">Lorem ipsum dolor, sit amet.</h1>
        <h1 class="display-6 text-primary">Recusandae animi deserunt.</h1>
        <p class="small">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, necessitatibus
          voluptates? Magni error voluptatum, recusandae animi deserunt est vero illo.
        </p>

        <div class="btn-group">
          <router-link class="btn btn-primary mb-3 mb-md-0" to="/about"
            >Voir plus d'information</router-link
          >
          <router-link class="btn btn-dark mb-3 mb-md-0" to="/register"
            >S'inscrire gratuitement</router-link
          >
        </div>
      </div>

      <div
        class="col-12 col-md-6 d-none d-md-flex justify-content-center align-items-center flex-column"
      >
        <img src="../../assets/Business deal-rafiki.svg" alt="" />
      </div>
    </div>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import { computed } from "vue";
import Footer from "../layout/Footer.vue";
const userData = computed(() => {
  const user = localStorage.getItem("user_data");
  return user ? JSON.parse(user) : {};
});
const conn = computed(() => {
  return localStorage.getItem("auth_token") !== null;
});
</script>

<style scoped>
.title {
  font-size: 75px !important;
}

.hero {
  background-color: #e4e3e31c;
}
</style>
