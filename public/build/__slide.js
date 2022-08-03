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
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_engine-user-agent_js-node_modules_core-js_internals_ex-b41e05"], () => (__webpack_exec__("./assets/javascript/__slide.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9fX3NsaWRlLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL21vZHVsZXMvd2ViLnRpbWVycy5qcyJdLCJuYW1lcyI6WyIkIiwicmVxdWlyZSIsImRvY3VtZW50IiwicmVhZHkiLCJmZWF0dXJlcyIsImNwdCIsImZhZGVJbiIsInNldEludGVydmFsIiwiZmVhdHVyZSIsIm5leHRfZiIsImhhc0NsYXNzIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsImxlbmd0aCIsImxhc3RfZiIsImNsaWNrIiwiZG9jdW1lbnRFbGVtZW50Iiwic2Nyb2xsVG9wIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUEsSUFBSUEsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWY7O0FBQ0FELENBQUMsQ0FBQ0UsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBSTtBQUNsQixNQUFNQyxRQUFRLEdBQUdKLENBQUMsQ0FBQyxxQkFBRCxDQUFsQjtBQUNBLE1BQUlLLEdBQUcsR0FBRyxDQUFWO0FBQ0FMLEdBQUMsQ0FBQyxvQkFBRCxDQUFELENBQXdCTSxNQUF4QixDQUErQixNQUEvQjtBQUVBQyxhQUFXLENBQUMsWUFBSTtBQUNaLFFBQUlDLE9BQU8sR0FBR0osUUFBUSxDQUFDQyxHQUFELENBQXRCO0FBQ0EsUUFBSUksTUFBTSxHQUFHTCxRQUFRLENBQUNDLEdBQUcsR0FBQyxDQUFMLENBQXJCOztBQUNBLFFBQUdMLENBQUMsQ0FBQ1EsT0FBRCxDQUFELENBQVdFLFFBQVgsQ0FBb0IsbUJBQXBCLENBQUgsRUFBNEM7QUFDeENWLE9BQUMsQ0FBQ1EsT0FBRCxDQUFELENBQVdHLFdBQVgsQ0FBdUIsbUJBQXZCO0FBQ0FYLE9BQUMsQ0FBQ1MsTUFBRCxDQUFELENBQVVHLFFBQVYsQ0FBbUIsbUJBQW5CO0FBQ0FaLE9BQUMsQ0FBQyxvQkFBRCxDQUFELENBQXdCTSxNQUF4QixDQUErQixNQUEvQjtBQUNIOztBQUNERCxPQUFHOztBQUNILFFBQUdBLEdBQUcsS0FBS0QsUUFBUSxDQUFDUyxNQUFwQixFQUEyQjtBQUN2QixVQUFJQyxNQUFNLEdBQUdWLFFBQVEsQ0FBQ0MsR0FBRCxDQUFyQjtBQUNBTCxPQUFDLENBQUNjLE1BQUQsQ0FBRCxDQUFVSCxXQUFWLENBQXNCLG1CQUF0QjtBQUNBTixTQUFHLEdBQUcsQ0FBTjtBQUNBLFVBQUlHLFFBQU8sR0FBR0osUUFBUSxDQUFDQyxHQUFELENBQXRCO0FBQ0FMLE9BQUMsQ0FBQ1EsUUFBRCxDQUFELENBQVdJLFFBQVgsQ0FBb0IsbUJBQXBCO0FBQ0FaLE9BQUMsQ0FBQyxvQkFBRCxDQUFELENBQXdCTSxNQUF4QixDQUErQixPQUEvQjtBQUNIO0FBQ0osR0FqQlUsRUFpQlIsSUFqQlEsQ0FBWDtBQXFCQU4sR0FBQyxDQUFDLFVBQUQsQ0FBRCxDQUFjZSxLQUFkLENBQW9CLFlBQVc7QUFDM0JiLFlBQVEsQ0FBQ2MsZUFBVCxDQUF5QkMsU0FBekIsR0FBcUMsR0FBckM7QUFDQWpCLEtBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUJZLFFBQW5CO0FBQ0gsR0FIRDtBQUlILENBOUJELEU7Ozs7Ozs7Ozs7QUNEQSxRQUFRLG1CQUFPLENBQUMsdUVBQXFCO0FBQ3JDLGFBQWEsbUJBQU8sQ0FBQyx1RUFBcUI7QUFDMUMsZ0JBQWdCLG1CQUFPLENBQUMsNkZBQWdDOztBQUV4RDtBQUNBLHNDQUFzQzs7QUFFdEM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsR0FBRyx5Q0FBeUM7QUFDNUM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQyIsImZpbGUiOiJfX3NsaWRlLmpzIiwic291cmNlc0NvbnRlbnQiOlsibGV0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcclxuJChkb2N1bWVudCkucmVhZHkoKCk9PntcclxuICAgIGNvbnN0IGZlYXR1cmVzID0gJCgnLl9fZmVhdHVyZXNfZGlzcGxheScpO1xyXG4gICAgbGV0IGNwdCA9IDA7XHJcbiAgICAkKCcuX19hY3RpdmVfZmVhdHVyZXMnKS5mYWRlSW4oJ3Nsb3cnKTtcclxuXHJcbiAgICBzZXRJbnRlcnZhbCgoKT0+e1xyXG4gICAgICAgIGxldCBmZWF0dXJlID0gZmVhdHVyZXNbY3B0XTtcclxuICAgICAgICBsZXQgbmV4dF9mID0gZmVhdHVyZXNbY3B0KzFdO1xyXG4gICAgICAgIGlmKCQoZmVhdHVyZSkuaGFzQ2xhc3MoJ19fYWN0aXZlX2ZlYXR1cmVzJykpe1xyXG4gICAgICAgICAgICAkKGZlYXR1cmUpLnJlbW92ZUNsYXNzKCdfX2FjdGl2ZV9mZWF0dXJlcycpXHJcbiAgICAgICAgICAgICQobmV4dF9mKS5hZGRDbGFzcygnX19hY3RpdmVfZmVhdHVyZXMnKVxyXG4gICAgICAgICAgICAkKCcuX19hY3RpdmVfZmVhdHVyZXMnKS5mYWRlSW4oJ3Nsb3cnKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgY3B0ICsrO1xyXG4gICAgICAgIGlmKGNwdCA9PT0gZmVhdHVyZXMubGVuZ3RoKXtcclxuICAgICAgICAgICAgbGV0IGxhc3RfZiA9IGZlYXR1cmVzW2NwdF07XHJcbiAgICAgICAgICAgICQobGFzdF9mKS5yZW1vdmVDbGFzcygnX19hY3RpdmVfZmVhdHVyZXMnKVxyXG4gICAgICAgICAgICBjcHQgPSAwO1xyXG4gICAgICAgICAgICBsZXQgZmVhdHVyZSA9IGZlYXR1cmVzW2NwdF07XHJcbiAgICAgICAgICAgICQoZmVhdHVyZSkuYWRkQ2xhc3MoJ19fYWN0aXZlX2ZlYXR1cmVzJylcclxuICAgICAgICAgICAgJCgnLl9fYWN0aXZlX2ZlYXR1cmVzJykuZmFkZUluKCdzbGlkZScpO1xyXG4gICAgICAgIH1cclxuICAgIH0sIDQwMDApXHJcblxyXG5cclxuXHJcbiAgICAkKFwiI19fYXJyb3dcIikuY2xpY2soZnVuY3Rpb24gKCl7XHJcbiAgICAgICAgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LnNjcm9sbFRvcCA9IDQxODtcclxuICAgICAgICAkKFwiI3Rlc3RfYW5pbWF0ZVwiKS5hZGRDbGFzcyhgYW5pbWF0ZV9fYW5pbWF0ZWQgYW5pbWF0ZV9fem9vbUluVXBgKTtcclxuICAgIH0pXHJcbn0pIiwidmFyICQgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZXhwb3J0Jyk7XG52YXIgZ2xvYmFsID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2dsb2JhbCcpO1xudmFyIHVzZXJBZ2VudCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9lbmdpbmUtdXNlci1hZ2VudCcpO1xuXG52YXIgc2xpY2UgPSBbXS5zbGljZTtcbnZhciBNU0lFID0gL01TSUUgLlxcLi8udGVzdCh1c2VyQWdlbnQpOyAvLyA8LSBkaXJ0eSBpZTktIGNoZWNrXG5cbnZhciB3cmFwID0gZnVuY3Rpb24gKHNjaGVkdWxlcikge1xuICByZXR1cm4gZnVuY3Rpb24gKGhhbmRsZXIsIHRpbWVvdXQgLyogLCAuLi5hcmd1bWVudHMgKi8pIHtcbiAgICB2YXIgYm91bmRBcmdzID0gYXJndW1lbnRzLmxlbmd0aCA+IDI7XG4gICAgdmFyIGFyZ3MgPSBib3VuZEFyZ3MgPyBzbGljZS5jYWxsKGFyZ3VtZW50cywgMikgOiB1bmRlZmluZWQ7XG4gICAgcmV0dXJuIHNjaGVkdWxlcihib3VuZEFyZ3MgPyBmdW5jdGlvbiAoKSB7XG4gICAgICAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgbm8tbmV3LWZ1bmNcbiAgICAgICh0eXBlb2YgaGFuZGxlciA9PSAnZnVuY3Rpb24nID8gaGFuZGxlciA6IEZ1bmN0aW9uKGhhbmRsZXIpKS5hcHBseSh0aGlzLCBhcmdzKTtcbiAgICB9IDogaGFuZGxlciwgdGltZW91dCk7XG4gIH07XG59O1xuXG4vLyBpZTktIHNldFRpbWVvdXQgJiBzZXRJbnRlcnZhbCBhZGRpdGlvbmFsIHBhcmFtZXRlcnMgZml4XG4vLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI3RpbWVyc1xuJCh7IGdsb2JhbDogdHJ1ZSwgYmluZDogdHJ1ZSwgZm9yY2VkOiBNU0lFIH0sIHtcbiAgLy8gYHNldFRpbWVvdXRgIG1ldGhvZFxuICAvLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXR0aW1lb3V0XG4gIHNldFRpbWVvdXQ6IHdyYXAoZ2xvYmFsLnNldFRpbWVvdXQpLFxuICAvLyBgc2V0SW50ZXJ2YWxgIG1ldGhvZFxuICAvLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXRpbnRlcnZhbFxuICBzZXRJbnRlcnZhbDogd3JhcChnbG9iYWwuc2V0SW50ZXJ2YWwpXG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=