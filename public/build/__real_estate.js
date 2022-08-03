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

/***/ "./node_modules/core-js/modules/web.timers.js":
/*!****************************************************!*\
  !*** ./node_modules/core-js/modules/web.timers.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var global = __webpack_require__(/*! ../internals/global */ "./node_modules/core-js/internals/global.js");
var userAgent = __webpack_require__(/*! ../internals/engine-user-agent */ "./node_modules/core-js/internals/engine-user-agent.js");

var slice = [].slice;
var MSIE = /MSIE .\./.test(userAgent); // <- dirty ie9- check

var wrap = function (scheduler) {
  return function (handler, timeout /* , ...arguments */) {
    var boundArgs = arguments.length > 2;
    var args = boundArgs ? slice.call(arguments, 2) : undefined;
    return scheduler(boundArgs ? function () {
      // eslint-disable-next-line no-new-func
      (typeof handler == 'function' ? handler : Function(handler)).apply(this, args);
    } : handler, timeout);
  };
};

// ie9- setTimeout & setInterval additional parameters fix
// https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#timers
$({ global: true, bind: true, forced: MSIE }, {
  // `setTimeout` method
  // https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#dom-settimeout
  setTimeout: wrap(global.setTimeout),
  // `setInterval` method
  // https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#dom-setinterval
  setInterval: wrap(global.setInterval)
});


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ "use strict";
/******/ 
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_engine-user-agent_js-node_modules_core-js_internals_ex-b41e05"], () => (__webpack_exec__("./assets/javascript/realEstate/realEstatejs.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9yZWFsRXN0YXRlL3JlYWxFc3RhdGVqcy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9tb2R1bGVzL3dlYi50aW1lcnMuanMiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJkb2N1bWVudCIsInJlYWR5IiwiZmVhdHVyZXMiLCJyZWNlbnRQcm9wcyIsInJlY2VudFNhbGVQcm9wcyIsImNwdCIsInJDcHQiLCJyU0NwdCIsInNob3dCbG9jIiwiYmxvY0luZGV4IiwiYmxvY3MiLCJyZW1vdmVDbGFzcyIsImFkZENsYXNzIiwic2hvd1JlY2VudFByb3BCbG9jIiwicmVjZW50UHJvcEJsb2NzIiwic2hvd1JlY2VudFNhbGVQcm9wQmxvYyIsIm5leHRCbG9jIiwiYWN0aXZlX2Jsb2MiLCJuZXh0UmVjZW50UHJvcEJsb2MiLCJhY3RpdmVSZWNlbnRQcm9wQmxvYyIsIm5leHRSZWNlbnRTYWxlUHJvcEJsb2MiLCJzZXRJbnRlcnZhbCIsImxlbmd0aCIsInJlY2VudFByb3BzVGltZXIiLCJ4Iiwid2luZG93IiwibWF0Y2hNZWRpYSIsIm1hdGNoZXMiLCJjbGVhckludGVydmFsIiwiY3NzIiwiZGlzcGxheSIsImdyaWRUZW1wbGF0ZUNvbHVtbnMiLCJncmlkR2FwIiwiYW5pbWF0aW9uTmFtZSIsImFuaW1hdGlvbkR1cmF0aW9uIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUEsSUFBSUEsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWY7O0FBRUFELENBQUMsQ0FBQ0UsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBSTtBQUVsQixNQUFNQyxRQUFRLEdBQUdKLENBQUMsQ0FBQyx3QkFBRCxDQUFsQjtBQUNBLE1BQU1LLFdBQVcsR0FBR0wsQ0FBQyxDQUFDLHFCQUFELENBQXJCO0FBQ0EsTUFBTU0sZUFBZSxHQUFHTixDQUFDLENBQUMsMEJBQUQsQ0FBekI7QUFDQSxNQUFJ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bnQiOlsibGV0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KCgpPT57XHJcblxyXG4gICAgY29uc3QgZmVhdHVyZXMgPSAkKCcuX19yZWFsX2ltYWdlX2ZlYXR1cmVzJyk7XHJcbiAgICBjb25zdCByZWNlbnRQcm9wcyA9ICQoJy5fX3JlY2VudF9wcm9wX2Jsb2MnKTtcclxuICAgIGNvbnN0IHJlY2VudFNhbGVQcm9wcyA9ICQoJy5fX3JlY2VudF9zYWxlX3Byb3BfYmxvYycpO1xyXG4gICAgbGV0IGNwdCA9IDA7XHJcbiAgICBsZXQgckNwdCA9IDA7XHJcbiAgICBsZXQgclNDcHQgPSAwO1xyXG5cclxuICAgIGNvbnN0IHNob3dCbG9jID0gKGJsb2NJbmRleCk9PntcclxuICAgICAgICBjb25zdCBibG9jcyA9ICQoXCIuX19yZWFsX2ltYWdlX2ZlYXR1cmVzXCIpO1xyXG4gICAgICAgICQoYmxvY3NbYmxvY0luZGV4XSkucmVtb3ZlQ2xhc3MoJ19fcmVhbF9pbWFnZV9mZWF0dXJlcycpLmFkZENsYXNzKCdfX2ltYWdlX2FjdGl2ZScpO1xyXG4gICAgfVxyXG4gICAgY29uc3Qgc2hvd1JlY2VudFByb3BCbG9jID0gKGJsb2NJbmRleCk9PntcclxuICAgICAgICBjb25zdCByZWNlbnRQcm9wQmxvY3MgPSAkKFwiLl9fcmVjZW50X3Byb3BfYmxvY1wiKTtcclxuICAgICAgICAkKHJlY2VudFByb3BCbG9jc1tibG9jSW5kZXhdKS5yZW1vdmVDbGFzcygnX19yZWNlbnRfcHJvcF9ibG9jJykuYWRkQ2xhc3MoJ19fcmVjZW50X3Byb3BfYmxvY19hY3RpdmUnKTtcclxuICAgIH1cclxuICAgIGNvbnN0IHNob3dSZWNlbnRTYWxlUHJvcEJsb2MgPSAoYmxvY0luZGV4KT0+e1xyXG4gICAgICAgIGNvbnN0IHJlY2VudFByb3BCbG9jcyA9ICQoXCIuX19yZWNlbnRfc2FsZV9wcm9wX2Jsb2NcIik7XHJcbiAgICAgICAgJChyZWNlbnRQcm9wQmxvY3NbYmxvY0luZGV4XSkucmVtb3ZlQ2xhc3MoJ19fcmVjZW50X3NhbGVfcHJvcF9ibG9jJykuYWRkQ2xhc3MoJ19fcmVjZW50X3NhbGVfcHJvcF9ibG9jX2FjdGl2ZScpO1xyXG4gICAgfVxyXG4gICAgY29uc3QgbmV4dEJsb2MgPSAoYmxvY0luZGV4KT0+e1xyXG4gICAgICAgIGxldCBhY3RpdmVfYmxvYyA9ICQoJy5fX2ltYWdlX2FjdGl2ZScpO1xyXG4gICAgICAgICQoYWN0aXZlX2Jsb2MpLnJlbW92ZUNsYXNzKCdfX2ltYWdlX2FjdGl2ZScpLmFkZENsYXNzKCdfX3JlYWxfaW1hZ2VfZmVhdHVyZXMnKTtcclxuICAgICAgICBzaG93QmxvYyhibG9jSW5kZXgpO1xyXG4gICAgfVxyXG4gICAgY29uc3QgbmV4dFJlY2VudFByb3BCbG9jID0gKGJsb2NJbmRleCk9PntcclxuICAgICAgICBsZXQgYWN0aXZlUmVjZW50UHJvcEJsb2MgPSAkKCcuX19yZWNlbnRfcHJvcF9ibG9jX2FjdGl2ZScpO1xyXG4gICAgICAgICQoYWN0aXZlUmVjZW50UHJvcEJsb2MpLnJlbW92ZUNsYXNzKCdfX3JlY2VudF9wcm9wX2Jsb2NfYWN0aXZlJykuYWRkQ2xhc3MoJ19fcmVjZW50X3Byb3BfYmxvYycpO1xyXG4gICAgICAgIHNob3dSZWNlbnRQcm9wQmxvYyhibG9jSW5kZXgpO1xyXG4gICAgfVxyXG4gICAgY29uc3QgbmV4dFJlY2VudFNhbGVQcm9wQmxvYyA9IChibG9jSW5kZXgpPT57XHJcbiAgICAgICAgbGV0IGFjdGl2ZVJlY2VudFByb3BCbG9jID0gJCgnLl9fcmVjZW50X3NhbGVfcHJvcF9ibG9jX2FjdGl2ZScpO1xyXG4gICAgICAgICQoYWN0aXZlUmVjZW50UHJvcEJsb2MpLnJlbW92ZUNsYXNzKCdfX3JlY2VudF9zYWxlX3Byb3BfYmxvY19hY3RpdmUnKS5hZGRDbGFzcygnX19yZWNlbnRfc2FsZV9wcm9wX2Jsb2MnKTtcclxuICAgICAgICBzaG93UmVjZW50U2FsZVByb3BCbG9jKGJsb2NJbmRleCk7XHJcbiAgICB9XHJcbiAgICBzaG93QmxvYygwKTtcclxuICAgIHNob3dSZWNlbnRQcm9wQmxvYyhyQ3B0KTtcclxuICAgIHNob3dSZWNlbnRTYWxlUHJvcEJsb2MoclNDcHQpO1xyXG4gICAgc2V0SW50ZXJ2YWwoKCk9PntcclxuICAgICAgICBjcHQgKys7XHJcbiAgICAgICAgbmV4dEJsb2MoY3B0JWZlYXR1cmVzLmxlbmd0aCk7XHJcbiAgICAgICAgaWYoY3B0ID49IGZlYXR1cmVzLmxlbmd0aClcclxuICAgICAgICAgICAgY3B0ID0gMDtcclxuXHJcbiAgICB9LCAzNTAwKVxyXG5cclxuICAgIGNvbnN0IHJlY2VudFByb3BzVGltZXIgPSBzZXRJbnRlcnZhbCgoKT0+e1xyXG4gICAgICAgIGlmKHJlY2VudFByb3BzLmxlbmd0aCA+IDEpIHtcclxuICAgICAgICAgICAgckNwdCsrO1xyXG4gICAgICAgICAgICBuZXh0UmVjZW50UHJvcEJsb2MockNwdCAlIHJlY2VudFByb3BzLmxlbmd0aCk7XHJcbiAgICAgICAgfVxyXG4gICAgfSwgNTAwMCk7XHJcbiAgICBzZXRJbnRlcnZhbCgoKT0+e1xyXG4gICAgICAgIGlmKHJlY2VudFNhbGVQcm9wcy5sZW5ndGggPiAxKSB7XHJcbiAgICAgICAgICAgIHJTQ3B0Kys7XHJcbiAgICAgICAgICAgIG5leHRSZWNlbnRTYWxlUHJvcEJsb2MockNwdCAlIHJlY2VudFNhbGVQcm9wcy5sZW5ndGgpO1xyXG4gICAgICAgIH1cclxuICAgIH0sIDUwMDApO1xyXG5cclxuICAgIGNvbnN0IHggPSB3aW5kb3cubWF0Y2hNZWRpYShcIihtYXgtd2lkdGg6IDU3NXB4KVwiKVxyXG5cclxuICAgIGlmKHgubWF0Y2hlcyl7XHJcbiAgICAgICAgY2xlYXJJbnRlcnZhbChyZWNlbnRQcm9wc1RpbWVyKTtcclxuICAgICAgICAkKCcuX19yZWNlbnRfcHJvcF9ibG9jX2FjdGl2ZScpLnJlbW92ZUNsYXNzKCdfX3JlY2VudF9wcm9wX2Jsb2NfYWN0aXZlJykuYWRkQ2xhc3MoJ19fcmVjZW50X3Byb3BfYmxvYycpO1xyXG4gICAgICAgICQoJy5fX3JlY2VudF9zYWxlX3Byb3BfYmxvY19hY3RpdmUnKS5yZW1vdmVDbGFzcygnX19yZWNlbnRfc2FsZV9wcm9wX2Jsb2NfYWN0aXZlJykuYWRkQ2xhc3MoJ19fcmVjZW50X3NhbGVfcHJvcF9ibG9jJyk7XHJcbiAgICAgICAgJCgnLl9fcmVjZW50X3Byb3BfYmxvYywgLl9fcmVjZW50X3NhbGVfcHJvcF9ibG9jJykuY3NzKHtcclxuICAgICAgICAgICAgZGlzcGxheTogXCJncmlkXCIsXHJcbiAgICAgICAgICAgIGdyaWRUZW1wbGF0ZUNvbHVtbnM6IFwicmVwZWF0KDEsIDFmcilcIixcclxuICAgICAgICAgICAgZ3JpZEdhcDogXCI3cHhcIixcclxuICAgICAgICAgICAgYW5pbWF0aW9uTmFtZTogXCJzbGlkZUluUmlnaHRcIixcclxuICAgICAgICAgICAgYW5pbWF0aW9uRHVyYXRpb246IFwiMi41c1wiXHJcbiAgICAgICAgfSlcclxuICAgIH1cclxufSkiLCJ2YXIgJCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9leHBvcnQnKTtcbnZhciBnbG9iYWwgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZ2xvYmFsJyk7XG52YXIgdXNlckFnZW50ID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2VuZ2luZS11c2VyLWFnZW50Jyk7XG5cbnZhciBzbGljZSA9IFtdLnNsaWNlO1xudmFyIE1TSUUgPSAvTVNJRSAuXFwuLy50ZXN0KHVzZXJBZ2VudCk7IC8vIDwtIGRpcnR5IGllOS0gY2hlY2tcblxudmFyIHdyYXAgPSBmdW5jdGlvbiAoc2NoZWR1bGVyKSB7XG4gIHJldHVybiBmdW5jdGlvbiAoaGFuZGxlciwgdGltZW91dCAvKiAsIC4uLmFyZ3VtZW50cyAqLykge1xuICAgIHZhciBib3VuZEFyZ3MgPSBhcmd1bWVudHMubGVuZ3RoID4gMjtcbiAgICB2YXIgYXJncyA9IGJvdW5kQXJncyA/IHNsaWNlLmNhbGwoYXJndW1lbnRzLCAyKSA6IHVuZGVmaW5lZDtcbiAgICByZXR1cm4gc2NoZWR1bGVyKGJvdW5kQXJncyA/IGZ1bmN0aW9uICgpIHtcbiAgICAgIC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBuby1uZXctZnVuY1xuICAgICAgKHR5cGVvZiBoYW5kbGVyID09ICdmdW5jdGlvbicgPyBoYW5kbGVyIDogRnVuY3Rpb24oaGFuZGxlcikpLmFwcGx5KHRoaXMsIGFyZ3MpO1xuICAgIH0gOiBoYW5kbGVyLCB0aW1lb3V0KTtcbiAgfTtcbn07XG5cbi8vIGllOS0gc2V0VGltZW91dCAmIHNldEludGVydmFsIGFkZGl0aW9uYWwgcGFyYW1ldGVycyBmaXhcbi8vIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3RpbWVycy1hbmQtdXNlci1wcm9tcHRzLmh0bWwjdGltZXJzXG4kKHsgZ2xvYmFsOiB0cnVlLCBiaW5kOiB0cnVlLCBmb3JjZWQ6IE1TSUUgfSwge1xuICAvLyBgc2V0VGltZW91dGAgbWV0aG9kXG4gIC8vIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3RpbWVycy1hbmQtdXNlci1wcm9tcHRzLmh0bWwjZG9tLXNldHRpbWVvdXRcbiAgc2V0VGltZW91dDogd3JhcChnbG9iYWwuc2V0VGltZW91dCksXG4gIC8vIGBzZXRJbnRlcnZhbGAgbWV0aG9kXG4gIC8vIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3RpbWVycy1hbmQtdXNlci1wcm9tcHRzLmh0bWwjZG9tLXNldGludGVydmFsXG4gIHNldEludGVydmFsOiB3cmFwKGdsb2JhbC5zZXRJbnRlcnZhbClcbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==