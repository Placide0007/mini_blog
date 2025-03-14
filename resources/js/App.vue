<template>
	<Header v-if="showHeader" ></Header>
	<div class="container-fluid">
		<router-view></router-view>
	</div>
</template>
<script setup >
	import { computed } from 'vue';
	import Header from './components/layout/Header.vue';
	import { useRoute } from 'vue-router';
	const route = useRoute();
	const noHeader = ['/login','/register']
	const showHeader = computed(() => !noHeader.includes(route.path))
</script>
