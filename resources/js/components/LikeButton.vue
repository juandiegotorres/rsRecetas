<template>
    <div class="esfera">
        <div class="heart" @click="likeReceta" :class="{['is_animating is_clicked'] : isActive}"></div>
         <h4 class="text-center">{{cantidadLikes}}</h4>
    </div>
    
</template>

<script>

export default {
    props: ['recetaId', 'like', 'likes'],
    data: function() {
        return {
            isActive: this.like,
            totalLikes: this.likes
        } 
    },
    methods: {
        likeReceta() {          
            axios.post('/recetas/' + this.recetaId)
                .then(respuesta => {
                    if(respuesta.data.attached.length > 0) {
                        this.$data.totalLikes++;
                    } else {
                        this.$data.totalLikes--;
                    }
                    this.isActive = !this.isActive;
                })
                .catch(error => {
                    if(error.response.status === 401) {
                        window.location = '/login';
                    } else {
                        console.log(error);
                    }
                })
        }
    },
    computed: {
        cantidadLikes: function() {
            if(this.totalLikes>1 || this.totalLikes < 1) {
                return "A " + this.totalLikes + " personas les gusta esta receta"
            } else {
                return "A " + this.totalLikes + " persona le gusta esta receta"
            }
        }
    }
}
</script>