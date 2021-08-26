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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/awesome-notifications/dist/index.js":
/*!**********************************************************!*\
  !*** ./node_modules/awesome-notifications/dist/index.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

!function(e,t){ true?module.exports=t():undefined}(window,function(){return function(e){var t={};function n(i){if(t[i])return t[i].exports;var o=t[i]={i:i,l:!1,exports:{}};return e[i].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:i})},n.r=function(e){Object.defineProperty(e,"__esModule",{value:!0})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=6)}([function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i={modal:"awn-modal",toast:"awn-toast",btn:"awn-btn",confirm:"awn-confirm"};t.tConsts={prefix:i.toast,klass:{label:i.toast+"-label",content:i.toast+"-content",icon:i.toast+"-icon",progressBar:i.toast+"-progress-bar",progressBarPause:i.toast+"-progress-bar-paused"},ids:{container:i.toast+"-container"}},t.mConsts={prefix:i.modal,klass:{buttons:"awn-buttons",button:i.btn,successBtn:i.btn+"-success",cancelBtn:i.btn+"-cancel",title:i.modal+"-title",body:i.modal+"-body",content:i.modal+"-content",dotAnimation:i.modal+"-loading-dots"},ids:{wrapper:i.modal+"-wrapper",confirmOk:i.confirm+"-ok",confirmCancel:i.confirm+"-cancel"}},t.eConsts={klass:{hiding:"awn-hiding"},lib:"awn"}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o=n(0);var r=function(){function e(t,n,i,o,r){var s=arguments.length>5&&void 0!==arguments[5]?arguments[5]:"div";!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.newNode=document.createElement(s),n&&(this.newNode.id=n),i&&(this.newNode.className=i),r&&(this.newNode.innerHTML=r),o&&(this.newNode.style.cssText=o),this.parent=t,this.options={}}return i(e,[{key:"fire",value:function(e){return e?e.replace(this.newNode,this.type):this.insert()}},{key:"beforeInsert",value:function(){}},{key:"insert",value:function(){this.beforeInsert(),this.el=this.parent.appendChild(this.newNode),this.afterInsert()}},{key:"replace",value:function(e,t){var n=this;if(this.getElement())return this.beforeDelete().then(function(){n.type=t,n.parent.replaceChild(e,n.el),n.el=document.getElementById(e.id),n.afterInsert()})}},{key:"afterInsert",value:function(){}},{key:"beforeDelete",value:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this.el;return new Promise(function(n,i){t.classList.add(o.eConsts.klass.hiding),setTimeout(n,e.options.animationDuration||300)})}},{key:"delete",value:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this.el;return this.getElement(t)?this.beforeDelete(t).then(function(){return e.parent.removeChild(t)}):null}},{key:"getElement",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this.el;return document.getElementById(e.id)}},{key:"addEvent",value:function(e,t){this.el.addEventListener(e,t)}},{key:"addClass",value:function(e){this.el.classList.add(e)}},{key:"removeClass",value:function(e){this.el.classList.remove(e)}}]),e}();t.default=r},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i,o=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),r=n(1),s=(i=r)&&i.__esModule?i:{default:i},a=n(0);var u=function(e){function t(e,n,i){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);var o=function(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,document.body,a.mConsts.ids.wrapper,null,"animation-duration: "+i.getSecs("animationDuration")+";"));return o.options=i,o.type=n,o.setInnerHtml(e),o.insert(),o}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,s.default),o(t,[{key:"setInnerHtml",value:function(e){var t=this.options.applyReplacements(e,this.type);switch(this.type){case"confirm":t="\n          "+this.options.icon(this.type)+"\n          <div class='"+a.mConsts.klass.title+"'>\n            "+this.options.label(this.type)+'\n          </div>\n          <div class="'+a.mConsts.klass.content+'">'+t+"</div>\n          <div class='"+a.mConsts.klass.buttons+"'>\n            <button class='"+a.mConsts.klass.button+" "+a.mConsts.klass.successBtn+"' id='"+a.mConsts.ids.confirmOk+"'>"+this.options.modal.okLabel+"</button>\n            <button class='"+a.mConsts.klass.button+" "+a.mConsts.klass.cancelBtn+"' id='"+a.mConsts.ids.confirmCancel+"'>"+this.options.modal.cancelLabel+"</button>\n          </div>\n       ";break;case"async-block":t=t+'<div class="'+a.mConsts.klass.dotAnimation+'"></div>'}this.newNode.innerHTML='\n      <div class="'+a.mConsts.klass.body+" "+a.mConsts.prefix+"-"+this.type+'" style="max-width: '+this.options.modal.maxWidth+';">\n        '+t+"\n      </div>\n     "}},{key:"hideAsync",value:function(e){var t=this,n=Date.now()-e;return new Promise(function(e,i){n>=t.options.asyncBlockMinDuration?(t.delete(),e()):setTimeout(function(){t.delete(),e()},t.options.asyncBlockMinDuration-n)})}}]),t}();t.default=u},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}();var o=function(){function e(t,n){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.callback=t,this.remaining=n,this.resume()}return i(e,[{key:"pause",value:function(){window.clearTimeout(this.timerId),this.remaining-=new Date-this.start}},{key:"resume",value:function(){var e=this;this.start=new Date,window.clearTimeout(this.timerId),this.timerId=window.setTimeout(function(){window.clearTimeout(e.timerId),e.callback()},this.remaining)}}]),e}();t.default=o},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o=a(n(1)),r=a(n(3)),s=n(0);function a(e){return e&&e.__esModule?e:{default:e}}var u=function(e){function t(e,n,i,o){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);var r=function(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,o,s.tConsts.prefix+"-"+Math.floor(Date.now()-100*Math.random()),s.tConsts.prefix+" "+s.tConsts.prefix+"-"+n,"animation-duration: "+i.getSecs("animationDuration")+";"));return r.options=i,r.type=n,r.setInnerHtml(e),r}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,o.default),i(t,[{key:"setInnerHtml",value:function(e){e=this.options.applyReplacements(e,this.type);var t="";"async"!==this.type&&(t="<div class='"+s.tConsts.klass.progressBar+"' style=\"animation-duration:"+this.options.getSecs("duration")+';"></div>'),this.newNode.innerHTML="\n    "+t+"\n    "+this.getLabel()+'\n    <div class="'+s.tConsts.klass.content+'">'+e+'</div>\n    <span class="'+s.tConsts.klass.icon+'">'+this.options.icon(this.type)+"</span>\n    "}},{key:"beforeInsert",value:function(){var e=this;if(this.parent.childElementCount>=this.options.maxNotifications){var t=Array.from(this.parent.getElementsByClassName(s.tConsts.prefix));this.delete(t.find(function(t){return!e.isDeleted(t)}))}}},{key:"afterInsert",value:function(){var e=this;"async"!=this.type&&(this.timer=new r.default(function(){return e.delete()},this.options.duration),this.addEvent("click",function(){return e.delete()}),this.addEvent("mouseenter",function(){e.isDeleted()||(e.addClass(s.tConsts.klass.progressBarPause),e.timer.pause())}),this.addEvent("mouseleave",function(){e.isDeleted()||(e.removeClass(s.tConsts.klass.progressBarPause),e.timer.resume())}))}},{key:"isDeleted",value:function(){return(arguments.length>0&&void 0!==arguments[0]?arguments[0]:this.el).classList.contains(s.eConsts.klass.hiding)}},{key:"getLabel",value:function(){return'<b class="'+s.tConsts.klass.label+'">'+this.options.label(this.type)+"</b>"}}]),t}();t.default=u},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};var r={labels:{tip:"Tip",info:"Info",success:"Success",warning:"Attention",alert:"Error",async:"Loading",confirm:"Confirmation required"},icons:{tip:"question-circle",info:"info-circle",success:"check-circle",warning:"exclamation-circle",alert:"warning",async:"cog fa-spin",confirm:"warning",prefix:"<i class='fa fa-fw fa-",suffix:"'></i>",enabled:!0},replacements:{tip:"",info:"",success:"",warning:"",alert:"",async:"","async-block":"",modal:"",confirm:"",general:{"<script>":"","<\/script>":""}},modal:{okLabel:"OK",cancelLabel:"Cancel",maxWidth:"500px"},messages:{async:"Please, wait...","async-block":"Loading"},handleReject:function(e){if("string"!=typeof e)throw Error("promise.reject() returning value should be a string, Given "+(void 0===e?"undefined":o(e))+" "+e);return e},maxNotifications:10,animationDuration:300,asyncBlockMinDuration:500,position:"bottom-right",duration:5e3},s=function(){function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),Object.assign(this,function e(t,n){var i={};for(var r in t)n.hasOwnProperty(r)?"object"===o(t[r])?i[r]=e(t[r],n[r]):i[r]=n[r]:i[r]=t[r];return i}(r,t))}return i(e,[{key:"icon",value:function(e){return this.icons.enabled?""+this.icons.prefix+this.icons[e]+this.icons.suffix:""}},{key:"label",value:function(e){return this.labels[e]}},{key:"getSecs",value:function(e){return this[e]/1e3+"s"}},{key:"applyReplacements",value:function(e,t){if(!e)return this.messages[t]||"";for(var n in this.replacements.general)e=e.replace(n,this.replacements.general[n]);if(this.replacements[t])for(var i in this.replacements[t])e=e.replace(i,this.replacements[t][i]);return e}}]),e}();t.default=s},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},o=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),r=l(n(5)),s=l(n(4)),a=l(n(2)),u=l(n(1)),c=n(0);function l(e){return e&&e.__esModule?e:{default:e}}var f=function(){function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.options=new r.default(t)}return o(e,[{key:"_err",value:function(e){throw Error(e)}},{key:"tip",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this._err("missing 'html' parameter");this.notify(e,"tip")}},{key:"info",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this._err("missing 'html' parameter");this.notify(e,"info")}},{key:"success",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this._err("missing 'html' parameter");this.notify(e,"success")}},{key:"warning",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this._err("missing 'html' parameter");this.notify(e,"warning")}},{key:"alert",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this._err("missing 'html' parameter");this.notify(e,"alert")}},{key:"async",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this._err("missing 'promise' parameter"),t=arguments[1],n=this,i=arguments[2],o=arguments[3],r=this.notify(o,"async");return e.then(function(e){return n._runFunction(!0,t,e,r)},function(e){return Promise.reject(n._runFunction(!1,i,e,r))})}},{key:"notify",value:function(e,t,n){var i=new s.default(e,t,this.options,this._getContainer());return i.fire(n),i}},{key:"confirm",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this._err("missing 'html' parameter"),t=this,n=arguments[1],i=arguments[2],o=new a.default(e,"confirm",this.options);o.addEvent("click",function(e){if("BUTTON"!==e.target.nodeName)return!1;switch(o.delete(),e.target.id){case c.mConsts.ids.confirmOk:return t._runFunction(!0,n);case c.mConsts.ids.confirmCancel:return t._runFunction(!0,i)}})}},{key:"asyncBlock",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this._err("missing 'promise' parameter"),t=arguments[1],n=this,i=arguments[2],o=arguments[3],r=new a.default(o,"async-block",this.options),s=Date.now();return e.then(function(e){return r.hideAsync(s).then(function(){return n._runFunction(!0,t,e)})},function(e){return r.hideAsync(s).then(function(){return Promise.reject(n._runFunction(!1,i,e))})})}},{key:"modal",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this._err("missing 'html' parameter"),t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:this._err("missing className parameter"),n=new a.default(e,t,this.options);n.addEvent("click",function(e){e.target.id===n.el.id&&n.delete()})}},{key:"_getContainer",value:function(){return this.container||(this.container=document.getElementById(c.tConsts.ids.container)||this._createContainer()),this.container}},{key:"_createContainer",value:function(){var e=this.options.position.split("-"),t="top"===e[0]?c.eConsts.lib+"-top":"";"left"===e[1]&&(t=t+" "+c.eConsts.lib+"-left");var n=new u.default(document.body,c.tConsts.ids.container,t);return n.insert(),n.el}},{key:"_runFunction",value:function(e,t,n,o){switch(void 0===t?"undefined":i(t)){case"function":return o&&o.delete(),t(n);case"string":return this.notify(t,e?"success":"alert",o),n}return e?o&&o.delete():this.notify(this.options.handleReject(n),"alert",o),n}}]),e}();t.default=f}])});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ButtonClicks.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ButtonClicks.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "ButtonClicks",
  data: function data() {
    return {
      buttonClicks: [],
      fields: ['User', 'Viewed At', 'Activity Instance Name']
    };
  },
  mounted: function mounted() {
    this.loadButtonClicks();
  },
  methods: {
    loadButtonClicks: function loadButtonClicks() {
      var _this = this;

      this.$http.get('/click').then(function (response) {
        return _this.buttonClicks = response.data;
      })["catch"](function (error) {
        return _this.$notify.alert('Could not load the button clicks');
      });
    }
  },
  computed: {
    presentedButtonClicks: function presentedButtonClicks() {
      return this.buttonClicks.map(function (b) {
        return {
          'User': b.user.data.first_name + ' ' + b.user.data.last_name,
          'Viewed At': b.created_at,
          'Activity Instance Name': b.activity_instance.name
        };
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/PageViews.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/PageViews.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "PageViews",
  data: function data() {
    return {
      pageViews: [],
      fields: ['User', 'Viewed At', 'Activity Instance Name']
    };
  },
  mounted: function mounted() {
    this.loadPageViews();
  },
  methods: {
    loadPageViews: function loadPageViews() {
      var _this = this;

      this.$http.get('/page-view').then(function (response) {
        return _this.pageViews = response.data;
      })["catch"](function (error) {
        return _this.$notify.alert('Could not load the page views');
      });
    }
  },
  computed: {
    presentedPageViews: function presentedPageViews() {
      return this.pageViews.map(function (p) {
        return {
          'User': p.user.data.first_name + ' ' + p.user.data.last_name,
          'Viewed At': p.created_at,
          'Activity Instance Name': p.activity_instance.name
        };
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/participant/ShowHtml.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/participant/ShowHtml.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SubmitButton__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SubmitButton */ "./resources/js/components/participant/SubmitButton.vue");
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "ShowHtml",
  components: {
    SubmitButton: _SubmitButton__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: {
    html: {
      required: true,
      type: String
    },
    buttonText: {
      required: true,
      type: String
    },
    canClickButton: {
      required: true,
      type: Boolean
    },
    canUnsubmit: {
      required: true,
      type: Boolean
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/participant/SubmitButton.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/participant/SubmitButton.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "SubmitButton",
  data: function data() {
    return {
      clicked: false,
      loading: false,
      click: null
    };
  },
  props: {
    canUnsubmit: {
      type: Boolean,
      "default": false
    }
  },
  created: function created() {
    this.checkedClicked();
  },
  methods: {
    checkedClicked: function checkedClicked() {
      var _this = this;

      this.loading = true;
      this.$http.get('/click').then(function (response) {
        if (response.data.length > 0) {
          _this.clicked = true;
          _this.click = response.data[0];
        } else {
          _this.clicked = false;
        }
      })["catch"](function (error) {
        _this.$notify.alert('Could not load results: ' + error.response.data.message);
      }).then(function () {
        return _this.loading = false;
      });
    },
    handleClick: function handleClick() {
      if (this.canUnsubmit && this.clicked) {
        this.deleteClicked();
      } else if (!this.clicked) {
        this.submit();
      }
    },
    deleteClicked: function deleteClicked() {
      var _this2 = this;

      if (this.click.id) {
        this.loading = true;
        this.$http["delete"]('/click/' + this.click.id).then(function (response) {
          _this2.clicked = false;
          _this2.click = null;
        })["catch"](function (error) {
          return _this2.$notify.alert('Could not remove button: ' + error.response.data.message);
        })["finally"](function () {
          return _this2.loading = false;
        });
      }
    },
    submit: function submit() {
      var _this3 = this;

      this.loading = true;
      this.$http.post('/click').then(function (response) {
        _this3.clicked = true;
        _this3.click = response.data;
      })["catch"](function (error) {
        return _this3.$notify.alert('Could not submit: ' + error.response.data.message);
      }).then(function () {
        return _this3.loading = false;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ButtonClicks.vue?vue&type=template&id=78f8d8b0&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ButtonClicks.vue?vue&type=template&id=78f8d8b0&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("p-table", {
        attrs: { items: _vm.presentedButtonClicks, columns: _vm.fields }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/PageViews.vue?vue&type=template&id=39253178&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/PageViews.vue?vue&type=template&id=39253178&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("p-table", {
        attrs: { items: _vm.presentedPageViews, columns: _vm.fields }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/participant/ShowHtml.vue?vue&type=template&id=61a29a8f&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/participant/ShowHtml.vue?vue&type=template&id=61a29a8f&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("span", { domProps: { innerHTML: _vm._s(_vm.html) } }),
    _vm._v(" "),
    _vm.canClickButton
      ? _c(
          "div",
          { staticStyle: { "text-align": "right" } },
          [
            _c(
              "submit-button",
              { attrs: { "can-unsubmit": _vm.canUnsubmit } },
              [_vm._v(_vm._s(_vm.buttonText))]
            )
          ],
          1
        )
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/participant/SubmitButton.vue?vue&type=template&id=297e1b31&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/participant/SubmitButton.vue?vue&type=template&id=297e1b31&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "p-button",
    {
      attrs: { disabled: _vm.loading || (!_vm.canUnsubmit && _vm.clicked) },
      on: { click: _vm.handleClick }
    },
    [
      _vm.clicked
        ? _c("span", [
            _vm._v("Submitted."),
            _vm.canUnsubmit
              ? _c("span", [_vm._v(" Click to unsubmit.")])
              : _vm._e()
          ])
        : _c("span", [_vm._t("default")], 2)
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/admin/ButtonClicks.vue":
/*!********************************************************!*\
  !*** ./resources/js/components/admin/ButtonClicks.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ButtonClicks_vue_vue_type_template_id_78f8d8b0_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ButtonClicks.vue?vue&type=template&id=78f8d8b0&scoped=true& */ "./resources/js/components/admin/ButtonClicks.vue?vue&type=template&id=78f8d8b0&scoped=true&");
/* harmony import */ var _ButtonClicks_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ButtonClicks.vue?vue&type=script&lang=js& */ "./resources/js/components/admin/ButtonClicks.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ButtonClicks_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ButtonClicks_vue_vue_type_template_id_78f8d8b0_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ButtonClicks_vue_vue_type_template_id_78f8d8b0_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "78f8d8b0",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/admin/ButtonClicks.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/admin/ButtonClicks.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/admin/ButtonClicks.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ButtonClicks_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ButtonClicks.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ButtonClicks.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ButtonClicks_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/admin/ButtonClicks.vue?vue&type=template&id=78f8d8b0&scoped=true&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/components/admin/ButtonClicks.vue?vue&type=template&id=78f8d8b0&scoped=true& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ButtonClicks_vue_vue_type_template_id_78f8d8b0_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ButtonClicks.vue?vue&type=template&id=78f8d8b0&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ButtonClicks.vue?vue&type=template&id=78f8d8b0&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ButtonClicks_vue_vue_type_template_id_78f8d8b0_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ButtonClicks_vue_vue_type_template_id_78f8d8b0_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/admin/PageViews.vue":
/*!*****************************************************!*\
  !*** ./resources/js/components/admin/PageViews.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PageViews_vue_vue_type_template_id_39253178_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PageViews.vue?vue&type=template&id=39253178&scoped=true& */ "./resources/js/components/admin/PageViews.vue?vue&type=template&id=39253178&scoped=true&");
/* harmony import */ var _PageViews_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PageViews.vue?vue&type=script&lang=js& */ "./resources/js/components/admin/PageViews.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PageViews_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PageViews_vue_vue_type_template_id_39253178_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PageViews_vue_vue_type_template_id_39253178_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "39253178",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/admin/PageViews.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/admin/PageViews.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/admin/PageViews.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PageViews_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./PageViews.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/PageViews.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PageViews_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/admin/PageViews.vue?vue&type=template&id=39253178&scoped=true&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/admin/PageViews.vue?vue&type=template&id=39253178&scoped=true& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PageViews_vue_vue_type_template_id_39253178_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./PageViews.vue?vue&type=template&id=39253178&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/PageViews.vue?vue&type=template&id=39253178&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PageViews_vue_vue_type_template_id_39253178_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PageViews_vue_vue_type_template_id_39253178_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/participant/ShowHtml.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/participant/ShowHtml.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ShowHtml_vue_vue_type_template_id_61a29a8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ShowHtml.vue?vue&type=template&id=61a29a8f&scoped=true& */ "./resources/js/components/participant/ShowHtml.vue?vue&type=template&id=61a29a8f&scoped=true&");
/* harmony import */ var _ShowHtml_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ShowHtml.vue?vue&type=script&lang=js& */ "./resources/js/components/participant/ShowHtml.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ShowHtml_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ShowHtml_vue_vue_type_template_id_61a29a8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ShowHtml_vue_vue_type_template_id_61a29a8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "61a29a8f",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/participant/ShowHtml.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/participant/ShowHtml.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/participant/ShowHtml.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowHtml_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ShowHtml.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/participant/ShowHtml.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowHtml_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/participant/ShowHtml.vue?vue&type=template&id=61a29a8f&scoped=true&":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/components/participant/ShowHtml.vue?vue&type=template&id=61a29a8f&scoped=true& ***!
  \*****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowHtml_vue_vue_type_template_id_61a29a8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ShowHtml.vue?vue&type=template&id=61a29a8f&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/participant/ShowHtml.vue?vue&type=template&id=61a29a8f&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowHtml_vue_vue_type_template_id_61a29a8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShowHtml_vue_vue_type_template_id_61a29a8f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/participant/SubmitButton.vue":
/*!**************************************************************!*\
  !*** ./resources/js/components/participant/SubmitButton.vue ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SubmitButton_vue_vue_type_template_id_297e1b31_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SubmitButton.vue?vue&type=template&id=297e1b31&scoped=true& */ "./resources/js/components/participant/SubmitButton.vue?vue&type=template&id=297e1b31&scoped=true&");
/* harmony import */ var _SubmitButton_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SubmitButton.vue?vue&type=script&lang=js& */ "./resources/js/components/participant/SubmitButton.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SubmitButton_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SubmitButton_vue_vue_type_template_id_297e1b31_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SubmitButton_vue_vue_type_template_id_297e1b31_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "297e1b31",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/participant/SubmitButton.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/participant/SubmitButton.vue?vue&type=script&lang=js&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/participant/SubmitButton.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SubmitButton_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./SubmitButton.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/participant/SubmitButton.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SubmitButton_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/participant/SubmitButton.vue?vue&type=template&id=297e1b31&scoped=true&":
/*!*********************************************************************************************************!*\
  !*** ./resources/js/components/participant/SubmitButton.vue?vue&type=template&id=297e1b31&scoped=true& ***!
  \*********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SubmitButton_vue_vue_type_template_id_297e1b31_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./SubmitButton.vue?vue&type=template&id=297e1b31&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/participant/SubmitButton.vue?vue&type=template&id=297e1b31&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SubmitButton_vue_vue_type_template_id_297e1b31_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SubmitButton_vue_vue_type_template_id_297e1b31_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/module.js":
/*!********************************!*\
  !*** ./resources/js/module.js ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "vue");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var awesome_notifications__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! awesome-notifications */ "./node_modules/awesome-notifications/dist/index.js");
/* harmony import */ var awesome_notifications__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(awesome_notifications__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _bristol_su_frontend_toolkit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @bristol-su/frontend-toolkit */ "@bristol-su/frontend-toolkit");
/* harmony import */ var _bristol_su_frontend_toolkit__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_bristol_su_frontend_toolkit__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components_participant_ShowHtml__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/participant/ShowHtml */ "./resources/js/components/participant/ShowHtml.vue");
/* harmony import */ var _components_admin_ButtonClicks__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./components/admin/ButtonClicks */ "./resources/js/components/admin/ButtonClicks.vue");
/* harmony import */ var _components_admin_PageViews__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./components/admin/PageViews */ "./resources/js/components/admin/PageViews.vue");






vue__WEBPACK_IMPORTED_MODULE_0___default.a.prototype.$notify = new awesome_notifications__WEBPACK_IMPORTED_MODULE_1___default.a({
  position: 'top-right'
});
vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(_bristol_su_frontend_toolkit__WEBPACK_IMPORTED_MODULE_2___default.a);
var vue = new vue__WEBPACK_IMPORTED_MODULE_0___default.a({
  el: '#static-page-root',
  components: {
    ShowHtml: _components_participant_ShowHtml__WEBPACK_IMPORTED_MODULE_3__["default"],
    ButtonClicks: _components_admin_ButtonClicks__WEBPACK_IMPORTED_MODULE_4__["default"],
    PageViews: _components_admin_PageViews__WEBPACK_IMPORTED_MODULE_5__["default"]
  }
});

/***/ }),

/***/ "./resources/sass/module.scss":
/*!************************************!*\
  !*** ./resources/sass/module.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*******************************************************************!*\
  !*** multi ./resources/js/module.js ./resources/sass/module.scss ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/repos/bristol-su/static-page/resources/js/module.js */"./resources/js/module.js");
module.exports = __webpack_require__(/*! /mnt/5F242F4A45A0248A/development/bristolsu/portal/portal-sites/playground/repos/bristol-su/static-page/resources/sass/module.scss */"./resources/sass/module.scss");


/***/ }),

/***/ "@bristol-su/frontend-toolkit":
/*!**************************!*\
  !*** external "Toolkit" ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = Toolkit;

/***/ }),

/***/ "vue":
/*!**********************!*\
  !*** external "Vue" ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = Vue;

/***/ })

/******/ });