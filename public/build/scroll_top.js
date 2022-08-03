(self["webpackChunk"] = self["webpackChunk"] || []).push([["scroll_top"],{

/***/ "./assets/javascript/scrollToTop.js":
/*!******************************************!*\
  !*** ./assets/javascript/scrollToTop.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

$(document).ready(function () {
  var route = function route() {
    $(".__route").click(function () {
      localStorage.setItem("route", $(this).attr("href"));
    });
  };

  route();

  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (document.documentElement.scrollTop > 20) {
      $(".topBtn").css("display", "block");
    } else {
      $(".topBtn").css("display", "none");
    }
  }

  $(".topBtn, .__district").click(function () {
    topFunction();
  });

  function topFunction() {
    document.body.scrollTop = 0; // For Safari

    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ "use strict";
/******/ 
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js"], () => (__webpack_exec__("./assets/javascript/scrollToTop.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9zY3JvbGxUb1RvcC5qcyJdLCJuYW1lcyI6WyIkIiwicmVxdWlyZSIsImRvY3VtZW50IiwicmVhZHkiLCJyb3V0ZSIsImNsaWNrIiwibG9jYWxTdG9yYWdlIiwic2V0SXRlbSIsImF0dHIiLCJ3aW5kb3ciLCJvbnNjcm9sbCIsInNjcm9sbEZ1bmN0aW9uIiwiZG9jdW1lbnRFbGVtZW50Iiwic2Nyb2xsVG9wIiwiY3NzIiwidG9wRnVuY3Rpb24iLCJib2R5Il0sIm1hcHBpbmdzIjoiOzs7Ozs7OztBQUFBLElBQUlBLENBQUMsR0FBR0MsbUJBQU8sQ0FBQyxvREFBRCxDQUFmOztBQUNBRCxDQUFDLENBQUNFLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVk7QUFDMUIsTUFBSUMsS0FBSyxHQUFHLFNBQVJBLEtBQVEsR0FBVztBQUNuQkosS0FBQyxDQUFDLFVBQUQsQ0FBRCxDQUFjSyxLQUFkLENBQW9CLFlBQVc7QUFDM0JDLGtCQUFZLENBQUNDLE9BQWIsQ0FBcUIsT0FBckIsRUFBOEJQLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVEsSUFBUixDQUFhLE1BQWIsQ0FBOUI7QUFDSCxLQUZEO0FBR0gsR0FKRDs7QUFLQUosT0FBSzs7QUFDTEssUUFBTSxDQUFDQyxRQUFQLEdBQWtCLFlBQVc7QUFBQ0Msa0JBQWM7QUFBRyxHQUEvQzs7QUFDQSxXQUFTQSxjQUFULEdBQTBCO0FBQ3RCLFFBQUlULFFBQVEsQ0FBQ1UsZUFBVCxDQUF5QkMsU0FBekIsR0FBcUMsRUFBekMsRUFBNkM7QUFDekNiLE9BQUMsQ0FBQyxTQUFELENBQUQsQ0FBYWMsR0FBYixDQUFpQixTQUFqQixFQUE0QixPQUE1QjtBQUNILEtBRkQsTUFFTztBQUNIZCxPQUFDLENBQUMsU0FBRCxDQUFELENBQWFjLEdBQWIsQ0FBaUIsU0FBakIsRUFBNEIsTUFBNUI7QUFDSDtBQUNKOztBQUVEZCxHQUFDLENBQUMsc0JBQUQsQ0FBRCxDQUEwQkssS0FBMUIsQ0FBZ0MsWUFBWTtBQUN4Q1UsZUFBVztBQUNkLEdBRkQ7O0FBR0EsV0FBU0EsV0FBVCxHQUF1QjtBQUNuQmIsWUFBUSxDQUFDYyxJQUFULENBQWNILFNBQWQsR0FBMEIsQ0FBMUIsQ0FEbUIsQ0FDVTs7QUFDN0JYLFlBQVEsQ0FBQ1UsZUFBVCxDQUF5QkMsU0FBekIsR0FBcUMsQ0FBckMsQ0FGbUIsQ0FFcUI7QUFDM0M7QUFFSixDQXhCRCxFIiwiZmlsZSI6InNjcm9sbF90b3AuanMiLCJzb3VyY2VzQ29udGVudCI6WyJsZXQgJCA9IHJlcXVpcmUoJ2pxdWVyeScpXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcclxuICAgIGxldCByb3V0ZSA9IGZ1bmN0aW9uICgpe1xyXG4gICAgICAgICQoXCIuX19yb3V0ZVwiKS5jbGljayhmdW5jdGlvbiAoKXtcclxuICAgICAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oXCJyb3V0ZVwiLCAkKHRoaXMpLmF0dHIoXCJocmVmXCIpKTtcclxuICAgICAgICB9KVxyXG4gICAgfVxyXG4gICAgcm91dGUoKTtcclxuICAgIHdpbmRvdy5vbnNjcm9sbCA9IGZ1bmN0aW9uKCkge3Njcm9sbEZ1bmN0aW9uKCl9O1xyXG4gICAgZnVuY3Rpb24gc2Nyb2xsRnVuY3Rpb24oKSB7XHJcbiAgICAgICAgaWYgKGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5zY3JvbGxUb3AgPiAyMCkge1xyXG4gICAgICAgICAgICAkKFwiLnRvcEJ0blwiKS5jc3MoXCJkaXNwbGF5XCIsIFwiYmxvY2tcIik7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgJChcIi50b3BCdG5cIikuY3NzKFwiZGlzcGxheVwiLCBcIm5vbmVcIik7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgICQoXCIudG9wQnRuLCAuX19kaXN0cmljdFwiKS5jbGljayhmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgdG9wRnVuY3Rpb24oKTtcclxuICAgIH0pO1xyXG4gICAgZnVuY3Rpb24gdG9wRnVuY3Rpb24oKSB7XHJcbiAgICAgICAgZG9jdW1lbnQuYm9keS5zY3JvbGxUb3AgPSAwOyAvLyBGb3IgU2FmYXJpXHJcbiAgICAgICAgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LnNjcm9sbFRvcCA9IDA7IC8vIEZvciBDaHJvbWUsIEZpcmVmb3gsIElFIGFuZCBPcGVyYVxyXG4gICAgfVxyXG5cclxufSkiXSwic291cmNlUm9vdCI6IiJ9