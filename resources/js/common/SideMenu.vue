<template>
   <div class="side-menu">
            <div class="card">
                <div class="card-body">
                    <ul class="side-menu-inner">
                        <li v-for="(item,index) in sideMenu" :key="index" :class="{  'is-active' : item.url == currentRoute }">
                            <a :href="'/'+item.url">
                                <font-awesome-icon :icon="['fas', item.icon]" />
                                <span>{{item.label}}</span>
                            </a>
                        </li>   
                    </ul>
                </div>
           </div>
          </div>
</template>

<script>
    // import {useRoute} from 'vue-router'

        export default {
            data(){
                return {
                    sideMenu : this.getMenuItems(),
                    currentRoute : window.currentRoute,
    
                }
    
            },
            //  props : ['route'],
            mounted() {
            
            },
            created(){
            },
            methods : {
                getMenuItems(){
                    let items = [
                        {
                            label : "My Account",
                            icon : "user",
                            url : "account",
                        },
                        {
                            label : "My Orders",
                            icon : "list-alt",
                            url : "orders",
                        },
                        {
                            label : "Notifications",
                            icon : "bell",
                            url : "notifications",
                        },
                        {
                            label : "My Store Points",
                            icon : "coins",
                            url : "points",
                        },
                        {
                            label : "Settings",
                            icon : "gear",
                            url : "settings",
                        },
                    ];

                    return items;
                }
              
            }
        }
    </script>

<style lang="scss" scoped>

</style>