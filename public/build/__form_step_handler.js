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
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js"], () => (__webpack_exec__("./assets/javascript/realEstate/formStepHandler.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiX19mb3JtX3N0ZXBfaGFuZGxlci5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7OztBQUFBLElBQUlBLENBQUMsR0FBR0MsbUJBQU8sQ0FBQyxvREFBRCxDQUFmOztBQUNBLElBQUlDLElBQUksR0FBRyxDQUFYOztBQUVBLElBQU1DLFNBQVMsR0FBRyxTQUFaQSxTQUFZLEdBQUk7RUFDbEIsSUFBTUMsV0FBVyxHQUFHQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsZ0JBQXZCLENBQXBCO0VBQ0EsSUFBSUMsTUFBTSxHQUFHSCxXQUFXLENBQUNJLGdCQUFaLENBQTZCLG1DQUE3QixDQUFiOztFQUNBLEtBQUksSUFBSUMsS0FBSyxHQUFDLENBQWQsRUFBaUJBLEtBQUssR0FBQ0YsTUFBTSxDQUFDRyxNQUE5QixFQUFzQ0QsS0FBSyxFQUEzQyxFQUE4QztJQUMxQyxJQUFHVCxDQUFDLENBQUNPLE1BQU0sQ0FBQ0UsS0FBRCxDQUFQLENBQUQsQ0FBaUJFLEdBQWpCLE9BQTJCLEVBQTlCLEVBQWtDO01BQzlCWCxDQUFDLENBQUNPLE1BQU0sQ0FBQ0UsS0FBRCxDQUFQLENBQUQsQ0FBaUJHLEtBQWpCO01BQ0EsT0FBTyxLQUFQO0lBQ0g7RUFDSjs7RUFDRCxPQUFPLElBQVA7QUFDSCxDQVZEOztBQVdBLElBQU1DLFFBQVEsR0FBRyxTQUFYQSxRQUFXLENBQUNYLElBQUQsRUFBUTtFQUNyQixJQUFNWSxLQUFLLEdBQUdkLENBQUMsQ0FBQyxTQUFELENBQWY7RUFDQUEsQ0FBQyxDQUFDYyxLQUFLLENBQUNaLElBQUQsQ0FBTixDQUFELENBQWVhLFdBQWYsQ0FBMkIsUUFBM0IsRUFBcUNDLFFBQXJDLENBQThDLGVBQTlDO0FBQ0gsQ0FIRDs7QUFJQSxJQUFNQyxRQUFRLEdBQUcsU0FBWEEsUUFBVyxHQUFJO0VBQ2pCLElBQUlDLFdBQVcsR0FBR2xCLENBQUMsQ0FBQyxnQkFBRCxDQUFuQjtFQUNBQSxDQUFDLENBQUNrQixXQUFELENBQUQsQ0FBZUgsV0FBZixDQUEyQixlQUEzQixFQUE0Q0MsUUFBNUMsQ0FBcUQsUUFBckQ7RUFDQWQsSUFBSSxJQUFJLENBQVI7RUFDQVcsUUFBUSxDQUFDWCxJQUFELENBQVI7QUFDSCxDQUxEOztBQU1BLElBQU1pQixRQUFRLEdBQUcsU0FBWEEsUUFBVyxHQUFJO0VBQ2pCLElBQUlELFdBQVcsR0FBR2xCLENBQUMsQ0FBQyxnQkFBRCxDQUFuQjtFQUNBQSxDQUFDLENBQUNrQixXQUFELENBQUQsQ0FBZUgsV0FBZixDQUEyQixlQUEzQixFQUE0Q0MsUUFBNUMsQ0FBcUQsUUFBckQ7RUFDQWQsSUFBSSxJQUFJLENBQVI7RUFDQVcsUUFBUSxDQUFDWCxJQUFELENBQVI7QUFDSCxDQUxEOztBQU1BRixDQUFDLENBQUNLLFFBQUQsQ0FBRCxDQUFZZSxLQUFaLENBQWtCLFlBQVc7RUFDekJQLFFBQVEsQ0FBQyxDQUFELENBQVI7RUFDQWIsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQnFCLEtBQWpCLENBQXVCLFlBQVc7SUFDOUIsSUFBTVAsS0FBSyxHQUFHZCxDQUFDLENBQUMsU0FBRCxDQUFmOztJQUNBLElBQUdFLElBQUksR0FBR1ksS0FBSyxDQUFDSixNQUFiLElBQXVCUCxTQUFTLEVBQW5DLEVBQXVDO01BQ25DYyxRQUFRO01BQ1JqQixDQUFDLENBQUMsV0FBRCxDQUFELENBQWVzQixHQUFmLENBQW1CO1FBQ2ZDLE9BQU8sRUFBRTtNQURNLENBQW5CO0lBR0g7O0lBQ0QsSUFBR3JCLElBQUksSUFBSVksS0FBSyxDQUFDSixNQUFqQixFQUF3QjtNQUNwQlYsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQndCLElBQWpCLENBQXNCLE1BQXRCLEVBQThCLFFBQTlCLEVBQXdDQyxJQUF4QyxDQUE2QyxTQUE3QztJQUNIO0VBQ0osQ0FYRDtFQVlBekIsQ0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFlcUIsS0FBZixDQUFxQixZQUFXO0lBQzVCLElBQUduQixJQUFJLEdBQUcsQ0FBVixFQUFhO01BQ1RpQixRQUFRO0lBQ1g7O0lBQ0QsSUFBR2pCLElBQUksS0FBSyxDQUFaLEVBQWM7TUFDVkYsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRc0IsR0FBUixDQUFZO1FBQ1JDLE9BQU8sRUFBRTtNQURELENBQVo7SUFHSDtFQUNKLENBVEQ7QUFXSCxDQXpCRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qYXZhc2NyaXB0L3JlYWxFc3RhdGUvZm9ybVN0ZXBIYW5kbGVyLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImxldCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XG5sZXQgYkNwdCA9IDA7XG5cbmNvbnN0IHZhbGlkYXRvciA9ICgpPT57XG4gICAgY29uc3QgYmxvY19hY3RpdmUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuX19ibG9jX2FjdGl2ZScpO1xuICAgIGxldCBmaWVsZHMgPSBibG9jX2FjdGl2ZS5xdWVyeVNlbGVjdG9yQWxsKCdpbnB1dFt0eXBlPXRleHRdLCBpbnB1dFt0eXBlPXRlbF0nKTtcbiAgICBmb3IobGV0IGZpZWxkPTA7IGZpZWxkPGZpZWxkcy5sZW5ndGg7IGZpZWxkKyspe1xuICAgICAgICBpZigkKGZpZWxkc1tmaWVsZF0pLnZhbCgpID09PSBcIlwiKSB7XG4gICAgICAgICAgICAkKGZpZWxkc1tmaWVsZF0pLmZvY3VzKClcbiAgICAgICAgICAgIHJldHVybiBmYWxzZVxuICAgICAgICB9XG4gICAgfVxuICAgIHJldHVybiB0cnVlO1xufVxuY29uc3Qgc2hvd0Jsb2MgPSAoYkNwdCk9PntcbiAgICBjb25zdCBibG9jcyA9ICQoXCIuX19ibG9jXCIpO1xuICAgICQoYmxvY3NbYkNwdF0pLnJlbW92ZUNsYXNzKCdfX2Jsb2MnKS5hZGRDbGFzcygnX19ibG9jX2FjdGl2ZScpO1xufVxuY29uc3QgbmV4dEJsb2MgPSAoKT0+e1xuICAgIGxldCBhY3RpdmVfYmxvYyA9ICQoJy5fX2Jsb2NfYWN0aXZlJyk7XG4gICAgJChhY3RpdmVfYmxvYykucmVtb3ZlQ2xhc3MoJ19fYmxvY19hY3RpdmUnKS5hZGRDbGFzcygnX19ibG9jJylcbiAgICBiQ3B0ICs9IDFcbiAgICBzaG93QmxvYyhiQ3B0KTtcbn1cbmNvbnN0IHByZXZCbG9jID0gKCk9PntcbiAgICBsZXQgYWN0aXZlX2Jsb2MgPSAkKCcuX19ibG9jX2FjdGl2ZScpO1xuICAgICQoYWN0aXZlX2Jsb2MpLnJlbW92ZUNsYXNzKCdfX2Jsb2NfYWN0aXZlJykuYWRkQ2xhc3MoJ19fYmxvYycpXG4gICAgYkNwdCAtPSAxXG4gICAgc2hvd0Jsb2MoYkNwdCk7XG59XG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKXtcbiAgICBzaG93QmxvYygwKVxuICAgICQoXCIjc3VibWl0X2J0blwiKS5jbGljayhmdW5jdGlvbiAoKXtcbiAgICAgICAgY29uc3QgYmxvY3MgPSAkKFwiLl9fYmxvY1wiKTtcbiAgICAgICAgaWYoYkNwdCA8IGJsb2NzLmxlbmd0aCAmJiB2YWxpZGF0b3IoKSkge1xuICAgICAgICAgICAgbmV4dEJsb2MoKTtcbiAgICAgICAgICAgICQoXCIjcHJldl9idG5cIikuY3NzKHtcbiAgICAgICAgICAgICAgICBkaXNwbGF5OiAnYmxvY2snXG4gICAgICAgICAgICB9KVxuICAgICAgICB9XG4gICAgICAgIGlmKGJDcHQgPj0gYmxvY3MubGVuZ3RoKXtcbiAgICAgICAgICAgICQoXCIjc3VibWl0X2J0blwiKS5hdHRyKCd0eXBlJywgJ3N1Ym1pdCcpLmh0bWwoJ0Fqb3V0ZXInKTtcbiAgICAgICAgfVxuICAgIH0pXG4gICAgJChcIiNwcmV2X2J0blwiKS5jbGljayhmdW5jdGlvbiAoKXtcbiAgICAgICAgaWYoYkNwdCA+IDApIHtcbiAgICAgICAgICAgIHByZXZCbG9jKCk7XG4gICAgICAgIH1cbiAgICAgICAgaWYoYkNwdCA9PT0gMCl7XG4gICAgICAgICAgICAkKHRoaXMpLmNzcyh7XG4gICAgICAgICAgICAgICAgZGlzcGxheTogJ25vbmUnXG4gICAgICAgICAgICB9KVxuICAgICAgICB9XG4gICAgfSlcblxufSkiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJiQ3B0IiwidmFsaWRhdG9yIiwiYmxvY19hY3RpdmUiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJmaWVsZHMiLCJxdWVyeVNlbGVjdG9yQWxsIiwiZmllbGQiLCJsZW5ndGgiLCJ2YWwiLCJmb2N1cyIsInNob3dCbG9jIiwiYmxvY3MiLCJyZW1vdmVDbGFzcyIsImFkZENsYXNzIiwibmV4dEJsb2MiLCJhY3RpdmVfYmxvYyIsInByZXZCbG9jIiwicmVhZHkiLCJjbGljayIsImNzcyIsImRpc3BsYXkiLCJhdHRyIiwiaHRtbCJdLCJzb3VyY2VSb290IjoiIn0=