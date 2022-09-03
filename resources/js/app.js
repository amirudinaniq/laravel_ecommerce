/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import mitt from 'mitt';
import axios from 'axios'
import VueAxios from 'vue-axios'
import Toaster from '@meforma/vue-toaster';
import shared from "./sharedmethod.js";
window.shared = shared;
import moment from 'moment';
import Popper from "vue3-popper";

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUserSecret,faGear,faCoins,faBell,faUser,faListAlt } from '@fortawesome/free-solid-svg-icons'
// import { faUser,faListAlt } from '@fortawesome/free-regular-svg-icons'

/* add icons to the library */
library.add(
  faUser,
  faUserSecret,
  faGear,
  faBell,
  faListAlt,
  faCoins
  )


// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

// import "bootstrap/dist/css/bootstrap.min.css"
// import "bootstrap"


const emitter = mitt();


/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});


app.config.globalProperties.emitter = emitter;
app.use(Toaster, {
    // One of the options
    position: 'top'
  })
app.use(VueAxios, axios)

  //import components
import ExampleComponent from './components/ExampleComponent.vue';
import AddToCart from './components/AddToCart.vue';
import Testing from './components/testing.vue';
import Cart from './components/Cart.vue';
import checkout from './components/checkout.vue';
import orders from './components/orders.vue';

//import common components
import headercomp from './common/Header.vue';
import SideMenu from './common/SideMenu.vue';


app.component('add-to-cart-button', AddToCart);
app.component('testing', Testing);
app.component('cart', Cart);
app.component('checkout', checkout);
app.component('orders', orders);

app.component('headercomp', headercomp);
app.component('sidemenu', SideMenu);


app.component("Popper", Popper);
app.component('font-awesome-icon', FontAwesomeIcon);


// Make BootstrapVue available throughout your project
// app.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
// app.use(IconsPlugin)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.globEager('./**/*.vue')).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
