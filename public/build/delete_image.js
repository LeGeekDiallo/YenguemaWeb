(self["webpackChunk"] = self["webpackChunk"] || []).push([["delete_image"],{

/***/ "./assets/javascript/delete_image.js":
/*!*******************************************!*\
  !*** ./assets/javascript/delete_image.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return generator._invoke = function (innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; }(innerFn, self, context), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; this._invoke = function (method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); }; } function maybeInvokeDelegate(delegate, context) { var method = delegate.iterator[context.method]; if (undefined === method) { if (context.delegate = null, "throw" === context.method) { if (delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method)) return ContinueSentinel; context.method = "throw", context.arg = new TypeError("The iterator does not provide a 'throw' method"); } return ContinueSentinel; } var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, define(Gp, "constructor", GeneratorFunctionPrototype), define(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (object) { var keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }

__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");

__webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");

__webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");

__webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");

__webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");

__webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");

__webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");

__webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");

__webpack_require__(/*! core-js/modules/es.symbol.async-iterator.js */ "./node_modules/core-js/modules/es.symbol.async-iterator.js");

__webpack_require__(/*! core-js/modules/es.symbol.to-string-tag.js */ "./node_modules/core-js/modules/es.symbol.to-string-tag.js");

__webpack_require__(/*! core-js/modules/es.json.to-string-tag.js */ "./node_modules/core-js/modules/es.json.to-string-tag.js");

__webpack_require__(/*! core-js/modules/es.math.to-string-tag.js */ "./node_modules/core-js/modules/es.math.to-string-tag.js");

__webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");

__webpack_require__(/*! core-js/modules/es.object.create.js */ "./node_modules/core-js/modules/es.object.create.js");

__webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");

__webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");

__webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");

__webpack_require__(/*! core-js/modules/es.function.name.js */ "./node_modules/core-js/modules/es.function.name.js");

__webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");

__webpack_require__(/*! core-js/modules/es.array.reverse.js */ "./node_modules/core-js/modules/es.array.reverse.js");

__webpack_require__(/*! core-js/modules/es.array.slice.js */ "./node_modules/core-js/modules/es.array.slice.js");

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

var errorNbImages = $("#img_number_error");
var nbImagesToLoad = errorNbImages.data('nbimagestoload');

var askForDelete = /*#__PURE__*/function () {
  var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(targetUrl, imageComponent) {
    var request, response, state;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
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
  var _ref2 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2(targetUrl, serviceComponent) {
    var request, response, state;
    return _regeneratorRuntime().wrap(function _callee2$(_context2) {
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
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_array-slice_js-node_modules_core-js_internals_export_j-4fec76","vendors-node_modules_core-js_modules_es_object_define-property_js-node_modules_core-js_module-74df95","vendors-node_modules_core-js_modules_es_array_for-each_js-node_modules_core-js_modules_es_arr-ba5a86"], () => (__webpack_exec__("./assets/javascript/delete_image.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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Q0FORCxNQU1PO1FBQ0h6QixDQUFDLENBQUMsbUJBQUQsQ0FBRCxDQUF1QnlCLElBQXZCLENBQTRCLE1BQTVCLEVBQW9DLFFBQXBDO1FBQ0F2QixhQUFhLENBQUNxQixJQUFkLENBQW1CLEVBQW5CO01BQ0g7SUFDSjtFQUNKLENBbkJEO0FBb0JILENBckJEOztBQXNCQXZCLENBQUMsQ0FBQzRCLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVc7RUFDekI3QixDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCOEIsS0FBakIsQ0FBdUIsWUFBWTtJQUMvQixJQUFJeEIsU0FBUyxHQUFHTixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFJLElBQVIsQ0FBYSxXQUFiLENBQWhCO0lBQ0EsSUFBSTJCLEtBQUssR0FBRy9CLENBQUMsQ0FBQyxTQUFPQSxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFJLElBQVIsQ0FBYSxRQUFiLENBQVIsQ0FBYjtJQUNBQyxZQUFZLENBQUNDLFNBQUQsRUFBWXlCLEtBQVosQ0FBWjtFQUNILENBSkQ7RUFLQVYsa0JBQWtCO0VBQ2xCckIsQ0FBQyxDQUFDLHFCQUFELENBQUQsQ0FBeUI4QixLQUF6QixDQUErQixZQUFZO0lBQ3ZDLElBQUl4QixTQUFTLEdBQUdOLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUksSUFBUixDQUFhLFdBQWIsQ0FBaEI7SUFDQSxJQUFJNEIsT0FBTyxHQUFHaEMsQ0FBQyxDQUFDLGFBQVdBLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUksSUFBUixDQUFhLFFBQWIsQ0FBWixDQUFmO0lBQ0FlLG1CQUFtQixDQUFDYixTQUFELEVBQVkwQixPQUFaLENBQW5CO0VBQ0gsQ0FKRDtBQUtILENBWkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvamF2YXNjcmlwdC9kZWxldGVfaW1hZ2UuanMiXSwic291cmNlc0NvbnRlbnQiOlsiY29uc3QgJCA9IHJlcXVpcmUoJ2pxdWVyeScpXG5jb25zdCBlcnJvck5iSW1hZ2VzID0gJChcIiNpbWdfbnVtYmVyX2Vycm9yXCIpO1xubGV0IG5iSW1hZ2VzVG9Mb2FkID0gZXJyb3JOYkltYWdlcy5kYXRhKCduYmltYWdlc3RvbG9hZCcpO1xuY29uc3QgYXNrRm9yRGVsZXRlID0gYXN5bmMgKHRhcmdldFVybCwgaW1hZ2VDb21wb25lbnQpPT57XG4gICAgY29uc3QgcmVxdWVzdCA9IHtcbiAgICAgICAgbWV0aG9kOiAnUE9TVCcsXG4gICAgICAgIGhlYWRlcnMgOiB7IFwiQ29udGVudC1UeXBlXCI6IFwiYXBwbGljYXRpb24vanNvblwiIH1cbiAgICB9O1xuICAgIGNvbnN0IHJlc3BvbnNlID0gYXdhaXQgZmV0Y2godGFyZ2V0VXJsLCByZXF1ZXN0KTtcbiAgICBpZihyZXNwb25zZS5vayl7XG4gICAgICAgIGNvbnN0IHN0YXRlID0gYXdhaXQgcmVzcG9uc2UuanNvbigpO1xuICAgICAgICBpZihzdGF0ZS5zdGF0dXMgPT09ICdPaycpe1xuICAgICAgICAgICAgaW1hZ2VDb21wb25lbnQucmVtb3ZlKCk7XG4gICAgICAgICAgICBuYkltYWdlc1RvTG9hZCA9IDQtc3RhdGUubmJfaW1hZ2VzO1xuICAgICAgICB9XG4gICAgfVxufVxuY29uc3QgYXNrRm9yUmVtb3ZlU2VydmljZSA9IGFzeW5jICh0YXJnZXRVcmwsIHNlcnZpY2VDb21wb25lbnQpPT57XG4gICAgY29uc3QgcmVxdWVzdCA9IHtcbiAgICAgICAgbWV0aG9kOiAnUE9TVCcsXG4gICAgICAgIGhlYWRlcnMgOiB7IFwiQ29udGVudC1UeXBlXCI6IFwiYXBwbGljYXRpb24vanNvblwiIH1cbiAgICB9O1xuICAgIGNvbnN0IHJlc3BvbnNlID0gYXdhaXQgZmV0Y2godGFyZ2V0VXJsLCByZXF1ZXN0KTtcbiAgICBpZihyZXNwb25zZS5vayl7XG4gICAgICAgIGNvbnN0IHN0YXRlID0gYXdhaXQgcmVzcG9uc2UuanNvbigpO1xuICAgICAgICBpZihzdGF0ZS5zdGF0dXMgPT09ICdPaycpe1xuICAgICAgICAgICAgc2VydmljZUNvbXBvbmVudC5yZW1vdmUoKTtcbiAgICAgICAgfVxuICAgIH1cbn1cbmNvbnN0IGltYWdlTnVtYmVyQ29udHJvbCA9ICgpPT57XG4gICAgJChcIiNhY3Rpdml0eV9mb3JtX2FjdGl2aXR5SW1hZ2VzXCIpLmNoYW5nZShmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmKG5iSW1hZ2VzVG9Mb2FkPT09MCl7XG4gICAgICAgICAgICBlcnJvck5iSW1hZ2VzLmh0bWwoXCJOb21icmUgdG90YWwgZCdpbWFnZXMgYXR0ZWludCwgc3VwcHJpbWVyIHBvdXIgYWpvdXRlciBkZSBub3V2ZWxsZXMgIVwiKS5jc3Moe1xuICAgICAgICAgICAgICAgICdmb250RmFtaWx5JzogJ1VidW50dScsXG4gICAgICAgICAgICAgICAgJ2NvbG9yJzogJyNlNTBiMGInXG4gICAgICAgICAgICB9KVxuICAgICAgICAgICAgJChcIiNhY3RfdmFsaWRhdGVfYnRuXCIpLmF0dHIoJ3R5cGUnLCAnYnV0dG9uJyk7XG4gICAgICAgIH1lbHNlIHtcbiAgICAgICAgICAgIGlmICh0aGlzLmZpbGVzLmxlbmd0aCA+IG5iSW1hZ2VzVG9Mb2FkKSB7XG4gICAgICAgICAgICAgICAgZXJyb3JOYkltYWdlcy5odG1sKGAke25iSW1hZ2VzVG9Mb2FkfSBpbWFnZXMgYXUgbWF4aW11bWApLmNzcyh7XG4gICAgICAgICAgICAgICAgICAgICdmb250RmFtaWx5JzogJ1VidW50dScsXG4gICAgICAgICAgICAgICAgICAgICdjb2xvcic6ICcjZTUwYjBiJ1xuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgJChcIiNhY3RfdmFsaWRhdGVfYnRuXCIpLmF0dHIoJ3R5cGUnLCAnYnV0dG9uJylcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgJChcIiNhY3RfdmFsaWRhdGVfYnRuXCIpLmF0dHIoJ3R5cGUnLCAnc3VibWl0Jyk7XG4gICAgICAgICAgICAgICAgZXJyb3JOYkltYWdlcy5odG1sKFwiXCIpXG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9KVxufVxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCl7XG4gICAgJCgnLmRlbGV0ZV9idG4nKS5jbGljayhmdW5jdGlvbiAoKSB7XG4gICAgICAgIGxldCB0YXJnZXRVcmwgPSAkKHRoaXMpLmRhdGEoJ3VybGRlbGV0ZScpO1xuICAgICAgICBsZXQgaW1hZ2UgPSAkKFwiI2ltZ1wiKyQodGhpcykuZGF0YSgnbnVtYmVyJykpO1xuICAgICAgICBhc2tGb3JEZWxldGUodGFyZ2V0VXJsLCBpbWFnZSk7XG4gICAgfSlcbiAgICBpbWFnZU51bWJlckNvbnRyb2woKTtcbiAgICAkKCcuZGVsZXRlX3NlcnZpY2VfYnRuJykuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICBsZXQgdGFyZ2V0VXJsID0gJCh0aGlzKS5kYXRhKCd1cmxkZWxldGUnKTtcbiAgICAgICAgbGV0IHNlcnZpY2UgPSAkKFwiI3NlcnZpY2VcIiskKHRoaXMpLmRhdGEoJ251bWJlcicpKTtcbiAgICAgICAgYXNrRm9yUmVtb3ZlU2VydmljZSh0YXJnZXRVcmwsIHNlcnZpY2UpO1xuICAgIH0pXG59KSJdLCJuYW1lcyI6WyIkIiwicmVxdWlyZSIsImVycm9yTmJJbWFnZXMiLCJuYkltYWdlc1RvTG9hZCIsImRhdGEiLCJhc2tGb3JEZWxldGUiLCJ0YXJnZXRVcmwiLCJpbWFnZUNvbXBvbmVudCIsInJlcXVlc3QiLCJtZXRob2QiLCJoZWFkZXJzIiwiZmV0Y2giLCJyZXNwb25zZSIsIm9rIiwianNvbiIsInN0YXRlIiwic3RhdHVzIiwicmVtb3ZlIiwibmJfaW1hZ2VzIiwiYXNrRm9yUmVtb3ZlU2VydmljZSIsInNlcnZpY2VDb21wb25lbnQiLCJpbWFnZU51bWJlckNvbnRyb2wiLCJjaGFuZ2UiLCJodG1sIiwiY3NzIiwiYXR0ciIsImZpbGVzIiwibGVuZ3RoIiwiZG9jdW1lbnQiLCJyZWFkeSIsImNsaWNrIiwiaW1hZ2UiLCJzZXJ2aWNlIl0sInNvdXJjZVJvb3QiOiIifQ==