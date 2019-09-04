<template>
    <div>
        <div v-for="status in statuses" v-text="status.body"></div>
    </div>
</template>

<script>
    export default {
        name: "StatusesList.vue",
        data(){
            return{
                statuses: []
            }
        },
        mounted(){
            axios.get('/statuses')
                .then(res => {
                    //console.log(res.data.data);
                    this.statuses = res.data.data
                })
                .catch(err => {
                    console.log(err.response.data);
                });
            EventBus.$on('status-created', status => {
                //this.statuses.push(status);        En lugar de PUSH usamos unshift para acomodar primero la ultima entrada del comentario
                this.statuses.unshift(status);
            })
        }
    }
</script>

<style scoped>
</style>
