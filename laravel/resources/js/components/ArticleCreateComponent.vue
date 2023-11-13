<template>

    <div class='row bg-white mb-4 border'>
        <form method='post' action=''
              class='form-label'>
            Заголовок<br>
            <input type='text' v-model="title" name='text'><br>
            Текст<br>
            <textarea  name='text' v-model="text" rows='4' cols='100'></textarea><br>

            Выберите тэги:<br>
            <div v-for="tag in tags">
                <input type='checkbox' v-model="checkbox"  v-bind:value='tag.id'>{{ tag.tag }}
            </div>


            <input @click.prevent='create' type='submit' value='Добавить статью' class='btn btn-success'>
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
               tags : null,
               errors: null,
               title: null,
               text: null,
               checkbox: [],
           }

        },

        methods:{

            getTags(){
                this.$parent.$parent.title = 'Добавление статьи'

                axios.get('http://learn/laravel/public/api/tag/get')
                    .then(
                        res=>{

                            console.log(res.data)
                            this.tags = res.data
                                                                              }
                    )
                    .catch(error=>{
                        this.errors = error.response.data.errors
                    })
            },
            create(){
                console.log(this.checkbox)
                axios.post('http://learn/laravel/public/api/article',{title:this.title, text:this.text, userId:this.$parent.$parent.userId, tags:this.checkbox})
                    .then(
                        res=>{
                            this.errors = null;
                            this.$router.push({name:'articleAutor',params:{id:this.$parent.$parent.userId}})
                            console.log(res.data)

                        }
                    )
                    .catch(error=>{
                        console.log(error.response.data.errors);
                        this.errors = error.response.data.errors
                    })
            }



        },
        mounted(){
            this.getTags();


        },





    }
</script>
