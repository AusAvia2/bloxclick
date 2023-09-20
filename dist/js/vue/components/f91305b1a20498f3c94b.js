/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunk"] = self["webpackChunk"] || []).push([["vendors-node_modules_stripe_stripe-js_pure_js-node_modules_style-loader_dist_runtime_injectSt-745526"],{

/***/ "./node_modules/@stripe/stripe-js/dist/pure.js":
/*!*****************************************************!*\
  !*** ./node_modules/@stripe/stripe-js/dist/pure.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
eval("\n\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\n\nfunction _typeof(obj) {\n  \"@babel/helpers - typeof\";\n\n  if (typeof Symbol === \"function\" && typeof Symbol.iterator === \"symbol\") {\n    _typeof = function (obj) {\n      return typeof obj;\n    };\n  } else {\n    _typeof = function (obj) {\n      return obj && typeof Symbol === \"function\" && obj.constructor === Symbol && obj !== Symbol.prototype ? \"symbol\" : typeof obj;\n    };\n  }\n\n  return _typeof(obj);\n}\n\nvar V3_URL = 'https://js.stripe.com/v3';\nvar V3_URL_REGEX = /^https:\\/\\/js\\.stripe\\.com\\/v3\\/?(\\?.*)?$/;\nvar EXISTING_SCRIPT_MESSAGE = 'loadStripe.setLoadParameters was called but an existing Stripe.js script already exists in the document; existing script parameters will be used';\nvar findScript = function findScript() {\n  var scripts = document.querySelectorAll(\"script[src^=\\\"\".concat(V3_URL, \"\\\"]\"));\n\n  for (var i = 0; i < scripts.length; i++) {\n    var script = scripts[i];\n\n    if (!V3_URL_REGEX.test(script.src)) {\n      continue;\n    }\n\n    return script;\n  }\n\n  return null;\n};\n\nvar injectScript = function injectScript(params) {\n  var queryString = params && !params.advancedFraudSignals ? '?advancedFraudSignals=false' : '';\n  var script = document.createElement('script');\n  script.src = \"\".concat(V3_URL).concat(queryString);\n  var headOrBody = document.head || document.body;\n\n  if (!headOrBody) {\n    throw new Error('Expected document.body not to be null. Stripe.js requires a <body> element.');\n  }\n\n  headOrBody.appendChild(script);\n  return script;\n};\n\nvar registerWrapper = function registerWrapper(stripe, startTime) {\n  if (!stripe || !stripe._registerWrapper) {\n    return;\n  }\n\n  stripe._registerWrapper({\n    name: 'stripe-js',\n    version: \"1.53.0\",\n    startTime: startTime\n  });\n};\n\nvar stripePromise = null;\nvar loadScript = function loadScript(params) {\n  // Ensure that we only attempt to load Stripe.js at most once\n  if (stripePromise !== null) {\n    return stripePromise;\n  }\n\n  stripePromise = new Promise(function (resolve, reject) {\n    if (typeof window === 'undefined' || typeof document === 'undefined') {\n      // Resolve to null when imported server side. This makes the module\n      // safe to import in an isomorphic code base.\n      resolve(null);\n      return;\n    }\n\n    if (window.Stripe && params) {\n      console.warn(EXISTING_SCRIPT_MESSAGE);\n    }\n\n    if (window.Stripe) {\n      resolve(window.Stripe);\n      return;\n    }\n\n    try {\n      var script = findScript();\n\n      if (script && params) {\n        console.warn(EXISTING_SCRIPT_MESSAGE);\n      } else if (!script) {\n        script = injectScript(params);\n      }\n\n      script.addEventListener('load', function () {\n        if (window.Stripe) {\n          resolve(window.Stripe);\n        } else {\n          reject(new Error('Stripe.js not available'));\n        }\n      });\n      script.addEventListener('error', function () {\n        reject(new Error('Failed to load Stripe.js'));\n      });\n    } catch (error) {\n      reject(error);\n      return;\n    }\n  });\n  return stripePromise;\n};\nvar initStripe = function initStripe(maybeStripe, args, startTime) {\n  if (maybeStripe === null) {\n    return null;\n  }\n\n  var stripe = maybeStripe.apply(undefined, args);\n  registerWrapper(stripe, startTime);\n  return stripe;\n}; // eslint-disable-next-line @typescript-eslint/explicit-module-boundary-types\n\nvar validateLoadParams = function validateLoadParams(params) {\n  var errorMessage = \"invalid load parameters; expected object of shape\\n\\n    {advancedFraudSignals: boolean}\\n\\nbut received\\n\\n    \".concat(JSON.stringify(params), \"\\n\");\n\n  if (params === null || _typeof(params) !== 'object') {\n    throw new Error(errorMessage);\n  }\n\n  if (Object.keys(params).length === 1 && typeof params.advancedFraudSignals === 'boolean') {\n    return params;\n  }\n\n  throw new Error(errorMessage);\n};\n\nvar loadParams;\nvar loadStripeCalled = false;\nvar loadStripe = function loadStripe() {\n  for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {\n    args[_key] = arguments[_key];\n  }\n\n  loadStripeCalled = true;\n  var startTime = Date.now();\n  return loadScript(loadParams).then(function (maybeStripe) {\n    return initStripe(maybeStripe, args, startTime);\n  });\n};\n\nloadStripe.setLoadParameters = function (params) {\n  // we won't throw an error if setLoadParameters is called with the same values as before\n  if (loadStripeCalled && loadParams) {\n    var validatedParams = validateLoadParams(params);\n    var parameterKeys = Object.keys(validatedParams);\n    var sameParameters = parameterKeys.reduce(function (previousValue, currentValue) {\n      var _loadParams;\n\n      return previousValue && params[currentValue] === ((_loadParams = loadParams) === null || _loadParams === void 0 ? void 0 : _loadParams[currentValue]);\n    }, true);\n\n    if (sameParameters) {\n      return;\n    }\n  }\n\n  if (loadStripeCalled) {\n    throw new Error('You cannot change load parameters after calling loadStripe');\n  }\n\n  loadParams = validateLoadParams(params);\n};\n\nexports.loadStripe = loadStripe;\n\n\n//# sourceURL=webpack:///./node_modules/@stripe/stripe-js/dist/pure.js?");

/***/ }),

