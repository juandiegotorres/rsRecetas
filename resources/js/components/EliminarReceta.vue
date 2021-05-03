<template>
    <button class="btn btn-danger" v-on:click="eliminarReceta">
        <i class="fa fa-trash"></i>
    </button>
</template>

<script>
    
    export default {
        props: ['recetaId'],
        methods: {
            
            eliminarReceta(){
                this.$swal({
                    title: '¿Desea eliminar esta receta?',
                    text: "Una vez eliminada, no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, estoy seguro',
                    cancelButtonText: 'No'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        const params = {
                            id: this.recetaId
                        }

                        //Enviar peticion al servidor
                        axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                            .then(respuesta=> {
                                this.$swal({
                                    title: 'Receta eliminada',
                                    // text: 'Your file has been deleted.',
                                    icon: 'success'
                                })

                                //Eliminar receta del DOM
                                this.$el.parentNode.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode.parentNode);
                            })
                            .catch(error => {
                                console.log(error);
                            })
                    }
            })
        }
    }
}
</script>
