!function(e){function t(r){if(n[r])return n[r].exports;var i=n[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,t),i.l=!0,i.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:r})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,n){"use strict";function r(e){var t="";if(t=window.location.origin?window.location.origin:window.location.protocol+"://"+window.location.host,e&&"string"==typeof e)if(0===e.indexOf("/"))t+=e;else try{var n=new URL(e);return n.protocol+"://"+n.host+n.pathname}catch(e){}else{var r=window.location.pathname;r&&r.length>0&&(t+=r)}return t}function i(e){if("function"==typeof performance.getEntriesByType){var t=performance.getEntriesByType("paint").filter(function(t){return t.name===e})[0];return t?t.startTime:0}return 0}function o(){var e=navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./);if(!e)return!1;var t=parseInt(e[2],10),n=navigator.connection;return t>=55&&!!n&&"cellular"===n.type&&n.downlinkMax<=.115}function a(e){return null==e?void 0:Math.round(1e3*e)/1e3}function c(e,t){for(var n in e){var r=e[n];void 0===t||"number"!=typeof r&&"string"!=typeof r||(t[n]=r)}}var s=this&&this.__assign||function(){return s=Object.assign||function(e){for(var t,n=1,r=arguments.length;n<r;n++){t=arguments[n];for(var i in t)Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i])}return e},s.apply(this,arguments)};t.__esModule=!0;var u=n(1),f=n(2),d=n(3),l=n(4);!function(){function e(){var e=n.timing,t="";try{t="function"==typeof n.getEntriesByType?new URL(n.getEntriesByType("navigation")[0].name).pathname:h?new URL(h).pathname:window.location.pathname}catch(e){}var i={referrer:document.referrer||"",eventType:u.EventType.WebVitalsV2,lcp:{value:-1,path:void 0},cls:{value:-1,path:void 0},fid:{value:-1,path:void 0},si:g?g.si:0,versions:{js:"2021.8.2"},pageloadId:v,location:r(),landingPath:t,startTime:n.timeOrigin||(e?e.navigationStart:0)};return g&&g.version&&(i.versions.fl=g.version),T&&(i.lcp=T.lcp&&void 0!==T.lcp.value?T.lcp:i.lcp,i.fid=T.fid&&void 0!==T.fid.value?T.fid:i.fid,i.cls=T.cls&&void 0!==T.cls.value?T.cls:i.cls),g&&(i.siteToken=g.token),i}function t(e){var t=n.timing,s=n.memory,f=e||r(),d=document.referrer||"",l=m[2]||m[1]||m[0],p={memory:{},timings:{},resources:[],tempResources:[],referrer:k&&S&&l?l.url:d,documentWriteIntervention:!1,errorCount:0,eventType:u.EventType.Load,firstPaint:0,firstContentfulPaint:0,si:g?g.si:0,startTime:n.timeOrigin||(t?t.navigationStart:0),versions:{fl:g?g.version:"",js:"2021.8.2",timings:1},pageloadId:v,location:f};if(void 0==y){if("function"==typeof n.getEntriesByType){var h=n.getEntriesByType("navigation");h&&Array.isArray(h)&&h.length>0&&(p.timingsV2={},p.versions.timings=2,delete p.timings,c(h[0],p.timingsV2))}1===p.versions.timings&&c(t,p.timings),c(s,p.memory)}if(p.documentWriteIntervention=o(),p.firstPaint=i("first-paint"),p.firstContentfulPaint=i("first-contentful-paint"),p.errorCount=window.__cfErrCount||0,g&&(p.siteToken=g.token,S=!0),"function"==typeof n.getEntriesByType){var w=n.getEntriesByType("resource"),T=0,E=0;w.forEach(function(e){var t={n:e.name,s:a(e.startTime),d:a(e.duration),i:e.initiatorType,p:e.nextHopProtocol,rs:a(e.redirectStart),re:a(e.redirectEnd),fs:a(e.fetchStart),ds:a(e.domainLookupStart),de:a(e.domainLookupEnd),cs:a(e.connectStart),ce:a(e.connectEnd),qs:a(e.requestStart),ps:a(e.responseStart),pe:a(e.responseEnd),ws:a(e.workerStart),ss:a(e.secureConnectionStart),ts:e.transferSize,ec:e.encodedBodySize,dc:e.decodedBodySize};p.tempResources&&void 0===p.tempResources[E]&&(p.tempResources[E]=[]);var n=JSON.stringify(t).length;T+n<62e3&&p.tempResources?(T+=n,p.tempResources[E].push(t)):(E++,T=0)})}return JSON.stringify(p).length>=64e3&&(p.resources=[]),void 0!==y&&(delete p.timings,delete p.memory,delete p.errorCount,delete p.documentWriteIntervention),p}var n=window.performance||window.webkitPerformance||window.msPerformance||window.mozPerformance,p=document.currentScript||("function"==typeof document.querySelector?document.querySelector("script[data-cf-beacon]"):void 0),v=l(),m=[],g=window.__cfBeacon?window.__cfBeacon:{};if(!g||"single"!==g.load){var y,h,w=!1,S=!1;document.addEventListener("visibilitychange",function(){k&&0===m.filter(function(e){return e.id===v}).length&&j(),"hidden"===document.visibilityState&&!w&&S&&(w=!0,I(k))});var T={lcp:void 0,cls:void 0,fid:void 0},E=function(e){if(!e||0===e.length)return null;var t=e.reduce(function(e,t){return e&&e.value>t.value?e:t});if(t&&t.sources&&t.sources.length){var n=t.sources.reduce(function(e,t){return e.node&&e.previousRect.width*e.previousRect.height>t.previousRect.width*t.previousRect.height?e:t});if(n)return n}},b=function(e){return e&&0!==e.length?e[e.length-1]:null},R=function(e){if(!e)return"";var t=e.localName;return e.id&&e.id.length>0&&(t+="#"+e.id),e.className&&e.className.length>0&&(t+="."+e.className.split(" ").join(".")),t},L=function(e){var t=window.location.pathname;if("CLS"===e.name){T.cls={value:e.value,path:t};var n=E(e.entries);n&&(T.cls.element=R(n.node),T.cls.currentRect=n.currentRect,T.cls.previousRect=n.previousRect)}else if("FID"===e.name){T.fid={value:e.value,path:t};var n=b(e.entries);n&&(T.fid.element=R(n.target),T.fid.name=n.name)}else if("LCP"===e.name){T.lcp={value:e.value,path:t};var n=b(e.entries);n&&(T.lcp.element=R(n.element),T.lcp.size=n.size,T.lcp.url=n.url)}};if("function"==typeof PerformanceObserver&&(d.getLCP(L,!0),d.getFID(L),PerformanceObserver.supportedEntryTypes&&PerformanceObserver.supportedEntryTypes.includes("layout-shift")&&d.getCLS(L,!0)),p){var _=p.getAttribute("data-cf-beacon");if(_)try{g=s(s({},g),JSON.parse(_))}catch(e){}else{var O=p.getAttribute("src");if(O&&"function"==typeof URLSearchParams){var C=new URLSearchParams(O.replace(/^[^\?]+\??/,"")),P=C.get("token");P&&(g.token=P);var B=C.get("spa");g.spa=null===B||"true"===B}}g&&"multi"!==g.load&&(g.load="single"),window.__cfBeacon=g}var k=g&&(void 0===g.spa||!0===g.spa);if(n&&g&&g.token){var A=g.send&&g.send.to?g.send.to:void 0===g.version?"https://cloudflareinsights.com/cdn-cgi/rum":null,j=function(e){var n=function(e,t){r.resources=e,0!=t&&(r.bypassTiming=!0),g&&(1===g.r&&(r.resources=[]),k&&0===t&&(m.push({id:r.pageloadId,url:r.location}),m.length>3&&m.shift()),f.sendObjectBeacon("",r,function(){},!1,A),void 0!==g.forward&&void 0!==g.forward.url&&f.sendObjectBeacon("",r,function(){},!1,g.forward.url))},r=t(e);if(r&&g){var i=r.tempResources;if(delete r.tempResources,k&&i&&0===i.length&&n([],0),!i)return;i.forEach(function(e,t){n(e,t)})}},I=function(t){var n=e();t||(n.resources=[],delete n.tempResources),g&&f.sendObjectBeacon("",n,function(){},!0,A)},N=function(){S=!0;var e=window.__cfRl&&window.__cfRl.done||window.__cfQR&&window.__cfQR.done;e?e.then(j):j()};"complete"===window.document.readyState?N():window.addEventListener("load",function(){window.setTimeout(N)}),k&&(h=r(),function(e){var t=e.pushState;if(t){var i=function(){v=l(),"function"==typeof n.clearResourceTimings&&n.clearResourceTimings()};e.pushState=function(n,o,a){return y=r(a),0===m.filter(function(e){return e.id===v}).length&&j(r()),i(),t.apply(e,[n,o,a])},window.addEventListener("popstate",function(e){0===m.filter(function(e){return e.id===v}).length&&j(y),y=r(),i()})}}(window.history))}}}()},function(e,t,n){"use strict";t.__esModule=!0;!function(e){e[e.Load=1]="Load",e[e.Additional=2]="Additional",e[e.WebVitalsV2=3]="WebVitalsV2"}(t.EventType||(t.EventType={}))},function(e,t,n){"use strict";function r(e,t,n,r,i){void 0===r&&(r=!1),void 0===i&&(i=null);var o=i||(t.siteToken&&t.versions.fl?"/cdn-cgi/rum?"+e:"/cdn-cgi/beacon/performance?"+e),a=!0;if(navigator&&"string"==typeof navigator.userAgent)try{var c=navigator.userAgent.match(/Chrome\/([0-9]+)/);c&&c[0].toLowerCase().indexOf("chrome")>-1&&parseInt(c[1])<81&&(a=!1)}catch(e){}if(navigator&&"function"==typeof navigator.sendBeacon&&a&&r){t.st=1;var s=JSON.stringify(t),u={type:"application/json"};navigator.sendBeacon(o,new Blob([s],u))}else{t.st=2;var s=JSON.stringify(t),f=new XMLHttpRequest;n&&(f.onreadystatechange=function(){4==this.readyState&&204==this.status&&n()}),f.open("POST",o,!0),f.setRequestHeader("content-type","application/json"),f.send(s)}}t.__esModule=!0,t.sendObjectBeacon=r},function(e,t,n){"use strict";t.__esModule=!0;var r,i,o,a,c=function(e,t){return{name:e,value:void 0===t?-1:t,delta:0,entries:[],id:"v2-".concat(Date.now(),"-").concat(Math.floor(8999999999999*Math.random())+1e12)}},s=function(e,t){try{if(PerformanceObserver.supportedEntryTypes.includes(e)){if("first-input"===e&&!("PerformanceEventTiming"in self))return;var n=new PerformanceObserver(function(e){return e.getEntries().map(t)});return n.observe({type:e,buffered:!0}),n}}catch(e){}},u=function(e,t){var n=function n(r){"pagehide"!==r.type&&"hidden"!==document.visibilityState||(e(r),t&&(removeEventListener("visibilitychange",n,!0),removeEventListener("pagehide",n,!0)))};addEventListener("visibilitychange",n,!0),addEventListener("pagehide",n,!0)},f=function(e){addEventListener("pageshow",function(t){t.persisted&&e(t)},!0)},d=function(e,t,n){var r;return function(i){t.value>=0&&(i||n)&&(t.delta=t.value-(r||0),(t.delta||void 0===r)&&(r=t.value,e(t)))}},l=-1,p=function(){return"hidden"===document.visibilityState?0:1/0},v=function(){u(function(e){var t=e.timeStamp;l=t},!0)},m=function(){return l<0&&(l=p(),v(),f(function(){setTimeout(function(){l=p(),v()},0)})),{get firstHiddenTime(){return l}}},g=function(e,t){var n,r=m(),i=c("FCP"),o=function(e){"first-contentful-paint"===e.name&&(u&&u.disconnect(),e.startTime<r.firstHiddenTime&&(i.value=e.startTime,i.entries.push(e),n(!0)))},a=performance.getEntriesByName&&performance.getEntriesByName("first-contentful-paint")[0],u=a?null:s("paint",o);(a||u)&&(n=d(e,i,t),a&&o(a),f(function(r){i=c("FCP"),n=d(e,i,t),requestAnimationFrame(function(){requestAnimationFrame(function(){i.value=performance.now()-r.timeStamp,n(!0)})})}))},y=!1,h=-1,w=function(e,t){y||(g(function(e){h=e.value}),y=!0);var n,r=function(t){h>-1&&e(t)},i=c("CLS",0),o=0,a=[],l=function(e){if(!e.hadRecentInput){var t=a[0],r=a[a.length-1];o&&e.startTime-r.startTime<1e3&&e.startTime-t.startTime<5e3?(o+=e.value,a.push(e)):(o=e.value,a=[e]),o>i.value&&(i.value=o,i.entries=a,n())}},p=s("layout-shift",l);p&&(n=d(r,i,t),u(function(){p.takeRecords().map(l),n(!0)}),f(function(){o=0,h=-1,i=c("CLS",0),n=d(r,i,t)}))},S={passive:!0,capture:!0},T=new Date,E=function(e,t){r||(r=t,i=e,o=new Date,L(removeEventListener),b())},b=function(){if(i>=0&&i<o-T){var e={entryType:"first-input",name:r.type,target:r.target,cancelable:r.cancelable,startTime:r.timeStamp,processingStart:r.timeStamp+i};a.forEach(function(t){t(e)}),a=[]}},R=function(e){if(e.cancelable){var t=(e.timeStamp>1e12?new Date:performance.now())-e.timeStamp;"pointerdown"==e.type?function(e,t){var n=function(){E(e,t),i()},r=function(){i()},i=function(){removeEventListener("pointerup",n,S),removeEventListener("pointercancel",r,S)};addEventListener("pointerup",n,S),addEventListener("pointercancel",r,S)}(t,e):E(t,e)}},L=function(e){["mousedown","keydown","touchstart","pointerdown"].forEach(function(t){return e(t,R,S)})},_=function(e,t){var n,o=m(),l=c("FID"),p=function(e){e.startTime<o.firstHiddenTime&&(l.value=e.processingStart-e.startTime,l.entries.push(e),n(!0))},v=s("first-input",p);n=d(e,l,t),v&&u(function(){v.takeRecords().map(p),v.disconnect()},!0),v&&f(function(){var o;l=c("FID"),n=d(e,l,t),a=[],i=-1,r=null,L(addEventListener),o=p,a.push(o),b()})},O=new Set,C=function(e,t){var n,r=m(),i=c("LCP"),o=function(e){var t=e.startTime;t<r.firstHiddenTime&&(i.value=t,i.entries.push(e)),n()},a=s("largest-contentful-paint",o);if(a){n=d(e,i,t);var l=function(){O.has(i.id)||(a.takeRecords().map(o),a.disconnect(),O.add(i.id),n(!0))};["keydown","click"].forEach(function(e){addEventListener(e,l,{once:!0,capture:!0})}),u(l,!0),f(function(r){i=c("LCP"),n=d(e,i,t),requestAnimationFrame(function(){requestAnimationFrame(function(){i.value=performance.now()-r.timeStamp,O.add(i.id),n(!0)})})})}},P=function(e){var t,n=c("TTFB");t=function(){try{var t=performance.getEntriesByType("navigation")[0]||function(){var e=performance.timing,t={entryType:"navigation",startTime:0};for(var n in e)"navigationStart"!==n&&"toJSON"!==n&&(t[n]=Math.max(e[n]-e.navigationStart,0));return t}();if(n.value=n.delta=t.responseStart,n.value<0)return;n.entries=[t],e(n)}catch(e){}},"complete"===document.readyState?setTimeout(t,0):addEventListener("pageshow",t)};t.getFCP=g,t.getCLS=w,t.getFID=_,t.getLCP=C,t.getTTFB=P},function(e,t,n){"use strict";function r(e,t,n){var r=t&&n||0;"string"==typeof e&&(t="binary"===e?new Array(16):null,e=null),e=e||{};var a=e.random||(e.rng||i)();if(a[6]=15&a[6]|64,a[8]=63&a[8]|128,t)for(var c=0;c<16;++c)t[r+c]=a[c];return t||o(a)}var i=n(5),o=n(6);e.exports=r},function(e,t,n){"use strict";var r="undefined"!=typeof crypto&&crypto.getRandomValues&&crypto.getRandomValues.bind(crypto)||"undefined"!=typeof msCrypto&&"function"==typeof window.msCrypto.getRandomValues&&msCrypto.getRandomValues.bind(msCrypto);if(r){var i=new Uint8Array(16);e.exports=function(){return r(i),i}}else{var o=new Array(16);e.exports=function(){for(var e,t=0;t<16;t++)0==(3&t)&&(e=4294967296*Math.random()),o[t]=e>>>((3&t)<<3)&255;return o}}},function(e,t,n){"use strict";function r(e,t){var n=t||0,r=i;return[r[e[n++]],r[e[n++]],r[e[n++]],r[e[n++]],"-",r[e[n++]],r[e[n++]],"-",r[e[n++]],r[e[n++]],"-",r[e[n++]],r[e[n++]],"-",r[e[n++]],r[e[n++]],r[e[n++]],r[e[n++]],r[e[n++]],r[e[n++]]].join("")}for(var i=[],o=0;o<256;++o)i[o]=(o+256).toString(16).substr(1);e.exports=r}]);
function print_today() {
    var now = new Date();
    var months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    var date = ((now.getDate() < 10) ? "0" : "") + now.getDate();

    function fourdigits(number) {
        return (number < 1000) ? number + 1900 : number;
    }
    var today = months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));
    return today;
}

