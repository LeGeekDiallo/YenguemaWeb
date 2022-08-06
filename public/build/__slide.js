(self["webpackChunk"] = self["webpackChunk"] || []).push([["__slide"],{

/***/ "./assets/javascript/__slide.js":
/*!**************************************!*\
  !*** ./assets/javascript/__slide.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/web.timers.js */ "./node_modules/core-js/modules/web.timers.js");

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

$(document).ready(function () {
  var features = $('.__features_display');
  var cpt = 0;
  $('.__active_features').fadeIn('slow');
  setInterval(function () {
    var feature = features[cpt];
    var next_f = features[cpt + 1];

    if ($(feature).hasClass('__active_features')) {
      $(feature).removeClass('__active_features');
      $(next_f).addClass('__active_features');
      $('.__active_features').fadeIn('slow');
    }

    cpt++;

    if (cpt === features.length) {
      var last_f = features[cpt];
      $(last_f).removeClass('__active_features');
      cpt = 0;
      var _feature = features[cpt];
      $(_feature).addClass('__active_features');
      $('.__active_features').fadeIn('slide');
    }
  }, 4000);
  $("#__arrow").click(function () {
    document.documentElement.scrollTop = 418;
    $("#test_animate").addClass("animate__animated animate__zoomInUp");
  });
});

/***/ }),

/***/ "./node_modules/core-js/internals/schedulers-fix.js":
/*!**********************************************************!*\
  !*** ./node_modules/core-js/internals/schedulers-fix.js ***!
  \**********************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var global = __webpack_require__(/*! ../internals/global */ "./node_modules/core-js/internals/global.js");
var apply = __webpack_require__(/*! ../internals/function-apply */ "./node_modules/core-js/internals/function-apply.js");
var isCallable = __webpack_require__(/*! ../internals/is-callable */ "./node_modules/core-js/internals/is-callable.js");
var userAgent = __webpack_require__(/*! ../internals/engine-user-agent */ "./node_modules/core-js/internals/engine-user-agent.js");
var arraySlice = __webpack_require__(/*! ../internals/array-slice */ "./node_modules/core-js/internals/array-slice.js");
var validateArgumentsLength = __webpack_require__(/*! ../internals/validate-arguments-length */ "./node_modules/core-js/internals/validate-arguments-length.js");

var MSIE = /MSIE .\./.test(userAgent); // <- dirty ie9- check
var Function = global.Function;

var wrap = function (scheduler) {
  return MSIE ? function (handler, timeout /* , ...arguments */) {
    var boundArgs = validateArgumentsLength(arguments.length, 1) > 2;
    var fn = isCallable(handler) ? handler : Function(handler);
    var args = boundArgs ? arraySlice(arguments, 2) : undefined;
    return scheduler(boundArgs ? function () {
      apply(fn, this, args);
    } : fn, timeout);
  } : scheduler;
};

// ie9- setTimeout & setInterval additional parameters fix
// https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#timers
module.exports = {
  // `setTimeout` method
  // https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#dom-settimeout
  setTimeout: wrap(global.setTimeout),
  // `setInterval` method
  // https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#dom-setinterval
  setInterval: wrap(global.setInterval)
};


/***/ }),

/***/ "./node_modules/core-js/modules/web.set-interval.js":
/*!**********************************************************!*\
  !*** ./node_modules/core-js/modules/web.set-interval.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var global = __webpack_require__(/*! ../internals/global */ "./node_modules/core-js/internals/global.js");
var setInterval = (__webpack_require__(/*! ../internals/schedulers-fix */ "./node_modules/core-js/internals/schedulers-fix.js").setInterval);

// ie9- setInterval additional parameters fix
// https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#dom-setinterval
$({ global: true, bind: true, forced: global.setInterval !== setInterval }, {
  setInterval: setInterval
});


/***/ }),

/***/ "./node_modules/core-js/modules/web.set-timeout.js":
/*!*********************************************************!*\
  !*** ./node_modules/core-js/modules/web.set-timeout.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var global = __webpack_require__(/*! ../internals/global */ "./node_modules/core-js/internals/global.js");
var setTimeout = (__webpack_require__(/*! ../internals/schedulers-fix */ "./node_modules/core-js/internals/schedulers-fix.js").setTimeout);

// ie9- setTimeout additional parameters fix
// https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#dom-settimeout
$({ global: true, bind: true, forced: global.setTimeout !== setTimeout }, {
  setTimeout: setTimeout
});


/***/ }),

