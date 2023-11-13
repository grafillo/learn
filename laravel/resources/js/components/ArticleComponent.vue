<template>
    <div class='row bg-white mb-4 border'>

        <div class='bg-warning text-danger'>
            <b>
                 <router-link :to="{name:'articleAutor',params:{id: article.autor.id}}">
                    {{article.autor.firstname + article.autor.lastname }}
                </router-link>
            </b>
        </div>

        <div class='text-bg-warning'>
            <router-link class='link-dark' :to="{name:'article',params:{id:article.id}}"> <b>{{article.title}}</b></router-link>
        </div>

        <div class='col mt-0'>
            {{ article.text }}
            <br>
             <router-link class='link-underline link-underline-opacity-0' v-for="tag in article.tags" :to="{name:'articleTag',params:{tag:tag.tag}}">{{ tag.tag +' ' }} </router-link>
            <br>


            <template v-if="this.$parent.$parent.$parent.userType === 'admin'  || this.$parent.$parent.$parent.userId === article.autor.id">
            <router-link :to="{name:'articleEdit',params:{id:article.id}}" class='btn btn-warning btn-sm'>Редактировать</router-link>
            &nbsp
            <a @click.prevent='deleteArticle' href="" class='btn btn-danger btn-sm' >Удалить</a>
            </template>


        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }

        },
        props: ['article','text'],
        methods:{
            deleteArticle(){
                console.log(this.article.id)
                axios.delete('http://learn/laravel/public/api/article/'+ this.article.id)
                    .then(
                        res=>{
                            this.errors = null;
                            console.log(res.data)

                            // this.$router.push({name:'articles'})
                            this.$parent.getArticles();


                        }
                    )
                    .catch(error=>{
                        console.log(error.response.data.errors);
                        this.errors = error.response.data.errors
                    })

          }

        },
        mounted() {
            console.log('Component mounted article.')
            console.log(this.$parent.$parent.$parent.title)

        }
    }
</script>
