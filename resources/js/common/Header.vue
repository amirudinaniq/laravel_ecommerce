<template>
   <header class="header-area pt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="mini-navbar">
                        <li v-if="isUserLogin == 'true'">Notifications</li>
                        <li>Languages</li>
                        <li v-if="isUserLogin != 'true'">Need help?</li>
                        <li v-if="isUserLogin == 'true'">
                            <Popper :hover="false" :arrow="true">
                                <button class="btn-avatar">
                                    <img class="user-avatar" src="/images//mikey.jpg" alt="icon">{{user.name}}
                                </button>
                                <template #content>
                                    <ul class="user-options">
                                        <li @click="action('account')">My Account</li>
                                        <li @click="action('orders')">My Purchaser</li>
                                        <li @click="action('settings')">Setting</li>
                                        <li @click="action('logout')">Logout</li>
                                    </ul>
                                </template>
                            </Popper>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/images/logo.png" alt="Logo">
                        </a> <!-- Logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                
                                <li class="nav-item" v-for="(menu,index) in navMenu" :key="index" :class="{ 'active' : route==menu.route}">
                                    <a data-scroll-nav="0"  @click="action(menu.route)" href="javascript:void(0);">{{menu.label}}</a>
                                </li>
                                
                                <template v-if="routeHasLogin == '1'">
                                    <cart v-if="isUserLogin == 'true'"></cart>
                                    <template v-else>
                                        <li class="nav-item" :class="{ 'active' : route=='login'}">  
                                            <a href="/login" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                        </li>
                                        <li class="nav-item" v-if="routeHasRegister == '1'" :class="{ 'active' : route=='register'}">  
                                            <a href="/register" class="text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                        </li>  
                                    </template>
                                </template>
                             

                            </ul> <!-- navbar nav -->
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
</template>


<script>
// import Popper from "vue3-popper";


    export default {
        components : {
            // Po   pper
        },
        data(){
            return {
                routeHasLogin : window.routeHasLogin,
                routeHasRegister : window.routeHasRegister,
                isUserLogin : window.isUserLogin,
                user : window.user,
                isActive : '',
                route : window.currentRoute,
                navMenu : [
                    {
                        label : 'Home',
                        route : 'home'
                    },
                    {
                        label : 'Products',
                        route : 'products'
                    },
                    {
                        label : 'Team',
                        route : 'team'
                    },
                    {
                        label : 'Blog',
                        route : 'blog'
                    },
                    {
                        label : 'Contact',
                        route : 'contact'
                    },
                ]
            }
        },
        mounted() {
            console.log('isUserLogin',window.isUserLogin);
            console.log('currentRoute',window.currentRoute);
        
        },
        methods : {
            action(location){
                if(location == 'home'){
                    window.location.href = "/"
                }else{
                    window.location.href = "/" + location
                }
            },
        }
    }
</script>

<style lang="scss">

:root {
    --popper-theme-background-color: #ffffff;
    --popper-theme-text-color: #000000;
    --popper-theme-border-width: 0px;
    --popper-theme-border-style: solid;
    --popper-theme-border-radius: 6px;
    --popper-theme-padding: 0rem;
    --popper-theme-box-shadow: 0 6px 30px -6px rgba(0, 0, 0, 0.25);
}
 
</style>