/***/ "./node_modules/core-js/modules/web.timers.js":
/*!****************************************************!*\
  !*** ./node_modules/core-js/modules/web.timers.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

// TODO: Remove this module from `core-js@4` since it's split to modules listed below
__webpack_require__(/*! ../modules/web.set-interval */ "./node_modules/core-js/modules/web.set-interval.js");
__webpack_require__(/*! ../modules/web.set-timeout */ "./node_modules/core-js/modules/web.set-timeout.js");


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_array-slice_js-node_modules_core-js_internals_export_j-4fec76"], () => (__webpack_exec__("./assets/javascript/__slide.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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azovLy8uL2Fzc2V0cy9qYXZhc2NyaXB0L19fc2xpZGUuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL3NjaGVkdWxlcnMtZml4LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL21vZHVsZXMvd2ViLnNldC1pbnRlcnZhbC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9tb2R1bGVzL3dlYi5zZXQtdGltZW91dC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9tb2R1bGVzL3dlYi50aW1lcnMuanMiXSwic291cmNlc0NvbnRlbnQiOlsibGV0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcbiQoZG9jdW1lbnQpLnJlYWR5KCgpPT57XG4gICAgY29uc3QgZmVhdHVyZXMgPSAkKCcuX19mZWF0dXJlc19kaXNwbGF5Jyk7XG4gICAgbGV0IGNwdCA9IDA7XG4gICAgJCgnLl9fYWN0aXZlX2ZlYXR1cmVzJykuZmFkZUluKCdzbG93Jyk7XG5cbiAgICBzZXRJbnRlcnZhbCgoKT0+e1xuICAgICAgICBsZXQgZmVhdHVyZSA9IGZlYXR1cmVzW2NwdF07XG4gICAgICAgIGxldCBuZXh0X2YgPSBmZWF0dXJlc1tjcHQrMV07XG4gICAgICAgIGlmKCQoZmVhdHVyZSkuaGFzQ2xhc3MoJ19fYWN0aXZlX2ZlYXR1cmVzJykpe1xuICAgICAgICAgICAgJChmZWF0dXJlKS5yZW1vdmVDbGFzcygnX19hY3RpdmVfZmVhdHVyZXMnKVxuICAgICAgICAgICAgJChuZXh0X2YpLmFkZENsYXNzKCdfX2FjdGl2ZV9mZWF0dXJlcycpXG4gICAgICAgICAgICAkKCcuX19hY3RpdmVfZmVhdHVyZXMnKS5mYWRlSW4oJ3Nsb3cnKTtcbiAgICAgICAgfVxuICAgICAgICBjcHQgKys7XG4gICAgICAgIGlmKGNwdCA9PT0gZmVhdHVyZXMubGVuZ3RoKXtcbiAgICAgICAgICAgIGxldCBsYXN0X2YgPSBmZWF0dXJlc1tjcHRdO1xuICAgICAgICAgICAgJChsYXN0X2YpLnJlbW92ZUNsYXNzKCdfX2FjdGl2ZV9mZWF0dXJlcycpXG4gICAgICAgICAgICBjcHQgPSAwO1xuICAgICAgICAgICAgbGV0IGZlYXR1cmUgPSBmZWF0dXJlc1tjcHRdO1xuICAgICAgICAgICAgJChmZWF0dXJlKS5hZGRDbGFzcygnX19hY3RpdmVfZmVhdHVyZXMnKVxuICAgICAgICAgICAgJCgnLl9fYWN0aXZlX2ZlYXR1cmVzJykuZmFkZUluKCdzbGlkZScpO1xuICAgICAgICB9XG4gICAgfSwgNDAwMClcblxuXG5cbiAgICAkKFwiI19fYXJyb3dcIikuY2xpY2soZnVuY3Rpb24gKCl7XG4gICAgICAgIGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5zY3JvbGxUb3AgPSA0MTg7XG4gICAgICAgICQoXCIjdGVzdF9hbmltYXRlXCIpLmFkZENsYXNzKGBhbmltYXRlX19hbmltYXRlZCBhbmltYXRlX196b29tSW5VcGApO1xuICAgIH0pXG59KSIsInZhciBnbG9iYWwgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZ2xvYmFsJyk7XG52YXIgYXBwbHkgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZnVuY3Rpb24tYXBwbHknKTtcbnZhciBpc0NhbGxhYmxlID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2lzLWNhbGxhYmxlJyk7XG52YXIgdXNlckFnZW50ID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2VuZ2luZS11c2VyLWFnZW50Jyk7XG52YXIgYXJyYXlTbGljZSA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9hcnJheS1zbGljZScpO1xudmFyIHZhbGlkYXRlQXJndW1lbnRzTGVuZ3RoID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3ZhbGlkYXRlLWFyZ3VtZW50cy1sZW5ndGgnKTtcblxudmFyIE1TSUUgPSAvTVNJRSAuXFwuLy50ZXN0KHVzZXJBZ2VudCk7IC8vIDwtIGRpcnR5IGllOS0gY2hlY2tcbnZhciBGdW5jdGlvbiA9IGdsb2JhbC5GdW5jdGlvbjtcblxudmFyIHdyYXAgPSBmdW5jdGlvbiAoc2NoZWR1bGVyKSB7XG4gIHJldHVybiBNU0lFID8gZnVuY3Rpb24gKGhhbmRsZXIsIHRpbWVvdXQgLyogLCAuLi5hcmd1bWVudHMgKi8pIHtcbiAgICB2YXIgYm91bmRBcmdzID0gdmFsaWRhdGVBcmd1bWVudHNMZW5ndGgoYXJndW1lbnRzLmxlbmd0aCwgMSkgPiAyO1xuICAgIHZhciBmbiA9IGlzQ2FsbGFibGUoaGFuZGxlcikgPyBoYW5kbGVyIDogRnVuY3Rpb24oaGFuZGxlcik7XG4gICAgdmFyIGFyZ3MgPSBib3VuZEFyZ3MgPyBhcnJheVNsaWNlKGFyZ3VtZW50cywgMikgOiB1bmRlZmluZWQ7XG4gICAgcmV0dXJuIHNjaGVkdWxlcihib3VuZEFyZ3MgPyBmdW5jdGlvbiAoKSB7XG4gICAgICBhcHBseShmbiwgdGhpcywgYXJncyk7XG4gICAgfSA6IGZuLCB0aW1lb3V0KTtcbiAgfSA6IHNjaGVkdWxlcjtcbn07XG5cbi8vIGllOS0gc2V0VGltZW91dCAmIHNldEludGVydmFsIGFkZGl0aW9uYWwgcGFyYW1ldGVycyBmaXhcbi8vIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3RpbWVycy1hbmQtdXNlci1wcm9tcHRzLmh0bWwjdGltZXJzXG5tb2R1bGUuZXhwb3J0cyA9IHtcbiAgLy8gYHNldFRpbWVvdXRgIG1ldGhvZFxuICAvLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXR0aW1lb3V0XG4gIHNldFRpbWVvdXQ6IHdyYXAoZ2xvYmFsLnNldFRpbWVvdXQpLFxuICAvLyBgc2V0SW50ZXJ2YWxgIG1ldGhvZFxuICAvLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXRpbnRlcnZhbFxuICBzZXRJbnRlcnZhbDogd3JhcChnbG9iYWwuc2V0SW50ZXJ2YWwpXG59O1xuIiwidmFyICQgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZXhwb3J0Jyk7XG52YXIgZ2xvYmFsID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2dsb2JhbCcpO1xudmFyIHNldEludGVydmFsID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3NjaGVkdWxlcnMtZml4Jykuc2V0SW50ZXJ2YWw7XG5cbi8vIGllOS0gc2V0SW50ZXJ2YWwgYWRkaXRpb25hbCBwYXJhbWV0ZXJzIGZpeFxuLy8gaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2UvdGltZXJzLWFuZC11c2VyLXByb21wdHMuaHRtbCNkb20tc2V0aW50ZXJ2YWxcbiQoeyBnbG9iYWw6IHRydWUsIGJpbmQ6IHRydWUsIGZvcmNlZDogZ2xvYmFsLnNldEludGVydmFsICE9PSBzZXRJbnRlcnZhbCB9LCB7XG4gIHNldEludGVydmFsOiBzZXRJbnRlcnZhbFxufSk7XG4iLCJ2YXIgJCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9leHBvcnQnKTtcbnZhciBnbG9iYWwgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZ2xvYmFsJyk7XG52YXIgc2V0VGltZW91dCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9zY2hlZHVsZXJzLWZpeCcpLnNldFRpbWVvdXQ7XG5cbi8vIGllOS0gc2V0VGltZW91dCBhZGRpdGlvbmFsIHBhcmFtZXRlcnMgZml4XG4vLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXR0aW1lb3V0XG4kKHsgZ2xvYmFsOiB0cnVlLCBiaW5kOiB0cnVlLCBmb3JjZWQ6IGdsb2JhbC5zZXRUaW1lb3V0ICE9PSBzZXRUaW1lb3V0IH0sIHtcbiAgc2V0VGltZW91dDogc2V0VGltZW91dFxufSk7XG4iLCIvLyBUT0RPOiBSZW1vdmUgdGhpcyBtb2R1bGUgZnJvbSBgY29yZS1qc0A0YCBzaW5jZSBpdCdzIHNwbGl0IHRvIG1vZHVsZXMgbGlzdGVkIGJlbG93XG5yZXF1aXJlKCcuLi9tb2R1bGVzL3dlYi5zZXQtaW50ZXJ2YWwnKTtcbnJlcXVpcmUoJy4uL21vZHVsZXMvd2ViLnNldC10aW1lb3V0Jyk7XG4iXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJkb2N1bWVudCIsInJlYWR5IiwiZmVhdHVyZXMiLCJjcHQiLCJmYWRlSW4iLCJzZXRJbnRlcnZhbCIsImZlYXR1cmUiLCJuZXh0X2YiLCJoYXNDbGFzcyIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJsZW5ndGgiLCJsYXN0X2YiLCJjbGljayIsImRvY3VtZW50RWxlbWVudCIsInNjcm9sbFRvcCJdLCJzb3VyY2VSb290IjoiIn0=