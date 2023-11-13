<template>

    <router-link :to="{name:'articles'}" class='btn btn-primary'>На главную</router-link><br>

    <router-link class='btn btn-primary mt-2' :to="{name:'articleAutor',params:{id: this.$parent.userId}}">
        Мои статьи
    </router-link><br>

    <router-link class='btn btn-primary mt-2' :to="{name:'articleCreate'}">
        Добавить статью
    </router-link><br>

    <a href='' @click.prevent="exit" class='btn btn-danger mt-2'>Выход</a>


</template>

<script>
    export default {

        methods:{

            exit(){

                axios.post('http://learn/laravel/public/logout')
                    .then(
                        res=>{


                            this.$parent.userType = null
                            this.$parent.userId = null
                            this.$router.push({name:'articles'})

                        }
                    )

            }
        }
    }
</script>
