<template>
	<div>
		<form @submit.prevent="submit">
            
            <div class="card-body">
                   <textarea
                      v-model="body"
                      class="form-control border-0 bg-light mb-3 shadow-sm"
                      name="body"
                      placeholder="¿Qué estás pensando Jorge peralta?"></textarea>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" id="create-status">Publicar</button>
            </div>
        </form>

	</div>
</template>

<script>
	
	export default {

		data(){
			return {
				body: ''
			}
		},
		methods: {

			submit(){
				axios.post('/statuses',{body:this.body})
					.then( res => {
						//console.log(res.data)
                        EventBus.$emit('status-created', res.data.data);
                        //this.statuses.push(res.data);
						this.body=''
					})
					.catch( error => {
						console.log(error.response.data)
					})
			}
		}


	}

</script>

<style scoped>
	
</style>


