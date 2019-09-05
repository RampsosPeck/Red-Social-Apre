<template>
	<div>
		<form @submit.prevent="submit" v-if="isAthenticate">
            
            <div class="card-body">
                   <textarea v-model="body"
                      class="form-control border-0 bg-light mb-3 shadow-sm"
                      name="body"
                      :placeholder="`¿Qué estás pensando ${currentUser.name}?`"></textarea>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" id="create-status">Publicar</button>
            </div>
        </form>
        <div v-else class="card.body">
            <a href="/login">Debes hacer login para comentar</a>
        </div>
	</div>
</template>


<script>



    //console.log(user.content);
	
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


