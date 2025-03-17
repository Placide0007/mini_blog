<template>
	<div class="row min-vh-100">
		<div class="d-none col-md-3 d-md-flex justify-content-center align-items-center  sidebar">
			Encore vide
		</div>
		<div v-if="posts.length === 0"
			class="col-md-6 mt-3 d-flex justify-content-center bg-white p-3 rounded content">
			<p>Aucun poste Ajouter</p>
		</div>
		<div v-else class="col-md-6 mt-3 rounded overflow-y-scroll p-3 content bg-white">
			<div v-for="post in posts" :key="post.id">
				<router-link @click="openModal(post)" data-bs-toggle="modal"
					data-bs-target="#modal_content" class="text-decoration-none">
					<div class="card mb-3">
						<div class="card-header">
							<p class="btn btn-dark">{{ post.user.pseudo }}</p>
							<p
								style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
								{{ post.content }}</p>
						</div>
						<div v-if="post.image" class="card-body">
							<img :src="`/storage/${post.image}`" alt="Image du post"
								class="img-fluid" />
						</div>
						<div
							class="card-footer d-flex justify-content-between align-items-center">
							<p>10 commentaires</p>
							<p>60 réactions</p>
						</div>
					</div>
				</router-link>
			</div>
		</div>
		


		<div class="modal fade " id="modal_content" tabindex="-1" aria-labelledby="modal_contentLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button class="modal-title btn btn-dark" id="modal_contentLabel">{{
							selectedPost?.user.pseudo }}</button>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>{{ selectedPost?.content }}</p>
						<div v-if="selectedPost?.image">
							<img :src="`/storage/${selectedPost.image}`" alt="Image du post"
								class="img-fluid"/>
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-between">
						<p>Lorem, ipsum.</p>
						<p>Lorem, ipsum.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="d-none col-md-3 d-md-flex justify-content-center align-items-center sidebar">
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
const selectedPost = ref(null);

const fetchPost = () => {
	const token = localStorage.getItem("auth_token");
	if (!token) {
		router.push("/login");
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

const openModal = (post) => {
	selectedPost.value = post;
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
