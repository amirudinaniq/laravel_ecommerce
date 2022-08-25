<template>
    <div class="container checkout-box">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                <div class="box">
                    <h3 class="box-title">Products in your cart</h3>
                    <div class="plan-selection" v-for="item in items" :key="item.id">
                        <div class="plan-data" v-if="item.name">
                            <input id="question1" name="question" type="radio" class="with-font" value="sel" />
                            <label for="question1">{{item.name}}</label>
                            <p class="plan-text">Quantity: {{item.quantity}}</p>
                            <span class="plan-price">Price: RM{{item.price}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
            
                <div class="widget">
                    <h4 class="widget-title">Order Summary</h4>
                    <div class="summary-block" v-for="summaryItem in items" :key="summaryItem.id">
                        <div class="summary-content" v-if="summaryItem.name">
                            <div class="summary-head"><h5 class="summary-title">{{summaryItem.name}}</h5></div>
                            <div class="summary-price">
                                <p class="summary-text">RM {{summaryItem.total_price}}</p>
                                <span class="summary-small-text pull-right">
                                   ( RM {{summaryItem.price}} x {{summaryItem.quantity}} )
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="summary-block">
                        <div class="summary-content">
                        <div class="summary-head"> <h5 class="summary-title">Total</h5></div>
                            <div class="summary-price">
                                <p class="summary-text">RM {{items.grand_total}}</p>
                                <span class="summary-small-text pull-right">1 month</span>
                            </div>
                            <div class="text-right">
                                <hr>
                                <button class="btn btn-warning" @click="placeOrder()">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</template>

<script>


export default {
    data(){
        return {
            getData:window.shared.getData,
            items : [],

        }

    },
    mounted() {
    },
    created(){
        this.getCartItems();
    },
    methods : {
        getCartItems(){
            let url = '/checkout/get/items'
            // let formdata = new FormData();
            // formdata.set("test",'testing only');
            // this.postData(url).then(res=>{
            //     console.log('res',res);
            // });
            this.getData(url).then(response=>{
                console.log('checkout response',response);
                let data = response[1].data;
                this.items = data.cartItems;
                console.log('items',this.items);
            }).catch(err=>{
                console.log('err',err);
            })
        },
        placeOrder(){
            alert('order placed!')
        }
    }
}

</script>

<style lang="scss" scoped>

</style>