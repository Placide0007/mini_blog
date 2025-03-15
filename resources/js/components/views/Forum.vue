<template>
  <div class="row">
    <div v-for="post in posts" :key="post.id">
      <div class="col-md-6 offset-md-3 bg-white mb-3 shadow mt-3 rounded">
        <div class="card">
          <div class="card-header">
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
          <img :src="`/storage/${post.image}`" alt="Image du post" class="img-fluid" />
          <div class="card-body p-3">
            <p class="fw-bold">{{ post.user.pseudo }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const posts = ref([]);

// Fonction pour récupérer les posts
const fetchPost = () => {
  const token = localStorage.getItem("auth_token");
  if (!token) {
    alert("Token d'authentification manquant");
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

// Charger les posts lors du montage du composant
onMounted(() => {
  fetchPost();
});
</script>
