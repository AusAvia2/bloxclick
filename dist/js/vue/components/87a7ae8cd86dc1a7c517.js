"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_assets_js_vue_components_trades_TradeList_vue"],{

/***/ "./node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=script&setup=true&lang=ts":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=script&setup=true&lang=ts ***!
  \*****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ \"./node_modules/vue/dist/vue.esm-bundler.js\");\n/* harmony import */ var _logic_infinite_scroll__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/logic/infinite_scroll */ \"./resources/assets/js/vue/logic/infinite_scroll.ts\");\n/* harmony import */ var _logic_bh__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @/logic/bh */ \"./resources/assets/js/vue/logic/bh.ts\");\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! axios */ \"./node_modules/axios/lib/axios.js\");\n/* harmony import */ var _filters_index__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @/filters/index */ \"./resources/assets/js/vue/filters/index.ts\");\n/* harmony import */ var _store_modules_thumbnails__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @/store/modules/thumbnails */ \"./resources/assets/js/vue/store/modules/thumbnails.ts\");\n/* harmony import */ var _logic_data_thumbnails__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @/logic/data/thumbnails */ \"./resources/assets/js/vue/logic/data/thumbnails.ts\");\n/* harmony import */ var _components_global_SvgSprite_vue__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @/components/global/SvgSprite.vue */ \"./resources/assets/js/vue/components/global/SvgSprite.vue\");\nvar __async = (__this, __arguments, generator) => {\n  return new Promise((resolve, reject) => {\n    var fulfilled = (value) => {\n      try {\n        step(generator.next(value));\n      } catch (e) {\n        reject(e);\n      }\n    };\n    var rejected = (value) => {\n      try {\n        step(generator.throw(value));\n      } catch (e) {\n        reject(e);\n      }\n    };\n    var step = (x) => x.done ? resolve(x.value) : Promise.resolve(x.value).then(fulfilled, rejected);\n    step((generator = generator.apply(__this, __arguments)).next());\n  });\n};\n\n\n\n\n\n\n\n\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (/* @__PURE__ */(0,vue__WEBPACK_IMPORTED_MODULE_0__.defineComponent)({\n  __name: \"TradeList\",\n  props: {\n    user: { type: String, required: true },\n    open_tab: { type: Boolean, required: false },\n    more_types: { type: Boolean, required: false }\n  },\n  emits: [\"newTrade\", \"typeChanged\"],\n  setup(__props, { expose: __expose, emit }) {\n    __expose();\n    const props = __props;\n    const selectedType = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(props.more_types ? \"accepted\" : \"inbound\");\n    const tradePicker = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();\n    (0,vue__WEBPACK_IMPORTED_MODULE_0__.onMounted)(() => {\n      (0,_logic_infinite_scroll__WEBPACK_IMPORTED_MODULE_1__.hasInfiniteScroll)(loadTrades, tradePicker.value);\n    });\n    const cursor = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(\"\");\n    const loading = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(false);\n    const attempted_select = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(0);\n    const url_select = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(0);\n    const trades = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)([]);\n    let path = window.location.pathname.split(\"/\");\n    let attempted_trade = Number(path[2]);\n    if (!isNaN(attempted_trade) && attempted_trade > 0 && !props.open_tab) {\n      url_select.value = attempted_trade;\n      loadTradeInfo(attempted_trade);\n    }\n    function loadTrades() {\n      return __async(this, null, function* () {\n        if (cursor.value === null)\n          return;\n        loading.value = true;\n        yield axios__WEBPACK_IMPORTED_MODULE_7__[\"default\"].get(\n          _logic_bh__WEBPACK_IMPORTED_MODULE_2__.BH.apiUrl(\n            `v1/user/trades/${props.user}/${selectedType.value}?limit=25&cursor=${cursor.value}`\n          )\n        ).then(({ data }) => {\n          if (data.data.length > 0 && trades.value.length == 0 && !url_select.value && !props.open_tab)\n            loadTradeInfo(data.data[0].id);\n          trades.value.push(...data.data);\n          cursor.value = data.next_cursor;\n        });\n        loading.value = false;\n      });\n    }\n    function loadTradeInfo(tradeId) {\n      attempted_select.value = tradeId;\n      if (props.open_tab) {\n        window.open(`/trades/${tradeId}`, \"_blank\");\n        return;\n      }\n      if (url_select.value != tradeId)\n        removeUrlSelect();\n      axios__WEBPACK_IMPORTED_MODULE_7__[\"default\"].get(_logic_bh__WEBPACK_IMPORTED_MODULE_2__.BH.apiUrl(`v1/user/trades/${tradeId}`)).then(({ data }) => {\n        if (data.data.id == attempted_select.value)\n          emit(\"newTrade\", data.data);\n      });\n    }\n    function removeUrlSelect() {\n      window.history.pushState(\"trades\", \"Trades\", \"/trades\");\n      url_select.value = 0;\n    }\n    function tradeStatus(trade) {\n      if (trade.is_pending)\n        return \"PENDING\";\n      if (trade.is_accepted)\n        return \"ACCEPTED\";\n      if (trade.has_errored)\n        return \"ERRORED\";\n      if (trade.is_cancelled)\n        return \"CANCELLED\";\n      return \"DECLINED\";\n    }\n    function changeType() {\n      emit(\"typeChanged\");\n      cursor.value = \"\";\n      trades.value = [];\n      loadTrades();\n    }\n    const listElementType = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(() => {\n      if (props.open_tab)\n        return \"a\";\n      return \"div\";\n    });\n    const __returned__ = { props, emit, selectedType, tradePicker, cursor, loading, attempted_select, url_select, trades, get path() {\n      return path;\n    }, set path(v) {\n      path = v;\n    }, get attempted_trade() {\n      return attempted_trade;\n    }, set attempted_trade(v) {\n      attempted_trade = v;\n    }, loadTrades, loadTradeInfo, removeUrlSelect, tradeStatus, changeType, listElementType, get filterTimeAgo() {\n      return _filters_index__WEBPACK_IMPORTED_MODULE_3__.filterTimeAgo;\n    }, get thumbnailStore() {\n      return _store_modules_thumbnails__WEBPACK_IMPORTED_MODULE_4__.thumbnailStore;\n    }, get ThumbnailType() {\n      return _logic_data_thumbnails__WEBPACK_IMPORTED_MODULE_5__[\"default\"];\n    }, SVGSprite: _components_global_SvgSprite_vue__WEBPACK_IMPORTED_MODULE_6__[\"default\"] };\n    Object.defineProperty(__returned__, \"__isScriptSetup\", { enumerable: false, value: true });\n    return __returned__;\n  }\n}));\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/components/trades/TradeList.vue?./node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!./node_modules/vue-loader/dist/index.js??ruleSet%5B0%5D.use%5B0%5D");

