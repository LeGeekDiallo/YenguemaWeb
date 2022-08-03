(self["webpackChunk"] = self["webpackChunk"] || []).push([["__form_step_handler"],{

/***/ "./assets/javascript/realEstate/formStepHandler.js":
/*!*********************************************************!*\
  !*** ./assets/javascript/realEstate/formStepHandler.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

var bCpt = 0;

var validator = function validator() {
  var bloc_active = document.querySelector('.__bloc_active');
  var fields = bloc_active.querySelectorAll('input[type=text], input[type=tel]');

  for (var field = 0; field < fields.length; field++) {
    if ($(fields[field]).val() === "") {
      $(fields[field]).focus();
      return false;
    }
  }

  return true;
};

var showBloc = function showBloc(bCpt) {
  var blocs = $(".__bloc");
  $(blocs[bCpt]).removeClass('__bloc').addClass('__bloc_active');
};

var nextBloc = function nextBloc() {
  var active_bloc = $('.__bloc_active');
  $(active_bloc).removeClass('__bloc_active').addClass('__bloc');
  bCpt += 1;
  showBloc(bCpt);
};

var prevBloc = function prevBloc() {
  var active_bloc = $('.__bloc_active');
  $(active_bloc).removeClass('__bloc_active').addClass('__bloc');
  bCpt -= 1;
  showBloc(bCpt);
};

$(document).ready(function () {
  showBloc(0);
  $("#submit_btn").click(function () {
    var blocs = $(".__bloc");

    if (bCpt < blocs.length && validator()) {
      nextBloc();
      $("#prev_btn").css({
        display: 'block'
      });
    }

    if (bCpt >= blocs.length) {
      $("#submit_btn").attr('type', 'submit').html('Ajouter');
    }
  });
  $("#prev_btn").click(function () {
    if (bCpt > 0) {
      prevBloc();
    }

    if (bCpt === 0) {
      $(this).css({
        display: 'none'
      });
    }
  });
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ "use strict";
/******/ 
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js"], () => (__webpack_exec__("./assets/javascript/realEstate/formStepHandler.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9yZWFsRXN0YXRlL2Zvcm1TdGVwSGFuZGxlci5qcyJdLCJuYW1lcyI6WyIkIiwicmVxdWlyZSIsImJDcHQiLCJ2YWxpZGF0b3IiLCJibG9jX2FjdGl2ZSIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsImZpZWxkcyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJmaWVsZCIsImxlbmd0aCIsInZhbCIsImZvY3VzIiwic2hvd0Jsb2MiLCJibG9jcyIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJuZXh0QmxvYyIsImFjdGl2ZV9ibG9jIiwicHJldkJsb2MiLCJyZWFkeSIsImNsaWNrIiwiY3NzIiwiZGlzcGxheSIsImF0dHIiLCJodG1sIl0sIm1hcHBpbmdzIjoiOzs7Ozs7OztBQUFBLElBQUlBLENBQUMsR0FBR0MsbUJBQU8sQ0FBQyxvREFBRCxDQUFmOztBQUNBLElBQUlDLElBQUksR0FBRyxDQUFYOztBQUVBLElBQU1DLFNBQVMsR0FBRyxTQUFaQSxTQUFZLEdBQUk7QUFDbEIsTUFBTUMsV0FBVyxHQUFHQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsZ0JBQXZCLENBQXBCO0FBQ0EsTUFBSUMsTUFBTSxHQUFHSCxXQUFXLENBQUNJLGdCQUFaLENBQTZCLG1DQUE3QixDQUFiOztBQUNBLE9BQUksSUFBSUMsS0FBSyxHQUFDLENBQWQsRUFBaUJBLEtBQUssR0FBQ0YsTUFBTSxDQUFDRyxNQUE5QixFQUFzQ0QsS0FBSyxFQUEzQyxFQUE4QztBQUMxQyxRQUFHVCxDQUFDLENBQUNPLE1BQU0sQ0FBQ0UsS0FBRCxDQUFQLENBQUQsQ0FBaUJFLEdBQWpCLE9BQTJCLEVBQTlCLEVBQWtDO0FBQzlCWCxPQUFDLENBQUNPLE1BQU0sQ0FBQ0UsS0FBRCxDQUFQLENBQUQsQ0FBaUJHLEtBQWpCO0FBQ0EsYUFBTyxLQUFQO0FBQ0g7QUFDSjs7QUFDRCxTQUFPLElBQVA7QUFDSCxDQVZEOztBQVdBLElBQU1DLFFBQVEsR0FBRyxTQUFYQSxRQUFXLENBQUNYLElBQUQsRUFBUTtBQUNyQixNQUFNWSxLQUFLLEdBQUdkLENBQUMsQ0FBQyxTQUFELENBQWY7QUFDQUEsR0FBQyxDQUFDYyxLQUFLLENBQUNaLElBQUQsQ0FBTixDQUFELENBQWVhLFdBQWYsQ0FBMkIsUUFBM0IsRUFBcUNDLFFBQXJDLENBQThDLGVBQTlDO0FBQ0gsQ0FIRDs7QUFJQSxJQUFNQyxRQUFRLEdBQUcsU0FBWEEsUUFBVyxHQUFJO0FBQ2pCLE1BQUlDLFdBQVcsR0FBR2xCLENBQUMsQ0FBQyxnQkFBRCxDQUFuQjtBQUNBQSxHQUFDLENBQUNrQixXQUFELENBQUQsQ0FBZUgsV0FBZixDQUEyQixlQUEzQixFQUE0Q0MsUUFBNUMsQ0FBcUQsUUFBckQ7QUFDQWQsTUFBSSxJQUFJLENBQVI7QUFDQVcsVUFBUSxDQUFDWCxJQUFELENBQVI7QUFDSCxDQUxEOztBQU1BLElBQU1pQixRQUFRLEdBQUcsU0FBWEEsUUFBVyxHQUFJO0FBQ2pCLE1BQUlELFdBQVcsR0FBR2xCLENBQUMsQ0FBQyxnQkFBRCxDQUFuQjtBQUNBQSxHQUFDLENBQUNrQixXQUFELENBQUQsQ0FBZUgsV0FBZixDQUEyQixlQUEzQixFQUE0Q0MsUUFBNUMsQ0FBcUQsUUFBckQ7QUFDQWQsTUFBSSxJQUFJLENBQVI7QUFDQVcsVUFBUSxDQUFDWCxJQUFELENBQVI7QUFDSCxDQUxEOztBQU1BRixDQUFDLENBQUNLLFFBQUQsQ0FBRCxDQUFZZSxLQUFaLENBQWtCLFlBQVc7QUFDekJQLFVBQVEsQ0FBQyxDQUFELENBQVI7QUFDQWIsR0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQnFCLEtBQWpCLENBQXVCLFlBQVc7QUFDOUIsUUFBTVAsS0FBSyxHQUFHZCxDQUFDLENBQUMsU0FBRCxDQUFmOztBQUNBLFFBQUdFLElBQUksR0FBR1ksS0FBSyxDQUFDSixNQUFiLElBQXVCUCxTQUFTLEVBQW5DLEVBQXVDO0FBQ25DYyxjQUFRO0FBQ1JqQixPQUFDLENBQUMsV0FBRCxDQUFELENBQWVzQixHQUFmLENBQW1CO0FBQ2ZDLGVBQU8sRUFBRTtBQURNLE9BQW5CO0FBR0g7O0FBQ0QsUUFBR3JCLElBQUksSUFBSVksS0FBSyxDQUFDSixNQUFqQixFQUF3QjtBQUNwQlYsT0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQndCLElBQWpCLENBQXNCLE1BQXRCLEVBQThCLFFBQTlCLEVBQXdDQyxJQUF4QyxDQUE2QyxTQUE3QztBQUNIO0FBQ0osR0FYRDtBQVlBekIsR0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFlcUIsS0FBZixDQUFxQixZQUFXO0FBQzVCLFFBQUduQixJQUFJLEdBQUcsQ0FBVixFQUFhO0FBQ1RpQixjQUFRO0FBQ1g7O0FBQ0QsUUFBR2pCLElBQUksS0FBSyxDQUFaLEVBQWM7QUFDVkYsT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRc0IsR0FBUixDQUFZO0FBQ1JDLGVBQU8sRUFBRTtBQURELE9BQVo7QUFHSDtBQUNKLEdBVEQ7QUFXSCxDQXpCRCxFIiwiZmlsZSI6Il9fZm9ybV9zdGVwX2hhbmRsZXIuanMiLCJzb3VyY2VzQ29udGVudCI6WyJsZXQgJCA9IHJlcXVpcmUoJ2pxdWVyeScpO1xyXG5sZXQgYkNwdCA9IDA7XHJcblxyXG5jb25zdCB2YWxpZGF0b3IgPSAoKT0+e1xyXG4gICAgY29uc3QgYmxvY19hY3RpdmUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuX19ibG9jX2FjdGl2ZScpO1xyXG4gICAgbGV0IGZpZWxkcyA9IGJsb2NfYWN0aXZlLnF1ZXJ5U2VsZWN0b3JBbGwoJ2lucHV0W3R5cGU9dGV4dF0sIGlucHV0W3R5cGU9dGVsXScpO1xyXG4gICAgZm9yKGxldCBmaWVsZD0wOyBmaWVsZDxmaWVsZHMubGVuZ3RoOyBmaWVsZCsrKXtcclxuICAgICAgICBpZigkKGZpZWxkc1tmaWVsZF0pLnZhbCgpID09PSBcIlwiKSB7XHJcbiAgICAgICAgICAgICQoZmllbGRzW2ZpZWxkXSkuZm9jdXMoKVxyXG4gICAgICAgICAgICByZXR1cm4gZmFsc2VcclxuICAgICAgICB9XHJcbiAgICB9XHJcbiAgICByZXR1cm4gdHJ1ZTtcclxufVxyXG5jb25zdCBzaG93QmxvYyA9IChiQ3B0KT0+e1xyXG4gICAgY29uc3QgYmxvY3MgPSAkKFwiLl9fYmxvY1wiKTtcclxuICAgICQoYmxvY3NbYkNwdF0pLnJlbW92ZUNsYXNzKCdfX2Jsb2MnKS5hZGRDbGFzcygnX19ibG9jX2FjdGl2ZScpO1xyXG59XHJcbmNvbnN0IG5leHRCbG9jID0gKCk9PntcclxuICAgIGxldCBhY3RpdmVfYmxvYyA9ICQoJy5fX2Jsb2NfYWN0aXZlJyk7XHJcbiAgICAkKGFjdGl2ZV9ibG9jKS5yZW1vdmVDbGFzcygnX19ibG9jX2FjdGl2ZScpLmFkZENsYXNzKCdfX2Jsb2MnKVxyXG4gICAgYkNwdCArPSAxXHJcbiAgICBzaG93QmxvYyhiQ3B0KTtcclxufVxyXG5jb25zdCBwcmV2QmxvYyA9ICgpPT57XHJcbiAgICBsZXQgYWN0aXZlX2Jsb2MgPSAkKCcuX19ibG9jX2FjdGl2ZScpO1xyXG4gICAgJChhY3RpdmVfYmxvYykucmVtb3ZlQ2xhc3MoJ19fYmxvY19hY3RpdmUnKS5hZGRDbGFzcygnX19ibG9jJylcclxuICAgIGJDcHQgLT0gMVxyXG4gICAgc2hvd0Jsb2MoYkNwdCk7XHJcbn1cclxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCl7XHJcbiAgICBzaG93QmxvYygwKVxyXG4gICAgJChcIiNzdWJtaXRfYnRuXCIpLmNsaWNrKGZ1bmN0aW9uICgpe1xyXG4gICAgICAgIGNvbnN0IGJsb2NzID0gJChcIi5fX2Jsb2NcIik7XHJcbiAgICAgICAgaWYoYkNwdCA8IGJsb2NzLmxlbmd0aCAmJiB2YWxpZGF0b3IoKSkge1xyXG4gICAgICAgICAgICBuZXh0QmxvYygpO1xyXG4gICAgICAgICAgICAkKFwiI3ByZXZfYnRuXCIpLmNzcyh7XHJcbiAgICAgICAgICAgICAgICBkaXNwbGF5OiAnYmxvY2snXHJcbiAgICAgICAgICAgIH0pXHJcbiAgICAgICAgfVxyXG4gICAgICAgIGlmKGJDcHQgPj0gYmxvY3MubGVuZ3RoKXtcclxuICAgICAgICAgICAgJChcIiNzdWJtaXRfYnRuXCIpLmF0dHIoJ3R5cGUnLCAnc3VibWl0JykuaHRtbCgnQWpvdXRlcicpO1xyXG4gICAgICAgIH1cclxuICAgIH0pXHJcbiAgICAkKFwiI3ByZXZfYnRuXCIpLmNsaWNrKGZ1bmN0aW9uICgpe1xyXG4gICAgICAgIGlmKGJDcHQgPiAwKSB7XHJcbiAgICAgICAgICAgIHByZXZCbG9jKCk7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIGlmKGJDcHQgPT09IDApe1xyXG4gICAgICAgICAgICAkKHRoaXMpLmNzcyh7XHJcbiAgICAgICAgICAgICAgICBkaXNwbGF5OiAnbm9uZSdcclxuICAgICAgICAgICAgfSlcclxuICAgICAgICB9XHJcbiAgICB9KVxyXG5cclxufSkiXSwic291cmNlUm9vdCI6IiJ9