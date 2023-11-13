<template>

    <div class="text-center">
    Имя<br>
    <input type='text' v-model="firstname" name='text'><br>
    Фамилия<br>
    <input type='text' v-model="lastname" name='text'><br>
    Email<br>
    <input type='text' v-model="email" name='text'><br>
    Password<br>
    <input type='password' v-model="password" name='text'><br>
    Подтвердите Password<br>
    <input type='password' v-model="password_confirmation" name='text'><br>
    <input type='submit'  @click.prevent="register" value='Зарегистрироваться' class='mt-3 btn btn-success'>


    <h5 class="text-danger text-center" v-if="errors" v-for="error in errors">
        {{error[0]}}
    </h5>
    </div>
</template>

<script>
import ArticleComponent from "./ArticleComponent.vue";

    export default {



        data(){
           return{

               errors: null,
               firstname: null,
               lastname: null,
               email: null,
               password: null,
               password_confirmation: null,

           }

        },

        methods:{

            register(){
                axios.get('http://learn/laravel/public/sanctum/csrf-cookie').then(response => {

                    axios.post('http://learn/laravel/public/register',{password:this.password,password_confirmation:this.password_confirmation,firstname:this.firstname,email:this.email,lastname:this.lastname})
                        .then(
                            res => {
                                this.$parent.$parent.title = 'Регистрация'
                                this.errors = null;
                                this.$parent.$parent.userType = res.data.user_type
                                this.$parent.$parent.userId = res.data.id
                                console.log(res);
                                this.$router.push({name:'articles'})
                            }
                        )
                        .catch(error => {

                            this.errors = error.response.data.errors
                        })

                })
            }

        },
        mounted(){

        }
    }
</script>
