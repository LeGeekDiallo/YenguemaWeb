(self["webpackChunk"] = self["webpackChunk"] || []).push([["delete_image"],{

/***/ "./assets/javascript/delete_image.js":
/*!*******************************************!*\
  !*** ./assets/javascript/delete_image.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! regenerator-runtime/runtime.js */ "./node_modules/regenerator-runtime/runtime.js");

__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");

__webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

var errorNbImages = $("#img_number_error");
var nbImagesToLoad = errorNbImages.data('nbimagestoload');

var askForDelete = /*#__PURE__*/function () {
  var _ref = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee(targetUrl, imageComponent) {
    var request, response, state;
    return regeneratorRuntime.wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            request = {
              method: 'POST',
              headers: {
                "Content-Type": "application/json"
              }
            };
            _context.next = 3;
            return fetch(targetUrl, request);

          case 3:
            response = _context.sent;

            if (!response.ok) {
              _context.next = 9;
              break;
            }

            _context.next = 7;
            return response.json();

          case 7:
            state = _context.sent;

            if (state.status === 'Ok') {
              imageComponent.remove();
              nbImagesToLoad = 4 - state.nb_images;
            }

          case 9:
          case "end":
            return _context.stop();
        }
      }
    }, _callee);
  }));

  return function askForDelete(_x, _x2) {
    return _ref.apply(this, arguments);
  };
}();

var askForRemoveService = /*#__PURE__*/function () {
  var _ref2 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee2(targetUrl, serviceComponent) {
    var request, response, state;
    return regeneratorRuntime.wrap(function _callee2$(_context2) {
      while (1) {
        switch (_context2.prev = _context2.next) {
          case 0:
            request = {
              method: 'POST',
              headers: {
                "Content-Type": "application/json"
              }
            };
            _context2.next = 3;
            return fetch(targetUrl, request);

          case 3:
            response = _context2.sent;

            if (!response.ok) {
              _context2.next = 9;
              break;
            }

            _context2.next = 7;
            return response.json();

          case 7:
            state = _context2.sent;

            if (state.status === 'Ok') {
              serviceComponent.remove();
            }

          case 9:
          case "end":
            return _context2.stop();
        }
      }
    }, _callee2);
  }));

  return function askForRemoveService(_x3, _x4) {
    return _ref2.apply(this, arguments);
  };
}();

var imageNumberControl = function imageNumberControl() {
  $("#activity_form_activityImages").change(function () {
    if (nbImagesToLoad === 0) {
      errorNbImages.html("Nombre total d'images atteint, supprimer pour ajouter de nouvelles !").css({
        'fontFamily': 'Ubuntu',
        'color': '#e50b0b'
      });
      $("#act_validate_btn").attr('type', 'button');
    } else {
      if (this.files.length > nbImagesToLoad) {
        errorNbImages.html("".concat(nbImagesToLoad, " images au maximum")).css({
          'fontFamily': 'Ubuntu',
          'color': '#e50b0b'
        });
        $("#act_validate_btn").attr('type', 'button');
      } else {
        $("#act_validate_btn").attr('type', 'submit');
        errorNbImages.html("");
      }
    }
  });
};

