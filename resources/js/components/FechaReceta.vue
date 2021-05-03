<template>
    <span >{{formatearFecha}}</span>
</template>
<script>
    export default {
        props: ['fecha'],
       
        mounted(){
            
        },        

        computed: {
            formatearFecha() {
                return moment(this.fecha).locale('es').format('DD [de] MMM [del] YYYY');
            }
        }
    }
</script>