/***/ }),

/***/ "./node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=template&id=032f0b10&ts=true":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=template&id=032f0b10&ts=true ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"render\": () => (/* binding */ render)\n/* harmony export */ });\n/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ \"./node_modules/vue/dist/vue.esm-bundler.js\");\n\nconst _hoisted_1 = { class: \"trade-list border-right new-theme\" };\nconst _hoisted_2 = {\n  key: 0,\n  value: \"accepted\"\n};\nconst _hoisted_3 = {\n  key: 1,\n  value: \"declined\"\n};\nconst _hoisted_4 = /* @__PURE__ */ (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n  \"option\",\n  { value: \"inbound\" },\n  \"Inbound\",\n  -1\n  /* HOISTED */\n);\nconst _hoisted_5 = /* @__PURE__ */ (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n  \"option\",\n  { value: \"outbound\" },\n  \"Outbound\",\n  -1\n  /* HOISTED */\n);\nconst _hoisted_6 = /* @__PURE__ */ (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n  \"option\",\n  { value: \"history\" },\n  \"History\",\n  -1\n  /* HOISTED */\n);\nconst _hoisted_7 = {\n  key: 2,\n  value: \"accepted\"\n};\nconst _hoisted_8 = {\n  key: 3,\n  value: \"declined\"\n};\nconst _hoisted_9 = {\n  key: 0,\n  class: \"text-center\",\n  style: { \"margin-top\": \"10px\" }\n};\nconst _hoisted_10 = {\n  class: \"trade-picker\",\n  ref: \"tradePicker\"\n};\nconst _hoisted_11 = [\"onClick\"];\nconst _hoisted_12 = { class: \"flex full-width\" };\nconst _hoisted_13 = [\"src\"];\nconst _hoisted_14 = { class: \"full-width flex flex-column\" };\nconst _hoisted_15 = { class: \"flex flex-wrap space-between full-width\" };\nconst _hoisted_16 = { class: \"username bold ellipsis\" };\nconst _hoisted_17 = { class: \"light-text bold trade-time\" };\nconst _hoisted_18 = {\n  key: 0,\n  class: \"flex flex-items-center trade-info mb-5\"\n};\nconst _hoisted_19 = { class: \"svg-container\" };\nconst _hoisted_20 = {\n  class: \"light-text bold\",\n  style: {}\n};\nconst _hoisted_21 = { class: \"svg-container\" };\nconst _hoisted_22 = { class: \"svg-container\" };\nconst _hoisted_23 = { class: \"light-text bold\" };\nconst _hoisted_24 = { key: 1 };\nconst _hoisted_25 = { class: \"no-margin bold small-text\" };\nfunction render(_ctx, _cache, $props, $setup, $data, $options) {\n  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"div\", _hoisted_1, [\n    (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n      \"select\",\n      {\n        \"onUpdate:modelValue\": _cache[0] || (_cache[0] = ($event) => $setup.selectedType = $event),\n        onChange: $setup.changeType,\n        class: \"blend\",\n        style: { \"width\": \"calc(100% - 10px)\" }\n      },\n      [\n        $props.more_types ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"option\", _hoisted_2, \"Accepted\")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(\"v-if\", true),\n        $props.more_types ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"option\", _hoisted_3, \"Declined\")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(\"v-if\", true),\n        _hoisted_4,\n        _hoisted_5,\n        _hoisted_6,\n        !$props.more_types ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"option\", _hoisted_7, \"Accepted\")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(\"v-if\", true),\n        !$props.more_types ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"option\", _hoisted_8, \"Declined\")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(\"v-if\", true)\n      ],\n      544\n      /* HYDRATE_EVENTS, NEED_PATCH */\n    ), [\n      [vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.selectedType]\n    ]),\n    $setup.trades.length == 0 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"div\", _hoisted_9, \" No trades available \")) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(\"v-if\", true),\n    (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n      \"div\",\n      _hoisted_10,\n      [\n        ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\n          vue__WEBPACK_IMPORTED_MODULE_0__.Fragment,\n          null,\n          (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.trades, (trade) => {\n            return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"div\", {\n              key: trade.id,\n              class: (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)([\"trade flex\", { selected: $setup.attempted_select == trade.id }]),\n              onClick: ($event) => $setup.loadTradeInfo(trade.id)\n            }, [\n              ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)((0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveDynamicComponent)($setup.listElementType), {\n                href: $props.open_tab ? `/trades/${trade.id}` : false,\n                target: $props.open_tab ? `_blank` : false,\n                class: \"flex trade-inner\"\n              }, {\n                default: (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(() => [\n                  (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_12, [\n                    (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"img\", {\n                      class: \"trade-user-thumbnail\",\n                      src: $setup.thumbnailStore.getThumbnail({\n                        id: trade.user.id,\n                        type: $setup.ThumbnailType.AvatarFull\n                      })\n                    }, null, 8, _hoisted_13),\n                    (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_14, [\n                      (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_15, [\n                        (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n                          \"p\",\n                          _hoisted_16,\n                          (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(trade.user.username),\n                          1\n                          /* TEXT */\n                        ),\n                        (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n                          \"p\",\n                          _hoisted_17,\n                          (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.filterTimeAgo(trade.updated_at)),\n                          1\n                          /* TEXT */\n                        )\n                      ]),\n                      trade.sender_avg + trade.receiver_avg > 0 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"div\", _hoisted_18, [\n                        (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_19, [\n                          (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup[\"SVGSprite\"], {\n                            class: \"svg-black small-h-margin-r\",\n                            square: \"16\",\n                            svg: \"shop/currency/bucks_full.svg\"\n                          })\n                        ]),\n                        (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n                          \"p\",\n                          _hoisted_20,\n                          (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(trade.sender_avg),\n                          1\n                          /* TEXT */\n                        ),\n                        (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_21, [\n                          (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup[\"SVGSprite\"], {\n                            class: \"svg-white small-h-margin\",\n                            square: \"16\",\n                            svg: \"user/trade/double_arrow.svg\"\n                          })\n                        ]),\n                        (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_22, [\n                          (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup[\"SVGSprite\"], {\n                            class: \"svg-black small-h-margin-r\",\n                            square: \"16\",\n                            svg: \"shop/currency/bucks_full.svg\"\n                          })\n                        ]),\n                        (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n                          \"p\",\n                          _hoisted_23,\n                          (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(trade.receiver_avg),\n                          1\n                          /* TEXT */\n                        )\n                      ])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(\"v-if\", true),\n                      !trade.is_pending ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"div\", _hoisted_24, [\n                        (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\n                          \"p\",\n                          _hoisted_25,\n                          (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.tradeStatus(trade)),\n                          1\n                          /* TEXT */\n                        )\n                      ])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(\"v-if\", true)\n                    ])\n                  ])\n                ]),\n                _: 2\n                /* DYNAMIC */\n              }, 1032, [\"href\", \"target\"]))\n            ], 10, _hoisted_11);\n          }),\n          128\n          /* KEYED_FRAGMENT */\n        ))\n      ],\n      512\n      /* NEED_PATCH */\n    ), [\n      [vue__WEBPACK_IMPORTED_MODULE_0__.vShow, $setup.trades.length > 0]\n    ])\n  ]);\n}\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/components/trades/TradeList.vue?./node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!./node_modules/vue-loader/dist/templateLoader.js??ruleSet%5B1%5D.rules%5B3%5D!./node_modules/vue-loader/dist/index.js??ruleSet%5B0%5D.use%5B0%5D");