function roundNumber(number, decimals) {
    var newString;
    decimals = Number(decimals);
    if (decimals < 1) {
        newString = (Math.round(number)).toString();
    } else {
        var numString = number.toString();
        if (numString.lastIndexOf(".") == -1) {
            numString += ".";
        }
        var cutoff = numString.lastIndexOf(".") + decimals;
        var d1 = Number(numString.substring(cutoff, cutoff + 1));
        var d2 = Number(numString.substring(cutoff + 1, cutoff + 2));
        if (d2 >= 5) {
            if (d1 == 9 && cutoff > 0) {
                while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
                    if (d1 != ".") {
                        cutoff -= 1;
                        d1 = Number(numString.substring(cutoff, cutoff + 1));
                    } else {
                        cutoff -= 1;
                    }
                }
            }
            d1 += 1;
        }
        if (d1 == 10) {
            numString = numString.substring(0, numString.lastIndexOf("."));
            var roundedNum = Number(numString) + 1;
            newString = roundedNum.toString() + '.';
        } else {
            newString = numString.substring(0, cutoff) + d1.toString();
        }
    }
    if (newString.lastIndexOf(".") == -1) {
        newString += ".";
    }
    var decs = (newString.substring(newString.lastIndexOf(".") + 1)).length;
    for (var i = 0; i < decimals - decs; i++) newString += "0";
    return newString;
}

