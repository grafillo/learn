<template>

    <article-component
        v-for="article in articles"
        v-bind:article=article
        v-bind:text = article.text.slice(0,250)
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
               error: null,
           }

        },

        methods:{

            getArticles(){
                console.log(this.$route.params.tag);
                axios.get('http://learn/laravel/public/api/article/tag?tag=' + this.$route.params.tag )
                    .then(
                        res=>{
                             this.$parent.$parent.title = 'Статьи по тэгу ' + this.$route.params.tag
                            console.log(res.data)
                            this.articles = res.data

                                                  }
                    )
                    .catch(error=>{
                        this.$parent.$parent.title = 'Статьи по тэгу '
                    this.error = error.response.data.message
                    })
            }

        },
        mounted(){
            this.getArticles();


        },

        watch: {
            '$route.query': {
                handler() {
                    this.getArticles()
                },
            },
        },



    }
</script>
