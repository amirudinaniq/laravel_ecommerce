<template>
    <div class="container">
       <div class="row">
        <div class="col-md-3">
            <sidemenu route='orders'/>
        </div>
        <div class="col-md-9">
            my orders            
        </div>
       </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                getData:window.shared.getData,

            }

        },
        mounted() {
       
            
        },
        created(){
            this.getOrders();
        },
        methods : {
            getOrders(){
                this.getData('/getOrders').then(response=>{
                    console.log('res',response);
                    // this.totalCart = response[1].data.items;
                }).catch(err=>{
                    console.log('err',err);
                })
            },
        }
    }
</script>


<style lang="scss">
   
</style>