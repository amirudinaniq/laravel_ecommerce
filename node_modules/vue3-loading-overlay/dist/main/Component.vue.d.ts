interface BgStyle {
    background: string | undefined;
    opacity: number | undefined;
    backdropFilter: string | undefined;
}
declare const _default: import("vue").DefineComponent<{
    active: BooleanConstructor;
    programmatic: BooleanConstructor;
    container: (ObjectConstructor | FunctionConstructor | {
        new (): HTMLElement;
        prototype: HTMLElement;
    })[];
    isFullPage: {
        type: BooleanConstructor;
        default: boolean;
    };
    enforceFocus: {
        type: BooleanConstructor;
        default: boolean;
    };
    lockScroll: {
        type: BooleanConstructor;
        default: boolean;
    };
    transition: {
        type: StringConstructor;
        default: string;
    };
    /**
     * Allow user to hide the loader
     */
    canCancel: BooleanConstructor;
    /**
     * Do something on cancel
     */
    onCancel: {
        type: FunctionConstructor;
        default: () => void;
    };
    color: StringConstructor;
    backgroundColor: StringConstructor;
    blur: {
        type: StringConstructor;
        default: string;
    };
    opacity: NumberConstructor;
    width: NumberConstructor;
    height: NumberConstructor;
    zIndex: {
        type: NumberConstructor;
        default: number;
    };
    loader: {
        type: StringConstructor;
        default: string;
    };
}, {
    isActive: import("vue").Ref<boolean>;
    bgStyle: import("vue").ComputedRef<BgStyle>;
    hide: () => void;
    cancel: () => void;
}, unknown, {}, {}, import("vue").ComponentOptionsMixin, import("vue").ComponentOptionsMixin, Record<string, any>, string, import("vue").VNodeProps & import("vue").AllowedComponentProps & import("vue").ComponentCustomProps, Readonly<{
    active: boolean;
    programmatic: boolean;
    isFullPage: boolean;
    enforceFocus: boolean;
    lockScroll: boolean;
    transition: string;
    canCancel: boolean;
    onCancel: Function;
    blur: string;
    zIndex: number;
    loader: string;
} & {
    container?: unknown;
    color?: string | undefined;
    backgroundColor?: string | undefined;
    opacity?: number | undefined;
    width?: number | undefined;
    height?: number | undefined;
}>, {
    active: boolean;
    programmatic: boolean;
    isFullPage: boolean;
    enforceFocus: boolean;
    lockScroll: boolean;
    transition: string;
    canCancel: boolean;
    onCancel: Function;
    blur: string;
    zIndex: number;
    loader: string;
}>;
export default _default;
