# Vue Loading Overlay Component

[![downloads](https://badgen.net/npm/dt/vue-loading-overlay)](http://npm-stats.com/~packages/vue3-loading-overlay)
[![jsdelivr](https://data.jsdelivr.com/v1/package/npm/vue3-loading-overlay/badge?style=rounded)](https://www.jsdelivr.com/package/npm/vue3-loading-overlay)
[![npm-version](https://badgen.net/npm/v/vue3-loading-overlay)](https://www.npmjs.com/package/vue3-loading-overlay)
[![github-tag](https://badgen.net/github/tag/ankurk91/vue-loading-overlay)](https://github.com/moyoujun/vue3-loading-overlay/)
![ts](https://badgen.net/badge/ready/TypeScript/blue)

Vue.js component for full screen loading indicator

## [Demo](https://moyoujun.github.io/vue3-loading-overlay/)

## Installation
```bash
# yarn
yarn add vue3-loading-overlay  // not valiable now.

# npm
npm install vue3-loading-overlay

```

## Usage
#### As component
```html
<template>
    <div class="vld-parent">
        <loading :active="isLoading" 
        :can-cancel="true" 
        :on-cancel="onCancel"
        :is-full-page="fullPage"></loading>
        
        <label><input type="checkbox" v-model="fullPage">Full page?</label>
        <button @click.prevent="doAjax">fetch Data</button>
    </div>
</template>

<script>
    // Import component
    import Loading from 'vue-loading-overlay';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.css';
    
    export default {
        setup() {
          const isLoading = ref(false);
          const fullPage = ref(true);
          const doAjax=() => {
                isLoading.value = true;
                // simulate AJAX
                setTimeout(() => {
                  isLoading = false
                },5000)
            },
          const onCancel= ()=> {
              console.log('User cancelled the loader.');
              //because the props is single flow direction, you need to set isLoading status normally.
              isLoading.value = false;
          }
          return 
          {
            isLoading,
            fullPage,
            doAjax,
            onCancel
          }
        },
        components: {
            Loading
        }
    }
</script>
```

### As plugin
```html
<template>
    <form @submit.prevent="submit" class="vld-parent" ref="formContainer">
        <!-- your form inputs goes here-->
        <label><input type="checkbox" v-model="fullPage">Full page?</label>
        <button type="submit">Login</button>
    </form>
</template>

<script>
    import { ref } from 'vue';
    // Import the method.
    import { useLoading } from 'vue3-loading-overlay';
    // Import stylesheet
    import 'vue3-loading-overlay/dist/vue3-loading-overlay.css';
    // Init plugin

    export default {
      setup() {
        const fullPage = ref(true);
        let formContainer = ref(null);

        const submit = () => {
          let loader = useLoading();
          loader.show({
            // Optional parameters
            container: this.fullPage ? null : formContainer.value,
            canCancel: true,
            onCancel: onCancel,
          });
                // simulate AJAX
          setTimeout(() => {
            loader.hide()
          },5000)                 
        };

        const onCancel =() => {
          console.log('User cancelled the loader.')
        };   
        return {
          fullPage,
          formContainer,
          submit
        }
      },
    }
</script>
```

## Available props
The component accepts these props:

| Attribute        | Type                | Default              | Description      |
| :---             | :---:               | :---:                | :---             |
| active           | Boolean             | `false`              | Show loading by default when `true` |
| can-cancel       | Boolean             | `false`              | Allow user to cancel by pressing ESC or clicking outside |
| on-cancel        | Function            | `()=>{}`             | Do something upon cancel, works in conjunction with `can-cancel`  |
| is-full-page     | Boolean             | `true`               | When `false`; limit loader to its container^ |
| transition       | String              | `fade`               | [Transition](https://vuejs.org/v2/guide/transitions.html) name |
| color            | String              | `#000`               | Customize the color of loading icon |
| height           | Number              | *                    | Customize the height of loading icon |
| width            | Number              | *                    | Customize the width of loading icon |
| loader           | String              | `spinner`            | Name of icon shape you want use as loader, `spinner` or `dots` or `bars` |
| background-color | String              | `#fff`               | Customize the overlay background color |
| opacity          | Number              | `0.5`                | Customize the overlay background opacity |
| z-index          | Number              | `9999`               | Customize the overlay z-index |
| enforce-focus    | Boolean             | `true`               | Force focus on loader |
| lock-scroll      | Boolean             | `false`              | Freeze the scrolling during full screen loader |
| blur             | String              | `2px`                | Value for the CSS blur backdrop-filter. Set to null or an empty string to disable blurring |

* ^When `is-full-page` is set to `false`, the container element should be positioned as `position: relative`. 
You can use CSS helper class `vld-parent`.
* *The default `height` and `width` values may be varied based on the `loader` prop value

## Available slots
The component accepts these slots:

* `default` : Replace the animated icon with yours
* `before` : Place anything before the animated icon, you may need to style this.
* `after` : Place anything after the animated icon, you may need to style this.

## API methods
### `Vue.$loading.show(?propsData,?slots)`
```js
let loader = useLoading();
loader.show({
  // Pass props by their camelCased names
  container: this.$refs.loadingContainer,
  canCancel: true, // default false
  onCancel: this.yourCallbackMethod,
  color: '#000000',
  loader: 'spinner',
  width: 64,
  height: 64,
  backgroundColor: '#ffffff',
  opacity: 0.5,
  zIndex: 999,
},{
  // Pass slots by their names, not work now.
  default: this.$createElement('your-custom-loader-component-name'),
});
// hide loader whenever you want
loader.hide();
```

## Global configs
## todo

You can set props and slots for all future instances when using as plugin
```js
Vue.use(Loading, {
  // props
  color: 'red'
},{
  // slots
})
```
Further you can override any prop or slot when creating new instances
```js
let loader = Vue.$loading.show({
 color: 'blue'
},{
  // slots
});
```

### Browser support
* Modern browsers only

## Run examples on your localhost
* Clone this repo
* Make sure you have node-js `>=12.14` and [yarn](https://yarnpkg.com) `>=1.x` pre-installed
* Install dependencies - `yarn install`
* Run webpack dev server - `yarn start`
* This should open the demo page at `http://localhost:9000` in your default web browser 

## Testing
* Todo.

## License
[MIT](LICENSE.txt) License
