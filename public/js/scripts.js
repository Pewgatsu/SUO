/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/scripts.js":
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
/***/ (() => {

eval("/*\r\n * @build  : 20-07-2013\r\n * @author : Ram swaroop\r\n * @site   : Compzets.com\r\n */\n(function ($) {\n  $.fn.animatescroll = function (options) {\n    // fetches options\n    var opts = $.extend({}, $.fn.animatescroll.defaults, options); // make sure the callback is a function\n\n    if (typeof opts.onScrollStart == 'function') {\n      // brings the scope to the callback\n      opts.onScrollStart.call(this);\n    }\n\n    if (opts.element == \"html,body\") {\n      // Get the distance of particular id or class from top\n      var offset = this.offset().top; // Scroll the page to the desired position\n\n      $(opts.element).stop().animate({\n        scrollTop: offset - opts.padding\n      }, opts.scrollSpeed, opts.easing);\n    } else {\n      // Scroll the element to the desired position\n      $(opts.element).stop().animate({\n        scrollTop: this.offset().top - this.parent().offset().top + this.parent().scrollTop() - opts.padding\n      }, opts.scrollSpeed, opts.easing);\n    }\n\n    setTimeout(function () {\n      // make sure the callback is a function\n      if (typeof opts.onScrollEnd == 'function') {\n        // brings the scope to the callback\n        opts.onScrollEnd.call(this);\n      }\n    }, opts.scrollSpeed);\n  }; // default options\n\n\n  $.fn.animatescroll.defaults = {\n    easing: \"swing\",\n    scrollSpeed: 50,\n    padding: 130,\n    element: \"html,body\"\n  };\n})(jQuery);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2NyaXB0cy5qcz9iOGQ4Il0sIm5hbWVzIjpbIiQiLCJmbiIsImFuaW1hdGVzY3JvbGwiLCJvcHRpb25zIiwib3B0cyIsImV4dGVuZCIsImRlZmF1bHRzIiwib25TY3JvbGxTdGFydCIsImNhbGwiLCJlbGVtZW50Iiwib2Zmc2V0IiwidG9wIiwic3RvcCIsImFuaW1hdGUiLCJzY3JvbGxUb3AiLCJwYWRkaW5nIiwic2Nyb2xsU3BlZWQiLCJlYXNpbmciLCJwYXJlbnQiLCJzZXRUaW1lb3V0Iiwib25TY3JvbGxFbmQiLCJqUXVlcnkiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQyxXQUFTQSxDQUFULEVBQVc7QUFFUkEsRUFBQUEsQ0FBQyxDQUFDQyxFQUFGLENBQUtDLGFBQUwsR0FBcUIsVUFBU0MsT0FBVCxFQUFrQjtBQUVuQztBQUNBLFFBQUlDLElBQUksR0FBR0osQ0FBQyxDQUFDSyxNQUFGLENBQVMsRUFBVCxFQUFZTCxDQUFDLENBQUNDLEVBQUYsQ0FBS0MsYUFBTCxDQUFtQkksUUFBL0IsRUFBd0NILE9BQXhDLENBQVgsQ0FIbUMsQ0FLbkM7O0FBQ0EsUUFBSSxPQUFPQyxJQUFJLENBQUNHLGFBQVosSUFBNkIsVUFBakMsRUFBNkM7QUFDekM7QUFDQUgsTUFBQUEsSUFBSSxDQUFDRyxhQUFMLENBQW1CQyxJQUFuQixDQUF3QixJQUF4QjtBQUNIOztBQUVELFFBQUdKLElBQUksQ0FBQ0ssT0FBTCxJQUFnQixXQUFuQixFQUFnQztBQUM1QjtBQUNBLFVBQUlDLE1BQU0sR0FBRyxLQUFLQSxNQUFMLEdBQWNDLEdBQTNCLENBRjRCLENBSTVCOztBQUNBWCxNQUFBQSxDQUFDLENBQUNJLElBQUksQ0FBQ0ssT0FBTixDQUFELENBQWdCRyxJQUFoQixHQUF1QkMsT0FBdkIsQ0FBK0I7QUFBRUMsUUFBQUEsU0FBUyxFQUFFSixNQUFNLEdBQUdOLElBQUksQ0FBQ1c7QUFBM0IsT0FBL0IsRUFBb0VYLElBQUksQ0FBQ1ksV0FBekUsRUFBc0ZaLElBQUksQ0FBQ2EsTUFBM0Y7QUFDSCxLQU5ELE1BT0s7QUFDRDtBQUNBakIsTUFBQUEsQ0FBQyxDQUFDSSxJQUFJLENBQUNLLE9BQU4sQ0FBRCxDQUFnQkcsSUFBaEIsR0FBdUJDLE9BQXZCLENBQStCO0FBQUVDLFFBQUFBLFNBQVMsRUFBRSxLQUFLSixNQUFMLEdBQWNDLEdBQWQsR0FBb0IsS0FBS08sTUFBTCxHQUFjUixNQUFkLEdBQXVCQyxHQUEzQyxHQUFpRCxLQUFLTyxNQUFMLEdBQWNKLFNBQWQsRUFBakQsR0FBNkVWLElBQUksQ0FBQ1c7QUFBL0YsT0FBL0IsRUFBd0lYLElBQUksQ0FBQ1ksV0FBN0ksRUFBMEpaLElBQUksQ0FBQ2EsTUFBL0o7QUFDSDs7QUFFREUsSUFBQUEsVUFBVSxDQUFDLFlBQVc7QUFFbEI7QUFDQSxVQUFJLE9BQU9mLElBQUksQ0FBQ2dCLFdBQVosSUFBMkIsVUFBL0IsRUFBMkM7QUFDdkM7QUFDQWhCLFFBQUFBLElBQUksQ0FBQ2dCLFdBQUwsQ0FBaUJaLElBQWpCLENBQXNCLElBQXRCO0FBQ0g7QUFDSixLQVBTLEVBT1BKLElBQUksQ0FBQ1ksV0FQRSxDQUFWO0FBU0gsR0FoQ0QsQ0FGUSxDQW9DUjs7O0FBQ0FoQixFQUFBQSxDQUFDLENBQUNDLEVBQUYsQ0FBS0MsYUFBTCxDQUFtQkksUUFBbkIsR0FBOEI7QUFDMUJXLElBQUFBLE1BQU0sRUFBQyxPQURtQjtBQUUxQkQsSUFBQUEsV0FBVyxFQUFDLEVBRmM7QUFHMUJELElBQUFBLE9BQU8sRUFBQyxHQUhrQjtBQUkxQk4sSUFBQUEsT0FBTyxFQUFDO0FBSmtCLEdBQTlCO0FBT0gsQ0E1Q0EsRUE0Q0NZLE1BNUNELENBQUQiLCJzb3VyY2VzQ29udGVudCI6WyIvKlxyXG4gKiBAYnVpbGQgIDogMjAtMDctMjAxM1xyXG4gKiBAYXV0aG9yIDogUmFtIHN3YXJvb3BcclxuICogQHNpdGUgICA6IENvbXB6ZXRzLmNvbVxyXG4gKi9cclxuKGZ1bmN0aW9uKCQpe1xyXG5cclxuICAgICQuZm4uYW5pbWF0ZXNjcm9sbCA9IGZ1bmN0aW9uKG9wdGlvbnMpIHtcclxuXHJcbiAgICAgICAgLy8gZmV0Y2hlcyBvcHRpb25zXHJcbiAgICAgICAgdmFyIG9wdHMgPSAkLmV4dGVuZCh7fSwkLmZuLmFuaW1hdGVzY3JvbGwuZGVmYXVsdHMsb3B0aW9ucyk7XHJcblxyXG4gICAgICAgIC8vIG1ha2Ugc3VyZSB0aGUgY2FsbGJhY2sgaXMgYSBmdW5jdGlvblxyXG4gICAgICAgIGlmICh0eXBlb2Ygb3B0cy5vblNjcm9sbFN0YXJ0ID09ICdmdW5jdGlvbicpIHtcclxuICAgICAgICAgICAgLy8gYnJpbmdzIHRoZSBzY29wZSB0byB0aGUgY2FsbGJhY2tcclxuICAgICAgICAgICAgb3B0cy5vblNjcm9sbFN0YXJ0LmNhbGwodGhpcyk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBpZihvcHRzLmVsZW1lbnQgPT0gXCJodG1sLGJvZHlcIikge1xyXG4gICAgICAgICAgICAvLyBHZXQgdGhlIGRpc3RhbmNlIG9mIHBhcnRpY3VsYXIgaWQgb3IgY2xhc3MgZnJvbSB0b3BcclxuICAgICAgICAgICAgdmFyIG9mZnNldCA9IHRoaXMub2Zmc2V0KCkudG9wO1xyXG5cclxuICAgICAgICAgICAgLy8gU2Nyb2xsIHRoZSBwYWdlIHRvIHRoZSBkZXNpcmVkIHBvc2l0aW9uXHJcbiAgICAgICAgICAgICQob3B0cy5lbGVtZW50KS5zdG9wKCkuYW5pbWF0ZSh7IHNjcm9sbFRvcDogb2Zmc2V0IC0gb3B0cy5wYWRkaW5nfSwgb3B0cy5zY3JvbGxTcGVlZCwgb3B0cy5lYXNpbmcpO1xyXG4gICAgICAgIH1cclxuICAgICAgICBlbHNlIHtcclxuICAgICAgICAgICAgLy8gU2Nyb2xsIHRoZSBlbGVtZW50IHRvIHRoZSBkZXNpcmVkIHBvc2l0aW9uXHJcbiAgICAgICAgICAgICQob3B0cy5lbGVtZW50KS5zdG9wKCkuYW5pbWF0ZSh7IHNjcm9sbFRvcDogdGhpcy5vZmZzZXQoKS50b3AgLSB0aGlzLnBhcmVudCgpLm9mZnNldCgpLnRvcCArIHRoaXMucGFyZW50KCkuc2Nyb2xsVG9wKCkgLSBvcHRzLnBhZGRpbmd9LCBvcHRzLnNjcm9sbFNwZWVkLCBvcHRzLmVhc2luZyk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xyXG5cclxuICAgICAgICAgICAgLy8gbWFrZSBzdXJlIHRoZSBjYWxsYmFjayBpcyBhIGZ1bmN0aW9uXHJcbiAgICAgICAgICAgIGlmICh0eXBlb2Ygb3B0cy5vblNjcm9sbEVuZCA9PSAnZnVuY3Rpb24nKSB7XHJcbiAgICAgICAgICAgICAgICAvLyBicmluZ3MgdGhlIHNjb3BlIHRvIHRoZSBjYWxsYmFja1xyXG4gICAgICAgICAgICAgICAgb3B0cy5vblNjcm9sbEVuZC5jYWxsKHRoaXMpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSwgb3B0cy5zY3JvbGxTcGVlZCk7XHJcblxyXG4gICAgfTtcclxuXHJcbiAgICAvLyBkZWZhdWx0IG9wdGlvbnNcclxuICAgICQuZm4uYW5pbWF0ZXNjcm9sbC5kZWZhdWx0cyA9IHtcclxuICAgICAgICBlYXNpbmc6XCJzd2luZ1wiLFxyXG4gICAgICAgIHNjcm9sbFNwZWVkOjUwLFxyXG4gICAgICAgIHBhZGRpbmc6MTMwLFxyXG4gICAgICAgIGVsZW1lbnQ6XCJodG1sLGJvZHlcIlxyXG4gICAgfTtcclxuXHJcbn0oalF1ZXJ5KSk7XHJcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvc2NyaXB0cy5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/scripts.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/scripts.js"]();
/******/ 	
/******/ })()
;