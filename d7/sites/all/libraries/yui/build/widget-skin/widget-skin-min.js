/*
YUI 3.14.0 (build a01e97d)
Copyright 2013 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("widget-skin",function(e,t){var n="boundingBox",r="contentBox",i="skin",s=e.ClassNameManager.getClassName;e.Widget.prototype.getSkinName=function(e){var t=this.get(r)||this.get(n),o,u;return e=e||s(i,""),u=new RegExp("\\b"+e+"(\\S+)"),t&&t.ancestor(function(e){return o=e.get("className").match(u),o}),o?o[1]:null}},"3.14.0",{requires:["widget-base"]});
