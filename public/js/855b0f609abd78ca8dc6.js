(self.webpackChunkBlynkWebDashboard=self.webpackChunkBlynkWebDashboard||[]).push([[4162],{2262:(n,t,e)=>{"use strict";e.d(t,{lX:()=>O,q_:()=>L,ob:()=>p,PP:()=>C,Ep:()=>v,Hp:()=>g});var o=e(2122);function i(n){return"/"===n.charAt(0)}function r(n,t){for(var e=t,o=e+1,i=n.length;o<i;e+=1,o+=1)n[e]=n[o];n.pop()}const a=function(n){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",e=n&&n.split("/")||[],o=t&&t.split("/")||[],a=n&&i(n),c=t&&i(t),u=a||c;if(n&&i(n)?o=e:e.length&&(o.pop(),o=o.concat(e)),!o.length)return"/";var f=void 0;if(o.length){var s=o[o.length-1];f="."===s||".."===s||""===s}else f=!1;for(var h=0,l=o.length;l>=0;l--){var d=o[l];"."===d?r(o,l):".."===d?(r(o,l),h++):h&&(r(o,l),h--)}if(!u)for(;h--;h)o.unshift("..");!u||""===o[0]||o[0]&&i(o[0])||o.unshift("");var v=o.join("/");return f&&"/"!==v.substr(-1)&&(v+="/"),v};var c="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(n){return typeof n}:function(n){return n&&"function"==typeof Symbol&&n.constructor===Symbol&&n!==Symbol.prototype?"symbol":typeof n};const u=function n(t,e){if(t===e)return!0;if(null==t||null==e)return!1;if(Array.isArray(t))return Array.isArray(e)&&t.length===e.length&&t.every((function(t,o){return n(t,e[o])}));var o=void 0===t?"undefined":c(t);if(o!==(void 0===e?"undefined":c(e)))return!1;if("object"===o){var i=t.valueOf(),r=e.valueOf();if(i!==t||r!==e)return n(i,r);var a=Object.keys(t),u=Object.keys(e);return a.length===u.length&&a.every((function(o){return n(t[o],e[o])}))}return!1};var f=e(2177);function s(n){return"/"===n.charAt(0)?n:"/"+n}function h(n){return"/"===n.charAt(0)?n.substr(1):n}function l(n,t){return function(n,t){return new RegExp("^"+t+"(\\/|\\?|#|$)","i").test(n)}(n,t)?n.substr(t.length):n}function d(n){return"/"===n.charAt(n.length-1)?n.slice(0,-1):n}function v(n){var t=n.pathname,e=n.search,o=n.hash,i=t||"/";return e&&"?"!==e&&(i+="?"===e.charAt(0)?e:"?"+e),o&&"#"!==o&&(i+="#"===o.charAt(0)?o:"#"+o),i}function p(n,t,e,i){var r;"string"==typeof n?(r=function(n){var t=n||"/",e="",o="",i=t.indexOf("#");-1!==i&&(o=t.substr(i),t=t.substr(0,i));var r=t.indexOf("?");return-1!==r&&(e=t.substr(r),t=t.substr(0,r)),{pathname:t,search:"?"===e?"":e,hash:"#"===o?"":o}}(n)).state=t:(void 0===(r=(0,o.Z)({},n)).pathname&&(r.pathname=""),r.search?"?"!==r.search.charAt(0)&&(r.search="?"+r.search):r.search="",r.hash?"#"!==r.hash.charAt(0)&&(r.hash="#"+r.hash):r.hash="",void 0!==t&&void 0===r.state&&(r.state=t));try{r.pathname=decodeURI(r.pathname)}catch(n){throw n instanceof URIError?new URIError('Pathname "'+r.pathname+'" could not be decoded. This is likely caused by an invalid percent-encoding.'):n}return e&&(r.key=e),i?r.pathname?"/"!==r.pathname.charAt(0)&&(r.pathname=a(r.pathname,i.pathname)):r.pathname=i.pathname:r.pathname||(r.pathname="/"),r}function g(n,t){return n.pathname===t.pathname&&n.search===t.search&&n.hash===t.hash&&n.key===t.key&&u(n.state,t.state)}function w(){var n=null;var t=[];return{setPrompt:function(t){return n=t,function(){n===t&&(n=null)}},confirmTransitionTo:function(t,e,o,i){if(null!=n){var r="function"==typeof n?n(t,e):n;"string"==typeof r?"function"==typeof o?o(r,i):i(!0):i(!1!==r)}else i(!0)},appendListener:function(n){var e=!0;function o(){e&&n.apply(void 0,arguments)}return t.push(o),function(){e=!1,t=t.filter((function(n){return n!==o}))}},notifyListeners:function(){for(var n=arguments.length,e=new Array(n),o=0;o<n;o++)e[o]=arguments[o];t.forEach((function(n){return n.apply(void 0,e)}))}}}var y=!("undefined"==typeof window||!window.document||!window.document.createElement);function m(n,t){t(window.confirm(n))}var b="popstate",P="hashchange";function k(){try{return window.history.state||{}}catch(n){return{}}}function O(n){void 0===n&&(n={}),y||(0,f.Z)(!1);var t,e=window.history,i=(-1===(t=window.navigator.userAgent).indexOf("Android 2.")&&-1===t.indexOf("Android 4.0")||-1===t.indexOf("Mobile Safari")||-1!==t.indexOf("Chrome")||-1!==t.indexOf("Windows Phone"))&&window.history&&"pushState"in window.history,r=!(-1===window.navigator.userAgent.indexOf("Trident")),a=n,c=a.forceRefresh,u=void 0!==c&&c,h=a.getUserConfirmation,g=void 0===h?m:h,O=a.keyLength,x=void 0===O?6:O,A=n.basename?d(s(n.basename)):"";function T(n){var t=n||{},e=t.key,o=t.state,i=window.location,r=i.pathname+i.search+i.hash;return A&&(r=l(r,A)),p(r,o,e)}function E(){return Math.random().toString(36).substr(2,x)}var L=w();function S(n){(0,o.Z)(D,n),D.length=e.length,L.notifyListeners(D.location,D.action)}function C(n){(function(n){void 0===n.state&&navigator.userAgent.indexOf("CriOS")})(n)||H(T(n.state))}function U(){H(T(k()))}var R=!1;function H(n){if(R)R=!1,S();else{L.confirmTransitionTo(n,"POP",g,(function(t){t?S({action:"POP",location:n}):function(n){var t=D.location,e=Z.indexOf(t.key);-1===e&&(e=0);var o=Z.indexOf(n.key);-1===o&&(o=0);var i=e-o;i&&(R=!0,M(i))}(n)}))}}var I=T(k()),Z=[I.key];function B(n){return A+v(n)}function M(n){e.go(n)}var j=0;function F(n){1===(j+=n)&&1===n?(window.addEventListener(b,C),r&&window.addEventListener(P,U)):0===j&&(window.removeEventListener(b,C),r&&window.removeEventListener(P,U))}var W=!1;var D={length:e.length,action:"POP",location:I,createHref:B,push:function(n,t){var o="PUSH",r=p(n,t,E(),D.location);L.confirmTransitionTo(r,o,g,(function(n){if(n){var t=B(r),a=r.key,c=r.state;if(i)if(e.pushState({key:a,state:c},null,t),u)window.location.href=t;else{var f=Z.indexOf(D.location.key),s=Z.slice(0,-1===f?0:f+1);s.push(r.key),Z=s,S({action:o,location:r})}else window.location.href=t}}))},replace:function(n,t){var o="REPLACE",r=p(n,t,E(),D.location);L.confirmTransitionTo(r,o,g,(function(n){if(n){var t=B(r),a=r.key,c=r.state;if(i)if(e.replaceState({key:a,state:c},null,t),u)window.location.replace(t);else{var f=Z.indexOf(D.location.key);-1!==f&&(Z[f]=r.key),S({action:o,location:r})}else window.location.replace(t)}}))},go:M,goBack:function(){M(-1)},goForward:function(){M(1)},block:function(n){void 0===n&&(n=!1);var t=L.setPrompt(n);return W||(F(1),W=!0),function(){return W&&(W=!1,F(-1)),t()}},listen:function(n){var t=L.appendListener(n);return F(1),function(){F(-1),t()}}};return D}var x="hashchange",A={hashbang:{encodePath:function(n){return"!"===n.charAt(0)?n:"!/"+h(n)},decodePath:function(n){return"!"===n.charAt(0)?n.substr(1):n}},noslash:{encodePath:h,decodePath:s},slash:{encodePath:s,decodePath:s}};function T(){var n=window.location.href,t=n.indexOf("#");return-1===t?"":n.substring(t+1)}function E(n){var t=window.location.href.indexOf("#");window.location.replace(window.location.href.slice(0,t>=0?t:0)+"#"+n)}function L(n){void 0===n&&(n={}),y||(0,f.Z)(!1);var t=window.history,e=(window.navigator.userAgent.indexOf("Firefox"),n),i=e.getUserConfirmation,r=void 0===i?m:i,a=e.hashType,c=void 0===a?"slash":a,u=n.basename?d(s(n.basename)):"",h=A[c],b=h.encodePath,P=h.decodePath;function k(){var n=P(T());return u&&(n=l(n,u)),p(n)}var O=w();function L(n){(0,o.Z)(W,n),W.length=t.length,O.notifyListeners(W.location,W.action)}var S=!1,C=null;function U(){var n=T(),t=b(n);if(n!==t)E(t);else{var e=k(),o=W.location;if(!S&&g(o,e))return;if(C===v(e))return;C=null,function(n){if(S)S=!1,L();else{var t="POP";O.confirmTransitionTo(n,t,r,(function(e){e?L({action:t,location:n}):function(n){var t=W.location,e=Z.lastIndexOf(v(t));-1===e&&(e=0);var o=Z.lastIndexOf(v(n));-1===o&&(o=0);var i=e-o;i&&(S=!0,B(i))}(n)}))}}(e)}}var R=T(),H=b(R);R!==H&&E(H);var I=k(),Z=[v(I)];function B(n){t.go(n)}var M=0;function j(n){1===(M+=n)&&1===n?window.addEventListener(x,U):0===M&&window.removeEventListener(x,U)}var F=!1;var W={length:t.length,action:"POP",location:I,createHref:function(n){return"#"+b(u+v(n))},push:function(n,t){var e="PUSH",o=p(n,void 0,void 0,W.location);O.confirmTransitionTo(o,e,r,(function(n){if(n){var t=v(o),i=b(u+t);if(T()!==i){C=t,function(n){window.location.hash=n}(i);var r=Z.lastIndexOf(v(W.location)),a=Z.slice(0,-1===r?0:r+1);a.push(t),Z=a,L({action:e,location:o})}else L()}}))},replace:function(n,t){var e="REPLACE",o=p(n,void 0,void 0,W.location);O.confirmTransitionTo(o,e,r,(function(n){if(n){var t=v(o),i=b(u+t);T()!==i&&(C=t,E(i));var r=Z.indexOf(v(W.location));-1!==r&&(Z[r]=t),L({action:e,location:o})}}))},go:B,goBack:function(){B(-1)},goForward:function(){B(1)},block:function(n){void 0===n&&(n=!1);var t=O.setPrompt(n);return F||(j(1),F=!0),function(){return F&&(F=!1,j(-1)),t()}},listen:function(n){var t=O.appendListener(n);return j(1),function(){j(-1),t()}}};return W}function S(n,t,e){return Math.min(Math.max(n,t),e)}function C(n){void 0===n&&(n={});var t=n,e=t.getUserConfirmation,i=t.initialEntries,r=void 0===i?["/"]:i,a=t.initialIndex,c=void 0===a?0:a,u=t.keyLength,f=void 0===u?6:u,s=w();function h(n){(0,o.Z)(b,n),b.length=b.entries.length,s.notifyListeners(b.location,b.action)}function l(){return Math.random().toString(36).substr(2,f)}var d=S(c,0,r.length-1),g=r.map((function(n){return p(n,void 0,"string"==typeof n?l():n.key||l())})),y=v;function m(n){var t=S(b.index+n,0,b.entries.length-1),o=b.entries[t];s.confirmTransitionTo(o,"POP",e,(function(n){n?h({action:"POP",location:o,index:t}):h()}))}var b={length:g.length,action:"POP",location:g[d],index:d,entries:g,createHref:y,push:function(n,t){var o="PUSH",i=p(n,t,l(),b.location);s.confirmTransitionTo(i,o,e,(function(n){if(n){var t=b.index+1,e=b.entries.slice(0);e.length>t?e.splice(t,e.length-t,i):e.push(i),h({action:o,location:i,index:t,entries:e})}}))},replace:function(n,t){var o="REPLACE",i=p(n,t,l(),b.location);s.confirmTransitionTo(i,o,e,(function(n){n&&(b.entries[b.index]=i,h({action:o,location:i}))}))},go:m,goBack:function(){m(-1)},goForward:function(){m(1)},canGo:function(n){var t=b.index+n;return t>=0&&t<b.entries.length},block:function(n){return void 0===n&&(n=!1),s.setPrompt(n)},listen:function(n){return s.appendListener(n)}};return b}}}]);