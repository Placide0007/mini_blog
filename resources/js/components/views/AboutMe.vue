<template>
	<div class="d-flex flex-column min-vh-100">
		<div class="row flex-grow-1">
			<div class="card col" style="width:500px;">
				<div class="card-body">
					<h1 class="card-title text-center mb-5 ">Informations Personnelles</h1>

					<div class="input-group mb-3">
						<LabelComponent class="input-group-text bg-dark text-light" label="Pseudo" />
						<InputComponent disabled :value="userData.pseudo" />
					</div>

					<div class="input-group mb-3">
						<LabelComponent class="input-group-text bg-dark text-light" label="Email" />
						<InputComponent disabled :value="userData.email" />
					</div>
				</div>
			</div>
		</div>
		<Footer/>
	</div>
</template>
<script setup>
import { computed } from 'vue';
import InputComponent from '../common/InputComponent.vue';
import LabelComponent from '../common/LabelComponent.vue';
import Footer from '../layout/Footer.vue';

const userData = computed(() => {
	const user = localStorage.getItem('user_data');
	return user ? JSON.parse(user) : {};
});
</script>
