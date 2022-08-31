import LoadingVue from "./main/Component.vue";
import './css/index.css';
export default LoadingVue;
export declare function useLoading(globalProps?: any, globalSlots?: any): {
    show(props?: any, slots?: any): void;
    hide(): void;
};