/***/ }),

/***/ "./resources/assets/js/vue/filters/index.ts":
/*!**************************************************!*\
  !*** ./resources/assets/js/vue/filters/index.ts ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"filterDate\": () => (/* binding */ filterDate),\n/* harmony export */   \"filterDatetime\": () => (/* binding */ filterDatetime),\n/* harmony export */   \"filterDatetimeLong\": () => (/* binding */ filterDatetimeLong),\n/* harmony export */   \"filterNumber\": () => (/* binding */ filterNumber),\n/* harmony export */   \"filterNumberCompact\": () => (/* binding */ filterNumberCompact),\n/* harmony export */   \"filterTimeAgo\": () => (/* binding */ filterTimeAgo)\n/* harmony export */ });\n\nfunction filterTimeAgo(input) {\n  const date = input instanceof Date ? input : new Date(input);\n  const formatter = new Intl.RelativeTimeFormat(\"en\");\n  const ranges = {\n    years: 3600 * 24 * 365,\n    months: 3600 * 24 * 30,\n    weeks: 3600 * 24 * 7,\n    days: 3600 * 24,\n    hours: 3600,\n    minutes: 60,\n    seconds: 1\n  };\n  const secondsElapsed = (date.getTime() - Date.now()) / 1e3;\n  for (let key in ranges) {\n    if (ranges[key] < Math.abs(secondsElapsed)) {\n      const delta = secondsElapsed / ranges[key];\n      return formatter.format(\n        Math.round(delta),\n        key\n      );\n    }\n  }\n  return \"Never\";\n}\nfunction filterDate(date, options) {\n  return new Date(date).toLocaleDateString(\"en-gb\", options);\n}\nfunction filterDatetime(date) {\n  let parsed = new Date(date);\n  return `${parsed.toLocaleDateString(\"en-gb\")} ${parsed.toLocaleTimeString(\n    \"en-us\"\n  )}`;\n}\nfunction filterDatetimeLong(date) {\n  const formatter = new Intl.DateTimeFormat(\"en-gb\", {\n    year: \"numeric\",\n    month: \"long\",\n    day: \"numeric\",\n    hour: \"numeric\",\n    minute: \"numeric\",\n    hourCycle: \"h12\"\n  });\n  return formatter.format(new Date(date));\n}\nfunction filterNumberCompact(number) {\n  return new Intl.NumberFormat(\"en\", { notation: \"compact\" }).format(number);\n}\nfunction filterNumber(number) {\n  return new Intl.NumberFormat(\"en\").format(number);\n}\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/filters/index.ts?");

