<template>

    <article-component
        v-for="article in articles"
        v-bind:article=article
        v-bind:text = article.text
    ></article-component>

    <h3 class="text-danger text-center" v-if="error">
        {{error}}
    </h3>

</template>

<script>
import ArticleComponent from "./ArticleComponent.vue";

    export default {

       components:{
           'article-component':ArticleComponent
       },

        data(){
           return{
               articles : null,
               error : null
           }

        },

        methods:{

            getArticles(){
                axios.get('http://learn/laravel/public/api/article?id=' + this.$route.params.id )
                    .then(
                        res=>{
                            console.log(res.data)
                            this.articles = res.data
                        })
                    .catch(error=>{
                        this.error = error.response.data.message
                     })
            }

        },
        mounted(){
            this.getArticles();
        }
    }
</script>
