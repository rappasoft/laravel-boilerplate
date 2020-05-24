(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/backend"],{

/***/ "./node_modules/@coreui/coreui/dist/js/coreui.esm.js":
/*!***********************************************************!*\
  !*** ./node_modules/@coreui/coreui/dist/js/coreui.esm.js ***!
  \***********************************************************/
/*! exports provided: Alert, AsyncLoad, Button, Carousel, ClassToggler, Collapse, Dropdown, Modal, Popover, Scrollspy, Sidebar, Tab, Toast, Tooltip */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Alert", function() { return Alert; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AsyncLoad", function() { return AsyncLoad; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Button", function() { return Button; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Carousel", function() { return Carousel; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ClassToggler", function() { return ClassToggler; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Collapse", function() { return Collapse; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Dropdown", function() { return Dropdown; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Modal", function() { return Modal; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Popover", function() { return Popover; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Scrollspy", function() { return ScrollSpy; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Sidebar", function() { return Sidebar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Tab", function() { return Tab; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Toast", function() { return Toast; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Tooltip", function() { return Tooltip; });
/* harmony import */ var _popperjs_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @popperjs/core */ "./node_modules/@popperjs/core/lib/popper.js");
/* harmony import */ var perfect_scrollbar__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! perfect-scrollbar */ "./node_modules/perfect-scrollbar/dist/perfect-scrollbar.esm.js");
/*!
  * CoreUI v3.2.0 (https://coreui.io)
  * Copyright 2020 creativeLabs Łukasz Holeczek
  * Licensed under MIT (https://coreui.io)
  */



function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);

  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);
    if (enumerableOnly) symbols = symbols.filter(function (sym) {
      return Object.getOwnPropertyDescriptor(object, sym).enumerable;
    });
    keys.push.apply(keys, symbols);
  }

  return keys;
}

function _objectSpread2(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};

    if (i % 2) {
      ownKeys(Object(source), true).forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(Object(source)).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }

  return target;
}

function _inheritsLoose(subClass, superClass) {
  subClass.prototype = Object.create(superClass.prototype);
  subClass.prototype.constructor = subClass;
  subClass.__proto__ = superClass;
}

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v5.0.0-alpha1): util/index.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */
var MAX_UID = 1000000;
var MILLISECONDS_MULTIPLIER = 1000;
var TRANSITION_END = 'transitionend'; // Shoutout AngusCroll (https://goo.gl/pxwQGp)

var toType = function toType(obj) {
  if (obj === null || obj === undefined) {
    return "" + obj;
  }

  return {}.toString.call(obj).match(/\s([a-z]+)/i)[1].toLowerCase();
};
/**
 * --------------------------------------------------------------------------
 * Public Util Api
 * --------------------------------------------------------------------------
 */


var getUID = function getUID(prefix) {
  do {
    prefix += Math.floor(Math.random() * MAX_UID);
  } while (document.getElementById(prefix));

  return prefix;
};

var getSelector = function getSelector(element) {
  var selector = element.getAttribute('data-target');

  if (!selector || selector === '#') {
    var hrefAttr = element.getAttribute('href');
    selector = hrefAttr && hrefAttr !== '#' ? hrefAttr.trim() : null;
  }

  return selector;
};

var getSelectorFromElement = function getSelectorFromElement(element) {
  var selector = getSelector(element);

  if (selector) {
    return document.querySelector(selector) ? selector : null;
  }

  return null;
};

var getElementFromSelector = function getElementFromSelector(element) {
  var selector = getSelector(element);
  return selector ? document.querySelector(selector) : null;
};

var getTransitionDurationFromElement = function getTransitionDurationFromElement(element) {
  if (!element) {
    return 0;
  } // Get transition-duration of the element


  var _window$getComputedSt = window.getComputedStyle(element),
      transitionDuration = _window$getComputedSt.transitionDuration,
      transitionDelay = _window$getComputedSt.transitionDelay;

  var floatTransitionDuration = parseFloat(transitionDuration);
  var floatTransitionDelay = parseFloat(transitionDelay); // Return 0 if element or transition duration is not found

  if (!floatTransitionDuration && !floatTransitionDelay) {
    return 0;
  } // If multiple durations are defined, take the first


  transitionDuration = transitionDuration.split(',')[0];
  transitionDelay = transitionDelay.split(',')[0];
  return (parseFloat(transitionDuration) + parseFloat(transitionDelay)) * MILLISECONDS_MULTIPLIER;
};

var triggerTransitionEnd = function triggerTransitionEnd(element) {
  element.dispatchEvent(new Event(TRANSITION_END));
};

var isElement = function isElement(obj) {
  return (obj[0] || obj).nodeType;
};

var emulateTransitionEnd = function emulateTransitionEnd(element, duration) {
  var called = false;
  var durationPadding = 5;
  var emulatedDuration = duration + durationPadding;

  function listener() {
    called = true;
    element.removeEventListener(TRANSITION_END, listener);
  }

  element.addEventListener(TRANSITION_END, listener);
  setTimeout(function () {
    if (!called) {
      triggerTransitionEnd(element);
    }
  }, emulatedDuration);
};

var typeCheckConfig = function typeCheckConfig(componentName, config, configTypes) {
  Object.keys(configTypes).forEach(function (property) {
    var expectedTypes = configTypes[property];
    var value = config[property];
    var valueType = value && isElement(value) ? 'element' : toType(value);

    if (!new RegExp(expectedTypes).test(valueType)) {
      throw new Error(componentName.toUpperCase() + ": " + ("Option \"" + property + "\" provided type \"" + valueType + "\" ") + ("but expected type \"" + expectedTypes + "\"."));
    }
  });
};

var isVisible = function isVisible(element) {
  if (!element) {
    return false;
  }

  if (element.style && element.parentNode && element.parentNode.style) {
    var elementStyle = getComputedStyle(element);
    var parentNodeStyle = getComputedStyle(element.parentNode);
    return elementStyle.display !== 'none' && parentNodeStyle.display !== 'none' && elementStyle.visibility !== 'hidden';
  }

  return false;
};

var findShadowRoot = function findShadowRoot(element) {
  if (!document.documentElement.attachShadow) {
    return null;
  } // Can find the shadow root otherwise it'll return the document


  if (typeof element.getRootNode === 'function') {
    var root = element.getRootNode();
    return root instanceof ShadowRoot ? root : null;
  }

  if (element instanceof ShadowRoot) {
    return element;
  } // when we don't find a shadow root


  if (!element.parentNode) {
    return null;
  }

  return findShadowRoot(element.parentNode);
};

var noop = function noop() {
  return function () {};
};

var reflow = function reflow(element) {
  return element.offsetHeight;
};

var getjQuery = function getjQuery() {
  var _window = window,
      jQuery = _window.jQuery;

  if (jQuery && !document.body.hasAttribute('data-no-jquery')) {
    return jQuery;
  }

  return null;
};

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v5.0.0-alpha1): dom/data.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */
var mapData = function () {
  var storeData = {};
  var id = 1;
  return {
    set: function set(element, key, data) {
      if (typeof element.key === 'undefined') {
        element.key = {
          key: key,
          id: id
        };
        id++;
      }

      storeData[element.key.id] = data;
    },
    get: function get(element, key) {
      if (!element || typeof element.key === 'undefined') {
        return null;
      }

      var keyProperties = element.key;

      if (keyProperties.key === key) {
        return storeData[keyProperties.id];
      }

      return null;
    },
    delete: function _delete(element, key) {
      if (typeof element.key === 'undefined') {
        return;
      }

      var keyProperties = element.key;

      if (keyProperties.key === key) {
        delete storeData[keyProperties.id];
        delete element.key;
      }
    }
  };
}();

var Data = {
  setData: function setData(instance, key, data) {
    mapData.set(instance, key, data);
  },
  getData: function getData(instance, key) {
    return mapData.get(instance, key);
  },
  removeData: function removeData(instance, key) {
    mapData.delete(instance, key);
  }
};

/* istanbul ignore file */
var find = Element.prototype.querySelectorAll;
var findOne = Element.prototype.querySelector; // MSEdge resets defaultPrevented flag upon dispatchEvent call if at least one listener is attached

var defaultPreventedPreservedOnDispatch = function () {
  var e = new CustomEvent('Bootstrap', {
    cancelable: true
  });
  var element = document.createElement('div');
  element.addEventListener('Bootstrap', function () {
    return null;
  });
  e.preventDefault();
  element.dispatchEvent(e);
  return e.defaultPrevented;
}();

var scopeSelectorRegex = /:scope\b/;

var supportScopeQuery = function () {
  var element = document.createElement('div');

  try {
    element.querySelectorAll(':scope *');
  } catch (_) {
    return false;
  }

  return true;
}();

if (!supportScopeQuery) {
  find = function find(selector) {
    if (!scopeSelectorRegex.test(selector)) {
      return this.querySelectorAll(selector);
    }

    var hasId = Boolean(this.id);

    if (!hasId) {
      this.id = getUID('scope');
    }

    var nodeList = null;

    try {
      selector = selector.replace(scopeSelectorRegex, "#" + this.id);
      nodeList = this.querySelectorAll(selector);
    } finally {
      if (!hasId) {
        this.removeAttribute('id');
      }
    }

    return nodeList;
  };

  findOne = function findOne(selector) {
    if (!scopeSelectorRegex.test(selector)) {
      return this.querySelector(selector);
    }

    var matches = find.call(this, selector);

    if (typeof matches[0] !== 'undefined') {
      return matches[0];
    }

    return null;
  };
}

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v5.0.0-alpha1): dom/event-handler.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */
/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var $ = getjQuery();
var namespaceRegex = /[^.]*(?=\..*)\.|.*/;
var stripNameRegex = /\..*/;
var stripUidRegex = /::\d+$/;
var eventRegistry = {}; // Events storage

var uidEvent = 1;
var customEvents = {
  mouseenter: 'mouseover',
  mouseleave: 'mouseout'
};
var nativeEvents = ['click', 'dblclick', 'mouseup', 'mousedown', 'contextmenu', 'mousewheel', 'DOMMouseScroll', 'mouseover', 'mouseout', 'mousemove', 'selectstart', 'selectend', 'keydown', 'keypress', 'keyup', 'orientationchange', 'touchstart', 'touchmove', 'touchend', 'touchcancel', 'pointerdown', 'pointermove', 'pointerup', 'pointerleave', 'pointercancel', 'gesturestart', 'gesturechange', 'gestureend', 'focus', 'blur', 'change', 'reset', 'select', 'submit', 'focusin', 'focusout', 'load', 'unload', 'beforeunload', 'resize', 'move', 'DOMContentLoaded', 'readystatechange', 'error', 'abort', 'scroll'];
/**
 * ------------------------------------------------------------------------
 * Private methods
 * ------------------------------------------------------------------------
 */

function getUidEvent(element, uid) {
  return uid && uid + "::" + uidEvent++ || element.uidEvent || uidEvent++;
}

function getEvent(element) {
  var uid = getUidEvent(element);
  element.uidEvent = uid;
  eventRegistry[uid] = eventRegistry[uid] || {};
  return eventRegistry[uid];
}

function bootstrapHandler(element, fn) {
  return function handler(event) {
    if (handler.oneOff) {
      EventHandler.off(element, event.type, fn);
    }

    return fn.apply(element, [event]);
  };
}

function bootstrapDelegationHandler(element, selector, fn) {
  return function handler(event) {
    var domElements = element.querySelectorAll(selector);

    for (var target = event.target; target && target !== this; target = target.parentNode) {
      for (var i = domElements.length; i--;) {
        if (domElements[i] === target) {
          if (handler.oneOff) {
            EventHandler.off(element, event.type, fn);
          }

          return fn.apply(target, [event]);
        }
      }
    } // To please ESLint


    return null;
  };
}

function findHandler(events, handler, delegationSelector) {
  if (delegationSelector === void 0) {
    delegationSelector = null;
  }

  var uidEventList = Object.keys(events);

  for (var i = 0, len = uidEventList.length; i < len; i++) {
    var event = events[uidEventList[i]];

    if (event.originalHandler === handler && event.delegationSelector === delegationSelector) {
      return event;
    }
  }

  return null;
}

function normalizeParams(originalTypeEvent, handler, delegationFn) {
  var delegation = typeof handler === 'string';
  var originalHandler = delegation ? delegationFn : handler; // allow to get the native events from namespaced events ('click.coreui.button' --> 'click')

  var typeEvent = originalTypeEvent.replace(stripNameRegex, '');
  var custom = customEvents[typeEvent];

  if (custom) {
    typeEvent = custom;
  }

  var isNative = nativeEvents.indexOf(typeEvent) > -1;

  if (!isNative) {
    typeEvent = originalTypeEvent;
  }

  return [delegation, originalHandler, typeEvent];
}

function addHandler(element, originalTypeEvent, handler, delegationFn, oneOff) {
  if (typeof originalTypeEvent !== 'string' || !element) {
    return;
  }

  if (!handler) {
    handler = delegationFn;
    delegationFn = null;
  }

  var _normalizeParams = normalizeParams(originalTypeEvent, handler, delegationFn),
      delegation = _normalizeParams[0],
      originalHandler = _normalizeParams[1],
      typeEvent = _normalizeParams[2];

  var events = getEvent(element);
  var handlers = events[typeEvent] || (events[typeEvent] = {});
  var previousFn = findHandler(handlers, originalHandler, delegation ? handler : null);

  if (previousFn) {
    previousFn.oneOff = previousFn.oneOff && oneOff;
    return;
  }

  var uid = getUidEvent(originalHandler, originalTypeEvent.replace(namespaceRegex, ''));
  var fn = delegation ? bootstrapDelegationHandler(element, handler, delegationFn) : bootstrapHandler(element, handler);
  fn.delegationSelector = delegation ? handler : null;
  fn.originalHandler = originalHandler;
  fn.oneOff = oneOff;
  fn.uidEvent = uid;
  handlers[uid] = fn;
  element.addEventListener(typeEvent, fn, delegation);
}

function removeHandler(element, events, typeEvent, handler, delegationSelector) {
  var fn = findHandler(events[typeEvent], handler, delegationSelector);

  if (!fn) {
    return;
  }

  element.removeEventListener(typeEvent, fn, Boolean(delegationSelector));
  delete events[typeEvent][fn.uidEvent];
}

function removeNamespacedHandlers(element, events, typeEvent, namespace) {
  var storeElementEvent = events[typeEvent] || {};
  Object.keys(storeElementEvent).forEach(function (handlerKey) {
    if (handlerKey.indexOf(namespace) > -1) {
      var event = storeElementEvent[handlerKey];
      removeHandler(element, events, typeEvent, event.originalHandler, event.delegationSelector);
    }
  });
}

var EventHandler = {
  on: function on(element, event, handler, delegationFn) {
    addHandler(element, event, handler, delegationFn, false);
  },
  one: function one(element, event, handler, delegationFn) {
    addHandler(element, event, handler, delegationFn, true);
  },
  off: function off(element, originalTypeEvent, handler, delegationFn) {
    if (typeof originalTypeEvent !== 'string' || !element) {
      return;
    }

    var _normalizeParams2 = normalizeParams(originalTypeEvent, handler, delegationFn),
        delegation = _normalizeParams2[0],
        originalHandler = _normalizeParams2[1],
        typeEvent = _normalizeParams2[2];

    var inNamespace = typeEvent !== originalTypeEvent;
    var events = getEvent(element);
    var isNamespace = originalTypeEvent.charAt(0) === '.';

    if (typeof originalHandler !== 'undefined') {
      // Simplest case: handler is passed, remove that listener ONLY.
      if (!events || !events[typeEvent]) {
        return;
      }

      removeHandler(element, events, typeEvent, originalHandler, delegation ? handler : null);
      return;
    }

    if (isNamespace) {
      Object.keys(events).forEach(function (elementEvent) {
        removeNamespacedHandlers(element, events, elementEvent, originalTypeEvent.slice(1));
      });
    }

    var storeElementEvent = events[typeEvent] || {};
    Object.keys(storeElementEvent).forEach(function (keyHandlers) {
      var handlerKey = keyHandlers.replace(stripUidRegex, '');

      if (!inNamespace || originalTypeEvent.indexOf(handlerKey) > -1) {
        var event = storeElementEvent[keyHandlers];
        removeHandler(element, events, typeEvent, event.originalHandler, event.delegationSelector);
      }
    });
  },
  trigger: function trigger(element, event, args) {
    if (typeof event !== 'string' || !element) {
      return null;
    }

    var typeEvent = event.replace(stripNameRegex, '');
    var inNamespace = event !== typeEvent;
    var isNative = nativeEvents.indexOf(typeEvent) > -1;
    var jQueryEvent;
    var bubbles = true;
    var nativeDispatch = true;
    var defaultPrevented = false;
    var evt = null;

    if (inNamespace && $) {
      jQueryEvent = $.Event(event, args);
      $(element).trigger(jQueryEvent);
      bubbles = !jQueryEvent.isPropagationStopped();
      nativeDispatch = !jQueryEvent.isImmediatePropagationStopped();
      defaultPrevented = jQueryEvent.isDefaultPrevented();
    }

    if (isNative) {
      evt = document.createEvent('HTMLEvents');
      evt.initEvent(typeEvent, bubbles, true);
    } else {
      evt = new CustomEvent(event, {
        bubbles: bubbles,
        cancelable: true
      });
    } // merge custom informations in our event


    if (typeof args !== 'undefined') {
      Object.keys(args).forEach(function (key) {
        Object.defineProperty(evt, key, {
          get: function get() {
            return args[key];
          }
        });
      });
    }

    if (defaultPrevented) {
      evt.preventDefault();

      if (!defaultPreventedPreservedOnDispatch) {
        Object.defineProperty(evt, 'defaultPrevented', {
          get: function get() {
            return true;
          }
        });
      }
    }

    if (nativeDispatch) {
      element.dispatchEvent(evt);
    }

    if (evt.defaultPrevented && typeof jQueryEvent !== 'undefined') {
      jQueryEvent.preventDefault();
    }

    return evt;
  }
};

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME = 'asyncLoad';
var VERSION = '3.2.0';
var DATA_KEY = 'coreui.asyncLoad';
var EVENT_KEY = "." + DATA_KEY;
var DATA_API_KEY = '.data-api';
var CLASS_NAME_ACTIVE = 'c-active';
var CLASS_NAME_NAV_DROPDOWN_TOGGLE = 'c-sidebar-nav-dropdown-toggle';
var CLASS_NAME_NAV_LINK = 'c-sidebar-nav-link';
var CLASS_NAME_SHOW = 'c-show';
var CLASS_NAME_VIEW_SCRIPT = 'view-script';
var EVENT_CLICK_DATA_API = "click" + EVENT_KEY + DATA_API_KEY;
var EVENT_XHR_STATUS = 'xhr';
var SELECTOR_NAV_DROPDOWN = '.c-sidebar-nav-dropdown';
var SELECTOR_NAV_LINK = '.c-xhr-link, .c-sidebar-nav-link';
var SELECTOR_NAV_ITEM = '.c-sidebar-nav-item';
var SELECTOR_VIEW_SCRIPT = '.view-script';
var Default = {
  defaultPage: 'main.html',
  errorPage: '404.html',
  subpagesDirectory: 'views/'
};

var AsyncLoad = /*#__PURE__*/function () {
  function AsyncLoad(element, config) {
    this._config = this._getConfig(config);
    this._element = element; // eslint-disable-next-line no-restricted-globals

    var url = location.hash.replace(/^#/, ''); // eslint-disable-next-line no-negated-condition

    if (url !== '') {
      this._setUpUrl(url);
    } else {
      this._setUpUrl(this._config.defaultPage);
    }

    this._addEventListeners();
  } // Getters


  var _proto = AsyncLoad.prototype;

  // Private
  _proto._getConfig = function _getConfig(config) {
    config = _objectSpread2(_objectSpread2({}, Default), config);
    return config;
  };

  _proto._loadPage = function _loadPage(url) {
    var _this = this;

    var element = this._element;
    var config = this._config;

    var loadScripts = function loadScripts(src, element) {
      if (element === void 0) {
        element = 0;
      }

      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = src[element];
      script.className = CLASS_NAME_VIEW_SCRIPT; // eslint-disable-next-line no-multi-assign, unicorn/prefer-add-event-listener

      script.onload = script.onreadystatechange = function () {
        if (!_this.readyState || _this.readyState === 'complete') {
          if (src.length > element + 1) {
            loadScripts(src, element + 1);
          }
        }
      };

      var body = document.getElementsByTagName('body')[0];
      body.appendChild(script);
    };

    var removeScripts = function removeScripts() {
      var oldScripts = document.querySelectorAll(SELECTOR_VIEW_SCRIPT);

      if (oldScripts.length) {
        oldScripts.forEach(function (oldScript) {
          oldScript.remove();
        });
      }
    };

    var xhr = new XMLHttpRequest();
    xhr.open('GET', config.subpagesDirectory + url);
    var event = new CustomEvent(EVENT_XHR_STATUS, {
      detail: {
        url: url,
        status: xhr.status
      }
    });
    element.dispatchEvent(event); // eslint-disable-next-line unicorn/prefer-add-event-listener

    xhr.onload = function (result) {
      if (xhr.status === 200) {
        event = new CustomEvent(EVENT_XHR_STATUS, {
          detail: {
            url: url,
            status: xhr.status
          }
        });
        element.dispatchEvent(event);
        var wrapper = document.createElement('div');
        wrapper.innerHTML = result.target.response; // eslint-disable-next-line unicorn/prefer-spread

        var scripts = Array.from(wrapper.querySelectorAll('script')).map(function (script) {
          return script.attributes.getNamedItem('src').nodeValue;
        });
        wrapper.querySelectorAll('script').forEach(function (script) {
          return script.remove(script);
        });
        window.scrollTo(0, 0);
        element.innerHTML = '';
        element.appendChild(wrapper);
        removeScripts();

        if (scripts.length) {
          loadScripts(scripts);
        }

        window.location.hash = url;
      } else {
        window.location.href = config.errorPage;
      }
    };

    xhr.send();
  };

  _proto._setUpUrl = function _setUpUrl(url) {
    url = url.replace(/^\//, '').split('?')[0]; // eslint-disable-next-line unicorn/prefer-spread

    Array.from(document.querySelectorAll(SELECTOR_NAV_LINK)).forEach(function (element) {
      element.classList.remove(CLASS_NAME_ACTIVE);
    }); // eslint-disable-next-line unicorn/prefer-spread

    Array.from(document.querySelectorAll(SELECTOR_NAV_LINK)).forEach(function (element) {
      element.classList.remove(CLASS_NAME_ACTIVE);
    }); // eslint-disable-next-line unicorn/prefer-spread

    Array.from(document.querySelectorAll(SELECTOR_NAV_DROPDOWN)).forEach(function (element) {
      element.classList.remove(CLASS_NAME_SHOW);
    }); // eslint-disable-next-line unicorn/prefer-spread

    Array.from(document.querySelectorAll(SELECTOR_NAV_DROPDOWN)).forEach(function (element) {
      // eslint-disable-next-line unicorn/prefer-spread
      if (Array.from(element.querySelectorAll("a[href*=\"" + url + "\"]")).length > 0) {
        element.classList.add(CLASS_NAME_SHOW);
      }
    }); // eslint-disable-next-line unicorn/prefer-spread

    Array.from(document.querySelectorAll(SELECTOR_NAV_ITEM + " a[href*=\"" + url + "\"]")).forEach(function (element) {
      element.classList.add(CLASS_NAME_ACTIVE);
    });

    this._loadPage(url);
  };

  _proto._loadBlank = function _loadBlank(url) {
    window.open(url);
  };

  _proto._loadTop = function _loadTop(url) {
    window.location = url;
  };

  _proto._update = function _update(link) {
    if (link.href !== '#') {
      if (typeof link.dataset.toggle === 'undefined' || link.dataset.toggle === 'null') {
        if (link.target === '_top') {
          this._loadTop(link.href);
        } else if (link.target === '_blank') {
          this._loadBlank(link.href);
        } else {
          this._setUpUrl(link.getAttribute('href'));
        }
      }
    }
  };

  _proto._addEventListeners = function _addEventListeners() {
    var _this2 = this;

    EventHandler.on(document, EVENT_CLICK_DATA_API, SELECTOR_NAV_LINK, function (event) {
      event.preventDefault();
      var link = event.target;

      if (!link.classList.contains(CLASS_NAME_NAV_LINK)) {
        link = link.closest(SELECTOR_NAV_LINK);
      }

      if (!link.classList.contains(CLASS_NAME_NAV_DROPDOWN_TOGGLE) && link.getAttribute('href') !== '#') {
        _this2._update(link);
      }
    });
  } // Static
  ;

  AsyncLoad._asyncLoadInterface = function _asyncLoadInterface(element, config) {
    var data = Data.getData(element, DATA_KEY);

    var _config = typeof config === 'object' && config;

    if (!data) {
      data = new AsyncLoad(element, _config);
    }

    if (typeof config === 'string') {
      if (typeof data[config] === 'undefined') {
        throw new TypeError("No method named \"" + config + "\"");
      }

      data[config]();
    }
  };

  AsyncLoad.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      AsyncLoad._asyncLoadInterface(this, config);
    });
  };

  _createClass(AsyncLoad, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default;
    }
  }]);

  return AsyncLoad;
}();

var $$1 = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .asyncLoad to jQuery only if jQuery is present
 */

if ($$1) {
  var JQUERY_NO_CONFLICT = $$1.fn[NAME];
  $$1.fn[NAME] = AsyncLoad.jQueryInterface;
  $$1.fn[NAME].Constructor = AsyncLoad;

  $$1.fn[NAME].noConflict = function () {
    $$1.fn[NAME] = JQUERY_NO_CONFLICT;
    return AsyncLoad.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$1 = 'alert';
var VERSION$1 = '3.2.0';
var DATA_KEY$1 = 'coreui.alert';
var EVENT_KEY$1 = "." + DATA_KEY$1;
var DATA_API_KEY$1 = '.data-api';
var SELECTOR_DISMISS = '[data-dismiss="alert"]';
var EVENT_CLOSE = "close" + EVENT_KEY$1;
var EVENT_CLOSED = "closed" + EVENT_KEY$1;
var EVENT_CLICK_DATA_API$1 = "click" + EVENT_KEY$1 + DATA_API_KEY$1;
var CLASSNAME_ALERT = 'alert';
var CLASSNAME_FADE = 'fade';
var CLASSNAME_SHOW = 'show';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Alert = /*#__PURE__*/function () {
  function Alert(element) {
    this._element = element;

    if (this._element) {
      Data.setData(element, DATA_KEY$1, this);
    }
  } // Getters


  var _proto = Alert.prototype;

  // Public
  _proto.close = function close(element) {
    var rootElement = this._element;

    if (element) {
      rootElement = this._getRootElement(element);
    }

    var customEvent = this._triggerCloseEvent(rootElement);

    if (customEvent === null || customEvent.defaultPrevented) {
      return;
    }

    this._removeElement(rootElement);
  };

  _proto.dispose = function dispose() {
    Data.removeData(this._element, DATA_KEY$1);
    this._element = null;
  } // Private
  ;

  _proto._getRootElement = function _getRootElement(element) {
    return getElementFromSelector(element) || element.closest("." + CLASSNAME_ALERT);
  };

  _proto._triggerCloseEvent = function _triggerCloseEvent(element) {
    return EventHandler.trigger(element, EVENT_CLOSE);
  };

  _proto._removeElement = function _removeElement(element) {
    var _this = this;

    element.classList.remove(CLASSNAME_SHOW);

    if (!element.classList.contains(CLASSNAME_FADE)) {
      this._destroyElement(element);

      return;
    }

    var transitionDuration = getTransitionDurationFromElement(element);
    EventHandler.one(element, TRANSITION_END, function () {
      return _this._destroyElement(element);
    });
    emulateTransitionEnd(element, transitionDuration);
  };

  _proto._destroyElement = function _destroyElement(element) {
    if (element.parentNode) {
      element.parentNode.removeChild(element);
    }

    EventHandler.trigger(element, EVENT_CLOSED);
  } // Static
  ;

  Alert.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      var data = Data.getData(this, DATA_KEY$1);

      if (!data) {
        data = new Alert(this);
      }

      if (config === 'close') {
        data[config](this);
      }
    });
  };

  Alert.handleDismiss = function handleDismiss(alertInstance) {
    return function (event) {
      if (event) {
        event.preventDefault();
      }

      alertInstance.close(this);
    };
  };

  Alert.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$1);
  };

  _createClass(Alert, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$1;
    }
  }]);

  return Alert;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(document, EVENT_CLICK_DATA_API$1, SELECTOR_DISMISS, Alert.handleDismiss(new Alert()));
var $$2 = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .alert to jQuery only if jQuery is present
 */

/* istanbul ignore if */

if ($$2) {
  var JQUERY_NO_CONFLICT$1 = $$2.fn[NAME$1];
  $$2.fn[NAME$1] = Alert.jQueryInterface;
  $$2.fn[NAME$1].Constructor = Alert;

  $$2.fn[NAME$1].noConflict = function () {
    $$2.fn[NAME$1] = JQUERY_NO_CONFLICT$1;
    return Alert.jQueryInterface;
  };
}

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v5.0.0-alpha1): dom/selector-engine.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */
/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NODE_TEXT = 3;
var SelectorEngine = {
  matches: function matches(element, selector) {
    return element.matches(selector);
  },
  find: function find$1(selector, element) {
    var _ref;

    if (element === void 0) {
      element = document.documentElement;
    }

    return (_ref = []).concat.apply(_ref, find.call(element, selector));
  },
  findOne: function findOne$1(selector, element) {
    if (element === void 0) {
      element = document.documentElement;
    }

    return findOne.call(element, selector);
  },
  children: function children(element, selector) {
    var _ref2;

    var children = (_ref2 = []).concat.apply(_ref2, element.children);

    return children.filter(function (child) {
      return child.matches(selector);
    });
  },
  parents: function parents(element, selector) {
    var parents = [];
    var ancestor = element.parentNode;

    while (ancestor && ancestor.nodeType === Node.ELEMENT_NODE && ancestor.nodeType !== NODE_TEXT) {
      if (this.matches(ancestor, selector)) {
        parents.push(ancestor);
      }

      ancestor = ancestor.parentNode;
    }

    return parents;
  },
  prev: function prev(element, selector) {
    var previous = element.previousElementSibling;

    while (previous) {
      if (previous.matches(selector)) {
        return [previous];
      }

      previous = previous.previousElementSibling;
    }

    return [];
  },
  next: function next(element, selector) {
    var next = element.nextElementSibling;

    while (next) {
      if (this.matches(next, selector)) {
        return [next];
      }

      next = next.nextElementSibling;
    }

    return [];
  }
};

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$2 = 'button';
var VERSION$2 = '3.2.0';
var DATA_KEY$2 = 'coreui.button';
var EVENT_KEY$2 = "." + DATA_KEY$2;
var DATA_API_KEY$2 = '.data-api';
var CLASS_NAME_ACTIVE$1 = 'active';
var CLASS_NAME_DISABLED = 'disabled';
var CLASS_NAME_FOCUS = 'focus';
var SELECTOR_DATA_TOGGLE_CARROT = '[data-toggle^="button"]';
var SELECTOR_DATA_TOGGLE = '[data-toggle="buttons"]';
var SELECTOR_INPUT = 'input:not([type="hidden"])';
var SELECTOR_ACTIVE = '.active';
var SELECTOR_BUTTON = '.btn';
var EVENT_CLICK_DATA_API$2 = "click" + EVENT_KEY$2 + DATA_API_KEY$2;
var EVENT_FOCUS_DATA_API = "focus" + EVENT_KEY$2 + DATA_API_KEY$2;
var EVENT_BLUR_DATA_API = "blur" + EVENT_KEY$2 + DATA_API_KEY$2;
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Button = /*#__PURE__*/function () {
  function Button(element) {
    this._element = element;
    Data.setData(element, DATA_KEY$2, this);
  } // Getters


  var _proto = Button.prototype;

  // Public
  _proto.toggle = function toggle() {
    var triggerChangeEvent = true;
    var addAriaPressed = true;

    var rootElement = this._element.closest(SELECTOR_DATA_TOGGLE);

    if (rootElement) {
      var input = SelectorEngine.findOne(SELECTOR_INPUT, this._element);

      if (input && input.type === 'radio') {
        if (input.checked && this._element.classList.contains(CLASS_NAME_ACTIVE$1)) {
          triggerChangeEvent = false;
        } else {
          var activeElement = SelectorEngine.findOne(SELECTOR_ACTIVE, rootElement);

          if (activeElement) {
            activeElement.classList.remove(CLASS_NAME_ACTIVE$1);
          }
        }

        if (triggerChangeEvent) {
          if (input.hasAttribute('disabled') || rootElement.hasAttribute('disabled') || input.classList.contains(CLASS_NAME_DISABLED) || rootElement.classList.contains(CLASS_NAME_DISABLED)) {
            return;
          }

          input.checked = !this._element.classList.contains(CLASS_NAME_ACTIVE$1);
          EventHandler.trigger(input, 'change');
        }

        input.focus();
        addAriaPressed = false;
      }
    }

    if (addAriaPressed) {
      this._element.setAttribute('aria-pressed', !this._element.classList.contains(CLASS_NAME_ACTIVE$1));
    }

    if (triggerChangeEvent) {
      this._element.classList.toggle(CLASS_NAME_ACTIVE$1);
    }
  };

  _proto.dispose = function dispose() {
    Data.removeData(this._element, DATA_KEY$2);
    this._element = null;
  } // Static
  ;

  Button.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      var data = Data.getData(this, DATA_KEY$2);

      if (!data) {
        data = new Button(this);
      }

      if (config === 'toggle') {
        data[config]();
      }
    });
  };

  Button.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$2);
  };

  _createClass(Button, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$2;
    }
  }]);

  return Button;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(document, EVENT_CLICK_DATA_API$2, SELECTOR_DATA_TOGGLE_CARROT, function (event) {
  event.preventDefault();
  var button = event.target.closest(SELECTOR_BUTTON);
  var data = Data.getData(button, DATA_KEY$2);

  if (!data) {
    data = new Button(button);
  }

  data.toggle();
});
EventHandler.on(document, EVENT_FOCUS_DATA_API, SELECTOR_DATA_TOGGLE_CARROT, function (event) {
  var button = event.target.closest(SELECTOR_BUTTON);

  if (button) {
    button.classList.add(CLASS_NAME_FOCUS);
  }
});
EventHandler.on(document, EVENT_BLUR_DATA_API, SELECTOR_DATA_TOGGLE_CARROT, function (event) {
  var button = event.target.closest(SELECTOR_BUTTON);

  if (button) {
    button.classList.remove(CLASS_NAME_FOCUS);
  }
});
var $$3 = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .button to jQuery only if jQuery is present
 */

/* istanbul ignore if */

if ($$3) {
  var JQUERY_NO_CONFLICT$2 = $$3.fn[NAME$2];
  $$3.fn[NAME$2] = Button.jQueryInterface;
  $$3.fn[NAME$2].Constructor = Button;

  $$3.fn[NAME$2].noConflict = function () {
    $$3.fn[NAME$2] = JQUERY_NO_CONFLICT$2;
    return Button.jQueryInterface;
  };
}

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v5.0.0-alpha1): dom/manipulator.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */
function normalizeData(val) {
  if (val === 'true') {
    return true;
  }

  if (val === 'false') {
    return false;
  }

  if (val === Number(val).toString()) {
    return Number(val);
  }

  if (val === '' || val === 'null') {
    return null;
  }

  return val;
}

function normalizeDataKey(key) {
  return key.replace(/[A-Z]/g, function (chr) {
    return "-" + chr.toLowerCase();
  });
}

var Manipulator = {
  setDataAttribute: function setDataAttribute(element, key, value) {
    element.setAttribute("data-" + normalizeDataKey(key), value);
  },
  removeDataAttribute: function removeDataAttribute(element, key) {
    element.removeAttribute("data-" + normalizeDataKey(key));
  },
  getDataAttributes: function getDataAttributes(element) {
    if (!element) {
      return {};
    }

    var attributes = _objectSpread2({}, element.dataset);

    Object.keys(attributes).forEach(function (key) {
      attributes[key] = normalizeData(attributes[key]);
    });
    return attributes;
  },
  getDataAttribute: function getDataAttribute(element, key) {
    return normalizeData(element.getAttribute("data-" + normalizeDataKey(key)));
  },
  offset: function offset(element) {
    var rect = element.getBoundingClientRect();
    return {
      top: rect.top + document.body.scrollTop,
      left: rect.left + document.body.scrollLeft
    };
  },
  position: function position(element) {
    return {
      top: element.offsetTop,
      left: element.offsetLeft
    };
  },
  toggleClass: function toggleClass(element, className) {
    if (!element) {
      return;
    }

    if (element.classList.contains(className)) {
      element.classList.remove(className);
    } else {
      element.classList.add(className);
    }
  }
};

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$3 = 'carousel';
var VERSION$3 = '3.2.0';
var DATA_KEY$3 = 'coreui.carousel';
var EVENT_KEY$3 = "." + DATA_KEY$3;
var DATA_API_KEY$3 = '.data-api';
var ARROW_LEFT_KEY = 'ArrowLeft';
var ARROW_RIGHT_KEY = 'ArrowRight';
var TOUCHEVENT_COMPAT_WAIT = 500; // Time for mouse compat events to fire after touch

var SWIPE_THRESHOLD = 40;
var Default$1 = {
  interval: 5000,
  keyboard: true,
  slide: false,
  pause: 'hover',
  wrap: true,
  touch: true
};
var DefaultType = {
  interval: '(number|boolean)',
  keyboard: 'boolean',
  slide: '(boolean|string)',
  pause: '(string|boolean)',
  wrap: 'boolean',
  touch: 'boolean'
};
var DIRECTION_NEXT = 'next';
var DIRECTION_PREV = 'prev';
var DIRECTION_LEFT = 'left';
var DIRECTION_RIGHT = 'right';
var EVENT_SLIDE = "slide" + EVENT_KEY$3;
var EVENT_SLID = "slid" + EVENT_KEY$3;
var EVENT_KEYDOWN = "keydown" + EVENT_KEY$3;
var EVENT_MOUSEENTER = "mouseenter" + EVENT_KEY$3;
var EVENT_MOUSELEAVE = "mouseleave" + EVENT_KEY$3;
var EVENT_TOUCHSTART = "touchstart" + EVENT_KEY$3;
var EVENT_TOUCHMOVE = "touchmove" + EVENT_KEY$3;
var EVENT_TOUCHEND = "touchend" + EVENT_KEY$3;
var EVENT_POINTERDOWN = "pointerdown" + EVENT_KEY$3;
var EVENT_POINTERUP = "pointerup" + EVENT_KEY$3;
var EVENT_DRAG_START = "dragstart" + EVENT_KEY$3;
var EVENT_LOAD_DATA_API = "load" + EVENT_KEY$3 + DATA_API_KEY$3;
var EVENT_CLICK_DATA_API$3 = "click" + EVENT_KEY$3 + DATA_API_KEY$3;
var CLASS_NAME_CAROUSEL = 'carousel';
var CLASS_NAME_ACTIVE$2 = 'active';
var CLASS_NAME_SLIDE = 'slide';
var CLASS_NAME_RIGHT = 'carousel-item-right';
var CLASS_NAME_LEFT = 'carousel-item-left';
var CLASS_NAME_NEXT = 'carousel-item-next';
var CLASS_NAME_PREV = 'carousel-item-prev';
var CLASS_NAME_POINTER_EVENT = 'pointer-event';
var SELECTOR_ACTIVE$1 = '.active';
var SELECTOR_ACTIVE_ITEM = '.active.carousel-item';
var SELECTOR_ITEM = '.carousel-item';
var SELECTOR_ITEM_IMG = '.carousel-item img';
var SELECTOR_NEXT_PREV = '.carousel-item-next, .carousel-item-prev';
var SELECTOR_INDICATORS = '.carousel-indicators';
var SELECTOR_DATA_SLIDE = '[data-slide], [data-slide-to]';
var SELECTOR_DATA_RIDE = '[data-ride="carousel"]';
var PointerType = {
  TOUCH: 'touch',
  PEN: 'pen'
};
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Carousel = /*#__PURE__*/function () {
  function Carousel(element, config) {
    this._items = null;
    this._interval = null;
    this._activeElement = null;
    this._isPaused = false;
    this._isSliding = false;
    this.touchTimeout = null;
    this.touchStartX = 0;
    this.touchDeltaX = 0;
    this._config = this._getConfig(config);
    this._element = element;
    this._indicatorsElement = SelectorEngine.findOne(SELECTOR_INDICATORS, this._element);
    this._touchSupported = 'ontouchstart' in document.documentElement || navigator.maxTouchPoints > 0;
    this._pointerEvent = Boolean(window.PointerEvent || window.MSPointerEvent);

    this._addEventListeners();

    Data.setData(element, DATA_KEY$3, this);
  } // Getters


  var _proto = Carousel.prototype;

  // Public
  _proto.next = function next() {
    if (!this._isSliding) {
      this._slide(DIRECTION_NEXT);
    }
  };

  _proto.nextWhenVisible = function nextWhenVisible() {
    // Don't call next when the page isn't visible
    // or the carousel or its parent isn't visible
    if (!document.hidden && isVisible(this._element)) {
      this.next();
    }
  };

  _proto.prev = function prev() {
    if (!this._isSliding) {
      this._slide(DIRECTION_PREV);
    }
  };

  _proto.pause = function pause(event) {
    if (!event) {
      this._isPaused = true;
    }

    if (SelectorEngine.findOne(SELECTOR_NEXT_PREV, this._element)) {
      triggerTransitionEnd(this._element);
      this.cycle(true);
    }

    clearInterval(this._interval);
    this._interval = null;
  };

  _proto.cycle = function cycle(event) {
    if (!event) {
      this._isPaused = false;
    }

    if (this._interval) {
      clearInterval(this._interval);
      this._interval = null;
    }

    if (this._config && this._config.interval && !this._isPaused) {
      this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval);
    }
  };

  _proto.to = function to(index) {
    var _this = this;

    this._activeElement = SelectorEngine.findOne(SELECTOR_ACTIVE_ITEM, this._element);

    var activeIndex = this._getItemIndex(this._activeElement);

    if (index > this._items.length - 1 || index < 0) {
      return;
    }

    if (this._isSliding) {
      EventHandler.one(this._element, EVENT_SLID, function () {
        return _this.to(index);
      });
      return;
    }

    if (activeIndex === index) {
      this.pause();
      this.cycle();
      return;
    }

    var direction = index > activeIndex ? DIRECTION_NEXT : DIRECTION_PREV;

    this._slide(direction, this._items[index]);
  };

  _proto.dispose = function dispose() {
    EventHandler.off(this._element, EVENT_KEY$3);
    Data.removeData(this._element, DATA_KEY$3);
    this._items = null;
    this._config = null;
    this._element = null;
    this._interval = null;
    this._isPaused = null;
    this._isSliding = null;
    this._activeElement = null;
    this._indicatorsElement = null;
  } // Private
  ;

  _proto._getConfig = function _getConfig(config) {
    config = _objectSpread2(_objectSpread2({}, Default$1), config);
    typeCheckConfig(NAME$3, config, DefaultType);
    return config;
  };

  _proto._handleSwipe = function _handleSwipe() {
    var absDeltax = Math.abs(this.touchDeltaX);

    if (absDeltax <= SWIPE_THRESHOLD) {
      return;
    }

    var direction = absDeltax / this.touchDeltaX;
    this.touchDeltaX = 0; // swipe left

    if (direction > 0) {
      this.prev();
    } // swipe right


    if (direction < 0) {
      this.next();
    }
  };

  _proto._addEventListeners = function _addEventListeners() {
    var _this2 = this;

    if (this._config.keyboard) {
      EventHandler.on(this._element, EVENT_KEYDOWN, function (event) {
        return _this2._keydown(event);
      });
    }

    if (this._config.pause === 'hover') {
      EventHandler.on(this._element, EVENT_MOUSEENTER, function (event) {
        return _this2.pause(event);
      });
      EventHandler.on(this._element, EVENT_MOUSELEAVE, function (event) {
        return _this2.cycle(event);
      });
    }

    if (this._config.touch && this._touchSupported) {
      this._addTouchEventListeners();
    }
  };

  _proto._addTouchEventListeners = function _addTouchEventListeners() {
    var _this3 = this;

    var start = function start(event) {
      if (_this3._pointerEvent && PointerType[event.pointerType.toUpperCase()]) {
        _this3.touchStartX = event.clientX;
      } else if (!_this3._pointerEvent) {
        _this3.touchStartX = event.touches[0].clientX;
      }
    };

    var move = function move(event) {
      // ensure swiping with one touch and not pinching
      if (event.touches && event.touches.length > 1) {
        _this3.touchDeltaX = 0;
      } else {
        _this3.touchDeltaX = event.touches[0].clientX - _this3.touchStartX;
      }
    };

    var end = function end(event) {
      if (_this3._pointerEvent && PointerType[event.pointerType.toUpperCase()]) {
        _this3.touchDeltaX = event.clientX - _this3.touchStartX;
      }

      _this3._handleSwipe();

      if (_this3._config.pause === 'hover') {
        // If it's a touch-enabled device, mouseenter/leave are fired as
        // part of the mouse compatibility events on first tap - the carousel
        // would stop cycling until user tapped out of it;
        // here, we listen for touchend, explicitly pause the carousel
        // (as if it's the second time we tap on it, mouseenter compat event
        // is NOT fired) and after a timeout (to allow for mouse compatibility
        // events to fire) we explicitly restart cycling
        _this3.pause();

        if (_this3.touchTimeout) {
          clearTimeout(_this3.touchTimeout);
        }

        _this3.touchTimeout = setTimeout(function (event) {
          return _this3.cycle(event);
        }, TOUCHEVENT_COMPAT_WAIT + _this3._config.interval);
      }
    };

    SelectorEngine.find(SELECTOR_ITEM_IMG, this._element).forEach(function (itemImg) {
      EventHandler.on(itemImg, EVENT_DRAG_START, function (e) {
        return e.preventDefault();
      });
    });

    if (this._pointerEvent) {
      EventHandler.on(this._element, EVENT_POINTERDOWN, function (event) {
        return start(event);
      });
      EventHandler.on(this._element, EVENT_POINTERUP, function (event) {
        return end(event);
      });

      this._element.classList.add(CLASS_NAME_POINTER_EVENT);
    } else {
      EventHandler.on(this._element, EVENT_TOUCHSTART, function (event) {
        return start(event);
      });
      EventHandler.on(this._element, EVENT_TOUCHMOVE, function (event) {
        return move(event);
      });
      EventHandler.on(this._element, EVENT_TOUCHEND, function (event) {
        return end(event);
      });
    }
  };

  _proto._keydown = function _keydown(event) {
    if (/input|textarea/i.test(event.target.tagName)) {
      return;
    }

    switch (event.key) {
      case ARROW_LEFT_KEY:
        event.preventDefault();
        this.prev();
        break;

      case ARROW_RIGHT_KEY:
        event.preventDefault();
        this.next();
        break;
    }
  };

  _proto._getItemIndex = function _getItemIndex(element) {
    this._items = element && element.parentNode ? SelectorEngine.find(SELECTOR_ITEM, element.parentNode) : [];
    return this._items.indexOf(element);
  };

  _proto._getItemByDirection = function _getItemByDirection(direction, activeElement) {
    var isNextDirection = direction === DIRECTION_NEXT;
    var isPrevDirection = direction === DIRECTION_PREV;

    var activeIndex = this._getItemIndex(activeElement);

    var lastItemIndex = this._items.length - 1;
    var isGoingToWrap = isPrevDirection && activeIndex === 0 || isNextDirection && activeIndex === lastItemIndex;

    if (isGoingToWrap && !this._config.wrap) {
      return activeElement;
    }

    var delta = direction === DIRECTION_PREV ? -1 : 1;
    var itemIndex = (activeIndex + delta) % this._items.length;
    return itemIndex === -1 ? this._items[this._items.length - 1] : this._items[itemIndex];
  };

  _proto._triggerSlideEvent = function _triggerSlideEvent(relatedTarget, eventDirectionName) {
    var targetIndex = this._getItemIndex(relatedTarget);

    var fromIndex = this._getItemIndex(SelectorEngine.findOne(SELECTOR_ACTIVE_ITEM, this._element));

    return EventHandler.trigger(this._element, EVENT_SLIDE, {
      relatedTarget: relatedTarget,
      direction: eventDirectionName,
      from: fromIndex,
      to: targetIndex
    });
  };

  _proto._setActiveIndicatorElement = function _setActiveIndicatorElement(element) {
    if (this._indicatorsElement) {
      var indicators = SelectorEngine.find(SELECTOR_ACTIVE$1, this._indicatorsElement);

      for (var i = 0; i < indicators.length; i++) {
        indicators[i].classList.remove(CLASS_NAME_ACTIVE$2);
      }

      var nextIndicator = this._indicatorsElement.children[this._getItemIndex(element)];

      if (nextIndicator) {
        nextIndicator.classList.add(CLASS_NAME_ACTIVE$2);
      }
    }
  };

  _proto._slide = function _slide(direction, element) {
    var _this4 = this;

    var activeElement = SelectorEngine.findOne(SELECTOR_ACTIVE_ITEM, this._element);

    var activeElementIndex = this._getItemIndex(activeElement);

    var nextElement = element || activeElement && this._getItemByDirection(direction, activeElement);

    var nextElementIndex = this._getItemIndex(nextElement);

    var isCycling = Boolean(this._interval);
    var directionalClassName;
    var orderClassName;
    var eventDirectionName;

    if (direction === DIRECTION_NEXT) {
      directionalClassName = CLASS_NAME_LEFT;
      orderClassName = CLASS_NAME_NEXT;
      eventDirectionName = DIRECTION_LEFT;
    } else {
      directionalClassName = CLASS_NAME_RIGHT;
      orderClassName = CLASS_NAME_PREV;
      eventDirectionName = DIRECTION_RIGHT;
    }

    if (nextElement && nextElement.classList.contains(CLASS_NAME_ACTIVE$2)) {
      this._isSliding = false;
      return;
    }

    var slideEvent = this._triggerSlideEvent(nextElement, eventDirectionName);

    if (slideEvent.defaultPrevented) {
      return;
    }

    if (!activeElement || !nextElement) {
      // Some weirdness is happening, so we bail
      return;
    }

    this._isSliding = true;

    if (isCycling) {
      this.pause();
    }

    this._setActiveIndicatorElement(nextElement);

    if (this._element.classList.contains(CLASS_NAME_SLIDE)) {
      nextElement.classList.add(orderClassName);
      reflow(nextElement);
      activeElement.classList.add(directionalClassName);
      nextElement.classList.add(directionalClassName);
      var nextElementInterval = parseInt(nextElement.getAttribute('data-interval'), 10);

      if (nextElementInterval) {
        this._config.defaultInterval = this._config.defaultInterval || this._config.interval;
        this._config.interval = nextElementInterval;
      } else {
        this._config.interval = this._config.defaultInterval || this._config.interval;
      }

      var transitionDuration = getTransitionDurationFromElement(activeElement);
      EventHandler.one(activeElement, TRANSITION_END, function () {
        nextElement.classList.remove(directionalClassName, orderClassName);
        nextElement.classList.add(CLASS_NAME_ACTIVE$2);
        activeElement.classList.remove(CLASS_NAME_ACTIVE$2, orderClassName, directionalClassName);
        _this4._isSliding = false;
        setTimeout(function () {
          EventHandler.trigger(_this4._element, EVENT_SLID, {
            relatedTarget: nextElement,
            direction: eventDirectionName,
            from: activeElementIndex,
            to: nextElementIndex
          });
        }, 0);
      });
      emulateTransitionEnd(activeElement, transitionDuration);
    } else {
      activeElement.classList.remove(CLASS_NAME_ACTIVE$2);
      nextElement.classList.add(CLASS_NAME_ACTIVE$2);
      this._isSliding = false;
      EventHandler.trigger(this._element, EVENT_SLID, {
        relatedTarget: nextElement,
        direction: eventDirectionName,
        from: activeElementIndex,
        to: nextElementIndex
      });
    }

    if (isCycling) {
      this.cycle();
    }
  } // Static
  ;

  Carousel.carouselInterface = function carouselInterface(element, config) {
    var data = Data.getData(element, DATA_KEY$3);

    var _config = _objectSpread2(_objectSpread2({}, Default$1), Manipulator.getDataAttributes(element));

    if (typeof config === 'object') {
      _config = _objectSpread2(_objectSpread2({}, _config), config);
    }

    var action = typeof config === 'string' ? config : _config.slide;

    if (!data) {
      data = new Carousel(element, _config);
    }

    if (typeof config === 'number') {
      data.to(config);
    } else if (typeof action === 'string') {
      if (typeof data[action] === 'undefined') {
        throw new TypeError("No method named \"" + action + "\"");
      }

      data[action]();
    } else if (_config.interval && _config.ride) {
      data.pause();
      data.cycle();
    }
  };

  Carousel.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      Carousel.carouselInterface(this, config);
    });
  };

  Carousel.dataApiClickHandler = function dataApiClickHandler(event) {
    var target = getElementFromSelector(this);

    if (!target || !target.classList.contains(CLASS_NAME_CAROUSEL)) {
      return;
    }

    var config = _objectSpread2(_objectSpread2({}, Manipulator.getDataAttributes(target)), Manipulator.getDataAttributes(this));

    var slideIndex = this.getAttribute('data-slide-to');

    if (slideIndex) {
      config.interval = false;
    }

    Carousel.carouselInterface(target, config);

    if (slideIndex) {
      Data.getData(target, DATA_KEY$3).to(slideIndex);
    }

    event.preventDefault();
  };

  Carousel.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$3);
  };

  _createClass(Carousel, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$3;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default$1;
    }
  }]);

  return Carousel;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(document, EVENT_CLICK_DATA_API$3, SELECTOR_DATA_SLIDE, Carousel.dataApiClickHandler);
EventHandler.on(window, EVENT_LOAD_DATA_API, function () {
  var carousels = SelectorEngine.find(SELECTOR_DATA_RIDE);

  for (var i = 0, len = carousels.length; i < len; i++) {
    Carousel.carouselInterface(carousels[i], Data.getData(carousels[i], DATA_KEY$3));
  }
});
var $$4 = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .carousel to jQuery only if jQuery is present
 */

/* istanbul ignore if */

if ($$4) {
  var JQUERY_NO_CONFLICT$3 = $$4.fn[NAME$3];
  $$4.fn[NAME$3] = Carousel.jQueryInterface;
  $$4.fn[NAME$3].Constructor = Carousel;

  $$4.fn[NAME$3].noConflict = function () {
    $$4.fn[NAME$3] = JQUERY_NO_CONFLICT$3;
    return Carousel.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$4 = 'class-toggler';
var VERSION$4 = '3.2.0';
var DATA_KEY$4 = 'coreui.class-toggler';
var EVENT_KEY$4 = "." + DATA_KEY$4;
var DATA_API_KEY$4 = '.data-api';
var Default$2 = {
  breakpoints: '-sm,-md,-lg,-xl',
  postfix: '-show',
  responsive: false,
  target: 'body'
};
var CLASS_NAME_CLASS_TOGGLER = 'c-class-toggler';
var EVENT_CLASS_TOGGLE = 'classtoggle';
var EVENT_CLICK_DATA_API$4 = "click" + EVENT_KEY$4 + DATA_API_KEY$4;
var SELECTOR_CLASS_TOGGLER = '.c-class-toggler';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var ClassToggler = /*#__PURE__*/function () {
  function ClassToggler(element) {
    this._element = element;
  } // Getters


  var _proto = ClassToggler.prototype;

  // Public
  _proto.toggle = function toggle() {
    var _this = this;

    this._getElementDataAttributes(this._element).forEach(function (dataAttributes) {
      var element;
      var target = dataAttributes.target,
          toggle = dataAttributes.toggle;

      if (target === '_parent' || target === 'parent') {
        element = _this._element.parentNode;
      } else {
        element = document.querySelector(target);
      }

      toggle.forEach(function (object) {
        var className = object.className,
            responsive = object.responsive,
            postfix = object.postfix;
        var breakpoints = typeof object.breakpoints === 'undefined' || object.breakpoints === null ? null : _this._arrayFromString(object.breakpoints); // eslint-disable-next-line no-negated-condition

        if (!responsive) {
          var add = element.classList.toggle(className);
          var event = new CustomEvent(EVENT_CLASS_TOGGLE, {
            detail: {
              target: target,
              add: add,
              className: className
            }
          });
          element.dispatchEvent(event);
        } else {
          var currentBreakpoint;
          breakpoints.forEach(function (breakpoint) {
            if (className.includes(breakpoint)) {
              currentBreakpoint = breakpoint;
            }
          });
          var responsiveClassNames = [];

          if (typeof currentBreakpoint === 'undefined') {
            responsiveClassNames.push(className);
          } else {
            responsiveClassNames.push(className.replace("" + currentBreakpoint + postfix, postfix));
            breakpoints.splice(0, breakpoints.indexOf(currentBreakpoint) + 1).forEach(function (breakpoint) {
              responsiveClassNames.push(className.replace("" + currentBreakpoint + postfix, "" + breakpoint + postfix));
            });
          }

          var addResponsiveClasses = false;
          responsiveClassNames.forEach(function (responsiveClassName) {
            if (element.classList.contains(responsiveClassName)) {
              addResponsiveClasses = true;
            }
          });

          if (addResponsiveClasses) {
            responsiveClassNames.forEach(function (responsiveClassName) {
              element.classList.remove(responsiveClassName);
              var event = new CustomEvent(EVENT_CLASS_TOGGLE, {
                detail: {
                  target: target,
                  add: false,
                  className: responsiveClassName
                }
              });
              element.dispatchEvent(event);
            });
          } else {
            element.classList.add(className);

            var _event = new CustomEvent(EVENT_CLASS_TOGGLE, {
              detail: {
                target: target,
                add: true,
                className: className
              }
            });

            element.dispatchEvent(_event);
          }
        }
      });
    });
  } // Private
  ;

  _proto._arrayFromString = function _arrayFromString(string) {
    return string.replace(/ /g, '').split(',');
  };

  _proto._isArray = function _isArray(array) {
    try {
      JSON.parse(array.replace(/'/g, '"'));
      return true;
    } catch (_unused) {
      return false;
    }
  };

  _proto._convertToArray = function _convertToArray(array) {
    return JSON.parse(array.replace(/'/g, '"'));
  };

  _proto._getDataAttributes = function _getDataAttributes(data, attribute) {
    var dataAttribute = data[attribute];
    return this._isArray(dataAttribute) ? this._convertToArray(dataAttribute) : dataAttribute;
  };

  _proto._getToggleDetails = function _getToggleDetails(classNames, responsive, breakpoints, postfix) {
    var ToggleDetails = // eslint-disable-next-line default-param-last
    function ToggleDetails(className, responsive, breakpoints, postfix) {
      if (responsive === void 0) {
        responsive = Default$2.responsive;
      }

      this.className = className;
      this.responsive = responsive;
      this.breakpoints = breakpoints;
      this.postfix = postfix;
    };

    var toggle = [];

    if (Array.isArray(classNames)) {
      classNames.forEach(function (className, index) {
        responsive = Array.isArray(responsive) ? responsive[index] : responsive;
        breakpoints = responsive ? Array.isArray(breakpoints) ? breakpoints[index] : breakpoints : null;
        postfix = responsive ? Array.isArray(postfix) ? postfix[index] : postfix : null;
        toggle.push(new ToggleDetails(className, responsive, breakpoints, postfix));
      });
    } else {
      breakpoints = responsive ? breakpoints : null;
      postfix = responsive ? postfix : null;
      toggle.push(new ToggleDetails(classNames, responsive, breakpoints, postfix));
    }

    return toggle;
  };

  _proto._ifArray = function _ifArray(array, index) {
    return Array.isArray(array) ? array[index] : array;
  };

  _proto._getElementDataAttributes = function _getElementDataAttributes(element) {
    var _this2 = this;

    var data = element.dataset;
    var targets = typeof data.target === 'undefined' ? Default$2.target : this._getDataAttributes(data, 'target');
    var classNames = typeof data.class === 'undefined' ? 'undefined' : this._getDataAttributes(data, 'class');
    var responsive = typeof data.responsive === 'undefined' ? Default$2.responsive : this._getDataAttributes(data, 'responsive');
    var breakpoints = typeof data.breakpoints === 'undefined' ? Default$2.breakpoints : this._getDataAttributes(data, 'breakpoints');
    var postfix = typeof data.postfix === 'undefined' ? Default$2.postfix : this._getDataAttributes(data, 'postfix');
    var toggle = [];

    var TargetDetails = function TargetDetails(target, toggle) {
      this.target = target;
      this.toggle = toggle;
    };

    if (Array.isArray(targets)) {
      targets.forEach(function (target, index) {
        toggle.push(new TargetDetails(target, _this2._getToggleDetails(_this2._ifArray(classNames, index), _this2._ifArray(responsive, index), _this2._ifArray(breakpoints, index), _this2._ifArray(postfix, index))));
      });
    } else {
      toggle.push(new TargetDetails(targets, this._getToggleDetails(classNames, responsive, breakpoints, postfix)));
    }

    return toggle;
  } // Static
  ;

  ClassToggler._classTogglerInterface = function _classTogglerInterface(element, config) {
    var data = Data.getData(element, DATA_KEY$4);

    var _config = typeof config === 'object' && config;

    if (!data) {
      data = new ClassToggler(element, _config);
    }

    if (typeof config === 'string') {
      if (typeof data[config] === 'undefined') {
        throw new TypeError("No method named \"" + config + "\"");
      }

      data[config]();
    }
  };

  ClassToggler.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      ClassToggler._classTogglerInterface(this, config);
    });
  };

  _createClass(ClassToggler, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$4;
    }
  }]);

  return ClassToggler;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(document, EVENT_CLICK_DATA_API$4, SELECTOR_CLASS_TOGGLER, function (event) {
  event.preventDefault();
  var toggler = event.target;

  if (!toggler.classList.contains(CLASS_NAME_CLASS_TOGGLER)) {
    toggler = toggler.closest(SELECTOR_CLASS_TOGGLER);
  }

  ClassToggler._classTogglerInterface(toggler, 'toggle');
});
var $$5 = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .c-class-toggler to jQuery only if jQuery is present
 */

if ($$5) {
  var JQUERY_NO_CONFLICT$4 = $$5.fn[NAME$4];
  $$5.fn[NAME$4] = ClassToggler.jQueryInterface;
  $$5.fn[NAME$4].Constructor = ClassToggler;

  $$5.fn[NAME$4].noConflict = function () {
    $$5.fn[NAME$4] = JQUERY_NO_CONFLICT$4;
    return ClassToggler.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$5 = 'collapse';
var VERSION$5 = '3.2.0';
var DATA_KEY$5 = 'coreui.collapse';
var EVENT_KEY$5 = "." + DATA_KEY$5;
var DATA_API_KEY$5 = '.data-api';
var Default$3 = {
  toggle: true,
  parent: ''
};
var DefaultType$1 = {
  toggle: 'boolean',
  parent: '(string|element)'
};
var EVENT_SHOW = "show" + EVENT_KEY$5;
var EVENT_SHOWN = "shown" + EVENT_KEY$5;
var EVENT_HIDE = "hide" + EVENT_KEY$5;
var EVENT_HIDDEN = "hidden" + EVENT_KEY$5;
var EVENT_CLICK_DATA_API$5 = "click" + EVENT_KEY$5 + DATA_API_KEY$5;
var CLASS_NAME_SHOW$1 = 'show';
var CLASS_NAME_COLLAPSE = 'collapse';
var CLASS_NAME_COLLAPSING = 'collapsing';
var CLASS_NAME_COLLAPSED = 'collapsed';
var WIDTH = 'width';
var HEIGHT = 'height';
var SELECTOR_ACTIVES = '.show, .collapsing';
var SELECTOR_DATA_TOGGLE$1 = '[data-toggle="collapse"]';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Collapse = /*#__PURE__*/function () {
  function Collapse(element, config) {
    this._isTransitioning = false;
    this._element = element;
    this._config = this._getConfig(config);
    this._triggerArray = SelectorEngine.find(SELECTOR_DATA_TOGGLE$1 + "[href=\"#" + element.id + "\"]," + (SELECTOR_DATA_TOGGLE$1 + "[data-target=\"#" + element.id + "\"]"));
    var toggleList = SelectorEngine.find(SELECTOR_DATA_TOGGLE$1);

    for (var i = 0, len = toggleList.length; i < len; i++) {
      var elem = toggleList[i];
      var selector = getSelectorFromElement(elem);
      var filterElement = SelectorEngine.find(selector).filter(function (foundElem) {
        return foundElem === element;
      });

      if (selector !== null && filterElement.length) {
        this._selector = selector;

        this._triggerArray.push(elem);
      }
    }

    this._parent = this._config.parent ? this._getParent() : null;

    if (!this._config.parent) {
      this._addAriaAndCollapsedClass(this._element, this._triggerArray);
    }

    if (this._config.toggle) {
      this.toggle();
    }

    Data.setData(element, DATA_KEY$5, this);
  } // Getters


  var _proto = Collapse.prototype;

  // Public
  _proto.toggle = function toggle() {
    if (this._element.classList.contains(CLASS_NAME_SHOW$1)) {
      this.hide();
    } else {
      this.show();
    }
  };

  _proto.show = function show() {
    var _this = this;

    if (this._isTransitioning || this._element.classList.contains(CLASS_NAME_SHOW$1)) {
      return;
    }

    var actives;
    var activesData;

    if (this._parent) {
      actives = SelectorEngine.find(SELECTOR_ACTIVES, this._parent).filter(function (elem) {
        if (typeof _this._config.parent === 'string') {
          return elem.getAttribute('data-parent') === _this._config.parent;
        }

        return elem.classList.contains(CLASS_NAME_COLLAPSE);
      });

      if (actives.length === 0) {
        actives = null;
      }
    }

    var container = SelectorEngine.findOne(this._selector);

    if (actives) {
      var tempActiveData = actives.filter(function (elem) {
        return container !== elem;
      });
      activesData = tempActiveData[0] ? Data.getData(tempActiveData[0], DATA_KEY$5) : null;

      if (activesData && activesData._isTransitioning) {
        return;
      }
    }

    var startEvent = EventHandler.trigger(this._element, EVENT_SHOW);

    if (startEvent.defaultPrevented) {
      return;
    }

    if (actives) {
      actives.forEach(function (elemActive) {
        if (container !== elemActive) {
          Collapse.collapseInterface(elemActive, 'hide');
        }

        if (!activesData) {
          Data.setData(elemActive, DATA_KEY$5, null);
        }
      });
    }

    var dimension = this._getDimension();

    this._element.classList.remove(CLASS_NAME_COLLAPSE);

    this._element.classList.add(CLASS_NAME_COLLAPSING);

    this._element.style[dimension] = 0;

    if (this._triggerArray.length) {
      this._triggerArray.forEach(function (element) {
        element.classList.remove(CLASS_NAME_COLLAPSED);
        element.setAttribute('aria-expanded', true);
      });
    }

    this.setTransitioning(true);

    var complete = function complete() {
      _this._element.classList.remove(CLASS_NAME_COLLAPSING);

      _this._element.classList.add(CLASS_NAME_COLLAPSE, CLASS_NAME_SHOW$1);

      _this._element.style[dimension] = '';

      _this.setTransitioning(false);

      EventHandler.trigger(_this._element, EVENT_SHOWN);
    };

    var capitalizedDimension = dimension[0].toUpperCase() + dimension.slice(1);
    var scrollSize = "scroll" + capitalizedDimension;
    var transitionDuration = getTransitionDurationFromElement(this._element);
    EventHandler.one(this._element, TRANSITION_END, complete);
    emulateTransitionEnd(this._element, transitionDuration);
    this._element.style[dimension] = this._element[scrollSize] + "px";
  };

  _proto.hide = function hide() {
    var _this2 = this;

    if (this._isTransitioning || !this._element.classList.contains(CLASS_NAME_SHOW$1)) {
      return;
    }

    var startEvent = EventHandler.trigger(this._element, EVENT_HIDE);

    if (startEvent.defaultPrevented) {
      return;
    }

    var dimension = this._getDimension();

    this._element.style[dimension] = this._element.getBoundingClientRect()[dimension] + "px";
    reflow(this._element);

    this._element.classList.add(CLASS_NAME_COLLAPSING);

    this._element.classList.remove(CLASS_NAME_COLLAPSE, CLASS_NAME_SHOW$1);

    var triggerArrayLength = this._triggerArray.length;

    if (triggerArrayLength > 0) {
      for (var i = 0; i < triggerArrayLength; i++) {
        var trigger = this._triggerArray[i];
        var elem = getElementFromSelector(trigger);

        if (elem && !elem.classList.contains(CLASS_NAME_SHOW$1)) {
          trigger.classList.add(CLASS_NAME_COLLAPSED);
          trigger.setAttribute('aria-expanded', false);
        }
      }
    }

    this.setTransitioning(true);

    var complete = function complete() {
      _this2.setTransitioning(false);

      _this2._element.classList.remove(CLASS_NAME_COLLAPSING);

      _this2._element.classList.add(CLASS_NAME_COLLAPSE);

      EventHandler.trigger(_this2._element, EVENT_HIDDEN);
    };

    this._element.style[dimension] = '';
    var transitionDuration = getTransitionDurationFromElement(this._element);
    EventHandler.one(this._element, TRANSITION_END, complete);
    emulateTransitionEnd(this._element, transitionDuration);
  };

  _proto.setTransitioning = function setTransitioning(isTransitioning) {
    this._isTransitioning = isTransitioning;
  };

  _proto.dispose = function dispose() {
    Data.removeData(this._element, DATA_KEY$5);
    this._config = null;
    this._parent = null;
    this._element = null;
    this._triggerArray = null;
    this._isTransitioning = null;
  } // Private
  ;

  _proto._getConfig = function _getConfig(config) {
    config = _objectSpread2(_objectSpread2({}, Default$3), config);
    config.toggle = Boolean(config.toggle); // Coerce string values

    typeCheckConfig(NAME$5, config, DefaultType$1);
    return config;
  };

  _proto._getDimension = function _getDimension() {
    var hasWidth = this._element.classList.contains(WIDTH);

    return hasWidth ? WIDTH : HEIGHT;
  };

  _proto._getParent = function _getParent() {
    var _this3 = this;

    var parent = this._config.parent;

    if (isElement(parent)) {
      // it's a jQuery object
      if (typeof parent.jquery !== 'undefined' || typeof parent[0] !== 'undefined') {
        parent = parent[0];
      }
    } else {
      parent = SelectorEngine.findOne(parent);
    }

    var selector = SELECTOR_DATA_TOGGLE$1 + "[data-parent=\"" + parent + "\"]";
    SelectorEngine.find(selector, parent).forEach(function (element) {
      var selected = getElementFromSelector(element);

      _this3._addAriaAndCollapsedClass(selected, [element]);
    });
    return parent;
  };

  _proto._addAriaAndCollapsedClass = function _addAriaAndCollapsedClass(element, triggerArray) {
    if (element) {
      var isOpen = element.classList.contains(CLASS_NAME_SHOW$1);

      if (triggerArray.length) {
        triggerArray.forEach(function (elem) {
          if (isOpen) {
            elem.classList.remove(CLASS_NAME_COLLAPSED);
          } else {
            elem.classList.add(CLASS_NAME_COLLAPSED);
          }

          elem.setAttribute('aria-expanded', isOpen);
        });
      }
    }
  } // Static
  ;

  Collapse.collapseInterface = function collapseInterface(element, config) {
    var data = Data.getData(element, DATA_KEY$5);

    var _config = _objectSpread2(_objectSpread2(_objectSpread2({}, Default$3), Manipulator.getDataAttributes(element)), typeof config === 'object' && config ? config : {});

    if (!data && _config.toggle && typeof config === 'string' && /show|hide/.test(config)) {
      _config.toggle = false;
    }

    if (!data) {
      data = new Collapse(element, _config);
    }

    if (typeof config === 'string') {
      if (typeof data[config] === 'undefined') {
        throw new TypeError("No method named \"" + config + "\"");
      }

      data[config]();
    }
  };

  Collapse.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      Collapse.collapseInterface(this, config);
    });
  };

  Collapse.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$5);
  };

  _createClass(Collapse, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$5;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default$3;
    }
  }]);

  return Collapse;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(document, EVENT_CLICK_DATA_API$5, SELECTOR_DATA_TOGGLE$1, function (event) {
  // preventDefault only for <a> elements (which change the URL) not inside the collapsible element
  if (event.target.tagName === 'A') {
    event.preventDefault();
  }

  var triggerData = Manipulator.getDataAttributes(this);
  var selector = getSelectorFromElement(this);
  var selectorElements = SelectorEngine.find(selector);
  selectorElements.forEach(function (element) {
    var data = Data.getData(element, DATA_KEY$5);
    var config;

    if (data) {
      // update parent attribute
      if (data._parent === null && typeof triggerData.parent === 'string') {
        data._config.parent = triggerData.parent;
        data._parent = data._getParent();
      }

      config = 'toggle';
    } else {
      config = triggerData;
    }

    Collapse.collapseInterface(element, config);
  });
});
var $$6 = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .collapse to jQuery only if jQuery is present
 */

/* istanbul ignore if */

if ($$6) {
  var JQUERY_NO_CONFLICT$5 = $$6.fn[NAME$5];
  $$6.fn[NAME$5] = Collapse.jQueryInterface;
  $$6.fn[NAME$5].Constructor = Collapse;

  $$6.fn[NAME$5].noConflict = function () {
    $$6.fn[NAME$5] = JQUERY_NO_CONFLICT$5;
    return Collapse.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$6 = 'dropdown';
var VERSION$6 = '3.2.0';
var DATA_KEY$6 = 'coreui.dropdown';
var EVENT_KEY$6 = "." + DATA_KEY$6;
var DATA_API_KEY$6 = '.data-api';
var ESCAPE_KEY = 'Escape';
var SPACE_KEY = 'Space';
var TAB_KEY = 'Tab';
var ARROW_UP_KEY = 'ArrowUp';
var ARROW_DOWN_KEY = 'ArrowDown';
var RIGHT_MOUSE_BUTTON = 2; // MouseEvent.button value for the secondary button, usually the right button

var REGEXP_KEYDOWN = new RegExp(ARROW_UP_KEY + "|" + ARROW_DOWN_KEY + "|" + ESCAPE_KEY);
var EVENT_HIDE$1 = "hide" + EVENT_KEY$6;
var EVENT_HIDDEN$1 = "hidden" + EVENT_KEY$6;
var EVENT_SHOW$1 = "show" + EVENT_KEY$6;
var EVENT_SHOWN$1 = "shown" + EVENT_KEY$6;
var EVENT_CLICK = "click" + EVENT_KEY$6;
var EVENT_CLICK_DATA_API$6 = "click" + EVENT_KEY$6 + DATA_API_KEY$6;
var EVENT_KEYDOWN_DATA_API = "keydown" + EVENT_KEY$6 + DATA_API_KEY$6;
var EVENT_KEYUP_DATA_API = "keyup" + EVENT_KEY$6 + DATA_API_KEY$6;
var CLASS_NAME_DISABLED$1 = 'disabled';
var CLASS_NAME_SHOW$2 = 'show';
var CLASS_NAME_DROPUP = 'dropup';
var CLASS_NAME_DROPRIGHT = 'dropright';
var CLASS_NAME_DROPLEFT = 'dropleft';
var CLASS_NAME_HEADER = 'c-header';
var CLASS_NAME_MENURIGHT = 'dropdown-menu-right';
var CLASS_NAME_NAVBAR = 'navbar';
var CLASS_NAME_POSITION_STATIC = 'position-static';
var SELECTOR_DATA_TOGGLE$2 = '[data-toggle="dropdown"]';
var SELECTOR_FORM_CHILD = '.dropdown form';
var SELECTOR_HEADER_NAV = '.c-header-nav';
var SELECTOR_MENU = '.dropdown-menu';
var SELECTOR_NAVBAR_NAV = '.navbar-nav';
var SELECTOR_VISIBLE_ITEMS = '.dropdown-menu .dropdown-item:not(.disabled):not(:disabled)';
var PLACEMENT_TOP = 'top-start';
var PLACEMENT_TOPEND = 'top-end';
var PLACEMENT_BOTTOM = 'bottom-start';
var PLACEMENT_BOTTOMEND = 'bottom-end';
var PLACEMENT_RIGHT = 'right-start';
var PLACEMENT_LEFT = 'left-start';
var Default$4 = {
  offset: [0, 0],
  flip: true,
  boundary: 'scrollParent',
  reference: 'toggle',
  display: 'dynamic',
  popperConfig: null
};
var DefaultType$2 = {
  offset: '(array|function)',
  flip: 'boolean',
  boundary: '(string|element)',
  reference: '(string|element)',
  display: 'string',
  popperConfig: '(null|object)'
};
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Dropdown = /*#__PURE__*/function () {
  function Dropdown(element, config) {
    this._element = element;
    this._popper = null;
    this._config = this._getConfig(config);
    this._menu = this._getMenuElement();
    this._inNavbar = this._detectNavbar();
    this._inHeader = this._detectHeader();

    this._addEventListeners();

    Data.setData(element, DATA_KEY$6, this);
  } // Getters


  var _proto = Dropdown.prototype;

  // Public
  _proto.toggle = function toggle() {
    if (this._element.disabled || this._element.classList.contains(CLASS_NAME_DISABLED$1)) {
      return;
    }

    var isActive = this._menu.classList.contains(CLASS_NAME_SHOW$2);

    Dropdown.clearMenus();

    if (isActive) {
      return;
    }

    this.show();
  };

  _proto.show = function show() {
    if (this._element.disabled || this._element.classList.contains(CLASS_NAME_DISABLED$1) || this._menu.classList.contains(CLASS_NAME_SHOW$2)) {
      return;
    }

    var parent = Dropdown.getParentFromElement(this._element);
    var relatedTarget = {
      relatedTarget: this._element
    };
    var showEvent = EventHandler.trigger(parent, EVENT_SHOW$1, relatedTarget);

    if (showEvent.defaultPrevented) {
      return;
    } // Disable totally Popper.js for Dropdown in Navbar


    if (!this._inNavbar && !this._inHeader) {
      if (typeof _popperjs_core__WEBPACK_IMPORTED_MODULE_0__["createPopper"] === 'undefined') {
        throw new TypeError('CoreUI\'s dropdowns require Popper.js (https://popper.js.org)');
      }

      var referenceElement = this._element;

      if (this._config.reference === 'parent') {
        referenceElement = parent;
      } else if (isElement(this._config.reference)) {
        referenceElement = this._config.reference; // Check if it's jQuery element

        if (typeof this._config.reference.jquery !== 'undefined') {
          referenceElement = this._config.reference[0];
        }
      } // If boundary is not `scrollParent`, then set position to `static`
      // to allow the menu to "escape" the scroll parent's boundaries
      // https://github.com/twbs/bootstrap/issues/24251


      if (this._config.boundary !== 'scrollParent') {
        parent.classList.add(CLASS_NAME_POSITION_STATIC);
      }

      this._popper = Object(_popperjs_core__WEBPACK_IMPORTED_MODULE_0__["createPopper"])(referenceElement, this._menu, this._getPopperConfig());
    } // If this is a touch-enabled device we add extra
    // empty mouseover listeners to the body's immediate children;
    // only needed because of broken event delegation on iOS
    // https://www.quirksmode.org/blog/archives/2014/02/mouse_event_bub.html


    if ('ontouchstart' in document.documentElement && !parent.closest(SELECTOR_NAVBAR_NAV)) {
      var _ref;

      (_ref = []).concat.apply(_ref, document.body.children).forEach(function (elem) {
        return EventHandler.on(elem, 'mouseover', null, noop());
      });
    }

    if ('ontouchstart' in document.documentElement && !parent.closest(SELECTOR_HEADER_NAV)) {
      var _ref2;

      (_ref2 = []).concat.apply(_ref2, document.body.children).forEach(function (elem) {
        return EventHandler.on(elem, 'mouseover', null, noop());
      });
    }

    this._element.focus();

    this._element.setAttribute('aria-expanded', true);

    Manipulator.toggleClass(this._menu, CLASS_NAME_SHOW$2);
    Manipulator.toggleClass(parent, CLASS_NAME_SHOW$2);
    EventHandler.trigger(parent, EVENT_SHOWN$1, relatedTarget);
  };

  _proto.hide = function hide() {
    if (this._element.disabled || this._element.classList.contains(CLASS_NAME_DISABLED$1) || !this._menu.classList.contains(CLASS_NAME_SHOW$2)) {
      return;
    }

    var parent = Dropdown.getParentFromElement(this._element);
    var relatedTarget = {
      relatedTarget: this._element
    };
    var hideEvent = EventHandler.trigger(parent, EVENT_HIDE$1, relatedTarget);

    if (hideEvent.defaultPrevented) {
      return;
    }

    if (this._popper) {
      this._popper.destroy();
    }

    Manipulator.toggleClass(this._menu, CLASS_NAME_SHOW$2);
    Manipulator.toggleClass(parent, CLASS_NAME_SHOW$2);
    EventHandler.trigger(parent, EVENT_HIDDEN$1, relatedTarget);
  };

  _proto.dispose = function dispose() {
    Data.removeData(this._element, DATA_KEY$6);
    EventHandler.off(this._element, EVENT_KEY$6);
    this._element = null;
    this._menu = null;

    if (this._popper) {
      this._popper.destroy();

      this._popper = null;
    }
  };

  _proto.update = function update() {
    this._inNavbar = this._detectNavbar();
    this._inHeader = this._detectHeader();

    if (this._popper) {
      this._popper.scheduleUpdate();
    }
  } // Private
  ;

  _proto._addEventListeners = function _addEventListeners() {
    var _this = this;

    EventHandler.on(this._element, EVENT_CLICK, function (event) {
      event.preventDefault();
      event.stopPropagation();

      _this.toggle();
    });
  };

  _proto._getConfig = function _getConfig(config) {
    config = _objectSpread2(_objectSpread2(_objectSpread2({}, this.constructor.Default), Manipulator.getDataAttributes(this._element)), config);
    typeCheckConfig(NAME$6, config, this.constructor.DefaultType);
    return config;
  };

  _proto._getMenuElement = function _getMenuElement() {
    var parent = Dropdown.getParentFromElement(this._element);
    return SelectorEngine.findOne(SELECTOR_MENU, parent);
  };

  _proto._getPlacement = function _getPlacement() {
    var parentDropdown = this._element.parentNode;
    var placement = PLACEMENT_BOTTOM; // Handle dropup

    if (parentDropdown.classList.contains(CLASS_NAME_DROPUP)) {
      placement = PLACEMENT_TOP;

      if (this._menu.classList.contains(CLASS_NAME_MENURIGHT)) {
        placement = PLACEMENT_TOPEND;
      }
    } else if (parentDropdown.classList.contains(CLASS_NAME_DROPRIGHT)) {
      placement = PLACEMENT_RIGHT;
    } else if (parentDropdown.classList.contains(CLASS_NAME_DROPLEFT)) {
      placement = PLACEMENT_LEFT;
    } else if (this._menu.classList.contains(CLASS_NAME_MENURIGHT)) {
      placement = PLACEMENT_BOTTOMEND;
    }

    return placement;
  };

  _proto._detectNavbar = function _detectNavbar() {
    return Boolean(this._element.closest("." + CLASS_NAME_NAVBAR));
  };

  _proto._detectHeader = function _detectHeader() {
    return Boolean(this._element.closest("." + CLASS_NAME_HEADER));
  };

  _proto._getOffset = function _getOffset() {
    var _this2 = this;

    var offset = {};

    if (typeof this._config.offset === 'function') {
      offset.fn = function (data) {
        data.offsets = _objectSpread2(_objectSpread2({}, data.offsets), _this2._config.offset(data.offsets, _this2._element) || {});
        return data;
      };
    } else {
      offset.offset = this._config.offset;
    }

    return offset;
  };

  _proto._getPopperConfig = function _getPopperConfig() {
    var popperConfig = {
      placement: this._getPlacement(),
      modifiers: [{
        name: 'offset',
        options: {
          offset: this._getOffset()
        }
      }, {
        name: 'flip',
        enabled: this._config.flip
      }, {
        name: 'preventOverflow',
        options: {
          boundary: this._config.boundary
        }
      }]
    }; // Disable Popper.js if we have a static display

    if (this._config.display === 'static') {
      popperConfig.modifiers.applyStyle = {
        enabled: false
      };
    }

    return _objectSpread2(_objectSpread2({}, popperConfig), this._config.popperConfig);
  } // Static
  ;

  Dropdown.dropdownInterface = function dropdownInterface(element, config) {
    var data = Data.getData(element, DATA_KEY$6);

    var _config = typeof config === 'object' ? config : null;

    if (!data) {
      data = new Dropdown(element, _config);
    }

    if (typeof config === 'string') {
      if (typeof data[config] === 'undefined') {
        throw new TypeError("No method named \"" + config + "\"");
      }

      data[config]();
    }
  };

  Dropdown.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      Dropdown.dropdownInterface(this, config);
    });
  };

  Dropdown.clearMenus = function clearMenus(event) {
    if (event && (event.button === RIGHT_MOUSE_BUTTON || event.type === 'keyup' && event.key !== TAB_KEY)) {
      return;
    }

    var toggles = SelectorEngine.find(SELECTOR_DATA_TOGGLE$2);

    for (var i = 0, len = toggles.length; i < len; i++) {
      var parent = Dropdown.getParentFromElement(toggles[i]);
      var context = Data.getData(toggles[i], DATA_KEY$6);
      var relatedTarget = {
        relatedTarget: toggles[i]
      };

      if (event && event.type === 'click') {
        relatedTarget.clickEvent = event;
      }

      if (!context) {
        continue;
      }

      var dropdownMenu = context._menu;

      if (!parent.classList.contains(CLASS_NAME_SHOW$2)) {
        continue;
      }

      if (event && (event.type === 'click' && /input|textarea/i.test(event.target.tagName) || event.type === 'keyup' && event.key === TAB_KEY) && parent.contains(event.target)) {
        continue;
      }

      var hideEvent = EventHandler.trigger(parent, EVENT_HIDE$1, relatedTarget);

      if (hideEvent.defaultPrevented) {
        continue;
      } // If this is a touch-enabled device we remove the extra
      // empty mouseover listeners we added for iOS support


      if ('ontouchstart' in document.documentElement) {
        var _ref3;

        (_ref3 = []).concat.apply(_ref3, document.body.children).forEach(function (elem) {
          return EventHandler.off(elem, 'mouseover', null, noop());
        });
      }

      toggles[i].setAttribute('aria-expanded', 'false');

      if (context._popper) {
        context._popper.destroy();
      }

      dropdownMenu.classList.remove(CLASS_NAME_SHOW$2);
      parent.classList.remove(CLASS_NAME_SHOW$2);
      EventHandler.trigger(parent, EVENT_HIDDEN$1, relatedTarget);
    }
  };

  Dropdown.getParentFromElement = function getParentFromElement(element) {
    return getElementFromSelector(element) || element.parentNode;
  };

  Dropdown.dataApiKeydownHandler = function dataApiKeydownHandler(event) {
    // If not input/textarea:
    //  - And not a key in REGEXP_KEYDOWN => not a dropdown command
    // If input/textarea:
    //  - If space key => not a dropdown command
    //  - If key is other than escape
    //    - If key is not up or down => not a dropdown command
    //    - If trigger inside the menu => not a dropdown command
    if (/input|textarea/i.test(event.target.tagName) ? event.key === SPACE_KEY || event.key !== ESCAPE_KEY && (event.key !== ARROW_DOWN_KEY && event.key !== ARROW_UP_KEY || event.target.closest(SELECTOR_MENU)) : !REGEXP_KEYDOWN.test(event.key)) {
      return;
    }

    event.preventDefault();
    event.stopPropagation();

    if (this.disabled || this.classList.contains(CLASS_NAME_DISABLED$1)) {
      return;
    }

    var parent = Dropdown.getParentFromElement(this);
    var isActive = parent.classList.contains(CLASS_NAME_SHOW$2);

    if (event.key === ESCAPE_KEY) {
      var button = this.matches(SELECTOR_DATA_TOGGLE$2) ? this : SelectorEngine.prev(this, SELECTOR_DATA_TOGGLE$2)[0];
      button.focus();
      Dropdown.clearMenus();
      return;
    }

    if (!isActive || event.key === SPACE_KEY) {
      Dropdown.clearMenus();
      return;
    }

    var items = SelectorEngine.find(SELECTOR_VISIBLE_ITEMS, parent).filter(isVisible);

    if (!items.length) {
      return;
    }

    var index = items.indexOf(event.target);

    if (event.key === ARROW_UP_KEY && index > 0) {
      // Up
      index--;
    }

    if (event.key === ARROW_DOWN_KEY && index < items.length - 1) {
      // Down
      index++;
    } // index is -1 if the first keydown is an ArrowUp


    index = index === -1 ? 0 : index;
    items[index].focus();
  };

  Dropdown.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$6);
  };

  _createClass(Dropdown, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$6;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default$4;
    }
  }, {
    key: "DefaultType",
    get: function get() {
      return DefaultType$2;
    }
  }]);

  return Dropdown;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(document, EVENT_KEYDOWN_DATA_API, SELECTOR_DATA_TOGGLE$2, Dropdown.dataApiKeydownHandler);
EventHandler.on(document, EVENT_KEYDOWN_DATA_API, SELECTOR_MENU, Dropdown.dataApiKeydownHandler);
EventHandler.on(document, EVENT_CLICK_DATA_API$6, Dropdown.clearMenus);
EventHandler.on(document, EVENT_KEYUP_DATA_API, Dropdown.clearMenus);
EventHandler.on(document, EVENT_CLICK_DATA_API$6, SELECTOR_DATA_TOGGLE$2, function (event) {
  event.preventDefault();
  event.stopPropagation();
  Dropdown.dropdownInterface(this, 'toggle');
});
EventHandler.on(document, EVENT_CLICK_DATA_API$6, SELECTOR_FORM_CHILD, function (e) {
  return e.stopPropagation();
});
var $$7 = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .dropdown to jQuery only if jQuery is present
 */

/* istanbul ignore if */

if ($$7) {
  var JQUERY_NO_CONFLICT$6 = $$7.fn[NAME$6];
  $$7.fn[NAME$6] = Dropdown.jQueryInterface;
  $$7.fn[NAME$6].Constructor = Dropdown;

  $$7.fn[NAME$6].noConflict = function () {
    $$7.fn[NAME$6] = JQUERY_NO_CONFLICT$6;
    return Dropdown.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$7 = 'modal';
var VERSION$7 = '3.2.0';
var DATA_KEY$7 = 'coreui.modal';
var EVENT_KEY$7 = "." + DATA_KEY$7;
var DATA_API_KEY$7 = '.data-api';
var ESCAPE_KEY$1 = 'Escape';
var Default$5 = {
  backdrop: true,
  keyboard: true,
  focus: true,
  show: true
};
var DefaultType$3 = {
  backdrop: '(boolean|string)',
  keyboard: 'boolean',
  focus: 'boolean',
  show: 'boolean'
};
var EVENT_HIDE$2 = "hide" + EVENT_KEY$7;
var EVENT_HIDE_PREVENTED = "hidePrevented" + EVENT_KEY$7;
var EVENT_HIDDEN$2 = "hidden" + EVENT_KEY$7;
var EVENT_SHOW$2 = "show" + EVENT_KEY$7;
var EVENT_SHOWN$2 = "shown" + EVENT_KEY$7;
var EVENT_FOCUSIN = "focusin" + EVENT_KEY$7;
var EVENT_RESIZE = "resize" + EVENT_KEY$7;
var EVENT_CLICK_DISMISS = "click.dismiss" + EVENT_KEY$7;
var EVENT_KEYDOWN_DISMISS = "keydown.dismiss" + EVENT_KEY$7;
var EVENT_MOUSEUP_DISMISS = "mouseup.dismiss" + EVENT_KEY$7;
var EVENT_MOUSEDOWN_DISMISS = "mousedown.dismiss" + EVENT_KEY$7;
var EVENT_CLICK_DATA_API$7 = "click" + EVENT_KEY$7 + DATA_API_KEY$7;
var CLASS_NAME_SCROLLBAR_MEASURER = 'modal-scrollbar-measure';
var CLASS_NAME_BACKDROP = 'modal-backdrop';
var CLASS_NAME_OPEN = 'modal-open';
var CLASS_NAME_FADE = 'fade';
var CLASS_NAME_SHOW$3 = 'show';
var CLASS_NAME_STATIC = 'modal-static';
var SELECTOR_DIALOG = '.modal-dialog';
var SELECTOR_MODAL_BODY = '.modal-body';
var SELECTOR_DATA_TOGGLE$3 = '[data-toggle="modal"]';
var SELECTOR_DATA_DISMISS = '[data-dismiss="modal"]';
var SELECTOR_FIXED_CONTENT = '.fixed-top, .fixed-bottom, .is-fixed, .sticky-top';
var SELECTOR_STICKY_CONTENT = '.sticky-top';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Modal = /*#__PURE__*/function () {
  function Modal(element, config) {
    this._config = this._getConfig(config);
    this._element = element;
    this._dialog = SelectorEngine.findOne(SELECTOR_DIALOG, element);
    this._backdrop = null;
    this._isShown = false;
    this._isBodyOverflowing = false;
    this._ignoreBackdropClick = false;
    this._isTransitioning = false;
    this._scrollbarWidth = 0;
    Data.setData(element, DATA_KEY$7, this);
  } // Getters


  var _proto = Modal.prototype;

  // Public
  _proto.toggle = function toggle(relatedTarget) {
    return this._isShown ? this.hide() : this.show(relatedTarget);
  };

  _proto.show = function show(relatedTarget) {
    var _this = this;

    if (this._isShown || this._isTransitioning) {
      return;
    }

    if (this._element.classList.contains(CLASS_NAME_FADE)) {
      this._isTransitioning = true;
    }

    var showEvent = EventHandler.trigger(this._element, EVENT_SHOW$2, {
      relatedTarget: relatedTarget
    });

    if (this._isShown || showEvent.defaultPrevented) {
      return;
    }

    this._isShown = true;

    this._checkScrollbar();

    this._setScrollbar();

    this._adjustDialog();

    this._setEscapeEvent();

    this._setResizeEvent();

    EventHandler.on(this._element, EVENT_CLICK_DISMISS, SELECTOR_DATA_DISMISS, function (event) {
      return _this.hide(event);
    });
    EventHandler.on(this._dialog, EVENT_MOUSEDOWN_DISMISS, function () {
      EventHandler.one(_this._element, EVENT_MOUSEUP_DISMISS, function (event) {
        if (event.target === _this._element) {
          _this._ignoreBackdropClick = true;
        }
      });
    });

    this._showBackdrop(function () {
      return _this._showElement(relatedTarget);
    });
  };

  _proto.hide = function hide(event) {
    var _this2 = this;

    if (event) {
      event.preventDefault();
    }

    if (!this._isShown || this._isTransitioning) {
      return;
    }

    var hideEvent = EventHandler.trigger(this._element, EVENT_HIDE$2);

    if (hideEvent.defaultPrevented) {
      return;
    }

    this._isShown = false;

    var transition = this._element.classList.contains(CLASS_NAME_FADE);

    if (transition) {
      this._isTransitioning = true;
    }

    this._setEscapeEvent();

    this._setResizeEvent();

    EventHandler.off(document, EVENT_FOCUSIN);

    this._element.classList.remove(CLASS_NAME_SHOW$3);

    EventHandler.off(this._element, EVENT_CLICK_DISMISS);
    EventHandler.off(this._dialog, EVENT_MOUSEDOWN_DISMISS);

    if (transition) {
      var transitionDuration = getTransitionDurationFromElement(this._element);
      EventHandler.one(this._element, TRANSITION_END, function (event) {
        return _this2._hideModal(event);
      });
      emulateTransitionEnd(this._element, transitionDuration);
    } else {
      this._hideModal();
    }
  };

  _proto.dispose = function dispose() {
    [window, this._element, this._dialog].forEach(function (htmlElement) {
      return EventHandler.off(htmlElement, EVENT_KEY$7);
    });
    /**
     * `document` has 2 events `EVENT_FOCUSIN` and `EVENT_CLICK_DATA_API`
     * Do not move `document` in `htmlElements` array
     * It will remove `EVENT_CLICK_DATA_API` event that should remain
     */

    EventHandler.off(document, EVENT_FOCUSIN);
    Data.removeData(this._element, DATA_KEY$7);
    this._config = null;
    this._element = null;
    this._dialog = null;
    this._backdrop = null;
    this._isShown = null;
    this._isBodyOverflowing = null;
    this._ignoreBackdropClick = null;
    this._isTransitioning = null;
    this._scrollbarWidth = null;
  };

  _proto.handleUpdate = function handleUpdate() {
    this._adjustDialog();
  } // Private
  ;

  _proto._getConfig = function _getConfig(config) {
    config = _objectSpread2(_objectSpread2({}, Default$5), config);
    typeCheckConfig(NAME$7, config, DefaultType$3);
    return config;
  };

  _proto._showElement = function _showElement(relatedTarget) {
    var _this3 = this;

    var transition = this._element.classList.contains(CLASS_NAME_FADE);

    var modalBody = SelectorEngine.findOne(SELECTOR_MODAL_BODY, this._dialog);

    if (!this._element.parentNode || this._element.parentNode.nodeType !== Node.ELEMENT_NODE) {
      // Don't move modal's DOM position
      document.body.appendChild(this._element);
    }

    this._element.style.display = 'block';

    this._element.removeAttribute('aria-hidden');

    this._element.setAttribute('aria-modal', true);

    this._element.scrollTop = 0;

    if (modalBody) {
      modalBody.scrollTop = 0;
    }

    if (transition) {
      reflow(this._element);
    }

    this._element.classList.add(CLASS_NAME_SHOW$3);

    if (this._config.focus) {
      this._enforceFocus();
    }

    var transitionComplete = function transitionComplete() {
      if (_this3._config.focus) {
        _this3._element.focus();
      }

      _this3._isTransitioning = false;
      EventHandler.trigger(_this3._element, EVENT_SHOWN$2, {
        relatedTarget: relatedTarget
      });
    };

    if (transition) {
      var transitionDuration = getTransitionDurationFromElement(this._dialog);
      EventHandler.one(this._dialog, TRANSITION_END, transitionComplete);
      emulateTransitionEnd(this._dialog, transitionDuration);
    } else {
      transitionComplete();
    }
  };

  _proto._enforceFocus = function _enforceFocus() {
    var _this4 = this;

    EventHandler.off(document, EVENT_FOCUSIN); // guard against infinite focus loop

    EventHandler.on(document, EVENT_FOCUSIN, function (event) {
      if (document !== event.target && _this4._element !== event.target && !_this4._element.contains(event.target)) {
        _this4._element.focus();
      }
    });
  };

  _proto._setEscapeEvent = function _setEscapeEvent() {
    var _this5 = this;

    if (this._isShown) {
      EventHandler.on(this._element, EVENT_KEYDOWN_DISMISS, function (event) {
        if (_this5._config.keyboard && event.key === ESCAPE_KEY$1) {
          event.preventDefault();

          _this5.hide();
        } else if (!_this5._config.keyboard && event.key === ESCAPE_KEY$1) {
          _this5._triggerBackdropTransition();
        }
      });
    } else {
      EventHandler.off(this._element, EVENT_KEYDOWN_DISMISS);
    }
  };

  _proto._setResizeEvent = function _setResizeEvent() {
    var _this6 = this;

    if (this._isShown) {
      EventHandler.on(window, EVENT_RESIZE, function () {
        return _this6._adjustDialog();
      });
    } else {
      EventHandler.off(window, EVENT_RESIZE);
    }
  };

  _proto._hideModal = function _hideModal() {
    var _this7 = this;

    this._element.style.display = 'none';

    this._element.setAttribute('aria-hidden', true);

    this._element.removeAttribute('aria-modal');

    this._isTransitioning = false;

    this._showBackdrop(function () {
      document.body.classList.remove(CLASS_NAME_OPEN);

      _this7._resetAdjustments();

      _this7._resetScrollbar();

      EventHandler.trigger(_this7._element, EVENT_HIDDEN$2);
    });
  };

  _proto._removeBackdrop = function _removeBackdrop() {
    this._backdrop.parentNode.removeChild(this._backdrop);

    this._backdrop = null;
  };

  _proto._showBackdrop = function _showBackdrop(callback) {
    var _this8 = this;

    var animate = this._element.classList.contains(CLASS_NAME_FADE) ? CLASS_NAME_FADE : '';

    if (this._isShown && this._config.backdrop) {
      this._backdrop = document.createElement('div');
      this._backdrop.className = CLASS_NAME_BACKDROP;

      if (animate) {
        this._backdrop.classList.add(animate);
      }

      document.body.appendChild(this._backdrop);
      EventHandler.on(this._element, EVENT_CLICK_DISMISS, function (event) {
        if (_this8._ignoreBackdropClick) {
          _this8._ignoreBackdropClick = false;
          return;
        }

        if (event.target !== event.currentTarget) {
          return;
        }

        _this8._triggerBackdropTransition();
      });

      if (animate) {
        reflow(this._backdrop);
      }

      this._backdrop.classList.add(CLASS_NAME_SHOW$3);

      if (!animate) {
        callback();
        return;
      }

      var backdropTransitionDuration = getTransitionDurationFromElement(this._backdrop);
      EventHandler.one(this._backdrop, TRANSITION_END, callback);
      emulateTransitionEnd(this._backdrop, backdropTransitionDuration);
    } else if (!this._isShown && this._backdrop) {
      this._backdrop.classList.remove(CLASS_NAME_SHOW$3);

      var callbackRemove = function callbackRemove() {
        _this8._removeBackdrop();

        callback();
      };

      if (this._element.classList.contains(CLASS_NAME_FADE)) {
        var _backdropTransitionDuration = getTransitionDurationFromElement(this._backdrop);

        EventHandler.one(this._backdrop, TRANSITION_END, callbackRemove);
        emulateTransitionEnd(this._backdrop, _backdropTransitionDuration);
      } else {
        callbackRemove();
      }
    } else {
      callback();
    }
  };

  _proto._triggerBackdropTransition = function _triggerBackdropTransition() {
    var _this9 = this;

    if (this._config.backdrop === 'static') {
      var hideEvent = EventHandler.trigger(this._element, EVENT_HIDE_PREVENTED);

      if (hideEvent.defaultPrevented) {
        return;
      }

      this._element.classList.add(CLASS_NAME_STATIC);

      var modalTransitionDuration = getTransitionDurationFromElement(this._element);
      EventHandler.one(this._element, TRANSITION_END, function () {
        _this9._element.classList.remove(CLASS_NAME_STATIC);
      });
      emulateTransitionEnd(this._element, modalTransitionDuration);

      this._element.focus();
    } else {
      this.hide();
    }
  } // ----------------------------------------------------------------------
  // the following methods are used to handle overflowing modals
  // ----------------------------------------------------------------------
  ;

  _proto._adjustDialog = function _adjustDialog() {
    var isModalOverflowing = this._element.scrollHeight > document.documentElement.clientHeight;

    if (!this._isBodyOverflowing && isModalOverflowing) {
      this._element.style.paddingLeft = this._scrollbarWidth + "px";
    }

    if (this._isBodyOverflowing && !isModalOverflowing) {
      this._element.style.paddingRight = this._scrollbarWidth + "px";
    }
  };

  _proto._resetAdjustments = function _resetAdjustments() {
    this._element.style.paddingLeft = '';
    this._element.style.paddingRight = '';
  };

  _proto._checkScrollbar = function _checkScrollbar() {
    var rect = document.body.getBoundingClientRect();
    this._isBodyOverflowing = Math.round(rect.left + rect.right) < window.innerWidth;
    this._scrollbarWidth = this._getScrollbarWidth();
  };

  _proto._setScrollbar = function _setScrollbar() {
    var _this10 = this;

    if (this._isBodyOverflowing) {
      // Note: DOMNode.style.paddingRight returns the actual value or '' if not set
      //   while $(DOMNode).css('padding-right') returns the calculated value or 0 if not set
      // Adjust fixed content padding
      SelectorEngine.find(SELECTOR_FIXED_CONTENT).forEach(function (element) {
        var actualPadding = element.style.paddingRight;
        var calculatedPadding = window.getComputedStyle(element)['padding-right'];
        Manipulator.setDataAttribute(element, 'padding-right', actualPadding);
        element.style.paddingRight = parseFloat(calculatedPadding) + _this10._scrollbarWidth + "px";
      }); // Adjust sticky content margin

      SelectorEngine.find(SELECTOR_STICKY_CONTENT).forEach(function (element) {
        var actualMargin = element.style.marginRight;
        var calculatedMargin = window.getComputedStyle(element)['margin-right'];
        Manipulator.setDataAttribute(element, 'margin-right', actualMargin);
        element.style.marginRight = parseFloat(calculatedMargin) - _this10._scrollbarWidth + "px";
      }); // Adjust body padding

      var actualPadding = document.body.style.paddingRight;
      var calculatedPadding = window.getComputedStyle(document.body)['padding-right'];
      Manipulator.setDataAttribute(document.body, 'padding-right', actualPadding);
      document.body.style.paddingRight = parseFloat(calculatedPadding) + this._scrollbarWidth + "px";
    }

    document.body.classList.add(CLASS_NAME_OPEN);
  };

  _proto._resetScrollbar = function _resetScrollbar() {
    // Restore fixed content padding
    SelectorEngine.find(SELECTOR_FIXED_CONTENT).forEach(function (element) {
      var padding = Manipulator.getDataAttribute(element, 'padding-right');

      if (typeof padding !== 'undefined') {
        Manipulator.removeDataAttribute(element, 'padding-right');
        element.style.paddingRight = padding;
      }
    }); // Restore sticky content and navbar-toggler margin

    SelectorEngine.find("" + SELECTOR_STICKY_CONTENT).forEach(function (element) {
      var margin = Manipulator.getDataAttribute(element, 'margin-right');

      if (typeof margin !== 'undefined') {
        Manipulator.removeDataAttribute(element, 'margin-right');
        element.style.marginRight = margin;
      }
    }); // Restore body padding

    var padding = Manipulator.getDataAttribute(document.body, 'padding-right');

    if (typeof padding === 'undefined') {
      document.body.style.paddingRight = '';
    } else {
      Manipulator.removeDataAttribute(document.body, 'padding-right');
      document.body.style.paddingRight = padding;
    }
  };

  _proto._getScrollbarWidth = function _getScrollbarWidth() {
    // thx d.walsh
    var scrollDiv = document.createElement('div');
    scrollDiv.className = CLASS_NAME_SCROLLBAR_MEASURER;
    document.body.appendChild(scrollDiv);
    var scrollbarWidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientWidth;
    document.body.removeChild(scrollDiv);
    return scrollbarWidth;
  } // Static
  ;

  Modal.jQueryInterface = function jQueryInterface(config, relatedTarget) {
    return this.each(function () {
      var data = Data.getData(this, DATA_KEY$7);

      var _config = _objectSpread2(_objectSpread2(_objectSpread2({}, Default$5), Manipulator.getDataAttributes(this)), typeof config === 'object' && config ? config : {});

      if (!data) {
        data = new Modal(this, _config);
      }

      if (typeof config === 'string') {
        if (typeof data[config] === 'undefined') {
          throw new TypeError("No method named \"" + config + "\"");
        }

        data[config](relatedTarget);
      } else if (_config.show) {
        data.show(relatedTarget);
      }
    });
  };

  Modal.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$7);
  };

  _createClass(Modal, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$7;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default$5;
    }
  }]);

  return Modal;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(document, EVENT_CLICK_DATA_API$7, SELECTOR_DATA_TOGGLE$3, function (event) {
  var _this11 = this;

  var target = getElementFromSelector(this);

  if (this.tagName === 'A' || this.tagName === 'AREA') {
    event.preventDefault();
  }

  EventHandler.one(target, EVENT_SHOW$2, function (showEvent) {
    if (showEvent.defaultPrevented) {
      // only register focus restorer if modal will actually get shown
      return;
    }

    EventHandler.one(target, EVENT_HIDDEN$2, function () {
      if (isVisible(_this11)) {
        _this11.focus();
      }
    });
  });
  var data = Data.getData(target, DATA_KEY$7);

  if (!data) {
    var config = _objectSpread2(_objectSpread2({}, Manipulator.getDataAttributes(target)), Manipulator.getDataAttributes(this));

    data = new Modal(target, config);
  }

  data.show(this);
});
var $$8 = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .modal to jQuery only if jQuery is present
 */

/* istanbul ignore if */

if ($$8) {
  var JQUERY_NO_CONFLICT$7 = $$8.fn[NAME$7];
  $$8.fn[NAME$7] = Modal.jQueryInterface;
  $$8.fn[NAME$7].Constructor = Modal;

  $$8.fn[NAME$7].noConflict = function () {
    $$8.fn[NAME$7] = JQUERY_NO_CONFLICT$7;
    return Modal.jQueryInterface;
  };
}

/**
 * --------------------------------------------------------------------------
 * Bootstrap (v5.0.0-alpha1): util/sanitizer.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */
var uriAttrs = ['background', 'cite', 'href', 'itemtype', 'longdesc', 'poster', 'src', 'xlink:href'];
var ARIA_ATTRIBUTE_PATTERN = /^aria-[\w-]*$/i;
/**
 * A pattern that recognizes a commonly useful subset of URLs that are safe.
 *
 * Shoutout to Angular 7 https://github.com/angular/angular/blob/7.2.4/packages/core/src/sanitization/url_sanitizer.ts
 */

var SAFE_URL_PATTERN = /^(?:(?:https?|mailto|ftp|tel|file):|[^#&/:?]*(?:[#/?]|$))/gi;
/**
 * A pattern that matches safe data URLs. Only matches image, video and audio types.
 *
 * Shoutout to Angular 7 https://github.com/angular/angular/blob/7.2.4/packages/core/src/sanitization/url_sanitizer.ts
 */

var DATA_URL_PATTERN = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i;

var allowedAttribute = function allowedAttribute(attr, allowedAttributeList) {
  var attrName = attr.nodeName.toLowerCase();

  if (allowedAttributeList.indexOf(attrName) !== -1) {
    if (uriAttrs.indexOf(attrName) !== -1) {
      return Boolean(attr.nodeValue.match(SAFE_URL_PATTERN) || attr.nodeValue.match(DATA_URL_PATTERN));
    }

    return true;
  }

  var regExp = allowedAttributeList.filter(function (attrRegex) {
    return attrRegex instanceof RegExp;
  }); // Check if a regular expression validates the attribute.

  for (var i = 0, len = regExp.length; i < len; i++) {
    if (attrName.match(regExp[i])) {
      return true;
    }
  }

  return false;
};

var DefaultWhitelist = {
  // Global attributes allowed on any supplied element below.
  '*': ['class', 'dir', 'id', 'lang', 'role', ARIA_ATTRIBUTE_PATTERN],
  a: ['target', 'href', 'title', 'rel'],
  area: [],
  b: [],
  br: [],
  col: [],
  code: [],
  div: [],
  em: [],
  hr: [],
  h1: [],
  h2: [],
  h3: [],
  h4: [],
  h5: [],
  h6: [],
  i: [],
  img: ['src', 'srcset', 'alt', 'title', 'width', 'height'],
  li: [],
  ol: [],
  p: [],
  pre: [],
  s: [],
  small: [],
  span: [],
  sub: [],
  sup: [],
  strong: [],
  u: [],
  ul: []
};
function sanitizeHtml(unsafeHtml, whiteList, sanitizeFn) {
  var _ref;

  if (!unsafeHtml.length) {
    return unsafeHtml;
  }

  if (sanitizeFn && typeof sanitizeFn === 'function') {
    return sanitizeFn(unsafeHtml);
  }

  var domParser = new window.DOMParser();
  var createdDocument = domParser.parseFromString(unsafeHtml, 'text/html');
  var whitelistKeys = Object.keys(whiteList);

  var elements = (_ref = []).concat.apply(_ref, createdDocument.body.querySelectorAll('*'));

  var _loop = function _loop(i, len) {
    var _ref2;

    var el = elements[i];
    var elName = el.nodeName.toLowerCase();

    if (whitelistKeys.indexOf(elName) === -1) {
      el.parentNode.removeChild(el);
      return "continue";
    }

    var attributeList = (_ref2 = []).concat.apply(_ref2, el.attributes);

    var whitelistedAttributes = [].concat(whiteList['*'] || [], whiteList[elName] || []);
    attributeList.forEach(function (attr) {
      if (!allowedAttribute(attr, whitelistedAttributes)) {
        el.removeAttribute(attr.nodeName);
      }
    });
  };

  for (var i = 0, len = elements.length; i < len; i++) {
    var _ret = _loop(i);

    if (_ret === "continue") continue;
  }

  return createdDocument.body.innerHTML;
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$8 = 'tooltip';
var VERSION$8 = '3.2.0';
var DATA_KEY$8 = 'coreui.tooltip';
var EVENT_KEY$8 = "." + DATA_KEY$8;
var CLASS_PREFIX = 'bs-tooltip';
var BSCLS_PREFIX_REGEX = new RegExp("(^|\\s)" + CLASS_PREFIX + "\\S+", 'g');
var DISALLOWED_ATTRIBUTES = ['sanitize', 'whiteList', 'sanitizeFn'];
var DefaultType$4 = {
  animation: 'boolean',
  template: 'string',
  title: '(string|element|function)',
  trigger: 'string',
  delay: '(number|object)',
  html: 'boolean',
  selector: '(string|boolean)',
  placement: '(string|function)',
  offset: '(number|string|function)',
  container: '(string|element|boolean)',
  boundary: '(string|element)',
  sanitize: 'boolean',
  sanitizeFn: '(null|function)',
  whiteList: 'object',
  popperConfig: '(null|object)'
};
var AttachmentMap = {
  AUTO: 'auto',
  TOP: 'top',
  RIGHT: 'right',
  BOTTOM: 'bottom',
  LEFT: 'left'
};
var Default$6 = {
  animation: true,
  template: '<div class="tooltip" role="tooltip">' + '<div class="tooltip-arrow"></div>' + '<div class="tooltip-inner"></div></div>',
  trigger: 'hover focus',
  title: '',
  delay: 0,
  html: false,
  selector: false,
  placement: 'top',
  offset: 0,
  container: false,
  boundary: 'scrollParent',
  sanitize: true,
  sanitizeFn: null,
  whiteList: DefaultWhitelist,
  popperConfig: null
};
var Event$1 = {
  HIDE: "hide" + EVENT_KEY$8,
  HIDDEN: "hidden" + EVENT_KEY$8,
  SHOW: "show" + EVENT_KEY$8,
  SHOWN: "shown" + EVENT_KEY$8,
  INSERTED: "inserted" + EVENT_KEY$8,
  CLICK: "click" + EVENT_KEY$8,
  FOCUSIN: "focusin" + EVENT_KEY$8,
  FOCUSOUT: "focusout" + EVENT_KEY$8,
  MOUSEENTER: "mouseenter" + EVENT_KEY$8,
  MOUSELEAVE: "mouseleave" + EVENT_KEY$8
};
var CLASS_NAME_FADE$1 = 'fade';
var CLASS_NAME_MODAL = 'modal';
var CLASS_NAME_SHOW$4 = 'show';
var HOVER_STATE_SHOW = 'show';
var HOVER_STATE_OUT = 'out';
var SELECTOR_TOOLTIP_INNER = '.tooltip-inner';
var TRIGGER_HOVER = 'hover';
var TRIGGER_FOCUS = 'focus';
var TRIGGER_CLICK = 'click';
var TRIGGER_MANUAL = 'manual';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Tooltip = /*#__PURE__*/function () {
  function Tooltip(element, config) {
    if (typeof _popperjs_core__WEBPACK_IMPORTED_MODULE_0__["createPopper"] === 'undefined') {
      throw new TypeError('CoreUI\'s tooltips require Popper.js (https://popper.js.org)');
    } // private


    this._isEnabled = true;
    this._timeout = 0;
    this._hoverState = '';
    this._activeTrigger = {};
    this._popper = null; // Protected

    this.element = element;
    this.config = this._getConfig(config);
    this.tip = null;

    this._setListeners();

    Data.setData(element, this.constructor.DATA_KEY, this);
  } // Getters


  var _proto = Tooltip.prototype;

  // Public
  _proto.enable = function enable() {
    this._isEnabled = true;
  };

  _proto.disable = function disable() {
    this._isEnabled = false;
  };

  _proto.toggleEnabled = function toggleEnabled() {
    this._isEnabled = !this._isEnabled;
  };

  _proto.toggle = function toggle(event) {
    if (!this._isEnabled) {
      return;
    }

    if (event) {
      var dataKey = this.constructor.DATA_KEY;
      var context = Data.getData(event.target, dataKey);

      if (!context) {
        context = new this.constructor(event.target, this._getDelegateConfig());
        Data.setData(event.target, dataKey, context);
      }

      context._activeTrigger.click = !context._activeTrigger.click;

      if (context._isWithActiveTrigger()) {
        context._enter(null, context);
      } else {
        context._leave(null, context);
      }
    } else {
      if (this.getTipElement().classList.contains(CLASS_NAME_SHOW$4)) {
        this._leave(null, this);

        return;
      }

      this._enter(null, this);
    }
  };

  _proto.dispose = function dispose() {
    clearTimeout(this._timeout);
    Data.removeData(this.element, this.constructor.DATA_KEY);
    EventHandler.off(this.element, this.constructor.EVENT_KEY);
    EventHandler.off(this.element.closest("." + CLASS_NAME_MODAL), 'hide.coreui.modal', this._hideModalHandler);

    if (this.tip) {
      this.tip.parentNode.removeChild(this.tip);
    }

    this._isEnabled = null;
    this._timeout = null;
    this._hoverState = null;
    this._activeTrigger = null;

    if (this._popper) {
      this._popper.destroy();
    }

    this._popper = null;
    this.element = null;
    this.config = null;
    this.tip = null;
  };

  _proto.show = function show() {
    var _this = this;

    if (this.element.style.display === 'none') {
      throw new Error('Please use show on visible elements');
    }

    if (this.isWithContent() && this._isEnabled) {
      var showEvent = EventHandler.trigger(this.element, this.constructor.Event.SHOW);
      var shadowRoot = findShadowRoot(this.element);
      var isInTheDom = shadowRoot === null ? this.element.ownerDocument.documentElement.contains(this.element) : shadowRoot.contains(this.element);

      if (showEvent.defaultPrevented || !isInTheDom) {
        return;
      }

      var tip = this.getTipElement();
      var tipId = getUID(this.constructor.NAME);
      tip.setAttribute('id', tipId);
      this.element.setAttribute('aria-describedby', tipId);
      this.setContent();

      if (this.config.animation) {
        tip.classList.add(CLASS_NAME_FADE$1);
      }

      var placement = typeof this.config.placement === 'function' ? this.config.placement.call(this, tip, this.element) : this.config.placement;

      var attachment = this._getAttachment(placement); // this._addAttachmentClass(attachment)


      var container = this._getContainer();

      Data.setData(tip, this.constructor.DATA_KEY, this);

      if (!this.element.ownerDocument.documentElement.contains(this.tip)) {
        container.appendChild(tip);
      }

      EventHandler.trigger(this.element, this.constructor.Event.INSERTED);
      this._popper = Object(_popperjs_core__WEBPACK_IMPORTED_MODULE_0__["createPopper"])(this.element, tip, this._getPopperConfig(attachment));
      tip.classList.add(CLASS_NAME_SHOW$4); // If this is a touch-enabled device we add extra
      // empty mouseover listeners to the body's immediate children;
      // only needed because of broken event delegation on iOS
      // https://www.quirksmode.org/blog/archives/2014/02/mouse_event_bub.html

      if ('ontouchstart' in document.documentElement) {
        var _ref;

        (_ref = []).concat.apply(_ref, document.body.children).forEach(function (element) {
          EventHandler.on(element, 'mouseover', noop());
        });
      }

      var complete = function complete() {
        if (_this.config.animation) {
          _this._fixTransition();
        }

        var prevHoverState = _this._hoverState;
        _this._hoverState = null;
        EventHandler.trigger(_this.element, _this.constructor.Event.SHOWN);

        if (prevHoverState === HOVER_STATE_OUT) {
          _this._leave(null, _this);
        }
      };

      if (this.tip.classList.contains(CLASS_NAME_FADE$1)) {
        var transitionDuration = getTransitionDurationFromElement(this.tip);
        EventHandler.one(this.tip, TRANSITION_END, complete);
        emulateTransitionEnd(this.tip, transitionDuration);
      } else {
        complete();
      }
    }
  };

  _proto.hide = function hide() {
    var _this2 = this;

    var tip = this.getTipElement();

    var complete = function complete() {
      if (_this2._hoverState !== HOVER_STATE_SHOW && tip.parentNode) {
        tip.parentNode.removeChild(tip);
      }

      _this2._cleanTipClass();

      _this2.element.removeAttribute('aria-describedby');

      EventHandler.trigger(_this2.element, _this2.constructor.Event.HIDDEN);

      _this2._popper.destroy();
    };

    var hideEvent = EventHandler.trigger(this.element, this.constructor.Event.HIDE);

    if (hideEvent.defaultPrevented) {
      return;
    }

    tip.classList.remove(CLASS_NAME_SHOW$4); // If this is a touch-enabled device we remove the extra
    // empty mouseover listeners we added for iOS support

    if ('ontouchstart' in document.documentElement) {
      var _ref2;

      (_ref2 = []).concat.apply(_ref2, document.body.children).forEach(function (element) {
        return EventHandler.off(element, 'mouseover', noop);
      });
    }

    this._activeTrigger[TRIGGER_CLICK] = false;
    this._activeTrigger[TRIGGER_FOCUS] = false;
    this._activeTrigger[TRIGGER_HOVER] = false;

    if (this.tip.classList.contains(CLASS_NAME_FADE$1)) {
      var transitionDuration = getTransitionDurationFromElement(tip);
      EventHandler.one(tip, TRANSITION_END, complete);
      emulateTransitionEnd(tip, transitionDuration);
    } else {
      complete();
    }

    this._hoverState = '';
  };

  _proto.update = function update() {
    if (this._popper !== null) {
      this._popper.scheduleUpdate();
    }
  } // Protected
  ;

  _proto.isWithContent = function isWithContent() {
    return Boolean(this.getTitle());
  };

  _proto.getTipElement = function getTipElement() {
    if (this.tip) {
      return this.tip;
    }

    var element = document.createElement('div');
    element.innerHTML = this.config.template;
    this.tip = element.children[0];
    return this.tip;
  };

  _proto.setContent = function setContent() {
    var tip = this.getTipElement();
    this.setElementContent(SelectorEngine.findOne(SELECTOR_TOOLTIP_INNER, tip), this.getTitle());
    tip.classList.remove(CLASS_NAME_FADE$1, CLASS_NAME_SHOW$4);
  };

  _proto.setElementContent = function setElementContent(element, content) {
    if (element === null) {
      return;
    }

    if (typeof content === 'object' && isElement(content)) {
      if (content.jquery) {
        content = content[0];
      } // content is a DOM node or a jQuery


      if (this.config.html) {
        if (content.parentNode !== element) {
          element.innerHTML = '';
          element.appendChild(content);
        }
      } else {
        element.textContent = content.textContent;
      }

      return;
    }

    if (this.config.html) {
      if (this.config.sanitize) {
        content = sanitizeHtml(content, this.config.whiteList, this.config.sanitizeFn);
      }

      element.innerHTML = content;
    } else {
      element.textContent = content;
    }
  };

  _proto.getTitle = function getTitle() {
    var title = this.element.getAttribute('data-original-title');

    if (!title) {
      title = typeof this.config.title === 'function' ? this.config.title.call(this.element) : this.config.title;
    }

    return title;
  } // Private
  ;

  _proto._getPopperConfig = function _getPopperConfig(attachment) {
    var _this3 = this;

    var defaultBsConfig = {
      placement: attachment,
      modifiers: [{
        name: 'offset',
        options: {
          offset: this._getOffset()
        }
      }, {
        name: 'arrow',
        options: {
          element: "." + this.constructor.NAME + "-arrow"
        }
      }, {
        name: 'preventOverflow',
        options: {
          boundary: this.config.boundary
        }
      }],
      onFirstUpdate: function onFirstUpdate(data) {
        if (data.originalPlacement !== data.placement) {
          // this._handlePopperPlacementChange(data)
          // fix Popper position issue
          //TODO: find where is the problem or find better solution
          _this3._popper.update();
        }
      }
    };
    return _objectSpread2(_objectSpread2({}, defaultBsConfig), this.config.popperConfig);
  } // _addAttachmentClass(attachment) {
  //   this.getTipElement().classList.add(`${CLASS_PREFIX}-${attachment}`)
  // }
  ;

  _proto._getOffset = function _getOffset() {
    var _this4 = this;

    var offset = {};

    if (typeof this.config.offset === 'function') {
      offset.fn = function (data) {
        data.offsets = _objectSpread2(_objectSpread2({}, data.offsets), _this4.config.offset(data.offsets, _this4.element) || {});
        return data;
      };
    } else {
      offset.offset = this.config.offset;
    }

    return offset;
  };

  _proto._getContainer = function _getContainer() {
    if (this.config.container === false) {
      return document.body;
    }

    if (isElement(this.config.container)) {
      return this.config.container;
    }

    return SelectorEngine.findOne(this.config.container);
  };

  _proto._getAttachment = function _getAttachment(placement) {
    return AttachmentMap[placement.toUpperCase()];
  };

  _proto._setListeners = function _setListeners() {
    var _this5 = this;

    var triggers = this.config.trigger.split(' ');
    triggers.forEach(function (trigger) {
      if (trigger === 'click') {
        EventHandler.on(_this5.element, _this5.constructor.Event.CLICK, _this5.config.selector, function (event) {
          return _this5.toggle(event);
        });
      } else if (trigger !== TRIGGER_MANUAL) {
        var eventIn = trigger === TRIGGER_HOVER ? _this5.constructor.Event.MOUSEENTER : _this5.constructor.Event.FOCUSIN;
        var eventOut = trigger === TRIGGER_HOVER ? _this5.constructor.Event.MOUSELEAVE : _this5.constructor.Event.FOCUSOUT;
        EventHandler.on(_this5.element, eventIn, _this5.config.selector, function (event) {
          return _this5._enter(event);
        });
        EventHandler.on(_this5.element, eventOut, _this5.config.selector, function (event) {
          return _this5._leave(event);
        });
      }
    });

    this._hideModalHandler = function () {
      if (_this5.element) {
        _this5.hide();
      }
    };

    EventHandler.on(this.element.closest("." + CLASS_NAME_MODAL), 'hide.coreui.modal', this._hideModalHandler);

    if (this.config.selector) {
      this.config = _objectSpread2(_objectSpread2({}, this.config), {}, {
        trigger: 'manual',
        selector: ''
      });
    } else {
      this._fixTitle();
    }
  };

  _proto._fixTitle = function _fixTitle() {
    var titleType = typeof this.element.getAttribute('data-original-title');

    if (this.element.getAttribute('title') || titleType !== 'string') {
      this.element.setAttribute('data-original-title', this.element.getAttribute('title') || '');
      this.element.setAttribute('title', '');
    }
  };

  _proto._enter = function _enter(event, context) {
    var dataKey = this.constructor.DATA_KEY;
    context = context || Data.getData(event.target, dataKey);

    if (!context) {
      context = new this.constructor(event.target, this._getDelegateConfig());
      Data.setData(event.target, dataKey, context);
    }

    if (event) {
      context._activeTrigger[event.type === 'focusin' ? TRIGGER_FOCUS : TRIGGER_HOVER] = true;
    }

    if (context.getTipElement().classList.contains(CLASS_NAME_SHOW$4) || context._hoverState === HOVER_STATE_SHOW) {
      context._hoverState = HOVER_STATE_SHOW;
      return;
    }

    clearTimeout(context._timeout);
    context._hoverState = HOVER_STATE_SHOW;

    if (!context.config.delay || !context.config.delay.show) {
      context.show();
      return;
    }

    context._timeout = setTimeout(function () {
      if (context._hoverState === HOVER_STATE_SHOW) {
        context.show();
      }
    }, context.config.delay.show);
  };

  _proto._leave = function _leave(event, context) {
    var dataKey = this.constructor.DATA_KEY;
    context = context || Data.getData(event.target, dataKey);

    if (!context) {
      context = new this.constructor(event.target, this._getDelegateConfig());
      Data.setData(event.target, dataKey, context);
    }

    if (event) {
      context._activeTrigger[event.type === 'focusout' ? TRIGGER_FOCUS : TRIGGER_HOVER] = false;
    }

    if (context._isWithActiveTrigger()) {
      return;
    }

    clearTimeout(context._timeout);
    context._hoverState = HOVER_STATE_OUT;

    if (!context.config.delay || !context.config.delay.hide) {
      context.hide();
      return;
    }

    context._timeout = setTimeout(function () {
      if (context._hoverState === HOVER_STATE_OUT) {
        context.hide();
      }
    }, context.config.delay.hide);
  };

  _proto._isWithActiveTrigger = function _isWithActiveTrigger() {
    for (var trigger in this._activeTrigger) {
      if (this._activeTrigger[trigger]) {
        return true;
      }
    }

    return false;
  };

  _proto._getConfig = function _getConfig(config) {
    var dataAttributes = Manipulator.getDataAttributes(this.element);
    Object.keys(dataAttributes).forEach(function (dataAttr) {
      if (DISALLOWED_ATTRIBUTES.indexOf(dataAttr) !== -1) {
        delete dataAttributes[dataAttr];
      }
    });

    if (config && typeof config.container === 'object' && config.container.jquery) {
      config.container = config.container[0];
    }

    config = _objectSpread2(_objectSpread2(_objectSpread2({}, this.constructor.Default), dataAttributes), typeof config === 'object' && config ? config : {});

    if (typeof config.delay === 'number') {
      config.delay = {
        show: config.delay,
        hide: config.delay
      };
    }

    if (typeof config.title === 'number') {
      config.title = config.title.toString();
    }

    if (typeof config.content === 'number') {
      config.content = config.content.toString();
    }

    typeCheckConfig(NAME$8, config, this.constructor.DefaultType);

    if (config.sanitize) {
      config.template = sanitizeHtml(config.template, config.whiteList, config.sanitizeFn);
    }

    return config;
  };

  _proto._getDelegateConfig = function _getDelegateConfig() {
    var config = {};

    if (this.config) {
      for (var key in this.config) {
        if (this.constructor.Default[key] !== this.config[key]) {
          config[key] = this.config[key];
        }
      }
    }

    return config;
  };

  _proto._cleanTipClass = function _cleanTipClass() {
    var tip = this.getTipElement();
    console.log(this.tip);
    var tabClass = tip.getAttribute('class').match(BSCLS_PREFIX_REGEX);

    if (tabClass !== null && tabClass.length > 0) {
      tabClass.map(function (token) {
        return token.trim();
      }).forEach(function (tClass) {
        return tip.classList.remove(tClass);
      });
    }
  } // _handlePopperPlacementChange(popperData) {
  //   console.log(popperData)
  //   const popperInstance = popperData.elements.popper
  //   this.tip = document.getElementById(popperInstance.getAttribute('id'))
  //   console.log(this.tip)
  //   this._cleanTipClass()
  //   this._addAttachmentClass(this._getAttachment(popperData.placement))
  // }
  ;

  _proto._fixTransition = function _fixTransition() {
    var tip = this.getTipElement();
    var initConfigAnimation = this.config.animation;

    if (tip.getAttribute('data-popper-placement') !== null) {
      return;
    }

    tip.classList.remove(CLASS_NAME_FADE$1);
    this.config.animation = false;
    this.hide();
    this.show();
    this.config.animation = initConfigAnimation;
  } // Static
  // Static
  ;

  Tooltip.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      var data = Data.getData(this, DATA_KEY$8);

      var _config = typeof config === 'object' && config;

      if (!data && /dispose|hide/.test(config)) {
        return;
      }

      if (!data) {
        data = new Tooltip(this, _config);
      }

      if (typeof config === 'string') {
        if (typeof data[config] === 'undefined') {
          throw new TypeError("No method named \"" + config + "\"");
        }

        data[config]();
      }
    });
  };

  Tooltip.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$8);
  };

  _createClass(Tooltip, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$8;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default$6;
    }
  }, {
    key: "NAME",
    get: function get() {
      return NAME$8;
    }
  }, {
    key: "DATA_KEY",
    get: function get() {
      return DATA_KEY$8;
    }
  }, {
    key: "Event",
    get: function get() {
      return Event$1;
    }
  }, {
    key: "EVENT_KEY",
    get: function get() {
      return EVENT_KEY$8;
    }
  }, {
    key: "DefaultType",
    get: function get() {
      return DefaultType$4;
    }
  }]);

  return Tooltip;
}();

var $$9 = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .tooltip to jQuery only if jQuery is present
 */

/* istanbul ignore if */

if ($$9) {
  var JQUERY_NO_CONFLICT$8 = $$9.fn[NAME$8];
  $$9.fn[NAME$8] = Tooltip.jQueryInterface;
  $$9.fn[NAME$8].Constructor = Tooltip;

  $$9.fn[NAME$8].noConflict = function () {
    $$9.fn[NAME$8] = JQUERY_NO_CONFLICT$8;
    return Tooltip.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$9 = 'popover';
var VERSION$9 = '3.2.0';
var DATA_KEY$9 = 'coreui.popover';
var EVENT_KEY$9 = "." + DATA_KEY$9;
var CLASS_PREFIX$1 = 'bs-popover';
var BSCLS_PREFIX_REGEX$1 = new RegExp("(^|\\s)" + CLASS_PREFIX$1 + "\\S+", 'g');

var Default$7 = _objectSpread2(_objectSpread2({}, Tooltip.Default), {}, {
  placement: 'right',
  trigger: 'click',
  content: '',
  template: '<div class="popover" role="tooltip">' + '<div class="popover-arrow"></div>' + '<h3 class="popover-header"></h3>' + '<div class="popover-body"></div></div>'
});

var DefaultType$5 = _objectSpread2(_objectSpread2({}, Tooltip.DefaultType), {}, {
  content: '(string|element|function)'
});

var Event$2 = {
  HIDE: "hide" + EVENT_KEY$9,
  HIDDEN: "hidden" + EVENT_KEY$9,
  SHOW: "show" + EVENT_KEY$9,
  SHOWN: "shown" + EVENT_KEY$9,
  INSERTED: "inserted" + EVENT_KEY$9,
  CLICK: "click" + EVENT_KEY$9,
  FOCUSIN: "focusin" + EVENT_KEY$9,
  FOCUSOUT: "focusout" + EVENT_KEY$9,
  MOUSEENTER: "mouseenter" + EVENT_KEY$9,
  MOUSELEAVE: "mouseleave" + EVENT_KEY$9
};
var CLASS_NAME_FADE$2 = 'fade';
var CLASS_NAME_SHOW$5 = 'show';
var SELECTOR_TITLE = '.popover-header';
var SELECTOR_CONTENT = '.popover-body';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Popover = /*#__PURE__*/function (_Tooltip) {
  _inheritsLoose(Popover, _Tooltip);

  function Popover() {
    return _Tooltip.apply(this, arguments) || this;
  }

  var _proto = Popover.prototype;

  // Overrides
  _proto.isWithContent = function isWithContent() {
    return this.getTitle() || this._getContent();
  };

  _proto.setContent = function setContent() {
    var tip = this.getTipElement(); // we use append for html objects to maintain js events

    this.setElementContent(SelectorEngine.findOne(SELECTOR_TITLE, tip), this.getTitle());

    var content = this._getContent();

    if (typeof content === 'function') {
      content = content.call(this.element);
    }

    this.setElementContent(SelectorEngine.findOne(SELECTOR_CONTENT, tip), content);
    tip.classList.remove(CLASS_NAME_FADE$2, CLASS_NAME_SHOW$5);
  };

  _proto._addAttachmentClass = function _addAttachmentClass(attachment) {
    this.getTipElement().classList.add(CLASS_PREFIX$1 + "-" + attachment);
  } // Private
  ;

  _proto._getContent = function _getContent() {
    return this.element.getAttribute('data-content') || this.config.content;
  };

  _proto._cleanTipClass = function _cleanTipClass() {
    var tip = this.getTipElement();
    var tabClass = tip.getAttribute('class').match(BSCLS_PREFIX_REGEX$1);

    if (tabClass !== null && tabClass.length > 0) {
      tabClass.map(function (token) {
        return token.trim();
      }).forEach(function (tClass) {
        return tip.classList.remove(tClass);
      });
    }
  } // Static
  ;

  Popover.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      var data = Data.getData(this, DATA_KEY$9);

      var _config = typeof config === 'object' ? config : null;

      if (!data && /dispose|hide/.test(config)) {
        return;
      }

      if (!data) {
        data = new Popover(this, _config);
        Data.setData(this, DATA_KEY$9, data);
      }

      if (typeof config === 'string') {
        if (typeof data[config] === 'undefined') {
          throw new TypeError("No method named \"" + config + "\"");
        }

        data[config]();
      }
    });
  };

  Popover.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$9);
  };

  _createClass(Popover, null, [{
    key: "VERSION",
    // Getters
    get: function get() {
      return VERSION$9;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default$7;
    }
  }, {
    key: "NAME",
    get: function get() {
      return NAME$9;
    }
  }, {
    key: "DATA_KEY",
    get: function get() {
      return DATA_KEY$9;
    }
  }, {
    key: "Event",
    get: function get() {
      return Event$2;
    }
  }, {
    key: "EVENT_KEY",
    get: function get() {
      return EVENT_KEY$9;
    }
  }, {
    key: "DefaultType",
    get: function get() {
      return DefaultType$5;
    }
  }]);

  return Popover;
}(Tooltip);

var $$a = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 */

/* istanbul ignore if */

if ($$a) {
  var JQUERY_NO_CONFLICT$9 = $$a.fn[NAME$9];
  $$a.fn[NAME$9] = Popover.jQueryInterface;
  $$a.fn[NAME$9].Constructor = Popover;

  $$a.fn[NAME$9].noConflict = function () {
    $$a.fn[NAME$9] = JQUERY_NO_CONFLICT$9;
    return Popover.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$a = 'scrollspy';
var VERSION$a = '3.2.0';
var DATA_KEY$a = 'coreui.scrollspy';
var EVENT_KEY$a = "." + DATA_KEY$a;
var DATA_API_KEY$8 = '.data-api';
var Default$8 = {
  offset: 10,
  method: 'auto',
  target: ''
};
var DefaultType$6 = {
  offset: 'number',
  method: 'string',
  target: '(string|element)'
};
var EVENT_ACTIVATE = "activate" + EVENT_KEY$a;
var EVENT_SCROLL = "scroll" + EVENT_KEY$a;
var EVENT_LOAD_DATA_API$1 = "load" + EVENT_KEY$a + DATA_API_KEY$8;
var CLASS_NAME_DROPDOWN_ITEM = 'dropdown-item';
var CLASS_NAME_ACTIVE$3 = 'active';
var SELECTOR_DATA_SPY = '[data-spy="scroll"]';
var SELECTOR_NAV_LIST_GROUP = '.nav, .list-group';
var SELECTOR_NAV_LINKS = '.nav-link';
var SELECTOR_NAV_ITEMS = '.nav-item';
var SELECTOR_LIST_ITEMS = '.list-group-item';
var SELECTOR_DROPDOWN = '.dropdown';
var SELECTOR_DROPDOWN_TOGGLE = '.dropdown-toggle';
var METHOD_OFFSET = 'offset';
var METHOD_POSITION = 'position';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var ScrollSpy = /*#__PURE__*/function () {
  function ScrollSpy(element, config) {
    var _this = this;

    this._element = element;
    this._scrollElement = element.tagName === 'BODY' ? window : element;
    this._config = this._getConfig(config);
    this._selector = this._config.target + " " + SELECTOR_NAV_LINKS + "," + (this._config.target + " " + SELECTOR_LIST_ITEMS + ",") + (this._config.target + " ." + CLASS_NAME_DROPDOWN_ITEM);
    this._offsets = [];
    this._targets = [];
    this._activeTarget = null;
    this._scrollHeight = 0;
    EventHandler.on(this._scrollElement, EVENT_SCROLL, function (event) {
      return _this._process(event);
    });
    this.refresh();

    this._process();

    Data.setData(element, DATA_KEY$a, this);
  } // Getters


  var _proto = ScrollSpy.prototype;

  // Public
  _proto.refresh = function refresh() {
    var _this2 = this;

    var autoMethod = this._scrollElement === this._scrollElement.window ? METHOD_OFFSET : METHOD_POSITION;
    var offsetMethod = this._config.method === 'auto' ? autoMethod : this._config.method;
    var offsetBase = offsetMethod === METHOD_POSITION ? this._getScrollTop() : 0;
    this._offsets = [];
    this._targets = [];
    this._scrollHeight = this._getScrollHeight();
    var targets = SelectorEngine.find(this._selector);
    targets.map(function (element) {
      var target;
      var targetSelector = getSelectorFromElement(element);

      if (targetSelector) {
        target = SelectorEngine.findOne(targetSelector);
      }

      if (target) {
        var targetBCR = target.getBoundingClientRect();

        if (targetBCR.width || targetBCR.height) {
          return [Manipulator[offsetMethod](target).top + offsetBase, targetSelector];
        }
      }

      return null;
    }).filter(function (item) {
      return item;
    }).sort(function (a, b) {
      return a[0] - b[0];
    }).forEach(function (item) {
      _this2._offsets.push(item[0]);

      _this2._targets.push(item[1]);
    });
  };

  _proto.dispose = function dispose() {
    Data.removeData(this._element, DATA_KEY$a);
    EventHandler.off(this._scrollElement, EVENT_KEY$a);
    this._element = null;
    this._scrollElement = null;
    this._config = null;
    this._selector = null;
    this._offsets = null;
    this._targets = null;
    this._activeTarget = null;
    this._scrollHeight = null;
  } // Private
  ;

  _proto._getConfig = function _getConfig(config) {
    config = _objectSpread2(_objectSpread2({}, Default$8), typeof config === 'object' && config ? config : {});

    if (typeof config.target !== 'string' && isElement(config.target)) {
      var id = config.target.id;

      if (!id) {
        id = getUID(NAME$a);
        config.target.id = id;
      }

      config.target = "#" + id;
    }

    typeCheckConfig(NAME$a, config, DefaultType$6);
    return config;
  };

  _proto._getScrollTop = function _getScrollTop() {
    return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop;
  };

  _proto._getScrollHeight = function _getScrollHeight() {
    return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
  };

  _proto._getOffsetHeight = function _getOffsetHeight() {
    return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height;
  };

  _proto._process = function _process() {
    var scrollTop = this._getScrollTop() + this._config.offset;

    var scrollHeight = this._getScrollHeight();

    var maxScroll = this._config.offset + scrollHeight - this._getOffsetHeight();

    if (this._scrollHeight !== scrollHeight) {
      this.refresh();
    }

    if (scrollTop >= maxScroll) {
      var target = this._targets[this._targets.length - 1];

      if (this._activeTarget !== target) {
        this._activate(target);
      }

      return;
    }

    if (this._activeTarget && scrollTop < this._offsets[0] && this._offsets[0] > 0) {
      this._activeTarget = null;

      this._clear();

      return;
    }

    for (var i = this._offsets.length; i--;) {
      var isActiveTarget = this._activeTarget !== this._targets[i] && scrollTop >= this._offsets[i] && (typeof this._offsets[i + 1] === 'undefined' || scrollTop < this._offsets[i + 1]);

      if (isActiveTarget) {
        this._activate(this._targets[i]);
      }
    }
  };

  _proto._activate = function _activate(target) {
    this._activeTarget = target;

    this._clear();

    var queries = this._selector.split(',').map(function (selector) {
      return selector + "[data-target=\"" + target + "\"]," + selector + "[href=\"" + target + "\"]";
    });

    var link = SelectorEngine.findOne(queries.join(','));

    if (link.classList.contains(CLASS_NAME_DROPDOWN_ITEM)) {
      SelectorEngine.findOne(SELECTOR_DROPDOWN_TOGGLE, link.closest(SELECTOR_DROPDOWN)).classList.add(CLASS_NAME_ACTIVE$3);
      link.classList.add(CLASS_NAME_ACTIVE$3);
    } else {
      // Set triggered link as active
      link.classList.add(CLASS_NAME_ACTIVE$3);
      SelectorEngine.parents(link, SELECTOR_NAV_LIST_GROUP).forEach(function (listGroup) {
        // Set triggered links parents as active
        // With both <ul> and <nav> markup a parent is the previous sibling of any nav ancestor
        SelectorEngine.prev(listGroup, SELECTOR_NAV_LINKS + ", " + SELECTOR_LIST_ITEMS).forEach(function (item) {
          return item.classList.add(CLASS_NAME_ACTIVE$3);
        }); // Handle special case when .nav-link is inside .nav-item

        SelectorEngine.prev(listGroup, SELECTOR_NAV_ITEMS).forEach(function (navItem) {
          SelectorEngine.children(navItem, SELECTOR_NAV_LINKS).forEach(function (item) {
            return item.classList.add(CLASS_NAME_ACTIVE$3);
          });
        });
      });
    }

    EventHandler.trigger(this._scrollElement, EVENT_ACTIVATE, {
      relatedTarget: target
    });
  };

  _proto._clear = function _clear() {
    SelectorEngine.find(this._selector).filter(function (node) {
      return node.classList.contains(CLASS_NAME_ACTIVE$3);
    }).forEach(function (node) {
      return node.classList.remove(CLASS_NAME_ACTIVE$3);
    });
  } // Static
  ;

  ScrollSpy.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      var data = Data.getData(this, DATA_KEY$a);

      var _config = typeof config === 'object' && config;

      if (!data) {
        data = new ScrollSpy(this, _config);
      }

      if (typeof config === 'string') {
        if (typeof data[config] === 'undefined') {
          throw new TypeError("No method named \"" + config + "\"");
        }

        data[config]();
      }
    });
  };

  ScrollSpy.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$a);
  };

  _createClass(ScrollSpy, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$a;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default$8;
    }
  }]);

  return ScrollSpy;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(window, EVENT_LOAD_DATA_API$1, function () {
  SelectorEngine.find(SELECTOR_DATA_SPY).forEach(function (spy) {
    return new ScrollSpy(spy, Manipulator.getDataAttributes(spy));
  });
});
var $$b = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 */

/* istanbul ignore if */

if ($$b) {
  var JQUERY_NO_CONFLICT$a = $$b.fn[NAME$a];
  $$b.fn[NAME$a] = ScrollSpy.jQueryInterface;
  $$b.fn[NAME$a].Constructor = ScrollSpy;

  $$b.fn[NAME$a].noConflict = function () {
    $$b.fn[NAME$a] = JQUERY_NO_CONFLICT$a;
    return ScrollSpy.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$b = 'sidebar';
var VERSION$b = '3.2.0';
var DATA_KEY$b = 'coreui.sidebar';
var EVENT_KEY$b = "." + DATA_KEY$b;
var DATA_API_KEY$9 = '.data-api';
var Default$9 = {
  breakpoints: {
    xs: 'c-sidebar-show',
    sm: 'c-sidebar-sm-show',
    md: 'c-sidebar-md-show',
    lg: 'c-sidebar-lg-show',
    xl: 'c-sidebar-xl-show'
  },
  dropdownAccordion: true
};
var DefaultType$7 = {
  breakpoints: 'object',
  dropdownAccordion: '(string|boolean)'
};
var CLASS_NAME_ACTIVE$4 = 'c-active';
var CLASS_NAME_BACKDROP$1 = 'c-sidebar-backdrop';
var CLASS_NAME_FADE$3 = 'c-fade';
var CLASS_NAME_NAV_DROPDOWN = 'c-sidebar-nav-dropdown';
var CLASS_NAME_NAV_DROPDOWN_TOGGLE$1 = 'c-sidebar-nav-dropdown-toggle';
var CLASS_NAME_SHOW$6 = 'c-show';
var CLASS_NAME_SIDEBAR_MINIMIZED = 'c-sidebar-minimized';
var CLASS_NAME_SIDEBAR_OVERLAID = 'c-sidebar-overlaid';
var CLASS_NAME_SIDEBAR_UNFOLDABLE = 'c-sidebar-unfoldable';
var EVENT_CLASS_TOGGLE$1 = 'classtoggle';
var EVENT_CLICK_DATA_API$8 = "click" + EVENT_KEY$b + DATA_API_KEY$9;
var EVENT_CLOSE$1 = "close" + EVENT_KEY$b;
var EVENT_CLOSED$1 = "closed" + EVENT_KEY$b;
var EVENT_LOAD_DATA_API$2 = "load" + EVENT_KEY$b + DATA_API_KEY$9;
var EVENT_OPEN = "open" + EVENT_KEY$b;
var EVENT_OPENED = "opened" + EVENT_KEY$b;
var SELECTOR_NAV_DROPDOWN_TOGGLE = '.c-sidebar-nav-dropdown-toggle';
var SELECTOR_NAV_DROPDOWN$1 = '.c-sidebar-nav-dropdown';
var SELECTOR_NAV_LINK$1 = '.c-sidebar-nav-link';
var SELECTOR_NAVIGATION_CONTAINER = '.c-sidebar-nav';
var SELECTOR_SIDEBAR = '.c-sidebar';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Sidebar = /*#__PURE__*/function () {
  function Sidebar(element, config) {
    if (typeof perfect_scrollbar__WEBPACK_IMPORTED_MODULE_1__["default"] === 'undefined') {
      throw new TypeError('CoreUI\'s sidebar require Perfect Scrollbar');
    }

    this._element = element;
    this._config = this._getConfig(config);
    this._open = this._isVisible();
    this._mobile = this._isMobile();
    this._overlaid = this._isOverlaid();
    this._minimize = this._isMinimized();
    this._unfoldable = this._isUnfoldable();

    this._setActiveLink();

    this._ps = null;
    this._backdrop = null;

    this._psInit();

    this._addEventListeners();

    Data.setData(element, DATA_KEY$b, this);
  } // Getters


  var _proto = Sidebar.prototype;

  // Public
  _proto.open = function open(breakpoint) {
    var _this = this;

    EventHandler.trigger(this._element, EVENT_OPEN);

    if (this._isMobile()) {
      this._addClassName(this._firstBreakpointClassName());

      this._showBackdrop();

      EventHandler.one(this._element, TRANSITION_END, function () {
        _this._addClickOutListener();
      });
    } else if (breakpoint) {
      this._addClassName(this._getBreakpointClassName(breakpoint));

      if (this._isOverlaid()) {
        EventHandler.one(this._element, TRANSITION_END, function () {
          _this._addClickOutListener();
        });
      }
    } else {
      this._addClassName(this._firstBreakpointClassName());

      if (this._isOverlaid()) {
        EventHandler.one(this._element, TRANSITION_END, function () {
          _this._addClickOutListener();
        });
      }
    }

    var complete = function complete() {
      if (_this._isVisible() === true) {
        _this._open = true;
        EventHandler.trigger(_this._element, EVENT_OPENED);
      }
    };

    EventHandler.one(this._element, TRANSITION_END, complete);
  };

  _proto.close = function close(breakpoint) {
    var _this2 = this;

    EventHandler.trigger(this._element, EVENT_CLOSE$1);

    if (this._isMobile()) {
      this._element.classList.remove(this._firstBreakpointClassName());

      this._removeBackdrop();

      this._removeClickOutListener();
    } else if (breakpoint) {
      this._element.classList.remove(this._getBreakpointClassName(breakpoint));

      if (this._isOverlaid()) {
        this._removeClickOutListener();
      }
    } else {
      this._element.classList.remove(this._firstBreakpointClassName());

      if (this._isOverlaid()) {
        this._removeClickOutListener();
      }
    }

    var complete = function complete() {
      if (_this2._isVisible() === false) {
        _this2._open = false;
        EventHandler.trigger(_this2._element, EVENT_CLOSED$1);
      }
    };

    EventHandler.one(this._element, TRANSITION_END, complete);
  };

  _proto.toggle = function toggle(breakpoint) {
    if (this._open) {
      this.close(breakpoint);
    } else {
      this.open(breakpoint);
    }
  };

  _proto.minimize = function minimize() {
    if (!this._isMobile()) {
      this._addClassName(CLASS_NAME_SIDEBAR_MINIMIZED);

      this._minimize = true;

      this._psDestroy();
    }
  };

  _proto.unfoldable = function unfoldable() {
    if (!this._isMobile()) {
      this._addClassName(CLASS_NAME_SIDEBAR_UNFOLDABLE);

      this._unfoldable = true;
    }
  };

  _proto.reset = function reset() {
    if (this._element.classList.contains(CLASS_NAME_SIDEBAR_MINIMIZED)) {
      this._element.classList.remove(CLASS_NAME_SIDEBAR_MINIMIZED);

      this._minimize = false;
      EventHandler.one(this._element, TRANSITION_END, this._psInit());
    }

    if (this._element.classList.contains(CLASS_NAME_SIDEBAR_UNFOLDABLE)) {
      this._element.classList.remove(CLASS_NAME_SIDEBAR_UNFOLDABLE);

      this._unfoldable = false;
    }
  } // Private
  ;

  _proto._getConfig = function _getConfig(config) {
    config = _objectSpread2(_objectSpread2(_objectSpread2({}, this.constructor.Default), Manipulator.getDataAttributes(this._element)), config);
    typeCheckConfig(NAME$b, config, this.constructor.DefaultType);
    return config;
  };

  _proto._isMobile = function _isMobile() {
    return Boolean(window.getComputedStyle(this._element, null).getPropertyValue('--is-mobile'));
  };

  _proto._isIOS = function _isIOS() {
    var iOSDevices = ['iPad Simulator', 'iPhone Simulator', 'iPod Simulator', 'iPad', 'iPhone', 'iPod'];
    var platform = Boolean(navigator.platform);

    if (platform) {
      while (iOSDevices.length) {
        if (navigator.platform === iOSDevices.pop()) {
          return true;
        }
      }
    }

    return false;
  };

  _proto._isMinimized = function _isMinimized() {
    return this._element.classList.contains(CLASS_NAME_SIDEBAR_MINIMIZED);
  };

  _proto._isOverlaid = function _isOverlaid() {
    return this._element.classList.contains(CLASS_NAME_SIDEBAR_OVERLAID);
  };

  _proto._isUnfoldable = function _isUnfoldable() {
    return this._element.classList.contains(CLASS_NAME_SIDEBAR_UNFOLDABLE);
  };

  _proto._isVisible = function _isVisible() {
    var rect = this._element.getBoundingClientRect();

    return rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    /* or $(window).height() */
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    /* or $(window).width() */
    ;
  };

  _proto._addClassName = function _addClassName(className) {
    this._element.classList.add(className);
  };

  _proto._firstBreakpointClassName = function _firstBreakpointClassName() {
    return Object.keys(Default$9.breakpoints).map(function (key) {
      return Default$9.breakpoints[key];
    })[0];
  };

  _proto._getBreakpointClassName = function _getBreakpointClassName(breakpoint) {
    return Default$9.breakpoints[breakpoint];
  };

  _proto._removeBackdrop = function _removeBackdrop() {
    if (this._backdrop) {
      this._backdrop.parentNode.removeChild(this._backdrop);

      this._backdrop = null;
    }
  };

  _proto._showBackdrop = function _showBackdrop() {
    if (!this._backdrop) {
      this._backdrop = document.createElement('div');
      this._backdrop.className = CLASS_NAME_BACKDROP$1;

      this._backdrop.classList.add(CLASS_NAME_FADE$3);

      document.body.appendChild(this._backdrop);
      reflow(this._backdrop);

      this._backdrop.classList.add(CLASS_NAME_SHOW$6);
    }
  };

  _proto._clickOutListener = function _clickOutListener(event, sidebar) {
    if (event.target.closest(SELECTOR_SIDEBAR) === null) {
      // or use:
      event.preventDefault();
      event.stopPropagation();
      sidebar.close();
    }
  };

  _proto._addClickOutListener = function _addClickOutListener() {
    var _this3 = this;

    EventHandler.on(document, EVENT_CLICK_DATA_API$8, function (event) {
      _this3._clickOutListener(event, _this3);
    });
  };

  _proto._removeClickOutListener = function _removeClickOutListener() {
    EventHandler.off(document, EVENT_CLICK_DATA_API$8);
  } // Sidebar navigation
  ;

  _proto._getAllSiblings = function _getAllSiblings(element, filter) {
    var siblings = [];
    element = element.parentNode.firstChild;

    do {
      if (element.nodeType === 3) {
        continue; // text node
      }

      if (!filter || filter(element)) {
        siblings.push(element);
      } // eslint-disable-next-line no-cond-assign

    } while (element = element.nextSibling);

    return siblings;
  };

  _proto._toggleDropdown = function _toggleDropdown(event, sidebar) {
    var toggler = event.target;

    if (!toggler.classList.contains(CLASS_NAME_NAV_DROPDOWN_TOGGLE$1)) {
      toggler = toggler.closest(SELECTOR_NAV_DROPDOWN_TOGGLE);
    }

    var dataAttributes = toggler.closest(SELECTOR_NAVIGATION_CONTAINER).dataset;

    if (typeof dataAttributes.dropdownAccordion !== 'undefined') {
      Default$9.dropdownAccordion = JSON.parse(dataAttributes.dropdownAccordion);
    } // TODO: find better solution


    if (Default$9.dropdownAccordion === true) {
      this._getAllSiblings(toggler.parentElement).forEach(function (element) {
        if (element !== toggler.parentNode) {
          if (element.classList.contains(CLASS_NAME_NAV_DROPDOWN)) {
            element.classList.remove(CLASS_NAME_SHOW$6);
          }
        }
      });
    }

    toggler.parentNode.classList.toggle(CLASS_NAME_SHOW$6); // TODO: Set the toggler's position near to cursor after the click.
    // TODO: add transition end

    sidebar._psUpdate();
  } // PerfectScrollbar
  ;

  _proto._psInit = function _psInit() {
    if (this._element.querySelector(SELECTOR_NAVIGATION_CONTAINER) && !this._isIOS()) {
      this._ps = new perfect_scrollbar__WEBPACK_IMPORTED_MODULE_1__["default"](this._element.querySelector(SELECTOR_NAVIGATION_CONTAINER), {
        suppressScrollX: true,
        wheelPropagation: false
      });
    }
  };

  _proto._psUpdate = function _psUpdate() {
    if (this._ps) {
      this._ps.update();
    }
  };

  _proto._psDestroy = function _psDestroy() {
    if (this._ps) {
      this._ps.destroy();

      this._ps = null;
    }
  };

  _proto._getParents = function _getParents(element, selector) {
    // Setup parents array
    var parents = []; // Get matching parent elements

    for (; element && element !== document; element = element.parentNode) {
      // Add matching parents to array
      if (selector) {
        if (element.matches(selector)) {
          parents.push(element);
        }
      } else {
        parents.push(element);
      }
    }

    return parents;
  };

  _proto._setActiveLink = function _setActiveLink() {
    var _this4 = this;

    // eslint-disable-next-line unicorn/prefer-spread
    Array.from(this._element.querySelectorAll(SELECTOR_NAV_LINK$1)).forEach(function (element) {
      var currentUrl;
      var urlHasParams = /\\?.*=/;
      var urlHasQueryString = /\\?./;
      var urlHasHash = /#./;

      if (urlHasParams.test(String(window.location)) || urlHasQueryString.test(String(window.location))) {
        currentUrl = String(window.location).split('?')[0];
      } else if (urlHasHash.test(String(window.location))) {
        currentUrl = String(window.location).split('#')[0];
      } else {
        currentUrl = String(window.location);
      }

      if (currentUrl.slice(-1) === '#') {
        currentUrl = currentUrl.slice(0, -1);
      }

      if (element.href === currentUrl) {
        element.classList.add(CLASS_NAME_ACTIVE$4); // eslint-disable-next-line unicorn/prefer-spread

        Array.from(_this4._getParents(element, SELECTOR_NAV_DROPDOWN$1)).forEach(function (element) {
          element.classList.add(CLASS_NAME_SHOW$6);
        });
      }
    });
  };

  _proto._addEventListeners = function _addEventListeners() {
    var _this5 = this;

    if (this._mobile && this._open) {
      this._addClickOutListener();
    }

    if (this._overlaid && this._open) {
      this._addClickOutListener();
    }

    EventHandler.on(this._element, EVENT_CLASS_TOGGLE$1, function (event) {
      if (event.detail.className === CLASS_NAME_SIDEBAR_MINIMIZED) {
        if (_this5._element.classList.contains(CLASS_NAME_SIDEBAR_MINIMIZED)) {
          _this5.minimize();
        } else {
          _this5.reset();
        }
      }

      if (event.detail.className === CLASS_NAME_SIDEBAR_UNFOLDABLE) {
        if (_this5._element.classList.contains(CLASS_NAME_SIDEBAR_UNFOLDABLE)) {
          _this5.unfoldable();
        } else {
          _this5.reset();
        }
      }

      if (typeof Object.keys(Default$9.breakpoints).find(function (key) {
        return Default$9.breakpoints[key] === event.detail.className;
      }) !== 'undefined') {
        var className = event.detail.className;
        var breakpoint = Object.keys(Default$9.breakpoints).find(function (key) {
          return Default$9.breakpoints[key] === className;
        });

        if (event.detail.add) {
          _this5.open(breakpoint);
        } else {
          _this5.close(breakpoint);
        }
      }
    });
    EventHandler.on(this._element, EVENT_CLICK_DATA_API$8, SELECTOR_NAV_DROPDOWN_TOGGLE, function (event) {
      event.preventDefault();

      _this5._toggleDropdown(event, _this5);
    });
    EventHandler.on(this._element, EVENT_CLICK_DATA_API$8, SELECTOR_NAV_LINK$1, function () {
      if (_this5._isMobile()) {
        _this5.close();
      }
    });
  } // Static
  ;

  Sidebar._sidebarInterface = function _sidebarInterface(element, config) {
    var data = Data.getData(element, DATA_KEY$b);

    var _config = typeof config === 'object' && config;

    if (!data) {
      data = new Sidebar(element, _config);
    }

    if (typeof config === 'string') {
      if (typeof data[config] === 'undefined') {
        throw new TypeError("No method named \"" + config + "\"");
      }

      data[config]();
    }
  };

  Sidebar.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      Sidebar._sidebarInterface(this, config);
    });
  };

  Sidebar.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$b);
  };

  _createClass(Sidebar, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$b;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default$9;
    }
  }, {
    key: "DefaultType",
    get: function get() {
      return DefaultType$7;
    }
  }]);

  return Sidebar;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(window, EVENT_LOAD_DATA_API$2, function () {
  // eslint-disable-next-line unicorn/prefer-spread
  Array.from(document.querySelectorAll(SELECTOR_SIDEBAR)).forEach(function (element) {
    Sidebar._sidebarInterface(element);
  });
});
var $$c = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 */

if ($$c) {
  var JQUERY_NO_CONFLICT$b = $$c.fn[NAME$b];
  $$c.fn[NAME$b] = Sidebar.jQueryInterface;
  $$c.fn[NAME$b].Constructor = Sidebar;

  $$c.fn[NAME$b].noConflict = function () {
    $$c.fn[NAME$b] = JQUERY_NO_CONFLICT$b;
    return Sidebar.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$c = 'tab';
var VERSION$c = '3.2.0';
var DATA_KEY$c = 'coreui.tab';
var EVENT_KEY$c = "." + DATA_KEY$c;
var DATA_API_KEY$a = '.data-api';
var EVENT_HIDE$3 = "hide" + EVENT_KEY$c;
var EVENT_HIDDEN$3 = "hidden" + EVENT_KEY$c;
var EVENT_SHOW$3 = "show" + EVENT_KEY$c;
var EVENT_SHOWN$3 = "shown" + EVENT_KEY$c;
var EVENT_CLICK_DATA_API$9 = "click" + EVENT_KEY$c + DATA_API_KEY$a;
var CLASS_NAME_DROPDOWN_MENU = 'dropdown-menu';
var CLASS_NAME_ACTIVE$5 = 'active';
var CLASS_NAME_DISABLED$2 = 'disabled';
var CLASS_NAME_FADE$4 = 'fade';
var CLASS_NAME_SHOW$7 = 'show';
var SELECTOR_DROPDOWN$1 = '.dropdown';
var SELECTOR_NAV_LIST_GROUP$1 = '.nav, .list-group';
var SELECTOR_ACTIVE$2 = '.active';
var SELECTOR_ACTIVE_UL = ':scope > li > .active';
var SELECTOR_DATA_TOGGLE$4 = '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]';
var SELECTOR_DROPDOWN_TOGGLE$1 = '.dropdown-toggle';
var SELECTOR_DROPDOWN_ACTIVE_CHILD = ':scope > .dropdown-menu .active';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Tab = /*#__PURE__*/function () {
  function Tab(element) {
    this._element = element;
    Data.setData(this._element, DATA_KEY$c, this);
  } // Getters


  var _proto = Tab.prototype;

  // Public
  _proto.show = function show() {
    var _this = this;

    if (this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && this._element.classList.contains(CLASS_NAME_ACTIVE$5) || this._element.classList.contains(CLASS_NAME_DISABLED$2)) {
      return;
    }

    var previous;
    var target = getElementFromSelector(this._element);

    var listElement = this._element.closest(SELECTOR_NAV_LIST_GROUP$1);

    if (listElement) {
      var itemSelector = listElement.nodeName === 'UL' || listElement.nodeName === 'OL' ? SELECTOR_ACTIVE_UL : SELECTOR_ACTIVE$2;
      previous = SelectorEngine.find(itemSelector, listElement);
      previous = previous[previous.length - 1];
    }

    var hideEvent = null;

    if (previous) {
      hideEvent = EventHandler.trigger(previous, EVENT_HIDE$3, {
        relatedTarget: this._element
      });
    }

    var showEvent = EventHandler.trigger(this._element, EVENT_SHOW$3, {
      relatedTarget: previous
    });

    if (showEvent.defaultPrevented || hideEvent !== null && hideEvent.defaultPrevented) {
      return;
    }

    this._activate(this._element, listElement);

    var complete = function complete() {
      EventHandler.trigger(previous, EVENT_HIDDEN$3, {
        relatedTarget: _this._element
      });
      EventHandler.trigger(_this._element, EVENT_SHOWN$3, {
        relatedTarget: previous
      });
    };

    if (target) {
      this._activate(target, target.parentNode, complete);
    } else {
      complete();
    }
  };

  _proto.dispose = function dispose() {
    Data.removeData(this._element, DATA_KEY$c);
    this._element = null;
  } // Private
  ;

  _proto._activate = function _activate(element, container, callback) {
    var _this2 = this;

    var activeElements = container && (container.nodeName === 'UL' || container.nodeName === 'OL') ? SelectorEngine.find(SELECTOR_ACTIVE_UL, container) : SelectorEngine.children(container, SELECTOR_ACTIVE$2);
    var active = activeElements[0];
    var isTransitioning = callback && active && active.classList.contains(CLASS_NAME_FADE$4);

    var complete = function complete() {
      return _this2._transitionComplete(element, active, callback);
    };

    if (active && isTransitioning) {
      var transitionDuration = getTransitionDurationFromElement(active);
      active.classList.remove(CLASS_NAME_SHOW$7);
      EventHandler.one(active, TRANSITION_END, complete);
      emulateTransitionEnd(active, transitionDuration);
    } else {
      complete();
    }
  };

  _proto._transitionComplete = function _transitionComplete(element, active, callback) {
    if (active) {
      active.classList.remove(CLASS_NAME_ACTIVE$5);
      var dropdownChild = SelectorEngine.findOne(SELECTOR_DROPDOWN_ACTIVE_CHILD, active.parentNode);

      if (dropdownChild) {
        dropdownChild.classList.remove(CLASS_NAME_ACTIVE$5);
      }

      if (active.getAttribute('role') === 'tab') {
        active.setAttribute('aria-selected', false);
      }
    }

    element.classList.add(CLASS_NAME_ACTIVE$5);

    if (element.getAttribute('role') === 'tab') {
      element.setAttribute('aria-selected', true);
    }

    reflow(element);

    if (element.classList.contains(CLASS_NAME_FADE$4)) {
      element.classList.add(CLASS_NAME_SHOW$7);
    }

    if (element.parentNode && element.parentNode.classList.contains(CLASS_NAME_DROPDOWN_MENU)) {
      var dropdownElement = element.closest(SELECTOR_DROPDOWN$1);

      if (dropdownElement) {
        SelectorEngine.find(SELECTOR_DROPDOWN_TOGGLE$1).forEach(function (dropdown) {
          return dropdown.classList.add(CLASS_NAME_ACTIVE$5);
        });
      }

      element.setAttribute('aria-expanded', true);
    }

    if (callback) {
      callback();
    }
  } // Static
  ;

  Tab.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      var data = Data.getData(this, DATA_KEY$c) || new Tab(this);

      if (typeof config === 'string') {
        if (typeof data[config] === 'undefined') {
          throw new TypeError("No method named \"" + config + "\"");
        }

        data[config]();
      }
    });
  };

  Tab.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$c);
  };

  _createClass(Tab, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$c;
    }
  }]);

  return Tab;
}();
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */


EventHandler.on(document, EVENT_CLICK_DATA_API$9, SELECTOR_DATA_TOGGLE$4, function (event) {
  event.preventDefault();
  var data = Data.getData(this, DATA_KEY$c) || new Tab(this);
  data.show();
});
var $$d = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 * add .tab to jQuery only if jQuery is present
 */

/* istanbul ignore if */

if ($$d) {
  var JQUERY_NO_CONFLICT$c = $$d.fn[NAME$c];
  $$d.fn[NAME$c] = Tab.jQueryInterface;
  $$d.fn[NAME$c].Constructor = Tab;

  $$d.fn[NAME$c].noConflict = function () {
    $$d.fn[NAME$c] = JQUERY_NO_CONFLICT$c;
    return Tab.jQueryInterface;
  };
}

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

var NAME$d = 'toast';
var VERSION$d = '3.2.0';
var DATA_KEY$d = 'coreui.toast';
var EVENT_KEY$d = "." + DATA_KEY$d;
var EVENT_CLICK_DISMISS$1 = "click.dismiss" + EVENT_KEY$d;
var EVENT_HIDE$4 = "hide" + EVENT_KEY$d;
var EVENT_HIDDEN$4 = "hidden" + EVENT_KEY$d;
var EVENT_SHOW$4 = "show" + EVENT_KEY$d;
var EVENT_SHOWN$4 = "shown" + EVENT_KEY$d;
var CLASS_NAME_FADE$5 = 'fade';
var CLASS_NAME_HIDE = 'hide';
var CLASS_NAME_SHOW$8 = 'show';
var CLASS_NAME_SHOWING = 'showing';
var DefaultType$8 = {
  animation: 'boolean',
  autohide: 'boolean',
  delay: 'number'
};
var Default$a = {
  animation: true,
  autohide: true,
  delay: 500
};
var SELECTOR_DATA_DISMISS$1 = '[data-dismiss="toast"]';
/**
 * ------------------------------------------------------------------------
 * Class Definition
 * ------------------------------------------------------------------------
 */

var Toast = /*#__PURE__*/function () {
  function Toast(element, config) {
    this._element = element;
    this._config = this._getConfig(config);
    this._timeout = null;

    this._setListeners();

    Data.setData(element, DATA_KEY$d, this);
  } // Getters


  var _proto = Toast.prototype;

  // Public
  _proto.show = function show() {
    var _this = this;

    var showEvent = EventHandler.trigger(this._element, EVENT_SHOW$4);

    if (showEvent.defaultPrevented) {
      return;
    }

    if (this._config.animation) {
      this._element.classList.add(CLASS_NAME_FADE$5);
    }

    var complete = function complete() {
      _this._element.classList.remove(CLASS_NAME_SHOWING);

      _this._element.classList.add(CLASS_NAME_SHOW$8);

      EventHandler.trigger(_this._element, EVENT_SHOWN$4);

      if (_this._config.autohide) {
        _this._timeout = setTimeout(function () {
          _this.hide();
        }, _this._config.delay);
      }
    };

    this._element.classList.remove(CLASS_NAME_HIDE);

    reflow(this._element);

    this._element.classList.add(CLASS_NAME_SHOWING);

    if (this._config.animation) {
      var transitionDuration = getTransitionDurationFromElement(this._element);
      EventHandler.one(this._element, TRANSITION_END, complete);
      emulateTransitionEnd(this._element, transitionDuration);
    } else {
      complete();
    }
  };

  _proto.hide = function hide() {
    var _this2 = this;

    if (!this._element.classList.contains(CLASS_NAME_SHOW$8)) {
      return;
    }

    var hideEvent = EventHandler.trigger(this._element, EVENT_HIDE$4);

    if (hideEvent.defaultPrevented) {
      return;
    }

    var complete = function complete() {
      _this2._element.classList.add(CLASS_NAME_HIDE);

      EventHandler.trigger(_this2._element, EVENT_HIDDEN$4);
    };

    this._element.classList.remove(CLASS_NAME_SHOW$8);

    if (this._config.animation) {
      var transitionDuration = getTransitionDurationFromElement(this._element);
      EventHandler.one(this._element, TRANSITION_END, complete);
      emulateTransitionEnd(this._element, transitionDuration);
    } else {
      complete();
    }
  };

  _proto.dispose = function dispose() {
    clearTimeout(this._timeout);
    this._timeout = null;

    if (this._element.classList.contains(CLASS_NAME_SHOW$8)) {
      this._element.classList.remove(CLASS_NAME_SHOW$8);
    }

    EventHandler.off(this._element, EVENT_CLICK_DISMISS$1);
    Data.removeData(this._element, DATA_KEY$d);
    this._element = null;
    this._config = null;
  } // Private
  ;

  _proto._getConfig = function _getConfig(config) {
    config = _objectSpread2(_objectSpread2(_objectSpread2({}, Default$a), Manipulator.getDataAttributes(this._element)), typeof config === 'object' && config ? config : {});
    typeCheckConfig(NAME$d, config, this.constructor.DefaultType);
    return config;
  };

  _proto._setListeners = function _setListeners() {
    var _this3 = this;

    EventHandler.on(this._element, EVENT_CLICK_DISMISS$1, SELECTOR_DATA_DISMISS$1, function () {
      return _this3.hide();
    });
  } // Static
  ;

  Toast.jQueryInterface = function jQueryInterface(config) {
    return this.each(function () {
      var data = Data.getData(this, DATA_KEY$d);

      var _config = typeof config === 'object' && config;

      if (!data) {
        data = new Toast(this, _config);
      }

      if (typeof config === 'string') {
        if (typeof data[config] === 'undefined') {
          throw new TypeError("No method named \"" + config + "\"");
        }

        data[config](this);
      }
    });
  };

  Toast.getInstance = function getInstance(element) {
    return Data.getData(element, DATA_KEY$d);
  };

  _createClass(Toast, null, [{
    key: "VERSION",
    get: function get() {
      return VERSION$d;
    }
  }, {
    key: "DefaultType",
    get: function get() {
      return DefaultType$8;
    }
  }, {
    key: "Default",
    get: function get() {
      return Default$a;
    }
  }]);

  return Toast;
}();

var $$e = getjQuery();
/**
 * ------------------------------------------------------------------------
 * jQuery
 * ------------------------------------------------------------------------
 *  add .toast to jQuery only if jQuery is present
 */

/* istanbul ignore if */

if ($$e) {
  var JQUERY_NO_CONFLICT$d = $$e.fn[NAME$d];
  $$e.fn[NAME$d] = Toast.jQueryInterface;
  $$e.fn[NAME$d].Constructor = Toast;

  $$e.fn[NAME$d].noConflict = function () {
    $$e.fn[NAME$d] = JQUERY_NO_CONFLICT$d;
    return Toast.jQueryInterface;
  };
}


//# sourceMappingURL=coreui.esm.js.map


/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/contains.js":
/*!***************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/contains.js ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return contains; });
function contains(parent, child) {
  // $FlowFixMe: hasOwnProperty doesn't seem to work in tests
  var isShadow = Boolean(child.getRootNode && child.getRootNode().host); // First, attempt with faster native method

  if (parent.contains(child)) {
    return true;
  } // then fallback to custom implementation with Shadow DOM support
  else if (isShadow) {
      var next = child;

      do {
        if (next && parent.isSameNode(next)) {
          return true;
        } // $FlowFixMe: need a better way to handle this...


        next = next.parentNode || next.host;
      } while (next);
    } // Give up, the result is false


  return false;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getBorders.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getBorders.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getBorders; });
/* harmony import */ var _getComputedStyle_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getComputedStyle.js */ "./node_modules/@popperjs/core/lib/dom-utils/getComputedStyle.js");
/* harmony import */ var _instanceOf_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");



function toNumber(cssValue) {
  return parseFloat(cssValue) || 0;
}

function getBorders(element) {
  var computedStyle = Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_1__["isHTMLElement"])(element) ? Object(_getComputedStyle_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element) : {};
  return {
    top: toNumber(computedStyle.borderTopWidth),
    right: toNumber(computedStyle.borderRightWidth),
    bottom: toNumber(computedStyle.borderBottomWidth),
    left: toNumber(computedStyle.borderLeftWidth)
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getBoundingClientRect.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getBoundingClientRect.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getBoundingClientRect; });
function getBoundingClientRect(element) {
  var rect = element.getBoundingClientRect();
  return {
    width: rect.width,
    height: rect.height,
    top: rect.top,
    right: rect.right,
    bottom: rect.bottom,
    left: rect.left,
    x: rect.left,
    y: rect.top
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getClippingRect.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getClippingRect.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getClippingRect; });
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
/* harmony import */ var _getViewportRect_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getViewportRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getViewportRect.js");
/* harmony import */ var _getDocumentRect_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getDocumentRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentRect.js");
/* harmony import */ var _listScrollParents_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./listScrollParents.js */ "./node_modules/@popperjs/core/lib/dom-utils/listScrollParents.js");
/* harmony import */ var _getOffsetParent_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./getOffsetParent.js */ "./node_modules/@popperjs/core/lib/dom-utils/getOffsetParent.js");
/* harmony import */ var _getDocumentElement_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./getDocumentElement.js */ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentElement.js");
/* harmony import */ var _getComputedStyle_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./getComputedStyle.js */ "./node_modules/@popperjs/core/lib/dom-utils/getComputedStyle.js");
/* harmony import */ var _instanceOf_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");
/* harmony import */ var _getBoundingClientRect_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./getBoundingClientRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getBoundingClientRect.js");
/* harmony import */ var _getDecorations_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./getDecorations.js */ "./node_modules/@popperjs/core/lib/dom-utils/getDecorations.js");
/* harmony import */ var _contains_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./contains.js */ "./node_modules/@popperjs/core/lib/dom-utils/contains.js");
/* harmony import */ var _utils_rectToClientRect_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../utils/rectToClientRect.js */ "./node_modules/@popperjs/core/lib/utils/rectToClientRect.js");













function getClientRectFromMixedType(element, clippingParent) {
  return clippingParent === _enums_js__WEBPACK_IMPORTED_MODULE_0__["viewport"] ? Object(_utils_rectToClientRect_js__WEBPACK_IMPORTED_MODULE_11__["default"])(Object(_getViewportRect_js__WEBPACK_IMPORTED_MODULE_1__["default"])(element)) : Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_7__["isHTMLElement"])(clippingParent) ? Object(_getBoundingClientRect_js__WEBPACK_IMPORTED_MODULE_8__["default"])(clippingParent) : Object(_utils_rectToClientRect_js__WEBPACK_IMPORTED_MODULE_11__["default"])(Object(_getDocumentRect_js__WEBPACK_IMPORTED_MODULE_2__["default"])(Object(_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_5__["default"])(element)));
} // A "clipping parent" is an overflowable container with the characteristic of
// clipping (or hiding) overflowing elements with a position different from
// `initial`


function getClippingParents(element) {
  var clippingParents = Object(_listScrollParents_js__WEBPACK_IMPORTED_MODULE_3__["default"])(element);
  var canEscapeClipping = ['absolute', 'fixed'].indexOf(Object(_getComputedStyle_js__WEBPACK_IMPORTED_MODULE_6__["default"])(element).position) >= 0;
  var clipperElement = canEscapeClipping && Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_7__["isHTMLElement"])(element) ? Object(_getOffsetParent_js__WEBPACK_IMPORTED_MODULE_4__["default"])(element) : element;

  if (!Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_7__["isElement"])(clipperElement)) {
    return [];
  } // $FlowFixMe: https://github.com/facebook/flow/issues/1414


  return clippingParents.filter(function (clippingParent) {
    return Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_7__["isElement"])(clippingParent) && Object(_contains_js__WEBPACK_IMPORTED_MODULE_10__["default"])(clippingParent, clipperElement);
  });
} // Gets the maximum area that the element is visible in due to any number of
// clipping parents


function getClippingRect(element, boundary, rootBoundary) {
  var mainClippingParents = boundary === 'clippingParents' ? getClippingParents(element) : [].concat(boundary);
  var clippingParents = [].concat(mainClippingParents, [rootBoundary]);
  var firstClippingParent = clippingParents[0];
  var clippingRect = clippingParents.reduce(function (accRect, clippingParent) {
    var rect = getClientRectFromMixedType(element, clippingParent);
    var decorations = Object(_getDecorations_js__WEBPACK_IMPORTED_MODULE_9__["default"])(Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_7__["isHTMLElement"])(clippingParent) ? clippingParent : Object(_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_5__["default"])(element));
    accRect.top = Math.max(rect.top + decorations.top, accRect.top);
    accRect.right = Math.min(rect.right - decorations.right, accRect.right);
    accRect.bottom = Math.min(rect.bottom - decorations.bottom, accRect.bottom);
    accRect.left = Math.max(rect.left + decorations.left, accRect.left);
    return accRect;
  }, getClientRectFromMixedType(element, firstClippingParent));
  clippingRect.width = clippingRect.right - clippingRect.left;
  clippingRect.height = clippingRect.bottom - clippingRect.top;
  clippingRect.x = clippingRect.left;
  clippingRect.y = clippingRect.top;
  return clippingRect;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getCompositeRect.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getCompositeRect.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getCompositeRect; });
/* harmony import */ var _getBoundingClientRect_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getBoundingClientRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getBoundingClientRect.js");
/* harmony import */ var _getNodeScroll_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getNodeScroll.js */ "./node_modules/@popperjs/core/lib/dom-utils/getNodeScroll.js");
/* harmony import */ var _getNodeName_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getNodeName.js */ "./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js");
/* harmony import */ var _instanceOf_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");
/* harmony import */ var _getWindowScrollBarX_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./getWindowScrollBarX.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindowScrollBarX.js");
/* harmony import */ var _getDocumentElement_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./getDocumentElement.js */ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentElement.js");
/* harmony import */ var _isScrollParent_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./isScrollParent.js */ "./node_modules/@popperjs/core/lib/dom-utils/isScrollParent.js");






 // Returns the composite rect of an element relative to its offsetParent.
// Composite means it takes into account transforms as well as layout.

function getCompositeRect(elementOrVirtualElement, offsetParent, isFixed) {
  if (isFixed === void 0) {
    isFixed = false;
  }

  var documentElement = Object(_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_5__["default"])(offsetParent);
  var rect = Object(_getBoundingClientRect_js__WEBPACK_IMPORTED_MODULE_0__["default"])(elementOrVirtualElement);
  var scroll = {
    scrollLeft: 0,
    scrollTop: 0
  };
  var offsets = {
    x: 0,
    y: 0
  };

  if (!isFixed) {
    if (Object(_getNodeName_js__WEBPACK_IMPORTED_MODULE_2__["default"])(offsetParent) !== 'body' || // https://github.com/popperjs/popper-core/issues/1078
    Object(_isScrollParent_js__WEBPACK_IMPORTED_MODULE_6__["default"])(documentElement)) {
      scroll = Object(_getNodeScroll_js__WEBPACK_IMPORTED_MODULE_1__["default"])(offsetParent);
    }

    if (Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_3__["isHTMLElement"])(offsetParent)) {
      offsets = Object(_getBoundingClientRect_js__WEBPACK_IMPORTED_MODULE_0__["default"])(offsetParent);
      offsets.x += offsetParent.clientLeft;
      offsets.y += offsetParent.clientTop;
    } else if (documentElement) {
      offsets.x = Object(_getWindowScrollBarX_js__WEBPACK_IMPORTED_MODULE_4__["default"])(documentElement);
    }
  }

  return {
    x: rect.left + scroll.scrollLeft - offsets.x,
    y: rect.top + scroll.scrollTop - offsets.y,
    width: rect.width,
    height: rect.height
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getComputedStyle.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getComputedStyle.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getComputedStyle; });
/* harmony import */ var _getWindow_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");

function getComputedStyle(element) {
  return Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element).getComputedStyle(element);
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getDecorations.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getDecorations.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getDecorations; });
/* harmony import */ var _getBorders_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getBorders.js */ "./node_modules/@popperjs/core/lib/dom-utils/getBorders.js");
/* harmony import */ var _getNodeName_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getNodeName.js */ "./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js");
/* harmony import */ var _getWindow_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");
/* harmony import */ var _getWindowScrollBarX_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./getWindowScrollBarX.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindowScrollBarX.js");



 // Borders + scrollbars

function getDecorations(element) {
  var win = Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_2__["default"])(element);
  var borders = Object(_getBorders_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element);
  var isHTML = Object(_getNodeName_js__WEBPACK_IMPORTED_MODULE_1__["default"])(element) === 'html';
  var winScrollBarX = Object(_getWindowScrollBarX_js__WEBPACK_IMPORTED_MODULE_3__["default"])(element);
  var x = element.clientWidth + borders.right;
  var y = element.clientHeight + borders.bottom; // HACK:
  // document.documentElement.clientHeight on iOS reports the height of the
  // viewport including the bottom bar, even if the bottom bar isn't visible.
  // If the difference between window innerHeight and html clientHeight is more
  // than 50, we assume it's a mobile bottom bar and ignore scrollbars.
  // * A 50px thick scrollbar is likely non-existent (macOS is 15px and Windows
  //   is about 17px)
  // * The mobile bar is 114px tall

  if (isHTML && win.innerHeight - element.clientHeight > 50) {
    y = win.innerHeight - borders.bottom;
  }

  return {
    top: isHTML ? 0 : element.clientTop,
    right: // RTL scrollbar (scrolling containers only)
    element.clientLeft > borders.left ? borders.right : // LTR scrollbar
    isHTML ? win.innerWidth - x - winScrollBarX : element.offsetWidth - x,
    bottom: isHTML ? win.innerHeight - y : element.offsetHeight - y,
    left: isHTML ? winScrollBarX : element.clientLeft
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentElement.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getDocumentElement.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getDocumentElement; });
/* harmony import */ var _instanceOf_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");

function getDocumentElement(element) {
  // $FlowFixMe: assume body is always available
  return (Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_0__["isElement"])(element) ? element.ownerDocument : element.document).documentElement;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentRect.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getDocumentRect.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getDocumentRect; });
/* harmony import */ var _getCompositeRect_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getCompositeRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getCompositeRect.js");
/* harmony import */ var _getWindow_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");
/* harmony import */ var _getDocumentElement_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getDocumentElement.js */ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentElement.js");
/* harmony import */ var _getWindowScroll_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./getWindowScroll.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindowScroll.js");




function getDocumentRect(element) {
  var win = Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_1__["default"])(element);
  var winScroll = Object(_getWindowScroll_js__WEBPACK_IMPORTED_MODULE_3__["default"])(element);
  var documentRect = Object(_getCompositeRect_js__WEBPACK_IMPORTED_MODULE_0__["default"])(Object(_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_2__["default"])(element), win);
  documentRect.height = Math.max(documentRect.height, win.innerHeight);
  documentRect.width = Math.max(documentRect.width, win.innerWidth);
  documentRect.x = -winScroll.scrollLeft;
  documentRect.y = -winScroll.scrollTop;
  return documentRect;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getHTMLElementScroll.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getHTMLElementScroll.js ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getHTMLElementScroll; });
function getHTMLElementScroll(element) {
  return {
    scrollLeft: element.scrollLeft,
    scrollTop: element.scrollTop
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getLayoutRect.js":
/*!********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getLayoutRect.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getLayoutRect; });
// Returns the layout rect of an element relative to its offsetParent. Layout
// means it doesn't take into account transforms.
function getLayoutRect(element) {
  return {
    x: element.offsetLeft,
    y: element.offsetTop,
    width: element.offsetWidth,
    height: element.offsetHeight
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js":
/*!******************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getNodeName; });
function getNodeName(element) {
  return element ? (element.nodeName || '').toLowerCase() : null;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getNodeScroll.js":
/*!********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getNodeScroll.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getNodeScroll; });
/* harmony import */ var _getWindowScroll_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getWindowScroll.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindowScroll.js");
/* harmony import */ var _getWindow_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");
/* harmony import */ var _instanceOf_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");
/* harmony import */ var _getHTMLElementScroll_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./getHTMLElementScroll.js */ "./node_modules/@popperjs/core/lib/dom-utils/getHTMLElementScroll.js");




function getNodeScroll(node) {
  if (node === Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_1__["default"])(node) || !Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_2__["isHTMLElement"])(node)) {
    return Object(_getWindowScroll_js__WEBPACK_IMPORTED_MODULE_0__["default"])(node);
  } else {
    return Object(_getHTMLElementScroll_js__WEBPACK_IMPORTED_MODULE_3__["default"])(node);
  }
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getOffsetParent.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getOffsetParent.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getOffsetParent; });
/* harmony import */ var _getWindow_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");
/* harmony import */ var _getNodeName_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getNodeName.js */ "./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js");
/* harmony import */ var _getComputedStyle_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getComputedStyle.js */ "./node_modules/@popperjs/core/lib/dom-utils/getComputedStyle.js");
/* harmony import */ var _instanceOf_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");
/* harmony import */ var _isTableElement_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./isTableElement.js */ "./node_modules/@popperjs/core/lib/dom-utils/isTableElement.js");






function getTrueOffsetParent(element) {
  if (!Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_3__["isHTMLElement"])(element) || // https://github.com/popperjs/popper-core/issues/837
  Object(_getComputedStyle_js__WEBPACK_IMPORTED_MODULE_2__["default"])(element).position === 'fixed') {
    return null;
  }

  return element.offsetParent;
}

function getOffsetParent(element) {
  var window = Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element);
  var offsetParent = getTrueOffsetParent(element); // Find the nearest non-table offsetParent

  while (offsetParent && Object(_isTableElement_js__WEBPACK_IMPORTED_MODULE_4__["default"])(offsetParent)) {
    offsetParent = getTrueOffsetParent(offsetParent);
  }

  if (offsetParent && Object(_getNodeName_js__WEBPACK_IMPORTED_MODULE_1__["default"])(offsetParent) === 'body' && Object(_getComputedStyle_js__WEBPACK_IMPORTED_MODULE_2__["default"])(offsetParent).position === 'static') {
    return window;
  }

  return offsetParent || window;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getParentNode.js":
/*!********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getParentNode.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getParentNode; });
/* harmony import */ var _getNodeName_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getNodeName.js */ "./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js");
/* harmony import */ var _getDocumentElement_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getDocumentElement.js */ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentElement.js");


function getParentNode(element) {
  if (Object(_getNodeName_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element) === 'html') {
    return element;
  }

  return (// $FlowFixMe: this is a quicker (but less type safe) way to save quite some bytes from the bundle
    element.assignedSlot || // step into the shadow DOM of the parent of a slotted node
    element.parentNode || // DOM Element detected
    // $FlowFixMe: need a better way to handle this...
    element.host || // ShadowRoot detected
    // $FlowFixMe: HTMLElement is a Node
    Object(_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_1__["default"])(element) // fallback

  );
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getScrollParent.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getScrollParent.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getScrollParent; });
/* harmony import */ var _getParentNode_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getParentNode.js */ "./node_modules/@popperjs/core/lib/dom-utils/getParentNode.js");
/* harmony import */ var _isScrollParent_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./isScrollParent.js */ "./node_modules/@popperjs/core/lib/dom-utils/isScrollParent.js");
/* harmony import */ var _getNodeName_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getNodeName.js */ "./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js");
/* harmony import */ var _instanceOf_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");




function getScrollParent(node) {
  if (['html', 'body', '#document'].indexOf(Object(_getNodeName_js__WEBPACK_IMPORTED_MODULE_2__["default"])(node)) >= 0) {
    // $FlowFixMe: assume body is always available
    return node.ownerDocument.body;
  }

  if (Object(_instanceOf_js__WEBPACK_IMPORTED_MODULE_3__["isHTMLElement"])(node) && Object(_isScrollParent_js__WEBPACK_IMPORTED_MODULE_1__["default"])(node)) {
    return node;
  }

  return getScrollParent(Object(_getParentNode_js__WEBPACK_IMPORTED_MODULE_0__["default"])(node));
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getViewportRect.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getViewportRect.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getViewportRect; });
/* harmony import */ var _getWindow_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");

function getViewportRect(element) {
  var win = Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element);
  var visualViewport = win.visualViewport;
  var width = win.innerWidth;
  var height = win.innerHeight; // We don't know which browsers have buggy or odd implementations of this, so
  // for now we're only applying it to iOS to fix the keyboard issue.
  // Investigation required

  if (visualViewport && /iPhone|iPod|iPad/.test(navigator.platform)) {
    width = visualViewport.width;
    height = visualViewport.height;
  }

  return {
    width: width,
    height: height,
    x: 0,
    y: 0
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js":
/*!****************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getWindow.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getWindow; });
/*:: import type { Window } from '../types'; */

/*:: declare function getWindow(node: Node | Window): Window; */
function getWindow(node) {
  if (node.toString() !== '[object Window]') {
    var ownerDocument = node.ownerDocument;
    return ownerDocument ? ownerDocument.defaultView : window;
  }

  return node;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getWindowScroll.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getWindowScroll.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getWindowScroll; });
/* harmony import */ var _getWindow_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");

function getWindowScroll(node) {
  var win = Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_0__["default"])(node);
  var scrollLeft = win.pageXOffset;
  var scrollTop = win.pageYOffset;
  return {
    scrollLeft: scrollLeft,
    scrollTop: scrollTop
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/getWindowScrollBarX.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/getWindowScrollBarX.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getWindowScrollBarX; });
/* harmony import */ var _getBoundingClientRect_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getBoundingClientRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getBoundingClientRect.js");
/* harmony import */ var _getDocumentElement_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getDocumentElement.js */ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentElement.js");
/* harmony import */ var _getWindowScroll_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getWindowScroll.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindowScroll.js");



function getWindowScrollBarX(element) {
  // If <html> has a CSS width greater than the viewport, then this will be
  // incorrect for RTL.
  // Popper 1 is broken in this case and never had a bug report so let's assume
  // it's not an issue. I don't think anyone ever specifies width on <html>
  // anyway.
  // Browsers where the left scrollbar doesn't cause an issue report `0` for
  // this (e.g. Edge 2019, IE11, Safari)
  return Object(_getBoundingClientRect_js__WEBPACK_IMPORTED_MODULE_0__["default"])(Object(_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_1__["default"])(element)).left + Object(_getWindowScroll_js__WEBPACK_IMPORTED_MODULE_2__["default"])(element).scrollLeft;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js ***!
  \*****************************************************************/
/*! exports provided: isElement, isHTMLElement */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isElement", function() { return isElement; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isHTMLElement", function() { return isHTMLElement; });
/* harmony import */ var _getWindow_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");

/*:: declare function isElement(node: mixed): boolean %checks(node instanceof
  Element); */

function isElement(node) {
  var OwnElement = Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_0__["default"])(node).Element;
  return node instanceof OwnElement || node instanceof Element;
}
/*:: declare function isHTMLElement(node: mixed): boolean %checks(node instanceof
  HTMLElement); */


function isHTMLElement(node) {
  var OwnElement = Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_0__["default"])(node).HTMLElement;
  return node instanceof OwnElement || node instanceof HTMLElement;
}



/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/isScrollParent.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/isScrollParent.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return isScrollParent; });
/* harmony import */ var _getComputedStyle_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getComputedStyle.js */ "./node_modules/@popperjs/core/lib/dom-utils/getComputedStyle.js");

function isScrollParent(element) {
  // Firefox wants us to check `-x` and `-y` variations as well
  var _getComputedStyle = Object(_getComputedStyle_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element),
      overflow = _getComputedStyle.overflow,
      overflowX = _getComputedStyle.overflowX,
      overflowY = _getComputedStyle.overflowY;

  return /auto|scroll|overlay|hidden/.test(overflow + overflowY + overflowX);
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/isTableElement.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/isTableElement.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return isTableElement; });
/* harmony import */ var _getNodeName_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getNodeName.js */ "./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js");

function isTableElement(element) {
  return ['table', 'td', 'th'].indexOf(Object(_getNodeName_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element)) >= 0;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/dom-utils/listScrollParents.js":
/*!************************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/dom-utils/listScrollParents.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return listScrollParents; });
/* harmony import */ var _getScrollParent_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getScrollParent.js */ "./node_modules/@popperjs/core/lib/dom-utils/getScrollParent.js");
/* harmony import */ var _getParentNode_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getParentNode.js */ "./node_modules/@popperjs/core/lib/dom-utils/getParentNode.js");
/* harmony import */ var _getNodeName_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getNodeName.js */ "./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js");
/* harmony import */ var _getWindow_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");
/* harmony import */ var _isScrollParent_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./isScrollParent.js */ "./node_modules/@popperjs/core/lib/dom-utils/isScrollParent.js");





function listScrollParents(element, list) {
  if (list === void 0) {
    list = [];
  }

  var scrollParent = Object(_getScrollParent_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element);
  var isBody = Object(_getNodeName_js__WEBPACK_IMPORTED_MODULE_2__["default"])(scrollParent) === 'body';
  var win = Object(_getWindow_js__WEBPACK_IMPORTED_MODULE_3__["default"])(scrollParent);
  var target = isBody ? [win].concat(win.visualViewport || [], Object(_isScrollParent_js__WEBPACK_IMPORTED_MODULE_4__["default"])(scrollParent) ? scrollParent : []) : scrollParent;
  var updatedList = list.concat(target);
  return isBody ? updatedList : // $FlowFixMe: isBody tells us target will be an HTMLElement here
  updatedList.concat(listScrollParents(Object(_getParentNode_js__WEBPACK_IMPORTED_MODULE_1__["default"])(target)));
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/enums.js":
/*!**************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/enums.js ***!
  \**************************************************/
/*! exports provided: top, bottom, right, left, auto, basePlacements, start, end, clippingParents, viewport, popper, reference, variationPlacements, placements, beforeRead, read, afterRead, beforeMain, main, afterMain, beforeWrite, write, afterWrite, modifierPhases */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "top", function() { return top; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "bottom", function() { return bottom; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "right", function() { return right; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "left", function() { return left; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "auto", function() { return auto; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "basePlacements", function() { return basePlacements; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "start", function() { return start; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "end", function() { return end; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "clippingParents", function() { return clippingParents; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "viewport", function() { return viewport; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "popper", function() { return popper; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "reference", function() { return reference; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "variationPlacements", function() { return variationPlacements; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "placements", function() { return placements; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "beforeRead", function() { return beforeRead; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "read", function() { return read; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "afterRead", function() { return afterRead; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "beforeMain", function() { return beforeMain; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "main", function() { return main; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "afterMain", function() { return afterMain; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "beforeWrite", function() { return beforeWrite; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "write", function() { return write; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "afterWrite", function() { return afterWrite; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "modifierPhases", function() { return modifierPhases; });
var top = 'top';
var bottom = 'bottom';
var right = 'right';
var left = 'left';
var auto = 'auto';
var basePlacements = [top, bottom, right, left];
var start = 'start';
var end = 'end';
var clippingParents = 'clippingParents';
var viewport = 'viewport';
var popper = 'popper';
var reference = 'reference';
var variationPlacements = /*#__PURE__*/basePlacements.reduce(function (acc, placement) {
  return acc.concat([placement + "-" + start, placement + "-" + end]);
}, []);
var placements = /*#__PURE__*/[].concat(basePlacements, [auto]).reduce(function (acc, placement) {
  return acc.concat([placement, placement + "-" + start, placement + "-" + end]);
}, []); // modifiers that need to read the DOM

var beforeRead = 'beforeRead';
var read = 'read';
var afterRead = 'afterRead'; // pure-logic modifiers

var beforeMain = 'beforeMain';
var main = 'main';
var afterMain = 'afterMain'; // modifier with the purpose to write to the DOM (or write into a framework state)

var beforeWrite = 'beforeWrite';
var write = 'write';
var afterWrite = 'afterWrite';
var modifierPhases = [beforeRead, read, afterRead, beforeMain, main, afterMain, beforeWrite, write, afterWrite];

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/index.js":
/*!**************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/index.js ***!
  \**************************************************/
/*! exports provided: top, bottom, right, left, auto, basePlacements, start, end, clippingParents, viewport, popper, reference, variationPlacements, placements, beforeRead, read, afterRead, beforeMain, main, afterMain, beforeWrite, write, afterWrite, modifierPhases, popperGenerator, createPopper */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "popperGenerator", function() { return popperGenerator; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "createPopper", function() { return createPopper; });
/* harmony import */ var _dom_utils_getCompositeRect_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./dom-utils/getCompositeRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getCompositeRect.js");
/* harmony import */ var _dom_utils_getLayoutRect_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./dom-utils/getLayoutRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getLayoutRect.js");
/* harmony import */ var _dom_utils_listScrollParents_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./dom-utils/listScrollParents.js */ "./node_modules/@popperjs/core/lib/dom-utils/listScrollParents.js");
/* harmony import */ var _dom_utils_getOffsetParent_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./dom-utils/getOffsetParent.js */ "./node_modules/@popperjs/core/lib/dom-utils/getOffsetParent.js");
/* harmony import */ var _dom_utils_getComputedStyle_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./dom-utils/getComputedStyle.js */ "./node_modules/@popperjs/core/lib/dom-utils/getComputedStyle.js");
/* harmony import */ var _utils_orderModifiers_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./utils/orderModifiers.js */ "./node_modules/@popperjs/core/lib/utils/orderModifiers.js");
/* harmony import */ var _utils_debounce_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./utils/debounce.js */ "./node_modules/@popperjs/core/lib/utils/debounce.js");
/* harmony import */ var _utils_validateModifiers_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./utils/validateModifiers.js */ "./node_modules/@popperjs/core/lib/utils/validateModifiers.js");
/* harmony import */ var _utils_uniqueBy_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./utils/uniqueBy.js */ "./node_modules/@popperjs/core/lib/utils/uniqueBy.js");
/* harmony import */ var _utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./utils/getBasePlacement.js */ "./node_modules/@popperjs/core/lib/utils/getBasePlacement.js");
/* harmony import */ var _utils_mergeByName_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./utils/mergeByName.js */ "./node_modules/@popperjs/core/lib/utils/mergeByName.js");
/* harmony import */ var _dom_utils_instanceOf_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./dom-utils/instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "top", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["top"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "bottom", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["bottom"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "right", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["right"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "left", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["left"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "auto", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["auto"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "basePlacements", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["basePlacements"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "start", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["start"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "end", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["end"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "clippingParents", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["clippingParents"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "viewport", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["viewport"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "popper", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["popper"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "reference", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["reference"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "variationPlacements", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["variationPlacements"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "placements", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["placements"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "beforeRead", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["beforeRead"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "read", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["read"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "afterRead", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["afterRead"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "beforeMain", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["beforeMain"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "main", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["main"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "afterMain", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["afterMain"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "beforeWrite", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["beforeWrite"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "write", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["write"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "afterWrite", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["afterWrite"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "modifierPhases", function() { return _enums_js__WEBPACK_IMPORTED_MODULE_12__["modifierPhases"]; });















var INVALID_ELEMENT_ERROR = 'Popper: Invalid reference or popper argument provided. They must be either a DOM element or virtual element.';
var INFINITE_LOOP_ERROR = 'Popper: An infinite loop in the modifiers cycle has been detected! The cycle has been interrupted to prevent a browser crash.';
var DEFAULT_OPTIONS = {
  placement: 'bottom',
  modifiers: [],
  strategy: 'absolute'
};

function areValidElements() {
  for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
    args[_key] = arguments[_key];
  }

  return !args.some(function (element) {
    return !(element && typeof element.getBoundingClientRect === 'function');
  });
}

function popperGenerator(generatorOptions) {
  if (generatorOptions === void 0) {
    generatorOptions = {};
  }

  var _generatorOptions = generatorOptions,
      _generatorOptions$def = _generatorOptions.defaultModifiers,
      defaultModifiers = _generatorOptions$def === void 0 ? [] : _generatorOptions$def,
      _generatorOptions$def2 = _generatorOptions.defaultOptions,
      defaultOptions = _generatorOptions$def2 === void 0 ? DEFAULT_OPTIONS : _generatorOptions$def2;
  return function createPopper(reference, popper, options) {
    if (options === void 0) {
      options = defaultOptions;
    }

    var state = {
      placement: 'bottom',
      orderedModifiers: [],
      options: Object.assign({}, DEFAULT_OPTIONS, {}, defaultOptions),
      modifiersData: {},
      elements: {
        reference: reference,
        popper: popper
      },
      attributes: {},
      styles: {}
    };
    var effectCleanupFns = [];
    var isDestroyed = false;
    var instance = {
      state: state,
      setOptions: function setOptions(options) {
        cleanupModifierEffects();
        state.options = Object.assign({}, defaultOptions, {}, state.options, {}, options);
        state.scrollParents = {
          reference: Object(_dom_utils_instanceOf_js__WEBPACK_IMPORTED_MODULE_11__["isElement"])(reference) ? Object(_dom_utils_listScrollParents_js__WEBPACK_IMPORTED_MODULE_2__["default"])(reference) : reference.contextElement ? Object(_dom_utils_listScrollParents_js__WEBPACK_IMPORTED_MODULE_2__["default"])(reference.contextElement) : [],
          popper: Object(_dom_utils_listScrollParents_js__WEBPACK_IMPORTED_MODULE_2__["default"])(popper)
        }; // Orders the modifiers based on their dependencies and `phase`
        // properties

        var orderedModifiers = Object(_utils_orderModifiers_js__WEBPACK_IMPORTED_MODULE_5__["default"])(Object(_utils_mergeByName_js__WEBPACK_IMPORTED_MODULE_10__["default"])([].concat(defaultModifiers, state.options.modifiers))); // Strip out disabled modifiers

        state.orderedModifiers = orderedModifiers.filter(function (m) {
          return m.enabled;
        }); // Validate the provided modifiers so that the consumer will get warned
        // if one of the modifiers is invalid for any reason

        if (true) {
          var modifiers = Object(_utils_uniqueBy_js__WEBPACK_IMPORTED_MODULE_8__["default"])([].concat(orderedModifiers, state.options.modifiers), function (_ref) {
            var name = _ref.name;
            return name;
          });
          Object(_utils_validateModifiers_js__WEBPACK_IMPORTED_MODULE_7__["default"])(modifiers);

          if (Object(_utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_9__["default"])(state.options.placement) === _enums_js__WEBPACK_IMPORTED_MODULE_12__["auto"]) {
            var flipModifier = state.orderedModifiers.find(function (_ref2) {
              var name = _ref2.name;
              return name === 'flip';
            });

            if (!flipModifier) {
              console.error(['Popper: "auto" placements require the "flip" modifier be', 'present and enabled to work.'].join(' '));
            }
          }

          var _getComputedStyle = Object(_dom_utils_getComputedStyle_js__WEBPACK_IMPORTED_MODULE_4__["default"])(popper),
              marginTop = _getComputedStyle.marginTop,
              marginRight = _getComputedStyle.marginRight,
              marginBottom = _getComputedStyle.marginBottom,
              marginLeft = _getComputedStyle.marginLeft; // We no longer take into account `margins` on the popper, and it can
          // cause bugs with positioning, so we'll warn the consumer


          if ([marginTop, marginRight, marginBottom, marginLeft].some(function (margin) {
            return parseFloat(margin);
          })) {
            console.warn(['Popper: CSS "margin" styles cannot be used to apply padding', 'between the popper and its reference element or boundary.', 'To replicate margin, use the `offset` modifier, as well as', 'the `padding` option in the `preventOverflow` and `flip`', 'modifiers.'].join(' '));
          }
        }

        runModifierEffects();
        return instance.update();
      },
      // Sync update – it will always be executed, even if not necessary. This
      // is useful for low frequency updates where sync behavior simplifies the
      // logic.
      // For high frequency updates (e.g. `resize` and `scroll` events), always
      // prefer the async Popper#update method
      forceUpdate: function forceUpdate() {
        if (isDestroyed) {
          return;
        }

        var _state$elements = state.elements,
            reference = _state$elements.reference,
            popper = _state$elements.popper; // Don't proceed if `reference` or `popper` are not valid elements
        // anymore

        if (!areValidElements(reference, popper)) {
          if (true) {
            console.error(INVALID_ELEMENT_ERROR);
          }

          return;
        } // Store the reference and popper rects to be read by modifiers


        state.rects = {
          reference: Object(_dom_utils_getCompositeRect_js__WEBPACK_IMPORTED_MODULE_0__["default"])(reference, Object(_dom_utils_getOffsetParent_js__WEBPACK_IMPORTED_MODULE_3__["default"])(popper), state.options.strategy === 'fixed'),
          popper: Object(_dom_utils_getLayoutRect_js__WEBPACK_IMPORTED_MODULE_1__["default"])(popper)
        }; // Modifiers have the ability to reset the current update cycle. The
        // most common use case for this is the `flip` modifier changing the
        // placement, which then needs to re-run all the modifiers, because the
        // logic was previously ran for the previous placement and is therefore
        // stale/incorrect

        state.reset = false;
        state.placement = state.options.placement; // On each update cycle, the `modifiersData` property for each modifier
        // is filled with the initial data specified by the modifier. This means
        // it doesn't persist and is fresh on each update.
        // To ensure persistent data, use `${name}#persistent`

        state.orderedModifiers.forEach(function (modifier) {
          return state.modifiersData[modifier.name] = Object.assign({}, modifier.data);
        });
        var __debug_loops__ = 0;

        for (var index = 0; index < state.orderedModifiers.length; index++) {
          if (true) {
            __debug_loops__ += 1;

            if (__debug_loops__ > 100) {
              console.error(INFINITE_LOOP_ERROR);
              break;
            }
          }

          if (state.reset === true) {
            state.reset = false;
            index = -1;
            continue;
          }

          var _state$orderedModifie = state.orderedModifiers[index],
              fn = _state$orderedModifie.fn,
              _state$orderedModifie2 = _state$orderedModifie.options,
              _options = _state$orderedModifie2 === void 0 ? {} : _state$orderedModifie2,
              name = _state$orderedModifie.name;

          if (typeof fn === 'function') {
            state = fn({
              state: state,
              options: _options,
              name: name,
              instance: instance
            }) || state;
          }
        }
      },
      // Async and optimistically optimized update – it will not be executed if
      // not necessary (debounced to run at most once-per-tick)
      update: Object(_utils_debounce_js__WEBPACK_IMPORTED_MODULE_6__["default"])(function () {
        return new Promise(function (resolve) {
          instance.forceUpdate();
          resolve(state);
        });
      }),
      destroy: function destroy() {
        cleanupModifierEffects();
        isDestroyed = true;
      }
    };

    if (!areValidElements(reference, popper)) {
      if (true) {
        console.error(INVALID_ELEMENT_ERROR);
      }

      return instance;
    }

    instance.setOptions(options).then(function (state) {
      if (!isDestroyed && options.onFirstUpdate) {
        options.onFirstUpdate(state);
      }
    }); // Modifiers have the ability to execute arbitrary code before the first
    // update cycle runs. They will be executed in the same order as the update
    // cycle. This is useful when a modifier adds some persistent data that
    // other modifiers need to use, but the modifier is run after the dependent
    // one.

    function runModifierEffects() {
      state.orderedModifiers.forEach(function (_ref3) {
        var name = _ref3.name,
            _ref3$options = _ref3.options,
            options = _ref3$options === void 0 ? {} : _ref3$options,
            effect = _ref3.effect;

        if (typeof effect === 'function') {
          var cleanupFn = effect({
            state: state,
            name: name,
            instance: instance,
            options: options
          });

          var noopFn = function noopFn() {};

          effectCleanupFns.push(cleanupFn || noopFn);
        }
      });
    }

    function cleanupModifierEffects() {
      effectCleanupFns.forEach(function (fn) {
        return fn();
      });
      effectCleanupFns = [];
    }

    return instance;
  };
}
var createPopper = /*#__PURE__*/popperGenerator();

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/modifiers/applyStyles.js":
/*!******************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/modifiers/applyStyles.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _dom_utils_getNodeName_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../dom-utils/getNodeName.js */ "./node_modules/@popperjs/core/lib/dom-utils/getNodeName.js");
/* harmony import */ var _dom_utils_instanceOf_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../dom-utils/instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");

 // This modifier takes the styles prepared by the `computeStyles` modifier
// and applies them to the HTMLElements such as popper and arrow

function applyStyles(_ref) {
  var state = _ref.state;
  Object.keys(state.elements).forEach(function (name) {
    var style = state.styles[name] || {};
    var attributes = state.attributes[name] || {};
    var element = state.elements[name]; // arrow is optional + virtual elements

    if (!Object(_dom_utils_instanceOf_js__WEBPACK_IMPORTED_MODULE_1__["isHTMLElement"])(element) || !Object(_dom_utils_getNodeName_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element)) {
      return;
    } // Flow doesn't support to extend this property, but it's the most
    // effective way to apply styles to an HTMLElement
    // $FlowFixMe


    Object.assign(element.style, style);
    Object.keys(attributes).forEach(function (name) {
      var value = attributes[name];

      if (value === false) {
        element.removeAttribute(name);
      } else {
        element.setAttribute(name, value === true ? '' : value);
      }
    });
  });
}

function effect(_ref2) {
  var state = _ref2.state;
  var initialStyles = {
    popper: {
      position: state.options.strategy,
      left: '0',
      top: '0',
      margin: '0'
    },
    arrow: {
      position: 'absolute'
    },
    reference: {}
  };
  Object.assign(state.elements.popper.style, initialStyles.popper);

  if (state.elements.arrow) {
    Object.assign(state.elements.arrow.style, initialStyles.arrow);
  }

  return function () {
    Object.keys(state.elements).forEach(function (name) {
      var element = state.elements[name];
      var attributes = state.attributes[name] || {};
      var styleProperties = Object.keys(state.styles.hasOwnProperty(name) ? state.styles[name] : initialStyles[name]); // Set all values to an empty string to unset them

      var style = styleProperties.reduce(function (style, property) {
        style[property] = '';
        return style;
      }, {}); // arrow is optional + virtual elements

      if (!Object(_dom_utils_instanceOf_js__WEBPACK_IMPORTED_MODULE_1__["isHTMLElement"])(element) || !Object(_dom_utils_getNodeName_js__WEBPACK_IMPORTED_MODULE_0__["default"])(element)) {
        return;
      } // Flow doesn't support to extend this property, but it's the most
      // effective way to apply styles to an HTMLElement
      // $FlowFixMe


      Object.assign(element.style, style);
      Object.keys(attributes).forEach(function (attribute) {
        element.removeAttribute(attribute);
      });
    });
  };
} // eslint-disable-next-line import/no-unused-modules


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'applyStyles',
  enabled: true,
  phase: 'write',
  fn: applyStyles,
  effect: effect,
  requires: ['computeStyles']
});

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/modifiers/arrow.js":
/*!************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/modifiers/arrow.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/getBasePlacement.js */ "./node_modules/@popperjs/core/lib/utils/getBasePlacement.js");
/* harmony import */ var _dom_utils_getLayoutRect_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../dom-utils/getLayoutRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getLayoutRect.js");
/* harmony import */ var _dom_utils_contains_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../dom-utils/contains.js */ "./node_modules/@popperjs/core/lib/dom-utils/contains.js");
/* harmony import */ var _dom_utils_getOffsetParent_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../dom-utils/getOffsetParent.js */ "./node_modules/@popperjs/core/lib/dom-utils/getOffsetParent.js");
/* harmony import */ var _utils_getMainAxisFromPlacement_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../utils/getMainAxisFromPlacement.js */ "./node_modules/@popperjs/core/lib/utils/getMainAxisFromPlacement.js");
/* harmony import */ var _utils_within_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../utils/within.js */ "./node_modules/@popperjs/core/lib/utils/within.js");
/* harmony import */ var _utils_mergePaddingObject_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../utils/mergePaddingObject.js */ "./node_modules/@popperjs/core/lib/utils/mergePaddingObject.js");
/* harmony import */ var _utils_expandToHashMap_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../utils/expandToHashMap.js */ "./node_modules/@popperjs/core/lib/utils/expandToHashMap.js");
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
/* harmony import */ var _dom_utils_instanceOf_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../dom-utils/instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");









 // eslint-disable-next-line import/no-unused-modules

function arrow(_ref) {
  var _state$modifiersData$;

  var state = _ref.state,
      name = _ref.name;
  var arrowElement = state.elements.arrow;
  var popperOffsets = state.modifiersData.popperOffsets;
  var basePlacement = Object(_utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_0__["default"])(state.placement);
  var axis = Object(_utils_getMainAxisFromPlacement_js__WEBPACK_IMPORTED_MODULE_4__["default"])(basePlacement);
  var isVertical = [_enums_js__WEBPACK_IMPORTED_MODULE_8__["left"], _enums_js__WEBPACK_IMPORTED_MODULE_8__["right"]].indexOf(basePlacement) >= 0;
  var len = isVertical ? 'height' : 'width';

  if (!arrowElement || !popperOffsets) {
    return;
  }

  var paddingObject = state.modifiersData[name + "#persistent"].padding;
  var arrowRect = Object(_dom_utils_getLayoutRect_js__WEBPACK_IMPORTED_MODULE_1__["default"])(arrowElement);
  var minProp = axis === 'y' ? _enums_js__WEBPACK_IMPORTED_MODULE_8__["top"] : _enums_js__WEBPACK_IMPORTED_MODULE_8__["left"];
  var maxProp = axis === 'y' ? _enums_js__WEBPACK_IMPORTED_MODULE_8__["bottom"] : _enums_js__WEBPACK_IMPORTED_MODULE_8__["right"];
  var endDiff = state.rects.reference[len] + state.rects.reference[axis] - popperOffsets[axis] - state.rects.popper[len];
  var startDiff = popperOffsets[axis] - state.rects.reference[axis];
  var arrowOffsetParent = Object(_dom_utils_getOffsetParent_js__WEBPACK_IMPORTED_MODULE_3__["default"])(arrowElement);
  var clientSize = arrowOffsetParent ? axis === 'y' ? arrowOffsetParent.clientHeight || 0 : arrowOffsetParent.clientWidth || 0 : 0;
  var centerToReference = endDiff / 2 - startDiff / 2; // Make sure the arrow doesn't overflow the popper if the center point is
  // outside of the popper bounds

  var min = paddingObject[minProp];
  var max = clientSize - arrowRect[len] - paddingObject[maxProp];
  var center = clientSize / 2 - arrowRect[len] / 2 + centerToReference;
  var offset = Object(_utils_within_js__WEBPACK_IMPORTED_MODULE_5__["default"])(min, center, max); // Prevents breaking syntax highlighting...

  var axisProp = axis;
  state.modifiersData[name] = (_state$modifiersData$ = {}, _state$modifiersData$[axisProp] = offset, _state$modifiersData$.centerOffset = offset - center, _state$modifiersData$);
}

function effect(_ref2) {
  var state = _ref2.state,
      options = _ref2.options,
      name = _ref2.name;
  var _options$element = options.element,
      arrowElement = _options$element === void 0 ? '[data-popper-arrow]' : _options$element,
      _options$padding = options.padding,
      padding = _options$padding === void 0 ? 0 : _options$padding;

  if (arrowElement == null) {
    return;
  } // CSS selector


  if (typeof arrowElement === 'string') {
    arrowElement = state.elements.popper.querySelector(arrowElement);

    if (!arrowElement) {
      return;
    }
  }

  if (true) {
    if (!Object(_dom_utils_instanceOf_js__WEBPACK_IMPORTED_MODULE_9__["isHTMLElement"])(arrowElement)) {
      console.error(['Popper: "arrow" element must be an HTMLElement (not an SVGElement).', 'To use an SVG arrow, wrap it in an HTMLElement that will be used as', 'the arrow.'].join(' '));
    }
  }

  if (!Object(_dom_utils_contains_js__WEBPACK_IMPORTED_MODULE_2__["default"])(state.elements.popper, arrowElement)) {
    if (true) {
      console.error(['Popper: "arrow" modifier\'s `element` must be a child of the popper', 'element.'].join(' '));
    }

    return;
  }

  state.elements.arrow = arrowElement;
  state.modifiersData[name + "#persistent"] = {
    padding: Object(_utils_mergePaddingObject_js__WEBPACK_IMPORTED_MODULE_6__["default"])(typeof padding !== 'number' ? padding : Object(_utils_expandToHashMap_js__WEBPACK_IMPORTED_MODULE_7__["default"])(padding, _enums_js__WEBPACK_IMPORTED_MODULE_8__["basePlacements"]))
  };
} // eslint-disable-next-line import/no-unused-modules


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'arrow',
  enabled: true,
  phase: 'main',
  fn: arrow,
  effect: effect,
  requires: ['popperOffsets'],
  requiresIfExists: ['preventOverflow']
});

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/modifiers/computeStyles.js":
/*!********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/modifiers/computeStyles.js ***!
  \********************************************************************/
/*! exports provided: mapToStyles, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "mapToStyles", function() { return mapToStyles; });
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
/* harmony import */ var _dom_utils_getOffsetParent_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../dom-utils/getOffsetParent.js */ "./node_modules/@popperjs/core/lib/dom-utils/getOffsetParent.js");
/* harmony import */ var _dom_utils_getWindow_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../dom-utils/getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");
/* harmony import */ var _dom_utils_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../dom-utils/getDocumentElement.js */ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentElement.js");
/* harmony import */ var _dom_utils_getComputedStyle_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../dom-utils/getComputedStyle.js */ "./node_modules/@popperjs/core/lib/dom-utils/getComputedStyle.js");
/* harmony import */ var _utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../utils/getBasePlacement.js */ "./node_modules/@popperjs/core/lib/utils/getBasePlacement.js");





 // eslint-disable-next-line import/no-unused-modules

var unsetSides = {
  top: 'auto',
  right: 'auto',
  bottom: 'auto',
  left: 'auto'
}; // Round the offsets to the nearest suitable subpixel based on the DPR.
// Zooming can change the DPR, but it seems to report a value that will
// cleanly divide the values into the appropriate subpixels.

function roundOffsets(_ref) {
  var x = _ref.x,
      y = _ref.y;
  var win = window;
  var dpr = win.devicePixelRatio || 1;
  return {
    x: Math.round(x * dpr) / dpr || 0,
    y: Math.round(y * dpr) / dpr || 0
  };
}

function mapToStyles(_ref2) {
  var _Object$assign2;

  var popper = _ref2.popper,
      popperRect = _ref2.popperRect,
      placement = _ref2.placement,
      offsets = _ref2.offsets,
      position = _ref2.position,
      gpuAcceleration = _ref2.gpuAcceleration,
      adaptive = _ref2.adaptive;

  var _roundOffsets = roundOffsets(offsets),
      x = _roundOffsets.x,
      y = _roundOffsets.y;

  var hasX = offsets.hasOwnProperty('x');
  var hasY = offsets.hasOwnProperty('y');
  var sideX = _enums_js__WEBPACK_IMPORTED_MODULE_0__["left"];
  var sideY = _enums_js__WEBPACK_IMPORTED_MODULE_0__["top"];
  var win = window;

  if (adaptive) {
    var offsetParent = Object(_dom_utils_getOffsetParent_js__WEBPACK_IMPORTED_MODULE_1__["default"])(popper);

    if (offsetParent === Object(_dom_utils_getWindow_js__WEBPACK_IMPORTED_MODULE_2__["default"])(popper)) {
      offsetParent = Object(_dom_utils_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_3__["default"])(popper);
    } // $FlowFixMe: force type refinement, we compare offsetParent with window above, but Flow doesn't detect it

    /*:: offsetParent = (offsetParent: Element); */


    if (placement === _enums_js__WEBPACK_IMPORTED_MODULE_0__["top"]) {
      sideY = _enums_js__WEBPACK_IMPORTED_MODULE_0__["bottom"];
      y -= offsetParent.clientHeight - popperRect.height;
      y *= gpuAcceleration ? 1 : -1;
    }

    if (placement === _enums_js__WEBPACK_IMPORTED_MODULE_0__["left"]) {
      sideX = _enums_js__WEBPACK_IMPORTED_MODULE_0__["right"];
      x -= offsetParent.clientWidth - popperRect.width;
      x *= gpuAcceleration ? 1 : -1;
    }
  }

  var commonStyles = Object.assign({
    position: position
  }, adaptive && unsetSides);

  if (gpuAcceleration) {
    var _Object$assign;

    return Object.assign({}, commonStyles, (_Object$assign = {}, _Object$assign[sideY] = hasY ? '0' : '', _Object$assign[sideX] = hasX ? '0' : '', _Object$assign.transform = (win.devicePixelRatio || 1) < 2 ? "translate(" + x + "px, " + y + "px)" : "translate3d(" + x + "px, " + y + "px, 0)", _Object$assign));
  }

  return Object.assign({}, commonStyles, (_Object$assign2 = {}, _Object$assign2[sideY] = hasY ? y + "px" : '', _Object$assign2[sideX] = hasX ? x + "px" : '', _Object$assign2.transform = '', _Object$assign2));
}

function computeStyles(_ref3) {
  var state = _ref3.state,
      options = _ref3.options;
  var _options$gpuAccelerat = options.gpuAcceleration,
      gpuAcceleration = _options$gpuAccelerat === void 0 ? true : _options$gpuAccelerat,
      _options$adaptive = options.adaptive,
      adaptive = _options$adaptive === void 0 ? true : _options$adaptive;

  if (true) {
    var transitionProperty = Object(_dom_utils_getComputedStyle_js__WEBPACK_IMPORTED_MODULE_4__["default"])(state.elements.popper).transitionProperty || '';

    if (adaptive && ['transform', 'top', 'right', 'bottom', 'left'].some(function (property) {
      return transitionProperty.indexOf(property) >= 0;
    })) {
      console.warn(['Popper: Detected CSS transitions on at least one of the following', 'CSS properties: "transform", "top", "right", "bottom", "left".', '\n\n', 'Disable the "computeStyles" modifier\'s `adaptive` option to allow', 'for smooth transitions, or remove these properties from the CSS', 'transition declaration on the popper element if only transitioning', 'opacity or background-color for example.', '\n\n', 'We recommend using the popper element as a wrapper around an inner', 'element that can have any CSS property transitioned for animations.'].join(' '));
    }
  }

  var commonStyles = {
    placement: Object(_utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_5__["default"])(state.placement),
    popper: state.elements.popper,
    popperRect: state.rects.popper,
    gpuAcceleration: gpuAcceleration
  };

  if (state.modifiersData.popperOffsets != null) {
    state.styles.popper = Object.assign({}, state.styles.popper, {}, mapToStyles(Object.assign({}, commonStyles, {
      offsets: state.modifiersData.popperOffsets,
      position: state.options.strategy,
      adaptive: adaptive
    })));
  }

  if (state.modifiersData.arrow != null) {
    state.styles.arrow = Object.assign({}, state.styles.arrow, {}, mapToStyles(Object.assign({}, commonStyles, {
      offsets: state.modifiersData.arrow,
      position: 'absolute',
      adaptive: false
    })));
  }

  state.attributes.popper = Object.assign({}, state.attributes.popper, {
    'data-popper-placement': state.placement
  });
} // eslint-disable-next-line import/no-unused-modules


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'computeStyles',
  enabled: true,
  phase: 'beforeWrite',
  fn: computeStyles,
  data: {}
});

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/modifiers/eventListeners.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/modifiers/eventListeners.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _dom_utils_getWindow_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../dom-utils/getWindow.js */ "./node_modules/@popperjs/core/lib/dom-utils/getWindow.js");
 // eslint-disable-next-line import/no-unused-modules

var passive = {
  passive: true
};

function effect(_ref) {
  var state = _ref.state,
      instance = _ref.instance,
      options = _ref.options;
  var _options$scroll = options.scroll,
      scroll = _options$scroll === void 0 ? true : _options$scroll,
      _options$resize = options.resize,
      resize = _options$resize === void 0 ? true : _options$resize;
  var window = Object(_dom_utils_getWindow_js__WEBPACK_IMPORTED_MODULE_0__["default"])(state.elements.popper);
  var scrollParents = [].concat(state.scrollParents.reference, state.scrollParents.popper);

  if (scroll) {
    scrollParents.forEach(function (scrollParent) {
      scrollParent.addEventListener('scroll', instance.update, passive);
    });
  }

  if (resize) {
    window.addEventListener('resize', instance.update, passive);
  }

  return function () {
    if (scroll) {
      scrollParents.forEach(function (scrollParent) {
        scrollParent.removeEventListener('scroll', instance.update, passive);
      });
    }

    if (resize) {
      window.removeEventListener('resize', instance.update, passive);
    }
  };
} // eslint-disable-next-line import/no-unused-modules


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'eventListeners',
  enabled: true,
  phase: 'write',
  fn: function fn() {},
  effect: effect,
  data: {}
});

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/modifiers/flip.js":
/*!***********************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/modifiers/flip.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils_getOppositePlacement_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/getOppositePlacement.js */ "./node_modules/@popperjs/core/lib/utils/getOppositePlacement.js");
/* harmony import */ var _utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/getBasePlacement.js */ "./node_modules/@popperjs/core/lib/utils/getBasePlacement.js");
/* harmony import */ var _utils_getOppositeVariationPlacement_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/getOppositeVariationPlacement.js */ "./node_modules/@popperjs/core/lib/utils/getOppositeVariationPlacement.js");
/* harmony import */ var _utils_detectOverflow_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils/detectOverflow.js */ "./node_modules/@popperjs/core/lib/utils/detectOverflow.js");
/* harmony import */ var _utils_computeAutoPlacement_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../utils/computeAutoPlacement.js */ "./node_modules/@popperjs/core/lib/utils/computeAutoPlacement.js");
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
/* harmony import */ var _utils_getVariation_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../utils/getVariation.js */ "./node_modules/@popperjs/core/lib/utils/getVariation.js");






 // eslint-disable-next-line import/no-unused-modules

function getExpandedFallbackPlacements(placement) {
  if (Object(_utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_1__["default"])(placement) === _enums_js__WEBPACK_IMPORTED_MODULE_5__["auto"]) {
    return [];
  }

  var oppositePlacement = Object(_utils_getOppositePlacement_js__WEBPACK_IMPORTED_MODULE_0__["default"])(placement);
  return [Object(_utils_getOppositeVariationPlacement_js__WEBPACK_IMPORTED_MODULE_2__["default"])(placement), oppositePlacement, Object(_utils_getOppositeVariationPlacement_js__WEBPACK_IMPORTED_MODULE_2__["default"])(oppositePlacement)];
}

function flip(_ref) {
  var state = _ref.state,
      options = _ref.options,
      name = _ref.name;

  if (state.modifiersData[name]._skip) {
    return;
  }

  var _options$mainAxis = options.mainAxis,
      checkMainAxis = _options$mainAxis === void 0 ? true : _options$mainAxis,
      _options$altAxis = options.altAxis,
      checkAltAxis = _options$altAxis === void 0 ? true : _options$altAxis,
      specifiedFallbackPlacements = options.fallbackPlacements,
      padding = options.padding,
      boundary = options.boundary,
      rootBoundary = options.rootBoundary,
      altBoundary = options.altBoundary,
      _options$flipVariatio = options.flipVariations,
      flipVariations = _options$flipVariatio === void 0 ? true : _options$flipVariatio,
      allowedAutoPlacements = options.allowedAutoPlacements;
  var preferredPlacement = state.options.placement;
  var basePlacement = Object(_utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_1__["default"])(preferredPlacement);
  var isBasePlacement = basePlacement === preferredPlacement;
  var fallbackPlacements = specifiedFallbackPlacements || (isBasePlacement || !flipVariations ? [Object(_utils_getOppositePlacement_js__WEBPACK_IMPORTED_MODULE_0__["default"])(preferredPlacement)] : getExpandedFallbackPlacements(preferredPlacement));
  var placements = [preferredPlacement].concat(fallbackPlacements).reduce(function (acc, placement) {
    return acc.concat(Object(_utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_1__["default"])(placement) === _enums_js__WEBPACK_IMPORTED_MODULE_5__["auto"] ? Object(_utils_computeAutoPlacement_js__WEBPACK_IMPORTED_MODULE_4__["default"])(state, {
      placement: placement,
      boundary: boundary,
      rootBoundary: rootBoundary,
      padding: padding,
      flipVariations: flipVariations,
      allowedAutoPlacements: allowedAutoPlacements
    }) : placement);
  }, []);
  var referenceRect = state.rects.reference;
  var popperRect = state.rects.popper;
  var checksMap = new Map();
  var makeFallbackChecks = true;
  var firstFittingPlacement = placements[0];

  for (var i = 0; i < placements.length; i++) {
    var placement = placements[i];

    var _basePlacement = Object(_utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_1__["default"])(placement);

    var isStartVariation = Object(_utils_getVariation_js__WEBPACK_IMPORTED_MODULE_6__["default"])(placement) === _enums_js__WEBPACK_IMPORTED_MODULE_5__["start"];
    var isVertical = [_enums_js__WEBPACK_IMPORTED_MODULE_5__["top"], _enums_js__WEBPACK_IMPORTED_MODULE_5__["bottom"]].indexOf(_basePlacement) >= 0;
    var len = isVertical ? 'width' : 'height';
    var overflow = Object(_utils_detectOverflow_js__WEBPACK_IMPORTED_MODULE_3__["default"])(state, {
      placement: placement,
      boundary: boundary,
      rootBoundary: rootBoundary,
      altBoundary: altBoundary,
      padding: padding
    });
    var mainVariationSide = isVertical ? isStartVariation ? _enums_js__WEBPACK_IMPORTED_MODULE_5__["right"] : _enums_js__WEBPACK_IMPORTED_MODULE_5__["left"] : isStartVariation ? _enums_js__WEBPACK_IMPORTED_MODULE_5__["bottom"] : _enums_js__WEBPACK_IMPORTED_MODULE_5__["top"];

    if (referenceRect[len] > popperRect[len]) {
      mainVariationSide = Object(_utils_getOppositePlacement_js__WEBPACK_IMPORTED_MODULE_0__["default"])(mainVariationSide);
    }

    var altVariationSide = Object(_utils_getOppositePlacement_js__WEBPACK_IMPORTED_MODULE_0__["default"])(mainVariationSide);
    var checks = [];

    if (checkMainAxis) {
      checks.push(overflow[_basePlacement] <= 0);
    }

    if (checkAltAxis) {
      checks.push(overflow[mainVariationSide] <= 0, overflow[altVariationSide] <= 0);
    }

    if (checks.every(function (check) {
      return check;
    })) {
      firstFittingPlacement = placement;
      makeFallbackChecks = false;
      break;
    }

    checksMap.set(placement, checks);
  }

  if (makeFallbackChecks) {
    // `2` may be desired in some cases – research later
    var numberOfChecks = flipVariations ? 3 : 1;

    var _loop = function _loop(_i) {
      var fittingPlacement = placements.find(function (placement) {
        var checks = checksMap.get(placement);

        if (checks) {
          return checks.slice(0, _i).every(function (check) {
            return check;
          });
        }
      });

      if (fittingPlacement) {
        firstFittingPlacement = fittingPlacement;
        return "break";
      }
    };

    for (var _i = numberOfChecks; _i > 0; _i--) {
      var _ret = _loop(_i);

      if (_ret === "break") break;
    }
  }

  if (state.placement !== firstFittingPlacement) {
    state.modifiersData[name]._skip = true;
    state.placement = firstFittingPlacement;
    state.reset = true;
  }
} // eslint-disable-next-line import/no-unused-modules


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'flip',
  enabled: true,
  phase: 'main',
  fn: flip,
  requiresIfExists: ['offset'],
  data: {
    _skip: false
  }
});

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/modifiers/hide.js":
/*!***********************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/modifiers/hide.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
/* harmony import */ var _utils_detectOverflow_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/detectOverflow.js */ "./node_modules/@popperjs/core/lib/utils/detectOverflow.js");



function getSideOffsets(overflow, rect, preventedOffsets) {
  if (preventedOffsets === void 0) {
    preventedOffsets = {
      x: 0,
      y: 0
    };
  }

  return {
    top: overflow.top - rect.height - preventedOffsets.y,
    right: overflow.right - rect.width + preventedOffsets.x,
    bottom: overflow.bottom - rect.height + preventedOffsets.y,
    left: overflow.left - rect.width - preventedOffsets.x
  };
}

function isAnySideFullyClipped(overflow) {
  return [_enums_js__WEBPACK_IMPORTED_MODULE_0__["top"], _enums_js__WEBPACK_IMPORTED_MODULE_0__["right"], _enums_js__WEBPACK_IMPORTED_MODULE_0__["bottom"], _enums_js__WEBPACK_IMPORTED_MODULE_0__["left"]].some(function (side) {
    return overflow[side] >= 0;
  });
}

function hide(_ref) {
  var state = _ref.state,
      name = _ref.name;
  var referenceRect = state.rects.reference;
  var popperRect = state.rects.popper;
  var preventedOffsets = state.modifiersData.preventOverflow;
  var referenceOverflow = Object(_utils_detectOverflow_js__WEBPACK_IMPORTED_MODULE_1__["default"])(state, {
    elementContext: 'reference'
  });
  var popperAltOverflow = Object(_utils_detectOverflow_js__WEBPACK_IMPORTED_MODULE_1__["default"])(state, {
    altBoundary: true
  });
  var referenceClippingOffsets = getSideOffsets(referenceOverflow, referenceRect);
  var popperEscapeOffsets = getSideOffsets(popperAltOverflow, popperRect, preventedOffsets);
  var isReferenceHidden = isAnySideFullyClipped(referenceClippingOffsets);
  var hasPopperEscaped = isAnySideFullyClipped(popperEscapeOffsets);
  state.modifiersData[name] = {
    referenceClippingOffsets: referenceClippingOffsets,
    popperEscapeOffsets: popperEscapeOffsets,
    isReferenceHidden: isReferenceHidden,
    hasPopperEscaped: hasPopperEscaped
  };
  state.attributes.popper = Object.assign({}, state.attributes.popper, {
    'data-popper-reference-hidden': isReferenceHidden,
    'data-popper-escaped': hasPopperEscaped
  });
} // eslint-disable-next-line import/no-unused-modules


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'hide',
  enabled: true,
  phase: 'main',
  requiresIfExists: ['preventOverflow'],
  fn: hide
});

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/modifiers/offset.js":
/*!*************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/modifiers/offset.js ***!
  \*************************************************************/
/*! exports provided: distanceAndSkiddingToXY, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "distanceAndSkiddingToXY", function() { return distanceAndSkiddingToXY; });
/* harmony import */ var _utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/getBasePlacement.js */ "./node_modules/@popperjs/core/lib/utils/getBasePlacement.js");
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");


function distanceAndSkiddingToXY(placement, rects, offset) {
  var basePlacement = Object(_utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_0__["default"])(placement);
  var invertDistance = [_enums_js__WEBPACK_IMPORTED_MODULE_1__["left"], _enums_js__WEBPACK_IMPORTED_MODULE_1__["top"]].indexOf(basePlacement) >= 0 ? -1 : 1;

  var _ref = typeof offset === 'function' ? offset(Object.assign({}, rects, {
    placement: placement
  })) : offset,
      skidding = _ref[0],
      distance = _ref[1];

  skidding = skidding || 0;
  distance = (distance || 0) * invertDistance;
  return [_enums_js__WEBPACK_IMPORTED_MODULE_1__["left"], _enums_js__WEBPACK_IMPORTED_MODULE_1__["right"]].indexOf(basePlacement) >= 0 ? {
    x: distance,
    y: skidding
  } : {
    x: skidding,
    y: distance
  };
}

function offset(_ref2) {
  var state = _ref2.state,
      options = _ref2.options,
      name = _ref2.name;
  var _options$offset = options.offset,
      offset = _options$offset === void 0 ? [0, 0] : _options$offset;
  var data = _enums_js__WEBPACK_IMPORTED_MODULE_1__["placements"].reduce(function (acc, placement) {
    acc[placement] = distanceAndSkiddingToXY(placement, state.rects, offset);
    return acc;
  }, {});
  var _data$state$placement = data[state.placement],
      x = _data$state$placement.x,
      y = _data$state$placement.y;

  if (state.modifiersData.popperOffsets != null) {
    state.modifiersData.popperOffsets.x += x;
    state.modifiersData.popperOffsets.y += y;
  }

  state.modifiersData[name] = data;
} // eslint-disable-next-line import/no-unused-modules


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'offset',
  enabled: true,
  phase: 'main',
  requires: ['popperOffsets'],
  fn: offset
});

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/modifiers/popperOffsets.js":
/*!********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/modifiers/popperOffsets.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils_computeOffsets_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/computeOffsets.js */ "./node_modules/@popperjs/core/lib/utils/computeOffsets.js");


function popperOffsets(_ref) {
  var state = _ref.state,
      name = _ref.name;
  // Offsets are the actual position the popper needs to have to be
  // properly positioned near its reference element
  // This is the most basic placement, and will be adjusted by
  // the modifiers in the next step
  state.modifiersData[name] = Object(_utils_computeOffsets_js__WEBPACK_IMPORTED_MODULE_0__["default"])({
    reference: state.rects.reference,
    element: state.rects.popper,
    strategy: 'absolute',
    placement: state.placement
  });
} // eslint-disable-next-line import/no-unused-modules


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'popperOffsets',
  enabled: true,
  phase: 'read',
  fn: popperOffsets,
  data: {}
});

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/modifiers/preventOverflow.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/modifiers/preventOverflow.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
/* harmony import */ var _utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/getBasePlacement.js */ "./node_modules/@popperjs/core/lib/utils/getBasePlacement.js");
/* harmony import */ var _utils_getMainAxisFromPlacement_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/getMainAxisFromPlacement.js */ "./node_modules/@popperjs/core/lib/utils/getMainAxisFromPlacement.js");
/* harmony import */ var _utils_getAltAxis_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils/getAltAxis.js */ "./node_modules/@popperjs/core/lib/utils/getAltAxis.js");
/* harmony import */ var _utils_within_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../utils/within.js */ "./node_modules/@popperjs/core/lib/utils/within.js");
/* harmony import */ var _dom_utils_getLayoutRect_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../dom-utils/getLayoutRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getLayoutRect.js");
/* harmony import */ var _dom_utils_getOffsetParent_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../dom-utils/getOffsetParent.js */ "./node_modules/@popperjs/core/lib/dom-utils/getOffsetParent.js");
/* harmony import */ var _utils_detectOverflow_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../utils/detectOverflow.js */ "./node_modules/@popperjs/core/lib/utils/detectOverflow.js");
/* harmony import */ var _utils_getVariation_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../utils/getVariation.js */ "./node_modules/@popperjs/core/lib/utils/getVariation.js");
/* harmony import */ var _utils_getFreshSideObject_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../utils/getFreshSideObject.js */ "./node_modules/@popperjs/core/lib/utils/getFreshSideObject.js");











function preventOverflow(_ref) {
  var state = _ref.state,
      options = _ref.options,
      name = _ref.name;
  var _options$mainAxis = options.mainAxis,
      checkMainAxis = _options$mainAxis === void 0 ? true : _options$mainAxis,
      _options$altAxis = options.altAxis,
      checkAltAxis = _options$altAxis === void 0 ? false : _options$altAxis,
      boundary = options.boundary,
      rootBoundary = options.rootBoundary,
      altBoundary = options.altBoundary,
      padding = options.padding,
      _options$tether = options.tether,
      tether = _options$tether === void 0 ? true : _options$tether,
      _options$tetherOffset = options.tetherOffset,
      tetherOffset = _options$tetherOffset === void 0 ? 0 : _options$tetherOffset;
  var overflow = Object(_utils_detectOverflow_js__WEBPACK_IMPORTED_MODULE_7__["default"])(state, {
    boundary: boundary,
    rootBoundary: rootBoundary,
    padding: padding,
    altBoundary: altBoundary
  });
  var basePlacement = Object(_utils_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_1__["default"])(state.placement);
  var variation = Object(_utils_getVariation_js__WEBPACK_IMPORTED_MODULE_8__["default"])(state.placement);
  var isBasePlacement = !variation;
  var mainAxis = Object(_utils_getMainAxisFromPlacement_js__WEBPACK_IMPORTED_MODULE_2__["default"])(basePlacement);
  var altAxis = Object(_utils_getAltAxis_js__WEBPACK_IMPORTED_MODULE_3__["default"])(mainAxis);
  var popperOffsets = state.modifiersData.popperOffsets;
  var referenceRect = state.rects.reference;
  var popperRect = state.rects.popper;
  var tetherOffsetValue = typeof tetherOffset === 'function' ? tetherOffset(Object.assign({}, state.rects, {
    placement: state.placement
  })) : tetherOffset;
  var data = {
    x: 0,
    y: 0
  };

  if (!popperOffsets) {
    return;
  }

  if (checkMainAxis) {
    var mainSide = mainAxis === 'y' ? _enums_js__WEBPACK_IMPORTED_MODULE_0__["top"] : _enums_js__WEBPACK_IMPORTED_MODULE_0__["left"];
    var altSide = mainAxis === 'y' ? _enums_js__WEBPACK_IMPORTED_MODULE_0__["bottom"] : _enums_js__WEBPACK_IMPORTED_MODULE_0__["right"];
    var len = mainAxis === 'y' ? 'height' : 'width';
    var offset = popperOffsets[mainAxis];
    var min = popperOffsets[mainAxis] + overflow[mainSide];
    var max = popperOffsets[mainAxis] - overflow[altSide];
    var additive = tether ? -popperRect[len] / 2 : 0;
    var minLen = variation === _enums_js__WEBPACK_IMPORTED_MODULE_0__["start"] ? referenceRect[len] : popperRect[len];
    var maxLen = variation === _enums_js__WEBPACK_IMPORTED_MODULE_0__["start"] ? -popperRect[len] : -referenceRect[len]; // We need to include the arrow in the calculation so the arrow doesn't go
    // outside the reference bounds

    var arrowElement = state.elements.arrow;
    var arrowRect = tether && arrowElement ? Object(_dom_utils_getLayoutRect_js__WEBPACK_IMPORTED_MODULE_5__["default"])(arrowElement) : {
      width: 0,
      height: 0
    };
    var arrowPaddingObject = state.modifiersData['arrow#persistent'] ? state.modifiersData['arrow#persistent'].padding : Object(_utils_getFreshSideObject_js__WEBPACK_IMPORTED_MODULE_9__["default"])();
    var arrowPaddingMin = arrowPaddingObject[mainSide];
    var arrowPaddingMax = arrowPaddingObject[altSide]; // If the reference length is smaller than the arrow length, we don't want
    // to include its full size in the calculation. If the reference is small
    // and near the edge of a boundary, the popper can overflow even if the
    // reference is not overflowing as well (e.g. virtual elements with no
    // width or height)

    var arrowLen = Object(_utils_within_js__WEBPACK_IMPORTED_MODULE_4__["default"])(0, referenceRect[len], arrowRect[len]);
    var minOffset = isBasePlacement ? referenceRect[len] / 2 - additive - arrowLen - arrowPaddingMin - tetherOffsetValue : minLen - arrowLen - arrowPaddingMin - tetherOffsetValue;
    var maxOffset = isBasePlacement ? -referenceRect[len] / 2 + additive + arrowLen + arrowPaddingMax + tetherOffsetValue : maxLen + arrowLen + arrowPaddingMax + tetherOffsetValue;
    var arrowOffsetParent = state.elements.arrow && Object(_dom_utils_getOffsetParent_js__WEBPACK_IMPORTED_MODULE_6__["default"])(state.elements.arrow);
    var clientOffset = arrowOffsetParent ? mainAxis === 'y' ? arrowOffsetParent.clientTop || 0 : arrowOffsetParent.clientLeft || 0 : 0;
    var offsetModifierValue = state.modifiersData.offset ? state.modifiersData.offset[state.placement][mainAxis] : 0;
    var tetherMin = popperOffsets[mainAxis] + minOffset - offsetModifierValue - clientOffset;
    var tetherMax = popperOffsets[mainAxis] + maxOffset - offsetModifierValue;
    var preventedOffset = Object(_utils_within_js__WEBPACK_IMPORTED_MODULE_4__["default"])(tether ? Math.min(min, tetherMin) : min, offset, tether ? Math.max(max, tetherMax) : max);
    popperOffsets[mainAxis] = preventedOffset;
    data[mainAxis] = preventedOffset - offset;
  }

  if (checkAltAxis) {
    var _mainSide = mainAxis === 'x' ? _enums_js__WEBPACK_IMPORTED_MODULE_0__["top"] : _enums_js__WEBPACK_IMPORTED_MODULE_0__["left"];

    var _altSide = mainAxis === 'x' ? _enums_js__WEBPACK_IMPORTED_MODULE_0__["bottom"] : _enums_js__WEBPACK_IMPORTED_MODULE_0__["right"];

    var _offset = popperOffsets[altAxis];

    var _min = _offset + overflow[_mainSide];

    var _max = _offset - overflow[_altSide];

    var _preventedOffset = Object(_utils_within_js__WEBPACK_IMPORTED_MODULE_4__["default"])(_min, _offset, _max);

    popperOffsets[altAxis] = _preventedOffset;
    data[altAxis] = _preventedOffset - _offset;
  }

  state.modifiersData[name] = data;
} // eslint-disable-next-line import/no-unused-modules


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'preventOverflow',
  enabled: true,
  phase: 'main',
  fn: preventOverflow,
  requiresIfExists: ['offset']
});

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/popper.js":
/*!***************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/popper.js ***!
  \***************************************************/
/*! exports provided: createPopper, popperGenerator, defaultModifiers, detectOverflow */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "createPopper", function() { return createPopper; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "defaultModifiers", function() { return defaultModifiers; });
/* harmony import */ var _index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.js */ "./node_modules/@popperjs/core/lib/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "popperGenerator", function() { return _index_js__WEBPACK_IMPORTED_MODULE_0__["popperGenerator"]; });

/* harmony import */ var _modifiers_eventListeners_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modifiers/eventListeners.js */ "./node_modules/@popperjs/core/lib/modifiers/eventListeners.js");
/* harmony import */ var _modifiers_popperOffsets_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modifiers/popperOffsets.js */ "./node_modules/@popperjs/core/lib/modifiers/popperOffsets.js");
/* harmony import */ var _modifiers_computeStyles_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modifiers/computeStyles.js */ "./node_modules/@popperjs/core/lib/modifiers/computeStyles.js");
/* harmony import */ var _modifiers_applyStyles_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./modifiers/applyStyles.js */ "./node_modules/@popperjs/core/lib/modifiers/applyStyles.js");
/* harmony import */ var _modifiers_offset_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./modifiers/offset.js */ "./node_modules/@popperjs/core/lib/modifiers/offset.js");
/* harmony import */ var _modifiers_flip_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./modifiers/flip.js */ "./node_modules/@popperjs/core/lib/modifiers/flip.js");
/* harmony import */ var _modifiers_preventOverflow_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./modifiers/preventOverflow.js */ "./node_modules/@popperjs/core/lib/modifiers/preventOverflow.js");
/* harmony import */ var _modifiers_arrow_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./modifiers/arrow.js */ "./node_modules/@popperjs/core/lib/modifiers/arrow.js");
/* harmony import */ var _modifiers_hide_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./modifiers/hide.js */ "./node_modules/@popperjs/core/lib/modifiers/hide.js");
/* harmony import */ var _utils_detectOverflow_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./utils/detectOverflow.js */ "./node_modules/@popperjs/core/lib/utils/detectOverflow.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "detectOverflow", function() { return _utils_detectOverflow_js__WEBPACK_IMPORTED_MODULE_10__["default"]; });












var defaultModifiers = [_modifiers_eventListeners_js__WEBPACK_IMPORTED_MODULE_1__["default"], _modifiers_popperOffsets_js__WEBPACK_IMPORTED_MODULE_2__["default"], _modifiers_computeStyles_js__WEBPACK_IMPORTED_MODULE_3__["default"], _modifiers_applyStyles_js__WEBPACK_IMPORTED_MODULE_4__["default"], _modifiers_offset_js__WEBPACK_IMPORTED_MODULE_5__["default"], _modifiers_flip_js__WEBPACK_IMPORTED_MODULE_6__["default"], _modifiers_preventOverflow_js__WEBPACK_IMPORTED_MODULE_7__["default"], _modifiers_arrow_js__WEBPACK_IMPORTED_MODULE_8__["default"], _modifiers_hide_js__WEBPACK_IMPORTED_MODULE_9__["default"]];
var createPopper = /*#__PURE__*/Object(_index_js__WEBPACK_IMPORTED_MODULE_0__["popperGenerator"])({
  defaultModifiers: defaultModifiers
}); // eslint-disable-next-line import/no-unused-modules



/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/computeAutoPlacement.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/computeAutoPlacement.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return computeAutoPlacement; });
/* harmony import */ var _getVariation_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getVariation.js */ "./node_modules/@popperjs/core/lib/utils/getVariation.js");
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
/* harmony import */ var _detectOverflow_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./detectOverflow.js */ "./node_modules/@popperjs/core/lib/utils/detectOverflow.js");
/* harmony import */ var _getBasePlacement_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./getBasePlacement.js */ "./node_modules/@popperjs/core/lib/utils/getBasePlacement.js");





/*:: type OverflowsMap = { [ComputedPlacement]: number }; */

/*;; type OverflowsMap = { [key in ComputedPlacement]: number }; */
function computeAutoPlacement(state, options) {
  if (options === void 0) {
    options = {};
  }

  var _options = options,
      placement = _options.placement,
      boundary = _options.boundary,
      rootBoundary = _options.rootBoundary,
      padding = _options.padding,
      flipVariations = _options.flipVariations,
      _options$allowedAutoP = _options.allowedAutoPlacements,
      allowedAutoPlacements = _options$allowedAutoP === void 0 ? _enums_js__WEBPACK_IMPORTED_MODULE_1__["placements"] : _options$allowedAutoP;
  var variation = Object(_getVariation_js__WEBPACK_IMPORTED_MODULE_0__["default"])(placement);
  var placements = (variation ? flipVariations ? _enums_js__WEBPACK_IMPORTED_MODULE_1__["variationPlacements"] : _enums_js__WEBPACK_IMPORTED_MODULE_1__["variationPlacements"].filter(function (placement) {
    return Object(_getVariation_js__WEBPACK_IMPORTED_MODULE_0__["default"])(placement) === variation;
  }) : _enums_js__WEBPACK_IMPORTED_MODULE_1__["basePlacements"]).filter(function (placement) {
    return allowedAutoPlacements.indexOf(placement) >= 0;
  }); // $FlowFixMe: Flow seems to have problems with two array unions...

  var overflows = placements.reduce(function (acc, placement) {
    acc[placement] = Object(_detectOverflow_js__WEBPACK_IMPORTED_MODULE_2__["default"])(state, {
      placement: placement,
      boundary: boundary,
      rootBoundary: rootBoundary,
      padding: padding
    })[Object(_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_3__["default"])(placement)];
    return acc;
  }, {});
  return Object.keys(overflows).sort(function (a, b) {
    return overflows[a] - overflows[b];
  });
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/computeOffsets.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/computeOffsets.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return computeOffsets; });
/* harmony import */ var _getBasePlacement_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getBasePlacement.js */ "./node_modules/@popperjs/core/lib/utils/getBasePlacement.js");
/* harmony import */ var _getVariation_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getVariation.js */ "./node_modules/@popperjs/core/lib/utils/getVariation.js");
/* harmony import */ var _getMainAxisFromPlacement_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getMainAxisFromPlacement.js */ "./node_modules/@popperjs/core/lib/utils/getMainAxisFromPlacement.js");
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");




function computeOffsets(_ref) {
  var reference = _ref.reference,
      element = _ref.element,
      placement = _ref.placement;
  var basePlacement = placement ? Object(_getBasePlacement_js__WEBPACK_IMPORTED_MODULE_0__["default"])(placement) : null;
  var variation = placement ? Object(_getVariation_js__WEBPACK_IMPORTED_MODULE_1__["default"])(placement) : null;
  var commonX = reference.x + reference.width / 2 - element.width / 2;
  var commonY = reference.y + reference.height / 2 - element.height / 2;
  var offsets;

  switch (basePlacement) {
    case _enums_js__WEBPACK_IMPORTED_MODULE_3__["top"]:
      offsets = {
        x: commonX,
        y: reference.y - element.height
      };
      break;

    case _enums_js__WEBPACK_IMPORTED_MODULE_3__["bottom"]:
      offsets = {
        x: commonX,
        y: reference.y + reference.height
      };
      break;

    case _enums_js__WEBPACK_IMPORTED_MODULE_3__["right"]:
      offsets = {
        x: reference.x + reference.width,
        y: commonY
      };
      break;

    case _enums_js__WEBPACK_IMPORTED_MODULE_3__["left"]:
      offsets = {
        x: reference.x - element.width,
        y: commonY
      };
      break;

    default:
      offsets = {
        x: reference.x,
        y: reference.y
      };
  }

  var mainAxis = basePlacement ? Object(_getMainAxisFromPlacement_js__WEBPACK_IMPORTED_MODULE_2__["default"])(basePlacement) : null;

  if (mainAxis != null) {
    var len = mainAxis === 'y' ? 'height' : 'width';

    switch (variation) {
      case _enums_js__WEBPACK_IMPORTED_MODULE_3__["start"]:
        offsets[mainAxis] = Math.floor(offsets[mainAxis]) - Math.floor(reference[len] / 2 - element[len] / 2);
        break;

      case _enums_js__WEBPACK_IMPORTED_MODULE_3__["end"]:
        offsets[mainAxis] = Math.floor(offsets[mainAxis]) + Math.ceil(reference[len] / 2 - element[len] / 2);
        break;

      default:
    }
  }

  return offsets;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/debounce.js":
/*!***********************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/debounce.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return debounce; });
function debounce(fn) {
  var pending;
  return function () {
    if (!pending) {
      pending = new Promise(function (resolve) {
        Promise.resolve().then(function () {
          pending = undefined;
          resolve(fn());
        });
      });
    }

    return pending;
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/detectOverflow.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/detectOverflow.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return detectOverflow; });
/* harmony import */ var _dom_utils_getBoundingClientRect_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../dom-utils/getBoundingClientRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getBoundingClientRect.js");
/* harmony import */ var _dom_utils_getClippingRect_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../dom-utils/getClippingRect.js */ "./node_modules/@popperjs/core/lib/dom-utils/getClippingRect.js");
/* harmony import */ var _dom_utils_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../dom-utils/getDocumentElement.js */ "./node_modules/@popperjs/core/lib/dom-utils/getDocumentElement.js");
/* harmony import */ var _computeOffsets_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./computeOffsets.js */ "./node_modules/@popperjs/core/lib/utils/computeOffsets.js");
/* harmony import */ var _rectToClientRect_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./rectToClientRect.js */ "./node_modules/@popperjs/core/lib/utils/rectToClientRect.js");
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
/* harmony import */ var _dom_utils_instanceOf_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../dom-utils/instanceOf.js */ "./node_modules/@popperjs/core/lib/dom-utils/instanceOf.js");
/* harmony import */ var _mergePaddingObject_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./mergePaddingObject.js */ "./node_modules/@popperjs/core/lib/utils/mergePaddingObject.js");
/* harmony import */ var _expandToHashMap_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./expandToHashMap.js */ "./node_modules/@popperjs/core/lib/utils/expandToHashMap.js");








 // eslint-disable-next-line import/no-unused-modules

function detectOverflow(state, options) {
  if (options === void 0) {
    options = {};
  }

  var _options = options,
      _options$placement = _options.placement,
      placement = _options$placement === void 0 ? state.placement : _options$placement,
      _options$boundary = _options.boundary,
      boundary = _options$boundary === void 0 ? _enums_js__WEBPACK_IMPORTED_MODULE_5__["clippingParents"] : _options$boundary,
      _options$rootBoundary = _options.rootBoundary,
      rootBoundary = _options$rootBoundary === void 0 ? _enums_js__WEBPACK_IMPORTED_MODULE_5__["viewport"] : _options$rootBoundary,
      _options$elementConte = _options.elementContext,
      elementContext = _options$elementConte === void 0 ? _enums_js__WEBPACK_IMPORTED_MODULE_5__["popper"] : _options$elementConte,
      _options$altBoundary = _options.altBoundary,
      altBoundary = _options$altBoundary === void 0 ? false : _options$altBoundary,
      _options$padding = _options.padding,
      padding = _options$padding === void 0 ? 0 : _options$padding;
  var paddingObject = Object(_mergePaddingObject_js__WEBPACK_IMPORTED_MODULE_7__["default"])(typeof padding !== 'number' ? padding : Object(_expandToHashMap_js__WEBPACK_IMPORTED_MODULE_8__["default"])(padding, _enums_js__WEBPACK_IMPORTED_MODULE_5__["basePlacements"]));
  var altContext = elementContext === _enums_js__WEBPACK_IMPORTED_MODULE_5__["popper"] ? _enums_js__WEBPACK_IMPORTED_MODULE_5__["reference"] : _enums_js__WEBPACK_IMPORTED_MODULE_5__["popper"];
  var referenceElement = state.elements.reference;
  var popperRect = state.rects.popper;
  var element = state.elements[altBoundary ? altContext : elementContext];
  var clippingClientRect = Object(_dom_utils_getClippingRect_js__WEBPACK_IMPORTED_MODULE_1__["default"])(Object(_dom_utils_instanceOf_js__WEBPACK_IMPORTED_MODULE_6__["isElement"])(element) ? element : element.contextElement || Object(_dom_utils_getDocumentElement_js__WEBPACK_IMPORTED_MODULE_2__["default"])(state.elements.popper), boundary, rootBoundary);
  var referenceClientRect = Object(_dom_utils_getBoundingClientRect_js__WEBPACK_IMPORTED_MODULE_0__["default"])(referenceElement);
  var popperOffsets = Object(_computeOffsets_js__WEBPACK_IMPORTED_MODULE_3__["default"])({
    reference: referenceClientRect,
    element: popperRect,
    strategy: 'absolute',
    placement: placement
  });
  var popperClientRect = Object(_rectToClientRect_js__WEBPACK_IMPORTED_MODULE_4__["default"])(Object.assign({}, popperRect, {}, popperOffsets));
  var elementClientRect = elementContext === _enums_js__WEBPACK_IMPORTED_MODULE_5__["popper"] ? popperClientRect : referenceClientRect; // positive = overflowing the clipping rect
  // 0 or negative = within the clipping rect

  var overflowOffsets = {
    top: clippingClientRect.top - elementClientRect.top + paddingObject.top,
    bottom: elementClientRect.bottom - clippingClientRect.bottom + paddingObject.bottom,
    left: clippingClientRect.left - elementClientRect.left + paddingObject.left,
    right: elementClientRect.right - clippingClientRect.right + paddingObject.right
  };
  var offsetData = state.modifiersData.offset; // Offsets can be applied only to the popper element

  if (elementContext === _enums_js__WEBPACK_IMPORTED_MODULE_5__["popper"] && offsetData) {
    var offset = offsetData[placement];
    Object.keys(overflowOffsets).forEach(function (key) {
      var multiply = [_enums_js__WEBPACK_IMPORTED_MODULE_5__["right"], _enums_js__WEBPACK_IMPORTED_MODULE_5__["bottom"]].indexOf(key) >= 0 ? 1 : -1;
      var axis = [_enums_js__WEBPACK_IMPORTED_MODULE_5__["top"], _enums_js__WEBPACK_IMPORTED_MODULE_5__["bottom"]].indexOf(key) >= 0 ? 'y' : 'x';
      overflowOffsets[key] += offset[axis] * multiply;
    });
  }

  return overflowOffsets;
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/expandToHashMap.js":
/*!******************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/expandToHashMap.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return expandToHashMap; });
function expandToHashMap(value, keys) {
  return keys.reduce(function (hashMap, key) {
    hashMap[key] = value;
    return hashMap;
  }, {});
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/format.js":
/*!*********************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/format.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return format; });
function format(str) {
  for (var _len = arguments.length, args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
    args[_key - 1] = arguments[_key];
  }

  return [].concat(args).reduce(function (p, c) {
    return p.replace(/%s/, c);
  }, str);
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/getAltAxis.js":
/*!*************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/getAltAxis.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getAltAxis; });
function getAltAxis(axis) {
  return axis === 'x' ? 'y' : 'x';
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/getBasePlacement.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/getBasePlacement.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getBasePlacement; });
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");

function getBasePlacement(placement) {
  return placement.split('-')[0];
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/getFreshSideObject.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/getFreshSideObject.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getFreshSideObject; });
function getFreshSideObject() {
  return {
    top: 0,
    right: 0,
    bottom: 0,
    left: 0
  };
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/getMainAxisFromPlacement.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/getMainAxisFromPlacement.js ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getMainAxisFromPlacement; });
function getMainAxisFromPlacement(placement) {
  return ['top', 'bottom'].indexOf(placement) >= 0 ? 'x' : 'y';
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/getOppositePlacement.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/getOppositePlacement.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getOppositePlacement; });
var hash = {
  left: 'right',
  right: 'left',
  bottom: 'top',
  top: 'bottom'
};
function getOppositePlacement(placement) {
  return placement.replace(/left|right|bottom|top/g, function (matched) {
    return hash[matched];
  });
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/getOppositeVariationPlacement.js":
/*!********************************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/getOppositeVariationPlacement.js ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getOppositeVariationPlacement; });
var hash = {
  start: 'end',
  end: 'start'
};
function getOppositeVariationPlacement(placement) {
  return placement.replace(/start|end/g, function (matched) {
    return hash[matched];
  });
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/getVariation.js":
/*!***************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/getVariation.js ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getVariation; });
function getVariation(placement) {
  return placement.split('-')[1];
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/mergeByName.js":
/*!**************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/mergeByName.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return mergeByName; });
function mergeByName(modifiers) {
  var merged = modifiers.reduce(function (merged, current) {
    var existing = merged[current.name];
    merged[current.name] = existing ? Object.assign({}, existing, {}, current, {
      options: Object.assign({}, existing.options, {}, current.options),
      data: Object.assign({}, existing.data, {}, current.data)
    }) : current;
    return merged;
  }, {}); // IE11 does not support Object.values

  return Object.keys(merged).map(function (key) {
    return merged[key];
  });
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/mergePaddingObject.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/mergePaddingObject.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return mergePaddingObject; });
/* harmony import */ var _getFreshSideObject_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getFreshSideObject.js */ "./node_modules/@popperjs/core/lib/utils/getFreshSideObject.js");

function mergePaddingObject(paddingObject) {
  return Object.assign({}, Object(_getFreshSideObject_js__WEBPACK_IMPORTED_MODULE_0__["default"])(), {}, paddingObject);
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/orderModifiers.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/orderModifiers.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return orderModifiers; });
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");
 // source: https://stackoverflow.com/questions/49875255

function order(modifiers) {
  var map = new Map();
  var visited = new Set();
  var result = [];
  modifiers.forEach(function (modifier) {
    map.set(modifier.name, modifier);
  }); // On visiting object, check for its dependencies and visit them recursively

  function sort(modifier) {
    visited.add(modifier.name);
    var requires = [].concat(modifier.requires || [], modifier.requiresIfExists || []);
    requires.forEach(function (dep) {
      if (!visited.has(dep)) {
        var depModifier = map.get(dep);

        if (depModifier) {
          sort(depModifier);
        }
      }
    });
    result.push(modifier);
  }

  modifiers.forEach(function (modifier) {
    if (!visited.has(modifier.name)) {
      // check for visited object
      sort(modifier);
    }
  });
  return result;
}

function orderModifiers(modifiers) {
  // order based on dependencies
  var orderedModifiers = order(modifiers); // order based on phase

  return _enums_js__WEBPACK_IMPORTED_MODULE_0__["modifierPhases"].reduce(function (acc, phase) {
    return acc.concat(orderedModifiers.filter(function (modifier) {
      return modifier.phase === phase;
    }));
  }, []);
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/rectToClientRect.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/rectToClientRect.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return rectToClientRect; });
function rectToClientRect(rect) {
  return Object.assign({}, rect, {
    left: rect.x,
    top: rect.y,
    right: rect.x + rect.width,
    bottom: rect.y + rect.height
  });
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/uniqueBy.js":
/*!***********************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/uniqueBy.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return uniqueBy; });
function uniqueBy(arr, fn) {
  var identifiers = new Set();
  return arr.filter(function (item) {
    var identifier = fn(item);

    if (!identifiers.has(identifier)) {
      identifiers.add(identifier);
      return true;
    }
  });
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/validateModifiers.js":
/*!********************************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/validateModifiers.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return validateModifiers; });
/* harmony import */ var _format_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./format.js */ "./node_modules/@popperjs/core/lib/utils/format.js");
/* harmony import */ var _enums_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../enums.js */ "./node_modules/@popperjs/core/lib/enums.js");


var INVALID_MODIFIER_ERROR = 'Popper: modifier "%s" provided an invalid %s property, expected %s but got %s';
var MISSING_DEPENDENCY_ERROR = 'Popper: modifier "%s" requires "%s", but "%s" modifier is not available';
var VALID_PROPERTIES = ['name', 'enabled', 'phase', 'fn', 'effect', 'requires', 'options'];
function validateModifiers(modifiers) {
  modifiers.forEach(function (modifier) {
    Object.keys(modifier).forEach(function (key) {
      switch (key) {
        case 'name':
          if (typeof modifier.name !== 'string') {
            console.error(Object(_format_js__WEBPACK_IMPORTED_MODULE_0__["default"])(INVALID_MODIFIER_ERROR, String(modifier.name), '"name"', '"string"', "\"" + String(modifier.name) + "\""));
          }

          break;

        case 'enabled':
          if (typeof modifier.enabled !== 'boolean') {
            console.error(Object(_format_js__WEBPACK_IMPORTED_MODULE_0__["default"])(INVALID_MODIFIER_ERROR, modifier.name, '"enabled"', '"boolean"', "\"" + String(modifier.enabled) + "\""));
          }

        case 'phase':
          if (_enums_js__WEBPACK_IMPORTED_MODULE_1__["modifierPhases"].indexOf(modifier.phase) < 0) {
            console.error(Object(_format_js__WEBPACK_IMPORTED_MODULE_0__["default"])(INVALID_MODIFIER_ERROR, modifier.name, '"phase"', "either " + _enums_js__WEBPACK_IMPORTED_MODULE_1__["modifierPhases"].join(', '), "\"" + String(modifier.phase) + "\""));
          }

          break;

        case 'fn':
          if (typeof modifier.fn !== 'function') {
            console.error(Object(_format_js__WEBPACK_IMPORTED_MODULE_0__["default"])(INVALID_MODIFIER_ERROR, modifier.name, '"fn"', '"function"', "\"" + String(modifier.fn) + "\""));
          }

          break;

        case 'effect':
          if (typeof modifier.effect !== 'function') {
            console.error(Object(_format_js__WEBPACK_IMPORTED_MODULE_0__["default"])(INVALID_MODIFIER_ERROR, modifier.name, '"effect"', '"function"', "\"" + String(modifier.fn) + "\""));
          }

          break;

        case 'requires':
          if (!Array.isArray(modifier.requires)) {
            console.error(Object(_format_js__WEBPACK_IMPORTED_MODULE_0__["default"])(INVALID_MODIFIER_ERROR, modifier.name, '"requires"', '"array"', "\"" + String(modifier.requires) + "\""));
          }

          break;

        case 'requiresIfExists':
          if (!Array.isArray(modifier.requiresIfExists)) {
            console.error(Object(_format_js__WEBPACK_IMPORTED_MODULE_0__["default"])(INVALID_MODIFIER_ERROR, modifier.name, '"requiresIfExists"', '"array"', "\"" + String(modifier.requiresIfExists) + "\""));
          }

          break;

        case 'options':
        case 'data':
          break;

        default:
          console.error("PopperJS: an invalid property has been provided to the \"" + modifier.name + "\" modifier, valid properties are " + VALID_PROPERTIES.map(function (s) {
            return "\"" + s + "\"";
          }).join(', ') + "; but \"" + key + "\" was provided.");
      }

      modifier.requires && modifier.requires.forEach(function (requirement) {
        if (modifiers.find(function (mod) {
          return mod.name === requirement;
        }) == null) {
          console.error(Object(_format_js__WEBPACK_IMPORTED_MODULE_0__["default"])(MISSING_DEPENDENCY_ERROR, String(modifier.name), requirement, requirement));
        }
      });
    });
  });
}

/***/ }),

/***/ "./node_modules/@popperjs/core/lib/utils/within.js":
/*!*********************************************************!*\
  !*** ./node_modules/@popperjs/core/lib/utils/within.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return within; });
function within(min, value, max) {
  return Math.max(min, Math.min(value, max));
}

/***/ }),

/***/ "./node_modules/perfect-scrollbar/dist/perfect-scrollbar.esm.js":
/*!**********************************************************************!*\
  !*** ./node_modules/perfect-scrollbar/dist/perfect-scrollbar.esm.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*!
 * perfect-scrollbar v1.5.0
 * Copyright 2020 Hyunje Jun, MDBootstrap and Contributors
 * Licensed under MIT
 */

function get(element) {
  return getComputedStyle(element);
}

function set(element, obj) {
  for (var key in obj) {
    var val = obj[key];
    if (typeof val === 'number') {
      val = val + "px";
    }
    element.style[key] = val;
  }
  return element;
}

function div(className) {
  var div = document.createElement('div');
  div.className = className;
  return div;
}

var elMatches =
  typeof Element !== 'undefined' &&
  (Element.prototype.matches ||
    Element.prototype.webkitMatchesSelector ||
    Element.prototype.mozMatchesSelector ||
    Element.prototype.msMatchesSelector);

function matches(element, query) {
  if (!elMatches) {
    throw new Error('No element matching method supported');
  }

  return elMatches.call(element, query);
}

function remove(element) {
  if (element.remove) {
    element.remove();
  } else {
    if (element.parentNode) {
      element.parentNode.removeChild(element);
    }
  }
}

function queryChildren(element, selector) {
  return Array.prototype.filter.call(element.children, function (child) { return matches(child, selector); }
  );
}

var cls = {
  main: 'ps',
  rtl: 'ps__rtl',
  element: {
    thumb: function (x) { return ("ps__thumb-" + x); },
    rail: function (x) { return ("ps__rail-" + x); },
    consuming: 'ps__child--consume',
  },
  state: {
    focus: 'ps--focus',
    clicking: 'ps--clicking',
    active: function (x) { return ("ps--active-" + x); },
    scrolling: function (x) { return ("ps--scrolling-" + x); },
  },
};

/*
 * Helper methods
 */
var scrollingClassTimeout = { x: null, y: null };

function addScrollingClass(i, x) {
  var classList = i.element.classList;
  var className = cls.state.scrolling(x);

  if (classList.contains(className)) {
    clearTimeout(scrollingClassTimeout[x]);
  } else {
    classList.add(className);
  }
}

function removeScrollingClass(i, x) {
  scrollingClassTimeout[x] = setTimeout(
    function () { return i.isAlive && i.element.classList.remove(cls.state.scrolling(x)); },
    i.settings.scrollingThreshold
  );
}

function setScrollingClassInstantly(i, x) {
  addScrollingClass(i, x);
  removeScrollingClass(i, x);
}

var EventElement = function EventElement(element) {
  this.element = element;
  this.handlers = {};
};

var prototypeAccessors = { isEmpty: { configurable: true } };

EventElement.prototype.bind = function bind (eventName, handler) {
  if (typeof this.handlers[eventName] === 'undefined') {
    this.handlers[eventName] = [];
  }
  this.handlers[eventName].push(handler);
  this.element.addEventListener(eventName, handler, false);
};

EventElement.prototype.unbind = function unbind (eventName, target) {
    var this$1 = this;

  this.handlers[eventName] = this.handlers[eventName].filter(function (handler) {
    if (target && handler !== target) {
      return true;
    }
    this$1.element.removeEventListener(eventName, handler, false);
    return false;
  });
};

EventElement.prototype.unbindAll = function unbindAll () {
  for (var name in this.handlers) {
    this.unbind(name);
  }
};

prototypeAccessors.isEmpty.get = function () {
    var this$1 = this;

  return Object.keys(this.handlers).every(
    function (key) { return this$1.handlers[key].length === 0; }
  );
};

Object.defineProperties( EventElement.prototype, prototypeAccessors );

var EventManager = function EventManager() {
  this.eventElements = [];
};

EventManager.prototype.eventElement = function eventElement (element) {
  var ee = this.eventElements.filter(function (ee) { return ee.element === element; })[0];
  if (!ee) {
    ee = new EventElement(element);
    this.eventElements.push(ee);
  }
  return ee;
};

EventManager.prototype.bind = function bind (element, eventName, handler) {
  this.eventElement(element).bind(eventName, handler);
};

EventManager.prototype.unbind = function unbind (element, eventName, handler) {
  var ee = this.eventElement(element);
  ee.unbind(eventName, handler);

  if (ee.isEmpty) {
    // remove
    this.eventElements.splice(this.eventElements.indexOf(ee), 1);
  }
};

EventManager.prototype.unbindAll = function unbindAll () {
  this.eventElements.forEach(function (e) { return e.unbindAll(); });
  this.eventElements = [];
};

EventManager.prototype.once = function once (element, eventName, handler) {
  var ee = this.eventElement(element);
  var onceHandler = function (evt) {
    ee.unbind(eventName, onceHandler);
    handler(evt);
  };
  ee.bind(eventName, onceHandler);
};

function createEvent(name) {
  if (typeof window.CustomEvent === 'function') {
    return new CustomEvent(name);
  } else {
    var evt = document.createEvent('CustomEvent');
    evt.initCustomEvent(name, false, false, undefined);
    return evt;
  }
}

function processScrollDiff(
  i,
  axis,
  diff,
  useScrollingClass,
  forceFireReachEvent
) {
  if ( useScrollingClass === void 0 ) useScrollingClass = true;
  if ( forceFireReachEvent === void 0 ) forceFireReachEvent = false;

  var fields;
  if (axis === 'top') {
    fields = [
      'contentHeight',
      'containerHeight',
      'scrollTop',
      'y',
      'up',
      'down' ];
  } else if (axis === 'left') {
    fields = [
      'contentWidth',
      'containerWidth',
      'scrollLeft',
      'x',
      'left',
      'right' ];
  } else {
    throw new Error('A proper axis should be provided');
  }

  processScrollDiff$1(i, diff, fields, useScrollingClass, forceFireReachEvent);
}

function processScrollDiff$1(
  i,
  diff,
  ref,
  useScrollingClass,
  forceFireReachEvent
) {
  var contentHeight = ref[0];
  var containerHeight = ref[1];
  var scrollTop = ref[2];
  var y = ref[3];
  var up = ref[4];
  var down = ref[5];
  if ( useScrollingClass === void 0 ) useScrollingClass = true;
  if ( forceFireReachEvent === void 0 ) forceFireReachEvent = false;

  var element = i.element;

  // reset reach
  i.reach[y] = null;

  // 1 for subpixel rounding
  if (element[scrollTop] < 1) {
    i.reach[y] = 'start';
  }

  // 1 for subpixel rounding
  if (element[scrollTop] > i[contentHeight] - i[containerHeight] - 1) {
    i.reach[y] = 'end';
  }

  if (diff) {
    element.dispatchEvent(createEvent(("ps-scroll-" + y)));

    if (diff < 0) {
      element.dispatchEvent(createEvent(("ps-scroll-" + up)));
    } else if (diff > 0) {
      element.dispatchEvent(createEvent(("ps-scroll-" + down)));
    }

    if (useScrollingClass) {
      setScrollingClassInstantly(i, y);
    }
  }

  if (i.reach[y] && (diff || forceFireReachEvent)) {
    element.dispatchEvent(createEvent(("ps-" + y + "-reach-" + (i.reach[y]))));
  }
}

function toInt(x) {
  return parseInt(x, 10) || 0;
}

function isEditable(el) {
  return (
    matches(el, 'input,[contenteditable]') ||
    matches(el, 'select,[contenteditable]') ||
    matches(el, 'textarea,[contenteditable]') ||
    matches(el, 'button,[contenteditable]')
  );
}

function outerWidth(element) {
  var styles = get(element);
  return (
    toInt(styles.width) +
    toInt(styles.paddingLeft) +
    toInt(styles.paddingRight) +
    toInt(styles.borderLeftWidth) +
    toInt(styles.borderRightWidth)
  );
}

var env = {
  isWebKit:
    typeof document !== 'undefined' &&
    'WebkitAppearance' in document.documentElement.style,
  supportsTouch:
    typeof window !== 'undefined' &&
    ('ontouchstart' in window ||
      ('maxTouchPoints' in window.navigator &&
        window.navigator.maxTouchPoints > 0) ||
      (window.DocumentTouch && document instanceof window.DocumentTouch)),
  supportsIePointer:
    typeof navigator !== 'undefined' && navigator.msMaxTouchPoints,
  isChrome:
    typeof navigator !== 'undefined' &&
    /Chrome/i.test(navigator && navigator.userAgent),
};

function updateGeometry(i) {
  var element = i.element;
  var roundedScrollTop = Math.floor(element.scrollTop);
  var rect = element.getBoundingClientRect();

  i.containerWidth = Math.ceil(rect.width);
  i.containerHeight = Math.ceil(rect.height);
  i.contentWidth = element.scrollWidth;
  i.contentHeight = element.scrollHeight;

  if (!element.contains(i.scrollbarXRail)) {
    // clean up and append
    queryChildren(element, cls.element.rail('x')).forEach(function (el) { return remove(el); }
    );
    element.appendChild(i.scrollbarXRail);
  }
  if (!element.contains(i.scrollbarYRail)) {
    // clean up and append
    queryChildren(element, cls.element.rail('y')).forEach(function (el) { return remove(el); }
    );
    element.appendChild(i.scrollbarYRail);
  }

  if (
    !i.settings.suppressScrollX &&
    i.containerWidth + i.settings.scrollXMarginOffset < i.contentWidth
  ) {
    i.scrollbarXActive = true;
    i.railXWidth = i.containerWidth - i.railXMarginWidth;
    i.railXRatio = i.containerWidth / i.railXWidth;
    i.scrollbarXWidth = getThumbSize(
      i,
      toInt((i.railXWidth * i.containerWidth) / i.contentWidth)
    );
    i.scrollbarXLeft = toInt(
      ((i.negativeScrollAdjustment + element.scrollLeft) *
        (i.railXWidth - i.scrollbarXWidth)) /
        (i.contentWidth - i.containerWidth)
    );
  } else {
    i.scrollbarXActive = false;
  }

  if (
    !i.settings.suppressScrollY &&
    i.containerHeight + i.settings.scrollYMarginOffset < i.contentHeight
  ) {
    i.scrollbarYActive = true;
    i.railYHeight = i.containerHeight - i.railYMarginHeight;
    i.railYRatio = i.containerHeight / i.railYHeight;
    i.scrollbarYHeight = getThumbSize(
      i,
      toInt((i.railYHeight * i.containerHeight) / i.contentHeight)
    );
    i.scrollbarYTop = toInt(
      (roundedScrollTop * (i.railYHeight - i.scrollbarYHeight)) /
        (i.contentHeight - i.containerHeight)
    );
  } else {
    i.scrollbarYActive = false;
  }

  if (i.scrollbarXLeft >= i.railXWidth - i.scrollbarXWidth) {
    i.scrollbarXLeft = i.railXWidth - i.scrollbarXWidth;
  }
  if (i.scrollbarYTop >= i.railYHeight - i.scrollbarYHeight) {
    i.scrollbarYTop = i.railYHeight - i.scrollbarYHeight;
  }

  updateCss(element, i);

  if (i.scrollbarXActive) {
    element.classList.add(cls.state.active('x'));
  } else {
    element.classList.remove(cls.state.active('x'));
    i.scrollbarXWidth = 0;
    i.scrollbarXLeft = 0;
    element.scrollLeft = i.isRtl === true ? i.contentWidth : 0;
  }
  if (i.scrollbarYActive) {
    element.classList.add(cls.state.active('y'));
  } else {
    element.classList.remove(cls.state.active('y'));
    i.scrollbarYHeight = 0;
    i.scrollbarYTop = 0;
    element.scrollTop = 0;
  }
}

function getThumbSize(i, thumbSize) {
  if (i.settings.minScrollbarLength) {
    thumbSize = Math.max(thumbSize, i.settings.minScrollbarLength);
  }
  if (i.settings.maxScrollbarLength) {
    thumbSize = Math.min(thumbSize, i.settings.maxScrollbarLength);
  }
  return thumbSize;
}

function updateCss(element, i) {
  var xRailOffset = { width: i.railXWidth };
  var roundedScrollTop = Math.floor(element.scrollTop);

  if (i.isRtl) {
    xRailOffset.left =
      i.negativeScrollAdjustment +
      element.scrollLeft +
      i.containerWidth -
      i.contentWidth;
  } else {
    xRailOffset.left = element.scrollLeft;
  }
  if (i.isScrollbarXUsingBottom) {
    xRailOffset.bottom = i.scrollbarXBottom - roundedScrollTop;
  } else {
    xRailOffset.top = i.scrollbarXTop + roundedScrollTop;
  }
  set(i.scrollbarXRail, xRailOffset);

  var yRailOffset = { top: roundedScrollTop, height: i.railYHeight };
  if (i.isScrollbarYUsingRight) {
    if (i.isRtl) {
      yRailOffset.right =
        i.contentWidth -
        (i.negativeScrollAdjustment + element.scrollLeft) -
        i.scrollbarYRight -
        i.scrollbarYOuterWidth -
        9;
    } else {
      yRailOffset.right = i.scrollbarYRight - element.scrollLeft;
    }
  } else {
    if (i.isRtl) {
      yRailOffset.left =
        i.negativeScrollAdjustment +
        element.scrollLeft +
        i.containerWidth * 2 -
        i.contentWidth -
        i.scrollbarYLeft -
        i.scrollbarYOuterWidth;
    } else {
      yRailOffset.left = i.scrollbarYLeft + element.scrollLeft;
    }
  }
  set(i.scrollbarYRail, yRailOffset);

  set(i.scrollbarX, {
    left: i.scrollbarXLeft,
    width: i.scrollbarXWidth - i.railBorderXWidth,
  });
  set(i.scrollbarY, {
    top: i.scrollbarYTop,
    height: i.scrollbarYHeight - i.railBorderYWidth,
  });
}

function clickRail(i) {
  var element = i.element;

  i.event.bind(i.scrollbarY, 'mousedown', function (e) { return e.stopPropagation(); });
  i.event.bind(i.scrollbarYRail, 'mousedown', function (e) {
    var positionTop =
      e.pageY -
      window.pageYOffset -
      i.scrollbarYRail.getBoundingClientRect().top;
    var direction = positionTop > i.scrollbarYTop ? 1 : -1;

    i.element.scrollTop += direction * i.containerHeight;
    updateGeometry(i);

    e.stopPropagation();
  });

  i.event.bind(i.scrollbarX, 'mousedown', function (e) { return e.stopPropagation(); });
  i.event.bind(i.scrollbarXRail, 'mousedown', function (e) {
    var positionLeft =
      e.pageX -
      window.pageXOffset -
      i.scrollbarXRail.getBoundingClientRect().left;
    var direction = positionLeft > i.scrollbarXLeft ? 1 : -1;

    i.element.scrollLeft += direction * i.containerWidth;
    updateGeometry(i);

    e.stopPropagation();
  });
}

function dragThumb(i) {
  bindMouseScrollHandler(i, [
    'containerWidth',
    'contentWidth',
    'pageX',
    'railXWidth',
    'scrollbarX',
    'scrollbarXWidth',
    'scrollLeft',
    'x',
    'scrollbarXRail' ]);
  bindMouseScrollHandler(i, [
    'containerHeight',
    'contentHeight',
    'pageY',
    'railYHeight',
    'scrollbarY',
    'scrollbarYHeight',
    'scrollTop',
    'y',
    'scrollbarYRail' ]);
}

function bindMouseScrollHandler(
  i,
  ref
) {
  var containerHeight = ref[0];
  var contentHeight = ref[1];
  var pageY = ref[2];
  var railYHeight = ref[3];
  var scrollbarY = ref[4];
  var scrollbarYHeight = ref[5];
  var scrollTop = ref[6];
  var y = ref[7];
  var scrollbarYRail = ref[8];

  var element = i.element;

  var startingScrollTop = null;
  var startingMousePageY = null;
  var scrollBy = null;

  function mouseMoveHandler(e) {
    if (e.touches && e.touches[0]) {
      e[pageY] = e.touches[0].pageY;
    }
    element[scrollTop] =
      startingScrollTop + scrollBy * (e[pageY] - startingMousePageY);
    addScrollingClass(i, y);
    updateGeometry(i);

    e.stopPropagation();
    e.preventDefault();
  }

  function mouseUpHandler() {
    removeScrollingClass(i, y);
    i[scrollbarYRail].classList.remove(cls.state.clicking);
    i.event.unbind(i.ownerDocument, 'mousemove', mouseMoveHandler);
  }

  function bindMoves(e, touchMode) {
    startingScrollTop = element[scrollTop];
    if (touchMode && e.touches) {
      e[pageY] = e.touches[0].pageY;
    }
    startingMousePageY = e[pageY];
    scrollBy =
      (i[contentHeight] - i[containerHeight]) /
      (i[railYHeight] - i[scrollbarYHeight]);
    if (!touchMode) {
      i.event.bind(i.ownerDocument, 'mousemove', mouseMoveHandler);
      i.event.once(i.ownerDocument, 'mouseup', mouseUpHandler);
      e.preventDefault();
    } else {
      i.event.bind(i.ownerDocument, 'touchmove', mouseMoveHandler);
    }

    i[scrollbarYRail].classList.add(cls.state.clicking);

    e.stopPropagation();
  }

  i.event.bind(i[scrollbarY], 'mousedown', function (e) {
    bindMoves(e);
  });
  i.event.bind(i[scrollbarY], 'touchstart', function (e) {
    bindMoves(e, true);
  });
}

function keyboard(i) {
  var element = i.element;

  var elementHovered = function () { return matches(element, ':hover'); };
  var scrollbarFocused = function () { return matches(i.scrollbarX, ':focus') || matches(i.scrollbarY, ':focus'); };

  function shouldPreventDefault(deltaX, deltaY) {
    var scrollTop = Math.floor(element.scrollTop);
    if (deltaX === 0) {
      if (!i.scrollbarYActive) {
        return false;
      }
      if (
        (scrollTop === 0 && deltaY > 0) ||
        (scrollTop >= i.contentHeight - i.containerHeight && deltaY < 0)
      ) {
        return !i.settings.wheelPropagation;
      }
    }

    var scrollLeft = element.scrollLeft;
    if (deltaY === 0) {
      if (!i.scrollbarXActive) {
        return false;
      }
      if (
        (scrollLeft === 0 && deltaX < 0) ||
        (scrollLeft >= i.contentWidth - i.containerWidth && deltaX > 0)
      ) {
        return !i.settings.wheelPropagation;
      }
    }
    return true;
  }

  i.event.bind(i.ownerDocument, 'keydown', function (e) {
    if (
      (e.isDefaultPrevented && e.isDefaultPrevented()) ||
      e.defaultPrevented
    ) {
      return;
    }

    if (!elementHovered() && !scrollbarFocused()) {
      return;
    }

    var activeElement = document.activeElement
      ? document.activeElement
      : i.ownerDocument.activeElement;
    if (activeElement) {
      if (activeElement.tagName === 'IFRAME') {
        activeElement = activeElement.contentDocument.activeElement;
      } else {
        // go deeper if element is a webcomponent
        while (activeElement.shadowRoot) {
          activeElement = activeElement.shadowRoot.activeElement;
        }
      }
      if (isEditable(activeElement)) {
        return;
      }
    }

    var deltaX = 0;
    var deltaY = 0;

    switch (e.which) {
      case 37: // left
        if (e.metaKey) {
          deltaX = -i.contentWidth;
        } else if (e.altKey) {
          deltaX = -i.containerWidth;
        } else {
          deltaX = -30;
        }
        break;
      case 38: // up
        if (e.metaKey) {
          deltaY = i.contentHeight;
        } else if (e.altKey) {
          deltaY = i.containerHeight;
        } else {
          deltaY = 30;
        }
        break;
      case 39: // right
        if (e.metaKey) {
          deltaX = i.contentWidth;
        } else if (e.altKey) {
          deltaX = i.containerWidth;
        } else {
          deltaX = 30;
        }
        break;
      case 40: // down
        if (e.metaKey) {
          deltaY = -i.contentHeight;
        } else if (e.altKey) {
          deltaY = -i.containerHeight;
        } else {
          deltaY = -30;
        }
        break;
      case 32: // space bar
        if (e.shiftKey) {
          deltaY = i.containerHeight;
        } else {
          deltaY = -i.containerHeight;
        }
        break;
      case 33: // page up
        deltaY = i.containerHeight;
        break;
      case 34: // page down
        deltaY = -i.containerHeight;
        break;
      case 36: // home
        deltaY = i.contentHeight;
        break;
      case 35: // end
        deltaY = -i.contentHeight;
        break;
      default:
        return;
    }

    if (i.settings.suppressScrollX && deltaX !== 0) {
      return;
    }
    if (i.settings.suppressScrollY && deltaY !== 0) {
      return;
    }

    element.scrollTop -= deltaY;
    element.scrollLeft += deltaX;
    updateGeometry(i);

    if (shouldPreventDefault(deltaX, deltaY)) {
      e.preventDefault();
    }
  });
}

function wheel(i) {
  var element = i.element;

  function shouldPreventDefault(deltaX, deltaY) {
    var roundedScrollTop = Math.floor(element.scrollTop);
    var isTop = element.scrollTop === 0;
    var isBottom =
      roundedScrollTop + element.offsetHeight === element.scrollHeight;
    var isLeft = element.scrollLeft === 0;
    var isRight =
      element.scrollLeft + element.offsetWidth === element.scrollWidth;

    var hitsBound;

    // pick axis with primary direction
    if (Math.abs(deltaY) > Math.abs(deltaX)) {
      hitsBound = isTop || isBottom;
    } else {
      hitsBound = isLeft || isRight;
    }

    return hitsBound ? !i.settings.wheelPropagation : true;
  }

  function getDeltaFromEvent(e) {
    var deltaX = e.deltaX;
    var deltaY = -1 * e.deltaY;

    if (typeof deltaX === 'undefined' || typeof deltaY === 'undefined') {
      // OS X Safari
      deltaX = (-1 * e.wheelDeltaX) / 6;
      deltaY = e.wheelDeltaY / 6;
    }

    if (e.deltaMode && e.deltaMode === 1) {
      // Firefox in deltaMode 1: Line scrolling
      deltaX *= 10;
      deltaY *= 10;
    }

    if (deltaX !== deltaX && deltaY !== deltaY /* NaN checks */) {
      // IE in some mouse drivers
      deltaX = 0;
      deltaY = e.wheelDelta;
    }

    if (e.shiftKey) {
      // reverse axis with shift key
      return [-deltaY, -deltaX];
    }
    return [deltaX, deltaY];
  }

  function shouldBeConsumedByChild(target, deltaX, deltaY) {
    // FIXME: this is a workaround for <select> issue in FF and IE #571
    if (!env.isWebKit && element.querySelector('select:focus')) {
      return true;
    }

    if (!element.contains(target)) {
      return false;
    }

    var cursor = target;

    while (cursor && cursor !== element) {
      if (cursor.classList.contains(cls.element.consuming)) {
        return true;
      }

      var style = get(cursor);

      // if deltaY && vertical scrollable
      if (deltaY && style.overflowY.match(/(scroll|auto)/)) {
        var maxScrollTop = cursor.scrollHeight - cursor.clientHeight;
        if (maxScrollTop > 0) {
          if (
            (cursor.scrollTop > 0 && deltaY < 0) ||
            (cursor.scrollTop < maxScrollTop && deltaY > 0)
          ) {
            return true;
          }
        }
      }
      // if deltaX && horizontal scrollable
      if (deltaX && style.overflowX.match(/(scroll|auto)/)) {
        var maxScrollLeft = cursor.scrollWidth - cursor.clientWidth;
        if (maxScrollLeft > 0) {
          if (
            (cursor.scrollLeft > 0 && deltaX < 0) ||
            (cursor.scrollLeft < maxScrollLeft && deltaX > 0)
          ) {
            return true;
          }
        }
      }

      cursor = cursor.parentNode;
    }

    return false;
  }

  function mousewheelHandler(e) {
    var ref = getDeltaFromEvent(e);
    var deltaX = ref[0];
    var deltaY = ref[1];

    if (shouldBeConsumedByChild(e.target, deltaX, deltaY)) {
      return;
    }

    var shouldPrevent = false;
    if (!i.settings.useBothWheelAxes) {
      // deltaX will only be used for horizontal scrolling and deltaY will
      // only be used for vertical scrolling - this is the default
      element.scrollTop -= deltaY * i.settings.wheelSpeed;
      element.scrollLeft += deltaX * i.settings.wheelSpeed;
    } else if (i.scrollbarYActive && !i.scrollbarXActive) {
      // only vertical scrollbar is active and useBothWheelAxes option is
      // active, so let's scroll vertical bar using both mouse wheel axes
      if (deltaY) {
        element.scrollTop -= deltaY * i.settings.wheelSpeed;
      } else {
        element.scrollTop += deltaX * i.settings.wheelSpeed;
      }
      shouldPrevent = true;
    } else if (i.scrollbarXActive && !i.scrollbarYActive) {
      // useBothWheelAxes and only horizontal bar is active, so use both
      // wheel axes for horizontal bar
      if (deltaX) {
        element.scrollLeft += deltaX * i.settings.wheelSpeed;
      } else {
        element.scrollLeft -= deltaY * i.settings.wheelSpeed;
      }
      shouldPrevent = true;
    }

    updateGeometry(i);

    shouldPrevent = shouldPrevent || shouldPreventDefault(deltaX, deltaY);
    if (shouldPrevent && !e.ctrlKey) {
      e.stopPropagation();
      e.preventDefault();
    }
  }

  if (typeof window.onwheel !== 'undefined') {
    i.event.bind(element, 'wheel', mousewheelHandler);
  } else if (typeof window.onmousewheel !== 'undefined') {
    i.event.bind(element, 'mousewheel', mousewheelHandler);
  }
}

function touch(i) {
  if (!env.supportsTouch && !env.supportsIePointer) {
    return;
  }

  var element = i.element;

  function shouldPrevent(deltaX, deltaY) {
    var scrollTop = Math.floor(element.scrollTop);
    var scrollLeft = element.scrollLeft;
    var magnitudeX = Math.abs(deltaX);
    var magnitudeY = Math.abs(deltaY);

    if (magnitudeY > magnitudeX) {
      // user is perhaps trying to swipe up/down the page

      if (
        (deltaY < 0 && scrollTop === i.contentHeight - i.containerHeight) ||
        (deltaY > 0 && scrollTop === 0)
      ) {
        // set prevent for mobile Chrome refresh
        return window.scrollY === 0 && deltaY > 0 && env.isChrome;
      }
    } else if (magnitudeX > magnitudeY) {
      // user is perhaps trying to swipe left/right across the page

      if (
        (deltaX < 0 && scrollLeft === i.contentWidth - i.containerWidth) ||
        (deltaX > 0 && scrollLeft === 0)
      ) {
        return true;
      }
    }

    return true;
  }

  function applyTouchMove(differenceX, differenceY) {
    element.scrollTop -= differenceY;
    element.scrollLeft -= differenceX;

    updateGeometry(i);
  }

  var startOffset = {};
  var startTime = 0;
  var speed = {};
  var easingLoop = null;

  function getTouch(e) {
    if (e.targetTouches) {
      return e.targetTouches[0];
    } else {
      // Maybe IE pointer
      return e;
    }
  }

  function shouldHandle(e) {
    if (e.pointerType && e.pointerType === 'pen' && e.buttons === 0) {
      return false;
    }
    if (e.targetTouches && e.targetTouches.length === 1) {
      return true;
    }
    if (
      e.pointerType &&
      e.pointerType !== 'mouse' &&
      e.pointerType !== e.MSPOINTER_TYPE_MOUSE
    ) {
      return true;
    }
    return false;
  }

  function touchStart(e) {
    if (!shouldHandle(e)) {
      return;
    }

    var touch = getTouch(e);

    startOffset.pageX = touch.pageX;
    startOffset.pageY = touch.pageY;

    startTime = new Date().getTime();

    if (easingLoop !== null) {
      clearInterval(easingLoop);
    }
  }

  function shouldBeConsumedByChild(target, deltaX, deltaY) {
    if (!element.contains(target)) {
      return false;
    }

    var cursor = target;

    while (cursor && cursor !== element) {
      if (cursor.classList.contains(cls.element.consuming)) {
        return true;
      }

      var style = get(cursor);

      // if deltaY && vertical scrollable
      if (deltaY && style.overflowY.match(/(scroll|auto)/)) {
        var maxScrollTop = cursor.scrollHeight - cursor.clientHeight;
        if (maxScrollTop > 0) {
          if (
            (cursor.scrollTop > 0 && deltaY < 0) ||
            (cursor.scrollTop < maxScrollTop && deltaY > 0)
          ) {
            return true;
          }
        }
      }
      // if deltaX && horizontal scrollable
      if (deltaX && style.overflowX.match(/(scroll|auto)/)) {
        var maxScrollLeft = cursor.scrollWidth - cursor.clientWidth;
        if (maxScrollLeft > 0) {
          if (
            (cursor.scrollLeft > 0 && deltaX < 0) ||
            (cursor.scrollLeft < maxScrollLeft && deltaX > 0)
          ) {
            return true;
          }
        }
      }

      cursor = cursor.parentNode;
    }

    return false;
  }

  function touchMove(e) {
    if (shouldHandle(e)) {
      var touch = getTouch(e);

      var currentOffset = { pageX: touch.pageX, pageY: touch.pageY };

      var differenceX = currentOffset.pageX - startOffset.pageX;
      var differenceY = currentOffset.pageY - startOffset.pageY;

      if (shouldBeConsumedByChild(e.target, differenceX, differenceY)) {
        return;
      }

      applyTouchMove(differenceX, differenceY);
      startOffset = currentOffset;

      var currentTime = new Date().getTime();

      var timeGap = currentTime - startTime;
      if (timeGap > 0) {
        speed.x = differenceX / timeGap;
        speed.y = differenceY / timeGap;
        startTime = currentTime;
      }

      if (shouldPrevent(differenceX, differenceY)) {
        e.preventDefault();
      }
    }
  }
  function touchEnd() {
    if (i.settings.swipeEasing) {
      clearInterval(easingLoop);
      easingLoop = setInterval(function() {
        if (i.isInitialized) {
          clearInterval(easingLoop);
          return;
        }

        if (!speed.x && !speed.y) {
          clearInterval(easingLoop);
          return;
        }

        if (Math.abs(speed.x) < 0.01 && Math.abs(speed.y) < 0.01) {
          clearInterval(easingLoop);
          return;
        }

        applyTouchMove(speed.x * 30, speed.y * 30);

        speed.x *= 0.8;
        speed.y *= 0.8;
      }, 10);
    }
  }

  if (env.supportsTouch) {
    i.event.bind(element, 'touchstart', touchStart);
    i.event.bind(element, 'touchmove', touchMove);
    i.event.bind(element, 'touchend', touchEnd);
  } else if (env.supportsIePointer) {
    if (window.PointerEvent) {
      i.event.bind(element, 'pointerdown', touchStart);
      i.event.bind(element, 'pointermove', touchMove);
      i.event.bind(element, 'pointerup', touchEnd);
    } else if (window.MSPointerEvent) {
      i.event.bind(element, 'MSPointerDown', touchStart);
      i.event.bind(element, 'MSPointerMove', touchMove);
      i.event.bind(element, 'MSPointerUp', touchEnd);
    }
  }
}

var defaultSettings = function () { return ({
  handlers: ['click-rail', 'drag-thumb', 'keyboard', 'wheel', 'touch'],
  maxScrollbarLength: null,
  minScrollbarLength: null,
  scrollingThreshold: 1000,
  scrollXMarginOffset: 0,
  scrollYMarginOffset: 0,
  suppressScrollX: false,
  suppressScrollY: false,
  swipeEasing: true,
  useBothWheelAxes: false,
  wheelPropagation: true,
  wheelSpeed: 1,
}); };

var handlers = {
  'click-rail': clickRail,
  'drag-thumb': dragThumb,
  keyboard: keyboard,
  wheel: wheel,
  touch: touch,
};

var PerfectScrollbar = function PerfectScrollbar(element, userSettings) {
  var this$1 = this;
  if ( userSettings === void 0 ) userSettings = {};

  if (typeof element === 'string') {
    element = document.querySelector(element);
  }

  if (!element || !element.nodeName) {
    throw new Error('no element is specified to initialize PerfectScrollbar');
  }

  this.element = element;

  element.classList.add(cls.main);

  this.settings = defaultSettings();
  for (var key in userSettings) {
    this.settings[key] = userSettings[key];
  }

  this.containerWidth = null;
  this.containerHeight = null;
  this.contentWidth = null;
  this.contentHeight = null;

  var focus = function () { return element.classList.add(cls.state.focus); };
  var blur = function () { return element.classList.remove(cls.state.focus); };

  this.isRtl = get(element).direction === 'rtl';
  if (this.isRtl === true) {
    element.classList.add(cls.rtl);
  }
  this.isNegativeScroll = (function () {
    var originalScrollLeft = element.scrollLeft;
    var result = null;
    element.scrollLeft = -1;
    result = element.scrollLeft < 0;
    element.scrollLeft = originalScrollLeft;
    return result;
  })();
  this.negativeScrollAdjustment = this.isNegativeScroll
    ? element.scrollWidth - element.clientWidth
    : 0;
  this.event = new EventManager();
  this.ownerDocument = element.ownerDocument || document;

  this.scrollbarXRail = div(cls.element.rail('x'));
  element.appendChild(this.scrollbarXRail);
  this.scrollbarX = div(cls.element.thumb('x'));
  this.scrollbarXRail.appendChild(this.scrollbarX);
  this.scrollbarX.setAttribute('tabindex', 0);
  this.event.bind(this.scrollbarX, 'focus', focus);
  this.event.bind(this.scrollbarX, 'blur', blur);
  this.scrollbarXActive = null;
  this.scrollbarXWidth = null;
  this.scrollbarXLeft = null;
  var railXStyle = get(this.scrollbarXRail);
  this.scrollbarXBottom = parseInt(railXStyle.bottom, 10);
  if (isNaN(this.scrollbarXBottom)) {
    this.isScrollbarXUsingBottom = false;
    this.scrollbarXTop = toInt(railXStyle.top);
  } else {
    this.isScrollbarXUsingBottom = true;
  }
  this.railBorderXWidth =
    toInt(railXStyle.borderLeftWidth) + toInt(railXStyle.borderRightWidth);
  // Set rail to display:block to calculate margins
  set(this.scrollbarXRail, { display: 'block' });
  this.railXMarginWidth =
    toInt(railXStyle.marginLeft) + toInt(railXStyle.marginRight);
  set(this.scrollbarXRail, { display: '' });
  this.railXWidth = null;
  this.railXRatio = null;

  this.scrollbarYRail = div(cls.element.rail('y'));
  element.appendChild(this.scrollbarYRail);
  this.scrollbarY = div(cls.element.thumb('y'));
  this.scrollbarYRail.appendChild(this.scrollbarY);
  this.scrollbarY.setAttribute('tabindex', 0);
  this.event.bind(this.scrollbarY, 'focus', focus);
  this.event.bind(this.scrollbarY, 'blur', blur);
  this.scrollbarYActive = null;
  this.scrollbarYHeight = null;
  this.scrollbarYTop = null;
  var railYStyle = get(this.scrollbarYRail);
  this.scrollbarYRight = parseInt(railYStyle.right, 10);
  if (isNaN(this.scrollbarYRight)) {
    this.isScrollbarYUsingRight = false;
    this.scrollbarYLeft = toInt(railYStyle.left);
  } else {
    this.isScrollbarYUsingRight = true;
  }
  this.scrollbarYOuterWidth = this.isRtl ? outerWidth(this.scrollbarY) : null;
  this.railBorderYWidth =
    toInt(railYStyle.borderTopWidth) + toInt(railYStyle.borderBottomWidth);
  set(this.scrollbarYRail, { display: 'block' });
  this.railYMarginHeight =
    toInt(railYStyle.marginTop) + toInt(railYStyle.marginBottom);
  set(this.scrollbarYRail, { display: '' });
  this.railYHeight = null;
  this.railYRatio = null;

  this.reach = {
    x:
      element.scrollLeft <= 0
        ? 'start'
        : element.scrollLeft >= this.contentWidth - this.containerWidth
        ? 'end'
        : null,
    y:
      element.scrollTop <= 0
        ? 'start'
        : element.scrollTop >= this.contentHeight - this.containerHeight
        ? 'end'
        : null,
  };

  this.isAlive = true;

  this.settings.handlers.forEach(function (handlerName) { return handlers[handlerName](this$1); });

  this.lastScrollTop = Math.floor(element.scrollTop); // for onScroll only
  this.lastScrollLeft = element.scrollLeft; // for onScroll only
  this.event.bind(this.element, 'scroll', function (e) { return this$1.onScroll(e); });
  updateGeometry(this);
};

PerfectScrollbar.prototype.update = function update () {
  if (!this.isAlive) {
    return;
  }

  // Recalcuate negative scrollLeft adjustment
  this.negativeScrollAdjustment = this.isNegativeScroll
    ? this.element.scrollWidth - this.element.clientWidth
    : 0;

  // Recalculate rail margins
  set(this.scrollbarXRail, { display: 'block' });
  set(this.scrollbarYRail, { display: 'block' });
  this.railXMarginWidth =
    toInt(get(this.scrollbarXRail).marginLeft) +
    toInt(get(this.scrollbarXRail).marginRight);
  this.railYMarginHeight =
    toInt(get(this.scrollbarYRail).marginTop) +
    toInt(get(this.scrollbarYRail).marginBottom);

  // Hide scrollbars not to affect scrollWidth and scrollHeight
  set(this.scrollbarXRail, { display: 'none' });
  set(this.scrollbarYRail, { display: 'none' });

  updateGeometry(this);

  processScrollDiff(this, 'top', 0, false, true);
  processScrollDiff(this, 'left', 0, false, true);

  set(this.scrollbarXRail, { display: '' });
  set(this.scrollbarYRail, { display: '' });
};

PerfectScrollbar.prototype.onScroll = function onScroll (e) {
  if (!this.isAlive) {
    return;
  }

  updateGeometry(this);
  processScrollDiff(this, 'top', this.element.scrollTop - this.lastScrollTop);
  processScrollDiff(
    this,
    'left',
    this.element.scrollLeft - this.lastScrollLeft
  );

  this.lastScrollTop = Math.floor(this.element.scrollTop);
  this.lastScrollLeft = this.element.scrollLeft;
};

PerfectScrollbar.prototype.destroy = function destroy () {
  if (!this.isAlive) {
    return;
  }

  this.event.unbindAll();
  remove(this.scrollbarX);
  remove(this.scrollbarY);
  remove(this.scrollbarXRail);
  remove(this.scrollbarYRail);
  this.removePsClasses();

  // unset elements
  this.element = null;
  this.scrollbarX = null;
  this.scrollbarY = null;
  this.scrollbarXRail = null;
  this.scrollbarYRail = null;

  this.isAlive = false;
};

PerfectScrollbar.prototype.removePsClasses = function removePsClasses () {
  this.element.className = this.element.className
    .split(' ')
    .filter(function (name) { return !name.match(/^ps([-_].+|)$/); })
    .join(' ');
};

/* harmony default export */ __webpack_exports__["default"] = (PerfectScrollbar);
//# sourceMappingURL=perfect-scrollbar.esm.js.map


/***/ }),

/***/ "./resources/js/backend/app.js":
/*!*************************************!*\
  !*** ./resources/js/backend/app.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
window.Swal = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js"); // CoreUI

__webpack_require__(/*! @coreui/coreui */ "./node_modules/@coreui/coreui/dist/js/coreui.esm.js"); // Boilerplate


__webpack_require__(/*! ../plugins */ "./resources/js/plugins.js");

/***/ }),

/***/ "./resources/js/plugins.js":
/*!*********************************!*\
  !*** ./resources/js/plugins.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Place any jQuery/helper plugins in here.
 */
$(function () {
  /**
   * Disable submit inputs in the given form
   *
   * @param form
   */
  function disableSubmitButtons(form) {
    form.find('input[type="submit"]').attr('disabled', true);
    form.find('button[type="submit"]').attr('disabled', true);
  }
  /**
   * Enable the submit inputs in a given form
   *
   * @param form
   */


  function enableSubmitButtons(form) {
    form.find('input[type="submit"]').removeAttr('disabled');
    form.find('button[type="submit"]').removeAttr('disabled');
  }
  /**
   * Disable all submit buttons once clicked
   */


  $('form').submit(function () {
    disableSubmitButtons($(this));
    return true;
  });
  /**
   * Add a confirmation to a delete button/form
   */

  $('body').on('submit', 'form[name=delete-item]', function (e) {
    var _this = this;

    e.preventDefault();
    Swal.fire({
      title: 'Are you sure you want to delete this item?',
      showCancelButton: true,
      confirmButtonText: 'Confirm Delete',
      cancelButtonText: 'Cancel',
      icon: 'warning'
    }).then(function (result) {
      if (result.value) {
        _this.submit();
      } else {
        enableSubmitButtons($(_this));
      }
    });
  }).on('click', 'a[name=confirm-item]', function (e) {
    var _this2 = this;

    /**
     * Add an 'are you sure' pop-up to any button/link
     */
    e.preventDefault();
    Swal.fire({
      title: 'Are you sure you want to do this?',
      showCancelButton: true,
      confirmButtonText: 'Continue',
      cancelButtonText: 'Cancel',
      icon: 'info'
    }).then(function (result) {
      result.value && window.location.assign($(_this2).attr('href'));
    });
  }); // Remember tab on page load

  $('a[data-toggle="tab"], a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
    var hash = $(e.target).attr('href');

    if (history.pushState) {
      history.pushState(null, null, hash);
    } else {
      location.hash = hash;
    }
  });
  var hash = window.location.hash;

  if (hash) {
    $('.nav-link[href="' + hash + '"]').tab('show');
  }
});

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/js/backend/app.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/Rappa/Documents/Programming/Local/GitHub/Larave5LargeScaleBP/resources/js/backend/app.js */"./resources/js/backend/app.js");


/***/ })

},[[1,"/js/manifest","/js/vendor"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQGNvcmV1aS9jb3JldWkvZGlzdC9qcy9jb3JldWkuZXNtLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2NvbnRhaW5zLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2dldEJvcmRlcnMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9kb20tdXRpbHMvZ2V0Qm91bmRpbmdDbGllbnRSZWN0LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2dldENsaXBwaW5nUmVjdC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL2RvbS11dGlscy9nZXRDb21wb3NpdGVSZWN0LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2dldENvbXB1dGVkU3R5bGUuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9kb20tdXRpbHMvZ2V0RGVjb3JhdGlvbnMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9kb20tdXRpbHMvZ2V0RG9jdW1lbnRFbGVtZW50LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2dldERvY3VtZW50UmVjdC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL2RvbS11dGlscy9nZXRIVE1MRWxlbWVudFNjcm9sbC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL2RvbS11dGlscy9nZXRMYXlvdXRSZWN0LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2dldE5vZGVOYW1lLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2dldE5vZGVTY3JvbGwuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9kb20tdXRpbHMvZ2V0T2Zmc2V0UGFyZW50LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2dldFBhcmVudE5vZGUuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9kb20tdXRpbHMvZ2V0U2Nyb2xsUGFyZW50LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2dldFZpZXdwb3J0UmVjdC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL2RvbS11dGlscy9nZXRXaW5kb3cuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9kb20tdXRpbHMvZ2V0V2luZG93U2Nyb2xsLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvZG9tLXV0aWxzL2dldFdpbmRvd1Njcm9sbEJhclguanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9kb20tdXRpbHMvaW5zdGFuY2VPZi5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL2RvbS11dGlscy9pc1Njcm9sbFBhcmVudC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL2RvbS11dGlscy9pc1RhYmxlRWxlbWVudC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL2RvbS11dGlscy9saXN0U2Nyb2xsUGFyZW50cy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL2VudW1zLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvaW5kZXguanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9tb2RpZmllcnMvYXBwbHlTdHlsZXMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9tb2RpZmllcnMvYXJyb3cuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9tb2RpZmllcnMvY29tcHV0ZVN0eWxlcy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL21vZGlmaWVycy9ldmVudExpc3RlbmVycy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL21vZGlmaWVycy9mbGlwLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvbW9kaWZpZXJzL2hpZGUuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9tb2RpZmllcnMvb2Zmc2V0LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvbW9kaWZpZXJzL3BvcHBlck9mZnNldHMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi9tb2RpZmllcnMvcHJldmVudE92ZXJmbG93LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvcG9wcGVyLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvdXRpbHMvY29tcHV0ZUF1dG9QbGFjZW1lbnQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi91dGlscy9jb21wdXRlT2Zmc2V0cy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL3V0aWxzL2RlYm91bmNlLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvdXRpbHMvZGV0ZWN0T3ZlcmZsb3cuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi91dGlscy9leHBhbmRUb0hhc2hNYXAuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi91dGlscy9mb3JtYXQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi91dGlscy9nZXRBbHRBeGlzLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvdXRpbHMvZ2V0QmFzZVBsYWNlbWVudC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL3V0aWxzL2dldEZyZXNoU2lkZU9iamVjdC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL3V0aWxzL2dldE1haW5BeGlzRnJvbVBsYWNlbWVudC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL3V0aWxzL2dldE9wcG9zaXRlUGxhY2VtZW50LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvdXRpbHMvZ2V0T3Bwb3NpdGVWYXJpYXRpb25QbGFjZW1lbnQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi91dGlscy9nZXRWYXJpYXRpb24uanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi91dGlscy9tZXJnZUJ5TmFtZS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL3V0aWxzL21lcmdlUGFkZGluZ09iamVjdC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL3V0aWxzL29yZGVyTW9kaWZpZXJzLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvdXRpbHMvcmVjdFRvQ2xpZW50UmVjdC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvQHBvcHBlcmpzL2NvcmUvbGliL3V0aWxzL3VuaXF1ZUJ5LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9AcG9wcGVyanMvY29yZS9saWIvdXRpbHMvdmFsaWRhdGVNb2RpZmllcnMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL0Bwb3BwZXJqcy9jb3JlL2xpYi91dGlscy93aXRoaW4uanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL3BlcmZlY3Qtc2Nyb2xsYmFyL2Rpc3QvcGVyZmVjdC1zY3JvbGxiYXIuZXNtLmpzIiwid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9iYWNrZW5kL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcGx1Z2lucy5qcyJdLCJuYW1lcyI6WyJ3aW5kb3ciLCIkIiwialF1ZXJ5IiwicmVxdWlyZSIsIlN3YWwiLCJkaXNhYmxlU3VibWl0QnV0dG9ucyIsImZvcm0iLCJmaW5kIiwiYXR0ciIsImVuYWJsZVN1Ym1pdEJ1dHRvbnMiLCJyZW1vdmVBdHRyIiwic3VibWl0Iiwib24iLCJlIiwicHJldmVudERlZmF1bHQiLCJmaXJlIiwidGl0bGUiLCJzaG93Q2FuY2VsQnV0dG9uIiwiY29uZmlybUJ1dHRvblRleHQiLCJjYW5jZWxCdXR0b25UZXh0IiwiaWNvbiIsInRoZW4iLCJyZXN1bHQiLCJ2YWx1ZSIsImxvY2F0aW9uIiwiYXNzaWduIiwiaGFzaCIsInRhcmdldCIsImhpc3RvcnkiLCJwdXNoU3RhdGUiLCJ0YWIiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUM4QztBQUNHOztBQUVqRDtBQUNBLGlCQUFpQixrQkFBa0I7QUFDbkM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTCxHQUFHO0FBQ0g7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0EsaUJBQWlCLHNCQUFzQjtBQUN2Qzs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1AsS0FBSztBQUNMO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHFDQUFxQzs7QUFFckM7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsV0FBVztBQUNYO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7OztBQUdIO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLHlEQUF5RDs7QUFFekQ7QUFDQTtBQUNBLEdBQUc7OztBQUdIO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7O0FBR0g7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7OztBQUdIO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSw4Q0FBOEM7O0FBRTlDO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0EsQ0FBQzs7QUFFRDs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTs7QUFFQTtBQUNBLENBQUM7O0FBRUQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsdUJBQXVCOztBQUV2QjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBLG1DQUFtQywyQkFBMkI7QUFDOUQsc0NBQXNDLEtBQUs7QUFDM0M7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSzs7O0FBR0w7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBLDRDQUE0QyxTQUFTO0FBQ3JEOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLDREQUE0RDs7QUFFNUQ7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSw2REFBNkQ7QUFDN0Q7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTCxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQLEtBQUs7OztBQUdMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVCxPQUFPO0FBQ1A7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsNEJBQTRCOztBQUU1Qiw4Q0FBOEM7O0FBRTlDO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBLEdBQUc7OztBQUdIOztBQUVBO0FBQ0E7QUFDQSw2Q0FBNkM7QUFDN0M7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsZ0RBQWdEOztBQUVoRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTCxpQ0FBaUM7O0FBRWpDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQSxtREFBbUQ7O0FBRW5EO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQSwrQ0FBK0M7O0FBRS9DO0FBQ0E7QUFDQSxLQUFLLEVBQUU7O0FBRVA7QUFDQTtBQUNBLEtBQUssRUFBRTs7QUFFUDtBQUNBO0FBQ0EsS0FBSyxFQUFFOztBQUVQO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLLEVBQUU7O0FBRVA7QUFDQTtBQUNBLEtBQUs7O0FBRUw7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMLEdBQUc7QUFDSDs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0EsQ0FBQzs7QUFFRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7O0FBR0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxHQUFHO0FBQ0g7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSztBQUNMLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBLEdBQUc7QUFDSDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQSxHQUFHO0FBQ0g7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7OztBQUdIOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxDQUFDO0FBQ0Q7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxzQ0FBc0M7O0FBRXRDO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxpQ0FBaUM7O0FBRWpDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0EsR0FBRzs7O0FBR0g7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0EsNkNBQTZDO0FBQzdDO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLHlCQUF5Qjs7QUFFekI7QUFDQTtBQUNBLEtBQUs7OztBQUdMO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQLEtBQUs7O0FBRUw7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQSxPQUFPOztBQUVQO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDs7QUFFQTtBQUNBO0FBQ0E7O0FBRUEscUJBQXFCLHVCQUF1QjtBQUM1QztBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxXQUFXO0FBQ1gsU0FBUztBQUNULE9BQU87QUFDUDtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBOztBQUVBLGtEQUFrRDs7QUFFbEQ7QUFDQSxnREFBZ0Q7QUFDaEQ7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBOztBQUVBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQSxpREFBaUQ7O0FBRWpEOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBOztBQUVBLHlDQUF5QyxTQUFTO0FBQ2xEO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7O0FBR0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHVKQUF1Sjs7QUFFdko7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFdBQVc7QUFDWDtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsV0FBVztBQUNYOztBQUVBO0FBQ0E7QUFDQSxXQUFXO0FBQ1g7QUFDQTtBQUNBO0FBQ0EsYUFBYTtBQUNiOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxXQUFXOztBQUVYO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGVBQWU7QUFDZjtBQUNBLGFBQWE7QUFDYixXQUFXO0FBQ1g7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBYTs7QUFFYjtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1AsS0FBSztBQUNMLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1AsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsNENBQTRDLFNBQVM7QUFDckQ7QUFDQTtBQUNBO0FBQ0E7QUFDQSxPQUFPOztBQUVQO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxHQUFHOzs7QUFHSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0EsT0FBTzs7QUFFUDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBOztBQUVBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBLHFCQUFxQix3QkFBd0I7QUFDN0M7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0EsNkNBQTZDO0FBQzdDLDJDQUEyQzs7QUFFM0M7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxXQUFXO0FBQ1g7QUFDQTs7QUFFQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0E7O0FBRUEsaUVBQWlFLHlHQUF5Rzs7QUFFMUs7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBLEdBQUc7QUFDSCxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsMkJBQTJCOztBQUUzQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBLEdBQUc7OztBQUdIOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSzs7O0FBR0w7QUFDQSxpQkFBaUIsMkRBQVk7QUFDN0I7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0EsT0FBTztBQUNQLGtEQUFrRDs7QUFFbEQ7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTs7QUFFQSxxQkFBcUIsbUVBQVk7QUFDakMsS0FBSztBQUNMO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLE9BQU87QUFDUDs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0EsNERBQTREO0FBQzVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EscUNBQXFDOztBQUVyQztBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBLEtBQUs7QUFDTDtBQUNBLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQSx1REFBdUQsMkVBQTJFO0FBQ2xJO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUCxNQUFNOztBQUVOO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsMkNBQTJDO0FBQzNDLEdBQUc7QUFDSDs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBLHlDQUF5QyxTQUFTO0FBQ2xEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7OztBQUdBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLFNBQVM7QUFDVDs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSzs7O0FBR0w7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7O0FBR0g7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxLQUFLOztBQUVMO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1AsS0FBSzs7QUFFTDtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0EsNkNBQTZDO0FBQzdDO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQSw4Q0FBOEM7O0FBRTlDO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBLE9BQU87QUFDUCxLQUFLO0FBQ0w7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQLEtBQUs7QUFDTDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBOztBQUVBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLE9BQU87O0FBRVA7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxPQUFPLEVBQUU7O0FBRVQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU8sRUFBRTs7QUFFVDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLLEVBQUU7O0FBRVA7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUssRUFBRTs7QUFFUDs7QUFFQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBLG1FQUFtRSxzR0FBc0c7O0FBRXpLO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMLEdBQUc7QUFDSDs7QUFFQTtBQUNBLGlEQUFpRDs7QUFFakQ7QUFDQTs7QUFFQTtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxxSUFBcUk7O0FBRXJJO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsR0FBRyxFQUFFOztBQUVMLHNDQUFzQyxTQUFTO0FBQy9DO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDs7QUFFQSx3Q0FBd0MsU0FBUztBQUNqRDs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLGVBQWUsMkRBQVk7QUFDM0I7QUFDQSxLQUFLOzs7QUFHTDtBQUNBO0FBQ0E7QUFDQTtBQUNBLHdCQUF3Qjs7QUFFeEI7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0EsR0FBRzs7O0FBR0g7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBLHNEQUFzRDs7O0FBR3REOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLHFCQUFxQixtRUFBWTtBQUNqQywyQ0FBMkM7QUFDM0M7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLFNBQVM7QUFDVDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQSw0Q0FBNEM7QUFDNUM7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxPQUFPOzs7QUFHUDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSwyQ0FBMkM7QUFDM0MsR0FBRztBQUNILDZDQUE2QyxhQUFhLEdBQUcsV0FBVztBQUN4RTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBLHVEQUF1RCx5RUFBeUU7QUFDaEk7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVCxPQUFPO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBLEtBQUs7O0FBRUw7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBLG9EQUFvRCxrQkFBa0I7QUFDdEU7QUFDQTtBQUNBLE9BQU87QUFDUCxLQUFLO0FBQ0w7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLOztBQUVMO0FBQ0E7QUFDQTs7QUFFQSw0REFBNEQsZ0dBQWdHOztBQUU1SjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0EsT0FBTztBQUNQO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEtBQUs7QUFDTDs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsZ0RBQWdELHNCQUFzQjtBQUN0RTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7O0FBRUQsb0RBQW9ELDBCQUEwQjtBQUM5RTtBQUNBLENBQUM7O0FBRUQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0EsbUNBQW1DOztBQUVuQzs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQSxPQUFPO0FBQ1A7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0EsQ0FBQzs7QUFFRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDs7QUFFQTs7QUFFQTtBQUNBLEdBQUc7OztBQUdIOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLEtBQUs7QUFDTDtBQUNBLEtBQUs7QUFDTDtBQUNBLEtBQUs7QUFDTDs7QUFFQTtBQUNBLEtBQUs7QUFDTDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0EsNkNBQTZDLGdFQUFnRTs7QUFFN0c7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQSxzQ0FBc0MsS0FBSztBQUMzQzs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBLEtBQUs7O0FBRUw7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUyxFQUFFOztBQUVYO0FBQ0E7QUFDQTtBQUNBLFdBQVc7QUFDWCxTQUFTO0FBQ1QsT0FBTztBQUNQOztBQUVBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0EsS0FBSztBQUNMLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0EsQ0FBQztBQUNEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSCxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsZUFBZSx5REFBZ0I7QUFDL0I7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBOztBQUVBO0FBQ0EsR0FBRzs7O0FBR0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBLE9BQU87QUFDUCxLQUFLO0FBQ0w7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTtBQUNBLEtBQUs7QUFDTDs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQSw0REFBNEQ7QUFDNUQ7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxpQkFBaUI7QUFDakI7O0FBRUE7QUFDQTtBQUNBLE9BQU87O0FBRVAsS0FBSzs7QUFFTDtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQSxLQUFLOzs7QUFHTDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDs7QUFFQSwyREFBMkQ7QUFDM0Q7O0FBRUE7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBLHFCQUFxQix5REFBZ0I7QUFDckM7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EscUJBQXFCOztBQUVyQixVQUFVLGlDQUFpQztBQUMzQztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQSxPQUFPO0FBQ1A7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxtREFBbUQ7O0FBRW5EO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQSxLQUFLO0FBQ0w7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBO0FBQ0EsU0FBUzs7QUFFVDtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMLEdBQUc7QUFDSDs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSCxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOzs7QUFHSDs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7O0FBRUE7QUFDQTtBQUNBLEtBQUs7O0FBRUw7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0EsQ0FBQztBQUNEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQSxHQUFHOzs7QUFHSDs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBOztBQUVBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0EsNERBQTRELCtHQUErRztBQUMzSztBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSztBQUNMLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0EsQ0FBQzs7QUFFRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVzSjtBQUN0Sjs7Ozs7Ozs7Ozs7OztBQzFrTUE7QUFBQTtBQUFlO0FBQ2Y7QUFDQSx3RUFBd0U7O0FBRXhFO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxTQUFTOzs7QUFHVDtBQUNBLE9BQU87QUFDUCxLQUFLOzs7QUFHTDtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ3RCQTtBQUFBO0FBQUE7QUFBQTtBQUFxRDtBQUNMOztBQUVoRDtBQUNBO0FBQ0E7O0FBRWU7QUFDZixzQkFBc0Isb0VBQWEsWUFBWSxvRUFBZ0I7QUFDL0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQzs7Ozs7Ozs7Ozs7O0FDZkE7QUFBQTtBQUFlO0FBQ2Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ1pBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBdUM7QUFDWTtBQUNBO0FBQ0k7QUFDSjtBQUNNO0FBQ0o7QUFDTTtBQUNJO0FBQ2Q7QUFDWjtBQUN1Qjs7QUFFNUQ7QUFDQSw0QkFBNEIsa0RBQVEsR0FBRywyRUFBZ0IsQ0FBQyxtRUFBZSxhQUFhLG9FQUFhLG1CQUFtQix5RUFBcUIsbUJBQW1CLDJFQUFnQixDQUFDLG1FQUFlLENBQUMsc0VBQWtCO0FBQy9NLENBQUM7QUFDRDtBQUNBOzs7QUFHQTtBQUNBLHdCQUF3QixxRUFBaUI7QUFDekMsd0RBQXdELG9FQUFnQjtBQUN4RSw0Q0FBNEMsb0VBQWEsWUFBWSxtRUFBZTs7QUFFcEYsT0FBTyxnRUFBUztBQUNoQjtBQUNBLEdBQUc7OztBQUdIO0FBQ0EsV0FBVyxnRUFBUyxvQkFBb0IsNkRBQVE7QUFDaEQsR0FBRztBQUNILENBQUM7QUFDRDs7O0FBR2U7QUFDZjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esc0JBQXNCLGtFQUFjLENBQUMsb0VBQWEsb0NBQW9DLHNFQUFrQjtBQUN4RztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUN2REE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQStEO0FBQ2hCO0FBQ0o7QUFDSztBQUNXO0FBQ0Y7QUFDUjtBQUNqRDs7QUFFZTtBQUNmO0FBQ0E7QUFDQTs7QUFFQSx3QkFBd0Isc0VBQWtCO0FBQzFDLGFBQWEseUVBQXFCO0FBQ2xDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxRQUFRLCtEQUFXO0FBQ25CLElBQUksa0VBQWM7QUFDbEIsZUFBZSxpRUFBYTtBQUM1Qjs7QUFFQSxRQUFRLG9FQUFhO0FBQ3JCLGdCQUFnQix5RUFBcUI7QUFDckM7QUFDQTtBQUNBLEtBQUs7QUFDTCxrQkFBa0IsdUVBQW1CO0FBQ3JDO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQzs7Ozs7Ozs7Ozs7O0FDOUNBO0FBQUE7QUFBQTtBQUF1QztBQUN4QjtBQUNmLFNBQVMsNkRBQVM7QUFDbEIsQzs7Ozs7Ozs7Ozs7O0FDSEE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQXlDO0FBQ0U7QUFDSjtBQUNvQjs7QUFFNUM7QUFDZixZQUFZLDZEQUFTO0FBQ3JCLGdCQUFnQiw4REFBVTtBQUMxQixlQUFlLCtEQUFXO0FBQzFCLHNCQUFzQix1RUFBbUI7QUFDekM7QUFDQSxnREFBZ0Q7QUFDaEQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUNoQ0E7QUFBQTtBQUFBO0FBQTRDO0FBQzdCO0FBQ2Y7QUFDQSxVQUFVLGdFQUFTO0FBQ25CLEM7Ozs7Ozs7Ozs7OztBQ0pBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFxRDtBQUNkO0FBQ2tCO0FBQ047QUFDcEM7QUFDZixZQUFZLDZEQUFTO0FBQ3JCLGtCQUFrQixtRUFBZTtBQUNqQyxxQkFBcUIsb0VBQWdCLENBQUMsc0VBQWtCO0FBQ3hEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUNiQTtBQUFBO0FBQWU7QUFDZjtBQUNBO0FBQ0E7QUFDQTtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ0xBO0FBQUE7QUFBQTtBQUNBO0FBQ2U7QUFDZjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUNUQTtBQUFBO0FBQWU7QUFDZjtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ0ZBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFtRDtBQUNaO0FBQ1M7QUFDYTtBQUM5QztBQUNmLGVBQWUsNkRBQVMsV0FBVyxvRUFBYTtBQUNoRCxXQUFXLG1FQUFlO0FBQzFCLEdBQUc7QUFDSCxXQUFXLHdFQUFvQjtBQUMvQjtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ1ZBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQXVDO0FBQ0k7QUFDVTtBQUNMO0FBQ0M7O0FBRWpEO0FBQ0EsT0FBTyxvRUFBYTtBQUNwQixFQUFFLG9FQUFnQjtBQUNsQjtBQUNBOztBQUVBO0FBQ0E7O0FBRWU7QUFDZixlQUFlLDZEQUFTO0FBQ3hCLGtEQUFrRDs7QUFFbEQseUJBQXlCLGtFQUFjO0FBQ3ZDO0FBQ0E7O0FBRUEsc0JBQXNCLCtEQUFXLDZCQUE2QixvRUFBZ0I7QUFDOUU7QUFDQTs7QUFFQTtBQUNBLEM7Ozs7Ozs7Ozs7OztBQzVCQTtBQUFBO0FBQUE7QUFBQTtBQUEyQztBQUNjO0FBQzFDO0FBQ2YsTUFBTSwrREFBVztBQUNqQjtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUksc0VBQWtCOztBQUV0QjtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ2hCQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBK0M7QUFDRTtBQUNOO0FBQ0s7QUFDakM7QUFDZiw0Q0FBNEMsK0RBQVc7QUFDdkQ7QUFDQTtBQUNBOztBQUVBLE1BQU0sb0VBQWEsVUFBVSxrRUFBYztBQUMzQztBQUNBOztBQUVBLHlCQUF5QixpRUFBYTtBQUN0QyxDOzs7Ozs7Ozs7Ozs7QUNmQTtBQUFBO0FBQUE7QUFBdUM7QUFDeEI7QUFDZixZQUFZLDZEQUFTO0FBQ3JCO0FBQ0E7QUFDQSwrQkFBK0I7QUFDL0I7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUNwQkE7QUFBQTtBQUFBLGtCQUFrQixTQUFTLGlCQUFpQjs7QUFFNUMsNkRBQTZEO0FBQzlDO0FBQ2Y7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUNWQTtBQUFBO0FBQUE7QUFBdUM7QUFDeEI7QUFDZixZQUFZLDZEQUFTO0FBQ3JCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ1RBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBK0Q7QUFDTjtBQUNOO0FBQ3BDO0FBQ2Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTLHlFQUFxQixDQUFDLHNFQUFrQixrQkFBa0IsbUVBQWU7QUFDbEYsQzs7Ozs7Ozs7Ozs7O0FDWkE7QUFBQTtBQUFBO0FBQUE7QUFBdUM7QUFDdkM7QUFDQSxXQUFXOztBQUVYO0FBQ0EsbUJBQW1CLDZEQUFTO0FBQzVCO0FBQ0E7QUFDQTtBQUNBLGVBQWU7OztBQUdmO0FBQ0EsbUJBQW1CLDZEQUFTO0FBQzVCO0FBQ0E7Ozs7Ozs7Ozs7Ozs7O0FDZkE7QUFBQTtBQUFBO0FBQXFEO0FBQ3RDO0FBQ2Y7QUFDQSwwQkFBMEIsb0VBQWdCO0FBQzFDO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ1RBO0FBQUE7QUFBQTtBQUEyQztBQUM1QjtBQUNmLHVDQUF1QywrREFBVztBQUNsRCxDOzs7Ozs7Ozs7Ozs7QUNIQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFtRDtBQUNKO0FBQ0o7QUFDSjtBQUNVO0FBQ2xDO0FBQ2Y7QUFDQTtBQUNBOztBQUVBLHFCQUFxQixtRUFBZTtBQUNwQyxlQUFlLCtEQUFXO0FBQzFCLFlBQVksNkRBQVM7QUFDckIsK0RBQStELGtFQUFjO0FBQzdFO0FBQ0E7QUFDQSx1Q0FBdUMsaUVBQWE7QUFDcEQsQzs7Ozs7Ozs7Ozs7O0FDakJBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQU87QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDUDtBQUNBLENBQUM7QUFDTTtBQUNQO0FBQ0EsQ0FBQyxNQUFNOztBQUVBO0FBQ0E7QUFDQSw0QkFBNEI7O0FBRTVCO0FBQ0E7QUFDQSw0QkFBNEI7O0FBRTVCO0FBQ0E7QUFDQTtBQUNBLGdIOzs7Ozs7Ozs7Ozs7QUM5QlA7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBK0Q7QUFDTjtBQUNRO0FBQ0o7QUFDRTtBQUNSO0FBQ1o7QUFDa0I7QUFDbEI7QUFDZ0I7QUFDVjtBQUNLO0FBQ3BCO0FBQ1A7QUFDM0I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxxRUFBcUUsYUFBYTtBQUNsRjtBQUNBOztBQUVBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRU87QUFDUDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLCtCQUErQixxQkFBcUI7QUFDcEQsdUJBQXVCO0FBQ3ZCO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUCxvQkFBb0I7QUFDcEI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHdDQUF3QyxvQkFBb0IsbUJBQW1CO0FBQy9FO0FBQ0EscUJBQXFCLDJFQUFTLGNBQWMsK0VBQWlCLHlDQUF5QywrRUFBaUI7QUFDdkgsa0JBQWtCLCtFQUFpQjtBQUNuQyxVQUFVO0FBQ1Y7O0FBRUEsK0JBQStCLHdFQUFjLENBQUMsc0VBQVcsd0RBQXdEOztBQUVqSDtBQUNBO0FBQ0EsU0FBUyxFQUFFO0FBQ1g7O0FBRUEsWUFBWSxJQUFxQztBQUNqRCwwQkFBMEIsa0VBQVE7QUFDbEM7QUFDQTtBQUNBLFdBQVc7QUFDWCxVQUFVLDJFQUFpQjs7QUFFM0IsY0FBYywwRUFBZ0IsOEJBQThCLCtDQUFJO0FBQ2hFO0FBQ0E7QUFDQTtBQUNBLGFBQWE7O0FBRWI7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsa0NBQWtDLDhFQUFnQjtBQUNsRDtBQUNBO0FBQ0E7QUFDQSx3REFBd0Q7QUFDeEQ7OztBQUdBO0FBQ0E7QUFDQSxXQUFXO0FBQ1g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSw0Q0FBNEM7QUFDNUM7O0FBRUE7QUFDQSxjQUFjLElBQXFDO0FBQ25EO0FBQ0E7O0FBRUE7QUFDQSxTQUFTOzs7QUFHVDtBQUNBLHFCQUFxQiw4RUFBZ0IsWUFBWSw2RUFBZTtBQUNoRSxrQkFBa0IsMkVBQWE7QUFDL0IsVUFBVTtBQUNWO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0Esa0RBQWtEO0FBQ2xEO0FBQ0E7QUFDQSw2Q0FBNkMsS0FBSzs7QUFFbEQ7QUFDQSxzRUFBc0U7QUFDdEUsU0FBUztBQUNUOztBQUVBLDJCQUEyQix1Q0FBdUM7QUFDbEUsY0FBYyxJQUFxQztBQUNuRDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsK0RBQStEO0FBQy9EOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQSxjQUFjLGtFQUFRO0FBQ3RCO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVCxPQUFPO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLFVBQVUsSUFBcUM7QUFDL0M7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSyxFQUFFO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxtREFBbUQ7QUFDbkQ7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsV0FBVzs7QUFFWDs7QUFFQTtBQUNBO0FBQ0EsT0FBTztBQUNQOztBQUVBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNPLGtEOzs7Ozs7Ozs7Ozs7QUMvUFA7QUFBQTtBQUFBO0FBQXNEO0FBQ0s7QUFDM0Q7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHVDQUF1Qzs7QUFFdkMsU0FBUyw4RUFBYSxjQUFjLHlFQUFXO0FBQy9DO0FBQ0EsS0FBSztBQUNMO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQSxLQUFLO0FBQ0wsR0FBRztBQUNIOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esc0hBQXNIOztBQUV0SDtBQUNBO0FBQ0E7QUFDQSxPQUFPLElBQUksRUFBRTs7QUFFYixXQUFXLDhFQUFhLGNBQWMseUVBQVc7QUFDakQ7QUFDQSxPQUFPO0FBQ1A7QUFDQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQLEtBQUs7QUFDTDtBQUNBLENBQUM7OztBQUdjO0FBQ2Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQyxFOzs7Ozs7Ozs7Ozs7QUNyRkQ7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUE0RDtBQUNGO0FBQ1Y7QUFDYztBQUNjO0FBQ3BDO0FBQ3dCO0FBQ047QUFDYTtBQUNaOztBQUUzRDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esc0JBQXNCLDBFQUFnQjtBQUN0QyxhQUFhLGtGQUF3QjtBQUNyQyxvQkFBb0IsOENBQUksRUFBRSwrQ0FBSztBQUMvQjs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxrQkFBa0IsMkVBQWE7QUFDL0IsK0JBQStCLDZDQUFHLEdBQUcsOENBQUk7QUFDekMsK0JBQStCLGdEQUFNLEdBQUcsK0NBQUs7QUFDN0M7QUFDQTtBQUNBLDBCQUEwQiw2RUFBZTtBQUN6QztBQUNBLHNEQUFzRDtBQUN0RDs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxlQUFlLGdFQUFNLG1CQUFtQjs7QUFFeEM7QUFDQSx5REFBeUQ7QUFDekQ7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsR0FBRzs7O0FBR0g7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxNQUFNLElBQXFDO0FBQzNDLFNBQVMsOEVBQWE7QUFDdEI7QUFDQTtBQUNBOztBQUVBLE9BQU8sc0VBQVE7QUFDZixRQUFRLElBQXFDO0FBQzdDO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsYUFBYSw0RUFBa0IseUNBQXlDLHlFQUFlLFVBQVUsd0RBQWM7QUFDL0c7QUFDQSxDQUFDOzs7QUFHYztBQUNmO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQyxFOzs7Ozs7Ozs7Ozs7QUNsR0Q7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUF1RDtBQUNPO0FBQ1o7QUFDa0I7QUFDSjtBQUNKOztBQUU1RDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsRUFBRTtBQUNGO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRU87QUFDUDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLGNBQWMsOENBQUk7QUFDbEIsY0FBYyw2Q0FBRztBQUNqQjs7QUFFQTtBQUNBLHVCQUF1Qiw2RUFBZTs7QUFFdEMseUJBQXlCLHVFQUFTO0FBQ2xDLHFCQUFxQixnRkFBa0I7QUFDdkMsS0FBSzs7QUFFTCxnREFBZ0Q7OztBQUdoRCxzQkFBc0IsNkNBQUc7QUFDekIsY0FBYyxnREFBTTtBQUNwQjtBQUNBO0FBQ0E7O0FBRUEsc0JBQXNCLDhDQUFJO0FBQzFCLGNBQWMsK0NBQUs7QUFDbkI7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTs7QUFFQSwyQkFBMkIsb0NBQW9DO0FBQy9EOztBQUVBLHlCQUF5QixxQ0FBcUM7QUFDOUQ7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsTUFBTSxJQUFxQztBQUMzQyw2QkFBNkIsOEVBQWdCOztBQUU3QztBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLGVBQWUsMEVBQWdCO0FBQy9CO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0EsMENBQTBDLHlCQUF5Qiw4QkFBOEI7QUFDakc7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0EseUNBQXlDLHdCQUF3Qiw4QkFBOEI7QUFDL0Y7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBLDRDQUE0QztBQUM1QztBQUNBLEdBQUc7QUFDSCxDQUFDOzs7QUFHYztBQUNmO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLEU7Ozs7Ozs7Ozs7OztBQ3pJRDtBQUFBO0FBQWtEOztBQUVsRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGVBQWUsdUVBQVM7QUFDeEI7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7OztBQUdjO0FBQ2Y7QUFDQTtBQUNBO0FBQ0Esc0JBQXNCO0FBQ3RCO0FBQ0E7QUFDQSxDQUFDLEU7Ozs7Ozs7Ozs7OztBQ2hERDtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQW9FO0FBQ1I7QUFDMEI7QUFDOUI7QUFDWTtBQUNBO0FBQ2hCOztBQUVwRDtBQUNBLE1BQU0sMEVBQWdCLGdCQUFnQiw4Q0FBSTtBQUMxQztBQUNBOztBQUVBLDBCQUEwQiw4RUFBb0I7QUFDOUMsVUFBVSx1RkFBNkIsZ0NBQWdDLHVGQUE2QjtBQUNwRzs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxzQkFBc0IsMEVBQWdCO0FBQ3RDO0FBQ0EsaUdBQWlHLDhFQUFvQjtBQUNySDtBQUNBLHNCQUFzQiwwRUFBZ0IsZ0JBQWdCLDhDQUFJLEdBQUcsOEVBQW9CO0FBQ2pGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTCxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxpQkFBaUIsdUJBQXVCO0FBQ3hDOztBQUVBLHlCQUF5QiwwRUFBZ0I7O0FBRXpDLDJCQUEyQixzRUFBWSxnQkFBZ0IsK0NBQUs7QUFDNUQsc0JBQXNCLDZDQUFHLEVBQUUsZ0RBQU07QUFDakM7QUFDQSxtQkFBbUIsd0VBQWM7QUFDakM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTCw0REFBNEQsK0NBQUssR0FBRyw4Q0FBSSxzQkFBc0IsZ0RBQU0sR0FBRyw2Q0FBRzs7QUFFMUc7QUFDQSwwQkFBMEIsOEVBQW9CO0FBQzlDOztBQUVBLDJCQUEyQiw4RUFBb0I7QUFDL0M7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxXQUFXO0FBQ1g7QUFDQSxPQUFPOztBQUVQO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsaUNBQWlDLFFBQVE7QUFDekM7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDOzs7QUFHYztBQUNmO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLEU7Ozs7Ozs7Ozs7OztBQ2xKRDtBQUFBO0FBQUE7QUFBdUQ7QUFDQzs7QUFFeEQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxVQUFVLDZDQUFHLEVBQUUsK0NBQUssRUFBRSxnREFBTSxFQUFFLDhDQUFJO0FBQ2xDO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLDBCQUEwQix3RUFBYztBQUN4QztBQUNBLEdBQUc7QUFDSCwwQkFBMEIsd0VBQWM7QUFDeEM7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSw0Q0FBNEM7QUFDNUM7QUFDQTtBQUNBLEdBQUc7QUFDSCxDQUFDOzs7QUFHYztBQUNmO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLEU7Ozs7Ozs7Ozs7OztBQzVERDtBQUFBO0FBQUE7QUFBQTtBQUE0RDtBQUNEO0FBQ3BEO0FBQ1Asc0JBQXNCLDBFQUFnQjtBQUN0Qyx3QkFBd0IsOENBQUksRUFBRSw2Q0FBRzs7QUFFakMsbUVBQW1FO0FBQ25FO0FBQ0EsR0FBRztBQUNIO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLFVBQVUsOENBQUksRUFBRSwrQ0FBSztBQUNyQjtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQWEsb0RBQVU7QUFDdkI7QUFDQTtBQUNBLEdBQUcsSUFBSTtBQUNQO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLENBQUM7OztBQUdjO0FBQ2Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUMsRTs7Ozs7Ozs7Ozs7O0FDcEREO0FBQUE7QUFBd0Q7O0FBRXhEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsOEJBQThCLHdFQUFjO0FBQzVDO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNILENBQUM7OztBQUdjO0FBQ2Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUMsRTs7Ozs7Ozs7Ozs7O0FDeEJEO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBOEQ7QUFDRjtBQUNnQjtBQUM1QjtBQUNSO0FBQ2tCO0FBQ0k7QUFDTjtBQUNKO0FBQ1k7O0FBRWhFO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsaUJBQWlCLHdFQUFjO0FBQy9CO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNILHNCQUFzQiwwRUFBZ0I7QUFDdEMsa0JBQWtCLHNFQUFZO0FBQzlCO0FBQ0EsaUJBQWlCLGtGQUF3QjtBQUN6QyxnQkFBZ0Isb0VBQVU7QUFDMUI7QUFDQTtBQUNBO0FBQ0EsNEZBQTRGO0FBQzVGO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLHNDQUFzQyw2Q0FBRyxHQUFHLDhDQUFJO0FBQ2hELHFDQUFxQyxnREFBTSxHQUFHLCtDQUFLO0FBQ25EO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSwrQkFBK0IsK0NBQUs7QUFDcEMsK0JBQStCLCtDQUFLLDBDQUEwQztBQUM5RTs7QUFFQTtBQUNBLDZDQUE2QywyRUFBYTtBQUMxRDtBQUNBO0FBQ0E7QUFDQSx5SEFBeUgsNEVBQWtCO0FBQzNJO0FBQ0Esc0RBQXNEO0FBQ3REO0FBQ0E7QUFDQTtBQUNBOztBQUVBLG1CQUFtQixnRUFBTTtBQUN6QjtBQUNBO0FBQ0Esb0RBQW9ELDZFQUFlO0FBQ25FO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsMEJBQTBCLGdFQUFNO0FBQ2hDO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLHVDQUF1Qyw2Q0FBRyxHQUFHLDhDQUFJOztBQUVqRCxzQ0FBc0MsZ0RBQU0sR0FBRywrQ0FBSzs7QUFFcEQ7O0FBRUE7O0FBRUE7O0FBRUEsMkJBQTJCLGdFQUFNOztBQUVqQztBQUNBO0FBQ0E7O0FBRUE7QUFDQSxDQUFDOzs7QUFHYztBQUNmO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLEU7Ozs7Ozs7Ozs7OztBQ3RIRDtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBNkM7QUFDYztBQUNGO0FBQ0E7QUFDSjtBQUNWO0FBQ0o7QUFDc0I7QUFDcEI7QUFDRjtBQUNnQjtBQUN2RCx3QkFBd0Isb0VBQWMsRUFBRSxtRUFBYSxFQUFFLG1FQUFhLEVBQUUsaUVBQVcsRUFBRSw0REFBTSxFQUFFLDBEQUFJLEVBQUUscUVBQWUsRUFBRSwyREFBSyxFQUFFLDBEQUFJO0FBQzdILGdDQUFnQyxpRUFBZTtBQUMvQztBQUNBLENBQUMsRUFBRTs7Ozs7Ozs7Ozs7Ozs7QUNkSDtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBNkM7QUFDa0Q7QUFDOUM7QUFDSTs7QUFFckQsMEJBQTBCLCtCQUErQjs7QUFFekQsSUFBSSxzQkFBc0Isc0NBQXNDO0FBQ2pEO0FBQ2Y7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsaUVBQWlFLG9EQUFhO0FBQzlFLGtCQUFrQixnRUFBWTtBQUM5QixpREFBaUQsNkRBQW1CLEdBQUcsNkRBQW1CO0FBQzFGLFdBQVcsZ0VBQVk7QUFDdkIsR0FBRyxJQUFJLHdEQUFjO0FBQ3JCO0FBQ0EsR0FBRyxFQUFFOztBQUVMO0FBQ0EscUJBQXFCLGtFQUFjO0FBQ25DO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSyxFQUFFLG9FQUFnQjtBQUN2QjtBQUNBLEdBQUcsSUFBSTtBQUNQO0FBQ0E7QUFDQSxHQUFHO0FBQ0gsQzs7Ozs7Ozs7Ozs7O0FDeENBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFxRDtBQUNSO0FBQ3dCO0FBQ0Y7QUFDcEQ7QUFDZjtBQUNBO0FBQ0E7QUFDQSxrQ0FBa0Msb0VBQWdCO0FBQ2xELDhCQUE4QixnRUFBWTtBQUMxQztBQUNBO0FBQ0E7O0FBRUE7QUFDQSxTQUFTLDZDQUFHO0FBQ1o7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxTQUFTLGdEQUFNO0FBQ2Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxTQUFTLCtDQUFLO0FBQ2Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxTQUFTLDhDQUFJO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsaUNBQWlDLDRFQUF3Qjs7QUFFekQ7QUFDQTs7QUFFQTtBQUNBLFdBQVcsK0NBQUs7QUFDaEI7QUFDQTs7QUFFQSxXQUFXLDZDQUFHO0FBQ2Q7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUNyRUE7QUFBQTtBQUFlO0FBQ2Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1QsT0FBTztBQUNQOztBQUVBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUNkQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQTBFO0FBQ1o7QUFDTTtBQUNuQjtBQUNJO0FBQzBEO0FBQ3hEO0FBQ0U7QUFDTjs7QUFFcEM7QUFDZjtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxnREFBZ0QseURBQWU7QUFDL0Q7QUFDQSx3REFBd0Qsa0RBQVE7QUFDaEU7QUFDQSwwREFBMEQsZ0RBQU07QUFDaEU7QUFDQTtBQUNBO0FBQ0E7QUFDQSxzQkFBc0Isc0VBQWtCLHlDQUF5QyxtRUFBZSxVQUFVLHdEQUFjO0FBQ3hILHNDQUFzQyxnREFBTSxHQUFHLG1EQUFTLEdBQUcsZ0RBQU07QUFDakU7QUFDQTtBQUNBO0FBQ0EsMkJBQTJCLDZFQUFlLENBQUMsMEVBQVMsZ0RBQWdELGdGQUFrQjtBQUN0SCw0QkFBNEIsbUZBQXFCO0FBQ2pELHNCQUFzQixrRUFBYztBQUNwQztBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSCx5QkFBeUIsb0VBQWdCLGlCQUFpQixnQkFBZ0I7QUFDMUUsNkNBQTZDLGdEQUFNLDBDQUEwQztBQUM3Rjs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSw4Q0FBOEM7O0FBRTlDLHlCQUF5QixnREFBTTtBQUMvQjtBQUNBO0FBQ0Esc0JBQXNCLCtDQUFLLEVBQUUsZ0RBQU07QUFDbkMsa0JBQWtCLDZDQUFHLEVBQUUsZ0RBQU07QUFDN0I7QUFDQSxLQUFLO0FBQ0w7O0FBRUE7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUMvREE7QUFBQTtBQUFlO0FBQ2Y7QUFDQTtBQUNBO0FBQ0EsR0FBRyxJQUFJO0FBQ1AsQzs7Ozs7Ozs7Ozs7O0FDTEE7QUFBQTtBQUFlO0FBQ2Ysd0ZBQXdGLGFBQWE7QUFDckc7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsR0FBRztBQUNILEM7Ozs7Ozs7Ozs7OztBQ1JBO0FBQUE7QUFBZTtBQUNmO0FBQ0EsQzs7Ozs7Ozs7Ozs7O0FDRkE7QUFBQTtBQUFBO0FBQW1DO0FBQ3BCO0FBQ2Y7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUNIQTtBQUFBO0FBQWU7QUFDZjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7QUNQQTtBQUFBO0FBQWU7QUFDZjtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ0ZBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDZTtBQUNmO0FBQ0E7QUFDQSxHQUFHO0FBQ0gsQzs7Ozs7Ozs7Ozs7O0FDVkE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ2U7QUFDZjtBQUNBO0FBQ0EsR0FBRztBQUNILEM7Ozs7Ozs7Ozs7OztBQ1JBO0FBQUE7QUFBZTtBQUNmO0FBQ0EsQzs7Ozs7Ozs7Ozs7O0FDRkE7QUFBQTtBQUFlO0FBQ2Y7QUFDQTtBQUNBLHNEQUFzRCxjQUFjO0FBQ3BFLCtCQUErQixzQkFBc0I7QUFDckQsNEJBQTRCLG1CQUFtQjtBQUMvQyxLQUFLO0FBQ0w7QUFDQSxHQUFHLElBQUksRUFBRTs7QUFFVDtBQUNBO0FBQ0EsR0FBRztBQUNILEM7Ozs7Ozs7Ozs7OztBQ2JBO0FBQUE7QUFBQTtBQUF5RDtBQUMxQztBQUNmLHlCQUF5QixFQUFFLHNFQUFrQixNQUFNO0FBQ25ELEM7Ozs7Ozs7Ozs7OztBQ0hBO0FBQUE7QUFBQTtBQUE2Qzs7QUFFN0M7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRyxFQUFFOztBQUVMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTs7QUFFZTtBQUNmO0FBQ0EsMENBQTBDOztBQUUxQyxTQUFTLHdEQUFjO0FBQ3ZCO0FBQ0E7QUFDQSxLQUFLO0FBQ0wsR0FBRztBQUNILEM7Ozs7Ozs7Ozs7OztBQzNDQTtBQUFBO0FBQWU7QUFDZix5QkFBeUI7QUFDekI7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0gsQzs7Ozs7Ozs7Ozs7O0FDUEE7QUFBQTtBQUFlO0FBQ2Y7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNILEM7Ozs7Ozs7Ozs7OztBQ1ZBO0FBQUE7QUFBQTtBQUFBO0FBQWlDO0FBQ1k7QUFDN0M7QUFDQTtBQUNBO0FBQ2U7QUFDZjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsMEJBQTBCLDBEQUFNO0FBQ2hDOztBQUVBOztBQUVBO0FBQ0E7QUFDQSwwQkFBMEIsMERBQU07QUFDaEM7O0FBRUE7QUFDQSxjQUFjLHdEQUFjO0FBQzVCLDBCQUEwQiwwREFBTSwrREFBK0Qsd0RBQWM7QUFDN0c7O0FBRUE7O0FBRUE7QUFDQTtBQUNBLDBCQUEwQiwwREFBTTtBQUNoQzs7QUFFQTs7QUFFQTtBQUNBO0FBQ0EsMEJBQTBCLDBEQUFNO0FBQ2hDOztBQUVBOztBQUVBO0FBQ0E7QUFDQSwwQkFBMEIsMERBQU07QUFDaEM7O0FBRUE7O0FBRUE7QUFDQTtBQUNBLDBCQUEwQiwwREFBTTtBQUNoQzs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsV0FBVyxpQkFBaUI7QUFDNUI7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNULHdCQUF3QiwwREFBTTtBQUM5QjtBQUNBLE9BQU87QUFDUCxLQUFLO0FBQ0wsR0FBRztBQUNILEM7Ozs7Ozs7Ozs7OztBQzNFQTtBQUFBO0FBQWU7QUFDZjtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ0ZBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLHlFQUF5RSxpQ0FBaUM7QUFDMUc7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHlCQUF5QiwyQkFBMkIsRUFBRTtBQUN0RCx3QkFBd0IsMEJBQTBCLEVBQUU7QUFDcEQ7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0EsMEJBQTBCLDRCQUE0QixFQUFFO0FBQ3hELDZCQUE2QiwrQkFBK0IsRUFBRTtBQUM5RCxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsNkJBQTZCOztBQUU3QjtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLGlCQUFpQix3RUFBd0UsRUFBRTtBQUMzRjtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsMEJBQTBCLFdBQVcscUJBQXFCOztBQUUxRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQSxvQkFBb0IsMENBQTBDO0FBQzlEO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0Esb0RBQW9ELCtCQUErQixFQUFFO0FBQ3JGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSwyQ0FBMkMsc0JBQXNCLEVBQUU7QUFDbkU7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSx5RUFBeUUsbUJBQW1CO0FBQzVGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSx5RUFBeUUsbUJBQW1CO0FBQzVGO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxxQkFBcUI7QUFDckI7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTs7QUFFQSxxQkFBcUI7QUFDckI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBOztBQUVBLHdEQUF3RCw0QkFBNEIsRUFBRTtBQUN0RjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBLEdBQUc7O0FBRUgsd0RBQXdELDRCQUE0QixFQUFFO0FBQ3RGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTs7QUFFQSxvQ0FBb0MsbUNBQW1DO0FBQ3ZFLHNDQUFzQywyRUFBMkU7O0FBRWpIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUEsMkJBQTJCOztBQUUzQjtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLG1DQUFtQztBQUNuQztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLEVBQUU7O0FBRUg7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsMkJBQTJCLCtDQUErQztBQUMxRSwwQkFBMEIsa0RBQWtEOztBQUU1RTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSw0QkFBNEIsbUJBQW1CO0FBQy9DO0FBQ0E7QUFDQSw0QkFBNEIsY0FBYztBQUMxQztBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsNEJBQTRCLG1CQUFtQjtBQUMvQztBQUNBO0FBQ0EsNEJBQTRCLGNBQWM7QUFDMUM7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBLHlEQUF5RCxzQ0FBc0MsRUFBRTs7QUFFakcscURBQXFEO0FBQ3JELDJDQUEyQztBQUMzQyx3REFBd0QsMkJBQTJCLEVBQUU7QUFDckY7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLDRCQUE0QixtQkFBbUI7QUFDL0MsNEJBQTRCLG1CQUFtQjtBQUMvQztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSw0QkFBNEIsa0JBQWtCO0FBQzlDLDRCQUE0QixrQkFBa0I7O0FBRTlDOztBQUVBO0FBQ0E7O0FBRUEsNEJBQTRCLGNBQWM7QUFDMUMsNEJBQTRCLGNBQWM7QUFDMUM7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSw2QkFBNkIscUNBQXFDLEVBQUU7QUFDcEU7QUFDQTs7QUFFZSwrRUFBZ0IsRUFBQztBQUNoQzs7Ozs7Ozs7Ozs7O0FDNXpDQUEsTUFBTSxDQUFDQyxDQUFQLEdBQVdELE1BQU0sQ0FBQ0UsTUFBUCxHQUFnQkMsbUJBQU8sQ0FBQyxvREFBRCxDQUFsQztBQUNBSCxNQUFNLENBQUNJLElBQVAsR0FBY0QsbUJBQU8sQ0FBQyx1RUFBRCxDQUFyQixDLENBRUE7O0FBQ0FBLG1CQUFPLENBQUMsMkVBQUQsQ0FBUCxDLENBRUE7OztBQUNBQSxtQkFBTyxDQUFDLDZDQUFELENBQVAsQzs7Ozs7Ozs7Ozs7QUNQQTs7O0FBR0FGLENBQUMsQ0FBQyxZQUFZO0FBRVY7Ozs7O0FBS0EsV0FBU0ksb0JBQVQsQ0FBOEJDLElBQTlCLEVBQW9DO0FBQ2hDQSxRQUFJLENBQUNDLElBQUwsQ0FBVSxzQkFBVixFQUFrQ0MsSUFBbEMsQ0FBdUMsVUFBdkMsRUFBbUQsSUFBbkQ7QUFDQUYsUUFBSSxDQUFDQyxJQUFMLENBQVUsdUJBQVYsRUFBbUNDLElBQW5DLENBQXdDLFVBQXhDLEVBQW9ELElBQXBEO0FBQ0g7QUFFRDs7Ozs7OztBQUtBLFdBQVNDLG1CQUFULENBQTZCSCxJQUE3QixFQUFtQztBQUMvQkEsUUFBSSxDQUFDQyxJQUFMLENBQVUsc0JBQVYsRUFBa0NHLFVBQWxDLENBQTZDLFVBQTdDO0FBQ0FKLFFBQUksQ0FBQ0MsSUFBTCxDQUFVLHVCQUFWLEVBQW1DRyxVQUFuQyxDQUE4QyxVQUE5QztBQUNIO0FBRUQ7Ozs7O0FBR0FULEdBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVVUsTUFBVixDQUFpQixZQUFZO0FBQ3pCTix3QkFBb0IsQ0FBQ0osQ0FBQyxDQUFDLElBQUQsQ0FBRixDQUFwQjtBQUNBLFdBQU8sSUFBUDtBQUNILEdBSEQ7QUFLQTs7OztBQUdBQSxHQUFDLENBQUMsTUFBRCxDQUFELENBQVVXLEVBQVYsQ0FBYSxRQUFiLEVBQXVCLHdCQUF2QixFQUFpRCxVQUFTQyxDQUFULEVBQVk7QUFBQTs7QUFDekRBLEtBQUMsQ0FBQ0MsY0FBRjtBQUVBVixRQUFJLENBQUNXLElBQUwsQ0FBVTtBQUNOQyxXQUFLLEVBQUUsNENBREQ7QUFFTkMsc0JBQWdCLEVBQUUsSUFGWjtBQUdOQyx1QkFBaUIsRUFBRSxnQkFIYjtBQUlOQyxzQkFBZ0IsRUFBRSxRQUpaO0FBS05DLFVBQUksRUFBRTtBQUxBLEtBQVYsRUFNR0MsSUFOSCxDQU1RLFVBQUNDLE1BQUQsRUFBWTtBQUNoQixVQUFJQSxNQUFNLENBQUNDLEtBQVgsRUFBa0I7QUFDZCxhQUFJLENBQUNaLE1BQUw7QUFDSCxPQUZELE1BRU87QUFDSEYsMkJBQW1CLENBQUNSLENBQUMsQ0FBQyxLQUFELENBQUYsQ0FBbkI7QUFDSDtBQUNKLEtBWkQ7QUFhSCxHQWhCRCxFQWdCR1csRUFoQkgsQ0FnQk0sT0FoQk4sRUFnQmUsc0JBaEJmLEVBZ0J1QyxVQUFVQyxDQUFWLEVBQWE7QUFBQTs7QUFDaEQ7OztBQUdBQSxLQUFDLENBQUNDLGNBQUY7QUFFQVYsUUFBSSxDQUFDVyxJQUFMLENBQVU7QUFDTkMsV0FBSyxFQUFFLG1DQUREO0FBRU5DLHNCQUFnQixFQUFFLElBRlo7QUFHTkMsdUJBQWlCLEVBQUUsVUFIYjtBQUlOQyxzQkFBZ0IsRUFBRSxRQUpaO0FBS05DLFVBQUksRUFBRTtBQUxBLEtBQVYsRUFNR0MsSUFOSCxDQU1RLFVBQUNDLE1BQUQsRUFBWTtBQUNoQkEsWUFBTSxDQUFDQyxLQUFQLElBQWdCdkIsTUFBTSxDQUFDd0IsUUFBUCxDQUFnQkMsTUFBaEIsQ0FBdUJ4QixDQUFDLENBQUMsTUFBRCxDQUFELENBQVFPLElBQVIsQ0FBYSxNQUFiLENBQXZCLENBQWhCO0FBQ0gsS0FSRDtBQVNILEdBL0JELEVBakNVLENBa0VWOztBQUNBUCxHQUFDLENBQUMsNkNBQUQsQ0FBRCxDQUFpRFcsRUFBakQsQ0FBb0QsY0FBcEQsRUFBb0UsVUFBVUMsQ0FBVixFQUFhO0FBQzdFLFFBQUlhLElBQUksR0FBR3pCLENBQUMsQ0FBQ1ksQ0FBQyxDQUFDYyxNQUFILENBQUQsQ0FBWW5CLElBQVosQ0FBaUIsTUFBakIsQ0FBWDs7QUFDQSxRQUFJb0IsT0FBTyxDQUFDQyxTQUFaLEVBQXVCO0FBQ25CRCxhQUFPLENBQUNDLFNBQVIsQ0FBa0IsSUFBbEIsRUFBd0IsSUFBeEIsRUFBOEJILElBQTlCO0FBQ0gsS0FGRCxNQUVPO0FBQ0hGLGNBQVEsQ0FBQ0UsSUFBVCxHQUFnQkEsSUFBaEI7QUFDSDtBQUNKLEdBUEQ7QUFTQSxNQUFJQSxJQUFJLEdBQUcxQixNQUFNLENBQUN3QixRQUFQLENBQWdCRSxJQUEzQjs7QUFDQSxNQUFJQSxJQUFKLEVBQVU7QUFDTnpCLEtBQUMsQ0FBQyxxQkFBcUJ5QixJQUFyQixHQUE0QixJQUE3QixDQUFELENBQW9DSSxHQUFwQyxDQUF3QyxNQUF4QztBQUNIO0FBQ0osQ0FoRkEsQ0FBRCxDIiwiZmlsZSI6Ii9qcy9iYWNrZW5kLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLyohXG4gICogQ29yZVVJIHYzLjIuMCAoaHR0cHM6Ly9jb3JldWkuaW8pXG4gICogQ29weXJpZ2h0IDIwMjAgY3JlYXRpdmVMYWJzIMWBdWthc3ogSG9sZWN6ZWtcbiAgKiBMaWNlbnNlZCB1bmRlciBNSVQgKGh0dHBzOi8vY29yZXVpLmlvKVxuICAqL1xuaW1wb3J0IHsgY3JlYXRlUG9wcGVyIH0gZnJvbSAnQHBvcHBlcmpzL2NvcmUnO1xuaW1wb3J0IFBlcmZlY3RTY3JvbGxiYXIgZnJvbSAncGVyZmVjdC1zY3JvbGxiYXInO1xuXG5mdW5jdGlvbiBfZGVmaW5lUHJvcGVydGllcyh0YXJnZXQsIHByb3BzKSB7XG4gIGZvciAodmFyIGkgPSAwOyBpIDwgcHJvcHMubGVuZ3RoOyBpKyspIHtcbiAgICB2YXIgZGVzY3JpcHRvciA9IHByb3BzW2ldO1xuICAgIGRlc2NyaXB0b3IuZW51bWVyYWJsZSA9IGRlc2NyaXB0b3IuZW51bWVyYWJsZSB8fCBmYWxzZTtcbiAgICBkZXNjcmlwdG9yLmNvbmZpZ3VyYWJsZSA9IHRydWU7XG4gICAgaWYgKFwidmFsdWVcIiBpbiBkZXNjcmlwdG9yKSBkZXNjcmlwdG9yLndyaXRhYmxlID0gdHJ1ZTtcbiAgICBPYmplY3QuZGVmaW5lUHJvcGVydHkodGFyZ2V0LCBkZXNjcmlwdG9yLmtleSwgZGVzY3JpcHRvcik7XG4gIH1cbn1cblxuZnVuY3Rpb24gX2NyZWF0ZUNsYXNzKENvbnN0cnVjdG9yLCBwcm90b1Byb3BzLCBzdGF0aWNQcm9wcykge1xuICBpZiAocHJvdG9Qcm9wcykgX2RlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IucHJvdG90eXBlLCBwcm90b1Byb3BzKTtcbiAgaWYgKHN0YXRpY1Byb3BzKSBfZGVmaW5lUHJvcGVydGllcyhDb25zdHJ1Y3Rvciwgc3RhdGljUHJvcHMpO1xuICByZXR1cm4gQ29uc3RydWN0b3I7XG59XG5cbmZ1bmN0aW9uIF9kZWZpbmVQcm9wZXJ0eShvYmosIGtleSwgdmFsdWUpIHtcbiAgaWYgKGtleSBpbiBvYmopIHtcbiAgICBPYmplY3QuZGVmaW5lUHJvcGVydHkob2JqLCBrZXksIHtcbiAgICAgIHZhbHVlOiB2YWx1ZSxcbiAgICAgIGVudW1lcmFibGU6IHRydWUsXG4gICAgICBjb25maWd1cmFibGU6IHRydWUsXG4gICAgICB3cml0YWJsZTogdHJ1ZVxuICAgIH0pO1xuICB9IGVsc2Uge1xuICAgIG9ialtrZXldID0gdmFsdWU7XG4gIH1cblxuICByZXR1cm4gb2JqO1xufVxuXG5mdW5jdGlvbiBvd25LZXlzKG9iamVjdCwgZW51bWVyYWJsZU9ubHkpIHtcbiAgdmFyIGtleXMgPSBPYmplY3Qua2V5cyhvYmplY3QpO1xuXG4gIGlmIChPYmplY3QuZ2V0T3duUHJvcGVydHlTeW1ib2xzKSB7XG4gICAgdmFyIHN5bWJvbHMgPSBPYmplY3QuZ2V0T3duUHJvcGVydHlTeW1ib2xzKG9iamVjdCk7XG4gICAgaWYgKGVudW1lcmFibGVPbmx5KSBzeW1ib2xzID0gc3ltYm9scy5maWx0ZXIoZnVuY3Rpb24gKHN5bSkge1xuICAgICAgcmV0dXJuIE9iamVjdC5nZXRPd25Qcm9wZXJ0eURlc2NyaXB0b3Iob2JqZWN0LCBzeW0pLmVudW1lcmFibGU7XG4gICAgfSk7XG4gICAga2V5cy5wdXNoLmFwcGx5KGtleXMsIHN5bWJvbHMpO1xuICB9XG5cbiAgcmV0dXJuIGtleXM7XG59XG5cbmZ1bmN0aW9uIF9vYmplY3RTcHJlYWQyKHRhcmdldCkge1xuICBmb3IgKHZhciBpID0gMTsgaSA8IGFyZ3VtZW50cy5sZW5ndGg7IGkrKykge1xuICAgIHZhciBzb3VyY2UgPSBhcmd1bWVudHNbaV0gIT0gbnVsbCA/IGFyZ3VtZW50c1tpXSA6IHt9O1xuXG4gICAgaWYgKGkgJSAyKSB7XG4gICAgICBvd25LZXlzKE9iamVjdChzb3VyY2UpLCB0cnVlKS5mb3JFYWNoKGZ1bmN0aW9uIChrZXkpIHtcbiAgICAgICAgX2RlZmluZVByb3BlcnR5KHRhcmdldCwga2V5LCBzb3VyY2Vba2V5XSk7XG4gICAgICB9KTtcbiAgICB9IGVsc2UgaWYgKE9iamVjdC5nZXRPd25Qcm9wZXJ0eURlc2NyaXB0b3JzKSB7XG4gICAgICBPYmplY3QuZGVmaW5lUHJvcGVydGllcyh0YXJnZXQsIE9iamVjdC5nZXRPd25Qcm9wZXJ0eURlc2NyaXB0b3JzKHNvdXJjZSkpO1xuICAgIH0gZWxzZSB7XG4gICAgICBvd25LZXlzKE9iamVjdChzb3VyY2UpKS5mb3JFYWNoKGZ1bmN0aW9uIChrZXkpIHtcbiAgICAgICAgT2JqZWN0LmRlZmluZVByb3BlcnR5KHRhcmdldCwga2V5LCBPYmplY3QuZ2V0T3duUHJvcGVydHlEZXNjcmlwdG9yKHNvdXJjZSwga2V5KSk7XG4gICAgICB9KTtcbiAgICB9XG4gIH1cblxuICByZXR1cm4gdGFyZ2V0O1xufVxuXG5mdW5jdGlvbiBfaW5oZXJpdHNMb29zZShzdWJDbGFzcywgc3VwZXJDbGFzcykge1xuICBzdWJDbGFzcy5wcm90b3R5cGUgPSBPYmplY3QuY3JlYXRlKHN1cGVyQ2xhc3MucHJvdG90eXBlKTtcbiAgc3ViQ2xhc3MucHJvdG90eXBlLmNvbnN0cnVjdG9yID0gc3ViQ2xhc3M7XG4gIHN1YkNsYXNzLl9fcHJvdG9fXyA9IHN1cGVyQ2xhc3M7XG59XG5cbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIEJvb3RzdHJhcCAodjUuMC4wLWFscGhhMSk6IHV0aWwvaW5kZXguanNcbiAqIExpY2Vuc2VkIHVuZGVyIE1JVCAoaHR0cHM6Ly9naXRodWIuY29tL3R3YnMvYm9vdHN0cmFwL2Jsb2IvbWFzdGVyL0xJQ0VOU0UpXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG52YXIgTUFYX1VJRCA9IDEwMDAwMDA7XG52YXIgTUlMTElTRUNPTkRTX01VTFRJUExJRVIgPSAxMDAwO1xudmFyIFRSQU5TSVRJT05fRU5EID0gJ3RyYW5zaXRpb25lbmQnOyAvLyBTaG91dG91dCBBbmd1c0Nyb2xsIChodHRwczovL2dvby5nbC9weHdRR3ApXG5cbnZhciB0b1R5cGUgPSBmdW5jdGlvbiB0b1R5cGUob2JqKSB7XG4gIGlmIChvYmogPT09IG51bGwgfHwgb2JqID09PSB1bmRlZmluZWQpIHtcbiAgICByZXR1cm4gXCJcIiArIG9iajtcbiAgfVxuXG4gIHJldHVybiB7fS50b1N0cmluZy5jYWxsKG9iaikubWF0Y2goL1xccyhbYS16XSspL2kpWzFdLnRvTG93ZXJDYXNlKCk7XG59O1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogUHVibGljIFV0aWwgQXBpXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cblxudmFyIGdldFVJRCA9IGZ1bmN0aW9uIGdldFVJRChwcmVmaXgpIHtcbiAgZG8ge1xuICAgIHByZWZpeCArPSBNYXRoLmZsb29yKE1hdGgucmFuZG9tKCkgKiBNQVhfVUlEKTtcbiAgfSB3aGlsZSAoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQocHJlZml4KSk7XG5cbiAgcmV0dXJuIHByZWZpeDtcbn07XG5cbnZhciBnZXRTZWxlY3RvciA9IGZ1bmN0aW9uIGdldFNlbGVjdG9yKGVsZW1lbnQpIHtcbiAgdmFyIHNlbGVjdG9yID0gZWxlbWVudC5nZXRBdHRyaWJ1dGUoJ2RhdGEtdGFyZ2V0Jyk7XG5cbiAgaWYgKCFzZWxlY3RvciB8fCBzZWxlY3RvciA9PT0gJyMnKSB7XG4gICAgdmFyIGhyZWZBdHRyID0gZWxlbWVudC5nZXRBdHRyaWJ1dGUoJ2hyZWYnKTtcbiAgICBzZWxlY3RvciA9IGhyZWZBdHRyICYmIGhyZWZBdHRyICE9PSAnIycgPyBocmVmQXR0ci50cmltKCkgOiBudWxsO1xuICB9XG5cbiAgcmV0dXJuIHNlbGVjdG9yO1xufTtcblxudmFyIGdldFNlbGVjdG9yRnJvbUVsZW1lbnQgPSBmdW5jdGlvbiBnZXRTZWxlY3RvckZyb21FbGVtZW50KGVsZW1lbnQpIHtcbiAgdmFyIHNlbGVjdG9yID0gZ2V0U2VsZWN0b3IoZWxlbWVudCk7XG5cbiAgaWYgKHNlbGVjdG9yKSB7XG4gICAgcmV0dXJuIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3Ioc2VsZWN0b3IpID8gc2VsZWN0b3IgOiBudWxsO1xuICB9XG5cbiAgcmV0dXJuIG51bGw7XG59O1xuXG52YXIgZ2V0RWxlbWVudEZyb21TZWxlY3RvciA9IGZ1bmN0aW9uIGdldEVsZW1lbnRGcm9tU2VsZWN0b3IoZWxlbWVudCkge1xuICB2YXIgc2VsZWN0b3IgPSBnZXRTZWxlY3RvcihlbGVtZW50KTtcbiAgcmV0dXJuIHNlbGVjdG9yID8gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihzZWxlY3RvcikgOiBudWxsO1xufTtcblxudmFyIGdldFRyYW5zaXRpb25EdXJhdGlvbkZyb21FbGVtZW50ID0gZnVuY3Rpb24gZ2V0VHJhbnNpdGlvbkR1cmF0aW9uRnJvbUVsZW1lbnQoZWxlbWVudCkge1xuICBpZiAoIWVsZW1lbnQpIHtcbiAgICByZXR1cm4gMDtcbiAgfSAvLyBHZXQgdHJhbnNpdGlvbi1kdXJhdGlvbiBvZiB0aGUgZWxlbWVudFxuXG5cbiAgdmFyIF93aW5kb3ckZ2V0Q29tcHV0ZWRTdCA9IHdpbmRvdy5nZXRDb21wdXRlZFN0eWxlKGVsZW1lbnQpLFxuICAgICAgdHJhbnNpdGlvbkR1cmF0aW9uID0gX3dpbmRvdyRnZXRDb21wdXRlZFN0LnRyYW5zaXRpb25EdXJhdGlvbixcbiAgICAgIHRyYW5zaXRpb25EZWxheSA9IF93aW5kb3ckZ2V0Q29tcHV0ZWRTdC50cmFuc2l0aW9uRGVsYXk7XG5cbiAgdmFyIGZsb2F0VHJhbnNpdGlvbkR1cmF0aW9uID0gcGFyc2VGbG9hdCh0cmFuc2l0aW9uRHVyYXRpb24pO1xuICB2YXIgZmxvYXRUcmFuc2l0aW9uRGVsYXkgPSBwYXJzZUZsb2F0KHRyYW5zaXRpb25EZWxheSk7IC8vIFJldHVybiAwIGlmIGVsZW1lbnQgb3IgdHJhbnNpdGlvbiBkdXJhdGlvbiBpcyBub3QgZm91bmRcblxuICBpZiAoIWZsb2F0VHJhbnNpdGlvbkR1cmF0aW9uICYmICFmbG9hdFRyYW5zaXRpb25EZWxheSkge1xuICAgIHJldHVybiAwO1xuICB9IC8vIElmIG11bHRpcGxlIGR1cmF0aW9ucyBhcmUgZGVmaW5lZCwgdGFrZSB0aGUgZmlyc3RcblxuXG4gIHRyYW5zaXRpb25EdXJhdGlvbiA9IHRyYW5zaXRpb25EdXJhdGlvbi5zcGxpdCgnLCcpWzBdO1xuICB0cmFuc2l0aW9uRGVsYXkgPSB0cmFuc2l0aW9uRGVsYXkuc3BsaXQoJywnKVswXTtcbiAgcmV0dXJuIChwYXJzZUZsb2F0KHRyYW5zaXRpb25EdXJhdGlvbikgKyBwYXJzZUZsb2F0KHRyYW5zaXRpb25EZWxheSkpICogTUlMTElTRUNPTkRTX01VTFRJUExJRVI7XG59O1xuXG52YXIgdHJpZ2dlclRyYW5zaXRpb25FbmQgPSBmdW5jdGlvbiB0cmlnZ2VyVHJhbnNpdGlvbkVuZChlbGVtZW50KSB7XG4gIGVsZW1lbnQuZGlzcGF0Y2hFdmVudChuZXcgRXZlbnQoVFJBTlNJVElPTl9FTkQpKTtcbn07XG5cbnZhciBpc0VsZW1lbnQgPSBmdW5jdGlvbiBpc0VsZW1lbnQob2JqKSB7XG4gIHJldHVybiAob2JqWzBdIHx8IG9iaikubm9kZVR5cGU7XG59O1xuXG52YXIgZW11bGF0ZVRyYW5zaXRpb25FbmQgPSBmdW5jdGlvbiBlbXVsYXRlVHJhbnNpdGlvbkVuZChlbGVtZW50LCBkdXJhdGlvbikge1xuICB2YXIgY2FsbGVkID0gZmFsc2U7XG4gIHZhciBkdXJhdGlvblBhZGRpbmcgPSA1O1xuICB2YXIgZW11bGF0ZWREdXJhdGlvbiA9IGR1cmF0aW9uICsgZHVyYXRpb25QYWRkaW5nO1xuXG4gIGZ1bmN0aW9uIGxpc3RlbmVyKCkge1xuICAgIGNhbGxlZCA9IHRydWU7XG4gICAgZWxlbWVudC5yZW1vdmVFdmVudExpc3RlbmVyKFRSQU5TSVRJT05fRU5ELCBsaXN0ZW5lcik7XG4gIH1cblxuICBlbGVtZW50LmFkZEV2ZW50TGlzdGVuZXIoVFJBTlNJVElPTl9FTkQsIGxpc3RlbmVyKTtcbiAgc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgaWYgKCFjYWxsZWQpIHtcbiAgICAgIHRyaWdnZXJUcmFuc2l0aW9uRW5kKGVsZW1lbnQpO1xuICAgIH1cbiAgfSwgZW11bGF0ZWREdXJhdGlvbik7XG59O1xuXG52YXIgdHlwZUNoZWNrQ29uZmlnID0gZnVuY3Rpb24gdHlwZUNoZWNrQ29uZmlnKGNvbXBvbmVudE5hbWUsIGNvbmZpZywgY29uZmlnVHlwZXMpIHtcbiAgT2JqZWN0LmtleXMoY29uZmlnVHlwZXMpLmZvckVhY2goZnVuY3Rpb24gKHByb3BlcnR5KSB7XG4gICAgdmFyIGV4cGVjdGVkVHlwZXMgPSBjb25maWdUeXBlc1twcm9wZXJ0eV07XG4gICAgdmFyIHZhbHVlID0gY29uZmlnW3Byb3BlcnR5XTtcbiAgICB2YXIgdmFsdWVUeXBlID0gdmFsdWUgJiYgaXNFbGVtZW50KHZhbHVlKSA/ICdlbGVtZW50JyA6IHRvVHlwZSh2YWx1ZSk7XG5cbiAgICBpZiAoIW5ldyBSZWdFeHAoZXhwZWN0ZWRUeXBlcykudGVzdCh2YWx1ZVR5cGUpKSB7XG4gICAgICB0aHJvdyBuZXcgRXJyb3IoY29tcG9uZW50TmFtZS50b1VwcGVyQ2FzZSgpICsgXCI6IFwiICsgKFwiT3B0aW9uIFxcXCJcIiArIHByb3BlcnR5ICsgXCJcXFwiIHByb3ZpZGVkIHR5cGUgXFxcIlwiICsgdmFsdWVUeXBlICsgXCJcXFwiIFwiKSArIChcImJ1dCBleHBlY3RlZCB0eXBlIFxcXCJcIiArIGV4cGVjdGVkVHlwZXMgKyBcIlxcXCIuXCIpKTtcbiAgICB9XG4gIH0pO1xufTtcblxudmFyIGlzVmlzaWJsZSA9IGZ1bmN0aW9uIGlzVmlzaWJsZShlbGVtZW50KSB7XG4gIGlmICghZWxlbWVudCkge1xuICAgIHJldHVybiBmYWxzZTtcbiAgfVxuXG4gIGlmIChlbGVtZW50LnN0eWxlICYmIGVsZW1lbnQucGFyZW50Tm9kZSAmJiBlbGVtZW50LnBhcmVudE5vZGUuc3R5bGUpIHtcbiAgICB2YXIgZWxlbWVudFN0eWxlID0gZ2V0Q29tcHV0ZWRTdHlsZShlbGVtZW50KTtcbiAgICB2YXIgcGFyZW50Tm9kZVN0eWxlID0gZ2V0Q29tcHV0ZWRTdHlsZShlbGVtZW50LnBhcmVudE5vZGUpO1xuICAgIHJldHVybiBlbGVtZW50U3R5bGUuZGlzcGxheSAhPT0gJ25vbmUnICYmIHBhcmVudE5vZGVTdHlsZS5kaXNwbGF5ICE9PSAnbm9uZScgJiYgZWxlbWVudFN0eWxlLnZpc2liaWxpdHkgIT09ICdoaWRkZW4nO1xuICB9XG5cbiAgcmV0dXJuIGZhbHNlO1xufTtcblxudmFyIGZpbmRTaGFkb3dSb290ID0gZnVuY3Rpb24gZmluZFNoYWRvd1Jvb3QoZWxlbWVudCkge1xuICBpZiAoIWRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5hdHRhY2hTaGFkb3cpIHtcbiAgICByZXR1cm4gbnVsbDtcbiAgfSAvLyBDYW4gZmluZCB0aGUgc2hhZG93IHJvb3Qgb3RoZXJ3aXNlIGl0J2xsIHJldHVybiB0aGUgZG9jdW1lbnRcblxuXG4gIGlmICh0eXBlb2YgZWxlbWVudC5nZXRSb290Tm9kZSA9PT0gJ2Z1bmN0aW9uJykge1xuICAgIHZhciByb290ID0gZWxlbWVudC5nZXRSb290Tm9kZSgpO1xuICAgIHJldHVybiByb290IGluc3RhbmNlb2YgU2hhZG93Um9vdCA/IHJvb3QgOiBudWxsO1xuICB9XG5cbiAgaWYgKGVsZW1lbnQgaW5zdGFuY2VvZiBTaGFkb3dSb290KSB7XG4gICAgcmV0dXJuIGVsZW1lbnQ7XG4gIH0gLy8gd2hlbiB3ZSBkb24ndCBmaW5kIGEgc2hhZG93IHJvb3RcblxuXG4gIGlmICghZWxlbWVudC5wYXJlbnROb2RlKSB7XG4gICAgcmV0dXJuIG51bGw7XG4gIH1cblxuICByZXR1cm4gZmluZFNoYWRvd1Jvb3QoZWxlbWVudC5wYXJlbnROb2RlKTtcbn07XG5cbnZhciBub29wID0gZnVuY3Rpb24gbm9vcCgpIHtcbiAgcmV0dXJuIGZ1bmN0aW9uICgpIHt9O1xufTtcblxudmFyIHJlZmxvdyA9IGZ1bmN0aW9uIHJlZmxvdyhlbGVtZW50KSB7XG4gIHJldHVybiBlbGVtZW50Lm9mZnNldEhlaWdodDtcbn07XG5cbnZhciBnZXRqUXVlcnkgPSBmdW5jdGlvbiBnZXRqUXVlcnkoKSB7XG4gIHZhciBfd2luZG93ID0gd2luZG93LFxuICAgICAgalF1ZXJ5ID0gX3dpbmRvdy5qUXVlcnk7XG5cbiAgaWYgKGpRdWVyeSAmJiAhZG9jdW1lbnQuYm9keS5oYXNBdHRyaWJ1dGUoJ2RhdGEtbm8tanF1ZXJ5JykpIHtcbiAgICByZXR1cm4galF1ZXJ5O1xuICB9XG5cbiAgcmV0dXJuIG51bGw7XG59O1xuXG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBCb290c3RyYXAgKHY1LjAuMC1hbHBoYTEpOiBkb20vZGF0YS5qc1xuICogTGljZW5zZWQgdW5kZXIgTUlUIChodHRwczovL2dpdGh1Yi5jb20vdHdicy9ib290c3RyYXAvYmxvYi9tYXN0ZXIvTElDRU5TRSlcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENvbnN0YW50c1xuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cbnZhciBtYXBEYXRhID0gZnVuY3Rpb24gKCkge1xuICB2YXIgc3RvcmVEYXRhID0ge307XG4gIHZhciBpZCA9IDE7XG4gIHJldHVybiB7XG4gICAgc2V0OiBmdW5jdGlvbiBzZXQoZWxlbWVudCwga2V5LCBkYXRhKSB7XG4gICAgICBpZiAodHlwZW9mIGVsZW1lbnQua2V5ID09PSAndW5kZWZpbmVkJykge1xuICAgICAgICBlbGVtZW50LmtleSA9IHtcbiAgICAgICAgICBrZXk6IGtleSxcbiAgICAgICAgICBpZDogaWRcbiAgICAgICAgfTtcbiAgICAgICAgaWQrKztcbiAgICAgIH1cblxuICAgICAgc3RvcmVEYXRhW2VsZW1lbnQua2V5LmlkXSA9IGRhdGE7XG4gICAgfSxcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldChlbGVtZW50LCBrZXkpIHtcbiAgICAgIGlmICghZWxlbWVudCB8fCB0eXBlb2YgZWxlbWVudC5rZXkgPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgIHJldHVybiBudWxsO1xuICAgICAgfVxuXG4gICAgICB2YXIga2V5UHJvcGVydGllcyA9IGVsZW1lbnQua2V5O1xuXG4gICAgICBpZiAoa2V5UHJvcGVydGllcy5rZXkgPT09IGtleSkge1xuICAgICAgICByZXR1cm4gc3RvcmVEYXRhW2tleVByb3BlcnRpZXMuaWRdO1xuICAgICAgfVxuXG4gICAgICByZXR1cm4gbnVsbDtcbiAgICB9LFxuICAgIGRlbGV0ZTogZnVuY3Rpb24gX2RlbGV0ZShlbGVtZW50LCBrZXkpIHtcbiAgICAgIGlmICh0eXBlb2YgZWxlbWVudC5rZXkgPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgdmFyIGtleVByb3BlcnRpZXMgPSBlbGVtZW50LmtleTtcblxuICAgICAgaWYgKGtleVByb3BlcnRpZXMua2V5ID09PSBrZXkpIHtcbiAgICAgICAgZGVsZXRlIHN0b3JlRGF0YVtrZXlQcm9wZXJ0aWVzLmlkXTtcbiAgICAgICAgZGVsZXRlIGVsZW1lbnQua2V5O1xuICAgICAgfVxuICAgIH1cbiAgfTtcbn0oKTtcblxudmFyIERhdGEgPSB7XG4gIHNldERhdGE6IGZ1bmN0aW9uIHNldERhdGEoaW5zdGFuY2UsIGtleSwgZGF0YSkge1xuICAgIG1hcERhdGEuc2V0KGluc3RhbmNlLCBrZXksIGRhdGEpO1xuICB9LFxuICBnZXREYXRhOiBmdW5jdGlvbiBnZXREYXRhKGluc3RhbmNlLCBrZXkpIHtcbiAgICByZXR1cm4gbWFwRGF0YS5nZXQoaW5zdGFuY2UsIGtleSk7XG4gIH0sXG4gIHJlbW92ZURhdGE6IGZ1bmN0aW9uIHJlbW92ZURhdGEoaW5zdGFuY2UsIGtleSkge1xuICAgIG1hcERhdGEuZGVsZXRlKGluc3RhbmNlLCBrZXkpO1xuICB9XG59O1xuXG4vKiBpc3RhbmJ1bCBpZ25vcmUgZmlsZSAqL1xudmFyIGZpbmQgPSBFbGVtZW50LnByb3RvdHlwZS5xdWVyeVNlbGVjdG9yQWxsO1xudmFyIGZpbmRPbmUgPSBFbGVtZW50LnByb3RvdHlwZS5xdWVyeVNlbGVjdG9yOyAvLyBNU0VkZ2UgcmVzZXRzIGRlZmF1bHRQcmV2ZW50ZWQgZmxhZyB1cG9uIGRpc3BhdGNoRXZlbnQgY2FsbCBpZiBhdCBsZWFzdCBvbmUgbGlzdGVuZXIgaXMgYXR0YWNoZWRcblxudmFyIGRlZmF1bHRQcmV2ZW50ZWRQcmVzZXJ2ZWRPbkRpc3BhdGNoID0gZnVuY3Rpb24gKCkge1xuICB2YXIgZSA9IG5ldyBDdXN0b21FdmVudCgnQm9vdHN0cmFwJywge1xuICAgIGNhbmNlbGFibGU6IHRydWVcbiAgfSk7XG4gIHZhciBlbGVtZW50ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7XG4gIGVsZW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignQm9vdHN0cmFwJywgZnVuY3Rpb24gKCkge1xuICAgIHJldHVybiBudWxsO1xuICB9KTtcbiAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICBlbGVtZW50LmRpc3BhdGNoRXZlbnQoZSk7XG4gIHJldHVybiBlLmRlZmF1bHRQcmV2ZW50ZWQ7XG59KCk7XG5cbnZhciBzY29wZVNlbGVjdG9yUmVnZXggPSAvOnNjb3BlXFxiLztcblxudmFyIHN1cHBvcnRTY29wZVF1ZXJ5ID0gZnVuY3Rpb24gKCkge1xuICB2YXIgZWxlbWVudCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpO1xuXG4gIHRyeSB7XG4gICAgZWxlbWVudC5xdWVyeVNlbGVjdG9yQWxsKCc6c2NvcGUgKicpO1xuICB9IGNhdGNoIChfKSB7XG4gICAgcmV0dXJuIGZhbHNlO1xuICB9XG5cbiAgcmV0dXJuIHRydWU7XG59KCk7XG5cbmlmICghc3VwcG9ydFNjb3BlUXVlcnkpIHtcbiAgZmluZCA9IGZ1bmN0aW9uIGZpbmQoc2VsZWN0b3IpIHtcbiAgICBpZiAoIXNjb3BlU2VsZWN0b3JSZWdleC50ZXN0KHNlbGVjdG9yKSkge1xuICAgICAgcmV0dXJuIHRoaXMucXVlcnlTZWxlY3RvckFsbChzZWxlY3Rvcik7XG4gICAgfVxuXG4gICAgdmFyIGhhc0lkID0gQm9vbGVhbih0aGlzLmlkKTtcblxuICAgIGlmICghaGFzSWQpIHtcbiAgICAgIHRoaXMuaWQgPSBnZXRVSUQoJ3Njb3BlJyk7XG4gICAgfVxuXG4gICAgdmFyIG5vZGVMaXN0ID0gbnVsbDtcblxuICAgIHRyeSB7XG4gICAgICBzZWxlY3RvciA9IHNlbGVjdG9yLnJlcGxhY2Uoc2NvcGVTZWxlY3RvclJlZ2V4LCBcIiNcIiArIHRoaXMuaWQpO1xuICAgICAgbm9kZUxpc3QgPSB0aGlzLnF1ZXJ5U2VsZWN0b3JBbGwoc2VsZWN0b3IpO1xuICAgIH0gZmluYWxseSB7XG4gICAgICBpZiAoIWhhc0lkKSB7XG4gICAgICAgIHRoaXMucmVtb3ZlQXR0cmlidXRlKCdpZCcpO1xuICAgICAgfVxuICAgIH1cblxuICAgIHJldHVybiBub2RlTGlzdDtcbiAgfTtcblxuICBmaW5kT25lID0gZnVuY3Rpb24gZmluZE9uZShzZWxlY3Rvcikge1xuICAgIGlmICghc2NvcGVTZWxlY3RvclJlZ2V4LnRlc3Qoc2VsZWN0b3IpKSB7XG4gICAgICByZXR1cm4gdGhpcy5xdWVyeVNlbGVjdG9yKHNlbGVjdG9yKTtcbiAgICB9XG5cbiAgICB2YXIgbWF0Y2hlcyA9IGZpbmQuY2FsbCh0aGlzLCBzZWxlY3Rvcik7XG5cbiAgICBpZiAodHlwZW9mIG1hdGNoZXNbMF0gIT09ICd1bmRlZmluZWQnKSB7XG4gICAgICByZXR1cm4gbWF0Y2hlc1swXTtcbiAgICB9XG5cbiAgICByZXR1cm4gbnVsbDtcbiAgfTtcbn1cblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQm9vdHN0cmFwICh2NS4wLjAtYWxwaGExKTogZG9tL2V2ZW50LWhhbmRsZXIuanNcbiAqIExpY2Vuc2VkIHVuZGVyIE1JVCAoaHR0cHM6Ly9naXRodWIuY29tL3R3YnMvYm9vdHN0cmFwL2Jsb2IvbWFzdGVyL0xJQ0VOU0UpXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ29uc3RhbnRzXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgJCA9IGdldGpRdWVyeSgpO1xudmFyIG5hbWVzcGFjZVJlZ2V4ID0gL1teLl0qKD89XFwuLiopXFwufC4qLztcbnZhciBzdHJpcE5hbWVSZWdleCA9IC9cXC4uKi87XG52YXIgc3RyaXBVaWRSZWdleCA9IC86OlxcZCskLztcbnZhciBldmVudFJlZ2lzdHJ5ID0ge307IC8vIEV2ZW50cyBzdG9yYWdlXG5cbnZhciB1aWRFdmVudCA9IDE7XG52YXIgY3VzdG9tRXZlbnRzID0ge1xuICBtb3VzZWVudGVyOiAnbW91c2VvdmVyJyxcbiAgbW91c2VsZWF2ZTogJ21vdXNlb3V0J1xufTtcbnZhciBuYXRpdmVFdmVudHMgPSBbJ2NsaWNrJywgJ2RibGNsaWNrJywgJ21vdXNldXAnLCAnbW91c2Vkb3duJywgJ2NvbnRleHRtZW51JywgJ21vdXNld2hlZWwnLCAnRE9NTW91c2VTY3JvbGwnLCAnbW91c2VvdmVyJywgJ21vdXNlb3V0JywgJ21vdXNlbW92ZScsICdzZWxlY3RzdGFydCcsICdzZWxlY3RlbmQnLCAna2V5ZG93bicsICdrZXlwcmVzcycsICdrZXl1cCcsICdvcmllbnRhdGlvbmNoYW5nZScsICd0b3VjaHN0YXJ0JywgJ3RvdWNobW92ZScsICd0b3VjaGVuZCcsICd0b3VjaGNhbmNlbCcsICdwb2ludGVyZG93bicsICdwb2ludGVybW92ZScsICdwb2ludGVydXAnLCAncG9pbnRlcmxlYXZlJywgJ3BvaW50ZXJjYW5jZWwnLCAnZ2VzdHVyZXN0YXJ0JywgJ2dlc3R1cmVjaGFuZ2UnLCAnZ2VzdHVyZWVuZCcsICdmb2N1cycsICdibHVyJywgJ2NoYW5nZScsICdyZXNldCcsICdzZWxlY3QnLCAnc3VibWl0JywgJ2ZvY3VzaW4nLCAnZm9jdXNvdXQnLCAnbG9hZCcsICd1bmxvYWQnLCAnYmVmb3JldW5sb2FkJywgJ3Jlc2l6ZScsICdtb3ZlJywgJ0RPTUNvbnRlbnRMb2FkZWQnLCAncmVhZHlzdGF0ZWNoYW5nZScsICdlcnJvcicsICdhYm9ydCcsICdzY3JvbGwnXTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBQcml2YXRlIG1ldGhvZHNcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cbmZ1bmN0aW9uIGdldFVpZEV2ZW50KGVsZW1lbnQsIHVpZCkge1xuICByZXR1cm4gdWlkICYmIHVpZCArIFwiOjpcIiArIHVpZEV2ZW50KysgfHwgZWxlbWVudC51aWRFdmVudCB8fCB1aWRFdmVudCsrO1xufVxuXG5mdW5jdGlvbiBnZXRFdmVudChlbGVtZW50KSB7XG4gIHZhciB1aWQgPSBnZXRVaWRFdmVudChlbGVtZW50KTtcbiAgZWxlbWVudC51aWRFdmVudCA9IHVpZDtcbiAgZXZlbnRSZWdpc3RyeVt1aWRdID0gZXZlbnRSZWdpc3RyeVt1aWRdIHx8IHt9O1xuICByZXR1cm4gZXZlbnRSZWdpc3RyeVt1aWRdO1xufVxuXG5mdW5jdGlvbiBib290c3RyYXBIYW5kbGVyKGVsZW1lbnQsIGZuKSB7XG4gIHJldHVybiBmdW5jdGlvbiBoYW5kbGVyKGV2ZW50KSB7XG4gICAgaWYgKGhhbmRsZXIub25lT2ZmKSB7XG4gICAgICBFdmVudEhhbmRsZXIub2ZmKGVsZW1lbnQsIGV2ZW50LnR5cGUsIGZuKTtcbiAgICB9XG5cbiAgICByZXR1cm4gZm4uYXBwbHkoZWxlbWVudCwgW2V2ZW50XSk7XG4gIH07XG59XG5cbmZ1bmN0aW9uIGJvb3RzdHJhcERlbGVnYXRpb25IYW5kbGVyKGVsZW1lbnQsIHNlbGVjdG9yLCBmbikge1xuICByZXR1cm4gZnVuY3Rpb24gaGFuZGxlcihldmVudCkge1xuICAgIHZhciBkb21FbGVtZW50cyA9IGVsZW1lbnQucXVlcnlTZWxlY3RvckFsbChzZWxlY3Rvcik7XG5cbiAgICBmb3IgKHZhciB0YXJnZXQgPSBldmVudC50YXJnZXQ7IHRhcmdldCAmJiB0YXJnZXQgIT09IHRoaXM7IHRhcmdldCA9IHRhcmdldC5wYXJlbnROb2RlKSB7XG4gICAgICBmb3IgKHZhciBpID0gZG9tRWxlbWVudHMubGVuZ3RoOyBpLS07KSB7XG4gICAgICAgIGlmIChkb21FbGVtZW50c1tpXSA9PT0gdGFyZ2V0KSB7XG4gICAgICAgICAgaWYgKGhhbmRsZXIub25lT2ZmKSB7XG4gICAgICAgICAgICBFdmVudEhhbmRsZXIub2ZmKGVsZW1lbnQsIGV2ZW50LnR5cGUsIGZuKTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICByZXR1cm4gZm4uYXBwbHkodGFyZ2V0LCBbZXZlbnRdKTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH0gLy8gVG8gcGxlYXNlIEVTTGludFxuXG5cbiAgICByZXR1cm4gbnVsbDtcbiAgfTtcbn1cblxuZnVuY3Rpb24gZmluZEhhbmRsZXIoZXZlbnRzLCBoYW5kbGVyLCBkZWxlZ2F0aW9uU2VsZWN0b3IpIHtcbiAgaWYgKGRlbGVnYXRpb25TZWxlY3RvciA9PT0gdm9pZCAwKSB7XG4gICAgZGVsZWdhdGlvblNlbGVjdG9yID0gbnVsbDtcbiAgfVxuXG4gIHZhciB1aWRFdmVudExpc3QgPSBPYmplY3Qua2V5cyhldmVudHMpO1xuXG4gIGZvciAodmFyIGkgPSAwLCBsZW4gPSB1aWRFdmVudExpc3QubGVuZ3RoOyBpIDwgbGVuOyBpKyspIHtcbiAgICB2YXIgZXZlbnQgPSBldmVudHNbdWlkRXZlbnRMaXN0W2ldXTtcblxuICAgIGlmIChldmVudC5vcmlnaW5hbEhhbmRsZXIgPT09IGhhbmRsZXIgJiYgZXZlbnQuZGVsZWdhdGlvblNlbGVjdG9yID09PSBkZWxlZ2F0aW9uU2VsZWN0b3IpIHtcbiAgICAgIHJldHVybiBldmVudDtcbiAgICB9XG4gIH1cblxuICByZXR1cm4gbnVsbDtcbn1cblxuZnVuY3Rpb24gbm9ybWFsaXplUGFyYW1zKG9yaWdpbmFsVHlwZUV2ZW50LCBoYW5kbGVyLCBkZWxlZ2F0aW9uRm4pIHtcbiAgdmFyIGRlbGVnYXRpb24gPSB0eXBlb2YgaGFuZGxlciA9PT0gJ3N0cmluZyc7XG4gIHZhciBvcmlnaW5hbEhhbmRsZXIgPSBkZWxlZ2F0aW9uID8gZGVsZWdhdGlvbkZuIDogaGFuZGxlcjsgLy8gYWxsb3cgdG8gZ2V0IHRoZSBuYXRpdmUgZXZlbnRzIGZyb20gbmFtZXNwYWNlZCBldmVudHMgKCdjbGljay5jb3JldWkuYnV0dG9uJyAtLT4gJ2NsaWNrJylcblxuICB2YXIgdHlwZUV2ZW50ID0gb3JpZ2luYWxUeXBlRXZlbnQucmVwbGFjZShzdHJpcE5hbWVSZWdleCwgJycpO1xuICB2YXIgY3VzdG9tID0gY3VzdG9tRXZlbnRzW3R5cGVFdmVudF07XG5cbiAgaWYgKGN1c3RvbSkge1xuICAgIHR5cGVFdmVudCA9IGN1c3RvbTtcbiAgfVxuXG4gIHZhciBpc05hdGl2ZSA9IG5hdGl2ZUV2ZW50cy5pbmRleE9mKHR5cGVFdmVudCkgPiAtMTtcblxuICBpZiAoIWlzTmF0aXZlKSB7XG4gICAgdHlwZUV2ZW50ID0gb3JpZ2luYWxUeXBlRXZlbnQ7XG4gIH1cblxuICByZXR1cm4gW2RlbGVnYXRpb24sIG9yaWdpbmFsSGFuZGxlciwgdHlwZUV2ZW50XTtcbn1cblxuZnVuY3Rpb24gYWRkSGFuZGxlcihlbGVtZW50LCBvcmlnaW5hbFR5cGVFdmVudCwgaGFuZGxlciwgZGVsZWdhdGlvbkZuLCBvbmVPZmYpIHtcbiAgaWYgKHR5cGVvZiBvcmlnaW5hbFR5cGVFdmVudCAhPT0gJ3N0cmluZycgfHwgIWVsZW1lbnQpIHtcbiAgICByZXR1cm47XG4gIH1cblxuICBpZiAoIWhhbmRsZXIpIHtcbiAgICBoYW5kbGVyID0gZGVsZWdhdGlvbkZuO1xuICAgIGRlbGVnYXRpb25GbiA9IG51bGw7XG4gIH1cblxuICB2YXIgX25vcm1hbGl6ZVBhcmFtcyA9IG5vcm1hbGl6ZVBhcmFtcyhvcmlnaW5hbFR5cGVFdmVudCwgaGFuZGxlciwgZGVsZWdhdGlvbkZuKSxcbiAgICAgIGRlbGVnYXRpb24gPSBfbm9ybWFsaXplUGFyYW1zWzBdLFxuICAgICAgb3JpZ2luYWxIYW5kbGVyID0gX25vcm1hbGl6ZVBhcmFtc1sxXSxcbiAgICAgIHR5cGVFdmVudCA9IF9ub3JtYWxpemVQYXJhbXNbMl07XG5cbiAgdmFyIGV2ZW50cyA9IGdldEV2ZW50KGVsZW1lbnQpO1xuICB2YXIgaGFuZGxlcnMgPSBldmVudHNbdHlwZUV2ZW50XSB8fCAoZXZlbnRzW3R5cGVFdmVudF0gPSB7fSk7XG4gIHZhciBwcmV2aW91c0ZuID0gZmluZEhhbmRsZXIoaGFuZGxlcnMsIG9yaWdpbmFsSGFuZGxlciwgZGVsZWdhdGlvbiA/IGhhbmRsZXIgOiBudWxsKTtcblxuICBpZiAocHJldmlvdXNGbikge1xuICAgIHByZXZpb3VzRm4ub25lT2ZmID0gcHJldmlvdXNGbi5vbmVPZmYgJiYgb25lT2ZmO1xuICAgIHJldHVybjtcbiAgfVxuXG4gIHZhciB1aWQgPSBnZXRVaWRFdmVudChvcmlnaW5hbEhhbmRsZXIsIG9yaWdpbmFsVHlwZUV2ZW50LnJlcGxhY2UobmFtZXNwYWNlUmVnZXgsICcnKSk7XG4gIHZhciBmbiA9IGRlbGVnYXRpb24gPyBib290c3RyYXBEZWxlZ2F0aW9uSGFuZGxlcihlbGVtZW50LCBoYW5kbGVyLCBkZWxlZ2F0aW9uRm4pIDogYm9vdHN0cmFwSGFuZGxlcihlbGVtZW50LCBoYW5kbGVyKTtcbiAgZm4uZGVsZWdhdGlvblNlbGVjdG9yID0gZGVsZWdhdGlvbiA/IGhhbmRsZXIgOiBudWxsO1xuICBmbi5vcmlnaW5hbEhhbmRsZXIgPSBvcmlnaW5hbEhhbmRsZXI7XG4gIGZuLm9uZU9mZiA9IG9uZU9mZjtcbiAgZm4udWlkRXZlbnQgPSB1aWQ7XG4gIGhhbmRsZXJzW3VpZF0gPSBmbjtcbiAgZWxlbWVudC5hZGRFdmVudExpc3RlbmVyKHR5cGVFdmVudCwgZm4sIGRlbGVnYXRpb24pO1xufVxuXG5mdW5jdGlvbiByZW1vdmVIYW5kbGVyKGVsZW1lbnQsIGV2ZW50cywgdHlwZUV2ZW50LCBoYW5kbGVyLCBkZWxlZ2F0aW9uU2VsZWN0b3IpIHtcbiAgdmFyIGZuID0gZmluZEhhbmRsZXIoZXZlbnRzW3R5cGVFdmVudF0sIGhhbmRsZXIsIGRlbGVnYXRpb25TZWxlY3Rvcik7XG5cbiAgaWYgKCFmbikge1xuICAgIHJldHVybjtcbiAgfVxuXG4gIGVsZW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcih0eXBlRXZlbnQsIGZuLCBCb29sZWFuKGRlbGVnYXRpb25TZWxlY3RvcikpO1xuICBkZWxldGUgZXZlbnRzW3R5cGVFdmVudF1bZm4udWlkRXZlbnRdO1xufVxuXG5mdW5jdGlvbiByZW1vdmVOYW1lc3BhY2VkSGFuZGxlcnMoZWxlbWVudCwgZXZlbnRzLCB0eXBlRXZlbnQsIG5hbWVzcGFjZSkge1xuICB2YXIgc3RvcmVFbGVtZW50RXZlbnQgPSBldmVudHNbdHlwZUV2ZW50XSB8fCB7fTtcbiAgT2JqZWN0LmtleXMoc3RvcmVFbGVtZW50RXZlbnQpLmZvckVhY2goZnVuY3Rpb24gKGhhbmRsZXJLZXkpIHtcbiAgICBpZiAoaGFuZGxlcktleS5pbmRleE9mKG5hbWVzcGFjZSkgPiAtMSkge1xuICAgICAgdmFyIGV2ZW50ID0gc3RvcmVFbGVtZW50RXZlbnRbaGFuZGxlcktleV07XG4gICAgICByZW1vdmVIYW5kbGVyKGVsZW1lbnQsIGV2ZW50cywgdHlwZUV2ZW50LCBldmVudC5vcmlnaW5hbEhhbmRsZXIsIGV2ZW50LmRlbGVnYXRpb25TZWxlY3Rvcik7XG4gICAgfVxuICB9KTtcbn1cblxudmFyIEV2ZW50SGFuZGxlciA9IHtcbiAgb246IGZ1bmN0aW9uIG9uKGVsZW1lbnQsIGV2ZW50LCBoYW5kbGVyLCBkZWxlZ2F0aW9uRm4pIHtcbiAgICBhZGRIYW5kbGVyKGVsZW1lbnQsIGV2ZW50LCBoYW5kbGVyLCBkZWxlZ2F0aW9uRm4sIGZhbHNlKTtcbiAgfSxcbiAgb25lOiBmdW5jdGlvbiBvbmUoZWxlbWVudCwgZXZlbnQsIGhhbmRsZXIsIGRlbGVnYXRpb25Gbikge1xuICAgIGFkZEhhbmRsZXIoZWxlbWVudCwgZXZlbnQsIGhhbmRsZXIsIGRlbGVnYXRpb25GbiwgdHJ1ZSk7XG4gIH0sXG4gIG9mZjogZnVuY3Rpb24gb2ZmKGVsZW1lbnQsIG9yaWdpbmFsVHlwZUV2ZW50LCBoYW5kbGVyLCBkZWxlZ2F0aW9uRm4pIHtcbiAgICBpZiAodHlwZW9mIG9yaWdpbmFsVHlwZUV2ZW50ICE9PSAnc3RyaW5nJyB8fCAhZWxlbWVudCkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHZhciBfbm9ybWFsaXplUGFyYW1zMiA9IG5vcm1hbGl6ZVBhcmFtcyhvcmlnaW5hbFR5cGVFdmVudCwgaGFuZGxlciwgZGVsZWdhdGlvbkZuKSxcbiAgICAgICAgZGVsZWdhdGlvbiA9IF9ub3JtYWxpemVQYXJhbXMyWzBdLFxuICAgICAgICBvcmlnaW5hbEhhbmRsZXIgPSBfbm9ybWFsaXplUGFyYW1zMlsxXSxcbiAgICAgICAgdHlwZUV2ZW50ID0gX25vcm1hbGl6ZVBhcmFtczJbMl07XG5cbiAgICB2YXIgaW5OYW1lc3BhY2UgPSB0eXBlRXZlbnQgIT09IG9yaWdpbmFsVHlwZUV2ZW50O1xuICAgIHZhciBldmVudHMgPSBnZXRFdmVudChlbGVtZW50KTtcbiAgICB2YXIgaXNOYW1lc3BhY2UgPSBvcmlnaW5hbFR5cGVFdmVudC5jaGFyQXQoMCkgPT09ICcuJztcblxuICAgIGlmICh0eXBlb2Ygb3JpZ2luYWxIYW5kbGVyICE9PSAndW5kZWZpbmVkJykge1xuICAgICAgLy8gU2ltcGxlc3QgY2FzZTogaGFuZGxlciBpcyBwYXNzZWQsIHJlbW92ZSB0aGF0IGxpc3RlbmVyIE9OTFkuXG4gICAgICBpZiAoIWV2ZW50cyB8fCAhZXZlbnRzW3R5cGVFdmVudF0pIHtcbiAgICAgICAgcmV0dXJuO1xuICAgICAgfVxuXG4gICAgICByZW1vdmVIYW5kbGVyKGVsZW1lbnQsIGV2ZW50cywgdHlwZUV2ZW50LCBvcmlnaW5hbEhhbmRsZXIsIGRlbGVnYXRpb24gPyBoYW5kbGVyIDogbnVsbCk7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgaWYgKGlzTmFtZXNwYWNlKSB7XG4gICAgICBPYmplY3Qua2V5cyhldmVudHMpLmZvckVhY2goZnVuY3Rpb24gKGVsZW1lbnRFdmVudCkge1xuICAgICAgICByZW1vdmVOYW1lc3BhY2VkSGFuZGxlcnMoZWxlbWVudCwgZXZlbnRzLCBlbGVtZW50RXZlbnQsIG9yaWdpbmFsVHlwZUV2ZW50LnNsaWNlKDEpKTtcbiAgICAgIH0pO1xuICAgIH1cblxuICAgIHZhciBzdG9yZUVsZW1lbnRFdmVudCA9IGV2ZW50c1t0eXBlRXZlbnRdIHx8IHt9O1xuICAgIE9iamVjdC5rZXlzKHN0b3JlRWxlbWVudEV2ZW50KS5mb3JFYWNoKGZ1bmN0aW9uIChrZXlIYW5kbGVycykge1xuICAgICAgdmFyIGhhbmRsZXJLZXkgPSBrZXlIYW5kbGVycy5yZXBsYWNlKHN0cmlwVWlkUmVnZXgsICcnKTtcblxuICAgICAgaWYgKCFpbk5hbWVzcGFjZSB8fCBvcmlnaW5hbFR5cGVFdmVudC5pbmRleE9mKGhhbmRsZXJLZXkpID4gLTEpIHtcbiAgICAgICAgdmFyIGV2ZW50ID0gc3RvcmVFbGVtZW50RXZlbnRba2V5SGFuZGxlcnNdO1xuICAgICAgICByZW1vdmVIYW5kbGVyKGVsZW1lbnQsIGV2ZW50cywgdHlwZUV2ZW50LCBldmVudC5vcmlnaW5hbEhhbmRsZXIsIGV2ZW50LmRlbGVnYXRpb25TZWxlY3Rvcik7XG4gICAgICB9XG4gICAgfSk7XG4gIH0sXG4gIHRyaWdnZXI6IGZ1bmN0aW9uIHRyaWdnZXIoZWxlbWVudCwgZXZlbnQsIGFyZ3MpIHtcbiAgICBpZiAodHlwZW9mIGV2ZW50ICE9PSAnc3RyaW5nJyB8fCAhZWxlbWVudCkge1xuICAgICAgcmV0dXJuIG51bGw7XG4gICAgfVxuXG4gICAgdmFyIHR5cGVFdmVudCA9IGV2ZW50LnJlcGxhY2Uoc3RyaXBOYW1lUmVnZXgsICcnKTtcbiAgICB2YXIgaW5OYW1lc3BhY2UgPSBldmVudCAhPT0gdHlwZUV2ZW50O1xuICAgIHZhciBpc05hdGl2ZSA9IG5hdGl2ZUV2ZW50cy5pbmRleE9mKHR5cGVFdmVudCkgPiAtMTtcbiAgICB2YXIgalF1ZXJ5RXZlbnQ7XG4gICAgdmFyIGJ1YmJsZXMgPSB0cnVlO1xuICAgIHZhciBuYXRpdmVEaXNwYXRjaCA9IHRydWU7XG4gICAgdmFyIGRlZmF1bHRQcmV2ZW50ZWQgPSBmYWxzZTtcbiAgICB2YXIgZXZ0ID0gbnVsbDtcblxuICAgIGlmIChpbk5hbWVzcGFjZSAmJiAkKSB7XG4gICAgICBqUXVlcnlFdmVudCA9ICQuRXZlbnQoZXZlbnQsIGFyZ3MpO1xuICAgICAgJChlbGVtZW50KS50cmlnZ2VyKGpRdWVyeUV2ZW50KTtcbiAgICAgIGJ1YmJsZXMgPSAhalF1ZXJ5RXZlbnQuaXNQcm9wYWdhdGlvblN0b3BwZWQoKTtcbiAgICAgIG5hdGl2ZURpc3BhdGNoID0gIWpRdWVyeUV2ZW50LmlzSW1tZWRpYXRlUHJvcGFnYXRpb25TdG9wcGVkKCk7XG4gICAgICBkZWZhdWx0UHJldmVudGVkID0galF1ZXJ5RXZlbnQuaXNEZWZhdWx0UHJldmVudGVkKCk7XG4gICAgfVxuXG4gICAgaWYgKGlzTmF0aXZlKSB7XG4gICAgICBldnQgPSBkb2N1bWVudC5jcmVhdGVFdmVudCgnSFRNTEV2ZW50cycpO1xuICAgICAgZXZ0LmluaXRFdmVudCh0eXBlRXZlbnQsIGJ1YmJsZXMsIHRydWUpO1xuICAgIH0gZWxzZSB7XG4gICAgICBldnQgPSBuZXcgQ3VzdG9tRXZlbnQoZXZlbnQsIHtcbiAgICAgICAgYnViYmxlczogYnViYmxlcyxcbiAgICAgICAgY2FuY2VsYWJsZTogdHJ1ZVxuICAgICAgfSk7XG4gICAgfSAvLyBtZXJnZSBjdXN0b20gaW5mb3JtYXRpb25zIGluIG91ciBldmVudFxuXG5cbiAgICBpZiAodHlwZW9mIGFyZ3MgIT09ICd1bmRlZmluZWQnKSB7XG4gICAgICBPYmplY3Qua2V5cyhhcmdzKS5mb3JFYWNoKGZ1bmN0aW9uIChrZXkpIHtcbiAgICAgICAgT2JqZWN0LmRlZmluZVByb3BlcnR5KGV2dCwga2V5LCB7XG4gICAgICAgICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICAgICAgICByZXR1cm4gYXJnc1trZXldO1xuICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICBpZiAoZGVmYXVsdFByZXZlbnRlZCkge1xuICAgICAgZXZ0LnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgIGlmICghZGVmYXVsdFByZXZlbnRlZFByZXNlcnZlZE9uRGlzcGF0Y2gpIHtcbiAgICAgICAgT2JqZWN0LmRlZmluZVByb3BlcnR5KGV2dCwgJ2RlZmF1bHRQcmV2ZW50ZWQnLCB7XG4gICAgICAgICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgICAgfVxuICAgIH1cblxuICAgIGlmIChuYXRpdmVEaXNwYXRjaCkge1xuICAgICAgZWxlbWVudC5kaXNwYXRjaEV2ZW50KGV2dCk7XG4gICAgfVxuXG4gICAgaWYgKGV2dC5kZWZhdWx0UHJldmVudGVkICYmIHR5cGVvZiBqUXVlcnlFdmVudCAhPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgIGpRdWVyeUV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgfVxuXG4gICAgcmV0dXJuIGV2dDtcbiAgfVxufTtcblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENvbnN0YW50c1xuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIE5BTUUgPSAnYXN5bmNMb2FkJztcbnZhciBWRVJTSU9OID0gJzMuMi4wJztcbnZhciBEQVRBX0tFWSA9ICdjb3JldWkuYXN5bmNMb2FkJztcbnZhciBFVkVOVF9LRVkgPSBcIi5cIiArIERBVEFfS0VZO1xudmFyIERBVEFfQVBJX0tFWSA9ICcuZGF0YS1hcGknO1xudmFyIENMQVNTX05BTUVfQUNUSVZFID0gJ2MtYWN0aXZlJztcbnZhciBDTEFTU19OQU1FX05BVl9EUk9QRE9XTl9UT0dHTEUgPSAnYy1zaWRlYmFyLW5hdi1kcm9wZG93bi10b2dnbGUnO1xudmFyIENMQVNTX05BTUVfTkFWX0xJTksgPSAnYy1zaWRlYmFyLW5hdi1saW5rJztcbnZhciBDTEFTU19OQU1FX1NIT1cgPSAnYy1zaG93JztcbnZhciBDTEFTU19OQU1FX1ZJRVdfU0NSSVBUID0gJ3ZpZXctc2NyaXB0JztcbnZhciBFVkVOVF9DTElDS19EQVRBX0FQSSA9IFwiY2xpY2tcIiArIEVWRU5UX0tFWSArIERBVEFfQVBJX0tFWTtcbnZhciBFVkVOVF9YSFJfU1RBVFVTID0gJ3hocic7XG52YXIgU0VMRUNUT1JfTkFWX0RST1BET1dOID0gJy5jLXNpZGViYXItbmF2LWRyb3Bkb3duJztcbnZhciBTRUxFQ1RPUl9OQVZfTElOSyA9ICcuYy14aHItbGluaywgLmMtc2lkZWJhci1uYXYtbGluayc7XG52YXIgU0VMRUNUT1JfTkFWX0lURU0gPSAnLmMtc2lkZWJhci1uYXYtaXRlbSc7XG52YXIgU0VMRUNUT1JfVklFV19TQ1JJUFQgPSAnLnZpZXctc2NyaXB0JztcbnZhciBEZWZhdWx0ID0ge1xuICBkZWZhdWx0UGFnZTogJ21haW4uaHRtbCcsXG4gIGVycm9yUGFnZTogJzQwNC5odG1sJyxcbiAgc3VicGFnZXNEaXJlY3Rvcnk6ICd2aWV3cy8nXG59O1xuXG52YXIgQXN5bmNMb2FkID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gQXN5bmNMb2FkKGVsZW1lbnQsIGNvbmZpZykge1xuICAgIHRoaXMuX2NvbmZpZyA9IHRoaXMuX2dldENvbmZpZyhjb25maWcpO1xuICAgIHRoaXMuX2VsZW1lbnQgPSBlbGVtZW50OyAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgbm8tcmVzdHJpY3RlZC1nbG9iYWxzXG5cbiAgICB2YXIgdXJsID0gbG9jYXRpb24uaGFzaC5yZXBsYWNlKC9eIy8sICcnKTsgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIG5vLW5lZ2F0ZWQtY29uZGl0aW9uXG5cbiAgICBpZiAodXJsICE9PSAnJykge1xuICAgICAgdGhpcy5fc2V0VXBVcmwodXJsKTtcbiAgICB9IGVsc2Uge1xuICAgICAgdGhpcy5fc2V0VXBVcmwodGhpcy5fY29uZmlnLmRlZmF1bHRQYWdlKTtcbiAgICB9XG5cbiAgICB0aGlzLl9hZGRFdmVudExpc3RlbmVycygpO1xuICB9IC8vIEdldHRlcnNcblxuXG4gIHZhciBfcHJvdG8gPSBBc3luY0xvYWQucHJvdG90eXBlO1xuXG4gIC8vIFByaXZhdGVcbiAgX3Byb3RvLl9nZXRDb25maWcgPSBmdW5jdGlvbiBfZ2V0Q29uZmlnKGNvbmZpZykge1xuICAgIGNvbmZpZyA9IF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCBEZWZhdWx0KSwgY29uZmlnKTtcbiAgICByZXR1cm4gY29uZmlnO1xuICB9O1xuXG4gIF9wcm90by5fbG9hZFBhZ2UgPSBmdW5jdGlvbiBfbG9hZFBhZ2UodXJsKSB7XG4gICAgdmFyIF90aGlzID0gdGhpcztcblxuICAgIHZhciBlbGVtZW50ID0gdGhpcy5fZWxlbWVudDtcbiAgICB2YXIgY29uZmlnID0gdGhpcy5fY29uZmlnO1xuXG4gICAgdmFyIGxvYWRTY3JpcHRzID0gZnVuY3Rpb24gbG9hZFNjcmlwdHMoc3JjLCBlbGVtZW50KSB7XG4gICAgICBpZiAoZWxlbWVudCA9PT0gdm9pZCAwKSB7XG4gICAgICAgIGVsZW1lbnQgPSAwO1xuICAgICAgfVxuXG4gICAgICB2YXIgc2NyaXB0ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnc2NyaXB0Jyk7XG4gICAgICBzY3JpcHQudHlwZSA9ICd0ZXh0L2phdmFzY3JpcHQnO1xuICAgICAgc2NyaXB0LnNyYyA9IHNyY1tlbGVtZW50XTtcbiAgICAgIHNjcmlwdC5jbGFzc05hbWUgPSBDTEFTU19OQU1FX1ZJRVdfU0NSSVBUOyAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgbm8tbXVsdGktYXNzaWduLCB1bmljb3JuL3ByZWZlci1hZGQtZXZlbnQtbGlzdGVuZXJcblxuICAgICAgc2NyaXB0Lm9ubG9hZCA9IHNjcmlwdC5vbnJlYWR5c3RhdGVjaGFuZ2UgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmICghX3RoaXMucmVhZHlTdGF0ZSB8fCBfdGhpcy5yZWFkeVN0YXRlID09PSAnY29tcGxldGUnKSB7XG4gICAgICAgICAgaWYgKHNyYy5sZW5ndGggPiBlbGVtZW50ICsgMSkge1xuICAgICAgICAgICAgbG9hZFNjcmlwdHMoc3JjLCBlbGVtZW50ICsgMSk7XG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9O1xuXG4gICAgICB2YXIgYm9keSA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKCdib2R5JylbMF07XG4gICAgICBib2R5LmFwcGVuZENoaWxkKHNjcmlwdCk7XG4gICAgfTtcblxuICAgIHZhciByZW1vdmVTY3JpcHRzID0gZnVuY3Rpb24gcmVtb3ZlU2NyaXB0cygpIHtcbiAgICAgIHZhciBvbGRTY3JpcHRzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChTRUxFQ1RPUl9WSUVXX1NDUklQVCk7XG5cbiAgICAgIGlmIChvbGRTY3JpcHRzLmxlbmd0aCkge1xuICAgICAgICBvbGRTY3JpcHRzLmZvckVhY2goZnVuY3Rpb24gKG9sZFNjcmlwdCkge1xuICAgICAgICAgIG9sZFNjcmlwdC5yZW1vdmUoKTtcbiAgICAgICAgfSk7XG4gICAgICB9XG4gICAgfTtcblxuICAgIHZhciB4aHIgPSBuZXcgWE1MSHR0cFJlcXVlc3QoKTtcbiAgICB4aHIub3BlbignR0VUJywgY29uZmlnLnN1YnBhZ2VzRGlyZWN0b3J5ICsgdXJsKTtcbiAgICB2YXIgZXZlbnQgPSBuZXcgQ3VzdG9tRXZlbnQoRVZFTlRfWEhSX1NUQVRVUywge1xuICAgICAgZGV0YWlsOiB7XG4gICAgICAgIHVybDogdXJsLFxuICAgICAgICBzdGF0dXM6IHhoci5zdGF0dXNcbiAgICAgIH1cbiAgICB9KTtcbiAgICBlbGVtZW50LmRpc3BhdGNoRXZlbnQoZXZlbnQpOyAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgdW5pY29ybi9wcmVmZXItYWRkLWV2ZW50LWxpc3RlbmVyXG5cbiAgICB4aHIub25sb2FkID0gZnVuY3Rpb24gKHJlc3VsdCkge1xuICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMCkge1xuICAgICAgICBldmVudCA9IG5ldyBDdXN0b21FdmVudChFVkVOVF9YSFJfU1RBVFVTLCB7XG4gICAgICAgICAgZGV0YWlsOiB7XG4gICAgICAgICAgICB1cmw6IHVybCxcbiAgICAgICAgICAgIHN0YXR1czogeGhyLnN0YXR1c1xuICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgICAgIGVsZW1lbnQuZGlzcGF0Y2hFdmVudChldmVudCk7XG4gICAgICAgIHZhciB3cmFwcGVyID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7XG4gICAgICAgIHdyYXBwZXIuaW5uZXJIVE1MID0gcmVzdWx0LnRhcmdldC5yZXNwb25zZTsgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIHVuaWNvcm4vcHJlZmVyLXNwcmVhZFxuXG4gICAgICAgIHZhciBzY3JpcHRzID0gQXJyYXkuZnJvbSh3cmFwcGVyLnF1ZXJ5U2VsZWN0b3JBbGwoJ3NjcmlwdCcpKS5tYXAoZnVuY3Rpb24gKHNjcmlwdCkge1xuICAgICAgICAgIHJldHVybiBzY3JpcHQuYXR0cmlidXRlcy5nZXROYW1lZEl0ZW0oJ3NyYycpLm5vZGVWYWx1ZTtcbiAgICAgICAgfSk7XG4gICAgICAgIHdyYXBwZXIucXVlcnlTZWxlY3RvckFsbCgnc2NyaXB0JykuZm9yRWFjaChmdW5jdGlvbiAoc2NyaXB0KSB7XG4gICAgICAgICAgcmV0dXJuIHNjcmlwdC5yZW1vdmUoc2NyaXB0KTtcbiAgICAgICAgfSk7XG4gICAgICAgIHdpbmRvdy5zY3JvbGxUbygwLCAwKTtcbiAgICAgICAgZWxlbWVudC5pbm5lckhUTUwgPSAnJztcbiAgICAgICAgZWxlbWVudC5hcHBlbmRDaGlsZCh3cmFwcGVyKTtcbiAgICAgICAgcmVtb3ZlU2NyaXB0cygpO1xuXG4gICAgICAgIGlmIChzY3JpcHRzLmxlbmd0aCkge1xuICAgICAgICAgIGxvYWRTY3JpcHRzKHNjcmlwdHMpO1xuICAgICAgICB9XG5cbiAgICAgICAgd2luZG93LmxvY2F0aW9uLmhhc2ggPSB1cmw7XG4gICAgICB9IGVsc2Uge1xuICAgICAgICB3aW5kb3cubG9jYXRpb24uaHJlZiA9IGNvbmZpZy5lcnJvclBhZ2U7XG4gICAgICB9XG4gICAgfTtcblxuICAgIHhoci5zZW5kKCk7XG4gIH07XG5cbiAgX3Byb3RvLl9zZXRVcFVybCA9IGZ1bmN0aW9uIF9zZXRVcFVybCh1cmwpIHtcbiAgICB1cmwgPSB1cmwucmVwbGFjZSgvXlxcLy8sICcnKS5zcGxpdCgnPycpWzBdOyAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgdW5pY29ybi9wcmVmZXItc3ByZWFkXG5cbiAgICBBcnJheS5mcm9tKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoU0VMRUNUT1JfTkFWX0xJTkspKS5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtZW50KSB7XG4gICAgICBlbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9BQ1RJVkUpO1xuICAgIH0pOyAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgdW5pY29ybi9wcmVmZXItc3ByZWFkXG5cbiAgICBBcnJheS5mcm9tKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoU0VMRUNUT1JfTkFWX0xJTkspKS5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtZW50KSB7XG4gICAgICBlbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9BQ1RJVkUpO1xuICAgIH0pOyAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgdW5pY29ybi9wcmVmZXItc3ByZWFkXG5cbiAgICBBcnJheS5mcm9tKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoU0VMRUNUT1JfTkFWX0RST1BET1dOKSkuZm9yRWFjaChmdW5jdGlvbiAoZWxlbWVudCkge1xuICAgICAgZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTX05BTUVfU0hPVyk7XG4gICAgfSk7IC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSB1bmljb3JuL3ByZWZlci1zcHJlYWRcblxuICAgIEFycmF5LmZyb20oZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChTRUxFQ1RPUl9OQVZfRFJPUERPV04pKS5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtZW50KSB7XG4gICAgICAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgdW5pY29ybi9wcmVmZXItc3ByZWFkXG4gICAgICBpZiAoQXJyYXkuZnJvbShlbGVtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCJhW2hyZWYqPVxcXCJcIiArIHVybCArIFwiXFxcIl1cIikpLmxlbmd0aCA+IDApIHtcbiAgICAgICAgZWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfU0hPVyk7XG4gICAgICB9XG4gICAgfSk7IC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSB1bmljb3JuL3ByZWZlci1zcHJlYWRcblxuICAgIEFycmF5LmZyb20oZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChTRUxFQ1RPUl9OQVZfSVRFTSArIFwiIGFbaHJlZio9XFxcIlwiICsgdXJsICsgXCJcXFwiXVwiKSkuZm9yRWFjaChmdW5jdGlvbiAoZWxlbWVudCkge1xuICAgICAgZWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfQUNUSVZFKTtcbiAgICB9KTtcblxuICAgIHRoaXMuX2xvYWRQYWdlKHVybCk7XG4gIH07XG5cbiAgX3Byb3RvLl9sb2FkQmxhbmsgPSBmdW5jdGlvbiBfbG9hZEJsYW5rKHVybCkge1xuICAgIHdpbmRvdy5vcGVuKHVybCk7XG4gIH07XG5cbiAgX3Byb3RvLl9sb2FkVG9wID0gZnVuY3Rpb24gX2xvYWRUb3AodXJsKSB7XG4gICAgd2luZG93LmxvY2F0aW9uID0gdXJsO1xuICB9O1xuXG4gIF9wcm90by5fdXBkYXRlID0gZnVuY3Rpb24gX3VwZGF0ZShsaW5rKSB7XG4gICAgaWYgKGxpbmsuaHJlZiAhPT0gJyMnKSB7XG4gICAgICBpZiAodHlwZW9mIGxpbmsuZGF0YXNldC50b2dnbGUgPT09ICd1bmRlZmluZWQnIHx8IGxpbmsuZGF0YXNldC50b2dnbGUgPT09ICdudWxsJykge1xuICAgICAgICBpZiAobGluay50YXJnZXQgPT09ICdfdG9wJykge1xuICAgICAgICAgIHRoaXMuX2xvYWRUb3AobGluay5ocmVmKTtcbiAgICAgICAgfSBlbHNlIGlmIChsaW5rLnRhcmdldCA9PT0gJ19ibGFuaycpIHtcbiAgICAgICAgICB0aGlzLl9sb2FkQmxhbmsobGluay5ocmVmKTtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICB0aGlzLl9zZXRVcFVybChsaW5rLmdldEF0dHJpYnV0ZSgnaHJlZicpKTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH1cbiAgfTtcblxuICBfcHJvdG8uX2FkZEV2ZW50TGlzdGVuZXJzID0gZnVuY3Rpb24gX2FkZEV2ZW50TGlzdGVuZXJzKCkge1xuICAgIHZhciBfdGhpczIgPSB0aGlzO1xuXG4gICAgRXZlbnRIYW5kbGVyLm9uKGRvY3VtZW50LCBFVkVOVF9DTElDS19EQVRBX0FQSSwgU0VMRUNUT1JfTkFWX0xJTkssIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcbiAgICAgIHZhciBsaW5rID0gZXZlbnQudGFyZ2V0O1xuXG4gICAgICBpZiAoIWxpbmsuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfTkFWX0xJTkspKSB7XG4gICAgICAgIGxpbmsgPSBsaW5rLmNsb3Nlc3QoU0VMRUNUT1JfTkFWX0xJTkspO1xuICAgICAgfVxuXG4gICAgICBpZiAoIWxpbmsuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfTkFWX0RST1BET1dOX1RPR0dMRSkgJiYgbGluay5nZXRBdHRyaWJ1dGUoJ2hyZWYnKSAhPT0gJyMnKSB7XG4gICAgICAgIF90aGlzMi5fdXBkYXRlKGxpbmspO1xuICAgICAgfVxuICAgIH0pO1xuICB9IC8vIFN0YXRpY1xuICA7XG5cbiAgQXN5bmNMb2FkLl9hc3luY0xvYWRJbnRlcmZhY2UgPSBmdW5jdGlvbiBfYXN5bmNMb2FkSW50ZXJmYWNlKGVsZW1lbnQsIGNvbmZpZykge1xuICAgIHZhciBkYXRhID0gRGF0YS5nZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZKTtcblxuICAgIHZhciBfY29uZmlnID0gdHlwZW9mIGNvbmZpZyA9PT0gJ29iamVjdCcgJiYgY29uZmlnO1xuXG4gICAgaWYgKCFkYXRhKSB7XG4gICAgICBkYXRhID0gbmV3IEFzeW5jTG9hZChlbGVtZW50LCBfY29uZmlnKTtcbiAgICB9XG5cbiAgICBpZiAodHlwZW9mIGNvbmZpZyA9PT0gJ3N0cmluZycpIHtcbiAgICAgIGlmICh0eXBlb2YgZGF0YVtjb25maWddID09PSAndW5kZWZpbmVkJykge1xuICAgICAgICB0aHJvdyBuZXcgVHlwZUVycm9yKFwiTm8gbWV0aG9kIG5hbWVkIFxcXCJcIiArIGNvbmZpZyArIFwiXFxcIlwiKTtcbiAgICAgIH1cblxuICAgICAgZGF0YVtjb25maWddKCk7XG4gICAgfVxuICB9O1xuXG4gIEFzeW5jTG9hZC5qUXVlcnlJbnRlcmZhY2UgPSBmdW5jdGlvbiBqUXVlcnlJbnRlcmZhY2UoY29uZmlnKSB7XG4gICAgcmV0dXJuIHRoaXMuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICBBc3luY0xvYWQuX2FzeW5jTG9hZEludGVyZmFjZSh0aGlzLCBjb25maWcpO1xuICAgIH0pO1xuICB9O1xuXG4gIF9jcmVhdGVDbGFzcyhBc3luY0xvYWQsIG51bGwsIFt7XG4gICAga2V5OiBcIlZFUlNJT05cIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBWRVJTSU9OO1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJEZWZhdWx0XCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRGVmYXVsdDtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gQXN5bmNMb2FkO1xufSgpO1xuXG52YXIgJCQxID0gZ2V0alF1ZXJ5KCk7XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogalF1ZXJ5XG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIGFkZCAuYXN5bmNMb2FkIHRvIGpRdWVyeSBvbmx5IGlmIGpRdWVyeSBpcyBwcmVzZW50XG4gKi9cblxuaWYgKCQkMSkge1xuICB2YXIgSlFVRVJZX05PX0NPTkZMSUNUID0gJCQxLmZuW05BTUVdO1xuICAkJDEuZm5bTkFNRV0gPSBBc3luY0xvYWQualF1ZXJ5SW50ZXJmYWNlO1xuICAkJDEuZm5bTkFNRV0uQ29uc3RydWN0b3IgPSBBc3luY0xvYWQ7XG5cbiAgJCQxLmZuW05BTUVdLm5vQ29uZmxpY3QgPSBmdW5jdGlvbiAoKSB7XG4gICAgJCQxLmZuW05BTUVdID0gSlFVRVJZX05PX0NPTkZMSUNUO1xuICAgIHJldHVybiBBc3luY0xvYWQualF1ZXJ5SW50ZXJmYWNlO1xuICB9O1xufVxuXG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ29uc3RhbnRzXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgTkFNRSQxID0gJ2FsZXJ0JztcbnZhciBWRVJTSU9OJDEgPSAnMy4yLjAnO1xudmFyIERBVEFfS0VZJDEgPSAnY29yZXVpLmFsZXJ0JztcbnZhciBFVkVOVF9LRVkkMSA9IFwiLlwiICsgREFUQV9LRVkkMTtcbnZhciBEQVRBX0FQSV9LRVkkMSA9ICcuZGF0YS1hcGknO1xudmFyIFNFTEVDVE9SX0RJU01JU1MgPSAnW2RhdGEtZGlzbWlzcz1cImFsZXJ0XCJdJztcbnZhciBFVkVOVF9DTE9TRSA9IFwiY2xvc2VcIiArIEVWRU5UX0tFWSQxO1xudmFyIEVWRU5UX0NMT1NFRCA9IFwiY2xvc2VkXCIgKyBFVkVOVF9LRVkkMTtcbnZhciBFVkVOVF9DTElDS19EQVRBX0FQSSQxID0gXCJjbGlja1wiICsgRVZFTlRfS0VZJDEgKyBEQVRBX0FQSV9LRVkkMTtcbnZhciBDTEFTU05BTUVfQUxFUlQgPSAnYWxlcnQnO1xudmFyIENMQVNTTkFNRV9GQURFID0gJ2ZhZGUnO1xudmFyIENMQVNTTkFNRV9TSE9XID0gJ3Nob3cnO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENsYXNzIERlZmluaXRpb25cbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cbnZhciBBbGVydCA9IC8qI19fUFVSRV9fKi9mdW5jdGlvbiAoKSB7XG4gIGZ1bmN0aW9uIEFsZXJ0KGVsZW1lbnQpIHtcbiAgICB0aGlzLl9lbGVtZW50ID0gZWxlbWVudDtcblxuICAgIGlmICh0aGlzLl9lbGVtZW50KSB7XG4gICAgICBEYXRhLnNldERhdGEoZWxlbWVudCwgREFUQV9LRVkkMSwgdGhpcyk7XG4gICAgfVxuICB9IC8vIEdldHRlcnNcblxuXG4gIHZhciBfcHJvdG8gPSBBbGVydC5wcm90b3R5cGU7XG5cbiAgLy8gUHVibGljXG4gIF9wcm90by5jbG9zZSA9IGZ1bmN0aW9uIGNsb3NlKGVsZW1lbnQpIHtcbiAgICB2YXIgcm9vdEVsZW1lbnQgPSB0aGlzLl9lbGVtZW50O1xuXG4gICAgaWYgKGVsZW1lbnQpIHtcbiAgICAgIHJvb3RFbGVtZW50ID0gdGhpcy5fZ2V0Um9vdEVsZW1lbnQoZWxlbWVudCk7XG4gICAgfVxuXG4gICAgdmFyIGN1c3RvbUV2ZW50ID0gdGhpcy5fdHJpZ2dlckNsb3NlRXZlbnQocm9vdEVsZW1lbnQpO1xuXG4gICAgaWYgKGN1c3RvbUV2ZW50ID09PSBudWxsIHx8IGN1c3RvbUV2ZW50LmRlZmF1bHRQcmV2ZW50ZWQpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB0aGlzLl9yZW1vdmVFbGVtZW50KHJvb3RFbGVtZW50KTtcbiAgfTtcblxuICBfcHJvdG8uZGlzcG9zZSA9IGZ1bmN0aW9uIGRpc3Bvc2UoKSB7XG4gICAgRGF0YS5yZW1vdmVEYXRhKHRoaXMuX2VsZW1lbnQsIERBVEFfS0VZJDEpO1xuICAgIHRoaXMuX2VsZW1lbnQgPSBudWxsO1xuICB9IC8vIFByaXZhdGVcbiAgO1xuXG4gIF9wcm90by5fZ2V0Um9vdEVsZW1lbnQgPSBmdW5jdGlvbiBfZ2V0Um9vdEVsZW1lbnQoZWxlbWVudCkge1xuICAgIHJldHVybiBnZXRFbGVtZW50RnJvbVNlbGVjdG9yKGVsZW1lbnQpIHx8IGVsZW1lbnQuY2xvc2VzdChcIi5cIiArIENMQVNTTkFNRV9BTEVSVCk7XG4gIH07XG5cbiAgX3Byb3RvLl90cmlnZ2VyQ2xvc2VFdmVudCA9IGZ1bmN0aW9uIF90cmlnZ2VyQ2xvc2VFdmVudChlbGVtZW50KSB7XG4gICAgcmV0dXJuIEV2ZW50SGFuZGxlci50cmlnZ2VyKGVsZW1lbnQsIEVWRU5UX0NMT1NFKTtcbiAgfTtcblxuICBfcHJvdG8uX3JlbW92ZUVsZW1lbnQgPSBmdW5jdGlvbiBfcmVtb3ZlRWxlbWVudChlbGVtZW50KSB7XG4gICAgdmFyIF90aGlzID0gdGhpcztcblxuICAgIGVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShDTEFTU05BTUVfU0hPVyk7XG5cbiAgICBpZiAoIWVsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTTkFNRV9GQURFKSkge1xuICAgICAgdGhpcy5fZGVzdHJveUVsZW1lbnQoZWxlbWVudCk7XG5cbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB2YXIgdHJhbnNpdGlvbkR1cmF0aW9uID0gZ2V0VHJhbnNpdGlvbkR1cmF0aW9uRnJvbUVsZW1lbnQoZWxlbWVudCk7XG4gICAgRXZlbnRIYW5kbGVyLm9uZShlbGVtZW50LCBUUkFOU0lUSU9OX0VORCwgZnVuY3Rpb24gKCkge1xuICAgICAgcmV0dXJuIF90aGlzLl9kZXN0cm95RWxlbWVudChlbGVtZW50KTtcbiAgICB9KTtcbiAgICBlbXVsYXRlVHJhbnNpdGlvbkVuZChlbGVtZW50LCB0cmFuc2l0aW9uRHVyYXRpb24pO1xuICB9O1xuXG4gIF9wcm90by5fZGVzdHJveUVsZW1lbnQgPSBmdW5jdGlvbiBfZGVzdHJveUVsZW1lbnQoZWxlbWVudCkge1xuICAgIGlmIChlbGVtZW50LnBhcmVudE5vZGUpIHtcbiAgICAgIGVsZW1lbnQucGFyZW50Tm9kZS5yZW1vdmVDaGlsZChlbGVtZW50KTtcbiAgICB9XG5cbiAgICBFdmVudEhhbmRsZXIudHJpZ2dlcihlbGVtZW50LCBFVkVOVF9DTE9TRUQpO1xuICB9IC8vIFN0YXRpY1xuICA7XG5cbiAgQWxlcnQualF1ZXJ5SW50ZXJmYWNlID0gZnVuY3Rpb24galF1ZXJ5SW50ZXJmYWNlKGNvbmZpZykge1xuICAgIHJldHVybiB0aGlzLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgdmFyIGRhdGEgPSBEYXRhLmdldERhdGEodGhpcywgREFUQV9LRVkkMSk7XG5cbiAgICAgIGlmICghZGF0YSkge1xuICAgICAgICBkYXRhID0gbmV3IEFsZXJ0KHRoaXMpO1xuICAgICAgfVxuXG4gICAgICBpZiAoY29uZmlnID09PSAnY2xvc2UnKSB7XG4gICAgICAgIGRhdGFbY29uZmlnXSh0aGlzKTtcbiAgICAgIH1cbiAgICB9KTtcbiAgfTtcblxuICBBbGVydC5oYW5kbGVEaXNtaXNzID0gZnVuY3Rpb24gaGFuZGxlRGlzbWlzcyhhbGVydEluc3RhbmNlKSB7XG4gICAgcmV0dXJuIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgaWYgKGV2ZW50KSB7XG4gICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgICB9XG5cbiAgICAgIGFsZXJ0SW5zdGFuY2UuY2xvc2UodGhpcyk7XG4gICAgfTtcbiAgfTtcblxuICBBbGVydC5nZXRJbnN0YW5jZSA9IGZ1bmN0aW9uIGdldEluc3RhbmNlKGVsZW1lbnQpIHtcbiAgICByZXR1cm4gRGF0YS5nZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJDEpO1xuICB9O1xuXG4gIF9jcmVhdGVDbGFzcyhBbGVydCwgbnVsbCwgW3tcbiAgICBrZXk6IFwiVkVSU0lPTlwiLFxuICAgIGdldDogZnVuY3Rpb24gZ2V0KCkge1xuICAgICAgcmV0dXJuIFZFUlNJT04kMTtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gQWxlcnQ7XG59KCk7XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogRGF0YSBBcGkgaW1wbGVtZW50YXRpb25cbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cblxuRXZlbnRIYW5kbGVyLm9uKGRvY3VtZW50LCBFVkVOVF9DTElDS19EQVRBX0FQSSQxLCBTRUxFQ1RPUl9ESVNNSVNTLCBBbGVydC5oYW5kbGVEaXNtaXNzKG5ldyBBbGVydCgpKSk7XG52YXIgJCQyID0gZ2V0alF1ZXJ5KCk7XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogalF1ZXJ5XG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIGFkZCAuYWxlcnQgdG8galF1ZXJ5IG9ubHkgaWYgalF1ZXJ5IGlzIHByZXNlbnRcbiAqL1xuXG4vKiBpc3RhbmJ1bCBpZ25vcmUgaWYgKi9cblxuaWYgKCQkMikge1xuICB2YXIgSlFVRVJZX05PX0NPTkZMSUNUJDEgPSAkJDIuZm5bTkFNRSQxXTtcbiAgJCQyLmZuW05BTUUkMV0gPSBBbGVydC5qUXVlcnlJbnRlcmZhY2U7XG4gICQkMi5mbltOQU1FJDFdLkNvbnN0cnVjdG9yID0gQWxlcnQ7XG5cbiAgJCQyLmZuW05BTUUkMV0ubm9Db25mbGljdCA9IGZ1bmN0aW9uICgpIHtcbiAgICAkJDIuZm5bTkFNRSQxXSA9IEpRVUVSWV9OT19DT05GTElDVCQxO1xuICAgIHJldHVybiBBbGVydC5qUXVlcnlJbnRlcmZhY2U7XG4gIH07XG59XG5cbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIEJvb3RzdHJhcCAodjUuMC4wLWFscGhhMSk6IGRvbS9zZWxlY3Rvci1lbmdpbmUuanNcbiAqIExpY2Vuc2VkIHVuZGVyIE1JVCAoaHR0cHM6Ly9naXRodWIuY29tL3R3YnMvYm9vdHN0cmFwL2Jsb2IvbWFzdGVyL0xJQ0VOU0UpXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ29uc3RhbnRzXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgTk9ERV9URVhUID0gMztcbnZhciBTZWxlY3RvckVuZ2luZSA9IHtcbiAgbWF0Y2hlczogZnVuY3Rpb24gbWF0Y2hlcyhlbGVtZW50LCBzZWxlY3Rvcikge1xuICAgIHJldHVybiBlbGVtZW50Lm1hdGNoZXMoc2VsZWN0b3IpO1xuICB9LFxuICBmaW5kOiBmdW5jdGlvbiBmaW5kJDEoc2VsZWN0b3IsIGVsZW1lbnQpIHtcbiAgICB2YXIgX3JlZjtcblxuICAgIGlmIChlbGVtZW50ID09PSB2b2lkIDApIHtcbiAgICAgIGVsZW1lbnQgPSBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQ7XG4gICAgfVxuXG4gICAgcmV0dXJuIChfcmVmID0gW10pLmNvbmNhdC5hcHBseShfcmVmLCBmaW5kLmNhbGwoZWxlbWVudCwgc2VsZWN0b3IpKTtcbiAgfSxcbiAgZmluZE9uZTogZnVuY3Rpb24gZmluZE9uZSQxKHNlbGVjdG9yLCBlbGVtZW50KSB7XG4gICAgaWYgKGVsZW1lbnQgPT09IHZvaWQgMCkge1xuICAgICAgZWxlbWVudCA9IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudDtcbiAgICB9XG5cbiAgICByZXR1cm4gZmluZE9uZS5jYWxsKGVsZW1lbnQsIHNlbGVjdG9yKTtcbiAgfSxcbiAgY2hpbGRyZW46IGZ1bmN0aW9uIGNoaWxkcmVuKGVsZW1lbnQsIHNlbGVjdG9yKSB7XG4gICAgdmFyIF9yZWYyO1xuXG4gICAgdmFyIGNoaWxkcmVuID0gKF9yZWYyID0gW10pLmNvbmNhdC5hcHBseShfcmVmMiwgZWxlbWVudC5jaGlsZHJlbik7XG5cbiAgICByZXR1cm4gY2hpbGRyZW4uZmlsdGVyKGZ1bmN0aW9uIChjaGlsZCkge1xuICAgICAgcmV0dXJuIGNoaWxkLm1hdGNoZXMoc2VsZWN0b3IpO1xuICAgIH0pO1xuICB9LFxuICBwYXJlbnRzOiBmdW5jdGlvbiBwYXJlbnRzKGVsZW1lbnQsIHNlbGVjdG9yKSB7XG4gICAgdmFyIHBhcmVudHMgPSBbXTtcbiAgICB2YXIgYW5jZXN0b3IgPSBlbGVtZW50LnBhcmVudE5vZGU7XG5cbiAgICB3aGlsZSAoYW5jZXN0b3IgJiYgYW5jZXN0b3Iubm9kZVR5cGUgPT09IE5vZGUuRUxFTUVOVF9OT0RFICYmIGFuY2VzdG9yLm5vZGVUeXBlICE9PSBOT0RFX1RFWFQpIHtcbiAgICAgIGlmICh0aGlzLm1hdGNoZXMoYW5jZXN0b3IsIHNlbGVjdG9yKSkge1xuICAgICAgICBwYXJlbnRzLnB1c2goYW5jZXN0b3IpO1xuICAgICAgfVxuXG4gICAgICBhbmNlc3RvciA9IGFuY2VzdG9yLnBhcmVudE5vZGU7XG4gICAgfVxuXG4gICAgcmV0dXJuIHBhcmVudHM7XG4gIH0sXG4gIHByZXY6IGZ1bmN0aW9uIHByZXYoZWxlbWVudCwgc2VsZWN0b3IpIHtcbiAgICB2YXIgcHJldmlvdXMgPSBlbGVtZW50LnByZXZpb3VzRWxlbWVudFNpYmxpbmc7XG5cbiAgICB3aGlsZSAocHJldmlvdXMpIHtcbiAgICAgIGlmIChwcmV2aW91cy5tYXRjaGVzKHNlbGVjdG9yKSkge1xuICAgICAgICByZXR1cm4gW3ByZXZpb3VzXTtcbiAgICAgIH1cblxuICAgICAgcHJldmlvdXMgPSBwcmV2aW91cy5wcmV2aW91c0VsZW1lbnRTaWJsaW5nO1xuICAgIH1cblxuICAgIHJldHVybiBbXTtcbiAgfSxcbiAgbmV4dDogZnVuY3Rpb24gbmV4dChlbGVtZW50LCBzZWxlY3Rvcikge1xuICAgIHZhciBuZXh0ID0gZWxlbWVudC5uZXh0RWxlbWVudFNpYmxpbmc7XG5cbiAgICB3aGlsZSAobmV4dCkge1xuICAgICAgaWYgKHRoaXMubWF0Y2hlcyhuZXh0LCBzZWxlY3RvcikpIHtcbiAgICAgICAgcmV0dXJuIFtuZXh0XTtcbiAgICAgIH1cblxuICAgICAgbmV4dCA9IG5leHQubmV4dEVsZW1lbnRTaWJsaW5nO1xuICAgIH1cblxuICAgIHJldHVybiBbXTtcbiAgfVxufTtcblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENvbnN0YW50c1xuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIE5BTUUkMiA9ICdidXR0b24nO1xudmFyIFZFUlNJT04kMiA9ICczLjIuMCc7XG52YXIgREFUQV9LRVkkMiA9ICdjb3JldWkuYnV0dG9uJztcbnZhciBFVkVOVF9LRVkkMiA9IFwiLlwiICsgREFUQV9LRVkkMjtcbnZhciBEQVRBX0FQSV9LRVkkMiA9ICcuZGF0YS1hcGknO1xudmFyIENMQVNTX05BTUVfQUNUSVZFJDEgPSAnYWN0aXZlJztcbnZhciBDTEFTU19OQU1FX0RJU0FCTEVEID0gJ2Rpc2FibGVkJztcbnZhciBDTEFTU19OQU1FX0ZPQ1VTID0gJ2ZvY3VzJztcbnZhciBTRUxFQ1RPUl9EQVRBX1RPR0dMRV9DQVJST1QgPSAnW2RhdGEtdG9nZ2xlXj1cImJ1dHRvblwiXSc7XG52YXIgU0VMRUNUT1JfREFUQV9UT0dHTEUgPSAnW2RhdGEtdG9nZ2xlPVwiYnV0dG9uc1wiXSc7XG52YXIgU0VMRUNUT1JfSU5QVVQgPSAnaW5wdXQ6bm90KFt0eXBlPVwiaGlkZGVuXCJdKSc7XG52YXIgU0VMRUNUT1JfQUNUSVZFID0gJy5hY3RpdmUnO1xudmFyIFNFTEVDVE9SX0JVVFRPTiA9ICcuYnRuJztcbnZhciBFVkVOVF9DTElDS19EQVRBX0FQSSQyID0gXCJjbGlja1wiICsgRVZFTlRfS0VZJDIgKyBEQVRBX0FQSV9LRVkkMjtcbnZhciBFVkVOVF9GT0NVU19EQVRBX0FQSSA9IFwiZm9jdXNcIiArIEVWRU5UX0tFWSQyICsgREFUQV9BUElfS0VZJDI7XG52YXIgRVZFTlRfQkxVUl9EQVRBX0FQSSA9IFwiYmx1clwiICsgRVZFTlRfS0VZJDIgKyBEQVRBX0FQSV9LRVkkMjtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDbGFzcyBEZWZpbml0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgQnV0dG9uID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gQnV0dG9uKGVsZW1lbnQpIHtcbiAgICB0aGlzLl9lbGVtZW50ID0gZWxlbWVudDtcbiAgICBEYXRhLnNldERhdGEoZWxlbWVudCwgREFUQV9LRVkkMiwgdGhpcyk7XG4gIH0gLy8gR2V0dGVyc1xuXG5cbiAgdmFyIF9wcm90byA9IEJ1dHRvbi5wcm90b3R5cGU7XG5cbiAgLy8gUHVibGljXG4gIF9wcm90by50b2dnbGUgPSBmdW5jdGlvbiB0b2dnbGUoKSB7XG4gICAgdmFyIHRyaWdnZXJDaGFuZ2VFdmVudCA9IHRydWU7XG4gICAgdmFyIGFkZEFyaWFQcmVzc2VkID0gdHJ1ZTtcblxuICAgIHZhciByb290RWxlbWVudCA9IHRoaXMuX2VsZW1lbnQuY2xvc2VzdChTRUxFQ1RPUl9EQVRBX1RPR0dMRSk7XG5cbiAgICBpZiAocm9vdEVsZW1lbnQpIHtcbiAgICAgIHZhciBpbnB1dCA9IFNlbGVjdG9yRW5naW5lLmZpbmRPbmUoU0VMRUNUT1JfSU5QVVQsIHRoaXMuX2VsZW1lbnQpO1xuXG4gICAgICBpZiAoaW5wdXQgJiYgaW5wdXQudHlwZSA9PT0gJ3JhZGlvJykge1xuICAgICAgICBpZiAoaW5wdXQuY2hlY2tlZCAmJiB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0FDVElWRSQxKSkge1xuICAgICAgICAgIHRyaWdnZXJDaGFuZ2VFdmVudCA9IGZhbHNlO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIHZhciBhY3RpdmVFbGVtZW50ID0gU2VsZWN0b3JFbmdpbmUuZmluZE9uZShTRUxFQ1RPUl9BQ1RJVkUsIHJvb3RFbGVtZW50KTtcblxuICAgICAgICAgIGlmIChhY3RpdmVFbGVtZW50KSB7XG4gICAgICAgICAgICBhY3RpdmVFbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9BQ1RJVkUkMSk7XG4gICAgICAgICAgfVxuICAgICAgICB9XG5cbiAgICAgICAgaWYgKHRyaWdnZXJDaGFuZ2VFdmVudCkge1xuICAgICAgICAgIGlmIChpbnB1dC5oYXNBdHRyaWJ1dGUoJ2Rpc2FibGVkJykgfHwgcm9vdEVsZW1lbnQuaGFzQXR0cmlidXRlKCdkaXNhYmxlZCcpIHx8IGlucHV0LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0RJU0FCTEVEKSB8fCByb290RWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9ESVNBQkxFRCkpIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICBpbnB1dC5jaGVja2VkID0gIXRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfQUNUSVZFJDEpO1xuICAgICAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKGlucHV0LCAnY2hhbmdlJyk7XG4gICAgICAgIH1cblxuICAgICAgICBpbnB1dC5mb2N1cygpO1xuICAgICAgICBhZGRBcmlhUHJlc3NlZCA9IGZhbHNlO1xuICAgICAgfVxuICAgIH1cblxuICAgIGlmIChhZGRBcmlhUHJlc3NlZCkge1xuICAgICAgdGhpcy5fZWxlbWVudC5zZXRBdHRyaWJ1dGUoJ2FyaWEtcHJlc3NlZCcsICF0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0FDVElWRSQxKSk7XG4gICAgfVxuXG4gICAgaWYgKHRyaWdnZXJDaGFuZ2VFdmVudCkge1xuICAgICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QudG9nZ2xlKENMQVNTX05BTUVfQUNUSVZFJDEpO1xuICAgIH1cbiAgfTtcblxuICBfcHJvdG8uZGlzcG9zZSA9IGZ1bmN0aW9uIGRpc3Bvc2UoKSB7XG4gICAgRGF0YS5yZW1vdmVEYXRhKHRoaXMuX2VsZW1lbnQsIERBVEFfS0VZJDIpO1xuICAgIHRoaXMuX2VsZW1lbnQgPSBudWxsO1xuICB9IC8vIFN0YXRpY1xuICA7XG5cbiAgQnV0dG9uLmpRdWVyeUludGVyZmFjZSA9IGZ1bmN0aW9uIGpRdWVyeUludGVyZmFjZShjb25maWcpIHtcbiAgICByZXR1cm4gdGhpcy5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgIHZhciBkYXRhID0gRGF0YS5nZXREYXRhKHRoaXMsIERBVEFfS0VZJDIpO1xuXG4gICAgICBpZiAoIWRhdGEpIHtcbiAgICAgICAgZGF0YSA9IG5ldyBCdXR0b24odGhpcyk7XG4gICAgICB9XG5cbiAgICAgIGlmIChjb25maWcgPT09ICd0b2dnbGUnKSB7XG4gICAgICAgIGRhdGFbY29uZmlnXSgpO1xuICAgICAgfVxuICAgIH0pO1xuICB9O1xuXG4gIEJ1dHRvbi5nZXRJbnN0YW5jZSA9IGZ1bmN0aW9uIGdldEluc3RhbmNlKGVsZW1lbnQpIHtcbiAgICByZXR1cm4gRGF0YS5nZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJDIpO1xuICB9O1xuXG4gIF9jcmVhdGVDbGFzcyhCdXR0b24sIG51bGwsIFt7XG4gICAga2V5OiBcIlZFUlNJT05cIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBWRVJTSU9OJDI7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIEJ1dHRvbjtcbn0oKTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBEYXRhIEFwaSBpbXBsZW1lbnRhdGlvblxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxuXG5FdmVudEhhbmRsZXIub24oZG9jdW1lbnQsIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDIsIFNFTEVDVE9SX0RBVEFfVE9HR0xFX0NBUlJPVCwgZnVuY3Rpb24gKGV2ZW50KSB7XG4gIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gIHZhciBidXR0b24gPSBldmVudC50YXJnZXQuY2xvc2VzdChTRUxFQ1RPUl9CVVRUT04pO1xuICB2YXIgZGF0YSA9IERhdGEuZ2V0RGF0YShidXR0b24sIERBVEFfS0VZJDIpO1xuXG4gIGlmICghZGF0YSkge1xuICAgIGRhdGEgPSBuZXcgQnV0dG9uKGJ1dHRvbik7XG4gIH1cblxuICBkYXRhLnRvZ2dsZSgpO1xufSk7XG5FdmVudEhhbmRsZXIub24oZG9jdW1lbnQsIEVWRU5UX0ZPQ1VTX0RBVEFfQVBJLCBTRUxFQ1RPUl9EQVRBX1RPR0dMRV9DQVJST1QsIGZ1bmN0aW9uIChldmVudCkge1xuICB2YXIgYnV0dG9uID0gZXZlbnQudGFyZ2V0LmNsb3Nlc3QoU0VMRUNUT1JfQlVUVE9OKTtcblxuICBpZiAoYnV0dG9uKSB7XG4gICAgYnV0dG9uLmNsYXNzTGlzdC5hZGQoQ0xBU1NfTkFNRV9GT0NVUyk7XG4gIH1cbn0pO1xuRXZlbnRIYW5kbGVyLm9uKGRvY3VtZW50LCBFVkVOVF9CTFVSX0RBVEFfQVBJLCBTRUxFQ1RPUl9EQVRBX1RPR0dMRV9DQVJST1QsIGZ1bmN0aW9uIChldmVudCkge1xuICB2YXIgYnV0dG9uID0gZXZlbnQudGFyZ2V0LmNsb3Nlc3QoU0VMRUNUT1JfQlVUVE9OKTtcblxuICBpZiAoYnV0dG9uKSB7XG4gICAgYnV0dG9uLmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9GT0NVUyk7XG4gIH1cbn0pO1xudmFyICQkMyA9IGdldGpRdWVyeSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIGpRdWVyeVxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBhZGQgLmJ1dHRvbiB0byBqUXVlcnkgb25seSBpZiBqUXVlcnkgaXMgcHJlc2VudFxuICovXG5cbi8qIGlzdGFuYnVsIGlnbm9yZSBpZiAqL1xuXG5pZiAoJCQzKSB7XG4gIHZhciBKUVVFUllfTk9fQ09ORkxJQ1QkMiA9ICQkMy5mbltOQU1FJDJdO1xuICAkJDMuZm5bTkFNRSQyXSA9IEJ1dHRvbi5qUXVlcnlJbnRlcmZhY2U7XG4gICQkMy5mbltOQU1FJDJdLkNvbnN0cnVjdG9yID0gQnV0dG9uO1xuXG4gICQkMy5mbltOQU1FJDJdLm5vQ29uZmxpY3QgPSBmdW5jdGlvbiAoKSB7XG4gICAgJCQzLmZuW05BTUUkMl0gPSBKUVVFUllfTk9fQ09ORkxJQ1QkMjtcbiAgICByZXR1cm4gQnV0dG9uLmpRdWVyeUludGVyZmFjZTtcbiAgfTtcbn1cblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQm9vdHN0cmFwICh2NS4wLjAtYWxwaGExKTogZG9tL21hbmlwdWxhdG9yLmpzXG4gKiBMaWNlbnNlZCB1bmRlciBNSVQgKGh0dHBzOi8vZ2l0aHViLmNvbS90d2JzL2Jvb3RzdHJhcC9ibG9iL21hc3Rlci9MSUNFTlNFKVxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuZnVuY3Rpb24gbm9ybWFsaXplRGF0YSh2YWwpIHtcbiAgaWYgKHZhbCA9PT0gJ3RydWUnKSB7XG4gICAgcmV0dXJuIHRydWU7XG4gIH1cblxuICBpZiAodmFsID09PSAnZmFsc2UnKSB7XG4gICAgcmV0dXJuIGZhbHNlO1xuICB9XG5cbiAgaWYgKHZhbCA9PT0gTnVtYmVyKHZhbCkudG9TdHJpbmcoKSkge1xuICAgIHJldHVybiBOdW1iZXIodmFsKTtcbiAgfVxuXG4gIGlmICh2YWwgPT09ICcnIHx8IHZhbCA9PT0gJ251bGwnKSB7XG4gICAgcmV0dXJuIG51bGw7XG4gIH1cblxuICByZXR1cm4gdmFsO1xufVxuXG5mdW5jdGlvbiBub3JtYWxpemVEYXRhS2V5KGtleSkge1xuICByZXR1cm4ga2V5LnJlcGxhY2UoL1tBLVpdL2csIGZ1bmN0aW9uIChjaHIpIHtcbiAgICByZXR1cm4gXCItXCIgKyBjaHIudG9Mb3dlckNhc2UoKTtcbiAgfSk7XG59XG5cbnZhciBNYW5pcHVsYXRvciA9IHtcbiAgc2V0RGF0YUF0dHJpYnV0ZTogZnVuY3Rpb24gc2V0RGF0YUF0dHJpYnV0ZShlbGVtZW50LCBrZXksIHZhbHVlKSB7XG4gICAgZWxlbWVudC5zZXRBdHRyaWJ1dGUoXCJkYXRhLVwiICsgbm9ybWFsaXplRGF0YUtleShrZXkpLCB2YWx1ZSk7XG4gIH0sXG4gIHJlbW92ZURhdGFBdHRyaWJ1dGU6IGZ1bmN0aW9uIHJlbW92ZURhdGFBdHRyaWJ1dGUoZWxlbWVudCwga2V5KSB7XG4gICAgZWxlbWVudC5yZW1vdmVBdHRyaWJ1dGUoXCJkYXRhLVwiICsgbm9ybWFsaXplRGF0YUtleShrZXkpKTtcbiAgfSxcbiAgZ2V0RGF0YUF0dHJpYnV0ZXM6IGZ1bmN0aW9uIGdldERhdGFBdHRyaWJ1dGVzKGVsZW1lbnQpIHtcbiAgICBpZiAoIWVsZW1lbnQpIHtcbiAgICAgIHJldHVybiB7fTtcbiAgICB9XG5cbiAgICB2YXIgYXR0cmlidXRlcyA9IF9vYmplY3RTcHJlYWQyKHt9LCBlbGVtZW50LmRhdGFzZXQpO1xuXG4gICAgT2JqZWN0LmtleXMoYXR0cmlidXRlcykuZm9yRWFjaChmdW5jdGlvbiAoa2V5KSB7XG4gICAgICBhdHRyaWJ1dGVzW2tleV0gPSBub3JtYWxpemVEYXRhKGF0dHJpYnV0ZXNba2V5XSk7XG4gICAgfSk7XG4gICAgcmV0dXJuIGF0dHJpYnV0ZXM7XG4gIH0sXG4gIGdldERhdGFBdHRyaWJ1dGU6IGZ1bmN0aW9uIGdldERhdGFBdHRyaWJ1dGUoZWxlbWVudCwga2V5KSB7XG4gICAgcmV0dXJuIG5vcm1hbGl6ZURhdGEoZWxlbWVudC5nZXRBdHRyaWJ1dGUoXCJkYXRhLVwiICsgbm9ybWFsaXplRGF0YUtleShrZXkpKSk7XG4gIH0sXG4gIG9mZnNldDogZnVuY3Rpb24gb2Zmc2V0KGVsZW1lbnQpIHtcbiAgICB2YXIgcmVjdCA9IGVsZW1lbnQuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCk7XG4gICAgcmV0dXJuIHtcbiAgICAgIHRvcDogcmVjdC50b3AgKyBkb2N1bWVudC5ib2R5LnNjcm9sbFRvcCxcbiAgICAgIGxlZnQ6IHJlY3QubGVmdCArIGRvY3VtZW50LmJvZHkuc2Nyb2xsTGVmdFxuICAgIH07XG4gIH0sXG4gIHBvc2l0aW9uOiBmdW5jdGlvbiBwb3NpdGlvbihlbGVtZW50KSB7XG4gICAgcmV0dXJuIHtcbiAgICAgIHRvcDogZWxlbWVudC5vZmZzZXRUb3AsXG4gICAgICBsZWZ0OiBlbGVtZW50Lm9mZnNldExlZnRcbiAgICB9O1xuICB9LFxuICB0b2dnbGVDbGFzczogZnVuY3Rpb24gdG9nZ2xlQ2xhc3MoZWxlbWVudCwgY2xhc3NOYW1lKSB7XG4gICAgaWYgKCFlbGVtZW50KSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgaWYgKGVsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKGNsYXNzTmFtZSkpIHtcbiAgICAgIGVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShjbGFzc05hbWUpO1xuICAgIH0gZWxzZSB7XG4gICAgICBlbGVtZW50LmNsYXNzTGlzdC5hZGQoY2xhc3NOYW1lKTtcbiAgICB9XG4gIH1cbn07XG5cbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDb25zdGFudHNcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cbnZhciBOQU1FJDMgPSAnY2Fyb3VzZWwnO1xudmFyIFZFUlNJT04kMyA9ICczLjIuMCc7XG52YXIgREFUQV9LRVkkMyA9ICdjb3JldWkuY2Fyb3VzZWwnO1xudmFyIEVWRU5UX0tFWSQzID0gXCIuXCIgKyBEQVRBX0tFWSQzO1xudmFyIERBVEFfQVBJX0tFWSQzID0gJy5kYXRhLWFwaSc7XG52YXIgQVJST1dfTEVGVF9LRVkgPSAnQXJyb3dMZWZ0JztcbnZhciBBUlJPV19SSUdIVF9LRVkgPSAnQXJyb3dSaWdodCc7XG52YXIgVE9VQ0hFVkVOVF9DT01QQVRfV0FJVCA9IDUwMDsgLy8gVGltZSBmb3IgbW91c2UgY29tcGF0IGV2ZW50cyB0byBmaXJlIGFmdGVyIHRvdWNoXG5cbnZhciBTV0lQRV9USFJFU0hPTEQgPSA0MDtcbnZhciBEZWZhdWx0JDEgPSB7XG4gIGludGVydmFsOiA1MDAwLFxuICBrZXlib2FyZDogdHJ1ZSxcbiAgc2xpZGU6IGZhbHNlLFxuICBwYXVzZTogJ2hvdmVyJyxcbiAgd3JhcDogdHJ1ZSxcbiAgdG91Y2g6IHRydWVcbn07XG52YXIgRGVmYXVsdFR5cGUgPSB7XG4gIGludGVydmFsOiAnKG51bWJlcnxib29sZWFuKScsXG4gIGtleWJvYXJkOiAnYm9vbGVhbicsXG4gIHNsaWRlOiAnKGJvb2xlYW58c3RyaW5nKScsXG4gIHBhdXNlOiAnKHN0cmluZ3xib29sZWFuKScsXG4gIHdyYXA6ICdib29sZWFuJyxcbiAgdG91Y2g6ICdib29sZWFuJ1xufTtcbnZhciBESVJFQ1RJT05fTkVYVCA9ICduZXh0JztcbnZhciBESVJFQ1RJT05fUFJFViA9ICdwcmV2JztcbnZhciBESVJFQ1RJT05fTEVGVCA9ICdsZWZ0JztcbnZhciBESVJFQ1RJT05fUklHSFQgPSAncmlnaHQnO1xudmFyIEVWRU5UX1NMSURFID0gXCJzbGlkZVwiICsgRVZFTlRfS0VZJDM7XG52YXIgRVZFTlRfU0xJRCA9IFwic2xpZFwiICsgRVZFTlRfS0VZJDM7XG52YXIgRVZFTlRfS0VZRE9XTiA9IFwia2V5ZG93blwiICsgRVZFTlRfS0VZJDM7XG52YXIgRVZFTlRfTU9VU0VFTlRFUiA9IFwibW91c2VlbnRlclwiICsgRVZFTlRfS0VZJDM7XG52YXIgRVZFTlRfTU9VU0VMRUFWRSA9IFwibW91c2VsZWF2ZVwiICsgRVZFTlRfS0VZJDM7XG52YXIgRVZFTlRfVE9VQ0hTVEFSVCA9IFwidG91Y2hzdGFydFwiICsgRVZFTlRfS0VZJDM7XG52YXIgRVZFTlRfVE9VQ0hNT1ZFID0gXCJ0b3VjaG1vdmVcIiArIEVWRU5UX0tFWSQzO1xudmFyIEVWRU5UX1RPVUNIRU5EID0gXCJ0b3VjaGVuZFwiICsgRVZFTlRfS0VZJDM7XG52YXIgRVZFTlRfUE9JTlRFUkRPV04gPSBcInBvaW50ZXJkb3duXCIgKyBFVkVOVF9LRVkkMztcbnZhciBFVkVOVF9QT0lOVEVSVVAgPSBcInBvaW50ZXJ1cFwiICsgRVZFTlRfS0VZJDM7XG52YXIgRVZFTlRfRFJBR19TVEFSVCA9IFwiZHJhZ3N0YXJ0XCIgKyBFVkVOVF9LRVkkMztcbnZhciBFVkVOVF9MT0FEX0RBVEFfQVBJID0gXCJsb2FkXCIgKyBFVkVOVF9LRVkkMyArIERBVEFfQVBJX0tFWSQzO1xudmFyIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDMgPSBcImNsaWNrXCIgKyBFVkVOVF9LRVkkMyArIERBVEFfQVBJX0tFWSQzO1xudmFyIENMQVNTX05BTUVfQ0FST1VTRUwgPSAnY2Fyb3VzZWwnO1xudmFyIENMQVNTX05BTUVfQUNUSVZFJDIgPSAnYWN0aXZlJztcbnZhciBDTEFTU19OQU1FX1NMSURFID0gJ3NsaWRlJztcbnZhciBDTEFTU19OQU1FX1JJR0hUID0gJ2Nhcm91c2VsLWl0ZW0tcmlnaHQnO1xudmFyIENMQVNTX05BTUVfTEVGVCA9ICdjYXJvdXNlbC1pdGVtLWxlZnQnO1xudmFyIENMQVNTX05BTUVfTkVYVCA9ICdjYXJvdXNlbC1pdGVtLW5leHQnO1xudmFyIENMQVNTX05BTUVfUFJFViA9ICdjYXJvdXNlbC1pdGVtLXByZXYnO1xudmFyIENMQVNTX05BTUVfUE9JTlRFUl9FVkVOVCA9ICdwb2ludGVyLWV2ZW50JztcbnZhciBTRUxFQ1RPUl9BQ1RJVkUkMSA9ICcuYWN0aXZlJztcbnZhciBTRUxFQ1RPUl9BQ1RJVkVfSVRFTSA9ICcuYWN0aXZlLmNhcm91c2VsLWl0ZW0nO1xudmFyIFNFTEVDVE9SX0lURU0gPSAnLmNhcm91c2VsLWl0ZW0nO1xudmFyIFNFTEVDVE9SX0lURU1fSU1HID0gJy5jYXJvdXNlbC1pdGVtIGltZyc7XG52YXIgU0VMRUNUT1JfTkVYVF9QUkVWID0gJy5jYXJvdXNlbC1pdGVtLW5leHQsIC5jYXJvdXNlbC1pdGVtLXByZXYnO1xudmFyIFNFTEVDVE9SX0lORElDQVRPUlMgPSAnLmNhcm91c2VsLWluZGljYXRvcnMnO1xudmFyIFNFTEVDVE9SX0RBVEFfU0xJREUgPSAnW2RhdGEtc2xpZGVdLCBbZGF0YS1zbGlkZS10b10nO1xudmFyIFNFTEVDVE9SX0RBVEFfUklERSA9ICdbZGF0YS1yaWRlPVwiY2Fyb3VzZWxcIl0nO1xudmFyIFBvaW50ZXJUeXBlID0ge1xuICBUT1VDSDogJ3RvdWNoJyxcbiAgUEVOOiAncGVuJ1xufTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDbGFzcyBEZWZpbml0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgQ2Fyb3VzZWwgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKCkge1xuICBmdW5jdGlvbiBDYXJvdXNlbChlbGVtZW50LCBjb25maWcpIHtcbiAgICB0aGlzLl9pdGVtcyA9IG51bGw7XG4gICAgdGhpcy5faW50ZXJ2YWwgPSBudWxsO1xuICAgIHRoaXMuX2FjdGl2ZUVsZW1lbnQgPSBudWxsO1xuICAgIHRoaXMuX2lzUGF1c2VkID0gZmFsc2U7XG4gICAgdGhpcy5faXNTbGlkaW5nID0gZmFsc2U7XG4gICAgdGhpcy50b3VjaFRpbWVvdXQgPSBudWxsO1xuICAgIHRoaXMudG91Y2hTdGFydFggPSAwO1xuICAgIHRoaXMudG91Y2hEZWx0YVggPSAwO1xuICAgIHRoaXMuX2NvbmZpZyA9IHRoaXMuX2dldENvbmZpZyhjb25maWcpO1xuICAgIHRoaXMuX2VsZW1lbnQgPSBlbGVtZW50O1xuICAgIHRoaXMuX2luZGljYXRvcnNFbGVtZW50ID0gU2VsZWN0b3JFbmdpbmUuZmluZE9uZShTRUxFQ1RPUl9JTkRJQ0FUT1JTLCB0aGlzLl9lbGVtZW50KTtcbiAgICB0aGlzLl90b3VjaFN1cHBvcnRlZCA9ICdvbnRvdWNoc3RhcnQnIGluIGRvY3VtZW50LmRvY3VtZW50RWxlbWVudCB8fCBuYXZpZ2F0b3IubWF4VG91Y2hQb2ludHMgPiAwO1xuICAgIHRoaXMuX3BvaW50ZXJFdmVudCA9IEJvb2xlYW4od2luZG93LlBvaW50ZXJFdmVudCB8fCB3aW5kb3cuTVNQb2ludGVyRXZlbnQpO1xuXG4gICAgdGhpcy5fYWRkRXZlbnRMaXN0ZW5lcnMoKTtcblxuICAgIERhdGEuc2V0RGF0YShlbGVtZW50LCBEQVRBX0tFWSQzLCB0aGlzKTtcbiAgfSAvLyBHZXR0ZXJzXG5cblxuICB2YXIgX3Byb3RvID0gQ2Fyb3VzZWwucHJvdG90eXBlO1xuXG4gIC8vIFB1YmxpY1xuICBfcHJvdG8ubmV4dCA9IGZ1bmN0aW9uIG5leHQoKSB7XG4gICAgaWYgKCF0aGlzLl9pc1NsaWRpbmcpIHtcbiAgICAgIHRoaXMuX3NsaWRlKERJUkVDVElPTl9ORVhUKTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLm5leHRXaGVuVmlzaWJsZSA9IGZ1bmN0aW9uIG5leHRXaGVuVmlzaWJsZSgpIHtcbiAgICAvLyBEb24ndCBjYWxsIG5leHQgd2hlbiB0aGUgcGFnZSBpc24ndCB2aXNpYmxlXG4gICAgLy8gb3IgdGhlIGNhcm91c2VsIG9yIGl0cyBwYXJlbnQgaXNuJ3QgdmlzaWJsZVxuICAgIGlmICghZG9jdW1lbnQuaGlkZGVuICYmIGlzVmlzaWJsZSh0aGlzLl9lbGVtZW50KSkge1xuICAgICAgdGhpcy5uZXh0KCk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5wcmV2ID0gZnVuY3Rpb24gcHJldigpIHtcbiAgICBpZiAoIXRoaXMuX2lzU2xpZGluZykge1xuICAgICAgdGhpcy5fc2xpZGUoRElSRUNUSU9OX1BSRVYpO1xuICAgIH1cbiAgfTtcblxuICBfcHJvdG8ucGF1c2UgPSBmdW5jdGlvbiBwYXVzZShldmVudCkge1xuICAgIGlmICghZXZlbnQpIHtcbiAgICAgIHRoaXMuX2lzUGF1c2VkID0gdHJ1ZTtcbiAgICB9XG5cbiAgICBpZiAoU2VsZWN0b3JFbmdpbmUuZmluZE9uZShTRUxFQ1RPUl9ORVhUX1BSRVYsIHRoaXMuX2VsZW1lbnQpKSB7XG4gICAgICB0cmlnZ2VyVHJhbnNpdGlvbkVuZCh0aGlzLl9lbGVtZW50KTtcbiAgICAgIHRoaXMuY3ljbGUodHJ1ZSk7XG4gICAgfVxuXG4gICAgY2xlYXJJbnRlcnZhbCh0aGlzLl9pbnRlcnZhbCk7XG4gICAgdGhpcy5faW50ZXJ2YWwgPSBudWxsO1xuICB9O1xuXG4gIF9wcm90by5jeWNsZSA9IGZ1bmN0aW9uIGN5Y2xlKGV2ZW50KSB7XG4gICAgaWYgKCFldmVudCkge1xuICAgICAgdGhpcy5faXNQYXVzZWQgPSBmYWxzZTtcbiAgICB9XG5cbiAgICBpZiAodGhpcy5faW50ZXJ2YWwpIHtcbiAgICAgIGNsZWFySW50ZXJ2YWwodGhpcy5faW50ZXJ2YWwpO1xuICAgICAgdGhpcy5faW50ZXJ2YWwgPSBudWxsO1xuICAgIH1cblxuICAgIGlmICh0aGlzLl9jb25maWcgJiYgdGhpcy5fY29uZmlnLmludGVydmFsICYmICF0aGlzLl9pc1BhdXNlZCkge1xuICAgICAgdGhpcy5faW50ZXJ2YWwgPSBzZXRJbnRlcnZhbCgoZG9jdW1lbnQudmlzaWJpbGl0eVN0YXRlID8gdGhpcy5uZXh0V2hlblZpc2libGUgOiB0aGlzLm5leHQpLmJpbmQodGhpcyksIHRoaXMuX2NvbmZpZy5pbnRlcnZhbCk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by50byA9IGZ1bmN0aW9uIHRvKGluZGV4KSB7XG4gICAgdmFyIF90aGlzID0gdGhpcztcblxuICAgIHRoaXMuX2FjdGl2ZUVsZW1lbnQgPSBTZWxlY3RvckVuZ2luZS5maW5kT25lKFNFTEVDVE9SX0FDVElWRV9JVEVNLCB0aGlzLl9lbGVtZW50KTtcblxuICAgIHZhciBhY3RpdmVJbmRleCA9IHRoaXMuX2dldEl0ZW1JbmRleCh0aGlzLl9hY3RpdmVFbGVtZW50KTtcblxuICAgIGlmIChpbmRleCA+IHRoaXMuX2l0ZW1zLmxlbmd0aCAtIDEgfHwgaW5kZXggPCAwKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgaWYgKHRoaXMuX2lzU2xpZGluZykge1xuICAgICAgRXZlbnRIYW5kbGVyLm9uZSh0aGlzLl9lbGVtZW50LCBFVkVOVF9TTElELCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiBfdGhpcy50byhpbmRleCk7XG4gICAgICB9KTtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAoYWN0aXZlSW5kZXggPT09IGluZGV4KSB7XG4gICAgICB0aGlzLnBhdXNlKCk7XG4gICAgICB0aGlzLmN5Y2xlKCk7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgdmFyIGRpcmVjdGlvbiA9IGluZGV4ID4gYWN0aXZlSW5kZXggPyBESVJFQ1RJT05fTkVYVCA6IERJUkVDVElPTl9QUkVWO1xuXG4gICAgdGhpcy5fc2xpZGUoZGlyZWN0aW9uLCB0aGlzLl9pdGVtc1tpbmRleF0pO1xuICB9O1xuXG4gIF9wcm90by5kaXNwb3NlID0gZnVuY3Rpb24gZGlzcG9zZSgpIHtcbiAgICBFdmVudEhhbmRsZXIub2ZmKHRoaXMuX2VsZW1lbnQsIEVWRU5UX0tFWSQzKTtcbiAgICBEYXRhLnJlbW92ZURhdGEodGhpcy5fZWxlbWVudCwgREFUQV9LRVkkMyk7XG4gICAgdGhpcy5faXRlbXMgPSBudWxsO1xuICAgIHRoaXMuX2NvbmZpZyA9IG51bGw7XG4gICAgdGhpcy5fZWxlbWVudCA9IG51bGw7XG4gICAgdGhpcy5faW50ZXJ2YWwgPSBudWxsO1xuICAgIHRoaXMuX2lzUGF1c2VkID0gbnVsbDtcbiAgICB0aGlzLl9pc1NsaWRpbmcgPSBudWxsO1xuICAgIHRoaXMuX2FjdGl2ZUVsZW1lbnQgPSBudWxsO1xuICAgIHRoaXMuX2luZGljYXRvcnNFbGVtZW50ID0gbnVsbDtcbiAgfSAvLyBQcml2YXRlXG4gIDtcblxuICBfcHJvdG8uX2dldENvbmZpZyA9IGZ1bmN0aW9uIF9nZXRDb25maWcoY29uZmlnKSB7XG4gICAgY29uZmlnID0gX29iamVjdFNwcmVhZDIoX29iamVjdFNwcmVhZDIoe30sIERlZmF1bHQkMSksIGNvbmZpZyk7XG4gICAgdHlwZUNoZWNrQ29uZmlnKE5BTUUkMywgY29uZmlnLCBEZWZhdWx0VHlwZSk7XG4gICAgcmV0dXJuIGNvbmZpZztcbiAgfTtcblxuICBfcHJvdG8uX2hhbmRsZVN3aXBlID0gZnVuY3Rpb24gX2hhbmRsZVN3aXBlKCkge1xuICAgIHZhciBhYnNEZWx0YXggPSBNYXRoLmFicyh0aGlzLnRvdWNoRGVsdGFYKTtcblxuICAgIGlmIChhYnNEZWx0YXggPD0gU1dJUEVfVEhSRVNIT0xEKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgdmFyIGRpcmVjdGlvbiA9IGFic0RlbHRheCAvIHRoaXMudG91Y2hEZWx0YVg7XG4gICAgdGhpcy50b3VjaERlbHRhWCA9IDA7IC8vIHN3aXBlIGxlZnRcblxuICAgIGlmIChkaXJlY3Rpb24gPiAwKSB7XG4gICAgICB0aGlzLnByZXYoKTtcbiAgICB9IC8vIHN3aXBlIHJpZ2h0XG5cblxuICAgIGlmIChkaXJlY3Rpb24gPCAwKSB7XG4gICAgICB0aGlzLm5leHQoKTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLl9hZGRFdmVudExpc3RlbmVycyA9IGZ1bmN0aW9uIF9hZGRFdmVudExpc3RlbmVycygpIHtcbiAgICB2YXIgX3RoaXMyID0gdGhpcztcblxuICAgIGlmICh0aGlzLl9jb25maWcua2V5Ym9hcmQpIHtcbiAgICAgIEV2ZW50SGFuZGxlci5vbih0aGlzLl9lbGVtZW50LCBFVkVOVF9LRVlET1dOLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgcmV0dXJuIF90aGlzMi5fa2V5ZG93bihldmVudCk7XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICBpZiAodGhpcy5fY29uZmlnLnBhdXNlID09PSAnaG92ZXInKSB7XG4gICAgICBFdmVudEhhbmRsZXIub24odGhpcy5fZWxlbWVudCwgRVZFTlRfTU9VU0VFTlRFUiwgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIHJldHVybiBfdGhpczIucGF1c2UoZXZlbnQpO1xuICAgICAgfSk7XG4gICAgICBFdmVudEhhbmRsZXIub24odGhpcy5fZWxlbWVudCwgRVZFTlRfTU9VU0VMRUFWRSwgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIHJldHVybiBfdGhpczIuY3ljbGUoZXZlbnQpO1xuICAgICAgfSk7XG4gICAgfVxuXG4gICAgaWYgKHRoaXMuX2NvbmZpZy50b3VjaCAmJiB0aGlzLl90b3VjaFN1cHBvcnRlZCkge1xuICAgICAgdGhpcy5fYWRkVG91Y2hFdmVudExpc3RlbmVycygpO1xuICAgIH1cbiAgfTtcblxuICBfcHJvdG8uX2FkZFRvdWNoRXZlbnRMaXN0ZW5lcnMgPSBmdW5jdGlvbiBfYWRkVG91Y2hFdmVudExpc3RlbmVycygpIHtcbiAgICB2YXIgX3RoaXMzID0gdGhpcztcblxuICAgIHZhciBzdGFydCA9IGZ1bmN0aW9uIHN0YXJ0KGV2ZW50KSB7XG4gICAgICBpZiAoX3RoaXMzLl9wb2ludGVyRXZlbnQgJiYgUG9pbnRlclR5cGVbZXZlbnQucG9pbnRlclR5cGUudG9VcHBlckNhc2UoKV0pIHtcbiAgICAgICAgX3RoaXMzLnRvdWNoU3RhcnRYID0gZXZlbnQuY2xpZW50WDtcbiAgICAgIH0gZWxzZSBpZiAoIV90aGlzMy5fcG9pbnRlckV2ZW50KSB7XG4gICAgICAgIF90aGlzMy50b3VjaFN0YXJ0WCA9IGV2ZW50LnRvdWNoZXNbMF0uY2xpZW50WDtcbiAgICAgIH1cbiAgICB9O1xuXG4gICAgdmFyIG1vdmUgPSBmdW5jdGlvbiBtb3ZlKGV2ZW50KSB7XG4gICAgICAvLyBlbnN1cmUgc3dpcGluZyB3aXRoIG9uZSB0b3VjaCBhbmQgbm90IHBpbmNoaW5nXG4gICAgICBpZiAoZXZlbnQudG91Y2hlcyAmJiBldmVudC50b3VjaGVzLmxlbmd0aCA+IDEpIHtcbiAgICAgICAgX3RoaXMzLnRvdWNoRGVsdGFYID0gMDtcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIF90aGlzMy50b3VjaERlbHRhWCA9IGV2ZW50LnRvdWNoZXNbMF0uY2xpZW50WCAtIF90aGlzMy50b3VjaFN0YXJ0WDtcbiAgICAgIH1cbiAgICB9O1xuXG4gICAgdmFyIGVuZCA9IGZ1bmN0aW9uIGVuZChldmVudCkge1xuICAgICAgaWYgKF90aGlzMy5fcG9pbnRlckV2ZW50ICYmIFBvaW50ZXJUeXBlW2V2ZW50LnBvaW50ZXJUeXBlLnRvVXBwZXJDYXNlKCldKSB7XG4gICAgICAgIF90aGlzMy50b3VjaERlbHRhWCA9IGV2ZW50LmNsaWVudFggLSBfdGhpczMudG91Y2hTdGFydFg7XG4gICAgICB9XG5cbiAgICAgIF90aGlzMy5faGFuZGxlU3dpcGUoKTtcblxuICAgICAgaWYgKF90aGlzMy5fY29uZmlnLnBhdXNlID09PSAnaG92ZXInKSB7XG4gICAgICAgIC8vIElmIGl0J3MgYSB0b3VjaC1lbmFibGVkIGRldmljZSwgbW91c2VlbnRlci9sZWF2ZSBhcmUgZmlyZWQgYXNcbiAgICAgICAgLy8gcGFydCBvZiB0aGUgbW91c2UgY29tcGF0aWJpbGl0eSBldmVudHMgb24gZmlyc3QgdGFwIC0gdGhlIGNhcm91c2VsXG4gICAgICAgIC8vIHdvdWxkIHN0b3AgY3ljbGluZyB1bnRpbCB1c2VyIHRhcHBlZCBvdXQgb2YgaXQ7XG4gICAgICAgIC8vIGhlcmUsIHdlIGxpc3RlbiBmb3IgdG91Y2hlbmQsIGV4cGxpY2l0bHkgcGF1c2UgdGhlIGNhcm91c2VsXG4gICAgICAgIC8vIChhcyBpZiBpdCdzIHRoZSBzZWNvbmQgdGltZSB3ZSB0YXAgb24gaXQsIG1vdXNlZW50ZXIgY29tcGF0IGV2ZW50XG4gICAgICAgIC8vIGlzIE5PVCBmaXJlZCkgYW5kIGFmdGVyIGEgdGltZW91dCAodG8gYWxsb3cgZm9yIG1vdXNlIGNvbXBhdGliaWxpdHlcbiAgICAgICAgLy8gZXZlbnRzIHRvIGZpcmUpIHdlIGV4cGxpY2l0bHkgcmVzdGFydCBjeWNsaW5nXG4gICAgICAgIF90aGlzMy5wYXVzZSgpO1xuXG4gICAgICAgIGlmIChfdGhpczMudG91Y2hUaW1lb3V0KSB7XG4gICAgICAgICAgY2xlYXJUaW1lb3V0KF90aGlzMy50b3VjaFRpbWVvdXQpO1xuICAgICAgICB9XG5cbiAgICAgICAgX3RoaXMzLnRvdWNoVGltZW91dCA9IHNldFRpbWVvdXQoZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgICAgcmV0dXJuIF90aGlzMy5jeWNsZShldmVudCk7XG4gICAgICAgIH0sIFRPVUNIRVZFTlRfQ09NUEFUX1dBSVQgKyBfdGhpczMuX2NvbmZpZy5pbnRlcnZhbCk7XG4gICAgICB9XG4gICAgfTtcblxuICAgIFNlbGVjdG9yRW5naW5lLmZpbmQoU0VMRUNUT1JfSVRFTV9JTUcsIHRoaXMuX2VsZW1lbnQpLmZvckVhY2goZnVuY3Rpb24gKGl0ZW1JbWcpIHtcbiAgICAgIEV2ZW50SGFuZGxlci5vbihpdGVtSW1nLCBFVkVOVF9EUkFHX1NUQVJULCBmdW5jdGlvbiAoZSkge1xuICAgICAgICByZXR1cm4gZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgfSk7XG4gICAgfSk7XG5cbiAgICBpZiAodGhpcy5fcG9pbnRlckV2ZW50KSB7XG4gICAgICBFdmVudEhhbmRsZXIub24odGhpcy5fZWxlbWVudCwgRVZFTlRfUE9JTlRFUkRPV04sIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICByZXR1cm4gc3RhcnQoZXZlbnQpO1xuICAgICAgfSk7XG4gICAgICBFdmVudEhhbmRsZXIub24odGhpcy5fZWxlbWVudCwgRVZFTlRfUE9JTlRFUlVQLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgcmV0dXJuIGVuZChldmVudCk7XG4gICAgICB9KTtcblxuICAgICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfUE9JTlRFUl9FVkVOVCk7XG4gICAgfSBlbHNlIHtcbiAgICAgIEV2ZW50SGFuZGxlci5vbih0aGlzLl9lbGVtZW50LCBFVkVOVF9UT1VDSFNUQVJULCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgcmV0dXJuIHN0YXJ0KGV2ZW50KTtcbiAgICAgIH0pO1xuICAgICAgRXZlbnRIYW5kbGVyLm9uKHRoaXMuX2VsZW1lbnQsIEVWRU5UX1RPVUNITU9WRSwgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIHJldHVybiBtb3ZlKGV2ZW50KTtcbiAgICAgIH0pO1xuICAgICAgRXZlbnRIYW5kbGVyLm9uKHRoaXMuX2VsZW1lbnQsIEVWRU5UX1RPVUNIRU5ELCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgcmV0dXJuIGVuZChldmVudCk7XG4gICAgICB9KTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLl9rZXlkb3duID0gZnVuY3Rpb24gX2tleWRvd24oZXZlbnQpIHtcbiAgICBpZiAoL2lucHV0fHRleHRhcmVhL2kudGVzdChldmVudC50YXJnZXQudGFnTmFtZSkpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBzd2l0Y2ggKGV2ZW50LmtleSkge1xuICAgICAgY2FzZSBBUlJPV19MRUZUX0tFWTpcbiAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgdGhpcy5wcmV2KCk7XG4gICAgICAgIGJyZWFrO1xuXG4gICAgICBjYXNlIEFSUk9XX1JJR0hUX0tFWTpcbiAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgdGhpcy5uZXh0KCk7XG4gICAgICAgIGJyZWFrO1xuICAgIH1cbiAgfTtcblxuICBfcHJvdG8uX2dldEl0ZW1JbmRleCA9IGZ1bmN0aW9uIF9nZXRJdGVtSW5kZXgoZWxlbWVudCkge1xuICAgIHRoaXMuX2l0ZW1zID0gZWxlbWVudCAmJiBlbGVtZW50LnBhcmVudE5vZGUgPyBTZWxlY3RvckVuZ2luZS5maW5kKFNFTEVDVE9SX0lURU0sIGVsZW1lbnQucGFyZW50Tm9kZSkgOiBbXTtcbiAgICByZXR1cm4gdGhpcy5faXRlbXMuaW5kZXhPZihlbGVtZW50KTtcbiAgfTtcblxuICBfcHJvdG8uX2dldEl0ZW1CeURpcmVjdGlvbiA9IGZ1bmN0aW9uIF9nZXRJdGVtQnlEaXJlY3Rpb24oZGlyZWN0aW9uLCBhY3RpdmVFbGVtZW50KSB7XG4gICAgdmFyIGlzTmV4dERpcmVjdGlvbiA9IGRpcmVjdGlvbiA9PT0gRElSRUNUSU9OX05FWFQ7XG4gICAgdmFyIGlzUHJldkRpcmVjdGlvbiA9IGRpcmVjdGlvbiA9PT0gRElSRUNUSU9OX1BSRVY7XG5cbiAgICB2YXIgYWN0aXZlSW5kZXggPSB0aGlzLl9nZXRJdGVtSW5kZXgoYWN0aXZlRWxlbWVudCk7XG5cbiAgICB2YXIgbGFzdEl0ZW1JbmRleCA9IHRoaXMuX2l0ZW1zLmxlbmd0aCAtIDE7XG4gICAgdmFyIGlzR29pbmdUb1dyYXAgPSBpc1ByZXZEaXJlY3Rpb24gJiYgYWN0aXZlSW5kZXggPT09IDAgfHwgaXNOZXh0RGlyZWN0aW9uICYmIGFjdGl2ZUluZGV4ID09PSBsYXN0SXRlbUluZGV4O1xuXG4gICAgaWYgKGlzR29pbmdUb1dyYXAgJiYgIXRoaXMuX2NvbmZpZy53cmFwKSB7XG4gICAgICByZXR1cm4gYWN0aXZlRWxlbWVudDtcbiAgICB9XG5cbiAgICB2YXIgZGVsdGEgPSBkaXJlY3Rpb24gPT09IERJUkVDVElPTl9QUkVWID8gLTEgOiAxO1xuICAgIHZhciBpdGVtSW5kZXggPSAoYWN0aXZlSW5kZXggKyBkZWx0YSkgJSB0aGlzLl9pdGVtcy5sZW5ndGg7XG4gICAgcmV0dXJuIGl0ZW1JbmRleCA9PT0gLTEgPyB0aGlzLl9pdGVtc1t0aGlzLl9pdGVtcy5sZW5ndGggLSAxXSA6IHRoaXMuX2l0ZW1zW2l0ZW1JbmRleF07XG4gIH07XG5cbiAgX3Byb3RvLl90cmlnZ2VyU2xpZGVFdmVudCA9IGZ1bmN0aW9uIF90cmlnZ2VyU2xpZGVFdmVudChyZWxhdGVkVGFyZ2V0LCBldmVudERpcmVjdGlvbk5hbWUpIHtcbiAgICB2YXIgdGFyZ2V0SW5kZXggPSB0aGlzLl9nZXRJdGVtSW5kZXgocmVsYXRlZFRhcmdldCk7XG5cbiAgICB2YXIgZnJvbUluZGV4ID0gdGhpcy5fZ2V0SXRlbUluZGV4KFNlbGVjdG9yRW5naW5lLmZpbmRPbmUoU0VMRUNUT1JfQUNUSVZFX0lURU0sIHRoaXMuX2VsZW1lbnQpKTtcblxuICAgIHJldHVybiBFdmVudEhhbmRsZXIudHJpZ2dlcih0aGlzLl9lbGVtZW50LCBFVkVOVF9TTElERSwge1xuICAgICAgcmVsYXRlZFRhcmdldDogcmVsYXRlZFRhcmdldCxcbiAgICAgIGRpcmVjdGlvbjogZXZlbnREaXJlY3Rpb25OYW1lLFxuICAgICAgZnJvbTogZnJvbUluZGV4LFxuICAgICAgdG86IHRhcmdldEluZGV4XG4gICAgfSk7XG4gIH07XG5cbiAgX3Byb3RvLl9zZXRBY3RpdmVJbmRpY2F0b3JFbGVtZW50ID0gZnVuY3Rpb24gX3NldEFjdGl2ZUluZGljYXRvckVsZW1lbnQoZWxlbWVudCkge1xuICAgIGlmICh0aGlzLl9pbmRpY2F0b3JzRWxlbWVudCkge1xuICAgICAgdmFyIGluZGljYXRvcnMgPSBTZWxlY3RvckVuZ2luZS5maW5kKFNFTEVDVE9SX0FDVElWRSQxLCB0aGlzLl9pbmRpY2F0b3JzRWxlbWVudCk7XG5cbiAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgaW5kaWNhdG9ycy5sZW5ndGg7IGkrKykge1xuICAgICAgICBpbmRpY2F0b3JzW2ldLmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9BQ1RJVkUkMik7XG4gICAgICB9XG5cbiAgICAgIHZhciBuZXh0SW5kaWNhdG9yID0gdGhpcy5faW5kaWNhdG9yc0VsZW1lbnQuY2hpbGRyZW5bdGhpcy5fZ2V0SXRlbUluZGV4KGVsZW1lbnQpXTtcblxuICAgICAgaWYgKG5leHRJbmRpY2F0b3IpIHtcbiAgICAgICAgbmV4dEluZGljYXRvci5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfQUNUSVZFJDIpO1xuICAgICAgfVxuICAgIH1cbiAgfTtcblxuICBfcHJvdG8uX3NsaWRlID0gZnVuY3Rpb24gX3NsaWRlKGRpcmVjdGlvbiwgZWxlbWVudCkge1xuICAgIHZhciBfdGhpczQgPSB0aGlzO1xuXG4gICAgdmFyIGFjdGl2ZUVsZW1lbnQgPSBTZWxlY3RvckVuZ2luZS5maW5kT25lKFNFTEVDVE9SX0FDVElWRV9JVEVNLCB0aGlzLl9lbGVtZW50KTtcblxuICAgIHZhciBhY3RpdmVFbGVtZW50SW5kZXggPSB0aGlzLl9nZXRJdGVtSW5kZXgoYWN0aXZlRWxlbWVudCk7XG5cbiAgICB2YXIgbmV4dEVsZW1lbnQgPSBlbGVtZW50IHx8IGFjdGl2ZUVsZW1lbnQgJiYgdGhpcy5fZ2V0SXRlbUJ5RGlyZWN0aW9uKGRpcmVjdGlvbiwgYWN0aXZlRWxlbWVudCk7XG5cbiAgICB2YXIgbmV4dEVsZW1lbnRJbmRleCA9IHRoaXMuX2dldEl0ZW1JbmRleChuZXh0RWxlbWVudCk7XG5cbiAgICB2YXIgaXNDeWNsaW5nID0gQm9vbGVhbih0aGlzLl9pbnRlcnZhbCk7XG4gICAgdmFyIGRpcmVjdGlvbmFsQ2xhc3NOYW1lO1xuICAgIHZhciBvcmRlckNsYXNzTmFtZTtcbiAgICB2YXIgZXZlbnREaXJlY3Rpb25OYW1lO1xuXG4gICAgaWYgKGRpcmVjdGlvbiA9PT0gRElSRUNUSU9OX05FWFQpIHtcbiAgICAgIGRpcmVjdGlvbmFsQ2xhc3NOYW1lID0gQ0xBU1NfTkFNRV9MRUZUO1xuICAgICAgb3JkZXJDbGFzc05hbWUgPSBDTEFTU19OQU1FX05FWFQ7XG4gICAgICBldmVudERpcmVjdGlvbk5hbWUgPSBESVJFQ1RJT05fTEVGVDtcbiAgICB9IGVsc2Uge1xuICAgICAgZGlyZWN0aW9uYWxDbGFzc05hbWUgPSBDTEFTU19OQU1FX1JJR0hUO1xuICAgICAgb3JkZXJDbGFzc05hbWUgPSBDTEFTU19OQU1FX1BSRVY7XG4gICAgICBldmVudERpcmVjdGlvbk5hbWUgPSBESVJFQ1RJT05fUklHSFQ7XG4gICAgfVxuXG4gICAgaWYgKG5leHRFbGVtZW50ICYmIG5leHRFbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0FDVElWRSQyKSkge1xuICAgICAgdGhpcy5faXNTbGlkaW5nID0gZmFsc2U7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgdmFyIHNsaWRlRXZlbnQgPSB0aGlzLl90cmlnZ2VyU2xpZGVFdmVudChuZXh0RWxlbWVudCwgZXZlbnREaXJlY3Rpb25OYW1lKTtcblxuICAgIGlmIChzbGlkZUV2ZW50LmRlZmF1bHRQcmV2ZW50ZWQpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAoIWFjdGl2ZUVsZW1lbnQgfHwgIW5leHRFbGVtZW50KSB7XG4gICAgICAvLyBTb21lIHdlaXJkbmVzcyBpcyBoYXBwZW5pbmcsIHNvIHdlIGJhaWxcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB0aGlzLl9pc1NsaWRpbmcgPSB0cnVlO1xuXG4gICAgaWYgKGlzQ3ljbGluZykge1xuICAgICAgdGhpcy5wYXVzZSgpO1xuICAgIH1cblxuICAgIHRoaXMuX3NldEFjdGl2ZUluZGljYXRvckVsZW1lbnQobmV4dEVsZW1lbnQpO1xuXG4gICAgaWYgKHRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0xJREUpKSB7XG4gICAgICBuZXh0RWxlbWVudC5jbGFzc0xpc3QuYWRkKG9yZGVyQ2xhc3NOYW1lKTtcbiAgICAgIHJlZmxvdyhuZXh0RWxlbWVudCk7XG4gICAgICBhY3RpdmVFbGVtZW50LmNsYXNzTGlzdC5hZGQoZGlyZWN0aW9uYWxDbGFzc05hbWUpO1xuICAgICAgbmV4dEVsZW1lbnQuY2xhc3NMaXN0LmFkZChkaXJlY3Rpb25hbENsYXNzTmFtZSk7XG4gICAgICB2YXIgbmV4dEVsZW1lbnRJbnRlcnZhbCA9IHBhcnNlSW50KG5leHRFbGVtZW50LmdldEF0dHJpYnV0ZSgnZGF0YS1pbnRlcnZhbCcpLCAxMCk7XG5cbiAgICAgIGlmIChuZXh0RWxlbWVudEludGVydmFsKSB7XG4gICAgICAgIHRoaXMuX2NvbmZpZy5kZWZhdWx0SW50ZXJ2YWwgPSB0aGlzLl9jb25maWcuZGVmYXVsdEludGVydmFsIHx8IHRoaXMuX2NvbmZpZy5pbnRlcnZhbDtcbiAgICAgICAgdGhpcy5fY29uZmlnLmludGVydmFsID0gbmV4dEVsZW1lbnRJbnRlcnZhbDtcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIHRoaXMuX2NvbmZpZy5pbnRlcnZhbCA9IHRoaXMuX2NvbmZpZy5kZWZhdWx0SW50ZXJ2YWwgfHwgdGhpcy5fY29uZmlnLmludGVydmFsO1xuICAgICAgfVxuXG4gICAgICB2YXIgdHJhbnNpdGlvbkR1cmF0aW9uID0gZ2V0VHJhbnNpdGlvbkR1cmF0aW9uRnJvbUVsZW1lbnQoYWN0aXZlRWxlbWVudCk7XG4gICAgICBFdmVudEhhbmRsZXIub25lKGFjdGl2ZUVsZW1lbnQsIFRSQU5TSVRJT05fRU5ELCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5leHRFbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoZGlyZWN0aW9uYWxDbGFzc05hbWUsIG9yZGVyQ2xhc3NOYW1lKTtcbiAgICAgICAgbmV4dEVsZW1lbnQuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0FDVElWRSQyKTtcbiAgICAgICAgYWN0aXZlRWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTX05BTUVfQUNUSVZFJDIsIG9yZGVyQ2xhc3NOYW1lLCBkaXJlY3Rpb25hbENsYXNzTmFtZSk7XG4gICAgICAgIF90aGlzNC5faXNTbGlkaW5nID0gZmFsc2U7XG4gICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKF90aGlzNC5fZWxlbWVudCwgRVZFTlRfU0xJRCwge1xuICAgICAgICAgICAgcmVsYXRlZFRhcmdldDogbmV4dEVsZW1lbnQsXG4gICAgICAgICAgICBkaXJlY3Rpb246IGV2ZW50RGlyZWN0aW9uTmFtZSxcbiAgICAgICAgICAgIGZyb206IGFjdGl2ZUVsZW1lbnRJbmRleCxcbiAgICAgICAgICAgIHRvOiBuZXh0RWxlbWVudEluZGV4XG4gICAgICAgICAgfSk7XG4gICAgICAgIH0sIDApO1xuICAgICAgfSk7XG4gICAgICBlbXVsYXRlVHJhbnNpdGlvbkVuZChhY3RpdmVFbGVtZW50LCB0cmFuc2l0aW9uRHVyYXRpb24pO1xuICAgIH0gZWxzZSB7XG4gICAgICBhY3RpdmVFbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9BQ1RJVkUkMik7XG4gICAgICBuZXh0RWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfQUNUSVZFJDIpO1xuICAgICAgdGhpcy5faXNTbGlkaW5nID0gZmFsc2U7XG4gICAgICBFdmVudEhhbmRsZXIudHJpZ2dlcih0aGlzLl9lbGVtZW50LCBFVkVOVF9TTElELCB7XG4gICAgICAgIHJlbGF0ZWRUYXJnZXQ6IG5leHRFbGVtZW50LFxuICAgICAgICBkaXJlY3Rpb246IGV2ZW50RGlyZWN0aW9uTmFtZSxcbiAgICAgICAgZnJvbTogYWN0aXZlRWxlbWVudEluZGV4LFxuICAgICAgICB0bzogbmV4dEVsZW1lbnRJbmRleFxuICAgICAgfSk7XG4gICAgfVxuXG4gICAgaWYgKGlzQ3ljbGluZykge1xuICAgICAgdGhpcy5jeWNsZSgpO1xuICAgIH1cbiAgfSAvLyBTdGF0aWNcbiAgO1xuXG4gIENhcm91c2VsLmNhcm91c2VsSW50ZXJmYWNlID0gZnVuY3Rpb24gY2Fyb3VzZWxJbnRlcmZhY2UoZWxlbWVudCwgY29uZmlnKSB7XG4gICAgdmFyIGRhdGEgPSBEYXRhLmdldERhdGEoZWxlbWVudCwgREFUQV9LRVkkMyk7XG5cbiAgICB2YXIgX2NvbmZpZyA9IF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCBEZWZhdWx0JDEpLCBNYW5pcHVsYXRvci5nZXREYXRhQXR0cmlidXRlcyhlbGVtZW50KSk7XG5cbiAgICBpZiAodHlwZW9mIGNvbmZpZyA9PT0gJ29iamVjdCcpIHtcbiAgICAgIF9jb25maWcgPSBfb2JqZWN0U3ByZWFkMihfb2JqZWN0U3ByZWFkMih7fSwgX2NvbmZpZyksIGNvbmZpZyk7XG4gICAgfVxuXG4gICAgdmFyIGFjdGlvbiA9IHR5cGVvZiBjb25maWcgPT09ICdzdHJpbmcnID8gY29uZmlnIDogX2NvbmZpZy5zbGlkZTtcblxuICAgIGlmICghZGF0YSkge1xuICAgICAgZGF0YSA9IG5ldyBDYXJvdXNlbChlbGVtZW50LCBfY29uZmlnKTtcbiAgICB9XG5cbiAgICBpZiAodHlwZW9mIGNvbmZpZyA9PT0gJ251bWJlcicpIHtcbiAgICAgIGRhdGEudG8oY29uZmlnKTtcbiAgICB9IGVsc2UgaWYgKHR5cGVvZiBhY3Rpb24gPT09ICdzdHJpbmcnKSB7XG4gICAgICBpZiAodHlwZW9mIGRhdGFbYWN0aW9uXSA9PT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgdGhyb3cgbmV3IFR5cGVFcnJvcihcIk5vIG1ldGhvZCBuYW1lZCBcXFwiXCIgKyBhY3Rpb24gKyBcIlxcXCJcIik7XG4gICAgICB9XG5cbiAgICAgIGRhdGFbYWN0aW9uXSgpO1xuICAgIH0gZWxzZSBpZiAoX2NvbmZpZy5pbnRlcnZhbCAmJiBfY29uZmlnLnJpZGUpIHtcbiAgICAgIGRhdGEucGF1c2UoKTtcbiAgICAgIGRhdGEuY3ljbGUoKTtcbiAgICB9XG4gIH07XG5cbiAgQ2Fyb3VzZWwualF1ZXJ5SW50ZXJmYWNlID0gZnVuY3Rpb24galF1ZXJ5SW50ZXJmYWNlKGNvbmZpZykge1xuICAgIHJldHVybiB0aGlzLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgQ2Fyb3VzZWwuY2Fyb3VzZWxJbnRlcmZhY2UodGhpcywgY29uZmlnKTtcbiAgICB9KTtcbiAgfTtcblxuICBDYXJvdXNlbC5kYXRhQXBpQ2xpY2tIYW5kbGVyID0gZnVuY3Rpb24gZGF0YUFwaUNsaWNrSGFuZGxlcihldmVudCkge1xuICAgIHZhciB0YXJnZXQgPSBnZXRFbGVtZW50RnJvbVNlbGVjdG9yKHRoaXMpO1xuXG4gICAgaWYgKCF0YXJnZXQgfHwgIXRhcmdldC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9DQVJPVVNFTCkpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB2YXIgY29uZmlnID0gX29iamVjdFNwcmVhZDIoX29iamVjdFNwcmVhZDIoe30sIE1hbmlwdWxhdG9yLmdldERhdGFBdHRyaWJ1dGVzKHRhcmdldCkpLCBNYW5pcHVsYXRvci5nZXREYXRhQXR0cmlidXRlcyh0aGlzKSk7XG5cbiAgICB2YXIgc2xpZGVJbmRleCA9IHRoaXMuZ2V0QXR0cmlidXRlKCdkYXRhLXNsaWRlLXRvJyk7XG5cbiAgICBpZiAoc2xpZGVJbmRleCkge1xuICAgICAgY29uZmlnLmludGVydmFsID0gZmFsc2U7XG4gICAgfVxuXG4gICAgQ2Fyb3VzZWwuY2Fyb3VzZWxJbnRlcmZhY2UodGFyZ2V0LCBjb25maWcpO1xuXG4gICAgaWYgKHNsaWRlSW5kZXgpIHtcbiAgICAgIERhdGEuZ2V0RGF0YSh0YXJnZXQsIERBVEFfS0VZJDMpLnRvKHNsaWRlSW5kZXgpO1xuICAgIH1cblxuICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gIH07XG5cbiAgQ2Fyb3VzZWwuZ2V0SW5zdGFuY2UgPSBmdW5jdGlvbiBnZXRJbnN0YW5jZShlbGVtZW50KSB7XG4gICAgcmV0dXJuIERhdGEuZ2V0RGF0YShlbGVtZW50LCBEQVRBX0tFWSQzKTtcbiAgfTtcblxuICBfY3JlYXRlQ2xhc3MoQ2Fyb3VzZWwsIG51bGwsIFt7XG4gICAga2V5OiBcIlZFUlNJT05cIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBWRVJTSU9OJDM7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIkRlZmF1bHRcIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBEZWZhdWx0JDE7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIENhcm91c2VsO1xufSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIERhdGEgQXBpIGltcGxlbWVudGF0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG5cbkV2ZW50SGFuZGxlci5vbihkb2N1bWVudCwgRVZFTlRfQ0xJQ0tfREFUQV9BUEkkMywgU0VMRUNUT1JfREFUQV9TTElERSwgQ2Fyb3VzZWwuZGF0YUFwaUNsaWNrSGFuZGxlcik7XG5FdmVudEhhbmRsZXIub24od2luZG93LCBFVkVOVF9MT0FEX0RBVEFfQVBJLCBmdW5jdGlvbiAoKSB7XG4gIHZhciBjYXJvdXNlbHMgPSBTZWxlY3RvckVuZ2luZS5maW5kKFNFTEVDVE9SX0RBVEFfUklERSk7XG5cbiAgZm9yICh2YXIgaSA9IDAsIGxlbiA9IGNhcm91c2Vscy5sZW5ndGg7IGkgPCBsZW47IGkrKykge1xuICAgIENhcm91c2VsLmNhcm91c2VsSW50ZXJmYWNlKGNhcm91c2Vsc1tpXSwgRGF0YS5nZXREYXRhKGNhcm91c2Vsc1tpXSwgREFUQV9LRVkkMykpO1xuICB9XG59KTtcbnZhciAkJDQgPSBnZXRqUXVlcnkoKTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBqUXVlcnlcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogYWRkIC5jYXJvdXNlbCB0byBqUXVlcnkgb25seSBpZiBqUXVlcnkgaXMgcHJlc2VudFxuICovXG5cbi8qIGlzdGFuYnVsIGlnbm9yZSBpZiAqL1xuXG5pZiAoJCQ0KSB7XG4gIHZhciBKUVVFUllfTk9fQ09ORkxJQ1QkMyA9ICQkNC5mbltOQU1FJDNdO1xuICAkJDQuZm5bTkFNRSQzXSA9IENhcm91c2VsLmpRdWVyeUludGVyZmFjZTtcbiAgJCQ0LmZuW05BTUUkM10uQ29uc3RydWN0b3IgPSBDYXJvdXNlbDtcblxuICAkJDQuZm5bTkFNRSQzXS5ub0NvbmZsaWN0ID0gZnVuY3Rpb24gKCkge1xuICAgICQkNC5mbltOQU1FJDNdID0gSlFVRVJZX05PX0NPTkZMSUNUJDM7XG4gICAgcmV0dXJuIENhcm91c2VsLmpRdWVyeUludGVyZmFjZTtcbiAgfTtcbn1cblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENvbnN0YW50c1xuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIE5BTUUkNCA9ICdjbGFzcy10b2dnbGVyJztcbnZhciBWRVJTSU9OJDQgPSAnMy4yLjAnO1xudmFyIERBVEFfS0VZJDQgPSAnY29yZXVpLmNsYXNzLXRvZ2dsZXInO1xudmFyIEVWRU5UX0tFWSQ0ID0gXCIuXCIgKyBEQVRBX0tFWSQ0O1xudmFyIERBVEFfQVBJX0tFWSQ0ID0gJy5kYXRhLWFwaSc7XG52YXIgRGVmYXVsdCQyID0ge1xuICBicmVha3BvaW50czogJy1zbSwtbWQsLWxnLC14bCcsXG4gIHBvc3RmaXg6ICctc2hvdycsXG4gIHJlc3BvbnNpdmU6IGZhbHNlLFxuICB0YXJnZXQ6ICdib2R5J1xufTtcbnZhciBDTEFTU19OQU1FX0NMQVNTX1RPR0dMRVIgPSAnYy1jbGFzcy10b2dnbGVyJztcbnZhciBFVkVOVF9DTEFTU19UT0dHTEUgPSAnY2xhc3N0b2dnbGUnO1xudmFyIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDQgPSBcImNsaWNrXCIgKyBFVkVOVF9LRVkkNCArIERBVEFfQVBJX0tFWSQ0O1xudmFyIFNFTEVDVE9SX0NMQVNTX1RPR0dMRVIgPSAnLmMtY2xhc3MtdG9nZ2xlcic7XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ2xhc3MgRGVmaW5pdGlvblxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIENsYXNzVG9nZ2xlciA9IC8qI19fUFVSRV9fKi9mdW5jdGlvbiAoKSB7XG4gIGZ1bmN0aW9uIENsYXNzVG9nZ2xlcihlbGVtZW50KSB7XG4gICAgdGhpcy5fZWxlbWVudCA9IGVsZW1lbnQ7XG4gIH0gLy8gR2V0dGVyc1xuXG5cbiAgdmFyIF9wcm90byA9IENsYXNzVG9nZ2xlci5wcm90b3R5cGU7XG5cbiAgLy8gUHVibGljXG4gIF9wcm90by50b2dnbGUgPSBmdW5jdGlvbiB0b2dnbGUoKSB7XG4gICAgdmFyIF90aGlzID0gdGhpcztcblxuICAgIHRoaXMuX2dldEVsZW1lbnREYXRhQXR0cmlidXRlcyh0aGlzLl9lbGVtZW50KS5mb3JFYWNoKGZ1bmN0aW9uIChkYXRhQXR0cmlidXRlcykge1xuICAgICAgdmFyIGVsZW1lbnQ7XG4gICAgICB2YXIgdGFyZ2V0ID0gZGF0YUF0dHJpYnV0ZXMudGFyZ2V0LFxuICAgICAgICAgIHRvZ2dsZSA9IGRhdGFBdHRyaWJ1dGVzLnRvZ2dsZTtcblxuICAgICAgaWYgKHRhcmdldCA9PT0gJ19wYXJlbnQnIHx8IHRhcmdldCA9PT0gJ3BhcmVudCcpIHtcbiAgICAgICAgZWxlbWVudCA9IF90aGlzLl9lbGVtZW50LnBhcmVudE5vZGU7XG4gICAgICB9IGVsc2Uge1xuICAgICAgICBlbGVtZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3Rvcih0YXJnZXQpO1xuICAgICAgfVxuXG4gICAgICB0b2dnbGUuZm9yRWFjaChmdW5jdGlvbiAob2JqZWN0KSB7XG4gICAgICAgIHZhciBjbGFzc05hbWUgPSBvYmplY3QuY2xhc3NOYW1lLFxuICAgICAgICAgICAgcmVzcG9uc2l2ZSA9IG9iamVjdC5yZXNwb25zaXZlLFxuICAgICAgICAgICAgcG9zdGZpeCA9IG9iamVjdC5wb3N0Zml4O1xuICAgICAgICB2YXIgYnJlYWtwb2ludHMgPSB0eXBlb2Ygb2JqZWN0LmJyZWFrcG9pbnRzID09PSAndW5kZWZpbmVkJyB8fCBvYmplY3QuYnJlYWtwb2ludHMgPT09IG51bGwgPyBudWxsIDogX3RoaXMuX2FycmF5RnJvbVN0cmluZyhvYmplY3QuYnJlYWtwb2ludHMpOyAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgbm8tbmVnYXRlZC1jb25kaXRpb25cblxuICAgICAgICBpZiAoIXJlc3BvbnNpdmUpIHtcbiAgICAgICAgICB2YXIgYWRkID0gZWxlbWVudC5jbGFzc0xpc3QudG9nZ2xlKGNsYXNzTmFtZSk7XG4gICAgICAgICAgdmFyIGV2ZW50ID0gbmV3IEN1c3RvbUV2ZW50KEVWRU5UX0NMQVNTX1RPR0dMRSwge1xuICAgICAgICAgICAgZGV0YWlsOiB7XG4gICAgICAgICAgICAgIHRhcmdldDogdGFyZ2V0LFxuICAgICAgICAgICAgICBhZGQ6IGFkZCxcbiAgICAgICAgICAgICAgY2xhc3NOYW1lOiBjbGFzc05hbWVcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9KTtcbiAgICAgICAgICBlbGVtZW50LmRpc3BhdGNoRXZlbnQoZXZlbnQpO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIHZhciBjdXJyZW50QnJlYWtwb2ludDtcbiAgICAgICAgICBicmVha3BvaW50cy5mb3JFYWNoKGZ1bmN0aW9uIChicmVha3BvaW50KSB7XG4gICAgICAgICAgICBpZiAoY2xhc3NOYW1lLmluY2x1ZGVzKGJyZWFrcG9pbnQpKSB7XG4gICAgICAgICAgICAgIGN1cnJlbnRCcmVha3BvaW50ID0gYnJlYWtwb2ludDtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9KTtcbiAgICAgICAgICB2YXIgcmVzcG9uc2l2ZUNsYXNzTmFtZXMgPSBbXTtcblxuICAgICAgICAgIGlmICh0eXBlb2YgY3VycmVudEJyZWFrcG9pbnQgPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgICAgICByZXNwb25zaXZlQ2xhc3NOYW1lcy5wdXNoKGNsYXNzTmFtZSk7XG4gICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIHJlc3BvbnNpdmVDbGFzc05hbWVzLnB1c2goY2xhc3NOYW1lLnJlcGxhY2UoXCJcIiArIGN1cnJlbnRCcmVha3BvaW50ICsgcG9zdGZpeCwgcG9zdGZpeCkpO1xuICAgICAgICAgICAgYnJlYWtwb2ludHMuc3BsaWNlKDAsIGJyZWFrcG9pbnRzLmluZGV4T2YoY3VycmVudEJyZWFrcG9pbnQpICsgMSkuZm9yRWFjaChmdW5jdGlvbiAoYnJlYWtwb2ludCkge1xuICAgICAgICAgICAgICByZXNwb25zaXZlQ2xhc3NOYW1lcy5wdXNoKGNsYXNzTmFtZS5yZXBsYWNlKFwiXCIgKyBjdXJyZW50QnJlYWtwb2ludCArIHBvc3RmaXgsIFwiXCIgKyBicmVha3BvaW50ICsgcG9zdGZpeCkpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgdmFyIGFkZFJlc3BvbnNpdmVDbGFzc2VzID0gZmFsc2U7XG4gICAgICAgICAgcmVzcG9uc2l2ZUNsYXNzTmFtZXMuZm9yRWFjaChmdW5jdGlvbiAocmVzcG9uc2l2ZUNsYXNzTmFtZSkge1xuICAgICAgICAgICAgaWYgKGVsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKHJlc3BvbnNpdmVDbGFzc05hbWUpKSB7XG4gICAgICAgICAgICAgIGFkZFJlc3BvbnNpdmVDbGFzc2VzID0gdHJ1ZTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9KTtcblxuICAgICAgICAgIGlmIChhZGRSZXNwb25zaXZlQ2xhc3Nlcykge1xuICAgICAgICAgICAgcmVzcG9uc2l2ZUNsYXNzTmFtZXMuZm9yRWFjaChmdW5jdGlvbiAocmVzcG9uc2l2ZUNsYXNzTmFtZSkge1xuICAgICAgICAgICAgICBlbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUocmVzcG9uc2l2ZUNsYXNzTmFtZSk7XG4gICAgICAgICAgICAgIHZhciBldmVudCA9IG5ldyBDdXN0b21FdmVudChFVkVOVF9DTEFTU19UT0dHTEUsIHtcbiAgICAgICAgICAgICAgICBkZXRhaWw6IHtcbiAgICAgICAgICAgICAgICAgIHRhcmdldDogdGFyZ2V0LFxuICAgICAgICAgICAgICAgICAgYWRkOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogcmVzcG9uc2l2ZUNsYXNzTmFtZVxuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgIGVsZW1lbnQuZGlzcGF0Y2hFdmVudChldmVudCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgZWxlbWVudC5jbGFzc0xpc3QuYWRkKGNsYXNzTmFtZSk7XG5cbiAgICAgICAgICAgIHZhciBfZXZlbnQgPSBuZXcgQ3VzdG9tRXZlbnQoRVZFTlRfQ0xBU1NfVE9HR0xFLCB7XG4gICAgICAgICAgICAgIGRldGFpbDoge1xuICAgICAgICAgICAgICAgIHRhcmdldDogdGFyZ2V0LFxuICAgICAgICAgICAgICAgIGFkZDogdHJ1ZSxcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6IGNsYXNzTmFtZVxuICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgZWxlbWVudC5kaXNwYXRjaEV2ZW50KF9ldmVudCk7XG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9KTtcbiAgICB9KTtcbiAgfSAvLyBQcml2YXRlXG4gIDtcblxuICBfcHJvdG8uX2FycmF5RnJvbVN0cmluZyA9IGZ1bmN0aW9uIF9hcnJheUZyb21TdHJpbmcoc3RyaW5nKSB7XG4gICAgcmV0dXJuIHN0cmluZy5yZXBsYWNlKC8gL2csICcnKS5zcGxpdCgnLCcpO1xuICB9O1xuXG4gIF9wcm90by5faXNBcnJheSA9IGZ1bmN0aW9uIF9pc0FycmF5KGFycmF5KSB7XG4gICAgdHJ5IHtcbiAgICAgIEpTT04ucGFyc2UoYXJyYXkucmVwbGFjZSgvJy9nLCAnXCInKSk7XG4gICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9IGNhdGNoIChfdW51c2VkKSB7XG4gICAgICByZXR1cm4gZmFsc2U7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5fY29udmVydFRvQXJyYXkgPSBmdW5jdGlvbiBfY29udmVydFRvQXJyYXkoYXJyYXkpIHtcbiAgICByZXR1cm4gSlNPTi5wYXJzZShhcnJheS5yZXBsYWNlKC8nL2csICdcIicpKTtcbiAgfTtcblxuICBfcHJvdG8uX2dldERhdGFBdHRyaWJ1dGVzID0gZnVuY3Rpb24gX2dldERhdGFBdHRyaWJ1dGVzKGRhdGEsIGF0dHJpYnV0ZSkge1xuICAgIHZhciBkYXRhQXR0cmlidXRlID0gZGF0YVthdHRyaWJ1dGVdO1xuICAgIHJldHVybiB0aGlzLl9pc0FycmF5KGRhdGFBdHRyaWJ1dGUpID8gdGhpcy5fY29udmVydFRvQXJyYXkoZGF0YUF0dHJpYnV0ZSkgOiBkYXRhQXR0cmlidXRlO1xuICB9O1xuXG4gIF9wcm90by5fZ2V0VG9nZ2xlRGV0YWlscyA9IGZ1bmN0aW9uIF9nZXRUb2dnbGVEZXRhaWxzKGNsYXNzTmFtZXMsIHJlc3BvbnNpdmUsIGJyZWFrcG9pbnRzLCBwb3N0Zml4KSB7XG4gICAgdmFyIFRvZ2dsZURldGFpbHMgPSAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgZGVmYXVsdC1wYXJhbS1sYXN0XG4gICAgZnVuY3Rpb24gVG9nZ2xlRGV0YWlscyhjbGFzc05hbWUsIHJlc3BvbnNpdmUsIGJyZWFrcG9pbnRzLCBwb3N0Zml4KSB7XG4gICAgICBpZiAocmVzcG9uc2l2ZSA9PT0gdm9pZCAwKSB7XG4gICAgICAgIHJlc3BvbnNpdmUgPSBEZWZhdWx0JDIucmVzcG9uc2l2ZTtcbiAgICAgIH1cblxuICAgICAgdGhpcy5jbGFzc05hbWUgPSBjbGFzc05hbWU7XG4gICAgICB0aGlzLnJlc3BvbnNpdmUgPSByZXNwb25zaXZlO1xuICAgICAgdGhpcy5icmVha3BvaW50cyA9IGJyZWFrcG9pbnRzO1xuICAgICAgdGhpcy5wb3N0Zml4ID0gcG9zdGZpeDtcbiAgICB9O1xuXG4gICAgdmFyIHRvZ2dsZSA9IFtdO1xuXG4gICAgaWYgKEFycmF5LmlzQXJyYXkoY2xhc3NOYW1lcykpIHtcbiAgICAgIGNsYXNzTmFtZXMuZm9yRWFjaChmdW5jdGlvbiAoY2xhc3NOYW1lLCBpbmRleCkge1xuICAgICAgICByZXNwb25zaXZlID0gQXJyYXkuaXNBcnJheShyZXNwb25zaXZlKSA/IHJlc3BvbnNpdmVbaW5kZXhdIDogcmVzcG9uc2l2ZTtcbiAgICAgICAgYnJlYWtwb2ludHMgPSByZXNwb25zaXZlID8gQXJyYXkuaXNBcnJheShicmVha3BvaW50cykgPyBicmVha3BvaW50c1tpbmRleF0gOiBicmVha3BvaW50cyA6IG51bGw7XG4gICAgICAgIHBvc3RmaXggPSByZXNwb25zaXZlID8gQXJyYXkuaXNBcnJheShwb3N0Zml4KSA/IHBvc3RmaXhbaW5kZXhdIDogcG9zdGZpeCA6IG51bGw7XG4gICAgICAgIHRvZ2dsZS5wdXNoKG5ldyBUb2dnbGVEZXRhaWxzKGNsYXNzTmFtZSwgcmVzcG9uc2l2ZSwgYnJlYWtwb2ludHMsIHBvc3RmaXgpKTtcbiAgICAgIH0pO1xuICAgIH0gZWxzZSB7XG4gICAgICBicmVha3BvaW50cyA9IHJlc3BvbnNpdmUgPyBicmVha3BvaW50cyA6IG51bGw7XG4gICAgICBwb3N0Zml4ID0gcmVzcG9uc2l2ZSA/IHBvc3RmaXggOiBudWxsO1xuICAgICAgdG9nZ2xlLnB1c2gobmV3IFRvZ2dsZURldGFpbHMoY2xhc3NOYW1lcywgcmVzcG9uc2l2ZSwgYnJlYWtwb2ludHMsIHBvc3RmaXgpKTtcbiAgICB9XG5cbiAgICByZXR1cm4gdG9nZ2xlO1xuICB9O1xuXG4gIF9wcm90by5faWZBcnJheSA9IGZ1bmN0aW9uIF9pZkFycmF5KGFycmF5LCBpbmRleCkge1xuICAgIHJldHVybiBBcnJheS5pc0FycmF5KGFycmF5KSA/IGFycmF5W2luZGV4XSA6IGFycmF5O1xuICB9O1xuXG4gIF9wcm90by5fZ2V0RWxlbWVudERhdGFBdHRyaWJ1dGVzID0gZnVuY3Rpb24gX2dldEVsZW1lbnREYXRhQXR0cmlidXRlcyhlbGVtZW50KSB7XG4gICAgdmFyIF90aGlzMiA9IHRoaXM7XG5cbiAgICB2YXIgZGF0YSA9IGVsZW1lbnQuZGF0YXNldDtcbiAgICB2YXIgdGFyZ2V0cyA9IHR5cGVvZiBkYXRhLnRhcmdldCA9PT0gJ3VuZGVmaW5lZCcgPyBEZWZhdWx0JDIudGFyZ2V0IDogdGhpcy5fZ2V0RGF0YUF0dHJpYnV0ZXMoZGF0YSwgJ3RhcmdldCcpO1xuICAgIHZhciBjbGFzc05hbWVzID0gdHlwZW9mIGRhdGEuY2xhc3MgPT09ICd1bmRlZmluZWQnID8gJ3VuZGVmaW5lZCcgOiB0aGlzLl9nZXREYXRhQXR0cmlidXRlcyhkYXRhLCAnY2xhc3MnKTtcbiAgICB2YXIgcmVzcG9uc2l2ZSA9IHR5cGVvZiBkYXRhLnJlc3BvbnNpdmUgPT09ICd1bmRlZmluZWQnID8gRGVmYXVsdCQyLnJlc3BvbnNpdmUgOiB0aGlzLl9nZXREYXRhQXR0cmlidXRlcyhkYXRhLCAncmVzcG9uc2l2ZScpO1xuICAgIHZhciBicmVha3BvaW50cyA9IHR5cGVvZiBkYXRhLmJyZWFrcG9pbnRzID09PSAndW5kZWZpbmVkJyA/IERlZmF1bHQkMi5icmVha3BvaW50cyA6IHRoaXMuX2dldERhdGFBdHRyaWJ1dGVzKGRhdGEsICdicmVha3BvaW50cycpO1xuICAgIHZhciBwb3N0Zml4ID0gdHlwZW9mIGRhdGEucG9zdGZpeCA9PT0gJ3VuZGVmaW5lZCcgPyBEZWZhdWx0JDIucG9zdGZpeCA6IHRoaXMuX2dldERhdGFBdHRyaWJ1dGVzKGRhdGEsICdwb3N0Zml4Jyk7XG4gICAgdmFyIHRvZ2dsZSA9IFtdO1xuXG4gICAgdmFyIFRhcmdldERldGFpbHMgPSBmdW5jdGlvbiBUYXJnZXREZXRhaWxzKHRhcmdldCwgdG9nZ2xlKSB7XG4gICAgICB0aGlzLnRhcmdldCA9IHRhcmdldDtcbiAgICAgIHRoaXMudG9nZ2xlID0gdG9nZ2xlO1xuICAgIH07XG5cbiAgICBpZiAoQXJyYXkuaXNBcnJheSh0YXJnZXRzKSkge1xuICAgICAgdGFyZ2V0cy5mb3JFYWNoKGZ1bmN0aW9uICh0YXJnZXQsIGluZGV4KSB7XG4gICAgICAgIHRvZ2dsZS5wdXNoKG5ldyBUYXJnZXREZXRhaWxzKHRhcmdldCwgX3RoaXMyLl9nZXRUb2dnbGVEZXRhaWxzKF90aGlzMi5faWZBcnJheShjbGFzc05hbWVzLCBpbmRleCksIF90aGlzMi5faWZBcnJheShyZXNwb25zaXZlLCBpbmRleCksIF90aGlzMi5faWZBcnJheShicmVha3BvaW50cywgaW5kZXgpLCBfdGhpczIuX2lmQXJyYXkocG9zdGZpeCwgaW5kZXgpKSkpO1xuICAgICAgfSk7XG4gICAgfSBlbHNlIHtcbiAgICAgIHRvZ2dsZS5wdXNoKG5ldyBUYXJnZXREZXRhaWxzKHRhcmdldHMsIHRoaXMuX2dldFRvZ2dsZURldGFpbHMoY2xhc3NOYW1lcywgcmVzcG9uc2l2ZSwgYnJlYWtwb2ludHMsIHBvc3RmaXgpKSk7XG4gICAgfVxuXG4gICAgcmV0dXJuIHRvZ2dsZTtcbiAgfSAvLyBTdGF0aWNcbiAgO1xuXG4gIENsYXNzVG9nZ2xlci5fY2xhc3NUb2dnbGVySW50ZXJmYWNlID0gZnVuY3Rpb24gX2NsYXNzVG9nZ2xlckludGVyZmFjZShlbGVtZW50LCBjb25maWcpIHtcbiAgICB2YXIgZGF0YSA9IERhdGEuZ2V0RGF0YShlbGVtZW50LCBEQVRBX0tFWSQ0KTtcblxuICAgIHZhciBfY29uZmlnID0gdHlwZW9mIGNvbmZpZyA9PT0gJ29iamVjdCcgJiYgY29uZmlnO1xuXG4gICAgaWYgKCFkYXRhKSB7XG4gICAgICBkYXRhID0gbmV3IENsYXNzVG9nZ2xlcihlbGVtZW50LCBfY29uZmlnKTtcbiAgICB9XG5cbiAgICBpZiAodHlwZW9mIGNvbmZpZyA9PT0gJ3N0cmluZycpIHtcbiAgICAgIGlmICh0eXBlb2YgZGF0YVtjb25maWddID09PSAndW5kZWZpbmVkJykge1xuICAgICAgICB0aHJvdyBuZXcgVHlwZUVycm9yKFwiTm8gbWV0aG9kIG5hbWVkIFxcXCJcIiArIGNvbmZpZyArIFwiXFxcIlwiKTtcbiAgICAgIH1cblxuICAgICAgZGF0YVtjb25maWddKCk7XG4gICAgfVxuICB9O1xuXG4gIENsYXNzVG9nZ2xlci5qUXVlcnlJbnRlcmZhY2UgPSBmdW5jdGlvbiBqUXVlcnlJbnRlcmZhY2UoY29uZmlnKSB7XG4gICAgcmV0dXJuIHRoaXMuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICBDbGFzc1RvZ2dsZXIuX2NsYXNzVG9nZ2xlckludGVyZmFjZSh0aGlzLCBjb25maWcpO1xuICAgIH0pO1xuICB9O1xuXG4gIF9jcmVhdGVDbGFzcyhDbGFzc1RvZ2dsZXIsIG51bGwsIFt7XG4gICAga2V5OiBcIlZFUlNJT05cIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBWRVJTSU9OJDQ7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIENsYXNzVG9nZ2xlcjtcbn0oKTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBEYXRhIEFwaSBpbXBsZW1lbnRhdGlvblxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxuXG5FdmVudEhhbmRsZXIub24oZG9jdW1lbnQsIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDQsIFNFTEVDVE9SX0NMQVNTX1RPR0dMRVIsIGZ1bmN0aW9uIChldmVudCkge1xuICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICB2YXIgdG9nZ2xlciA9IGV2ZW50LnRhcmdldDtcblxuICBpZiAoIXRvZ2dsZXIuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfQ0xBU1NfVE9HR0xFUikpIHtcbiAgICB0b2dnbGVyID0gdG9nZ2xlci5jbG9zZXN0KFNFTEVDVE9SX0NMQVNTX1RPR0dMRVIpO1xuICB9XG5cbiAgQ2xhc3NUb2dnbGVyLl9jbGFzc1RvZ2dsZXJJbnRlcmZhY2UodG9nZ2xlciwgJ3RvZ2dsZScpO1xufSk7XG52YXIgJCQ1ID0gZ2V0alF1ZXJ5KCk7XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogalF1ZXJ5XG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIGFkZCAuYy1jbGFzcy10b2dnbGVyIHRvIGpRdWVyeSBvbmx5IGlmIGpRdWVyeSBpcyBwcmVzZW50XG4gKi9cblxuaWYgKCQkNSkge1xuICB2YXIgSlFVRVJZX05PX0NPTkZMSUNUJDQgPSAkJDUuZm5bTkFNRSQ0XTtcbiAgJCQ1LmZuW05BTUUkNF0gPSBDbGFzc1RvZ2dsZXIualF1ZXJ5SW50ZXJmYWNlO1xuICAkJDUuZm5bTkFNRSQ0XS5Db25zdHJ1Y3RvciA9IENsYXNzVG9nZ2xlcjtcblxuICAkJDUuZm5bTkFNRSQ0XS5ub0NvbmZsaWN0ID0gZnVuY3Rpb24gKCkge1xuICAgICQkNS5mbltOQU1FJDRdID0gSlFVRVJZX05PX0NPTkZMSUNUJDQ7XG4gICAgcmV0dXJuIENsYXNzVG9nZ2xlci5qUXVlcnlJbnRlcmZhY2U7XG4gIH07XG59XG5cbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDb25zdGFudHNcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cbnZhciBOQU1FJDUgPSAnY29sbGFwc2UnO1xudmFyIFZFUlNJT04kNSA9ICczLjIuMCc7XG52YXIgREFUQV9LRVkkNSA9ICdjb3JldWkuY29sbGFwc2UnO1xudmFyIEVWRU5UX0tFWSQ1ID0gXCIuXCIgKyBEQVRBX0tFWSQ1O1xudmFyIERBVEFfQVBJX0tFWSQ1ID0gJy5kYXRhLWFwaSc7XG52YXIgRGVmYXVsdCQzID0ge1xuICB0b2dnbGU6IHRydWUsXG4gIHBhcmVudDogJydcbn07XG52YXIgRGVmYXVsdFR5cGUkMSA9IHtcbiAgdG9nZ2xlOiAnYm9vbGVhbicsXG4gIHBhcmVudDogJyhzdHJpbmd8ZWxlbWVudCknXG59O1xudmFyIEVWRU5UX1NIT1cgPSBcInNob3dcIiArIEVWRU5UX0tFWSQ1O1xudmFyIEVWRU5UX1NIT1dOID0gXCJzaG93blwiICsgRVZFTlRfS0VZJDU7XG52YXIgRVZFTlRfSElERSA9IFwiaGlkZVwiICsgRVZFTlRfS0VZJDU7XG52YXIgRVZFTlRfSElEREVOID0gXCJoaWRkZW5cIiArIEVWRU5UX0tFWSQ1O1xudmFyIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDUgPSBcImNsaWNrXCIgKyBFVkVOVF9LRVkkNSArIERBVEFfQVBJX0tFWSQ1O1xudmFyIENMQVNTX05BTUVfU0hPVyQxID0gJ3Nob3cnO1xudmFyIENMQVNTX05BTUVfQ09MTEFQU0UgPSAnY29sbGFwc2UnO1xudmFyIENMQVNTX05BTUVfQ09MTEFQU0lORyA9ICdjb2xsYXBzaW5nJztcbnZhciBDTEFTU19OQU1FX0NPTExBUFNFRCA9ICdjb2xsYXBzZWQnO1xudmFyIFdJRFRIID0gJ3dpZHRoJztcbnZhciBIRUlHSFQgPSAnaGVpZ2h0JztcbnZhciBTRUxFQ1RPUl9BQ1RJVkVTID0gJy5zaG93LCAuY29sbGFwc2luZyc7XG52YXIgU0VMRUNUT1JfREFUQV9UT0dHTEUkMSA9ICdbZGF0YS10b2dnbGU9XCJjb2xsYXBzZVwiXSc7XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ2xhc3MgRGVmaW5pdGlvblxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIENvbGxhcHNlID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gQ29sbGFwc2UoZWxlbWVudCwgY29uZmlnKSB7XG4gICAgdGhpcy5faXNUcmFuc2l0aW9uaW5nID0gZmFsc2U7XG4gICAgdGhpcy5fZWxlbWVudCA9IGVsZW1lbnQ7XG4gICAgdGhpcy5fY29uZmlnID0gdGhpcy5fZ2V0Q29uZmlnKGNvbmZpZyk7XG4gICAgdGhpcy5fdHJpZ2dlckFycmF5ID0gU2VsZWN0b3JFbmdpbmUuZmluZChTRUxFQ1RPUl9EQVRBX1RPR0dMRSQxICsgXCJbaHJlZj1cXFwiI1wiICsgZWxlbWVudC5pZCArIFwiXFxcIl0sXCIgKyAoU0VMRUNUT1JfREFUQV9UT0dHTEUkMSArIFwiW2RhdGEtdGFyZ2V0PVxcXCIjXCIgKyBlbGVtZW50LmlkICsgXCJcXFwiXVwiKSk7XG4gICAgdmFyIHRvZ2dsZUxpc3QgPSBTZWxlY3RvckVuZ2luZS5maW5kKFNFTEVDVE9SX0RBVEFfVE9HR0xFJDEpO1xuXG4gICAgZm9yICh2YXIgaSA9IDAsIGxlbiA9IHRvZ2dsZUxpc3QubGVuZ3RoOyBpIDwgbGVuOyBpKyspIHtcbiAgICAgIHZhciBlbGVtID0gdG9nZ2xlTGlzdFtpXTtcbiAgICAgIHZhciBzZWxlY3RvciA9IGdldFNlbGVjdG9yRnJvbUVsZW1lbnQoZWxlbSk7XG4gICAgICB2YXIgZmlsdGVyRWxlbWVudCA9IFNlbGVjdG9yRW5naW5lLmZpbmQoc2VsZWN0b3IpLmZpbHRlcihmdW5jdGlvbiAoZm91bmRFbGVtKSB7XG4gICAgICAgIHJldHVybiBmb3VuZEVsZW0gPT09IGVsZW1lbnQ7XG4gICAgICB9KTtcblxuICAgICAgaWYgKHNlbGVjdG9yICE9PSBudWxsICYmIGZpbHRlckVsZW1lbnQubGVuZ3RoKSB7XG4gICAgICAgIHRoaXMuX3NlbGVjdG9yID0gc2VsZWN0b3I7XG5cbiAgICAgICAgdGhpcy5fdHJpZ2dlckFycmF5LnB1c2goZWxlbSk7XG4gICAgICB9XG4gICAgfVxuXG4gICAgdGhpcy5fcGFyZW50ID0gdGhpcy5fY29uZmlnLnBhcmVudCA/IHRoaXMuX2dldFBhcmVudCgpIDogbnVsbDtcblxuICAgIGlmICghdGhpcy5fY29uZmlnLnBhcmVudCkge1xuICAgICAgdGhpcy5fYWRkQXJpYUFuZENvbGxhcHNlZENsYXNzKHRoaXMuX2VsZW1lbnQsIHRoaXMuX3RyaWdnZXJBcnJheSk7XG4gICAgfVxuXG4gICAgaWYgKHRoaXMuX2NvbmZpZy50b2dnbGUpIHtcbiAgICAgIHRoaXMudG9nZ2xlKCk7XG4gICAgfVxuXG4gICAgRGF0YS5zZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJDUsIHRoaXMpO1xuICB9IC8vIEdldHRlcnNcblxuXG4gIHZhciBfcHJvdG8gPSBDb2xsYXBzZS5wcm90b3R5cGU7XG5cbiAgLy8gUHVibGljXG4gIF9wcm90by50b2dnbGUgPSBmdW5jdGlvbiB0b2dnbGUoKSB7XG4gICAgaWYgKHRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0hPVyQxKSkge1xuICAgICAgdGhpcy5oaWRlKCk7XG4gICAgfSBlbHNlIHtcbiAgICAgIHRoaXMuc2hvdygpO1xuICAgIH1cbiAgfTtcblxuICBfcHJvdG8uc2hvdyA9IGZ1bmN0aW9uIHNob3coKSB7XG4gICAgdmFyIF90aGlzID0gdGhpcztcblxuICAgIGlmICh0aGlzLl9pc1RyYW5zaXRpb25pbmcgfHwgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9TSE9XJDEpKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgdmFyIGFjdGl2ZXM7XG4gICAgdmFyIGFjdGl2ZXNEYXRhO1xuXG4gICAgaWYgKHRoaXMuX3BhcmVudCkge1xuICAgICAgYWN0aXZlcyA9IFNlbGVjdG9yRW5naW5lLmZpbmQoU0VMRUNUT1JfQUNUSVZFUywgdGhpcy5fcGFyZW50KS5maWx0ZXIoZnVuY3Rpb24gKGVsZW0pIHtcbiAgICAgICAgaWYgKHR5cGVvZiBfdGhpcy5fY29uZmlnLnBhcmVudCA9PT0gJ3N0cmluZycpIHtcbiAgICAgICAgICByZXR1cm4gZWxlbS5nZXRBdHRyaWJ1dGUoJ2RhdGEtcGFyZW50JykgPT09IF90aGlzLl9jb25maWcucGFyZW50O1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIGVsZW0uY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfQ09MTEFQU0UpO1xuICAgICAgfSk7XG5cbiAgICAgIGlmIChhY3RpdmVzLmxlbmd0aCA9PT0gMCkge1xuICAgICAgICBhY3RpdmVzID0gbnVsbDtcbiAgICAgIH1cbiAgICB9XG5cbiAgICB2YXIgY29udGFpbmVyID0gU2VsZWN0b3JFbmdpbmUuZmluZE9uZSh0aGlzLl9zZWxlY3Rvcik7XG5cbiAgICBpZiAoYWN0aXZlcykge1xuICAgICAgdmFyIHRlbXBBY3RpdmVEYXRhID0gYWN0aXZlcy5maWx0ZXIoZnVuY3Rpb24gKGVsZW0pIHtcbiAgICAgICAgcmV0dXJuIGNvbnRhaW5lciAhPT0gZWxlbTtcbiAgICAgIH0pO1xuICAgICAgYWN0aXZlc0RhdGEgPSB0ZW1wQWN0aXZlRGF0YVswXSA/IERhdGEuZ2V0RGF0YSh0ZW1wQWN0aXZlRGF0YVswXSwgREFUQV9LRVkkNSkgOiBudWxsO1xuXG4gICAgICBpZiAoYWN0aXZlc0RhdGEgJiYgYWN0aXZlc0RhdGEuX2lzVHJhbnNpdGlvbmluZykge1xuICAgICAgICByZXR1cm47XG4gICAgICB9XG4gICAgfVxuXG4gICAgdmFyIHN0YXJ0RXZlbnQgPSBFdmVudEhhbmRsZXIudHJpZ2dlcih0aGlzLl9lbGVtZW50LCBFVkVOVF9TSE9XKTtcblxuICAgIGlmIChzdGFydEV2ZW50LmRlZmF1bHRQcmV2ZW50ZWQpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAoYWN0aXZlcykge1xuICAgICAgYWN0aXZlcy5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtQWN0aXZlKSB7XG4gICAgICAgIGlmIChjb250YWluZXIgIT09IGVsZW1BY3RpdmUpIHtcbiAgICAgICAgICBDb2xsYXBzZS5jb2xsYXBzZUludGVyZmFjZShlbGVtQWN0aXZlLCAnaGlkZScpO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKCFhY3RpdmVzRGF0YSkge1xuICAgICAgICAgIERhdGEuc2V0RGF0YShlbGVtQWN0aXZlLCBEQVRBX0tFWSQ1LCBudWxsKTtcbiAgICAgICAgfVxuICAgICAgfSk7XG4gICAgfVxuXG4gICAgdmFyIGRpbWVuc2lvbiA9IHRoaXMuX2dldERpbWVuc2lvbigpO1xuXG4gICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTX05BTUVfQ09MTEFQU0UpO1xuXG4gICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfQ09MTEFQU0lORyk7XG5cbiAgICB0aGlzLl9lbGVtZW50LnN0eWxlW2RpbWVuc2lvbl0gPSAwO1xuXG4gICAgaWYgKHRoaXMuX3RyaWdnZXJBcnJheS5sZW5ndGgpIHtcbiAgICAgIHRoaXMuX3RyaWdnZXJBcnJheS5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtZW50KSB7XG4gICAgICAgIGVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShDTEFTU19OQU1FX0NPTExBUFNFRCk7XG4gICAgICAgIGVsZW1lbnQuc2V0QXR0cmlidXRlKCdhcmlhLWV4cGFuZGVkJywgdHJ1ZSk7XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICB0aGlzLnNldFRyYW5zaXRpb25pbmcodHJ1ZSk7XG5cbiAgICB2YXIgY29tcGxldGUgPSBmdW5jdGlvbiBjb21wbGV0ZSgpIHtcbiAgICAgIF90aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9DT0xMQVBTSU5HKTtcblxuICAgICAgX3RoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0NPTExBUFNFLCBDTEFTU19OQU1FX1NIT1ckMSk7XG5cbiAgICAgIF90aGlzLl9lbGVtZW50LnN0eWxlW2RpbWVuc2lvbl0gPSAnJztcblxuICAgICAgX3RoaXMuc2V0VHJhbnNpdGlvbmluZyhmYWxzZSk7XG5cbiAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKF90aGlzLl9lbGVtZW50LCBFVkVOVF9TSE9XTik7XG4gICAgfTtcblxuICAgIHZhciBjYXBpdGFsaXplZERpbWVuc2lvbiA9IGRpbWVuc2lvblswXS50b1VwcGVyQ2FzZSgpICsgZGltZW5zaW9uLnNsaWNlKDEpO1xuICAgIHZhciBzY3JvbGxTaXplID0gXCJzY3JvbGxcIiArIGNhcGl0YWxpemVkRGltZW5zaW9uO1xuICAgIHZhciB0cmFuc2l0aW9uRHVyYXRpb24gPSBnZXRUcmFuc2l0aW9uRHVyYXRpb25Gcm9tRWxlbWVudCh0aGlzLl9lbGVtZW50KTtcbiAgICBFdmVudEhhbmRsZXIub25lKHRoaXMuX2VsZW1lbnQsIFRSQU5TSVRJT05fRU5ELCBjb21wbGV0ZSk7XG4gICAgZW11bGF0ZVRyYW5zaXRpb25FbmQodGhpcy5fZWxlbWVudCwgdHJhbnNpdGlvbkR1cmF0aW9uKTtcbiAgICB0aGlzLl9lbGVtZW50LnN0eWxlW2RpbWVuc2lvbl0gPSB0aGlzLl9lbGVtZW50W3Njcm9sbFNpemVdICsgXCJweFwiO1xuICB9O1xuXG4gIF9wcm90by5oaWRlID0gZnVuY3Rpb24gaGlkZSgpIHtcbiAgICB2YXIgX3RoaXMyID0gdGhpcztcblxuICAgIGlmICh0aGlzLl9pc1RyYW5zaXRpb25pbmcgfHwgIXRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0hPVyQxKSkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHZhciBzdGFydEV2ZW50ID0gRXZlbnRIYW5kbGVyLnRyaWdnZXIodGhpcy5fZWxlbWVudCwgRVZFTlRfSElERSk7XG5cbiAgICBpZiAoc3RhcnRFdmVudC5kZWZhdWx0UHJldmVudGVkKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgdmFyIGRpbWVuc2lvbiA9IHRoaXMuX2dldERpbWVuc2lvbigpO1xuXG4gICAgdGhpcy5fZWxlbWVudC5zdHlsZVtkaW1lbnNpb25dID0gdGhpcy5fZWxlbWVudC5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKVtkaW1lbnNpb25dICsgXCJweFwiO1xuICAgIHJlZmxvdyh0aGlzLl9lbGVtZW50KTtcblxuICAgIHRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0NPTExBUFNJTkcpO1xuXG4gICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTX05BTUVfQ09MTEFQU0UsIENMQVNTX05BTUVfU0hPVyQxKTtcblxuICAgIHZhciB0cmlnZ2VyQXJyYXlMZW5ndGggPSB0aGlzLl90cmlnZ2VyQXJyYXkubGVuZ3RoO1xuXG4gICAgaWYgKHRyaWdnZXJBcnJheUxlbmd0aCA+IDApIHtcbiAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgdHJpZ2dlckFycmF5TGVuZ3RoOyBpKyspIHtcbiAgICAgICAgdmFyIHRyaWdnZXIgPSB0aGlzLl90cmlnZ2VyQXJyYXlbaV07XG4gICAgICAgIHZhciBlbGVtID0gZ2V0RWxlbWVudEZyb21TZWxlY3Rvcih0cmlnZ2VyKTtcblxuICAgICAgICBpZiAoZWxlbSAmJiAhZWxlbS5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9TSE9XJDEpKSB7XG4gICAgICAgICAgdHJpZ2dlci5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfQ09MTEFQU0VEKTtcbiAgICAgICAgICB0cmlnZ2VyLnNldEF0dHJpYnV0ZSgnYXJpYS1leHBhbmRlZCcsIGZhbHNlKTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH1cblxuICAgIHRoaXMuc2V0VHJhbnNpdGlvbmluZyh0cnVlKTtcblxuICAgIHZhciBjb21wbGV0ZSA9IGZ1bmN0aW9uIGNvbXBsZXRlKCkge1xuICAgICAgX3RoaXMyLnNldFRyYW5zaXRpb25pbmcoZmFsc2UpO1xuXG4gICAgICBfdGhpczIuX2VsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShDTEFTU19OQU1FX0NPTExBUFNJTkcpO1xuXG4gICAgICBfdGhpczIuX2VsZW1lbnQuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0NPTExBUFNFKTtcblxuICAgICAgRXZlbnRIYW5kbGVyLnRyaWdnZXIoX3RoaXMyLl9lbGVtZW50LCBFVkVOVF9ISURERU4pO1xuICAgIH07XG5cbiAgICB0aGlzLl9lbGVtZW50LnN0eWxlW2RpbWVuc2lvbl0gPSAnJztcbiAgICB2YXIgdHJhbnNpdGlvbkR1cmF0aW9uID0gZ2V0VHJhbnNpdGlvbkR1cmF0aW9uRnJvbUVsZW1lbnQodGhpcy5fZWxlbWVudCk7XG4gICAgRXZlbnRIYW5kbGVyLm9uZSh0aGlzLl9lbGVtZW50LCBUUkFOU0lUSU9OX0VORCwgY29tcGxldGUpO1xuICAgIGVtdWxhdGVUcmFuc2l0aW9uRW5kKHRoaXMuX2VsZW1lbnQsIHRyYW5zaXRpb25EdXJhdGlvbik7XG4gIH07XG5cbiAgX3Byb3RvLnNldFRyYW5zaXRpb25pbmcgPSBmdW5jdGlvbiBzZXRUcmFuc2l0aW9uaW5nKGlzVHJhbnNpdGlvbmluZykge1xuICAgIHRoaXMuX2lzVHJhbnNpdGlvbmluZyA9IGlzVHJhbnNpdGlvbmluZztcbiAgfTtcblxuICBfcHJvdG8uZGlzcG9zZSA9IGZ1bmN0aW9uIGRpc3Bvc2UoKSB7XG4gICAgRGF0YS5yZW1vdmVEYXRhKHRoaXMuX2VsZW1lbnQsIERBVEFfS0VZJDUpO1xuICAgIHRoaXMuX2NvbmZpZyA9IG51bGw7XG4gICAgdGhpcy5fcGFyZW50ID0gbnVsbDtcbiAgICB0aGlzLl9lbGVtZW50ID0gbnVsbDtcbiAgICB0aGlzLl90cmlnZ2VyQXJyYXkgPSBudWxsO1xuICAgIHRoaXMuX2lzVHJhbnNpdGlvbmluZyA9IG51bGw7XG4gIH0gLy8gUHJpdmF0ZVxuICA7XG5cbiAgX3Byb3RvLl9nZXRDb25maWcgPSBmdW5jdGlvbiBfZ2V0Q29uZmlnKGNvbmZpZykge1xuICAgIGNvbmZpZyA9IF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCBEZWZhdWx0JDMpLCBjb25maWcpO1xuICAgIGNvbmZpZy50b2dnbGUgPSBCb29sZWFuKGNvbmZpZy50b2dnbGUpOyAvLyBDb2VyY2Ugc3RyaW5nIHZhbHVlc1xuXG4gICAgdHlwZUNoZWNrQ29uZmlnKE5BTUUkNSwgY29uZmlnLCBEZWZhdWx0VHlwZSQxKTtcbiAgICByZXR1cm4gY29uZmlnO1xuICB9O1xuXG4gIF9wcm90by5fZ2V0RGltZW5zaW9uID0gZnVuY3Rpb24gX2dldERpbWVuc2lvbigpIHtcbiAgICB2YXIgaGFzV2lkdGggPSB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhXSURUSCk7XG5cbiAgICByZXR1cm4gaGFzV2lkdGggPyBXSURUSCA6IEhFSUdIVDtcbiAgfTtcblxuICBfcHJvdG8uX2dldFBhcmVudCA9IGZ1bmN0aW9uIF9nZXRQYXJlbnQoKSB7XG4gICAgdmFyIF90aGlzMyA9IHRoaXM7XG5cbiAgICB2YXIgcGFyZW50ID0gdGhpcy5fY29uZmlnLnBhcmVudDtcblxuICAgIGlmIChpc0VsZW1lbnQocGFyZW50KSkge1xuICAgICAgLy8gaXQncyBhIGpRdWVyeSBvYmplY3RcbiAgICAgIGlmICh0eXBlb2YgcGFyZW50LmpxdWVyeSAhPT0gJ3VuZGVmaW5lZCcgfHwgdHlwZW9mIHBhcmVudFswXSAhPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgcGFyZW50ID0gcGFyZW50WzBdO1xuICAgICAgfVxuICAgIH0gZWxzZSB7XG4gICAgICBwYXJlbnQgPSBTZWxlY3RvckVuZ2luZS5maW5kT25lKHBhcmVudCk7XG4gICAgfVxuXG4gICAgdmFyIHNlbGVjdG9yID0gU0VMRUNUT1JfREFUQV9UT0dHTEUkMSArIFwiW2RhdGEtcGFyZW50PVxcXCJcIiArIHBhcmVudCArIFwiXFxcIl1cIjtcbiAgICBTZWxlY3RvckVuZ2luZS5maW5kKHNlbGVjdG9yLCBwYXJlbnQpLmZvckVhY2goZnVuY3Rpb24gKGVsZW1lbnQpIHtcbiAgICAgIHZhciBzZWxlY3RlZCA9IGdldEVsZW1lbnRGcm9tU2VsZWN0b3IoZWxlbWVudCk7XG5cbiAgICAgIF90aGlzMy5fYWRkQXJpYUFuZENvbGxhcHNlZENsYXNzKHNlbGVjdGVkLCBbZWxlbWVudF0pO1xuICAgIH0pO1xuICAgIHJldHVybiBwYXJlbnQ7XG4gIH07XG5cbiAgX3Byb3RvLl9hZGRBcmlhQW5kQ29sbGFwc2VkQ2xhc3MgPSBmdW5jdGlvbiBfYWRkQXJpYUFuZENvbGxhcHNlZENsYXNzKGVsZW1lbnQsIHRyaWdnZXJBcnJheSkge1xuICAgIGlmIChlbGVtZW50KSB7XG4gICAgICB2YXIgaXNPcGVuID0gZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9TSE9XJDEpO1xuXG4gICAgICBpZiAodHJpZ2dlckFycmF5Lmxlbmd0aCkge1xuICAgICAgICB0cmlnZ2VyQXJyYXkuZm9yRWFjaChmdW5jdGlvbiAoZWxlbSkge1xuICAgICAgICAgIGlmIChpc09wZW4pIHtcbiAgICAgICAgICAgIGVsZW0uY2xhc3NMaXN0LnJlbW92ZShDTEFTU19OQU1FX0NPTExBUFNFRCk7XG4gICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIGVsZW0uY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0NPTExBUFNFRCk7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgZWxlbS5zZXRBdHRyaWJ1dGUoJ2FyaWEtZXhwYW5kZWQnLCBpc09wZW4pO1xuICAgICAgICB9KTtcbiAgICAgIH1cbiAgICB9XG4gIH0gLy8gU3RhdGljXG4gIDtcblxuICBDb2xsYXBzZS5jb2xsYXBzZUludGVyZmFjZSA9IGZ1bmN0aW9uIGNvbGxhcHNlSW50ZXJmYWNlKGVsZW1lbnQsIGNvbmZpZykge1xuICAgIHZhciBkYXRhID0gRGF0YS5nZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJDUpO1xuXG4gICAgdmFyIF9jb25maWcgPSBfb2JqZWN0U3ByZWFkMihfb2JqZWN0U3ByZWFkMihfb2JqZWN0U3ByZWFkMih7fSwgRGVmYXVsdCQzKSwgTWFuaXB1bGF0b3IuZ2V0RGF0YUF0dHJpYnV0ZXMoZWxlbWVudCkpLCB0eXBlb2YgY29uZmlnID09PSAnb2JqZWN0JyAmJiBjb25maWcgPyBjb25maWcgOiB7fSk7XG5cbiAgICBpZiAoIWRhdGEgJiYgX2NvbmZpZy50b2dnbGUgJiYgdHlwZW9mIGNvbmZpZyA9PT0gJ3N0cmluZycgJiYgL3Nob3d8aGlkZS8udGVzdChjb25maWcpKSB7XG4gICAgICBfY29uZmlnLnRvZ2dsZSA9IGZhbHNlO1xuICAgIH1cblxuICAgIGlmICghZGF0YSkge1xuICAgICAgZGF0YSA9IG5ldyBDb2xsYXBzZShlbGVtZW50LCBfY29uZmlnKTtcbiAgICB9XG5cbiAgICBpZiAodHlwZW9mIGNvbmZpZyA9PT0gJ3N0cmluZycpIHtcbiAgICAgIGlmICh0eXBlb2YgZGF0YVtjb25maWddID09PSAndW5kZWZpbmVkJykge1xuICAgICAgICB0aHJvdyBuZXcgVHlwZUVycm9yKFwiTm8gbWV0aG9kIG5hbWVkIFxcXCJcIiArIGNvbmZpZyArIFwiXFxcIlwiKTtcbiAgICAgIH1cblxuICAgICAgZGF0YVtjb25maWddKCk7XG4gICAgfVxuICB9O1xuXG4gIENvbGxhcHNlLmpRdWVyeUludGVyZmFjZSA9IGZ1bmN0aW9uIGpRdWVyeUludGVyZmFjZShjb25maWcpIHtcbiAgICByZXR1cm4gdGhpcy5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgIENvbGxhcHNlLmNvbGxhcHNlSW50ZXJmYWNlKHRoaXMsIGNvbmZpZyk7XG4gICAgfSk7XG4gIH07XG5cbiAgQ29sbGFwc2UuZ2V0SW5zdGFuY2UgPSBmdW5jdGlvbiBnZXRJbnN0YW5jZShlbGVtZW50KSB7XG4gICAgcmV0dXJuIERhdGEuZ2V0RGF0YShlbGVtZW50LCBEQVRBX0tFWSQ1KTtcbiAgfTtcblxuICBfY3JlYXRlQ2xhc3MoQ29sbGFwc2UsIG51bGwsIFt7XG4gICAga2V5OiBcIlZFUlNJT05cIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBWRVJTSU9OJDU7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIkRlZmF1bHRcIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBEZWZhdWx0JDM7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIENvbGxhcHNlO1xufSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIERhdGEgQXBpIGltcGxlbWVudGF0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG5cbkV2ZW50SGFuZGxlci5vbihkb2N1bWVudCwgRVZFTlRfQ0xJQ0tfREFUQV9BUEkkNSwgU0VMRUNUT1JfREFUQV9UT0dHTEUkMSwgZnVuY3Rpb24gKGV2ZW50KSB7XG4gIC8vIHByZXZlbnREZWZhdWx0IG9ubHkgZm9yIDxhPiBlbGVtZW50cyAod2hpY2ggY2hhbmdlIHRoZSBVUkwpIG5vdCBpbnNpZGUgdGhlIGNvbGxhcHNpYmxlIGVsZW1lbnRcbiAgaWYgKGV2ZW50LnRhcmdldC50YWdOYW1lID09PSAnQScpIHtcbiAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICB9XG5cbiAgdmFyIHRyaWdnZXJEYXRhID0gTWFuaXB1bGF0b3IuZ2V0RGF0YUF0dHJpYnV0ZXModGhpcyk7XG4gIHZhciBzZWxlY3RvciA9IGdldFNlbGVjdG9yRnJvbUVsZW1lbnQodGhpcyk7XG4gIHZhciBzZWxlY3RvckVsZW1lbnRzID0gU2VsZWN0b3JFbmdpbmUuZmluZChzZWxlY3Rvcik7XG4gIHNlbGVjdG9yRWxlbWVudHMuZm9yRWFjaChmdW5jdGlvbiAoZWxlbWVudCkge1xuICAgIHZhciBkYXRhID0gRGF0YS5nZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJDUpO1xuICAgIHZhciBjb25maWc7XG5cbiAgICBpZiAoZGF0YSkge1xuICAgICAgLy8gdXBkYXRlIHBhcmVudCBhdHRyaWJ1dGVcbiAgICAgIGlmIChkYXRhLl9wYXJlbnQgPT09IG51bGwgJiYgdHlwZW9mIHRyaWdnZXJEYXRhLnBhcmVudCA9PT0gJ3N0cmluZycpIHtcbiAgICAgICAgZGF0YS5fY29uZmlnLnBhcmVudCA9IHRyaWdnZXJEYXRhLnBhcmVudDtcbiAgICAgICAgZGF0YS5fcGFyZW50ID0gZGF0YS5fZ2V0UGFyZW50KCk7XG4gICAgICB9XG5cbiAgICAgIGNvbmZpZyA9ICd0b2dnbGUnO1xuICAgIH0gZWxzZSB7XG4gICAgICBjb25maWcgPSB0cmlnZ2VyRGF0YTtcbiAgICB9XG5cbiAgICBDb2xsYXBzZS5jb2xsYXBzZUludGVyZmFjZShlbGVtZW50LCBjb25maWcpO1xuICB9KTtcbn0pO1xudmFyICQkNiA9IGdldGpRdWVyeSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIGpRdWVyeVxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBhZGQgLmNvbGxhcHNlIHRvIGpRdWVyeSBvbmx5IGlmIGpRdWVyeSBpcyBwcmVzZW50XG4gKi9cblxuLyogaXN0YW5idWwgaWdub3JlIGlmICovXG5cbmlmICgkJDYpIHtcbiAgdmFyIEpRVUVSWV9OT19DT05GTElDVCQ1ID0gJCQ2LmZuW05BTUUkNV07XG4gICQkNi5mbltOQU1FJDVdID0gQ29sbGFwc2UualF1ZXJ5SW50ZXJmYWNlO1xuICAkJDYuZm5bTkFNRSQ1XS5Db25zdHJ1Y3RvciA9IENvbGxhcHNlO1xuXG4gICQkNi5mbltOQU1FJDVdLm5vQ29uZmxpY3QgPSBmdW5jdGlvbiAoKSB7XG4gICAgJCQ2LmZuW05BTUUkNV0gPSBKUVVFUllfTk9fQ09ORkxJQ1QkNTtcbiAgICByZXR1cm4gQ29sbGFwc2UualF1ZXJ5SW50ZXJmYWNlO1xuICB9O1xufVxuXG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ29uc3RhbnRzXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgTkFNRSQ2ID0gJ2Ryb3Bkb3duJztcbnZhciBWRVJTSU9OJDYgPSAnMy4yLjAnO1xudmFyIERBVEFfS0VZJDYgPSAnY29yZXVpLmRyb3Bkb3duJztcbnZhciBFVkVOVF9LRVkkNiA9IFwiLlwiICsgREFUQV9LRVkkNjtcbnZhciBEQVRBX0FQSV9LRVkkNiA9ICcuZGF0YS1hcGknO1xudmFyIEVTQ0FQRV9LRVkgPSAnRXNjYXBlJztcbnZhciBTUEFDRV9LRVkgPSAnU3BhY2UnO1xudmFyIFRBQl9LRVkgPSAnVGFiJztcbnZhciBBUlJPV19VUF9LRVkgPSAnQXJyb3dVcCc7XG52YXIgQVJST1dfRE9XTl9LRVkgPSAnQXJyb3dEb3duJztcbnZhciBSSUdIVF9NT1VTRV9CVVRUT04gPSAyOyAvLyBNb3VzZUV2ZW50LmJ1dHRvbiB2YWx1ZSBmb3IgdGhlIHNlY29uZGFyeSBidXR0b24sIHVzdWFsbHkgdGhlIHJpZ2h0IGJ1dHRvblxuXG52YXIgUkVHRVhQX0tFWURPV04gPSBuZXcgUmVnRXhwKEFSUk9XX1VQX0tFWSArIFwifFwiICsgQVJST1dfRE9XTl9LRVkgKyBcInxcIiArIEVTQ0FQRV9LRVkpO1xudmFyIEVWRU5UX0hJREUkMSA9IFwiaGlkZVwiICsgRVZFTlRfS0VZJDY7XG52YXIgRVZFTlRfSElEREVOJDEgPSBcImhpZGRlblwiICsgRVZFTlRfS0VZJDY7XG52YXIgRVZFTlRfU0hPVyQxID0gXCJzaG93XCIgKyBFVkVOVF9LRVkkNjtcbnZhciBFVkVOVF9TSE9XTiQxID0gXCJzaG93blwiICsgRVZFTlRfS0VZJDY7XG52YXIgRVZFTlRfQ0xJQ0sgPSBcImNsaWNrXCIgKyBFVkVOVF9LRVkkNjtcbnZhciBFVkVOVF9DTElDS19EQVRBX0FQSSQ2ID0gXCJjbGlja1wiICsgRVZFTlRfS0VZJDYgKyBEQVRBX0FQSV9LRVkkNjtcbnZhciBFVkVOVF9LRVlET1dOX0RBVEFfQVBJID0gXCJrZXlkb3duXCIgKyBFVkVOVF9LRVkkNiArIERBVEFfQVBJX0tFWSQ2O1xudmFyIEVWRU5UX0tFWVVQX0RBVEFfQVBJID0gXCJrZXl1cFwiICsgRVZFTlRfS0VZJDYgKyBEQVRBX0FQSV9LRVkkNjtcbnZhciBDTEFTU19OQU1FX0RJU0FCTEVEJDEgPSAnZGlzYWJsZWQnO1xudmFyIENMQVNTX05BTUVfU0hPVyQyID0gJ3Nob3cnO1xudmFyIENMQVNTX05BTUVfRFJPUFVQID0gJ2Ryb3B1cCc7XG52YXIgQ0xBU1NfTkFNRV9EUk9QUklHSFQgPSAnZHJvcHJpZ2h0JztcbnZhciBDTEFTU19OQU1FX0RST1BMRUZUID0gJ2Ryb3BsZWZ0JztcbnZhciBDTEFTU19OQU1FX0hFQURFUiA9ICdjLWhlYWRlcic7XG52YXIgQ0xBU1NfTkFNRV9NRU5VUklHSFQgPSAnZHJvcGRvd24tbWVudS1yaWdodCc7XG52YXIgQ0xBU1NfTkFNRV9OQVZCQVIgPSAnbmF2YmFyJztcbnZhciBDTEFTU19OQU1FX1BPU0lUSU9OX1NUQVRJQyA9ICdwb3NpdGlvbi1zdGF0aWMnO1xudmFyIFNFTEVDVE9SX0RBVEFfVE9HR0xFJDIgPSAnW2RhdGEtdG9nZ2xlPVwiZHJvcGRvd25cIl0nO1xudmFyIFNFTEVDVE9SX0ZPUk1fQ0hJTEQgPSAnLmRyb3Bkb3duIGZvcm0nO1xudmFyIFNFTEVDVE9SX0hFQURFUl9OQVYgPSAnLmMtaGVhZGVyLW5hdic7XG52YXIgU0VMRUNUT1JfTUVOVSA9ICcuZHJvcGRvd24tbWVudSc7XG52YXIgU0VMRUNUT1JfTkFWQkFSX05BViA9ICcubmF2YmFyLW5hdic7XG52YXIgU0VMRUNUT1JfVklTSUJMRV9JVEVNUyA9ICcuZHJvcGRvd24tbWVudSAuZHJvcGRvd24taXRlbTpub3QoLmRpc2FibGVkKTpub3QoOmRpc2FibGVkKSc7XG52YXIgUExBQ0VNRU5UX1RPUCA9ICd0b3Atc3RhcnQnO1xudmFyIFBMQUNFTUVOVF9UT1BFTkQgPSAndG9wLWVuZCc7XG52YXIgUExBQ0VNRU5UX0JPVFRPTSA9ICdib3R0b20tc3RhcnQnO1xudmFyIFBMQUNFTUVOVF9CT1RUT01FTkQgPSAnYm90dG9tLWVuZCc7XG52YXIgUExBQ0VNRU5UX1JJR0hUID0gJ3JpZ2h0LXN0YXJ0JztcbnZhciBQTEFDRU1FTlRfTEVGVCA9ICdsZWZ0LXN0YXJ0JztcbnZhciBEZWZhdWx0JDQgPSB7XG4gIG9mZnNldDogWzAsIDBdLFxuICBmbGlwOiB0cnVlLFxuICBib3VuZGFyeTogJ3Njcm9sbFBhcmVudCcsXG4gIHJlZmVyZW5jZTogJ3RvZ2dsZScsXG4gIGRpc3BsYXk6ICdkeW5hbWljJyxcbiAgcG9wcGVyQ29uZmlnOiBudWxsXG59O1xudmFyIERlZmF1bHRUeXBlJDIgPSB7XG4gIG9mZnNldDogJyhhcnJheXxmdW5jdGlvbiknLFxuICBmbGlwOiAnYm9vbGVhbicsXG4gIGJvdW5kYXJ5OiAnKHN0cmluZ3xlbGVtZW50KScsXG4gIHJlZmVyZW5jZTogJyhzdHJpbmd8ZWxlbWVudCknLFxuICBkaXNwbGF5OiAnc3RyaW5nJyxcbiAgcG9wcGVyQ29uZmlnOiAnKG51bGx8b2JqZWN0KSdcbn07XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ2xhc3MgRGVmaW5pdGlvblxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIERyb3Bkb3duID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gRHJvcGRvd24oZWxlbWVudCwgY29uZmlnKSB7XG4gICAgdGhpcy5fZWxlbWVudCA9IGVsZW1lbnQ7XG4gICAgdGhpcy5fcG9wcGVyID0gbnVsbDtcbiAgICB0aGlzLl9jb25maWcgPSB0aGlzLl9nZXRDb25maWcoY29uZmlnKTtcbiAgICB0aGlzLl9tZW51ID0gdGhpcy5fZ2V0TWVudUVsZW1lbnQoKTtcbiAgICB0aGlzLl9pbk5hdmJhciA9IHRoaXMuX2RldGVjdE5hdmJhcigpO1xuICAgIHRoaXMuX2luSGVhZGVyID0gdGhpcy5fZGV0ZWN0SGVhZGVyKCk7XG5cbiAgICB0aGlzLl9hZGRFdmVudExpc3RlbmVycygpO1xuXG4gICAgRGF0YS5zZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJDYsIHRoaXMpO1xuICB9IC8vIEdldHRlcnNcblxuXG4gIHZhciBfcHJvdG8gPSBEcm9wZG93bi5wcm90b3R5cGU7XG5cbiAgLy8gUHVibGljXG4gIF9wcm90by50b2dnbGUgPSBmdW5jdGlvbiB0b2dnbGUoKSB7XG4gICAgaWYgKHRoaXMuX2VsZW1lbnQuZGlzYWJsZWQgfHwgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9ESVNBQkxFRCQxKSkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHZhciBpc0FjdGl2ZSA9IHRoaXMuX21lbnUuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0hPVyQyKTtcblxuICAgIERyb3Bkb3duLmNsZWFyTWVudXMoKTtcblxuICAgIGlmIChpc0FjdGl2ZSkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHRoaXMuc2hvdygpO1xuICB9O1xuXG4gIF9wcm90by5zaG93ID0gZnVuY3Rpb24gc2hvdygpIHtcbiAgICBpZiAodGhpcy5fZWxlbWVudC5kaXNhYmxlZCB8fCB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0RJU0FCTEVEJDEpIHx8IHRoaXMuX21lbnUuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0hPVyQyKSkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHZhciBwYXJlbnQgPSBEcm9wZG93bi5nZXRQYXJlbnRGcm9tRWxlbWVudCh0aGlzLl9lbGVtZW50KTtcbiAgICB2YXIgcmVsYXRlZFRhcmdldCA9IHtcbiAgICAgIHJlbGF0ZWRUYXJnZXQ6IHRoaXMuX2VsZW1lbnRcbiAgICB9O1xuICAgIHZhciBzaG93RXZlbnQgPSBFdmVudEhhbmRsZXIudHJpZ2dlcihwYXJlbnQsIEVWRU5UX1NIT1ckMSwgcmVsYXRlZFRhcmdldCk7XG5cbiAgICBpZiAoc2hvd0V2ZW50LmRlZmF1bHRQcmV2ZW50ZWQpIHtcbiAgICAgIHJldHVybjtcbiAgICB9IC8vIERpc2FibGUgdG90YWxseSBQb3BwZXIuanMgZm9yIERyb3Bkb3duIGluIE5hdmJhclxuXG5cbiAgICBpZiAoIXRoaXMuX2luTmF2YmFyICYmICF0aGlzLl9pbkhlYWRlcikge1xuICAgICAgaWYgKHR5cGVvZiBjcmVhdGVQb3BwZXIgPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgIHRocm93IG5ldyBUeXBlRXJyb3IoJ0NvcmVVSVxcJ3MgZHJvcGRvd25zIHJlcXVpcmUgUG9wcGVyLmpzIChodHRwczovL3BvcHBlci5qcy5vcmcpJyk7XG4gICAgICB9XG5cbiAgICAgIHZhciByZWZlcmVuY2VFbGVtZW50ID0gdGhpcy5fZWxlbWVudDtcblxuICAgICAgaWYgKHRoaXMuX2NvbmZpZy5yZWZlcmVuY2UgPT09ICdwYXJlbnQnKSB7XG4gICAgICAgIHJlZmVyZW5jZUVsZW1lbnQgPSBwYXJlbnQ7XG4gICAgICB9IGVsc2UgaWYgKGlzRWxlbWVudCh0aGlzLl9jb25maWcucmVmZXJlbmNlKSkge1xuICAgICAgICByZWZlcmVuY2VFbGVtZW50ID0gdGhpcy5fY29uZmlnLnJlZmVyZW5jZTsgLy8gQ2hlY2sgaWYgaXQncyBqUXVlcnkgZWxlbWVudFxuXG4gICAgICAgIGlmICh0eXBlb2YgdGhpcy5fY29uZmlnLnJlZmVyZW5jZS5qcXVlcnkgIT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgICAgcmVmZXJlbmNlRWxlbWVudCA9IHRoaXMuX2NvbmZpZy5yZWZlcmVuY2VbMF07XG4gICAgICAgIH1cbiAgICAgIH0gLy8gSWYgYm91bmRhcnkgaXMgbm90IGBzY3JvbGxQYXJlbnRgLCB0aGVuIHNldCBwb3NpdGlvbiB0byBgc3RhdGljYFxuICAgICAgLy8gdG8gYWxsb3cgdGhlIG1lbnUgdG8gXCJlc2NhcGVcIiB0aGUgc2Nyb2xsIHBhcmVudCdzIGJvdW5kYXJpZXNcbiAgICAgIC8vIGh0dHBzOi8vZ2l0aHViLmNvbS90d2JzL2Jvb3RzdHJhcC9pc3N1ZXMvMjQyNTFcblxuXG4gICAgICBpZiAodGhpcy5fY29uZmlnLmJvdW5kYXJ5ICE9PSAnc2Nyb2xsUGFyZW50Jykge1xuICAgICAgICBwYXJlbnQuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX1BPU0lUSU9OX1NUQVRJQyk7XG4gICAgICB9XG5cbiAgICAgIHRoaXMuX3BvcHBlciA9IGNyZWF0ZVBvcHBlcihyZWZlcmVuY2VFbGVtZW50LCB0aGlzLl9tZW51LCB0aGlzLl9nZXRQb3BwZXJDb25maWcoKSk7XG4gICAgfSAvLyBJZiB0aGlzIGlzIGEgdG91Y2gtZW5hYmxlZCBkZXZpY2Ugd2UgYWRkIGV4dHJhXG4gICAgLy8gZW1wdHkgbW91c2VvdmVyIGxpc3RlbmVycyB0byB0aGUgYm9keSdzIGltbWVkaWF0ZSBjaGlsZHJlbjtcbiAgICAvLyBvbmx5IG5lZWRlZCBiZWNhdXNlIG9mIGJyb2tlbiBldmVudCBkZWxlZ2F0aW9uIG9uIGlPU1xuICAgIC8vIGh0dHBzOi8vd3d3LnF1aXJrc21vZGUub3JnL2Jsb2cvYXJjaGl2ZXMvMjAxNC8wMi9tb3VzZV9ldmVudF9idWIuaHRtbFxuXG5cbiAgICBpZiAoJ29udG91Y2hzdGFydCcgaW4gZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50ICYmICFwYXJlbnQuY2xvc2VzdChTRUxFQ1RPUl9OQVZCQVJfTkFWKSkge1xuICAgICAgdmFyIF9yZWY7XG5cbiAgICAgIChfcmVmID0gW10pLmNvbmNhdC5hcHBseShfcmVmLCBkb2N1bWVudC5ib2R5LmNoaWxkcmVuKS5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtKSB7XG4gICAgICAgIHJldHVybiBFdmVudEhhbmRsZXIub24oZWxlbSwgJ21vdXNlb3ZlcicsIG51bGwsIG5vb3AoKSk7XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICBpZiAoJ29udG91Y2hzdGFydCcgaW4gZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50ICYmICFwYXJlbnQuY2xvc2VzdChTRUxFQ1RPUl9IRUFERVJfTkFWKSkge1xuICAgICAgdmFyIF9yZWYyO1xuXG4gICAgICAoX3JlZjIgPSBbXSkuY29uY2F0LmFwcGx5KF9yZWYyLCBkb2N1bWVudC5ib2R5LmNoaWxkcmVuKS5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtKSB7XG4gICAgICAgIHJldHVybiBFdmVudEhhbmRsZXIub24oZWxlbSwgJ21vdXNlb3ZlcicsIG51bGwsIG5vb3AoKSk7XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICB0aGlzLl9lbGVtZW50LmZvY3VzKCk7XG5cbiAgICB0aGlzLl9lbGVtZW50LnNldEF0dHJpYnV0ZSgnYXJpYS1leHBhbmRlZCcsIHRydWUpO1xuXG4gICAgTWFuaXB1bGF0b3IudG9nZ2xlQ2xhc3ModGhpcy5fbWVudSwgQ0xBU1NfTkFNRV9TSE9XJDIpO1xuICAgIE1hbmlwdWxhdG9yLnRvZ2dsZUNsYXNzKHBhcmVudCwgQ0xBU1NfTkFNRV9TSE9XJDIpO1xuICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKHBhcmVudCwgRVZFTlRfU0hPV04kMSwgcmVsYXRlZFRhcmdldCk7XG4gIH07XG5cbiAgX3Byb3RvLmhpZGUgPSBmdW5jdGlvbiBoaWRlKCkge1xuICAgIGlmICh0aGlzLl9lbGVtZW50LmRpc2FibGVkIHx8IHRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfRElTQUJMRUQkMSkgfHwgIXRoaXMuX21lbnUuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0hPVyQyKSkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHZhciBwYXJlbnQgPSBEcm9wZG93bi5nZXRQYXJlbnRGcm9tRWxlbWVudCh0aGlzLl9lbGVtZW50KTtcbiAgICB2YXIgcmVsYXRlZFRhcmdldCA9IHtcbiAgICAgIHJlbGF0ZWRUYXJnZXQ6IHRoaXMuX2VsZW1lbnRcbiAgICB9O1xuICAgIHZhciBoaWRlRXZlbnQgPSBFdmVudEhhbmRsZXIudHJpZ2dlcihwYXJlbnQsIEVWRU5UX0hJREUkMSwgcmVsYXRlZFRhcmdldCk7XG5cbiAgICBpZiAoaGlkZUV2ZW50LmRlZmF1bHRQcmV2ZW50ZWQpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAodGhpcy5fcG9wcGVyKSB7XG4gICAgICB0aGlzLl9wb3BwZXIuZGVzdHJveSgpO1xuICAgIH1cblxuICAgIE1hbmlwdWxhdG9yLnRvZ2dsZUNsYXNzKHRoaXMuX21lbnUsIENMQVNTX05BTUVfU0hPVyQyKTtcbiAgICBNYW5pcHVsYXRvci50b2dnbGVDbGFzcyhwYXJlbnQsIENMQVNTX05BTUVfU0hPVyQyKTtcbiAgICBFdmVudEhhbmRsZXIudHJpZ2dlcihwYXJlbnQsIEVWRU5UX0hJRERFTiQxLCByZWxhdGVkVGFyZ2V0KTtcbiAgfTtcblxuICBfcHJvdG8uZGlzcG9zZSA9IGZ1bmN0aW9uIGRpc3Bvc2UoKSB7XG4gICAgRGF0YS5yZW1vdmVEYXRhKHRoaXMuX2VsZW1lbnQsIERBVEFfS0VZJDYpO1xuICAgIEV2ZW50SGFuZGxlci5vZmYodGhpcy5fZWxlbWVudCwgRVZFTlRfS0VZJDYpO1xuICAgIHRoaXMuX2VsZW1lbnQgPSBudWxsO1xuICAgIHRoaXMuX21lbnUgPSBudWxsO1xuXG4gICAgaWYgKHRoaXMuX3BvcHBlcikge1xuICAgICAgdGhpcy5fcG9wcGVyLmRlc3Ryb3koKTtcblxuICAgICAgdGhpcy5fcG9wcGVyID0gbnVsbDtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLnVwZGF0ZSA9IGZ1bmN0aW9uIHVwZGF0ZSgpIHtcbiAgICB0aGlzLl9pbk5hdmJhciA9IHRoaXMuX2RldGVjdE5hdmJhcigpO1xuICAgIHRoaXMuX2luSGVhZGVyID0gdGhpcy5fZGV0ZWN0SGVhZGVyKCk7XG5cbiAgICBpZiAodGhpcy5fcG9wcGVyKSB7XG4gICAgICB0aGlzLl9wb3BwZXIuc2NoZWR1bGVVcGRhdGUoKTtcbiAgICB9XG4gIH0gLy8gUHJpdmF0ZVxuICA7XG5cbiAgX3Byb3RvLl9hZGRFdmVudExpc3RlbmVycyA9IGZ1bmN0aW9uIF9hZGRFdmVudExpc3RlbmVycygpIHtcbiAgICB2YXIgX3RoaXMgPSB0aGlzO1xuXG4gICAgRXZlbnRIYW5kbGVyLm9uKHRoaXMuX2VsZW1lbnQsIEVWRU5UX0NMSUNLLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgICBldmVudC5zdG9wUHJvcGFnYXRpb24oKTtcblxuICAgICAgX3RoaXMudG9nZ2xlKCk7XG4gICAgfSk7XG4gIH07XG5cbiAgX3Byb3RvLl9nZXRDb25maWcgPSBmdW5jdGlvbiBfZ2V0Q29uZmlnKGNvbmZpZykge1xuICAgIGNvbmZpZyA9IF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCB0aGlzLmNvbnN0cnVjdG9yLkRlZmF1bHQpLCBNYW5pcHVsYXRvci5nZXREYXRhQXR0cmlidXRlcyh0aGlzLl9lbGVtZW50KSksIGNvbmZpZyk7XG4gICAgdHlwZUNoZWNrQ29uZmlnKE5BTUUkNiwgY29uZmlnLCB0aGlzLmNvbnN0cnVjdG9yLkRlZmF1bHRUeXBlKTtcbiAgICByZXR1cm4gY29uZmlnO1xuICB9O1xuXG4gIF9wcm90by5fZ2V0TWVudUVsZW1lbnQgPSBmdW5jdGlvbiBfZ2V0TWVudUVsZW1lbnQoKSB7XG4gICAgdmFyIHBhcmVudCA9IERyb3Bkb3duLmdldFBhcmVudEZyb21FbGVtZW50KHRoaXMuX2VsZW1lbnQpO1xuICAgIHJldHVybiBTZWxlY3RvckVuZ2luZS5maW5kT25lKFNFTEVDVE9SX01FTlUsIHBhcmVudCk7XG4gIH07XG5cbiAgX3Byb3RvLl9nZXRQbGFjZW1lbnQgPSBmdW5jdGlvbiBfZ2V0UGxhY2VtZW50KCkge1xuICAgIHZhciBwYXJlbnREcm9wZG93biA9IHRoaXMuX2VsZW1lbnQucGFyZW50Tm9kZTtcbiAgICB2YXIgcGxhY2VtZW50ID0gUExBQ0VNRU5UX0JPVFRPTTsgLy8gSGFuZGxlIGRyb3B1cFxuXG4gICAgaWYgKHBhcmVudERyb3Bkb3duLmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0RST1BVUCkpIHtcbiAgICAgIHBsYWNlbWVudCA9IFBMQUNFTUVOVF9UT1A7XG5cbiAgICAgIGlmICh0aGlzLl9tZW51LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX01FTlVSSUdIVCkpIHtcbiAgICAgICAgcGxhY2VtZW50ID0gUExBQ0VNRU5UX1RPUEVORDtcbiAgICAgIH1cbiAgICB9IGVsc2UgaWYgKHBhcmVudERyb3Bkb3duLmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0RST1BSSUdIVCkpIHtcbiAgICAgIHBsYWNlbWVudCA9IFBMQUNFTUVOVF9SSUdIVDtcbiAgICB9IGVsc2UgaWYgKHBhcmVudERyb3Bkb3duLmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0RST1BMRUZUKSkge1xuICAgICAgcGxhY2VtZW50ID0gUExBQ0VNRU5UX0xFRlQ7XG4gICAgfSBlbHNlIGlmICh0aGlzLl9tZW51LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX01FTlVSSUdIVCkpIHtcbiAgICAgIHBsYWNlbWVudCA9IFBMQUNFTUVOVF9CT1RUT01FTkQ7XG4gICAgfVxuXG4gICAgcmV0dXJuIHBsYWNlbWVudDtcbiAgfTtcblxuICBfcHJvdG8uX2RldGVjdE5hdmJhciA9IGZ1bmN0aW9uIF9kZXRlY3ROYXZiYXIoKSB7XG4gICAgcmV0dXJuIEJvb2xlYW4odGhpcy5fZWxlbWVudC5jbG9zZXN0KFwiLlwiICsgQ0xBU1NfTkFNRV9OQVZCQVIpKTtcbiAgfTtcblxuICBfcHJvdG8uX2RldGVjdEhlYWRlciA9IGZ1bmN0aW9uIF9kZXRlY3RIZWFkZXIoKSB7XG4gICAgcmV0dXJuIEJvb2xlYW4odGhpcy5fZWxlbWVudC5jbG9zZXN0KFwiLlwiICsgQ0xBU1NfTkFNRV9IRUFERVIpKTtcbiAgfTtcblxuICBfcHJvdG8uX2dldE9mZnNldCA9IGZ1bmN0aW9uIF9nZXRPZmZzZXQoKSB7XG4gICAgdmFyIF90aGlzMiA9IHRoaXM7XG5cbiAgICB2YXIgb2Zmc2V0ID0ge307XG5cbiAgICBpZiAodHlwZW9mIHRoaXMuX2NvbmZpZy5vZmZzZXQgPT09ICdmdW5jdGlvbicpIHtcbiAgICAgIG9mZnNldC5mbiA9IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgIGRhdGEub2Zmc2V0cyA9IF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCBkYXRhLm9mZnNldHMpLCBfdGhpczIuX2NvbmZpZy5vZmZzZXQoZGF0YS5vZmZzZXRzLCBfdGhpczIuX2VsZW1lbnQpIHx8IHt9KTtcbiAgICAgICAgcmV0dXJuIGRhdGE7XG4gICAgICB9O1xuICAgIH0gZWxzZSB7XG4gICAgICBvZmZzZXQub2Zmc2V0ID0gdGhpcy5fY29uZmlnLm9mZnNldDtcbiAgICB9XG5cbiAgICByZXR1cm4gb2Zmc2V0O1xuICB9O1xuXG4gIF9wcm90by5fZ2V0UG9wcGVyQ29uZmlnID0gZnVuY3Rpb24gX2dldFBvcHBlckNvbmZpZygpIHtcbiAgICB2YXIgcG9wcGVyQ29uZmlnID0ge1xuICAgICAgcGxhY2VtZW50OiB0aGlzLl9nZXRQbGFjZW1lbnQoKSxcbiAgICAgIG1vZGlmaWVyczogW3tcbiAgICAgICAgbmFtZTogJ29mZnNldCcsXG4gICAgICAgIG9wdGlvbnM6IHtcbiAgICAgICAgICBvZmZzZXQ6IHRoaXMuX2dldE9mZnNldCgpXG4gICAgICAgIH1cbiAgICAgIH0sIHtcbiAgICAgICAgbmFtZTogJ2ZsaXAnLFxuICAgICAgICBlbmFibGVkOiB0aGlzLl9jb25maWcuZmxpcFxuICAgICAgfSwge1xuICAgICAgICBuYW1lOiAncHJldmVudE92ZXJmbG93JyxcbiAgICAgICAgb3B0aW9uczoge1xuICAgICAgICAgIGJvdW5kYXJ5OiB0aGlzLl9jb25maWcuYm91bmRhcnlcbiAgICAgICAgfVxuICAgICAgfV1cbiAgICB9OyAvLyBEaXNhYmxlIFBvcHBlci5qcyBpZiB3ZSBoYXZlIGEgc3RhdGljIGRpc3BsYXlcblxuICAgIGlmICh0aGlzLl9jb25maWcuZGlzcGxheSA9PT0gJ3N0YXRpYycpIHtcbiAgICAgIHBvcHBlckNvbmZpZy5tb2RpZmllcnMuYXBwbHlTdHlsZSA9IHtcbiAgICAgICAgZW5hYmxlZDogZmFsc2VcbiAgICAgIH07XG4gICAgfVxuXG4gICAgcmV0dXJuIF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCBwb3BwZXJDb25maWcpLCB0aGlzLl9jb25maWcucG9wcGVyQ29uZmlnKTtcbiAgfSAvLyBTdGF0aWNcbiAgO1xuXG4gIERyb3Bkb3duLmRyb3Bkb3duSW50ZXJmYWNlID0gZnVuY3Rpb24gZHJvcGRvd25JbnRlcmZhY2UoZWxlbWVudCwgY29uZmlnKSB7XG4gICAgdmFyIGRhdGEgPSBEYXRhLmdldERhdGEoZWxlbWVudCwgREFUQV9LRVkkNik7XG5cbiAgICB2YXIgX2NvbmZpZyA9IHR5cGVvZiBjb25maWcgPT09ICdvYmplY3QnID8gY29uZmlnIDogbnVsbDtcblxuICAgIGlmICghZGF0YSkge1xuICAgICAgZGF0YSA9IG5ldyBEcm9wZG93bihlbGVtZW50LCBfY29uZmlnKTtcbiAgICB9XG5cbiAgICBpZiAodHlwZW9mIGNvbmZpZyA9PT0gJ3N0cmluZycpIHtcbiAgICAgIGlmICh0eXBlb2YgZGF0YVtjb25maWddID09PSAndW5kZWZpbmVkJykge1xuICAgICAgICB0aHJvdyBuZXcgVHlwZUVycm9yKFwiTm8gbWV0aG9kIG5hbWVkIFxcXCJcIiArIGNvbmZpZyArIFwiXFxcIlwiKTtcbiAgICAgIH1cblxuICAgICAgZGF0YVtjb25maWddKCk7XG4gICAgfVxuICB9O1xuXG4gIERyb3Bkb3duLmpRdWVyeUludGVyZmFjZSA9IGZ1bmN0aW9uIGpRdWVyeUludGVyZmFjZShjb25maWcpIHtcbiAgICByZXR1cm4gdGhpcy5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgIERyb3Bkb3duLmRyb3Bkb3duSW50ZXJmYWNlKHRoaXMsIGNvbmZpZyk7XG4gICAgfSk7XG4gIH07XG5cbiAgRHJvcGRvd24uY2xlYXJNZW51cyA9IGZ1bmN0aW9uIGNsZWFyTWVudXMoZXZlbnQpIHtcbiAgICBpZiAoZXZlbnQgJiYgKGV2ZW50LmJ1dHRvbiA9PT0gUklHSFRfTU9VU0VfQlVUVE9OIHx8IGV2ZW50LnR5cGUgPT09ICdrZXl1cCcgJiYgZXZlbnQua2V5ICE9PSBUQUJfS0VZKSkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHZhciB0b2dnbGVzID0gU2VsZWN0b3JFbmdpbmUuZmluZChTRUxFQ1RPUl9EQVRBX1RPR0dMRSQyKTtcblxuICAgIGZvciAodmFyIGkgPSAwLCBsZW4gPSB0b2dnbGVzLmxlbmd0aDsgaSA8IGxlbjsgaSsrKSB7XG4gICAgICB2YXIgcGFyZW50ID0gRHJvcGRvd24uZ2V0UGFyZW50RnJvbUVsZW1lbnQodG9nZ2xlc1tpXSk7XG4gICAgICB2YXIgY29udGV4dCA9IERhdGEuZ2V0RGF0YSh0b2dnbGVzW2ldLCBEQVRBX0tFWSQ2KTtcbiAgICAgIHZhciByZWxhdGVkVGFyZ2V0ID0ge1xuICAgICAgICByZWxhdGVkVGFyZ2V0OiB0b2dnbGVzW2ldXG4gICAgICB9O1xuXG4gICAgICBpZiAoZXZlbnQgJiYgZXZlbnQudHlwZSA9PT0gJ2NsaWNrJykge1xuICAgICAgICByZWxhdGVkVGFyZ2V0LmNsaWNrRXZlbnQgPSBldmVudDtcbiAgICAgIH1cblxuICAgICAgaWYgKCFjb250ZXh0KSB7XG4gICAgICAgIGNvbnRpbnVlO1xuICAgICAgfVxuXG4gICAgICB2YXIgZHJvcGRvd25NZW51ID0gY29udGV4dC5fbWVudTtcblxuICAgICAgaWYgKCFwYXJlbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0hPVyQyKSkge1xuICAgICAgICBjb250aW51ZTtcbiAgICAgIH1cblxuICAgICAgaWYgKGV2ZW50ICYmIChldmVudC50eXBlID09PSAnY2xpY2snICYmIC9pbnB1dHx0ZXh0YXJlYS9pLnRlc3QoZXZlbnQudGFyZ2V0LnRhZ05hbWUpIHx8IGV2ZW50LnR5cGUgPT09ICdrZXl1cCcgJiYgZXZlbnQua2V5ID09PSBUQUJfS0VZKSAmJiBwYXJlbnQuY29udGFpbnMoZXZlbnQudGFyZ2V0KSkge1xuICAgICAgICBjb250aW51ZTtcbiAgICAgIH1cblxuICAgICAgdmFyIGhpZGVFdmVudCA9IEV2ZW50SGFuZGxlci50cmlnZ2VyKHBhcmVudCwgRVZFTlRfSElERSQxLCByZWxhdGVkVGFyZ2V0KTtcblxuICAgICAgaWYgKGhpZGVFdmVudC5kZWZhdWx0UHJldmVudGVkKSB7XG4gICAgICAgIGNvbnRpbnVlO1xuICAgICAgfSAvLyBJZiB0aGlzIGlzIGEgdG91Y2gtZW5hYmxlZCBkZXZpY2Ugd2UgcmVtb3ZlIHRoZSBleHRyYVxuICAgICAgLy8gZW1wdHkgbW91c2VvdmVyIGxpc3RlbmVycyB3ZSBhZGRlZCBmb3IgaU9TIHN1cHBvcnRcblxuXG4gICAgICBpZiAoJ29udG91Y2hzdGFydCcgaW4gZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50KSB7XG4gICAgICAgIHZhciBfcmVmMztcblxuICAgICAgICAoX3JlZjMgPSBbXSkuY29uY2F0LmFwcGx5KF9yZWYzLCBkb2N1bWVudC5ib2R5LmNoaWxkcmVuKS5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtKSB7XG4gICAgICAgICAgcmV0dXJuIEV2ZW50SGFuZGxlci5vZmYoZWxlbSwgJ21vdXNlb3ZlcicsIG51bGwsIG5vb3AoKSk7XG4gICAgICAgIH0pO1xuICAgICAgfVxuXG4gICAgICB0b2dnbGVzW2ldLnNldEF0dHJpYnV0ZSgnYXJpYS1leHBhbmRlZCcsICdmYWxzZScpO1xuXG4gICAgICBpZiAoY29udGV4dC5fcG9wcGVyKSB7XG4gICAgICAgIGNvbnRleHQuX3BvcHBlci5kZXN0cm95KCk7XG4gICAgICB9XG5cbiAgICAgIGRyb3Bkb3duTWVudS5jbGFzc0xpc3QucmVtb3ZlKENMQVNTX05BTUVfU0hPVyQyKTtcbiAgICAgIHBhcmVudC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTX05BTUVfU0hPVyQyKTtcbiAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKHBhcmVudCwgRVZFTlRfSElEREVOJDEsIHJlbGF0ZWRUYXJnZXQpO1xuICAgIH1cbiAgfTtcblxuICBEcm9wZG93bi5nZXRQYXJlbnRGcm9tRWxlbWVudCA9IGZ1bmN0aW9uIGdldFBhcmVudEZyb21FbGVtZW50KGVsZW1lbnQpIHtcbiAgICByZXR1cm4gZ2V0RWxlbWVudEZyb21TZWxlY3RvcihlbGVtZW50KSB8fCBlbGVtZW50LnBhcmVudE5vZGU7XG4gIH07XG5cbiAgRHJvcGRvd24uZGF0YUFwaUtleWRvd25IYW5kbGVyID0gZnVuY3Rpb24gZGF0YUFwaUtleWRvd25IYW5kbGVyKGV2ZW50KSB7XG4gICAgLy8gSWYgbm90IGlucHV0L3RleHRhcmVhOlxuICAgIC8vICAtIEFuZCBub3QgYSBrZXkgaW4gUkVHRVhQX0tFWURPV04gPT4gbm90IGEgZHJvcGRvd24gY29tbWFuZFxuICAgIC8vIElmIGlucHV0L3RleHRhcmVhOlxuICAgIC8vICAtIElmIHNwYWNlIGtleSA9PiBub3QgYSBkcm9wZG93biBjb21tYW5kXG4gICAgLy8gIC0gSWYga2V5IGlzIG90aGVyIHRoYW4gZXNjYXBlXG4gICAgLy8gICAgLSBJZiBrZXkgaXMgbm90IHVwIG9yIGRvd24gPT4gbm90IGEgZHJvcGRvd24gY29tbWFuZFxuICAgIC8vICAgIC0gSWYgdHJpZ2dlciBpbnNpZGUgdGhlIG1lbnUgPT4gbm90IGEgZHJvcGRvd24gY29tbWFuZFxuICAgIGlmICgvaW5wdXR8dGV4dGFyZWEvaS50ZXN0KGV2ZW50LnRhcmdldC50YWdOYW1lKSA/IGV2ZW50LmtleSA9PT0gU1BBQ0VfS0VZIHx8IGV2ZW50LmtleSAhPT0gRVNDQVBFX0tFWSAmJiAoZXZlbnQua2V5ICE9PSBBUlJPV19ET1dOX0tFWSAmJiBldmVudC5rZXkgIT09IEFSUk9XX1VQX0tFWSB8fCBldmVudC50YXJnZXQuY2xvc2VzdChTRUxFQ1RPUl9NRU5VKSkgOiAhUkVHRVhQX0tFWURPV04udGVzdChldmVudC5rZXkpKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcbiAgICBldmVudC5zdG9wUHJvcGFnYXRpb24oKTtcblxuICAgIGlmICh0aGlzLmRpc2FibGVkIHx8IHRoaXMuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfRElTQUJMRUQkMSkpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB2YXIgcGFyZW50ID0gRHJvcGRvd24uZ2V0UGFyZW50RnJvbUVsZW1lbnQodGhpcyk7XG4gICAgdmFyIGlzQWN0aXZlID0gcGFyZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX1NIT1ckMik7XG5cbiAgICBpZiAoZXZlbnQua2V5ID09PSBFU0NBUEVfS0VZKSB7XG4gICAgICB2YXIgYnV0dG9uID0gdGhpcy5tYXRjaGVzKFNFTEVDVE9SX0RBVEFfVE9HR0xFJDIpID8gdGhpcyA6IFNlbGVjdG9yRW5naW5lLnByZXYodGhpcywgU0VMRUNUT1JfREFUQV9UT0dHTEUkMilbMF07XG4gICAgICBidXR0b24uZm9jdXMoKTtcbiAgICAgIERyb3Bkb3duLmNsZWFyTWVudXMoKTtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAoIWlzQWN0aXZlIHx8IGV2ZW50LmtleSA9PT0gU1BBQ0VfS0VZKSB7XG4gICAgICBEcm9wZG93bi5jbGVhck1lbnVzKCk7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgdmFyIGl0ZW1zID0gU2VsZWN0b3JFbmdpbmUuZmluZChTRUxFQ1RPUl9WSVNJQkxFX0lURU1TLCBwYXJlbnQpLmZpbHRlcihpc1Zpc2libGUpO1xuXG4gICAgaWYgKCFpdGVtcy5sZW5ndGgpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB2YXIgaW5kZXggPSBpdGVtcy5pbmRleE9mKGV2ZW50LnRhcmdldCk7XG5cbiAgICBpZiAoZXZlbnQua2V5ID09PSBBUlJPV19VUF9LRVkgJiYgaW5kZXggPiAwKSB7XG4gICAgICAvLyBVcFxuICAgICAgaW5kZXgtLTtcbiAgICB9XG5cbiAgICBpZiAoZXZlbnQua2V5ID09PSBBUlJPV19ET1dOX0tFWSAmJiBpbmRleCA8IGl0ZW1zLmxlbmd0aCAtIDEpIHtcbiAgICAgIC8vIERvd25cbiAgICAgIGluZGV4Kys7XG4gICAgfSAvLyBpbmRleCBpcyAtMSBpZiB0aGUgZmlyc3Qga2V5ZG93biBpcyBhbiBBcnJvd1VwXG5cblxuICAgIGluZGV4ID0gaW5kZXggPT09IC0xID8gMCA6IGluZGV4O1xuICAgIGl0ZW1zW2luZGV4XS5mb2N1cygpO1xuICB9O1xuXG4gIERyb3Bkb3duLmdldEluc3RhbmNlID0gZnVuY3Rpb24gZ2V0SW5zdGFuY2UoZWxlbWVudCkge1xuICAgIHJldHVybiBEYXRhLmdldERhdGEoZWxlbWVudCwgREFUQV9LRVkkNik7XG4gIH07XG5cbiAgX2NyZWF0ZUNsYXNzKERyb3Bkb3duLCBudWxsLCBbe1xuICAgIGtleTogXCJWRVJTSU9OXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gVkVSU0lPTiQ2O1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJEZWZhdWx0XCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRGVmYXVsdCQ0O1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJEZWZhdWx0VHlwZVwiLFxuICAgIGdldDogZnVuY3Rpb24gZ2V0KCkge1xuICAgICAgcmV0dXJuIERlZmF1bHRUeXBlJDI7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIERyb3Bkb3duO1xufSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIERhdGEgQXBpIGltcGxlbWVudGF0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG5cbkV2ZW50SGFuZGxlci5vbihkb2N1bWVudCwgRVZFTlRfS0VZRE9XTl9EQVRBX0FQSSwgU0VMRUNUT1JfREFUQV9UT0dHTEUkMiwgRHJvcGRvd24uZGF0YUFwaUtleWRvd25IYW5kbGVyKTtcbkV2ZW50SGFuZGxlci5vbihkb2N1bWVudCwgRVZFTlRfS0VZRE9XTl9EQVRBX0FQSSwgU0VMRUNUT1JfTUVOVSwgRHJvcGRvd24uZGF0YUFwaUtleWRvd25IYW5kbGVyKTtcbkV2ZW50SGFuZGxlci5vbihkb2N1bWVudCwgRVZFTlRfQ0xJQ0tfREFUQV9BUEkkNiwgRHJvcGRvd24uY2xlYXJNZW51cyk7XG5FdmVudEhhbmRsZXIub24oZG9jdW1lbnQsIEVWRU5UX0tFWVVQX0RBVEFfQVBJLCBEcm9wZG93bi5jbGVhck1lbnVzKTtcbkV2ZW50SGFuZGxlci5vbihkb2N1bWVudCwgRVZFTlRfQ0xJQ0tfREFUQV9BUEkkNiwgU0VMRUNUT1JfREFUQV9UT0dHTEUkMiwgZnVuY3Rpb24gKGV2ZW50KSB7XG4gIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gIGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuICBEcm9wZG93bi5kcm9wZG93bkludGVyZmFjZSh0aGlzLCAndG9nZ2xlJyk7XG59KTtcbkV2ZW50SGFuZGxlci5vbihkb2N1bWVudCwgRVZFTlRfQ0xJQ0tfREFUQV9BUEkkNiwgU0VMRUNUT1JfRk9STV9DSElMRCwgZnVuY3Rpb24gKGUpIHtcbiAgcmV0dXJuIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG59KTtcbnZhciAkJDcgPSBnZXRqUXVlcnkoKTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBqUXVlcnlcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogYWRkIC5kcm9wZG93biB0byBqUXVlcnkgb25seSBpZiBqUXVlcnkgaXMgcHJlc2VudFxuICovXG5cbi8qIGlzdGFuYnVsIGlnbm9yZSBpZiAqL1xuXG5pZiAoJCQ3KSB7XG4gIHZhciBKUVVFUllfTk9fQ09ORkxJQ1QkNiA9ICQkNy5mbltOQU1FJDZdO1xuICAkJDcuZm5bTkFNRSQ2XSA9IERyb3Bkb3duLmpRdWVyeUludGVyZmFjZTtcbiAgJCQ3LmZuW05BTUUkNl0uQ29uc3RydWN0b3IgPSBEcm9wZG93bjtcblxuICAkJDcuZm5bTkFNRSQ2XS5ub0NvbmZsaWN0ID0gZnVuY3Rpb24gKCkge1xuICAgICQkNy5mbltOQU1FJDZdID0gSlFVRVJZX05PX0NPTkZMSUNUJDY7XG4gICAgcmV0dXJuIERyb3Bkb3duLmpRdWVyeUludGVyZmFjZTtcbiAgfTtcbn1cblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENvbnN0YW50c1xuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIE5BTUUkNyA9ICdtb2RhbCc7XG52YXIgVkVSU0lPTiQ3ID0gJzMuMi4wJztcbnZhciBEQVRBX0tFWSQ3ID0gJ2NvcmV1aS5tb2RhbCc7XG52YXIgRVZFTlRfS0VZJDcgPSBcIi5cIiArIERBVEFfS0VZJDc7XG52YXIgREFUQV9BUElfS0VZJDcgPSAnLmRhdGEtYXBpJztcbnZhciBFU0NBUEVfS0VZJDEgPSAnRXNjYXBlJztcbnZhciBEZWZhdWx0JDUgPSB7XG4gIGJhY2tkcm9wOiB0cnVlLFxuICBrZXlib2FyZDogdHJ1ZSxcbiAgZm9jdXM6IHRydWUsXG4gIHNob3c6IHRydWVcbn07XG52YXIgRGVmYXVsdFR5cGUkMyA9IHtcbiAgYmFja2Ryb3A6ICcoYm9vbGVhbnxzdHJpbmcpJyxcbiAga2V5Ym9hcmQ6ICdib29sZWFuJyxcbiAgZm9jdXM6ICdib29sZWFuJyxcbiAgc2hvdzogJ2Jvb2xlYW4nXG59O1xudmFyIEVWRU5UX0hJREUkMiA9IFwiaGlkZVwiICsgRVZFTlRfS0VZJDc7XG52YXIgRVZFTlRfSElERV9QUkVWRU5URUQgPSBcImhpZGVQcmV2ZW50ZWRcIiArIEVWRU5UX0tFWSQ3O1xudmFyIEVWRU5UX0hJRERFTiQyID0gXCJoaWRkZW5cIiArIEVWRU5UX0tFWSQ3O1xudmFyIEVWRU5UX1NIT1ckMiA9IFwic2hvd1wiICsgRVZFTlRfS0VZJDc7XG52YXIgRVZFTlRfU0hPV04kMiA9IFwic2hvd25cIiArIEVWRU5UX0tFWSQ3O1xudmFyIEVWRU5UX0ZPQ1VTSU4gPSBcImZvY3VzaW5cIiArIEVWRU5UX0tFWSQ3O1xudmFyIEVWRU5UX1JFU0laRSA9IFwicmVzaXplXCIgKyBFVkVOVF9LRVkkNztcbnZhciBFVkVOVF9DTElDS19ESVNNSVNTID0gXCJjbGljay5kaXNtaXNzXCIgKyBFVkVOVF9LRVkkNztcbnZhciBFVkVOVF9LRVlET1dOX0RJU01JU1MgPSBcImtleWRvd24uZGlzbWlzc1wiICsgRVZFTlRfS0VZJDc7XG52YXIgRVZFTlRfTU9VU0VVUF9ESVNNSVNTID0gXCJtb3VzZXVwLmRpc21pc3NcIiArIEVWRU5UX0tFWSQ3O1xudmFyIEVWRU5UX01PVVNFRE9XTl9ESVNNSVNTID0gXCJtb3VzZWRvd24uZGlzbWlzc1wiICsgRVZFTlRfS0VZJDc7XG52YXIgRVZFTlRfQ0xJQ0tfREFUQV9BUEkkNyA9IFwiY2xpY2tcIiArIEVWRU5UX0tFWSQ3ICsgREFUQV9BUElfS0VZJDc7XG52YXIgQ0xBU1NfTkFNRV9TQ1JPTExCQVJfTUVBU1VSRVIgPSAnbW9kYWwtc2Nyb2xsYmFyLW1lYXN1cmUnO1xudmFyIENMQVNTX05BTUVfQkFDS0RST1AgPSAnbW9kYWwtYmFja2Ryb3AnO1xudmFyIENMQVNTX05BTUVfT1BFTiA9ICdtb2RhbC1vcGVuJztcbnZhciBDTEFTU19OQU1FX0ZBREUgPSAnZmFkZSc7XG52YXIgQ0xBU1NfTkFNRV9TSE9XJDMgPSAnc2hvdyc7XG52YXIgQ0xBU1NfTkFNRV9TVEFUSUMgPSAnbW9kYWwtc3RhdGljJztcbnZhciBTRUxFQ1RPUl9ESUFMT0cgPSAnLm1vZGFsLWRpYWxvZyc7XG52YXIgU0VMRUNUT1JfTU9EQUxfQk9EWSA9ICcubW9kYWwtYm9keSc7XG52YXIgU0VMRUNUT1JfREFUQV9UT0dHTEUkMyA9ICdbZGF0YS10b2dnbGU9XCJtb2RhbFwiXSc7XG52YXIgU0VMRUNUT1JfREFUQV9ESVNNSVNTID0gJ1tkYXRhLWRpc21pc3M9XCJtb2RhbFwiXSc7XG52YXIgU0VMRUNUT1JfRklYRURfQ09OVEVOVCA9ICcuZml4ZWQtdG9wLCAuZml4ZWQtYm90dG9tLCAuaXMtZml4ZWQsIC5zdGlja3ktdG9wJztcbnZhciBTRUxFQ1RPUl9TVElDS1lfQ09OVEVOVCA9ICcuc3RpY2t5LXRvcCc7XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ2xhc3MgRGVmaW5pdGlvblxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIE1vZGFsID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gTW9kYWwoZWxlbWVudCwgY29uZmlnKSB7XG4gICAgdGhpcy5fY29uZmlnID0gdGhpcy5fZ2V0Q29uZmlnKGNvbmZpZyk7XG4gICAgdGhpcy5fZWxlbWVudCA9IGVsZW1lbnQ7XG4gICAgdGhpcy5fZGlhbG9nID0gU2VsZWN0b3JFbmdpbmUuZmluZE9uZShTRUxFQ1RPUl9ESUFMT0csIGVsZW1lbnQpO1xuICAgIHRoaXMuX2JhY2tkcm9wID0gbnVsbDtcbiAgICB0aGlzLl9pc1Nob3duID0gZmFsc2U7XG4gICAgdGhpcy5faXNCb2R5T3ZlcmZsb3dpbmcgPSBmYWxzZTtcbiAgICB0aGlzLl9pZ25vcmVCYWNrZHJvcENsaWNrID0gZmFsc2U7XG4gICAgdGhpcy5faXNUcmFuc2l0aW9uaW5nID0gZmFsc2U7XG4gICAgdGhpcy5fc2Nyb2xsYmFyV2lkdGggPSAwO1xuICAgIERhdGEuc2V0RGF0YShlbGVtZW50LCBEQVRBX0tFWSQ3LCB0aGlzKTtcbiAgfSAvLyBHZXR0ZXJzXG5cblxuICB2YXIgX3Byb3RvID0gTW9kYWwucHJvdG90eXBlO1xuXG4gIC8vIFB1YmxpY1xuICBfcHJvdG8udG9nZ2xlID0gZnVuY3Rpb24gdG9nZ2xlKHJlbGF0ZWRUYXJnZXQpIHtcbiAgICByZXR1cm4gdGhpcy5faXNTaG93biA/IHRoaXMuaGlkZSgpIDogdGhpcy5zaG93KHJlbGF0ZWRUYXJnZXQpO1xuICB9O1xuXG4gIF9wcm90by5zaG93ID0gZnVuY3Rpb24gc2hvdyhyZWxhdGVkVGFyZ2V0KSB7XG4gICAgdmFyIF90aGlzID0gdGhpcztcblxuICAgIGlmICh0aGlzLl9pc1Nob3duIHx8IHRoaXMuX2lzVHJhbnNpdGlvbmluZykge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIGlmICh0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0ZBREUpKSB7XG4gICAgICB0aGlzLl9pc1RyYW5zaXRpb25pbmcgPSB0cnVlO1xuICAgIH1cblxuICAgIHZhciBzaG93RXZlbnQgPSBFdmVudEhhbmRsZXIudHJpZ2dlcih0aGlzLl9lbGVtZW50LCBFVkVOVF9TSE9XJDIsIHtcbiAgICAgIHJlbGF0ZWRUYXJnZXQ6IHJlbGF0ZWRUYXJnZXRcbiAgICB9KTtcblxuICAgIGlmICh0aGlzLl9pc1Nob3duIHx8IHNob3dFdmVudC5kZWZhdWx0UHJldmVudGVkKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgdGhpcy5faXNTaG93biA9IHRydWU7XG5cbiAgICB0aGlzLl9jaGVja1Njcm9sbGJhcigpO1xuXG4gICAgdGhpcy5fc2V0U2Nyb2xsYmFyKCk7XG5cbiAgICB0aGlzLl9hZGp1c3REaWFsb2coKTtcblxuICAgIHRoaXMuX3NldEVzY2FwZUV2ZW50KCk7XG5cbiAgICB0aGlzLl9zZXRSZXNpemVFdmVudCgpO1xuXG4gICAgRXZlbnRIYW5kbGVyLm9uKHRoaXMuX2VsZW1lbnQsIEVWRU5UX0NMSUNLX0RJU01JU1MsIFNFTEVDVE9SX0RBVEFfRElTTUlTUywgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICByZXR1cm4gX3RoaXMuaGlkZShldmVudCk7XG4gICAgfSk7XG4gICAgRXZlbnRIYW5kbGVyLm9uKHRoaXMuX2RpYWxvZywgRVZFTlRfTU9VU0VET1dOX0RJU01JU1MsIGZ1bmN0aW9uICgpIHtcbiAgICAgIEV2ZW50SGFuZGxlci5vbmUoX3RoaXMuX2VsZW1lbnQsIEVWRU5UX01PVVNFVVBfRElTTUlTUywgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIGlmIChldmVudC50YXJnZXQgPT09IF90aGlzLl9lbGVtZW50KSB7XG4gICAgICAgICAgX3RoaXMuX2lnbm9yZUJhY2tkcm9wQ2xpY2sgPSB0cnVlO1xuICAgICAgICB9XG4gICAgICB9KTtcbiAgICB9KTtcblxuICAgIHRoaXMuX3Nob3dCYWNrZHJvcChmdW5jdGlvbiAoKSB7XG4gICAgICByZXR1cm4gX3RoaXMuX3Nob3dFbGVtZW50KHJlbGF0ZWRUYXJnZXQpO1xuICAgIH0pO1xuICB9O1xuXG4gIF9wcm90by5oaWRlID0gZnVuY3Rpb24gaGlkZShldmVudCkge1xuICAgIHZhciBfdGhpczIgPSB0aGlzO1xuXG4gICAgaWYgKGV2ZW50KSB7XG4gICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIH1cblxuICAgIGlmICghdGhpcy5faXNTaG93biB8fCB0aGlzLl9pc1RyYW5zaXRpb25pbmcpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB2YXIgaGlkZUV2ZW50ID0gRXZlbnRIYW5kbGVyLnRyaWdnZXIodGhpcy5fZWxlbWVudCwgRVZFTlRfSElERSQyKTtcblxuICAgIGlmIChoaWRlRXZlbnQuZGVmYXVsdFByZXZlbnRlZCkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHRoaXMuX2lzU2hvd24gPSBmYWxzZTtcblxuICAgIHZhciB0cmFuc2l0aW9uID0gdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9GQURFKTtcblxuICAgIGlmICh0cmFuc2l0aW9uKSB7XG4gICAgICB0aGlzLl9pc1RyYW5zaXRpb25pbmcgPSB0cnVlO1xuICAgIH1cblxuICAgIHRoaXMuX3NldEVzY2FwZUV2ZW50KCk7XG5cbiAgICB0aGlzLl9zZXRSZXNpemVFdmVudCgpO1xuXG4gICAgRXZlbnRIYW5kbGVyLm9mZihkb2N1bWVudCwgRVZFTlRfRk9DVVNJTik7XG5cbiAgICB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9TSE9XJDMpO1xuXG4gICAgRXZlbnRIYW5kbGVyLm9mZih0aGlzLl9lbGVtZW50LCBFVkVOVF9DTElDS19ESVNNSVNTKTtcbiAgICBFdmVudEhhbmRsZXIub2ZmKHRoaXMuX2RpYWxvZywgRVZFTlRfTU9VU0VET1dOX0RJU01JU1MpO1xuXG4gICAgaWYgKHRyYW5zaXRpb24pIHtcbiAgICAgIHZhciB0cmFuc2l0aW9uRHVyYXRpb24gPSBnZXRUcmFuc2l0aW9uRHVyYXRpb25Gcm9tRWxlbWVudCh0aGlzLl9lbGVtZW50KTtcbiAgICAgIEV2ZW50SGFuZGxlci5vbmUodGhpcy5fZWxlbWVudCwgVFJBTlNJVElPTl9FTkQsIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICByZXR1cm4gX3RoaXMyLl9oaWRlTW9kYWwoZXZlbnQpO1xuICAgICAgfSk7XG4gICAgICBlbXVsYXRlVHJhbnNpdGlvbkVuZCh0aGlzLl9lbGVtZW50LCB0cmFuc2l0aW9uRHVyYXRpb24pO1xuICAgIH0gZWxzZSB7XG4gICAgICB0aGlzLl9oaWRlTW9kYWwoKTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLmRpc3Bvc2UgPSBmdW5jdGlvbiBkaXNwb3NlKCkge1xuICAgIFt3aW5kb3csIHRoaXMuX2VsZW1lbnQsIHRoaXMuX2RpYWxvZ10uZm9yRWFjaChmdW5jdGlvbiAoaHRtbEVsZW1lbnQpIHtcbiAgICAgIHJldHVybiBFdmVudEhhbmRsZXIub2ZmKGh0bWxFbGVtZW50LCBFVkVOVF9LRVkkNyk7XG4gICAgfSk7XG4gICAgLyoqXG4gICAgICogYGRvY3VtZW50YCBoYXMgMiBldmVudHMgYEVWRU5UX0ZPQ1VTSU5gIGFuZCBgRVZFTlRfQ0xJQ0tfREFUQV9BUElgXG4gICAgICogRG8gbm90IG1vdmUgYGRvY3VtZW50YCBpbiBgaHRtbEVsZW1lbnRzYCBhcnJheVxuICAgICAqIEl0IHdpbGwgcmVtb3ZlIGBFVkVOVF9DTElDS19EQVRBX0FQSWAgZXZlbnQgdGhhdCBzaG91bGQgcmVtYWluXG4gICAgICovXG5cbiAgICBFdmVudEhhbmRsZXIub2ZmKGRvY3VtZW50LCBFVkVOVF9GT0NVU0lOKTtcbiAgICBEYXRhLnJlbW92ZURhdGEodGhpcy5fZWxlbWVudCwgREFUQV9LRVkkNyk7XG4gICAgdGhpcy5fY29uZmlnID0gbnVsbDtcbiAgICB0aGlzLl9lbGVtZW50ID0gbnVsbDtcbiAgICB0aGlzLl9kaWFsb2cgPSBudWxsO1xuICAgIHRoaXMuX2JhY2tkcm9wID0gbnVsbDtcbiAgICB0aGlzLl9pc1Nob3duID0gbnVsbDtcbiAgICB0aGlzLl9pc0JvZHlPdmVyZmxvd2luZyA9IG51bGw7XG4gICAgdGhpcy5faWdub3JlQmFja2Ryb3BDbGljayA9IG51bGw7XG4gICAgdGhpcy5faXNUcmFuc2l0aW9uaW5nID0gbnVsbDtcbiAgICB0aGlzLl9zY3JvbGxiYXJXaWR0aCA9IG51bGw7XG4gIH07XG5cbiAgX3Byb3RvLmhhbmRsZVVwZGF0ZSA9IGZ1bmN0aW9uIGhhbmRsZVVwZGF0ZSgpIHtcbiAgICB0aGlzLl9hZGp1c3REaWFsb2coKTtcbiAgfSAvLyBQcml2YXRlXG4gIDtcblxuICBfcHJvdG8uX2dldENvbmZpZyA9IGZ1bmN0aW9uIF9nZXRDb25maWcoY29uZmlnKSB7XG4gICAgY29uZmlnID0gX29iamVjdFNwcmVhZDIoX29iamVjdFNwcmVhZDIoe30sIERlZmF1bHQkNSksIGNvbmZpZyk7XG4gICAgdHlwZUNoZWNrQ29uZmlnKE5BTUUkNywgY29uZmlnLCBEZWZhdWx0VHlwZSQzKTtcbiAgICByZXR1cm4gY29uZmlnO1xuICB9O1xuXG4gIF9wcm90by5fc2hvd0VsZW1lbnQgPSBmdW5jdGlvbiBfc2hvd0VsZW1lbnQocmVsYXRlZFRhcmdldCkge1xuICAgIHZhciBfdGhpczMgPSB0aGlzO1xuXG4gICAgdmFyIHRyYW5zaXRpb24gPSB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0ZBREUpO1xuXG4gICAgdmFyIG1vZGFsQm9keSA9IFNlbGVjdG9yRW5naW5lLmZpbmRPbmUoU0VMRUNUT1JfTU9EQUxfQk9EWSwgdGhpcy5fZGlhbG9nKTtcblxuICAgIGlmICghdGhpcy5fZWxlbWVudC5wYXJlbnROb2RlIHx8IHRoaXMuX2VsZW1lbnQucGFyZW50Tm9kZS5ub2RlVHlwZSAhPT0gTm9kZS5FTEVNRU5UX05PREUpIHtcbiAgICAgIC8vIERvbid0IG1vdmUgbW9kYWwncyBET00gcG9zaXRpb25cbiAgICAgIGRvY3VtZW50LmJvZHkuYXBwZW5kQ2hpbGQodGhpcy5fZWxlbWVudCk7XG4gICAgfVxuXG4gICAgdGhpcy5fZWxlbWVudC5zdHlsZS5kaXNwbGF5ID0gJ2Jsb2NrJztcblxuICAgIHRoaXMuX2VsZW1lbnQucmVtb3ZlQXR0cmlidXRlKCdhcmlhLWhpZGRlbicpO1xuXG4gICAgdGhpcy5fZWxlbWVudC5zZXRBdHRyaWJ1dGUoJ2FyaWEtbW9kYWwnLCB0cnVlKTtcblxuICAgIHRoaXMuX2VsZW1lbnQuc2Nyb2xsVG9wID0gMDtcblxuICAgIGlmIChtb2RhbEJvZHkpIHtcbiAgICAgIG1vZGFsQm9keS5zY3JvbGxUb3AgPSAwO1xuICAgIH1cblxuICAgIGlmICh0cmFuc2l0aW9uKSB7XG4gICAgICByZWZsb3codGhpcy5fZWxlbWVudCk7XG4gICAgfVxuXG4gICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfU0hPVyQzKTtcblxuICAgIGlmICh0aGlzLl9jb25maWcuZm9jdXMpIHtcbiAgICAgIHRoaXMuX2VuZm9yY2VGb2N1cygpO1xuICAgIH1cblxuICAgIHZhciB0cmFuc2l0aW9uQ29tcGxldGUgPSBmdW5jdGlvbiB0cmFuc2l0aW9uQ29tcGxldGUoKSB7XG4gICAgICBpZiAoX3RoaXMzLl9jb25maWcuZm9jdXMpIHtcbiAgICAgICAgX3RoaXMzLl9lbGVtZW50LmZvY3VzKCk7XG4gICAgICB9XG5cbiAgICAgIF90aGlzMy5faXNUcmFuc2l0aW9uaW5nID0gZmFsc2U7XG4gICAgICBFdmVudEhhbmRsZXIudHJpZ2dlcihfdGhpczMuX2VsZW1lbnQsIEVWRU5UX1NIT1dOJDIsIHtcbiAgICAgICAgcmVsYXRlZFRhcmdldDogcmVsYXRlZFRhcmdldFxuICAgICAgfSk7XG4gICAgfTtcblxuICAgIGlmICh0cmFuc2l0aW9uKSB7XG4gICAgICB2YXIgdHJhbnNpdGlvbkR1cmF0aW9uID0gZ2V0VHJhbnNpdGlvbkR1cmF0aW9uRnJvbUVsZW1lbnQodGhpcy5fZGlhbG9nKTtcbiAgICAgIEV2ZW50SGFuZGxlci5vbmUodGhpcy5fZGlhbG9nLCBUUkFOU0lUSU9OX0VORCwgdHJhbnNpdGlvbkNvbXBsZXRlKTtcbiAgICAgIGVtdWxhdGVUcmFuc2l0aW9uRW5kKHRoaXMuX2RpYWxvZywgdHJhbnNpdGlvbkR1cmF0aW9uKTtcbiAgICB9IGVsc2Uge1xuICAgICAgdHJhbnNpdGlvbkNvbXBsZXRlKCk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5fZW5mb3JjZUZvY3VzID0gZnVuY3Rpb24gX2VuZm9yY2VGb2N1cygpIHtcbiAgICB2YXIgX3RoaXM0ID0gdGhpcztcblxuICAgIEV2ZW50SGFuZGxlci5vZmYoZG9jdW1lbnQsIEVWRU5UX0ZPQ1VTSU4pOyAvLyBndWFyZCBhZ2FpbnN0IGluZmluaXRlIGZvY3VzIGxvb3BcblxuICAgIEV2ZW50SGFuZGxlci5vbihkb2N1bWVudCwgRVZFTlRfRk9DVVNJTiwgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICBpZiAoZG9jdW1lbnQgIT09IGV2ZW50LnRhcmdldCAmJiBfdGhpczQuX2VsZW1lbnQgIT09IGV2ZW50LnRhcmdldCAmJiAhX3RoaXM0Ll9lbGVtZW50LmNvbnRhaW5zKGV2ZW50LnRhcmdldCkpIHtcbiAgICAgICAgX3RoaXM0Ll9lbGVtZW50LmZvY3VzKCk7XG4gICAgICB9XG4gICAgfSk7XG4gIH07XG5cbiAgX3Byb3RvLl9zZXRFc2NhcGVFdmVudCA9IGZ1bmN0aW9uIF9zZXRFc2NhcGVFdmVudCgpIHtcbiAgICB2YXIgX3RoaXM1ID0gdGhpcztcblxuICAgIGlmICh0aGlzLl9pc1Nob3duKSB7XG4gICAgICBFdmVudEhhbmRsZXIub24odGhpcy5fZWxlbWVudCwgRVZFTlRfS0VZRE9XTl9ESVNNSVNTLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgaWYgKF90aGlzNS5fY29uZmlnLmtleWJvYXJkICYmIGV2ZW50LmtleSA9PT0gRVNDQVBFX0tFWSQxKSB7XG4gICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICAgIF90aGlzNS5oaWRlKCk7XG4gICAgICAgIH0gZWxzZSBpZiAoIV90aGlzNS5fY29uZmlnLmtleWJvYXJkICYmIGV2ZW50LmtleSA9PT0gRVNDQVBFX0tFWSQxKSB7XG4gICAgICAgICAgX3RoaXM1Ll90cmlnZ2VyQmFja2Ryb3BUcmFuc2l0aW9uKCk7XG4gICAgICAgIH1cbiAgICAgIH0pO1xuICAgIH0gZWxzZSB7XG4gICAgICBFdmVudEhhbmRsZXIub2ZmKHRoaXMuX2VsZW1lbnQsIEVWRU5UX0tFWURPV05fRElTTUlTUyk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5fc2V0UmVzaXplRXZlbnQgPSBmdW5jdGlvbiBfc2V0UmVzaXplRXZlbnQoKSB7XG4gICAgdmFyIF90aGlzNiA9IHRoaXM7XG5cbiAgICBpZiAodGhpcy5faXNTaG93bikge1xuICAgICAgRXZlbnRIYW5kbGVyLm9uKHdpbmRvdywgRVZFTlRfUkVTSVpFLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiBfdGhpczYuX2FkanVzdERpYWxvZygpO1xuICAgICAgfSk7XG4gICAgfSBlbHNlIHtcbiAgICAgIEV2ZW50SGFuZGxlci5vZmYod2luZG93LCBFVkVOVF9SRVNJWkUpO1xuICAgIH1cbiAgfTtcblxuICBfcHJvdG8uX2hpZGVNb2RhbCA9IGZ1bmN0aW9uIF9oaWRlTW9kYWwoKSB7XG4gICAgdmFyIF90aGlzNyA9IHRoaXM7XG5cbiAgICB0aGlzLl9lbGVtZW50LnN0eWxlLmRpc3BsYXkgPSAnbm9uZSc7XG5cbiAgICB0aGlzLl9lbGVtZW50LnNldEF0dHJpYnV0ZSgnYXJpYS1oaWRkZW4nLCB0cnVlKTtcblxuICAgIHRoaXMuX2VsZW1lbnQucmVtb3ZlQXR0cmlidXRlKCdhcmlhLW1vZGFsJyk7XG5cbiAgICB0aGlzLl9pc1RyYW5zaXRpb25pbmcgPSBmYWxzZTtcblxuICAgIHRoaXMuX3Nob3dCYWNrZHJvcChmdW5jdGlvbiAoKSB7XG4gICAgICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9PUEVOKTtcblxuICAgICAgX3RoaXM3Ll9yZXNldEFkanVzdG1lbnRzKCk7XG5cbiAgICAgIF90aGlzNy5fcmVzZXRTY3JvbGxiYXIoKTtcblxuICAgICAgRXZlbnRIYW5kbGVyLnRyaWdnZXIoX3RoaXM3Ll9lbGVtZW50LCBFVkVOVF9ISURERU4kMik7XG4gICAgfSk7XG4gIH07XG5cbiAgX3Byb3RvLl9yZW1vdmVCYWNrZHJvcCA9IGZ1bmN0aW9uIF9yZW1vdmVCYWNrZHJvcCgpIHtcbiAgICB0aGlzLl9iYWNrZHJvcC5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHRoaXMuX2JhY2tkcm9wKTtcblxuICAgIHRoaXMuX2JhY2tkcm9wID0gbnVsbDtcbiAgfTtcblxuICBfcHJvdG8uX3Nob3dCYWNrZHJvcCA9IGZ1bmN0aW9uIF9zaG93QmFja2Ryb3AoY2FsbGJhY2spIHtcbiAgICB2YXIgX3RoaXM4ID0gdGhpcztcblxuICAgIHZhciBhbmltYXRlID0gdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9GQURFKSA/IENMQVNTX05BTUVfRkFERSA6ICcnO1xuXG4gICAgaWYgKHRoaXMuX2lzU2hvd24gJiYgdGhpcy5fY29uZmlnLmJhY2tkcm9wKSB7XG4gICAgICB0aGlzLl9iYWNrZHJvcCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpO1xuICAgICAgdGhpcy5fYmFja2Ryb3AuY2xhc3NOYW1lID0gQ0xBU1NfTkFNRV9CQUNLRFJPUDtcblxuICAgICAgaWYgKGFuaW1hdGUpIHtcbiAgICAgICAgdGhpcy5fYmFja2Ryb3AuY2xhc3NMaXN0LmFkZChhbmltYXRlKTtcbiAgICAgIH1cblxuICAgICAgZG9jdW1lbnQuYm9keS5hcHBlbmRDaGlsZCh0aGlzLl9iYWNrZHJvcCk7XG4gICAgICBFdmVudEhhbmRsZXIub24odGhpcy5fZWxlbWVudCwgRVZFTlRfQ0xJQ0tfRElTTUlTUywgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIGlmIChfdGhpczguX2lnbm9yZUJhY2tkcm9wQ2xpY2spIHtcbiAgICAgICAgICBfdGhpczguX2lnbm9yZUJhY2tkcm9wQ2xpY2sgPSBmYWxzZTtcbiAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICBpZiAoZXZlbnQudGFyZ2V0ICE9PSBldmVudC5jdXJyZW50VGFyZ2V0KSB7XG4gICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgX3RoaXM4Ll90cmlnZ2VyQmFja2Ryb3BUcmFuc2l0aW9uKCk7XG4gICAgICB9KTtcblxuICAgICAgaWYgKGFuaW1hdGUpIHtcbiAgICAgICAgcmVmbG93KHRoaXMuX2JhY2tkcm9wKTtcbiAgICAgIH1cblxuICAgICAgdGhpcy5fYmFja2Ryb3AuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX1NIT1ckMyk7XG5cbiAgICAgIGlmICghYW5pbWF0ZSkge1xuICAgICAgICBjYWxsYmFjaygpO1xuICAgICAgICByZXR1cm47XG4gICAgICB9XG5cbiAgICAgIHZhciBiYWNrZHJvcFRyYW5zaXRpb25EdXJhdGlvbiA9IGdldFRyYW5zaXRpb25EdXJhdGlvbkZyb21FbGVtZW50KHRoaXMuX2JhY2tkcm9wKTtcbiAgICAgIEV2ZW50SGFuZGxlci5vbmUodGhpcy5fYmFja2Ryb3AsIFRSQU5TSVRJT05fRU5ELCBjYWxsYmFjayk7XG4gICAgICBlbXVsYXRlVHJhbnNpdGlvbkVuZCh0aGlzLl9iYWNrZHJvcCwgYmFja2Ryb3BUcmFuc2l0aW9uRHVyYXRpb24pO1xuICAgIH0gZWxzZSBpZiAoIXRoaXMuX2lzU2hvd24gJiYgdGhpcy5fYmFja2Ryb3ApIHtcbiAgICAgIHRoaXMuX2JhY2tkcm9wLmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9TSE9XJDMpO1xuXG4gICAgICB2YXIgY2FsbGJhY2tSZW1vdmUgPSBmdW5jdGlvbiBjYWxsYmFja1JlbW92ZSgpIHtcbiAgICAgICAgX3RoaXM4Ll9yZW1vdmVCYWNrZHJvcCgpO1xuXG4gICAgICAgIGNhbGxiYWNrKCk7XG4gICAgICB9O1xuXG4gICAgICBpZiAodGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9GQURFKSkge1xuICAgICAgICB2YXIgX2JhY2tkcm9wVHJhbnNpdGlvbkR1cmF0aW9uID0gZ2V0VHJhbnNpdGlvbkR1cmF0aW9uRnJvbUVsZW1lbnQodGhpcy5fYmFja2Ryb3ApO1xuXG4gICAgICAgIEV2ZW50SGFuZGxlci5vbmUodGhpcy5fYmFja2Ryb3AsIFRSQU5TSVRJT05fRU5ELCBjYWxsYmFja1JlbW92ZSk7XG4gICAgICAgIGVtdWxhdGVUcmFuc2l0aW9uRW5kKHRoaXMuX2JhY2tkcm9wLCBfYmFja2Ryb3BUcmFuc2l0aW9uRHVyYXRpb24pO1xuICAgICAgfSBlbHNlIHtcbiAgICAgICAgY2FsbGJhY2tSZW1vdmUoKTtcbiAgICAgIH1cbiAgICB9IGVsc2Uge1xuICAgICAgY2FsbGJhY2soKTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLl90cmlnZ2VyQmFja2Ryb3BUcmFuc2l0aW9uID0gZnVuY3Rpb24gX3RyaWdnZXJCYWNrZHJvcFRyYW5zaXRpb24oKSB7XG4gICAgdmFyIF90aGlzOSA9IHRoaXM7XG5cbiAgICBpZiAodGhpcy5fY29uZmlnLmJhY2tkcm9wID09PSAnc3RhdGljJykge1xuICAgICAgdmFyIGhpZGVFdmVudCA9IEV2ZW50SGFuZGxlci50cmlnZ2VyKHRoaXMuX2VsZW1lbnQsIEVWRU5UX0hJREVfUFJFVkVOVEVEKTtcblxuICAgICAgaWYgKGhpZGVFdmVudC5kZWZhdWx0UHJldmVudGVkKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfU1RBVElDKTtcblxuICAgICAgdmFyIG1vZGFsVHJhbnNpdGlvbkR1cmF0aW9uID0gZ2V0VHJhbnNpdGlvbkR1cmF0aW9uRnJvbUVsZW1lbnQodGhpcy5fZWxlbWVudCk7XG4gICAgICBFdmVudEhhbmRsZXIub25lKHRoaXMuX2VsZW1lbnQsIFRSQU5TSVRJT05fRU5ELCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIF90aGlzOS5fZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTX05BTUVfU1RBVElDKTtcbiAgICAgIH0pO1xuICAgICAgZW11bGF0ZVRyYW5zaXRpb25FbmQodGhpcy5fZWxlbWVudCwgbW9kYWxUcmFuc2l0aW9uRHVyYXRpb24pO1xuXG4gICAgICB0aGlzLl9lbGVtZW50LmZvY3VzKCk7XG4gICAgfSBlbHNlIHtcbiAgICAgIHRoaXMuaGlkZSgpO1xuICAgIH1cbiAgfSAvLyAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gIC8vIHRoZSBmb2xsb3dpbmcgbWV0aG9kcyBhcmUgdXNlZCB0byBoYW5kbGUgb3ZlcmZsb3dpbmcgbW9kYWxzXG4gIC8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAgO1xuXG4gIF9wcm90by5fYWRqdXN0RGlhbG9nID0gZnVuY3Rpb24gX2FkanVzdERpYWxvZygpIHtcbiAgICB2YXIgaXNNb2RhbE92ZXJmbG93aW5nID0gdGhpcy5fZWxlbWVudC5zY3JvbGxIZWlnaHQgPiBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuY2xpZW50SGVpZ2h0O1xuXG4gICAgaWYgKCF0aGlzLl9pc0JvZHlPdmVyZmxvd2luZyAmJiBpc01vZGFsT3ZlcmZsb3dpbmcpIHtcbiAgICAgIHRoaXMuX2VsZW1lbnQuc3R5bGUucGFkZGluZ0xlZnQgPSB0aGlzLl9zY3JvbGxiYXJXaWR0aCArIFwicHhcIjtcbiAgICB9XG5cbiAgICBpZiAodGhpcy5faXNCb2R5T3ZlcmZsb3dpbmcgJiYgIWlzTW9kYWxPdmVyZmxvd2luZykge1xuICAgICAgdGhpcy5fZWxlbWVudC5zdHlsZS5wYWRkaW5nUmlnaHQgPSB0aGlzLl9zY3JvbGxiYXJXaWR0aCArIFwicHhcIjtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLl9yZXNldEFkanVzdG1lbnRzID0gZnVuY3Rpb24gX3Jlc2V0QWRqdXN0bWVudHMoKSB7XG4gICAgdGhpcy5fZWxlbWVudC5zdHlsZS5wYWRkaW5nTGVmdCA9ICcnO1xuICAgIHRoaXMuX2VsZW1lbnQuc3R5bGUucGFkZGluZ1JpZ2h0ID0gJyc7XG4gIH07XG5cbiAgX3Byb3RvLl9jaGVja1Njcm9sbGJhciA9IGZ1bmN0aW9uIF9jaGVja1Njcm9sbGJhcigpIHtcbiAgICB2YXIgcmVjdCA9IGRvY3VtZW50LmJvZHkuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCk7XG4gICAgdGhpcy5faXNCb2R5T3ZlcmZsb3dpbmcgPSBNYXRoLnJvdW5kKHJlY3QubGVmdCArIHJlY3QucmlnaHQpIDwgd2luZG93LmlubmVyV2lkdGg7XG4gICAgdGhpcy5fc2Nyb2xsYmFyV2lkdGggPSB0aGlzLl9nZXRTY3JvbGxiYXJXaWR0aCgpO1xuICB9O1xuXG4gIF9wcm90by5fc2V0U2Nyb2xsYmFyID0gZnVuY3Rpb24gX3NldFNjcm9sbGJhcigpIHtcbiAgICB2YXIgX3RoaXMxMCA9IHRoaXM7XG5cbiAgICBpZiAodGhpcy5faXNCb2R5T3ZlcmZsb3dpbmcpIHtcbiAgICAgIC8vIE5vdGU6IERPTU5vZGUuc3R5bGUucGFkZGluZ1JpZ2h0IHJldHVybnMgdGhlIGFjdHVhbCB2YWx1ZSBvciAnJyBpZiBub3Qgc2V0XG4gICAgICAvLyAgIHdoaWxlICQoRE9NTm9kZSkuY3NzKCdwYWRkaW5nLXJpZ2h0JykgcmV0dXJucyB0aGUgY2FsY3VsYXRlZCB2YWx1ZSBvciAwIGlmIG5vdCBzZXRcbiAgICAgIC8vIEFkanVzdCBmaXhlZCBjb250ZW50IHBhZGRpbmdcbiAgICAgIFNlbGVjdG9yRW5naW5lLmZpbmQoU0VMRUNUT1JfRklYRURfQ09OVEVOVCkuZm9yRWFjaChmdW5jdGlvbiAoZWxlbWVudCkge1xuICAgICAgICB2YXIgYWN0dWFsUGFkZGluZyA9IGVsZW1lbnQuc3R5bGUucGFkZGluZ1JpZ2h0O1xuICAgICAgICB2YXIgY2FsY3VsYXRlZFBhZGRpbmcgPSB3aW5kb3cuZ2V0Q29tcHV0ZWRTdHlsZShlbGVtZW50KVsncGFkZGluZy1yaWdodCddO1xuICAgICAgICBNYW5pcHVsYXRvci5zZXREYXRhQXR0cmlidXRlKGVsZW1lbnQsICdwYWRkaW5nLXJpZ2h0JywgYWN0dWFsUGFkZGluZyk7XG4gICAgICAgIGVsZW1lbnQuc3R5bGUucGFkZGluZ1JpZ2h0ID0gcGFyc2VGbG9hdChjYWxjdWxhdGVkUGFkZGluZykgKyBfdGhpczEwLl9zY3JvbGxiYXJXaWR0aCArIFwicHhcIjtcbiAgICAgIH0pOyAvLyBBZGp1c3Qgc3RpY2t5IGNvbnRlbnQgbWFyZ2luXG5cbiAgICAgIFNlbGVjdG9yRW5naW5lLmZpbmQoU0VMRUNUT1JfU1RJQ0tZX0NPTlRFTlQpLmZvckVhY2goZnVuY3Rpb24gKGVsZW1lbnQpIHtcbiAgICAgICAgdmFyIGFjdHVhbE1hcmdpbiA9IGVsZW1lbnQuc3R5bGUubWFyZ2luUmlnaHQ7XG4gICAgICAgIHZhciBjYWxjdWxhdGVkTWFyZ2luID0gd2luZG93LmdldENvbXB1dGVkU3R5bGUoZWxlbWVudClbJ21hcmdpbi1yaWdodCddO1xuICAgICAgICBNYW5pcHVsYXRvci5zZXREYXRhQXR0cmlidXRlKGVsZW1lbnQsICdtYXJnaW4tcmlnaHQnLCBhY3R1YWxNYXJnaW4pO1xuICAgICAgICBlbGVtZW50LnN0eWxlLm1hcmdpblJpZ2h0ID0gcGFyc2VGbG9hdChjYWxjdWxhdGVkTWFyZ2luKSAtIF90aGlzMTAuX3Njcm9sbGJhcldpZHRoICsgXCJweFwiO1xuICAgICAgfSk7IC8vIEFkanVzdCBib2R5IHBhZGRpbmdcblxuICAgICAgdmFyIGFjdHVhbFBhZGRpbmcgPSBkb2N1bWVudC5ib2R5LnN0eWxlLnBhZGRpbmdSaWdodDtcbiAgICAgIHZhciBjYWxjdWxhdGVkUGFkZGluZyA9IHdpbmRvdy5nZXRDb21wdXRlZFN0eWxlKGRvY3VtZW50LmJvZHkpWydwYWRkaW5nLXJpZ2h0J107XG4gICAgICBNYW5pcHVsYXRvci5zZXREYXRhQXR0cmlidXRlKGRvY3VtZW50LmJvZHksICdwYWRkaW5nLXJpZ2h0JywgYWN0dWFsUGFkZGluZyk7XG4gICAgICBkb2N1bWVudC5ib2R5LnN0eWxlLnBhZGRpbmdSaWdodCA9IHBhcnNlRmxvYXQoY2FsY3VsYXRlZFBhZGRpbmcpICsgdGhpcy5fc2Nyb2xsYmFyV2lkdGggKyBcInB4XCI7XG4gICAgfVxuXG4gICAgZG9jdW1lbnQuYm9keS5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfT1BFTik7XG4gIH07XG5cbiAgX3Byb3RvLl9yZXNldFNjcm9sbGJhciA9IGZ1bmN0aW9uIF9yZXNldFNjcm9sbGJhcigpIHtcbiAgICAvLyBSZXN0b3JlIGZpeGVkIGNvbnRlbnQgcGFkZGluZ1xuICAgIFNlbGVjdG9yRW5naW5lLmZpbmQoU0VMRUNUT1JfRklYRURfQ09OVEVOVCkuZm9yRWFjaChmdW5jdGlvbiAoZWxlbWVudCkge1xuICAgICAgdmFyIHBhZGRpbmcgPSBNYW5pcHVsYXRvci5nZXREYXRhQXR0cmlidXRlKGVsZW1lbnQsICdwYWRkaW5nLXJpZ2h0Jyk7XG5cbiAgICAgIGlmICh0eXBlb2YgcGFkZGluZyAhPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgTWFuaXB1bGF0b3IucmVtb3ZlRGF0YUF0dHJpYnV0ZShlbGVtZW50LCAncGFkZGluZy1yaWdodCcpO1xuICAgICAgICBlbGVtZW50LnN0eWxlLnBhZGRpbmdSaWdodCA9IHBhZGRpbmc7XG4gICAgICB9XG4gICAgfSk7IC8vIFJlc3RvcmUgc3RpY2t5IGNvbnRlbnQgYW5kIG5hdmJhci10b2dnbGVyIG1hcmdpblxuXG4gICAgU2VsZWN0b3JFbmdpbmUuZmluZChcIlwiICsgU0VMRUNUT1JfU1RJQ0tZX0NPTlRFTlQpLmZvckVhY2goZnVuY3Rpb24gKGVsZW1lbnQpIHtcbiAgICAgIHZhciBtYXJnaW4gPSBNYW5pcHVsYXRvci5nZXREYXRhQXR0cmlidXRlKGVsZW1lbnQsICdtYXJnaW4tcmlnaHQnKTtcblxuICAgICAgaWYgKHR5cGVvZiBtYXJnaW4gIT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgIE1hbmlwdWxhdG9yLnJlbW92ZURhdGFBdHRyaWJ1dGUoZWxlbWVudCwgJ21hcmdpbi1yaWdodCcpO1xuICAgICAgICBlbGVtZW50LnN0eWxlLm1hcmdpblJpZ2h0ID0gbWFyZ2luO1xuICAgICAgfVxuICAgIH0pOyAvLyBSZXN0b3JlIGJvZHkgcGFkZGluZ1xuXG4gICAgdmFyIHBhZGRpbmcgPSBNYW5pcHVsYXRvci5nZXREYXRhQXR0cmlidXRlKGRvY3VtZW50LmJvZHksICdwYWRkaW5nLXJpZ2h0Jyk7XG5cbiAgICBpZiAodHlwZW9mIHBhZGRpbmcgPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICBkb2N1bWVudC5ib2R5LnN0eWxlLnBhZGRpbmdSaWdodCA9ICcnO1xuICAgIH0gZWxzZSB7XG4gICAgICBNYW5pcHVsYXRvci5yZW1vdmVEYXRhQXR0cmlidXRlKGRvY3VtZW50LmJvZHksICdwYWRkaW5nLXJpZ2h0Jyk7XG4gICAgICBkb2N1bWVudC5ib2R5LnN0eWxlLnBhZGRpbmdSaWdodCA9IHBhZGRpbmc7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5fZ2V0U2Nyb2xsYmFyV2lkdGggPSBmdW5jdGlvbiBfZ2V0U2Nyb2xsYmFyV2lkdGgoKSB7XG4gICAgLy8gdGh4IGQud2Fsc2hcbiAgICB2YXIgc2Nyb2xsRGl2ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7XG4gICAgc2Nyb2xsRGl2LmNsYXNzTmFtZSA9IENMQVNTX05BTUVfU0NST0xMQkFSX01FQVNVUkVSO1xuICAgIGRvY3VtZW50LmJvZHkuYXBwZW5kQ2hpbGQoc2Nyb2xsRGl2KTtcbiAgICB2YXIgc2Nyb2xsYmFyV2lkdGggPSBzY3JvbGxEaXYuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkud2lkdGggLSBzY3JvbGxEaXYuY2xpZW50V2lkdGg7XG4gICAgZG9jdW1lbnQuYm9keS5yZW1vdmVDaGlsZChzY3JvbGxEaXYpO1xuICAgIHJldHVybiBzY3JvbGxiYXJXaWR0aDtcbiAgfSAvLyBTdGF0aWNcbiAgO1xuXG4gIE1vZGFsLmpRdWVyeUludGVyZmFjZSA9IGZ1bmN0aW9uIGpRdWVyeUludGVyZmFjZShjb25maWcsIHJlbGF0ZWRUYXJnZXQpIHtcbiAgICByZXR1cm4gdGhpcy5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgIHZhciBkYXRhID0gRGF0YS5nZXREYXRhKHRoaXMsIERBVEFfS0VZJDcpO1xuXG4gICAgICB2YXIgX2NvbmZpZyA9IF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCBEZWZhdWx0JDUpLCBNYW5pcHVsYXRvci5nZXREYXRhQXR0cmlidXRlcyh0aGlzKSksIHR5cGVvZiBjb25maWcgPT09ICdvYmplY3QnICYmIGNvbmZpZyA/IGNvbmZpZyA6IHt9KTtcblxuICAgICAgaWYgKCFkYXRhKSB7XG4gICAgICAgIGRhdGEgPSBuZXcgTW9kYWwodGhpcywgX2NvbmZpZyk7XG4gICAgICB9XG5cbiAgICAgIGlmICh0eXBlb2YgY29uZmlnID09PSAnc3RyaW5nJykge1xuICAgICAgICBpZiAodHlwZW9mIGRhdGFbY29uZmlnXSA9PT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgICB0aHJvdyBuZXcgVHlwZUVycm9yKFwiTm8gbWV0aG9kIG5hbWVkIFxcXCJcIiArIGNvbmZpZyArIFwiXFxcIlwiKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGRhdGFbY29uZmlnXShyZWxhdGVkVGFyZ2V0KTtcbiAgICAgIH0gZWxzZSBpZiAoX2NvbmZpZy5zaG93KSB7XG4gICAgICAgIGRhdGEuc2hvdyhyZWxhdGVkVGFyZ2V0KTtcbiAgICAgIH1cbiAgICB9KTtcbiAgfTtcblxuICBNb2RhbC5nZXRJbnN0YW5jZSA9IGZ1bmN0aW9uIGdldEluc3RhbmNlKGVsZW1lbnQpIHtcbiAgICByZXR1cm4gRGF0YS5nZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJDcpO1xuICB9O1xuXG4gIF9jcmVhdGVDbGFzcyhNb2RhbCwgbnVsbCwgW3tcbiAgICBrZXk6IFwiVkVSU0lPTlwiLFxuICAgIGdldDogZnVuY3Rpb24gZ2V0KCkge1xuICAgICAgcmV0dXJuIFZFUlNJT04kNztcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiRGVmYXVsdFwiLFxuICAgIGdldDogZnVuY3Rpb24gZ2V0KCkge1xuICAgICAgcmV0dXJuIERlZmF1bHQkNTtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gTW9kYWw7XG59KCk7XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogRGF0YSBBcGkgaW1wbGVtZW50YXRpb25cbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cblxuRXZlbnRIYW5kbGVyLm9uKGRvY3VtZW50LCBFVkVOVF9DTElDS19EQVRBX0FQSSQ3LCBTRUxFQ1RPUl9EQVRBX1RPR0dMRSQzLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgdmFyIF90aGlzMTEgPSB0aGlzO1xuXG4gIHZhciB0YXJnZXQgPSBnZXRFbGVtZW50RnJvbVNlbGVjdG9yKHRoaXMpO1xuXG4gIGlmICh0aGlzLnRhZ05hbWUgPT09ICdBJyB8fCB0aGlzLnRhZ05hbWUgPT09ICdBUkVBJykge1xuICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gIH1cblxuICBFdmVudEhhbmRsZXIub25lKHRhcmdldCwgRVZFTlRfU0hPVyQyLCBmdW5jdGlvbiAoc2hvd0V2ZW50KSB7XG4gICAgaWYgKHNob3dFdmVudC5kZWZhdWx0UHJldmVudGVkKSB7XG4gICAgICAvLyBvbmx5IHJlZ2lzdGVyIGZvY3VzIHJlc3RvcmVyIGlmIG1vZGFsIHdpbGwgYWN0dWFsbHkgZ2V0IHNob3duXG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgRXZlbnRIYW5kbGVyLm9uZSh0YXJnZXQsIEVWRU5UX0hJRERFTiQyLCBmdW5jdGlvbiAoKSB7XG4gICAgICBpZiAoaXNWaXNpYmxlKF90aGlzMTEpKSB7XG4gICAgICAgIF90aGlzMTEuZm9jdXMoKTtcbiAgICAgIH1cbiAgICB9KTtcbiAgfSk7XG4gIHZhciBkYXRhID0gRGF0YS5nZXREYXRhKHRhcmdldCwgREFUQV9LRVkkNyk7XG5cbiAgaWYgKCFkYXRhKSB7XG4gICAgdmFyIGNvbmZpZyA9IF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCBNYW5pcHVsYXRvci5nZXREYXRhQXR0cmlidXRlcyh0YXJnZXQpKSwgTWFuaXB1bGF0b3IuZ2V0RGF0YUF0dHJpYnV0ZXModGhpcykpO1xuXG4gICAgZGF0YSA9IG5ldyBNb2RhbCh0YXJnZXQsIGNvbmZpZyk7XG4gIH1cblxuICBkYXRhLnNob3codGhpcyk7XG59KTtcbnZhciAkJDggPSBnZXRqUXVlcnkoKTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBqUXVlcnlcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogYWRkIC5tb2RhbCB0byBqUXVlcnkgb25seSBpZiBqUXVlcnkgaXMgcHJlc2VudFxuICovXG5cbi8qIGlzdGFuYnVsIGlnbm9yZSBpZiAqL1xuXG5pZiAoJCQ4KSB7XG4gIHZhciBKUVVFUllfTk9fQ09ORkxJQ1QkNyA9ICQkOC5mbltOQU1FJDddO1xuICAkJDguZm5bTkFNRSQ3XSA9IE1vZGFsLmpRdWVyeUludGVyZmFjZTtcbiAgJCQ4LmZuW05BTUUkN10uQ29uc3RydWN0b3IgPSBNb2RhbDtcblxuICAkJDguZm5bTkFNRSQ3XS5ub0NvbmZsaWN0ID0gZnVuY3Rpb24gKCkge1xuICAgICQkOC5mbltOQU1FJDddID0gSlFVRVJZX05PX0NPTkZMSUNUJDc7XG4gICAgcmV0dXJuIE1vZGFsLmpRdWVyeUludGVyZmFjZTtcbiAgfTtcbn1cblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQm9vdHN0cmFwICh2NS4wLjAtYWxwaGExKTogdXRpbC9zYW5pdGl6ZXIuanNcbiAqIExpY2Vuc2VkIHVuZGVyIE1JVCAoaHR0cHM6Ly9naXRodWIuY29tL3R3YnMvYm9vdHN0cmFwL2Jsb2IvbWFzdGVyL0xJQ0VOU0UpXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG52YXIgdXJpQXR0cnMgPSBbJ2JhY2tncm91bmQnLCAnY2l0ZScsICdocmVmJywgJ2l0ZW10eXBlJywgJ2xvbmdkZXNjJywgJ3Bvc3RlcicsICdzcmMnLCAneGxpbms6aHJlZiddO1xudmFyIEFSSUFfQVRUUklCVVRFX1BBVFRFUk4gPSAvXmFyaWEtW1xcdy1dKiQvaTtcbi8qKlxuICogQSBwYXR0ZXJuIHRoYXQgcmVjb2duaXplcyBhIGNvbW1vbmx5IHVzZWZ1bCBzdWJzZXQgb2YgVVJMcyB0aGF0IGFyZSBzYWZlLlxuICpcbiAqIFNob3V0b3V0IHRvIEFuZ3VsYXIgNyBodHRwczovL2dpdGh1Yi5jb20vYW5ndWxhci9hbmd1bGFyL2Jsb2IvNy4yLjQvcGFja2FnZXMvY29yZS9zcmMvc2FuaXRpemF0aW9uL3VybF9zYW5pdGl6ZXIudHNcbiAqL1xuXG52YXIgU0FGRV9VUkxfUEFUVEVSTiA9IC9eKD86KD86aHR0cHM/fG1haWx0b3xmdHB8dGVsfGZpbGUpOnxbXiMmLzo/XSooPzpbIy8/XXwkKSkvZ2k7XG4vKipcbiAqIEEgcGF0dGVybiB0aGF0IG1hdGNoZXMgc2FmZSBkYXRhIFVSTHMuIE9ubHkgbWF0Y2hlcyBpbWFnZSwgdmlkZW8gYW5kIGF1ZGlvIHR5cGVzLlxuICpcbiAqIFNob3V0b3V0IHRvIEFuZ3VsYXIgNyBodHRwczovL2dpdGh1Yi5jb20vYW5ndWxhci9hbmd1bGFyL2Jsb2IvNy4yLjQvcGFja2FnZXMvY29yZS9zcmMvc2FuaXRpemF0aW9uL3VybF9zYW5pdGl6ZXIudHNcbiAqL1xuXG52YXIgREFUQV9VUkxfUEFUVEVSTiA9IC9eZGF0YTooPzppbWFnZVxcLyg/OmJtcHxnaWZ8anBlZ3xqcGd8cG5nfHRpZmZ8d2VicCl8dmlkZW9cXC8oPzptcGVnfG1wNHxvZ2d8d2VibSl8YXVkaW9cXC8oPzptcDN8b2dhfG9nZ3xvcHVzKSk7YmFzZTY0LFtcXGQrL2Etel0rPSokL2k7XG5cbnZhciBhbGxvd2VkQXR0cmlidXRlID0gZnVuY3Rpb24gYWxsb3dlZEF0dHJpYnV0ZShhdHRyLCBhbGxvd2VkQXR0cmlidXRlTGlzdCkge1xuICB2YXIgYXR0ck5hbWUgPSBhdHRyLm5vZGVOYW1lLnRvTG93ZXJDYXNlKCk7XG5cbiAgaWYgKGFsbG93ZWRBdHRyaWJ1dGVMaXN0LmluZGV4T2YoYXR0ck5hbWUpICE9PSAtMSkge1xuICAgIGlmICh1cmlBdHRycy5pbmRleE9mKGF0dHJOYW1lKSAhPT0gLTEpIHtcbiAgICAgIHJldHVybiBCb29sZWFuKGF0dHIubm9kZVZhbHVlLm1hdGNoKFNBRkVfVVJMX1BBVFRFUk4pIHx8IGF0dHIubm9kZVZhbHVlLm1hdGNoKERBVEFfVVJMX1BBVFRFUk4pKTtcbiAgICB9XG5cbiAgICByZXR1cm4gdHJ1ZTtcbiAgfVxuXG4gIHZhciByZWdFeHAgPSBhbGxvd2VkQXR0cmlidXRlTGlzdC5maWx0ZXIoZnVuY3Rpb24gKGF0dHJSZWdleCkge1xuICAgIHJldHVybiBhdHRyUmVnZXggaW5zdGFuY2VvZiBSZWdFeHA7XG4gIH0pOyAvLyBDaGVjayBpZiBhIHJlZ3VsYXIgZXhwcmVzc2lvbiB2YWxpZGF0ZXMgdGhlIGF0dHJpYnV0ZS5cblxuICBmb3IgKHZhciBpID0gMCwgbGVuID0gcmVnRXhwLmxlbmd0aDsgaSA8IGxlbjsgaSsrKSB7XG4gICAgaWYgKGF0dHJOYW1lLm1hdGNoKHJlZ0V4cFtpXSkpIHtcbiAgICAgIHJldHVybiB0cnVlO1xuICAgIH1cbiAgfVxuXG4gIHJldHVybiBmYWxzZTtcbn07XG5cbnZhciBEZWZhdWx0V2hpdGVsaXN0ID0ge1xuICAvLyBHbG9iYWwgYXR0cmlidXRlcyBhbGxvd2VkIG9uIGFueSBzdXBwbGllZCBlbGVtZW50IGJlbG93LlxuICAnKic6IFsnY2xhc3MnLCAnZGlyJywgJ2lkJywgJ2xhbmcnLCAncm9sZScsIEFSSUFfQVRUUklCVVRFX1BBVFRFUk5dLFxuICBhOiBbJ3RhcmdldCcsICdocmVmJywgJ3RpdGxlJywgJ3JlbCddLFxuICBhcmVhOiBbXSxcbiAgYjogW10sXG4gIGJyOiBbXSxcbiAgY29sOiBbXSxcbiAgY29kZTogW10sXG4gIGRpdjogW10sXG4gIGVtOiBbXSxcbiAgaHI6IFtdLFxuICBoMTogW10sXG4gIGgyOiBbXSxcbiAgaDM6IFtdLFxuICBoNDogW10sXG4gIGg1OiBbXSxcbiAgaDY6IFtdLFxuICBpOiBbXSxcbiAgaW1nOiBbJ3NyYycsICdzcmNzZXQnLCAnYWx0JywgJ3RpdGxlJywgJ3dpZHRoJywgJ2hlaWdodCddLFxuICBsaTogW10sXG4gIG9sOiBbXSxcbiAgcDogW10sXG4gIHByZTogW10sXG4gIHM6IFtdLFxuICBzbWFsbDogW10sXG4gIHNwYW46IFtdLFxuICBzdWI6IFtdLFxuICBzdXA6IFtdLFxuICBzdHJvbmc6IFtdLFxuICB1OiBbXSxcbiAgdWw6IFtdXG59O1xuZnVuY3Rpb24gc2FuaXRpemVIdG1sKHVuc2FmZUh0bWwsIHdoaXRlTGlzdCwgc2FuaXRpemVGbikge1xuICB2YXIgX3JlZjtcblxuICBpZiAoIXVuc2FmZUh0bWwubGVuZ3RoKSB7XG4gICAgcmV0dXJuIHVuc2FmZUh0bWw7XG4gIH1cblxuICBpZiAoc2FuaXRpemVGbiAmJiB0eXBlb2Ygc2FuaXRpemVGbiA9PT0gJ2Z1bmN0aW9uJykge1xuICAgIHJldHVybiBzYW5pdGl6ZUZuKHVuc2FmZUh0bWwpO1xuICB9XG5cbiAgdmFyIGRvbVBhcnNlciA9IG5ldyB3aW5kb3cuRE9NUGFyc2VyKCk7XG4gIHZhciBjcmVhdGVkRG9jdW1lbnQgPSBkb21QYXJzZXIucGFyc2VGcm9tU3RyaW5nKHVuc2FmZUh0bWwsICd0ZXh0L2h0bWwnKTtcbiAgdmFyIHdoaXRlbGlzdEtleXMgPSBPYmplY3Qua2V5cyh3aGl0ZUxpc3QpO1xuXG4gIHZhciBlbGVtZW50cyA9IChfcmVmID0gW10pLmNvbmNhdC5hcHBseShfcmVmLCBjcmVhdGVkRG9jdW1lbnQuYm9keS5xdWVyeVNlbGVjdG9yQWxsKCcqJykpO1xuXG4gIHZhciBfbG9vcCA9IGZ1bmN0aW9uIF9sb29wKGksIGxlbikge1xuICAgIHZhciBfcmVmMjtcblxuICAgIHZhciBlbCA9IGVsZW1lbnRzW2ldO1xuICAgIHZhciBlbE5hbWUgPSBlbC5ub2RlTmFtZS50b0xvd2VyQ2FzZSgpO1xuXG4gICAgaWYgKHdoaXRlbGlzdEtleXMuaW5kZXhPZihlbE5hbWUpID09PSAtMSkge1xuICAgICAgZWwucGFyZW50Tm9kZS5yZW1vdmVDaGlsZChlbCk7XG4gICAgICByZXR1cm4gXCJjb250aW51ZVwiO1xuICAgIH1cblxuICAgIHZhciBhdHRyaWJ1dGVMaXN0ID0gKF9yZWYyID0gW10pLmNvbmNhdC5hcHBseShfcmVmMiwgZWwuYXR0cmlidXRlcyk7XG5cbiAgICB2YXIgd2hpdGVsaXN0ZWRBdHRyaWJ1dGVzID0gW10uY29uY2F0KHdoaXRlTGlzdFsnKiddIHx8IFtdLCB3aGl0ZUxpc3RbZWxOYW1lXSB8fCBbXSk7XG4gICAgYXR0cmlidXRlTGlzdC5mb3JFYWNoKGZ1bmN0aW9uIChhdHRyKSB7XG4gICAgICBpZiAoIWFsbG93ZWRBdHRyaWJ1dGUoYXR0ciwgd2hpdGVsaXN0ZWRBdHRyaWJ1dGVzKSkge1xuICAgICAgICBlbC5yZW1vdmVBdHRyaWJ1dGUoYXR0ci5ub2RlTmFtZSk7XG4gICAgICB9XG4gICAgfSk7XG4gIH07XG5cbiAgZm9yICh2YXIgaSA9IDAsIGxlbiA9IGVsZW1lbnRzLmxlbmd0aDsgaSA8IGxlbjsgaSsrKSB7XG4gICAgdmFyIF9yZXQgPSBfbG9vcChpKTtcblxuICAgIGlmIChfcmV0ID09PSBcImNvbnRpbnVlXCIpIGNvbnRpbnVlO1xuICB9XG5cbiAgcmV0dXJuIGNyZWF0ZWREb2N1bWVudC5ib2R5LmlubmVySFRNTDtcbn1cblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENvbnN0YW50c1xuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIE5BTUUkOCA9ICd0b29sdGlwJztcbnZhciBWRVJTSU9OJDggPSAnMy4yLjAnO1xudmFyIERBVEFfS0VZJDggPSAnY29yZXVpLnRvb2x0aXAnO1xudmFyIEVWRU5UX0tFWSQ4ID0gXCIuXCIgKyBEQVRBX0tFWSQ4O1xudmFyIENMQVNTX1BSRUZJWCA9ICdicy10b29sdGlwJztcbnZhciBCU0NMU19QUkVGSVhfUkVHRVggPSBuZXcgUmVnRXhwKFwiKF58XFxcXHMpXCIgKyBDTEFTU19QUkVGSVggKyBcIlxcXFxTK1wiLCAnZycpO1xudmFyIERJU0FMTE9XRURfQVRUUklCVVRFUyA9IFsnc2FuaXRpemUnLCAnd2hpdGVMaXN0JywgJ3Nhbml0aXplRm4nXTtcbnZhciBEZWZhdWx0VHlwZSQ0ID0ge1xuICBhbmltYXRpb246ICdib29sZWFuJyxcbiAgdGVtcGxhdGU6ICdzdHJpbmcnLFxuICB0aXRsZTogJyhzdHJpbmd8ZWxlbWVudHxmdW5jdGlvbiknLFxuICB0cmlnZ2VyOiAnc3RyaW5nJyxcbiAgZGVsYXk6ICcobnVtYmVyfG9iamVjdCknLFxuICBodG1sOiAnYm9vbGVhbicsXG4gIHNlbGVjdG9yOiAnKHN0cmluZ3xib29sZWFuKScsXG4gIHBsYWNlbWVudDogJyhzdHJpbmd8ZnVuY3Rpb24pJyxcbiAgb2Zmc2V0OiAnKG51bWJlcnxzdHJpbmd8ZnVuY3Rpb24pJyxcbiAgY29udGFpbmVyOiAnKHN0cmluZ3xlbGVtZW50fGJvb2xlYW4pJyxcbiAgYm91bmRhcnk6ICcoc3RyaW5nfGVsZW1lbnQpJyxcbiAgc2FuaXRpemU6ICdib29sZWFuJyxcbiAgc2FuaXRpemVGbjogJyhudWxsfGZ1bmN0aW9uKScsXG4gIHdoaXRlTGlzdDogJ29iamVjdCcsXG4gIHBvcHBlckNvbmZpZzogJyhudWxsfG9iamVjdCknXG59O1xudmFyIEF0dGFjaG1lbnRNYXAgPSB7XG4gIEFVVE86ICdhdXRvJyxcbiAgVE9QOiAndG9wJyxcbiAgUklHSFQ6ICdyaWdodCcsXG4gIEJPVFRPTTogJ2JvdHRvbScsXG4gIExFRlQ6ICdsZWZ0J1xufTtcbnZhciBEZWZhdWx0JDYgPSB7XG4gIGFuaW1hdGlvbjogdHJ1ZSxcbiAgdGVtcGxhdGU6ICc8ZGl2IGNsYXNzPVwidG9vbHRpcFwiIHJvbGU9XCJ0b29sdGlwXCI+JyArICc8ZGl2IGNsYXNzPVwidG9vbHRpcC1hcnJvd1wiPjwvZGl2PicgKyAnPGRpdiBjbGFzcz1cInRvb2x0aXAtaW5uZXJcIj48L2Rpdj48L2Rpdj4nLFxuICB0cmlnZ2VyOiAnaG92ZXIgZm9jdXMnLFxuICB0aXRsZTogJycsXG4gIGRlbGF5OiAwLFxuICBodG1sOiBmYWxzZSxcbiAgc2VsZWN0b3I6IGZhbHNlLFxuICBwbGFjZW1lbnQ6ICd0b3AnLFxuICBvZmZzZXQ6IDAsXG4gIGNvbnRhaW5lcjogZmFsc2UsXG4gIGJvdW5kYXJ5OiAnc2Nyb2xsUGFyZW50JyxcbiAgc2FuaXRpemU6IHRydWUsXG4gIHNhbml0aXplRm46IG51bGwsXG4gIHdoaXRlTGlzdDogRGVmYXVsdFdoaXRlbGlzdCxcbiAgcG9wcGVyQ29uZmlnOiBudWxsXG59O1xudmFyIEV2ZW50JDEgPSB7XG4gIEhJREU6IFwiaGlkZVwiICsgRVZFTlRfS0VZJDgsXG4gIEhJRERFTjogXCJoaWRkZW5cIiArIEVWRU5UX0tFWSQ4LFxuICBTSE9XOiBcInNob3dcIiArIEVWRU5UX0tFWSQ4LFxuICBTSE9XTjogXCJzaG93blwiICsgRVZFTlRfS0VZJDgsXG4gIElOU0VSVEVEOiBcImluc2VydGVkXCIgKyBFVkVOVF9LRVkkOCxcbiAgQ0xJQ0s6IFwiY2xpY2tcIiArIEVWRU5UX0tFWSQ4LFxuICBGT0NVU0lOOiBcImZvY3VzaW5cIiArIEVWRU5UX0tFWSQ4LFxuICBGT0NVU09VVDogXCJmb2N1c291dFwiICsgRVZFTlRfS0VZJDgsXG4gIE1PVVNFRU5URVI6IFwibW91c2VlbnRlclwiICsgRVZFTlRfS0VZJDgsXG4gIE1PVVNFTEVBVkU6IFwibW91c2VsZWF2ZVwiICsgRVZFTlRfS0VZJDhcbn07XG52YXIgQ0xBU1NfTkFNRV9GQURFJDEgPSAnZmFkZSc7XG52YXIgQ0xBU1NfTkFNRV9NT0RBTCA9ICdtb2RhbCc7XG52YXIgQ0xBU1NfTkFNRV9TSE9XJDQgPSAnc2hvdyc7XG52YXIgSE9WRVJfU1RBVEVfU0hPVyA9ICdzaG93JztcbnZhciBIT1ZFUl9TVEFURV9PVVQgPSAnb3V0JztcbnZhciBTRUxFQ1RPUl9UT09MVElQX0lOTkVSID0gJy50b29sdGlwLWlubmVyJztcbnZhciBUUklHR0VSX0hPVkVSID0gJ2hvdmVyJztcbnZhciBUUklHR0VSX0ZPQ1VTID0gJ2ZvY3VzJztcbnZhciBUUklHR0VSX0NMSUNLID0gJ2NsaWNrJztcbnZhciBUUklHR0VSX01BTlVBTCA9ICdtYW51YWwnO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENsYXNzIERlZmluaXRpb25cbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cbnZhciBUb29sdGlwID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gVG9vbHRpcChlbGVtZW50LCBjb25maWcpIHtcbiAgICBpZiAodHlwZW9mIGNyZWF0ZVBvcHBlciA9PT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgIHRocm93IG5ldyBUeXBlRXJyb3IoJ0NvcmVVSVxcJ3MgdG9vbHRpcHMgcmVxdWlyZSBQb3BwZXIuanMgKGh0dHBzOi8vcG9wcGVyLmpzLm9yZyknKTtcbiAgICB9IC8vIHByaXZhdGVcblxuXG4gICAgdGhpcy5faXNFbmFibGVkID0gdHJ1ZTtcbiAgICB0aGlzLl90aW1lb3V0ID0gMDtcbiAgICB0aGlzLl9ob3ZlclN0YXRlID0gJyc7XG4gICAgdGhpcy5fYWN0aXZlVHJpZ2dlciA9IHt9O1xuICAgIHRoaXMuX3BvcHBlciA9IG51bGw7IC8vIFByb3RlY3RlZFxuXG4gICAgdGhpcy5lbGVtZW50ID0gZWxlbWVudDtcbiAgICB0aGlzLmNvbmZpZyA9IHRoaXMuX2dldENvbmZpZyhjb25maWcpO1xuICAgIHRoaXMudGlwID0gbnVsbDtcblxuICAgIHRoaXMuX3NldExpc3RlbmVycygpO1xuXG4gICAgRGF0YS5zZXREYXRhKGVsZW1lbnQsIHRoaXMuY29uc3RydWN0b3IuREFUQV9LRVksIHRoaXMpO1xuICB9IC8vIEdldHRlcnNcblxuXG4gIHZhciBfcHJvdG8gPSBUb29sdGlwLnByb3RvdHlwZTtcblxuICAvLyBQdWJsaWNcbiAgX3Byb3RvLmVuYWJsZSA9IGZ1bmN0aW9uIGVuYWJsZSgpIHtcbiAgICB0aGlzLl9pc0VuYWJsZWQgPSB0cnVlO1xuICB9O1xuXG4gIF9wcm90by5kaXNhYmxlID0gZnVuY3Rpb24gZGlzYWJsZSgpIHtcbiAgICB0aGlzLl9pc0VuYWJsZWQgPSBmYWxzZTtcbiAgfTtcblxuICBfcHJvdG8udG9nZ2xlRW5hYmxlZCA9IGZ1bmN0aW9uIHRvZ2dsZUVuYWJsZWQoKSB7XG4gICAgdGhpcy5faXNFbmFibGVkID0gIXRoaXMuX2lzRW5hYmxlZDtcbiAgfTtcblxuICBfcHJvdG8udG9nZ2xlID0gZnVuY3Rpb24gdG9nZ2xlKGV2ZW50KSB7XG4gICAgaWYgKCF0aGlzLl9pc0VuYWJsZWQpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAoZXZlbnQpIHtcbiAgICAgIHZhciBkYXRhS2V5ID0gdGhpcy5jb25zdHJ1Y3Rvci5EQVRBX0tFWTtcbiAgICAgIHZhciBjb250ZXh0ID0gRGF0YS5nZXREYXRhKGV2ZW50LnRhcmdldCwgZGF0YUtleSk7XG5cbiAgICAgIGlmICghY29udGV4dCkge1xuICAgICAgICBjb250ZXh0ID0gbmV3IHRoaXMuY29uc3RydWN0b3IoZXZlbnQudGFyZ2V0LCB0aGlzLl9nZXREZWxlZ2F0ZUNvbmZpZygpKTtcbiAgICAgICAgRGF0YS5zZXREYXRhKGV2ZW50LnRhcmdldCwgZGF0YUtleSwgY29udGV4dCk7XG4gICAgICB9XG5cbiAgICAgIGNvbnRleHQuX2FjdGl2ZVRyaWdnZXIuY2xpY2sgPSAhY29udGV4dC5fYWN0aXZlVHJpZ2dlci5jbGljaztcblxuICAgICAgaWYgKGNvbnRleHQuX2lzV2l0aEFjdGl2ZVRyaWdnZXIoKSkge1xuICAgICAgICBjb250ZXh0Ll9lbnRlcihudWxsLCBjb250ZXh0KTtcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIGNvbnRleHQuX2xlYXZlKG51bGwsIGNvbnRleHQpO1xuICAgICAgfVxuICAgIH0gZWxzZSB7XG4gICAgICBpZiAodGhpcy5nZXRUaXBFbGVtZW50KCkuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0hPVyQ0KSkge1xuICAgICAgICB0aGlzLl9sZWF2ZShudWxsLCB0aGlzKTtcblxuICAgICAgICByZXR1cm47XG4gICAgICB9XG5cbiAgICAgIHRoaXMuX2VudGVyKG51bGwsIHRoaXMpO1xuICAgIH1cbiAgfTtcblxuICBfcHJvdG8uZGlzcG9zZSA9IGZ1bmN0aW9uIGRpc3Bvc2UoKSB7XG4gICAgY2xlYXJUaW1lb3V0KHRoaXMuX3RpbWVvdXQpO1xuICAgIERhdGEucmVtb3ZlRGF0YSh0aGlzLmVsZW1lbnQsIHRoaXMuY29uc3RydWN0b3IuREFUQV9LRVkpO1xuICAgIEV2ZW50SGFuZGxlci5vZmYodGhpcy5lbGVtZW50LCB0aGlzLmNvbnN0cnVjdG9yLkVWRU5UX0tFWSk7XG4gICAgRXZlbnRIYW5kbGVyLm9mZih0aGlzLmVsZW1lbnQuY2xvc2VzdChcIi5cIiArIENMQVNTX05BTUVfTU9EQUwpLCAnaGlkZS5jb3JldWkubW9kYWwnLCB0aGlzLl9oaWRlTW9kYWxIYW5kbGVyKTtcblxuICAgIGlmICh0aGlzLnRpcCkge1xuICAgICAgdGhpcy50aXAucGFyZW50Tm9kZS5yZW1vdmVDaGlsZCh0aGlzLnRpcCk7XG4gICAgfVxuXG4gICAgdGhpcy5faXNFbmFibGVkID0gbnVsbDtcbiAgICB0aGlzLl90aW1lb3V0ID0gbnVsbDtcbiAgICB0aGlzLl9ob3ZlclN0YXRlID0gbnVsbDtcbiAgICB0aGlzLl9hY3RpdmVUcmlnZ2VyID0gbnVsbDtcblxuICAgIGlmICh0aGlzLl9wb3BwZXIpIHtcbiAgICAgIHRoaXMuX3BvcHBlci5kZXN0cm95KCk7XG4gICAgfVxuXG4gICAgdGhpcy5fcG9wcGVyID0gbnVsbDtcbiAgICB0aGlzLmVsZW1lbnQgPSBudWxsO1xuICAgIHRoaXMuY29uZmlnID0gbnVsbDtcbiAgICB0aGlzLnRpcCA9IG51bGw7XG4gIH07XG5cbiAgX3Byb3RvLnNob3cgPSBmdW5jdGlvbiBzaG93KCkge1xuICAgIHZhciBfdGhpcyA9IHRoaXM7XG5cbiAgICBpZiAodGhpcy5lbGVtZW50LnN0eWxlLmRpc3BsYXkgPT09ICdub25lJykge1xuICAgICAgdGhyb3cgbmV3IEVycm9yKCdQbGVhc2UgdXNlIHNob3cgb24gdmlzaWJsZSBlbGVtZW50cycpO1xuICAgIH1cblxuICAgIGlmICh0aGlzLmlzV2l0aENvbnRlbnQoKSAmJiB0aGlzLl9pc0VuYWJsZWQpIHtcbiAgICAgIHZhciBzaG93RXZlbnQgPSBFdmVudEhhbmRsZXIudHJpZ2dlcih0aGlzLmVsZW1lbnQsIHRoaXMuY29uc3RydWN0b3IuRXZlbnQuU0hPVyk7XG4gICAgICB2YXIgc2hhZG93Um9vdCA9IGZpbmRTaGFkb3dSb290KHRoaXMuZWxlbWVudCk7XG4gICAgICB2YXIgaXNJblRoZURvbSA9IHNoYWRvd1Jvb3QgPT09IG51bGwgPyB0aGlzLmVsZW1lbnQub3duZXJEb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuY29udGFpbnModGhpcy5lbGVtZW50KSA6IHNoYWRvd1Jvb3QuY29udGFpbnModGhpcy5lbGVtZW50KTtcblxuICAgICAgaWYgKHNob3dFdmVudC5kZWZhdWx0UHJldmVudGVkIHx8ICFpc0luVGhlRG9tKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgdmFyIHRpcCA9IHRoaXMuZ2V0VGlwRWxlbWVudCgpO1xuICAgICAgdmFyIHRpcElkID0gZ2V0VUlEKHRoaXMuY29uc3RydWN0b3IuTkFNRSk7XG4gICAgICB0aXAuc2V0QXR0cmlidXRlKCdpZCcsIHRpcElkKTtcbiAgICAgIHRoaXMuZWxlbWVudC5zZXRBdHRyaWJ1dGUoJ2FyaWEtZGVzY3JpYmVkYnknLCB0aXBJZCk7XG4gICAgICB0aGlzLnNldENvbnRlbnQoKTtcblxuICAgICAgaWYgKHRoaXMuY29uZmlnLmFuaW1hdGlvbikge1xuICAgICAgICB0aXAuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0ZBREUkMSk7XG4gICAgICB9XG5cbiAgICAgIHZhciBwbGFjZW1lbnQgPSB0eXBlb2YgdGhpcy5jb25maWcucGxhY2VtZW50ID09PSAnZnVuY3Rpb24nID8gdGhpcy5jb25maWcucGxhY2VtZW50LmNhbGwodGhpcywgdGlwLCB0aGlzLmVsZW1lbnQpIDogdGhpcy5jb25maWcucGxhY2VtZW50O1xuXG4gICAgICB2YXIgYXR0YWNobWVudCA9IHRoaXMuX2dldEF0dGFjaG1lbnQocGxhY2VtZW50KTsgLy8gdGhpcy5fYWRkQXR0YWNobWVudENsYXNzKGF0dGFjaG1lbnQpXG5cblxuICAgICAgdmFyIGNvbnRhaW5lciA9IHRoaXMuX2dldENvbnRhaW5lcigpO1xuXG4gICAgICBEYXRhLnNldERhdGEodGlwLCB0aGlzLmNvbnN0cnVjdG9yLkRBVEFfS0VZLCB0aGlzKTtcblxuICAgICAgaWYgKCF0aGlzLmVsZW1lbnQub3duZXJEb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuY29udGFpbnModGhpcy50aXApKSB7XG4gICAgICAgIGNvbnRhaW5lci5hcHBlbmRDaGlsZCh0aXApO1xuICAgICAgfVxuXG4gICAgICBFdmVudEhhbmRsZXIudHJpZ2dlcih0aGlzLmVsZW1lbnQsIHRoaXMuY29uc3RydWN0b3IuRXZlbnQuSU5TRVJURUQpO1xuICAgICAgdGhpcy5fcG9wcGVyID0gY3JlYXRlUG9wcGVyKHRoaXMuZWxlbWVudCwgdGlwLCB0aGlzLl9nZXRQb3BwZXJDb25maWcoYXR0YWNobWVudCkpO1xuICAgICAgdGlwLmNsYXNzTGlzdC5hZGQoQ0xBU1NfTkFNRV9TSE9XJDQpOyAvLyBJZiB0aGlzIGlzIGEgdG91Y2gtZW5hYmxlZCBkZXZpY2Ugd2UgYWRkIGV4dHJhXG4gICAgICAvLyBlbXB0eSBtb3VzZW92ZXIgbGlzdGVuZXJzIHRvIHRoZSBib2R5J3MgaW1tZWRpYXRlIGNoaWxkcmVuO1xuICAgICAgLy8gb25seSBuZWVkZWQgYmVjYXVzZSBvZiBicm9rZW4gZXZlbnQgZGVsZWdhdGlvbiBvbiBpT1NcbiAgICAgIC8vIGh0dHBzOi8vd3d3LnF1aXJrc21vZGUub3JnL2Jsb2cvYXJjaGl2ZXMvMjAxNC8wMi9tb3VzZV9ldmVudF9idWIuaHRtbFxuXG4gICAgICBpZiAoJ29udG91Y2hzdGFydCcgaW4gZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50KSB7XG4gICAgICAgIHZhciBfcmVmO1xuXG4gICAgICAgIChfcmVmID0gW10pLmNvbmNhdC5hcHBseShfcmVmLCBkb2N1bWVudC5ib2R5LmNoaWxkcmVuKS5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtZW50KSB7XG4gICAgICAgICAgRXZlbnRIYW5kbGVyLm9uKGVsZW1lbnQsICdtb3VzZW92ZXInLCBub29wKCkpO1xuICAgICAgICB9KTtcbiAgICAgIH1cblxuICAgICAgdmFyIGNvbXBsZXRlID0gZnVuY3Rpb24gY29tcGxldGUoKSB7XG4gICAgICAgIGlmIChfdGhpcy5jb25maWcuYW5pbWF0aW9uKSB7XG4gICAgICAgICAgX3RoaXMuX2ZpeFRyYW5zaXRpb24oKTtcbiAgICAgICAgfVxuXG4gICAgICAgIHZhciBwcmV2SG92ZXJTdGF0ZSA9IF90aGlzLl9ob3ZlclN0YXRlO1xuICAgICAgICBfdGhpcy5faG92ZXJTdGF0ZSA9IG51bGw7XG4gICAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKF90aGlzLmVsZW1lbnQsIF90aGlzLmNvbnN0cnVjdG9yLkV2ZW50LlNIT1dOKTtcblxuICAgICAgICBpZiAocHJldkhvdmVyU3RhdGUgPT09IEhPVkVSX1NUQVRFX09VVCkge1xuICAgICAgICAgIF90aGlzLl9sZWF2ZShudWxsLCBfdGhpcyk7XG4gICAgICAgIH1cbiAgICAgIH07XG5cbiAgICAgIGlmICh0aGlzLnRpcC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9GQURFJDEpKSB7XG4gICAgICAgIHZhciB0cmFuc2l0aW9uRHVyYXRpb24gPSBnZXRUcmFuc2l0aW9uRHVyYXRpb25Gcm9tRWxlbWVudCh0aGlzLnRpcCk7XG4gICAgICAgIEV2ZW50SGFuZGxlci5vbmUodGhpcy50aXAsIFRSQU5TSVRJT05fRU5ELCBjb21wbGV0ZSk7XG4gICAgICAgIGVtdWxhdGVUcmFuc2l0aW9uRW5kKHRoaXMudGlwLCB0cmFuc2l0aW9uRHVyYXRpb24pO1xuICAgICAgfSBlbHNlIHtcbiAgICAgICAgY29tcGxldGUoKTtcbiAgICAgIH1cbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLmhpZGUgPSBmdW5jdGlvbiBoaWRlKCkge1xuICAgIHZhciBfdGhpczIgPSB0aGlzO1xuXG4gICAgdmFyIHRpcCA9IHRoaXMuZ2V0VGlwRWxlbWVudCgpO1xuXG4gICAgdmFyIGNvbXBsZXRlID0gZnVuY3Rpb24gY29tcGxldGUoKSB7XG4gICAgICBpZiAoX3RoaXMyLl9ob3ZlclN0YXRlICE9PSBIT1ZFUl9TVEFURV9TSE9XICYmIHRpcC5wYXJlbnROb2RlKSB7XG4gICAgICAgIHRpcC5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHRpcCk7XG4gICAgICB9XG5cbiAgICAgIF90aGlzMi5fY2xlYW5UaXBDbGFzcygpO1xuXG4gICAgICBfdGhpczIuZWxlbWVudC5yZW1vdmVBdHRyaWJ1dGUoJ2FyaWEtZGVzY3JpYmVkYnknKTtcblxuICAgICAgRXZlbnRIYW5kbGVyLnRyaWdnZXIoX3RoaXMyLmVsZW1lbnQsIF90aGlzMi5jb25zdHJ1Y3Rvci5FdmVudC5ISURERU4pO1xuXG4gICAgICBfdGhpczIuX3BvcHBlci5kZXN0cm95KCk7XG4gICAgfTtcblxuICAgIHZhciBoaWRlRXZlbnQgPSBFdmVudEhhbmRsZXIudHJpZ2dlcih0aGlzLmVsZW1lbnQsIHRoaXMuY29uc3RydWN0b3IuRXZlbnQuSElERSk7XG5cbiAgICBpZiAoaGlkZUV2ZW50LmRlZmF1bHRQcmV2ZW50ZWQpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB0aXAuY2xhc3NMaXN0LnJlbW92ZShDTEFTU19OQU1FX1NIT1ckNCk7IC8vIElmIHRoaXMgaXMgYSB0b3VjaC1lbmFibGVkIGRldmljZSB3ZSByZW1vdmUgdGhlIGV4dHJhXG4gICAgLy8gZW1wdHkgbW91c2VvdmVyIGxpc3RlbmVycyB3ZSBhZGRlZCBmb3IgaU9TIHN1cHBvcnRcblxuICAgIGlmICgnb250b3VjaHN0YXJ0JyBpbiBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQpIHtcbiAgICAgIHZhciBfcmVmMjtcblxuICAgICAgKF9yZWYyID0gW10pLmNvbmNhdC5hcHBseShfcmVmMiwgZG9jdW1lbnQuYm9keS5jaGlsZHJlbikuZm9yRWFjaChmdW5jdGlvbiAoZWxlbWVudCkge1xuICAgICAgICByZXR1cm4gRXZlbnRIYW5kbGVyLm9mZihlbGVtZW50LCAnbW91c2VvdmVyJywgbm9vcCk7XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICB0aGlzLl9hY3RpdmVUcmlnZ2VyW1RSSUdHRVJfQ0xJQ0tdID0gZmFsc2U7XG4gICAgdGhpcy5fYWN0aXZlVHJpZ2dlcltUUklHR0VSX0ZPQ1VTXSA9IGZhbHNlO1xuICAgIHRoaXMuX2FjdGl2ZVRyaWdnZXJbVFJJR0dFUl9IT1ZFUl0gPSBmYWxzZTtcblxuICAgIGlmICh0aGlzLnRpcC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9GQURFJDEpKSB7XG4gICAgICB2YXIgdHJhbnNpdGlvbkR1cmF0aW9uID0gZ2V0VHJhbnNpdGlvbkR1cmF0aW9uRnJvbUVsZW1lbnQodGlwKTtcbiAgICAgIEV2ZW50SGFuZGxlci5vbmUodGlwLCBUUkFOU0lUSU9OX0VORCwgY29tcGxldGUpO1xuICAgICAgZW11bGF0ZVRyYW5zaXRpb25FbmQodGlwLCB0cmFuc2l0aW9uRHVyYXRpb24pO1xuICAgIH0gZWxzZSB7XG4gICAgICBjb21wbGV0ZSgpO1xuICAgIH1cblxuICAgIHRoaXMuX2hvdmVyU3RhdGUgPSAnJztcbiAgfTtcblxuICBfcHJvdG8udXBkYXRlID0gZnVuY3Rpb24gdXBkYXRlKCkge1xuICAgIGlmICh0aGlzLl9wb3BwZXIgIT09IG51bGwpIHtcbiAgICAgIHRoaXMuX3BvcHBlci5zY2hlZHVsZVVwZGF0ZSgpO1xuICAgIH1cbiAgfSAvLyBQcm90ZWN0ZWRcbiAgO1xuXG4gIF9wcm90by5pc1dpdGhDb250ZW50ID0gZnVuY3Rpb24gaXNXaXRoQ29udGVudCgpIHtcbiAgICByZXR1cm4gQm9vbGVhbih0aGlzLmdldFRpdGxlKCkpO1xuICB9O1xuXG4gIF9wcm90by5nZXRUaXBFbGVtZW50ID0gZnVuY3Rpb24gZ2V0VGlwRWxlbWVudCgpIHtcbiAgICBpZiAodGhpcy50aXApIHtcbiAgICAgIHJldHVybiB0aGlzLnRpcDtcbiAgICB9XG5cbiAgICB2YXIgZWxlbWVudCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpO1xuICAgIGVsZW1lbnQuaW5uZXJIVE1MID0gdGhpcy5jb25maWcudGVtcGxhdGU7XG4gICAgdGhpcy50aXAgPSBlbGVtZW50LmNoaWxkcmVuWzBdO1xuICAgIHJldHVybiB0aGlzLnRpcDtcbiAgfTtcblxuICBfcHJvdG8uc2V0Q29udGVudCA9IGZ1bmN0aW9uIHNldENvbnRlbnQoKSB7XG4gICAgdmFyIHRpcCA9IHRoaXMuZ2V0VGlwRWxlbWVudCgpO1xuICAgIHRoaXMuc2V0RWxlbWVudENvbnRlbnQoU2VsZWN0b3JFbmdpbmUuZmluZE9uZShTRUxFQ1RPUl9UT09MVElQX0lOTkVSLCB0aXApLCB0aGlzLmdldFRpdGxlKCkpO1xuICAgIHRpcC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTX05BTUVfRkFERSQxLCBDTEFTU19OQU1FX1NIT1ckNCk7XG4gIH07XG5cbiAgX3Byb3RvLnNldEVsZW1lbnRDb250ZW50ID0gZnVuY3Rpb24gc2V0RWxlbWVudENvbnRlbnQoZWxlbWVudCwgY29udGVudCkge1xuICAgIGlmIChlbGVtZW50ID09PSBudWxsKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgaWYgKHR5cGVvZiBjb250ZW50ID09PSAnb2JqZWN0JyAmJiBpc0VsZW1lbnQoY29udGVudCkpIHtcbiAgICAgIGlmIChjb250ZW50LmpxdWVyeSkge1xuICAgICAgICBjb250ZW50ID0gY29udGVudFswXTtcbiAgICAgIH0gLy8gY29udGVudCBpcyBhIERPTSBub2RlIG9yIGEgalF1ZXJ5XG5cblxuICAgICAgaWYgKHRoaXMuY29uZmlnLmh0bWwpIHtcbiAgICAgICAgaWYgKGNvbnRlbnQucGFyZW50Tm9kZSAhPT0gZWxlbWVudCkge1xuICAgICAgICAgIGVsZW1lbnQuaW5uZXJIVE1MID0gJyc7XG4gICAgICAgICAgZWxlbWVudC5hcHBlbmRDaGlsZChjb250ZW50KTtcbiAgICAgICAgfVxuICAgICAgfSBlbHNlIHtcbiAgICAgICAgZWxlbWVudC50ZXh0Q29udGVudCA9IGNvbnRlbnQudGV4dENvbnRlbnQ7XG4gICAgICB9XG5cbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAodGhpcy5jb25maWcuaHRtbCkge1xuICAgICAgaWYgKHRoaXMuY29uZmlnLnNhbml0aXplKSB7XG4gICAgICAgIGNvbnRlbnQgPSBzYW5pdGl6ZUh0bWwoY29udGVudCwgdGhpcy5jb25maWcud2hpdGVMaXN0LCB0aGlzLmNvbmZpZy5zYW5pdGl6ZUZuKTtcbiAgICAgIH1cblxuICAgICAgZWxlbWVudC5pbm5lckhUTUwgPSBjb250ZW50O1xuICAgIH0gZWxzZSB7XG4gICAgICBlbGVtZW50LnRleHRDb250ZW50ID0gY29udGVudDtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLmdldFRpdGxlID0gZnVuY3Rpb24gZ2V0VGl0bGUoKSB7XG4gICAgdmFyIHRpdGxlID0gdGhpcy5lbGVtZW50LmdldEF0dHJpYnV0ZSgnZGF0YS1vcmlnaW5hbC10aXRsZScpO1xuXG4gICAgaWYgKCF0aXRsZSkge1xuICAgICAgdGl0bGUgPSB0eXBlb2YgdGhpcy5jb25maWcudGl0bGUgPT09ICdmdW5jdGlvbicgPyB0aGlzLmNvbmZpZy50aXRsZS5jYWxsKHRoaXMuZWxlbWVudCkgOiB0aGlzLmNvbmZpZy50aXRsZTtcbiAgICB9XG5cbiAgICByZXR1cm4gdGl0bGU7XG4gIH0gLy8gUHJpdmF0ZVxuICA7XG5cbiAgX3Byb3RvLl9nZXRQb3BwZXJDb25maWcgPSBmdW5jdGlvbiBfZ2V0UG9wcGVyQ29uZmlnKGF0dGFjaG1lbnQpIHtcbiAgICB2YXIgX3RoaXMzID0gdGhpcztcblxuICAgIHZhciBkZWZhdWx0QnNDb25maWcgPSB7XG4gICAgICBwbGFjZW1lbnQ6IGF0dGFjaG1lbnQsXG4gICAgICBtb2RpZmllcnM6IFt7XG4gICAgICAgIG5hbWU6ICdvZmZzZXQnLFxuICAgICAgICBvcHRpb25zOiB7XG4gICAgICAgICAgb2Zmc2V0OiB0aGlzLl9nZXRPZmZzZXQoKVxuICAgICAgICB9XG4gICAgICB9LCB7XG4gICAgICAgIG5hbWU6ICdhcnJvdycsXG4gICAgICAgIG9wdGlvbnM6IHtcbiAgICAgICAgICBlbGVtZW50OiBcIi5cIiArIHRoaXMuY29uc3RydWN0b3IuTkFNRSArIFwiLWFycm93XCJcbiAgICAgICAgfVxuICAgICAgfSwge1xuICAgICAgICBuYW1lOiAncHJldmVudE92ZXJmbG93JyxcbiAgICAgICAgb3B0aW9uczoge1xuICAgICAgICAgIGJvdW5kYXJ5OiB0aGlzLmNvbmZpZy5ib3VuZGFyeVxuICAgICAgICB9XG4gICAgICB9XSxcbiAgICAgIG9uRmlyc3RVcGRhdGU6IGZ1bmN0aW9uIG9uRmlyc3RVcGRhdGUoZGF0YSkge1xuICAgICAgICBpZiAoZGF0YS5vcmlnaW5hbFBsYWNlbWVudCAhPT0gZGF0YS5wbGFjZW1lbnQpIHtcbiAgICAgICAgICAvLyB0aGlzLl9oYW5kbGVQb3BwZXJQbGFjZW1lbnRDaGFuZ2UoZGF0YSlcbiAgICAgICAgICAvLyBmaXggUG9wcGVyIHBvc2l0aW9uIGlzc3VlXG4gICAgICAgICAgLy9UT0RPOiBmaW5kIHdoZXJlIGlzIHRoZSBwcm9ibGVtIG9yIGZpbmQgYmV0dGVyIHNvbHV0aW9uXG4gICAgICAgICAgX3RoaXMzLl9wb3BwZXIudXBkYXRlKCk7XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9O1xuICAgIHJldHVybiBfb2JqZWN0U3ByZWFkMihfb2JqZWN0U3ByZWFkMih7fSwgZGVmYXVsdEJzQ29uZmlnKSwgdGhpcy5jb25maWcucG9wcGVyQ29uZmlnKTtcbiAgfSAvLyBfYWRkQXR0YWNobWVudENsYXNzKGF0dGFjaG1lbnQpIHtcbiAgLy8gICB0aGlzLmdldFRpcEVsZW1lbnQoKS5jbGFzc0xpc3QuYWRkKGAke0NMQVNTX1BSRUZJWH0tJHthdHRhY2htZW50fWApXG4gIC8vIH1cbiAgO1xuXG4gIF9wcm90by5fZ2V0T2Zmc2V0ID0gZnVuY3Rpb24gX2dldE9mZnNldCgpIHtcbiAgICB2YXIgX3RoaXM0ID0gdGhpcztcblxuICAgIHZhciBvZmZzZXQgPSB7fTtcblxuICAgIGlmICh0eXBlb2YgdGhpcy5jb25maWcub2Zmc2V0ID09PSAnZnVuY3Rpb24nKSB7XG4gICAgICBvZmZzZXQuZm4gPSBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICBkYXRhLm9mZnNldHMgPSBfb2JqZWN0U3ByZWFkMihfb2JqZWN0U3ByZWFkMih7fSwgZGF0YS5vZmZzZXRzKSwgX3RoaXM0LmNvbmZpZy5vZmZzZXQoZGF0YS5vZmZzZXRzLCBfdGhpczQuZWxlbWVudCkgfHwge30pO1xuICAgICAgICByZXR1cm4gZGF0YTtcbiAgICAgIH07XG4gICAgfSBlbHNlIHtcbiAgICAgIG9mZnNldC5vZmZzZXQgPSB0aGlzLmNvbmZpZy5vZmZzZXQ7XG4gICAgfVxuXG4gICAgcmV0dXJuIG9mZnNldDtcbiAgfTtcblxuICBfcHJvdG8uX2dldENvbnRhaW5lciA9IGZ1bmN0aW9uIF9nZXRDb250YWluZXIoKSB7XG4gICAgaWYgKHRoaXMuY29uZmlnLmNvbnRhaW5lciA9PT0gZmFsc2UpIHtcbiAgICAgIHJldHVybiBkb2N1bWVudC5ib2R5O1xuICAgIH1cblxuICAgIGlmIChpc0VsZW1lbnQodGhpcy5jb25maWcuY29udGFpbmVyKSkge1xuICAgICAgcmV0dXJuIHRoaXMuY29uZmlnLmNvbnRhaW5lcjtcbiAgICB9XG5cbiAgICByZXR1cm4gU2VsZWN0b3JFbmdpbmUuZmluZE9uZSh0aGlzLmNvbmZpZy5jb250YWluZXIpO1xuICB9O1xuXG4gIF9wcm90by5fZ2V0QXR0YWNobWVudCA9IGZ1bmN0aW9uIF9nZXRBdHRhY2htZW50KHBsYWNlbWVudCkge1xuICAgIHJldHVybiBBdHRhY2htZW50TWFwW3BsYWNlbWVudC50b1VwcGVyQ2FzZSgpXTtcbiAgfTtcblxuICBfcHJvdG8uX3NldExpc3RlbmVycyA9IGZ1bmN0aW9uIF9zZXRMaXN0ZW5lcnMoKSB7XG4gICAgdmFyIF90aGlzNSA9IHRoaXM7XG5cbiAgICB2YXIgdHJpZ2dlcnMgPSB0aGlzLmNvbmZpZy50cmlnZ2VyLnNwbGl0KCcgJyk7XG4gICAgdHJpZ2dlcnMuZm9yRWFjaChmdW5jdGlvbiAodHJpZ2dlcikge1xuICAgICAgaWYgKHRyaWdnZXIgPT09ICdjbGljaycpIHtcbiAgICAgICAgRXZlbnRIYW5kbGVyLm9uKF90aGlzNS5lbGVtZW50LCBfdGhpczUuY29uc3RydWN0b3IuRXZlbnQuQ0xJQ0ssIF90aGlzNS5jb25maWcuc2VsZWN0b3IsIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICAgIHJldHVybiBfdGhpczUudG9nZ2xlKGV2ZW50KTtcbiAgICAgICAgfSk7XG4gICAgICB9IGVsc2UgaWYgKHRyaWdnZXIgIT09IFRSSUdHRVJfTUFOVUFMKSB7XG4gICAgICAgIHZhciBldmVudEluID0gdHJpZ2dlciA9PT0gVFJJR0dFUl9IT1ZFUiA/IF90aGlzNS5jb25zdHJ1Y3Rvci5FdmVudC5NT1VTRUVOVEVSIDogX3RoaXM1LmNvbnN0cnVjdG9yLkV2ZW50LkZPQ1VTSU47XG4gICAgICAgIHZhciBldmVudE91dCA9IHRyaWdnZXIgPT09IFRSSUdHRVJfSE9WRVIgPyBfdGhpczUuY29uc3RydWN0b3IuRXZlbnQuTU9VU0VMRUFWRSA6IF90aGlzNS5jb25zdHJ1Y3Rvci5FdmVudC5GT0NVU09VVDtcbiAgICAgICAgRXZlbnRIYW5kbGVyLm9uKF90aGlzNS5lbGVtZW50LCBldmVudEluLCBfdGhpczUuY29uZmlnLnNlbGVjdG9yLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgICByZXR1cm4gX3RoaXM1Ll9lbnRlcihldmVudCk7XG4gICAgICAgIH0pO1xuICAgICAgICBFdmVudEhhbmRsZXIub24oX3RoaXM1LmVsZW1lbnQsIGV2ZW50T3V0LCBfdGhpczUuY29uZmlnLnNlbGVjdG9yLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgICByZXR1cm4gX3RoaXM1Ll9sZWF2ZShldmVudCk7XG4gICAgICAgIH0pO1xuICAgICAgfVxuICAgIH0pO1xuXG4gICAgdGhpcy5faGlkZU1vZGFsSGFuZGxlciA9IGZ1bmN0aW9uICgpIHtcbiAgICAgIGlmIChfdGhpczUuZWxlbWVudCkge1xuICAgICAgICBfdGhpczUuaGlkZSgpO1xuICAgICAgfVxuICAgIH07XG5cbiAgICBFdmVudEhhbmRsZXIub24odGhpcy5lbGVtZW50LmNsb3Nlc3QoXCIuXCIgKyBDTEFTU19OQU1FX01PREFMKSwgJ2hpZGUuY29yZXVpLm1vZGFsJywgdGhpcy5faGlkZU1vZGFsSGFuZGxlcik7XG5cbiAgICBpZiAodGhpcy5jb25maWcuc2VsZWN0b3IpIHtcbiAgICAgIHRoaXMuY29uZmlnID0gX29iamVjdFNwcmVhZDIoX29iamVjdFNwcmVhZDIoe30sIHRoaXMuY29uZmlnKSwge30sIHtcbiAgICAgICAgdHJpZ2dlcjogJ21hbnVhbCcsXG4gICAgICAgIHNlbGVjdG9yOiAnJ1xuICAgICAgfSk7XG4gICAgfSBlbHNlIHtcbiAgICAgIHRoaXMuX2ZpeFRpdGxlKCk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5fZml4VGl0bGUgPSBmdW5jdGlvbiBfZml4VGl0bGUoKSB7XG4gICAgdmFyIHRpdGxlVHlwZSA9IHR5cGVvZiB0aGlzLmVsZW1lbnQuZ2V0QXR0cmlidXRlKCdkYXRhLW9yaWdpbmFsLXRpdGxlJyk7XG5cbiAgICBpZiAodGhpcy5lbGVtZW50LmdldEF0dHJpYnV0ZSgndGl0bGUnKSB8fCB0aXRsZVR5cGUgIT09ICdzdHJpbmcnKSB7XG4gICAgICB0aGlzLmVsZW1lbnQuc2V0QXR0cmlidXRlKCdkYXRhLW9yaWdpbmFsLXRpdGxlJywgdGhpcy5lbGVtZW50LmdldEF0dHJpYnV0ZSgndGl0bGUnKSB8fCAnJyk7XG4gICAgICB0aGlzLmVsZW1lbnQuc2V0QXR0cmlidXRlKCd0aXRsZScsICcnKTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLl9lbnRlciA9IGZ1bmN0aW9uIF9lbnRlcihldmVudCwgY29udGV4dCkge1xuICAgIHZhciBkYXRhS2V5ID0gdGhpcy5jb25zdHJ1Y3Rvci5EQVRBX0tFWTtcbiAgICBjb250ZXh0ID0gY29udGV4dCB8fCBEYXRhLmdldERhdGEoZXZlbnQudGFyZ2V0LCBkYXRhS2V5KTtcblxuICAgIGlmICghY29udGV4dCkge1xuICAgICAgY29udGV4dCA9IG5ldyB0aGlzLmNvbnN0cnVjdG9yKGV2ZW50LnRhcmdldCwgdGhpcy5fZ2V0RGVsZWdhdGVDb25maWcoKSk7XG4gICAgICBEYXRhLnNldERhdGEoZXZlbnQudGFyZ2V0LCBkYXRhS2V5LCBjb250ZXh0KTtcbiAgICB9XG5cbiAgICBpZiAoZXZlbnQpIHtcbiAgICAgIGNvbnRleHQuX2FjdGl2ZVRyaWdnZXJbZXZlbnQudHlwZSA9PT0gJ2ZvY3VzaW4nID8gVFJJR0dFUl9GT0NVUyA6IFRSSUdHRVJfSE9WRVJdID0gdHJ1ZTtcbiAgICB9XG5cbiAgICBpZiAoY29udGV4dC5nZXRUaXBFbGVtZW50KCkuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0hPVyQ0KSB8fCBjb250ZXh0Ll9ob3ZlclN0YXRlID09PSBIT1ZFUl9TVEFURV9TSE9XKSB7XG4gICAgICBjb250ZXh0Ll9ob3ZlclN0YXRlID0gSE9WRVJfU1RBVEVfU0hPVztcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBjbGVhclRpbWVvdXQoY29udGV4dC5fdGltZW91dCk7XG4gICAgY29udGV4dC5faG92ZXJTdGF0ZSA9IEhPVkVSX1NUQVRFX1NIT1c7XG5cbiAgICBpZiAoIWNvbnRleHQuY29uZmlnLmRlbGF5IHx8ICFjb250ZXh0LmNvbmZpZy5kZWxheS5zaG93KSB7XG4gICAgICBjb250ZXh0LnNob3coKTtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBjb250ZXh0Ll90aW1lb3V0ID0gc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICBpZiAoY29udGV4dC5faG92ZXJTdGF0ZSA9PT0gSE9WRVJfU1RBVEVfU0hPVykge1xuICAgICAgICBjb250ZXh0LnNob3coKTtcbiAgICAgIH1cbiAgICB9LCBjb250ZXh0LmNvbmZpZy5kZWxheS5zaG93KTtcbiAgfTtcblxuICBfcHJvdG8uX2xlYXZlID0gZnVuY3Rpb24gX2xlYXZlKGV2ZW50LCBjb250ZXh0KSB7XG4gICAgdmFyIGRhdGFLZXkgPSB0aGlzLmNvbnN0cnVjdG9yLkRBVEFfS0VZO1xuICAgIGNvbnRleHQgPSBjb250ZXh0IHx8IERhdGEuZ2V0RGF0YShldmVudC50YXJnZXQsIGRhdGFLZXkpO1xuXG4gICAgaWYgKCFjb250ZXh0KSB7XG4gICAgICBjb250ZXh0ID0gbmV3IHRoaXMuY29uc3RydWN0b3IoZXZlbnQudGFyZ2V0LCB0aGlzLl9nZXREZWxlZ2F0ZUNvbmZpZygpKTtcbiAgICAgIERhdGEuc2V0RGF0YShldmVudC50YXJnZXQsIGRhdGFLZXksIGNvbnRleHQpO1xuICAgIH1cblxuICAgIGlmIChldmVudCkge1xuICAgICAgY29udGV4dC5fYWN0aXZlVHJpZ2dlcltldmVudC50eXBlID09PSAnZm9jdXNvdXQnID8gVFJJR0dFUl9GT0NVUyA6IFRSSUdHRVJfSE9WRVJdID0gZmFsc2U7XG4gICAgfVxuXG4gICAgaWYgKGNvbnRleHQuX2lzV2l0aEFjdGl2ZVRyaWdnZXIoKSkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIGNsZWFyVGltZW91dChjb250ZXh0Ll90aW1lb3V0KTtcbiAgICBjb250ZXh0Ll9ob3ZlclN0YXRlID0gSE9WRVJfU1RBVEVfT1VUO1xuXG4gICAgaWYgKCFjb250ZXh0LmNvbmZpZy5kZWxheSB8fCAhY29udGV4dC5jb25maWcuZGVsYXkuaGlkZSkge1xuICAgICAgY29udGV4dC5oaWRlKCk7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgY29udGV4dC5fdGltZW91dCA9IHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgaWYgKGNvbnRleHQuX2hvdmVyU3RhdGUgPT09IEhPVkVSX1NUQVRFX09VVCkge1xuICAgICAgICBjb250ZXh0LmhpZGUoKTtcbiAgICAgIH1cbiAgICB9LCBjb250ZXh0LmNvbmZpZy5kZWxheS5oaWRlKTtcbiAgfTtcblxuICBfcHJvdG8uX2lzV2l0aEFjdGl2ZVRyaWdnZXIgPSBmdW5jdGlvbiBfaXNXaXRoQWN0aXZlVHJpZ2dlcigpIHtcbiAgICBmb3IgKHZhciB0cmlnZ2VyIGluIHRoaXMuX2FjdGl2ZVRyaWdnZXIpIHtcbiAgICAgIGlmICh0aGlzLl9hY3RpdmVUcmlnZ2VyW3RyaWdnZXJdKSB7XG4gICAgICAgIHJldHVybiB0cnVlO1xuICAgICAgfVxuICAgIH1cblxuICAgIHJldHVybiBmYWxzZTtcbiAgfTtcblxuICBfcHJvdG8uX2dldENvbmZpZyA9IGZ1bmN0aW9uIF9nZXRDb25maWcoY29uZmlnKSB7XG4gICAgdmFyIGRhdGFBdHRyaWJ1dGVzID0gTWFuaXB1bGF0b3IuZ2V0RGF0YUF0dHJpYnV0ZXModGhpcy5lbGVtZW50KTtcbiAgICBPYmplY3Qua2V5cyhkYXRhQXR0cmlidXRlcykuZm9yRWFjaChmdW5jdGlvbiAoZGF0YUF0dHIpIHtcbiAgICAgIGlmIChESVNBTExPV0VEX0FUVFJJQlVURVMuaW5kZXhPZihkYXRhQXR0cikgIT09IC0xKSB7XG4gICAgICAgIGRlbGV0ZSBkYXRhQXR0cmlidXRlc1tkYXRhQXR0cl07XG4gICAgICB9XG4gICAgfSk7XG5cbiAgICBpZiAoY29uZmlnICYmIHR5cGVvZiBjb25maWcuY29udGFpbmVyID09PSAnb2JqZWN0JyAmJiBjb25maWcuY29udGFpbmVyLmpxdWVyeSkge1xuICAgICAgY29uZmlnLmNvbnRhaW5lciA9IGNvbmZpZy5jb250YWluZXJbMF07XG4gICAgfVxuXG4gICAgY29uZmlnID0gX29iamVjdFNwcmVhZDIoX29iamVjdFNwcmVhZDIoX29iamVjdFNwcmVhZDIoe30sIHRoaXMuY29uc3RydWN0b3IuRGVmYXVsdCksIGRhdGFBdHRyaWJ1dGVzKSwgdHlwZW9mIGNvbmZpZyA9PT0gJ29iamVjdCcgJiYgY29uZmlnID8gY29uZmlnIDoge30pO1xuXG4gICAgaWYgKHR5cGVvZiBjb25maWcuZGVsYXkgPT09ICdudW1iZXInKSB7XG4gICAgICBjb25maWcuZGVsYXkgPSB7XG4gICAgICAgIHNob3c6IGNvbmZpZy5kZWxheSxcbiAgICAgICAgaGlkZTogY29uZmlnLmRlbGF5XG4gICAgICB9O1xuICAgIH1cblxuICAgIGlmICh0eXBlb2YgY29uZmlnLnRpdGxlID09PSAnbnVtYmVyJykge1xuICAgICAgY29uZmlnLnRpdGxlID0gY29uZmlnLnRpdGxlLnRvU3RyaW5nKCk7XG4gICAgfVxuXG4gICAgaWYgKHR5cGVvZiBjb25maWcuY29udGVudCA9PT0gJ251bWJlcicpIHtcbiAgICAgIGNvbmZpZy5jb250ZW50ID0gY29uZmlnLmNvbnRlbnQudG9TdHJpbmcoKTtcbiAgICB9XG5cbiAgICB0eXBlQ2hlY2tDb25maWcoTkFNRSQ4LCBjb25maWcsIHRoaXMuY29uc3RydWN0b3IuRGVmYXVsdFR5cGUpO1xuXG4gICAgaWYgKGNvbmZpZy5zYW5pdGl6ZSkge1xuICAgICAgY29uZmlnLnRlbXBsYXRlID0gc2FuaXRpemVIdG1sKGNvbmZpZy50ZW1wbGF0ZSwgY29uZmlnLndoaXRlTGlzdCwgY29uZmlnLnNhbml0aXplRm4pO1xuICAgIH1cblxuICAgIHJldHVybiBjb25maWc7XG4gIH07XG5cbiAgX3Byb3RvLl9nZXREZWxlZ2F0ZUNvbmZpZyA9IGZ1bmN0aW9uIF9nZXREZWxlZ2F0ZUNvbmZpZygpIHtcbiAgICB2YXIgY29uZmlnID0ge307XG5cbiAgICBpZiAodGhpcy5jb25maWcpIHtcbiAgICAgIGZvciAodmFyIGtleSBpbiB0aGlzLmNvbmZpZykge1xuICAgICAgICBpZiAodGhpcy5jb25zdHJ1Y3Rvci5EZWZhdWx0W2tleV0gIT09IHRoaXMuY29uZmlnW2tleV0pIHtcbiAgICAgICAgICBjb25maWdba2V5XSA9IHRoaXMuY29uZmlnW2tleV07XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9XG5cbiAgICByZXR1cm4gY29uZmlnO1xuICB9O1xuXG4gIF9wcm90by5fY2xlYW5UaXBDbGFzcyA9IGZ1bmN0aW9uIF9jbGVhblRpcENsYXNzKCkge1xuICAgIHZhciB0aXAgPSB0aGlzLmdldFRpcEVsZW1lbnQoKTtcbiAgICBjb25zb2xlLmxvZyh0aGlzLnRpcCk7XG4gICAgdmFyIHRhYkNsYXNzID0gdGlwLmdldEF0dHJpYnV0ZSgnY2xhc3MnKS5tYXRjaChCU0NMU19QUkVGSVhfUkVHRVgpO1xuXG4gICAgaWYgKHRhYkNsYXNzICE9PSBudWxsICYmIHRhYkNsYXNzLmxlbmd0aCA+IDApIHtcbiAgICAgIHRhYkNsYXNzLm1hcChmdW5jdGlvbiAodG9rZW4pIHtcbiAgICAgICAgcmV0dXJuIHRva2VuLnRyaW0oKTtcbiAgICAgIH0pLmZvckVhY2goZnVuY3Rpb24gKHRDbGFzcykge1xuICAgICAgICByZXR1cm4gdGlwLmNsYXNzTGlzdC5yZW1vdmUodENsYXNzKTtcbiAgICAgIH0pO1xuICAgIH1cbiAgfSAvLyBfaGFuZGxlUG9wcGVyUGxhY2VtZW50Q2hhbmdlKHBvcHBlckRhdGEpIHtcbiAgLy8gICBjb25zb2xlLmxvZyhwb3BwZXJEYXRhKVxuICAvLyAgIGNvbnN0IHBvcHBlckluc3RhbmNlID0gcG9wcGVyRGF0YS5lbGVtZW50cy5wb3BwZXJcbiAgLy8gICB0aGlzLnRpcCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHBvcHBlckluc3RhbmNlLmdldEF0dHJpYnV0ZSgnaWQnKSlcbiAgLy8gICBjb25zb2xlLmxvZyh0aGlzLnRpcClcbiAgLy8gICB0aGlzLl9jbGVhblRpcENsYXNzKClcbiAgLy8gICB0aGlzLl9hZGRBdHRhY2htZW50Q2xhc3ModGhpcy5fZ2V0QXR0YWNobWVudChwb3BwZXJEYXRhLnBsYWNlbWVudCkpXG4gIC8vIH1cbiAgO1xuXG4gIF9wcm90by5fZml4VHJhbnNpdGlvbiA9IGZ1bmN0aW9uIF9maXhUcmFuc2l0aW9uKCkge1xuICAgIHZhciB0aXAgPSB0aGlzLmdldFRpcEVsZW1lbnQoKTtcbiAgICB2YXIgaW5pdENvbmZpZ0FuaW1hdGlvbiA9IHRoaXMuY29uZmlnLmFuaW1hdGlvbjtcblxuICAgIGlmICh0aXAuZ2V0QXR0cmlidXRlKCdkYXRhLXBvcHBlci1wbGFjZW1lbnQnKSAhPT0gbnVsbCkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHRpcC5jbGFzc0xpc3QucmVtb3ZlKENMQVNTX05BTUVfRkFERSQxKTtcbiAgICB0aGlzLmNvbmZpZy5hbmltYXRpb24gPSBmYWxzZTtcbiAgICB0aGlzLmhpZGUoKTtcbiAgICB0aGlzLnNob3coKTtcbiAgICB0aGlzLmNvbmZpZy5hbmltYXRpb24gPSBpbml0Q29uZmlnQW5pbWF0aW9uO1xuICB9IC8vIFN0YXRpY1xuICAvLyBTdGF0aWNcbiAgO1xuXG4gIFRvb2x0aXAualF1ZXJ5SW50ZXJmYWNlID0gZnVuY3Rpb24galF1ZXJ5SW50ZXJmYWNlKGNvbmZpZykge1xuICAgIHJldHVybiB0aGlzLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgdmFyIGRhdGEgPSBEYXRhLmdldERhdGEodGhpcywgREFUQV9LRVkkOCk7XG5cbiAgICAgIHZhciBfY29uZmlnID0gdHlwZW9mIGNvbmZpZyA9PT0gJ29iamVjdCcgJiYgY29uZmlnO1xuXG4gICAgICBpZiAoIWRhdGEgJiYgL2Rpc3Bvc2V8aGlkZS8udGVzdChjb25maWcpKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgaWYgKCFkYXRhKSB7XG4gICAgICAgIGRhdGEgPSBuZXcgVG9vbHRpcCh0aGlzLCBfY29uZmlnKTtcbiAgICAgIH1cblxuICAgICAgaWYgKHR5cGVvZiBjb25maWcgPT09ICdzdHJpbmcnKSB7XG4gICAgICAgIGlmICh0eXBlb2YgZGF0YVtjb25maWddID09PSAndW5kZWZpbmVkJykge1xuICAgICAgICAgIHRocm93IG5ldyBUeXBlRXJyb3IoXCJObyBtZXRob2QgbmFtZWQgXFxcIlwiICsgY29uZmlnICsgXCJcXFwiXCIpO1xuICAgICAgICB9XG5cbiAgICAgICAgZGF0YVtjb25maWddKCk7XG4gICAgICB9XG4gICAgfSk7XG4gIH07XG5cbiAgVG9vbHRpcC5nZXRJbnN0YW5jZSA9IGZ1bmN0aW9uIGdldEluc3RhbmNlKGVsZW1lbnQpIHtcbiAgICByZXR1cm4gRGF0YS5nZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJDgpO1xuICB9O1xuXG4gIF9jcmVhdGVDbGFzcyhUb29sdGlwLCBudWxsLCBbe1xuICAgIGtleTogXCJWRVJTSU9OXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gVkVSU0lPTiQ4O1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJEZWZhdWx0XCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRGVmYXVsdCQ2O1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJOQU1FXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gTkFNRSQ4O1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJEQVRBX0tFWVwiLFxuICAgIGdldDogZnVuY3Rpb24gZ2V0KCkge1xuICAgICAgcmV0dXJuIERBVEFfS0VZJDg7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIkV2ZW50XCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRXZlbnQkMTtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiRVZFTlRfS0VZXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRVZFTlRfS0VZJDg7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIkRlZmF1bHRUeXBlXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRGVmYXVsdFR5cGUkNDtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gVG9vbHRpcDtcbn0oKTtcblxudmFyICQkOSA9IGdldGpRdWVyeSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIGpRdWVyeVxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBhZGQgLnRvb2x0aXAgdG8galF1ZXJ5IG9ubHkgaWYgalF1ZXJ5IGlzIHByZXNlbnRcbiAqL1xuXG4vKiBpc3RhbmJ1bCBpZ25vcmUgaWYgKi9cblxuaWYgKCQkOSkge1xuICB2YXIgSlFVRVJZX05PX0NPTkZMSUNUJDggPSAkJDkuZm5bTkFNRSQ4XTtcbiAgJCQ5LmZuW05BTUUkOF0gPSBUb29sdGlwLmpRdWVyeUludGVyZmFjZTtcbiAgJCQ5LmZuW05BTUUkOF0uQ29uc3RydWN0b3IgPSBUb29sdGlwO1xuXG4gICQkOS5mbltOQU1FJDhdLm5vQ29uZmxpY3QgPSBmdW5jdGlvbiAoKSB7XG4gICAgJCQ5LmZuW05BTUUkOF0gPSBKUVVFUllfTk9fQ09ORkxJQ1QkODtcbiAgICByZXR1cm4gVG9vbHRpcC5qUXVlcnlJbnRlcmZhY2U7XG4gIH07XG59XG5cbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDb25zdGFudHNcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cbnZhciBOQU1FJDkgPSAncG9wb3Zlcic7XG52YXIgVkVSU0lPTiQ5ID0gJzMuMi4wJztcbnZhciBEQVRBX0tFWSQ5ID0gJ2NvcmV1aS5wb3BvdmVyJztcbnZhciBFVkVOVF9LRVkkOSA9IFwiLlwiICsgREFUQV9LRVkkOTtcbnZhciBDTEFTU19QUkVGSVgkMSA9ICdicy1wb3BvdmVyJztcbnZhciBCU0NMU19QUkVGSVhfUkVHRVgkMSA9IG5ldyBSZWdFeHAoXCIoXnxcXFxccylcIiArIENMQVNTX1BSRUZJWCQxICsgXCJcXFxcUytcIiwgJ2cnKTtcblxudmFyIERlZmF1bHQkNyA9IF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCBUb29sdGlwLkRlZmF1bHQpLCB7fSwge1xuICBwbGFjZW1lbnQ6ICdyaWdodCcsXG4gIHRyaWdnZXI6ICdjbGljaycsXG4gIGNvbnRlbnQ6ICcnLFxuICB0ZW1wbGF0ZTogJzxkaXYgY2xhc3M9XCJwb3BvdmVyXCIgcm9sZT1cInRvb2x0aXBcIj4nICsgJzxkaXYgY2xhc3M9XCJwb3BvdmVyLWFycm93XCI+PC9kaXY+JyArICc8aDMgY2xhc3M9XCJwb3BvdmVyLWhlYWRlclwiPjwvaDM+JyArICc8ZGl2IGNsYXNzPVwicG9wb3Zlci1ib2R5XCI+PC9kaXY+PC9kaXY+J1xufSk7XG5cbnZhciBEZWZhdWx0VHlwZSQ1ID0gX29iamVjdFNwcmVhZDIoX29iamVjdFNwcmVhZDIoe30sIFRvb2x0aXAuRGVmYXVsdFR5cGUpLCB7fSwge1xuICBjb250ZW50OiAnKHN0cmluZ3xlbGVtZW50fGZ1bmN0aW9uKSdcbn0pO1xuXG52YXIgRXZlbnQkMiA9IHtcbiAgSElERTogXCJoaWRlXCIgKyBFVkVOVF9LRVkkOSxcbiAgSElEREVOOiBcImhpZGRlblwiICsgRVZFTlRfS0VZJDksXG4gIFNIT1c6IFwic2hvd1wiICsgRVZFTlRfS0VZJDksXG4gIFNIT1dOOiBcInNob3duXCIgKyBFVkVOVF9LRVkkOSxcbiAgSU5TRVJURUQ6IFwiaW5zZXJ0ZWRcIiArIEVWRU5UX0tFWSQ5LFxuICBDTElDSzogXCJjbGlja1wiICsgRVZFTlRfS0VZJDksXG4gIEZPQ1VTSU46IFwiZm9jdXNpblwiICsgRVZFTlRfS0VZJDksXG4gIEZPQ1VTT1VUOiBcImZvY3Vzb3V0XCIgKyBFVkVOVF9LRVkkOSxcbiAgTU9VU0VFTlRFUjogXCJtb3VzZWVudGVyXCIgKyBFVkVOVF9LRVkkOSxcbiAgTU9VU0VMRUFWRTogXCJtb3VzZWxlYXZlXCIgKyBFVkVOVF9LRVkkOVxufTtcbnZhciBDTEFTU19OQU1FX0ZBREUkMiA9ICdmYWRlJztcbnZhciBDTEFTU19OQU1FX1NIT1ckNSA9ICdzaG93JztcbnZhciBTRUxFQ1RPUl9USVRMRSA9ICcucG9wb3Zlci1oZWFkZXInO1xudmFyIFNFTEVDVE9SX0NPTlRFTlQgPSAnLnBvcG92ZXItYm9keSc7XG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ2xhc3MgRGVmaW5pdGlvblxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIFBvcG92ZXIgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKF9Ub29sdGlwKSB7XG4gIF9pbmhlcml0c0xvb3NlKFBvcG92ZXIsIF9Ub29sdGlwKTtcblxuICBmdW5jdGlvbiBQb3BvdmVyKCkge1xuICAgIHJldHVybiBfVG9vbHRpcC5hcHBseSh0aGlzLCBhcmd1bWVudHMpIHx8IHRoaXM7XG4gIH1cblxuICB2YXIgX3Byb3RvID0gUG9wb3Zlci5wcm90b3R5cGU7XG5cbiAgLy8gT3ZlcnJpZGVzXG4gIF9wcm90by5pc1dpdGhDb250ZW50ID0gZnVuY3Rpb24gaXNXaXRoQ29udGVudCgpIHtcbiAgICByZXR1cm4gdGhpcy5nZXRUaXRsZSgpIHx8IHRoaXMuX2dldENvbnRlbnQoKTtcbiAgfTtcblxuICBfcHJvdG8uc2V0Q29udGVudCA9IGZ1bmN0aW9uIHNldENvbnRlbnQoKSB7XG4gICAgdmFyIHRpcCA9IHRoaXMuZ2V0VGlwRWxlbWVudCgpOyAvLyB3ZSB1c2UgYXBwZW5kIGZvciBodG1sIG9iamVjdHMgdG8gbWFpbnRhaW4ganMgZXZlbnRzXG5cbiAgICB0aGlzLnNldEVsZW1lbnRDb250ZW50KFNlbGVjdG9yRW5naW5lLmZpbmRPbmUoU0VMRUNUT1JfVElUTEUsIHRpcCksIHRoaXMuZ2V0VGl0bGUoKSk7XG5cbiAgICB2YXIgY29udGVudCA9IHRoaXMuX2dldENvbnRlbnQoKTtcblxuICAgIGlmICh0eXBlb2YgY29udGVudCA9PT0gJ2Z1bmN0aW9uJykge1xuICAgICAgY29udGVudCA9IGNvbnRlbnQuY2FsbCh0aGlzLmVsZW1lbnQpO1xuICAgIH1cblxuICAgIHRoaXMuc2V0RWxlbWVudENvbnRlbnQoU2VsZWN0b3JFbmdpbmUuZmluZE9uZShTRUxFQ1RPUl9DT05URU5ULCB0aXApLCBjb250ZW50KTtcbiAgICB0aXAuY2xhc3NMaXN0LnJlbW92ZShDTEFTU19OQU1FX0ZBREUkMiwgQ0xBU1NfTkFNRV9TSE9XJDUpO1xuICB9O1xuXG4gIF9wcm90by5fYWRkQXR0YWNobWVudENsYXNzID0gZnVuY3Rpb24gX2FkZEF0dGFjaG1lbnRDbGFzcyhhdHRhY2htZW50KSB7XG4gICAgdGhpcy5nZXRUaXBFbGVtZW50KCkuY2xhc3NMaXN0LmFkZChDTEFTU19QUkVGSVgkMSArIFwiLVwiICsgYXR0YWNobWVudCk7XG4gIH0gLy8gUHJpdmF0ZVxuICA7XG5cbiAgX3Byb3RvLl9nZXRDb250ZW50ID0gZnVuY3Rpb24gX2dldENvbnRlbnQoKSB7XG4gICAgcmV0dXJuIHRoaXMuZWxlbWVudC5nZXRBdHRyaWJ1dGUoJ2RhdGEtY29udGVudCcpIHx8IHRoaXMuY29uZmlnLmNvbnRlbnQ7XG4gIH07XG5cbiAgX3Byb3RvLl9jbGVhblRpcENsYXNzID0gZnVuY3Rpb24gX2NsZWFuVGlwQ2xhc3MoKSB7XG4gICAgdmFyIHRpcCA9IHRoaXMuZ2V0VGlwRWxlbWVudCgpO1xuICAgIHZhciB0YWJDbGFzcyA9IHRpcC5nZXRBdHRyaWJ1dGUoJ2NsYXNzJykubWF0Y2goQlNDTFNfUFJFRklYX1JFR0VYJDEpO1xuXG4gICAgaWYgKHRhYkNsYXNzICE9PSBudWxsICYmIHRhYkNsYXNzLmxlbmd0aCA+IDApIHtcbiAgICAgIHRhYkNsYXNzLm1hcChmdW5jdGlvbiAodG9rZW4pIHtcbiAgICAgICAgcmV0dXJuIHRva2VuLnRyaW0oKTtcbiAgICAgIH0pLmZvckVhY2goZnVuY3Rpb24gKHRDbGFzcykge1xuICAgICAgICByZXR1cm4gdGlwLmNsYXNzTGlzdC5yZW1vdmUodENsYXNzKTtcbiAgICAgIH0pO1xuICAgIH1cbiAgfSAvLyBTdGF0aWNcbiAgO1xuXG4gIFBvcG92ZXIualF1ZXJ5SW50ZXJmYWNlID0gZnVuY3Rpb24galF1ZXJ5SW50ZXJmYWNlKGNvbmZpZykge1xuICAgIHJldHVybiB0aGlzLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgdmFyIGRhdGEgPSBEYXRhLmdldERhdGEodGhpcywgREFUQV9LRVkkOSk7XG5cbiAgICAgIHZhciBfY29uZmlnID0gdHlwZW9mIGNvbmZpZyA9PT0gJ29iamVjdCcgPyBjb25maWcgOiBudWxsO1xuXG4gICAgICBpZiAoIWRhdGEgJiYgL2Rpc3Bvc2V8aGlkZS8udGVzdChjb25maWcpKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgaWYgKCFkYXRhKSB7XG4gICAgICAgIGRhdGEgPSBuZXcgUG9wb3Zlcih0aGlzLCBfY29uZmlnKTtcbiAgICAgICAgRGF0YS5zZXREYXRhKHRoaXMsIERBVEFfS0VZJDksIGRhdGEpO1xuICAgICAgfVxuXG4gICAgICBpZiAodHlwZW9mIGNvbmZpZyA9PT0gJ3N0cmluZycpIHtcbiAgICAgICAgaWYgKHR5cGVvZiBkYXRhW2NvbmZpZ10gPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgICAgdGhyb3cgbmV3IFR5cGVFcnJvcihcIk5vIG1ldGhvZCBuYW1lZCBcXFwiXCIgKyBjb25maWcgKyBcIlxcXCJcIik7XG4gICAgICAgIH1cblxuICAgICAgICBkYXRhW2NvbmZpZ10oKTtcbiAgICAgIH1cbiAgICB9KTtcbiAgfTtcblxuICBQb3BvdmVyLmdldEluc3RhbmNlID0gZnVuY3Rpb24gZ2V0SW5zdGFuY2UoZWxlbWVudCkge1xuICAgIHJldHVybiBEYXRhLmdldERhdGEoZWxlbWVudCwgREFUQV9LRVkkOSk7XG4gIH07XG5cbiAgX2NyZWF0ZUNsYXNzKFBvcG92ZXIsIG51bGwsIFt7XG4gICAga2V5OiBcIlZFUlNJT05cIixcbiAgICAvLyBHZXR0ZXJzXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gVkVSU0lPTiQ5O1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJEZWZhdWx0XCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRGVmYXVsdCQ3O1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJOQU1FXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gTkFNRSQ5O1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJEQVRBX0tFWVwiLFxuICAgIGdldDogZnVuY3Rpb24gZ2V0KCkge1xuICAgICAgcmV0dXJuIERBVEFfS0VZJDk7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIkV2ZW50XCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRXZlbnQkMjtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiRVZFTlRfS0VZXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRVZFTlRfS0VZJDk7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIkRlZmF1bHRUeXBlXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRGVmYXVsdFR5cGUkNTtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gUG9wb3Zlcjtcbn0oVG9vbHRpcCk7XG5cbnZhciAkJGEgPSBnZXRqUXVlcnkoKTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBqUXVlcnlcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cbi8qIGlzdGFuYnVsIGlnbm9yZSBpZiAqL1xuXG5pZiAoJCRhKSB7XG4gIHZhciBKUVVFUllfTk9fQ09ORkxJQ1QkOSA9ICQkYS5mbltOQU1FJDldO1xuICAkJGEuZm5bTkFNRSQ5XSA9IFBvcG92ZXIualF1ZXJ5SW50ZXJmYWNlO1xuICAkJGEuZm5bTkFNRSQ5XS5Db25zdHJ1Y3RvciA9IFBvcG92ZXI7XG5cbiAgJCRhLmZuW05BTUUkOV0ubm9Db25mbGljdCA9IGZ1bmN0aW9uICgpIHtcbiAgICAkJGEuZm5bTkFNRSQ5XSA9IEpRVUVSWV9OT19DT05GTElDVCQ5O1xuICAgIHJldHVybiBQb3BvdmVyLmpRdWVyeUludGVyZmFjZTtcbiAgfTtcbn1cblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENvbnN0YW50c1xuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIE5BTUUkYSA9ICdzY3JvbGxzcHknO1xudmFyIFZFUlNJT04kYSA9ICczLjIuMCc7XG52YXIgREFUQV9LRVkkYSA9ICdjb3JldWkuc2Nyb2xsc3B5JztcbnZhciBFVkVOVF9LRVkkYSA9IFwiLlwiICsgREFUQV9LRVkkYTtcbnZhciBEQVRBX0FQSV9LRVkkOCA9ICcuZGF0YS1hcGknO1xudmFyIERlZmF1bHQkOCA9IHtcbiAgb2Zmc2V0OiAxMCxcbiAgbWV0aG9kOiAnYXV0bycsXG4gIHRhcmdldDogJydcbn07XG52YXIgRGVmYXVsdFR5cGUkNiA9IHtcbiAgb2Zmc2V0OiAnbnVtYmVyJyxcbiAgbWV0aG9kOiAnc3RyaW5nJyxcbiAgdGFyZ2V0OiAnKHN0cmluZ3xlbGVtZW50KSdcbn07XG52YXIgRVZFTlRfQUNUSVZBVEUgPSBcImFjdGl2YXRlXCIgKyBFVkVOVF9LRVkkYTtcbnZhciBFVkVOVF9TQ1JPTEwgPSBcInNjcm9sbFwiICsgRVZFTlRfS0VZJGE7XG52YXIgRVZFTlRfTE9BRF9EQVRBX0FQSSQxID0gXCJsb2FkXCIgKyBFVkVOVF9LRVkkYSArIERBVEFfQVBJX0tFWSQ4O1xudmFyIENMQVNTX05BTUVfRFJPUERPV05fSVRFTSA9ICdkcm9wZG93bi1pdGVtJztcbnZhciBDTEFTU19OQU1FX0FDVElWRSQzID0gJ2FjdGl2ZSc7XG52YXIgU0VMRUNUT1JfREFUQV9TUFkgPSAnW2RhdGEtc3B5PVwic2Nyb2xsXCJdJztcbnZhciBTRUxFQ1RPUl9OQVZfTElTVF9HUk9VUCA9ICcubmF2LCAubGlzdC1ncm91cCc7XG52YXIgU0VMRUNUT1JfTkFWX0xJTktTID0gJy5uYXYtbGluayc7XG52YXIgU0VMRUNUT1JfTkFWX0lURU1TID0gJy5uYXYtaXRlbSc7XG52YXIgU0VMRUNUT1JfTElTVF9JVEVNUyA9ICcubGlzdC1ncm91cC1pdGVtJztcbnZhciBTRUxFQ1RPUl9EUk9QRE9XTiA9ICcuZHJvcGRvd24nO1xudmFyIFNFTEVDVE9SX0RST1BET1dOX1RPR0dMRSA9ICcuZHJvcGRvd24tdG9nZ2xlJztcbnZhciBNRVRIT0RfT0ZGU0VUID0gJ29mZnNldCc7XG52YXIgTUVUSE9EX1BPU0lUSU9OID0gJ3Bvc2l0aW9uJztcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDbGFzcyBEZWZpbml0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgU2Nyb2xsU3B5ID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gU2Nyb2xsU3B5KGVsZW1lbnQsIGNvbmZpZykge1xuICAgIHZhciBfdGhpcyA9IHRoaXM7XG5cbiAgICB0aGlzLl9lbGVtZW50ID0gZWxlbWVudDtcbiAgICB0aGlzLl9zY3JvbGxFbGVtZW50ID0gZWxlbWVudC50YWdOYW1lID09PSAnQk9EWScgPyB3aW5kb3cgOiBlbGVtZW50O1xuICAgIHRoaXMuX2NvbmZpZyA9IHRoaXMuX2dldENvbmZpZyhjb25maWcpO1xuICAgIHRoaXMuX3NlbGVjdG9yID0gdGhpcy5fY29uZmlnLnRhcmdldCArIFwiIFwiICsgU0VMRUNUT1JfTkFWX0xJTktTICsgXCIsXCIgKyAodGhpcy5fY29uZmlnLnRhcmdldCArIFwiIFwiICsgU0VMRUNUT1JfTElTVF9JVEVNUyArIFwiLFwiKSArICh0aGlzLl9jb25maWcudGFyZ2V0ICsgXCIgLlwiICsgQ0xBU1NfTkFNRV9EUk9QRE9XTl9JVEVNKTtcbiAgICB0aGlzLl9vZmZzZXRzID0gW107XG4gICAgdGhpcy5fdGFyZ2V0cyA9IFtdO1xuICAgIHRoaXMuX2FjdGl2ZVRhcmdldCA9IG51bGw7XG4gICAgdGhpcy5fc2Nyb2xsSGVpZ2h0ID0gMDtcbiAgICBFdmVudEhhbmRsZXIub24odGhpcy5fc2Nyb2xsRWxlbWVudCwgRVZFTlRfU0NST0xMLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgIHJldHVybiBfdGhpcy5fcHJvY2VzcyhldmVudCk7XG4gICAgfSk7XG4gICAgdGhpcy5yZWZyZXNoKCk7XG5cbiAgICB0aGlzLl9wcm9jZXNzKCk7XG5cbiAgICBEYXRhLnNldERhdGEoZWxlbWVudCwgREFUQV9LRVkkYSwgdGhpcyk7XG4gIH0gLy8gR2V0dGVyc1xuXG5cbiAgdmFyIF9wcm90byA9IFNjcm9sbFNweS5wcm90b3R5cGU7XG5cbiAgLy8gUHVibGljXG4gIF9wcm90by5yZWZyZXNoID0gZnVuY3Rpb24gcmVmcmVzaCgpIHtcbiAgICB2YXIgX3RoaXMyID0gdGhpcztcblxuICAgIHZhciBhdXRvTWV0aG9kID0gdGhpcy5fc2Nyb2xsRWxlbWVudCA9PT0gdGhpcy5fc2Nyb2xsRWxlbWVudC53aW5kb3cgPyBNRVRIT0RfT0ZGU0VUIDogTUVUSE9EX1BPU0lUSU9OO1xuICAgIHZhciBvZmZzZXRNZXRob2QgPSB0aGlzLl9jb25maWcubWV0aG9kID09PSAnYXV0bycgPyBhdXRvTWV0aG9kIDogdGhpcy5fY29uZmlnLm1ldGhvZDtcbiAgICB2YXIgb2Zmc2V0QmFzZSA9IG9mZnNldE1ldGhvZCA9PT0gTUVUSE9EX1BPU0lUSU9OID8gdGhpcy5fZ2V0U2Nyb2xsVG9wKCkgOiAwO1xuICAgIHRoaXMuX29mZnNldHMgPSBbXTtcbiAgICB0aGlzLl90YXJnZXRzID0gW107XG4gICAgdGhpcy5fc2Nyb2xsSGVpZ2h0ID0gdGhpcy5fZ2V0U2Nyb2xsSGVpZ2h0KCk7XG4gICAgdmFyIHRhcmdldHMgPSBTZWxlY3RvckVuZ2luZS5maW5kKHRoaXMuX3NlbGVjdG9yKTtcbiAgICB0YXJnZXRzLm1hcChmdW5jdGlvbiAoZWxlbWVudCkge1xuICAgICAgdmFyIHRhcmdldDtcbiAgICAgIHZhciB0YXJnZXRTZWxlY3RvciA9IGdldFNlbGVjdG9yRnJvbUVsZW1lbnQoZWxlbWVudCk7XG5cbiAgICAgIGlmICh0YXJnZXRTZWxlY3Rvcikge1xuICAgICAgICB0YXJnZXQgPSBTZWxlY3RvckVuZ2luZS5maW5kT25lKHRhcmdldFNlbGVjdG9yKTtcbiAgICAgIH1cblxuICAgICAgaWYgKHRhcmdldCkge1xuICAgICAgICB2YXIgdGFyZ2V0QkNSID0gdGFyZ2V0LmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpO1xuXG4gICAgICAgIGlmICh0YXJnZXRCQ1Iud2lkdGggfHwgdGFyZ2V0QkNSLmhlaWdodCkge1xuICAgICAgICAgIHJldHVybiBbTWFuaXB1bGF0b3Jbb2Zmc2V0TWV0aG9kXSh0YXJnZXQpLnRvcCArIG9mZnNldEJhc2UsIHRhcmdldFNlbGVjdG9yXTtcbiAgICAgICAgfVxuICAgICAgfVxuXG4gICAgICByZXR1cm4gbnVsbDtcbiAgICB9KS5maWx0ZXIoZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgIHJldHVybiBpdGVtO1xuICAgIH0pLnNvcnQoZnVuY3Rpb24gKGEsIGIpIHtcbiAgICAgIHJldHVybiBhWzBdIC0gYlswXTtcbiAgICB9KS5mb3JFYWNoKGZ1bmN0aW9uIChpdGVtKSB7XG4gICAgICBfdGhpczIuX29mZnNldHMucHVzaChpdGVtWzBdKTtcblxuICAgICAgX3RoaXMyLl90YXJnZXRzLnB1c2goaXRlbVsxXSk7XG4gICAgfSk7XG4gIH07XG5cbiAgX3Byb3RvLmRpc3Bvc2UgPSBmdW5jdGlvbiBkaXNwb3NlKCkge1xuICAgIERhdGEucmVtb3ZlRGF0YSh0aGlzLl9lbGVtZW50LCBEQVRBX0tFWSRhKTtcbiAgICBFdmVudEhhbmRsZXIub2ZmKHRoaXMuX3Njcm9sbEVsZW1lbnQsIEVWRU5UX0tFWSRhKTtcbiAgICB0aGlzLl9lbGVtZW50ID0gbnVsbDtcbiAgICB0aGlzLl9zY3JvbGxFbGVtZW50ID0gbnVsbDtcbiAgICB0aGlzLl9jb25maWcgPSBudWxsO1xuICAgIHRoaXMuX3NlbGVjdG9yID0gbnVsbDtcbiAgICB0aGlzLl9vZmZzZXRzID0gbnVsbDtcbiAgICB0aGlzLl90YXJnZXRzID0gbnVsbDtcbiAgICB0aGlzLl9hY3RpdmVUYXJnZXQgPSBudWxsO1xuICAgIHRoaXMuX3Njcm9sbEhlaWdodCA9IG51bGw7XG4gIH0gLy8gUHJpdmF0ZVxuICA7XG5cbiAgX3Byb3RvLl9nZXRDb25maWcgPSBmdW5jdGlvbiBfZ2V0Q29uZmlnKGNvbmZpZykge1xuICAgIGNvbmZpZyA9IF9vYmplY3RTcHJlYWQyKF9vYmplY3RTcHJlYWQyKHt9LCBEZWZhdWx0JDgpLCB0eXBlb2YgY29uZmlnID09PSAnb2JqZWN0JyAmJiBjb25maWcgPyBjb25maWcgOiB7fSk7XG5cbiAgICBpZiAodHlwZW9mIGNvbmZpZy50YXJnZXQgIT09ICdzdHJpbmcnICYmIGlzRWxlbWVudChjb25maWcudGFyZ2V0KSkge1xuICAgICAgdmFyIGlkID0gY29uZmlnLnRhcmdldC5pZDtcblxuICAgICAgaWYgKCFpZCkge1xuICAgICAgICBpZCA9IGdldFVJRChOQU1FJGEpO1xuICAgICAgICBjb25maWcudGFyZ2V0LmlkID0gaWQ7XG4gICAgICB9XG5cbiAgICAgIGNvbmZpZy50YXJnZXQgPSBcIiNcIiArIGlkO1xuICAgIH1cblxuICAgIHR5cGVDaGVja0NvbmZpZyhOQU1FJGEsIGNvbmZpZywgRGVmYXVsdFR5cGUkNik7XG4gICAgcmV0dXJuIGNvbmZpZztcbiAgfTtcblxuICBfcHJvdG8uX2dldFNjcm9sbFRvcCA9IGZ1bmN0aW9uIF9nZXRTY3JvbGxUb3AoKSB7XG4gICAgcmV0dXJuIHRoaXMuX3Njcm9sbEVsZW1lbnQgPT09IHdpbmRvdyA/IHRoaXMuX3Njcm9sbEVsZW1lbnQucGFnZVlPZmZzZXQgOiB0aGlzLl9zY3JvbGxFbGVtZW50LnNjcm9sbFRvcDtcbiAgfTtcblxuICBfcHJvdG8uX2dldFNjcm9sbEhlaWdodCA9IGZ1bmN0aW9uIF9nZXRTY3JvbGxIZWlnaHQoKSB7XG4gICAgcmV0dXJuIHRoaXMuX3Njcm9sbEVsZW1lbnQuc2Nyb2xsSGVpZ2h0IHx8IE1hdGgubWF4KGRvY3VtZW50LmJvZHkuc2Nyb2xsSGVpZ2h0LCBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuc2Nyb2xsSGVpZ2h0KTtcbiAgfTtcblxuICBfcHJvdG8uX2dldE9mZnNldEhlaWdodCA9IGZ1bmN0aW9uIF9nZXRPZmZzZXRIZWlnaHQoKSB7XG4gICAgcmV0dXJuIHRoaXMuX3Njcm9sbEVsZW1lbnQgPT09IHdpbmRvdyA/IHdpbmRvdy5pbm5lckhlaWdodCA6IHRoaXMuX3Njcm9sbEVsZW1lbnQuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkuaGVpZ2h0O1xuICB9O1xuXG4gIF9wcm90by5fcHJvY2VzcyA9IGZ1bmN0aW9uIF9wcm9jZXNzKCkge1xuICAgIHZhciBzY3JvbGxUb3AgPSB0aGlzLl9nZXRTY3JvbGxUb3AoKSArIHRoaXMuX2NvbmZpZy5vZmZzZXQ7XG5cbiAgICB2YXIgc2Nyb2xsSGVpZ2h0ID0gdGhpcy5fZ2V0U2Nyb2xsSGVpZ2h0KCk7XG5cbiAgICB2YXIgbWF4U2Nyb2xsID0gdGhpcy5fY29uZmlnLm9mZnNldCArIHNjcm9sbEhlaWdodCAtIHRoaXMuX2dldE9mZnNldEhlaWdodCgpO1xuXG4gICAgaWYgKHRoaXMuX3Njcm9sbEhlaWdodCAhPT0gc2Nyb2xsSGVpZ2h0KSB7XG4gICAgICB0aGlzLnJlZnJlc2goKTtcbiAgICB9XG5cbiAgICBpZiAoc2Nyb2xsVG9wID49IG1heFNjcm9sbCkge1xuICAgICAgdmFyIHRhcmdldCA9IHRoaXMuX3RhcmdldHNbdGhpcy5fdGFyZ2V0cy5sZW5ndGggLSAxXTtcblxuICAgICAgaWYgKHRoaXMuX2FjdGl2ZVRhcmdldCAhPT0gdGFyZ2V0KSB7XG4gICAgICAgIHRoaXMuX2FjdGl2YXRlKHRhcmdldCk7XG4gICAgICB9XG5cbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAodGhpcy5fYWN0aXZlVGFyZ2V0ICYmIHNjcm9sbFRvcCA8IHRoaXMuX29mZnNldHNbMF0gJiYgdGhpcy5fb2Zmc2V0c1swXSA+IDApIHtcbiAgICAgIHRoaXMuX2FjdGl2ZVRhcmdldCA9IG51bGw7XG5cbiAgICAgIHRoaXMuX2NsZWFyKCk7XG5cbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBmb3IgKHZhciBpID0gdGhpcy5fb2Zmc2V0cy5sZW5ndGg7IGktLTspIHtcbiAgICAgIHZhciBpc0FjdGl2ZVRhcmdldCA9IHRoaXMuX2FjdGl2ZVRhcmdldCAhPT0gdGhpcy5fdGFyZ2V0c1tpXSAmJiBzY3JvbGxUb3AgPj0gdGhpcy5fb2Zmc2V0c1tpXSAmJiAodHlwZW9mIHRoaXMuX29mZnNldHNbaSArIDFdID09PSAndW5kZWZpbmVkJyB8fCBzY3JvbGxUb3AgPCB0aGlzLl9vZmZzZXRzW2kgKyAxXSk7XG5cbiAgICAgIGlmIChpc0FjdGl2ZVRhcmdldCkge1xuICAgICAgICB0aGlzLl9hY3RpdmF0ZSh0aGlzLl90YXJnZXRzW2ldKTtcbiAgICAgIH1cbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLl9hY3RpdmF0ZSA9IGZ1bmN0aW9uIF9hY3RpdmF0ZSh0YXJnZXQpIHtcbiAgICB0aGlzLl9hY3RpdmVUYXJnZXQgPSB0YXJnZXQ7XG5cbiAgICB0aGlzLl9jbGVhcigpO1xuXG4gICAgdmFyIHF1ZXJpZXMgPSB0aGlzLl9zZWxlY3Rvci5zcGxpdCgnLCcpLm1hcChmdW5jdGlvbiAoc2VsZWN0b3IpIHtcbiAgICAgIHJldHVybiBzZWxlY3RvciArIFwiW2RhdGEtdGFyZ2V0PVxcXCJcIiArIHRhcmdldCArIFwiXFxcIl0sXCIgKyBzZWxlY3RvciArIFwiW2hyZWY9XFxcIlwiICsgdGFyZ2V0ICsgXCJcXFwiXVwiO1xuICAgIH0pO1xuXG4gICAgdmFyIGxpbmsgPSBTZWxlY3RvckVuZ2luZS5maW5kT25lKHF1ZXJpZXMuam9pbignLCcpKTtcblxuICAgIGlmIChsaW5rLmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0RST1BET1dOX0lURU0pKSB7XG4gICAgICBTZWxlY3RvckVuZ2luZS5maW5kT25lKFNFTEVDVE9SX0RST1BET1dOX1RPR0dMRSwgbGluay5jbG9zZXN0KFNFTEVDVE9SX0RST1BET1dOKSkuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0FDVElWRSQzKTtcbiAgICAgIGxpbmsuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0FDVElWRSQzKTtcbiAgICB9IGVsc2Uge1xuICAgICAgLy8gU2V0IHRyaWdnZXJlZCBsaW5rIGFzIGFjdGl2ZVxuICAgICAgbGluay5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfQUNUSVZFJDMpO1xuICAgICAgU2VsZWN0b3JFbmdpbmUucGFyZW50cyhsaW5rLCBTRUxFQ1RPUl9OQVZfTElTVF9HUk9VUCkuZm9yRWFjaChmdW5jdGlvbiAobGlzdEdyb3VwKSB7XG4gICAgICAgIC8vIFNldCB0cmlnZ2VyZWQgbGlua3MgcGFyZW50cyBhcyBhY3RpdmVcbiAgICAgICAgLy8gV2l0aCBib3RoIDx1bD4gYW5kIDxuYXY+IG1hcmt1cCBhIHBhcmVudCBpcyB0aGUgcHJldmlvdXMgc2libGluZyBvZiBhbnkgbmF2IGFuY2VzdG9yXG4gICAgICAgIFNlbGVjdG9yRW5naW5lLnByZXYobGlzdEdyb3VwLCBTRUxFQ1RPUl9OQVZfTElOS1MgKyBcIiwgXCIgKyBTRUxFQ1RPUl9MSVNUX0lURU1TKS5mb3JFYWNoKGZ1bmN0aW9uIChpdGVtKSB7XG4gICAgICAgICAgcmV0dXJuIGl0ZW0uY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0FDVElWRSQzKTtcbiAgICAgICAgfSk7IC8vIEhhbmRsZSBzcGVjaWFsIGNhc2Ugd2hlbiAubmF2LWxpbmsgaXMgaW5zaWRlIC5uYXYtaXRlbVxuXG4gICAgICAgIFNlbGVjdG9yRW5naW5lLnByZXYobGlzdEdyb3VwLCBTRUxFQ1RPUl9OQVZfSVRFTVMpLmZvckVhY2goZnVuY3Rpb24gKG5hdkl0ZW0pIHtcbiAgICAgICAgICBTZWxlY3RvckVuZ2luZS5jaGlsZHJlbihuYXZJdGVtLCBTRUxFQ1RPUl9OQVZfTElOS1MpLmZvckVhY2goZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgICAgICAgIHJldHVybiBpdGVtLmNsYXNzTGlzdC5hZGQoQ0xBU1NfTkFNRV9BQ1RJVkUkMyk7XG4gICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgICAgfSk7XG4gICAgfVxuXG4gICAgRXZlbnRIYW5kbGVyLnRyaWdnZXIodGhpcy5fc2Nyb2xsRWxlbWVudCwgRVZFTlRfQUNUSVZBVEUsIHtcbiAgICAgIHJlbGF0ZWRUYXJnZXQ6IHRhcmdldFxuICAgIH0pO1xuICB9O1xuXG4gIF9wcm90by5fY2xlYXIgPSBmdW5jdGlvbiBfY2xlYXIoKSB7XG4gICAgU2VsZWN0b3JFbmdpbmUuZmluZCh0aGlzLl9zZWxlY3RvcikuZmlsdGVyKGZ1bmN0aW9uIChub2RlKSB7XG4gICAgICByZXR1cm4gbm9kZS5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9BQ1RJVkUkMyk7XG4gICAgfSkuZm9yRWFjaChmdW5jdGlvbiAobm9kZSkge1xuICAgICAgcmV0dXJuIG5vZGUuY2xhc3NMaXN0LnJlbW92ZShDTEFTU19OQU1FX0FDVElWRSQzKTtcbiAgICB9KTtcbiAgfSAvLyBTdGF0aWNcbiAgO1xuXG4gIFNjcm9sbFNweS5qUXVlcnlJbnRlcmZhY2UgPSBmdW5jdGlvbiBqUXVlcnlJbnRlcmZhY2UoY29uZmlnKSB7XG4gICAgcmV0dXJuIHRoaXMuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICB2YXIgZGF0YSA9IERhdGEuZ2V0RGF0YSh0aGlzLCBEQVRBX0tFWSRhKTtcblxuICAgICAgdmFyIF9jb25maWcgPSB0eXBlb2YgY29uZmlnID09PSAnb2JqZWN0JyAmJiBjb25maWc7XG5cbiAgICAgIGlmICghZGF0YSkge1xuICAgICAgICBkYXRhID0gbmV3IFNjcm9sbFNweSh0aGlzLCBfY29uZmlnKTtcbiAgICAgIH1cblxuICAgICAgaWYgKHR5cGVvZiBjb25maWcgPT09ICdzdHJpbmcnKSB7XG4gICAgICAgIGlmICh0eXBlb2YgZGF0YVtjb25maWddID09PSAndW5kZWZpbmVkJykge1xuICAgICAgICAgIHRocm93IG5ldyBUeXBlRXJyb3IoXCJObyBtZXRob2QgbmFtZWQgXFxcIlwiICsgY29uZmlnICsgXCJcXFwiXCIpO1xuICAgICAgICB9XG5cbiAgICAgICAgZGF0YVtjb25maWddKCk7XG4gICAgICB9XG4gICAgfSk7XG4gIH07XG5cbiAgU2Nyb2xsU3B5LmdldEluc3RhbmNlID0gZnVuY3Rpb24gZ2V0SW5zdGFuY2UoZWxlbWVudCkge1xuICAgIHJldHVybiBEYXRhLmdldERhdGEoZWxlbWVudCwgREFUQV9LRVkkYSk7XG4gIH07XG5cbiAgX2NyZWF0ZUNsYXNzKFNjcm9sbFNweSwgbnVsbCwgW3tcbiAgICBrZXk6IFwiVkVSU0lPTlwiLFxuICAgIGdldDogZnVuY3Rpb24gZ2V0KCkge1xuICAgICAgcmV0dXJuIFZFUlNJT04kYTtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiRGVmYXVsdFwiLFxuICAgIGdldDogZnVuY3Rpb24gZ2V0KCkge1xuICAgICAgcmV0dXJuIERlZmF1bHQkODtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gU2Nyb2xsU3B5O1xufSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIERhdGEgQXBpIGltcGxlbWVudGF0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG5cbkV2ZW50SGFuZGxlci5vbih3aW5kb3csIEVWRU5UX0xPQURfREFUQV9BUEkkMSwgZnVuY3Rpb24gKCkge1xuICBTZWxlY3RvckVuZ2luZS5maW5kKFNFTEVDVE9SX0RBVEFfU1BZKS5mb3JFYWNoKGZ1bmN0aW9uIChzcHkpIHtcbiAgICByZXR1cm4gbmV3IFNjcm9sbFNweShzcHksIE1hbmlwdWxhdG9yLmdldERhdGFBdHRyaWJ1dGVzKHNweSkpO1xuICB9KTtcbn0pO1xudmFyICQkYiA9IGdldGpRdWVyeSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIGpRdWVyeVxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxuLyogaXN0YW5idWwgaWdub3JlIGlmICovXG5cbmlmICgkJGIpIHtcbiAgdmFyIEpRVUVSWV9OT19DT05GTElDVCRhID0gJCRiLmZuW05BTUUkYV07XG4gICQkYi5mbltOQU1FJGFdID0gU2Nyb2xsU3B5LmpRdWVyeUludGVyZmFjZTtcbiAgJCRiLmZuW05BTUUkYV0uQ29uc3RydWN0b3IgPSBTY3JvbGxTcHk7XG5cbiAgJCRiLmZuW05BTUUkYV0ubm9Db25mbGljdCA9IGZ1bmN0aW9uICgpIHtcbiAgICAkJGIuZm5bTkFNRSRhXSA9IEpRVUVSWV9OT19DT05GTElDVCRhO1xuICAgIHJldHVybiBTY3JvbGxTcHkualF1ZXJ5SW50ZXJmYWNlO1xuICB9O1xufVxuXG4vKipcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogQ29uc3RhbnRzXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgTkFNRSRiID0gJ3NpZGViYXInO1xudmFyIFZFUlNJT04kYiA9ICczLjIuMCc7XG52YXIgREFUQV9LRVkkYiA9ICdjb3JldWkuc2lkZWJhcic7XG52YXIgRVZFTlRfS0VZJGIgPSBcIi5cIiArIERBVEFfS0VZJGI7XG52YXIgREFUQV9BUElfS0VZJDkgPSAnLmRhdGEtYXBpJztcbnZhciBEZWZhdWx0JDkgPSB7XG4gIGJyZWFrcG9pbnRzOiB7XG4gICAgeHM6ICdjLXNpZGViYXItc2hvdycsXG4gICAgc206ICdjLXNpZGViYXItc20tc2hvdycsXG4gICAgbWQ6ICdjLXNpZGViYXItbWQtc2hvdycsXG4gICAgbGc6ICdjLXNpZGViYXItbGctc2hvdycsXG4gICAgeGw6ICdjLXNpZGViYXIteGwtc2hvdydcbiAgfSxcbiAgZHJvcGRvd25BY2NvcmRpb246IHRydWVcbn07XG52YXIgRGVmYXVsdFR5cGUkNyA9IHtcbiAgYnJlYWtwb2ludHM6ICdvYmplY3QnLFxuICBkcm9wZG93bkFjY29yZGlvbjogJyhzdHJpbmd8Ym9vbGVhbiknXG59O1xudmFyIENMQVNTX05BTUVfQUNUSVZFJDQgPSAnYy1hY3RpdmUnO1xudmFyIENMQVNTX05BTUVfQkFDS0RST1AkMSA9ICdjLXNpZGViYXItYmFja2Ryb3AnO1xudmFyIENMQVNTX05BTUVfRkFERSQzID0gJ2MtZmFkZSc7XG52YXIgQ0xBU1NfTkFNRV9OQVZfRFJPUERPV04gPSAnYy1zaWRlYmFyLW5hdi1kcm9wZG93bic7XG52YXIgQ0xBU1NfTkFNRV9OQVZfRFJPUERPV05fVE9HR0xFJDEgPSAnYy1zaWRlYmFyLW5hdi1kcm9wZG93bi10b2dnbGUnO1xudmFyIENMQVNTX05BTUVfU0hPVyQ2ID0gJ2Mtc2hvdyc7XG52YXIgQ0xBU1NfTkFNRV9TSURFQkFSX01JTklNSVpFRCA9ICdjLXNpZGViYXItbWluaW1pemVkJztcbnZhciBDTEFTU19OQU1FX1NJREVCQVJfT1ZFUkxBSUQgPSAnYy1zaWRlYmFyLW92ZXJsYWlkJztcbnZhciBDTEFTU19OQU1FX1NJREVCQVJfVU5GT0xEQUJMRSA9ICdjLXNpZGViYXItdW5mb2xkYWJsZSc7XG52YXIgRVZFTlRfQ0xBU1NfVE9HR0xFJDEgPSAnY2xhc3N0b2dnbGUnO1xudmFyIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDggPSBcImNsaWNrXCIgKyBFVkVOVF9LRVkkYiArIERBVEFfQVBJX0tFWSQ5O1xudmFyIEVWRU5UX0NMT1NFJDEgPSBcImNsb3NlXCIgKyBFVkVOVF9LRVkkYjtcbnZhciBFVkVOVF9DTE9TRUQkMSA9IFwiY2xvc2VkXCIgKyBFVkVOVF9LRVkkYjtcbnZhciBFVkVOVF9MT0FEX0RBVEFfQVBJJDIgPSBcImxvYWRcIiArIEVWRU5UX0tFWSRiICsgREFUQV9BUElfS0VZJDk7XG52YXIgRVZFTlRfT1BFTiA9IFwib3BlblwiICsgRVZFTlRfS0VZJGI7XG52YXIgRVZFTlRfT1BFTkVEID0gXCJvcGVuZWRcIiArIEVWRU5UX0tFWSRiO1xudmFyIFNFTEVDVE9SX05BVl9EUk9QRE9XTl9UT0dHTEUgPSAnLmMtc2lkZWJhci1uYXYtZHJvcGRvd24tdG9nZ2xlJztcbnZhciBTRUxFQ1RPUl9OQVZfRFJPUERPV04kMSA9ICcuYy1zaWRlYmFyLW5hdi1kcm9wZG93bic7XG52YXIgU0VMRUNUT1JfTkFWX0xJTkskMSA9ICcuYy1zaWRlYmFyLW5hdi1saW5rJztcbnZhciBTRUxFQ1RPUl9OQVZJR0FUSU9OX0NPTlRBSU5FUiA9ICcuYy1zaWRlYmFyLW5hdic7XG52YXIgU0VMRUNUT1JfU0lERUJBUiA9ICcuYy1zaWRlYmFyJztcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDbGFzcyBEZWZpbml0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgU2lkZWJhciA9IC8qI19fUFVSRV9fKi9mdW5jdGlvbiAoKSB7XG4gIGZ1bmN0aW9uIFNpZGViYXIoZWxlbWVudCwgY29uZmlnKSB7XG4gICAgaWYgKHR5cGVvZiBQZXJmZWN0U2Nyb2xsYmFyID09PSAndW5kZWZpbmVkJykge1xuICAgICAgdGhyb3cgbmV3IFR5cGVFcnJvcignQ29yZVVJXFwncyBzaWRlYmFyIHJlcXVpcmUgUGVyZmVjdCBTY3JvbGxiYXInKTtcbiAgICB9XG5cbiAgICB0aGlzLl9lbGVtZW50ID0gZWxlbWVudDtcbiAgICB0aGlzLl9jb25maWcgPSB0aGlzLl9nZXRDb25maWcoY29uZmlnKTtcbiAgICB0aGlzLl9vcGVuID0gdGhpcy5faXNWaXNpYmxlKCk7XG4gICAgdGhpcy5fbW9iaWxlID0gdGhpcy5faXNNb2JpbGUoKTtcbiAgICB0aGlzLl9vdmVybGFpZCA9IHRoaXMuX2lzT3ZlcmxhaWQoKTtcbiAgICB0aGlzLl9taW5pbWl6ZSA9IHRoaXMuX2lzTWluaW1pemVkKCk7XG4gICAgdGhpcy5fdW5mb2xkYWJsZSA9IHRoaXMuX2lzVW5mb2xkYWJsZSgpO1xuXG4gICAgdGhpcy5fc2V0QWN0aXZlTGluaygpO1xuXG4gICAgdGhpcy5fcHMgPSBudWxsO1xuICAgIHRoaXMuX2JhY2tkcm9wID0gbnVsbDtcblxuICAgIHRoaXMuX3BzSW5pdCgpO1xuXG4gICAgdGhpcy5fYWRkRXZlbnRMaXN0ZW5lcnMoKTtcblxuICAgIERhdGEuc2V0RGF0YShlbGVtZW50LCBEQVRBX0tFWSRiLCB0aGlzKTtcbiAgfSAvLyBHZXR0ZXJzXG5cblxuICB2YXIgX3Byb3RvID0gU2lkZWJhci5wcm90b3R5cGU7XG5cbiAgLy8gUHVibGljXG4gIF9wcm90by5vcGVuID0gZnVuY3Rpb24gb3BlbihicmVha3BvaW50KSB7XG4gICAgdmFyIF90aGlzID0gdGhpcztcblxuICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKHRoaXMuX2VsZW1lbnQsIEVWRU5UX09QRU4pO1xuXG4gICAgaWYgKHRoaXMuX2lzTW9iaWxlKCkpIHtcbiAgICAgIHRoaXMuX2FkZENsYXNzTmFtZSh0aGlzLl9maXJzdEJyZWFrcG9pbnRDbGFzc05hbWUoKSk7XG5cbiAgICAgIHRoaXMuX3Nob3dCYWNrZHJvcCgpO1xuXG4gICAgICBFdmVudEhhbmRsZXIub25lKHRoaXMuX2VsZW1lbnQsIFRSQU5TSVRJT05fRU5ELCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIF90aGlzLl9hZGRDbGlja091dExpc3RlbmVyKCk7XG4gICAgICB9KTtcbiAgICB9IGVsc2UgaWYgKGJyZWFrcG9pbnQpIHtcbiAgICAgIHRoaXMuX2FkZENsYXNzTmFtZSh0aGlzLl9nZXRCcmVha3BvaW50Q2xhc3NOYW1lKGJyZWFrcG9pbnQpKTtcblxuICAgICAgaWYgKHRoaXMuX2lzT3ZlcmxhaWQoKSkge1xuICAgICAgICBFdmVudEhhbmRsZXIub25lKHRoaXMuX2VsZW1lbnQsIFRSQU5TSVRJT05fRU5ELCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgX3RoaXMuX2FkZENsaWNrT3V0TGlzdGVuZXIoKTtcbiAgICAgICAgfSk7XG4gICAgICB9XG4gICAgfSBlbHNlIHtcbiAgICAgIHRoaXMuX2FkZENsYXNzTmFtZSh0aGlzLl9maXJzdEJyZWFrcG9pbnRDbGFzc05hbWUoKSk7XG5cbiAgICAgIGlmICh0aGlzLl9pc092ZXJsYWlkKCkpIHtcbiAgICAgICAgRXZlbnRIYW5kbGVyLm9uZSh0aGlzLl9lbGVtZW50LCBUUkFOU0lUSU9OX0VORCwgZnVuY3Rpb24gKCkge1xuICAgICAgICAgIF90aGlzLl9hZGRDbGlja091dExpc3RlbmVyKCk7XG4gICAgICAgIH0pO1xuICAgICAgfVxuICAgIH1cblxuICAgIHZhciBjb21wbGV0ZSA9IGZ1bmN0aW9uIGNvbXBsZXRlKCkge1xuICAgICAgaWYgKF90aGlzLl9pc1Zpc2libGUoKSA9PT0gdHJ1ZSkge1xuICAgICAgICBfdGhpcy5fb3BlbiA9IHRydWU7XG4gICAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKF90aGlzLl9lbGVtZW50LCBFVkVOVF9PUEVORUQpO1xuICAgICAgfVxuICAgIH07XG5cbiAgICBFdmVudEhhbmRsZXIub25lKHRoaXMuX2VsZW1lbnQsIFRSQU5TSVRJT05fRU5ELCBjb21wbGV0ZSk7XG4gIH07XG5cbiAgX3Byb3RvLmNsb3NlID0gZnVuY3Rpb24gY2xvc2UoYnJlYWtwb2ludCkge1xuICAgIHZhciBfdGhpczIgPSB0aGlzO1xuXG4gICAgRXZlbnRIYW5kbGVyLnRyaWdnZXIodGhpcy5fZWxlbWVudCwgRVZFTlRfQ0xPU0UkMSk7XG5cbiAgICBpZiAodGhpcy5faXNNb2JpbGUoKSkge1xuICAgICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKHRoaXMuX2ZpcnN0QnJlYWtwb2ludENsYXNzTmFtZSgpKTtcblxuICAgICAgdGhpcy5fcmVtb3ZlQmFja2Ryb3AoKTtcblxuICAgICAgdGhpcy5fcmVtb3ZlQ2xpY2tPdXRMaXN0ZW5lcigpO1xuICAgIH0gZWxzZSBpZiAoYnJlYWtwb2ludCkge1xuICAgICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKHRoaXMuX2dldEJyZWFrcG9pbnRDbGFzc05hbWUoYnJlYWtwb2ludCkpO1xuXG4gICAgICBpZiAodGhpcy5faXNPdmVybGFpZCgpKSB7XG4gICAgICAgIHRoaXMuX3JlbW92ZUNsaWNrT3V0TGlzdGVuZXIoKTtcbiAgICAgIH1cbiAgICB9IGVsc2Uge1xuICAgICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKHRoaXMuX2ZpcnN0QnJlYWtwb2ludENsYXNzTmFtZSgpKTtcblxuICAgICAgaWYgKHRoaXMuX2lzT3ZlcmxhaWQoKSkge1xuICAgICAgICB0aGlzLl9yZW1vdmVDbGlja091dExpc3RlbmVyKCk7XG4gICAgICB9XG4gICAgfVxuXG4gICAgdmFyIGNvbXBsZXRlID0gZnVuY3Rpb24gY29tcGxldGUoKSB7XG4gICAgICBpZiAoX3RoaXMyLl9pc1Zpc2libGUoKSA9PT0gZmFsc2UpIHtcbiAgICAgICAgX3RoaXMyLl9vcGVuID0gZmFsc2U7XG4gICAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKF90aGlzMi5fZWxlbWVudCwgRVZFTlRfQ0xPU0VEJDEpO1xuICAgICAgfVxuICAgIH07XG5cbiAgICBFdmVudEhhbmRsZXIub25lKHRoaXMuX2VsZW1lbnQsIFRSQU5TSVRJT05fRU5ELCBjb21wbGV0ZSk7XG4gIH07XG5cbiAgX3Byb3RvLnRvZ2dsZSA9IGZ1bmN0aW9uIHRvZ2dsZShicmVha3BvaW50KSB7XG4gICAgaWYgKHRoaXMuX29wZW4pIHtcbiAgICAgIHRoaXMuY2xvc2UoYnJlYWtwb2ludCk7XG4gICAgfSBlbHNlIHtcbiAgICAgIHRoaXMub3BlbihicmVha3BvaW50KTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLm1pbmltaXplID0gZnVuY3Rpb24gbWluaW1pemUoKSB7XG4gICAgaWYgKCF0aGlzLl9pc01vYmlsZSgpKSB7XG4gICAgICB0aGlzLl9hZGRDbGFzc05hbWUoQ0xBU1NfTkFNRV9TSURFQkFSX01JTklNSVpFRCk7XG5cbiAgICAgIHRoaXMuX21pbmltaXplID0gdHJ1ZTtcblxuICAgICAgdGhpcy5fcHNEZXN0cm95KCk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by51bmZvbGRhYmxlID0gZnVuY3Rpb24gdW5mb2xkYWJsZSgpIHtcbiAgICBpZiAoIXRoaXMuX2lzTW9iaWxlKCkpIHtcbiAgICAgIHRoaXMuX2FkZENsYXNzTmFtZShDTEFTU19OQU1FX1NJREVCQVJfVU5GT0xEQUJMRSk7XG5cbiAgICAgIHRoaXMuX3VuZm9sZGFibGUgPSB0cnVlO1xuICAgIH1cbiAgfTtcblxuICBfcHJvdG8ucmVzZXQgPSBmdW5jdGlvbiByZXNldCgpIHtcbiAgICBpZiAodGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9TSURFQkFSX01JTklNSVpFRCkpIHtcbiAgICAgIHRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShDTEFTU19OQU1FX1NJREVCQVJfTUlOSU1JWkVEKTtcblxuICAgICAgdGhpcy5fbWluaW1pemUgPSBmYWxzZTtcbiAgICAgIEV2ZW50SGFuZGxlci5vbmUodGhpcy5fZWxlbWVudCwgVFJBTlNJVElPTl9FTkQsIHRoaXMuX3BzSW5pdCgpKTtcbiAgICB9XG5cbiAgICBpZiAodGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9TSURFQkFSX1VORk9MREFCTEUpKSB7XG4gICAgICB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9TSURFQkFSX1VORk9MREFCTEUpO1xuXG4gICAgICB0aGlzLl91bmZvbGRhYmxlID0gZmFsc2U7XG4gICAgfVxuICB9IC8vIFByaXZhdGVcbiAgO1xuXG4gIF9wcm90by5fZ2V0Q29uZmlnID0gZnVuY3Rpb24gX2dldENvbmZpZyhjb25maWcpIHtcbiAgICBjb25maWcgPSBfb2JqZWN0U3ByZWFkMihfb2JqZWN0U3ByZWFkMihfb2JqZWN0U3ByZWFkMih7fSwgdGhpcy5jb25zdHJ1Y3Rvci5EZWZhdWx0KSwgTWFuaXB1bGF0b3IuZ2V0RGF0YUF0dHJpYnV0ZXModGhpcy5fZWxlbWVudCkpLCBjb25maWcpO1xuICAgIHR5cGVDaGVja0NvbmZpZyhOQU1FJGIsIGNvbmZpZywgdGhpcy5jb25zdHJ1Y3Rvci5EZWZhdWx0VHlwZSk7XG4gICAgcmV0dXJuIGNvbmZpZztcbiAgfTtcblxuICBfcHJvdG8uX2lzTW9iaWxlID0gZnVuY3Rpb24gX2lzTW9iaWxlKCkge1xuICAgIHJldHVybiBCb29sZWFuKHdpbmRvdy5nZXRDb21wdXRlZFN0eWxlKHRoaXMuX2VsZW1lbnQsIG51bGwpLmdldFByb3BlcnR5VmFsdWUoJy0taXMtbW9iaWxlJykpO1xuICB9O1xuXG4gIF9wcm90by5faXNJT1MgPSBmdW5jdGlvbiBfaXNJT1MoKSB7XG4gICAgdmFyIGlPU0RldmljZXMgPSBbJ2lQYWQgU2ltdWxhdG9yJywgJ2lQaG9uZSBTaW11bGF0b3InLCAnaVBvZCBTaW11bGF0b3InLCAnaVBhZCcsICdpUGhvbmUnLCAnaVBvZCddO1xuICAgIHZhciBwbGF0Zm9ybSA9IEJvb2xlYW4obmF2aWdhdG9yLnBsYXRmb3JtKTtcblxuICAgIGlmIChwbGF0Zm9ybSkge1xuICAgICAgd2hpbGUgKGlPU0RldmljZXMubGVuZ3RoKSB7XG4gICAgICAgIGlmIChuYXZpZ2F0b3IucGxhdGZvcm0gPT09IGlPU0RldmljZXMucG9wKCkpIHtcbiAgICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH1cblxuICAgIHJldHVybiBmYWxzZTtcbiAgfTtcblxuICBfcHJvdG8uX2lzTWluaW1pemVkID0gZnVuY3Rpb24gX2lzTWluaW1pemVkKCkge1xuICAgIHJldHVybiB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX1NJREVCQVJfTUlOSU1JWkVEKTtcbiAgfTtcblxuICBfcHJvdG8uX2lzT3ZlcmxhaWQgPSBmdW5jdGlvbiBfaXNPdmVybGFpZCgpIHtcbiAgICByZXR1cm4gdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9TSURFQkFSX09WRVJMQUlEKTtcbiAgfTtcblxuICBfcHJvdG8uX2lzVW5mb2xkYWJsZSA9IGZ1bmN0aW9uIF9pc1VuZm9sZGFibGUoKSB7XG4gICAgcmV0dXJuIHRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfU0lERUJBUl9VTkZPTERBQkxFKTtcbiAgfTtcblxuICBfcHJvdG8uX2lzVmlzaWJsZSA9IGZ1bmN0aW9uIF9pc1Zpc2libGUoKSB7XG4gICAgdmFyIHJlY3QgPSB0aGlzLl9lbGVtZW50LmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpO1xuXG4gICAgcmV0dXJuIHJlY3QudG9wID49IDAgJiYgcmVjdC5sZWZ0ID49IDAgJiYgcmVjdC5ib3R0b20gPD0gKHdpbmRvdy5pbm5lckhlaWdodCB8fCBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuY2xpZW50SGVpZ2h0KSAmJlxuICAgIC8qIG9yICQod2luZG93KS5oZWlnaHQoKSAqL1xuICAgIHJlY3QucmlnaHQgPD0gKHdpbmRvdy5pbm5lcldpZHRoIHx8IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5jbGllbnRXaWR0aClcbiAgICAvKiBvciAkKHdpbmRvdykud2lkdGgoKSAqL1xuICAgIDtcbiAgfTtcblxuICBfcHJvdG8uX2FkZENsYXNzTmFtZSA9IGZ1bmN0aW9uIF9hZGRDbGFzc05hbWUoY2xhc3NOYW1lKSB7XG4gICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuYWRkKGNsYXNzTmFtZSk7XG4gIH07XG5cbiAgX3Byb3RvLl9maXJzdEJyZWFrcG9pbnRDbGFzc05hbWUgPSBmdW5jdGlvbiBfZmlyc3RCcmVha3BvaW50Q2xhc3NOYW1lKCkge1xuICAgIHJldHVybiBPYmplY3Qua2V5cyhEZWZhdWx0JDkuYnJlYWtwb2ludHMpLm1hcChmdW5jdGlvbiAoa2V5KSB7XG4gICAgICByZXR1cm4gRGVmYXVsdCQ5LmJyZWFrcG9pbnRzW2tleV07XG4gICAgfSlbMF07XG4gIH07XG5cbiAgX3Byb3RvLl9nZXRCcmVha3BvaW50Q2xhc3NOYW1lID0gZnVuY3Rpb24gX2dldEJyZWFrcG9pbnRDbGFzc05hbWUoYnJlYWtwb2ludCkge1xuICAgIHJldHVybiBEZWZhdWx0JDkuYnJlYWtwb2ludHNbYnJlYWtwb2ludF07XG4gIH07XG5cbiAgX3Byb3RvLl9yZW1vdmVCYWNrZHJvcCA9IGZ1bmN0aW9uIF9yZW1vdmVCYWNrZHJvcCgpIHtcbiAgICBpZiAodGhpcy5fYmFja2Ryb3ApIHtcbiAgICAgIHRoaXMuX2JhY2tkcm9wLnBhcmVudE5vZGUucmVtb3ZlQ2hpbGQodGhpcy5fYmFja2Ryb3ApO1xuXG4gICAgICB0aGlzLl9iYWNrZHJvcCA9IG51bGw7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5fc2hvd0JhY2tkcm9wID0gZnVuY3Rpb24gX3Nob3dCYWNrZHJvcCgpIHtcbiAgICBpZiAoIXRoaXMuX2JhY2tkcm9wKSB7XG4gICAgICB0aGlzLl9iYWNrZHJvcCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpO1xuICAgICAgdGhpcy5fYmFja2Ryb3AuY2xhc3NOYW1lID0gQ0xBU1NfTkFNRV9CQUNLRFJPUCQxO1xuXG4gICAgICB0aGlzLl9iYWNrZHJvcC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfRkFERSQzKTtcblxuICAgICAgZG9jdW1lbnQuYm9keS5hcHBlbmRDaGlsZCh0aGlzLl9iYWNrZHJvcCk7XG4gICAgICByZWZsb3codGhpcy5fYmFja2Ryb3ApO1xuXG4gICAgICB0aGlzLl9iYWNrZHJvcC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfU0hPVyQ2KTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLl9jbGlja091dExpc3RlbmVyID0gZnVuY3Rpb24gX2NsaWNrT3V0TGlzdGVuZXIoZXZlbnQsIHNpZGViYXIpIHtcbiAgICBpZiAoZXZlbnQudGFyZ2V0LmNsb3Nlc3QoU0VMRUNUT1JfU0lERUJBUikgPT09IG51bGwpIHtcbiAgICAgIC8vIG9yIHVzZTpcbiAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgICBldmVudC5zdG9wUHJvcGFnYXRpb24oKTtcbiAgICAgIHNpZGViYXIuY2xvc2UoKTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLl9hZGRDbGlja091dExpc3RlbmVyID0gZnVuY3Rpb24gX2FkZENsaWNrT3V0TGlzdGVuZXIoKSB7XG4gICAgdmFyIF90aGlzMyA9IHRoaXM7XG5cbiAgICBFdmVudEhhbmRsZXIub24oZG9jdW1lbnQsIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDgsIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgX3RoaXMzLl9jbGlja091dExpc3RlbmVyKGV2ZW50LCBfdGhpczMpO1xuICAgIH0pO1xuICB9O1xuXG4gIF9wcm90by5fcmVtb3ZlQ2xpY2tPdXRMaXN0ZW5lciA9IGZ1bmN0aW9uIF9yZW1vdmVDbGlja091dExpc3RlbmVyKCkge1xuICAgIEV2ZW50SGFuZGxlci5vZmYoZG9jdW1lbnQsIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDgpO1xuICB9IC8vIFNpZGViYXIgbmF2aWdhdGlvblxuICA7XG5cbiAgX3Byb3RvLl9nZXRBbGxTaWJsaW5ncyA9IGZ1bmN0aW9uIF9nZXRBbGxTaWJsaW5ncyhlbGVtZW50LCBmaWx0ZXIpIHtcbiAgICB2YXIgc2libGluZ3MgPSBbXTtcbiAgICBlbGVtZW50ID0gZWxlbWVudC5wYXJlbnROb2RlLmZpcnN0Q2hpbGQ7XG5cbiAgICBkbyB7XG4gICAgICBpZiAoZWxlbWVudC5ub2RlVHlwZSA9PT0gMykge1xuICAgICAgICBjb250aW51ZTsgLy8gdGV4dCBub2RlXG4gICAgICB9XG5cbiAgICAgIGlmICghZmlsdGVyIHx8IGZpbHRlcihlbGVtZW50KSkge1xuICAgICAgICBzaWJsaW5ncy5wdXNoKGVsZW1lbnQpO1xuICAgICAgfSAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgbm8tY29uZC1hc3NpZ25cblxuICAgIH0gd2hpbGUgKGVsZW1lbnQgPSBlbGVtZW50Lm5leHRTaWJsaW5nKTtcblxuICAgIHJldHVybiBzaWJsaW5ncztcbiAgfTtcblxuICBfcHJvdG8uX3RvZ2dsZURyb3Bkb3duID0gZnVuY3Rpb24gX3RvZ2dsZURyb3Bkb3duKGV2ZW50LCBzaWRlYmFyKSB7XG4gICAgdmFyIHRvZ2dsZXIgPSBldmVudC50YXJnZXQ7XG5cbiAgICBpZiAoIXRvZ2dsZXIuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfTkFWX0RST1BET1dOX1RPR0dMRSQxKSkge1xuICAgICAgdG9nZ2xlciA9IHRvZ2dsZXIuY2xvc2VzdChTRUxFQ1RPUl9OQVZfRFJPUERPV05fVE9HR0xFKTtcbiAgICB9XG5cbiAgICB2YXIgZGF0YUF0dHJpYnV0ZXMgPSB0b2dnbGVyLmNsb3Nlc3QoU0VMRUNUT1JfTkFWSUdBVElPTl9DT05UQUlORVIpLmRhdGFzZXQ7XG5cbiAgICBpZiAodHlwZW9mIGRhdGFBdHRyaWJ1dGVzLmRyb3Bkb3duQWNjb3JkaW9uICE9PSAndW5kZWZpbmVkJykge1xuICAgICAgRGVmYXVsdCQ5LmRyb3Bkb3duQWNjb3JkaW9uID0gSlNPTi5wYXJzZShkYXRhQXR0cmlidXRlcy5kcm9wZG93bkFjY29yZGlvbik7XG4gICAgfSAvLyBUT0RPOiBmaW5kIGJldHRlciBzb2x1dGlvblxuXG5cbiAgICBpZiAoRGVmYXVsdCQ5LmRyb3Bkb3duQWNjb3JkaW9uID09PSB0cnVlKSB7XG4gICAgICB0aGlzLl9nZXRBbGxTaWJsaW5ncyh0b2dnbGVyLnBhcmVudEVsZW1lbnQpLmZvckVhY2goZnVuY3Rpb24gKGVsZW1lbnQpIHtcbiAgICAgICAgaWYgKGVsZW1lbnQgIT09IHRvZ2dsZXIucGFyZW50Tm9kZSkge1xuICAgICAgICAgIGlmIChlbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX05BVl9EUk9QRE9XTikpIHtcbiAgICAgICAgICAgIGVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShDTEFTU19OQU1FX1NIT1ckNik7XG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICB0b2dnbGVyLnBhcmVudE5vZGUuY2xhc3NMaXN0LnRvZ2dsZShDTEFTU19OQU1FX1NIT1ckNik7IC8vIFRPRE86IFNldCB0aGUgdG9nZ2xlcidzIHBvc2l0aW9uIG5lYXIgdG8gY3Vyc29yIGFmdGVyIHRoZSBjbGljay5cbiAgICAvLyBUT0RPOiBhZGQgdHJhbnNpdGlvbiBlbmRcblxuICAgIHNpZGViYXIuX3BzVXBkYXRlKCk7XG4gIH0gLy8gUGVyZmVjdFNjcm9sbGJhclxuICA7XG5cbiAgX3Byb3RvLl9wc0luaXQgPSBmdW5jdGlvbiBfcHNJbml0KCkge1xuICAgIGlmICh0aGlzLl9lbGVtZW50LnF1ZXJ5U2VsZWN0b3IoU0VMRUNUT1JfTkFWSUdBVElPTl9DT05UQUlORVIpICYmICF0aGlzLl9pc0lPUygpKSB7XG4gICAgICB0aGlzLl9wcyA9IG5ldyBQZXJmZWN0U2Nyb2xsYmFyKHRoaXMuX2VsZW1lbnQucXVlcnlTZWxlY3RvcihTRUxFQ1RPUl9OQVZJR0FUSU9OX0NPTlRBSU5FUiksIHtcbiAgICAgICAgc3VwcHJlc3NTY3JvbGxYOiB0cnVlLFxuICAgICAgICB3aGVlbFByb3BhZ2F0aW9uOiBmYWxzZVxuICAgICAgfSk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5fcHNVcGRhdGUgPSBmdW5jdGlvbiBfcHNVcGRhdGUoKSB7XG4gICAgaWYgKHRoaXMuX3BzKSB7XG4gICAgICB0aGlzLl9wcy51cGRhdGUoKTtcbiAgICB9XG4gIH07XG5cbiAgX3Byb3RvLl9wc0Rlc3Ryb3kgPSBmdW5jdGlvbiBfcHNEZXN0cm95KCkge1xuICAgIGlmICh0aGlzLl9wcykge1xuICAgICAgdGhpcy5fcHMuZGVzdHJveSgpO1xuXG4gICAgICB0aGlzLl9wcyA9IG51bGw7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5fZ2V0UGFyZW50cyA9IGZ1bmN0aW9uIF9nZXRQYXJlbnRzKGVsZW1lbnQsIHNlbGVjdG9yKSB7XG4gICAgLy8gU2V0dXAgcGFyZW50cyBhcnJheVxuICAgIHZhciBwYXJlbnRzID0gW107IC8vIEdldCBtYXRjaGluZyBwYXJlbnQgZWxlbWVudHNcblxuICAgIGZvciAoOyBlbGVtZW50ICYmIGVsZW1lbnQgIT09IGRvY3VtZW50OyBlbGVtZW50ID0gZWxlbWVudC5wYXJlbnROb2RlKSB7XG4gICAgICAvLyBBZGQgbWF0Y2hpbmcgcGFyZW50cyB0byBhcnJheVxuICAgICAgaWYgKHNlbGVjdG9yKSB7XG4gICAgICAgIGlmIChlbGVtZW50Lm1hdGNoZXMoc2VsZWN0b3IpKSB7XG4gICAgICAgICAgcGFyZW50cy5wdXNoKGVsZW1lbnQpO1xuICAgICAgICB9XG4gICAgICB9IGVsc2Uge1xuICAgICAgICBwYXJlbnRzLnB1c2goZWxlbWVudCk7XG4gICAgICB9XG4gICAgfVxuXG4gICAgcmV0dXJuIHBhcmVudHM7XG4gIH07XG5cbiAgX3Byb3RvLl9zZXRBY3RpdmVMaW5rID0gZnVuY3Rpb24gX3NldEFjdGl2ZUxpbmsoKSB7XG4gICAgdmFyIF90aGlzNCA9IHRoaXM7XG5cbiAgICAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgdW5pY29ybi9wcmVmZXItc3ByZWFkXG4gICAgQXJyYXkuZnJvbSh0aGlzLl9lbGVtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoU0VMRUNUT1JfTkFWX0xJTkskMSkpLmZvckVhY2goZnVuY3Rpb24gKGVsZW1lbnQpIHtcbiAgICAgIHZhciBjdXJyZW50VXJsO1xuICAgICAgdmFyIHVybEhhc1BhcmFtcyA9IC9cXFxcPy4qPS87XG4gICAgICB2YXIgdXJsSGFzUXVlcnlTdHJpbmcgPSAvXFxcXD8uLztcbiAgICAgIHZhciB1cmxIYXNIYXNoID0gLyMuLztcblxuICAgICAgaWYgKHVybEhhc1BhcmFtcy50ZXN0KFN0cmluZyh3aW5kb3cubG9jYXRpb24pKSB8fCB1cmxIYXNRdWVyeVN0cmluZy50ZXN0KFN0cmluZyh3aW5kb3cubG9jYXRpb24pKSkge1xuICAgICAgICBjdXJyZW50VXJsID0gU3RyaW5nKHdpbmRvdy5sb2NhdGlvbikuc3BsaXQoJz8nKVswXTtcbiAgICAgIH0gZWxzZSBpZiAodXJsSGFzSGFzaC50ZXN0KFN0cmluZyh3aW5kb3cubG9jYXRpb24pKSkge1xuICAgICAgICBjdXJyZW50VXJsID0gU3RyaW5nKHdpbmRvdy5sb2NhdGlvbikuc3BsaXQoJyMnKVswXTtcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIGN1cnJlbnRVcmwgPSBTdHJpbmcod2luZG93LmxvY2F0aW9uKTtcbiAgICAgIH1cblxuICAgICAgaWYgKGN1cnJlbnRVcmwuc2xpY2UoLTEpID09PSAnIycpIHtcbiAgICAgICAgY3VycmVudFVybCA9IGN1cnJlbnRVcmwuc2xpY2UoMCwgLTEpO1xuICAgICAgfVxuXG4gICAgICBpZiAoZWxlbWVudC5ocmVmID09PSBjdXJyZW50VXJsKSB7XG4gICAgICAgIGVsZW1lbnQuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX0FDVElWRSQ0KTsgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIHVuaWNvcm4vcHJlZmVyLXNwcmVhZFxuXG4gICAgICAgIEFycmF5LmZyb20oX3RoaXM0Ll9nZXRQYXJlbnRzKGVsZW1lbnQsIFNFTEVDVE9SX05BVl9EUk9QRE9XTiQxKSkuZm9yRWFjaChmdW5jdGlvbiAoZWxlbWVudCkge1xuICAgICAgICAgIGVsZW1lbnQuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX1NIT1ckNik7XG4gICAgICAgIH0pO1xuICAgICAgfVxuICAgIH0pO1xuICB9O1xuXG4gIF9wcm90by5fYWRkRXZlbnRMaXN0ZW5lcnMgPSBmdW5jdGlvbiBfYWRkRXZlbnRMaXN0ZW5lcnMoKSB7XG4gICAgdmFyIF90aGlzNSA9IHRoaXM7XG5cbiAgICBpZiAodGhpcy5fbW9iaWxlICYmIHRoaXMuX29wZW4pIHtcbiAgICAgIHRoaXMuX2FkZENsaWNrT3V0TGlzdGVuZXIoKTtcbiAgICB9XG5cbiAgICBpZiAodGhpcy5fb3ZlcmxhaWQgJiYgdGhpcy5fb3Blbikge1xuICAgICAgdGhpcy5fYWRkQ2xpY2tPdXRMaXN0ZW5lcigpO1xuICAgIH1cblxuICAgIEV2ZW50SGFuZGxlci5vbih0aGlzLl9lbGVtZW50LCBFVkVOVF9DTEFTU19UT0dHTEUkMSwgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICBpZiAoZXZlbnQuZGV0YWlsLmNsYXNzTmFtZSA9PT0gQ0xBU1NfTkFNRV9TSURFQkFSX01JTklNSVpFRCkge1xuICAgICAgICBpZiAoX3RoaXM1Ll9lbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX1NJREVCQVJfTUlOSU1JWkVEKSkge1xuICAgICAgICAgIF90aGlzNS5taW5pbWl6ZSgpO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIF90aGlzNS5yZXNldCgpO1xuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIGlmIChldmVudC5kZXRhaWwuY2xhc3NOYW1lID09PSBDTEFTU19OQU1FX1NJREVCQVJfVU5GT0xEQUJMRSkge1xuICAgICAgICBpZiAoX3RoaXM1Ll9lbGVtZW50LmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX1NJREVCQVJfVU5GT0xEQUJMRSkpIHtcbiAgICAgICAgICBfdGhpczUudW5mb2xkYWJsZSgpO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIF90aGlzNS5yZXNldCgpO1xuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIGlmICh0eXBlb2YgT2JqZWN0LmtleXMoRGVmYXVsdCQ5LmJyZWFrcG9pbnRzKS5maW5kKGZ1bmN0aW9uIChrZXkpIHtcbiAgICAgICAgcmV0dXJuIERlZmF1bHQkOS5icmVha3BvaW50c1trZXldID09PSBldmVudC5kZXRhaWwuY2xhc3NOYW1lO1xuICAgICAgfSkgIT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgIHZhciBjbGFzc05hbWUgPSBldmVudC5kZXRhaWwuY2xhc3NOYW1lO1xuICAgICAgICB2YXIgYnJlYWtwb2ludCA9IE9iamVjdC5rZXlzKERlZmF1bHQkOS5icmVha3BvaW50cykuZmluZChmdW5jdGlvbiAoa2V5KSB7XG4gICAgICAgICAgcmV0dXJuIERlZmF1bHQkOS5icmVha3BvaW50c1trZXldID09PSBjbGFzc05hbWU7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIGlmIChldmVudC5kZXRhaWwuYWRkKSB7XG4gICAgICAgICAgX3RoaXM1Lm9wZW4oYnJlYWtwb2ludCk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgX3RoaXM1LmNsb3NlKGJyZWFrcG9pbnQpO1xuICAgICAgICB9XG4gICAgICB9XG4gICAgfSk7XG4gICAgRXZlbnRIYW5kbGVyLm9uKHRoaXMuX2VsZW1lbnQsIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDgsIFNFTEVDVE9SX05BVl9EUk9QRE9XTl9UT0dHTEUsIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgX3RoaXM1Ll90b2dnbGVEcm9wZG93bihldmVudCwgX3RoaXM1KTtcbiAgICB9KTtcbiAgICBFdmVudEhhbmRsZXIub24odGhpcy5fZWxlbWVudCwgRVZFTlRfQ0xJQ0tfREFUQV9BUEkkOCwgU0VMRUNUT1JfTkFWX0xJTkskMSwgZnVuY3Rpb24gKCkge1xuICAgICAgaWYgKF90aGlzNS5faXNNb2JpbGUoKSkge1xuICAgICAgICBfdGhpczUuY2xvc2UoKTtcbiAgICAgIH1cbiAgICB9KTtcbiAgfSAvLyBTdGF0aWNcbiAgO1xuXG4gIFNpZGViYXIuX3NpZGViYXJJbnRlcmZhY2UgPSBmdW5jdGlvbiBfc2lkZWJhckludGVyZmFjZShlbGVtZW50LCBjb25maWcpIHtcbiAgICB2YXIgZGF0YSA9IERhdGEuZ2V0RGF0YShlbGVtZW50LCBEQVRBX0tFWSRiKTtcblxuICAgIHZhciBfY29uZmlnID0gdHlwZW9mIGNvbmZpZyA9PT0gJ29iamVjdCcgJiYgY29uZmlnO1xuXG4gICAgaWYgKCFkYXRhKSB7XG4gICAgICBkYXRhID0gbmV3IFNpZGViYXIoZWxlbWVudCwgX2NvbmZpZyk7XG4gICAgfVxuXG4gICAgaWYgKHR5cGVvZiBjb25maWcgPT09ICdzdHJpbmcnKSB7XG4gICAgICBpZiAodHlwZW9mIGRhdGFbY29uZmlnXSA9PT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgdGhyb3cgbmV3IFR5cGVFcnJvcihcIk5vIG1ldGhvZCBuYW1lZCBcXFwiXCIgKyBjb25maWcgKyBcIlxcXCJcIik7XG4gICAgICB9XG5cbiAgICAgIGRhdGFbY29uZmlnXSgpO1xuICAgIH1cbiAgfTtcblxuICBTaWRlYmFyLmpRdWVyeUludGVyZmFjZSA9IGZ1bmN0aW9uIGpRdWVyeUludGVyZmFjZShjb25maWcpIHtcbiAgICByZXR1cm4gdGhpcy5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgIFNpZGViYXIuX3NpZGViYXJJbnRlcmZhY2UodGhpcywgY29uZmlnKTtcbiAgICB9KTtcbiAgfTtcblxuICBTaWRlYmFyLmdldEluc3RhbmNlID0gZnVuY3Rpb24gZ2V0SW5zdGFuY2UoZWxlbWVudCkge1xuICAgIHJldHVybiBEYXRhLmdldERhdGEoZWxlbWVudCwgREFUQV9LRVkkYik7XG4gIH07XG5cbiAgX2NyZWF0ZUNsYXNzKFNpZGViYXIsIG51bGwsIFt7XG4gICAga2V5OiBcIlZFUlNJT05cIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBWRVJTSU9OJGI7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIkRlZmF1bHRcIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBEZWZhdWx0JDk7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIkRlZmF1bHRUeXBlXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRGVmYXVsdFR5cGUkNztcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gU2lkZWJhcjtcbn0oKTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBEYXRhIEFwaSBpbXBsZW1lbnRhdGlvblxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxuXG5FdmVudEhhbmRsZXIub24od2luZG93LCBFVkVOVF9MT0FEX0RBVEFfQVBJJDIsIGZ1bmN0aW9uICgpIHtcbiAgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIHVuaWNvcm4vcHJlZmVyLXNwcmVhZFxuICBBcnJheS5mcm9tKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoU0VMRUNUT1JfU0lERUJBUikpLmZvckVhY2goZnVuY3Rpb24gKGVsZW1lbnQpIHtcbiAgICBTaWRlYmFyLl9zaWRlYmFySW50ZXJmYWNlKGVsZW1lbnQpO1xuICB9KTtcbn0pO1xudmFyICQkYyA9IGdldGpRdWVyeSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIGpRdWVyeVxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxuaWYgKCQkYykge1xuICB2YXIgSlFVRVJZX05PX0NPTkZMSUNUJGIgPSAkJGMuZm5bTkFNRSRiXTtcbiAgJCRjLmZuW05BTUUkYl0gPSBTaWRlYmFyLmpRdWVyeUludGVyZmFjZTtcbiAgJCRjLmZuW05BTUUkYl0uQ29uc3RydWN0b3IgPSBTaWRlYmFyO1xuXG4gICQkYy5mbltOQU1FJGJdLm5vQ29uZmxpY3QgPSBmdW5jdGlvbiAoKSB7XG4gICAgJCRjLmZuW05BTUUkYl0gPSBKUVVFUllfTk9fQ09ORkxJQ1QkYjtcbiAgICByZXR1cm4gU2lkZWJhci5qUXVlcnlJbnRlcmZhY2U7XG4gIH07XG59XG5cbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDb25zdGFudHNcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICovXG5cbnZhciBOQU1FJGMgPSAndGFiJztcbnZhciBWRVJTSU9OJGMgPSAnMy4yLjAnO1xudmFyIERBVEFfS0VZJGMgPSAnY29yZXVpLnRhYic7XG52YXIgRVZFTlRfS0VZJGMgPSBcIi5cIiArIERBVEFfS0VZJGM7XG52YXIgREFUQV9BUElfS0VZJGEgPSAnLmRhdGEtYXBpJztcbnZhciBFVkVOVF9ISURFJDMgPSBcImhpZGVcIiArIEVWRU5UX0tFWSRjO1xudmFyIEVWRU5UX0hJRERFTiQzID0gXCJoaWRkZW5cIiArIEVWRU5UX0tFWSRjO1xudmFyIEVWRU5UX1NIT1ckMyA9IFwic2hvd1wiICsgRVZFTlRfS0VZJGM7XG52YXIgRVZFTlRfU0hPV04kMyA9IFwic2hvd25cIiArIEVWRU5UX0tFWSRjO1xudmFyIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDkgPSBcImNsaWNrXCIgKyBFVkVOVF9LRVkkYyArIERBVEFfQVBJX0tFWSRhO1xudmFyIENMQVNTX05BTUVfRFJPUERPV05fTUVOVSA9ICdkcm9wZG93bi1tZW51JztcbnZhciBDTEFTU19OQU1FX0FDVElWRSQ1ID0gJ2FjdGl2ZSc7XG52YXIgQ0xBU1NfTkFNRV9ESVNBQkxFRCQyID0gJ2Rpc2FibGVkJztcbnZhciBDTEFTU19OQU1FX0ZBREUkNCA9ICdmYWRlJztcbnZhciBDTEFTU19OQU1FX1NIT1ckNyA9ICdzaG93JztcbnZhciBTRUxFQ1RPUl9EUk9QRE9XTiQxID0gJy5kcm9wZG93bic7XG52YXIgU0VMRUNUT1JfTkFWX0xJU1RfR1JPVVAkMSA9ICcubmF2LCAubGlzdC1ncm91cCc7XG52YXIgU0VMRUNUT1JfQUNUSVZFJDIgPSAnLmFjdGl2ZSc7XG52YXIgU0VMRUNUT1JfQUNUSVZFX1VMID0gJzpzY29wZSA+IGxpID4gLmFjdGl2ZSc7XG52YXIgU0VMRUNUT1JfREFUQV9UT0dHTEUkNCA9ICdbZGF0YS10b2dnbGU9XCJ0YWJcIl0sIFtkYXRhLXRvZ2dsZT1cInBpbGxcIl0sIFtkYXRhLXRvZ2dsZT1cImxpc3RcIl0nO1xudmFyIFNFTEVDVE9SX0RST1BET1dOX1RPR0dMRSQxID0gJy5kcm9wZG93bi10b2dnbGUnO1xudmFyIFNFTEVDVE9SX0RST1BET1dOX0FDVElWRV9DSElMRCA9ICc6c2NvcGUgPiAuZHJvcGRvd24tbWVudSAuYWN0aXZlJztcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDbGFzcyBEZWZpbml0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgVGFiID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gVGFiKGVsZW1lbnQpIHtcbiAgICB0aGlzLl9lbGVtZW50ID0gZWxlbWVudDtcbiAgICBEYXRhLnNldERhdGEodGhpcy5fZWxlbWVudCwgREFUQV9LRVkkYywgdGhpcyk7XG4gIH0gLy8gR2V0dGVyc1xuXG5cbiAgdmFyIF9wcm90byA9IFRhYi5wcm90b3R5cGU7XG5cbiAgLy8gUHVibGljXG4gIF9wcm90by5zaG93ID0gZnVuY3Rpb24gc2hvdygpIHtcbiAgICB2YXIgX3RoaXMgPSB0aGlzO1xuXG4gICAgaWYgKHRoaXMuX2VsZW1lbnQucGFyZW50Tm9kZSAmJiB0aGlzLl9lbGVtZW50LnBhcmVudE5vZGUubm9kZVR5cGUgPT09IE5vZGUuRUxFTUVOVF9OT0RFICYmIHRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfQUNUSVZFJDUpIHx8IHRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfRElTQUJMRUQkMikpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB2YXIgcHJldmlvdXM7XG4gICAgdmFyIHRhcmdldCA9IGdldEVsZW1lbnRGcm9tU2VsZWN0b3IodGhpcy5fZWxlbWVudCk7XG5cbiAgICB2YXIgbGlzdEVsZW1lbnQgPSB0aGlzLl9lbGVtZW50LmNsb3Nlc3QoU0VMRUNUT1JfTkFWX0xJU1RfR1JPVVAkMSk7XG5cbiAgICBpZiAobGlzdEVsZW1lbnQpIHtcbiAgICAgIHZhciBpdGVtU2VsZWN0b3IgPSBsaXN0RWxlbWVudC5ub2RlTmFtZSA9PT0gJ1VMJyB8fCBsaXN0RWxlbWVudC5ub2RlTmFtZSA9PT0gJ09MJyA/IFNFTEVDVE9SX0FDVElWRV9VTCA6IFNFTEVDVE9SX0FDVElWRSQyO1xuICAgICAgcHJldmlvdXMgPSBTZWxlY3RvckVuZ2luZS5maW5kKGl0ZW1TZWxlY3RvciwgbGlzdEVsZW1lbnQpO1xuICAgICAgcHJldmlvdXMgPSBwcmV2aW91c1twcmV2aW91cy5sZW5ndGggLSAxXTtcbiAgICB9XG5cbiAgICB2YXIgaGlkZUV2ZW50ID0gbnVsbDtcblxuICAgIGlmIChwcmV2aW91cykge1xuICAgICAgaGlkZUV2ZW50ID0gRXZlbnRIYW5kbGVyLnRyaWdnZXIocHJldmlvdXMsIEVWRU5UX0hJREUkMywge1xuICAgICAgICByZWxhdGVkVGFyZ2V0OiB0aGlzLl9lbGVtZW50XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICB2YXIgc2hvd0V2ZW50ID0gRXZlbnRIYW5kbGVyLnRyaWdnZXIodGhpcy5fZWxlbWVudCwgRVZFTlRfU0hPVyQzLCB7XG4gICAgICByZWxhdGVkVGFyZ2V0OiBwcmV2aW91c1xuICAgIH0pO1xuXG4gICAgaWYgKHNob3dFdmVudC5kZWZhdWx0UHJldmVudGVkIHx8IGhpZGVFdmVudCAhPT0gbnVsbCAmJiBoaWRlRXZlbnQuZGVmYXVsdFByZXZlbnRlZCkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHRoaXMuX2FjdGl2YXRlKHRoaXMuX2VsZW1lbnQsIGxpc3RFbGVtZW50KTtcblxuICAgIHZhciBjb21wbGV0ZSA9IGZ1bmN0aW9uIGNvbXBsZXRlKCkge1xuICAgICAgRXZlbnRIYW5kbGVyLnRyaWdnZXIocHJldmlvdXMsIEVWRU5UX0hJRERFTiQzLCB7XG4gICAgICAgIHJlbGF0ZWRUYXJnZXQ6IF90aGlzLl9lbGVtZW50XG4gICAgICB9KTtcbiAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKF90aGlzLl9lbGVtZW50LCBFVkVOVF9TSE9XTiQzLCB7XG4gICAgICAgIHJlbGF0ZWRUYXJnZXQ6IHByZXZpb3VzXG4gICAgICB9KTtcbiAgICB9O1xuXG4gICAgaWYgKHRhcmdldCkge1xuICAgICAgdGhpcy5fYWN0aXZhdGUodGFyZ2V0LCB0YXJnZXQucGFyZW50Tm9kZSwgY29tcGxldGUpO1xuICAgIH0gZWxzZSB7XG4gICAgICBjb21wbGV0ZSgpO1xuICAgIH1cbiAgfTtcblxuICBfcHJvdG8uZGlzcG9zZSA9IGZ1bmN0aW9uIGRpc3Bvc2UoKSB7XG4gICAgRGF0YS5yZW1vdmVEYXRhKHRoaXMuX2VsZW1lbnQsIERBVEFfS0VZJGMpO1xuICAgIHRoaXMuX2VsZW1lbnQgPSBudWxsO1xuICB9IC8vIFByaXZhdGVcbiAgO1xuXG4gIF9wcm90by5fYWN0aXZhdGUgPSBmdW5jdGlvbiBfYWN0aXZhdGUoZWxlbWVudCwgY29udGFpbmVyLCBjYWxsYmFjaykge1xuICAgIHZhciBfdGhpczIgPSB0aGlzO1xuXG4gICAgdmFyIGFjdGl2ZUVsZW1lbnRzID0gY29udGFpbmVyICYmIChjb250YWluZXIubm9kZU5hbWUgPT09ICdVTCcgfHwgY29udGFpbmVyLm5vZGVOYW1lID09PSAnT0wnKSA/IFNlbGVjdG9yRW5naW5lLmZpbmQoU0VMRUNUT1JfQUNUSVZFX1VMLCBjb250YWluZXIpIDogU2VsZWN0b3JFbmdpbmUuY2hpbGRyZW4oY29udGFpbmVyLCBTRUxFQ1RPUl9BQ1RJVkUkMik7XG4gICAgdmFyIGFjdGl2ZSA9IGFjdGl2ZUVsZW1lbnRzWzBdO1xuICAgIHZhciBpc1RyYW5zaXRpb25pbmcgPSBjYWxsYmFjayAmJiBhY3RpdmUgJiYgYWN0aXZlLmNsYXNzTGlzdC5jb250YWlucyhDTEFTU19OQU1FX0ZBREUkNCk7XG5cbiAgICB2YXIgY29tcGxldGUgPSBmdW5jdGlvbiBjb21wbGV0ZSgpIHtcbiAgICAgIHJldHVybiBfdGhpczIuX3RyYW5zaXRpb25Db21wbGV0ZShlbGVtZW50LCBhY3RpdmUsIGNhbGxiYWNrKTtcbiAgICB9O1xuXG4gICAgaWYgKGFjdGl2ZSAmJiBpc1RyYW5zaXRpb25pbmcpIHtcbiAgICAgIHZhciB0cmFuc2l0aW9uRHVyYXRpb24gPSBnZXRUcmFuc2l0aW9uRHVyYXRpb25Gcm9tRWxlbWVudChhY3RpdmUpO1xuICAgICAgYWN0aXZlLmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9TSE9XJDcpO1xuICAgICAgRXZlbnRIYW5kbGVyLm9uZShhY3RpdmUsIFRSQU5TSVRJT05fRU5ELCBjb21wbGV0ZSk7XG4gICAgICBlbXVsYXRlVHJhbnNpdGlvbkVuZChhY3RpdmUsIHRyYW5zaXRpb25EdXJhdGlvbik7XG4gICAgfSBlbHNlIHtcbiAgICAgIGNvbXBsZXRlKCk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5fdHJhbnNpdGlvbkNvbXBsZXRlID0gZnVuY3Rpb24gX3RyYW5zaXRpb25Db21wbGV0ZShlbGVtZW50LCBhY3RpdmUsIGNhbGxiYWNrKSB7XG4gICAgaWYgKGFjdGl2ZSkge1xuICAgICAgYWN0aXZlLmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9BQ1RJVkUkNSk7XG4gICAgICB2YXIgZHJvcGRvd25DaGlsZCA9IFNlbGVjdG9yRW5naW5lLmZpbmRPbmUoU0VMRUNUT1JfRFJPUERPV05fQUNUSVZFX0NISUxELCBhY3RpdmUucGFyZW50Tm9kZSk7XG5cbiAgICAgIGlmIChkcm9wZG93bkNoaWxkKSB7XG4gICAgICAgIGRyb3Bkb3duQ2hpbGQuY2xhc3NMaXN0LnJlbW92ZShDTEFTU19OQU1FX0FDVElWRSQ1KTtcbiAgICAgIH1cblxuICAgICAgaWYgKGFjdGl2ZS5nZXRBdHRyaWJ1dGUoJ3JvbGUnKSA9PT0gJ3RhYicpIHtcbiAgICAgICAgYWN0aXZlLnNldEF0dHJpYnV0ZSgnYXJpYS1zZWxlY3RlZCcsIGZhbHNlKTtcbiAgICAgIH1cbiAgICB9XG5cbiAgICBlbGVtZW50LmNsYXNzTGlzdC5hZGQoQ0xBU1NfTkFNRV9BQ1RJVkUkNSk7XG5cbiAgICBpZiAoZWxlbWVudC5nZXRBdHRyaWJ1dGUoJ3JvbGUnKSA9PT0gJ3RhYicpIHtcbiAgICAgIGVsZW1lbnQuc2V0QXR0cmlidXRlKCdhcmlhLXNlbGVjdGVkJywgdHJ1ZSk7XG4gICAgfVxuXG4gICAgcmVmbG93KGVsZW1lbnQpO1xuXG4gICAgaWYgKGVsZW1lbnQuY2xhc3NMaXN0LmNvbnRhaW5zKENMQVNTX05BTUVfRkFERSQ0KSkge1xuICAgICAgZWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfU0hPVyQ3KTtcbiAgICB9XG5cbiAgICBpZiAoZWxlbWVudC5wYXJlbnROb2RlICYmIGVsZW1lbnQucGFyZW50Tm9kZS5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9EUk9QRE9XTl9NRU5VKSkge1xuICAgICAgdmFyIGRyb3Bkb3duRWxlbWVudCA9IGVsZW1lbnQuY2xvc2VzdChTRUxFQ1RPUl9EUk9QRE9XTiQxKTtcblxuICAgICAgaWYgKGRyb3Bkb3duRWxlbWVudCkge1xuICAgICAgICBTZWxlY3RvckVuZ2luZS5maW5kKFNFTEVDVE9SX0RST1BET1dOX1RPR0dMRSQxKS5mb3JFYWNoKGZ1bmN0aW9uIChkcm9wZG93bikge1xuICAgICAgICAgIHJldHVybiBkcm9wZG93bi5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfQUNUSVZFJDUpO1xuICAgICAgICB9KTtcbiAgICAgIH1cblxuICAgICAgZWxlbWVudC5zZXRBdHRyaWJ1dGUoJ2FyaWEtZXhwYW5kZWQnLCB0cnVlKTtcbiAgICB9XG5cbiAgICBpZiAoY2FsbGJhY2spIHtcbiAgICAgIGNhbGxiYWNrKCk7XG4gICAgfVxuICB9IC8vIFN0YXRpY1xuICA7XG5cbiAgVGFiLmpRdWVyeUludGVyZmFjZSA9IGZ1bmN0aW9uIGpRdWVyeUludGVyZmFjZShjb25maWcpIHtcbiAgICByZXR1cm4gdGhpcy5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgIHZhciBkYXRhID0gRGF0YS5nZXREYXRhKHRoaXMsIERBVEFfS0VZJGMpIHx8IG5ldyBUYWIodGhpcyk7XG5cbiAgICAgIGlmICh0eXBlb2YgY29uZmlnID09PSAnc3RyaW5nJykge1xuICAgICAgICBpZiAodHlwZW9mIGRhdGFbY29uZmlnXSA9PT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgICB0aHJvdyBuZXcgVHlwZUVycm9yKFwiTm8gbWV0aG9kIG5hbWVkIFxcXCJcIiArIGNvbmZpZyArIFwiXFxcIlwiKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGRhdGFbY29uZmlnXSgpO1xuICAgICAgfVxuICAgIH0pO1xuICB9O1xuXG4gIFRhYi5nZXRJbnN0YW5jZSA9IGZ1bmN0aW9uIGdldEluc3RhbmNlKGVsZW1lbnQpIHtcbiAgICByZXR1cm4gRGF0YS5nZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJGMpO1xuICB9O1xuXG4gIF9jcmVhdGVDbGFzcyhUYWIsIG51bGwsIFt7XG4gICAga2V5OiBcIlZFUlNJT05cIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBWRVJTSU9OJGM7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIFRhYjtcbn0oKTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBEYXRhIEFwaSBpbXBsZW1lbnRhdGlvblxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxuXG5FdmVudEhhbmRsZXIub24oZG9jdW1lbnQsIEVWRU5UX0NMSUNLX0RBVEFfQVBJJDksIFNFTEVDVE9SX0RBVEFfVE9HR0xFJDQsIGZ1bmN0aW9uIChldmVudCkge1xuICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICB2YXIgZGF0YSA9IERhdGEuZ2V0RGF0YSh0aGlzLCBEQVRBX0tFWSRjKSB8fCBuZXcgVGFiKHRoaXMpO1xuICBkYXRhLnNob3coKTtcbn0pO1xudmFyICQkZCA9IGdldGpRdWVyeSgpO1xuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIGpRdWVyeVxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBhZGQgLnRhYiB0byBqUXVlcnkgb25seSBpZiBqUXVlcnkgaXMgcHJlc2VudFxuICovXG5cbi8qIGlzdGFuYnVsIGlnbm9yZSBpZiAqL1xuXG5pZiAoJCRkKSB7XG4gIHZhciBKUVVFUllfTk9fQ09ORkxJQ1QkYyA9ICQkZC5mbltOQU1FJGNdO1xuICAkJGQuZm5bTkFNRSRjXSA9IFRhYi5qUXVlcnlJbnRlcmZhY2U7XG4gICQkZC5mbltOQU1FJGNdLkNvbnN0cnVjdG9yID0gVGFiO1xuXG4gICQkZC5mbltOQU1FJGNdLm5vQ29uZmxpY3QgPSBmdW5jdGlvbiAoKSB7XG4gICAgJCRkLmZuW05BTUUkY10gPSBKUVVFUllfTk9fQ09ORkxJQ1QkYztcbiAgICByZXR1cm4gVGFiLmpRdWVyeUludGVyZmFjZTtcbiAgfTtcbn1cblxuLyoqXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqIENvbnN0YW50c1xuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKi9cblxudmFyIE5BTUUkZCA9ICd0b2FzdCc7XG52YXIgVkVSU0lPTiRkID0gJzMuMi4wJztcbnZhciBEQVRBX0tFWSRkID0gJ2NvcmV1aS50b2FzdCc7XG52YXIgRVZFTlRfS0VZJGQgPSBcIi5cIiArIERBVEFfS0VZJGQ7XG52YXIgRVZFTlRfQ0xJQ0tfRElTTUlTUyQxID0gXCJjbGljay5kaXNtaXNzXCIgKyBFVkVOVF9LRVkkZDtcbnZhciBFVkVOVF9ISURFJDQgPSBcImhpZGVcIiArIEVWRU5UX0tFWSRkO1xudmFyIEVWRU5UX0hJRERFTiQ0ID0gXCJoaWRkZW5cIiArIEVWRU5UX0tFWSRkO1xudmFyIEVWRU5UX1NIT1ckNCA9IFwic2hvd1wiICsgRVZFTlRfS0VZJGQ7XG52YXIgRVZFTlRfU0hPV04kNCA9IFwic2hvd25cIiArIEVWRU5UX0tFWSRkO1xudmFyIENMQVNTX05BTUVfRkFERSQ1ID0gJ2ZhZGUnO1xudmFyIENMQVNTX05BTUVfSElERSA9ICdoaWRlJztcbnZhciBDTEFTU19OQU1FX1NIT1ckOCA9ICdzaG93JztcbnZhciBDTEFTU19OQU1FX1NIT1dJTkcgPSAnc2hvd2luZyc7XG52YXIgRGVmYXVsdFR5cGUkOCA9IHtcbiAgYW5pbWF0aW9uOiAnYm9vbGVhbicsXG4gIGF1dG9oaWRlOiAnYm9vbGVhbicsXG4gIGRlbGF5OiAnbnVtYmVyJ1xufTtcbnZhciBEZWZhdWx0JGEgPSB7XG4gIGFuaW1hdGlvbjogdHJ1ZSxcbiAgYXV0b2hpZGU6IHRydWUsXG4gIGRlbGF5OiA1MDBcbn07XG52YXIgU0VMRUNUT1JfREFUQV9ESVNNSVNTJDEgPSAnW2RhdGEtZGlzbWlzcz1cInRvYXN0XCJdJztcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBDbGFzcyBEZWZpbml0aW9uXG4gKiAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbiAqL1xuXG52YXIgVG9hc3QgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKCkge1xuICBmdW5jdGlvbiBUb2FzdChlbGVtZW50LCBjb25maWcpIHtcbiAgICB0aGlzLl9lbGVtZW50ID0gZWxlbWVudDtcbiAgICB0aGlzLl9jb25maWcgPSB0aGlzLl9nZXRDb25maWcoY29uZmlnKTtcbiAgICB0aGlzLl90aW1lb3V0ID0gbnVsbDtcblxuICAgIHRoaXMuX3NldExpc3RlbmVycygpO1xuXG4gICAgRGF0YS5zZXREYXRhKGVsZW1lbnQsIERBVEFfS0VZJGQsIHRoaXMpO1xuICB9IC8vIEdldHRlcnNcblxuXG4gIHZhciBfcHJvdG8gPSBUb2FzdC5wcm90b3R5cGU7XG5cbiAgLy8gUHVibGljXG4gIF9wcm90by5zaG93ID0gZnVuY3Rpb24gc2hvdygpIHtcbiAgICB2YXIgX3RoaXMgPSB0aGlzO1xuXG4gICAgdmFyIHNob3dFdmVudCA9IEV2ZW50SGFuZGxlci50cmlnZ2VyKHRoaXMuX2VsZW1lbnQsIEVWRU5UX1NIT1ckNCk7XG5cbiAgICBpZiAoc2hvd0V2ZW50LmRlZmF1bHRQcmV2ZW50ZWQpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAodGhpcy5fY29uZmlnLmFuaW1hdGlvbikge1xuICAgICAgdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfRkFERSQ1KTtcbiAgICB9XG5cbiAgICB2YXIgY29tcGxldGUgPSBmdW5jdGlvbiBjb21wbGV0ZSgpIHtcbiAgICAgIF90aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9TSE9XSU5HKTtcblxuICAgICAgX3RoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX1NIT1ckOCk7XG5cbiAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKF90aGlzLl9lbGVtZW50LCBFVkVOVF9TSE9XTiQ0KTtcblxuICAgICAgaWYgKF90aGlzLl9jb25maWcuYXV0b2hpZGUpIHtcbiAgICAgICAgX3RoaXMuX3RpbWVvdXQgPSBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICBfdGhpcy5oaWRlKCk7XG4gICAgICAgIH0sIF90aGlzLl9jb25maWcuZGVsYXkpO1xuICAgICAgfVxuICAgIH07XG5cbiAgICB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9ISURFKTtcblxuICAgIHJlZmxvdyh0aGlzLl9lbGVtZW50KTtcblxuICAgIHRoaXMuX2VsZW1lbnQuY2xhc3NMaXN0LmFkZChDTEFTU19OQU1FX1NIT1dJTkcpO1xuXG4gICAgaWYgKHRoaXMuX2NvbmZpZy5hbmltYXRpb24pIHtcbiAgICAgIHZhciB0cmFuc2l0aW9uRHVyYXRpb24gPSBnZXRUcmFuc2l0aW9uRHVyYXRpb25Gcm9tRWxlbWVudCh0aGlzLl9lbGVtZW50KTtcbiAgICAgIEV2ZW50SGFuZGxlci5vbmUodGhpcy5fZWxlbWVudCwgVFJBTlNJVElPTl9FTkQsIGNvbXBsZXRlKTtcbiAgICAgIGVtdWxhdGVUcmFuc2l0aW9uRW5kKHRoaXMuX2VsZW1lbnQsIHRyYW5zaXRpb25EdXJhdGlvbik7XG4gICAgfSBlbHNlIHtcbiAgICAgIGNvbXBsZXRlKCk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5oaWRlID0gZnVuY3Rpb24gaGlkZSgpIHtcbiAgICB2YXIgX3RoaXMyID0gdGhpcztcblxuICAgIGlmICghdGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9TSE9XJDgpKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgdmFyIGhpZGVFdmVudCA9IEV2ZW50SGFuZGxlci50cmlnZ2VyKHRoaXMuX2VsZW1lbnQsIEVWRU5UX0hJREUkNCk7XG5cbiAgICBpZiAoaGlkZUV2ZW50LmRlZmF1bHRQcmV2ZW50ZWQpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB2YXIgY29tcGxldGUgPSBmdW5jdGlvbiBjb21wbGV0ZSgpIHtcbiAgICAgIF90aGlzMi5fZWxlbWVudC5jbGFzc0xpc3QuYWRkKENMQVNTX05BTUVfSElERSk7XG5cbiAgICAgIEV2ZW50SGFuZGxlci50cmlnZ2VyKF90aGlzMi5fZWxlbWVudCwgRVZFTlRfSElEREVOJDQpO1xuICAgIH07XG5cbiAgICB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9TSE9XJDgpO1xuXG4gICAgaWYgKHRoaXMuX2NvbmZpZy5hbmltYXRpb24pIHtcbiAgICAgIHZhciB0cmFuc2l0aW9uRHVyYXRpb24gPSBnZXRUcmFuc2l0aW9uRHVyYXRpb25Gcm9tRWxlbWVudCh0aGlzLl9lbGVtZW50KTtcbiAgICAgIEV2ZW50SGFuZGxlci5vbmUodGhpcy5fZWxlbWVudCwgVFJBTlNJVElPTl9FTkQsIGNvbXBsZXRlKTtcbiAgICAgIGVtdWxhdGVUcmFuc2l0aW9uRW5kKHRoaXMuX2VsZW1lbnQsIHRyYW5zaXRpb25EdXJhdGlvbik7XG4gICAgfSBlbHNlIHtcbiAgICAgIGNvbXBsZXRlKCk7XG4gICAgfVxuICB9O1xuXG4gIF9wcm90by5kaXNwb3NlID0gZnVuY3Rpb24gZGlzcG9zZSgpIHtcbiAgICBjbGVhclRpbWVvdXQodGhpcy5fdGltZW91dCk7XG4gICAgdGhpcy5fdGltZW91dCA9IG51bGw7XG5cbiAgICBpZiAodGhpcy5fZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoQ0xBU1NfTkFNRV9TSE9XJDgpKSB7XG4gICAgICB0aGlzLl9lbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoQ0xBU1NfTkFNRV9TSE9XJDgpO1xuICAgIH1cblxuICAgIEV2ZW50SGFuZGxlci5vZmYodGhpcy5fZWxlbWVudCwgRVZFTlRfQ0xJQ0tfRElTTUlTUyQxKTtcbiAgICBEYXRhLnJlbW92ZURhdGEodGhpcy5fZWxlbWVudCwgREFUQV9LRVkkZCk7XG4gICAgdGhpcy5fZWxlbWVudCA9IG51bGw7XG4gICAgdGhpcy5fY29uZmlnID0gbnVsbDtcbiAgfSAvLyBQcml2YXRlXG4gIDtcblxuICBfcHJvdG8uX2dldENvbmZpZyA9IGZ1bmN0aW9uIF9nZXRDb25maWcoY29uZmlnKSB7XG4gICAgY29uZmlnID0gX29iamVjdFNwcmVhZDIoX29iamVjdFNwcmVhZDIoX29iamVjdFNwcmVhZDIoe30sIERlZmF1bHQkYSksIE1hbmlwdWxhdG9yLmdldERhdGFBdHRyaWJ1dGVzKHRoaXMuX2VsZW1lbnQpKSwgdHlwZW9mIGNvbmZpZyA9PT0gJ29iamVjdCcgJiYgY29uZmlnID8gY29uZmlnIDoge30pO1xuICAgIHR5cGVDaGVja0NvbmZpZyhOQU1FJGQsIGNvbmZpZywgdGhpcy5jb25zdHJ1Y3Rvci5EZWZhdWx0VHlwZSk7XG4gICAgcmV0dXJuIGNvbmZpZztcbiAgfTtcblxuICBfcHJvdG8uX3NldExpc3RlbmVycyA9IGZ1bmN0aW9uIF9zZXRMaXN0ZW5lcnMoKSB7XG4gICAgdmFyIF90aGlzMyA9IHRoaXM7XG5cbiAgICBFdmVudEhhbmRsZXIub24odGhpcy5fZWxlbWVudCwgRVZFTlRfQ0xJQ0tfRElTTUlTUyQxLCBTRUxFQ1RPUl9EQVRBX0RJU01JU1MkMSwgZnVuY3Rpb24gKCkge1xuICAgICAgcmV0dXJuIF90aGlzMy5oaWRlKCk7XG4gICAgfSk7XG4gIH0gLy8gU3RhdGljXG4gIDtcblxuICBUb2FzdC5qUXVlcnlJbnRlcmZhY2UgPSBmdW5jdGlvbiBqUXVlcnlJbnRlcmZhY2UoY29uZmlnKSB7XG4gICAgcmV0dXJuIHRoaXMuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICB2YXIgZGF0YSA9IERhdGEuZ2V0RGF0YSh0aGlzLCBEQVRBX0tFWSRkKTtcblxuICAgICAgdmFyIF9jb25maWcgPSB0eXBlb2YgY29uZmlnID09PSAnb2JqZWN0JyAmJiBjb25maWc7XG5cbiAgICAgIGlmICghZGF0YSkge1xuICAgICAgICBkYXRhID0gbmV3IFRvYXN0KHRoaXMsIF9jb25maWcpO1xuICAgICAgfVxuXG4gICAgICBpZiAodHlwZW9mIGNvbmZpZyA9PT0gJ3N0cmluZycpIHtcbiAgICAgICAgaWYgKHR5cGVvZiBkYXRhW2NvbmZpZ10gPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgICAgdGhyb3cgbmV3IFR5cGVFcnJvcihcIk5vIG1ldGhvZCBuYW1lZCBcXFwiXCIgKyBjb25maWcgKyBcIlxcXCJcIik7XG4gICAgICAgIH1cblxuICAgICAgICBkYXRhW2NvbmZpZ10odGhpcyk7XG4gICAgICB9XG4gICAgfSk7XG4gIH07XG5cbiAgVG9hc3QuZ2V0SW5zdGFuY2UgPSBmdW5jdGlvbiBnZXRJbnN0YW5jZShlbGVtZW50KSB7XG4gICAgcmV0dXJuIERhdGEuZ2V0RGF0YShlbGVtZW50LCBEQVRBX0tFWSRkKTtcbiAgfTtcblxuICBfY3JlYXRlQ2xhc3MoVG9hc3QsIG51bGwsIFt7XG4gICAga2V5OiBcIlZFUlNJT05cIixcbiAgICBnZXQ6IGZ1bmN0aW9uIGdldCgpIHtcbiAgICAgIHJldHVybiBWRVJTSU9OJGQ7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIkRlZmF1bHRUeXBlXCIsXG4gICAgZ2V0OiBmdW5jdGlvbiBnZXQoKSB7XG4gICAgICByZXR1cm4gRGVmYXVsdFR5cGUkODtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiRGVmYXVsdFwiLFxuICAgIGdldDogZnVuY3Rpb24gZ2V0KCkge1xuICAgICAgcmV0dXJuIERlZmF1bHQkYTtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gVG9hc3Q7XG59KCk7XG5cbnZhciAkJGUgPSBnZXRqUXVlcnkoKTtcbi8qKlxuICogLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4gKiBqUXVlcnlcbiAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICogIGFkZCAudG9hc3QgdG8galF1ZXJ5IG9ubHkgaWYgalF1ZXJ5IGlzIHByZXNlbnRcbiAqL1xuXG4vKiBpc3RhbmJ1bCBpZ25vcmUgaWYgKi9cblxuaWYgKCQkZSkge1xuICB2YXIgSlFVRVJZX05PX0NPTkZMSUNUJGQgPSAkJGUuZm5bTkFNRSRkXTtcbiAgJCRlLmZuW05BTUUkZF0gPSBUb2FzdC5qUXVlcnlJbnRlcmZhY2U7XG4gICQkZS5mbltOQU1FJGRdLkNvbnN0cnVjdG9yID0gVG9hc3Q7XG5cbiAgJCRlLmZuW05BTUUkZF0ubm9Db25mbGljdCA9IGZ1bmN0aW9uICgpIHtcbiAgICAkJGUuZm5bTkFNRSRkXSA9IEpRVUVSWV9OT19DT05GTElDVCRkO1xuICAgIHJldHVybiBUb2FzdC5qUXVlcnlJbnRlcmZhY2U7XG4gIH07XG59XG5cbmV4cG9ydCB7IEFsZXJ0LCBBc3luY0xvYWQsIEJ1dHRvbiwgQ2Fyb3VzZWwsIENsYXNzVG9nZ2xlciwgQ29sbGFwc2UsIERyb3Bkb3duLCBNb2RhbCwgUG9wb3ZlciwgU2Nyb2xsU3B5IGFzIFNjcm9sbHNweSwgU2lkZWJhciwgVGFiLCBUb2FzdCwgVG9vbHRpcCB9O1xuLy8jIHNvdXJjZU1hcHBpbmdVUkw9Y29yZXVpLmVzbS5qcy5tYXBcbiIsImV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGNvbnRhaW5zKHBhcmVudCwgY2hpbGQpIHtcbiAgLy8gJEZsb3dGaXhNZTogaGFzT3duUHJvcGVydHkgZG9lc24ndCBzZWVtIHRvIHdvcmsgaW4gdGVzdHNcbiAgdmFyIGlzU2hhZG93ID0gQm9vbGVhbihjaGlsZC5nZXRSb290Tm9kZSAmJiBjaGlsZC5nZXRSb290Tm9kZSgpLmhvc3QpOyAvLyBGaXJzdCwgYXR0ZW1wdCB3aXRoIGZhc3RlciBuYXRpdmUgbWV0aG9kXG5cbiAgaWYgKHBhcmVudC5jb250YWlucyhjaGlsZCkpIHtcbiAgICByZXR1cm4gdHJ1ZTtcbiAgfSAvLyB0aGVuIGZhbGxiYWNrIHRvIGN1c3RvbSBpbXBsZW1lbnRhdGlvbiB3aXRoIFNoYWRvdyBET00gc3VwcG9ydFxuICBlbHNlIGlmIChpc1NoYWRvdykge1xuICAgICAgdmFyIG5leHQgPSBjaGlsZDtcblxuICAgICAgZG8ge1xuICAgICAgICBpZiAobmV4dCAmJiBwYXJlbnQuaXNTYW1lTm9kZShuZXh0KSkge1xuICAgICAgICAgIHJldHVybiB0cnVlO1xuICAgICAgICB9IC8vICRGbG93Rml4TWU6IG5lZWQgYSBiZXR0ZXIgd2F5IHRvIGhhbmRsZSB0aGlzLi4uXG5cblxuICAgICAgICBuZXh0ID0gbmV4dC5wYXJlbnROb2RlIHx8IG5leHQuaG9zdDtcbiAgICAgIH0gd2hpbGUgKG5leHQpO1xuICAgIH0gLy8gR2l2ZSB1cCwgdGhlIHJlc3VsdCBpcyBmYWxzZVxuXG5cbiAgcmV0dXJuIGZhbHNlO1xufSIsImltcG9ydCBnZXRDb21wdXRlZFN0eWxlIGZyb20gXCIuL2dldENvbXB1dGVkU3R5bGUuanNcIjtcbmltcG9ydCB7IGlzSFRNTEVsZW1lbnQgfSBmcm9tIFwiLi9pbnN0YW5jZU9mLmpzXCI7XG5cbmZ1bmN0aW9uIHRvTnVtYmVyKGNzc1ZhbHVlKSB7XG4gIHJldHVybiBwYXJzZUZsb2F0KGNzc1ZhbHVlKSB8fCAwO1xufVxuXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBnZXRCb3JkZXJzKGVsZW1lbnQpIHtcbiAgdmFyIGNvbXB1dGVkU3R5bGUgPSBpc0hUTUxFbGVtZW50KGVsZW1lbnQpID8gZ2V0Q29tcHV0ZWRTdHlsZShlbGVtZW50KSA6IHt9O1xuICByZXR1cm4ge1xuICAgIHRvcDogdG9OdW1iZXIoY29tcHV0ZWRTdHlsZS5ib3JkZXJUb3BXaWR0aCksXG4gICAgcmlnaHQ6IHRvTnVtYmVyKGNvbXB1dGVkU3R5bGUuYm9yZGVyUmlnaHRXaWR0aCksXG4gICAgYm90dG9tOiB0b051bWJlcihjb21wdXRlZFN0eWxlLmJvcmRlckJvdHRvbVdpZHRoKSxcbiAgICBsZWZ0OiB0b051bWJlcihjb21wdXRlZFN0eWxlLmJvcmRlckxlZnRXaWR0aClcbiAgfTtcbn0iLCJleHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBnZXRCb3VuZGluZ0NsaWVudFJlY3QoZWxlbWVudCkge1xuICB2YXIgcmVjdCA9IGVsZW1lbnQuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCk7XG4gIHJldHVybiB7XG4gICAgd2lkdGg6IHJlY3Qud2lkdGgsXG4gICAgaGVpZ2h0OiByZWN0LmhlaWdodCxcbiAgICB0b3A6IHJlY3QudG9wLFxuICAgIHJpZ2h0OiByZWN0LnJpZ2h0LFxuICAgIGJvdHRvbTogcmVjdC5ib3R0b20sXG4gICAgbGVmdDogcmVjdC5sZWZ0LFxuICAgIHg6IHJlY3QubGVmdCxcbiAgICB5OiByZWN0LnRvcFxuICB9O1xufSIsImltcG9ydCB7IHZpZXdwb3J0IH0gZnJvbSBcIi4uL2VudW1zLmpzXCI7XG5pbXBvcnQgZ2V0Vmlld3BvcnRSZWN0IGZyb20gXCIuL2dldFZpZXdwb3J0UmVjdC5qc1wiO1xuaW1wb3J0IGdldERvY3VtZW50UmVjdCBmcm9tIFwiLi9nZXREb2N1bWVudFJlY3QuanNcIjtcbmltcG9ydCBsaXN0U2Nyb2xsUGFyZW50cyBmcm9tIFwiLi9saXN0U2Nyb2xsUGFyZW50cy5qc1wiO1xuaW1wb3J0IGdldE9mZnNldFBhcmVudCBmcm9tIFwiLi9nZXRPZmZzZXRQYXJlbnQuanNcIjtcbmltcG9ydCBnZXREb2N1bWVudEVsZW1lbnQgZnJvbSBcIi4vZ2V0RG9jdW1lbnRFbGVtZW50LmpzXCI7XG5pbXBvcnQgZ2V0Q29tcHV0ZWRTdHlsZSBmcm9tIFwiLi9nZXRDb21wdXRlZFN0eWxlLmpzXCI7XG5pbXBvcnQgeyBpc0VsZW1lbnQsIGlzSFRNTEVsZW1lbnQgfSBmcm9tIFwiLi9pbnN0YW5jZU9mLmpzXCI7XG5pbXBvcnQgZ2V0Qm91bmRpbmdDbGllbnRSZWN0IGZyb20gXCIuL2dldEJvdW5kaW5nQ2xpZW50UmVjdC5qc1wiO1xuaW1wb3J0IGdldERlY29yYXRpb25zIGZyb20gXCIuL2dldERlY29yYXRpb25zLmpzXCI7XG5pbXBvcnQgY29udGFpbnMgZnJvbSBcIi4vY29udGFpbnMuanNcIjtcbmltcG9ydCByZWN0VG9DbGllbnRSZWN0IGZyb20gXCIuLi91dGlscy9yZWN0VG9DbGllbnRSZWN0LmpzXCI7XG5cbmZ1bmN0aW9uIGdldENsaWVudFJlY3RGcm9tTWl4ZWRUeXBlKGVsZW1lbnQsIGNsaXBwaW5nUGFyZW50KSB7XG4gIHJldHVybiBjbGlwcGluZ1BhcmVudCA9PT0gdmlld3BvcnQgPyByZWN0VG9DbGllbnRSZWN0KGdldFZpZXdwb3J0UmVjdChlbGVtZW50KSkgOiBpc0hUTUxFbGVtZW50KGNsaXBwaW5nUGFyZW50KSA/IGdldEJvdW5kaW5nQ2xpZW50UmVjdChjbGlwcGluZ1BhcmVudCkgOiByZWN0VG9DbGllbnRSZWN0KGdldERvY3VtZW50UmVjdChnZXREb2N1bWVudEVsZW1lbnQoZWxlbWVudCkpKTtcbn0gLy8gQSBcImNsaXBwaW5nIHBhcmVudFwiIGlzIGFuIG92ZXJmbG93YWJsZSBjb250YWluZXIgd2l0aCB0aGUgY2hhcmFjdGVyaXN0aWMgb2Zcbi8vIGNsaXBwaW5nIChvciBoaWRpbmcpIG92ZXJmbG93aW5nIGVsZW1lbnRzIHdpdGggYSBwb3NpdGlvbiBkaWZmZXJlbnQgZnJvbVxuLy8gYGluaXRpYWxgXG5cblxuZnVuY3Rpb24gZ2V0Q2xpcHBpbmdQYXJlbnRzKGVsZW1lbnQpIHtcbiAgdmFyIGNsaXBwaW5nUGFyZW50cyA9IGxpc3RTY3JvbGxQYXJlbnRzKGVsZW1lbnQpO1xuICB2YXIgY2FuRXNjYXBlQ2xpcHBpbmcgPSBbJ2Fic29sdXRlJywgJ2ZpeGVkJ10uaW5kZXhPZihnZXRDb21wdXRlZFN0eWxlKGVsZW1lbnQpLnBvc2l0aW9uKSA+PSAwO1xuICB2YXIgY2xpcHBlckVsZW1lbnQgPSBjYW5Fc2NhcGVDbGlwcGluZyAmJiBpc0hUTUxFbGVtZW50KGVsZW1lbnQpID8gZ2V0T2Zmc2V0UGFyZW50KGVsZW1lbnQpIDogZWxlbWVudDtcblxuICBpZiAoIWlzRWxlbWVudChjbGlwcGVyRWxlbWVudCkpIHtcbiAgICByZXR1cm4gW107XG4gIH0gLy8gJEZsb3dGaXhNZTogaHR0cHM6Ly9naXRodWIuY29tL2ZhY2Vib29rL2Zsb3cvaXNzdWVzLzE0MTRcblxuXG4gIHJldHVybiBjbGlwcGluZ1BhcmVudHMuZmlsdGVyKGZ1bmN0aW9uIChjbGlwcGluZ1BhcmVudCkge1xuICAgIHJldHVybiBpc0VsZW1lbnQoY2xpcHBpbmdQYXJlbnQpICYmIGNvbnRhaW5zKGNsaXBwaW5nUGFyZW50LCBjbGlwcGVyRWxlbWVudCk7XG4gIH0pO1xufSAvLyBHZXRzIHRoZSBtYXhpbXVtIGFyZWEgdGhhdCB0aGUgZWxlbWVudCBpcyB2aXNpYmxlIGluIGR1ZSB0byBhbnkgbnVtYmVyIG9mXG4vLyBjbGlwcGluZyBwYXJlbnRzXG5cblxuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0Q2xpcHBpbmdSZWN0KGVsZW1lbnQsIGJvdW5kYXJ5LCByb290Qm91bmRhcnkpIHtcbiAgdmFyIG1haW5DbGlwcGluZ1BhcmVudHMgPSBib3VuZGFyeSA9PT0gJ2NsaXBwaW5nUGFyZW50cycgPyBnZXRDbGlwcGluZ1BhcmVudHMoZWxlbWVudCkgOiBbXS5jb25jYXQoYm91bmRhcnkpO1xuICB2YXIgY2xpcHBpbmdQYXJlbnRzID0gW10uY29uY2F0KG1haW5DbGlwcGluZ1BhcmVudHMsIFtyb290Qm91bmRhcnldKTtcbiAgdmFyIGZpcnN0Q2xpcHBpbmdQYXJlbnQgPSBjbGlwcGluZ1BhcmVudHNbMF07XG4gIHZhciBjbGlwcGluZ1JlY3QgPSBjbGlwcGluZ1BhcmVudHMucmVkdWNlKGZ1bmN0aW9uIChhY2NSZWN0LCBjbGlwcGluZ1BhcmVudCkge1xuICAgIHZhciByZWN0ID0gZ2V0Q2xpZW50UmVjdEZyb21NaXhlZFR5cGUoZWxlbWVudCwgY2xpcHBpbmdQYXJlbnQpO1xuICAgIHZhciBkZWNvcmF0aW9ucyA9IGdldERlY29yYXRpb25zKGlzSFRNTEVsZW1lbnQoY2xpcHBpbmdQYXJlbnQpID8gY2xpcHBpbmdQYXJlbnQgOiBnZXREb2N1bWVudEVsZW1lbnQoZWxlbWVudCkpO1xuICAgIGFjY1JlY3QudG9wID0gTWF0aC5tYXgocmVjdC50b3AgKyBkZWNvcmF0aW9ucy50b3AsIGFjY1JlY3QudG9wKTtcbiAgICBhY2NSZWN0LnJpZ2h0ID0gTWF0aC5taW4ocmVjdC5yaWdodCAtIGRlY29yYXRpb25zLnJpZ2h0LCBhY2NSZWN0LnJpZ2h0KTtcbiAgICBhY2NSZWN0LmJvdHRvbSA9IE1hdGgubWluKHJlY3QuYm90dG9tIC0gZGVjb3JhdGlvbnMuYm90dG9tLCBhY2NSZWN0LmJvdHRvbSk7XG4gICAgYWNjUmVjdC5sZWZ0ID0gTWF0aC5tYXgocmVjdC5sZWZ0ICsgZGVjb3JhdGlvbnMubGVmdCwgYWNjUmVjdC5sZWZ0KTtcbiAgICByZXR1cm4gYWNjUmVjdDtcbiAgfSwgZ2V0Q2xpZW50UmVjdEZyb21NaXhlZFR5cGUoZWxlbWVudCwgZmlyc3RDbGlwcGluZ1BhcmVudCkpO1xuICBjbGlwcGluZ1JlY3Qud2lkdGggPSBjbGlwcGluZ1JlY3QucmlnaHQgLSBjbGlwcGluZ1JlY3QubGVmdDtcbiAgY2xpcHBpbmdSZWN0LmhlaWdodCA9IGNsaXBwaW5nUmVjdC5ib3R0b20gLSBjbGlwcGluZ1JlY3QudG9wO1xuICBjbGlwcGluZ1JlY3QueCA9IGNsaXBwaW5nUmVjdC5sZWZ0O1xuICBjbGlwcGluZ1JlY3QueSA9IGNsaXBwaW5nUmVjdC50b3A7XG4gIHJldHVybiBjbGlwcGluZ1JlY3Q7XG59IiwiaW1wb3J0IGdldEJvdW5kaW5nQ2xpZW50UmVjdCBmcm9tIFwiLi9nZXRCb3VuZGluZ0NsaWVudFJlY3QuanNcIjtcbmltcG9ydCBnZXROb2RlU2Nyb2xsIGZyb20gXCIuL2dldE5vZGVTY3JvbGwuanNcIjtcbmltcG9ydCBnZXROb2RlTmFtZSBmcm9tIFwiLi9nZXROb2RlTmFtZS5qc1wiO1xuaW1wb3J0IHsgaXNIVE1MRWxlbWVudCB9IGZyb20gXCIuL2luc3RhbmNlT2YuanNcIjtcbmltcG9ydCBnZXRXaW5kb3dTY3JvbGxCYXJYIGZyb20gXCIuL2dldFdpbmRvd1Njcm9sbEJhclguanNcIjtcbmltcG9ydCBnZXREb2N1bWVudEVsZW1lbnQgZnJvbSBcIi4vZ2V0RG9jdW1lbnRFbGVtZW50LmpzXCI7XG5pbXBvcnQgaXNTY3JvbGxQYXJlbnQgZnJvbSBcIi4vaXNTY3JvbGxQYXJlbnQuanNcIjsgLy8gUmV0dXJucyB0aGUgY29tcG9zaXRlIHJlY3Qgb2YgYW4gZWxlbWVudCByZWxhdGl2ZSB0byBpdHMgb2Zmc2V0UGFyZW50LlxuLy8gQ29tcG9zaXRlIG1lYW5zIGl0IHRha2VzIGludG8gYWNjb3VudCB0cmFuc2Zvcm1zIGFzIHdlbGwgYXMgbGF5b3V0LlxuXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBnZXRDb21wb3NpdGVSZWN0KGVsZW1lbnRPclZpcnR1YWxFbGVtZW50LCBvZmZzZXRQYXJlbnQsIGlzRml4ZWQpIHtcbiAgaWYgKGlzRml4ZWQgPT09IHZvaWQgMCkge1xuICAgIGlzRml4ZWQgPSBmYWxzZTtcbiAgfVxuXG4gIHZhciBkb2N1bWVudEVsZW1lbnQgPSBnZXREb2N1bWVudEVsZW1lbnQob2Zmc2V0UGFyZW50KTtcbiAgdmFyIHJlY3QgPSBnZXRCb3VuZGluZ0NsaWVudFJlY3QoZWxlbWVudE9yVmlydHVhbEVsZW1lbnQpO1xuICB2YXIgc2Nyb2xsID0ge1xuICAgIHNjcm9sbExlZnQ6IDAsXG4gICAgc2Nyb2xsVG9wOiAwXG4gIH07XG4gIHZhciBvZmZzZXRzID0ge1xuICAgIHg6IDAsXG4gICAgeTogMFxuICB9O1xuXG4gIGlmICghaXNGaXhlZCkge1xuICAgIGlmIChnZXROb2RlTmFtZShvZmZzZXRQYXJlbnQpICE9PSAnYm9keScgfHwgLy8gaHR0cHM6Ly9naXRodWIuY29tL3BvcHBlcmpzL3BvcHBlci1jb3JlL2lzc3Vlcy8xMDc4XG4gICAgaXNTY3JvbGxQYXJlbnQoZG9jdW1lbnRFbGVtZW50KSkge1xuICAgICAgc2Nyb2xsID0gZ2V0Tm9kZVNjcm9sbChvZmZzZXRQYXJlbnQpO1xuICAgIH1cblxuICAgIGlmIChpc0hUTUxFbGVtZW50KG9mZnNldFBhcmVudCkpIHtcbiAgICAgIG9mZnNldHMgPSBnZXRCb3VuZGluZ0NsaWVudFJlY3Qob2Zmc2V0UGFyZW50KTtcbiAgICAgIG9mZnNldHMueCArPSBvZmZzZXRQYXJlbnQuY2xpZW50TGVmdDtcbiAgICAgIG9mZnNldHMueSArPSBvZmZzZXRQYXJlbnQuY2xpZW50VG9wO1xuICAgIH0gZWxzZSBpZiAoZG9jdW1lbnRFbGVtZW50KSB7XG4gICAgICBvZmZzZXRzLnggPSBnZXRXaW5kb3dTY3JvbGxCYXJYKGRvY3VtZW50RWxlbWVudCk7XG4gICAgfVxuICB9XG5cbiAgcmV0dXJuIHtcbiAgICB4OiByZWN0LmxlZnQgKyBzY3JvbGwuc2Nyb2xsTGVmdCAtIG9mZnNldHMueCxcbiAgICB5OiByZWN0LnRvcCArIHNjcm9sbC5zY3JvbGxUb3AgLSBvZmZzZXRzLnksXG4gICAgd2lkdGg6IHJlY3Qud2lkdGgsXG4gICAgaGVpZ2h0OiByZWN0LmhlaWdodFxuICB9O1xufSIsImltcG9ydCBnZXRXaW5kb3cgZnJvbSBcIi4vZ2V0V2luZG93LmpzXCI7XG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBnZXRDb21wdXRlZFN0eWxlKGVsZW1lbnQpIHtcbiAgcmV0dXJuIGdldFdpbmRvdyhlbGVtZW50KS5nZXRDb21wdXRlZFN0eWxlKGVsZW1lbnQpO1xufSIsImltcG9ydCBnZXRCb3JkZXJzIGZyb20gXCIuL2dldEJvcmRlcnMuanNcIjtcbmltcG9ydCBnZXROb2RlTmFtZSBmcm9tIFwiLi9nZXROb2RlTmFtZS5qc1wiO1xuaW1wb3J0IGdldFdpbmRvdyBmcm9tIFwiLi9nZXRXaW5kb3cuanNcIjtcbmltcG9ydCBnZXRXaW5kb3dTY3JvbGxCYXJYIGZyb20gXCIuL2dldFdpbmRvd1Njcm9sbEJhclguanNcIjsgLy8gQm9yZGVycyArIHNjcm9sbGJhcnNcblxuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0RGVjb3JhdGlvbnMoZWxlbWVudCkge1xuICB2YXIgd2luID0gZ2V0V2luZG93KGVsZW1lbnQpO1xuICB2YXIgYm9yZGVycyA9IGdldEJvcmRlcnMoZWxlbWVudCk7XG4gIHZhciBpc0hUTUwgPSBnZXROb2RlTmFtZShlbGVtZW50KSA9PT0gJ2h0bWwnO1xuICB2YXIgd2luU2Nyb2xsQmFyWCA9IGdldFdpbmRvd1Njcm9sbEJhclgoZWxlbWVudCk7XG4gIHZhciB4ID0gZWxlbWVudC5jbGllbnRXaWR0aCArIGJvcmRlcnMucmlnaHQ7XG4gIHZhciB5ID0gZWxlbWVudC5jbGllbnRIZWlnaHQgKyBib3JkZXJzLmJvdHRvbTsgLy8gSEFDSzpcbiAgLy8gZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LmNsaWVudEhlaWdodCBvbiBpT1MgcmVwb3J0cyB0aGUgaGVpZ2h0IG9mIHRoZVxuICAvLyB2aWV3cG9ydCBpbmNsdWRpbmcgdGhlIGJvdHRvbSBiYXIsIGV2ZW4gaWYgdGhlIGJvdHRvbSBiYXIgaXNuJ3QgdmlzaWJsZS5cbiAgLy8gSWYgdGhlIGRpZmZlcmVuY2UgYmV0d2VlbiB3aW5kb3cgaW5uZXJIZWlnaHQgYW5kIGh0bWwgY2xpZW50SGVpZ2h0IGlzIG1vcmVcbiAgLy8gdGhhbiA1MCwgd2UgYXNzdW1lIGl0J3MgYSBtb2JpbGUgYm90dG9tIGJhciBhbmQgaWdub3JlIHNjcm9sbGJhcnMuXG4gIC8vICogQSA1MHB4IHRoaWNrIHNjcm9sbGJhciBpcyBsaWtlbHkgbm9uLWV4aXN0ZW50IChtYWNPUyBpcyAxNXB4IGFuZCBXaW5kb3dzXG4gIC8vICAgaXMgYWJvdXQgMTdweClcbiAgLy8gKiBUaGUgbW9iaWxlIGJhciBpcyAxMTRweCB0YWxsXG5cbiAgaWYgKGlzSFRNTCAmJiB3aW4uaW5uZXJIZWlnaHQgLSBlbGVtZW50LmNsaWVudEhlaWdodCA+IDUwKSB7XG4gICAgeSA9IHdpbi5pbm5lckhlaWdodCAtIGJvcmRlcnMuYm90dG9tO1xuICB9XG5cbiAgcmV0dXJuIHtcbiAgICB0b3A6IGlzSFRNTCA/IDAgOiBlbGVtZW50LmNsaWVudFRvcCxcbiAgICByaWdodDogLy8gUlRMIHNjcm9sbGJhciAoc2Nyb2xsaW5nIGNvbnRhaW5lcnMgb25seSlcbiAgICBlbGVtZW50LmNsaWVudExlZnQgPiBib3JkZXJzLmxlZnQgPyBib3JkZXJzLnJpZ2h0IDogLy8gTFRSIHNjcm9sbGJhclxuICAgIGlzSFRNTCA/IHdpbi5pbm5lcldpZHRoIC0geCAtIHdpblNjcm9sbEJhclggOiBlbGVtZW50Lm9mZnNldFdpZHRoIC0geCxcbiAgICBib3R0b206IGlzSFRNTCA/IHdpbi5pbm5lckhlaWdodCAtIHkgOiBlbGVtZW50Lm9mZnNldEhlaWdodCAtIHksXG4gICAgbGVmdDogaXNIVE1MID8gd2luU2Nyb2xsQmFyWCA6IGVsZW1lbnQuY2xpZW50TGVmdFxuICB9O1xufSIsImltcG9ydCB7IGlzRWxlbWVudCB9IGZyb20gXCIuL2luc3RhbmNlT2YuanNcIjtcbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGdldERvY3VtZW50RWxlbWVudChlbGVtZW50KSB7XG4gIC8vICRGbG93Rml4TWU6IGFzc3VtZSBib2R5IGlzIGFsd2F5cyBhdmFpbGFibGVcbiAgcmV0dXJuIChpc0VsZW1lbnQoZWxlbWVudCkgPyBlbGVtZW50Lm93bmVyRG9jdW1lbnQgOiBlbGVtZW50LmRvY3VtZW50KS5kb2N1bWVudEVsZW1lbnQ7XG59IiwiaW1wb3J0IGdldENvbXBvc2l0ZVJlY3QgZnJvbSBcIi4vZ2V0Q29tcG9zaXRlUmVjdC5qc1wiO1xuaW1wb3J0IGdldFdpbmRvdyBmcm9tIFwiLi9nZXRXaW5kb3cuanNcIjtcbmltcG9ydCBnZXREb2N1bWVudEVsZW1lbnQgZnJvbSBcIi4vZ2V0RG9jdW1lbnRFbGVtZW50LmpzXCI7XG5pbXBvcnQgZ2V0V2luZG93U2Nyb2xsIGZyb20gXCIuL2dldFdpbmRvd1Njcm9sbC5qc1wiO1xuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0RG9jdW1lbnRSZWN0KGVsZW1lbnQpIHtcbiAgdmFyIHdpbiA9IGdldFdpbmRvdyhlbGVtZW50KTtcbiAgdmFyIHdpblNjcm9sbCA9IGdldFdpbmRvd1Njcm9sbChlbGVtZW50KTtcbiAgdmFyIGRvY3VtZW50UmVjdCA9IGdldENvbXBvc2l0ZVJlY3QoZ2V0RG9jdW1lbnRFbGVtZW50KGVsZW1lbnQpLCB3aW4pO1xuICBkb2N1bWVudFJlY3QuaGVpZ2h0ID0gTWF0aC5tYXgoZG9jdW1lbnRSZWN0LmhlaWdodCwgd2luLmlubmVySGVpZ2h0KTtcbiAgZG9jdW1lbnRSZWN0LndpZHRoID0gTWF0aC5tYXgoZG9jdW1lbnRSZWN0LndpZHRoLCB3aW4uaW5uZXJXaWR0aCk7XG4gIGRvY3VtZW50UmVjdC54ID0gLXdpblNjcm9sbC5zY3JvbGxMZWZ0O1xuICBkb2N1bWVudFJlY3QueSA9IC13aW5TY3JvbGwuc2Nyb2xsVG9wO1xuICByZXR1cm4gZG9jdW1lbnRSZWN0O1xufSIsImV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGdldEhUTUxFbGVtZW50U2Nyb2xsKGVsZW1lbnQpIHtcbiAgcmV0dXJuIHtcbiAgICBzY3JvbGxMZWZ0OiBlbGVtZW50LnNjcm9sbExlZnQsXG4gICAgc2Nyb2xsVG9wOiBlbGVtZW50LnNjcm9sbFRvcFxuICB9O1xufSIsIi8vIFJldHVybnMgdGhlIGxheW91dCByZWN0IG9mIGFuIGVsZW1lbnQgcmVsYXRpdmUgdG8gaXRzIG9mZnNldFBhcmVudC4gTGF5b3V0XG4vLyBtZWFucyBpdCBkb2Vzbid0IHRha2UgaW50byBhY2NvdW50IHRyYW5zZm9ybXMuXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBnZXRMYXlvdXRSZWN0KGVsZW1lbnQpIHtcbiAgcmV0dXJuIHtcbiAgICB4OiBlbGVtZW50Lm9mZnNldExlZnQsXG4gICAgeTogZWxlbWVudC5vZmZzZXRUb3AsXG4gICAgd2lkdGg6IGVsZW1lbnQub2Zmc2V0V2lkdGgsXG4gICAgaGVpZ2h0OiBlbGVtZW50Lm9mZnNldEhlaWdodFxuICB9O1xufSIsImV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGdldE5vZGVOYW1lKGVsZW1lbnQpIHtcbiAgcmV0dXJuIGVsZW1lbnQgPyAoZWxlbWVudC5ub2RlTmFtZSB8fCAnJykudG9Mb3dlckNhc2UoKSA6IG51bGw7XG59IiwiaW1wb3J0IGdldFdpbmRvd1Njcm9sbCBmcm9tIFwiLi9nZXRXaW5kb3dTY3JvbGwuanNcIjtcbmltcG9ydCBnZXRXaW5kb3cgZnJvbSBcIi4vZ2V0V2luZG93LmpzXCI7XG5pbXBvcnQgeyBpc0hUTUxFbGVtZW50IH0gZnJvbSBcIi4vaW5zdGFuY2VPZi5qc1wiO1xuaW1wb3J0IGdldEhUTUxFbGVtZW50U2Nyb2xsIGZyb20gXCIuL2dldEhUTUxFbGVtZW50U2Nyb2xsLmpzXCI7XG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBnZXROb2RlU2Nyb2xsKG5vZGUpIHtcbiAgaWYgKG5vZGUgPT09IGdldFdpbmRvdyhub2RlKSB8fCAhaXNIVE1MRWxlbWVudChub2RlKSkge1xuICAgIHJldHVybiBnZXRXaW5kb3dTY3JvbGwobm9kZSk7XG4gIH0gZWxzZSB7XG4gICAgcmV0dXJuIGdldEhUTUxFbGVtZW50U2Nyb2xsKG5vZGUpO1xuICB9XG59IiwiaW1wb3J0IGdldFdpbmRvdyBmcm9tIFwiLi9nZXRXaW5kb3cuanNcIjtcbmltcG9ydCBnZXROb2RlTmFtZSBmcm9tIFwiLi9nZXROb2RlTmFtZS5qc1wiO1xuaW1wb3J0IGdldENvbXB1dGVkU3R5bGUgZnJvbSBcIi4vZ2V0Q29tcHV0ZWRTdHlsZS5qc1wiO1xuaW1wb3J0IHsgaXNIVE1MRWxlbWVudCB9IGZyb20gXCIuL2luc3RhbmNlT2YuanNcIjtcbmltcG9ydCBpc1RhYmxlRWxlbWVudCBmcm9tIFwiLi9pc1RhYmxlRWxlbWVudC5qc1wiO1xuXG5mdW5jdGlvbiBnZXRUcnVlT2Zmc2V0UGFyZW50KGVsZW1lbnQpIHtcbiAgaWYgKCFpc0hUTUxFbGVtZW50KGVsZW1lbnQpIHx8IC8vIGh0dHBzOi8vZ2l0aHViLmNvbS9wb3BwZXJqcy9wb3BwZXItY29yZS9pc3N1ZXMvODM3XG4gIGdldENvbXB1dGVkU3R5bGUoZWxlbWVudCkucG9zaXRpb24gPT09ICdmaXhlZCcpIHtcbiAgICByZXR1cm4gbnVsbDtcbiAgfVxuXG4gIHJldHVybiBlbGVtZW50Lm9mZnNldFBhcmVudDtcbn1cblxuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0T2Zmc2V0UGFyZW50KGVsZW1lbnQpIHtcbiAgdmFyIHdpbmRvdyA9IGdldFdpbmRvdyhlbGVtZW50KTtcbiAgdmFyIG9mZnNldFBhcmVudCA9IGdldFRydWVPZmZzZXRQYXJlbnQoZWxlbWVudCk7IC8vIEZpbmQgdGhlIG5lYXJlc3Qgbm9uLXRhYmxlIG9mZnNldFBhcmVudFxuXG4gIHdoaWxlIChvZmZzZXRQYXJlbnQgJiYgaXNUYWJsZUVsZW1lbnQob2Zmc2V0UGFyZW50KSkge1xuICAgIG9mZnNldFBhcmVudCA9IGdldFRydWVPZmZzZXRQYXJlbnQob2Zmc2V0UGFyZW50KTtcbiAgfVxuXG4gIGlmIChvZmZzZXRQYXJlbnQgJiYgZ2V0Tm9kZU5hbWUob2Zmc2V0UGFyZW50KSA9PT0gJ2JvZHknICYmIGdldENvbXB1dGVkU3R5bGUob2Zmc2V0UGFyZW50KS5wb3NpdGlvbiA9PT0gJ3N0YXRpYycpIHtcbiAgICByZXR1cm4gd2luZG93O1xuICB9XG5cbiAgcmV0dXJuIG9mZnNldFBhcmVudCB8fCB3aW5kb3c7XG59IiwiaW1wb3J0IGdldE5vZGVOYW1lIGZyb20gXCIuL2dldE5vZGVOYW1lLmpzXCI7XG5pbXBvcnQgZ2V0RG9jdW1lbnRFbGVtZW50IGZyb20gXCIuL2dldERvY3VtZW50RWxlbWVudC5qc1wiO1xuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0UGFyZW50Tm9kZShlbGVtZW50KSB7XG4gIGlmIChnZXROb2RlTmFtZShlbGVtZW50KSA9PT0gJ2h0bWwnKSB7XG4gICAgcmV0dXJuIGVsZW1lbnQ7XG4gIH1cblxuICByZXR1cm4gKC8vICRGbG93Rml4TWU6IHRoaXMgaXMgYSBxdWlja2VyIChidXQgbGVzcyB0eXBlIHNhZmUpIHdheSB0byBzYXZlIHF1aXRlIHNvbWUgYnl0ZXMgZnJvbSB0aGUgYnVuZGxlXG4gICAgZWxlbWVudC5hc3NpZ25lZFNsb3QgfHwgLy8gc3RlcCBpbnRvIHRoZSBzaGFkb3cgRE9NIG9mIHRoZSBwYXJlbnQgb2YgYSBzbG90dGVkIG5vZGVcbiAgICBlbGVtZW50LnBhcmVudE5vZGUgfHwgLy8gRE9NIEVsZW1lbnQgZGV0ZWN0ZWRcbiAgICAvLyAkRmxvd0ZpeE1lOiBuZWVkIGEgYmV0dGVyIHdheSB0byBoYW5kbGUgdGhpcy4uLlxuICAgIGVsZW1lbnQuaG9zdCB8fCAvLyBTaGFkb3dSb290IGRldGVjdGVkXG4gICAgLy8gJEZsb3dGaXhNZTogSFRNTEVsZW1lbnQgaXMgYSBOb2RlXG4gICAgZ2V0RG9jdW1lbnRFbGVtZW50KGVsZW1lbnQpIC8vIGZhbGxiYWNrXG5cbiAgKTtcbn0iLCJpbXBvcnQgZ2V0UGFyZW50Tm9kZSBmcm9tIFwiLi9nZXRQYXJlbnROb2RlLmpzXCI7XG5pbXBvcnQgaXNTY3JvbGxQYXJlbnQgZnJvbSBcIi4vaXNTY3JvbGxQYXJlbnQuanNcIjtcbmltcG9ydCBnZXROb2RlTmFtZSBmcm9tIFwiLi9nZXROb2RlTmFtZS5qc1wiO1xuaW1wb3J0IHsgaXNIVE1MRWxlbWVudCB9IGZyb20gXCIuL2luc3RhbmNlT2YuanNcIjtcbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGdldFNjcm9sbFBhcmVudChub2RlKSB7XG4gIGlmIChbJ2h0bWwnLCAnYm9keScsICcjZG9jdW1lbnQnXS5pbmRleE9mKGdldE5vZGVOYW1lKG5vZGUpKSA+PSAwKSB7XG4gICAgLy8gJEZsb3dGaXhNZTogYXNzdW1lIGJvZHkgaXMgYWx3YXlzIGF2YWlsYWJsZVxuICAgIHJldHVybiBub2RlLm93bmVyRG9jdW1lbnQuYm9keTtcbiAgfVxuXG4gIGlmIChpc0hUTUxFbGVtZW50KG5vZGUpICYmIGlzU2Nyb2xsUGFyZW50KG5vZGUpKSB7XG4gICAgcmV0dXJuIG5vZGU7XG4gIH1cblxuICByZXR1cm4gZ2V0U2Nyb2xsUGFyZW50KGdldFBhcmVudE5vZGUobm9kZSkpO1xufSIsImltcG9ydCBnZXRXaW5kb3cgZnJvbSBcIi4vZ2V0V2luZG93LmpzXCI7XG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBnZXRWaWV3cG9ydFJlY3QoZWxlbWVudCkge1xuICB2YXIgd2luID0gZ2V0V2luZG93KGVsZW1lbnQpO1xuICB2YXIgdmlzdWFsVmlld3BvcnQgPSB3aW4udmlzdWFsVmlld3BvcnQ7XG4gIHZhciB3aWR0aCA9IHdpbi5pbm5lcldpZHRoO1xuICB2YXIgaGVpZ2h0ID0gd2luLmlubmVySGVpZ2h0OyAvLyBXZSBkb24ndCBrbm93IHdoaWNoIGJyb3dzZXJzIGhhdmUgYnVnZ3kgb3Igb2RkIGltcGxlbWVudGF0aW9ucyBvZiB0aGlzLCBzb1xuICAvLyBmb3Igbm93IHdlJ3JlIG9ubHkgYXBwbHlpbmcgaXQgdG8gaU9TIHRvIGZpeCB0aGUga2V5Ym9hcmQgaXNzdWUuXG4gIC8vIEludmVzdGlnYXRpb24gcmVxdWlyZWRcblxuICBpZiAodmlzdWFsVmlld3BvcnQgJiYgL2lQaG9uZXxpUG9kfGlQYWQvLnRlc3QobmF2aWdhdG9yLnBsYXRmb3JtKSkge1xuICAgIHdpZHRoID0gdmlzdWFsVmlld3BvcnQud2lkdGg7XG4gICAgaGVpZ2h0ID0gdmlzdWFsVmlld3BvcnQuaGVpZ2h0O1xuICB9XG5cbiAgcmV0dXJuIHtcbiAgICB3aWR0aDogd2lkdGgsXG4gICAgaGVpZ2h0OiBoZWlnaHQsXG4gICAgeDogMCxcbiAgICB5OiAwXG4gIH07XG59IiwiLyo6OiBpbXBvcnQgdHlwZSB7IFdpbmRvdyB9IGZyb20gJy4uL3R5cGVzJzsgKi9cblxuLyo6OiBkZWNsYXJlIGZ1bmN0aW9uIGdldFdpbmRvdyhub2RlOiBOb2RlIHwgV2luZG93KTogV2luZG93OyAqL1xuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0V2luZG93KG5vZGUpIHtcbiAgaWYgKG5vZGUudG9TdHJpbmcoKSAhPT0gJ1tvYmplY3QgV2luZG93XScpIHtcbiAgICB2YXIgb3duZXJEb2N1bWVudCA9IG5vZGUub3duZXJEb2N1bWVudDtcbiAgICByZXR1cm4gb3duZXJEb2N1bWVudCA/IG93bmVyRG9jdW1lbnQuZGVmYXVsdFZpZXcgOiB3aW5kb3c7XG4gIH1cblxuICByZXR1cm4gbm9kZTtcbn0iLCJpbXBvcnQgZ2V0V2luZG93IGZyb20gXCIuL2dldFdpbmRvdy5qc1wiO1xuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0V2luZG93U2Nyb2xsKG5vZGUpIHtcbiAgdmFyIHdpbiA9IGdldFdpbmRvdyhub2RlKTtcbiAgdmFyIHNjcm9sbExlZnQgPSB3aW4ucGFnZVhPZmZzZXQ7XG4gIHZhciBzY3JvbGxUb3AgPSB3aW4ucGFnZVlPZmZzZXQ7XG4gIHJldHVybiB7XG4gICAgc2Nyb2xsTGVmdDogc2Nyb2xsTGVmdCxcbiAgICBzY3JvbGxUb3A6IHNjcm9sbFRvcFxuICB9O1xufSIsImltcG9ydCBnZXRCb3VuZGluZ0NsaWVudFJlY3QgZnJvbSBcIi4vZ2V0Qm91bmRpbmdDbGllbnRSZWN0LmpzXCI7XG5pbXBvcnQgZ2V0RG9jdW1lbnRFbGVtZW50IGZyb20gXCIuL2dldERvY3VtZW50RWxlbWVudC5qc1wiO1xuaW1wb3J0IGdldFdpbmRvd1Njcm9sbCBmcm9tIFwiLi9nZXRXaW5kb3dTY3JvbGwuanNcIjtcbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGdldFdpbmRvd1Njcm9sbEJhclgoZWxlbWVudCkge1xuICAvLyBJZiA8aHRtbD4gaGFzIGEgQ1NTIHdpZHRoIGdyZWF0ZXIgdGhhbiB0aGUgdmlld3BvcnQsIHRoZW4gdGhpcyB3aWxsIGJlXG4gIC8vIGluY29ycmVjdCBmb3IgUlRMLlxuICAvLyBQb3BwZXIgMSBpcyBicm9rZW4gaW4gdGhpcyBjYXNlIGFuZCBuZXZlciBoYWQgYSBidWcgcmVwb3J0IHNvIGxldCdzIGFzc3VtZVxuICAvLyBpdCdzIG5vdCBhbiBpc3N1ZS4gSSBkb24ndCB0aGluayBhbnlvbmUgZXZlciBzcGVjaWZpZXMgd2lkdGggb24gPGh0bWw+XG4gIC8vIGFueXdheS5cbiAgLy8gQnJvd3NlcnMgd2hlcmUgdGhlIGxlZnQgc2Nyb2xsYmFyIGRvZXNuJ3QgY2F1c2UgYW4gaXNzdWUgcmVwb3J0IGAwYCBmb3JcbiAgLy8gdGhpcyAoZS5nLiBFZGdlIDIwMTksIElFMTEsIFNhZmFyaSlcbiAgcmV0dXJuIGdldEJvdW5kaW5nQ2xpZW50UmVjdChnZXREb2N1bWVudEVsZW1lbnQoZWxlbWVudCkpLmxlZnQgKyBnZXRXaW5kb3dTY3JvbGwoZWxlbWVudCkuc2Nyb2xsTGVmdDtcbn0iLCJpbXBvcnQgZ2V0V2luZG93IGZyb20gXCIuL2dldFdpbmRvdy5qc1wiO1xuLyo6OiBkZWNsYXJlIGZ1bmN0aW9uIGlzRWxlbWVudChub2RlOiBtaXhlZCk6IGJvb2xlYW4gJWNoZWNrcyhub2RlIGluc3RhbmNlb2ZcbiAgRWxlbWVudCk7ICovXG5cbmZ1bmN0aW9uIGlzRWxlbWVudChub2RlKSB7XG4gIHZhciBPd25FbGVtZW50ID0gZ2V0V2luZG93KG5vZGUpLkVsZW1lbnQ7XG4gIHJldHVybiBub2RlIGluc3RhbmNlb2YgT3duRWxlbWVudCB8fCBub2RlIGluc3RhbmNlb2YgRWxlbWVudDtcbn1cbi8qOjogZGVjbGFyZSBmdW5jdGlvbiBpc0hUTUxFbGVtZW50KG5vZGU6IG1peGVkKTogYm9vbGVhbiAlY2hlY2tzKG5vZGUgaW5zdGFuY2VvZlxuICBIVE1MRWxlbWVudCk7ICovXG5cblxuZnVuY3Rpb24gaXNIVE1MRWxlbWVudChub2RlKSB7XG4gIHZhciBPd25FbGVtZW50ID0gZ2V0V2luZG93KG5vZGUpLkhUTUxFbGVtZW50O1xuICByZXR1cm4gbm9kZSBpbnN0YW5jZW9mIE93bkVsZW1lbnQgfHwgbm9kZSBpbnN0YW5jZW9mIEhUTUxFbGVtZW50O1xufVxuXG5leHBvcnQgeyBpc0VsZW1lbnQsIGlzSFRNTEVsZW1lbnQgfTsiLCJpbXBvcnQgZ2V0Q29tcHV0ZWRTdHlsZSBmcm9tIFwiLi9nZXRDb21wdXRlZFN0eWxlLmpzXCI7XG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBpc1Njcm9sbFBhcmVudChlbGVtZW50KSB7XG4gIC8vIEZpcmVmb3ggd2FudHMgdXMgdG8gY2hlY2sgYC14YCBhbmQgYC15YCB2YXJpYXRpb25zIGFzIHdlbGxcbiAgdmFyIF9nZXRDb21wdXRlZFN0eWxlID0gZ2V0Q29tcHV0ZWRTdHlsZShlbGVtZW50KSxcbiAgICAgIG92ZXJmbG93ID0gX2dldENvbXB1dGVkU3R5bGUub3ZlcmZsb3csXG4gICAgICBvdmVyZmxvd1ggPSBfZ2V0Q29tcHV0ZWRTdHlsZS5vdmVyZmxvd1gsXG4gICAgICBvdmVyZmxvd1kgPSBfZ2V0Q29tcHV0ZWRTdHlsZS5vdmVyZmxvd1k7XG5cbiAgcmV0dXJuIC9hdXRvfHNjcm9sbHxvdmVybGF5fGhpZGRlbi8udGVzdChvdmVyZmxvdyArIG92ZXJmbG93WSArIG92ZXJmbG93WCk7XG59IiwiaW1wb3J0IGdldE5vZGVOYW1lIGZyb20gXCIuL2dldE5vZGVOYW1lLmpzXCI7XG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBpc1RhYmxlRWxlbWVudChlbGVtZW50KSB7XG4gIHJldHVybiBbJ3RhYmxlJywgJ3RkJywgJ3RoJ10uaW5kZXhPZihnZXROb2RlTmFtZShlbGVtZW50KSkgPj0gMDtcbn0iLCJpbXBvcnQgZ2V0U2Nyb2xsUGFyZW50IGZyb20gXCIuL2dldFNjcm9sbFBhcmVudC5qc1wiO1xuaW1wb3J0IGdldFBhcmVudE5vZGUgZnJvbSBcIi4vZ2V0UGFyZW50Tm9kZS5qc1wiO1xuaW1wb3J0IGdldE5vZGVOYW1lIGZyb20gXCIuL2dldE5vZGVOYW1lLmpzXCI7XG5pbXBvcnQgZ2V0V2luZG93IGZyb20gXCIuL2dldFdpbmRvdy5qc1wiO1xuaW1wb3J0IGlzU2Nyb2xsUGFyZW50IGZyb20gXCIuL2lzU2Nyb2xsUGFyZW50LmpzXCI7XG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBsaXN0U2Nyb2xsUGFyZW50cyhlbGVtZW50LCBsaXN0KSB7XG4gIGlmIChsaXN0ID09PSB2b2lkIDApIHtcbiAgICBsaXN0ID0gW107XG4gIH1cblxuICB2YXIgc2Nyb2xsUGFyZW50ID0gZ2V0U2Nyb2xsUGFyZW50KGVsZW1lbnQpO1xuICB2YXIgaXNCb2R5ID0gZ2V0Tm9kZU5hbWUoc2Nyb2xsUGFyZW50KSA9PT0gJ2JvZHknO1xuICB2YXIgd2luID0gZ2V0V2luZG93KHNjcm9sbFBhcmVudCk7XG4gIHZhciB0YXJnZXQgPSBpc0JvZHkgPyBbd2luXS5jb25jYXQod2luLnZpc3VhbFZpZXdwb3J0IHx8IFtdLCBpc1Njcm9sbFBhcmVudChzY3JvbGxQYXJlbnQpID8gc2Nyb2xsUGFyZW50IDogW10pIDogc2Nyb2xsUGFyZW50O1xuICB2YXIgdXBkYXRlZExpc3QgPSBsaXN0LmNvbmNhdCh0YXJnZXQpO1xuICByZXR1cm4gaXNCb2R5ID8gdXBkYXRlZExpc3QgOiAvLyAkRmxvd0ZpeE1lOiBpc0JvZHkgdGVsbHMgdXMgdGFyZ2V0IHdpbGwgYmUgYW4gSFRNTEVsZW1lbnQgaGVyZVxuICB1cGRhdGVkTGlzdC5jb25jYXQobGlzdFNjcm9sbFBhcmVudHMoZ2V0UGFyZW50Tm9kZSh0YXJnZXQpKSk7XG59IiwiZXhwb3J0IHZhciB0b3AgPSAndG9wJztcbmV4cG9ydCB2YXIgYm90dG9tID0gJ2JvdHRvbSc7XG5leHBvcnQgdmFyIHJpZ2h0ID0gJ3JpZ2h0JztcbmV4cG9ydCB2YXIgbGVmdCA9ICdsZWZ0JztcbmV4cG9ydCB2YXIgYXV0byA9ICdhdXRvJztcbmV4cG9ydCB2YXIgYmFzZVBsYWNlbWVudHMgPSBbdG9wLCBib3R0b20sIHJpZ2h0LCBsZWZ0XTtcbmV4cG9ydCB2YXIgc3RhcnQgPSAnc3RhcnQnO1xuZXhwb3J0IHZhciBlbmQgPSAnZW5kJztcbmV4cG9ydCB2YXIgY2xpcHBpbmdQYXJlbnRzID0gJ2NsaXBwaW5nUGFyZW50cyc7XG5leHBvcnQgdmFyIHZpZXdwb3J0ID0gJ3ZpZXdwb3J0JztcbmV4cG9ydCB2YXIgcG9wcGVyID0gJ3BvcHBlcic7XG5leHBvcnQgdmFyIHJlZmVyZW5jZSA9ICdyZWZlcmVuY2UnO1xuZXhwb3J0IHZhciB2YXJpYXRpb25QbGFjZW1lbnRzID0gLyojX19QVVJFX18qL2Jhc2VQbGFjZW1lbnRzLnJlZHVjZShmdW5jdGlvbiAoYWNjLCBwbGFjZW1lbnQpIHtcbiAgcmV0dXJuIGFjYy5jb25jYXQoW3BsYWNlbWVudCArIFwiLVwiICsgc3RhcnQsIHBsYWNlbWVudCArIFwiLVwiICsgZW5kXSk7XG59LCBbXSk7XG5leHBvcnQgdmFyIHBsYWNlbWVudHMgPSAvKiNfX1BVUkVfXyovW10uY29uY2F0KGJhc2VQbGFjZW1lbnRzLCBbYXV0b10pLnJlZHVjZShmdW5jdGlvbiAoYWNjLCBwbGFjZW1lbnQpIHtcbiAgcmV0dXJuIGFjYy5jb25jYXQoW3BsYWNlbWVudCwgcGxhY2VtZW50ICsgXCItXCIgKyBzdGFydCwgcGxhY2VtZW50ICsgXCItXCIgKyBlbmRdKTtcbn0sIFtdKTsgLy8gbW9kaWZpZXJzIHRoYXQgbmVlZCB0byByZWFkIHRoZSBET01cblxuZXhwb3J0IHZhciBiZWZvcmVSZWFkID0gJ2JlZm9yZVJlYWQnO1xuZXhwb3J0IHZhciByZWFkID0gJ3JlYWQnO1xuZXhwb3J0IHZhciBhZnRlclJlYWQgPSAnYWZ0ZXJSZWFkJzsgLy8gcHVyZS1sb2dpYyBtb2RpZmllcnNcblxuZXhwb3J0IHZhciBiZWZvcmVNYWluID0gJ2JlZm9yZU1haW4nO1xuZXhwb3J0IHZhciBtYWluID0gJ21haW4nO1xuZXhwb3J0IHZhciBhZnRlck1haW4gPSAnYWZ0ZXJNYWluJzsgLy8gbW9kaWZpZXIgd2l0aCB0aGUgcHVycG9zZSB0byB3cml0ZSB0byB0aGUgRE9NIChvciB3cml0ZSBpbnRvIGEgZnJhbWV3b3JrIHN0YXRlKVxuXG5leHBvcnQgdmFyIGJlZm9yZVdyaXRlID0gJ2JlZm9yZVdyaXRlJztcbmV4cG9ydCB2YXIgd3JpdGUgPSAnd3JpdGUnO1xuZXhwb3J0IHZhciBhZnRlcldyaXRlID0gJ2FmdGVyV3JpdGUnO1xuZXhwb3J0IHZhciBtb2RpZmllclBoYXNlcyA9IFtiZWZvcmVSZWFkLCByZWFkLCBhZnRlclJlYWQsIGJlZm9yZU1haW4sIG1haW4sIGFmdGVyTWFpbiwgYmVmb3JlV3JpdGUsIHdyaXRlLCBhZnRlcldyaXRlXTsiLCJpbXBvcnQgZ2V0Q29tcG9zaXRlUmVjdCBmcm9tIFwiLi9kb20tdXRpbHMvZ2V0Q29tcG9zaXRlUmVjdC5qc1wiO1xuaW1wb3J0IGdldExheW91dFJlY3QgZnJvbSBcIi4vZG9tLXV0aWxzL2dldExheW91dFJlY3QuanNcIjtcbmltcG9ydCBsaXN0U2Nyb2xsUGFyZW50cyBmcm9tIFwiLi9kb20tdXRpbHMvbGlzdFNjcm9sbFBhcmVudHMuanNcIjtcbmltcG9ydCBnZXRPZmZzZXRQYXJlbnQgZnJvbSBcIi4vZG9tLXV0aWxzL2dldE9mZnNldFBhcmVudC5qc1wiO1xuaW1wb3J0IGdldENvbXB1dGVkU3R5bGUgZnJvbSBcIi4vZG9tLXV0aWxzL2dldENvbXB1dGVkU3R5bGUuanNcIjtcbmltcG9ydCBvcmRlck1vZGlmaWVycyBmcm9tIFwiLi91dGlscy9vcmRlck1vZGlmaWVycy5qc1wiO1xuaW1wb3J0IGRlYm91bmNlIGZyb20gXCIuL3V0aWxzL2RlYm91bmNlLmpzXCI7XG5pbXBvcnQgdmFsaWRhdGVNb2RpZmllcnMgZnJvbSBcIi4vdXRpbHMvdmFsaWRhdGVNb2RpZmllcnMuanNcIjtcbmltcG9ydCB1bmlxdWVCeSBmcm9tIFwiLi91dGlscy91bmlxdWVCeS5qc1wiO1xuaW1wb3J0IGdldEJhc2VQbGFjZW1lbnQgZnJvbSBcIi4vdXRpbHMvZ2V0QmFzZVBsYWNlbWVudC5qc1wiO1xuaW1wb3J0IG1lcmdlQnlOYW1lIGZyb20gXCIuL3V0aWxzL21lcmdlQnlOYW1lLmpzXCI7XG5pbXBvcnQgeyBpc0VsZW1lbnQgfSBmcm9tIFwiLi9kb20tdXRpbHMvaW5zdGFuY2VPZi5qc1wiO1xuaW1wb3J0IHsgYXV0byB9IGZyb20gXCIuL2VudW1zLmpzXCI7XG5leHBvcnQgKiBmcm9tIFwiLi9lbnVtcy5qc1wiO1xudmFyIElOVkFMSURfRUxFTUVOVF9FUlJPUiA9ICdQb3BwZXI6IEludmFsaWQgcmVmZXJlbmNlIG9yIHBvcHBlciBhcmd1bWVudCBwcm92aWRlZC4gVGhleSBtdXN0IGJlIGVpdGhlciBhIERPTSBlbGVtZW50IG9yIHZpcnR1YWwgZWxlbWVudC4nO1xudmFyIElORklOSVRFX0xPT1BfRVJST1IgPSAnUG9wcGVyOiBBbiBpbmZpbml0ZSBsb29wIGluIHRoZSBtb2RpZmllcnMgY3ljbGUgaGFzIGJlZW4gZGV0ZWN0ZWQhIFRoZSBjeWNsZSBoYXMgYmVlbiBpbnRlcnJ1cHRlZCB0byBwcmV2ZW50IGEgYnJvd3NlciBjcmFzaC4nO1xudmFyIERFRkFVTFRfT1BUSU9OUyA9IHtcbiAgcGxhY2VtZW50OiAnYm90dG9tJyxcbiAgbW9kaWZpZXJzOiBbXSxcbiAgc3RyYXRlZ3k6ICdhYnNvbHV0ZSdcbn07XG5cbmZ1bmN0aW9uIGFyZVZhbGlkRWxlbWVudHMoKSB7XG4gIGZvciAodmFyIF9sZW4gPSBhcmd1bWVudHMubGVuZ3RoLCBhcmdzID0gbmV3IEFycmF5KF9sZW4pLCBfa2V5ID0gMDsgX2tleSA8IF9sZW47IF9rZXkrKykge1xuICAgIGFyZ3NbX2tleV0gPSBhcmd1bWVudHNbX2tleV07XG4gIH1cblxuICByZXR1cm4gIWFyZ3Muc29tZShmdW5jdGlvbiAoZWxlbWVudCkge1xuICAgIHJldHVybiAhKGVsZW1lbnQgJiYgdHlwZW9mIGVsZW1lbnQuZ2V0Qm91bmRpbmdDbGllbnRSZWN0ID09PSAnZnVuY3Rpb24nKTtcbiAgfSk7XG59XG5cbmV4cG9ydCBmdW5jdGlvbiBwb3BwZXJHZW5lcmF0b3IoZ2VuZXJhdG9yT3B0aW9ucykge1xuICBpZiAoZ2VuZXJhdG9yT3B0aW9ucyA9PT0gdm9pZCAwKSB7XG4gICAgZ2VuZXJhdG9yT3B0aW9ucyA9IHt9O1xuICB9XG5cbiAgdmFyIF9nZW5lcmF0b3JPcHRpb25zID0gZ2VuZXJhdG9yT3B0aW9ucyxcbiAgICAgIF9nZW5lcmF0b3JPcHRpb25zJGRlZiA9IF9nZW5lcmF0b3JPcHRpb25zLmRlZmF1bHRNb2RpZmllcnMsXG4gICAgICBkZWZhdWx0TW9kaWZpZXJzID0gX2dlbmVyYXRvck9wdGlvbnMkZGVmID09PSB2b2lkIDAgPyBbXSA6IF9nZW5lcmF0b3JPcHRpb25zJGRlZixcbiAgICAgIF9nZW5lcmF0b3JPcHRpb25zJGRlZjIgPSBfZ2VuZXJhdG9yT3B0aW9ucy5kZWZhdWx0T3B0aW9ucyxcbiAgICAgIGRlZmF1bHRPcHRpb25zID0gX2dlbmVyYXRvck9wdGlvbnMkZGVmMiA9PT0gdm9pZCAwID8gREVGQVVMVF9PUFRJT05TIDogX2dlbmVyYXRvck9wdGlvbnMkZGVmMjtcbiAgcmV0dXJuIGZ1bmN0aW9uIGNyZWF0ZVBvcHBlcihyZWZlcmVuY2UsIHBvcHBlciwgb3B0aW9ucykge1xuICAgIGlmIChvcHRpb25zID09PSB2b2lkIDApIHtcbiAgICAgIG9wdGlvbnMgPSBkZWZhdWx0T3B0aW9ucztcbiAgICB9XG5cbiAgICB2YXIgc3RhdGUgPSB7XG4gICAgICBwbGFjZW1lbnQ6ICdib3R0b20nLFxuICAgICAgb3JkZXJlZE1vZGlmaWVyczogW10sXG4gICAgICBvcHRpb25zOiBPYmplY3QuYXNzaWduKHt9LCBERUZBVUxUX09QVElPTlMsIHt9LCBkZWZhdWx0T3B0aW9ucyksXG4gICAgICBtb2RpZmllcnNEYXRhOiB7fSxcbiAgICAgIGVsZW1lbnRzOiB7XG4gICAgICAgIHJlZmVyZW5jZTogcmVmZXJlbmNlLFxuICAgICAgICBwb3BwZXI6IHBvcHBlclxuICAgICAgfSxcbiAgICAgIGF0dHJpYnV0ZXM6IHt9LFxuICAgICAgc3R5bGVzOiB7fVxuICAgIH07XG4gICAgdmFyIGVmZmVjdENsZWFudXBGbnMgPSBbXTtcbiAgICB2YXIgaXNEZXN0cm95ZWQgPSBmYWxzZTtcbiAgICB2YXIgaW5zdGFuY2UgPSB7XG4gICAgICBzdGF0ZTogc3RhdGUsXG4gICAgICBzZXRPcHRpb25zOiBmdW5jdGlvbiBzZXRPcHRpb25zKG9wdGlvbnMpIHtcbiAgICAgICAgY2xlYW51cE1vZGlmaWVyRWZmZWN0cygpO1xuICAgICAgICBzdGF0ZS5vcHRpb25zID0gT2JqZWN0LmFzc2lnbih7fSwgZGVmYXVsdE9wdGlvbnMsIHt9LCBzdGF0ZS5vcHRpb25zLCB7fSwgb3B0aW9ucyk7XG4gICAgICAgIHN0YXRlLnNjcm9sbFBhcmVudHMgPSB7XG4gICAgICAgICAgcmVmZXJlbmNlOiBpc0VsZW1lbnQocmVmZXJlbmNlKSA/IGxpc3RTY3JvbGxQYXJlbnRzKHJlZmVyZW5jZSkgOiByZWZlcmVuY2UuY29udGV4dEVsZW1lbnQgPyBsaXN0U2Nyb2xsUGFyZW50cyhyZWZlcmVuY2UuY29udGV4dEVsZW1lbnQpIDogW10sXG4gICAgICAgICAgcG9wcGVyOiBsaXN0U2Nyb2xsUGFyZW50cyhwb3BwZXIpXG4gICAgICAgIH07IC8vIE9yZGVycyB0aGUgbW9kaWZpZXJzIGJhc2VkIG9uIHRoZWlyIGRlcGVuZGVuY2llcyBhbmQgYHBoYXNlYFxuICAgICAgICAvLyBwcm9wZXJ0aWVzXG5cbiAgICAgICAgdmFyIG9yZGVyZWRNb2RpZmllcnMgPSBvcmRlck1vZGlmaWVycyhtZXJnZUJ5TmFtZShbXS5jb25jYXQoZGVmYXVsdE1vZGlmaWVycywgc3RhdGUub3B0aW9ucy5tb2RpZmllcnMpKSk7IC8vIFN0cmlwIG91dCBkaXNhYmxlZCBtb2RpZmllcnNcblxuICAgICAgICBzdGF0ZS5vcmRlcmVkTW9kaWZpZXJzID0gb3JkZXJlZE1vZGlmaWVycy5maWx0ZXIoZnVuY3Rpb24gKG0pIHtcbiAgICAgICAgICByZXR1cm4gbS5lbmFibGVkO1xuICAgICAgICB9KTsgLy8gVmFsaWRhdGUgdGhlIHByb3ZpZGVkIG1vZGlmaWVycyBzbyB0aGF0IHRoZSBjb25zdW1lciB3aWxsIGdldCB3YXJuZWRcbiAgICAgICAgLy8gaWYgb25lIG9mIHRoZSBtb2RpZmllcnMgaXMgaW52YWxpZCBmb3IgYW55IHJlYXNvblxuXG4gICAgICAgIGlmIChwcm9jZXNzLmVudi5OT0RFX0VOViAhPT0gXCJwcm9kdWN0aW9uXCIpIHtcbiAgICAgICAgICB2YXIgbW9kaWZpZXJzID0gdW5pcXVlQnkoW10uY29uY2F0KG9yZGVyZWRNb2RpZmllcnMsIHN0YXRlLm9wdGlvbnMubW9kaWZpZXJzKSwgZnVuY3Rpb24gKF9yZWYpIHtcbiAgICAgICAgICAgIHZhciBuYW1lID0gX3JlZi5uYW1lO1xuICAgICAgICAgICAgcmV0dXJuIG5hbWU7XG4gICAgICAgICAgfSk7XG4gICAgICAgICAgdmFsaWRhdGVNb2RpZmllcnMobW9kaWZpZXJzKTtcblxuICAgICAgICAgIGlmIChnZXRCYXNlUGxhY2VtZW50KHN0YXRlLm9wdGlvbnMucGxhY2VtZW50KSA9PT0gYXV0bykge1xuICAgICAgICAgICAgdmFyIGZsaXBNb2RpZmllciA9IHN0YXRlLm9yZGVyZWRNb2RpZmllcnMuZmluZChmdW5jdGlvbiAoX3JlZjIpIHtcbiAgICAgICAgICAgICAgdmFyIG5hbWUgPSBfcmVmMi5uYW1lO1xuICAgICAgICAgICAgICByZXR1cm4gbmFtZSA9PT0gJ2ZsaXAnO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIGlmICghZmxpcE1vZGlmaWVyKSB7XG4gICAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoWydQb3BwZXI6IFwiYXV0b1wiIHBsYWNlbWVudHMgcmVxdWlyZSB0aGUgXCJmbGlwXCIgbW9kaWZpZXIgYmUnLCAncHJlc2VudCBhbmQgZW5hYmxlZCB0byB3b3JrLiddLmpvaW4oJyAnKSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgdmFyIF9nZXRDb21wdXRlZFN0eWxlID0gZ2V0Q29tcHV0ZWRTdHlsZShwb3BwZXIpLFxuICAgICAgICAgICAgICBtYXJnaW5Ub3AgPSBfZ2V0Q29tcHV0ZWRTdHlsZS5tYXJnaW5Ub3AsXG4gICAgICAgICAgICAgIG1hcmdpblJpZ2h0ID0gX2dldENvbXB1dGVkU3R5bGUubWFyZ2luUmlnaHQsXG4gICAgICAgICAgICAgIG1hcmdpbkJvdHRvbSA9IF9nZXRDb21wdXRlZFN0eWxlLm1hcmdpbkJvdHRvbSxcbiAgICAgICAgICAgICAgbWFyZ2luTGVmdCA9IF9nZXRDb21wdXRlZFN0eWxlLm1hcmdpbkxlZnQ7IC8vIFdlIG5vIGxvbmdlciB0YWtlIGludG8gYWNjb3VudCBgbWFyZ2luc2Agb24gdGhlIHBvcHBlciwgYW5kIGl0IGNhblxuICAgICAgICAgIC8vIGNhdXNlIGJ1Z3Mgd2l0aCBwb3NpdGlvbmluZywgc28gd2UnbGwgd2FybiB0aGUgY29uc3VtZXJcblxuXG4gICAgICAgICAgaWYgKFttYXJnaW5Ub3AsIG1hcmdpblJpZ2h0LCBtYXJnaW5Cb3R0b20sIG1hcmdpbkxlZnRdLnNvbWUoZnVuY3Rpb24gKG1hcmdpbikge1xuICAgICAgICAgICAgcmV0dXJuIHBhcnNlRmxvYXQobWFyZ2luKTtcbiAgICAgICAgICB9KSkge1xuICAgICAgICAgICAgY29uc29sZS53YXJuKFsnUG9wcGVyOiBDU1MgXCJtYXJnaW5cIiBzdHlsZXMgY2Fubm90IGJlIHVzZWQgdG8gYXBwbHkgcGFkZGluZycsICdiZXR3ZWVuIHRoZSBwb3BwZXIgYW5kIGl0cyByZWZlcmVuY2UgZWxlbWVudCBvciBib3VuZGFyeS4nLCAnVG8gcmVwbGljYXRlIG1hcmdpbiwgdXNlIHRoZSBgb2Zmc2V0YCBtb2RpZmllciwgYXMgd2VsbCBhcycsICd0aGUgYHBhZGRpbmdgIG9wdGlvbiBpbiB0aGUgYHByZXZlbnRPdmVyZmxvd2AgYW5kIGBmbGlwYCcsICdtb2RpZmllcnMuJ10uam9pbignICcpKTtcbiAgICAgICAgICB9XG4gICAgICAgIH1cblxuICAgICAgICBydW5Nb2RpZmllckVmZmVjdHMoKTtcbiAgICAgICAgcmV0dXJuIGluc3RhbmNlLnVwZGF0ZSgpO1xuICAgICAgfSxcbiAgICAgIC8vIFN5bmMgdXBkYXRlIOKAkyBpdCB3aWxsIGFsd2F5cyBiZSBleGVjdXRlZCwgZXZlbiBpZiBub3QgbmVjZXNzYXJ5LiBUaGlzXG4gICAgICAvLyBpcyB1c2VmdWwgZm9yIGxvdyBmcmVxdWVuY3kgdXBkYXRlcyB3aGVyZSBzeW5jIGJlaGF2aW9yIHNpbXBsaWZpZXMgdGhlXG4gICAgICAvLyBsb2dpYy5cbiAgICAgIC8vIEZvciBoaWdoIGZyZXF1ZW5jeSB1cGRhdGVzIChlLmcuIGByZXNpemVgIGFuZCBgc2Nyb2xsYCBldmVudHMpLCBhbHdheXNcbiAgICAgIC8vIHByZWZlciB0aGUgYXN5bmMgUG9wcGVyI3VwZGF0ZSBtZXRob2RcbiAgICAgIGZvcmNlVXBkYXRlOiBmdW5jdGlvbiBmb3JjZVVwZGF0ZSgpIHtcbiAgICAgICAgaWYgKGlzRGVzdHJveWVkKSB7XG4gICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgdmFyIF9zdGF0ZSRlbGVtZW50cyA9IHN0YXRlLmVsZW1lbnRzLFxuICAgICAgICAgICAgcmVmZXJlbmNlID0gX3N0YXRlJGVsZW1lbnRzLnJlZmVyZW5jZSxcbiAgICAgICAgICAgIHBvcHBlciA9IF9zdGF0ZSRlbGVtZW50cy5wb3BwZXI7IC8vIERvbid0IHByb2NlZWQgaWYgYHJlZmVyZW5jZWAgb3IgYHBvcHBlcmAgYXJlIG5vdCB2YWxpZCBlbGVtZW50c1xuICAgICAgICAvLyBhbnltb3JlXG5cbiAgICAgICAgaWYgKCFhcmVWYWxpZEVsZW1lbnRzKHJlZmVyZW5jZSwgcG9wcGVyKSkge1xuICAgICAgICAgIGlmIChwcm9jZXNzLmVudi5OT0RFX0VOViAhPT0gXCJwcm9kdWN0aW9uXCIpIHtcbiAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoSU5WQUxJRF9FTEVNRU5UX0VSUk9SKTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICByZXR1cm47XG4gICAgICAgIH0gLy8gU3RvcmUgdGhlIHJlZmVyZW5jZSBhbmQgcG9wcGVyIHJlY3RzIHRvIGJlIHJlYWQgYnkgbW9kaWZpZXJzXG5cblxuICAgICAgICBzdGF0ZS5yZWN0cyA9IHtcbiAgICAgICAgICByZWZlcmVuY2U6IGdldENvbXBvc2l0ZVJlY3QocmVmZXJlbmNlLCBnZXRPZmZzZXRQYXJlbnQocG9wcGVyKSwgc3RhdGUub3B0aW9ucy5zdHJhdGVneSA9PT0gJ2ZpeGVkJyksXG4gICAgICAgICAgcG9wcGVyOiBnZXRMYXlvdXRSZWN0KHBvcHBlcilcbiAgICAgICAgfTsgLy8gTW9kaWZpZXJzIGhhdmUgdGhlIGFiaWxpdHkgdG8gcmVzZXQgdGhlIGN1cnJlbnQgdXBkYXRlIGN5Y2xlLiBUaGVcbiAgICAgICAgLy8gbW9zdCBjb21tb24gdXNlIGNhc2UgZm9yIHRoaXMgaXMgdGhlIGBmbGlwYCBtb2RpZmllciBjaGFuZ2luZyB0aGVcbiAgICAgICAgLy8gcGxhY2VtZW50LCB3aGljaCB0aGVuIG5lZWRzIHRvIHJlLXJ1biBhbGwgdGhlIG1vZGlmaWVycywgYmVjYXVzZSB0aGVcbiAgICAgICAgLy8gbG9naWMgd2FzIHByZXZpb3VzbHkgcmFuIGZvciB0aGUgcHJldmlvdXMgcGxhY2VtZW50IGFuZCBpcyB0aGVyZWZvcmVcbiAgICAgICAgLy8gc3RhbGUvaW5jb3JyZWN0XG5cbiAgICAgICAgc3RhdGUucmVzZXQgPSBmYWxzZTtcbiAgICAgICAgc3RhdGUucGxhY2VtZW50ID0gc3RhdGUub3B0aW9ucy5wbGFjZW1lbnQ7IC8vIE9uIGVhY2ggdXBkYXRlIGN5Y2xlLCB0aGUgYG1vZGlmaWVyc0RhdGFgIHByb3BlcnR5IGZvciBlYWNoIG1vZGlmaWVyXG4gICAgICAgIC8vIGlzIGZpbGxlZCB3aXRoIHRoZSBpbml0aWFsIGRhdGEgc3BlY2lmaWVkIGJ5IHRoZSBtb2RpZmllci4gVGhpcyBtZWFuc1xuICAgICAgICAvLyBpdCBkb2Vzbid0IHBlcnNpc3QgYW5kIGlzIGZyZXNoIG9uIGVhY2ggdXBkYXRlLlxuICAgICAgICAvLyBUbyBlbnN1cmUgcGVyc2lzdGVudCBkYXRhLCB1c2UgYCR7bmFtZX0jcGVyc2lzdGVudGBcblxuICAgICAgICBzdGF0ZS5vcmRlcmVkTW9kaWZpZXJzLmZvckVhY2goZnVuY3Rpb24gKG1vZGlmaWVyKSB7XG4gICAgICAgICAgcmV0dXJuIHN0YXRlLm1vZGlmaWVyc0RhdGFbbW9kaWZpZXIubmFtZV0gPSBPYmplY3QuYXNzaWduKHt9LCBtb2RpZmllci5kYXRhKTtcbiAgICAgICAgfSk7XG4gICAgICAgIHZhciBfX2RlYnVnX2xvb3BzX18gPSAwO1xuXG4gICAgICAgIGZvciAodmFyIGluZGV4ID0gMDsgaW5kZXggPCBzdGF0ZS5vcmRlcmVkTW9kaWZpZXJzLmxlbmd0aDsgaW5kZXgrKykge1xuICAgICAgICAgIGlmIChwcm9jZXNzLmVudi5OT0RFX0VOViAhPT0gXCJwcm9kdWN0aW9uXCIpIHtcbiAgICAgICAgICAgIF9fZGVidWdfbG9vcHNfXyArPSAxO1xuXG4gICAgICAgICAgICBpZiAoX19kZWJ1Z19sb29wc19fID4gMTAwKSB7XG4gICAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoSU5GSU5JVEVfTE9PUF9FUlJPUik7XG4gICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgfVxuICAgICAgICAgIH1cblxuICAgICAgICAgIGlmIChzdGF0ZS5yZXNldCA9PT0gdHJ1ZSkge1xuICAgICAgICAgICAgc3RhdGUucmVzZXQgPSBmYWxzZTtcbiAgICAgICAgICAgIGluZGV4ID0gLTE7XG4gICAgICAgICAgICBjb250aW51ZTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICB2YXIgX3N0YXRlJG9yZGVyZWRNb2RpZmllID0gc3RhdGUub3JkZXJlZE1vZGlmaWVyc1tpbmRleF0sXG4gICAgICAgICAgICAgIGZuID0gX3N0YXRlJG9yZGVyZWRNb2RpZmllLmZuLFxuICAgICAgICAgICAgICBfc3RhdGUkb3JkZXJlZE1vZGlmaWUyID0gX3N0YXRlJG9yZGVyZWRNb2RpZmllLm9wdGlvbnMsXG4gICAgICAgICAgICAgIF9vcHRpb25zID0gX3N0YXRlJG9yZGVyZWRNb2RpZmllMiA9PT0gdm9pZCAwID8ge30gOiBfc3RhdGUkb3JkZXJlZE1vZGlmaWUyLFxuICAgICAgICAgICAgICBuYW1lID0gX3N0YXRlJG9yZGVyZWRNb2RpZmllLm5hbWU7XG5cbiAgICAgICAgICBpZiAodHlwZW9mIGZuID09PSAnZnVuY3Rpb24nKSB7XG4gICAgICAgICAgICBzdGF0ZSA9IGZuKHtcbiAgICAgICAgICAgICAgc3RhdGU6IHN0YXRlLFxuICAgICAgICAgICAgICBvcHRpb25zOiBfb3B0aW9ucyxcbiAgICAgICAgICAgICAgbmFtZTogbmFtZSxcbiAgICAgICAgICAgICAgaW5zdGFuY2U6IGluc3RhbmNlXG4gICAgICAgICAgICB9KSB8fCBzdGF0ZTtcbiAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgIH0sXG4gICAgICAvLyBBc3luYyBhbmQgb3B0aW1pc3RpY2FsbHkgb3B0aW1pemVkIHVwZGF0ZSDigJMgaXQgd2lsbCBub3QgYmUgZXhlY3V0ZWQgaWZcbiAgICAgIC8vIG5vdCBuZWNlc3NhcnkgKGRlYm91bmNlZCB0byBydW4gYXQgbW9zdCBvbmNlLXBlci10aWNrKVxuICAgICAgdXBkYXRlOiBkZWJvdW5jZShmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiBuZXcgUHJvbWlzZShmdW5jdGlvbiAocmVzb2x2ZSkge1xuICAgICAgICAgIGluc3RhbmNlLmZvcmNlVXBkYXRlKCk7XG4gICAgICAgICAgcmVzb2x2ZShzdGF0ZSk7XG4gICAgICAgIH0pO1xuICAgICAgfSksXG4gICAgICBkZXN0cm95OiBmdW5jdGlvbiBkZXN0cm95KCkge1xuICAgICAgICBjbGVhbnVwTW9kaWZpZXJFZmZlY3RzKCk7XG4gICAgICAgIGlzRGVzdHJveWVkID0gdHJ1ZTtcbiAgICAgIH1cbiAgICB9O1xuXG4gICAgaWYgKCFhcmVWYWxpZEVsZW1lbnRzKHJlZmVyZW5jZSwgcG9wcGVyKSkge1xuICAgICAgaWYgKHByb2Nlc3MuZW52Lk5PREVfRU5WICE9PSBcInByb2R1Y3Rpb25cIikge1xuICAgICAgICBjb25zb2xlLmVycm9yKElOVkFMSURfRUxFTUVOVF9FUlJPUik7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiBpbnN0YW5jZTtcbiAgICB9XG5cbiAgICBpbnN0YW5jZS5zZXRPcHRpb25zKG9wdGlvbnMpLnRoZW4oZnVuY3Rpb24gKHN0YXRlKSB7XG4gICAgICBpZiAoIWlzRGVzdHJveWVkICYmIG9wdGlvbnMub25GaXJzdFVwZGF0ZSkge1xuICAgICAgICBvcHRpb25zLm9uRmlyc3RVcGRhdGUoc3RhdGUpO1xuICAgICAgfVxuICAgIH0pOyAvLyBNb2RpZmllcnMgaGF2ZSB0aGUgYWJpbGl0eSB0byBleGVjdXRlIGFyYml0cmFyeSBjb2RlIGJlZm9yZSB0aGUgZmlyc3RcbiAgICAvLyB1cGRhdGUgY3ljbGUgcnVucy4gVGhleSB3aWxsIGJlIGV4ZWN1dGVkIGluIHRoZSBzYW1lIG9yZGVyIGFzIHRoZSB1cGRhdGVcbiAgICAvLyBjeWNsZS4gVGhpcyBpcyB1c2VmdWwgd2hlbiBhIG1vZGlmaWVyIGFkZHMgc29tZSBwZXJzaXN0ZW50IGRhdGEgdGhhdFxuICAgIC8vIG90aGVyIG1vZGlmaWVycyBuZWVkIHRvIHVzZSwgYnV0IHRoZSBtb2RpZmllciBpcyBydW4gYWZ0ZXIgdGhlIGRlcGVuZGVudFxuICAgIC8vIG9uZS5cblxuICAgIGZ1bmN0aW9uIHJ1bk1vZGlmaWVyRWZmZWN0cygpIHtcbiAgICAgIHN0YXRlLm9yZGVyZWRNb2RpZmllcnMuZm9yRWFjaChmdW5jdGlvbiAoX3JlZjMpIHtcbiAgICAgICAgdmFyIG5hbWUgPSBfcmVmMy5uYW1lLFxuICAgICAgICAgICAgX3JlZjMkb3B0aW9ucyA9IF9yZWYzLm9wdGlvbnMsXG4gICAgICAgICAgICBvcHRpb25zID0gX3JlZjMkb3B0aW9ucyA9PT0gdm9pZCAwID8ge30gOiBfcmVmMyRvcHRpb25zLFxuICAgICAgICAgICAgZWZmZWN0ID0gX3JlZjMuZWZmZWN0O1xuXG4gICAgICAgIGlmICh0eXBlb2YgZWZmZWN0ID09PSAnZnVuY3Rpb24nKSB7XG4gICAgICAgICAgdmFyIGNsZWFudXBGbiA9IGVmZmVjdCh7XG4gICAgICAgICAgICBzdGF0ZTogc3RhdGUsXG4gICAgICAgICAgICBuYW1lOiBuYW1lLFxuICAgICAgICAgICAgaW5zdGFuY2U6IGluc3RhbmNlLFxuICAgICAgICAgICAgb3B0aW9uczogb3B0aW9uc1xuICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgdmFyIG5vb3BGbiA9IGZ1bmN0aW9uIG5vb3BGbigpIHt9O1xuXG4gICAgICAgICAgZWZmZWN0Q2xlYW51cEZucy5wdXNoKGNsZWFudXBGbiB8fCBub29wRm4pO1xuICAgICAgICB9XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICBmdW5jdGlvbiBjbGVhbnVwTW9kaWZpZXJFZmZlY3RzKCkge1xuICAgICAgZWZmZWN0Q2xlYW51cEZucy5mb3JFYWNoKGZ1bmN0aW9uIChmbikge1xuICAgICAgICByZXR1cm4gZm4oKTtcbiAgICAgIH0pO1xuICAgICAgZWZmZWN0Q2xlYW51cEZucyA9IFtdO1xuICAgIH1cblxuICAgIHJldHVybiBpbnN0YW5jZTtcbiAgfTtcbn1cbmV4cG9ydCB2YXIgY3JlYXRlUG9wcGVyID0gLyojX19QVVJFX18qL3BvcHBlckdlbmVyYXRvcigpOyIsImltcG9ydCBnZXROb2RlTmFtZSBmcm9tIFwiLi4vZG9tLXV0aWxzL2dldE5vZGVOYW1lLmpzXCI7XG5pbXBvcnQgeyBpc0hUTUxFbGVtZW50IH0gZnJvbSBcIi4uL2RvbS11dGlscy9pbnN0YW5jZU9mLmpzXCI7IC8vIFRoaXMgbW9kaWZpZXIgdGFrZXMgdGhlIHN0eWxlcyBwcmVwYXJlZCBieSB0aGUgYGNvbXB1dGVTdHlsZXNgIG1vZGlmaWVyXG4vLyBhbmQgYXBwbGllcyB0aGVtIHRvIHRoZSBIVE1MRWxlbWVudHMgc3VjaCBhcyBwb3BwZXIgYW5kIGFycm93XG5cbmZ1bmN0aW9uIGFwcGx5U3R5bGVzKF9yZWYpIHtcbiAgdmFyIHN0YXRlID0gX3JlZi5zdGF0ZTtcbiAgT2JqZWN0LmtleXMoc3RhdGUuZWxlbWVudHMpLmZvckVhY2goZnVuY3Rpb24gKG5hbWUpIHtcbiAgICB2YXIgc3R5bGUgPSBzdGF0ZS5zdHlsZXNbbmFtZV0gfHwge307XG4gICAgdmFyIGF0dHJpYnV0ZXMgPSBzdGF0ZS5hdHRyaWJ1dGVzW25hbWVdIHx8IHt9O1xuICAgIHZhciBlbGVtZW50ID0gc3RhdGUuZWxlbWVudHNbbmFtZV07IC8vIGFycm93IGlzIG9wdGlvbmFsICsgdmlydHVhbCBlbGVtZW50c1xuXG4gICAgaWYgKCFpc0hUTUxFbGVtZW50KGVsZW1lbnQpIHx8ICFnZXROb2RlTmFtZShlbGVtZW50KSkge1xuICAgICAgcmV0dXJuO1xuICAgIH0gLy8gRmxvdyBkb2Vzbid0IHN1cHBvcnQgdG8gZXh0ZW5kIHRoaXMgcHJvcGVydHksIGJ1dCBpdCdzIHRoZSBtb3N0XG4gICAgLy8gZWZmZWN0aXZlIHdheSB0byBhcHBseSBzdHlsZXMgdG8gYW4gSFRNTEVsZW1lbnRcbiAgICAvLyAkRmxvd0ZpeE1lXG5cblxuICAgIE9iamVjdC5hc3NpZ24oZWxlbWVudC5zdHlsZSwgc3R5bGUpO1xuICAgIE9iamVjdC5rZXlzKGF0dHJpYnV0ZXMpLmZvckVhY2goZnVuY3Rpb24gKG5hbWUpIHtcbiAgICAgIHZhciB2YWx1ZSA9IGF0dHJpYnV0ZXNbbmFtZV07XG5cbiAgICAgIGlmICh2YWx1ZSA9PT0gZmFsc2UpIHtcbiAgICAgICAgZWxlbWVudC5yZW1vdmVBdHRyaWJ1dGUobmFtZSk7XG4gICAgICB9IGVsc2Uge1xuICAgICAgICBlbGVtZW50LnNldEF0dHJpYnV0ZShuYW1lLCB2YWx1ZSA9PT0gdHJ1ZSA/ICcnIDogdmFsdWUpO1xuICAgICAgfVxuICAgIH0pO1xuICB9KTtcbn1cblxuZnVuY3Rpb24gZWZmZWN0KF9yZWYyKSB7XG4gIHZhciBzdGF0ZSA9IF9yZWYyLnN0YXRlO1xuICB2YXIgaW5pdGlhbFN0eWxlcyA9IHtcbiAgICBwb3BwZXI6IHtcbiAgICAgIHBvc2l0aW9uOiBzdGF0ZS5vcHRpb25zLnN0cmF0ZWd5LFxuICAgICAgbGVmdDogJzAnLFxuICAgICAgdG9wOiAnMCcsXG4gICAgICBtYXJnaW46ICcwJ1xuICAgIH0sXG4gICAgYXJyb3c6IHtcbiAgICAgIHBvc2l0aW9uOiAnYWJzb2x1dGUnXG4gICAgfSxcbiAgICByZWZlcmVuY2U6IHt9XG4gIH07XG4gIE9iamVjdC5hc3NpZ24oc3RhdGUuZWxlbWVudHMucG9wcGVyLnN0eWxlLCBpbml0aWFsU3R5bGVzLnBvcHBlcik7XG5cbiAgaWYgKHN0YXRlLmVsZW1lbnRzLmFycm93KSB7XG4gICAgT2JqZWN0LmFzc2lnbihzdGF0ZS5lbGVtZW50cy5hcnJvdy5zdHlsZSwgaW5pdGlhbFN0eWxlcy5hcnJvdyk7XG4gIH1cblxuICByZXR1cm4gZnVuY3Rpb24gKCkge1xuICAgIE9iamVjdC5rZXlzKHN0YXRlLmVsZW1lbnRzKS5mb3JFYWNoKGZ1bmN0aW9uIChuYW1lKSB7XG4gICAgICB2YXIgZWxlbWVudCA9IHN0YXRlLmVsZW1lbnRzW25hbWVdO1xuICAgICAgdmFyIGF0dHJpYnV0ZXMgPSBzdGF0ZS5hdHRyaWJ1dGVzW25hbWVdIHx8IHt9O1xuICAgICAgdmFyIHN0eWxlUHJvcGVydGllcyA9IE9iamVjdC5rZXlzKHN0YXRlLnN0eWxlcy5oYXNPd25Qcm9wZXJ0eShuYW1lKSA/IHN0YXRlLnN0eWxlc1tuYW1lXSA6IGluaXRpYWxTdHlsZXNbbmFtZV0pOyAvLyBTZXQgYWxsIHZhbHVlcyB0byBhbiBlbXB0eSBzdHJpbmcgdG8gdW5zZXQgdGhlbVxuXG4gICAgICB2YXIgc3R5bGUgPSBzdHlsZVByb3BlcnRpZXMucmVkdWNlKGZ1bmN0aW9uIChzdHlsZSwgcHJvcGVydHkpIHtcbiAgICAgICAgc3R5bGVbcHJvcGVydHldID0gJyc7XG4gICAgICAgIHJldHVybiBzdHlsZTtcbiAgICAgIH0sIHt9KTsgLy8gYXJyb3cgaXMgb3B0aW9uYWwgKyB2aXJ0dWFsIGVsZW1lbnRzXG5cbiAgICAgIGlmICghaXNIVE1MRWxlbWVudChlbGVtZW50KSB8fCAhZ2V0Tm9kZU5hbWUoZWxlbWVudCkpIHtcbiAgICAgICAgcmV0dXJuO1xuICAgICAgfSAvLyBGbG93IGRvZXNuJ3Qgc3VwcG9ydCB0byBleHRlbmQgdGhpcyBwcm9wZXJ0eSwgYnV0IGl0J3MgdGhlIG1vc3RcbiAgICAgIC8vIGVmZmVjdGl2ZSB3YXkgdG8gYXBwbHkgc3R5bGVzIHRvIGFuIEhUTUxFbGVtZW50XG4gICAgICAvLyAkRmxvd0ZpeE1lXG5cblxuICAgICAgT2JqZWN0LmFzc2lnbihlbGVtZW50LnN0eWxlLCBzdHlsZSk7XG4gICAgICBPYmplY3Qua2V5cyhhdHRyaWJ1dGVzKS5mb3JFYWNoKGZ1bmN0aW9uIChhdHRyaWJ1dGUpIHtcbiAgICAgICAgZWxlbWVudC5yZW1vdmVBdHRyaWJ1dGUoYXR0cmlidXRlKTtcbiAgICAgIH0pO1xuICAgIH0pO1xuICB9O1xufSAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgaW1wb3J0L25vLXVudXNlZC1tb2R1bGVzXG5cblxuZXhwb3J0IGRlZmF1bHQge1xuICBuYW1lOiAnYXBwbHlTdHlsZXMnLFxuICBlbmFibGVkOiB0cnVlLFxuICBwaGFzZTogJ3dyaXRlJyxcbiAgZm46IGFwcGx5U3R5bGVzLFxuICBlZmZlY3Q6IGVmZmVjdCxcbiAgcmVxdWlyZXM6IFsnY29tcHV0ZVN0eWxlcyddXG59OyIsImltcG9ydCBnZXRCYXNlUGxhY2VtZW50IGZyb20gXCIuLi91dGlscy9nZXRCYXNlUGxhY2VtZW50LmpzXCI7XG5pbXBvcnQgZ2V0TGF5b3V0UmVjdCBmcm9tIFwiLi4vZG9tLXV0aWxzL2dldExheW91dFJlY3QuanNcIjtcbmltcG9ydCBjb250YWlucyBmcm9tIFwiLi4vZG9tLXV0aWxzL2NvbnRhaW5zLmpzXCI7XG5pbXBvcnQgZ2V0T2Zmc2V0UGFyZW50IGZyb20gXCIuLi9kb20tdXRpbHMvZ2V0T2Zmc2V0UGFyZW50LmpzXCI7XG5pbXBvcnQgZ2V0TWFpbkF4aXNGcm9tUGxhY2VtZW50IGZyb20gXCIuLi91dGlscy9nZXRNYWluQXhpc0Zyb21QbGFjZW1lbnQuanNcIjtcbmltcG9ydCB3aXRoaW4gZnJvbSBcIi4uL3V0aWxzL3dpdGhpbi5qc1wiO1xuaW1wb3J0IG1lcmdlUGFkZGluZ09iamVjdCBmcm9tIFwiLi4vdXRpbHMvbWVyZ2VQYWRkaW5nT2JqZWN0LmpzXCI7XG5pbXBvcnQgZXhwYW5kVG9IYXNoTWFwIGZyb20gXCIuLi91dGlscy9leHBhbmRUb0hhc2hNYXAuanNcIjtcbmltcG9ydCB7IGxlZnQsIHJpZ2h0LCBiYXNlUGxhY2VtZW50cywgdG9wLCBib3R0b20gfSBmcm9tIFwiLi4vZW51bXMuanNcIjtcbmltcG9ydCB7IGlzSFRNTEVsZW1lbnQgfSBmcm9tIFwiLi4vZG9tLXV0aWxzL2luc3RhbmNlT2YuanNcIjsgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGltcG9ydC9uby11bnVzZWQtbW9kdWxlc1xuXG5mdW5jdGlvbiBhcnJvdyhfcmVmKSB7XG4gIHZhciBfc3RhdGUkbW9kaWZpZXJzRGF0YSQ7XG5cbiAgdmFyIHN0YXRlID0gX3JlZi5zdGF0ZSxcbiAgICAgIG5hbWUgPSBfcmVmLm5hbWU7XG4gIHZhciBhcnJvd0VsZW1lbnQgPSBzdGF0ZS5lbGVtZW50cy5hcnJvdztcbiAgdmFyIHBvcHBlck9mZnNldHMgPSBzdGF0ZS5tb2RpZmllcnNEYXRhLnBvcHBlck9mZnNldHM7XG4gIHZhciBiYXNlUGxhY2VtZW50ID0gZ2V0QmFzZVBsYWNlbWVudChzdGF0ZS5wbGFjZW1lbnQpO1xuICB2YXIgYXhpcyA9IGdldE1haW5BeGlzRnJvbVBsYWNlbWVudChiYXNlUGxhY2VtZW50KTtcbiAgdmFyIGlzVmVydGljYWwgPSBbbGVmdCwgcmlnaHRdLmluZGV4T2YoYmFzZVBsYWNlbWVudCkgPj0gMDtcbiAgdmFyIGxlbiA9IGlzVmVydGljYWwgPyAnaGVpZ2h0JyA6ICd3aWR0aCc7XG5cbiAgaWYgKCFhcnJvd0VsZW1lbnQgfHwgIXBvcHBlck9mZnNldHMpIHtcbiAgICByZXR1cm47XG4gIH1cblxuICB2YXIgcGFkZGluZ09iamVjdCA9IHN0YXRlLm1vZGlmaWVyc0RhdGFbbmFtZSArIFwiI3BlcnNpc3RlbnRcIl0ucGFkZGluZztcbiAgdmFyIGFycm93UmVjdCA9IGdldExheW91dFJlY3QoYXJyb3dFbGVtZW50KTtcbiAgdmFyIG1pblByb3AgPSBheGlzID09PSAneScgPyB0b3AgOiBsZWZ0O1xuICB2YXIgbWF4UHJvcCA9IGF4aXMgPT09ICd5JyA/IGJvdHRvbSA6IHJpZ2h0O1xuICB2YXIgZW5kRGlmZiA9IHN0YXRlLnJlY3RzLnJlZmVyZW5jZVtsZW5dICsgc3RhdGUucmVjdHMucmVmZXJlbmNlW2F4aXNdIC0gcG9wcGVyT2Zmc2V0c1theGlzXSAtIHN0YXRlLnJlY3RzLnBvcHBlcltsZW5dO1xuICB2YXIgc3RhcnREaWZmID0gcG9wcGVyT2Zmc2V0c1theGlzXSAtIHN0YXRlLnJlY3RzLnJlZmVyZW5jZVtheGlzXTtcbiAgdmFyIGFycm93T2Zmc2V0UGFyZW50ID0gZ2V0T2Zmc2V0UGFyZW50KGFycm93RWxlbWVudCk7XG4gIHZhciBjbGllbnRTaXplID0gYXJyb3dPZmZzZXRQYXJlbnQgPyBheGlzID09PSAneScgPyBhcnJvd09mZnNldFBhcmVudC5jbGllbnRIZWlnaHQgfHwgMCA6IGFycm93T2Zmc2V0UGFyZW50LmNsaWVudFdpZHRoIHx8IDAgOiAwO1xuICB2YXIgY2VudGVyVG9SZWZlcmVuY2UgPSBlbmREaWZmIC8gMiAtIHN0YXJ0RGlmZiAvIDI7IC8vIE1ha2Ugc3VyZSB0aGUgYXJyb3cgZG9lc24ndCBvdmVyZmxvdyB0aGUgcG9wcGVyIGlmIHRoZSBjZW50ZXIgcG9pbnQgaXNcbiAgLy8gb3V0c2lkZSBvZiB0aGUgcG9wcGVyIGJvdW5kc1xuXG4gIHZhciBtaW4gPSBwYWRkaW5nT2JqZWN0W21pblByb3BdO1xuICB2YXIgbWF4ID0gY2xpZW50U2l6ZSAtIGFycm93UmVjdFtsZW5dIC0gcGFkZGluZ09iamVjdFttYXhQcm9wXTtcbiAgdmFyIGNlbnRlciA9IGNsaWVudFNpemUgLyAyIC0gYXJyb3dSZWN0W2xlbl0gLyAyICsgY2VudGVyVG9SZWZlcmVuY2U7XG4gIHZhciBvZmZzZXQgPSB3aXRoaW4obWluLCBjZW50ZXIsIG1heCk7IC8vIFByZXZlbnRzIGJyZWFraW5nIHN5bnRheCBoaWdobGlnaHRpbmcuLi5cblxuICB2YXIgYXhpc1Byb3AgPSBheGlzO1xuICBzdGF0ZS5tb2RpZmllcnNEYXRhW25hbWVdID0gKF9zdGF0ZSRtb2RpZmllcnNEYXRhJCA9IHt9LCBfc3RhdGUkbW9kaWZpZXJzRGF0YSRbYXhpc1Byb3BdID0gb2Zmc2V0LCBfc3RhdGUkbW9kaWZpZXJzRGF0YSQuY2VudGVyT2Zmc2V0ID0gb2Zmc2V0IC0gY2VudGVyLCBfc3RhdGUkbW9kaWZpZXJzRGF0YSQpO1xufVxuXG5mdW5jdGlvbiBlZmZlY3QoX3JlZjIpIHtcbiAgdmFyIHN0YXRlID0gX3JlZjIuc3RhdGUsXG4gICAgICBvcHRpb25zID0gX3JlZjIub3B0aW9ucyxcbiAgICAgIG5hbWUgPSBfcmVmMi5uYW1lO1xuICB2YXIgX29wdGlvbnMkZWxlbWVudCA9IG9wdGlvbnMuZWxlbWVudCxcbiAgICAgIGFycm93RWxlbWVudCA9IF9vcHRpb25zJGVsZW1lbnQgPT09IHZvaWQgMCA/ICdbZGF0YS1wb3BwZXItYXJyb3ddJyA6IF9vcHRpb25zJGVsZW1lbnQsXG4gICAgICBfb3B0aW9ucyRwYWRkaW5nID0gb3B0aW9ucy5wYWRkaW5nLFxuICAgICAgcGFkZGluZyA9IF9vcHRpb25zJHBhZGRpbmcgPT09IHZvaWQgMCA/IDAgOiBfb3B0aW9ucyRwYWRkaW5nO1xuXG4gIGlmIChhcnJvd0VsZW1lbnQgPT0gbnVsbCkge1xuICAgIHJldHVybjtcbiAgfSAvLyBDU1Mgc2VsZWN0b3JcblxuXG4gIGlmICh0eXBlb2YgYXJyb3dFbGVtZW50ID09PSAnc3RyaW5nJykge1xuICAgIGFycm93RWxlbWVudCA9IHN0YXRlLmVsZW1lbnRzLnBvcHBlci5xdWVyeVNlbGVjdG9yKGFycm93RWxlbWVudCk7XG5cbiAgICBpZiAoIWFycm93RWxlbWVudCkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cbiAgfVxuXG4gIGlmIChwcm9jZXNzLmVudi5OT0RFX0VOViAhPT0gXCJwcm9kdWN0aW9uXCIpIHtcbiAgICBpZiAoIWlzSFRNTEVsZW1lbnQoYXJyb3dFbGVtZW50KSkge1xuICAgICAgY29uc29sZS5lcnJvcihbJ1BvcHBlcjogXCJhcnJvd1wiIGVsZW1lbnQgbXVzdCBiZSBhbiBIVE1MRWxlbWVudCAobm90IGFuIFNWR0VsZW1lbnQpLicsICdUbyB1c2UgYW4gU1ZHIGFycm93LCB3cmFwIGl0IGluIGFuIEhUTUxFbGVtZW50IHRoYXQgd2lsbCBiZSB1c2VkIGFzJywgJ3RoZSBhcnJvdy4nXS5qb2luKCcgJykpO1xuICAgIH1cbiAgfVxuXG4gIGlmICghY29udGFpbnMoc3RhdGUuZWxlbWVudHMucG9wcGVyLCBhcnJvd0VsZW1lbnQpKSB7XG4gICAgaWYgKHByb2Nlc3MuZW52Lk5PREVfRU5WICE9PSBcInByb2R1Y3Rpb25cIikge1xuICAgICAgY29uc29sZS5lcnJvcihbJ1BvcHBlcjogXCJhcnJvd1wiIG1vZGlmaWVyXFwncyBgZWxlbWVudGAgbXVzdCBiZSBhIGNoaWxkIG9mIHRoZSBwb3BwZXInLCAnZWxlbWVudC4nXS5qb2luKCcgJykpO1xuICAgIH1cblxuICAgIHJldHVybjtcbiAgfVxuXG4gIHN0YXRlLmVsZW1lbnRzLmFycm93ID0gYXJyb3dFbGVtZW50O1xuICBzdGF0ZS5tb2RpZmllcnNEYXRhW25hbWUgKyBcIiNwZXJzaXN0ZW50XCJdID0ge1xuICAgIHBhZGRpbmc6IG1lcmdlUGFkZGluZ09iamVjdCh0eXBlb2YgcGFkZGluZyAhPT0gJ251bWJlcicgPyBwYWRkaW5nIDogZXhwYW5kVG9IYXNoTWFwKHBhZGRpbmcsIGJhc2VQbGFjZW1lbnRzKSlcbiAgfTtcbn0gLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGltcG9ydC9uby11bnVzZWQtbW9kdWxlc1xuXG5cbmV4cG9ydCBkZWZhdWx0IHtcbiAgbmFtZTogJ2Fycm93JyxcbiAgZW5hYmxlZDogdHJ1ZSxcbiAgcGhhc2U6ICdtYWluJyxcbiAgZm46IGFycm93LFxuICBlZmZlY3Q6IGVmZmVjdCxcbiAgcmVxdWlyZXM6IFsncG9wcGVyT2Zmc2V0cyddLFxuICByZXF1aXJlc0lmRXhpc3RzOiBbJ3ByZXZlbnRPdmVyZmxvdyddXG59OyIsImltcG9ydCB7IHRvcCwgbGVmdCwgcmlnaHQsIGJvdHRvbSB9IGZyb20gXCIuLi9lbnVtcy5qc1wiO1xuaW1wb3J0IGdldE9mZnNldFBhcmVudCBmcm9tIFwiLi4vZG9tLXV0aWxzL2dldE9mZnNldFBhcmVudC5qc1wiO1xuaW1wb3J0IGdldFdpbmRvdyBmcm9tIFwiLi4vZG9tLXV0aWxzL2dldFdpbmRvdy5qc1wiO1xuaW1wb3J0IGdldERvY3VtZW50RWxlbWVudCBmcm9tIFwiLi4vZG9tLXV0aWxzL2dldERvY3VtZW50RWxlbWVudC5qc1wiO1xuaW1wb3J0IGdldENvbXB1dGVkU3R5bGUgZnJvbSBcIi4uL2RvbS11dGlscy9nZXRDb21wdXRlZFN0eWxlLmpzXCI7XG5pbXBvcnQgZ2V0QmFzZVBsYWNlbWVudCBmcm9tIFwiLi4vdXRpbHMvZ2V0QmFzZVBsYWNlbWVudC5qc1wiOyAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgaW1wb3J0L25vLXVudXNlZC1tb2R1bGVzXG5cbnZhciB1bnNldFNpZGVzID0ge1xuICB0b3A6ICdhdXRvJyxcbiAgcmlnaHQ6ICdhdXRvJyxcbiAgYm90dG9tOiAnYXV0bycsXG4gIGxlZnQ6ICdhdXRvJ1xufTsgLy8gUm91bmQgdGhlIG9mZnNldHMgdG8gdGhlIG5lYXJlc3Qgc3VpdGFibGUgc3VicGl4ZWwgYmFzZWQgb24gdGhlIERQUi5cbi8vIFpvb21pbmcgY2FuIGNoYW5nZSB0aGUgRFBSLCBidXQgaXQgc2VlbXMgdG8gcmVwb3J0IGEgdmFsdWUgdGhhdCB3aWxsXG4vLyBjbGVhbmx5IGRpdmlkZSB0aGUgdmFsdWVzIGludG8gdGhlIGFwcHJvcHJpYXRlIHN1YnBpeGVscy5cblxuZnVuY3Rpb24gcm91bmRPZmZzZXRzKF9yZWYpIHtcbiAgdmFyIHggPSBfcmVmLngsXG4gICAgICB5ID0gX3JlZi55O1xuICB2YXIgd2luID0gd2luZG93O1xuICB2YXIgZHByID0gd2luLmRldmljZVBpeGVsUmF0aW8gfHwgMTtcbiAgcmV0dXJuIHtcbiAgICB4OiBNYXRoLnJvdW5kKHggKiBkcHIpIC8gZHByIHx8IDAsXG4gICAgeTogTWF0aC5yb3VuZCh5ICogZHByKSAvIGRwciB8fCAwXG4gIH07XG59XG5cbmV4cG9ydCBmdW5jdGlvbiBtYXBUb1N0eWxlcyhfcmVmMikge1xuICB2YXIgX09iamVjdCRhc3NpZ24yO1xuXG4gIHZhciBwb3BwZXIgPSBfcmVmMi5wb3BwZXIsXG4gICAgICBwb3BwZXJSZWN0ID0gX3JlZjIucG9wcGVyUmVjdCxcbiAgICAgIHBsYWNlbWVudCA9IF9yZWYyLnBsYWNlbWVudCxcbiAgICAgIG9mZnNldHMgPSBfcmVmMi5vZmZzZXRzLFxuICAgICAgcG9zaXRpb24gPSBfcmVmMi5wb3NpdGlvbixcbiAgICAgIGdwdUFjY2VsZXJhdGlvbiA9IF9yZWYyLmdwdUFjY2VsZXJhdGlvbixcbiAgICAgIGFkYXB0aXZlID0gX3JlZjIuYWRhcHRpdmU7XG5cbiAgdmFyIF9yb3VuZE9mZnNldHMgPSByb3VuZE9mZnNldHMob2Zmc2V0cyksXG4gICAgICB4ID0gX3JvdW5kT2Zmc2V0cy54LFxuICAgICAgeSA9IF9yb3VuZE9mZnNldHMueTtcblxuICB2YXIgaGFzWCA9IG9mZnNldHMuaGFzT3duUHJvcGVydHkoJ3gnKTtcbiAgdmFyIGhhc1kgPSBvZmZzZXRzLmhhc093blByb3BlcnR5KCd5Jyk7XG4gIHZhciBzaWRlWCA9IGxlZnQ7XG4gIHZhciBzaWRlWSA9IHRvcDtcbiAgdmFyIHdpbiA9IHdpbmRvdztcblxuICBpZiAoYWRhcHRpdmUpIHtcbiAgICB2YXIgb2Zmc2V0UGFyZW50ID0gZ2V0T2Zmc2V0UGFyZW50KHBvcHBlcik7XG5cbiAgICBpZiAob2Zmc2V0UGFyZW50ID09PSBnZXRXaW5kb3cocG9wcGVyKSkge1xuICAgICAgb2Zmc2V0UGFyZW50ID0gZ2V0RG9jdW1lbnRFbGVtZW50KHBvcHBlcik7XG4gICAgfSAvLyAkRmxvd0ZpeE1lOiBmb3JjZSB0eXBlIHJlZmluZW1lbnQsIHdlIGNvbXBhcmUgb2Zmc2V0UGFyZW50IHdpdGggd2luZG93IGFib3ZlLCBidXQgRmxvdyBkb2Vzbid0IGRldGVjdCBpdFxuXG4gICAgLyo6OiBvZmZzZXRQYXJlbnQgPSAob2Zmc2V0UGFyZW50OiBFbGVtZW50KTsgKi9cblxuXG4gICAgaWYgKHBsYWNlbWVudCA9PT0gdG9wKSB7XG4gICAgICBzaWRlWSA9IGJvdHRvbTtcbiAgICAgIHkgLT0gb2Zmc2V0UGFyZW50LmNsaWVudEhlaWdodCAtIHBvcHBlclJlY3QuaGVpZ2h0O1xuICAgICAgeSAqPSBncHVBY2NlbGVyYXRpb24gPyAxIDogLTE7XG4gICAgfVxuXG4gICAgaWYgKHBsYWNlbWVudCA9PT0gbGVmdCkge1xuICAgICAgc2lkZVggPSByaWdodDtcbiAgICAgIHggLT0gb2Zmc2V0UGFyZW50LmNsaWVudFdpZHRoIC0gcG9wcGVyUmVjdC53aWR0aDtcbiAgICAgIHggKj0gZ3B1QWNjZWxlcmF0aW9uID8gMSA6IC0xO1xuICAgIH1cbiAgfVxuXG4gIHZhciBjb21tb25TdHlsZXMgPSBPYmplY3QuYXNzaWduKHtcbiAgICBwb3NpdGlvbjogcG9zaXRpb25cbiAgfSwgYWRhcHRpdmUgJiYgdW5zZXRTaWRlcyk7XG5cbiAgaWYgKGdwdUFjY2VsZXJhdGlvbikge1xuICAgIHZhciBfT2JqZWN0JGFzc2lnbjtcblxuICAgIHJldHVybiBPYmplY3QuYXNzaWduKHt9LCBjb21tb25TdHlsZXMsIChfT2JqZWN0JGFzc2lnbiA9IHt9LCBfT2JqZWN0JGFzc2lnbltzaWRlWV0gPSBoYXNZID8gJzAnIDogJycsIF9PYmplY3QkYXNzaWduW3NpZGVYXSA9IGhhc1ggPyAnMCcgOiAnJywgX09iamVjdCRhc3NpZ24udHJhbnNmb3JtID0gKHdpbi5kZXZpY2VQaXhlbFJhdGlvIHx8IDEpIDwgMiA/IFwidHJhbnNsYXRlKFwiICsgeCArIFwicHgsIFwiICsgeSArIFwicHgpXCIgOiBcInRyYW5zbGF0ZTNkKFwiICsgeCArIFwicHgsIFwiICsgeSArIFwicHgsIDApXCIsIF9PYmplY3QkYXNzaWduKSk7XG4gIH1cblxuICByZXR1cm4gT2JqZWN0LmFzc2lnbih7fSwgY29tbW9uU3R5bGVzLCAoX09iamVjdCRhc3NpZ24yID0ge30sIF9PYmplY3QkYXNzaWduMltzaWRlWV0gPSBoYXNZID8geSArIFwicHhcIiA6ICcnLCBfT2JqZWN0JGFzc2lnbjJbc2lkZVhdID0gaGFzWCA/IHggKyBcInB4XCIgOiAnJywgX09iamVjdCRhc3NpZ24yLnRyYW5zZm9ybSA9ICcnLCBfT2JqZWN0JGFzc2lnbjIpKTtcbn1cblxuZnVuY3Rpb24gY29tcHV0ZVN0eWxlcyhfcmVmMykge1xuICB2YXIgc3RhdGUgPSBfcmVmMy5zdGF0ZSxcbiAgICAgIG9wdGlvbnMgPSBfcmVmMy5vcHRpb25zO1xuICB2YXIgX29wdGlvbnMkZ3B1QWNjZWxlcmF0ID0gb3B0aW9ucy5ncHVBY2NlbGVyYXRpb24sXG4gICAgICBncHVBY2NlbGVyYXRpb24gPSBfb3B0aW9ucyRncHVBY2NlbGVyYXQgPT09IHZvaWQgMCA/IHRydWUgOiBfb3B0aW9ucyRncHVBY2NlbGVyYXQsXG4gICAgICBfb3B0aW9ucyRhZGFwdGl2ZSA9IG9wdGlvbnMuYWRhcHRpdmUsXG4gICAgICBhZGFwdGl2ZSA9IF9vcHRpb25zJGFkYXB0aXZlID09PSB2b2lkIDAgPyB0cnVlIDogX29wdGlvbnMkYWRhcHRpdmU7XG5cbiAgaWYgKHByb2Nlc3MuZW52Lk5PREVfRU5WICE9PSBcInByb2R1Y3Rpb25cIikge1xuICAgIHZhciB0cmFuc2l0aW9uUHJvcGVydHkgPSBnZXRDb21wdXRlZFN0eWxlKHN0YXRlLmVsZW1lbnRzLnBvcHBlcikudHJhbnNpdGlvblByb3BlcnR5IHx8ICcnO1xuXG4gICAgaWYgKGFkYXB0aXZlICYmIFsndHJhbnNmb3JtJywgJ3RvcCcsICdyaWdodCcsICdib3R0b20nLCAnbGVmdCddLnNvbWUoZnVuY3Rpb24gKHByb3BlcnR5KSB7XG4gICAgICByZXR1cm4gdHJhbnNpdGlvblByb3BlcnR5LmluZGV4T2YocHJvcGVydHkpID49IDA7XG4gICAgfSkpIHtcbiAgICAgIGNvbnNvbGUud2FybihbJ1BvcHBlcjogRGV0ZWN0ZWQgQ1NTIHRyYW5zaXRpb25zIG9uIGF0IGxlYXN0IG9uZSBvZiB0aGUgZm9sbG93aW5nJywgJ0NTUyBwcm9wZXJ0aWVzOiBcInRyYW5zZm9ybVwiLCBcInRvcFwiLCBcInJpZ2h0XCIsIFwiYm90dG9tXCIsIFwibGVmdFwiLicsICdcXG5cXG4nLCAnRGlzYWJsZSB0aGUgXCJjb21wdXRlU3R5bGVzXCIgbW9kaWZpZXJcXCdzIGBhZGFwdGl2ZWAgb3B0aW9uIHRvIGFsbG93JywgJ2ZvciBzbW9vdGggdHJhbnNpdGlvbnMsIG9yIHJlbW92ZSB0aGVzZSBwcm9wZXJ0aWVzIGZyb20gdGhlIENTUycsICd0cmFuc2l0aW9uIGRlY2xhcmF0aW9uIG9uIHRoZSBwb3BwZXIgZWxlbWVudCBpZiBvbmx5IHRyYW5zaXRpb25pbmcnLCAnb3BhY2l0eSBvciBiYWNrZ3JvdW5kLWNvbG9yIGZvciBleGFtcGxlLicsICdcXG5cXG4nLCAnV2UgcmVjb21tZW5kIHVzaW5nIHRoZSBwb3BwZXIgZWxlbWVudCBhcyBhIHdyYXBwZXIgYXJvdW5kIGFuIGlubmVyJywgJ2VsZW1lbnQgdGhhdCBjYW4gaGF2ZSBhbnkgQ1NTIHByb3BlcnR5IHRyYW5zaXRpb25lZCBmb3IgYW5pbWF0aW9ucy4nXS5qb2luKCcgJykpO1xuICAgIH1cbiAgfVxuXG4gIHZhciBjb21tb25TdHlsZXMgPSB7XG4gICAgcGxhY2VtZW50OiBnZXRCYXNlUGxhY2VtZW50KHN0YXRlLnBsYWNlbWVudCksXG4gICAgcG9wcGVyOiBzdGF0ZS5lbGVtZW50cy5wb3BwZXIsXG4gICAgcG9wcGVyUmVjdDogc3RhdGUucmVjdHMucG9wcGVyLFxuICAgIGdwdUFjY2VsZXJhdGlvbjogZ3B1QWNjZWxlcmF0aW9uXG4gIH07XG5cbiAgaWYgKHN0YXRlLm1vZGlmaWVyc0RhdGEucG9wcGVyT2Zmc2V0cyAhPSBudWxsKSB7XG4gICAgc3RhdGUuc3R5bGVzLnBvcHBlciA9IE9iamVjdC5hc3NpZ24oe30sIHN0YXRlLnN0eWxlcy5wb3BwZXIsIHt9LCBtYXBUb1N0eWxlcyhPYmplY3QuYXNzaWduKHt9LCBjb21tb25TdHlsZXMsIHtcbiAgICAgIG9mZnNldHM6IHN0YXRlLm1vZGlmaWVyc0RhdGEucG9wcGVyT2Zmc2V0cyxcbiAgICAgIHBvc2l0aW9uOiBzdGF0ZS5vcHRpb25zLnN0cmF0ZWd5LFxuICAgICAgYWRhcHRpdmU6IGFkYXB0aXZlXG4gICAgfSkpKTtcbiAgfVxuXG4gIGlmIChzdGF0ZS5tb2RpZmllcnNEYXRhLmFycm93ICE9IG51bGwpIHtcbiAgICBzdGF0ZS5zdHlsZXMuYXJyb3cgPSBPYmplY3QuYXNzaWduKHt9LCBzdGF0ZS5zdHlsZXMuYXJyb3csIHt9LCBtYXBUb1N0eWxlcyhPYmplY3QuYXNzaWduKHt9LCBjb21tb25TdHlsZXMsIHtcbiAgICAgIG9mZnNldHM6IHN0YXRlLm1vZGlmaWVyc0RhdGEuYXJyb3csXG4gICAgICBwb3NpdGlvbjogJ2Fic29sdXRlJyxcbiAgICAgIGFkYXB0aXZlOiBmYWxzZVxuICAgIH0pKSk7XG4gIH1cblxuICBzdGF0ZS5hdHRyaWJ1dGVzLnBvcHBlciA9IE9iamVjdC5hc3NpZ24oe30sIHN0YXRlLmF0dHJpYnV0ZXMucG9wcGVyLCB7XG4gICAgJ2RhdGEtcG9wcGVyLXBsYWNlbWVudCc6IHN0YXRlLnBsYWNlbWVudFxuICB9KTtcbn0gLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGltcG9ydC9uby11bnVzZWQtbW9kdWxlc1xuXG5cbmV4cG9ydCBkZWZhdWx0IHtcbiAgbmFtZTogJ2NvbXB1dGVTdHlsZXMnLFxuICBlbmFibGVkOiB0cnVlLFxuICBwaGFzZTogJ2JlZm9yZVdyaXRlJyxcbiAgZm46IGNvbXB1dGVTdHlsZXMsXG4gIGRhdGE6IHt9XG59OyIsImltcG9ydCBnZXRXaW5kb3cgZnJvbSBcIi4uL2RvbS11dGlscy9nZXRXaW5kb3cuanNcIjsgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGltcG9ydC9uby11bnVzZWQtbW9kdWxlc1xuXG52YXIgcGFzc2l2ZSA9IHtcbiAgcGFzc2l2ZTogdHJ1ZVxufTtcblxuZnVuY3Rpb24gZWZmZWN0KF9yZWYpIHtcbiAgdmFyIHN0YXRlID0gX3JlZi5zdGF0ZSxcbiAgICAgIGluc3RhbmNlID0gX3JlZi5pbnN0YW5jZSxcbiAgICAgIG9wdGlvbnMgPSBfcmVmLm9wdGlvbnM7XG4gIHZhciBfb3B0aW9ucyRzY3JvbGwgPSBvcHRpb25zLnNjcm9sbCxcbiAgICAgIHNjcm9sbCA9IF9vcHRpb25zJHNjcm9sbCA9PT0gdm9pZCAwID8gdHJ1ZSA6IF9vcHRpb25zJHNjcm9sbCxcbiAgICAgIF9vcHRpb25zJHJlc2l6ZSA9IG9wdGlvbnMucmVzaXplLFxuICAgICAgcmVzaXplID0gX29wdGlvbnMkcmVzaXplID09PSB2b2lkIDAgPyB0cnVlIDogX29wdGlvbnMkcmVzaXplO1xuICB2YXIgd2luZG93ID0gZ2V0V2luZG93KHN0YXRlLmVsZW1lbnRzLnBvcHBlcik7XG4gIHZhciBzY3JvbGxQYXJlbnRzID0gW10uY29uY2F0KHN0YXRlLnNjcm9sbFBhcmVudHMucmVmZXJlbmNlLCBzdGF0ZS5zY3JvbGxQYXJlbnRzLnBvcHBlcik7XG5cbiAgaWYgKHNjcm9sbCkge1xuICAgIHNjcm9sbFBhcmVudHMuZm9yRWFjaChmdW5jdGlvbiAoc2Nyb2xsUGFyZW50KSB7XG4gICAgICBzY3JvbGxQYXJlbnQuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJywgaW5zdGFuY2UudXBkYXRlLCBwYXNzaXZlKTtcbiAgICB9KTtcbiAgfVxuXG4gIGlmIChyZXNpemUpIHtcbiAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcigncmVzaXplJywgaW5zdGFuY2UudXBkYXRlLCBwYXNzaXZlKTtcbiAgfVxuXG4gIHJldHVybiBmdW5jdGlvbiAoKSB7XG4gICAgaWYgKHNjcm9sbCkge1xuICAgICAgc2Nyb2xsUGFyZW50cy5mb3JFYWNoKGZ1bmN0aW9uIChzY3JvbGxQYXJlbnQpIHtcbiAgICAgICAgc2Nyb2xsUGFyZW50LnJlbW92ZUV2ZW50TGlzdGVuZXIoJ3Njcm9sbCcsIGluc3RhbmNlLnVwZGF0ZSwgcGFzc2l2ZSk7XG4gICAgICB9KTtcbiAgICB9XG5cbiAgICBpZiAocmVzaXplKSB7XG4gICAgICB3aW5kb3cucmVtb3ZlRXZlbnRMaXN0ZW5lcigncmVzaXplJywgaW5zdGFuY2UudXBkYXRlLCBwYXNzaXZlKTtcbiAgICB9XG4gIH07XG59IC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBpbXBvcnQvbm8tdW51c2VkLW1vZHVsZXNcblxuXG5leHBvcnQgZGVmYXVsdCB7XG4gIG5hbWU6ICdldmVudExpc3RlbmVycycsXG4gIGVuYWJsZWQ6IHRydWUsXG4gIHBoYXNlOiAnd3JpdGUnLFxuICBmbjogZnVuY3Rpb24gZm4oKSB7fSxcbiAgZWZmZWN0OiBlZmZlY3QsXG4gIGRhdGE6IHt9XG59OyIsImltcG9ydCBnZXRPcHBvc2l0ZVBsYWNlbWVudCBmcm9tIFwiLi4vdXRpbHMvZ2V0T3Bwb3NpdGVQbGFjZW1lbnQuanNcIjtcbmltcG9ydCBnZXRCYXNlUGxhY2VtZW50IGZyb20gXCIuLi91dGlscy9nZXRCYXNlUGxhY2VtZW50LmpzXCI7XG5pbXBvcnQgZ2V0T3Bwb3NpdGVWYXJpYXRpb25QbGFjZW1lbnQgZnJvbSBcIi4uL3V0aWxzL2dldE9wcG9zaXRlVmFyaWF0aW9uUGxhY2VtZW50LmpzXCI7XG5pbXBvcnQgZGV0ZWN0T3ZlcmZsb3cgZnJvbSBcIi4uL3V0aWxzL2RldGVjdE92ZXJmbG93LmpzXCI7XG5pbXBvcnQgY29tcHV0ZUF1dG9QbGFjZW1lbnQgZnJvbSBcIi4uL3V0aWxzL2NvbXB1dGVBdXRvUGxhY2VtZW50LmpzXCI7XG5pbXBvcnQgeyBib3R0b20sIHRvcCwgc3RhcnQsIHJpZ2h0LCBsZWZ0LCBhdXRvIH0gZnJvbSBcIi4uL2VudW1zLmpzXCI7XG5pbXBvcnQgZ2V0VmFyaWF0aW9uIGZyb20gXCIuLi91dGlscy9nZXRWYXJpYXRpb24uanNcIjsgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGltcG9ydC9uby11bnVzZWQtbW9kdWxlc1xuXG5mdW5jdGlvbiBnZXRFeHBhbmRlZEZhbGxiYWNrUGxhY2VtZW50cyhwbGFjZW1lbnQpIHtcbiAgaWYgKGdldEJhc2VQbGFjZW1lbnQocGxhY2VtZW50KSA9PT0gYXV0bykge1xuICAgIHJldHVybiBbXTtcbiAgfVxuXG4gIHZhciBvcHBvc2l0ZVBsYWNlbWVudCA9IGdldE9wcG9zaXRlUGxhY2VtZW50KHBsYWNlbWVudCk7XG4gIHJldHVybiBbZ2V0T3Bwb3NpdGVWYXJpYXRpb25QbGFjZW1lbnQocGxhY2VtZW50KSwgb3Bwb3NpdGVQbGFjZW1lbnQsIGdldE9wcG9zaXRlVmFyaWF0aW9uUGxhY2VtZW50KG9wcG9zaXRlUGxhY2VtZW50KV07XG59XG5cbmZ1bmN0aW9uIGZsaXAoX3JlZikge1xuICB2YXIgc3RhdGUgPSBfcmVmLnN0YXRlLFxuICAgICAgb3B0aW9ucyA9IF9yZWYub3B0aW9ucyxcbiAgICAgIG5hbWUgPSBfcmVmLm5hbWU7XG5cbiAgaWYgKHN0YXRlLm1vZGlmaWVyc0RhdGFbbmFtZV0uX3NraXApIHtcbiAgICByZXR1cm47XG4gIH1cblxuICB2YXIgX29wdGlvbnMkbWFpbkF4aXMgPSBvcHRpb25zLm1haW5BeGlzLFxuICAgICAgY2hlY2tNYWluQXhpcyA9IF9vcHRpb25zJG1haW5BeGlzID09PSB2b2lkIDAgPyB0cnVlIDogX29wdGlvbnMkbWFpbkF4aXMsXG4gICAgICBfb3B0aW9ucyRhbHRBeGlzID0gb3B0aW9ucy5hbHRBeGlzLFxuICAgICAgY2hlY2tBbHRBeGlzID0gX29wdGlvbnMkYWx0QXhpcyA9PT0gdm9pZCAwID8gdHJ1ZSA6IF9vcHRpb25zJGFsdEF4aXMsXG4gICAgICBzcGVjaWZpZWRGYWxsYmFja1BsYWNlbWVudHMgPSBvcHRpb25zLmZhbGxiYWNrUGxhY2VtZW50cyxcbiAgICAgIHBhZGRpbmcgPSBvcHRpb25zLnBhZGRpbmcsXG4gICAgICBib3VuZGFyeSA9IG9wdGlvbnMuYm91bmRhcnksXG4gICAgICByb290Qm91bmRhcnkgPSBvcHRpb25zLnJvb3RCb3VuZGFyeSxcbiAgICAgIGFsdEJvdW5kYXJ5ID0gb3B0aW9ucy5hbHRCb3VuZGFyeSxcbiAgICAgIF9vcHRpb25zJGZsaXBWYXJpYXRpbyA9IG9wdGlvbnMuZmxpcFZhcmlhdGlvbnMsXG4gICAgICBmbGlwVmFyaWF0aW9ucyA9IF9vcHRpb25zJGZsaXBWYXJpYXRpbyA9PT0gdm9pZCAwID8gdHJ1ZSA6IF9vcHRpb25zJGZsaXBWYXJpYXRpbyxcbiAgICAgIGFsbG93ZWRBdXRvUGxhY2VtZW50cyA9IG9wdGlvbnMuYWxsb3dlZEF1dG9QbGFjZW1lbnRzO1xuICB2YXIgcHJlZmVycmVkUGxhY2VtZW50ID0gc3RhdGUub3B0aW9ucy5wbGFjZW1lbnQ7XG4gIHZhciBiYXNlUGxhY2VtZW50ID0gZ2V0QmFzZVBsYWNlbWVudChwcmVmZXJyZWRQbGFjZW1lbnQpO1xuICB2YXIgaXNCYXNlUGxhY2VtZW50ID0gYmFzZVBsYWNlbWVudCA9PT0gcHJlZmVycmVkUGxhY2VtZW50O1xuICB2YXIgZmFsbGJhY2tQbGFjZW1lbnRzID0gc3BlY2lmaWVkRmFsbGJhY2tQbGFjZW1lbnRzIHx8IChpc0Jhc2VQbGFjZW1lbnQgfHwgIWZsaXBWYXJpYXRpb25zID8gW2dldE9wcG9zaXRlUGxhY2VtZW50KHByZWZlcnJlZFBsYWNlbWVudCldIDogZ2V0RXhwYW5kZWRGYWxsYmFja1BsYWNlbWVudHMocHJlZmVycmVkUGxhY2VtZW50KSk7XG4gIHZhciBwbGFjZW1lbnRzID0gW3ByZWZlcnJlZFBsYWNlbWVudF0uY29uY2F0KGZhbGxiYWNrUGxhY2VtZW50cykucmVkdWNlKGZ1bmN0aW9uIChhY2MsIHBsYWNlbWVudCkge1xuICAgIHJldHVybiBhY2MuY29uY2F0KGdldEJhc2VQbGFjZW1lbnQocGxhY2VtZW50KSA9PT0gYXV0byA/IGNvbXB1dGVBdXRvUGxhY2VtZW50KHN0YXRlLCB7XG4gICAgICBwbGFjZW1lbnQ6IHBsYWNlbWVudCxcbiAgICAgIGJvdW5kYXJ5OiBib3VuZGFyeSxcbiAgICAgIHJvb3RCb3VuZGFyeTogcm9vdEJvdW5kYXJ5LFxuICAgICAgcGFkZGluZzogcGFkZGluZyxcbiAgICAgIGZsaXBWYXJpYXRpb25zOiBmbGlwVmFyaWF0aW9ucyxcbiAgICAgIGFsbG93ZWRBdXRvUGxhY2VtZW50czogYWxsb3dlZEF1dG9QbGFjZW1lbnRzXG4gICAgfSkgOiBwbGFjZW1lbnQpO1xuICB9LCBbXSk7XG4gIHZhciByZWZlcmVuY2VSZWN0ID0gc3RhdGUucmVjdHMucmVmZXJlbmNlO1xuICB2YXIgcG9wcGVyUmVjdCA9IHN0YXRlLnJlY3RzLnBvcHBlcjtcbiAgdmFyIGNoZWNrc01hcCA9IG5ldyBNYXAoKTtcbiAgdmFyIG1ha2VGYWxsYmFja0NoZWNrcyA9IHRydWU7XG4gIHZhciBmaXJzdEZpdHRpbmdQbGFjZW1lbnQgPSBwbGFjZW1lbnRzWzBdO1xuXG4gIGZvciAodmFyIGkgPSAwOyBpIDwgcGxhY2VtZW50cy5sZW5ndGg7IGkrKykge1xuICAgIHZhciBwbGFjZW1lbnQgPSBwbGFjZW1lbnRzW2ldO1xuXG4gICAgdmFyIF9iYXNlUGxhY2VtZW50ID0gZ2V0QmFzZVBsYWNlbWVudChwbGFjZW1lbnQpO1xuXG4gICAgdmFyIGlzU3RhcnRWYXJpYXRpb24gPSBnZXRWYXJpYXRpb24ocGxhY2VtZW50KSA9PT0gc3RhcnQ7XG4gICAgdmFyIGlzVmVydGljYWwgPSBbdG9wLCBib3R0b21dLmluZGV4T2YoX2Jhc2VQbGFjZW1lbnQpID49IDA7XG4gICAgdmFyIGxlbiA9IGlzVmVydGljYWwgPyAnd2lkdGgnIDogJ2hlaWdodCc7XG4gICAgdmFyIG92ZXJmbG93ID0gZGV0ZWN0T3ZlcmZsb3coc3RhdGUsIHtcbiAgICAgIHBsYWNlbWVudDogcGxhY2VtZW50LFxuICAgICAgYm91bmRhcnk6IGJvdW5kYXJ5LFxuICAgICAgcm9vdEJvdW5kYXJ5OiByb290Qm91bmRhcnksXG4gICAgICBhbHRCb3VuZGFyeTogYWx0Qm91bmRhcnksXG4gICAgICBwYWRkaW5nOiBwYWRkaW5nXG4gICAgfSk7XG4gICAgdmFyIG1haW5WYXJpYXRpb25TaWRlID0gaXNWZXJ0aWNhbCA/IGlzU3RhcnRWYXJpYXRpb24gPyByaWdodCA6IGxlZnQgOiBpc1N0YXJ0VmFyaWF0aW9uID8gYm90dG9tIDogdG9wO1xuXG4gICAgaWYgKHJlZmVyZW5jZVJlY3RbbGVuXSA+IHBvcHBlclJlY3RbbGVuXSkge1xuICAgICAgbWFpblZhcmlhdGlvblNpZGUgPSBnZXRPcHBvc2l0ZVBsYWNlbWVudChtYWluVmFyaWF0aW9uU2lkZSk7XG4gICAgfVxuXG4gICAgdmFyIGFsdFZhcmlhdGlvblNpZGUgPSBnZXRPcHBvc2l0ZVBsYWNlbWVudChtYWluVmFyaWF0aW9uU2lkZSk7XG4gICAgdmFyIGNoZWNrcyA9IFtdO1xuXG4gICAgaWYgKGNoZWNrTWFpbkF4aXMpIHtcbiAgICAgIGNoZWNrcy5wdXNoKG92ZXJmbG93W19iYXNlUGxhY2VtZW50XSA8PSAwKTtcbiAgICB9XG5cbiAgICBpZiAoY2hlY2tBbHRBeGlzKSB7XG4gICAgICBjaGVja3MucHVzaChvdmVyZmxvd1ttYWluVmFyaWF0aW9uU2lkZV0gPD0gMCwgb3ZlcmZsb3dbYWx0VmFyaWF0aW9uU2lkZV0gPD0gMCk7XG4gICAgfVxuXG4gICAgaWYgKGNoZWNrcy5ldmVyeShmdW5jdGlvbiAoY2hlY2spIHtcbiAgICAgIHJldHVybiBjaGVjaztcbiAgICB9KSkge1xuICAgICAgZmlyc3RGaXR0aW5nUGxhY2VtZW50ID0gcGxhY2VtZW50O1xuICAgICAgbWFrZUZhbGxiYWNrQ2hlY2tzID0gZmFsc2U7XG4gICAgICBicmVhaztcbiAgICB9XG5cbiAgICBjaGVja3NNYXAuc2V0KHBsYWNlbWVudCwgY2hlY2tzKTtcbiAgfVxuXG4gIGlmIChtYWtlRmFsbGJhY2tDaGVja3MpIHtcbiAgICAvLyBgMmAgbWF5IGJlIGRlc2lyZWQgaW4gc29tZSBjYXNlcyDigJMgcmVzZWFyY2ggbGF0ZXJcbiAgICB2YXIgbnVtYmVyT2ZDaGVja3MgPSBmbGlwVmFyaWF0aW9ucyA/IDMgOiAxO1xuXG4gICAgdmFyIF9sb29wID0gZnVuY3Rpb24gX2xvb3AoX2kpIHtcbiAgICAgIHZhciBmaXR0aW5nUGxhY2VtZW50ID0gcGxhY2VtZW50cy5maW5kKGZ1bmN0aW9uIChwbGFjZW1lbnQpIHtcbiAgICAgICAgdmFyIGNoZWNrcyA9IGNoZWNrc01hcC5nZXQocGxhY2VtZW50KTtcblxuICAgICAgICBpZiAoY2hlY2tzKSB7XG4gICAgICAgICAgcmV0dXJuIGNoZWNrcy5zbGljZSgwLCBfaSkuZXZlcnkoZnVuY3Rpb24gKGNoZWNrKSB7XG4gICAgICAgICAgICByZXR1cm4gY2hlY2s7XG4gICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICAgIH0pO1xuXG4gICAgICBpZiAoZml0dGluZ1BsYWNlbWVudCkge1xuICAgICAgICBmaXJzdEZpdHRpbmdQbGFjZW1lbnQgPSBmaXR0aW5nUGxhY2VtZW50O1xuICAgICAgICByZXR1cm4gXCJicmVha1wiO1xuICAgICAgfVxuICAgIH07XG5cbiAgICBmb3IgKHZhciBfaSA9IG51bWJlck9mQ2hlY2tzOyBfaSA+IDA7IF9pLS0pIHtcbiAgICAgIHZhciBfcmV0ID0gX2xvb3AoX2kpO1xuXG4gICAgICBpZiAoX3JldCA9PT0gXCJicmVha1wiKSBicmVhaztcbiAgICB9XG4gIH1cblxuICBpZiAoc3RhdGUucGxhY2VtZW50ICE9PSBmaXJzdEZpdHRpbmdQbGFjZW1lbnQpIHtcbiAgICBzdGF0ZS5tb2RpZmllcnNEYXRhW25hbWVdLl9za2lwID0gdHJ1ZTtcbiAgICBzdGF0ZS5wbGFjZW1lbnQgPSBmaXJzdEZpdHRpbmdQbGFjZW1lbnQ7XG4gICAgc3RhdGUucmVzZXQgPSB0cnVlO1xuICB9XG59IC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBpbXBvcnQvbm8tdW51c2VkLW1vZHVsZXNcblxuXG5leHBvcnQgZGVmYXVsdCB7XG4gIG5hbWU6ICdmbGlwJyxcbiAgZW5hYmxlZDogdHJ1ZSxcbiAgcGhhc2U6ICdtYWluJyxcbiAgZm46IGZsaXAsXG4gIHJlcXVpcmVzSWZFeGlzdHM6IFsnb2Zmc2V0J10sXG4gIGRhdGE6IHtcbiAgICBfc2tpcDogZmFsc2VcbiAgfVxufTsiLCJpbXBvcnQgeyB0b3AsIGJvdHRvbSwgbGVmdCwgcmlnaHQgfSBmcm9tIFwiLi4vZW51bXMuanNcIjtcbmltcG9ydCBkZXRlY3RPdmVyZmxvdyBmcm9tIFwiLi4vdXRpbHMvZGV0ZWN0T3ZlcmZsb3cuanNcIjtcblxuZnVuY3Rpb24gZ2V0U2lkZU9mZnNldHMob3ZlcmZsb3csIHJlY3QsIHByZXZlbnRlZE9mZnNldHMpIHtcbiAgaWYgKHByZXZlbnRlZE9mZnNldHMgPT09IHZvaWQgMCkge1xuICAgIHByZXZlbnRlZE9mZnNldHMgPSB7XG4gICAgICB4OiAwLFxuICAgICAgeTogMFxuICAgIH07XG4gIH1cblxuICByZXR1cm4ge1xuICAgIHRvcDogb3ZlcmZsb3cudG9wIC0gcmVjdC5oZWlnaHQgLSBwcmV2ZW50ZWRPZmZzZXRzLnksXG4gICAgcmlnaHQ6IG92ZXJmbG93LnJpZ2h0IC0gcmVjdC53aWR0aCArIHByZXZlbnRlZE9mZnNldHMueCxcbiAgICBib3R0b206IG92ZXJmbG93LmJvdHRvbSAtIHJlY3QuaGVpZ2h0ICsgcHJldmVudGVkT2Zmc2V0cy55LFxuICAgIGxlZnQ6IG92ZXJmbG93LmxlZnQgLSByZWN0LndpZHRoIC0gcHJldmVudGVkT2Zmc2V0cy54XG4gIH07XG59XG5cbmZ1bmN0aW9uIGlzQW55U2lkZUZ1bGx5Q2xpcHBlZChvdmVyZmxvdykge1xuICByZXR1cm4gW3RvcCwgcmlnaHQsIGJvdHRvbSwgbGVmdF0uc29tZShmdW5jdGlvbiAoc2lkZSkge1xuICAgIHJldHVybiBvdmVyZmxvd1tzaWRlXSA+PSAwO1xuICB9KTtcbn1cblxuZnVuY3Rpb24gaGlkZShfcmVmKSB7XG4gIHZhciBzdGF0ZSA9IF9yZWYuc3RhdGUsXG4gICAgICBuYW1lID0gX3JlZi5uYW1lO1xuICB2YXIgcmVmZXJlbmNlUmVjdCA9IHN0YXRlLnJlY3RzLnJlZmVyZW5jZTtcbiAgdmFyIHBvcHBlclJlY3QgPSBzdGF0ZS5yZWN0cy5wb3BwZXI7XG4gIHZhciBwcmV2ZW50ZWRPZmZzZXRzID0gc3RhdGUubW9kaWZpZXJzRGF0YS5wcmV2ZW50T3ZlcmZsb3c7XG4gIHZhciByZWZlcmVuY2VPdmVyZmxvdyA9IGRldGVjdE92ZXJmbG93KHN0YXRlLCB7XG4gICAgZWxlbWVudENvbnRleHQ6ICdyZWZlcmVuY2UnXG4gIH0pO1xuICB2YXIgcG9wcGVyQWx0T3ZlcmZsb3cgPSBkZXRlY3RPdmVyZmxvdyhzdGF0ZSwge1xuICAgIGFsdEJvdW5kYXJ5OiB0cnVlXG4gIH0pO1xuICB2YXIgcmVmZXJlbmNlQ2xpcHBpbmdPZmZzZXRzID0gZ2V0U2lkZU9mZnNldHMocmVmZXJlbmNlT3ZlcmZsb3csIHJlZmVyZW5jZVJlY3QpO1xuICB2YXIgcG9wcGVyRXNjYXBlT2Zmc2V0cyA9IGdldFNpZGVPZmZzZXRzKHBvcHBlckFsdE92ZXJmbG93LCBwb3BwZXJSZWN0LCBwcmV2ZW50ZWRPZmZzZXRzKTtcbiAgdmFyIGlzUmVmZXJlbmNlSGlkZGVuID0gaXNBbnlTaWRlRnVsbHlDbGlwcGVkKHJlZmVyZW5jZUNsaXBwaW5nT2Zmc2V0cyk7XG4gIHZhciBoYXNQb3BwZXJFc2NhcGVkID0gaXNBbnlTaWRlRnVsbHlDbGlwcGVkKHBvcHBlckVzY2FwZU9mZnNldHMpO1xuICBzdGF0ZS5tb2RpZmllcnNEYXRhW25hbWVdID0ge1xuICAgIHJlZmVyZW5jZUNsaXBwaW5nT2Zmc2V0czogcmVmZXJlbmNlQ2xpcHBpbmdPZmZzZXRzLFxuICAgIHBvcHBlckVzY2FwZU9mZnNldHM6IHBvcHBlckVzY2FwZU9mZnNldHMsXG4gICAgaXNSZWZlcmVuY2VIaWRkZW46IGlzUmVmZXJlbmNlSGlkZGVuLFxuICAgIGhhc1BvcHBlckVzY2FwZWQ6IGhhc1BvcHBlckVzY2FwZWRcbiAgfTtcbiAgc3RhdGUuYXR0cmlidXRlcy5wb3BwZXIgPSBPYmplY3QuYXNzaWduKHt9LCBzdGF0ZS5hdHRyaWJ1dGVzLnBvcHBlciwge1xuICAgICdkYXRhLXBvcHBlci1yZWZlcmVuY2UtaGlkZGVuJzogaXNSZWZlcmVuY2VIaWRkZW4sXG4gICAgJ2RhdGEtcG9wcGVyLWVzY2FwZWQnOiBoYXNQb3BwZXJFc2NhcGVkXG4gIH0pO1xufSAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgaW1wb3J0L25vLXVudXNlZC1tb2R1bGVzXG5cblxuZXhwb3J0IGRlZmF1bHQge1xuICBuYW1lOiAnaGlkZScsXG4gIGVuYWJsZWQ6IHRydWUsXG4gIHBoYXNlOiAnbWFpbicsXG4gIHJlcXVpcmVzSWZFeGlzdHM6IFsncHJldmVudE92ZXJmbG93J10sXG4gIGZuOiBoaWRlXG59OyIsImltcG9ydCBnZXRCYXNlUGxhY2VtZW50IGZyb20gXCIuLi91dGlscy9nZXRCYXNlUGxhY2VtZW50LmpzXCI7XG5pbXBvcnQgeyB0b3AsIGxlZnQsIHJpZ2h0LCBwbGFjZW1lbnRzIH0gZnJvbSBcIi4uL2VudW1zLmpzXCI7XG5leHBvcnQgZnVuY3Rpb24gZGlzdGFuY2VBbmRTa2lkZGluZ1RvWFkocGxhY2VtZW50LCByZWN0cywgb2Zmc2V0KSB7XG4gIHZhciBiYXNlUGxhY2VtZW50ID0gZ2V0QmFzZVBsYWNlbWVudChwbGFjZW1lbnQpO1xuICB2YXIgaW52ZXJ0RGlzdGFuY2UgPSBbbGVmdCwgdG9wXS5pbmRleE9mKGJhc2VQbGFjZW1lbnQpID49IDAgPyAtMSA6IDE7XG5cbiAgdmFyIF9yZWYgPSB0eXBlb2Ygb2Zmc2V0ID09PSAnZnVuY3Rpb24nID8gb2Zmc2V0KE9iamVjdC5hc3NpZ24oe30sIHJlY3RzLCB7XG4gICAgcGxhY2VtZW50OiBwbGFjZW1lbnRcbiAgfSkpIDogb2Zmc2V0LFxuICAgICAgc2tpZGRpbmcgPSBfcmVmWzBdLFxuICAgICAgZGlzdGFuY2UgPSBfcmVmWzFdO1xuXG4gIHNraWRkaW5nID0gc2tpZGRpbmcgfHwgMDtcbiAgZGlzdGFuY2UgPSAoZGlzdGFuY2UgfHwgMCkgKiBpbnZlcnREaXN0YW5jZTtcbiAgcmV0dXJuIFtsZWZ0LCByaWdodF0uaW5kZXhPZihiYXNlUGxhY2VtZW50KSA+PSAwID8ge1xuICAgIHg6IGRpc3RhbmNlLFxuICAgIHk6IHNraWRkaW5nXG4gIH0gOiB7XG4gICAgeDogc2tpZGRpbmcsXG4gICAgeTogZGlzdGFuY2VcbiAgfTtcbn1cblxuZnVuY3Rpb24gb2Zmc2V0KF9yZWYyKSB7XG4gIHZhciBzdGF0ZSA9IF9yZWYyLnN0YXRlLFxuICAgICAgb3B0aW9ucyA9IF9yZWYyLm9wdGlvbnMsXG4gICAgICBuYW1lID0gX3JlZjIubmFtZTtcbiAgdmFyIF9vcHRpb25zJG9mZnNldCA9IG9wdGlvbnMub2Zmc2V0LFxuICAgICAgb2Zmc2V0ID0gX29wdGlvbnMkb2Zmc2V0ID09PSB2b2lkIDAgPyBbMCwgMF0gOiBfb3B0aW9ucyRvZmZzZXQ7XG4gIHZhciBkYXRhID0gcGxhY2VtZW50cy5yZWR1Y2UoZnVuY3Rpb24gKGFjYywgcGxhY2VtZW50KSB7XG4gICAgYWNjW3BsYWNlbWVudF0gPSBkaXN0YW5jZUFuZFNraWRkaW5nVG9YWShwbGFjZW1lbnQsIHN0YXRlLnJlY3RzLCBvZmZzZXQpO1xuICAgIHJldHVybiBhY2M7XG4gIH0sIHt9KTtcbiAgdmFyIF9kYXRhJHN0YXRlJHBsYWNlbWVudCA9IGRhdGFbc3RhdGUucGxhY2VtZW50XSxcbiAgICAgIHggPSBfZGF0YSRzdGF0ZSRwbGFjZW1lbnQueCxcbiAgICAgIHkgPSBfZGF0YSRzdGF0ZSRwbGFjZW1lbnQueTtcblxuICBpZiAoc3RhdGUubW9kaWZpZXJzRGF0YS5wb3BwZXJPZmZzZXRzICE9IG51bGwpIHtcbiAgICBzdGF0ZS5tb2RpZmllcnNEYXRhLnBvcHBlck9mZnNldHMueCArPSB4O1xuICAgIHN0YXRlLm1vZGlmaWVyc0RhdGEucG9wcGVyT2Zmc2V0cy55ICs9IHk7XG4gIH1cblxuICBzdGF0ZS5tb2RpZmllcnNEYXRhW25hbWVdID0gZGF0YTtcbn0gLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGltcG9ydC9uby11bnVzZWQtbW9kdWxlc1xuXG5cbmV4cG9ydCBkZWZhdWx0IHtcbiAgbmFtZTogJ29mZnNldCcsXG4gIGVuYWJsZWQ6IHRydWUsXG4gIHBoYXNlOiAnbWFpbicsXG4gIHJlcXVpcmVzOiBbJ3BvcHBlck9mZnNldHMnXSxcbiAgZm46IG9mZnNldFxufTsiLCJpbXBvcnQgY29tcHV0ZU9mZnNldHMgZnJvbSBcIi4uL3V0aWxzL2NvbXB1dGVPZmZzZXRzLmpzXCI7XG5cbmZ1bmN0aW9uIHBvcHBlck9mZnNldHMoX3JlZikge1xuICB2YXIgc3RhdGUgPSBfcmVmLnN0YXRlLFxuICAgICAgbmFtZSA9IF9yZWYubmFtZTtcbiAgLy8gT2Zmc2V0cyBhcmUgdGhlIGFjdHVhbCBwb3NpdGlvbiB0aGUgcG9wcGVyIG5lZWRzIHRvIGhhdmUgdG8gYmVcbiAgLy8gcHJvcGVybHkgcG9zaXRpb25lZCBuZWFyIGl0cyByZWZlcmVuY2UgZWxlbWVudFxuICAvLyBUaGlzIGlzIHRoZSBtb3N0IGJhc2ljIHBsYWNlbWVudCwgYW5kIHdpbGwgYmUgYWRqdXN0ZWQgYnlcbiAgLy8gdGhlIG1vZGlmaWVycyBpbiB0aGUgbmV4dCBzdGVwXG4gIHN0YXRlLm1vZGlmaWVyc0RhdGFbbmFtZV0gPSBjb21wdXRlT2Zmc2V0cyh7XG4gICAgcmVmZXJlbmNlOiBzdGF0ZS5yZWN0cy5yZWZlcmVuY2UsXG4gICAgZWxlbWVudDogc3RhdGUucmVjdHMucG9wcGVyLFxuICAgIHN0cmF0ZWd5OiAnYWJzb2x1dGUnLFxuICAgIHBsYWNlbWVudDogc3RhdGUucGxhY2VtZW50XG4gIH0pO1xufSAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgaW1wb3J0L25vLXVudXNlZC1tb2R1bGVzXG5cblxuZXhwb3J0IGRlZmF1bHQge1xuICBuYW1lOiAncG9wcGVyT2Zmc2V0cycsXG4gIGVuYWJsZWQ6IHRydWUsXG4gIHBoYXNlOiAncmVhZCcsXG4gIGZuOiBwb3BwZXJPZmZzZXRzLFxuICBkYXRhOiB7fVxufTsiLCJpbXBvcnQgeyB0b3AsIGxlZnQsIHJpZ2h0LCBib3R0b20sIHN0YXJ0IH0gZnJvbSBcIi4uL2VudW1zLmpzXCI7XG5pbXBvcnQgZ2V0QmFzZVBsYWNlbWVudCBmcm9tIFwiLi4vdXRpbHMvZ2V0QmFzZVBsYWNlbWVudC5qc1wiO1xuaW1wb3J0IGdldE1haW5BeGlzRnJvbVBsYWNlbWVudCBmcm9tIFwiLi4vdXRpbHMvZ2V0TWFpbkF4aXNGcm9tUGxhY2VtZW50LmpzXCI7XG5pbXBvcnQgZ2V0QWx0QXhpcyBmcm9tIFwiLi4vdXRpbHMvZ2V0QWx0QXhpcy5qc1wiO1xuaW1wb3J0IHdpdGhpbiBmcm9tIFwiLi4vdXRpbHMvd2l0aGluLmpzXCI7XG5pbXBvcnQgZ2V0TGF5b3V0UmVjdCBmcm9tIFwiLi4vZG9tLXV0aWxzL2dldExheW91dFJlY3QuanNcIjtcbmltcG9ydCBnZXRPZmZzZXRQYXJlbnQgZnJvbSBcIi4uL2RvbS11dGlscy9nZXRPZmZzZXRQYXJlbnQuanNcIjtcbmltcG9ydCBkZXRlY3RPdmVyZmxvdyBmcm9tIFwiLi4vdXRpbHMvZGV0ZWN0T3ZlcmZsb3cuanNcIjtcbmltcG9ydCBnZXRWYXJpYXRpb24gZnJvbSBcIi4uL3V0aWxzL2dldFZhcmlhdGlvbi5qc1wiO1xuaW1wb3J0IGdldEZyZXNoU2lkZU9iamVjdCBmcm9tIFwiLi4vdXRpbHMvZ2V0RnJlc2hTaWRlT2JqZWN0LmpzXCI7XG5cbmZ1bmN0aW9uIHByZXZlbnRPdmVyZmxvdyhfcmVmKSB7XG4gIHZhciBzdGF0ZSA9IF9yZWYuc3RhdGUsXG4gICAgICBvcHRpb25zID0gX3JlZi5vcHRpb25zLFxuICAgICAgbmFtZSA9IF9yZWYubmFtZTtcbiAgdmFyIF9vcHRpb25zJG1haW5BeGlzID0gb3B0aW9ucy5tYWluQXhpcyxcbiAgICAgIGNoZWNrTWFpbkF4aXMgPSBfb3B0aW9ucyRtYWluQXhpcyA9PT0gdm9pZCAwID8gdHJ1ZSA6IF9vcHRpb25zJG1haW5BeGlzLFxuICAgICAgX29wdGlvbnMkYWx0QXhpcyA9IG9wdGlvbnMuYWx0QXhpcyxcbiAgICAgIGNoZWNrQWx0QXhpcyA9IF9vcHRpb25zJGFsdEF4aXMgPT09IHZvaWQgMCA/IGZhbHNlIDogX29wdGlvbnMkYWx0QXhpcyxcbiAgICAgIGJvdW5kYXJ5ID0gb3B0aW9ucy5ib3VuZGFyeSxcbiAgICAgIHJvb3RCb3VuZGFyeSA9IG9wdGlvbnMucm9vdEJvdW5kYXJ5LFxuICAgICAgYWx0Qm91bmRhcnkgPSBvcHRpb25zLmFsdEJvdW5kYXJ5LFxuICAgICAgcGFkZGluZyA9IG9wdGlvbnMucGFkZGluZyxcbiAgICAgIF9vcHRpb25zJHRldGhlciA9IG9wdGlvbnMudGV0aGVyLFxuICAgICAgdGV0aGVyID0gX29wdGlvbnMkdGV0aGVyID09PSB2b2lkIDAgPyB0cnVlIDogX29wdGlvbnMkdGV0aGVyLFxuICAgICAgX29wdGlvbnMkdGV0aGVyT2Zmc2V0ID0gb3B0aW9ucy50ZXRoZXJPZmZzZXQsXG4gICAgICB0ZXRoZXJPZmZzZXQgPSBfb3B0aW9ucyR0ZXRoZXJPZmZzZXQgPT09IHZvaWQgMCA/IDAgOiBfb3B0aW9ucyR0ZXRoZXJPZmZzZXQ7XG4gIHZhciBvdmVyZmxvdyA9IGRldGVjdE92ZXJmbG93KHN0YXRlLCB7XG4gICAgYm91bmRhcnk6IGJvdW5kYXJ5LFxuICAgIHJvb3RCb3VuZGFyeTogcm9vdEJvdW5kYXJ5LFxuICAgIHBhZGRpbmc6IHBhZGRpbmcsXG4gICAgYWx0Qm91bmRhcnk6IGFsdEJvdW5kYXJ5XG4gIH0pO1xuICB2YXIgYmFzZVBsYWNlbWVudCA9IGdldEJhc2VQbGFjZW1lbnQoc3RhdGUucGxhY2VtZW50KTtcbiAgdmFyIHZhcmlhdGlvbiA9IGdldFZhcmlhdGlvbihzdGF0ZS5wbGFjZW1lbnQpO1xuICB2YXIgaXNCYXNlUGxhY2VtZW50ID0gIXZhcmlhdGlvbjtcbiAgdmFyIG1haW5BeGlzID0gZ2V0TWFpbkF4aXNGcm9tUGxhY2VtZW50KGJhc2VQbGFjZW1lbnQpO1xuICB2YXIgYWx0QXhpcyA9IGdldEFsdEF4aXMobWFpbkF4aXMpO1xuICB2YXIgcG9wcGVyT2Zmc2V0cyA9IHN0YXRlLm1vZGlmaWVyc0RhdGEucG9wcGVyT2Zmc2V0cztcbiAgdmFyIHJlZmVyZW5jZVJlY3QgPSBzdGF0ZS5yZWN0cy5yZWZlcmVuY2U7XG4gIHZhciBwb3BwZXJSZWN0ID0gc3RhdGUucmVjdHMucG9wcGVyO1xuICB2YXIgdGV0aGVyT2Zmc2V0VmFsdWUgPSB0eXBlb2YgdGV0aGVyT2Zmc2V0ID09PSAnZnVuY3Rpb24nID8gdGV0aGVyT2Zmc2V0KE9iamVjdC5hc3NpZ24oe30sIHN0YXRlLnJlY3RzLCB7XG4gICAgcGxhY2VtZW50OiBzdGF0ZS5wbGFjZW1lbnRcbiAgfSkpIDogdGV0aGVyT2Zmc2V0O1xuICB2YXIgZGF0YSA9IHtcbiAgICB4OiAwLFxuICAgIHk6IDBcbiAgfTtcblxuICBpZiAoIXBvcHBlck9mZnNldHMpIHtcbiAgICByZXR1cm47XG4gIH1cblxuICBpZiAoY2hlY2tNYWluQXhpcykge1xuICAgIHZhciBtYWluU2lkZSA9IG1haW5BeGlzID09PSAneScgPyB0b3AgOiBsZWZ0O1xuICAgIHZhciBhbHRTaWRlID0gbWFpbkF4aXMgPT09ICd5JyA/IGJvdHRvbSA6IHJpZ2h0O1xuICAgIHZhciBsZW4gPSBtYWluQXhpcyA9PT0gJ3knID8gJ2hlaWdodCcgOiAnd2lkdGgnO1xuICAgIHZhciBvZmZzZXQgPSBwb3BwZXJPZmZzZXRzW21haW5BeGlzXTtcbiAgICB2YXIgbWluID0gcG9wcGVyT2Zmc2V0c1ttYWluQXhpc10gKyBvdmVyZmxvd1ttYWluU2lkZV07XG4gICAgdmFyIG1heCA9IHBvcHBlck9mZnNldHNbbWFpbkF4aXNdIC0gb3ZlcmZsb3dbYWx0U2lkZV07XG4gICAgdmFyIGFkZGl0aXZlID0gdGV0aGVyID8gLXBvcHBlclJlY3RbbGVuXSAvIDIgOiAwO1xuICAgIHZhciBtaW5MZW4gPSB2YXJpYXRpb24gPT09IHN0YXJ0ID8gcmVmZXJlbmNlUmVjdFtsZW5dIDogcG9wcGVyUmVjdFtsZW5dO1xuICAgIHZhciBtYXhMZW4gPSB2YXJpYXRpb24gPT09IHN0YXJ0ID8gLXBvcHBlclJlY3RbbGVuXSA6IC1yZWZlcmVuY2VSZWN0W2xlbl07IC8vIFdlIG5lZWQgdG8gaW5jbHVkZSB0aGUgYXJyb3cgaW4gdGhlIGNhbGN1bGF0aW9uIHNvIHRoZSBhcnJvdyBkb2Vzbid0IGdvXG4gICAgLy8gb3V0c2lkZSB0aGUgcmVmZXJlbmNlIGJvdW5kc1xuXG4gICAgdmFyIGFycm93RWxlbWVudCA9IHN0YXRlLmVsZW1lbnRzLmFycm93O1xuICAgIHZhciBhcnJvd1JlY3QgPSB0ZXRoZXIgJiYgYXJyb3dFbGVtZW50ID8gZ2V0TGF5b3V0UmVjdChhcnJvd0VsZW1lbnQpIDoge1xuICAgICAgd2lkdGg6IDAsXG4gICAgICBoZWlnaHQ6IDBcbiAgICB9O1xuICAgIHZhciBhcnJvd1BhZGRpbmdPYmplY3QgPSBzdGF0ZS5tb2RpZmllcnNEYXRhWydhcnJvdyNwZXJzaXN0ZW50J10gPyBzdGF0ZS5tb2RpZmllcnNEYXRhWydhcnJvdyNwZXJzaXN0ZW50J10ucGFkZGluZyA6IGdldEZyZXNoU2lkZU9iamVjdCgpO1xuICAgIHZhciBhcnJvd1BhZGRpbmdNaW4gPSBhcnJvd1BhZGRpbmdPYmplY3RbbWFpblNpZGVdO1xuICAgIHZhciBhcnJvd1BhZGRpbmdNYXggPSBhcnJvd1BhZGRpbmdPYmplY3RbYWx0U2lkZV07IC8vIElmIHRoZSByZWZlcmVuY2UgbGVuZ3RoIGlzIHNtYWxsZXIgdGhhbiB0aGUgYXJyb3cgbGVuZ3RoLCB3ZSBkb24ndCB3YW50XG4gICAgLy8gdG8gaW5jbHVkZSBpdHMgZnVsbCBzaXplIGluIHRoZSBjYWxjdWxhdGlvbi4gSWYgdGhlIHJlZmVyZW5jZSBpcyBzbWFsbFxuICAgIC8vIGFuZCBuZWFyIHRoZSBlZGdlIG9mIGEgYm91bmRhcnksIHRoZSBwb3BwZXIgY2FuIG92ZXJmbG93IGV2ZW4gaWYgdGhlXG4gICAgLy8gcmVmZXJlbmNlIGlzIG5vdCBvdmVyZmxvd2luZyBhcyB3ZWxsIChlLmcuIHZpcnR1YWwgZWxlbWVudHMgd2l0aCBub1xuICAgIC8vIHdpZHRoIG9yIGhlaWdodClcblxuICAgIHZhciBhcnJvd0xlbiA9IHdpdGhpbigwLCByZWZlcmVuY2VSZWN0W2xlbl0sIGFycm93UmVjdFtsZW5dKTtcbiAgICB2YXIgbWluT2Zmc2V0ID0gaXNCYXNlUGxhY2VtZW50ID8gcmVmZXJlbmNlUmVjdFtsZW5dIC8gMiAtIGFkZGl0aXZlIC0gYXJyb3dMZW4gLSBhcnJvd1BhZGRpbmdNaW4gLSB0ZXRoZXJPZmZzZXRWYWx1ZSA6IG1pbkxlbiAtIGFycm93TGVuIC0gYXJyb3dQYWRkaW5nTWluIC0gdGV0aGVyT2Zmc2V0VmFsdWU7XG4gICAgdmFyIG1heE9mZnNldCA9IGlzQmFzZVBsYWNlbWVudCA/IC1yZWZlcmVuY2VSZWN0W2xlbl0gLyAyICsgYWRkaXRpdmUgKyBhcnJvd0xlbiArIGFycm93UGFkZGluZ01heCArIHRldGhlck9mZnNldFZhbHVlIDogbWF4TGVuICsgYXJyb3dMZW4gKyBhcnJvd1BhZGRpbmdNYXggKyB0ZXRoZXJPZmZzZXRWYWx1ZTtcbiAgICB2YXIgYXJyb3dPZmZzZXRQYXJlbnQgPSBzdGF0ZS5lbGVtZW50cy5hcnJvdyAmJiBnZXRPZmZzZXRQYXJlbnQoc3RhdGUuZWxlbWVudHMuYXJyb3cpO1xuICAgIHZhciBjbGllbnRPZmZzZXQgPSBhcnJvd09mZnNldFBhcmVudCA/IG1haW5BeGlzID09PSAneScgPyBhcnJvd09mZnNldFBhcmVudC5jbGllbnRUb3AgfHwgMCA6IGFycm93T2Zmc2V0UGFyZW50LmNsaWVudExlZnQgfHwgMCA6IDA7XG4gICAgdmFyIG9mZnNldE1vZGlmaWVyVmFsdWUgPSBzdGF0ZS5tb2RpZmllcnNEYXRhLm9mZnNldCA/IHN0YXRlLm1vZGlmaWVyc0RhdGEub2Zmc2V0W3N0YXRlLnBsYWNlbWVudF1bbWFpbkF4aXNdIDogMDtcbiAgICB2YXIgdGV0aGVyTWluID0gcG9wcGVyT2Zmc2V0c1ttYWluQXhpc10gKyBtaW5PZmZzZXQgLSBvZmZzZXRNb2RpZmllclZhbHVlIC0gY2xpZW50T2Zmc2V0O1xuICAgIHZhciB0ZXRoZXJNYXggPSBwb3BwZXJPZmZzZXRzW21haW5BeGlzXSArIG1heE9mZnNldCAtIG9mZnNldE1vZGlmaWVyVmFsdWU7XG4gICAgdmFyIHByZXZlbnRlZE9mZnNldCA9IHdpdGhpbih0ZXRoZXIgPyBNYXRoLm1pbihtaW4sIHRldGhlck1pbikgOiBtaW4sIG9mZnNldCwgdGV0aGVyID8gTWF0aC5tYXgobWF4LCB0ZXRoZXJNYXgpIDogbWF4KTtcbiAgICBwb3BwZXJPZmZzZXRzW21haW5BeGlzXSA9IHByZXZlbnRlZE9mZnNldDtcbiAgICBkYXRhW21haW5BeGlzXSA9IHByZXZlbnRlZE9mZnNldCAtIG9mZnNldDtcbiAgfVxuXG4gIGlmIChjaGVja0FsdEF4aXMpIHtcbiAgICB2YXIgX21haW5TaWRlID0gbWFpbkF4aXMgPT09ICd4JyA/IHRvcCA6IGxlZnQ7XG5cbiAgICB2YXIgX2FsdFNpZGUgPSBtYWluQXhpcyA9PT0gJ3gnID8gYm90dG9tIDogcmlnaHQ7XG5cbiAgICB2YXIgX29mZnNldCA9IHBvcHBlck9mZnNldHNbYWx0QXhpc107XG5cbiAgICB2YXIgX21pbiA9IF9vZmZzZXQgKyBvdmVyZmxvd1tfbWFpblNpZGVdO1xuXG4gICAgdmFyIF9tYXggPSBfb2Zmc2V0IC0gb3ZlcmZsb3dbX2FsdFNpZGVdO1xuXG4gICAgdmFyIF9wcmV2ZW50ZWRPZmZzZXQgPSB3aXRoaW4oX21pbiwgX29mZnNldCwgX21heCk7XG5cbiAgICBwb3BwZXJPZmZzZXRzW2FsdEF4aXNdID0gX3ByZXZlbnRlZE9mZnNldDtcbiAgICBkYXRhW2FsdEF4aXNdID0gX3ByZXZlbnRlZE9mZnNldCAtIF9vZmZzZXQ7XG4gIH1cblxuICBzdGF0ZS5tb2RpZmllcnNEYXRhW25hbWVdID0gZGF0YTtcbn0gLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGltcG9ydC9uby11bnVzZWQtbW9kdWxlc1xuXG5cbmV4cG9ydCBkZWZhdWx0IHtcbiAgbmFtZTogJ3ByZXZlbnRPdmVyZmxvdycsXG4gIGVuYWJsZWQ6IHRydWUsXG4gIHBoYXNlOiAnbWFpbicsXG4gIGZuOiBwcmV2ZW50T3ZlcmZsb3csXG4gIHJlcXVpcmVzSWZFeGlzdHM6IFsnb2Zmc2V0J11cbn07IiwiaW1wb3J0IHsgcG9wcGVyR2VuZXJhdG9yIH0gZnJvbSBcIi4vaW5kZXguanNcIjtcbmltcG9ydCBldmVudExpc3RlbmVycyBmcm9tIFwiLi9tb2RpZmllcnMvZXZlbnRMaXN0ZW5lcnMuanNcIjtcbmltcG9ydCBwb3BwZXJPZmZzZXRzIGZyb20gXCIuL21vZGlmaWVycy9wb3BwZXJPZmZzZXRzLmpzXCI7XG5pbXBvcnQgY29tcHV0ZVN0eWxlcyBmcm9tIFwiLi9tb2RpZmllcnMvY29tcHV0ZVN0eWxlcy5qc1wiO1xuaW1wb3J0IGFwcGx5U3R5bGVzIGZyb20gXCIuL21vZGlmaWVycy9hcHBseVN0eWxlcy5qc1wiO1xuaW1wb3J0IG9mZnNldCBmcm9tIFwiLi9tb2RpZmllcnMvb2Zmc2V0LmpzXCI7XG5pbXBvcnQgZmxpcCBmcm9tIFwiLi9tb2RpZmllcnMvZmxpcC5qc1wiO1xuaW1wb3J0IHByZXZlbnRPdmVyZmxvdyBmcm9tIFwiLi9tb2RpZmllcnMvcHJldmVudE92ZXJmbG93LmpzXCI7XG5pbXBvcnQgYXJyb3cgZnJvbSBcIi4vbW9kaWZpZXJzL2Fycm93LmpzXCI7XG5pbXBvcnQgaGlkZSBmcm9tIFwiLi9tb2RpZmllcnMvaGlkZS5qc1wiO1xuaW1wb3J0IGRldGVjdE92ZXJmbG93IGZyb20gXCIuL3V0aWxzL2RldGVjdE92ZXJmbG93LmpzXCI7XG52YXIgZGVmYXVsdE1vZGlmaWVycyA9IFtldmVudExpc3RlbmVycywgcG9wcGVyT2Zmc2V0cywgY29tcHV0ZVN0eWxlcywgYXBwbHlTdHlsZXMsIG9mZnNldCwgZmxpcCwgcHJldmVudE92ZXJmbG93LCBhcnJvdywgaGlkZV07XG52YXIgY3JlYXRlUG9wcGVyID0gLyojX19QVVJFX18qL3BvcHBlckdlbmVyYXRvcih7XG4gIGRlZmF1bHRNb2RpZmllcnM6IGRlZmF1bHRNb2RpZmllcnNcbn0pOyAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgaW1wb3J0L25vLXVudXNlZC1tb2R1bGVzXG5cbmV4cG9ydCB7IGNyZWF0ZVBvcHBlciwgcG9wcGVyR2VuZXJhdG9yLCBkZWZhdWx0TW9kaWZpZXJzLCBkZXRlY3RPdmVyZmxvdyB9OyIsImltcG9ydCBnZXRWYXJpYXRpb24gZnJvbSBcIi4vZ2V0VmFyaWF0aW9uLmpzXCI7XG5pbXBvcnQgeyB2YXJpYXRpb25QbGFjZW1lbnRzLCBiYXNlUGxhY2VtZW50cywgcGxhY2VtZW50cyBhcyBhbGxQbGFjZW1lbnRzIH0gZnJvbSBcIi4uL2VudW1zLmpzXCI7XG5pbXBvcnQgZGV0ZWN0T3ZlcmZsb3cgZnJvbSBcIi4vZGV0ZWN0T3ZlcmZsb3cuanNcIjtcbmltcG9ydCBnZXRCYXNlUGxhY2VtZW50IGZyb20gXCIuL2dldEJhc2VQbGFjZW1lbnQuanNcIjtcblxuLyo6OiB0eXBlIE92ZXJmbG93c01hcCA9IHsgW0NvbXB1dGVkUGxhY2VtZW50XTogbnVtYmVyIH07ICovXG5cbi8qOzsgdHlwZSBPdmVyZmxvd3NNYXAgPSB7IFtrZXkgaW4gQ29tcHV0ZWRQbGFjZW1lbnRdOiBudW1iZXIgfTsgKi9cbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGNvbXB1dGVBdXRvUGxhY2VtZW50KHN0YXRlLCBvcHRpb25zKSB7XG4gIGlmIChvcHRpb25zID09PSB2b2lkIDApIHtcbiAgICBvcHRpb25zID0ge307XG4gIH1cblxuICB2YXIgX29wdGlvbnMgPSBvcHRpb25zLFxuICAgICAgcGxhY2VtZW50ID0gX29wdGlvbnMucGxhY2VtZW50LFxuICAgICAgYm91bmRhcnkgPSBfb3B0aW9ucy5ib3VuZGFyeSxcbiAgICAgIHJvb3RCb3VuZGFyeSA9IF9vcHRpb25zLnJvb3RCb3VuZGFyeSxcbiAgICAgIHBhZGRpbmcgPSBfb3B0aW9ucy5wYWRkaW5nLFxuICAgICAgZmxpcFZhcmlhdGlvbnMgPSBfb3B0aW9ucy5mbGlwVmFyaWF0aW9ucyxcbiAgICAgIF9vcHRpb25zJGFsbG93ZWRBdXRvUCA9IF9vcHRpb25zLmFsbG93ZWRBdXRvUGxhY2VtZW50cyxcbiAgICAgIGFsbG93ZWRBdXRvUGxhY2VtZW50cyA9IF9vcHRpb25zJGFsbG93ZWRBdXRvUCA9PT0gdm9pZCAwID8gYWxsUGxhY2VtZW50cyA6IF9vcHRpb25zJGFsbG93ZWRBdXRvUDtcbiAgdmFyIHZhcmlhdGlvbiA9IGdldFZhcmlhdGlvbihwbGFjZW1lbnQpO1xuICB2YXIgcGxhY2VtZW50cyA9ICh2YXJpYXRpb24gPyBmbGlwVmFyaWF0aW9ucyA/IHZhcmlhdGlvblBsYWNlbWVudHMgOiB2YXJpYXRpb25QbGFjZW1lbnRzLmZpbHRlcihmdW5jdGlvbiAocGxhY2VtZW50KSB7XG4gICAgcmV0dXJuIGdldFZhcmlhdGlvbihwbGFjZW1lbnQpID09PSB2YXJpYXRpb247XG4gIH0pIDogYmFzZVBsYWNlbWVudHMpLmZpbHRlcihmdW5jdGlvbiAocGxhY2VtZW50KSB7XG4gICAgcmV0dXJuIGFsbG93ZWRBdXRvUGxhY2VtZW50cy5pbmRleE9mKHBsYWNlbWVudCkgPj0gMDtcbiAgfSk7IC8vICRGbG93Rml4TWU6IEZsb3cgc2VlbXMgdG8gaGF2ZSBwcm9ibGVtcyB3aXRoIHR3byBhcnJheSB1bmlvbnMuLi5cblxuICB2YXIgb3ZlcmZsb3dzID0gcGxhY2VtZW50cy5yZWR1Y2UoZnVuY3Rpb24gKGFjYywgcGxhY2VtZW50KSB7XG4gICAgYWNjW3BsYWNlbWVudF0gPSBkZXRlY3RPdmVyZmxvdyhzdGF0ZSwge1xuICAgICAgcGxhY2VtZW50OiBwbGFjZW1lbnQsXG4gICAgICBib3VuZGFyeTogYm91bmRhcnksXG4gICAgICByb290Qm91bmRhcnk6IHJvb3RCb3VuZGFyeSxcbiAgICAgIHBhZGRpbmc6IHBhZGRpbmdcbiAgICB9KVtnZXRCYXNlUGxhY2VtZW50KHBsYWNlbWVudCldO1xuICAgIHJldHVybiBhY2M7XG4gIH0sIHt9KTtcbiAgcmV0dXJuIE9iamVjdC5rZXlzKG92ZXJmbG93cykuc29ydChmdW5jdGlvbiAoYSwgYikge1xuICAgIHJldHVybiBvdmVyZmxvd3NbYV0gLSBvdmVyZmxvd3NbYl07XG4gIH0pO1xufSIsImltcG9ydCBnZXRCYXNlUGxhY2VtZW50IGZyb20gXCIuL2dldEJhc2VQbGFjZW1lbnQuanNcIjtcbmltcG9ydCBnZXRWYXJpYXRpb24gZnJvbSBcIi4vZ2V0VmFyaWF0aW9uLmpzXCI7XG5pbXBvcnQgZ2V0TWFpbkF4aXNGcm9tUGxhY2VtZW50IGZyb20gXCIuL2dldE1haW5BeGlzRnJvbVBsYWNlbWVudC5qc1wiO1xuaW1wb3J0IHsgdG9wLCByaWdodCwgYm90dG9tLCBsZWZ0LCBzdGFydCwgZW5kIH0gZnJvbSBcIi4uL2VudW1zLmpzXCI7XG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBjb21wdXRlT2Zmc2V0cyhfcmVmKSB7XG4gIHZhciByZWZlcmVuY2UgPSBfcmVmLnJlZmVyZW5jZSxcbiAgICAgIGVsZW1lbnQgPSBfcmVmLmVsZW1lbnQsXG4gICAgICBwbGFjZW1lbnQgPSBfcmVmLnBsYWNlbWVudDtcbiAgdmFyIGJhc2VQbGFjZW1lbnQgPSBwbGFjZW1lbnQgPyBnZXRCYXNlUGxhY2VtZW50KHBsYWNlbWVudCkgOiBudWxsO1xuICB2YXIgdmFyaWF0aW9uID0gcGxhY2VtZW50ID8gZ2V0VmFyaWF0aW9uKHBsYWNlbWVudCkgOiBudWxsO1xuICB2YXIgY29tbW9uWCA9IHJlZmVyZW5jZS54ICsgcmVmZXJlbmNlLndpZHRoIC8gMiAtIGVsZW1lbnQud2lkdGggLyAyO1xuICB2YXIgY29tbW9uWSA9IHJlZmVyZW5jZS55ICsgcmVmZXJlbmNlLmhlaWdodCAvIDIgLSBlbGVtZW50LmhlaWdodCAvIDI7XG4gIHZhciBvZmZzZXRzO1xuXG4gIHN3aXRjaCAoYmFzZVBsYWNlbWVudCkge1xuICAgIGNhc2UgdG9wOlxuICAgICAgb2Zmc2V0cyA9IHtcbiAgICAgICAgeDogY29tbW9uWCxcbiAgICAgICAgeTogcmVmZXJlbmNlLnkgLSBlbGVtZW50LmhlaWdodFxuICAgICAgfTtcbiAgICAgIGJyZWFrO1xuXG4gICAgY2FzZSBib3R0b206XG4gICAgICBvZmZzZXRzID0ge1xuICAgICAgICB4OiBjb21tb25YLFxuICAgICAgICB5OiByZWZlcmVuY2UueSArIHJlZmVyZW5jZS5oZWlnaHRcbiAgICAgIH07XG4gICAgICBicmVhaztcblxuICAgIGNhc2UgcmlnaHQ6XG4gICAgICBvZmZzZXRzID0ge1xuICAgICAgICB4OiByZWZlcmVuY2UueCArIHJlZmVyZW5jZS53aWR0aCxcbiAgICAgICAgeTogY29tbW9uWVxuICAgICAgfTtcbiAgICAgIGJyZWFrO1xuXG4gICAgY2FzZSBsZWZ0OlxuICAgICAgb2Zmc2V0cyA9IHtcbiAgICAgICAgeDogcmVmZXJlbmNlLnggLSBlbGVtZW50LndpZHRoLFxuICAgICAgICB5OiBjb21tb25ZXG4gICAgICB9O1xuICAgICAgYnJlYWs7XG5cbiAgICBkZWZhdWx0OlxuICAgICAgb2Zmc2V0cyA9IHtcbiAgICAgICAgeDogcmVmZXJlbmNlLngsXG4gICAgICAgIHk6IHJlZmVyZW5jZS55XG4gICAgICB9O1xuICB9XG5cbiAgdmFyIG1haW5BeGlzID0gYmFzZVBsYWNlbWVudCA/IGdldE1haW5BeGlzRnJvbVBsYWNlbWVudChiYXNlUGxhY2VtZW50KSA6IG51bGw7XG5cbiAgaWYgKG1haW5BeGlzICE9IG51bGwpIHtcbiAgICB2YXIgbGVuID0gbWFpbkF4aXMgPT09ICd5JyA/ICdoZWlnaHQnIDogJ3dpZHRoJztcblxuICAgIHN3aXRjaCAodmFyaWF0aW9uKSB7XG4gICAgICBjYXNlIHN0YXJ0OlxuICAgICAgICBvZmZzZXRzW21haW5BeGlzXSA9IE1hdGguZmxvb3Iob2Zmc2V0c1ttYWluQXhpc10pIC0gTWF0aC5mbG9vcihyZWZlcmVuY2VbbGVuXSAvIDIgLSBlbGVtZW50W2xlbl0gLyAyKTtcbiAgICAgICAgYnJlYWs7XG5cbiAgICAgIGNhc2UgZW5kOlxuICAgICAgICBvZmZzZXRzW21haW5BeGlzXSA9IE1hdGguZmxvb3Iob2Zmc2V0c1ttYWluQXhpc10pICsgTWF0aC5jZWlsKHJlZmVyZW5jZVtsZW5dIC8gMiAtIGVsZW1lbnRbbGVuXSAvIDIpO1xuICAgICAgICBicmVhaztcblxuICAgICAgZGVmYXVsdDpcbiAgICB9XG4gIH1cblxuICByZXR1cm4gb2Zmc2V0cztcbn0iLCJleHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBkZWJvdW5jZShmbikge1xuICB2YXIgcGVuZGluZztcbiAgcmV0dXJuIGZ1bmN0aW9uICgpIHtcbiAgICBpZiAoIXBlbmRpbmcpIHtcbiAgICAgIHBlbmRpbmcgPSBuZXcgUHJvbWlzZShmdW5jdGlvbiAocmVzb2x2ZSkge1xuICAgICAgICBQcm9taXNlLnJlc29sdmUoKS50aGVuKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICBwZW5kaW5nID0gdW5kZWZpbmVkO1xuICAgICAgICAgIHJlc29sdmUoZm4oKSk7XG4gICAgICAgIH0pO1xuICAgICAgfSk7XG4gICAgfVxuXG4gICAgcmV0dXJuIHBlbmRpbmc7XG4gIH07XG59IiwiaW1wb3J0IGdldEJvdW5kaW5nQ2xpZW50UmVjdCBmcm9tIFwiLi4vZG9tLXV0aWxzL2dldEJvdW5kaW5nQ2xpZW50UmVjdC5qc1wiO1xuaW1wb3J0IGdldENsaXBwaW5nUmVjdCBmcm9tIFwiLi4vZG9tLXV0aWxzL2dldENsaXBwaW5nUmVjdC5qc1wiO1xuaW1wb3J0IGdldERvY3VtZW50RWxlbWVudCBmcm9tIFwiLi4vZG9tLXV0aWxzL2dldERvY3VtZW50RWxlbWVudC5qc1wiO1xuaW1wb3J0IGNvbXB1dGVPZmZzZXRzIGZyb20gXCIuL2NvbXB1dGVPZmZzZXRzLmpzXCI7XG5pbXBvcnQgcmVjdFRvQ2xpZW50UmVjdCBmcm9tIFwiLi9yZWN0VG9DbGllbnRSZWN0LmpzXCI7XG5pbXBvcnQgeyBjbGlwcGluZ1BhcmVudHMsIHJlZmVyZW5jZSwgcG9wcGVyLCBib3R0b20sIHRvcCwgcmlnaHQsIGJhc2VQbGFjZW1lbnRzLCB2aWV3cG9ydCB9IGZyb20gXCIuLi9lbnVtcy5qc1wiO1xuaW1wb3J0IHsgaXNFbGVtZW50IH0gZnJvbSBcIi4uL2RvbS11dGlscy9pbnN0YW5jZU9mLmpzXCI7XG5pbXBvcnQgbWVyZ2VQYWRkaW5nT2JqZWN0IGZyb20gXCIuL21lcmdlUGFkZGluZ09iamVjdC5qc1wiO1xuaW1wb3J0IGV4cGFuZFRvSGFzaE1hcCBmcm9tIFwiLi9leHBhbmRUb0hhc2hNYXAuanNcIjsgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGltcG9ydC9uby11bnVzZWQtbW9kdWxlc1xuXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBkZXRlY3RPdmVyZmxvdyhzdGF0ZSwgb3B0aW9ucykge1xuICBpZiAob3B0aW9ucyA9PT0gdm9pZCAwKSB7XG4gICAgb3B0aW9ucyA9IHt9O1xuICB9XG5cbiAgdmFyIF9vcHRpb25zID0gb3B0aW9ucyxcbiAgICAgIF9vcHRpb25zJHBsYWNlbWVudCA9IF9vcHRpb25zLnBsYWNlbWVudCxcbiAgICAgIHBsYWNlbWVudCA9IF9vcHRpb25zJHBsYWNlbWVudCA9PT0gdm9pZCAwID8gc3RhdGUucGxhY2VtZW50IDogX29wdGlvbnMkcGxhY2VtZW50LFxuICAgICAgX29wdGlvbnMkYm91bmRhcnkgPSBfb3B0aW9ucy5ib3VuZGFyeSxcbiAgICAgIGJvdW5kYXJ5ID0gX29wdGlvbnMkYm91bmRhcnkgPT09IHZvaWQgMCA/IGNsaXBwaW5nUGFyZW50cyA6IF9vcHRpb25zJGJvdW5kYXJ5LFxuICAgICAgX29wdGlvbnMkcm9vdEJvdW5kYXJ5ID0gX29wdGlvbnMucm9vdEJvdW5kYXJ5LFxuICAgICAgcm9vdEJvdW5kYXJ5ID0gX29wdGlvbnMkcm9vdEJvdW5kYXJ5ID09PSB2b2lkIDAgPyB2aWV3cG9ydCA6IF9vcHRpb25zJHJvb3RCb3VuZGFyeSxcbiAgICAgIF9vcHRpb25zJGVsZW1lbnRDb250ZSA9IF9vcHRpb25zLmVsZW1lbnRDb250ZXh0LFxuICAgICAgZWxlbWVudENvbnRleHQgPSBfb3B0aW9ucyRlbGVtZW50Q29udGUgPT09IHZvaWQgMCA/IHBvcHBlciA6IF9vcHRpb25zJGVsZW1lbnRDb250ZSxcbiAgICAgIF9vcHRpb25zJGFsdEJvdW5kYXJ5ID0gX29wdGlvbnMuYWx0Qm91bmRhcnksXG4gICAgICBhbHRCb3VuZGFyeSA9IF9vcHRpb25zJGFsdEJvdW5kYXJ5ID09PSB2b2lkIDAgPyBmYWxzZSA6IF9vcHRpb25zJGFsdEJvdW5kYXJ5LFxuICAgICAgX29wdGlvbnMkcGFkZGluZyA9IF9vcHRpb25zLnBhZGRpbmcsXG4gICAgICBwYWRkaW5nID0gX29wdGlvbnMkcGFkZGluZyA9PT0gdm9pZCAwID8gMCA6IF9vcHRpb25zJHBhZGRpbmc7XG4gIHZhciBwYWRkaW5nT2JqZWN0ID0gbWVyZ2VQYWRkaW5nT2JqZWN0KHR5cGVvZiBwYWRkaW5nICE9PSAnbnVtYmVyJyA/IHBhZGRpbmcgOiBleHBhbmRUb0hhc2hNYXAocGFkZGluZywgYmFzZVBsYWNlbWVudHMpKTtcbiAgdmFyIGFsdENvbnRleHQgPSBlbGVtZW50Q29udGV4dCA9PT0gcG9wcGVyID8gcmVmZXJlbmNlIDogcG9wcGVyO1xuICB2YXIgcmVmZXJlbmNlRWxlbWVudCA9IHN0YXRlLmVsZW1lbnRzLnJlZmVyZW5jZTtcbiAgdmFyIHBvcHBlclJlY3QgPSBzdGF0ZS5yZWN0cy5wb3BwZXI7XG4gIHZhciBlbGVtZW50ID0gc3RhdGUuZWxlbWVudHNbYWx0Qm91bmRhcnkgPyBhbHRDb250ZXh0IDogZWxlbWVudENvbnRleHRdO1xuICB2YXIgY2xpcHBpbmdDbGllbnRSZWN0ID0gZ2V0Q2xpcHBpbmdSZWN0KGlzRWxlbWVudChlbGVtZW50KSA/IGVsZW1lbnQgOiBlbGVtZW50LmNvbnRleHRFbGVtZW50IHx8IGdldERvY3VtZW50RWxlbWVudChzdGF0ZS5lbGVtZW50cy5wb3BwZXIpLCBib3VuZGFyeSwgcm9vdEJvdW5kYXJ5KTtcbiAgdmFyIHJlZmVyZW5jZUNsaWVudFJlY3QgPSBnZXRCb3VuZGluZ0NsaWVudFJlY3QocmVmZXJlbmNlRWxlbWVudCk7XG4gIHZhciBwb3BwZXJPZmZzZXRzID0gY29tcHV0ZU9mZnNldHMoe1xuICAgIHJlZmVyZW5jZTogcmVmZXJlbmNlQ2xpZW50UmVjdCxcbiAgICBlbGVtZW50OiBwb3BwZXJSZWN0LFxuICAgIHN0cmF0ZWd5OiAnYWJzb2x1dGUnLFxuICAgIHBsYWNlbWVudDogcGxhY2VtZW50XG4gIH0pO1xuICB2YXIgcG9wcGVyQ2xpZW50UmVjdCA9IHJlY3RUb0NsaWVudFJlY3QoT2JqZWN0LmFzc2lnbih7fSwgcG9wcGVyUmVjdCwge30sIHBvcHBlck9mZnNldHMpKTtcbiAgdmFyIGVsZW1lbnRDbGllbnRSZWN0ID0gZWxlbWVudENvbnRleHQgPT09IHBvcHBlciA/IHBvcHBlckNsaWVudFJlY3QgOiByZWZlcmVuY2VDbGllbnRSZWN0OyAvLyBwb3NpdGl2ZSA9IG92ZXJmbG93aW5nIHRoZSBjbGlwcGluZyByZWN0XG4gIC8vIDAgb3IgbmVnYXRpdmUgPSB3aXRoaW4gdGhlIGNsaXBwaW5nIHJlY3RcblxuICB2YXIgb3ZlcmZsb3dPZmZzZXRzID0ge1xuICAgIHRvcDogY2xpcHBpbmdDbGllbnRSZWN0LnRvcCAtIGVsZW1lbnRDbGllbnRSZWN0LnRvcCArIHBhZGRpbmdPYmplY3QudG9wLFxuICAgIGJvdHRvbTogZWxlbWVudENsaWVudFJlY3QuYm90dG9tIC0gY2xpcHBpbmdDbGllbnRSZWN0LmJvdHRvbSArIHBhZGRpbmdPYmplY3QuYm90dG9tLFxuICAgIGxlZnQ6IGNsaXBwaW5nQ2xpZW50UmVjdC5sZWZ0IC0gZWxlbWVudENsaWVudFJlY3QubGVmdCArIHBhZGRpbmdPYmplY3QubGVmdCxcbiAgICByaWdodDogZWxlbWVudENsaWVudFJlY3QucmlnaHQgLSBjbGlwcGluZ0NsaWVudFJlY3QucmlnaHQgKyBwYWRkaW5nT2JqZWN0LnJpZ2h0XG4gIH07XG4gIHZhciBvZmZzZXREYXRhID0gc3RhdGUubW9kaWZpZXJzRGF0YS5vZmZzZXQ7IC8vIE9mZnNldHMgY2FuIGJlIGFwcGxpZWQgb25seSB0byB0aGUgcG9wcGVyIGVsZW1lbnRcblxuICBpZiAoZWxlbWVudENvbnRleHQgPT09IHBvcHBlciAmJiBvZmZzZXREYXRhKSB7XG4gICAgdmFyIG9mZnNldCA9IG9mZnNldERhdGFbcGxhY2VtZW50XTtcbiAgICBPYmplY3Qua2V5cyhvdmVyZmxvd09mZnNldHMpLmZvckVhY2goZnVuY3Rpb24gKGtleSkge1xuICAgICAgdmFyIG11bHRpcGx5ID0gW3JpZ2h0LCBib3R0b21dLmluZGV4T2Yoa2V5KSA+PSAwID8gMSA6IC0xO1xuICAgICAgdmFyIGF4aXMgPSBbdG9wLCBib3R0b21dLmluZGV4T2Yoa2V5KSA+PSAwID8gJ3knIDogJ3gnO1xuICAgICAgb3ZlcmZsb3dPZmZzZXRzW2tleV0gKz0gb2Zmc2V0W2F4aXNdICogbXVsdGlwbHk7XG4gICAgfSk7XG4gIH1cblxuICByZXR1cm4gb3ZlcmZsb3dPZmZzZXRzO1xufSIsImV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGV4cGFuZFRvSGFzaE1hcCh2YWx1ZSwga2V5cykge1xuICByZXR1cm4ga2V5cy5yZWR1Y2UoZnVuY3Rpb24gKGhhc2hNYXAsIGtleSkge1xuICAgIGhhc2hNYXBba2V5XSA9IHZhbHVlO1xuICAgIHJldHVybiBoYXNoTWFwO1xuICB9LCB7fSk7XG59IiwiZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZm9ybWF0KHN0cikge1xuICBmb3IgKHZhciBfbGVuID0gYXJndW1lbnRzLmxlbmd0aCwgYXJncyA9IG5ldyBBcnJheShfbGVuID4gMSA/IF9sZW4gLSAxIDogMCksIF9rZXkgPSAxOyBfa2V5IDwgX2xlbjsgX2tleSsrKSB7XG4gICAgYXJnc1tfa2V5IC0gMV0gPSBhcmd1bWVudHNbX2tleV07XG4gIH1cblxuICByZXR1cm4gW10uY29uY2F0KGFyZ3MpLnJlZHVjZShmdW5jdGlvbiAocCwgYykge1xuICAgIHJldHVybiBwLnJlcGxhY2UoLyVzLywgYyk7XG4gIH0sIHN0cik7XG59IiwiZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0QWx0QXhpcyhheGlzKSB7XG4gIHJldHVybiBheGlzID09PSAneCcgPyAneScgOiAneCc7XG59IiwiaW1wb3J0IHsgYXV0byB9IGZyb20gXCIuLi9lbnVtcy5qc1wiO1xuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0QmFzZVBsYWNlbWVudChwbGFjZW1lbnQpIHtcbiAgcmV0dXJuIHBsYWNlbWVudC5zcGxpdCgnLScpWzBdO1xufSIsImV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGdldEZyZXNoU2lkZU9iamVjdCgpIHtcbiAgcmV0dXJuIHtcbiAgICB0b3A6IDAsXG4gICAgcmlnaHQ6IDAsXG4gICAgYm90dG9tOiAwLFxuICAgIGxlZnQ6IDBcbiAgfTtcbn0iLCJleHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBnZXRNYWluQXhpc0Zyb21QbGFjZW1lbnQocGxhY2VtZW50KSB7XG4gIHJldHVybiBbJ3RvcCcsICdib3R0b20nXS5pbmRleE9mKHBsYWNlbWVudCkgPj0gMCA/ICd4JyA6ICd5Jztcbn0iLCJ2YXIgaGFzaCA9IHtcbiAgbGVmdDogJ3JpZ2h0JyxcbiAgcmlnaHQ6ICdsZWZ0JyxcbiAgYm90dG9tOiAndG9wJyxcbiAgdG9wOiAnYm90dG9tJ1xufTtcbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIGdldE9wcG9zaXRlUGxhY2VtZW50KHBsYWNlbWVudCkge1xuICByZXR1cm4gcGxhY2VtZW50LnJlcGxhY2UoL2xlZnR8cmlnaHR8Ym90dG9tfHRvcC9nLCBmdW5jdGlvbiAobWF0Y2hlZCkge1xuICAgIHJldHVybiBoYXNoW21hdGNoZWRdO1xuICB9KTtcbn0iLCJ2YXIgaGFzaCA9IHtcbiAgc3RhcnQ6ICdlbmQnLFxuICBlbmQ6ICdzdGFydCdcbn07XG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBnZXRPcHBvc2l0ZVZhcmlhdGlvblBsYWNlbWVudChwbGFjZW1lbnQpIHtcbiAgcmV0dXJuIHBsYWNlbWVudC5yZXBsYWNlKC9zdGFydHxlbmQvZywgZnVuY3Rpb24gKG1hdGNoZWQpIHtcbiAgICByZXR1cm4gaGFzaFttYXRjaGVkXTtcbiAgfSk7XG59IiwiZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gZ2V0VmFyaWF0aW9uKHBsYWNlbWVudCkge1xuICByZXR1cm4gcGxhY2VtZW50LnNwbGl0KCctJylbMV07XG59IiwiZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gbWVyZ2VCeU5hbWUobW9kaWZpZXJzKSB7XG4gIHZhciBtZXJnZWQgPSBtb2RpZmllcnMucmVkdWNlKGZ1bmN0aW9uIChtZXJnZWQsIGN1cnJlbnQpIHtcbiAgICB2YXIgZXhpc3RpbmcgPSBtZXJnZWRbY3VycmVudC5uYW1lXTtcbiAgICBtZXJnZWRbY3VycmVudC5uYW1lXSA9IGV4aXN0aW5nID8gT2JqZWN0LmFzc2lnbih7fSwgZXhpc3RpbmcsIHt9LCBjdXJyZW50LCB7XG4gICAgICBvcHRpb25zOiBPYmplY3QuYXNzaWduKHt9LCBleGlzdGluZy5vcHRpb25zLCB7fSwgY3VycmVudC5vcHRpb25zKSxcbiAgICAgIGRhdGE6IE9iamVjdC5hc3NpZ24oe30sIGV4aXN0aW5nLmRhdGEsIHt9LCBjdXJyZW50LmRhdGEpXG4gICAgfSkgOiBjdXJyZW50O1xuICAgIHJldHVybiBtZXJnZWQ7XG4gIH0sIHt9KTsgLy8gSUUxMSBkb2VzIG5vdCBzdXBwb3J0IE9iamVjdC52YWx1ZXNcblxuICByZXR1cm4gT2JqZWN0LmtleXMobWVyZ2VkKS5tYXAoZnVuY3Rpb24gKGtleSkge1xuICAgIHJldHVybiBtZXJnZWRba2V5XTtcbiAgfSk7XG59IiwiaW1wb3J0IGdldEZyZXNoU2lkZU9iamVjdCBmcm9tIFwiLi9nZXRGcmVzaFNpZGVPYmplY3QuanNcIjtcbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIG1lcmdlUGFkZGluZ09iamVjdChwYWRkaW5nT2JqZWN0KSB7XG4gIHJldHVybiBPYmplY3QuYXNzaWduKHt9LCBnZXRGcmVzaFNpZGVPYmplY3QoKSwge30sIHBhZGRpbmdPYmplY3QpO1xufSIsImltcG9ydCB7IG1vZGlmaWVyUGhhc2VzIH0gZnJvbSBcIi4uL2VudW1zLmpzXCI7IC8vIHNvdXJjZTogaHR0cHM6Ly9zdGFja292ZXJmbG93LmNvbS9xdWVzdGlvbnMvNDk4NzUyNTVcblxuZnVuY3Rpb24gb3JkZXIobW9kaWZpZXJzKSB7XG4gIHZhciBtYXAgPSBuZXcgTWFwKCk7XG4gIHZhciB2aXNpdGVkID0gbmV3IFNldCgpO1xuICB2YXIgcmVzdWx0ID0gW107XG4gIG1vZGlmaWVycy5mb3JFYWNoKGZ1bmN0aW9uIChtb2RpZmllcikge1xuICAgIG1hcC5zZXQobW9kaWZpZXIubmFtZSwgbW9kaWZpZXIpO1xuICB9KTsgLy8gT24gdmlzaXRpbmcgb2JqZWN0LCBjaGVjayBmb3IgaXRzIGRlcGVuZGVuY2llcyBhbmQgdmlzaXQgdGhlbSByZWN1cnNpdmVseVxuXG4gIGZ1bmN0aW9uIHNvcnQobW9kaWZpZXIpIHtcbiAgICB2aXNpdGVkLmFkZChtb2RpZmllci5uYW1lKTtcbiAgICB2YXIgcmVxdWlyZXMgPSBbXS5jb25jYXQobW9kaWZpZXIucmVxdWlyZXMgfHwgW10sIG1vZGlmaWVyLnJlcXVpcmVzSWZFeGlzdHMgfHwgW10pO1xuICAgIHJlcXVpcmVzLmZvckVhY2goZnVuY3Rpb24gKGRlcCkge1xuICAgICAgaWYgKCF2aXNpdGVkLmhhcyhkZXApKSB7XG4gICAgICAgIHZhciBkZXBNb2RpZmllciA9IG1hcC5nZXQoZGVwKTtcblxuICAgICAgICBpZiAoZGVwTW9kaWZpZXIpIHtcbiAgICAgICAgICBzb3J0KGRlcE1vZGlmaWVyKTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH0pO1xuICAgIHJlc3VsdC5wdXNoKG1vZGlmaWVyKTtcbiAgfVxuXG4gIG1vZGlmaWVycy5mb3JFYWNoKGZ1bmN0aW9uIChtb2RpZmllcikge1xuICAgIGlmICghdmlzaXRlZC5oYXMobW9kaWZpZXIubmFtZSkpIHtcbiAgICAgIC8vIGNoZWNrIGZvciB2aXNpdGVkIG9iamVjdFxuICAgICAgc29ydChtb2RpZmllcik7XG4gICAgfVxuICB9KTtcbiAgcmV0dXJuIHJlc3VsdDtcbn1cblxuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gb3JkZXJNb2RpZmllcnMobW9kaWZpZXJzKSB7XG4gIC8vIG9yZGVyIGJhc2VkIG9uIGRlcGVuZGVuY2llc1xuICB2YXIgb3JkZXJlZE1vZGlmaWVycyA9IG9yZGVyKG1vZGlmaWVycyk7IC8vIG9yZGVyIGJhc2VkIG9uIHBoYXNlXG5cbiAgcmV0dXJuIG1vZGlmaWVyUGhhc2VzLnJlZHVjZShmdW5jdGlvbiAoYWNjLCBwaGFzZSkge1xuICAgIHJldHVybiBhY2MuY29uY2F0KG9yZGVyZWRNb2RpZmllcnMuZmlsdGVyKGZ1bmN0aW9uIChtb2RpZmllcikge1xuICAgICAgcmV0dXJuIG1vZGlmaWVyLnBoYXNlID09PSBwaGFzZTtcbiAgICB9KSk7XG4gIH0sIFtdKTtcbn0iLCJleHBvcnQgZGVmYXVsdCBmdW5jdGlvbiByZWN0VG9DbGllbnRSZWN0KHJlY3QpIHtcbiAgcmV0dXJuIE9iamVjdC5hc3NpZ24oe30sIHJlY3QsIHtcbiAgICBsZWZ0OiByZWN0LngsXG4gICAgdG9wOiByZWN0LnksXG4gICAgcmlnaHQ6IHJlY3QueCArIHJlY3Qud2lkdGgsXG4gICAgYm90dG9tOiByZWN0LnkgKyByZWN0LmhlaWdodFxuICB9KTtcbn0iLCJleHBvcnQgZGVmYXVsdCBmdW5jdGlvbiB1bmlxdWVCeShhcnIsIGZuKSB7XG4gIHZhciBpZGVudGlmaWVycyA9IG5ldyBTZXQoKTtcbiAgcmV0dXJuIGFyci5maWx0ZXIoZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICB2YXIgaWRlbnRpZmllciA9IGZuKGl0ZW0pO1xuXG4gICAgaWYgKCFpZGVudGlmaWVycy5oYXMoaWRlbnRpZmllcikpIHtcbiAgICAgIGlkZW50aWZpZXJzLmFkZChpZGVudGlmaWVyKTtcbiAgICAgIHJldHVybiB0cnVlO1xuICAgIH1cbiAgfSk7XG59IiwiaW1wb3J0IGZvcm1hdCBmcm9tIFwiLi9mb3JtYXQuanNcIjtcbmltcG9ydCB7IG1vZGlmaWVyUGhhc2VzIH0gZnJvbSBcIi4uL2VudW1zLmpzXCI7XG52YXIgSU5WQUxJRF9NT0RJRklFUl9FUlJPUiA9ICdQb3BwZXI6IG1vZGlmaWVyIFwiJXNcIiBwcm92aWRlZCBhbiBpbnZhbGlkICVzIHByb3BlcnR5LCBleHBlY3RlZCAlcyBidXQgZ290ICVzJztcbnZhciBNSVNTSU5HX0RFUEVOREVOQ1lfRVJST1IgPSAnUG9wcGVyOiBtb2RpZmllciBcIiVzXCIgcmVxdWlyZXMgXCIlc1wiLCBidXQgXCIlc1wiIG1vZGlmaWVyIGlzIG5vdCBhdmFpbGFibGUnO1xudmFyIFZBTElEX1BST1BFUlRJRVMgPSBbJ25hbWUnLCAnZW5hYmxlZCcsICdwaGFzZScsICdmbicsICdlZmZlY3QnLCAncmVxdWlyZXMnLCAnb3B0aW9ucyddO1xuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gdmFsaWRhdGVNb2RpZmllcnMobW9kaWZpZXJzKSB7XG4gIG1vZGlmaWVycy5mb3JFYWNoKGZ1bmN0aW9uIChtb2RpZmllcikge1xuICAgIE9iamVjdC5rZXlzKG1vZGlmaWVyKS5mb3JFYWNoKGZ1bmN0aW9uIChrZXkpIHtcbiAgICAgIHN3aXRjaCAoa2V5KSB7XG4gICAgICAgIGNhc2UgJ25hbWUnOlxuICAgICAgICAgIGlmICh0eXBlb2YgbW9kaWZpZXIubmFtZSAhPT0gJ3N0cmluZycpIHtcbiAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoZm9ybWF0KElOVkFMSURfTU9ESUZJRVJfRVJST1IsIFN0cmluZyhtb2RpZmllci5uYW1lKSwgJ1wibmFtZVwiJywgJ1wic3RyaW5nXCInLCBcIlxcXCJcIiArIFN0cmluZyhtb2RpZmllci5uYW1lKSArIFwiXFxcIlwiKSk7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgYnJlYWs7XG5cbiAgICAgICAgY2FzZSAnZW5hYmxlZCc6XG4gICAgICAgICAgaWYgKHR5cGVvZiBtb2RpZmllci5lbmFibGVkICE9PSAnYm9vbGVhbicpIHtcbiAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoZm9ybWF0KElOVkFMSURfTU9ESUZJRVJfRVJST1IsIG1vZGlmaWVyLm5hbWUsICdcImVuYWJsZWRcIicsICdcImJvb2xlYW5cIicsIFwiXFxcIlwiICsgU3RyaW5nKG1vZGlmaWVyLmVuYWJsZWQpICsgXCJcXFwiXCIpKTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgY2FzZSAncGhhc2UnOlxuICAgICAgICAgIGlmIChtb2RpZmllclBoYXNlcy5pbmRleE9mKG1vZGlmaWVyLnBoYXNlKSA8IDApIHtcbiAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoZm9ybWF0KElOVkFMSURfTU9ESUZJRVJfRVJST1IsIG1vZGlmaWVyLm5hbWUsICdcInBoYXNlXCInLCBcImVpdGhlciBcIiArIG1vZGlmaWVyUGhhc2VzLmpvaW4oJywgJyksIFwiXFxcIlwiICsgU3RyaW5nKG1vZGlmaWVyLnBoYXNlKSArIFwiXFxcIlwiKSk7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgYnJlYWs7XG5cbiAgICAgICAgY2FzZSAnZm4nOlxuICAgICAgICAgIGlmICh0eXBlb2YgbW9kaWZpZXIuZm4gIT09ICdmdW5jdGlvbicpIHtcbiAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoZm9ybWF0KElOVkFMSURfTU9ESUZJRVJfRVJST1IsIG1vZGlmaWVyLm5hbWUsICdcImZuXCInLCAnXCJmdW5jdGlvblwiJywgXCJcXFwiXCIgKyBTdHJpbmcobW9kaWZpZXIuZm4pICsgXCJcXFwiXCIpKTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICBicmVhaztcblxuICAgICAgICBjYXNlICdlZmZlY3QnOlxuICAgICAgICAgIGlmICh0eXBlb2YgbW9kaWZpZXIuZWZmZWN0ICE9PSAnZnVuY3Rpb24nKSB7XG4gICAgICAgICAgICBjb25zb2xlLmVycm9yKGZvcm1hdChJTlZBTElEX01PRElGSUVSX0VSUk9SLCBtb2RpZmllci5uYW1lLCAnXCJlZmZlY3RcIicsICdcImZ1bmN0aW9uXCInLCBcIlxcXCJcIiArIFN0cmluZyhtb2RpZmllci5mbikgKyBcIlxcXCJcIikpO1xuICAgICAgICAgIH1cblxuICAgICAgICAgIGJyZWFrO1xuXG4gICAgICAgIGNhc2UgJ3JlcXVpcmVzJzpcbiAgICAgICAgICBpZiAoIUFycmF5LmlzQXJyYXkobW9kaWZpZXIucmVxdWlyZXMpKSB7XG4gICAgICAgICAgICBjb25zb2xlLmVycm9yKGZvcm1hdChJTlZBTElEX01PRElGSUVSX0VSUk9SLCBtb2RpZmllci5uYW1lLCAnXCJyZXF1aXJlc1wiJywgJ1wiYXJyYXlcIicsIFwiXFxcIlwiICsgU3RyaW5nKG1vZGlmaWVyLnJlcXVpcmVzKSArIFwiXFxcIlwiKSk7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgYnJlYWs7XG5cbiAgICAgICAgY2FzZSAncmVxdWlyZXNJZkV4aXN0cyc6XG4gICAgICAgICAgaWYgKCFBcnJheS5pc0FycmF5KG1vZGlmaWVyLnJlcXVpcmVzSWZFeGlzdHMpKSB7XG4gICAgICAgICAgICBjb25zb2xlLmVycm9yKGZvcm1hdChJTlZBTElEX01PRElGSUVSX0VSUk9SLCBtb2RpZmllci5uYW1lLCAnXCJyZXF1aXJlc0lmRXhpc3RzXCInLCAnXCJhcnJheVwiJywgXCJcXFwiXCIgKyBTdHJpbmcobW9kaWZpZXIucmVxdWlyZXNJZkV4aXN0cykgKyBcIlxcXCJcIikpO1xuICAgICAgICAgIH1cblxuICAgICAgICAgIGJyZWFrO1xuXG4gICAgICAgIGNhc2UgJ29wdGlvbnMnOlxuICAgICAgICBjYXNlICdkYXRhJzpcbiAgICAgICAgICBicmVhaztcblxuICAgICAgICBkZWZhdWx0OlxuICAgICAgICAgIGNvbnNvbGUuZXJyb3IoXCJQb3BwZXJKUzogYW4gaW52YWxpZCBwcm9wZXJ0eSBoYXMgYmVlbiBwcm92aWRlZCB0byB0aGUgXFxcIlwiICsgbW9kaWZpZXIubmFtZSArIFwiXFxcIiBtb2RpZmllciwgdmFsaWQgcHJvcGVydGllcyBhcmUgXCIgKyBWQUxJRF9QUk9QRVJUSUVTLm1hcChmdW5jdGlvbiAocykge1xuICAgICAgICAgICAgcmV0dXJuIFwiXFxcIlwiICsgcyArIFwiXFxcIlwiO1xuICAgICAgICAgIH0pLmpvaW4oJywgJykgKyBcIjsgYnV0IFxcXCJcIiArIGtleSArIFwiXFxcIiB3YXMgcHJvdmlkZWQuXCIpO1xuICAgICAgfVxuXG4gICAgICBtb2RpZmllci5yZXF1aXJlcyAmJiBtb2RpZmllci5yZXF1aXJlcy5mb3JFYWNoKGZ1bmN0aW9uIChyZXF1aXJlbWVudCkge1xuICAgICAgICBpZiAobW9kaWZpZXJzLmZpbmQoZnVuY3Rpb24gKG1vZCkge1xuICAgICAgICAgIHJldHVybiBtb2QubmFtZSA9PT0gcmVxdWlyZW1lbnQ7XG4gICAgICAgIH0pID09IG51bGwpIHtcbiAgICAgICAgICBjb25zb2xlLmVycm9yKGZvcm1hdChNSVNTSU5HX0RFUEVOREVOQ1lfRVJST1IsIFN0cmluZyhtb2RpZmllci5uYW1lKSwgcmVxdWlyZW1lbnQsIHJlcXVpcmVtZW50KSk7XG4gICAgICAgIH1cbiAgICAgIH0pO1xuICAgIH0pO1xuICB9KTtcbn0iLCJleHBvcnQgZGVmYXVsdCBmdW5jdGlvbiB3aXRoaW4obWluLCB2YWx1ZSwgbWF4KSB7XG4gIHJldHVybiBNYXRoLm1heChtaW4sIE1hdGgubWluKHZhbHVlLCBtYXgpKTtcbn0iLCIvKiFcbiAqIHBlcmZlY3Qtc2Nyb2xsYmFyIHYxLjUuMFxuICogQ29weXJpZ2h0IDIwMjAgSHl1bmplIEp1biwgTURCb290c3RyYXAgYW5kIENvbnRyaWJ1dG9yc1xuICogTGljZW5zZWQgdW5kZXIgTUlUXG4gKi9cblxuZnVuY3Rpb24gZ2V0KGVsZW1lbnQpIHtcbiAgcmV0dXJuIGdldENvbXB1dGVkU3R5bGUoZWxlbWVudCk7XG59XG5cbmZ1bmN0aW9uIHNldChlbGVtZW50LCBvYmopIHtcbiAgZm9yICh2YXIga2V5IGluIG9iaikge1xuICAgIHZhciB2YWwgPSBvYmpba2V5XTtcbiAgICBpZiAodHlwZW9mIHZhbCA9PT0gJ251bWJlcicpIHtcbiAgICAgIHZhbCA9IHZhbCArIFwicHhcIjtcbiAgICB9XG4gICAgZWxlbWVudC5zdHlsZVtrZXldID0gdmFsO1xuICB9XG4gIHJldHVybiBlbGVtZW50O1xufVxuXG5mdW5jdGlvbiBkaXYoY2xhc3NOYW1lKSB7XG4gIHZhciBkaXYgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdkaXYnKTtcbiAgZGl2LmNsYXNzTmFtZSA9IGNsYXNzTmFtZTtcbiAgcmV0dXJuIGRpdjtcbn1cblxudmFyIGVsTWF0Y2hlcyA9XG4gIHR5cGVvZiBFbGVtZW50ICE9PSAndW5kZWZpbmVkJyAmJlxuICAoRWxlbWVudC5wcm90b3R5cGUubWF0Y2hlcyB8fFxuICAgIEVsZW1lbnQucHJvdG90eXBlLndlYmtpdE1hdGNoZXNTZWxlY3RvciB8fFxuICAgIEVsZW1lbnQucHJvdG90eXBlLm1vek1hdGNoZXNTZWxlY3RvciB8fFxuICAgIEVsZW1lbnQucHJvdG90eXBlLm1zTWF0Y2hlc1NlbGVjdG9yKTtcblxuZnVuY3Rpb24gbWF0Y2hlcyhlbGVtZW50LCBxdWVyeSkge1xuICBpZiAoIWVsTWF0Y2hlcykge1xuICAgIHRocm93IG5ldyBFcnJvcignTm8gZWxlbWVudCBtYXRjaGluZyBtZXRob2Qgc3VwcG9ydGVkJyk7XG4gIH1cblxuICByZXR1cm4gZWxNYXRjaGVzLmNhbGwoZWxlbWVudCwgcXVlcnkpO1xufVxuXG5mdW5jdGlvbiByZW1vdmUoZWxlbWVudCkge1xuICBpZiAoZWxlbWVudC5yZW1vdmUpIHtcbiAgICBlbGVtZW50LnJlbW92ZSgpO1xuICB9IGVsc2Uge1xuICAgIGlmIChlbGVtZW50LnBhcmVudE5vZGUpIHtcbiAgICAgIGVsZW1lbnQucGFyZW50Tm9kZS5yZW1vdmVDaGlsZChlbGVtZW50KTtcbiAgICB9XG4gIH1cbn1cblxuZnVuY3Rpb24gcXVlcnlDaGlsZHJlbihlbGVtZW50LCBzZWxlY3Rvcikge1xuICByZXR1cm4gQXJyYXkucHJvdG90eXBlLmZpbHRlci5jYWxsKGVsZW1lbnQuY2hpbGRyZW4sIGZ1bmN0aW9uIChjaGlsZCkgeyByZXR1cm4gbWF0Y2hlcyhjaGlsZCwgc2VsZWN0b3IpOyB9XG4gICk7XG59XG5cbnZhciBjbHMgPSB7XG4gIG1haW46ICdwcycsXG4gIHJ0bDogJ3BzX19ydGwnLFxuICBlbGVtZW50OiB7XG4gICAgdGh1bWI6IGZ1bmN0aW9uICh4KSB7IHJldHVybiAoXCJwc19fdGh1bWItXCIgKyB4KTsgfSxcbiAgICByYWlsOiBmdW5jdGlvbiAoeCkgeyByZXR1cm4gKFwicHNfX3JhaWwtXCIgKyB4KTsgfSxcbiAgICBjb25zdW1pbmc6ICdwc19fY2hpbGQtLWNvbnN1bWUnLFxuICB9LFxuICBzdGF0ZToge1xuICAgIGZvY3VzOiAncHMtLWZvY3VzJyxcbiAgICBjbGlja2luZzogJ3BzLS1jbGlja2luZycsXG4gICAgYWN0aXZlOiBmdW5jdGlvbiAoeCkgeyByZXR1cm4gKFwicHMtLWFjdGl2ZS1cIiArIHgpOyB9LFxuICAgIHNjcm9sbGluZzogZnVuY3Rpb24gKHgpIHsgcmV0dXJuIChcInBzLS1zY3JvbGxpbmctXCIgKyB4KTsgfSxcbiAgfSxcbn07XG5cbi8qXG4gKiBIZWxwZXIgbWV0aG9kc1xuICovXG52YXIgc2Nyb2xsaW5nQ2xhc3NUaW1lb3V0ID0geyB4OiBudWxsLCB5OiBudWxsIH07XG5cbmZ1bmN0aW9uIGFkZFNjcm9sbGluZ0NsYXNzKGksIHgpIHtcbiAgdmFyIGNsYXNzTGlzdCA9IGkuZWxlbWVudC5jbGFzc0xpc3Q7XG4gIHZhciBjbGFzc05hbWUgPSBjbHMuc3RhdGUuc2Nyb2xsaW5nKHgpO1xuXG4gIGlmIChjbGFzc0xpc3QuY29udGFpbnMoY2xhc3NOYW1lKSkge1xuICAgIGNsZWFyVGltZW91dChzY3JvbGxpbmdDbGFzc1RpbWVvdXRbeF0pO1xuICB9IGVsc2Uge1xuICAgIGNsYXNzTGlzdC5hZGQoY2xhc3NOYW1lKTtcbiAgfVxufVxuXG5mdW5jdGlvbiByZW1vdmVTY3JvbGxpbmdDbGFzcyhpLCB4KSB7XG4gIHNjcm9sbGluZ0NsYXNzVGltZW91dFt4XSA9IHNldFRpbWVvdXQoXG4gICAgZnVuY3Rpb24gKCkgeyByZXR1cm4gaS5pc0FsaXZlICYmIGkuZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKGNscy5zdGF0ZS5zY3JvbGxpbmcoeCkpOyB9LFxuICAgIGkuc2V0dGluZ3Muc2Nyb2xsaW5nVGhyZXNob2xkXG4gICk7XG59XG5cbmZ1bmN0aW9uIHNldFNjcm9sbGluZ0NsYXNzSW5zdGFudGx5KGksIHgpIHtcbiAgYWRkU2Nyb2xsaW5nQ2xhc3MoaSwgeCk7XG4gIHJlbW92ZVNjcm9sbGluZ0NsYXNzKGksIHgpO1xufVxuXG52YXIgRXZlbnRFbGVtZW50ID0gZnVuY3Rpb24gRXZlbnRFbGVtZW50KGVsZW1lbnQpIHtcbiAgdGhpcy5lbGVtZW50ID0gZWxlbWVudDtcbiAgdGhpcy5oYW5kbGVycyA9IHt9O1xufTtcblxudmFyIHByb3RvdHlwZUFjY2Vzc29ycyA9IHsgaXNFbXB0eTogeyBjb25maWd1cmFibGU6IHRydWUgfSB9O1xuXG5FdmVudEVsZW1lbnQucHJvdG90eXBlLmJpbmQgPSBmdW5jdGlvbiBiaW5kIChldmVudE5hbWUsIGhhbmRsZXIpIHtcbiAgaWYgKHR5cGVvZiB0aGlzLmhhbmRsZXJzW2V2ZW50TmFtZV0gPT09ICd1bmRlZmluZWQnKSB7XG4gICAgdGhpcy5oYW5kbGVyc1tldmVudE5hbWVdID0gW107XG4gIH1cbiAgdGhpcy5oYW5kbGVyc1tldmVudE5hbWVdLnB1c2goaGFuZGxlcik7XG4gIHRoaXMuZWxlbWVudC5hZGRFdmVudExpc3RlbmVyKGV2ZW50TmFtZSwgaGFuZGxlciwgZmFsc2UpO1xufTtcblxuRXZlbnRFbGVtZW50LnByb3RvdHlwZS51bmJpbmQgPSBmdW5jdGlvbiB1bmJpbmQgKGV2ZW50TmFtZSwgdGFyZ2V0KSB7XG4gICAgdmFyIHRoaXMkMSA9IHRoaXM7XG5cbiAgdGhpcy5oYW5kbGVyc1tldmVudE5hbWVdID0gdGhpcy5oYW5kbGVyc1tldmVudE5hbWVdLmZpbHRlcihmdW5jdGlvbiAoaGFuZGxlcikge1xuICAgIGlmICh0YXJnZXQgJiYgaGFuZGxlciAhPT0gdGFyZ2V0KSB7XG4gICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9XG4gICAgdGhpcyQxLmVsZW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcihldmVudE5hbWUsIGhhbmRsZXIsIGZhbHNlKTtcbiAgICByZXR1cm4gZmFsc2U7XG4gIH0pO1xufTtcblxuRXZlbnRFbGVtZW50LnByb3RvdHlwZS51bmJpbmRBbGwgPSBmdW5jdGlvbiB1bmJpbmRBbGwgKCkge1xuICBmb3IgKHZhciBuYW1lIGluIHRoaXMuaGFuZGxlcnMpIHtcbiAgICB0aGlzLnVuYmluZChuYW1lKTtcbiAgfVxufTtcblxucHJvdG90eXBlQWNjZXNzb3JzLmlzRW1wdHkuZ2V0ID0gZnVuY3Rpb24gKCkge1xuICAgIHZhciB0aGlzJDEgPSB0aGlzO1xuXG4gIHJldHVybiBPYmplY3Qua2V5cyh0aGlzLmhhbmRsZXJzKS5ldmVyeShcbiAgICBmdW5jdGlvbiAoa2V5KSB7IHJldHVybiB0aGlzJDEuaGFuZGxlcnNba2V5XS5sZW5ndGggPT09IDA7IH1cbiAgKTtcbn07XG5cbk9iamVjdC5kZWZpbmVQcm9wZXJ0aWVzKCBFdmVudEVsZW1lbnQucHJvdG90eXBlLCBwcm90b3R5cGVBY2Nlc3NvcnMgKTtcblxudmFyIEV2ZW50TWFuYWdlciA9IGZ1bmN0aW9uIEV2ZW50TWFuYWdlcigpIHtcbiAgdGhpcy5ldmVudEVsZW1lbnRzID0gW107XG59O1xuXG5FdmVudE1hbmFnZXIucHJvdG90eXBlLmV2ZW50RWxlbWVudCA9IGZ1bmN0aW9uIGV2ZW50RWxlbWVudCAoZWxlbWVudCkge1xuICB2YXIgZWUgPSB0aGlzLmV2ZW50RWxlbWVudHMuZmlsdGVyKGZ1bmN0aW9uIChlZSkgeyByZXR1cm4gZWUuZWxlbWVudCA9PT0gZWxlbWVudDsgfSlbMF07XG4gIGlmICghZWUpIHtcbiAgICBlZSA9IG5ldyBFdmVudEVsZW1lbnQoZWxlbWVudCk7XG4gICAgdGhpcy5ldmVudEVsZW1lbnRzLnB1c2goZWUpO1xuICB9XG4gIHJldHVybiBlZTtcbn07XG5cbkV2ZW50TWFuYWdlci5wcm90b3R5cGUuYmluZCA9IGZ1bmN0aW9uIGJpbmQgKGVsZW1lbnQsIGV2ZW50TmFtZSwgaGFuZGxlcikge1xuICB0aGlzLmV2ZW50RWxlbWVudChlbGVtZW50KS5iaW5kKGV2ZW50TmFtZSwgaGFuZGxlcik7XG59O1xuXG5FdmVudE1hbmFnZXIucHJvdG90eXBlLnVuYmluZCA9IGZ1bmN0aW9uIHVuYmluZCAoZWxlbWVudCwgZXZlbnROYW1lLCBoYW5kbGVyKSB7XG4gIHZhciBlZSA9IHRoaXMuZXZlbnRFbGVtZW50KGVsZW1lbnQpO1xuICBlZS51bmJpbmQoZXZlbnROYW1lLCBoYW5kbGVyKTtcblxuICBpZiAoZWUuaXNFbXB0eSkge1xuICAgIC8vIHJlbW92ZVxuICAgIHRoaXMuZXZlbnRFbGVtZW50cy5zcGxpY2UodGhpcy5ldmVudEVsZW1lbnRzLmluZGV4T2YoZWUpLCAxKTtcbiAgfVxufTtcblxuRXZlbnRNYW5hZ2VyLnByb3RvdHlwZS51bmJpbmRBbGwgPSBmdW5jdGlvbiB1bmJpbmRBbGwgKCkge1xuICB0aGlzLmV2ZW50RWxlbWVudHMuZm9yRWFjaChmdW5jdGlvbiAoZSkgeyByZXR1cm4gZS51bmJpbmRBbGwoKTsgfSk7XG4gIHRoaXMuZXZlbnRFbGVtZW50cyA9IFtdO1xufTtcblxuRXZlbnRNYW5hZ2VyLnByb3RvdHlwZS5vbmNlID0gZnVuY3Rpb24gb25jZSAoZWxlbWVudCwgZXZlbnROYW1lLCBoYW5kbGVyKSB7XG4gIHZhciBlZSA9IHRoaXMuZXZlbnRFbGVtZW50KGVsZW1lbnQpO1xuICB2YXIgb25jZUhhbmRsZXIgPSBmdW5jdGlvbiAoZXZ0KSB7XG4gICAgZWUudW5iaW5kKGV2ZW50TmFtZSwgb25jZUhhbmRsZXIpO1xuICAgIGhhbmRsZXIoZXZ0KTtcbiAgfTtcbiAgZWUuYmluZChldmVudE5hbWUsIG9uY2VIYW5kbGVyKTtcbn07XG5cbmZ1bmN0aW9uIGNyZWF0ZUV2ZW50KG5hbWUpIHtcbiAgaWYgKHR5cGVvZiB3aW5kb3cuQ3VzdG9tRXZlbnQgPT09ICdmdW5jdGlvbicpIHtcbiAgICByZXR1cm4gbmV3IEN1c3RvbUV2ZW50KG5hbWUpO1xuICB9IGVsc2Uge1xuICAgIHZhciBldnQgPSBkb2N1bWVudC5jcmVhdGVFdmVudCgnQ3VzdG9tRXZlbnQnKTtcbiAgICBldnQuaW5pdEN1c3RvbUV2ZW50KG5hbWUsIGZhbHNlLCBmYWxzZSwgdW5kZWZpbmVkKTtcbiAgICByZXR1cm4gZXZ0O1xuICB9XG59XG5cbmZ1bmN0aW9uIHByb2Nlc3NTY3JvbGxEaWZmKFxuICBpLFxuICBheGlzLFxuICBkaWZmLFxuICB1c2VTY3JvbGxpbmdDbGFzcyxcbiAgZm9yY2VGaXJlUmVhY2hFdmVudFxuKSB7XG4gIGlmICggdXNlU2Nyb2xsaW5nQ2xhc3MgPT09IHZvaWQgMCApIHVzZVNjcm9sbGluZ0NsYXNzID0gdHJ1ZTtcbiAgaWYgKCBmb3JjZUZpcmVSZWFjaEV2ZW50ID09PSB2b2lkIDAgKSBmb3JjZUZpcmVSZWFjaEV2ZW50ID0gZmFsc2U7XG5cbiAgdmFyIGZpZWxkcztcbiAgaWYgKGF4aXMgPT09ICd0b3AnKSB7XG4gICAgZmllbGRzID0gW1xuICAgICAgJ2NvbnRlbnRIZWlnaHQnLFxuICAgICAgJ2NvbnRhaW5lckhlaWdodCcsXG4gICAgICAnc2Nyb2xsVG9wJyxcbiAgICAgICd5JyxcbiAgICAgICd1cCcsXG4gICAgICAnZG93bicgXTtcbiAgfSBlbHNlIGlmIChheGlzID09PSAnbGVmdCcpIHtcbiAgICBmaWVsZHMgPSBbXG4gICAgICAnY29udGVudFdpZHRoJyxcbiAgICAgICdjb250YWluZXJXaWR0aCcsXG4gICAgICAnc2Nyb2xsTGVmdCcsXG4gICAgICAneCcsXG4gICAgICAnbGVmdCcsXG4gICAgICAncmlnaHQnIF07XG4gIH0gZWxzZSB7XG4gICAgdGhyb3cgbmV3IEVycm9yKCdBIHByb3BlciBheGlzIHNob3VsZCBiZSBwcm92aWRlZCcpO1xuICB9XG5cbiAgcHJvY2Vzc1Njcm9sbERpZmYkMShpLCBkaWZmLCBmaWVsZHMsIHVzZVNjcm9sbGluZ0NsYXNzLCBmb3JjZUZpcmVSZWFjaEV2ZW50KTtcbn1cblxuZnVuY3Rpb24gcHJvY2Vzc1Njcm9sbERpZmYkMShcbiAgaSxcbiAgZGlmZixcbiAgcmVmLFxuICB1c2VTY3JvbGxpbmdDbGFzcyxcbiAgZm9yY2VGaXJlUmVhY2hFdmVudFxuKSB7XG4gIHZhciBjb250ZW50SGVpZ2h0ID0gcmVmWzBdO1xuICB2YXIgY29udGFpbmVySGVpZ2h0ID0gcmVmWzFdO1xuICB2YXIgc2Nyb2xsVG9wID0gcmVmWzJdO1xuICB2YXIgeSA9IHJlZlszXTtcbiAgdmFyIHVwID0gcmVmWzRdO1xuICB2YXIgZG93biA9IHJlZls1XTtcbiAgaWYgKCB1c2VTY3JvbGxpbmdDbGFzcyA9PT0gdm9pZCAwICkgdXNlU2Nyb2xsaW5nQ2xhc3MgPSB0cnVlO1xuICBpZiAoIGZvcmNlRmlyZVJlYWNoRXZlbnQgPT09IHZvaWQgMCApIGZvcmNlRmlyZVJlYWNoRXZlbnQgPSBmYWxzZTtcblxuICB2YXIgZWxlbWVudCA9IGkuZWxlbWVudDtcblxuICAvLyByZXNldCByZWFjaFxuICBpLnJlYWNoW3ldID0gbnVsbDtcblxuICAvLyAxIGZvciBzdWJwaXhlbCByb3VuZGluZ1xuICBpZiAoZWxlbWVudFtzY3JvbGxUb3BdIDwgMSkge1xuICAgIGkucmVhY2hbeV0gPSAnc3RhcnQnO1xuICB9XG5cbiAgLy8gMSBmb3Igc3VicGl4ZWwgcm91bmRpbmdcbiAgaWYgKGVsZW1lbnRbc2Nyb2xsVG9wXSA+IGlbY29udGVudEhlaWdodF0gLSBpW2NvbnRhaW5lckhlaWdodF0gLSAxKSB7XG4gICAgaS5yZWFjaFt5XSA9ICdlbmQnO1xuICB9XG5cbiAgaWYgKGRpZmYpIHtcbiAgICBlbGVtZW50LmRpc3BhdGNoRXZlbnQoY3JlYXRlRXZlbnQoKFwicHMtc2Nyb2xsLVwiICsgeSkpKTtcblxuICAgIGlmIChkaWZmIDwgMCkge1xuICAgICAgZWxlbWVudC5kaXNwYXRjaEV2ZW50KGNyZWF0ZUV2ZW50KChcInBzLXNjcm9sbC1cIiArIHVwKSkpO1xuICAgIH0gZWxzZSBpZiAoZGlmZiA+IDApIHtcbiAgICAgIGVsZW1lbnQuZGlzcGF0Y2hFdmVudChjcmVhdGVFdmVudCgoXCJwcy1zY3JvbGwtXCIgKyBkb3duKSkpO1xuICAgIH1cblxuICAgIGlmICh1c2VTY3JvbGxpbmdDbGFzcykge1xuICAgICAgc2V0U2Nyb2xsaW5nQ2xhc3NJbnN0YW50bHkoaSwgeSk7XG4gICAgfVxuICB9XG5cbiAgaWYgKGkucmVhY2hbeV0gJiYgKGRpZmYgfHwgZm9yY2VGaXJlUmVhY2hFdmVudCkpIHtcbiAgICBlbGVtZW50LmRpc3BhdGNoRXZlbnQoY3JlYXRlRXZlbnQoKFwicHMtXCIgKyB5ICsgXCItcmVhY2gtXCIgKyAoaS5yZWFjaFt5XSkpKSk7XG4gIH1cbn1cblxuZnVuY3Rpb24gdG9JbnQoeCkge1xuICByZXR1cm4gcGFyc2VJbnQoeCwgMTApIHx8IDA7XG59XG5cbmZ1bmN0aW9uIGlzRWRpdGFibGUoZWwpIHtcbiAgcmV0dXJuIChcbiAgICBtYXRjaGVzKGVsLCAnaW5wdXQsW2NvbnRlbnRlZGl0YWJsZV0nKSB8fFxuICAgIG1hdGNoZXMoZWwsICdzZWxlY3QsW2NvbnRlbnRlZGl0YWJsZV0nKSB8fFxuICAgIG1hdGNoZXMoZWwsICd0ZXh0YXJlYSxbY29udGVudGVkaXRhYmxlXScpIHx8XG4gICAgbWF0Y2hlcyhlbCwgJ2J1dHRvbixbY29udGVudGVkaXRhYmxlXScpXG4gICk7XG59XG5cbmZ1bmN0aW9uIG91dGVyV2lkdGgoZWxlbWVudCkge1xuICB2YXIgc3R5bGVzID0gZ2V0KGVsZW1lbnQpO1xuICByZXR1cm4gKFxuICAgIHRvSW50KHN0eWxlcy53aWR0aCkgK1xuICAgIHRvSW50KHN0eWxlcy5wYWRkaW5nTGVmdCkgK1xuICAgIHRvSW50KHN0eWxlcy5wYWRkaW5nUmlnaHQpICtcbiAgICB0b0ludChzdHlsZXMuYm9yZGVyTGVmdFdpZHRoKSArXG4gICAgdG9JbnQoc3R5bGVzLmJvcmRlclJpZ2h0V2lkdGgpXG4gICk7XG59XG5cbnZhciBlbnYgPSB7XG4gIGlzV2ViS2l0OlxuICAgIHR5cGVvZiBkb2N1bWVudCAhPT0gJ3VuZGVmaW5lZCcgJiZcbiAgICAnV2Via2l0QXBwZWFyYW5jZScgaW4gZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LnN0eWxlLFxuICBzdXBwb3J0c1RvdWNoOlxuICAgIHR5cGVvZiB3aW5kb3cgIT09ICd1bmRlZmluZWQnICYmXG4gICAgKCdvbnRvdWNoc3RhcnQnIGluIHdpbmRvdyB8fFxuICAgICAgKCdtYXhUb3VjaFBvaW50cycgaW4gd2luZG93Lm5hdmlnYXRvciAmJlxuICAgICAgICB3aW5kb3cubmF2aWdhdG9yLm1heFRvdWNoUG9pbnRzID4gMCkgfHxcbiAgICAgICh3aW5kb3cuRG9jdW1lbnRUb3VjaCAmJiBkb2N1bWVudCBpbnN0YW5jZW9mIHdpbmRvdy5Eb2N1bWVudFRvdWNoKSksXG4gIHN1cHBvcnRzSWVQb2ludGVyOlxuICAgIHR5cGVvZiBuYXZpZ2F0b3IgIT09ICd1bmRlZmluZWQnICYmIG5hdmlnYXRvci5tc01heFRvdWNoUG9pbnRzLFxuICBpc0Nocm9tZTpcbiAgICB0eXBlb2YgbmF2aWdhdG9yICE9PSAndW5kZWZpbmVkJyAmJlxuICAgIC9DaHJvbWUvaS50ZXN0KG5hdmlnYXRvciAmJiBuYXZpZ2F0b3IudXNlckFnZW50KSxcbn07XG5cbmZ1bmN0aW9uIHVwZGF0ZUdlb21ldHJ5KGkpIHtcbiAgdmFyIGVsZW1lbnQgPSBpLmVsZW1lbnQ7XG4gIHZhciByb3VuZGVkU2Nyb2xsVG9wID0gTWF0aC5mbG9vcihlbGVtZW50LnNjcm9sbFRvcCk7XG4gIHZhciByZWN0ID0gZWxlbWVudC5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKTtcblxuICBpLmNvbnRhaW5lcldpZHRoID0gTWF0aC5jZWlsKHJlY3Qud2lkdGgpO1xuICBpLmNvbnRhaW5lckhlaWdodCA9IE1hdGguY2VpbChyZWN0LmhlaWdodCk7XG4gIGkuY29udGVudFdpZHRoID0gZWxlbWVudC5zY3JvbGxXaWR0aDtcbiAgaS5jb250ZW50SGVpZ2h0ID0gZWxlbWVudC5zY3JvbGxIZWlnaHQ7XG5cbiAgaWYgKCFlbGVtZW50LmNvbnRhaW5zKGkuc2Nyb2xsYmFyWFJhaWwpKSB7XG4gICAgLy8gY2xlYW4gdXAgYW5kIGFwcGVuZFxuICAgIHF1ZXJ5Q2hpbGRyZW4oZWxlbWVudCwgY2xzLmVsZW1lbnQucmFpbCgneCcpKS5mb3JFYWNoKGZ1bmN0aW9uIChlbCkgeyByZXR1cm4gcmVtb3ZlKGVsKTsgfVxuICAgICk7XG4gICAgZWxlbWVudC5hcHBlbmRDaGlsZChpLnNjcm9sbGJhclhSYWlsKTtcbiAgfVxuICBpZiAoIWVsZW1lbnQuY29udGFpbnMoaS5zY3JvbGxiYXJZUmFpbCkpIHtcbiAgICAvLyBjbGVhbiB1cCBhbmQgYXBwZW5kXG4gICAgcXVlcnlDaGlsZHJlbihlbGVtZW50LCBjbHMuZWxlbWVudC5yYWlsKCd5JykpLmZvckVhY2goZnVuY3Rpb24gKGVsKSB7IHJldHVybiByZW1vdmUoZWwpOyB9XG4gICAgKTtcbiAgICBlbGVtZW50LmFwcGVuZENoaWxkKGkuc2Nyb2xsYmFyWVJhaWwpO1xuICB9XG5cbiAgaWYgKFxuICAgICFpLnNldHRpbmdzLnN1cHByZXNzU2Nyb2xsWCAmJlxuICAgIGkuY29udGFpbmVyV2lkdGggKyBpLnNldHRpbmdzLnNjcm9sbFhNYXJnaW5PZmZzZXQgPCBpLmNvbnRlbnRXaWR0aFxuICApIHtcbiAgICBpLnNjcm9sbGJhclhBY3RpdmUgPSB0cnVlO1xuICAgIGkucmFpbFhXaWR0aCA9IGkuY29udGFpbmVyV2lkdGggLSBpLnJhaWxYTWFyZ2luV2lkdGg7XG4gICAgaS5yYWlsWFJhdGlvID0gaS5jb250YWluZXJXaWR0aCAvIGkucmFpbFhXaWR0aDtcbiAgICBpLnNjcm9sbGJhclhXaWR0aCA9IGdldFRodW1iU2l6ZShcbiAgICAgIGksXG4gICAgICB0b0ludCgoaS5yYWlsWFdpZHRoICogaS5jb250YWluZXJXaWR0aCkgLyBpLmNvbnRlbnRXaWR0aClcbiAgICApO1xuICAgIGkuc2Nyb2xsYmFyWExlZnQgPSB0b0ludChcbiAgICAgICgoaS5uZWdhdGl2ZVNjcm9sbEFkanVzdG1lbnQgKyBlbGVtZW50LnNjcm9sbExlZnQpICpcbiAgICAgICAgKGkucmFpbFhXaWR0aCAtIGkuc2Nyb2xsYmFyWFdpZHRoKSkgL1xuICAgICAgICAoaS5jb250ZW50V2lkdGggLSBpLmNvbnRhaW5lcldpZHRoKVxuICAgICk7XG4gIH0gZWxzZSB7XG4gICAgaS5zY3JvbGxiYXJYQWN0aXZlID0gZmFsc2U7XG4gIH1cblxuICBpZiAoXG4gICAgIWkuc2V0dGluZ3Muc3VwcHJlc3NTY3JvbGxZICYmXG4gICAgaS5jb250YWluZXJIZWlnaHQgKyBpLnNldHRpbmdzLnNjcm9sbFlNYXJnaW5PZmZzZXQgPCBpLmNvbnRlbnRIZWlnaHRcbiAgKSB7XG4gICAgaS5zY3JvbGxiYXJZQWN0aXZlID0gdHJ1ZTtcbiAgICBpLnJhaWxZSGVpZ2h0ID0gaS5jb250YWluZXJIZWlnaHQgLSBpLnJhaWxZTWFyZ2luSGVpZ2h0O1xuICAgIGkucmFpbFlSYXRpbyA9IGkuY29udGFpbmVySGVpZ2h0IC8gaS5yYWlsWUhlaWdodDtcbiAgICBpLnNjcm9sbGJhcllIZWlnaHQgPSBnZXRUaHVtYlNpemUoXG4gICAgICBpLFxuICAgICAgdG9JbnQoKGkucmFpbFlIZWlnaHQgKiBpLmNvbnRhaW5lckhlaWdodCkgLyBpLmNvbnRlbnRIZWlnaHQpXG4gICAgKTtcbiAgICBpLnNjcm9sbGJhcllUb3AgPSB0b0ludChcbiAgICAgIChyb3VuZGVkU2Nyb2xsVG9wICogKGkucmFpbFlIZWlnaHQgLSBpLnNjcm9sbGJhcllIZWlnaHQpKSAvXG4gICAgICAgIChpLmNvbnRlbnRIZWlnaHQgLSBpLmNvbnRhaW5lckhlaWdodClcbiAgICApO1xuICB9IGVsc2Uge1xuICAgIGkuc2Nyb2xsYmFyWUFjdGl2ZSA9IGZhbHNlO1xuICB9XG5cbiAgaWYgKGkuc2Nyb2xsYmFyWExlZnQgPj0gaS5yYWlsWFdpZHRoIC0gaS5zY3JvbGxiYXJYV2lkdGgpIHtcbiAgICBpLnNjcm9sbGJhclhMZWZ0ID0gaS5yYWlsWFdpZHRoIC0gaS5zY3JvbGxiYXJYV2lkdGg7XG4gIH1cbiAgaWYgKGkuc2Nyb2xsYmFyWVRvcCA+PSBpLnJhaWxZSGVpZ2h0IC0gaS5zY3JvbGxiYXJZSGVpZ2h0KSB7XG4gICAgaS5zY3JvbGxiYXJZVG9wID0gaS5yYWlsWUhlaWdodCAtIGkuc2Nyb2xsYmFyWUhlaWdodDtcbiAgfVxuXG4gIHVwZGF0ZUNzcyhlbGVtZW50LCBpKTtcblxuICBpZiAoaS5zY3JvbGxiYXJYQWN0aXZlKSB7XG4gICAgZWxlbWVudC5jbGFzc0xpc3QuYWRkKGNscy5zdGF0ZS5hY3RpdmUoJ3gnKSk7XG4gIH0gZWxzZSB7XG4gICAgZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKGNscy5zdGF0ZS5hY3RpdmUoJ3gnKSk7XG4gICAgaS5zY3JvbGxiYXJYV2lkdGggPSAwO1xuICAgIGkuc2Nyb2xsYmFyWExlZnQgPSAwO1xuICAgIGVsZW1lbnQuc2Nyb2xsTGVmdCA9IGkuaXNSdGwgPT09IHRydWUgPyBpLmNvbnRlbnRXaWR0aCA6IDA7XG4gIH1cbiAgaWYgKGkuc2Nyb2xsYmFyWUFjdGl2ZSkge1xuICAgIGVsZW1lbnQuY2xhc3NMaXN0LmFkZChjbHMuc3RhdGUuYWN0aXZlKCd5JykpO1xuICB9IGVsc2Uge1xuICAgIGVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShjbHMuc3RhdGUuYWN0aXZlKCd5JykpO1xuICAgIGkuc2Nyb2xsYmFyWUhlaWdodCA9IDA7XG4gICAgaS5zY3JvbGxiYXJZVG9wID0gMDtcbiAgICBlbGVtZW50LnNjcm9sbFRvcCA9IDA7XG4gIH1cbn1cblxuZnVuY3Rpb24gZ2V0VGh1bWJTaXplKGksIHRodW1iU2l6ZSkge1xuICBpZiAoaS5zZXR0aW5ncy5taW5TY3JvbGxiYXJMZW5ndGgpIHtcbiAgICB0aHVtYlNpemUgPSBNYXRoLm1heCh0aHVtYlNpemUsIGkuc2V0dGluZ3MubWluU2Nyb2xsYmFyTGVuZ3RoKTtcbiAgfVxuICBpZiAoaS5zZXR0aW5ncy5tYXhTY3JvbGxiYXJMZW5ndGgpIHtcbiAgICB0aHVtYlNpemUgPSBNYXRoLm1pbih0aHVtYlNpemUsIGkuc2V0dGluZ3MubWF4U2Nyb2xsYmFyTGVuZ3RoKTtcbiAgfVxuICByZXR1cm4gdGh1bWJTaXplO1xufVxuXG5mdW5jdGlvbiB1cGRhdGVDc3MoZWxlbWVudCwgaSkge1xuICB2YXIgeFJhaWxPZmZzZXQgPSB7IHdpZHRoOiBpLnJhaWxYV2lkdGggfTtcbiAgdmFyIHJvdW5kZWRTY3JvbGxUb3AgPSBNYXRoLmZsb29yKGVsZW1lbnQuc2Nyb2xsVG9wKTtcblxuICBpZiAoaS5pc1J0bCkge1xuICAgIHhSYWlsT2Zmc2V0LmxlZnQgPVxuICAgICAgaS5uZWdhdGl2ZVNjcm9sbEFkanVzdG1lbnQgK1xuICAgICAgZWxlbWVudC5zY3JvbGxMZWZ0ICtcbiAgICAgIGkuY29udGFpbmVyV2lkdGggLVxuICAgICAgaS5jb250ZW50V2lkdGg7XG4gIH0gZWxzZSB7XG4gICAgeFJhaWxPZmZzZXQubGVmdCA9IGVsZW1lbnQuc2Nyb2xsTGVmdDtcbiAgfVxuICBpZiAoaS5pc1Njcm9sbGJhclhVc2luZ0JvdHRvbSkge1xuICAgIHhSYWlsT2Zmc2V0LmJvdHRvbSA9IGkuc2Nyb2xsYmFyWEJvdHRvbSAtIHJvdW5kZWRTY3JvbGxUb3A7XG4gIH0gZWxzZSB7XG4gICAgeFJhaWxPZmZzZXQudG9wID0gaS5zY3JvbGxiYXJYVG9wICsgcm91bmRlZFNjcm9sbFRvcDtcbiAgfVxuICBzZXQoaS5zY3JvbGxiYXJYUmFpbCwgeFJhaWxPZmZzZXQpO1xuXG4gIHZhciB5UmFpbE9mZnNldCA9IHsgdG9wOiByb3VuZGVkU2Nyb2xsVG9wLCBoZWlnaHQ6IGkucmFpbFlIZWlnaHQgfTtcbiAgaWYgKGkuaXNTY3JvbGxiYXJZVXNpbmdSaWdodCkge1xuICAgIGlmIChpLmlzUnRsKSB7XG4gICAgICB5UmFpbE9mZnNldC5yaWdodCA9XG4gICAgICAgIGkuY29udGVudFdpZHRoIC1cbiAgICAgICAgKGkubmVnYXRpdmVTY3JvbGxBZGp1c3RtZW50ICsgZWxlbWVudC5zY3JvbGxMZWZ0KSAtXG4gICAgICAgIGkuc2Nyb2xsYmFyWVJpZ2h0IC1cbiAgICAgICAgaS5zY3JvbGxiYXJZT3V0ZXJXaWR0aCAtXG4gICAgICAgIDk7XG4gICAgfSBlbHNlIHtcbiAgICAgIHlSYWlsT2Zmc2V0LnJpZ2h0ID0gaS5zY3JvbGxiYXJZUmlnaHQgLSBlbGVtZW50LnNjcm9sbExlZnQ7XG4gICAgfVxuICB9IGVsc2Uge1xuICAgIGlmIChpLmlzUnRsKSB7XG4gICAgICB5UmFpbE9mZnNldC5sZWZ0ID1cbiAgICAgICAgaS5uZWdhdGl2ZVNjcm9sbEFkanVzdG1lbnQgK1xuICAgICAgICBlbGVtZW50LnNjcm9sbExlZnQgK1xuICAgICAgICBpLmNvbnRhaW5lcldpZHRoICogMiAtXG4gICAgICAgIGkuY29udGVudFdpZHRoIC1cbiAgICAgICAgaS5zY3JvbGxiYXJZTGVmdCAtXG4gICAgICAgIGkuc2Nyb2xsYmFyWU91dGVyV2lkdGg7XG4gICAgfSBlbHNlIHtcbiAgICAgIHlSYWlsT2Zmc2V0LmxlZnQgPSBpLnNjcm9sbGJhcllMZWZ0ICsgZWxlbWVudC5zY3JvbGxMZWZ0O1xuICAgIH1cbiAgfVxuICBzZXQoaS5zY3JvbGxiYXJZUmFpbCwgeVJhaWxPZmZzZXQpO1xuXG4gIHNldChpLnNjcm9sbGJhclgsIHtcbiAgICBsZWZ0OiBpLnNjcm9sbGJhclhMZWZ0LFxuICAgIHdpZHRoOiBpLnNjcm9sbGJhclhXaWR0aCAtIGkucmFpbEJvcmRlclhXaWR0aCxcbiAgfSk7XG4gIHNldChpLnNjcm9sbGJhclksIHtcbiAgICB0b3A6IGkuc2Nyb2xsYmFyWVRvcCxcbiAgICBoZWlnaHQ6IGkuc2Nyb2xsYmFyWUhlaWdodCAtIGkucmFpbEJvcmRlcllXaWR0aCxcbiAgfSk7XG59XG5cbmZ1bmN0aW9uIGNsaWNrUmFpbChpKSB7XG4gIHZhciBlbGVtZW50ID0gaS5lbGVtZW50O1xuXG4gIGkuZXZlbnQuYmluZChpLnNjcm9sbGJhclksICdtb3VzZWRvd24nLCBmdW5jdGlvbiAoZSkgeyByZXR1cm4gZS5zdG9wUHJvcGFnYXRpb24oKTsgfSk7XG4gIGkuZXZlbnQuYmluZChpLnNjcm9sbGJhcllSYWlsLCAnbW91c2Vkb3duJywgZnVuY3Rpb24gKGUpIHtcbiAgICB2YXIgcG9zaXRpb25Ub3AgPVxuICAgICAgZS5wYWdlWSAtXG4gICAgICB3aW5kb3cucGFnZVlPZmZzZXQgLVxuICAgICAgaS5zY3JvbGxiYXJZUmFpbC5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKS50b3A7XG4gICAgdmFyIGRpcmVjdGlvbiA9IHBvc2l0aW9uVG9wID4gaS5zY3JvbGxiYXJZVG9wID8gMSA6IC0xO1xuXG4gICAgaS5lbGVtZW50LnNjcm9sbFRvcCArPSBkaXJlY3Rpb24gKiBpLmNvbnRhaW5lckhlaWdodDtcbiAgICB1cGRhdGVHZW9tZXRyeShpKTtcblxuICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG4gIH0pO1xuXG4gIGkuZXZlbnQuYmluZChpLnNjcm9sbGJhclgsICdtb3VzZWRvd24nLCBmdW5jdGlvbiAoZSkgeyByZXR1cm4gZS5zdG9wUHJvcGFnYXRpb24oKTsgfSk7XG4gIGkuZXZlbnQuYmluZChpLnNjcm9sbGJhclhSYWlsLCAnbW91c2Vkb3duJywgZnVuY3Rpb24gKGUpIHtcbiAgICB2YXIgcG9zaXRpb25MZWZ0ID1cbiAgICAgIGUucGFnZVggLVxuICAgICAgd2luZG93LnBhZ2VYT2Zmc2V0IC1cbiAgICAgIGkuc2Nyb2xsYmFyWFJhaWwuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkubGVmdDtcbiAgICB2YXIgZGlyZWN0aW9uID0gcG9zaXRpb25MZWZ0ID4gaS5zY3JvbGxiYXJYTGVmdCA/IDEgOiAtMTtcblxuICAgIGkuZWxlbWVudC5zY3JvbGxMZWZ0ICs9IGRpcmVjdGlvbiAqIGkuY29udGFpbmVyV2lkdGg7XG4gICAgdXBkYXRlR2VvbWV0cnkoaSk7XG5cbiAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuICB9KTtcbn1cblxuZnVuY3Rpb24gZHJhZ1RodW1iKGkpIHtcbiAgYmluZE1vdXNlU2Nyb2xsSGFuZGxlcihpLCBbXG4gICAgJ2NvbnRhaW5lcldpZHRoJyxcbiAgICAnY29udGVudFdpZHRoJyxcbiAgICAncGFnZVgnLFxuICAgICdyYWlsWFdpZHRoJyxcbiAgICAnc2Nyb2xsYmFyWCcsXG4gICAgJ3Njcm9sbGJhclhXaWR0aCcsXG4gICAgJ3Njcm9sbExlZnQnLFxuICAgICd4JyxcbiAgICAnc2Nyb2xsYmFyWFJhaWwnIF0pO1xuICBiaW5kTW91c2VTY3JvbGxIYW5kbGVyKGksIFtcbiAgICAnY29udGFpbmVySGVpZ2h0JyxcbiAgICAnY29udGVudEhlaWdodCcsXG4gICAgJ3BhZ2VZJyxcbiAgICAncmFpbFlIZWlnaHQnLFxuICAgICdzY3JvbGxiYXJZJyxcbiAgICAnc2Nyb2xsYmFyWUhlaWdodCcsXG4gICAgJ3Njcm9sbFRvcCcsXG4gICAgJ3knLFxuICAgICdzY3JvbGxiYXJZUmFpbCcgXSk7XG59XG5cbmZ1bmN0aW9uIGJpbmRNb3VzZVNjcm9sbEhhbmRsZXIoXG4gIGksXG4gIHJlZlxuKSB7XG4gIHZhciBjb250YWluZXJIZWlnaHQgPSByZWZbMF07XG4gIHZhciBjb250ZW50SGVpZ2h0ID0gcmVmWzFdO1xuICB2YXIgcGFnZVkgPSByZWZbMl07XG4gIHZhciByYWlsWUhlaWdodCA9IHJlZlszXTtcbiAgdmFyIHNjcm9sbGJhclkgPSByZWZbNF07XG4gIHZhciBzY3JvbGxiYXJZSGVpZ2h0ID0gcmVmWzVdO1xuICB2YXIgc2Nyb2xsVG9wID0gcmVmWzZdO1xuICB2YXIgeSA9IHJlZls3XTtcbiAgdmFyIHNjcm9sbGJhcllSYWlsID0gcmVmWzhdO1xuXG4gIHZhciBlbGVtZW50ID0gaS5lbGVtZW50O1xuXG4gIHZhciBzdGFydGluZ1Njcm9sbFRvcCA9IG51bGw7XG4gIHZhciBzdGFydGluZ01vdXNlUGFnZVkgPSBudWxsO1xuICB2YXIgc2Nyb2xsQnkgPSBudWxsO1xuXG4gIGZ1bmN0aW9uIG1vdXNlTW92ZUhhbmRsZXIoZSkge1xuICAgIGlmIChlLnRvdWNoZXMgJiYgZS50b3VjaGVzWzBdKSB7XG4gICAgICBlW3BhZ2VZXSA9IGUudG91Y2hlc1swXS5wYWdlWTtcbiAgICB9XG4gICAgZWxlbWVudFtzY3JvbGxUb3BdID1cbiAgICAgIHN0YXJ0aW5nU2Nyb2xsVG9wICsgc2Nyb2xsQnkgKiAoZVtwYWdlWV0gLSBzdGFydGluZ01vdXNlUGFnZVkpO1xuICAgIGFkZFNjcm9sbGluZ0NsYXNzKGksIHkpO1xuICAgIHVwZGF0ZUdlb21ldHJ5KGkpO1xuXG4gICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gIH1cblxuICBmdW5jdGlvbiBtb3VzZVVwSGFuZGxlcigpIHtcbiAgICByZW1vdmVTY3JvbGxpbmdDbGFzcyhpLCB5KTtcbiAgICBpW3Njcm9sbGJhcllSYWlsXS5jbGFzc0xpc3QucmVtb3ZlKGNscy5zdGF0ZS5jbGlja2luZyk7XG4gICAgaS5ldmVudC51bmJpbmQoaS5vd25lckRvY3VtZW50LCAnbW91c2Vtb3ZlJywgbW91c2VNb3ZlSGFuZGxlcik7XG4gIH1cblxuICBmdW5jdGlvbiBiaW5kTW92ZXMoZSwgdG91Y2hNb2RlKSB7XG4gICAgc3RhcnRpbmdTY3JvbGxUb3AgPSBlbGVtZW50W3Njcm9sbFRvcF07XG4gICAgaWYgKHRvdWNoTW9kZSAmJiBlLnRvdWNoZXMpIHtcbiAgICAgIGVbcGFnZVldID0gZS50b3VjaGVzWzBdLnBhZ2VZO1xuICAgIH1cbiAgICBzdGFydGluZ01vdXNlUGFnZVkgPSBlW3BhZ2VZXTtcbiAgICBzY3JvbGxCeSA9XG4gICAgICAoaVtjb250ZW50SGVpZ2h0XSAtIGlbY29udGFpbmVySGVpZ2h0XSkgL1xuICAgICAgKGlbcmFpbFlIZWlnaHRdIC0gaVtzY3JvbGxiYXJZSGVpZ2h0XSk7XG4gICAgaWYgKCF0b3VjaE1vZGUpIHtcbiAgICAgIGkuZXZlbnQuYmluZChpLm93bmVyRG9jdW1lbnQsICdtb3VzZW1vdmUnLCBtb3VzZU1vdmVIYW5kbGVyKTtcbiAgICAgIGkuZXZlbnQub25jZShpLm93bmVyRG9jdW1lbnQsICdtb3VzZXVwJywgbW91c2VVcEhhbmRsZXIpO1xuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIH0gZWxzZSB7XG4gICAgICBpLmV2ZW50LmJpbmQoaS5vd25lckRvY3VtZW50LCAndG91Y2htb3ZlJywgbW91c2VNb3ZlSGFuZGxlcik7XG4gICAgfVxuXG4gICAgaVtzY3JvbGxiYXJZUmFpbF0uY2xhc3NMaXN0LmFkZChjbHMuc3RhdGUuY2xpY2tpbmcpO1xuXG4gICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcbiAgfVxuXG4gIGkuZXZlbnQuYmluZChpW3Njcm9sbGJhclldLCAnbW91c2Vkb3duJywgZnVuY3Rpb24gKGUpIHtcbiAgICBiaW5kTW92ZXMoZSk7XG4gIH0pO1xuICBpLmV2ZW50LmJpbmQoaVtzY3JvbGxiYXJZXSwgJ3RvdWNoc3RhcnQnLCBmdW5jdGlvbiAoZSkge1xuICAgIGJpbmRNb3ZlcyhlLCB0cnVlKTtcbiAgfSk7XG59XG5cbmZ1bmN0aW9uIGtleWJvYXJkKGkpIHtcbiAgdmFyIGVsZW1lbnQgPSBpLmVsZW1lbnQ7XG5cbiAgdmFyIGVsZW1lbnRIb3ZlcmVkID0gZnVuY3Rpb24gKCkgeyByZXR1cm4gbWF0Y2hlcyhlbGVtZW50LCAnOmhvdmVyJyk7IH07XG4gIHZhciBzY3JvbGxiYXJGb2N1c2VkID0gZnVuY3Rpb24gKCkgeyByZXR1cm4gbWF0Y2hlcyhpLnNjcm9sbGJhclgsICc6Zm9jdXMnKSB8fCBtYXRjaGVzKGkuc2Nyb2xsYmFyWSwgJzpmb2N1cycpOyB9O1xuXG4gIGZ1bmN0aW9uIHNob3VsZFByZXZlbnREZWZhdWx0KGRlbHRhWCwgZGVsdGFZKSB7XG4gICAgdmFyIHNjcm9sbFRvcCA9IE1hdGguZmxvb3IoZWxlbWVudC5zY3JvbGxUb3ApO1xuICAgIGlmIChkZWx0YVggPT09IDApIHtcbiAgICAgIGlmICghaS5zY3JvbGxiYXJZQWN0aXZlKSB7XG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgIH1cbiAgICAgIGlmIChcbiAgICAgICAgKHNjcm9sbFRvcCA9PT0gMCAmJiBkZWx0YVkgPiAwKSB8fFxuICAgICAgICAoc2Nyb2xsVG9wID49IGkuY29udGVudEhlaWdodCAtIGkuY29udGFpbmVySGVpZ2h0ICYmIGRlbHRhWSA8IDApXG4gICAgICApIHtcbiAgICAgICAgcmV0dXJuICFpLnNldHRpbmdzLndoZWVsUHJvcGFnYXRpb247XG4gICAgICB9XG4gICAgfVxuXG4gICAgdmFyIHNjcm9sbExlZnQgPSBlbGVtZW50LnNjcm9sbExlZnQ7XG4gICAgaWYgKGRlbHRhWSA9PT0gMCkge1xuICAgICAgaWYgKCFpLnNjcm9sbGJhclhBY3RpdmUpIHtcbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgfVxuICAgICAgaWYgKFxuICAgICAgICAoc2Nyb2xsTGVmdCA9PT0gMCAmJiBkZWx0YVggPCAwKSB8fFxuICAgICAgICAoc2Nyb2xsTGVmdCA+PSBpLmNvbnRlbnRXaWR0aCAtIGkuY29udGFpbmVyV2lkdGggJiYgZGVsdGFYID4gMClcbiAgICAgICkge1xuICAgICAgICByZXR1cm4gIWkuc2V0dGluZ3Mud2hlZWxQcm9wYWdhdGlvbjtcbiAgICAgIH1cbiAgICB9XG4gICAgcmV0dXJuIHRydWU7XG4gIH1cblxuICBpLmV2ZW50LmJpbmQoaS5vd25lckRvY3VtZW50LCAna2V5ZG93bicsIGZ1bmN0aW9uIChlKSB7XG4gICAgaWYgKFxuICAgICAgKGUuaXNEZWZhdWx0UHJldmVudGVkICYmIGUuaXNEZWZhdWx0UHJldmVudGVkKCkpIHx8XG4gICAgICBlLmRlZmF1bHRQcmV2ZW50ZWRcbiAgICApIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAoIWVsZW1lbnRIb3ZlcmVkKCkgJiYgIXNjcm9sbGJhckZvY3VzZWQoKSkge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIHZhciBhY3RpdmVFbGVtZW50ID0gZG9jdW1lbnQuYWN0aXZlRWxlbWVudFxuICAgICAgPyBkb2N1bWVudC5hY3RpdmVFbGVtZW50XG4gICAgICA6IGkub3duZXJEb2N1bWVudC5hY3RpdmVFbGVtZW50O1xuICAgIGlmIChhY3RpdmVFbGVtZW50KSB7XG4gICAgICBpZiAoYWN0aXZlRWxlbWVudC50YWdOYW1lID09PSAnSUZSQU1FJykge1xuICAgICAgICBhY3RpdmVFbGVtZW50ID0gYWN0aXZlRWxlbWVudC5jb250ZW50RG9jdW1lbnQuYWN0aXZlRWxlbWVudDtcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIC8vIGdvIGRlZXBlciBpZiBlbGVtZW50IGlzIGEgd2ViY29tcG9uZW50XG4gICAgICAgIHdoaWxlIChhY3RpdmVFbGVtZW50LnNoYWRvd1Jvb3QpIHtcbiAgICAgICAgICBhY3RpdmVFbGVtZW50ID0gYWN0aXZlRWxlbWVudC5zaGFkb3dSb290LmFjdGl2ZUVsZW1lbnQ7XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICAgIGlmIChpc0VkaXRhYmxlKGFjdGl2ZUVsZW1lbnQpKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cbiAgICB9XG5cbiAgICB2YXIgZGVsdGFYID0gMDtcbiAgICB2YXIgZGVsdGFZID0gMDtcblxuICAgIHN3aXRjaCAoZS53aGljaCkge1xuICAgICAgY2FzZSAzNzogLy8gbGVmdFxuICAgICAgICBpZiAoZS5tZXRhS2V5KSB7XG4gICAgICAgICAgZGVsdGFYID0gLWkuY29udGVudFdpZHRoO1xuICAgICAgICB9IGVsc2UgaWYgKGUuYWx0S2V5KSB7XG4gICAgICAgICAgZGVsdGFYID0gLWkuY29udGFpbmVyV2lkdGg7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgZGVsdGFYID0gLTMwO1xuICAgICAgICB9XG4gICAgICAgIGJyZWFrO1xuICAgICAgY2FzZSAzODogLy8gdXBcbiAgICAgICAgaWYgKGUubWV0YUtleSkge1xuICAgICAgICAgIGRlbHRhWSA9IGkuY29udGVudEhlaWdodDtcbiAgICAgICAgfSBlbHNlIGlmIChlLmFsdEtleSkge1xuICAgICAgICAgIGRlbHRhWSA9IGkuY29udGFpbmVySGVpZ2h0O1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIGRlbHRhWSA9IDMwO1xuICAgICAgICB9XG4gICAgICAgIGJyZWFrO1xuICAgICAgY2FzZSAzOTogLy8gcmlnaHRcbiAgICAgICAgaWYgKGUubWV0YUtleSkge1xuICAgICAgICAgIGRlbHRhWCA9IGkuY29udGVudFdpZHRoO1xuICAgICAgICB9IGVsc2UgaWYgKGUuYWx0S2V5KSB7XG4gICAgICAgICAgZGVsdGFYID0gaS5jb250YWluZXJXaWR0aDtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICBkZWx0YVggPSAzMDtcbiAgICAgICAgfVxuICAgICAgICBicmVhaztcbiAgICAgIGNhc2UgNDA6IC8vIGRvd25cbiAgICAgICAgaWYgKGUubWV0YUtleSkge1xuICAgICAgICAgIGRlbHRhWSA9IC1pLmNvbnRlbnRIZWlnaHQ7XG4gICAgICAgIH0gZWxzZSBpZiAoZS5hbHRLZXkpIHtcbiAgICAgICAgICBkZWx0YVkgPSAtaS5jb250YWluZXJIZWlnaHQ7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgZGVsdGFZID0gLTMwO1xuICAgICAgICB9XG4gICAgICAgIGJyZWFrO1xuICAgICAgY2FzZSAzMjogLy8gc3BhY2UgYmFyXG4gICAgICAgIGlmIChlLnNoaWZ0S2V5KSB7XG4gICAgICAgICAgZGVsdGFZID0gaS5jb250YWluZXJIZWlnaHQ7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgZGVsdGFZID0gLWkuY29udGFpbmVySGVpZ2h0O1xuICAgICAgICB9XG4gICAgICAgIGJyZWFrO1xuICAgICAgY2FzZSAzMzogLy8gcGFnZSB1cFxuICAgICAgICBkZWx0YVkgPSBpLmNvbnRhaW5lckhlaWdodDtcbiAgICAgICAgYnJlYWs7XG4gICAgICBjYXNlIDM0OiAvLyBwYWdlIGRvd25cbiAgICAgICAgZGVsdGFZID0gLWkuY29udGFpbmVySGVpZ2h0O1xuICAgICAgICBicmVhaztcbiAgICAgIGNhc2UgMzY6IC8vIGhvbWVcbiAgICAgICAgZGVsdGFZID0gaS5jb250ZW50SGVpZ2h0O1xuICAgICAgICBicmVhaztcbiAgICAgIGNhc2UgMzU6IC8vIGVuZFxuICAgICAgICBkZWx0YVkgPSAtaS5jb250ZW50SGVpZ2h0O1xuICAgICAgICBicmVhaztcbiAgICAgIGRlZmF1bHQ6XG4gICAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBpZiAoaS5zZXR0aW5ncy5zdXBwcmVzc1Njcm9sbFggJiYgZGVsdGFYICE9PSAwKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuICAgIGlmIChpLnNldHRpbmdzLnN1cHByZXNzU2Nyb2xsWSAmJiBkZWx0YVkgIT09IDApIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICBlbGVtZW50LnNjcm9sbFRvcCAtPSBkZWx0YVk7XG4gICAgZWxlbWVudC5zY3JvbGxMZWZ0ICs9IGRlbHRhWDtcbiAgICB1cGRhdGVHZW9tZXRyeShpKTtcblxuICAgIGlmIChzaG91bGRQcmV2ZW50RGVmYXVsdChkZWx0YVgsIGRlbHRhWSkpIHtcbiAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB9XG4gIH0pO1xufVxuXG5mdW5jdGlvbiB3aGVlbChpKSB7XG4gIHZhciBlbGVtZW50ID0gaS5lbGVtZW50O1xuXG4gIGZ1bmN0aW9uIHNob3VsZFByZXZlbnREZWZhdWx0KGRlbHRhWCwgZGVsdGFZKSB7XG4gICAgdmFyIHJvdW5kZWRTY3JvbGxUb3AgPSBNYXRoLmZsb29yKGVsZW1lbnQuc2Nyb2xsVG9wKTtcbiAgICB2YXIgaXNUb3AgPSBlbGVtZW50LnNjcm9sbFRvcCA9PT0gMDtcbiAgICB2YXIgaXNCb3R0b20gPVxuICAgICAgcm91bmRlZFNjcm9sbFRvcCArIGVsZW1lbnQub2Zmc2V0SGVpZ2h0ID09PSBlbGVtZW50LnNjcm9sbEhlaWdodDtcbiAgICB2YXIgaXNMZWZ0ID0gZWxlbWVudC5zY3JvbGxMZWZ0ID09PSAwO1xuICAgIHZhciBpc1JpZ2h0ID1cbiAgICAgIGVsZW1lbnQuc2Nyb2xsTGVmdCArIGVsZW1lbnQub2Zmc2V0V2lkdGggPT09IGVsZW1lbnQuc2Nyb2xsV2lkdGg7XG5cbiAgICB2YXIgaGl0c0JvdW5kO1xuXG4gICAgLy8gcGljayBheGlzIHdpdGggcHJpbWFyeSBkaXJlY3Rpb25cbiAgICBpZiAoTWF0aC5hYnMoZGVsdGFZKSA+IE1hdGguYWJzKGRlbHRhWCkpIHtcbiAgICAgIGhpdHNCb3VuZCA9IGlzVG9wIHx8IGlzQm90dG9tO1xuICAgIH0gZWxzZSB7XG4gICAgICBoaXRzQm91bmQgPSBpc0xlZnQgfHwgaXNSaWdodDtcbiAgICB9XG5cbiAgICByZXR1cm4gaGl0c0JvdW5kID8gIWkuc2V0dGluZ3Mud2hlZWxQcm9wYWdhdGlvbiA6IHRydWU7XG4gIH1cblxuICBmdW5jdGlvbiBnZXREZWx0YUZyb21FdmVudChlKSB7XG4gICAgdmFyIGRlbHRhWCA9IGUuZGVsdGFYO1xuICAgIHZhciBkZWx0YVkgPSAtMSAqIGUuZGVsdGFZO1xuXG4gICAgaWYgKHR5cGVvZiBkZWx0YVggPT09ICd1bmRlZmluZWQnIHx8IHR5cGVvZiBkZWx0YVkgPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAvLyBPUyBYIFNhZmFyaVxuICAgICAgZGVsdGFYID0gKC0xICogZS53aGVlbERlbHRhWCkgLyA2O1xuICAgICAgZGVsdGFZID0gZS53aGVlbERlbHRhWSAvIDY7XG4gICAgfVxuXG4gICAgaWYgKGUuZGVsdGFNb2RlICYmIGUuZGVsdGFNb2RlID09PSAxKSB7XG4gICAgICAvLyBGaXJlZm94IGluIGRlbHRhTW9kZSAxOiBMaW5lIHNjcm9sbGluZ1xuICAgICAgZGVsdGFYICo9IDEwO1xuICAgICAgZGVsdGFZICo9IDEwO1xuICAgIH1cblxuICAgIGlmIChkZWx0YVggIT09IGRlbHRhWCAmJiBkZWx0YVkgIT09IGRlbHRhWSAvKiBOYU4gY2hlY2tzICovKSB7XG4gICAgICAvLyBJRSBpbiBzb21lIG1vdXNlIGRyaXZlcnNcbiAgICAgIGRlbHRhWCA9IDA7XG4gICAgICBkZWx0YVkgPSBlLndoZWVsRGVsdGE7XG4gICAgfVxuXG4gICAgaWYgKGUuc2hpZnRLZXkpIHtcbiAgICAgIC8vIHJldmVyc2UgYXhpcyB3aXRoIHNoaWZ0IGtleVxuICAgICAgcmV0dXJuIFstZGVsdGFZLCAtZGVsdGFYXTtcbiAgICB9XG4gICAgcmV0dXJuIFtkZWx0YVgsIGRlbHRhWV07XG4gIH1cblxuICBmdW5jdGlvbiBzaG91bGRCZUNvbnN1bWVkQnlDaGlsZCh0YXJnZXQsIGRlbHRhWCwgZGVsdGFZKSB7XG4gICAgLy8gRklYTUU6IHRoaXMgaXMgYSB3b3JrYXJvdW5kIGZvciA8c2VsZWN0PiBpc3N1ZSBpbiBGRiBhbmQgSUUgIzU3MVxuICAgIGlmICghZW52LmlzV2ViS2l0ICYmIGVsZW1lbnQucXVlcnlTZWxlY3Rvcignc2VsZWN0OmZvY3VzJykpIHtcbiAgICAgIHJldHVybiB0cnVlO1xuICAgIH1cblxuICAgIGlmICghZWxlbWVudC5jb250YWlucyh0YXJnZXQpKSB7XG4gICAgICByZXR1cm4gZmFsc2U7XG4gICAgfVxuXG4gICAgdmFyIGN1cnNvciA9IHRhcmdldDtcblxuICAgIHdoaWxlIChjdXJzb3IgJiYgY3Vyc29yICE9PSBlbGVtZW50KSB7XG4gICAgICBpZiAoY3Vyc29yLmNsYXNzTGlzdC5jb250YWlucyhjbHMuZWxlbWVudC5jb25zdW1pbmcpKSB7XG4gICAgICAgIHJldHVybiB0cnVlO1xuICAgICAgfVxuXG4gICAgICB2YXIgc3R5bGUgPSBnZXQoY3Vyc29yKTtcblxuICAgICAgLy8gaWYgZGVsdGFZICYmIHZlcnRpY2FsIHNjcm9sbGFibGVcbiAgICAgIGlmIChkZWx0YVkgJiYgc3R5bGUub3ZlcmZsb3dZLm1hdGNoKC8oc2Nyb2xsfGF1dG8pLykpIHtcbiAgICAgICAgdmFyIG1heFNjcm9sbFRvcCA9IGN1cnNvci5zY3JvbGxIZWlnaHQgLSBjdXJzb3IuY2xpZW50SGVpZ2h0O1xuICAgICAgICBpZiAobWF4U2Nyb2xsVG9wID4gMCkge1xuICAgICAgICAgIGlmIChcbiAgICAgICAgICAgIChjdXJzb3Iuc2Nyb2xsVG9wID4gMCAmJiBkZWx0YVkgPCAwKSB8fFxuICAgICAgICAgICAgKGN1cnNvci5zY3JvbGxUb3AgPCBtYXhTY3JvbGxUb3AgJiYgZGVsdGFZID4gMClcbiAgICAgICAgICApIHtcbiAgICAgICAgICAgIHJldHVybiB0cnVlO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgfVxuICAgICAgLy8gaWYgZGVsdGFYICYmIGhvcml6b250YWwgc2Nyb2xsYWJsZVxuICAgICAgaWYgKGRlbHRhWCAmJiBzdHlsZS5vdmVyZmxvd1gubWF0Y2goLyhzY3JvbGx8YXV0bykvKSkge1xuICAgICAgICB2YXIgbWF4U2Nyb2xsTGVmdCA9IGN1cnNvci5zY3JvbGxXaWR0aCAtIGN1cnNvci5jbGllbnRXaWR0aDtcbiAgICAgICAgaWYgKG1heFNjcm9sbExlZnQgPiAwKSB7XG4gICAgICAgICAgaWYgKFxuICAgICAgICAgICAgKGN1cnNvci5zY3JvbGxMZWZ0ID4gMCAmJiBkZWx0YVggPCAwKSB8fFxuICAgICAgICAgICAgKGN1cnNvci5zY3JvbGxMZWZ0IDwgbWF4U2Nyb2xsTGVmdCAmJiBkZWx0YVggPiAwKVxuICAgICAgICAgICkge1xuICAgICAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIGN1cnNvciA9IGN1cnNvci5wYXJlbnROb2RlO1xuICAgIH1cblxuICAgIHJldHVybiBmYWxzZTtcbiAgfVxuXG4gIGZ1bmN0aW9uIG1vdXNld2hlZWxIYW5kbGVyKGUpIHtcbiAgICB2YXIgcmVmID0gZ2V0RGVsdGFGcm9tRXZlbnQoZSk7XG4gICAgdmFyIGRlbHRhWCA9IHJlZlswXTtcbiAgICB2YXIgZGVsdGFZID0gcmVmWzFdO1xuXG4gICAgaWYgKHNob3VsZEJlQ29uc3VtZWRCeUNoaWxkKGUudGFyZ2V0LCBkZWx0YVgsIGRlbHRhWSkpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG5cbiAgICB2YXIgc2hvdWxkUHJldmVudCA9IGZhbHNlO1xuICAgIGlmICghaS5zZXR0aW5ncy51c2VCb3RoV2hlZWxBeGVzKSB7XG4gICAgICAvLyBkZWx0YVggd2lsbCBvbmx5IGJlIHVzZWQgZm9yIGhvcml6b250YWwgc2Nyb2xsaW5nIGFuZCBkZWx0YVkgd2lsbFxuICAgICAgLy8gb25seSBiZSB1c2VkIGZvciB2ZXJ0aWNhbCBzY3JvbGxpbmcgLSB0aGlzIGlzIHRoZSBkZWZhdWx0XG4gICAgICBlbGVtZW50LnNjcm9sbFRvcCAtPSBkZWx0YVkgKiBpLnNldHRpbmdzLndoZWVsU3BlZWQ7XG4gICAgICBlbGVtZW50LnNjcm9sbExlZnQgKz0gZGVsdGFYICogaS5zZXR0aW5ncy53aGVlbFNwZWVkO1xuICAgIH0gZWxzZSBpZiAoaS5zY3JvbGxiYXJZQWN0aXZlICYmICFpLnNjcm9sbGJhclhBY3RpdmUpIHtcbiAgICAgIC8vIG9ubHkgdmVydGljYWwgc2Nyb2xsYmFyIGlzIGFjdGl2ZSBhbmQgdXNlQm90aFdoZWVsQXhlcyBvcHRpb24gaXNcbiAgICAgIC8vIGFjdGl2ZSwgc28gbGV0J3Mgc2Nyb2xsIHZlcnRpY2FsIGJhciB1c2luZyBib3RoIG1vdXNlIHdoZWVsIGF4ZXNcbiAgICAgIGlmIChkZWx0YVkpIHtcbiAgICAgICAgZWxlbWVudC5zY3JvbGxUb3AgLT0gZGVsdGFZICogaS5zZXR0aW5ncy53aGVlbFNwZWVkO1xuICAgICAgfSBlbHNlIHtcbiAgICAgICAgZWxlbWVudC5zY3JvbGxUb3AgKz0gZGVsdGFYICogaS5zZXR0aW5ncy53aGVlbFNwZWVkO1xuICAgICAgfVxuICAgICAgc2hvdWxkUHJldmVudCA9IHRydWU7XG4gICAgfSBlbHNlIGlmIChpLnNjcm9sbGJhclhBY3RpdmUgJiYgIWkuc2Nyb2xsYmFyWUFjdGl2ZSkge1xuICAgICAgLy8gdXNlQm90aFdoZWVsQXhlcyBhbmQgb25seSBob3Jpem9udGFsIGJhciBpcyBhY3RpdmUsIHNvIHVzZSBib3RoXG4gICAgICAvLyB3aGVlbCBheGVzIGZvciBob3Jpem9udGFsIGJhclxuICAgICAgaWYgKGRlbHRhWCkge1xuICAgICAgICBlbGVtZW50LnNjcm9sbExlZnQgKz0gZGVsdGFYICogaS5zZXR0aW5ncy53aGVlbFNwZWVkO1xuICAgICAgfSBlbHNlIHtcbiAgICAgICAgZWxlbWVudC5zY3JvbGxMZWZ0IC09IGRlbHRhWSAqIGkuc2V0dGluZ3Mud2hlZWxTcGVlZDtcbiAgICAgIH1cbiAgICAgIHNob3VsZFByZXZlbnQgPSB0cnVlO1xuICAgIH1cblxuICAgIHVwZGF0ZUdlb21ldHJ5KGkpO1xuXG4gICAgc2hvdWxkUHJldmVudCA9IHNob3VsZFByZXZlbnQgfHwgc2hvdWxkUHJldmVudERlZmF1bHQoZGVsdGFYLCBkZWx0YVkpO1xuICAgIGlmIChzaG91bGRQcmV2ZW50ICYmICFlLmN0cmxLZXkpIHtcbiAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG4gICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgfVxuICB9XG5cbiAgaWYgKHR5cGVvZiB3aW5kb3cub253aGVlbCAhPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICBpLmV2ZW50LmJpbmQoZWxlbWVudCwgJ3doZWVsJywgbW91c2V3aGVlbEhhbmRsZXIpO1xuICB9IGVsc2UgaWYgKHR5cGVvZiB3aW5kb3cub25tb3VzZXdoZWVsICE9PSAndW5kZWZpbmVkJykge1xuICAgIGkuZXZlbnQuYmluZChlbGVtZW50LCAnbW91c2V3aGVlbCcsIG1vdXNld2hlZWxIYW5kbGVyKTtcbiAgfVxufVxuXG5mdW5jdGlvbiB0b3VjaChpKSB7XG4gIGlmICghZW52LnN1cHBvcnRzVG91Y2ggJiYgIWVudi5zdXBwb3J0c0llUG9pbnRlcikge1xuICAgIHJldHVybjtcbiAgfVxuXG4gIHZhciBlbGVtZW50ID0gaS5lbGVtZW50O1xuXG4gIGZ1bmN0aW9uIHNob3VsZFByZXZlbnQoZGVsdGFYLCBkZWx0YVkpIHtcbiAgICB2YXIgc2Nyb2xsVG9wID0gTWF0aC5mbG9vcihlbGVtZW50LnNjcm9sbFRvcCk7XG4gICAgdmFyIHNjcm9sbExlZnQgPSBlbGVtZW50LnNjcm9sbExlZnQ7XG4gICAgdmFyIG1hZ25pdHVkZVggPSBNYXRoLmFicyhkZWx0YVgpO1xuICAgIHZhciBtYWduaXR1ZGVZID0gTWF0aC5hYnMoZGVsdGFZKTtcblxuICAgIGlmIChtYWduaXR1ZGVZID4gbWFnbml0dWRlWCkge1xuICAgICAgLy8gdXNlciBpcyBwZXJoYXBzIHRyeWluZyB0byBzd2lwZSB1cC9kb3duIHRoZSBwYWdlXG5cbiAgICAgIGlmIChcbiAgICAgICAgKGRlbHRhWSA8IDAgJiYgc2Nyb2xsVG9wID09PSBpLmNvbnRlbnRIZWlnaHQgLSBpLmNvbnRhaW5lckhlaWdodCkgfHxcbiAgICAgICAgKGRlbHRhWSA+IDAgJiYgc2Nyb2xsVG9wID09PSAwKVxuICAgICAgKSB7XG4gICAgICAgIC8vIHNldCBwcmV2ZW50IGZvciBtb2JpbGUgQ2hyb21lIHJlZnJlc2hcbiAgICAgICAgcmV0dXJuIHdpbmRvdy5zY3JvbGxZID09PSAwICYmIGRlbHRhWSA+IDAgJiYgZW52LmlzQ2hyb21lO1xuICAgICAgfVxuICAgIH0gZWxzZSBpZiAobWFnbml0dWRlWCA+IG1hZ25pdHVkZVkpIHtcbiAgICAgIC8vIHVzZXIgaXMgcGVyaGFwcyB0cnlpbmcgdG8gc3dpcGUgbGVmdC9yaWdodCBhY3Jvc3MgdGhlIHBhZ2VcblxuICAgICAgaWYgKFxuICAgICAgICAoZGVsdGFYIDwgMCAmJiBzY3JvbGxMZWZ0ID09PSBpLmNvbnRlbnRXaWR0aCAtIGkuY29udGFpbmVyV2lkdGgpIHx8XG4gICAgICAgIChkZWx0YVggPiAwICYmIHNjcm9sbExlZnQgPT09IDApXG4gICAgICApIHtcbiAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgICB9XG4gICAgfVxuXG4gICAgcmV0dXJuIHRydWU7XG4gIH1cblxuICBmdW5jdGlvbiBhcHBseVRvdWNoTW92ZShkaWZmZXJlbmNlWCwgZGlmZmVyZW5jZVkpIHtcbiAgICBlbGVtZW50LnNjcm9sbFRvcCAtPSBkaWZmZXJlbmNlWTtcbiAgICBlbGVtZW50LnNjcm9sbExlZnQgLT0gZGlmZmVyZW5jZVg7XG5cbiAgICB1cGRhdGVHZW9tZXRyeShpKTtcbiAgfVxuXG4gIHZhciBzdGFydE9mZnNldCA9IHt9O1xuICB2YXIgc3RhcnRUaW1lID0gMDtcbiAgdmFyIHNwZWVkID0ge307XG4gIHZhciBlYXNpbmdMb29wID0gbnVsbDtcblxuICBmdW5jdGlvbiBnZXRUb3VjaChlKSB7XG4gICAgaWYgKGUudGFyZ2V0VG91Y2hlcykge1xuICAgICAgcmV0dXJuIGUudGFyZ2V0VG91Y2hlc1swXTtcbiAgICB9IGVsc2Uge1xuICAgICAgLy8gTWF5YmUgSUUgcG9pbnRlclxuICAgICAgcmV0dXJuIGU7XG4gICAgfVxuICB9XG5cbiAgZnVuY3Rpb24gc2hvdWxkSGFuZGxlKGUpIHtcbiAgICBpZiAoZS5wb2ludGVyVHlwZSAmJiBlLnBvaW50ZXJUeXBlID09PSAncGVuJyAmJiBlLmJ1dHRvbnMgPT09IDApIHtcbiAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9XG4gICAgaWYgKGUudGFyZ2V0VG91Y2hlcyAmJiBlLnRhcmdldFRvdWNoZXMubGVuZ3RoID09PSAxKSB7XG4gICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9XG4gICAgaWYgKFxuICAgICAgZS5wb2ludGVyVHlwZSAmJlxuICAgICAgZS5wb2ludGVyVHlwZSAhPT0gJ21vdXNlJyAmJlxuICAgICAgZS5wb2ludGVyVHlwZSAhPT0gZS5NU1BPSU5URVJfVFlQRV9NT1VTRVxuICAgICkge1xuICAgICAgcmV0dXJuIHRydWU7XG4gICAgfVxuICAgIHJldHVybiBmYWxzZTtcbiAgfVxuXG4gIGZ1bmN0aW9uIHRvdWNoU3RhcnQoZSkge1xuICAgIGlmICghc2hvdWxkSGFuZGxlKGUpKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgdmFyIHRvdWNoID0gZ2V0VG91Y2goZSk7XG5cbiAgICBzdGFydE9mZnNldC5wYWdlWCA9IHRvdWNoLnBhZ2VYO1xuICAgIHN0YXJ0T2Zmc2V0LnBhZ2VZID0gdG91Y2gucGFnZVk7XG5cbiAgICBzdGFydFRpbWUgPSBuZXcgRGF0ZSgpLmdldFRpbWUoKTtcblxuICAgIGlmIChlYXNpbmdMb29wICE9PSBudWxsKSB7XG4gICAgICBjbGVhckludGVydmFsKGVhc2luZ0xvb3ApO1xuICAgIH1cbiAgfVxuXG4gIGZ1bmN0aW9uIHNob3VsZEJlQ29uc3VtZWRCeUNoaWxkKHRhcmdldCwgZGVsdGFYLCBkZWx0YVkpIHtcbiAgICBpZiAoIWVsZW1lbnQuY29udGFpbnModGFyZ2V0KSkge1xuICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH1cblxuICAgIHZhciBjdXJzb3IgPSB0YXJnZXQ7XG5cbiAgICB3aGlsZSAoY3Vyc29yICYmIGN1cnNvciAhPT0gZWxlbWVudCkge1xuICAgICAgaWYgKGN1cnNvci5jbGFzc0xpc3QuY29udGFpbnMoY2xzLmVsZW1lbnQuY29uc3VtaW5nKSkge1xuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICAgIH1cblxuICAgICAgdmFyIHN0eWxlID0gZ2V0KGN1cnNvcik7XG5cbiAgICAgIC8vIGlmIGRlbHRhWSAmJiB2ZXJ0aWNhbCBzY3JvbGxhYmxlXG4gICAgICBpZiAoZGVsdGFZICYmIHN0eWxlLm92ZXJmbG93WS5tYXRjaCgvKHNjcm9sbHxhdXRvKS8pKSB7XG4gICAgICAgIHZhciBtYXhTY3JvbGxUb3AgPSBjdXJzb3Iuc2Nyb2xsSGVpZ2h0IC0gY3Vyc29yLmNsaWVudEhlaWdodDtcbiAgICAgICAgaWYgKG1heFNjcm9sbFRvcCA+IDApIHtcbiAgICAgICAgICBpZiAoXG4gICAgICAgICAgICAoY3Vyc29yLnNjcm9sbFRvcCA+IDAgJiYgZGVsdGFZIDwgMCkgfHxcbiAgICAgICAgICAgIChjdXJzb3Iuc2Nyb2xsVG9wIDwgbWF4U2Nyb2xsVG9wICYmIGRlbHRhWSA+IDApXG4gICAgICAgICAgKSB7XG4gICAgICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICAgIC8vIGlmIGRlbHRhWCAmJiBob3Jpem9udGFsIHNjcm9sbGFibGVcbiAgICAgIGlmIChkZWx0YVggJiYgc3R5bGUub3ZlcmZsb3dYLm1hdGNoKC8oc2Nyb2xsfGF1dG8pLykpIHtcbiAgICAgICAgdmFyIG1heFNjcm9sbExlZnQgPSBjdXJzb3Iuc2Nyb2xsV2lkdGggLSBjdXJzb3IuY2xpZW50V2lkdGg7XG4gICAgICAgIGlmIChtYXhTY3JvbGxMZWZ0ID4gMCkge1xuICAgICAgICAgIGlmIChcbiAgICAgICAgICAgIChjdXJzb3Iuc2Nyb2xsTGVmdCA+IDAgJiYgZGVsdGFYIDwgMCkgfHxcbiAgICAgICAgICAgIChjdXJzb3Iuc2Nyb2xsTGVmdCA8IG1heFNjcm9sbExlZnQgJiYgZGVsdGFYID4gMClcbiAgICAgICAgICApIHtcbiAgICAgICAgICAgIHJldHVybiB0cnVlO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgfVxuXG4gICAgICBjdXJzb3IgPSBjdXJzb3IucGFyZW50Tm9kZTtcbiAgICB9XG5cbiAgICByZXR1cm4gZmFsc2U7XG4gIH1cblxuICBmdW5jdGlvbiB0b3VjaE1vdmUoZSkge1xuICAgIGlmIChzaG91bGRIYW5kbGUoZSkpIHtcbiAgICAgIHZhciB0b3VjaCA9IGdldFRvdWNoKGUpO1xuXG4gICAgICB2YXIgY3VycmVudE9mZnNldCA9IHsgcGFnZVg6IHRvdWNoLnBhZ2VYLCBwYWdlWTogdG91Y2gucGFnZVkgfTtcblxuICAgICAgdmFyIGRpZmZlcmVuY2VYID0gY3VycmVudE9mZnNldC5wYWdlWCAtIHN0YXJ0T2Zmc2V0LnBhZ2VYO1xuICAgICAgdmFyIGRpZmZlcmVuY2VZID0gY3VycmVudE9mZnNldC5wYWdlWSAtIHN0YXJ0T2Zmc2V0LnBhZ2VZO1xuXG4gICAgICBpZiAoc2hvdWxkQmVDb25zdW1lZEJ5Q2hpbGQoZS50YXJnZXQsIGRpZmZlcmVuY2VYLCBkaWZmZXJlbmNlWSkpIHtcbiAgICAgICAgcmV0dXJuO1xuICAgICAgfVxuXG4gICAgICBhcHBseVRvdWNoTW92ZShkaWZmZXJlbmNlWCwgZGlmZmVyZW5jZVkpO1xuICAgICAgc3RhcnRPZmZzZXQgPSBjdXJyZW50T2Zmc2V0O1xuXG4gICAgICB2YXIgY3VycmVudFRpbWUgPSBuZXcgRGF0ZSgpLmdldFRpbWUoKTtcblxuICAgICAgdmFyIHRpbWVHYXAgPSBjdXJyZW50VGltZSAtIHN0YXJ0VGltZTtcbiAgICAgIGlmICh0aW1lR2FwID4gMCkge1xuICAgICAgICBzcGVlZC54ID0gZGlmZmVyZW5jZVggLyB0aW1lR2FwO1xuICAgICAgICBzcGVlZC55ID0gZGlmZmVyZW5jZVkgLyB0aW1lR2FwO1xuICAgICAgICBzdGFydFRpbWUgPSBjdXJyZW50VGltZTtcbiAgICAgIH1cblxuICAgICAgaWYgKHNob3VsZFByZXZlbnQoZGlmZmVyZW5jZVgsIGRpZmZlcmVuY2VZKSkge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICB9XG4gICAgfVxuICB9XG4gIGZ1bmN0aW9uIHRvdWNoRW5kKCkge1xuICAgIGlmIChpLnNldHRpbmdzLnN3aXBlRWFzaW5nKSB7XG4gICAgICBjbGVhckludGVydmFsKGVhc2luZ0xvb3ApO1xuICAgICAgZWFzaW5nTG9vcCA9IHNldEludGVydmFsKGZ1bmN0aW9uKCkge1xuICAgICAgICBpZiAoaS5pc0luaXRpYWxpemVkKSB7XG4gICAgICAgICAgY2xlYXJJbnRlcnZhbChlYXNpbmdMb29wKTtcbiAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICBpZiAoIXNwZWVkLnggJiYgIXNwZWVkLnkpIHtcbiAgICAgICAgICBjbGVhckludGVydmFsKGVhc2luZ0xvb3ApO1xuICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmIChNYXRoLmFicyhzcGVlZC54KSA8IDAuMDEgJiYgTWF0aC5hYnMoc3BlZWQueSkgPCAwLjAxKSB7XG4gICAgICAgICAgY2xlYXJJbnRlcnZhbChlYXNpbmdMb29wKTtcbiAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICBhcHBseVRvdWNoTW92ZShzcGVlZC54ICogMzAsIHNwZWVkLnkgKiAzMCk7XG5cbiAgICAgICAgc3BlZWQueCAqPSAwLjg7XG4gICAgICAgIHNwZWVkLnkgKj0gMC44O1xuICAgICAgfSwgMTApO1xuICAgIH1cbiAgfVxuXG4gIGlmIChlbnYuc3VwcG9ydHNUb3VjaCkge1xuICAgIGkuZXZlbnQuYmluZChlbGVtZW50LCAndG91Y2hzdGFydCcsIHRvdWNoU3RhcnQpO1xuICAgIGkuZXZlbnQuYmluZChlbGVtZW50LCAndG91Y2htb3ZlJywgdG91Y2hNb3ZlKTtcbiAgICBpLmV2ZW50LmJpbmQoZWxlbWVudCwgJ3RvdWNoZW5kJywgdG91Y2hFbmQpO1xuICB9IGVsc2UgaWYgKGVudi5zdXBwb3J0c0llUG9pbnRlcikge1xuICAgIGlmICh3aW5kb3cuUG9pbnRlckV2ZW50KSB7XG4gICAgICBpLmV2ZW50LmJpbmQoZWxlbWVudCwgJ3BvaW50ZXJkb3duJywgdG91Y2hTdGFydCk7XG4gICAgICBpLmV2ZW50LmJpbmQoZWxlbWVudCwgJ3BvaW50ZXJtb3ZlJywgdG91Y2hNb3ZlKTtcbiAgICAgIGkuZXZlbnQuYmluZChlbGVtZW50LCAncG9pbnRlcnVwJywgdG91Y2hFbmQpO1xuICAgIH0gZWxzZSBpZiAod2luZG93Lk1TUG9pbnRlckV2ZW50KSB7XG4gICAgICBpLmV2ZW50LmJpbmQoZWxlbWVudCwgJ01TUG9pbnRlckRvd24nLCB0b3VjaFN0YXJ0KTtcbiAgICAgIGkuZXZlbnQuYmluZChlbGVtZW50LCAnTVNQb2ludGVyTW92ZScsIHRvdWNoTW92ZSk7XG4gICAgICBpLmV2ZW50LmJpbmQoZWxlbWVudCwgJ01TUG9pbnRlclVwJywgdG91Y2hFbmQpO1xuICAgIH1cbiAgfVxufVxuXG52YXIgZGVmYXVsdFNldHRpbmdzID0gZnVuY3Rpb24gKCkgeyByZXR1cm4gKHtcbiAgaGFuZGxlcnM6IFsnY2xpY2stcmFpbCcsICdkcmFnLXRodW1iJywgJ2tleWJvYXJkJywgJ3doZWVsJywgJ3RvdWNoJ10sXG4gIG1heFNjcm9sbGJhckxlbmd0aDogbnVsbCxcbiAgbWluU2Nyb2xsYmFyTGVuZ3RoOiBudWxsLFxuICBzY3JvbGxpbmdUaHJlc2hvbGQ6IDEwMDAsXG4gIHNjcm9sbFhNYXJnaW5PZmZzZXQ6IDAsXG4gIHNjcm9sbFlNYXJnaW5PZmZzZXQ6IDAsXG4gIHN1cHByZXNzU2Nyb2xsWDogZmFsc2UsXG4gIHN1cHByZXNzU2Nyb2xsWTogZmFsc2UsXG4gIHN3aXBlRWFzaW5nOiB0cnVlLFxuICB1c2VCb3RoV2hlZWxBeGVzOiBmYWxzZSxcbiAgd2hlZWxQcm9wYWdhdGlvbjogdHJ1ZSxcbiAgd2hlZWxTcGVlZDogMSxcbn0pOyB9O1xuXG52YXIgaGFuZGxlcnMgPSB7XG4gICdjbGljay1yYWlsJzogY2xpY2tSYWlsLFxuICAnZHJhZy10aHVtYic6IGRyYWdUaHVtYixcbiAga2V5Ym9hcmQ6IGtleWJvYXJkLFxuICB3aGVlbDogd2hlZWwsXG4gIHRvdWNoOiB0b3VjaCxcbn07XG5cbnZhciBQZXJmZWN0U2Nyb2xsYmFyID0gZnVuY3Rpb24gUGVyZmVjdFNjcm9sbGJhcihlbGVtZW50LCB1c2VyU2V0dGluZ3MpIHtcbiAgdmFyIHRoaXMkMSA9IHRoaXM7XG4gIGlmICggdXNlclNldHRpbmdzID09PSB2b2lkIDAgKSB1c2VyU2V0dGluZ3MgPSB7fTtcblxuICBpZiAodHlwZW9mIGVsZW1lbnQgPT09ICdzdHJpbmcnKSB7XG4gICAgZWxlbWVudCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoZWxlbWVudCk7XG4gIH1cblxuICBpZiAoIWVsZW1lbnQgfHwgIWVsZW1lbnQubm9kZU5hbWUpIHtcbiAgICB0aHJvdyBuZXcgRXJyb3IoJ25vIGVsZW1lbnQgaXMgc3BlY2lmaWVkIHRvIGluaXRpYWxpemUgUGVyZmVjdFNjcm9sbGJhcicpO1xuICB9XG5cbiAgdGhpcy5lbGVtZW50ID0gZWxlbWVudDtcblxuICBlbGVtZW50LmNsYXNzTGlzdC5hZGQoY2xzLm1haW4pO1xuXG4gIHRoaXMuc2V0dGluZ3MgPSBkZWZhdWx0U2V0dGluZ3MoKTtcbiAgZm9yICh2YXIga2V5IGluIHVzZXJTZXR0aW5ncykge1xuICAgIHRoaXMuc2V0dGluZ3Nba2V5XSA9IHVzZXJTZXR0aW5nc1trZXldO1xuICB9XG5cbiAgdGhpcy5jb250YWluZXJXaWR0aCA9IG51bGw7XG4gIHRoaXMuY29udGFpbmVySGVpZ2h0ID0gbnVsbDtcbiAgdGhpcy5jb250ZW50V2lkdGggPSBudWxsO1xuICB0aGlzLmNvbnRlbnRIZWlnaHQgPSBudWxsO1xuXG4gIHZhciBmb2N1cyA9IGZ1bmN0aW9uICgpIHsgcmV0dXJuIGVsZW1lbnQuY2xhc3NMaXN0LmFkZChjbHMuc3RhdGUuZm9jdXMpOyB9O1xuICB2YXIgYmx1ciA9IGZ1bmN0aW9uICgpIHsgcmV0dXJuIGVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShjbHMuc3RhdGUuZm9jdXMpOyB9O1xuXG4gIHRoaXMuaXNSdGwgPSBnZXQoZWxlbWVudCkuZGlyZWN0aW9uID09PSAncnRsJztcbiAgaWYgKHRoaXMuaXNSdGwgPT09IHRydWUpIHtcbiAgICBlbGVtZW50LmNsYXNzTGlzdC5hZGQoY2xzLnJ0bCk7XG4gIH1cbiAgdGhpcy5pc05lZ2F0aXZlU2Nyb2xsID0gKGZ1bmN0aW9uICgpIHtcbiAgICB2YXIgb3JpZ2luYWxTY3JvbGxMZWZ0ID0gZWxlbWVudC5zY3JvbGxMZWZ0O1xuICAgIHZhciByZXN1bHQgPSBudWxsO1xuICAgIGVsZW1lbnQuc2Nyb2xsTGVmdCA9IC0xO1xuICAgIHJlc3VsdCA9IGVsZW1lbnQuc2Nyb2xsTGVmdCA8IDA7XG4gICAgZWxlbWVudC5zY3JvbGxMZWZ0ID0gb3JpZ2luYWxTY3JvbGxMZWZ0O1xuICAgIHJldHVybiByZXN1bHQ7XG4gIH0pKCk7XG4gIHRoaXMubmVnYXRpdmVTY3JvbGxBZGp1c3RtZW50ID0gdGhpcy5pc05lZ2F0aXZlU2Nyb2xsXG4gICAgPyBlbGVtZW50LnNjcm9sbFdpZHRoIC0gZWxlbWVudC5jbGllbnRXaWR0aFxuICAgIDogMDtcbiAgdGhpcy5ldmVudCA9IG5ldyBFdmVudE1hbmFnZXIoKTtcbiAgdGhpcy5vd25lckRvY3VtZW50ID0gZWxlbWVudC5vd25lckRvY3VtZW50IHx8IGRvY3VtZW50O1xuXG4gIHRoaXMuc2Nyb2xsYmFyWFJhaWwgPSBkaXYoY2xzLmVsZW1lbnQucmFpbCgneCcpKTtcbiAgZWxlbWVudC5hcHBlbmRDaGlsZCh0aGlzLnNjcm9sbGJhclhSYWlsKTtcbiAgdGhpcy5zY3JvbGxiYXJYID0gZGl2KGNscy5lbGVtZW50LnRodW1iKCd4JykpO1xuICB0aGlzLnNjcm9sbGJhclhSYWlsLmFwcGVuZENoaWxkKHRoaXMuc2Nyb2xsYmFyWCk7XG4gIHRoaXMuc2Nyb2xsYmFyWC5zZXRBdHRyaWJ1dGUoJ3RhYmluZGV4JywgMCk7XG4gIHRoaXMuZXZlbnQuYmluZCh0aGlzLnNjcm9sbGJhclgsICdmb2N1cycsIGZvY3VzKTtcbiAgdGhpcy5ldmVudC5iaW5kKHRoaXMuc2Nyb2xsYmFyWCwgJ2JsdXInLCBibHVyKTtcbiAgdGhpcy5zY3JvbGxiYXJYQWN0aXZlID0gbnVsbDtcbiAgdGhpcy5zY3JvbGxiYXJYV2lkdGggPSBudWxsO1xuICB0aGlzLnNjcm9sbGJhclhMZWZ0ID0gbnVsbDtcbiAgdmFyIHJhaWxYU3R5bGUgPSBnZXQodGhpcy5zY3JvbGxiYXJYUmFpbCk7XG4gIHRoaXMuc2Nyb2xsYmFyWEJvdHRvbSA9IHBhcnNlSW50KHJhaWxYU3R5bGUuYm90dG9tLCAxMCk7XG4gIGlmIChpc05hTih0aGlzLnNjcm9sbGJhclhCb3R0b20pKSB7XG4gICAgdGhpcy5pc1Njcm9sbGJhclhVc2luZ0JvdHRvbSA9IGZhbHNlO1xuICAgIHRoaXMuc2Nyb2xsYmFyWFRvcCA9IHRvSW50KHJhaWxYU3R5bGUudG9wKTtcbiAgfSBlbHNlIHtcbiAgICB0aGlzLmlzU2Nyb2xsYmFyWFVzaW5nQm90dG9tID0gdHJ1ZTtcbiAgfVxuICB0aGlzLnJhaWxCb3JkZXJYV2lkdGggPVxuICAgIHRvSW50KHJhaWxYU3R5bGUuYm9yZGVyTGVmdFdpZHRoKSArIHRvSW50KHJhaWxYU3R5bGUuYm9yZGVyUmlnaHRXaWR0aCk7XG4gIC8vIFNldCByYWlsIHRvIGRpc3BsYXk6YmxvY2sgdG8gY2FsY3VsYXRlIG1hcmdpbnNcbiAgc2V0KHRoaXMuc2Nyb2xsYmFyWFJhaWwsIHsgZGlzcGxheTogJ2Jsb2NrJyB9KTtcbiAgdGhpcy5yYWlsWE1hcmdpbldpZHRoID1cbiAgICB0b0ludChyYWlsWFN0eWxlLm1hcmdpbkxlZnQpICsgdG9JbnQocmFpbFhTdHlsZS5tYXJnaW5SaWdodCk7XG4gIHNldCh0aGlzLnNjcm9sbGJhclhSYWlsLCB7IGRpc3BsYXk6ICcnIH0pO1xuICB0aGlzLnJhaWxYV2lkdGggPSBudWxsO1xuICB0aGlzLnJhaWxYUmF0aW8gPSBudWxsO1xuXG4gIHRoaXMuc2Nyb2xsYmFyWVJhaWwgPSBkaXYoY2xzLmVsZW1lbnQucmFpbCgneScpKTtcbiAgZWxlbWVudC5hcHBlbmRDaGlsZCh0aGlzLnNjcm9sbGJhcllSYWlsKTtcbiAgdGhpcy5zY3JvbGxiYXJZID0gZGl2KGNscy5lbGVtZW50LnRodW1iKCd5JykpO1xuICB0aGlzLnNjcm9sbGJhcllSYWlsLmFwcGVuZENoaWxkKHRoaXMuc2Nyb2xsYmFyWSk7XG4gIHRoaXMuc2Nyb2xsYmFyWS5zZXRBdHRyaWJ1dGUoJ3RhYmluZGV4JywgMCk7XG4gIHRoaXMuZXZlbnQuYmluZCh0aGlzLnNjcm9sbGJhclksICdmb2N1cycsIGZvY3VzKTtcbiAgdGhpcy5ldmVudC5iaW5kKHRoaXMuc2Nyb2xsYmFyWSwgJ2JsdXInLCBibHVyKTtcbiAgdGhpcy5zY3JvbGxiYXJZQWN0aXZlID0gbnVsbDtcbiAgdGhpcy5zY3JvbGxiYXJZSGVpZ2h0ID0gbnVsbDtcbiAgdGhpcy5zY3JvbGxiYXJZVG9wID0gbnVsbDtcbiAgdmFyIHJhaWxZU3R5bGUgPSBnZXQodGhpcy5zY3JvbGxiYXJZUmFpbCk7XG4gIHRoaXMuc2Nyb2xsYmFyWVJpZ2h0ID0gcGFyc2VJbnQocmFpbFlTdHlsZS5yaWdodCwgMTApO1xuICBpZiAoaXNOYU4odGhpcy5zY3JvbGxiYXJZUmlnaHQpKSB7XG4gICAgdGhpcy5pc1Njcm9sbGJhcllVc2luZ1JpZ2h0ID0gZmFsc2U7XG4gICAgdGhpcy5zY3JvbGxiYXJZTGVmdCA9IHRvSW50KHJhaWxZU3R5bGUubGVmdCk7XG4gIH0gZWxzZSB7XG4gICAgdGhpcy5pc1Njcm9sbGJhcllVc2luZ1JpZ2h0ID0gdHJ1ZTtcbiAgfVxuICB0aGlzLnNjcm9sbGJhcllPdXRlcldpZHRoID0gdGhpcy5pc1J0bCA/IG91dGVyV2lkdGgodGhpcy5zY3JvbGxiYXJZKSA6IG51bGw7XG4gIHRoaXMucmFpbEJvcmRlcllXaWR0aCA9XG4gICAgdG9JbnQocmFpbFlTdHlsZS5ib3JkZXJUb3BXaWR0aCkgKyB0b0ludChyYWlsWVN0eWxlLmJvcmRlckJvdHRvbVdpZHRoKTtcbiAgc2V0KHRoaXMuc2Nyb2xsYmFyWVJhaWwsIHsgZGlzcGxheTogJ2Jsb2NrJyB9KTtcbiAgdGhpcy5yYWlsWU1hcmdpbkhlaWdodCA9XG4gICAgdG9JbnQocmFpbFlTdHlsZS5tYXJnaW5Ub3ApICsgdG9JbnQocmFpbFlTdHlsZS5tYXJnaW5Cb3R0b20pO1xuICBzZXQodGhpcy5zY3JvbGxiYXJZUmFpbCwgeyBkaXNwbGF5OiAnJyB9KTtcbiAgdGhpcy5yYWlsWUhlaWdodCA9IG51bGw7XG4gIHRoaXMucmFpbFlSYXRpbyA9IG51bGw7XG5cbiAgdGhpcy5yZWFjaCA9IHtcbiAgICB4OlxuICAgICAgZWxlbWVudC5zY3JvbGxMZWZ0IDw9IDBcbiAgICAgICAgPyAnc3RhcnQnXG4gICAgICAgIDogZWxlbWVudC5zY3JvbGxMZWZ0ID49IHRoaXMuY29udGVudFdpZHRoIC0gdGhpcy5jb250YWluZXJXaWR0aFxuICAgICAgICA/ICdlbmQnXG4gICAgICAgIDogbnVsbCxcbiAgICB5OlxuICAgICAgZWxlbWVudC5zY3JvbGxUb3AgPD0gMFxuICAgICAgICA/ICdzdGFydCdcbiAgICAgICAgOiBlbGVtZW50LnNjcm9sbFRvcCA+PSB0aGlzLmNvbnRlbnRIZWlnaHQgLSB0aGlzLmNvbnRhaW5lckhlaWdodFxuICAgICAgICA/ICdlbmQnXG4gICAgICAgIDogbnVsbCxcbiAgfTtcblxuICB0aGlzLmlzQWxpdmUgPSB0cnVlO1xuXG4gIHRoaXMuc2V0dGluZ3MuaGFuZGxlcnMuZm9yRWFjaChmdW5jdGlvbiAoaGFuZGxlck5hbWUpIHsgcmV0dXJuIGhhbmRsZXJzW2hhbmRsZXJOYW1lXSh0aGlzJDEpOyB9KTtcblxuICB0aGlzLmxhc3RTY3JvbGxUb3AgPSBNYXRoLmZsb29yKGVsZW1lbnQuc2Nyb2xsVG9wKTsgLy8gZm9yIG9uU2Nyb2xsIG9ubHlcbiAgdGhpcy5sYXN0U2Nyb2xsTGVmdCA9IGVsZW1lbnQuc2Nyb2xsTGVmdDsgLy8gZm9yIG9uU2Nyb2xsIG9ubHlcbiAgdGhpcy5ldmVudC5iaW5kKHRoaXMuZWxlbWVudCwgJ3Njcm9sbCcsIGZ1bmN0aW9uIChlKSB7IHJldHVybiB0aGlzJDEub25TY3JvbGwoZSk7IH0pO1xuICB1cGRhdGVHZW9tZXRyeSh0aGlzKTtcbn07XG5cblBlcmZlY3RTY3JvbGxiYXIucHJvdG90eXBlLnVwZGF0ZSA9IGZ1bmN0aW9uIHVwZGF0ZSAoKSB7XG4gIGlmICghdGhpcy5pc0FsaXZlKSB7XG4gICAgcmV0dXJuO1xuICB9XG5cbiAgLy8gUmVjYWxjdWF0ZSBuZWdhdGl2ZSBzY3JvbGxMZWZ0IGFkanVzdG1lbnRcbiAgdGhpcy5uZWdhdGl2ZVNjcm9sbEFkanVzdG1lbnQgPSB0aGlzLmlzTmVnYXRpdmVTY3JvbGxcbiAgICA/IHRoaXMuZWxlbWVudC5zY3JvbGxXaWR0aCAtIHRoaXMuZWxlbWVudC5jbGllbnRXaWR0aFxuICAgIDogMDtcblxuICAvLyBSZWNhbGN1bGF0ZSByYWlsIG1hcmdpbnNcbiAgc2V0KHRoaXMuc2Nyb2xsYmFyWFJhaWwsIHsgZGlzcGxheTogJ2Jsb2NrJyB9KTtcbiAgc2V0KHRoaXMuc2Nyb2xsYmFyWVJhaWwsIHsgZGlzcGxheTogJ2Jsb2NrJyB9KTtcbiAgdGhpcy5yYWlsWE1hcmdpbldpZHRoID1cbiAgICB0b0ludChnZXQodGhpcy5zY3JvbGxiYXJYUmFpbCkubWFyZ2luTGVmdCkgK1xuICAgIHRvSW50KGdldCh0aGlzLnNjcm9sbGJhclhSYWlsKS5tYXJnaW5SaWdodCk7XG4gIHRoaXMucmFpbFlNYXJnaW5IZWlnaHQgPVxuICAgIHRvSW50KGdldCh0aGlzLnNjcm9sbGJhcllSYWlsKS5tYXJnaW5Ub3ApICtcbiAgICB0b0ludChnZXQodGhpcy5zY3JvbGxiYXJZUmFpbCkubWFyZ2luQm90dG9tKTtcblxuICAvLyBIaWRlIHNjcm9sbGJhcnMgbm90IHRvIGFmZmVjdCBzY3JvbGxXaWR0aCBhbmQgc2Nyb2xsSGVpZ2h0XG4gIHNldCh0aGlzLnNjcm9sbGJhclhSYWlsLCB7IGRpc3BsYXk6ICdub25lJyB9KTtcbiAgc2V0KHRoaXMuc2Nyb2xsYmFyWVJhaWwsIHsgZGlzcGxheTogJ25vbmUnIH0pO1xuXG4gIHVwZGF0ZUdlb21ldHJ5KHRoaXMpO1xuXG4gIHByb2Nlc3NTY3JvbGxEaWZmKHRoaXMsICd0b3AnLCAwLCBmYWxzZSwgdHJ1ZSk7XG4gIHByb2Nlc3NTY3JvbGxEaWZmKHRoaXMsICdsZWZ0JywgMCwgZmFsc2UsIHRydWUpO1xuXG4gIHNldCh0aGlzLnNjcm9sbGJhclhSYWlsLCB7IGRpc3BsYXk6ICcnIH0pO1xuICBzZXQodGhpcy5zY3JvbGxiYXJZUmFpbCwgeyBkaXNwbGF5OiAnJyB9KTtcbn07XG5cblBlcmZlY3RTY3JvbGxiYXIucHJvdG90eXBlLm9uU2Nyb2xsID0gZnVuY3Rpb24gb25TY3JvbGwgKGUpIHtcbiAgaWYgKCF0aGlzLmlzQWxpdmUpIHtcbiAgICByZXR1cm47XG4gIH1cblxuICB1cGRhdGVHZW9tZXRyeSh0aGlzKTtcbiAgcHJvY2Vzc1Njcm9sbERpZmYodGhpcywgJ3RvcCcsIHRoaXMuZWxlbWVudC5zY3JvbGxUb3AgLSB0aGlzLmxhc3RTY3JvbGxUb3ApO1xuICBwcm9jZXNzU2Nyb2xsRGlmZihcbiAgICB0aGlzLFxuICAgICdsZWZ0JyxcbiAgICB0aGlzLmVsZW1lbnQuc2Nyb2xsTGVmdCAtIHRoaXMubGFzdFNjcm9sbExlZnRcbiAgKTtcblxuICB0aGlzLmxhc3RTY3JvbGxUb3AgPSBNYXRoLmZsb29yKHRoaXMuZWxlbWVudC5zY3JvbGxUb3ApO1xuICB0aGlzLmxhc3RTY3JvbGxMZWZ0ID0gdGhpcy5lbGVtZW50LnNjcm9sbExlZnQ7XG59O1xuXG5QZXJmZWN0U2Nyb2xsYmFyLnByb3RvdHlwZS5kZXN0cm95ID0gZnVuY3Rpb24gZGVzdHJveSAoKSB7XG4gIGlmICghdGhpcy5pc0FsaXZlKSB7XG4gICAgcmV0dXJuO1xuICB9XG5cbiAgdGhpcy5ldmVudC51bmJpbmRBbGwoKTtcbiAgcmVtb3ZlKHRoaXMuc2Nyb2xsYmFyWCk7XG4gIHJlbW92ZSh0aGlzLnNjcm9sbGJhclkpO1xuICByZW1vdmUodGhpcy5zY3JvbGxiYXJYUmFpbCk7XG4gIHJlbW92ZSh0aGlzLnNjcm9sbGJhcllSYWlsKTtcbiAgdGhpcy5yZW1vdmVQc0NsYXNzZXMoKTtcblxuICAvLyB1bnNldCBlbGVtZW50c1xuICB0aGlzLmVsZW1lbnQgPSBudWxsO1xuICB0aGlzLnNjcm9sbGJhclggPSBudWxsO1xuICB0aGlzLnNjcm9sbGJhclkgPSBudWxsO1xuICB0aGlzLnNjcm9sbGJhclhSYWlsID0gbnVsbDtcbiAgdGhpcy5zY3JvbGxiYXJZUmFpbCA9IG51bGw7XG5cbiAgdGhpcy5pc0FsaXZlID0gZmFsc2U7XG59O1xuXG5QZXJmZWN0U2Nyb2xsYmFyLnByb3RvdHlwZS5yZW1vdmVQc0NsYXNzZXMgPSBmdW5jdGlvbiByZW1vdmVQc0NsYXNzZXMgKCkge1xuICB0aGlzLmVsZW1lbnQuY2xhc3NOYW1lID0gdGhpcy5lbGVtZW50LmNsYXNzTmFtZVxuICAgIC5zcGxpdCgnICcpXG4gICAgLmZpbHRlcihmdW5jdGlvbiAobmFtZSkgeyByZXR1cm4gIW5hbWUubWF0Y2goL15wcyhbLV9dLit8KSQvKTsgfSlcbiAgICAuam9pbignICcpO1xufTtcblxuZXhwb3J0IGRlZmF1bHQgUGVyZmVjdFNjcm9sbGJhcjtcbi8vIyBzb3VyY2VNYXBwaW5nVVJMPXBlcmZlY3Qtc2Nyb2xsYmFyLmVzbS5qcy5tYXBcbiIsIndpbmRvdy4kID0gd2luZG93LmpRdWVyeSA9IHJlcXVpcmUoJ2pxdWVyeScpO1xud2luZG93LlN3YWwgPSByZXF1aXJlKCdzd2VldGFsZXJ0MicpO1xuXG4vLyBDb3JlVUlcbnJlcXVpcmUoJ0Bjb3JldWkvY29yZXVpJyk7XG5cbi8vIEJvaWxlcnBsYXRlXG5yZXF1aXJlKCcuLi9wbHVnaW5zJyk7XG4iLCIvKipcbiAqIFBsYWNlIGFueSBqUXVlcnkvaGVscGVyIHBsdWdpbnMgaW4gaGVyZS5cbiAqL1xuJChmdW5jdGlvbiAoKSB7XG5cbiAgICAvKipcbiAgICAgKiBEaXNhYmxlIHN1Ym1pdCBpbnB1dHMgaW4gdGhlIGdpdmVuIGZvcm1cbiAgICAgKlxuICAgICAqIEBwYXJhbSBmb3JtXG4gICAgICovXG4gICAgZnVuY3Rpb24gZGlzYWJsZVN1Ym1pdEJ1dHRvbnMoZm9ybSkge1xuICAgICAgICBmb3JtLmZpbmQoJ2lucHV0W3R5cGU9XCJzdWJtaXRcIl0nKS5hdHRyKCdkaXNhYmxlZCcsIHRydWUpO1xuICAgICAgICBmb3JtLmZpbmQoJ2J1dHRvblt0eXBlPVwic3VibWl0XCJdJykuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBFbmFibGUgdGhlIHN1Ym1pdCBpbnB1dHMgaW4gYSBnaXZlbiBmb3JtXG4gICAgICpcbiAgICAgKiBAcGFyYW0gZm9ybVxuICAgICAqL1xuICAgIGZ1bmN0aW9uIGVuYWJsZVN1Ym1pdEJ1dHRvbnMoZm9ybSkge1xuICAgICAgICBmb3JtLmZpbmQoJ2lucHV0W3R5cGU9XCJzdWJtaXRcIl0nKS5yZW1vdmVBdHRyKCdkaXNhYmxlZCcpO1xuICAgICAgICBmb3JtLmZpbmQoJ2J1dHRvblt0eXBlPVwic3VibWl0XCJdJykucmVtb3ZlQXR0cignZGlzYWJsZWQnKTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBEaXNhYmxlIGFsbCBzdWJtaXQgYnV0dG9ucyBvbmNlIGNsaWNrZWRcbiAgICAgKi9cbiAgICAkKCdmb3JtJykuc3VibWl0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgZGlzYWJsZVN1Ym1pdEJ1dHRvbnMoJCh0aGlzKSk7XG4gICAgICAgIHJldHVybiB0cnVlO1xuICAgIH0pO1xuXG4gICAgLyoqXG4gICAgICogQWRkIGEgY29uZmlybWF0aW9uIHRvIGEgZGVsZXRlIGJ1dHRvbi9mb3JtXG4gICAgICovXG4gICAgJCgnYm9keScpLm9uKCdzdWJtaXQnLCAnZm9ybVtuYW1lPWRlbGV0ZS1pdGVtXScsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICB0aXRsZTogJ0FyZSB5b3Ugc3VyZSB5b3Ugd2FudCB0byBkZWxldGUgdGhpcyBpdGVtPycsXG4gICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6ICdDb25maXJtIERlbGV0ZScsXG4gICAgICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiAnQ2FuY2VsJyxcbiAgICAgICAgICAgIGljb246ICd3YXJuaW5nJ1xuICAgICAgICB9KS50aGVuKChyZXN1bHQpID0+IHtcbiAgICAgICAgICAgIGlmIChyZXN1bHQudmFsdWUpIHtcbiAgICAgICAgICAgICAgICB0aGlzLnN1Ym1pdCgpXG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIGVuYWJsZVN1Ym1pdEJ1dHRvbnMoJCh0aGlzKSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgIH0pLm9uKCdjbGljaycsICdhW25hbWU9Y29uZmlybS1pdGVtXScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIC8qKlxuICAgICAgICAgKiBBZGQgYW4gJ2FyZSB5b3Ugc3VyZScgcG9wLXVwIHRvIGFueSBidXR0b24vbGlua1xuICAgICAgICAgKi9cbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICB0aXRsZTogJ0FyZSB5b3Ugc3VyZSB5b3Ugd2FudCB0byBkbyB0aGlzPycsXG4gICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6ICdDb250aW51ZScsXG4gICAgICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiAnQ2FuY2VsJyxcbiAgICAgICAgICAgIGljb246ICdpbmZvJyxcbiAgICAgICAgfSkudGhlbigocmVzdWx0KSA9PiB7XG4gICAgICAgICAgICByZXN1bHQudmFsdWUgJiYgd2luZG93LmxvY2F0aW9uLmFzc2lnbigkKHRoaXMpLmF0dHIoJ2hyZWYnKSk7XG4gICAgICAgIH0pO1xuICAgIH0pO1xuXG4gICAgLy8gUmVtZW1iZXIgdGFiIG9uIHBhZ2UgbG9hZFxuICAgICQoJ2FbZGF0YS10b2dnbGU9XCJ0YWJcIl0sIGFbZGF0YS10b2dnbGU9XCJwaWxsXCJdJykub24oJ3Nob3duLmJzLnRhYicsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIHZhciBoYXNoID0gJChlLnRhcmdldCkuYXR0cignaHJlZicpO1xuICAgICAgICBpZiAoaGlzdG9yeS5wdXNoU3RhdGUpIHtcbiAgICAgICAgICAgIGhpc3RvcnkucHVzaFN0YXRlKG51bGwsIG51bGwsIGhhc2gpO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgbG9jYXRpb24uaGFzaCA9IGhhc2g7XG4gICAgICAgIH1cbiAgICB9KTtcblxuICAgIHZhciBoYXNoID0gd2luZG93LmxvY2F0aW9uLmhhc2g7XG4gICAgaWYgKGhhc2gpIHtcbiAgICAgICAgJCgnLm5hdi1saW5rW2hyZWY9XCInICsgaGFzaCArICdcIl0nKS50YWIoJ3Nob3cnKTtcbiAgICB9XG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=