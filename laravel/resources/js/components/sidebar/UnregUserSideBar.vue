<template>

    <router-link :to="{name:'articles'}" class='btn btn-primary'>На главную</router-link><br>

    <form method='post' action='' enctype='multipart/form-data'
          class='form-label'>
        Email<br>
        <input type='text' name='email' v-model="email">
        <br>Пароль<br>
        <input type='password' name='password' v-model="password">
        <br>
        <input type='submit'  @click.prevent="getToken" value='Войти' class='mt-3 btn btn-success'>
    </form>

    <router-link :to="{name:'register'}" >Регистрация</router-link><br>


    <h5 class="text-danger text-center" v-if="errors" v-for="error in errors">
        {{error[0]}}
    </h5>

</template>

<script>
    export default {

        data(){

            return{
                email: null,
                password: null,
                errors: null
            }

        },

        methods:{
            getToken(){
                axios.get('http://learn/laravel/public/sanctum/csrf-cookie').then(response => {

                   // console.log(response)

                    axios.post('http://learn/laravel/public/login',{email:this.email, password:this.password })
                        .then(
                            res=>{

                                this.errors = null;
                                this.$parent.userType = res.data.user_type
                                this.$parent.userId = res.data.id

                            }
                        )
                        .catch(error=>{
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors
                            console.log(this.$parent.title)
                        })

                })


            }


        }


    }
</script>
