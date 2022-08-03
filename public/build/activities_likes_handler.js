(self["webpackChunk"] = self["webpackChunk"] || []).push([["activities_likes_handler"],{

/***/ "./assets/javascript/activity_js/activities_likes_handler.js":
/*!*******************************************************************!*\
  !*** ./assets/javascript/activity_js/activities_likes_handler.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _like__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./like */ "./assets/javascript/activity_js/like.js");



var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");



var likesHandler = function likesHandler(request, tag) {
  fetch(request).then(function (response) {
    return response.json();
  }).then(function (response) {
    var likes = response.likes;
    $("#" + $(tag).data("token_likes")).html(likes);
    $("#" + $(tag).data("token_unlikes")).html(response.unlikes);
  });
};

$(document).ready(function () {
  $('.__likes').click(function () {
    var like = new _like__WEBPACK_IMPORTED_MODULE_2__.default($(this).data("token_likes"), $(this).data("like"), $(this).data('route'), $(this).css("backgroundColor"));
    var request = like.likesHandler();
    $(this).css({
      "background-color": "".concat(like.backgroundColor),
      "color": "".concat(like.color)
    });
    likesHandler(request, $(this));
  });
  $('.__unlikes').click(function () {
    var like = new _like__WEBPACK_IMPORTED_MODULE_2__.default($(this).data("token_unlikes"), $(this).data("unlike"), $(this).data('route'), $(this).css("backgroundColor"));
    var request = like.likesHandler();
    $(this).css({
      "background-color": "".concat(like.backgroundColor),
      "color": "".concat(like.color)
    });
    likesHandler(request, $(this));
  });
});

/***/ }),

/***/ "./assets/javascript/activity_js/like.js":
/*!***********************************************!*\
  !*** ./assets/javascript/activity_js/like.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_0__);


function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Like = /*#__PURE__*/function () {
  function Like(token, activity_id, route, backgroundColor) {
    _classCallCheck(this, Like);

    this.token = token;
    this.value = 0;
    this.route = route;
    this.activity_id = activity_id;
    this.backgroundColor = backgroundColor;
    this.color = "white";
  }

  _createClass(Like, [{
    key: "likesHandler",
    value: function likesHandler() {
      var data = new FormData();
      data.append("id", this.activity_id);

      if (this.backgroundColor === "rgba(0, 0, 0, 0)") {
        this.value = 1;
        this.backgroundColor = "rgb(13, 71, 161)";
      } else {
        this.value = -1;
        this.backgroundColor = "rgba(0, 0, 0, 0)";
        this.color = "black";
      }

      data.append("value", this.value);
      return new Request(this.route, {
        method: 'POST',
        body: data,
        credentials: 'same-origin'
      });
    }
  }]);

  return Like;
}();

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Like);

/***/ }),

/***/ "./node_modules/core-js/modules/es.object.define-property.js":
/*!*******************************************************************!*\
  !*** ./node_modules/core-js/modules/es.object.define-property.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var DESCRIPTORS = __webpack_require__(/*! ../internals/descriptors */ "./node_modules/core-js/internals/descriptors.js");
var objectDefinePropertyModile = __webpack_require__(/*! ../internals/object-define-property */ "./node_modules/core-js/internals/object-define-property.js");

