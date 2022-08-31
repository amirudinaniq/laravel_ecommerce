/**
 * Vue 3 Loading Overlay 0.0.0
 * (c) 2020
 * @license MIT
 */
import { defineComponent, openBlock, createBlock, createVNode, ref, computed, onMounted, onUnmounted, watch, Transition, withCtx, withDirectives, withModifiers, renderSlot, resolveDynamicComponent, vShow, h, render as render$4 } from 'vue';

var script = defineComponent({
    name: "spinner",
    props: {
        color: {
            type: String,
            default: "#000",
        },
        height: {
            type: Number,
            default: 64,
        },
        width: {
            type: Number,
            default: 64,
        },
    },
});

const _hoisted_1 = /*#__PURE__*/createVNode("g", {
  fill: "none",
  "fill-rule": "evenodd"
}, [
  /*#__PURE__*/createVNode("g", {
    transform: "translate(1 1)",
    "stroke-width": "2"
  }, [
    /*#__PURE__*/createVNode("circle", {
      "stroke-opacity": ".25",
      cx: "18",
      cy: "18",
      r: "18"
    }),
    /*#__PURE__*/createVNode("path", { d: "M36 18c0-9.94-8.06-18-18-18" }, [
      /*#__PURE__*/createVNode("animateTransform", {
        attributeName: "transform",
        type: "rotate",
        from: "0 18 18",
        to: "360 18 18",
        dur: "0.8s",
        repeatCount: "indefinite"
      })
    ])
  ])
], -1 /* HOISTED */);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (openBlock(), createBlock("svg", {
    viewBox: "0 0 38 38",
    xmlns: "http://www.w3.org/2000/svg",
    width: _ctx.width,
    height: _ctx.height,
    stroke: _ctx.color
  }, [
    _hoisted_1
  ], 8 /* PROPS */, ["width", "height", "stroke"]))
}

script.render = render;
script.__file = "src/loaders/Spinner.vue";

var script$1 = defineComponent({
  name: "dots",
  props: {
    color: {
      type: String,
      default: "#000",
    },
    height: {
      type: Number,
      default: 240,
    },
    width: {
      type: Number,
      default: 60,
    },
  },
});

const _hoisted_1$1 = /*#__PURE__*/createVNode("circle", {
  cx: "15",
  cy: "15",
  r: "15"
}, [
  /*#__PURE__*/createVNode("animate", {
    attributeName: "r",
    from: "15",
    to: "15",
    begin: "0s",
    dur: "0.8s",
    values: "15;9;15",
    calcMode: "linear",
    repeatCount: "indefinite"
  }),
  /*#__PURE__*/createVNode("animate", {
    attributeName: "fill-opacity",
    from: "1",
    to: "1",
    begin: "0s",
    dur: "0.8s",
    values: "1;.5;1",
    calcMode: "linear",
    repeatCount: "indefinite"
  })
], -1 /* HOISTED */);
const _hoisted_2 = /*#__PURE__*/createVNode("circle", {
  cx: "60",
  cy: "15",
  r: "9",
  "fill-opacity": "0.3"
}, [
  /*#__PURE__*/createVNode("animate", {
    attributeName: "r",
    from: "9",
    to: "9",
    begin: "0s",
    dur: "0.8s",
    values: "9;15;9",
    calcMode: "linear",
    repeatCount: "indefinite"
  }),
  /*#__PURE__*/createVNode("animate", {
    attributeName: "fill-opacity",
    from: "0.5",
    to: "0.5",
    begin: "0s",
    dur: "0.8s",
    values: ".5;1;.5",
    calcMode: "linear",
    repeatCount: "indefinite"
  })
], -1 /* HOISTED */);
const _hoisted_3 = /*#__PURE__*/createVNode("circle", {
  cx: "105",
  cy: "15",
  r: "15"
}, [
  /*#__PURE__*/createVNode("animate", {
    attributeName: "r",
    from: "15",
    to: "15",
    begin: "0s",
    dur: "0.8s",
    values: "15;9;15",
    calcMode: "linear",
    repeatCount: "indefinite"
  }),
  /*#__PURE__*/createVNode("animate", {
    attributeName: "fill-opacity",
    from: "1",
    to: "1",
    begin: "0s",
    dur: "0.8s",
    values: "1;.5;1",
    calcMode: "linear",
    repeatCount: "indefinite"
  })
], -1 /* HOISTED */);

