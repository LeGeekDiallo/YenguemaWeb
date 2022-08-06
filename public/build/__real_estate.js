(self["webpackChunk"] = self["webpackChunk"] || []).push([["__real_estate"],{

/***/ "./assets/javascript/realEstate/realEstatejs.js":
/*!******************************************************!*\
  !*** ./assets/javascript/realEstate/realEstatejs.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/web.timers.js */ "./node_modules/core-js/modules/web.timers.js");

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

$(document).ready(function () {
  var features = $('.__real_image_features');
  var recentProps = $('.__recent_prop_bloc');
  var recentSaleProps = $('.__recent_sale_prop_bloc');
  var cpt = 0;
  var rCpt = 0;
  var rSCpt = 0;

  var showBloc = function showBloc(blocIndex) {
    var blocs = $(".__real_image_features");
    $(blocs[blocIndex]).removeClass('__real_image_features').addClass('__image_active');
  };

  var showRecentPropBloc = function showRecentPropBloc(blocIndex) {
    var recentPropBlocs = $(".__recent_prop_bloc");
    $(recentPropBlocs[blocIndex]).removeClass('__recent_prop_bloc').addClass('__recent_prop_bloc_active');
  };

  var showRecentSalePropBloc = function showRecentSalePropBloc(blocIndex) {
    var recentPropBlocs = $(".__recent_sale_prop_bloc");
    $(recentPropBlocs[blocIndex]).removeClass('__recent_sale_prop_bloc').addClass('__recent_sale_prop_bloc_active');
  };

  var nextBloc = function nextBloc(blocIndex) {
    var active_bloc = $('.__image_active');
    $(active_bloc).removeClass('__image_active').addClass('__real_image_features');
    showBloc(blocIndex);
  };

  var nextRecentPropBloc = function nextRecentPropBloc(blocIndex) {
    var activeRecentPropBloc = $('.__recent_prop_bloc_active');
    $(activeRecentPropBloc).removeClass('__recent_prop_bloc_active').addClass('__recent_prop_bloc');
    showRecentPropBloc(blocIndex);
  };

  var nextRecentSalePropBloc = function nextRecentSalePropBloc(blocIndex) {
    var activeRecentPropBloc = $('.__recent_sale_prop_bloc_active');
    $(activeRecentPropBloc).removeClass('__recent_sale_prop_bloc_active').addClass('__recent_sale_prop_bloc');
    showRecentSalePropBloc(blocIndex);
  };

  showBloc(0);
  showRecentPropBloc(rCpt);
  showRecentSalePropBloc(rSCpt);
  setInterval(function () {
    cpt++;
    nextBloc(cpt % features.length);
    if (cpt >= features.length) cpt = 0;
  }, 3500);
  var recentPropsTimer = setInterval(function () {
    if (recentProps.length > 1) {
      rCpt++;
      nextRecentPropBloc(rCpt % recentProps.length);
    }
  }, 5000);
  setInterval(function () {
    if (recentSaleProps.length > 1) {
      rSCpt++;
      nextRecentSalePropBloc(rCpt % recentSaleProps.length);
    }
  }, 5000);
  var x = window.matchMedia("(max-width: 575px)");

  if (x.matches) {
    clearInterval(recentPropsTimer);
    $('.__recent_prop_bloc_active').removeClass('__recent_prop_bloc_active').addClass('__recent_prop_bloc');
    $('.__recent_sale_prop_bloc_active').removeClass('__recent_sale_prop_bloc_active').addClass('__recent_sale_prop_bloc');
    $('.__recent_prop_bloc, .__recent_sale_prop_bloc').css({
      display: "grid",
      gridTemplateColumns: "repeat(1, 1fr)",
      gridGap: "7px",
      animationName: "slideInRight",
      animationDuration: "2.5s"
    });
  }
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
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_array-slice_js-node_modules_core-js_internals_export_j-4fec76"], () => (__webpack_exec__("./assets/javascript/realEstate/realEstatejs.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUFDSixDQTFFRDs7Ozs7Ozs7OztBQ0ZBLGFBQWEsbUJBQU8sQ0FBQyx1RUFBcUI7QUFDMUMsWUFBWSxtQkFBTyxDQUFDLHVGQUE2QjtBQUNqRCxpQkFBaUIsbUJBQU8sQ0FBQyxpRkFBMEI7QUFDbkQsZ0JBQWdCLG1CQUFPLENBQUMsNkZBQWdDO0FBQ3hELGlCQUFpQixtQkFBTyxDQUFDLGlGQUEwQjtBQUNuRCw4QkFBOEIsbUJBQU8sQ0FBQyw2R0FBd0M7O0FBRTlFLHVDQUF1QztBQUN2Qzs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE1BQU07QUFDTixJQUFJO0FBQ0o7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7O0FDOUJBLFFBQVEsbUJBQU8sQ0FBQyx1RUFBcUI7QUFDckMsYUFBYSxtQkFBTyxDQUFDLHVFQUFxQjtBQUMxQyxrQkFBa0IsMEhBQWtEOztBQUVwRTtBQUNBO0FBQ0EsSUFBSSxzRUFBc0U7QUFDMUU7QUFDQSxDQUFDOzs7Ozs7Ozs7OztBQ1JELFFBQVEsbUJBQU8sQ0FBQyx1RUFBcUI7QUFDckMsYUFBYSxtQkFBTyxDQUFDLHVFQUFxQjtBQUMxQyxpQkFBaUIseUhBQWlEOztBQUVsRTtBQUNBO0FBQ0EsSUFBSSxvRUFBb0U7QUFDeEU7QUFDQSxDQUFDOzs7Ozs7Ozs7OztBQ1JEO0FBQ0EsbUJBQU8sQ0FBQyx1RkFBNkI7QUFDckMsbUJBQU8sQ0FBQyxxRkFBNEIiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9yZWFsRXN0YXRlL3JlYWxFc3RhdGVqcy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9pbnRlcm5hbHMvc2NoZWR1bGVycy1maXguanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy93ZWIuc2V0LWludGVydmFsLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL21vZHVsZXMvd2ViLnNldC10aW1lb3V0LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL21vZHVsZXMvd2ViLnRpbWVycy5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJsZXQgJCA9IHJlcXVpcmUoJ2pxdWVyeScpO1xuXG4kKGRvY3VtZW50KS5yZWFkeSgoKT0+e1xuXG4gICAgY29uc3QgZmVhdHVyZXMgPSAkKCcuX19yZWFsX2ltYWdlX2ZlYXR1cmVzJyk7XG4gICAgY29uc3QgcmVjZW50UHJvcHMgPSAkKCcuX19yZWNlbnRfcHJvcF9ibG9jJyk7XG4gICAgY29uc3QgcmVjZW50U2FsZVByb3BzID0gJCgnLl9fcmVjZW50X3NhbGVfcHJvcF9ibG9jJyk7XG4gICAgbGV0IGNwdCA9IDA7XG4gICAgbGV0IHJDcHQgPSAwO1xuICAgIGxldCByU0NwdCA9IDA7XG5cbiAgICBjb25zdCBzaG93QmxvYyA9IChibG9jSW5kZXgpPT57XG4gICAgICAgIGNvbnN0IGJsb2NzID0gJChcIi5fX3JlYWxfaW1hZ2VfZmVhdHVyZXNcIik7XG4gICAgICAgICQoYmxvY3NbYmxvY0luZGV4XSkucmVtb3ZlQ2xhc3MoJ19fcmVhbF9pbWFnZV9mZWF0dXJlcycpLmFkZENsYXNzKCdfX2ltYWdlX2FjdGl2ZScpO1xuICAgIH1cbiAgICBjb25zdCBzaG93UmVjZW50UHJvcEJsb2MgPSAoYmxvY0luZGV4KT0+e1xuICAgICAgICBjb25zdCByZWNlbnRQcm9wQmxvY3MgPSAkKFwiLl9fcmVjZW50X3Byb3BfYmxvY1wiKTtcbiAgICAgICAgJChyZWNlbnRQcm9wQmxvY3NbYmxvY0luZGV4XSkucmVtb3ZlQ2xhc3MoJ19fcmVjZW50X3Byb3BfYmxvYycpLmFkZENsYXNzKCdfX3JlY2VudF9wcm9wX2Jsb2NfYWN0aXZlJyk7XG4gICAgfVxuICAgIGNvbnN0IHNob3dSZWNlbnRTYWxlUHJvcEJsb2MgPSAoYmxvY0luZGV4KT0+e1xuICAgICAgICBjb25zdCByZWNlbnRQcm9wQmxvY3MgPSAkKFwiLl9fcmVjZW50X3NhbGVfcHJvcF9ibG9jXCIpO1xuICAgICAgICAkKHJlY2VudFByb3BCbG9jc1tibG9jSW5kZXhdKS5yZW1vdmVDbGFzcygnX19yZWNlbnRfc2FsZV9wcm9wX2Jsb2MnKS5hZGRDbGFzcygnX19yZWNlbnRfc2FsZV9wcm9wX2Jsb2NfYWN0aXZlJyk7XG4gICAgfVxuICAgIGNvbnN0IG5leHRCbG9jID0gKGJsb2NJbmRleCk9PntcbiAgICAgICAgbGV0IGFjdGl2ZV9ibG9jID0gJCgnLl9faW1hZ2VfYWN0aXZlJyk7XG4gICAgICAgICQoYWN0aXZlX2Jsb2MpLnJlbW92ZUNsYXNzKCdfX2ltYWdlX2FjdGl2ZScpLmFkZENsYXNzKCdfX3JlYWxfaW1hZ2VfZmVhdHVyZXMnKTtcbiAgICAgICAgc2hvd0Jsb2MoYmxvY0luZGV4KTtcbiAgICB9XG4gICAgY29uc3QgbmV4dFJlY2VudFByb3BCbG9jID0gKGJsb2NJbmRleCk9PntcbiAgICAgICAgbGV0IGFjdGl2ZVJlY2VudFByb3BCbG9jID0gJCgnLl9fcmVjZW50X3Byb3BfYmxvY19hY3RpdmUnKTtcbiAgICAgICAgJChhY3RpdmVSZWNlbnRQcm9wQmxvYykucmVtb3ZlQ2xhc3MoJ19fcmVjZW50X3Byb3BfYmxvY19hY3RpdmUnKS5hZGRDbGFzcygnX19yZWNlbnRfcHJvcF9ibG9jJyk7XG4gICAgICAgIHNob3dSZWNlbnRQcm9wQmxvYyhibG9jSW5kZXgpO1xuICAgIH1cbiAgICBjb25zdCBuZXh0UmVjZW50U2FsZVByb3BCbG9jID0gKGJsb2NJbmRleCk9PntcbiAgICAgICAgbGV0IGFjdGl2ZVJlY2VudFByb3BCbG9jID0gJCgnLl9fcmVjZW50X3NhbGVfcHJvcF9ibG9jX2FjdGl2ZScpO1xuICAgICAgICAkKGFjdGl2ZVJlY2VudFByb3BCbG9jKS5yZW1vdmVDbGFzcygnX19yZWNlbnRfc2FsZV9wcm9wX2Jsb2NfYWN0aXZlJykuYWRkQ2xhc3MoJ19fcmVjZW50X3NhbGVfcHJvcF9ibG9jJyk7XG4gICAgICAgIHNob3dSZWNlbnRTYWxlUHJvcEJsb2MoYmxvY0luZGV4KTtcbiAgICB9XG4gICAgc2hvd0Jsb2MoMCk7XG4gICAgc2hvd1JlY2VudFByb3BCbG9jKHJDcHQpO1xuICAgIHNob3dSZWNlbnRTYWxlUHJvcEJsb2MoclNDcHQpO1xuICAgIHNldEludGVydmFsKCgpPT57XG4gICAgICAgIGNwdCArKztcbiAgICAgICAgbmV4dEJsb2MoY3B0JWZlYXR1cmVzLmxlbmd0aCk7XG4gICAgICAgIGlmKGNwdCA+PSBmZWF0dXJlcy5sZW5ndGgpXG4gICAgICAgICAgICBjcHQgPSAwO1xuXG4gICAgfSwgMzUwMClcblxuICAgIGNvbnN0IHJlY2VudFByb3BzVGltZXIgPSBzZXRJbnRlcnZhbCgoKT0+e1xuICAgICAgICBpZihyZWNlbnRQcm9wcy5sZW5ndGggPiAxKSB7XG4gICAgICAgICAgICByQ3B0Kys7XG4gICAgICAgICAgICBuZXh0UmVjZW50UHJvcEJsb2MockNwdCAlIHJlY2VudFByb3BzLmxlbmd0aCk7XG4gICAgICAgIH1cbiAgICB9LCA1MDAwKTtcbiAgICBzZXRJbnRlcnZhbCgoKT0+e1xuICAgICAgICBpZihyZWNlbnRTYWxlUHJvcHMubGVuZ3RoID4gMSkge1xuICAgICAgICAgICAgclNDcHQrKztcbiAgICAgICAgICAgIG5leHRSZWNlbnRTYWxlUHJvcEJsb2MockNwdCAlIHJlY2VudFNhbGVQcm9wcy5sZW5ndGgpO1xuICAgICAgICB9XG4gICAgfSwgNTAwMCk7XG5cbiAgICBjb25zdCB4ID0gd2luZG93Lm1hdGNoTWVkaWEoXCIobWF4LXdpZHRoOiA1NzVweClcIilcblxuICAgIGlmKHgubWF0Y2hlcyl7XG4gICAgICAgIGNsZWFySW50ZXJ2YWwocmVjZW50UHJvcHNUaW1lcik7XG4gICAgICAgICQoJy5fX3JlY2VudF9wcm9wX2Jsb2NfYWN0aXZlJykucmVtb3ZlQ2xhc3MoJ19fcmVjZW50X3Byb3BfYmxvY19hY3RpdmUnKS5hZGRDbGFzcygnX19yZWNlbnRfcHJvcF9ibG9jJyk7XG4gICAgICAgICQoJy5fX3JlY2VudF9zYWxlX3Byb3BfYmxvY19hY3RpdmUnKS5yZW1vdmVDbGFzcygnX19yZWNlbnRfc2FsZV9wcm9wX2Jsb2NfYWN0aXZlJykuYWRkQ2xhc3MoJ19fcmVjZW50X3NhbGVfcHJvcF9ibG9jJyk7XG4gICAgICAgICQoJy5fX3JlY2VudF9wcm9wX2Jsb2MsIC5fX3JlY2VudF9zYWxlX3Byb3BfYmxvYycpLmNzcyh7XG4gICAgICAgICAgICBkaXNwbGF5OiBcImdyaWRcIixcbiAgICAgICAgICAgIGdyaWRUZW1wbGF0ZUNvbHVtbnM6IFwicmVwZWF0KDEsIDFmcilcIixcbiAgICAgICAgICAgIGdyaWRHYXA6IFwiN3B4XCIsXG4gICAgICAgICAgICBhbmltYXRpb25OYW1lOiBcInNsaWRlSW5SaWdodFwiLFxuICAgICAgICAgICAgYW5pbWF0aW9uRHVyYXRpb246IFwiMi41c1wiXG4gICAgICAgIH0pXG4gICAgfVxufSkiLCJ2YXIgZ2xvYmFsID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2dsb2JhbCcpO1xudmFyIGFwcGx5ID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2Z1bmN0aW9uLWFwcGx5Jyk7XG52YXIgaXNDYWxsYWJsZSA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9pcy1jYWxsYWJsZScpO1xudmFyIHVzZXJBZ2VudCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9lbmdpbmUtdXNlci1hZ2VudCcpO1xudmFyIGFycmF5U2xpY2UgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvYXJyYXktc2xpY2UnKTtcbnZhciB2YWxpZGF0ZUFyZ3VtZW50c0xlbmd0aCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy92YWxpZGF0ZS1hcmd1bWVudHMtbGVuZ3RoJyk7XG5cbnZhciBNU0lFID0gL01TSUUgLlxcLi8udGVzdCh1c2VyQWdlbnQpOyAvLyA8LSBkaXJ0eSBpZTktIGNoZWNrXG52YXIgRnVuY3Rpb24gPSBnbG9iYWwuRnVuY3Rpb247XG5cbnZhciB3cmFwID0gZnVuY3Rpb24gKHNjaGVkdWxlcikge1xuICByZXR1cm4gTVNJRSA/IGZ1bmN0aW9uIChoYW5kbGVyLCB0aW1lb3V0IC8qICwgLi4uYXJndW1lbnRzICovKSB7XG4gICAgdmFyIGJvdW5kQXJncyA9IHZhbGlkYXRlQXJndW1lbnRzTGVuZ3RoKGFyZ3VtZW50cy5sZW5ndGgsIDEpID4gMjtcbiAgICB2YXIgZm4gPSBpc0NhbGxhYmxlKGhhbmRsZXIpID8gaGFuZGxlciA6IEZ1bmN0aW9uKGhhbmRsZXIpO1xuICAgIHZhciBhcmdzID0gYm91bmRBcmdzID8gYXJyYXlTbGljZShhcmd1bWVudHMsIDIpIDogdW5kZWZpbmVkO1xuICAgIHJldHVybiBzY2hlZHVsZXIoYm91bmRBcmdzID8gZnVuY3Rpb24gKCkge1xuICAgICAgYXBwbHkoZm4sIHRoaXMsIGFyZ3MpO1xuICAgIH0gOiBmbiwgdGltZW91dCk7XG4gIH0gOiBzY2hlZHVsZXI7XG59O1xuXG4vLyBpZTktIHNldFRpbWVvdXQgJiBzZXRJbnRlcnZhbCBhZGRpdGlvbmFsIHBhcmFtZXRlcnMgZml4XG4vLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI3RpbWVyc1xubW9kdWxlLmV4cG9ydHMgPSB7XG4gIC8vIGBzZXRUaW1lb3V0YCBtZXRob2RcbiAgLy8gaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2UvdGltZXJzLWFuZC11c2VyLXByb21wdHMuaHRtbCNkb20tc2V0dGltZW91dFxuICBzZXRUaW1lb3V0OiB3cmFwKGdsb2JhbC5zZXRUaW1lb3V0KSxcbiAgLy8gYHNldEludGVydmFsYCBtZXRob2RcbiAgLy8gaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2UvdGltZXJzLWFuZC11c2VyLXByb21wdHMuaHRtbCNkb20tc2V0aW50ZXJ2YWxcbiAgc2V0SW50ZXJ2YWw6IHdyYXAoZ2xvYmFsLnNldEludGVydmFsKVxufTtcbiIsInZhciAkID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2V4cG9ydCcpO1xudmFyIGdsb2JhbCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9nbG9iYWwnKTtcbnZhciBzZXRJbnRlcnZhbCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9zY2hlZHVsZXJzLWZpeCcpLnNldEludGVydmFsO1xuXG4vLyBpZTktIHNldEludGVydmFsIGFkZGl0aW9uYWwgcGFyYW1ldGVycyBmaXhcbi8vIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3RpbWVycy1hbmQtdXNlci1wcm9tcHRzLmh0bWwjZG9tLXNldGludGVydmFsXG4kKHsgZ2xvYmFsOiB0cnVlLCBiaW5kOiB0cnVlLCBmb3JjZWQ6IGdsb2JhbC5zZXRJbnRlcnZhbCAhPT0gc2V0SW50ZXJ2YWwgfSwge1xuICBzZXRJbnRlcnZhbDogc2V0SW50ZXJ2YWxcbn0pO1xuIiwidmFyICQgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZXhwb3J0Jyk7XG52YXIgZ2xvYmFsID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2dsb2JhbCcpO1xudmFyIHNldFRpbWVvdXQgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvc2NoZWR1bGVycy1maXgnKS5zZXRUaW1lb3V0O1xuXG4vLyBpZTktIHNldFRpbWVvdXQgYWRkaXRpb25hbCBwYXJhbWV0ZXJzIGZpeFxuLy8gaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2UvdGltZXJzLWFuZC11c2VyLXByb21wdHMuaHRtbCNkb20tc2V0dGltZW91dFxuJCh7IGdsb2JhbDogdHJ1ZSwgYmluZDogdHJ1ZSwgZm9yY2VkOiBnbG9iYWwuc2V0VGltZW91dCAhPT0gc2V0VGltZW91dCB9LCB7XG4gIHNldFRpbWVvdXQ6IHNldFRpbWVvdXRcbn0pO1xuIiwiLy8gVE9ETzogUmVtb3ZlIHRoaXMgbW9kdWxlIGZyb20gYGNvcmUtanNANGAgc2luY2UgaXQncyBzcGxpdCB0byBtb2R1bGVzIGxpc3RlZCBiZWxvd1xucmVxdWlyZSgnLi4vbW9kdWxlcy93ZWIuc2V0LWludGVydmFsJyk7XG5yZXF1aXJlKCcuLi9tb2R1bGVzL3dlYi5zZXQtdGltZW91dCcpO1xuIl0sIm5hbWVzIjpbIiQiLCJyZXF1aXJlIiwiZG9jdW1lbnQiLCJyZWFkeSIsImZlYXR1cmVzIiwicmVjZW50UHJvcHMiLCJyZWNlbnRTYWxlUHJvcHMiLCJjcHQiLCJyQ3B0IiwiclNDcHQiLCJzaG93QmxvYyIsImJsb2NJbmRleCIsImJsb2NzIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsInNob3dSZWNlbnRQcm9wQmxvYyIsInJlY2VudFByb3BCbG9jcyIsInNob3dSZWNlbnRTYWxlUHJvcEJsb2MiLCJuZXh0QmxvYyIsImFjdGl2ZV9ibG9jIiwibmV4dFJlY2VudFByb3BCbG9jIiwiYWN0aXZlUmVjZW50UHJvcEJsb2MiLCJuZXh0UmVjZW50U2FsZVByb3BCbG9jIiwic2V0SW50ZXJ2YWwiLCJsZW5ndGgiLCJyZWNlbnRQcm9wc1RpbWVyIiwieCIsIndpbmRvdyIsIm1hdGNoTWVkaWEiLCJtYXRjaGVzIiwiY2xlYXJJbnRlcnZhbCIsImNzcyIsImRpc3BsYXkiLCJncmlkVGVtcGxhdGVDb2x1bW5zIiwiZ3JpZEdhcCIsImFuaW1hdGlvbk5hbWUiLCJhbmltYXRpb25EdXJhdGlvbiJdLCJzb3VyY2VSb290IjoiIn0=