// function update_total() {
//     var total = 0;
//     $('#priceId').each(function(i) {
//         priceId = $(this).html().replace("SAR", "");
//         if (!isNaN(priceId)) total += Number(priceId);
//     });
//     total = roundNumber(total, 2);
//     $('#subtotal').html("SAR" + total);
//     $('#total').html("SAR" + total);
//     update_balance();
// }
function update_total() {
    var subtotal = 0;
    $('.item-row').each(function () {
        var price = parseFloat($(this).find('.price').text().replace("$", "").replace(",", ""));
        if (!isNaN(price)) {
            subtotal += price;
        }
    });
    $('#subtotal').text("$" + subtotal.toFixed(2));
    $('#total').text("$" + subtotal.toFixed(2));
    update_balance();
}
function update_balance() {
    var total = parseFloat($('#total').text().replace("$", "").replace(",", ""));
    var paid = parseFloat($('#paid').val().replace("$", "").replace(",", ""));
    var due = total - paid;

    $('#due').text("$" + due.toFixed(2));
}
function update_price() {
    var row = $(this).parents('.item-row');
    var cost = parseFloat(row.find('.cost').val().replace("$", "").replace(",", ""));
    var qty = parseInt(row.find('.qty').val());
    var price = cost * qty;

    if (!isNaN(price)) {
        row.find('.price').text("$" + price.toFixed(2));
    } else {
        row.find('.price').text("N/A");
    }

    update_total();
}