function render$1(_ctx, _cache, $props, $setup, $data, $options) {
  return (openBlock(), createBlock("svg", {
    viewBox: "0 0 120 30",
    xmlns: "http://www.w3.org/2000/svg",
    fill: _ctx.color,
    width: _ctx.width,
    height: _ctx.height
  }, [
    _hoisted_1$1,
    _hoisted_2,
    _hoisted_3
  ], 8 /* PROPS */, ["fill", "width", "height"]))
}

script$1.render = render$1;
script$1.__file = "src/loaders/Dots.vue";

var script$2 = defineComponent({
    name: "bars",
    props: {
        color: {
            type: String,
            default: "#000",
        },
        height: {
            type: Number,
            default: 40,
        },
        width: {
            type: Number,
            default: 40,
        },
    },
});

const _hoisted_1$2 = /*#__PURE__*/createVNode("rect", {
  x: "0",
  y: "13",
  width: "4",
  height: "5"
}, [
  /*#__PURE__*/createVNode("animate", {
    attributeName: "height",
    attributeType: "XML",
    values: "5;21;5",
    begin: "0s",
    dur: "0.6s",
    repeatCount: "indefinite"
  }),
  /*#__PURE__*/createVNode("animate", {
    attributeName: "y",
    attributeType: "XML",
    values: "13; 5; 13",
    begin: "0s",
    dur: "0.6s",
    repeatCount: "indefinite"
  })
], -1 /* HOISTED */);
const _hoisted_2$1 = /*#__PURE__*/createVNode("rect", {
  x: "10",
  y: "13",
  width: "4",
  height: "5"
}, [
  /*#__PURE__*/createVNode("animate", {
    attributeName: "height",
    attributeType: "XML",
    values: "5;21;5",
    begin: "0.15s",
    dur: "0.6s",
    repeatCount: "indefinite"
  }),
  /*#__PURE__*/createVNode("animate", {
    attributeName: "y",
    attributeType: "XML",
    values: "13; 5; 13",
    begin: "0.15s",
    dur: "0.6s",
    repeatCount: "indefinite"
  })
], -1 /* HOISTED */);
const _hoisted_3$1 = /*#__PURE__*/createVNode("rect", {
  x: "20",
  y: "13",
  width: "4",
  height: "5"
}, [
  /*#__PURE__*/createVNode("animate", {
    attributeName: "height",
    attributeType: "XML",
    values: "5;21;5",
    begin: "0.3s",
    dur: "0.6s",
    repeatCount: "indefinite"
  }),
  /*#__PURE__*/createVNode("animate", {
    attributeName: "y",
    attributeType: "XML",
    values: "13; 5; 13",
    begin: "0.3s",
    dur: "0.6s",
    repeatCount: "indefinite"
  })
], -1 /* HOISTED */);

function render$2(_ctx, _cache, $props, $setup, $data, $options) {
  return (openBlock(), createBlock("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 30 30",
    height: _ctx.height,
    width: _ctx.width,
    fill: _ctx.color
  }, [
    _hoisted_1$2,
    _hoisted_2$1,
    _hoisted_3$1
  ], 8 /* PROPS */, ["height", "width", "fill"]))
}

script$2.render = render$2;
script$2.__file = "src/loaders/Bars.vue";

var Loaders = {
    Spinner: script,
    Dots: script$1,
    Bars: script$2,
};

