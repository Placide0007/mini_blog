<template>
  <div class="row">
    <div class="col-md-6 bg-light offset-md-3 mt-5 vh-100 p-5">
      <form @submit.prevent="post" enctype="multipart/form-data">
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
import { useToast } from "vue-toastification";

const router = useRouter();
const toast = useToast();
const handleImageUpload = (event) => {
  data.image = event.target.files[0];
};

const data = reactive({
  content: "",
  image: null,
});
const errors = reactive({

  content: "",
  image: "",
});

const post = () => {
  const formData = new FormData();
  formData.append("content", data.content);

  if (data.image) {
    formData.append("image", data.image);
  }

  axios
    .post("http://127.0.0.1:8000/api/posts", formData, {
      headers: {
        Authorization: `Bearer ${localStorage.getItem("auth_token")}`,
      },
    })
    .then((response) => {
      if (response.data.post) {
        toast.success("poste Ajouter avec succés");
        router.push("/forum");
      }
    })
    .catch((error) => {
      if (error.response.data && error.response.data.errors) {
        errors.content = error.response.data.errors.content
          ? error.response.data.errors.content[0]
          : "";
        errors.image = error.response.data.errors.image
          ? error.response.data.errors.image[0]
          : "";
      } else {
        toast.error("Erreur de creation de poste");
      }
    });
};
</script>
