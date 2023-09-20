"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_assets_js_vue_logic_apis_API_ts-resources_assets_js_vue_logic_data_thumbnails_ts-re-d61dcb"],{

/***/ "./resources/assets/js/vue/logic/apis/API.ts":
/*!***************************************************!*\
  !*** ./resources/assets/js/vue/logic/apis/API.ts ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"API\": () => (/* binding */ API)\n/* harmony export */ });\n/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ \"./node_modules/vue/dist/vue.esm-bundler.js\");\n/* harmony import */ var _logic_bh__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/logic/bh */ \"./resources/assets/js/vue/logic/bh.ts\");\n\nvar __defProp = Object.defineProperty;\nvar __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;\nvar __publicField = (obj, key, value) => {\n  __defNormalProp(obj, typeof key !== \"symbol\" ? key + \"\" : key, value);\n  return value;\n};\n\n\nclass API {\n  constructor(url, limit = 10, startingCursor = \"\", useAPISubdomain = true) {\n    __publicField(this, \"apiUrl\");\n    __publicField(this, \"useAPISubdomain\");\n    __publicField(this, \"apiLimit\");\n    __publicField(this, \"startingCursor\");\n    __publicField(this, \"loadingURLs\");\n    __publicField(this, \"currentParams\");\n    __publicField(this, \"cachedData\");\n    __publicField(this, \"currentData\");\n    __publicField(this, \"pageNumber\");\n    __publicField(this, \"encParams\");\n    this.useAPISubdomain = useAPISubdomain;\n    if (this.useAPISubdomain) {\n      this.apiUrl = _logic_bh__WEBPACK_IMPORTED_MODULE_1__.BH.apiUrl(url);\n    } else {\n      this.apiUrl = url;\n    }\n    this.apiLimit = limit;\n    this.startingCursor = startingCursor;\n    this.cachedData = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)({});\n    this.currentData = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)([]);\n    this.pageNumber = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(1);\n    this.loadingURLs = /* @__PURE__ */ new Set();\n    this.currentParams = [];\n    this.encParams = \"\";\n  }\n  /**\n   * Takes in the Params wanted and sorts them to ensure variations in the order wont change the cache key and then encodes it into a single string to be used later.\n   *\n   * TODO: swap to https://developer.mozilla.org/en-US/docs/Web/API/URLSearchParams\n   *\n   * @param params\n   */\n  paramsToURL(params) {\n    let encoded = [];\n    const orderedParams = params.sort((a, b) => {\n      if (a.value > b.value)\n        return 1;\n      if (a.value < b.value)\n        return -1;\n      return 0;\n    });\n    orderedParams.forEach((param) => {\n      encoded.push(`${param.key}=${encodeURIComponent(param.value)}`);\n    });\n    return encoded.join(\"&\");\n  }\n  /**\n   * Modify the URL of the API for APIs that ask for some params in the url\n   *\n   * @param url\n   * @param dontRefresh\n   */\n  setUrl(url, dontRefresh = false) {\n    let newUrl = url;\n    if (this.useAPISubdomain) {\n      newUrl = _logic_bh__WEBPACK_IMPORTED_MODULE_1__.BH.apiUrl(url);\n    }\n    if (this.apiUrl != newUrl) {\n      this.apiUrl = newUrl;\n      if (!dontRefresh) {\n        this.refreshAPI();\n      }\n    }\n  }\n  /**\n   * Get the cache key for the attempted page. Assumes the current stored params are the ones wanted.\n   *\n   * @param pageNumber\n   */\n  getCacheKey(pageNumber) {\n    return `${this.apiUrl}:${pageNumber}:${this.encParams}`;\n  }\n  /**\n   * Add the given pageNumber and apiData to the cache.\n   *\n   * @param pageNumber\n   * @param apiData\n   */\n  addToCache(pageNumber, apiData) {\n    this.cachedData.value[this.getCacheKey(pageNumber)] = apiData;\n  }\n  /**\n   * Returns the cached data for a given page. Will return null if not stored.\n   *\n   * @param pageNumber\n   */\n  getFromCache(pageNumber) {\n    return this.cachedData.value[this.getCacheKey(pageNumber)];\n  }\n  /**\n   * Take in the given cursor and params and generate a requestable URL\n   *\n   * @param cursor\n   * @param params\n   */\n  getURL(cursor, params) {\n    return `${this.apiUrl}?limit=${this.apiLimit}&cursor=${cursor}&${params}`;\n  }\n}\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/logic/apis/API.ts?");

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

