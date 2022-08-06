(self["webpackChunk"] = self["webpackChunk"] || []).push([["menu_handler"],{

/***/ "./assets/javascript/sideAdsMenu.js":
/*!******************************************!*\
  !*** ./assets/javascript/sideAdsMenu.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/web.timers.js */ "./node_modules/core-js/modules/web.timers.js");

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

var realEstateDropDownSideMenu = $('.__dropdown_real_estate_side_menu');
var jobDropDownSideMenu = $('.__dropdown_job_side_menu');
var travelDropDownSideMenu = $('.__dropdown_travel_side_menu');
var eduDropDownSideMenu = $('.__dropdown_educ_side_menu');
setInterval(function () {
  $(".__alert-success").fadeOut();
}, 2500);

var dropDownMenu = function dropDownMenu(component) {
  var display = component.css('display');
  if (display === 'none') component.css({
    display: 'block'
  });else component.css({
    display: 'none'
  });
};

var reduceSideNaveByClickingAnyWhere = function reduceSideNaveByClickingAnyWhere(containerId) {
  $(".service,.filter").click(function () {
    var display = $("#" + containerId).css("width");

    if (display === "0px") {
      $("#" + containerId).css("width", "75%");
      $(".closeBtn").toggle("slow");
    } else {
      $("#" + containerId).css("width", "0%");
    }
  });
};

var sideMenu = function sideMenu(containerId) {
  $("#__menu_btn").click(function () {
    var display = $("#" + containerId).css("display");

    if (display === "none") {
      $("#" + containerId).removeClass("__dropdown_container").addClass('__side_menu_display');
      $(".closeBtn").fadeOut("slow");
    } else {
      $("#" + containerId).removeClass("__side_menu_display").addClass('__dropdown_container');
    }

    reduceSideNaveByClickingAnyWhere(containerId);
  });
};

$(document).ready(function () {
  sideMenu("__dropdown_container");
  $('.drpbtn').click(function () {
    dropDownMenu(eduDropDownSideMenu);
  });
  $('.job_drpbtn').click(function () {
    dropDownMenu(jobDropDownSideMenu);
  });
  $('.travel_drpbtn').click(function () {
    dropDownMenu(travelDropDownSideMenu);
  });
  $('.real_estate_dpd_btn').click(function () {
    dropDownMenu(realEstateDropDownSideMenu);
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
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_array-slice_js-node_modules_core-js_internals_export_j-4fec76"], () => (__webpack_exec__("./assets/javascript/sideAdsMenu.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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c2V0cy9qYXZhc2NyaXB0L3NpZGVBZHNNZW51LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy9zY2hlZHVsZXJzLWZpeC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9tb2R1bGVzL3dlYi5zZXQtaW50ZXJ2YWwuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy93ZWIuc2V0LXRpbWVvdXQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy93ZWIudGltZXJzLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImxldCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XG5jb25zdCByZWFsRXN0YXRlRHJvcERvd25TaWRlTWVudSA9ICQoJy5fX2Ryb3Bkb3duX3JlYWxfZXN0YXRlX3NpZGVfbWVudScpO1xuY29uc3Qgam9iRHJvcERvd25TaWRlTWVudSA9ICQoJy5fX2Ryb3Bkb3duX2pvYl9zaWRlX21lbnUnKTtcbmNvbnN0IHRyYXZlbERyb3BEb3duU2lkZU1lbnUgPSAkKCcuX19kcm9wZG93bl90cmF2ZWxfc2lkZV9tZW51Jyk7XG5jb25zdCBlZHVEcm9wRG93blNpZGVNZW51ID0gJCgnLl9fZHJvcGRvd25fZWR1Y19zaWRlX21lbnUnKTtcblxuc2V0SW50ZXJ2YWwoZnVuY3Rpb24gKCl7XG4gICAgJChcIi5fX2FsZXJ0LXN1Y2Nlc3NcIikuZmFkZU91dCgpO1xufSwgMjUwMClcbmNvbnN0IGRyb3BEb3duTWVudSA9IChjb21wb25lbnQpPT57XG4gICAgbGV0IGRpc3BsYXkgPSBjb21wb25lbnQuY3NzKCdkaXNwbGF5JylcbiAgICBpZihkaXNwbGF5ID09PSAnbm9uZScpXG4gICAgICAgIGNvbXBvbmVudC5jc3Moe1xuICAgICAgICAgICAgZGlzcGxheTogJ2Jsb2NrJ1xuICAgICAgICB9KTtcbiAgICBlbHNlXG4gICAgICAgIGNvbXBvbmVudC5jc3Moe1xuICAgICAgICAgICAgZGlzcGxheTogJ25vbmUnXG4gICAgICAgIH0pO1xufVxubGV0IHJlZHVjZVNpZGVOYXZlQnlDbGlja2luZ0FueVdoZXJlID0gZnVuY3Rpb24oY29udGFpbmVySWQpe1xuICAgICQoXCIuc2VydmljZSwuZmlsdGVyXCIpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0IGRpc3BsYXkgPSAkKFwiI1wiK2NvbnRhaW5lcklkKS5jc3MoXCJ3aWR0aFwiKTtcbiAgICAgICAgaWYoZGlzcGxheSA9PT0gXCIwcHhcIil7XG4gICAgICAgICAgICAkKFwiI1wiK2NvbnRhaW5lcklkKS5jc3MoXCJ3aWR0aFwiLCBcIjc1JVwiKTtcbiAgICAgICAgICAgICQoXCIuY2xvc2VCdG5cIikudG9nZ2xlKFwic2xvd1wiKTtcbiAgICAgICAgfWVsc2V7XG4gICAgICAgICAgICAkKFwiI1wiK2NvbnRhaW5lcklkKS5jc3MoXCJ3aWR0aFwiLCBcIjAlXCIpO1xuICAgICAgICB9XG4gICAgfSlcbn1cbmNvbnN0IHNpZGVNZW51ID0gZnVuY3Rpb24oY29udGFpbmVySWQpe1xuICAgICQoXCIjX19tZW51X2J0blwiKS5jbGljayhmdW5jdGlvbiAoKSB7XG4gICAgICAgIGxldCBkaXNwbGF5ID0gJChcIiNcIitjb250YWluZXJJZCkuY3NzKFwiZGlzcGxheVwiKTtcbiAgICAgICAgaWYoZGlzcGxheSA9PT0gXCJub25lXCIpe1xuICAgICAgICAgICAgJChcIiNcIitjb250YWluZXJJZCkucmVtb3ZlQ2xhc3MoXCJfX2Ryb3Bkb3duX2NvbnRhaW5lclwiKS5hZGRDbGFzcygnX19zaWRlX21lbnVfZGlzcGxheScpO1xuICAgICAgICAgICAgJChcIi5jbG9zZUJ0blwiKS5mYWRlT3V0KFwic2xvd1wiKTtcbiAgICAgICAgfWVsc2V7XG4gICAgICAgICAgICAkKFwiI1wiK2NvbnRhaW5lcklkKS5yZW1vdmVDbGFzcyhcIl9fc2lkZV9tZW51X2Rpc3BsYXlcIikuYWRkQ2xhc3MoJ19fZHJvcGRvd25fY29udGFpbmVyJyk7XG4gICAgICAgIH1cbiAgICAgICAgcmVkdWNlU2lkZU5hdmVCeUNsaWNraW5nQW55V2hlcmUoY29udGFpbmVySWQpO1xuICAgIH0pXG59XG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgc2lkZU1lbnUoXCJfX2Ryb3Bkb3duX2NvbnRhaW5lclwiKTtcblxuICAgICQoJy5kcnBidG4nKS5jbGljaygoKT0+e1xuICAgICAgICBkcm9wRG93bk1lbnUoZWR1RHJvcERvd25TaWRlTWVudSk7XG4gICAgfSlcbiAgICAkKCcuam9iX2RycGJ0bicpLmNsaWNrKCgpPT57XG4gICAgICAgIGRyb3BEb3duTWVudShqb2JEcm9wRG93blNpZGVNZW51KTtcbiAgICB9KVxuICAgICQoJy50cmF2ZWxfZHJwYnRuJykuY2xpY2soKCk9PntcbiAgICAgICAgZHJvcERvd25NZW51KHRyYXZlbERyb3BEb3duU2lkZU1lbnUpO1xuICAgIH0pXG4gICAgJCgnLnJlYWxfZXN0YXRlX2RwZF9idG4nKS5jbGljaygoKT0+e1xuICAgICAgICBkcm9wRG93bk1lbnUocmVhbEVzdGF0ZURyb3BEb3duU2lkZU1lbnUpO1xuICAgIH0pXG59KSIsInZhciBnbG9iYWwgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZ2xvYmFsJyk7XG52YXIgYXBwbHkgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZnVuY3Rpb24tYXBwbHknKTtcbnZhciBpc0NhbGxhYmxlID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2lzLWNhbGxhYmxlJyk7XG52YXIgdXNlckFnZW50ID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2VuZ2luZS11c2VyLWFnZW50Jyk7XG52YXIgYXJyYXlTbGljZSA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9hcnJheS1zbGljZScpO1xudmFyIHZhbGlkYXRlQXJndW1lbnRzTGVuZ3RoID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3ZhbGlkYXRlLWFyZ3VtZW50cy1sZW5ndGgnKTtcblxudmFyIE1TSUUgPSAvTVNJRSAuXFwuLy50ZXN0KHVzZXJBZ2VudCk7IC8vIDwtIGRpcnR5IGllOS0gY2hlY2tcbnZhciBGdW5jdGlvbiA9IGdsb2JhbC5GdW5jdGlvbjtcblxudmFyIHdyYXAgPSBmdW5jdGlvbiAoc2NoZWR1bGVyKSB7XG4gIHJldHVybiBNU0lFID8gZnVuY3Rpb24gKGhhbmRsZXIsIHRpbWVvdXQgLyogLCAuLi5hcmd1bWVudHMgKi8pIHtcbiAgICB2YXIgYm91bmRBcmdzID0gdmFsaWRhdGVBcmd1bWVudHNMZW5ndGgoYXJndW1lbnRzLmxlbmd0aCwgMSkgPiAyO1xuICAgIHZhciBmbiA9IGlzQ2FsbGFibGUoaGFuZGxlcikgPyBoYW5kbGVyIDogRnVuY3Rpb24oaGFuZGxlcik7XG4gICAgdmFyIGFyZ3MgPSBib3VuZEFyZ3MgPyBhcnJheVNsaWNlKGFyZ3VtZW50cywgMikgOiB1bmRlZmluZWQ7XG4gICAgcmV0dXJuIHNjaGVkdWxlcihib3VuZEFyZ3MgPyBmdW5jdGlvbiAoKSB7XG4gICAgICBhcHBseShmbiwgdGhpcywgYXJncyk7XG4gICAgfSA6IGZuLCB0aW1lb3V0KTtcbiAgfSA6IHNjaGVkdWxlcjtcbn07XG5cbi8vIGllOS0gc2V0VGltZW91dCAmIHNldEludGVydmFsIGFkZGl0aW9uYWwgcGFyYW1ldGVycyBmaXhcbi8vIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3RpbWVycy1hbmQtdXNlci1wcm9tcHRzLmh0bWwjdGltZXJzXG5tb2R1bGUuZXhwb3J0cyA9IHtcbiAgLy8gYHNldFRpbWVvdXRgIG1ldGhvZFxuICAvLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXR0aW1lb3V0XG4gIHNldFRpbWVvdXQ6IHdyYXAoZ2xvYmFsLnNldFRpbWVvdXQpLFxuICAvLyBgc2V0SW50ZXJ2YWxgIG1ldGhvZFxuICAvLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXRpbnRlcnZhbFxuICBzZXRJbnRlcnZhbDogd3JhcChnbG9iYWwuc2V0SW50ZXJ2YWwpXG59O1xuIiwidmFyICQgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZXhwb3J0Jyk7XG52YXIgZ2xvYmFsID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2dsb2JhbCcpO1xudmFyIHNldEludGVydmFsID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3NjaGVkdWxlcnMtZml4Jykuc2V0SW50ZXJ2YWw7XG5cbi8vIGllOS0gc2V0SW50ZXJ2YWwgYWRkaXRpb25hbCBwYXJhbWV0ZXJzIGZpeFxuLy8gaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2UvdGltZXJzLWFuZC11c2VyLXByb21wdHMuaHRtbCNkb20tc2V0aW50ZXJ2YWxcbiQoeyBnbG9iYWw6IHRydWUsIGJpbmQ6IHRydWUsIGZvcmNlZDogZ2xvYmFsLnNldEludGVydmFsICE9PSBzZXRJbnRlcnZhbCB9LCB7XG4gIHNldEludGVydmFsOiBzZXRJbnRlcnZhbFxufSk7XG4iLCJ2YXIgJCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9leHBvcnQnKTtcbnZhciBnbG9iYWwgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZ2xvYmFsJyk7XG52YXIgc2V0VGltZW91dCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9zY2hlZHVsZXJzLWZpeCcpLnNldFRpbWVvdXQ7XG5cbi8vIGllOS0gc2V0VGltZW91dCBhZGRpdGlvbmFsIHBhcmFtZXRlcnMgZml4XG4vLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXR0aW1lb3V0XG4kKHsgZ2xvYmFsOiB0cnVlLCBiaW5kOiB0cnVlLCBmb3JjZWQ6IGdsb2JhbC5zZXRUaW1lb3V0ICE9PSBzZXRUaW1lb3V0IH0sIHtcbiAgc2V0VGltZW91dDogc2V0VGltZW91dFxufSk7XG4iLCIvLyBUT0RPOiBSZW1vdmUgdGhpcyBtb2R1bGUgZnJvbSBgY29yZS1qc0A0YCBzaW5jZSBpdCdzIHNwbGl0IHRvIG1vZHVsZXMgbGlzdGVkIGJlbG93XG5yZXF1aXJlKCcuLi9tb2R1bGVzL3dlYi5zZXQtaW50ZXJ2YWwnKTtcbnJlcXVpcmUoJy4uL21vZHVsZXMvd2ViLnNldC10aW1lb3V0Jyk7XG4iXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJyZWFsRXN0YXRlRHJvcERvd25TaWRlTWVudSIsImpvYkRyb3BEb3duU2lkZU1lbnUiLCJ0cmF2ZWxEcm9wRG93blNpZGVNZW51IiwiZWR1RHJvcERvd25TaWRlTWVudSIsInNldEludGVydmFsIiwiZmFkZU91dCIsImRyb3BEb3duTWVudSIsImNvbXBvbmVudCIsImRpc3BsYXkiLCJjc3MiLCJyZWR1Y2VTaWRlTmF2ZUJ5Q2xpY2tpbmdBbnlXaGVyZSIsImNvbnRhaW5lcklkIiwiY2xpY2siLCJ0b2dnbGUiLCJzaWRlTWVudSIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJkb2N1bWVudCIsInJlYWR5Il0sInNvdXJjZVJvb3QiOiIifQ==