/***/ "./node_modules/@stripe/stripe-js/pure.js":
/*!************************************************!*\
  !*** ./node_modules/@stripe/stripe-js/pure.js ***!
  \************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

eval("module.exports = __webpack_require__(/*! ./dist/pure.js */ \"./node_modules/@stripe/stripe-js/dist/pure.js\");\n\n\n//# sourceURL=webpack:///./node_modules/@stripe/stripe-js/pure.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\nvar stylesInDOM = [];\nfunction getIndexByIdentifier(identifier) {\n  var result = -1;\n  for (var i = 0; i < stylesInDOM.length; i++) {\n    if (stylesInDOM[i].identifier === identifier) {\n      result = i;\n      break;\n    }\n  }\n  return result;\n}\nfunction modulesToDom(list, options) {\n  var idCountMap = {};\n  var identifiers = [];\n  for (var i = 0; i < list.length; i++) {\n    var item = list[i];\n    var id = options.base ? item[0] + options.base : item[0];\n    var count = idCountMap[id] || 0;\n    var identifier = \"\".concat(id, \" \").concat(count);\n    idCountMap[id] = count + 1;\n    var indexByIdentifier = getIndexByIdentifier(identifier);\n    var obj = {\n      css: item[1],\n      media: item[2],\n      sourceMap: item[3],\n      supports: item[4],\n      layer: item[5]\n    };\n    if (indexByIdentifier !== -1) {\n      stylesInDOM[indexByIdentifier].references++;\n      stylesInDOM[indexByIdentifier].updater(obj);\n    } else {\n      var updater = addElementStyle(obj, options);\n      options.byIndex = i;\n      stylesInDOM.splice(i, 0, {\n        identifier: identifier,\n        updater: updater,\n        references: 1\n      });\n    }\n    identifiers.push(identifier);\n  }\n  return identifiers;\n}\nfunction addElementStyle(obj, options) {\n  var api = options.domAPI(options);\n  api.update(obj);\n  var updater = function updater(newObj) {\n    if (newObj) {\n      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap && newObj.supports === obj.supports && newObj.layer === obj.layer) {\n        return;\n      }\n      api.update(obj = newObj);\n    } else {\n      api.remove();\n    }\n  };\n  return updater;\n}\nmodule.exports = function (list, options) {\n  options = options || {};\n  list = list || [];\n  var lastIdentifiers = modulesToDom(list, options);\n  return function update(newList) {\n    newList = newList || [];\n    for (var i = 0; i < lastIdentifiers.length; i++) {\n      var identifier = lastIdentifiers[i];\n      var index = getIndexByIdentifier(identifier);\n      stylesInDOM[index].references--;\n    }\n    var newLastIdentifiers = modulesToDom(newList, options);\n    for (var _i = 0; _i < lastIdentifiers.length; _i++) {\n      var _identifier = lastIdentifiers[_i];\n      var _index = getIndexByIdentifier(_identifier);\n      if (stylesInDOM[_index].references === 0) {\n        stylesInDOM[_index].updater();\n        stylesInDOM.splice(_index, 1);\n      }\n    }\n    lastIdentifiers = newLastIdentifiers;\n  };\n};\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/insertBySelector.js":
/*!********************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/insertBySelector.js ***!
  \********************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\nvar memo = {};\n\n/* istanbul ignore next  */\nfunction getTarget(target) {\n  if (typeof memo[target] === \"undefined\") {\n    var styleTarget = document.querySelector(target);\n\n    // Special case to return head of iframe instead of iframe itself\n    if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {\n      try {\n        // This will throw an exception if access to iframe is blocked\n        // due to cross-origin restrictions\n        styleTarget = styleTarget.contentDocument.head;\n      } catch (e) {\n        // istanbul ignore next\n        styleTarget = null;\n      }\n    }\n    memo[target] = styleTarget;\n  }\n  return memo[target];\n}\n\n/* istanbul ignore next  */\nfunction insertBySelector(insert, style) {\n  var target = getTarget(insert);\n  if (!target) {\n    throw new Error(\"Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.\");\n  }\n  target.appendChild(style);\n}\nmodule.exports = insertBySelector;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/insertBySelector.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/insertStyleElement.js":
/*!**********************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/insertStyleElement.js ***!
  \**********************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\n/* istanbul ignore next  */\nfunction insertStyleElement(options) {\n  var element = document.createElement(\"style\");\n  options.setAttributes(element, options.attributes);\n  options.insert(element, options.options);\n  return element;\n}\nmodule.exports = insertStyleElement;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/insertStyleElement.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js ***!
  \**********************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";
eval("\n\n/* istanbul ignore next  */\nfunction setAttributesWithoutAttributes(styleElement) {\n  var nonce =  true ? __webpack_require__.nc : 0;\n  if (nonce) {\n    styleElement.setAttribute(\"nonce\", nonce);\n  }\n}\nmodule.exports = setAttributesWithoutAttributes;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/styleDomAPI.js":
/*!***************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/styleDomAPI.js ***!
  \***************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\n/* istanbul ignore next  */\nfunction apply(styleElement, options, obj) {\n  var css = \"\";\n  if (obj.supports) {\n    css += \"@supports (\".concat(obj.supports, \") {\");\n  }\n  if (obj.media) {\n    css += \"@media \".concat(obj.media, \" {\");\n  }\n  var needLayer = typeof obj.layer !== \"undefined\";\n  if (needLayer) {\n    css += \"@layer\".concat(obj.layer.length > 0 ? \" \".concat(obj.layer) : \"\", \" {\");\n  }\n  css += obj.css;\n  if (needLayer) {\n    css += \"}\";\n  }\n  if (obj.media) {\n    css += \"}\";\n  }\n  if (obj.supports) {\n    css += \"}\";\n  }\n  var sourceMap = obj.sourceMap;\n  if (sourceMap && typeof btoa !== \"undefined\") {\n    css += \"\\n/*# sourceMappingURL=data:application/json;base64,\".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), \" */\");\n  }\n\n  // For old IE\n  /* istanbul ignore if  */\n  options.styleTagTransform(css, styleElement, options.options);\n}\nfunction removeStyleElement(styleElement) {\n  // istanbul ignore if\n  if (styleElement.parentNode === null) {\n    return false;\n  }\n  styleElement.parentNode.removeChild(styleElement);\n}\n\n/* istanbul ignore next  */\nfunction domAPI(options) {\n  if (typeof document === \"undefined\") {\n    return {\n      update: function update() {},\n      remove: function remove() {}\n    };\n  }\n  var styleElement = options.insertStyleElement(options);\n  return {\n    update: function update(obj) {\n      apply(styleElement, options, obj);\n    },\n    remove: function remove() {\n      removeStyleElement(styleElement);\n    }\n  };\n}\nmodule.exports = domAPI;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/styleDomAPI.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/styleTagTransform.js":
/*!*********************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/styleTagTransform.js ***!
  \*********************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\n/* istanbul ignore next  */\nfunction styleTagTransform(css, styleElement) {\n  if (styleElement.styleSheet) {\n    styleElement.styleSheet.cssText = css;\n  } else {\n    while (styleElement.firstChild) {\n      styleElement.removeChild(styleElement.firstChild);\n    }\n    styleElement.appendChild(document.createTextNode(css));\n  }\n}\nmodule.exports = styleTagTransform;\n\n//# sourceURL=webpack:///./node_modules/style-loader/dist/runtime/styleTagTransform.js?");

/***/ })

}]);