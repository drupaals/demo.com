/*
YUI 3.14.0 (build a01e97d)
Copyright 2013 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("node-scroll-info",function(e,t){var n=e.config.doc,r=e.config.win,i="scroll",s="scrollDown",o="scrollLeft",u="scrollRight",a="scrollUp",f="scrollToBottom",l="scrollToLeft",c="scrollToRight",h="scrollToTop";e.Plugin.ScrollInfo=e.Base.create("scrollInfoPlugin",e.Plugin.Base,[],{initializer:function(e){this._host=e.host,this._hostIsBody=this._host.get("nodeName").toLowerCase()==="body",this._scrollDelay=this.get("scrollDelay"),this._scrollMargin=this.get("scrollMargin"),this._scrollNode=this._getScrollNode(),this.refreshDimensions(),this._lastScroll=this.getScrollInfo(),this._bind()},destructor:function(){(new e.EventHandle(this._events)).detach(),this._events=null},getOffscreenNodes:function(t,n){typeof n=="undefined"&&(n=this._scrollMargin);var r=e.Selector.query(t||"*",this._host._node);return new e.NodeList(e.Array.filter(r,function(e){return!this._isElementOnscreen(e,n)},this))},getOnscreenNodes:function(t,n){typeof n=="undefined"&&(n=this._scrollMargin);var r=e.Selector.query(t||"*",this._host._node);return new e.NodeList(e.Array.filter(r,function(e){return this._isElementOnscreen(e,n)},this))},getScrollInfo:function(){var e=this._scrollNode,t=this._lastScroll,n=this._scrollMargin,r=e.scrollLeft,i=e.scrollHeight,s=e.scrollTop,o=e.scrollWidth,u=s+this._height,a=r+this._width;return{atBottom:u>i-n,atLeft:r<n,atRight:a>o-n,atTop:s<n,isScrollDown:t&&s>t.scrollTop,isScrollLeft:t&&r<t.scrollLeft,isScrollRight:t&&r>t.scrollLeft,isScrollUp:t&&s<t.scrollTop,scrollBottom:u,scrollHeight:i,scrollLeft:r,scrollRight:a,scrollTop:s,scrollWidth:o}},isNodeOnscreen:function(t,n){return t=e.one(t),!!t&&!!this._isElementOnscreen(t._node,n)},refreshDimensions:function(){var t=n.documentElement;e.UA.ios?(this._winHeight=r.innerHeight,this._winWidth=r.innerWidth):(this._winHeight=t.clientHeight,this._winWidth=t.clientWidth),this._hostIsBody?(this._height=this._winHeight,this._width=this._winWidth):(this._height=this._scrollNode.clientHeight,this._width=this._scrollNode.clientWidth),this._refreshHostBoundingRect()},_bind:function(){var t=e.one("win");this._events=[this.after({scrollDelayChange:this._afterScrollDelayChange,scrollMarginChange:this._afterScrollMarginChange}),t.on("windowresize",this._afterResize,this)],this._hostIsBody?this._events.push(t.after("scroll",this._afterHostScroll,this)):this._events.push(t.after("scroll",this._afterWindowScroll,this),this._host.after("scroll",this._afterHostScroll,this))},_getScrollNode:function(){return this._hostIsBody&&!e.UA.webkit?n.documentElement:e.Node.getDOMNode(this._host)},_isElementOnscreen:function(e,t){var n=this._hostRect,r=e.getBoundingClientRect();return typeof t=="undefined"&&(t=this._scrollMargin),!(r.top>n.bottom+t||r.bottom<n.top-t||r.right<n.left-t||r.left>n.right+t)},_refreshHostBoundingRect:function(){var e=this._winHeight,t=this._winWidth,n;this._hostIsBody?(n={bottom:e,height:e,left:0,right:t,top:0,width:t},this._isHostOnscreen=!0):n=this._scrollNode.getBoundingClientRect(),this._hostRect=n},_triggerScroll:function(t){var n=this.getScrollInfo(),r=e.merge(t,n),p=this._lastScroll;this._lastScroll=n,this.fire(i,r),n.isScrollLeft?this.fire(o,r):n.isScrollRight&&this.fire(u,r),n.isScrollUp?this.fire(a,r):n.isScrollDown&&this.fire(s,r),n.atBottom&&(!p.atBottom||n.scrollHeight>p.scrollHeight)&&this.fire(f,r),n.atLeft&&!p.atLeft&&this.fire(l,r),n.atRight&&(!p.atRight||n.scrollWidth>p.scrollWidth)&&this.fire(c,r),n.atTop&&!p.atTop&&this.fire(h,r)},_afterHostScroll:function(e){var t=this;clearTimeout(this._scrollTimeout),this._scrollTimeout=setTimeout(function(){t._triggerScroll(e)},this._scrollDelay)},_afterResize:function(){this.refreshDimensions()},_afterScrollDelayChange:function(e){this._scrollDelay=e.newVal},_afterScrollMarginChange:function(e){this._scrollMargin=e.newVal},_afterWindowScroll:function(){this._refreshHostBoundingRect()}},{NS:"scrollInfo",ATTRS:{scrollDelay:{value:50},scrollMargin:{value:50}}})},"3.14.0",{requires:["array-extras","base-build","event-resize","node-pluginhost","plugin","selector"]});
