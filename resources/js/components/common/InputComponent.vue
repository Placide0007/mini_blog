<template>
	<input class="form-control mb-2"  v-bind="$attrs" :value="modelValue" @input="$emit('update:modelValue',$event.target.value)" />
</template>
<script setup >
	defineProps({
		modelValue:String
	})
</script>