/***/ "./resources/assets/js/vue/store/modules/thumbnails.ts":
/*!*************************************************************!*\
  !*** ./resources/assets/js/vue/store/modules/thumbnails.ts ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"thumbnailStore\": () => (/* binding */ thumbnailStore)\n/* harmony export */ });\n/* harmony import */ var _logic_bh__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/logic/bh */ \"./resources/assets/js/vue/logic/bh.ts\");\n/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ \"./node_modules/axios/lib/axios.js\");\n/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../store */ \"./resources/assets/js/vue/store/store.ts\");\n\nvar __defProp = Object.defineProperty;\nvar __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;\nvar __publicField = (obj, key, value) => {\n  __defNormalProp(obj, typeof key !== \"symbol\" ? key + \"\" : key, value);\n  return value;\n};\nvar __async = (__this, __arguments, generator) => {\n  return new Promise((resolve, reject) => {\n    var fulfilled = (value) => {\n      try {\n        step(generator.next(value));\n      } catch (e) {\n        reject(e);\n      }\n    };\n    var rejected = (value) => {\n      try {\n        step(generator.throw(value));\n      } catch (e) {\n        reject(e);\n      }\n    };\n    var step = (x) => x.done ? resolve(x.value) : Promise.resolve(x.value).then(fulfilled, rejected);\n    step((generator = generator.apply(__this, __arguments)).next());\n  });\n};\n\n\n\nclass ThumbnailStore extends _store__WEBPACK_IMPORTED_MODULE_1__.Store {\n  constructor() {\n    super(...arguments);\n    __publicField(this, \"queuedThumbnails\", {});\n    __publicField(this, \"flushDelay\", 100);\n    __publicField(this, \"pendingFlushDelay\", 3e3);\n    __publicField(this, \"flusher\");\n    __publicField(this, \"normalUrl\", _logic_bh__WEBPACK_IMPORTED_MODULE_0__.BH.apiUrl(`v1/thumbnails/bulk`));\n    __publicField(this, \"adminUrl\", `/v1/admin/thumbnails/bulk`);\n    __publicField(this, \"shouldUseAdmin\", false);\n  }\n  data() {\n    return {\n      thumbnails: {}\n    };\n  }\n  getKey(data) {\n    return `${data.id}:${data.type}`;\n  }\n  getThumbnail(data) {\n    let key = this.getKey(data);\n    if (typeof this.state.thumbnails[key] === \"undefined\")\n      this.retrieveThumbnail(data);\n    return this.getState().thumbnails[key].thumbnail;\n  }\n  refreshThumbnail(data) {\n    let key = this.getKey(data);\n    if (typeof this.state.thumbnails[key] !== \"undefined\") {\n      delete this.state.thumbnails[key];\n    }\n    this.getThumbnail(data);\n  }\n  retrieveThumbnail(data) {\n    this.state.thumbnails[this.getKey(data)] = {\n      state: \"awaiting\",\n      // TODO: need to store the data in JS about what the proper pending image should be for the given type\n      thumbnail: _logic_bh__WEBPACK_IMPORTED_MODULE_0__.BH.img_pending_512\n    };\n    this.queuedThumbnails[this.getKey(data)] = {\n      data,\n      attempts: 0\n    };\n    if (data.admin) {\n      this.shouldUseAdmin = true;\n    }\n    this.callFlusher();\n  }\n  callFlusher(delay = this.flushDelay) {\n    clearTimeout(this.flusher);\n    this.flusher = setTimeout(this.flushThumbnails.bind(this), delay);\n  }\n  flushThumbnails() {\n    return __async(this, null, function* () {\n      let tooMany = Object.keys(this.queuedThumbnails).length > 100;\n      let toFlush = Object.keys(this.queuedThumbnails).slice(0, 99);\n      let postData = toFlush.map((key) => this.queuedThumbnails[key].data);\n      let url = this.normalUrl;\n      if (this.shouldUseAdmin) {\n        url = this.adminUrl;\n      }\n      yield axios__WEBPACK_IMPORTED_MODULE_2__[\"default\"].post(url, {\n        thumbnails: postData\n      }).then(({ data }) => {\n        for (let thumbData of data.data) {\n          switch (thumbData.state) {\n            case \"pending\":\n              this.queuedThumbnails[thumbData.key].attempts++;\n              if (this.queuedThumbnails[thumbData.key].attempts > 3) {\n                delete this.queuedThumbnails[thumbData.key];\n              } else {\n                this.callFlusher(this.pendingFlushDelay);\n              }\n              break;\n            default:\n              delete this.queuedThumbnails[thumbData.key];\n              this.state.thumbnails[thumbData.key] = {\n                state: thumbData.state,\n                thumbnail: thumbData.thumbnail\n              };\n          }\n        }\n      });\n      if (tooMany)\n        this.callFlusher();\n    });\n  }\n}\nconst thumbnailStore = new ThumbnailStore();\n\n\n//# sourceURL=webpack:///./resources/assets/js/vue/store/modules/thumbnails.ts?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/***/ ((module) => {