/***/ }),

/***/ "./resources/assets/js/vue/logic/data/abstract_data.ts":
/*!*************************************************************!*\
  !*** ./resources/assets/js/vue/logic/data/abstract_data.ts ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (/* binding */ AbstractData)\n/* harmony export */ });\n\nvar __defProp = Object.defineProperty;\nvar __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;\nvar __publicField = (obj, key, value) => {\n  __defNormalProp(obj, typeof key !== \"symbol\" ? key + \"\" : key, value);\n  return value;\n};\nclass AbstractData {\n  constructor(id) {\n    __publicField(this, \"id\");\n    this.id = id;\n  }\n  toString() {\n    return this.id.toString();\n  }\n  toJSON() {\n    return this.id;\n  }\n}\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/logic/data/abstract_data.ts?");

/***/ }),

/***/ "./resources/assets/js/vue/logic/data/thumbnails.ts":
/*!**********************************************************!*\
  !*** ./resources/assets/js/vue/logic/data/thumbnails.ts ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (/* binding */ ThumbnailType)\n/* harmony export */ });\n/* harmony import */ var _abstract_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./abstract_data */ \"./resources/assets/js/vue/logic/data/abstract_data.ts\");\n\nvar __defProp = Object.defineProperty;\nvar __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;\nvar __publicField = (obj, key, value) => {\n  __defNormalProp(obj, typeof key !== \"symbol\" ? key + \"\" : key, value);\n  return value;\n};\n\nconst _ThumbnailType = class extends _abstract_data__WEBPACK_IMPORTED_MODULE_0__[\"default\"] {\n};\nlet ThumbnailType = _ThumbnailType;\n__publicField(ThumbnailType, \"AvatarFull\", new _ThumbnailType(1));\n__publicField(ThumbnailType, \"ItemFull\", new _ThumbnailType(2));\n__publicField(ThumbnailType, \"OutfitFull\", new _ThumbnailType(3));\n__publicField(ThumbnailType, \"ItemVersionFull\", new _ThumbnailType(4));\n\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/logic/data/thumbnails.ts?");

