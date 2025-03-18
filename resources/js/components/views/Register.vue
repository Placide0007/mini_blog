<template>
  <router-link class="btn btn-primary mt-5 " style="position: fixed" to="/"
    >Retour à la page d'accueil</router-link>
  <div class="d-flex justify-content-center align-items-center  vh-100">
    <form
      @submit.prevent="register"
      method="post"
      class="col-md-3 col-12 rounded bg-white shadow p-4"
    >
      <h1 class="text-center mb-5">Registration</h1>
      <LabelComponent label="Pseudo" />
      <InputComponent v-model="data.pseudo" type="text" />
      <div v-if="errors.pseudo" class="text-danger small mb-2">{{ errors.pseudo }}</div>

      <LabelComponent label="Email" />
      <InputComponent v-model="data.email" type="email" />
      <div v-if="errors.email" class="text-danger small mb-2">{{ errors.email }}</div>

      <LabelComponent label="Mot de passe" />
      <InputComponent v-model="data.password" type="password" />
      <div v-if="errors.password" class="text-danger small mb-2">
        {{ errors.password }}
      </div>

      <InputComponent type="submit" class="bg-primary text-light" value="Soumettre" />

      <div>
        <LabelComponent label="A dejà un compte?" />
        <router-link class="fw-bold" to="/login">Se connecter</router-link>
      </div>
    </form>
  </div>
</template>

<script setup>
import { reactive } from "vue";
import InputComponent from "../common/InputComponent.vue";
import LabelComponent from "../common/LabelComponent.vue";
import axios from "axios";
import { useRouter } from "vue-router";
const router = useRouter();
const data = reactive({
  pseudo: "",
  email: "",
  password: "",
});
const errors = reactive({
  pseudo: "",
  email: "",
  password: "",
});

const register = () => {
  axios
    .post("http://127.0.0.1:8000/api/register", data)
    .then((response) => {
      if (response.data.token) {
        const userData = response.data.user;
        localStorage.setItem("auth_token", response.data.token);
        localStorage.setItem("user_data", JSON.stringify(userData));
        router.push("/forum");
      }
    })
    .catch((error) => {
      if (error.response.data && error.response.data.errors) {
        errors.pseudo = error.response.data.errors.pseudo
          ? error.response.data.errors.pseudo[0]
          : "";
        errors.email = error.response.data.errors.email
          ? error.response.data.errors.email[0]
          : "";
        errors.password = error.response.data.errors.password
          ? error.response.data.errors.password[0]
          : "";
      }
    });
};
</script>

<style scoped>
.RegisterFormWidth {
  width: 350px;
}
input:not(input[type="submit"]) {
  background-color: rgba(231, 226, 226, 0.082);
}
.small {
  font-size: smaller;
}
</style>
