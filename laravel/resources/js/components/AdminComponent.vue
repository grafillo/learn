<template>
    <div class='row bg-white mb-4 border'>

        <h3 class="text-danger text-center" v-if="errors" v-for="error in errors">
            {{error}}
        </h3>

        <div class="p-3">
            Поиск автора
            <form method='post' action='' enctype='multipart/form-data'
                  class="form-label">
                <input type='text' name='search' v-model="search" >&nbsp;
                <input @click.prevent='searchAutor' type='submit' value='Поиск' class="btn btn-success">
            </form>
        </div>

        <div class="p-3 ">
        <table border="1" class="table  table-striped">
        <thead>
         <tr>
             <th>ID</th>
             <th>Имя</th>
             <th>Фамилия</th>
             <th>Email</th>
             <th></th><th></th>
         </tr>
        </thead>
        <tbody>
             <template v-for="autor in autors" class='align-middle'>
                <tr :class="isEdit(autor.id) ? 'd-none' :''">
                 <td>{{autor.id}}</td>
                 <td>{{autor.firstname}}</td>
                 <td>{{autor.lastname}}</td>
                 <td>{{autor.email}}</td>

                 <td><a href='' @click.prevent="deleteUser(autor.id)" class='btn btn-danger btn-sm'>
                    Удалить
                </a>
                </td>
                <td><a href='' @click.prevent="changeEditUser(autor.id,autor.firstname,autor.lastname,autor.email)" class='btn btn-warning btn-sm'>
                    Редактировать
                </a>
                </td>
                </tr>

                 <tr :class="isEdit(autor.id) ? '' :'d-none'">
                     <td>{{autor.id}}</td>
                     <td><input type="text" class="form-control" v-model="firstname"></td>
                     <td><input type="text" class="form-control" v-model="lastname"></td>
                     <td><input type="text" class="form-control" v-model="email"></td>

                     <td><a href='' @click.prevent="deleteUser(autor.id)" class='btn btn-danger btn-sm'>
                         Удалить
                     </a>
                     </td>
                     <td><a href=''  @click.prevent="editUser()" class='btn btn-warning btn-sm'>
                         Обновить
                     </a>
                     </td>
                 </tr>


             </template>
        </tbody>
        </table>
        </div>

    </div>
</template>

<script>
    export default {

        data(){
           return{
               autors : null,
               errors: null,
               search: "",
               editUserId: null,

               firstname: null,
               lastname: null,
               email: null,

           }

        },

        methods:{

            getAutors(){
                axios.get('http://learn/laravel/public/api/users')
                    .then(
                        res=>{
                            console.log(res.data)
                            this.errors = null
                            this.$parent.$parent.title = 'Панель администратора'
                            this.autors = res.data
                            this.editUserId = null

                        }
                    ).catch(error=>{
                    this.errors = error.response.data.message
                })
            },

            searchAutor(){
                axios.post('http://learn/laravel/public/api/users/search',{search:this.search})
                    .then(
                        res=>{
                            console.log(res.data)
                            this.errors = null
                            this.autors = res.data

                        }
                    ).catch(error=>{
                    this.errors = error.response.data.message
                })

            },

            changeEditUser(id,firstname,lastname,email){

                this.editUserId = id
                this.firstname = firstname
                this.lastname = lastname
                this.email = email

            },

            isEdit(id){

              return this.editUserId === id
            },

            editUser(){

                axios.patch('http://learn/laravel/public/api/users',{id:this.editUserId ,firstname:this.firstname,lastname:this.lastname,email:this.email})
                    .then(
                        res=>{
                            console.log(res.data)
                            this.errors = null
                            this.getAutors()


                        }
                    ).catch(error=>{
                    console.log(error)
                    this.errors = error.response.data.errors
                })
            },

            deleteUser(id){

                axios.delete('http://learn/laravel/public/api/users/'+id,)
                    .then(
                        res=>{
                            console.log(res.data)
                            this.errors = null
                            this.getAutors()
                            this.editUserId = null

                        }
                    ).catch(error=>{
                    console.log(error)
                    this.errors = error.response.data.errors
                })


            },

        },


        mounted(){
            this.getAutors();
        }
    }
</script>