/***/ }),

/***/ "./resources/assets/js/vue/logic/infinite_scroll.ts":
/*!**********************************************************!*\
  !*** ./resources/assets/js/vue/logic/infinite_scroll.ts ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"hasInfiniteScroll\": () => (/* binding */ hasInfiniteScroll)\n/* harmony export */ });\n\nvar __async = (__this, __arguments, generator) => {\n  return new Promise((resolve, reject) => {\n    var fulfilled = (value) => {\n      try {\n        step(generator.next(value));\n      } catch (e) {\n        reject(e);\n      }\n    };\n    var rejected = (value) => {\n      try {\n        step(generator.throw(value));\n      } catch (e) {\n        reject(e);\n      }\n    };\n    var step = (x) => x.done ? resolve(x.value) : Promise.resolve(x.value).then(fulfilled, rejected);\n    step((generator = generator.apply(__this, __arguments)).next());\n  });\n};\nfunction hasInfiniteScroll(callback, element = getDocumentElement()) {\n  const BOTTOM_PADDING_PIXELS = 550;\n  const BOTTOM_PADDING_PIXELS_CUSTOM_ELEMENT = 250;\n  const FINAL_PADDING = element === getDocumentElement() ? BOTTOM_PADDING_PIXELS : BOTTOM_PADDING_PIXELS_CUSTOM_ELEMENT;\n  let calledForHeight;\n  let scrollingElement = element;\n  if (element === document.scrollingElement) {\n    scrollingElement = window;\n  }\n  let paused = false;\n  scrollingElement.addEventListener(\"scroll\", checkForScroll);\n  scrollingElement.addEventListener(\"resize\", checkForScroll);\n  checkForScroll();\n  function checkForScroll() {\n    return __async(this, null, function* () {\n      if (paused)\n        return;\n      if (calledForHeight == element.scrollHeight)\n        return;\n      let bottomOfWindow = Math.abs(\n        element.scrollHeight - element.clientHeight - element.scrollTop\n      ) < FINAL_PADDING;\n      if (bottomOfWindow) {\n        calledForHeight = element.scrollHeight;\n        yield callback();\n      }\n    });\n  }\n  function clearScroll() {\n    calledForHeight = 0;\n  }\n  function setPaused(state) {\n    paused = state;\n    checkForScroll();\n  }\n  return { clearScroll, setPaused };\n}\nfunction getDocumentElement() {\n  let scrollElement = document.scrollingElement;\n  if (scrollElement !== null) {\n    return scrollElement;\n  }\n  return document.documentElement;\n}\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/logic/infinite_scroll.ts?");

/***/ }),