var script$3 = defineComponent({
    name: "vue-loading",
    props: {
        active: Boolean,
        programmatic: Boolean,
        container: [Object, Function, HTMLElement],
        isFullPage: {
            type: Boolean,
            default: true,
        },
        enforceFocus: {
            type: Boolean,
            default: true,
        },
        lockScroll: {
            type: Boolean,
            default: false,
        },
        transition: {
            type: String,
            default: "fade",
        },
        /**
         * Allow user to hide the loader
         */
        canCancel: Boolean,
        /**
         * Do something on cancel
         */
        onCancel: {
            type: Function,
            default: () => {
                return;
            },
        },
        color: String,
        backgroundColor: String,
        blur: {
            type: String,
            default: "2px",
        },
        opacity: Number,
        width: Number,
        height: Number,
        zIndex: {
            type: Number,
            default: 100,
        },
        loader: {
            type: String,
            default: "spinner",
        },
    },
    setup(props, context) {
        const isActive = ref(props.active);
        const bgStyle = computed(() => {
            let ret = {
                background: props.backgroundColor,
                opacity: props.opacity,
                backdropFilter: `blur(${props.blur})`,
            };
            return ret;
        });
        const hide = () => {
            // Timeout for the animation complete before destroying
            if (props.programmatic) {
                isActive.value = false;
                setTimeout(() => {
                    return;
                }, 150);
            }
        };
        const cancel = () => {
            if (!props.canCancel || !isActive.value)
                return;
            hide();
            props.onCancel();
        };
        const keyUp = (event) => {
            if (event.keyCode === 27) {
                cancel();
            }
        };
        const disableScroll = () => {
            if (props.isFullPage && props.lockScroll) {
                document.body.classList.add("vld-shown");
            }
        };
        const enableScroll = () => {
            if (props.isFullPage && props.lockScroll) {
                document.body.classList.remove("vld-shown");
            }
        };
        onMounted(() => {
            if (props.programmatic) {
                isActive.value = true;
                document.addEventListener("keyup", keyUp);
            }
        });
        onUnmounted(() => {
            document.removeEventListener("keyup", keyUp);
        });
        watch(() => props.active, () => {
            isActive.value = props.active;
        });
        watch(isActive, () => {
            if (isActive.value) {
                disableScroll();
            }
            else {
                enableScroll();
            }
        });
        return {
            isActive,
            bgStyle,
            hide,
            cancel,
        };
    },
    components: Loaders,
});

const _hoisted_1$3 = { class: "vld-icon" };

function render$3(_ctx, _cache, $props, $setup, $data, $options) {
  return (openBlock(), createBlock(Transition, {
    ref: "root",
    name: _ctx.transition
  }, {
    default: withCtx(() => [
      withDirectives(createVNode("div", {
        tabindex: "0",
        class: ["vld-overlay is-active", { 'is-full-page': _ctx.isFullPage }],
        "aria-busy": _ctx.isActive,
        "aria-label": "Loading",
        style: { zIndex: _ctx.zIndex }
      }, [
        createVNode("div", {
          class: "vld-background",
          onClick: _cache[1] || (_cache[1] = withModifiers((...args) => (_ctx.cancel && _ctx.cancel(...args)), ["prevent"])),
          style: _ctx.bgStyle
        }, null, 4 /* STYLE */),
        createVNode("div", _hoisted_1$3, [
          renderSlot(_ctx.$slots, "before"),
          renderSlot(_ctx.$slots, "default", {}, () => [
            (openBlock(), createBlock(resolveDynamicComponent(_ctx.loader), {
              color: _ctx.color,
              width: _ctx.width,
              height: _ctx.height
            }, null, 8 /* PROPS */, ["color", "width", "height"]))
          ]),
          renderSlot(_ctx.$slots, "after")
        ])
      ], 14 /* CLASS, STYLE, PROPS */, ["aria-busy"]), [
        [vShow, _ctx.isActive]
      ])
    ]),
    _: 3 /* FORWARDED */
  }, 8 /* PROPS */, ["name"]))
}

script$3.render = render$3;
script$3.__file = "src/main/Component.vue";

function createComponent(component, props, parentContainer) {
    const vnode = h(component, props);
    const container = document.createElement('div');
    parentContainer.appendChild(container);
    render$4(vnode, container);
    return vnode.component;
}
function removeElement(el) {
    var _a;
    if (typeof el.remove !== 'undefined') {
        el.remove();
    }
    else {
        (_a = el.parentNode) === null || _a === void 0 ? void 0 : _a.removeChild(el);
    }
}
function useLoading(globalProps = {}, globalSlots = {}) {
    let instance = null;
    const loading = {
        show(props = globalProps, slots = globalSlots) {
            const forceProps = {
                programmatic: true,
                lockScroll: true,
                isFullPage: false
            };
            const propsData = Object.assign({}, globalProps, props, forceProps);
            let container = propsData.container;
            if (!propsData.container) {
                container = document.body;
                propsData.isFullPage = true;
            }
            instance = createComponent(script$3, propsData, container);
            const mergedSlots = Object.assign({}, globalSlots, slots);
            Object.keys(mergedSlots).map((name) => {
                if (instance != null) {
                    instance.slots[name] = mergedSlots[name];
                }
            });
        },
        hide() {
            if (instance != null) {
                instance.ctx.hide();
                let root = instance.vnode.el;
                removeElement(root.parentElement);
            }
        }
    };
    return loading;
}

export default script$3;
export { useLoading };
