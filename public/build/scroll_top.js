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
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js"], () => (__webpack_exec__("./assets/javascript/scrollToTop.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoic2Nyb2xsX3RvcC5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7OztBQUFBLElBQUlBLENBQUMsR0FBR0MsbUJBQU8sQ0FBQyxvREFBRCxDQUFmOztBQUNBRCxDQUFDLENBQUNFLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVk7RUFDMUIsSUFBSUMsS0FBSyxHQUFHLFNBQVJBLEtBQVEsR0FBVztJQUNuQkosQ0FBQyxDQUFDLFVBQUQsQ0FBRCxDQUFjSyxLQUFkLENBQW9CLFlBQVc7TUFDM0JDLFlBQVksQ0FBQ0MsT0FBYixDQUFxQixPQUFyQixFQUE4QlAsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUSxJQUFSLENBQWEsTUFBYixDQUE5QjtJQUNILENBRkQ7RUFHSCxDQUpEOztFQUtBSixLQUFLOztFQUNMSyxNQUFNLENBQUNDLFFBQVAsR0FBa0IsWUFBVztJQUFDQyxjQUFjO0VBQUcsQ0FBL0M7O0VBQ0EsU0FBU0EsY0FBVCxHQUEwQjtJQUN0QixJQUFJVCxRQUFRLENBQUNVLGVBQVQsQ0FBeUJDLFNBQXpCLEdBQXFDLEVBQXpDLEVBQTZDO01BQ3pDYixDQUFDLENBQUMsU0FBRCxDQUFELENBQWFjLEdBQWIsQ0FBaUIsU0FBakIsRUFBNEIsT0FBNUI7SUFDSCxDQUZELE1BRU87TUFDSGQsQ0FBQyxDQUFDLFNBQUQsQ0FBRCxDQUFhYyxHQUFiLENBQWlCLFNBQWpCLEVBQTRCLE1BQTVCO0lBQ0g7RUFDSjs7RUFFRGQsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJLLEtBQTFCLENBQWdDLFlBQVk7SUFDeENVLFdBQVc7RUFDZCxDQUZEOztFQUdBLFNBQVNBLFdBQVQsR0FBdUI7SUFDbkJiLFFBQVEsQ0FBQ2MsSUFBVCxDQUFjSCxTQUFkLEdBQTBCLENBQTFCLENBRG1CLENBQ1U7O0lBQzdCWCxRQUFRLENBQUNVLGVBQVQsQ0FBeUJDLFNBQXpCLEdBQXFDLENBQXJDLENBRm1CLENBRXFCO0VBQzNDO0FBRUosQ0F4QkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9zY3JvbGxUb1RvcC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJsZXQgJCA9IHJlcXVpcmUoJ2pxdWVyeScpXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgbGV0IHJvdXRlID0gZnVuY3Rpb24gKCl7XG4gICAgICAgICQoXCIuX19yb3V0ZVwiKS5jbGljayhmdW5jdGlvbiAoKXtcbiAgICAgICAgICAgIGxvY2FsU3RvcmFnZS5zZXRJdGVtKFwicm91dGVcIiwgJCh0aGlzKS5hdHRyKFwiaHJlZlwiKSk7XG4gICAgICAgIH0pXG4gICAgfVxuICAgIHJvdXRlKCk7XG4gICAgd2luZG93Lm9uc2Nyb2xsID0gZnVuY3Rpb24oKSB7c2Nyb2xsRnVuY3Rpb24oKX07XG4gICAgZnVuY3Rpb24gc2Nyb2xsRnVuY3Rpb24oKSB7XG4gICAgICAgIGlmIChkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuc2Nyb2xsVG9wID4gMjApIHtcbiAgICAgICAgICAgICQoXCIudG9wQnRuXCIpLmNzcyhcImRpc3BsYXlcIiwgXCJibG9ja1wiKTtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICQoXCIudG9wQnRuXCIpLmNzcyhcImRpc3BsYXlcIiwgXCJub25lXCIpO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgJChcIi50b3BCdG4sIC5fX2Rpc3RyaWN0XCIpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdG9wRnVuY3Rpb24oKTtcbiAgICB9KTtcbiAgICBmdW5jdGlvbiB0b3BGdW5jdGlvbigpIHtcbiAgICAgICAgZG9jdW1lbnQuYm9keS5zY3JvbGxUb3AgPSAwOyAvLyBGb3IgU2FmYXJpXG4gICAgICAgIGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5zY3JvbGxUb3AgPSAwOyAvLyBGb3IgQ2hyb21lLCBGaXJlZm94LCBJRSBhbmQgT3BlcmFcbiAgICB9XG5cbn0pIl0sIm5hbWVzIjpbIiQiLCJyZXF1aXJlIiwiZG9jdW1lbnQiLCJyZWFkeSIsInJvdXRlIiwiY2xpY2siLCJsb2NhbFN0b3JhZ2UiLCJzZXRJdGVtIiwiYXR0ciIsIndpbmRvdyIsIm9uc2Nyb2xsIiwic2Nyb2xsRnVuY3Rpb24iLCJkb2N1bWVudEVsZW1lbnQiLCJzY3JvbGxUb3AiLCJjc3MiLCJ0b3BGdW5jdGlvbiIsImJvZHkiXSwic291cmNlUm9vdCI6IiJ9