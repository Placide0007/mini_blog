<template>
	<div class="col-md-3 col-12">
		<router-link class="btn btn-primary mt-1" to="/forum">Retour au Forum de discussion</router-link>
	</div>
	<div v-if="post">
		<div class="col-12 offset-md-3 col-md-6 p-3 bg-white">
			<div class="card">
				<div class="card-header">
					<button class="btn btn-dark mb-3">{{ post.user.pseudo }}</button>
					<p class="text-primary fw-bold" >{{ post.title }}</p>
					<p>{{ post.content }}</p>
				</div>
				<div v-if="post.image" class="card-body">
					<div>
						<img :src="`/storage/${post.image}`" alt="Image du post" class="img-fluid" />
					</div>
				</div>
				<div class="card-footer d-flex justify-content-between align-items-center">
					<p>10 reactions</p>
					<p>20 commentaires</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
const post = ref(null);
const route = useRoute();

const fetchPost = () => {
	const postId = route.params.id;
	const token = localStorage.getItem("auth_token");
	try {
		const response = axios.get(`http://127.0.0.1:8000/api/posts/${postId}`, {
			headers: {
				Authorization: `Bearer ${token}`,
			},
		}).then(response => {
			post.value = response.data.post;
		});
	} catch (error) {
		alert("Erreur de récupération du post");
	}
};
onMounted(() => {
	fetchPost();
});
</script>
