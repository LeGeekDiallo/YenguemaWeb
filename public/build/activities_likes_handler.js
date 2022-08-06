"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["activities_likes_handler"],{

/***/ "./assets/javascript/activity_js/activities_likes_handler.js":
/*!*******************************************************************!*\
  !*** ./assets/javascript/activity_js/activities_likes_handler.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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
    var like = new _like__WEBPACK_IMPORTED_MODULE_2__["default"]($(this).data("token_likes"), $(this).data("like"), $(this).data('route'), $(this).css("backgroundColor"));
    var request = like.likesHandler();
    $(this).css({
      "background-color": "".concat(like.backgroundColor),
      "color": "".concat(like.color)
    });
    likesHandler(request, $(this));
  });
  $('.__unlikes').click(function () {
    var like = new _like__WEBPACK_IMPORTED_MODULE_2__["default"]($(this).data("token_unlikes"), $(this).data("unlike"), $(this).data('route'), $(this).css("backgroundColor"));
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

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_0__);


function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

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

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_array-slice_js-node_modules_core-js_internals_export_j-4fec76","vendors-node_modules_core-js_modules_es_object_define-property_js-node_modules_core-js_module-74df95"], () => (__webpack_exec__("./assets/javascript/activity_js/activities_likes_handler.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QTs7SUFDcEQsS0FBS0UsS0FBTCxHQUFhQSxLQUFiO0lBQ0EsS0FBS0csS0FBTCxHQUFhLENBQWI7SUFDQSxLQUFLRCxLQUFMLEdBQWFBLEtBQWI7SUFDQSxLQUFLRCxXQUFMLEdBQW1CQSxXQUFuQjtJQUNBLEtBQUtILGVBQUwsR0FBdUJBLGVBQXZCO0lBQ0EsS0FBS0MsS0FBTCxHQUFhLE9BQWI7RUFDSDs7OztXQUVELHdCQUFjO01BQ1YsSUFBTVQsSUFBSSxHQUFHLElBQUljLFFBQUosRUFBYjtNQUNBZCxJQUFJLENBQUNlLE1BQUwsQ0FBWSxJQUFaLEVBQWtCLEtBQUtKLFdBQXZCOztNQUNBLElBQUcsS0FBS0gsZUFBTCxLQUF5QixrQkFBNUIsRUFBK0M7UUFDM0MsS0FBS0ssS0FBTCxHQUFhLENBQWI7UUFDQSxLQUFLTCxlQUFMLEdBQXVCLGtCQUF2QjtNQUNILENBSEQsTUFHSztRQUNELEtBQUtLLEtBQUwsR0FBYSxDQUFDLENBQWQ7UUFDQSxLQUFLTCxlQUFMLEdBQXVCLGtCQUF2QjtRQUNBLEtBQUtDLEtBQUwsR0FBYSxPQUFiO01BQ0g7O01BQ0RULElBQUksQ0FBQ2UsTUFBTCxDQUFZLE9BQVosRUFBcUIsS0FBS0YsS0FBMUI7TUFDQSxPQUFPLElBQUlHLE9BQUosQ0FBWSxLQUFLSixLQUFqQixFQUF3QjtRQUMzQkssTUFBTSxFQUFFLE1BRG1CO1FBRTNCQyxJQUFJLEVBQUVsQixJQUZxQjtRQUczQm1CLFdBQVcsRUFBRTtNQUhjLENBQXhCLENBQVA7SUFLSDs7Ozs7O0FBR0wsaUVBQWU1QixJQUFmIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2phdmFzY3JpcHQvYWN0aXZpdHlfanMvYWN0aXZpdGllc19saWtlc19oYW5kbGVyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qYXZhc2NyaXB0L2FjdGl2aXR5X2pzL2xpa2UuanMiXSwic291cmNlc0NvbnRlbnQiOlsibGV0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcbmltcG9ydCBMaWtlIGZyb20gXCIuL2xpa2VcIjtcblxuY29uc3QgbGlrZXNIYW5kbGVyID0gZnVuY3Rpb24gKHJlcXVlc3QsIHRhZyl7XG4gICAgZmV0Y2gocmVxdWVzdCkuXG4gICAgICAgIHRoZW4oKHJlc3BvbnNlKT0+e1xuICAgICAgICAgICAgcmV0dXJuIHJlc3BvbnNlLmpzb24oKTtcbiAgICB9KS50aGVuKChyZXNwb25zZSk9PntcbiAgICAgICAgbGV0IGxpa2VzID0gcmVzcG9uc2UubGlrZXM7XG4gICAgICAgICQoXCIjXCIrJCh0YWcpLmRhdGEoXCJ0b2tlbl9saWtlc1wiKSkuaHRtbChsaWtlcyk7XG4gICAgICAgICQoXCIjXCIrJCh0YWcpLmRhdGEoXCJ0b2tlbl91bmxpa2VzXCIpKS5odG1sKHJlc3BvbnNlLnVubGlrZXMpO1xuICAgIH0pXG59XG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKXtcbiAgICAkKCcuX19saWtlcycpLmNsaWNrKGZ1bmN0aW9uICgpe1xuICAgICAgICBsZXQgbGlrZSA9IG5ldyBMaWtlKFxuICAgICAgICAgICAgJCh0aGlzKS5kYXRhKFwidG9rZW5fbGlrZXNcIiksXG4gICAgICAgICAgICAkKHRoaXMpLmRhdGEoXCJsaWtlXCIpLFxuICAgICAgICAgICAgJCh0aGlzKS5kYXRhKCdyb3V0ZScpLFxuICAgICAgICAgICAgJCh0aGlzKS5jc3MoXCJiYWNrZ3JvdW5kQ29sb3JcIikpO1xuICAgICAgICBsZXQgcmVxdWVzdCA9IGxpa2UubGlrZXNIYW5kbGVyKCk7XG4gICAgICAgICQodGhpcykuY3NzKHtcbiAgICAgICAgICAgIFwiYmFja2dyb3VuZC1jb2xvclwiOmAke2xpa2UuYmFja2dyb3VuZENvbG9yfWAsXG4gICAgICAgICAgICBcImNvbG9yXCI6YCR7bGlrZS5jb2xvcn1gXG4gICAgICAgIH0pXG4gICAgICAgIGxpa2VzSGFuZGxlcihyZXF1ZXN0LCAkKHRoaXMpKTtcbiAgICB9KTtcbiAgICAkKCcuX191bmxpa2VzJykuY2xpY2soZnVuY3Rpb24gKCl7XG4gICAgICAgIGxldCBsaWtlID0gbmV3IExpa2UoXG4gICAgICAgICAgICAkKHRoaXMpLmRhdGEoXCJ0b2tlbl91bmxpa2VzXCIpLFxuICAgICAgICAgICAgJCh0aGlzKS5kYXRhKFwidW5saWtlXCIpLFxuICAgICAgICAgICAgJCh0aGlzKS5kYXRhKCdyb3V0ZScpLFxuICAgICAgICAgICAgJCh0aGlzKS5jc3MoXCJiYWNrZ3JvdW5kQ29sb3JcIikpO1xuICAgICAgICBsZXQgcmVxdWVzdCA9IGxpa2UubGlrZXNIYW5kbGVyKCk7XG4gICAgICAgICQodGhpcykuY3NzKHtcbiAgICAgICAgICAgIFwiYmFja2dyb3VuZC1jb2xvclwiOmAke2xpa2UuYmFja2dyb3VuZENvbG9yfWAsXG4gICAgICAgICAgICBcImNvbG9yXCI6YCR7bGlrZS5jb2xvcn1gXG4gICAgICAgIH0pXG4gICAgICAgIGxpa2VzSGFuZGxlcihyZXF1ZXN0LCAkKHRoaXMpKTtcbiAgICB9KTtcbn0pIiwiY2xhc3MgTGlrZXtcbiAgICBjb25zdHJ1Y3Rvcih0b2tlbiwgYWN0aXZpdHlfaWQsIHJvdXRlLCBiYWNrZ3JvdW5kQ29sb3IpIHtcbiAgICAgICAgdGhpcy50b2tlbiA9IHRva2VuO1xuICAgICAgICB0aGlzLnZhbHVlID0gMDtcbiAgICAgICAgdGhpcy5yb3V0ZSA9IHJvdXRlO1xuICAgICAgICB0aGlzLmFjdGl2aXR5X2lkID0gYWN0aXZpdHlfaWQ7XG4gICAgICAgIHRoaXMuYmFja2dyb3VuZENvbG9yID0gYmFja2dyb3VuZENvbG9yO1xuICAgICAgICB0aGlzLmNvbG9yID0gXCJ3aGl0ZVwiO1xuICAgIH1cblxuICAgIGxpa2VzSGFuZGxlcigpe1xuICAgICAgICBjb25zdCBkYXRhID0gbmV3IEZvcm1EYXRhKCk7XG4gICAgICAgIGRhdGEuYXBwZW5kKFwiaWRcIiwgdGhpcy5hY3Rpdml0eV9pZCk7XG4gICAgICAgIGlmKHRoaXMuYmFja2dyb3VuZENvbG9yID09PSBcInJnYmEoMCwgMCwgMCwgMClcIil7XG4gICAgICAgICAgICB0aGlzLnZhbHVlID0gMTtcbiAgICAgICAgICAgIHRoaXMuYmFja2dyb3VuZENvbG9yID0gXCJyZ2IoMTMsIDcxLCAxNjEpXCI7XG4gICAgICAgIH1lbHNle1xuICAgICAgICAgICAgdGhpcy52YWx1ZSA9IC0xO1xuICAgICAgICAgICAgdGhpcy5iYWNrZ3JvdW5kQ29sb3IgPSBcInJnYmEoMCwgMCwgMCwgMClcIjtcbiAgICAgICAgICAgIHRoaXMuY29sb3IgPSBcImJsYWNrXCI7XG4gICAgICAgIH1cbiAgICAgICAgZGF0YS5hcHBlbmQoXCJ2YWx1ZVwiLCB0aGlzLnZhbHVlKTtcbiAgICAgICAgcmV0dXJuIG5ldyBSZXF1ZXN0KHRoaXMucm91dGUsIHtcbiAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxuICAgICAgICAgICAgYm9keTogZGF0YSxcbiAgICAgICAgICAgIGNyZWRlbnRpYWxzOiAnc2FtZS1vcmlnaW4nXG4gICAgICAgIH0pO1xuICAgIH1cbn1cblxuZXhwb3J0IGRlZmF1bHQgTGlrZTsiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJMaWtlIiwibGlrZXNIYW5kbGVyIiwicmVxdWVzdCIsInRhZyIsImZldGNoIiwidGhlbiIsInJlc3BvbnNlIiwianNvbiIsImxpa2VzIiwiZGF0YSIsImh0bWwiLCJ1bmxpa2VzIiwiZG9jdW1lbnQiLCJyZWFkeSIsImNsaWNrIiwibGlrZSIsImNzcyIsImJhY2tncm91bmRDb2xvciIsImNvbG9yIiwidG9rZW4iLCJhY3Rpdml0eV9pZCIsInJvdXRlIiwidmFsdWUiLCJGb3JtRGF0YSIsImFwcGVuZCIsIlJlcXVlc3QiLCJtZXRob2QiLCJib2R5IiwiY3JlZGVudGlhbHMiXSwic291cmNlUm9vdCI6IiJ9