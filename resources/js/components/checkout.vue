<template>
    <div>
        <div class="container checkout-box" v-if="Object.keys(items).length > 0">
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
                        <div>
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h4>Shipping Address</h4>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Country:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="country" v-model="models.country" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>First Name:</strong>
                                        <input type="text" name="first_name" class="form-control" v-model="models.firstName"  />
                                    </div>
                                    <div class="span1"></div>
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Last Name:</strong>
                                        <input type="text" name="last_name" class="form-control" v-model="models.lastName" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Address:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="address" class="form-control" v-model="models.address" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>City:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="city" class="form-control" v-model="models.city"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>State:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="state" class="form-control" v-model="models.state" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="zip_code" class="form-control" v-model="models.zipcode" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Phone Number:</strong></div>
                                    <div class="col-md-12"><input type="text" name="phone_number" class="form-control"  v-model="models.phoneNumber"/></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Email Address:</strong></div>
                                    <div class="col-md-12"><input type="text" name="email_address" class="form-control"  v-model="models.email"/></div>
                                </div>
                            </div>
                        </div>
                        <!--SHIPPING METHOD END-->
                        <hr>
                        <!--CREDIT CART PAYMENT-->
                        <div class="panel panel-info">
                            
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h4>Secure Payment</h4>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Card Type:</strong></div>
                                    <div class="col-md-12">
                                        <select id="CreditCardType" name="CreditCardType" class="form-control" v-model="models.card_type">
                                            <option value="5">Visa</option>
                                            <option value="6">MasterCard</option>
                                            <option value="7">American Express</option>
                                            <option value="8">Discover</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                    <div class="col-md-12"><input type="text" class="form-control" name="car_number" v-model="models.card_number" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Card CVV:</strong></div>
                                    <div class="col-md-12"><input type="text" class="form-control" name="car_code"  v-model="models.card_cvv"/></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <strong>Expiration Date</strong>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control"  v-model="models.expiration_month">
                                            <option value="">Month</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                    </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" v-model="models.expiration_year">
                                            <option value="">Year</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <span>Pay secure using your credit card.</span>
                                    </div>
                                    <div class="col-md-12">
                                        <ul class="cards">
                                            <li class="visa hand">Visa</li>
                                            <li class="mastercard hand">MasterCard</li>
                                            <li class="amex hand">Amex</li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-submit-fix mt-3" @click="placeOrder()">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CREDIT CART PAYMENT END-->
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
                                    <p class="summary-text">RM {{grand_total}}</p>
                                    <span class="summary-small-text pull-right">1 month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <div class="container-fluid" v-else>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="card-body cart">
                        <div class="col-sm-12 empty-cart-cls text-center">
                            <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                            <h3><strong>Your Cart is Empty</strong></h3>
                            <h4>Add something to make me happy :)</h4>
                            <a href="/" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>

// import {ref, onMounted, watch, computed} from 'vue';
// import _ from "lodash";
import { useReusableMethod } from '../composition/reusablemethod'



export default {
    components : {
    },
    data(){
        return {
            getData:window.shared.getData,
            postData:window.shared.postData,
            showLoader:window.shared.showLoader,
            hideLoader:window.shared.hideLoader,
            items : [],
            grand_total : 0,
            models : {
                country:"Malaysia",
                firstName:"amirudin",
                lastName:"aniq",
                address:"NO. 91 KG DESA MOKMIN",
                city:"Kuala lumpur",
                state:"Selangor",
                zipcode:"53100",
                phoneNumber:"+374 1137446780",
                email:"amirudinaniq@gmail.com",
                card_type:"5",
                card_number:"4242 4242 4242 4242",
                card_cvv:"123",
                expiration_month:"12",
                expiration_year:"2025",
             },

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
      
            this.getData(url).then(response=>{
                console.log('checkout response',response);
                let data = response[1].data;
                this.items = data.cartItems;
                this.grand_total = data.grand_total;
                console.log('items',this.items);
            }).catch(err=>{
                console.log('err',err);
            })
        },
        placeOrder(){
            this.showLoader()
            if(this.models.firstName && this.models.card_number){
                //process payment
                let formdata = new FormData();
                let url = '/process/user/payment';
                formdata.set("test",'testing only');

                this.models['amount'] = this.grand_total
                this.models['order'] = this.items

                this.postData(url,this.models).then(res=>{
                     this.hideLoader()
                    let data = res[1].data 
                    console.log('res',res);
                    if(data){
                        if(res[0] == 'success'){
                        this.$toast.success(data.message);
                        }else{
                            this.$toast.error(data.message);
                        }
                    }
                   

                    setTimeout(()=>{
                        window.location.href = '/'
                    },1500);
                });
            }else{
                this.hideLoader()
                this.$toast.error('You need to complete the User Info form.');
            }


        },
    },
    // setup(){
    //       //common
    //       const {
    //         showLoading,
    //       } = useReusableMethod()

    //       return {
    //         showLoading,
    //       }
    // }
}

</script>

<style lang="scss" scoped>

</style>