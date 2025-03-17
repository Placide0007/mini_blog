<template>
	<header class="navbar navbar-expand-md bg-white border-bottom shadow-sm navbar-white px-5 py-0 sticky-top">
		<a href="" class="navbar-brand">
			<img src="../../assets/multicolor.svg" alt="" width="30" />
		</a>
		<button class="navbar-toggler btn-sm btn" data-bs-toggle="collapse" data-bs-target="#links">
			<i class="navbar-toggler-icon  fs-2"></i>
		</button>
		<div class="collapse navbar-collapse" id="links">
			<ul class="navbar-nav ms-auto me-auto">
				<router-link class="nav-link nav-item px-3 mb-2 mt-2 mt-md-0 mb-md-0 ms-md-5"
					active-class="active" to="/">Accueil</router-link>
				<router-link class="nav-link nav-item px-3 mb-2 mb-md-0 ms-md-5" active-class="active"
					to="/forum">Forum</router-link>
				<router-link class="nav-link nav-item px-3 mb-2 mb-md-0 ms-md-5" active-class="active"
					to="/about">A
					propos</router-link>
				<router-link v-if="conn" class="nav-link nav-item px-3 mb-2 mb-md-0 ms-md-5"
					active-class="active" to="/aboutMe">Mon profile</router-link>
				<router-link v-if="conn"
					class="nav-link nav-item px-3 mb-2 mb-md-0 ms-md-5 bg-primary text-light"
					active-class="active" to="/postcreate">Creer un poste</router-link>
			</ul>
			<div v-if="conn" class="btn-group">
				<button class="btn mb-3 mb-md-0 btn-dark">{{ userData.pseudo }}</button>
				<router-link data-bs-target="#content" data-bs-toggle="modal"
					class="btn btn-primary mb-3 mb-md-0" to="/login">Se
					deconnecter</router-link>
			</div>
			<div v-else>
				<router-link class="btn btn-primary mb-3 mb-md-0" to="/login">Se connecter</router-link>
			</div>
		</div>
	</header>
	<div class="modal fade" id="content">
		<div class="modal-dialog-centered modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button data-bs-dismiss="modal" class="btn-close"></button>
				</div>
				<div class="modal-body">
					<p class="text-center fw-bold lead ">Se deconnecter de mini_blog ?</p>
					<div class="d-flex justify-content-evenly align-items-center">
						<button class="btn btn-primary" data-bs-dismiss="modal"
							data-bs-target="content" @click="logout">Oui</button>
						<button class="btn btn-dark" data-bs-dismiss="modal"
							data-bs-target="content">Non</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>


<script setup>
import { computed } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
const conn = computed(() => {
	return localStorage.getItem("auth_token") !== null;
});
const logout = () => {
	localStorage.clear();
	router.push("/login");
};

const userData = computed(() => {
	const user = localStorage.getItem("user_data");
	return user ? JSON.parse(user) : {};
});
</script>

<style scoped>
.active {
	background-color: #80808025;
}

.nav-link:hover {
	background-color: #80808025;
}
</style>
