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
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_engine-user-agent_js-node_modules_core-js_internals_ex-b41e05"], () => (__webpack_exec__("./assets/javascript/sideAdsMenu.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9zaWRlQWRzTWVudS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9tb2R1bGVzL3dlYi50aW1lcnMuanMiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJyZWFsRXN0YXRlRHJvcERvd25TaWRlTWVudSIsImpvYkRyb3BEb3duU2lkZU1lbnUiLCJ0cmF2ZWxEcm9wRG93blNpZGVNZW51IiwiZWR1RHJvcERvd25TaWRlTWVudSIsInNldEludGVydmFsIiwiZmFkZU91dCIsImRyb3BEb3duTWVudSIsImNvbXBvbmVudCIsImRpc3BsYXkiLCJjc3MiLCJyZWR1Y2VTaWRlTmF2ZUJ5Q2xpY2tpbmdBbnlXaGVyZSIsImNvbnRhaW5lcklkIiwiY2xpY2siLCJ0b2dnbGUiLCJzaWRlTWVudSIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJkb2N1bWVudCIsInJlYWR5Il0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUEsSUFBSUEsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWY7O0FBQ0EsSUFBTUMsMEJBQTBCLEdBQUdGLENBQUMsQ0FBQyxtQ0FBRCxDQUFwQztBQUNBLElBQU1HLG1CQUFtQixHQUFHSCxDQUFDLENBQUMsMkJBQUQsQ0FBN0I7QUFDQSxJQUFNSSxzQkFBc0IsR0FBR0osQ0FBQyxDQUFDLDhCQUFELENBQWhDO0FBQ0EsSUFBTUssbUJBQW1CLEdBQUdMLENBQUMsQ0FBQyw0QkFBRCxDQUE3QjtBQUVBTSxXQUFXLENBQUMsWUFBVztBQUNuQk4sR0FBQyxDQUFDLGtCQUFELENBQUQsQ0FBc0JPLE9BQXRCO0FBQ0gsQ0FGVSxFQUVSLElBRlEsQ0FBWDs7QUFHQSxJQUFNQyxZQUFZLEdBQUcsU0FBZkEsWUFBZSxDQUFDQyxTQUFELEVBQWE7QUFDOUIsTUFBSUMsT0FBTyxHQUFHRCxTQUFTLENBQUNFLEdBQVYsQ0FBYyxTQUFkLENBQWQ7QUFDQSxNQUFHRCxPQUFPLEtB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InNvdXJjZXNDb250ZW50IjpbImxldCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XHJcbmNvbnN0IHJlYWxFc3RhdGVEcm9wRG93blNpZGVNZW51ID0gJCgnLl9fZHJvcGRvd25fcmVhbF9lc3RhdGVfc2lkZV9tZW51Jyk7XHJcbmNvbnN0IGpvYkRyb3BEb3duU2lkZU1lbnUgPSAkKCcuX19kcm9wZG93bl9qb2Jfc2lkZV9tZW51Jyk7XHJcbmNvbnN0IHRyYXZlbERyb3BEb3duU2lkZU1lbnUgPSAkKCcuX19kcm9wZG93bl90cmF2ZWxfc2lkZV9tZW51Jyk7XHJcbmNvbnN0IGVkdURyb3BEb3duU2lkZU1lbnUgPSAkKCcuX19kcm9wZG93bl9lZHVjX3NpZGVfbWVudScpO1xyXG5cclxuc2V0SW50ZXJ2YWwoZnVuY3Rpb24gKCl7XHJcbiAgICAkKFwiLl9fYWxlcnQtc3VjY2Vzc1wiKS5mYWRlT3V0KCk7XHJcbn0sIDI1MDApXHJcbmNvbnN0IGRyb3BEb3duTWVudSA9IChjb21wb25lbnQpPT57XHJcbiAgICBsZXQgZGlzcGxheSA9IGNvbXBvbmVudC5jc3MoJ2Rpc3BsYXknKVxyXG4gICAgaWYoZGlzcGxheSA9PT0gJ25vbmUnKVxyXG4gICAgICAgIGNvbXBvbmVudC5jc3Moe1xyXG4gICAgICAgICAgICBkaXNwbGF5OiAnYmxvY2snXHJcbiAgICAgICAgfSk7XHJcbiAgICBlbHNlXHJcbiAgICAgICAgY29tcG9uZW50LmNzcyh7XHJcbiAgICAgICAgICAgIGRpc3BsYXk6ICdub25lJ1xyXG4gICAgICAgIH0pO1xyXG59XHJcbmxldCByZWR1Y2VTaWRlTmF2ZUJ5Q2xpY2tpbmdBbnlXaGVyZSA9IGZ1bmN0aW9uKGNvbnRhaW5lcklkKXtcclxuICAgICQoXCIuc2VydmljZSwuZmlsdGVyXCIpLmNsaWNrKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBsZXQgZGlzcGxheSA9ICQoXCIjXCIrY29udGFpbmVySWQpLmNzcyhcIndpZHRoXCIpO1xyXG4gICAgICAgIGlmKGRpc3BsYXkgPT09IFwiMHB4XCIpe1xyXG4gICAgICAgICAgICAkKFwiI1wiK2NvbnRhaW5lcklkKS5jc3MoXCJ3aWR0aFwiLCBcIjc1JVwiKTtcclxuICAgICAgICAgICAgJChcIi5jbG9zZUJ0blwiKS50b2dnbGUoXCJzbG93XCIpO1xyXG4gICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAkKFwiI1wiK2NvbnRhaW5lcklkKS5jc3MoXCJ3aWR0aFwiLCBcIjAlXCIpO1xyXG4gICAgICAgIH1cclxuICAgIH0pXHJcbn1cclxuY29uc3Qgc2lkZU1lbnUgPSBmdW5jdGlvbihjb250YWluZXJJZCl7XHJcbiAgICAkKFwiI19fbWVudV9idG5cIikuY2xpY2soZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGxldCBkaXNwbGF5ID0gJChcIiNcIitjb250YWluZXJJZCkuY3NzKFwiZGlzcGxheVwiKTtcclxuICAgICAgICBpZihkaXNwbGF5ID09PSBcIm5vbmVcIil7XHJcbiAgICAgICAgICAgICQoXCIjXCIrY29udGFpbmVySWQpLnJlbW92ZUNsYXNzKFwiX19kcm9wZG93bl9jb250YWluZXJcIikuYWRkQ2xhc3MoJ19fc2lkZV9tZW51X2Rpc3BsYXknKTtcclxuICAgICAgICAgICAgJChcIi5jbG9zZUJ0blwiKS5mYWRlT3V0KFwic2xvd1wiKTtcclxuICAgICAgICB9ZWxzZXtcclxuICAgICAgICAgICAgJChcIiNcIitjb250YWluZXJJZCkucmVtb3ZlQ2xhc3MoXCJfX3NpZGVfbWVudV9kaXNwbGF5XCIpLmFkZENsYXNzKCdfX2Ryb3Bkb3duX2NvbnRhaW5lcicpO1xyXG4gICAgICAgIH1cclxuICAgICAgICByZWR1Y2VTaWRlTmF2ZUJ5Q2xpY2tpbmdBbnlXaGVyZShjb250YWluZXJJZCk7XHJcbiAgICB9KVxyXG59XHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcclxuICAgIHNpZGVNZW51KFwiX19kcm9wZG93bl9jb250YWluZXJcIik7XHJcblxyXG4gICAgJCgnLmRycGJ0bicpLmNsaWNrKCgpPT57XHJcbiAgICAgICAgZHJvcERvd25NZW51KGVkdURyb3BEb3duU2lkZU1lbnUpO1xyXG4gICAgfSlcclxuICAgICQoJy5qb2JfZHJwYnRuJykuY2xpY2soKCk9PntcclxuICAgICAgICBkcm9wRG93bk1lbnUoam9iRHJvcERvd25TaWRlTWVudSk7XHJcbiAgICB9KVxyXG4gICAgJCgnLnRyYXZlbF9kcnBidG4nKS5jbGljaygoKT0+e1xyXG4gICAgICAgIGRyb3BEb3duTWVudSh0cmF2ZWxEcm9wRG93blNpZGVNZW51KTtcclxuICAgIH0pXHJcbiAgICAkKCcucmVhbF9lc3RhdGVfZHBkX2J0bicpLmNsaWNrKCgpPT57XHJcbiAgICAgICAgZHJvcERvd25NZW51KHJlYWxFc3RhdGVEcm9wRG93blNpZGVNZW51KTtcclxuICAgIH0pXHJcbn0pIiwidmFyICQgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZXhwb3J0Jyk7XG52YXIgZ2xvYmFsID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2dsb2JhbCcpO1xudmFyIHVzZXJBZ2VudCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9lbmdpbmUtdXNlci1hZ2VudCcpO1xuXG52YXIgc2xpY2UgPSBbXS5zbGljZTtcbnZhciBNU0lFID0gL01TSUUgLlxcLi8udGVzdCh1c2VyQWdlbnQpOyAvLyA8LSBkaXJ0eSBpZTktIGNoZWNrXG5cbnZhciB3cmFwID0gZnVuY3Rpb24gKHNjaGVkdWxlcikge1xuICByZXR1cm4gZnVuY3Rpb24gKGhhbmRsZXIsIHRpbWVvdXQgLyogLCAuLi5hcmd1bWVudHMgKi8pIHtcbiAgICB2YXIgYm91bmRBcmdzID0gYXJndW1lbnRzLmxlbmd0aCA+IDI7XG4gICAgdmFyIGFyZ3MgPSBib3VuZEFyZ3MgPyBzbGljZS5jYWxsKGFyZ3VtZW50cywgMikgOiB1bmRlZmluZWQ7XG4gICAgcmV0dXJuIHNjaGVkdWxlcihib3VuZEFyZ3MgPyBmdW5jdGlvbiAoKSB7XG4gICAgICAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgbm8tbmV3LWZ1bmNcbiAgICAgICh0eXBlb2YgaGFuZGxlciA9PSAnZnVuY3Rpb24nID8gaGFuZGxlciA6IEZ1bmN0aW9uKGhhbmRsZXIpKS5hcHBseSh0aGlzLCBhcmdzKTtcbiAgICB9IDogaGFuZGxlciwgdGltZW91dCk7XG4gIH07XG59O1xuXG4vLyBpZTktIHNldFRpbWVvdXQgJiBzZXRJbnRlcnZhbCBhZGRpdGlvbmFsIHBhcmFtZXRlcnMgZml4XG4vLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI3RpbWVyc1xuJCh7IGdsb2JhbDogdHJ1ZSwgYmluZDogdHJ1ZSwgZm9yY2VkOiBNU0lFIH0sIHtcbiAgLy8gYHNldFRpbWVvdXRgIG1ldGhvZFxuICAvLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXR0aW1lb3V0XG4gIHNldFRpbWVvdXQ6IHdyYXAoZ2xvYmFsLnNldFRpbWVvdXQpLFxuICAvLyBgc2V0SW50ZXJ2YWxgIG1ldGhvZFxuICAvLyBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS90aW1lcnMtYW5kLXVzZXItcHJvbXB0cy5odG1sI2RvbS1zZXRpbnRlcnZhbFxuICBzZXRJbnRlcnZhbDogd3JhcChnbG9iYWwuc2V0SW50ZXJ2YWwpXG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=