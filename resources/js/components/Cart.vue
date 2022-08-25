<template>
    <div>
        <li class="nav-item">
            <a class="btn btn-warning btn-sm" href="/checkout">Cart {{totalCart}}</a>
        </li>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                totalCart:0,
                getData:window.shared.getData,

            }

        },
        mounted() {
             this.emitter.on("changeInCart", items => {
                this.totalCart = items;
            });
        },
        created(){
            this.getCart();
        },
        methods : {
            getCart(){
                this.getData('/getCart').then(response=>{
                    this.totalCart = response[1].data.items;
                }).catch(err=>{
                    console.log('err',err);
                })
            }
        }
    }
</script>
