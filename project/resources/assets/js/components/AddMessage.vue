<template>
	
	<form @submit.prevent='onSubmit' @keydown='form.errors.clear()'>
		
		<div class="form-group">
    		
    		<textarea class="form-control" id="body" name="body" placeholder="Skriv ditt meddelande här" rows="3" v-model='form.body'></textarea>
    		<span class="help is-danger" v-if="form.errors.has('body')" v-text="form.errors.get('body')"></span>

  		</div>

  		<button type="submit" class="btn btn-primary">Skicka meddelande</button>

	</form>

</template>


<script>
	
export default {
	data() {
		return {
			form: new Form({body: ''})
		}
	},
	methods: {
		onSubmit() {
			this.form.post('/api/messages/').then(status => this.$emit('completed', status));
		}
	}

}

</script>