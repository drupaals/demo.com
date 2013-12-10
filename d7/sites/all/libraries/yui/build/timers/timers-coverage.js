/*
YUI 3.14.0 (build a01e97d)
Copyright 2013 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

if (typeof __coverage__ === 'undefined') { __coverage__ = {}; }
if (!__coverage__['build/timers/timers.js']) {
   __coverage__['build/timers/timers.js'] = {"path":"build/timers/timers.js","s":{"1":0,"2":0,"3":0,"4":0,"5":0,"6":0,"7":0,"8":0,"9":0,"10":0,"11":0,"12":0,"13":0,"14":0,"15":0,"16":0,"17":0,"18":0,"19":0},"b":{"1":[0,0],"2":[0,0],"3":[0,0],"4":[0,0]},"f":{"1":0,"2":0,"3":0,"4":0,"5":0,"6":0},"fnMap":{"1":{"name":"(anonymous_1)","line":1,"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":37}}},"2":{"name":"(anonymous_2)","line":26,"loc":{"start":{"line":26,"column":11},"end":{"line":26,"column":39}}},"3":{"name":"(anonymous_3)","line":29,"loc":{"start":{"line":29,"column":28},"end":{"line":29,"column":40}}},"4":{"name":"(anonymous_4)","line":42,"loc":{"start":{"line":42,"column":20},"end":{"line":42,"column":32}}},"5":{"name":"(anonymous_5)","line":70,"loc":{"start":{"line":70,"column":26},"end":{"line":70,"column":54}}},"6":{"name":"(anonymous_6)","line":85,"loc":{"start":{"line":85,"column":26},"end":{"line":85,"column":54}}}},"statementMap":{"1":{"start":{"line":1,"column":0},"end":{"line":94,"column":41}},"2":{"start":{"line":10,"column":0},"end":{"line":46,"column":6}},"3":{"start":{"line":27,"column":8},"end":{"line":27,"column":21}},"4":{"start":{"line":29,"column":8},"end":{"line":39,"column":11}},"5":{"start":{"line":36,"column":12},"end":{"line":38,"column":13}},"6":{"start":{"line":37,"column":16},"end":{"line":37,"column":35}},"7":{"start":{"line":41,"column":8},"end":{"line":45,"column":10}},"8":{"start":{"line":43,"column":16},"end":{"line":43,"column":29}},"9":{"start":{"line":69,"column":0},"end":{"line":89,"column":1}},"10":{"start":{"line":70,"column":4},"end":{"line":72,"column":6}},"11":{"start":{"line":71,"column":8},"end":{"line":71,"column":39}},"12":{"start":{"line":73,"column":4},"end":{"line":73,"column":32}},"13":{"start":{"line":77,"column":5},"end":{"line":89,"column":1}},"14":{"start":{"line":78,"column":4},"end":{"line":78,"column":43}},"15":{"start":{"line":79,"column":4},"end":{"line":79,"column":28}},"16":{"start":{"line":85,"column":4},"end":{"line":87,"column":6}},"17":{"start":{"line":86,"column":8},"end":{"line":86,"column":40}},"18":{"start":{"line":88,"column":4},"end":{"line":88,"column":30}},"19":{"start":{"line":91,"column":0},"end":{"line":91,"column":14}}},"branchMap":{"1":{"line":36,"type":"if","locations":[{"start":{"line":36,"column":12},"end":{"line":36,"column":12}},{"start":{"line":36,"column":12},"end":{"line":36,"column":12}}]},"2":{"line":69,"type":"if","locations":[{"start":{"line":69,"column":0},"end":{"line":69,"column":0}},{"start":{"line":69,"column":0},"end":{"line":69,"column":0}}]},"3":{"line":77,"type":"if","locations":[{"start":{"line":77,"column":5},"end":{"line":77,"column":5}},{"start":{"line":77,"column":5},"end":{"line":77,"column":5}}]},"4":{"line":77,"type":"binary-expr","locations":[{"start":{"line":77,"column":10},"end":{"line":77,"column":30}},{"start":{"line":77,"column":36},"end":{"line":77,"column":57}}]}},"code":["(function () { YUI.add('timers', function (Y, NAME) {","","/**"," * Provides utilities for timed asynchronous callback execution."," * Y.soon is a setImmediate/process.nextTick/setTimeout wrapper."," * @module timers"," * @author Steven Olmsted"," */","","var YGLOBAL = Y.config.global,","","    /**","     * Y.soon accepts a callback function.  The callback function will be called","     * once in a future turn of the JavaScript event loop.  If the function","     * requires a specific execution context or arguments, wrap it with Y.bind.","     * Y.soon returns an object with a cancel method.  If the cancel method is","     * called before the callback function, the callback function won't be","     * called.","     * @method soon","     * @for YUI","     * @param {Function} callbackFunction","     * @return {Object} An object with a cancel method.  If the cancel method is","     * called before the callback function, the callback function won't be","     * called.","    */","    soon = function (callbackFunction) {","        var canceled;","","        soon._asynchronizer(function () {","            // Some asynchronizers may provide their own cancellation","            // methods such as clearImmediate or clearTimeout but some","            // asynchronizers do not.  For simplicity, cancellation is","            // entirely handled here rather than wrapping the other methods.","            // All asynchronizers are expected to always call this anonymous","            // function.","            if (!canceled) {","                callbackFunction();","            }","        });","","        return {","            cancel: function () {","                canceled = 1;","            }","        };","    };","","/**"," * The asynchronizer is the internal mechanism which will call a function"," * asynchronously.  This property is exposed as a convenient way to define a"," * different asynchronizer implementation without having to rewrite the"," * entire Y.soon interface."," * @method _asynchronizer"," * @for soon"," * @param {Function} callbackFunction The function to call asynchronously."," * @protected"," */","","/**"," * Since Y.soon is likely to have many differing asynchronizer"," * implementations, this property should be set to identify which"," * implementation is in use."," * @property _impl"," * @protected"," * @type String"," */","","// Check for a native or already polyfilled implementation of setImmediate.","if ('setImmediate' in YGLOBAL) {","    soon._asynchronizer = function (callbackFunction) {","        setImmediate(callbackFunction);","    };","    soon._impl = 'setImmediate';","}","","// Check for process and process.nextTick","else if (('process' in YGLOBAL) && ('nextTick' in process)) {","    soon._asynchronizer = process.nextTick;","    soon._impl = 'nextTick';","}","","// The most widely supported asynchronizer is setTimeout so we use that as","// the fallback.","else {","    soon._asynchronizer = function (callbackFunction) {","        setTimeout(callbackFunction, 0);","    };","    soon._impl = 'setTimeout';","}","","Y.soon = soon;","","","}, '3.14.0', {\"requires\": [\"yui-base\"]});","","}());"]};
}
var __cov_SYkBO3kXkb18cN$O59hDtQ = __coverage__['build/timers/timers.js'];
__cov_SYkBO3kXkb18cN$O59hDtQ.s['1']++;YUI.add('timers',function(Y,NAME){__cov_SYkBO3kXkb18cN$O59hDtQ.f['1']++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['2']++;var YGLOBAL=Y.config.global,soon=function(callbackFunction){__cov_SYkBO3kXkb18cN$O59hDtQ.f['2']++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['3']++;var canceled;__cov_SYkBO3kXkb18cN$O59hDtQ.s['4']++;soon._asynchronizer(function(){__cov_SYkBO3kXkb18cN$O59hDtQ.f['3']++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['5']++;if(!canceled){__cov_SYkBO3kXkb18cN$O59hDtQ.b['1'][0]++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['6']++;callbackFunction();}else{__cov_SYkBO3kXkb18cN$O59hDtQ.b['1'][1]++;}});__cov_SYkBO3kXkb18cN$O59hDtQ.s['7']++;return{cancel:function(){__cov_SYkBO3kXkb18cN$O59hDtQ.f['4']++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['8']++;canceled=1;}};};__cov_SYkBO3kXkb18cN$O59hDtQ.s['9']++;if('setImmediate'in YGLOBAL){__cov_SYkBO3kXkb18cN$O59hDtQ.b['2'][0]++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['10']++;soon._asynchronizer=function(callbackFunction){__cov_SYkBO3kXkb18cN$O59hDtQ.f['5']++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['11']++;setImmediate(callbackFunction);};__cov_SYkBO3kXkb18cN$O59hDtQ.s['12']++;soon._impl='setImmediate';}else{__cov_SYkBO3kXkb18cN$O59hDtQ.b['2'][1]++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['13']++;if((__cov_SYkBO3kXkb18cN$O59hDtQ.b['4'][0]++,'process'in YGLOBAL)&&(__cov_SYkBO3kXkb18cN$O59hDtQ.b['4'][1]++,'nextTick'in process)){__cov_SYkBO3kXkb18cN$O59hDtQ.b['3'][0]++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['14']++;soon._asynchronizer=process.nextTick;__cov_SYkBO3kXkb18cN$O59hDtQ.s['15']++;soon._impl='nextTick';}else{__cov_SYkBO3kXkb18cN$O59hDtQ.b['3'][1]++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['16']++;soon._asynchronizer=function(callbackFunction){__cov_SYkBO3kXkb18cN$O59hDtQ.f['6']++;__cov_SYkBO3kXkb18cN$O59hDtQ.s['17']++;setTimeout(callbackFunction,0);};__cov_SYkBO3kXkb18cN$O59hDtQ.s['18']++;soon._impl='setTimeout';}}__cov_SYkBO3kXkb18cN$O59hDtQ.s['19']++;Y.soon=soon;},'3.14.0',{'requires':['yui-base']});