/***/ "./resources/assets/js/vue/store/modules/thumbnails.ts":
/*!*************************************************************!*\
  !*** ./resources/assets/js/vue/store/modules/thumbnails.ts ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"thumbnailStore\": () => (/* binding */ thumbnailStore)\n/* harmony export */ });\n/* harmony import */ var _logic_bh__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/logic/bh */ \"./resources/assets/js/vue/logic/bh.ts\");\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ \"./node_modules/axios/lib/axios.js\");\n/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../store */ \"./resources/assets/js/vue/store/store.ts\");\n\nvar __defProp = Object.defineProperty;\nvar __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;\nvar __publicField = (obj, key, value) => {\n  __defNormalProp(obj, typeof key !== \"symbol\" ? key + \"\" : key, value);\n  return value;\n};\nvar __async = (__this, __arguments, generator) => {\n  return new Promise((resolve, reject) => {\n    var fulfilled = (value) => {\n      try {\n        step(generator.next(value));\n      } catch (e) {\n        reject(e);\n      }\n    };\n    var rejected = (value) => {\n      try {\n        step(generator.throw(value));\n      } catch (e) {\n        reject(e);\n      }\n    };\n    var step = (x) => x.done ? resolve(x.value) : Promise.resolve(x.value).then(fulfilled, rejected);\n    step((generator = generator.apply(__this, __arguments)).next());\n  });\n};\n\n\n\nclass ThumbnailStore extends _store__WEBPACK_IMPORTED_MODULE_1__.Store {\n  constructor() {\n    super(...arguments);\n    __publicField(this, \"queuedThumbnails\", {});\n    __publicField(this, \"flushDelay\", 100);\n    __publicField(this, \"pendingFlushDelay\", 3e3);\n    __publicField(this, \"flusher\");\n    __publicField(this, \"normalUrl\", _logic_bh__WEBPACK_IMPORTED_MODULE_0__.BH.apiUrl(`v1/thumbnails/bulk`));\n    __publicField(this, \"adminUrl\", `/v1/admin/thumbnails/bulk`);\n    __publicField(this, \"shouldUseAdmin\", false);\n  }\n  data() {\n    return {\n      thumbnails: {}\n    };\n  }\n  getKey(data) {\n    return `${data.id}:${data.type}`;\n  }\n  getThumbnail(data) {\n    let key = this.getKey(data);\n    if (typeof this.state.thumbnails[key] === \"undefined\")\n      this.retrieveThumbnail(data);\n    return this.getState().thumbnails[key].thumbnail;\n  }\n  refreshThumbnail(data) {\n    let key = this.getKey(data);\n    if (typeof this.state.thumbnails[key] !== \"undefined\") {\n      delete this.state.thumbnails[key];\n    }\n    this.getThumbnail(data);\n  }\n  retrieveThumbnail(data) {\n    this.state.thumbnails[this.getKey(data)] = {\n      state: \"awaiting\",\n      // TODO: need to store the data in JS about what the proper pending image should be for the given type\n      thumbnail: _logic_bh__WEBPACK_IMPORTED_MODULE_0__.BH.img_pending_512\n    };\n    this.queuedThumbnails[this.getKey(data)] = {\n      data,\n      attempts: 0\n    };\n    if (data.admin) {\n      this.shouldUseAdmin = true;\n    }\n    this.callFlusher();\n  }\n  callFlusher(delay = this.flushDelay) {\n    clearTimeout(this.flusher);\n    this.flusher = setTimeout(this.flushThumbnails.bind(this), delay);\n  }\n  flushThumbnails() {\n    return __async(this, null, function* () {\n      let tooMany = Object.keys(this.queuedThumbnails).length > 100;\n      let toFlush = Object.keys(this.queuedThumbnails).slice(0, 99);\n      let postData = toFlush.map((key) => this.queuedThumbnails[key].data);\n      let url = this.normalUrl;\n      if (this.shouldUseAdmin) {\n        url = this.adminUrl;\n      }\n      yield axios__WEBPACK_IMPORTED_MODULE_2__[\"default\"].post(url, {\n        thumbnails: postData\n      }).then(({ data }) => {\n        for (let thumbData of data.data) {\n          switch (thumbData.state) {\n            case \"pending\":\n              this.queuedThumbnails[thumbData.key].attempts++;\n              if (this.queuedThumbnails[thumbData.key].attempts > 3) {\n                delete this.queuedThumbnails[thumbData.key];\n              } else {\n                this.callFlusher(this.pendingFlushDelay);\n              }\n              break;\n            default:\n              delete this.queuedThumbnails[thumbData.key];\n              this.state.thumbnails[thumbData.key] = {\n                state: thumbData.state,\n                thumbnail: thumbData.thumbnail\n              };\n          }\n        }\n      });\n      if (tooMany)\n        this.callFlusher();\n    });\n  }\n}\nconst thumbnailStore = new ThumbnailStore();\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/store/modules/thumbnails.ts?");

