<template>
    <div>
        <li class="nav-item position-relative">
            <!-- <a class="btn btn-warning btn-sm" href="/checkout">Cart {{totalCart}}</a> -->
            <div class="btn-cart" @click="goToCheckout()">
                <img class="icon-cart" src="images/icons/cart.png" alt="">
                <div class="cart-count">{{totalCart}}</div>
            </div>
           
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
            },
            goToCheckout(){
                console.log('go checkout');
                window.location.href = '/checkout'

            }
        }
    }
</script>


<style lang="scss">
    .btn-cart{
        &:hover{
            cursor: pointer;
        }
    }

    .cart-count{
        min-width: 1rem;
        height: 1rem;
        background: red;
        border-radius: 2.75rem;
        position: absolute;
        color: #fff;
        top: -11px;
        right: 20px;
        font-size: 12px;
        padding: 0 0.3125rem;
        text-align: center;
        vertical-align: middle;
      
    }

    .icon-cart{
        width: 25px;
        height: 25px;
        margin-top: -10px;
        position:relative;
    }
</style>