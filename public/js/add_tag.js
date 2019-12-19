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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/add_tag.js":
/*!*********************************!*\
  !*** ./resources/js/add_tag.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  // Start this function when DOM is ready
  // Prevent post on enter
  $(window).keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
  $tagArray = []; // Start click Listener

  $('#add_search_tag').click(function (e) {
    // Take tag value and append in list
    var tagFieldValue = $('.tag').val(); // Start when value isn't empty

    if (tagFieldValue != '') {
      // Find ul-list and make li
      var tagList = $('.tag-list');
      var listItem = $('<li />', {
        "class": "tag-item" // ,text: tagFieldValue

      }); // Make link for removing a tag

      var removeListItem = $("<a />", {
        href: 'javascript:void(0);',
        "class": 'tag-remove',
        text: tagFieldValue
      }); // Push value into array

      $tagArray.push(tagFieldValue); // Append li into ul and clear value

      removeListItem.appendTo(listItem);
      listItem.appendTo(tagList);
      $('.tag').val('');
      $('#tags-hidden').val($tagArray);
      console.log("hidden input value: " + $('#tags-hidden').val());
    }

    e.preventDefault();
  });
  $('.tag-list').on('click', "a.tag-remove", function (e) {
    var tagRemoveLink = $(this);
    var tagListItem = $(this).parent(); // console.log(tagListItem);
    // Get text of item you want to remove

    var removeVal = $(this).parent().text(); // Remove item from array

    $tagArray = $.grep($tagArray, function (newTagArray) {
      return newTagArray != removeVal;
    }); // Put new array in hidden field

    $('#tags-hidden').val($tagArray);
    tagRemoveLink.remove();
    tagListItem.remove();
    console.log("hidden input value: " + $('#tags-hidden').val());
    e.preventDefault();
  });
});

/***/ }),

/***/ 3:
/*!***************************************!*\
  !*** multi ./resources/js/add_tag.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Dem_R\Desktop\InternshipApp\resources\js\add_tag.js */"./resources/js/add_tag.js");


/***/ })

/******/ });