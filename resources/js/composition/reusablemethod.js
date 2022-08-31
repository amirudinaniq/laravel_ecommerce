// Reusable Methods for composition API
// import {ref, onMounted, onUnmounted, reactive} from 'vue'
import { useLoading } from 'vue3-loading-overlay';
import 'vue3-loading-overlay/dist/vue3-loading-overlay.css';

// by convention, composable function names start with "use"
export function useReusableMethod() {
    // state encapsulated and managed by the composable
    // const varName = ref(0)

    // a composable can update its managed state over time.

    // function functionName() {
    //     do something
    // }

  
    function showLoading(){
        let loader = useLoading();
        loader.show({
            // Optional parameters
            loader : 'dots',
            color: '#fe7865',
        });
        // simulate AJAX
        setTimeout(() => {
         loader.hide()
        },5000)  
    }

    function test(){
        alert(123)
    }

    // a composable can also hook into its owner component's
    // lifecycle to setup and teardown side effects.

    // onMounted(() => { do something })
    // onUnmounted(() => { do something })

    // expose managed state as return value
    return {
        //properties

        //functions
        showLoading,
        test
    }
}



