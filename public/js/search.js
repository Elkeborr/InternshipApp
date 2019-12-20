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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/search.js":
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  // this will be called when the DOM is ready
  //prevent post on enter
  $(window).keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
  $('#searchBar').keyup(function (e) {
    $value = $(this).val();
    $.ajax({
      beforeSend: function beforeSend(xhr) {
        xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
      },
      type: 'post',
      url: '/search',
      data: {
        'search': $value
      },
      dataType: 'json',
      success: function success(res) {
        if ($value == "") {
          //if value is empty then remove all links and list items
          $(".search-result_list-link").remove();
          $(".search-result_list-item").remove();
          $(".search-result_list-info").remove();
          $(".search-results").hide();
        } else {
          //else check the response message
          if (res.status == "fail") {
            //if message is fail, show dropdown with empty state
            $(".search-result_list-link").remove();
            $(".search-result_list-item").remove();
            $(".search-result_list-info").remove();
            $(".search-results").show();
            var listLink = $("<a />", {
              "class": "search-result_list-link",
              text: res.message
            });
            var listItem = $("<li />", {
              "class": "search-result_list-item"
            });
            listLink.appendTo(listItem);
            listItem.appendTo(".search-result_list");
          } else if (res.status == "success") {
            //if message is success, show the dropdown
            var companyResults = res.data.Companies;
            var internshipResults = res.data.Internships;
            var tagsResults = res.data.Tags; // console.log(internshipResults);
            //remove all previous made search results

            $(".search-result_list-link").remove();
            $(".search-result_list-item").remove();
            $(".search-result_list-info").remove();
            $(".search-results").show();

            if (companyResults.length > 0) {
              var listInfo = $("<p />", {
                "class": "search-result_list-info",
                text: "Bedrijven:"
              });
              listInfo.appendTo(".search-result_list");

              for (var i = 0; i < companyResults.length; i++) {
                var _listLink = $("<a />", {
                  "class": "search-result_list-link",
                  text: companyResults[i].name,
                  href: "companies/" + companyResults[i].id
                });

                var _listItem = $("<li />", {
                  "class": "search-result_list-item"
                });

                _listLink.appendTo(_listItem);

                _listItem.appendTo(".search-result_list");
              }
            }

            if (internshipResults.length > 0) {
              var _listInfo = $("<p />", {
                "class": "search-result_list-info",
                text: "Stageplekken:"
              });

              _listInfo.appendTo(".search-result_list");

              for (var _i = 0; _i < internshipResults.length; _i++) {
                var _listLink2 = $("<a />", {
                  "class": "search-result_list-link",
                  text: internshipResults[_i].internship_function + " bij " + internshipResults[_i].company.name,
                  href: "internships/" + internshipResults[_i].id
                });

                var _listItem2 = $("<li />", {
                  "class": "search-result_list-item"
                });

                _listLink2.appendTo(_listItem2);

                _listItem2.appendTo(".search-result_list");
              }
            }

            if (tagsResults.length > 0) {
              var _listInfo2 = $("<p />", {
                "class": "search-result_list-info",
                text: "Tags:"
              });

              _listInfo2.appendTo(".search-result_list");

              for (var _i2 = 0; _i2 < tagsResults.length; _i2++) {
                var _listLink3 = $("<a />", {
                  "class": "search-result_list-link",
                  text: tagsResults[_i2].internship_function + " bij " + tagsResults[_i2].company.name,
                  href: "internships/" + tagsResults[_i2].id
                });

                var _listItem3 = $("<li />", {
                  "class": "search-result_list-item"
                });

                _listLink3.appendTo(_listItem3);

                _listItem3.appendTo(".search-result_list");
              }
            }
          } else {
            $(".search-result_list-link").remove();
            $(".search-result_list-item").remove();
            $(".search-result_list-info").remove();
            $(".search-results").hide();
          }
        }
      }
    });
  }); // on focusout, remove the dropdown

  $('.search').focusout(function () {
    //setTimeout for clicking on dropdown link
    //otherwise it removes the dropdown on clicking the link
    setTimeout(function () {
      $("#searchBar").val("");
      $(".search-result_list-link").remove();
      $(".search-result_list-item").remove();
      $(".search-result_list-info").remove();
      $(".search-results").hide();
    }, 100);
  });
});

/***/ }),

/***/ 5:
/*!**************************************!*\
  !*** multi ./resources/js/search.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/ElkeBorreij/Documents/GitHub/InternshipApp/resources/js/search.js */"./resources/js/search.js");


/***/ })

/******/ });