eval("\n\nvar stylesInDOM = [];\nfunction getIndexByIdentifier(identifier) {\n  var result = -1;\n  for (var i = 0; i < stylesInDOM.length; i++) {\n    if (stylesInDOM[i].identifier === identifier) {\n      result = i;\n      break;\n    }\n  }\n  return result;\n}\nfunction modulesToDom(list, options) {\n  var idCountMap = {};\n  var identifiers = [];\n  for (var i = 0; i < list.length; i++) {\n    var item = list[i];\n    var id = options.base ? item[0] + options.base : item[0];\n    var count = idCountMap[id] || 0;\n    var identifier = \"\".concat(id, \" \").concat(count);\n    idCountMap[id] = count + 1;\n    var indexByIdentifier = getIndexByIdentifier(identifier);\n    var obj = {\n      css: item[1],\n      media: item[2],\n      sourceMap: item[3],\n      supports: item[4],\n      layer: item[5]\n    };\n    if (indexByIdentifier !== -1) {\n      stylesInDOM[indexByIdentifier].references++;\n      stylesInDOM[indexByIdentifier].updater(obj);\n    } else {\n      var updater = addElementStyle(obj, options);\n      options.byIndex = i;\n      stylesInDOM.splice(i, 0, {\n        identifier: identifier,\n        updater: updater,\n        references: 1\n      });\n    }\n    identifiers.push(identifier);\n  }\n  return identifiers;\n}\nfunction addElementStyle(obj, options) {\n  var api = options.domAPI(options);\n  api.update(obj);\n  var updater = function updater(newObj) {\n    if (newObj) {\n      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap && newObj.supports === obj.supports && newObj.layer === obj.layer) {\n        return;\n      }\n      api.update(obj = newObj);\n    } else {\n      api.remove();\n    }\n  };\n  return updater;\n}\nmodule.exports = function (list, options) {\n  options = options || {};\n  list = list || [];\n  var lastIdentifiers = modulesToDom(list, options);\n  return function update(newList) {\n    newList = newList || [];\n    for (var i = 0; i < lastIdentifiers.length; i++) {\n      var identifier = lastIdentifiers[i];\n      var index = getIndexByIdentifier(identifier);\n      stylesInDOM[index].references--;\n    }\n    var newLastIdentifiers = modulesToDom(newList, options);\n    for (var _i = 0; _i < lastIdentifiers.length; _i++) {\n      var _identifier = lastIdentifiers[_i];\n      var _index = getIndexByIdentifier(_identifier);\n      if (stylesInDOM[_index].references === 0) {\n        stylesInDOM[_index].updater();\n        stylesInDOM.splice(_index, 1);\n      }\n    }\n    lastIdentifiers = newLastIdentifiers;\n  };\n};\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/insertBySelector.js":
/*!********************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/insertBySelector.js ***!
  \********************************************************************/
/***/ ((module) => {

eval("\n\nvar memo = {};\n\n/* istanbul ignore next  */\nfunction getTarget(target) {\n  if (typeof memo[target] === \"undefined\") {\n    var styleTarget = document.querySelector(target);\n\n    // Special case to return head of iframe instead of iframe itself\n    if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {\n      try {\n        // This will throw an exception if access to iframe is blocked\n        // due to cross-origin restrictions\n        styleTarget = styleTarget.contentDocument.head;\n      } catch (e) {\n        // istanbul ignore next\n        styleTarget = null;\n      }\n    }\n    memo[target] = styleTarget;\n  }\n  return memo[target];\n}\n\n/* istanbul ignore next  */\nfunction insertBySelector(insert, style) {\n  var target = getTarget(insert);\n  if (!target) {\n    throw new Error(\"Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.\");\n  }\n  target.appendChild(style);\n}\nmodule.exports = insertBySelector;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/insertBySelector.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/insertStyleElement.js":
/*!**********************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/insertStyleElement.js ***!
  \**********************************************************************/
/***/ ((module) => {

eval("\n\n/* istanbul ignore next  */\nfunction insertStyleElement(options) {\n  var element = document.createElement(\"style\");\n  options.setAttributes(element, options.attributes);\n  options.insert(element, options.options);\n  return element;\n}\nmodule.exports = insertStyleElement;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/insertStyleElement.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js ***!
  \**********************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

eval("\n\n/* istanbul ignore next  */\nfunction setAttributesWithoutAttributes(styleElement) {\n  var nonce =  true ? __webpack_require__.nc : 0;\n  if (nonce) {\n    styleElement.setAttribute(\"nonce\", nonce);\n  }\n}\nmodule.exports = setAttributesWithoutAttributes;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/styleDomAPI.js":
/*!***************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/styleDomAPI.js ***!
  \***************************************************************/
/***/ ((module) => {

eval("\n\n/* istanbul ignore next  */\nfunction apply(styleElement, options, obj) {\n  var css = \"\";\n  if (obj.supports) {\n    css += \"@supports (\".concat(obj.supports, \") {\");\n  }\n  if (obj.media) {\n    css += \"@media \".concat(obj.media, \" {\");\n  }\n  var needLayer = typeof obj.layer !== \"undefined\";\n  if (needLayer) {\n    css += \"@layer\".concat(obj.layer.length > 0 ? \" \".concat(obj.layer) : \"\", \" {\");\n  }\n  css += obj.css;\n  if (needLayer) {\n    css += \"}\";\n  }\n  if (obj.media) {\n    css += \"}\";\n  }\n  if (obj.supports) {\n    css += \"}\";\n  }\n  var sourceMap = obj.sourceMap;\n  if (sourceMap && typeof btoa !== \"undefined\") {\n    css += \"\\n/*# sourceMappingURL=data:application/json;base64,\".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), \" */\");\n  }\n\n  // For old IE\n  /* istanbul ignore if  */\n  options.styleTagTransform(css, styleElement, options.options);\n}\nfunction removeStyleElement(styleElement) {\n  // istanbul ignore if\n  if (styleElement.parentNode === null) {\n    return false;\n  }\n  styleElement.parentNode.removeChild(styleElement);\n}\n\n/* istanbul ignore next  */\nfunction domAPI(options) {\n  if (typeof document === \"undefined\") {\n    return {\n      update: function update() {},\n      remove: function remove() {}\n    };\n  }\n  var styleElement = options.insertStyleElement(options);\n  return {\n    update: function update(obj) {\n      apply(styleElement, options, obj);\n    },\n    remove: function remove() {\n      removeStyleElement(styleElement);\n    }\n  };\n}\nmodule.exports = domAPI;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/styleDomAPI.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/styleTagTransform.js":
/*!*********************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/styleTagTransform.js ***!
  \*********************************************************************/
/***/ ((module) => {

eval("\n\n/* istanbul ignore next  */\nfunction styleTagTransform(css, styleElement) {\n  if (styleElement.styleSheet) {\n    styleElement.styleSheet.cssText = css;\n  } else {\n    while (styleElement.firstChild) {\n      styleElement.removeChild(styleElement.firstChild);\n    }\n    styleElement.appendChild(document.createTextNode(css));\n  }\n}\nmodule.exports = styleTagTransform;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/styleTagTransform.js?");

/***/ })

}]);