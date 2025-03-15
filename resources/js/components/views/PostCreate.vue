<template>
  <div class="row">
    <div class="col-md-6 bg-light offset-md-3 mt-5 vh-100 p-5">
      <form @submit.prevent="post" enctype="multipart/form-data">
        <LabelComponent label="Titre" />
        <InputComponent type="text" v-model="data.title" class="mb-2" />
        <div v-if="errors.title" class="text-danger small mb-2">{{ errors.title }}</div>
        <LabelComponent label="Contenu" />
        <TextAreaComponent
          rows="10"
          v-model="data.content"
          class="mb-2"
          cols="20"
          placeholder="Entrer le contenu"
        />
        <div v-if="errors.content" class="text-danger small mb-2">
          {{ errors.content }}
        </div>
        <LabelComponent label="Image" />
        <InputComponent type="file" @change="handleImageUpload" />
        <InputComponent type="submit" class="bg-primary text-light" value="Publier" />
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive } from "vue";
import InputComponent from "../common/InputComponent.vue";
import LabelComponent from "../common/LabelComponent.vue";
import TextAreaComponent from "../common/TextAreaComponent.vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();

const handleImageUpload = (event) => {
  data.image = event.target.files[0];
};

const data = reactive({
  title: "",
  content: "",
  image: null, // Définir l'image comme null par défaut
});
const errors = reactive({
  title: "",
  content: "",
  image: "",
});

const post = () => {
  // Crée un objet FormData
  const formData = new FormData();

  // Ajouter les données du formulaire à FormData
  formData.append("title", data.title);
  formData.append("content", data.content);

  // Ajouter l'image si elle est présente
  if (data.image) {
    formData.append("image", data.image);
  }

  // Envoyer la requête POST avec FormData
  axios
    .post("http://127.0.0.1:8000/api/posts", formData, {
      headers: {
        Authorization: `Bearer ${localStorage.getItem("auth_token")}`,
        "Content-Type": "multipart/form-data", // Indiquer que les données sont envoyées en multipart/form-data
      },
    })
    .then((response) => {
      if (response.data.post) {
        router.push("/forum");
      }
    })
    .catch((error) => {
      if (error.response.data && error.response.data.errors) {
        errors.title = error.response.data.errors.title
          ? error.response.data.errors.title[0]
          : "";
        errors.content = error.response.data.errors.content
          ? error.response.data.errors.content[0]
          : "";
        errors.image = error.response.data.errors.image
          ? error.response.data.errors.image[0]
          : "";
      } else {
        alert("Erreur de post");
      }
    });
};
</script>
