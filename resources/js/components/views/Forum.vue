<template>
  <div class="row min-vh-100">
    <div class="d-none  col-md-3 d-md-flex justify-content-center align-items-center sidebar">
      Encore vide
    </div>
    <div
      v-if="posts.length === 0"
      class="col-md-6 mt-3 d-flex justify-content-center bg-white p-3 rounded content"
    >
      <p>Aucun poste Ajouter</p>
    </div>
    <div v-else class="col-md-6 mt-3 rounded overflow-y-scroll content">
      <div v-for="post in posts" :key="post.id">
        <div class="card mb-3">
          <div class="card-header">
            <p class="btn btn-dark">{{ post.user.pseudo }}</p>
            <h1 class="lead fw-bold text-primary">{{ post.title }}</h1>
            <p
              style="
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 100%;
              "
            >
              {{ post.content }}
            </p>
          </div>
          <div v-if="post.image" class="card-body">
            <img :src="`/storage/${post.image}`" alt="Image du post" class="img-fluid" />
          </div>
          <div class="card-footer d-flex justify-content-between align-items-center">
            <p>10 commentaires</p>
            <p>60 réactions</p>
          </div>
        </div>
      </div>
    </div>

    <div class="d-none  col-md-3 d-md-flex justify-content-center align-items-center sidebar">
      Encore vide
    </div>

    <FooterVue />
  </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import { useToast } from "vue-toastification";
import FooterVue from "../layout/Footer.vue";

const toast = useToast();
const router = useRouter();

const posts = ref([]);

const fetchPost = () => {
  const token = localStorage.getItem("auth_token");
  if (!token) {
    router.push("/register");
    toast.info("Inscrivez-vous ici gratuitement pour acceder au Forum");
    return;
  }

  axios
    .get("http://127.0.0.1:8000/api/posts", {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    })
    .then((response) => {
      posts.value = response.data;
    })
    .catch((error) => {
      console.error("Erreur de récupération des posts", error);
      alert("Erreur de récupération des posts");
    });
};

onMounted(() => {
  fetchPost();
});
</script>

<style scoped>
.row.min-vh-100 {
  min-height: 100vh;
}

.sidebar {
  background-color: #f8f9fa;
  min-height: 100vh;
}

.content {
  overflow-y: auto;
  height: 100vh;
}

.card {
  border-radius: 0.375rem;
}
</style>
