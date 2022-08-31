<template>
    <div>
        <hr>
        <button class="btn btn-warning text-center" @click.prevent="addToCart()">Add To Cart</button>
    </div>
</template>


<script>
import axios from 'axios';

    export default {
        props : ['productId','userId'],
        mounted() {
            console.log('Component mounted.')
        },
        methods : {
            async addToCart(){
                if(this.userId == 0){
                    this.$toast.error('You need to login to add this product.');
                    return;
                }     
                
                let params = {
                    product_id : this.productId
                };
                let response = await axios.post('/cart',params);

                if(response.data.message == 'Cart Updated'){
                    this.$toast.success('Added to your cart');
                }
                console.log('res',response);

                 this.emitter.emit("changeInCart", response.data.items);
                // this.$root.$emit('changeInCart',response.data.items)
            }
        }
    }
</script>
