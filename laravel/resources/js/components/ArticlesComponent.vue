<template>

    <article-component
        v-for="article in articles"
        v-bind:article=article
        v-bind:text = article.text.slice(0,250)
    ></article-component>

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
           }

        },

        methods:{

            getArticles(){
                axios.get('http://learn/laravel/public/api/articles')
                    .then(
                        res=>{
                            console.log(res.data)
                            this.$parent.$parent.title = 'Главная страница'
                            this.articles = res.data

                        }
                    )
            }

        },
        mounted(){
            this.getArticles();
        }
    }
</script>
