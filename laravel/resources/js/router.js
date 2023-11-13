import {createRouter, createWebHistory} from 'vue-router';
import ArticlesComponent from "./components/ArticlesComponent.vue";
import ArticleShowComponent from "./components/ArticleShowComponent.vue";
import ArticleAutorComponent from "./components/ArticleAutorComponent.vue";
import ArticleTagComponent from "./components/ArticleTagComponent.vue";
import ArticleCreateComponent from "./components/ArticleCreateComponent.vue";
import ArticleEditComponent from "./components/ArticleEditComponent.vue";
import AdminComponent from "./components/AdminComponent.vue";
import RegistrationComponent from "./components/RegistrationComponent.vue";



export default createRouter({
    history:createWebHistory(),

    routes:[
        {
            path:'/laravel/public/vue/articles',
            component: ArticlesComponent,
            name: "articles",
       },
        {
            path:'/laravel/public/vue/article/:id',
            component: ArticleShowComponent,
            name: "article",

        },
        {
            path:'/laravel/public/vue/article/tag/:tag',
            component: ArticleTagComponent,
            name: "articleTag",
        },
        {
            path:'/laravel/public/vue/article/autor/:id',
            component: ArticleAutorComponent,
            name: "articleAutor",
        },
        {
            path:'/laravel/public/vue/article/create',
            component: ArticleCreateComponent,
            name: "articleCreate",
        },
        {
            path:'/laravel/public/vue/article/edit/:id',
            component: ArticleEditComponent,
            name: "articleEdit",
        },
        {
            path:'/laravel/public/vue/admin',
            component: AdminComponent,
            name: "admin",
        },
        {
            path:'/laravel/public/vue/registration',
            component: RegistrationComponent,
            name: "register",
        }
    ]


})
