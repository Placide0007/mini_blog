<template>
	<header class="navbar navbar-expand-md bg-white border-bottom shadow-sm navbar-white px-3 py-0 sticky-top">
		<a href="" class="navbar-brand">
			<img src="../../assets/multicolor.svg" alt="" width="30">
		</a>
		<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#links">
			<i class="bi bi-list-ul fs-2"></i>
		</button>
		<div class="collapse navbar-collapse" id="links">
			<ul class="navbar-nav ms-auto me-auto">
				<router-link class="nav-link nav-item px-3 mb-2 mb-md-0 ms-md-5" active-class="active" to="/">Home</router-link>
				<router-link class="nav-link nav-item px-3 mb-2 mb-md-0 ms-md-5" active-class="active" to="/forum">Forum</router-link>
				<router-link class="nav-link nav-item px-3 mb-2 mb-md-0 ms-md-5" active-class="active" to="/about">About</router-link>
				<router-link v-if="conn" class="nav-link nav-item px-3 mb-2 mb-md-0 ms-md-5" active-class="active" to="/aboutMe" >Mon profile</router-link>
			</ul>
			<div v-if="conn" class="btn-group">
				<button class="btn mb-3 mb-md-0 btn-dark">{{ userData.pseudo }}</button>
				<router-link class="btn  btn-primary mb-3 mb-md-0 " @click="logout"
					to="/register">Se deconnecter</router-link>
			</div>
			<div v-else>
				<router-link class="btn  btn-primary mb-3 mb-md-0 " to="/register">Se connecter</router-link>
			</div>
		</div>
	</header>
</template>

<script setup>
import { computed } from 'vue';
import { useRouter } from 'vue-router';
const router = useRouter()
const conn = computed(() => {
	return localStorage.getItem('auth_token') !== null;
});
const logout = () => {
	localStorage.removeItem('auth_token');
	router.push('/login');
};

const userData = computed(() => {
	const user = localStorage.getItem('user_data');
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
