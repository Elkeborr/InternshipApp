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

/***/ "./resources/js/review.js":
/*!********************************!*\
  !*** ./resources/js/review.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Get the modal
var modal = document.getElementById("myModal"); // Get the main container and the body

var body = document.getElementsByTagName("body"); // Get the open button

var btnOpen = document.querySelector(".myBtn"); // Get the close button

var btnClose = document.getElementById("closeModal"); // Open the modal

btnOpen.onclick = function () {
  modal.className = "Modal is-visuallyHidden";
  setTimeout(function () {
    body.className = "MainContainer is-blurred";
    modal.className = "Modal";
  }, 100);
  body.className = "ModalOpen";
}; // Close the modal


btnClose.onclick = function () {
  modal.className = "Modal is-hidden is-visuallyHidden";
  body.className = "";
  body.className = "MainContainer";
}; // When the user clicks anywhere outside of the modal, close it


window.onclick = function (event) {
  if (event.target == modal) {
    modal.className = "Modal is-hidden";
    body.className = "";
    body.className = "MainContainer";
  }
};

var $star_rating = $("#stars_review .star");

var SetRatingStar = function SetRatingStar() {
  return $star_rating.each(function () {
    if (parseInt($star_rating.siblings("input.rating-value").val()) >= parseInt($(this).data("rating"))) {
      return $(this).removeClass("fa-star-o").addClass("fa-star");
    } else {
      return $(this).removeClass("fa-star").addClass("fa-star-o");
    }
  });
};

$star_rating.on("click", function () {
  $star_rating.siblings("input.rating-value").val($(this).data("rating"));
  return SetRatingStar();
});
SetRatingStar();
$(document).ready(function () {});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/review.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Dem_R\Desktop\School Coding\AWebTech\InternshipApp\resources\js\review.js */"./resources/js/review.js");


/***/ })

/******/ });