function bind() {
    $(".cost").on('blur', update_price);
    $(".qty").on('blur', update_price);
}
function removeInvoiceRow(ele) {
    $(ele).parents('.item-row').remove();
}
$(document).ready(function() {
    $('input').on('click', function () {
        $(this).select();
    });
    $("#paid").blur(update_balance);
    $("#addrow").on('click', function () {
        $(".item-row:last").after('' +
            '<tr class="item-row">' +
            '<td class="item-name">' +
            '<div class="delete-wpr">' +
            '<a class="delete" href="javascript:;" title="Remove row" onClick="removeInvoiceRow(this)">X</a>' +
            '<textarea>Item Name</textarea>' +
            '</div>' +
            '</td>' +
            '<td class="description">' +
            '<textarea>Description</textarea>' +
            '</td><td>' +
            '<textarea class="cost">$0.00</textarea>' +
            '</td><td>' +
            '<textarea class="qty">0</textarea>' +
            '</td><td>' +
            '<span class="price">$0.00</span>' +
            '</td>' +
            '</tr>');
        if ($(".delete").length > 0) $(".delete").show();
        bind();
    });

    // Initial binding
    bind();
    $(".delete").on('click', function() {
        removeInvoiceRow(this);
        update_total();
        if ($(".delete").length < 2) $(".delete").hide();
    });
    $("#cancel-logo").on('click', function () {
        $("#logo").removeClass('edit');
    });
    $("#delete-logo").on('click', function () {
        $("#logo").remove();
    });
    $("#change-logo").on('click', function () {
        $("#logo").addClass('edit');
        $("#imageloc").val($("#image").attr('src'));
        $("#image").select();
    });
    $("#save-logo").on('click', function () {
        $("#image").attr('src', $("#imageloc").val());
        $("#logo").removeClass('edit');
    });
    $("#date").val(print_today());


});
