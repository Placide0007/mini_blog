<template>
  <router-link class="btn btn-primary mt-5" style="position: fixed" to="/"
    >Retour à la page d'accueil</router-link
  >
  <div class="d-flex justify-content-center align-items-center vh-100 flex-column">
    <form
      @submit.prevent="login"
      method="post"
      class="col-md-3 col-12 rounded bg-white shadow p-4"
    >
      <div v-if="globalError.error" class="text-danger">
        {{ globalError.error }}
      </div>
      <h1 class="text-center mb-5">Connexion</h1>
      <LabelComponent label="Email" />
      <InputComponent v-model="data.email" type="email" />
      <div v-if="errors.email" class="text-danger mb-2 small">{{ errors.email }}</div>
      <LabelComponent label="Mot de passe" />
      <InputComponent v-model="data.password" type="password" />
      <div v-if="errors.password" class="text-danger mb-2 small">
        {{ errors.password }}
      </div>
      <InputComponent type="submit" class="bg-primary text-light" value="Se connecter" />
      <div>
        <LabelComponent label="Pas de compte?" />
        <router-link class="fw-bold" to="/register">S'inscrire</router-link>
      </div>
    </form>
  </div>
</template>

<script setup>
import { reactive } from "vue";
import InputComponent from "../common/InputComponent.vue";
import LabelComponent from "../common/LabelComponent.vue";
import axios from "axios";
import { useToast } from "vue-toastification";
import { useRouter } from "vue-router";

const router = useRouter();
const toast = useToast();

const data = reactive({
  email: "",
  password: "",
});

const errors = reactive({
  email: "",
  password: "",
});

const globalError = reactive({
  error: "",
});

const login = () => {
  axios
    .post("http://127.0.0.1:8000/api/login", data)
    .then((response) => {
      if (response.data.token) {
        const userData = response.data.user;
        localStorage.setItem("auth_token", response.data.token);
        localStorage.setItem("user_data", JSON.stringify(userData));
        console.log(localStorage.setItem("user_data", JSON.stringify(userData)));
        router.push("/forum");
      }
    })
    .catch((error) => {
      if (error.response.data && error.response.data.errors) {
        errors.name = error.response.data.errors.name
          ? error.response.data.errors.name[0]
          : "";
        errors.email = error.response.data.errors.email
          ? error.response.data.errors.email[0]
          : "";
        errors.password = error.response.data.errors.password
          ? error.response.data.errors.password[0]
          : "";
      } else {
        toast.error("les informations saisi sont incorrects");
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
