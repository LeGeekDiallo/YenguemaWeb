(self["webpackChunk"] = self["webpackChunk"] || []).push([["__taxiDriverState"],{

/***/ "./assets/javascript/taxi/stateHandler.js":
/*!************************************************!*\
  !*** ./assets/javascript/taxi/stateHandler.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");

__webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");

__webpack_require__(/*! regenerator-runtime/runtime.js */ "./node_modules/regenerator-runtime/runtime.js");

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

var askForSwitchState = /*#__PURE__*/function () {
  var _ref = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee(targetUrl) {
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

            if (state.state === true) {
              $("#__taxi_availability").css({
                backgroundColor: "#ecf30c",
                color: "black",
                fontFamily: "Ubuntu"
              });
            } else {
              $("#__taxi_availability").css({
                backgroundColor: "#0D47A1",
                color: "white",
                fontFamily: "Ubuntu"
              });
            }

          case 9:
          case "end":
            return _context.stop();
        }
      }
    }, _callee);
  }));

  return function askForSwitchState(_x) {
    return _ref.apply(this, arguments);
  };
}();

$(document).ready(function () {
  $("#__taxi_availability").click(function () {
    var url = $(this).data('url');
    $(this).data('state', 'true');
    askForSwitchState(url);
  });
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ "use strict";
/******/ 
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_engine-user-agent_js-node_modules_core-js_internals_ex-b41e05","vendors-node_modules_core-js_modules_es_object_to-string_js-node_modules_core-js_modules_es_p-2a1352","vendors-node_modules_regenerator-runtime_runtime_js"], () => (__webpack_exec__("./assets/javascript/taxi/stateHandler.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC90YXhpL3N0YXRlSGFuZGxlci5qcyJdLCJuYW1lcyI6WyIkIiwicmVxdWlyZSIsImFza0ZvclN3aXRjaFN0YXRlIiwidGFyZ2V0VXJsIiwicmVxdWVzdCIsIm1ldGhvZCIsImhlYWRlcnMiLCJmZXRjaCIsInJlc3BvbnNlIiwib2siLCJqc29uIiwic3RhdGUiLCJjc3MiLCJiYWNrZ3JvdW5kQ29sb3IiLCJjb2xvciIsImZvbnRGYW1pbHkiLCJkb2N1bWVudCIsInJlYWR5IiwiY2xpY2siLCJ1cmwiLCJkYXRhIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQSxJQUFJQSxDQUFDLEdBQUdDLG1CQUFPLENBQUMsb0RBQUQsQ0FBZjs7QUFFQSxJQUFNQyxpQkFBaUI7QUFBQSxxRUFBRyxpQkFBT0MsU0FBUDtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDaEJDLG1CQURnQixHQUNOO0FBQ1pDLG9CQUFNLEVBQUUsTUFESTtBQUVaQyxxQkFBTyxFQUFHO0FBQUUsZ0NBQWdCO0FBQWxCO0FBRkUsYUFETTtBQUFBO0FBQUEsbUJBS0NDLEtBQUssQ0FBQ0osU0FBRCxFQUFZQyxPQUFaLENBTE47O0FBQUE7QUFLaEJJLG9CQUxnQjs7QUFBQSxpQkFNbkJBLFFBQVEsQ0FBQ0MsRUFOVTtBQUFBO0FBQUE7QUFBQTs7QUFBQTtBQUFBLG1CQU9FRCxRQUFRLENBQUNFLElBQVQsRUFQRjs7QUFBQTtBQU9aQyxpQkFQWTs7QUFRbEIsZ0JBQUdBLEtBQUssQ0FBQ0EsS0FBTixLQUFnQixJQUFuQixFQUF3QjtBQUNwQlgsZUFBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJZLEdBQTFCLENBQThCO0FBQzFCQywrQkFBZSxFQUFFLFNBRFM7QUFFMUJDLHFCQUFLLEVBQUUsT0FGbUI7QUFHMUJDLDBCQUFVLEVBQUU7QUFIYyxlQUE5QjtBQUtILGFBTkQsTUFNSztBQUNEZixlQUFDLENBQUMsc0JBQUQsQ0FBRCxDQUEwQlksR0FBMUIsQ0FBOEI7QUFDMUJDLCtCQUFlLEVBQUUsU0FEUztBQUUxQkMscUJBQUssRUFBRSxPQUZtQjtBQUcxQkMsMEJBQVUsRUFBRTtBQUhjLGVBQTlCO0FBS0g7O0FBcEJpQjtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQSxHQUFIOztBQUFBLGtCQUFqQmIsaUJBQWlCO0FBQUE7QUFBQTtBQUFBLEdBQXZCOztBQXlCQUYsQ0FBQyxDQUFDZ0IsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBSTtBQUNsQmpCLEdBQUMsQ0FBQyxzQkFBRCxDQUFELENBQTBCa0IsS0FBMUIsQ0FBZ0MsWUFBVztBQUN2QyxRQUFNQyxHQUFHLEdBQUduQixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFvQixJQUFSLENBQWEsS0FBYixDQUFaO0FBQ0FwQixLQUFDLENBQUMsSUFBRCxDQUFELENBQVFvQixJQUFSLENBQWEsT0FBYixFQUFzQixNQUF0QjtBQUNBbEIscUJBQWlCLENBQUNpQixHQUFELENBQWpCO0FBQ0gsR0FKRDtBQUtILENBTkQsRSIsImZpbGUiOiJfX3RheGlEcml2ZXJTdGF0ZS5qcyIsInNvdXJjZXNDb250ZW50IjpbImxldCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XHJcblxyXG5jb25zdCBhc2tGb3JTd2l0Y2hTdGF0ZSA9IGFzeW5jICh0YXJnZXRVcmwpPT57XHJcbiAgICBjb25zdCByZXF1ZXN0ID0ge1xyXG4gICAgICAgIG1ldGhvZDogJ1BPU1QnLFxyXG4gICAgICAgIGhlYWRlcnMgOiB7IFwiQ29udGVudC1UeXBlXCI6IFwiYXBwbGljYXRpb24vanNvblwiIH1cclxuICAgIH07XHJcbiAgICBjb25zdCByZXNwb25zZSA9IGF3YWl0IGZldGNoKHRhcmdldFVybCwgcmVxdWVzdCk7XHJcbiAgICBpZihyZXNwb25zZS5vayl7XHJcbiAgICAgICAgY29uc3Qgc3RhdGUgPSBhd2FpdCByZXNwb25zZS5qc29uKCk7XHJcbiAgICAgICAgaWYoc3RhdGUuc3RhdGUgPT09IHRydWUpe1xyXG4gICAgICAgICAgICAkKFwiI19fdGF4aV9hdmFpbGFiaWxpdHlcIikuY3NzKHtcclxuICAgICAgICAgICAgICAgIGJhY2tncm91bmRDb2xvcjogXCIjZWNmMzBjXCIsXHJcbiAgICAgICAgICAgICAgICBjb2xvcjogXCJibGFja1wiLFxyXG4gICAgICAgICAgICAgICAgZm9udEZhbWlseTogXCJVYnVudHVcIlxyXG4gICAgICAgICAgICB9KVxyXG4gICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAkKFwiI19fdGF4aV9hdmFpbGFiaWxpdHlcIikuY3NzKHtcclxuICAgICAgICAgICAgICAgIGJhY2tncm91bmRDb2xvcjogXCIjMEQ0N0ExXCIsXHJcbiAgICAgICAgICAgICAgICBjb2xvcjogXCJ3aGl0ZVwiLFxyXG4gICAgICAgICAgICAgICAgZm9udEZhbWlseTogXCJVYnVudHVcIlxyXG4gICAgICAgICAgICB9KVxyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbn1cclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KCgpPT57XHJcbiAgICAkKFwiI19fdGF4aV9hdmFpbGFiaWxpdHlcIikuY2xpY2soZnVuY3Rpb24gKCl7XHJcbiAgICAgICAgY29uc3QgdXJsID0gJCh0aGlzKS5kYXRhKCd1cmwnKTtcclxuICAgICAgICAkKHRoaXMpLmRhdGEoJ3N0YXRlJywgJ3RydWUnKVxyXG4gICAgICAgIGFza0ZvclN3aXRjaFN0YXRlKHVybCk7XHJcbiAgICB9KVxyXG59KSJdLCJzb3VyY2VSb290IjoiIn0=