$(document).ready(function () {
  $('.delete_btn').click(function () {
    var targetUrl = $(this).data('urldelete');
    var image = $("#img" + $(this).data('number'));
    askForDelete(targetUrl, image);
  });
  imageNumberControl();
  $('.delete_service_btn').click(function () {
    var targetUrl = $(this).data('urldelete');
    var service = $("#service" + $(this).data('number'));
    askForRemoveService(targetUrl, service);
  });
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ "use strict";
/******/ 
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_engine-user-agent_js-node_modules_core-js_internals_ex-b41e05","vendors-node_modules_core-js_modules_es_object_to-string_js-node_modules_core-js_modules_es_p-2a1352","vendors-node_modules_regenerator-runtime_runtime_js"], () => (__webpack_exec__("./assets/javascript/delete_image.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9kZWxldGVfaW1hZ2UuanMiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJlcnJvck5iSW1hZ2VzIiwibmJJbWFnZXNUb0xvYWQiLCJkYXRhIiwiYXNrRm9yRGVsZXRlIiwidGFyZ2V0VXJsIiwiaW1hZ2VDb21wb25lbnQiLCJyZXF1ZXN0IiwibWV0aG9kIiwiaGVhZGVycyIsImZldGNoIiwicmVzcG9uc2UiLCJvayIsImpzb24iLCJzdGF0ZSIsInN0YXR1cyIsInJlbW92ZSIsIm5iX2ltYWdlcyIsImFza0ZvclJlbW92ZVNlcnZpY2UiLCJzZXJ2aWNlQ29tcG9uZW50IiwiaW1hZ2VOdW1iZXJDb250cm9sIiwiY2hhbmdlIiwiaHRtbCIsImNzcyIsImF0dHIiLCJmaWxlcyIsImxlbmd0aCIsImRvY3VtZW50IiwicmVhZHkiLCJjbGljayIsImltYWdlIiwic2VydmljZSJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUEsSUFBTUEsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWpCOztBQUNBLElBQU1DLGFBQWEsR0FBR0YsQ0FBQyxDQUFDLG1CQUFELENBQXZCO0FBQ0EsSUFBSUcsY0FBYyxHQUFHRCxhQUFhLENBQUNFLElBQWQsQ0FBbUIsZ0JBQW5CLENBQXJCOztBQUNBLElBQU1DLFlBQVk7QUFBQSxxRUFBRyxpQkFBT0MsU0FBUCxFQUFrQkMsY0FBbEI7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQ1hDLG1CQURXLEdBQ0Q7QUFDWkMsb0JBQU0sRUFBRSxNQURJO0FBRVpDLHFCQUFPLEVBQUc7QUFBRSxnQ0FBZ0I7QUFBbEI7QUFGRSxhQURDO0FBQUE7QUFBQSxtQkFLTUMsS0FBSyxDQUFDTCxTQUFELEVBQVlFLE9BQVosQ0FMWDs7QUFBQTtBQUtYSSxvQkFMVzs7QUFBQSxpQkFNZEEsUUFBUSxDQUFDQyxFQU5LO0FBQUE7QUFBQTtBQUFBOztBQUFBO0FBQUEsbUJBT09E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WUFBWTtBQUN2QyxRQUFJeEIsU0FBUyxHQUFHTixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFJLElBQVIsQ0FBYSxXQUFiLENBQWhCO0FBQ0EsUUFBSTRCLE9BQU8sR0FBR2hDLENBQUMsQ0FBQyxhQUFXQSxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFJLElBQVIsQ0FBYSxRQUFiLENBQVosQ0FBZjtBQUNBZSx1QkFBbUIsQ0FBQ2IsU0FBRCxFQUFZMEIsT0FBWixDQUFuQjtBQUNILEdBSkQ7QUFLSCxDQVpELEUiLCJmaWxlIjoiZGVsZXRlX2ltYWdlLmpzIiwic291cmNlc0NvbnRlbnQiOlsiY29uc3QgJCA9IHJlcXVpcmUoJ2pxdWVyeScpXHJcbmNvbnN0IGVycm9yTmJJbWFnZXMgPSAkKFwiI2ltZ19udW1iZXJfZXJyb3JcIik7XHJcbmxldCBuYkltYWdlc1RvTG9hZCA9IGVycm9yTmJJbWFnZXMuZGF0YSgnbmJpbWFnZXN0b2xvYWQnKTtcclxuY29uc3QgYXNrRm9yRGVsZXRlID0gYXN5bmMgKHRhcmdldFVybCwgaW1hZ2VDb21wb25lbnQpPT57XHJcbiAgICBjb25zdCByZXF1ZXN0ID0ge1xyXG4gICAgICAgIG1ldGhvZDogJ1BPU1QnLFxyXG4gICAgICAgIGhlYWRlcnMgOiB7IFwiQ29udGVudC1UeXBlXCI6IFwiYXBwbGljYXRpb24vanNvblwiIH1cclxuICAgIH07XHJcbiAgICBjb25zdCByZXNwb25zZSA9IGF3YWl0IGZldGNoKHRhcmdldFVybCwgcmVxdWVzdCk7XHJcbiAgICBpZihyZXNwb25zZS5vayl7XHJcbiAgICAgICAgY29uc3Qgc3RhdGUgPSBhd2FpdCByZXNwb25zZS5qc29uKCk7XHJcbiAgICAgICAgaWYoc3RhdGUuc3RhdHVzID09PSAnT2snKXtcclxuICAgICAgICAgICAgaW1hZ2VDb21wb25lbnQucmVtb3ZlKCk7XHJcbiAgICAgICAgICAgIG5iSW1hZ2VzVG9Mb2FkID0gNC1zdGF0ZS5uYl9pbWFnZXM7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59XHJcbmNvbnN0IGFza0ZvclJlbW92ZVNlcnZpY2UgPSBhc3luYyAodGFyZ2V0VXJsLCBzZXJ2aWNlQ29tcG9uZW50KT0+e1xyXG4gICAgY29uc3QgcmVxdWVzdCA9IHtcclxuICAgICAgICBtZXRob2Q6ICdQT1NUJyxcclxuICAgICAgICBoZWFkZXJzIDogeyBcIkNvbnRlbnQtVHlwZVwiOiBcImFwcGxpY2F0aW9uL2pzb25cIiB9XHJcbiAgICB9O1xyXG4gICAgY29uc3QgcmVzcG9uc2UgPSBhd2FpdCBmZXRjaCh0YXJnZXRVcmwsIHJlcXVlc3QpO1xyXG4gICAgaWYocmVzcG9uc2Uub2spe1xyXG4gICAgICAgIGNvbnN0IHN0YXRlID0gYXdhaXQgcmVzcG9uc2UuanNvbigpO1xyXG4gICAgICAgIGlmKHN0YXRlLnN0YXR1cyA9PT0gJ09rJyl7XHJcbiAgICAgICAgICAgIHNlcnZpY2VDb21wb25lbnQucmVtb3ZlKCk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59XHJcbmNvbnN0IGltYWdlTnVtYmVyQ29udHJvbCA9ICgpPT57XHJcbiAgICAkKFwiI2FjdGl2aXR5X2Zvcm1fYWN0aXZpdHlJbWFnZXNcIikuY2hhbmdlKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBpZihuYkltYWdlc1RvTG9hZD09PTApe1xyXG4gICAgICAgICAgICBlcnJvck5iSW1hZ2VzLmh0bWwoXCJOb21icmUgdG90YWwgZCdpbWFnZXMgYXR0ZWludCwgc3VwcHJpbWVyIHBvdXIgYWpvdXRlciBkZSBub3V2ZWxsZXMgIVwiKS5jc3Moe1xyXG4gICAgICAgICAgICAgICAgJ2ZvbnRGYW1pbHknOiAnVWJ1bnR1JyxcclxuICAgICAgICAgICAgICAgICdjb2xvcic6ICcjZTUwYjBiJ1xyXG4gICAgICAgICAgICB9KVxyXG4gICAgICAgICAgICAkKFwiI2FjdF92YWxpZGF0ZV9idG5cIikuYXR0cigndHlwZScsICdidXR0b24nKTtcclxuICAgICAgICB9ZWxzZSB7XHJcbiAgICAgICAgICAgIGlmICh0aGlzLmZpbGVzLmxlbmd0aCA+IG5iSW1hZ2VzVG9Mb2FkKSB7XHJcbiAgICAgICAgICAgICAgICBlcnJvck5iSW1hZ2VzLmh0bWwoYCR7bmJJbWFnZXNUb0xvYWR9IGltYWdlcyBhdSBtYXhpbXVtYCkuY3NzKHtcclxuICAgICAgICAgICAgICAgICAgICAnZm9udEZhbWlseSc6ICdVYnVudHUnLFxyXG4gICAgICAgICAgICAgICAgICAgICdjb2xvcic6ICcjZTUwYjBiJ1xyXG4gICAgICAgICAgICAgICAgfSlcclxuICAgICAgICAgICAgICAgICQoXCIjYWN0X3ZhbGlkYXRlX2J0blwiKS5hdHRyKCd0eXBlJywgJ2J1dHRvbicpXHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAkKFwiI2FjdF92YWxpZGF0ZV9idG5cIikuYXR0cigndHlwZScsICdzdWJtaXQnKTtcclxuICAgICAgICAgICAgICAgIGVycm9yTmJJbWFnZXMuaHRtbChcIlwiKVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfSlcclxufVxyXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKXtcclxuICAgICQoJy5kZWxldGVfYnRuJykuY2xpY2soZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGxldCB0YXJnZXRVcmwgPSAkKHRoaXMpLmRhdGEoJ3VybGRlbGV0ZScpO1xyXG4gICAgICAgIGxldCBpbWFnZSA9ICQoXCIjaW1nXCIrJCh0aGlzKS5kYXRhKCdudW1iZXInKSk7XHJcbiAgICAgICAgYXNrRm9yRGVsZXRlKHRhcmdldFVybCwgaW1hZ2UpO1xyXG4gICAgfSlcclxuICAgIGltYWdlTnVtYmVyQ29udHJvbCgpO1xyXG4gICAgJCgnLmRlbGV0ZV9zZXJ2aWNlX2J0bicpLmNsaWNrKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBsZXQgdGFyZ2V0VXJsID0gJCh0aGlzKS5kYXRhKCd1cmxkZWxldGUnKTtcclxuICAgICAgICBsZXQgc2VydmljZSA9ICQoXCIjc2VydmljZVwiKyQodGhpcykuZGF0YSgnbnVtYmVyJykpO1xyXG4gICAgICAgIGFza0ZvclJlbW92ZVNlcnZpY2UodGFyZ2V0VXJsLCBzZXJ2aWNlKTtcclxuICAgIH0pXHJcbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==