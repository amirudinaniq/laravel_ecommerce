<template>
    <div class="container">
       <div class="row">
        <div class="col-md-3">
            <sidemenu/>
        </div>
        <div class="col-md-9 mb-4">
            <div class="top-bar-nav">
                <div v-for="item in status_options" class="item" :class="{ ' is-active' : status == item.value}" @click="changeStatus(item.value)">{{item.label}}</div>
            </div>    

            <div class="search-wrapper">
                <font-awesome-icon :icon="['fas', 'search']" />
                <input autocomplete="off" placeholder="Search by Seller Name, Order ID or Product Name in all orders" value="">
            </div>

            <div class="row">
                <div class="col-12">
                   <div class="orders">
                
                    <div class="order" v-for="(order,index) in orders" :key="index">
                        <div class="order-inner"  v-for="(item,i) in order.order_details" :key="i">
                            <div class="d-flex flex-row align-items-center">
                                <div><img class="product-img" src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"  alt="" id="image"></div>
                                <div class="order-details d-flex flex-column pl-md-3 pl-1">
                                    <div><h6>{{item.product_name}}</h6></div>
                                    <div>Quantity:<span class="pl-3">x{{item.quantity}}</span></div>
                                </div>                    
                            </div>
                            <!-- <div class="pl-md-0 pl-2">
                                <span class="fa fa-minus-square text-secondary"></span><span class="px-md-3 px-1">2</span><span class="fa fa-plus-square text-secondary"></span>
                            </div> -->
                            <div class="pl-md-0 pl-1">
                                <s>RM0</s>&nbsp;<b>RM{{item.product_price}}</b>
                            </div>
                       </div>
                        <div class="container bg-light rounded-bottom pt-2 pb-3">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <div class="px-md-0 px-1" id="footer-font">
                                            Order Total<b><span class="pl-md-4 order-total"><span class="text-uppercase">{{order.currency}}</span>{{order.amount}}</span></b>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <div class="order-status text-success" >
                                            COMPLETED
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center mt-2 gap-1">
                                        <button class="btn btn-sm bg-danger text-white px-lg-5 px-3">CANCEL ORDER</button>
                                        <button class="btn btn-sm bg-primary2 text-white px-lg-5 px-3">PAYMENT NOW</button>
                                        <button class="btn btn-sm bg-dark text-white px-lg-5 px-3">ORDER DETAILS</button>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                   </div>
               
                </div>
            </div>
          
         
            
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
                status_options:[
                    {
                        label : "All",
                        value : "all"
                    },
                    {
                        label : "To Pay",
                        value : "to_pay"
                    },
                    {
                        label : "To Ship",
                        value : "to_ship"
                    },
                    {
                        label : "To Receive",
                        value : "to_receive"
                    },
                    {
                        label : "Completed",
                        value : "completed"
                    }, 
                    {
                        label : "Cancelled",
                        value : "cancelled"
                    },
                ],
                status : "all",
                orders : [],
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
                
                    if(response[0] == 'success'){
                        let data = response[1].data;
                        this.orders = data.orders;
                        console.log('orders',data.orders);
                        console.log('this orders',this.orders);
                    }else{

                    }
                  
                }).catch(err=>{
                    console.log('err',err);
                })
            },
            changeStatus(value){
                this.status = value
            }
        }
    }
</script>


