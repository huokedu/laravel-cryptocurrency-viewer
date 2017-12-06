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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, exports) {

console.log('start');

function WebSocketTest() {
   if ("WebSocket" in window) {
      console.log("WebSocket is supported by your Browser!");

      // Let us open a web socket
      var ws = new WebSocket("wss://api2.poloniex.com");

      ws.onopen = function () {
         // Web Socket is connected, send data using send()
         ws.send("{\"command\": \"subscribe\", \"channel\": \"1002\"}");
         console.log("Message is sent...");
      };

      ws.onmessage = function (evt) {
         var received_msg = evt.data;
         //  console.log("Message is received..." + received_msg);
         UpdateCoinInfo(received_msg);
      };

      ws.onclose = function () {
         // websocket is closed.
         alert("Connection is closed...");
      };

      window.onbeforeunload = function (event) {
         socket.close();
      };
   } else {
      // The browser doesn't support WebSocket
      alert("WebSocket NOT supported by your Browser!");
   }
}

WebSocketTest();

function UpdateCoinInfo(msg) {
   var info = JSON.parse(msg);
   var coinInfo = info[2];
   if (coinInfo) {
      // console.log(coinInfo);
      var infoObj = {
         id: coinInfo[0],
         last: coinInfo[1],
         lowestAsk: coinInfo[2],
         highestBid: coinInfo[3],
         percentChange: coinInfo[4],
         baseVolume: coinInfo[5],
         quoteVolume: coinInfo[6],
         isFrozen: coinInfo[7],
         high24hr: coinInfo[8],
         low24hr: coinInfo[9]
      };
      // console.log(infoObj.id);
      $('#' + infoObj.id + ' > .last').text(infoObj.last);
      $('#' + infoObj.id + ' > .lowestAsk').text(infoObj.lowestAsk);
      $('#' + infoObj.id + ' > .highestBid').text(infoObj.highestBid);
      $('#' + infoObj.id + ' > .percentChange').text(infoObj.percentChange);
      $('#' + infoObj.id + ' > .baseVolume').text(infoObj.baseVolume);
      $('#' + infoObj.id + ' > .quoteVolume').text(infoObj.quoteVolume);
      $('#' + infoObj.id + ' > .isFrozen').text(infoObj.isFrozen);
      $('#' + infoObj.id + ' > .high24hr').text(infoObj.high24hr);
      $('#' + infoObj.id + ' > .low24hr').text(infoObj.low24hr);
   }
};

/***/ })

/******/ });