// `Object.defineProperty` method
// https://tc39.github.io/ecma262/#sec-object.defineproperty
$({ target: 'Object', stat: true, forced: !DESCRIPTORS, sham: !DESCRIPTORS }, {
  defineProperty: objectDefinePropertyModile.f
});


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ "use strict";
/******/ 
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_engine-user-agent_js-node_modules_core-js_internals_ex-b41e05","vendors-node_modules_core-js_modules_es_object_to-string_js-node_modules_core-js_modules_es_p-2a1352"], () => (__webpack_exec__("./assets/javascript/activity_js/activities_likes_handler.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9hY3Rpdml0eV9qcy9hY3Rpdml0aWVzX2xpa2VzX2hhbmRsZXIuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2phdmFzY3JpcHQvYWN0aXZpdHlfanMvbGlrZS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9tb2R1bGVzL2VzLm9iamVjdC5kZWZpbmUtcHJvcGVydHkuanMiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJsaWtlc0hhbmRsZXIiLCJyZXF1ZXN0IiwidGFnIiwiZmV0Y2giLCJ0aGVuIiwicmVzcG9uc2UiLCJqc29uIiwibGlrZXMiLCJkYXRhIiwiaHRtbCIsInVubGlrZXMiLCJkb2N1bWVudCIsInJlYWR5IiwiY2xpY2siLCJsaWtlIiwiTGlrZSIsImNzcyIsImJhY2tncm91bmRDb2xvciIsImNvbG9yIiwidG9rZW4iLCJhY3Rpdml0eV9pZCIsInJvdXRlIiwidmFsdWUiLCJGb3JtRGF0YSIsImFwcGVuZCIsIlJlcXVlc3QiLCJtZXRob2QiLCJib2R5IiwiY3JlZGVudGlhbHMiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQUFBLElBQUlBLENBQUMsR0FBR0MsbUJBQU8sQ0FBQyxvREFBRCxDQUFmOztBQUNBOztBQUVBLElBQU1DLFlBQVksR0FBRyxTQUFmQSxZQUFlLENBQVVDLE9BQVYsRUFBbUJDLEdBQW5CLEVBQXVCO0FBQ3hDQyxPQUFLLENBQUNGLE9BQUQsQ0FBTCxDQUNJRyxJQURKLENBQ1MsVUFBQ0MsUUFBRCxFQUFZO0FBQ2IsV0FBT0EsUUFBUSxDQUFDQyxJQUFULEVBQVA7QUFDUCxHQUhELEVBR0dGLElBSEgsQ0FHUSxVQUFDQyxRQUFELEVBQVk7QUFDaEIsUUFBSUUsS0FBSyxHQUFHRixRQUFRLENBQUNFLEtBQXJCO0FBQ0FULEtBQUMsQ0FBQyxNQUFJQSxDQUFDLENBQUNJLEdBQUQsQ0FBRCxDQUFPTSxJQUFQLENBQVksYUFBWixDQUFM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TCxHQUF1QixrQkFBdkI7QUFDQSxhQUFLQyxLQUFMLEdBQWEsT0FBYjtBQUNIOztBQUNEVixVQUFJLENBQUNnQixNQUFMLENBQVksT0FBWixFQUFxQixLQUFLRixLQUExQjtBQUNBLGFBQU8sSUFBSUcsT0FBSixDQUFZLEtBQUtKLEtBQWpCLEVBQXdCO0FBQzNCSyxjQUFNLEVBQUUsTUFEbUI7QUFFM0JDLFlBQUksRUFBRW5CLElBRnFCO0FBRzNCb0IsbUJBQVcsRUFBRTtBQUhjLE9BQXhCLENBQVA7QUFLSDs7Ozs7O0FBR0wsaUVBQWViLElBQWYsRTs7Ozs7Ozs7OztBQzlCQSxRQUFRLG1CQUFPLENBQUMsdUVBQXFCO0FBQ3JDLGtCQUFrQixtQkFBTyxDQUFDLGlGQUEwQjtBQUNwRCxpQ0FBaUMsbUJBQU8sQ0FBQyx1R0FBcUM7O0FBRTlFO0FBQ0E7QUFDQSxHQUFHLHlFQUF5RTtBQUM1RTtBQUNBLENBQUMiLCJmaWxlIjoiYWN0aXZpdGllc19saWtlc19oYW5kbGVyLmpzIiwic291cmNlc0NvbnRlbnQiOlsibGV0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcclxuaW1wb3J0IExpa2UgZnJvbSBcIi4vbGlrZVwiO1xyXG5cclxuY29uc3QgbGlrZXNIYW5kbGVyID0gZnVuY3Rpb24gKHJlcXVlc3QsIHRhZyl7XHJcbiAgICBmZXRjaChyZXF1ZXN0KS5cclxuICAgICAgICB0aGVuKChyZXNwb25zZSk9PntcclxuICAgICAgICAgICAgcmV0dXJuIHJlc3BvbnNlLmpzb24oKTtcclxuICAgIH0pLnRoZW4oKHJlc3BvbnNlKT0+e1xyXG4gICAgICAgIGxldCBsaWtlcyA9IHJlc3BvbnNlLmxpa2VzO1xyXG4gICAgICAgICQoXCIjXCIrJCh0YWcpLmRhdGEoXCJ0b2tlbl9saWtlc1wiKSkuaHRtbChsaWtlcyk7XHJcbiAgICAgICAgJChcIiNcIiskKHRhZykuZGF0YShcInRva2VuX3VubGlrZXNcIikpLmh0bWwocmVzcG9uc2UudW5saWtlcyk7XHJcbiAgICB9KVxyXG59XHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpe1xyXG4gICAgJCgnLl9fbGlrZXMnKS5jbGljayhmdW5jdGlvbiAoKXtcclxuICAgICAgICBsZXQgbGlrZSA9IG5ldyBMaWtlKFxyXG4gICAgICAgICAgICAkKHRoaXMpLmRhdGEoXCJ0b2tlbl9saWtlc1wiKSxcclxuICAgICAgICAgICAgJCh0aGlzKS5kYXRhKFwibGlrZVwiKSxcclxuICAgICAgICAgICAgJCh0aGlzKS5kYXRhKCdyb3V0ZScpLFxyXG4gICAgICAgICAgICAkKHRoaXMpLmNzcyhcImJhY2tncm91bmRDb2xvclwiKSk7XHJcbiAgICAgICAgbGV0IHJlcXVlc3QgPSBsaWtlLmxpa2VzSGFuZGxlcigpO1xyXG4gICAgICAgICQodGhpcykuY3NzKHtcclxuICAgICAgICAgICAgXCJiYWNrZ3JvdW5kLWNvbG9yXCI6YCR7bGlrZS5iYWNrZ3JvdW5kQ29sb3J9YCxcclxuICAgICAgICAgICAgXCJjb2xvclwiOmAke2xpa2UuY29sb3J9YFxyXG4gICAgICAgIH0pXHJcbiAgICAgICAgbGlrZXNIYW5kbGVyKHJlcXVlc3QsICQodGhpcykpO1xyXG4gICAgfSk7XHJcbiAgICAkKCcuX191bmxpa2VzJykuY2xpY2soZnVuY3Rpb24gKCl7XHJcbiAgICAgICAgbGV0IGxpa2UgPSBuZXcgTGlrZShcclxuICAgICAgICAgICAgJCh0aGlzKS5kYXRhKFwidG9rZW5fdW5saWtlc1wiKSxcclxuICAgICAgICAgICAgJCh0aGlzKS5kYXRhKFwidW5saWtlXCIpLFxyXG4gICAgICAgICAgICAkKHRoaXMpLmRhdGEoJ3JvdXRlJyksXHJcbiAgICAgICAgICAgICQodGhpcykuY3NzKFwiYmFja2dyb3VuZENvbG9yXCIpKTtcclxuICAgICAgICBsZXQgcmVxdWVzdCA9IGxpa2UubGlrZXNIYW5kbGVyKCk7XHJcbiAgICAgICAgJCh0aGlzKS5jc3Moe1xyXG4gICAgICAgICAgICBcImJhY2tncm91bmQtY29sb3JcIjpgJHtsaWtlLmJhY2tncm91bmRDb2xvcn1gLFxyXG4gICAgICAgICAgICBcImNvbG9yXCI6YCR7bGlrZS5jb2xvcn1gXHJcbiAgICAgICAgfSlcclxuICAgICAgICBsaWtlc0hhbmRsZXIocmVxdWVzdCwgJCh0aGlzKSk7XHJcbiAgICB9KTtcclxufSkiLCJjbGFzcyBMaWtle1xyXG4gICAgY29uc3RydWN0b3IodG9rZW4sIGFjdGl2aXR5X2lkLCByb3V0ZSwgYmFja2dyb3VuZENvbG9yKSB7XHJcbiAgICAgICAgdGhpcy50b2tlbiA9IHRva2VuO1xyXG4gICAgICAgIHRoaXMudmFsdWUgPSAwO1xyXG4gICAgICAgIHRoaXMucm91dGUgPSByb3V0ZTtcclxuICAgICAgICB0aGlzLmFjdGl2aXR5X2lkID0gYWN0aXZpdHlfaWQ7XHJcbiAgICAgICAgdGhpcy5iYWNrZ3JvdW5kQ29sb3IgPSBiYWNrZ3JvdW5kQ29sb3I7XHJcbiAgICAgICAgdGhpcy5jb2xvciA9IFwid2hpdGVcIjtcclxuICAgIH1cclxuXHJcbiAgICBsaWtlc0hhbmRsZXIoKXtcclxuICAgICAgICBjb25zdCBkYXRhID0gbmV3IEZvcm1EYXRhKCk7XHJcbiAgICAgICAgZGF0YS5hcHBlbmQoXCJpZFwiLCB0aGlzLmFjdGl2aXR5X2lkKTtcclxuICAgICAgICBpZih0aGlzLmJhY2tncm91bmRDb2xvciA9PT0gXCJyZ2JhKDAsIDAsIDAsIDApXCIpe1xyXG4gICAgICAgICAgICB0aGlzLnZhbHVlID0gMTtcclxuICAgICAgICAgICAgdGhpcy5iYWNrZ3JvdW5kQ29sb3IgPSBcInJnYigxMywgNzEsIDE2MSlcIjtcclxuICAgICAgICB9ZWxzZXtcclxuICAgICAgICAgICAgdGhpcy52YWx1ZSA9IC0xO1xyXG4gICAgICAgICAgICB0aGlzLmJhY2tncm91bmRDb2xvciA9IFwicmdiYSgwLCAwLCAwLCAwKVwiO1xyXG4gICAgICAgICAgICB0aGlzLmNvbG9yID0gXCJibGFja1wiO1xyXG4gICAgICAgIH1cclxuICAgICAgICBkYXRhLmFwcGVuZChcInZhbHVlXCIsIHRoaXMudmFsdWUpO1xyXG4gICAgICAgIHJldHVybiBuZXcgUmVxdWVzdCh0aGlzLnJvdXRlLCB7XHJcbiAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxyXG4gICAgICAgICAgICBib2R5OiBkYXRhLFxyXG4gICAgICAgICAgICBjcmVkZW50aWFsczogJ3NhbWUtb3JpZ2luJ1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG59XHJcblxyXG5leHBvcnQgZGVmYXVsdCBMaWtlOyIsInZhciAkID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2V4cG9ydCcpO1xudmFyIERFU0NSSVBUT1JTID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2Rlc2NyaXB0b3JzJyk7XG52YXIgb2JqZWN0RGVmaW5lUHJvcGVydHlNb2RpbGUgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvb2JqZWN0LWRlZmluZS1wcm9wZXJ0eScpO1xuXG4vLyBgT2JqZWN0LmRlZmluZVByb3BlcnR5YCBtZXRob2Rcbi8vIGh0dHBzOi8vdGMzOS5naXRodWIuaW8vZWNtYTI2Mi8jc2VjLW9iamVjdC5kZWZpbmVwcm9wZXJ0eVxuJCh7IHRhcmdldDogJ09iamVjdCcsIHN0YXQ6IHRydWUsIGZvcmNlZDogIURFU0NSSVBUT1JTLCBzaGFtOiAhREVTQ1JJUFRPUlMgfSwge1xuICBkZWZpbmVQcm9wZXJ0eTogb2JqZWN0RGVmaW5lUHJvcGVydHlNb2RpbGUuZlxufSk7XG4iXSwic291cmNlUm9vdCI6IiJ9