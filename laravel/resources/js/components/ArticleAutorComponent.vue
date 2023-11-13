<template>

    <article-component
        v-for="article in articles"
        v-bind:article=article
        v-bind:text = article.text.slice(0,250)
    ></article-component>

    <h3 class="text-primary text-center" v-if="articles === 0">Нет ни одной статьи</h3>

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
               error: null
           }

        },

        methods:{

            getArticles(){

                // this.$parent.$parent.title = 'Статьи автора '

                axios.get('http://learn/laravel/public/api/article/autor?id=' + this.$route.params.id )
                    .then(
                        res=>{

                            console.log(res)
                            this.error = null
                            this.$parent.$parent.title = 'Статьи автора ' + res.data.user.lastname

                            if(res.data.article[0]){
                                this.articles = res.data.article
                            }else {
                                this.articles=0
                            }


                        }
                    )
                    .catch(error=>{
                        this.$parent.$parent.title = 'Статьи автора '
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
