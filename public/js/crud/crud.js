/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/crud/crud.js":
/*!***********************************!*\
  !*** ./resources/js/crud/crud.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

renderCreateForm = function renderCreateForm() {
  var form = document.getElementById("form-crud");
  var methodInput = document.getElementById("method-input");

  if (methodInput) {
    methodInput.remove();
  }

  var cancelBtn = document.getElementById("btn-cancel");

  if (cancelBtn) {
    cancelBtn.remove();
  }

  form.setAttribute("action", CREATE_URL);
  document.getElementById("input-id").value = "";
  form.reset();
  document.getElementById("btn-create").value = "Guardar";
};

renderUpdateForm = function renderUpdateForm(e) {
  e.preventDefault();
  var form = document.getElementById("form-crud");
  var methodInput = document.getElementById("method-input");

  if (!methodInput) {
    methodInput = document.createElement("input");
    methodInput.setAttribute("type", "hidden");
    methodInput.setAttribute("name", "_method");
    methodInput.setAttribute("value", "PUT");
    methodInput.setAttribute("id", "method-input");
    form.prepend(methodInput);
  }

  var cancelBtn = document.getElementById("btn-cancel");

  if (!cancelBtn) {
    cancelBtn = document.createElement("input");
    cancelBtn.setAttribute("type", "button");
    cancelBtn.setAttribute("value", "Cancelar");
    cancelBtn.setAttribute("id", "btn-cancel");
    cancelBtn.classList.add("btn", "btn-warning", "text-white");
    form.append(cancelBtn);
    cancelBtn.addEventListener("click", renderCreateForm);
  }

  var btn = e.currentTarget;
  var id = btn.getAttribute("data-id");
  var tr = btn.closest("tr");
  var name = tr.children[0].innerHTML;
  var lastname = tr.children[1].innerHTML;
  var gender = tr.children[2].innerHTML;
  var birthdate = tr.children[3].innerHTML;
  form.setAttribute("action", UPDATE_URL + "/" + id);
  document.getElementById("input-id").value = id;
  document.getElementById("name").value = name;
  document.getElementById("lastname").value = lastname;
  document.getElementById("gender").value = gender;
  document.getElementById("birthdate").value = birthdate;
  document.getElementById("btn-create").value = "Modificar";
};

renderCreateForm();

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/crud/crud.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\crud-colegio\CRUD-colegio\resources\js\crud\crud.js */"./resources/js/crud/crud.js");


/***/ })

/******/ });