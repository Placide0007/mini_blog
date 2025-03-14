<template>
	<div class="d-flex flex-column min-vh-100">
		<!-- Contenu principal -->
		<div class="row p-5 bg-white flex-grow-1">
			<div class="col-12 col-md-6 p-5">
				<h1 class="figure-caption">C'est vous le Hero  <span class="fw-bol text-primary" >[ {{ userData.pseudo }} ]</span> </h1>
				<h1 class="display-1 fw-bold title">Lorem ipsum dolor, sit amet.</h1>
				<h1 class="display-6 text-primary">Recusandae animi deserunt.</h1>
				<p class="small">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, necessitatibus voluptates?
					Magni error voluptatum, recusandae animi deserunt est vero illo.
				</p>

				<div class="btn-group">
					<router-link class="btn btn-primary mb-3 mb-md-0" to="/about">Voir plus d'information</router-link>
					<router-link class="btn btn-dark mb-3 mb-md-0" to="/register">S'inscrire gratuitement</router-link>
				</div>
			</div>

			<div class="col-12 col-md-6 d-flex justify-content-center align-items-center flex-column">
				<img src="../../assets/multicolor.svg" alt="" width="300">
				<p class="figure-caption mt-3">Lorem ipsum dolor sit amet consectetur.</p>
			</div>
		</div>

		<!-- Footer -->
		<Footer />
	</div>
</template>

<script setup>
import { computed } from 'vue';
import Footer from '../layout/Footer.vue';
const userData = computed(() => {
	const user = localStorage.getItem('user_data');
	return user ? JSON.parse(user) : {};
});
</script>

<style scoped>
.title {
	font-size: 80px !important;
}
</style>
