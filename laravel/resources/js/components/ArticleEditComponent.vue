<template>

    <div class='row bg-white mb-4 border'>
        <form method='post' action=''
              class='form-label'>
            Заголовок<br>
            <input type='text' v-model="title" name='text' ><br>
            Текст<br>
            <textarea  name='text' v-model="text" rows='4' cols='100'></textarea><br>

            Выберите тэги:<br>
            <div v-for="tag in tags">
                <input type='checkbox' v-model="checkbox"  v-bind:value='tag.id' >{{ tag.tag }}
            </div>


            <input @click.prevent='edit' type='submit' value='Редактировать статью' class='btn btn-success'>
        </form>
    </div>

    <h3 class="text-danger text-center" v-if="errors" v-for="error in errors">
        {{error}}
    </h3>

</template>

<script>

    export default {

        data(){
           return{

               tags : [],
               errors: null,
               title: null,
               text: null,
               checkbox: [],

           }

        },

        methods:{

            getTags(){
                axios.get('http://learn/laravel/public/api/tag/get')
                    .then(
                        res=>{
                             this.$parent.$parent.title = 'Редактирование статьи'
                            console.log(res.data)
                            this.tags = res.data
                                                                              }
                    )
                    .catch(error=>{
                    this.errors = error.response.data.message
                    })
            },
            edit(){
                console.log(this.$route.params.id)
                axios.patch('http://learn/laravel/public/api/article',{title:this.title, text:this.text, articleId:this.$route.params.id, tags:this.checkbox})
                    .then(
                        res=>{
                            this.errors = null;
                            console.log(res.data)
                           // this.$router.push({name:'articles'})
                            this.$router.go(-1);

                        }
                    )
                    .catch(error=>{
                        console.log(error.response.data.errors);
                        this.errors = error.response.data.errors
                    })
            },
            getArticle(){
                axios.get('http://learn/laravel/public/api/article?id=' + this.$route.params.id )
                    .then(
                        res=>{
                           // console.log(res.data[0].tags)
                            this.article = res.data
                            this.title = res.data[0].title
                            this.text = res.data[0].text


                            res.data[0].tags.forEach((tags)=> {
                                this.checkbox.push(tags.id);
                            });


                        })
                    .catch(error=>{
                        this.errors = error.response.data.errors

                    })
            }



        },
        mounted(){
            this.getTags();
            this.getArticle()


        },





    }
</script>
