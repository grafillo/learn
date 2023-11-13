<template>
    <div class=" text-bg-primary text-center p-3">
        <h2>{{ title }}</h2>
    </div>

    <div class="row p-5 ">

        <div class='col-9 col ' >


            <router-view></router-view>

        </div>


        <div class="col-3 col text-right  bg-body-tertiary ">

            <unreg-user-side-bar v-if="!userType"></unreg-user-side-bar>
            <user-side-bar v-if="userType === 'user'"></user-side-bar>
            <admin-side-bar v-if="userType === 'admin'"></admin-side-bar>


        </div>
    </div>
</template>

<script>
    import UnregUserSideBar from "./sidebar/UnregUserSideBar.vue";
    import UserSideBar from "./sidebar/UserSideBar.vue";
    import AdminSideBar from "./sidebar/AdminSideBar.vue";

    export default {

        components: {AdminSideBar, UserSideBar, UnregUserSideBar},

        data(){

            return{
                title : null,
                userType : null,
                userId: null,
            }

        },
        methods:{

            getUser(){

                if(document.cookie){
                    axios.get('http://learn/laravel/public/api/checktoken')
                        .then(
                            res=>{

                                if(res.data.user_type){
                                    this.userType = res.data.user_type
                                    this.userId = res.data.id
                                    console.log(this.userType)
                                }

                            }
                        )
                }
            }

        },

        mounted() {

            this.getUser()
        }
    }
</script>