/***/ }),

/***/ "./resources/assets/js/vue/components/trades/TradeList.vue":
/*!*****************************************************************!*\
  !*** ./resources/assets/js/vue/components/trades/TradeList.vue ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var _TradeList_vue_vue_type_template_id_032f0b10_ts_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TradeList.vue?vue&type=template&id=032f0b10&ts=true */ \"./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=template&id=032f0b10&ts=true\");\n/* harmony import */ var _TradeList_vue_vue_type_script_setup_true_lang_ts__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TradeList.vue?vue&type=script&setup=true&lang=ts */ \"./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=script&setup=true&lang=ts\");\n/* harmony import */ var _var_www_html_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ \"./node_modules/vue-loader/dist/exportHelper.js\");\n\n\n\n\n;\nconst __exports__ = /*#__PURE__*/(0,_var_www_html_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(_TradeList_vue_vue_type_script_setup_true_lang_ts__WEBPACK_IMPORTED_MODULE_1__[\"default\"], [['render',_TradeList_vue_vue_type_template_id_032f0b10_ts_true__WEBPACK_IMPORTED_MODULE_0__.render],['__file',\"resources/assets/js/vue/components/trades/TradeList.vue\"]])\n/* hot reload */\nif (false) {}\n\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);\n\n//# sourceURL=webpack:///./resources/assets/js/vue/components/trades/TradeList.vue?");

/***/ }),

/***/ "./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=script&setup=true&lang=ts":
/*!****************************************************************************************************!*\
  !*** ./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=script&setup=true&lang=ts ***!
  \****************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (/* reexport safe */ _node_modules_esbuild_loader_dist_index_cjs_clonedRuleSet_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_TradeList_vue_vue_type_script_setup_true_lang_ts__WEBPACK_IMPORTED_MODULE_0__[\"default\"])\n/* harmony export */ });\n/* harmony import */ var _node_modules_esbuild_loader_dist_index_cjs_clonedRuleSet_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_TradeList_vue_vue_type_script_setup_true_lang_ts__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./TradeList.vue?vue&type=script&setup=true&lang=ts */ \"./node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=script&setup=true&lang=ts\");\n \n\n//# sourceURL=webpack:///./resources/assets/js/vue/components/trades/TradeList.vue?");

/***/ }),

/***/ "./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=template&id=032f0b10&ts=true":
/*!*******************************************************************************************************!*\
  !*** ./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=template&id=032f0b10&ts=true ***!
  \*******************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"render\": () => (/* reexport safe */ _node_modules_esbuild_loader_dist_index_cjs_clonedRuleSet_2_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_TradeList_vue_vue_type_template_id_032f0b10_ts_true__WEBPACK_IMPORTED_MODULE_0__.render)\n/* harmony export */ });\n/* harmony import */ var _node_modules_esbuild_loader_dist_index_cjs_clonedRuleSet_2_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_TradeList_vue_vue_type_template_id_032f0b10_ts_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./TradeList.vue?vue&type=template&id=032f0b10&ts=true */ \"./node_modules/esbuild-loader/dist/index.cjs??clonedRuleSet-2!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/assets/js/vue/components/trades/TradeList.vue?vue&type=template&id=032f0b10&ts=true\");\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/components/trades/TradeList.vue?");

/***/ })

}]);