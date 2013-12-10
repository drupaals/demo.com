/*
YUI 3.14.0 (build a01e97d)
Copyright 2013 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("graphics-vml",function(e,t){function E(){}var n="vml",r="shape",i=/[a-z][^a-z]*/ig,s=/[\-]?[0-9]*[0-9|\.][0-9]*/g,o=e.Lang,u=o.isNumber,a=o.isArray,f=e.DOM,l=e.Selector,c=e.config.doc,h=e.AttributeLite,p,d,v,m,g,y,b,w=e.ClassNameManager.getClassName;E.prototype={_pathSymbolToMethod:{M:"moveTo",m:"relativeMoveTo",L:"lineTo",l:"relativeLineTo",C:"curveTo",c:"relativeCurveTo",Q:"quadraticCurveTo",q:"relativeQuadraticCurveTo",z:"closePath",Z:"closePath"},_coordSpaceMultiplier:100,_round:function(e){return Math.round(e*this._coordSpaceMultiplier)},_addToPath:function(e){this._path=this._path||"",this._movePath&&(this._path+=this._movePath,this._movePath=null),this._path+=e},_currentX:0,_currentY:0,curveTo:function(){return this._curveTo.apply(this,[e.Array(arguments),!1]),this},relativeCurveTo:function(){return this._curveTo.apply(this,[e.Array(arguments),!0]),this},_curveTo:function(e,t){var n,r,i,s,o,u,a,f,l,c,h,p,d,v,m,g,y=t?" v ":" c ",b=t?parseFloat(this._currentX):0,w=t?parseFloat(this._currentY):0;m=e.length-5,g=y;for(v=0;v<m;v+=6)o=parseFloat(e[v]),u=parseFloat(e[v+1]),a=parseFloat(e[v+2]),f=parseFloat(e[v+3]),i=parseFloat(e[v+4]),s=parseFloat(e[v+5]),v>0&&(g+=", "),g=g+this._round(o)+", "+this._round(u)+", "+this._round(a)+", "+this._round(f)+", "+this._round(i)+", "+this._round(s),o+=b,u+=w,a+=b,f+=w,i+=b,s+=w,c=Math.max(i,Math.max(o,a)),p=Math.max(s,Math.max(u,f)),h=Math.min(i,Math.min(o,a)),d=Math.min(s,Math.min(u,f)),n=Math.abs(c-h),r=Math.abs(p-d),l=[[this._currentX,this._currentY],[o,u],[a,f],[i,s]],this._setCurveBoundingBox(l,n,r),this._currentX=i,this._currentY=s;this._addToPath(g)},quadraticCurveTo:function(){return this._quadraticCurveTo.apply(this,[e.Array(arguments),!1]),this},relativeQuadraticCurveTo:function(){return this._quadraticCurveTo.apply(this,[e.Array(arguments),!0]),this},_quadraticCurveTo:function(e,t){var n,r,i,s,o,u,a,f,l=this._currentX,c=this._currentY,h,p=e.length-3,d=[],v=t?parseFloat(this._currentX):0,m=t?parseFloat(this._currentY):0;for(h=0;h<p;h+=4)n=parseFloat(e[h])+v,r=parseFloat(e[h+1])+m,a=parseFloat(e[h+2])+v,f=parseFloat(e[h+3])+m,i=l+.67*(n-l),s=c+.67*(r-c),o=i+(a-l)*.34,u=s+(f-c)*.34,d.push(i),d.push(s),d.push(o),d.push(u),d.push(a),d.push(f);this._curveTo.apply(this,[d,!1])},drawRect:function(e,t,n,r){return this.moveTo(e,t),this.lineTo(e+n,t),this.lineTo(e+n,t+r),this.lineTo(e,t+r),this.lineTo(e,t),this._currentX=e,this._currentY=t,this},drawRoundRect:function(e,t,n,r,i,s){return this.moveTo(e,t+s),this.lineTo(e,t+r-s),this.quadraticCurveTo(e,t+r,e+i,t+r),this.lineTo(e+n-i,t+r),this.quadraticCurveTo(e+n,t+r,e+n,t+r-s),this.lineTo(e+n,t+s),this.quadraticCurveTo(e+n,t,e+n-i,t),this.lineTo(e+i,t),this.quadraticCurveTo(e,t,e,t+s),this},drawCircle:function(e,t,n){var r=0,i=360,s=n*2;return i*=65535,this._drawingComplete=!1,this._trackSize(e+s,t+s),this.moveTo(e+s,t+n),this._addToPath(" ae "+this._round(e+n)+", "+this._round(t+n)+", "+this._round(n)+", "+this._round(n)+", "+r+", "+i),this},drawEllipse:function(e,t,n,r){var i=0,s=360,o=n*.5,u=r*.5;return s*=65535,this._drawingComplete=!1,this._trackSize(e+n,t+r),this.moveTo(e+n,t+u),this._addToPath(" ae "+this._round(e+o)+", "+this._round(e+o)+", "+this._round(t+u)+", "+this._round(o)+", "+this._round(u)+", "+i+", "+s),this},drawDiamond:function(e,t,n,r){var i=n*.5,s=r*.5;return this.moveTo(e+i,t),this.lineTo(e+n,t+s),this.lineTo(e+i,t+r),this.lineTo(e,t+s),this.lineTo(e+i,t),this},drawWedge:function(e,t,n,r,i){var s=i*2;return Math.abs(r)>360&&(r=360),this._currentX=e,this._currentY=t,n*=-65535,r*=65536,n=Math.round(n),r=Math.round(r),this.moveTo(e,t),this._addToPath(" ae "+this._round(e)+", "+this._round(t)+", "+this._round(i)+" "+this._round(i)+", "+n+", "+r),this._trackSize(s,s),this},lineTo:function(){return this._lineTo.apply(this,[e.Array(arguments),!1]),this},relativeLineTo:function(){return this._lineTo.apply(this,[e.Array(arguments),!0]),this},_lineTo:function(e,t){var n=e[0],r,i,s,o,u=t?" r ":" l ",a=t?parseFloat(this._currentX):0,f=t?parseFloat(this._currentY):0;if(typeof n=="string"||typeof n=="number"){i=e.length-1;for(r=0;r<i;r+=2)s=parseFloat(e[r]),o=parseFloat(e[r+1]),u+=" "+this._round(s)+", "+this._round(o),s+=a,o+=f,this._currentX=s,this._currentY=o,this._trackSize.apply(this,[s,o])}else{i=e.length;for(r=0;r<i;r+=1)s=parseFloat(e[r][0]),o=parseFloat(e[r][1]),u+=" "+this._round(s)+", "+this._round(o),s+=a,o+=f,this._currentX=s,this._currentY=o,this._trackSize.apply(this,[s,o])}return this._addToPath(u),this},moveTo:function(){return this._moveTo.apply(this,[e.Array(arguments),!1]),this},relativeMoveTo:function(){return this._moveTo.apply(this,[e.Array(arguments),!0]),this},_moveTo:function(e,t){var n=parseFloat(e[0]),r=parseFloat(e[1]),i=t?" t ":" m ",s=t?parseFloat(this._currentX):0,o=t?parseFloat(this._currentY):0;this._movePath=i+this._round(n)+", "+this._round(r),n+=s,r+=o,this._trackSize(n,r),this._currentX=n,this._currentY=r},_closePath:function(){var e=this.get("fill"),t=this.get("stroke"),n=this.node,r=this.get("width"),i=this.get("height"),s=this._path,o="",u=this._coordSpaceMultiplier;this._fillChangeHandler(),this._strokeChangeHandler(),s&&(e&&e.color&&(o+=" x"),t&&(o+=" e")),s&&(n.path=s+o),!isNaN(r)&&!isNaN(i)&&(n.coordOrigin=this._left+", "+this._top,n.coordSize=r*u+", "+i*u,n.style.position="absolute",n.style.width=r+"px",n.style.height=i+"px"),this._path=s,this._movePath=null,this._updateTransform()},end:function(){return this._closePath(),this},closePath:function(){return this._addToPath(" x e"),this},clear:function(){return this._right=0,this._bottom=0,this._width=0,this._height=0,this._left=0,this._top=0,this._path="",this._movePath=null,this},getBezierData:function(e,t){var n=e.length,r=[],i,s;for(i=0;i<n;++i)r[i]=[e[i][0],e[i][1]];for(s=1;s<n;++s)for(i=0;i<n-s;++i)r[i][0]=(1-t)*r[i][0]+t*r[parseInt(i+1,10)][0],r[i][1]=(1-t)*r[i][1]+t*r[parseInt(i+1,10)][1];return[r[0][0],r[0][1]]},_setCurveBoundingBox:function(e,t,n){var r,i=this._currentX,s=i,o=this._currentY
,u=o,a=Math.round(Math.sqrt(t*t+n*n)),f=1/a,l;for(r=0;r<a;++r)l=this.getBezierData(e,f*r),i=isNaN(i)?l[0]:Math.min(l[0],i),s=isNaN(s)?l[0]:Math.max(l[0],s),o=isNaN(o)?l[1]:Math.min(l[1],o),u=isNaN(u)?l[1]:Math.max(l[1],u);i=Math.round(i*10)/10,s=Math.round(s*10)/10,o=Math.round(o*10)/10,u=Math.round(u*10)/10,this._trackSize(s,u),this._trackSize(i,o)},_trackSize:function(e,t){e>this._right&&(this._right=e),e<this._left&&(this._left=e),t<this._top&&(this._top=t),t>this._bottom&&(this._bottom=t),this._width=this._right-this._left,this._height=this._bottom-this._top},_left:0,_right:0,_top:0,_bottom:0,_width:0,_height:0},e.VMLDrawing=E,p=function(){this._transforms=[],this.matrix=new e.Matrix,this._normalizedMatrix=new e.Matrix,p.superclass.constructor.apply(this,arguments)},p.NAME="shape",e.extend(p,e.GraphicBase,e.mix({_type:"shape",init:function(){this.initializer.apply(this,arguments)},initializer:function(e){var t=this,n=e.graphic,r=this.get("data");t.createNode(),n&&this._setGraphic(n),r&&t._parsePathData(r),this._updateHandler()},_setGraphic:function(t){var n;t instanceof e.VMLGraphic?this._graphic=t:(n=new e.VMLGraphic({render:t}),n._appendShape(this),this._graphic=n,this._appendStrokeAndFill())},_appendStrokeAndFill:function(){this._strokeNode&&this.node.appendChild(this._strokeNode),this._fillNode&&this.node.appendChild(this._fillNode)},createNode:function(){var e,t=this._camelCaseConcat,i=this.get("x"),s=this.get("y"),o=this.get("width"),u=this.get("height"),a,f,l=this.name,h,p=this.get("visible")?"visible":"hidden",d,v,m,g,y,b,E,S,x,T;a=this.get("id"),f=this._type==="path"?"shape":this._type,v=w(r)+" "+w(t(n,r))+" "+w(l)+" "+w(t(n,l))+" "+n+f,m=this._getStrokeProps(),x=this._getFillProps(),h="<"+f+'  xmlns="urn:schemas-microsft.com:vml" id="'+a+'" class="'+v+'" style="behavior:url(#default#VML);display:inline-block;position:absolute;left:'+i+"px;top:"+s+"px;width:"+o+"px;height:"+u+"px;visibility:"+p+'"',m&&m.weight&&m.weight>0?(g=m.endcap,y=parseFloat(m.opacity),b=m.joinstyle,E=m.miterlimit,S=m.dashstyle,h+=' stroked="t" strokecolor="'+m.color+'" strokeWeight="'+m.weight+'px"',d='<stroke class="vmlstroke" xmlns="urn:schemas-microsft.com:vml" on="t" style="behavior:url(#default#VML);display:inline-block;" opacity="'+y+'"',g&&(d+=' endcap="'+g+'"'),b&&(d+=' joinstyle="'+b+'"'),E&&(d+=' miterlimit="'+E+'"'),S&&(d+=' dashstyle="'+S+'"'),d+="></stroke>",this._strokeNode=c.createElement(d),h+=' stroked="t"'):h+=' stroked="f"',x&&(x.node&&(T=x.node,this._fillNode=c.createElement(T)),x.color&&(h+=' fillcolor="'+x.color+'"'),h+=' filled="'+x.filled+'"'),h+=">",h+="</"+f+">",e=c.createElement(h),this.node=e,this._strokeFlag=!1,this._fillFlag=!1},addClass:function(e){var t=this.node;f.addClass(t,e)},removeClass:function(e){var t=this.node;f.removeClass(t,e)},getXY:function(){var e=this._graphic,t=e.getXY(),n=this.get("x"),r=this.get("y");return[t[0]+n,t[1]+r]},setXY:function(e){var t=this._graphic,n=t.getXY();this.set("x",e[0]-n[0]),this.set("y",e[1]-n[1])},contains:function(t){var n=t instanceof e.Node?t._node:t;return n===this.node},compareTo:function(e){var t=this.node;return t===e},test:function(e){return l.test(this.node,e)},_getStrokeProps:function(){var e,t=this.get("stroke"),n,r,i="",s,o=0,f,l,c;if(t&&t.weight&&t.weight>0){e={},l=t.linecap||"flat",c=t.linejoin||"round",l!=="round"&&l!=="square"&&(l="flat"),n=parseFloat(t.opacity),r=t.dashstyle||"none",t.color=t.color||"#000000",t.weight=t.weight||1,t.opacity=u(n)?n:1,e.stroked=!0,e.color=t.color,e.weight=t.weight,e.endcap=l,e.opacity=t.opacity;if(a(r)){i=[],f=r.length;for(o=0;o<f;++o)s=r[o],i[o]=s/t.weight}c==="round"||c==="bevel"?e.joinstyle=c:(c=parseInt(c,10),u(c)&&(e.miterlimit=Math.max(c,1),e.joinstyle="miter")),e.dashstyle=i}return e},_strokeChangeHandler:function(){if(!this._strokeFlag)return;var e=this.node,t=this.get("stroke"),n,r,i="",s,o=0,f,l,c;if(t&&t.weight&&t.weight>0){l=t.linecap||"flat",c=t.linejoin||"round",l!=="round"&&l!=="square"&&(l="flat"),n=parseFloat(t.opacity),r=t.dashstyle||"none",t.color=t.color||"#000000",t.weight=t.weight||1,t.opacity=u(n)?n:1,e.stroked=!0,e.strokeColor=t.color,e.strokeWeight=t.weight+"px",this._strokeNode||(this._strokeNode=this._createGraphicNode("stroke"),e.appendChild(this._strokeNode)),this._strokeNode.endcap=l,this._strokeNode.opacity=t.opacity;if(a(r)){i=[],f=r.length;for(o=0;o<f;++o)s=r[o],i[o]=s/t.weight}c==="round"||c==="bevel"?this._strokeNode.joinstyle=c:(c=parseInt(c,10),u(c)&&(this._strokeNode.miterlimit=Math.max(c,1),this._strokeNode.joinstyle="miter")),this._strokeNode.dashstyle=i,this._strokeNode.on=!0}else this._strokeNode&&(this._strokeNode.on=!1),e.stroked=!1;this._strokeFlag=!1},_getFillProps:function(){var e=this.get("fill"),t,n,r,i,s,o=!1;if(e){n={};if(e.type==="radial"||e.type==="linear"){t=parseFloat(e.opacity),t=u(t)?t:1,o=!0,r=this._getGradientFill(e),s='<fill xmlns="urn:schemas-microsft.com:vml" class="vmlfill" style="behavior:url(#default#VML);display:inline-block;" opacity="'+t+'"';for(i in r)r.hasOwnProperty(i)&&(s+=" "+i+'="'+r[i]+'"');s+=" />",n.node=s}else e.color&&(t=parseFloat(e.opacity),o=!0,n.color=e.color,u(t)&&(t=Math.max(Math.min(t,1),0),n.opacity=t,t<1&&(n.node='<fill xmlns="urn:schemas-microsft.com:vml" class="vmlfill" style="behavior:url(#default#VML);display:inline-block;" type="solid" opacity="'+t+'"/>')));n.filled=o}return n},_fillChangeHandler:function(){if(!this._fillFlag)return;var e=this.node,t=this.get("fill"),n,r,i=!1,s,o;if(t)if(t.type==="radial"||t.type==="linear"){i=!0,o=this._getGradientFill(t);if(this._fillNode)for(s in o)o.hasOwnProperty(s)&&(s==="colors"?this._fillNode.colors.value=o[s]:this._fillNode[s]=o[s]);else{r='<fill xmlns="urn:schemas-microsft.com:vml" class="vmlfill" style="behavior:url(#default#VML);display:inline-block;"';for(s in o)o.hasOwnProperty(s)&&(r+=" "+s+'="'+o[s]+'"');r+=" />",this._fillNode=c.createElement(r),e.appendChild(this._fillNode)}}else t.color&&(e.fillcolor=t.color,n=parseFloat(t.opacity),i=!0,u(n)&&
n<1?(t.opacity=n,this._fillNode?(this._fillNode.getAttribute("type")!=="solid"&&(this._fillNode.type="solid"),this._fillNode.opacity=n):(r='<fill xmlns="urn:schemas-microsft.com:vml" class="vmlfill" style="behavior:url(#default#VML);display:inline-block;" type="solid" opacity="'+n+'"'+"/>",this._fillNode=c.createElement(r),e.appendChild(this._fillNode))):this._fillNode&&(this._fillNode.opacity=1,this._fillNode.type="solid"));e.filled=i,this._fillFlag=!1},_updateFillNode:function(e){this._fillNode||(this._fillNode=this._createGraphicNode("fill"),e.appendChild(this._fillNode))},_getGradientFill:function(e){var t={},n,r,i=e.type,s=this.get("width"),o=this.get("height"),a=u,f,l=e.stops,c=l.length,h,p,d,v,m="",g=e.cx,y=e.cy,b=e.fx,w=e.fy,E=e.r,S,x=e.rotation||0;i==="linear"?(x<=270?x=Math.abs(x-270):x<360?x=270+(360-x):x=270,t.type="gradient",t.angle=x):i==="radial"&&(n=s*E*2,r=o*E*2,b=E*2*(b-.5),w=E*2*(w-.5),b+=g,w+=y,t.focussize=n/s/10+"% "+r/o/10+"%",t.alignshape=!1,t.type="gradientradial",t.focus="100%",t.focusposition=Math.round(b*100)+"% "+Math.round(w*100)+"%");for(d=0;d<c;++d)f=l[d],p=f.color,h=f.opacity,h=a(h)?h:1,S=f.offset||d/(c-1),S*=E*2,S=Math.round(100*S)+"%",v=d>0?d+1:"",t["opacity"+v]=h+"",m+=", "+S+" "+p;return parseFloat(S)<100&&(m+=", 100% "+p),t.colors=m.substr(2),t},_addTransform:function(t,n){n=e.Array(n),this._transform=o.trim(this._transform+" "+t+"("+n.join(", ")+")"),n.unshift(t),this._transforms.push(n),this.initialized&&this._updateTransform()},_updateTransform:function(){var t=this.node,n,r,i,s=this.get("x"),o=this.get("y"),u,a,f=this.matrix,l=this._normalizedMatrix,h=this instanceof e.VMLPath,p,d=this._transforms.length;if(this._transforms&&this._transforms.length>0){i=this.get("transformOrigin"),h&&l.translate(this._left,this._top),u=i[0]-.5,a=i[1]-.5,u=Math.max(-0.5,Math.min(.5,u)),a=Math.max(-0.5,Math.min(.5,a));for(p=0;p<d;++p)n=this._transforms[p].shift(),n&&(l[n].apply(l,this._transforms[p]),f[n].apply(f,this._transforms[p]));h&&l.translate(-this._left,-this._top),r=l.a+","+l.c+","+l.b+","+l.d+","+0+","+0}this._graphic.addToRedrawQueue(this),r&&(this._skew||(this._skew=c.createElement('<skew class="vmlskew" xmlns="urn:schemas-microsft.com:vml" on="false" style="behavior:url(#default#VML);display:inline-block;"/>'),this.node.appendChild(this._skew)),this._skew.matrix=r,this._skew.on=!0,this._skew.origin=u+", "+a),this._type!=="path"&&(this._transforms=[]),t.style.left=s+this._getSkewOffsetValue(l.dx)+"px",t.style.top=o+this._getSkewOffsetValue(l.dy)+"px"},_getSkewOffsetValue:function(t){var n=e.MatrixUtil.sign(t),r=Math.abs(t);return t=Math.min(r,32767)*n,t},_translateX:0,_translateY:0,_transform:"",translate:function(e,t){this._translateX+=e,this._translateY+=t,this._addTransform("translate",arguments)},translateX:function(e){this._translateX+=e,this._addTransform("translateX",arguments)},translateY:function(e){this._translateY+=e,this._addTransform("translateY",arguments)},skew:function(){this._addTransform("skew",arguments)},skewX:function(){this._addTransform("skewX",arguments)},skewY:function(){this._addTransform("skewY",arguments)},rotate:function(){this._addTransform("rotate",arguments)},scale:function(){this._addTransform("scale",arguments)},on:function(t,n){return e.Node.DOM_EVENTS[t]?e.on(t,n,"#"+this.get("id")):e.on.apply(this,arguments)},_draw:function(){},_updateHandler:function(){var e=this,t=e.node;e._fillChangeHandler(),e._strokeChangeHandler(),t.style.width=this.get("width")+"px",t.style.height=this.get("height")+"px",this._draw(),e._updateTransform()},_createGraphicNode:function(e){return e=e||this._type,c.createElement("<"+e+' xmlns="urn:schemas-microsft.com:vml"'+' style="behavior:url(#default#VML);display:inline-block;"'+' class="vml'+e+'"'+"/>")},_getDefaultFill:function(){return{type:"solid",opacity:1,cx:.5,cy:.5,fx:.5,fy:.5,r:.5}},_getDefaultStroke:function(){return{weight:1,dashstyle:"none",color:"#000",opacity:1}},set:function(){var e=this;h.prototype.set.apply(e,arguments),e.initialized&&e._updateHandler()},getBounds:function(){var t=this instanceof e.VMLPath,n=this.get("width"),r=this.get("height"),i=this.get("x"),s=this.get("y");return t&&(i+=this._left,s+=this._top,n=this._right-this._left,r=this._bottom-this._top),this._getContentRect(n,r,i,s)},_getContentRect:function(t,n,r,i){var s=this.get("transformOrigin"),o=s[0]*t,u=s[1]*n,a=this.matrix.getTransformArray(this.get("transform")),f=new e.Matrix,l,c=a.length,h,p,d,v=this instanceof e.VMLPath;v&&f.translate(this._left,this._top),o=isNaN(o)?0:o,u=isNaN(u)?0:u,f.translate(o,u);for(l=0;l<c;l+=1)h=a[l],p=h.shift(),p&&f[p].apply(f,h);return f.translate(-o,-u),v&&f.translate(-this._left,-this._top),d=f.getContentRect(t,n,r,i),d},toFront:function(){var e=this.get("graphic");e&&e._toFront(this)},toBack:function(){var e=this.get("graphic");e&&e._toBack(this)},_parsePathData:function(t){var n,r,o,u=e.Lang.trim(t.match(i)),a,f,l,c=this._pathSymbolToMethod;if(u){this.clear(),f=u.length||0;for(a=0;a<f;a+=1)l=u[a],r=l.substr(0,1),o=l.substr(1).match(s),n=c[r],n&&(o?this[n].apply(this,o):this[n].apply(this));this.end()}},destroy:function(){var e=this.get("graphic");e?e.removeShape(this):this._destroy()},_destroy:function(){this.node&&(this._fillNode&&(this.node.removeChild(this._fillNode),this._fillNode=null),this._strokeNode&&(this.node.removeChild(this._strokeNode),this._strokeNode=null),e.Event.purgeElement(this.node,!0),this.node.parentNode&&this.node.parentNode.removeChild(this.node),this.node=null)}},e.VMLDrawing.prototype)),p.ATTRS={transformOrigin:{valueFn:function(){return[.5,.5]}},transform:{setter:function(e){var t,n,r;this.matrix.init(),this._normalizedMatrix.init(),this._transforms=this.matrix.getTransformArray(e),n=this._transforms.length;for(t=0;t<n;++t)r=this._transforms[t];return this._transform=e,e},getter:function(){return this._transform}},x:{value:0},y:{value:0},id:{valueFn:function(){return e.guid()},setter:function(e){var t=this.node;return t&&t.setAttribute("id",e),e}}
,width:{value:0},height:{value:0},visible:{value:!0,setter:function(e){var t=this.node,n=e?"visible":"hidden";return t&&(t.style.visibility=n),e}},fill:{valueFn:"_getDefaultFill",setter:function(e){var t,n,r=this.get("fill")||this._getDefaultFill();if(e){e.hasOwnProperty("color")&&(e.type="solid");for(t in e)e.hasOwnProperty(t)&&(r[t]=e[t])}return n=r,n&&n.color&&(n.color===undefined||n.color==="none")&&(n.color=null),this._fillFlag=!0,n}},stroke:{valueFn:"_getDefaultStroke",setter:function(e){var t,n,r,i=this.get("stroke")||this._getDefaultStroke();if(e){e.hasOwnProperty("weight")&&(r=parseInt(e.weight,10),isNaN(r)||(e.weight=r));for(t in e)e.hasOwnProperty(t)&&(i[t]=e[t])}return n=i,this._strokeFlag=!0,n}},autoSize:{value:!1},pointerEvents:{value:"visiblePainted"},node:{readOnly:!0,getter:function(){return this.node}},data:{setter:function(e){return this.get("node")&&this._parsePathData(e),e}},graphic:{readOnly:!0,getter:function(){return this._graphic}}},e.VMLShape=p,v=function(){v.superclass.constructor.apply(this,arguments)},v.NAME="path",e.extend(v,e.VMLShape),v.ATTRS=e.merge(e.VMLShape.ATTRS,{width:{getter:function(){var e=Math.max(this._right-this._left,0);return e}},height:{getter:function(){return Math.max(this._bottom-this._top,0)}},path:{readOnly:!0,getter:function(){return this._path}}}),e.VMLPath=v,m=function(){m.superclass.constructor.apply(this,arguments)},m.NAME="rect",e.extend(m,e.VMLShape,{_type:"rect"}),m.ATTRS=e.VMLShape.ATTRS,e.VMLRect=m,g=function(){g.superclass.constructor.apply(this,arguments)},g.NAME="ellipse",e.extend(g,e.VMLShape,{_type:"oval"}),g.ATTRS=e.merge(e.VMLShape.ATTRS,{xRadius:{lazyAdd:!1,getter:function(){var e=this.get("width");return e=Math.round(e/2*100)/100,e},setter:function(e){var t=e*2;return this.set("width",t),e}},yRadius:{lazyAdd:!1,getter:function(){var e=this.get("height");return e=Math.round(e/2*100)/100,e},setter:function(e){var t=e*2;return this.set("height",t),e}}}),e.VMLEllipse=g,d=function(){d.superclass.constructor.apply(this,arguments)},d.NAME="circle",e.extend(d,p,{_type:"oval"}),d.ATTRS=e.merge(p.ATTRS,{radius:{lazyAdd:!1,value:0},width:{setter:function(e){return this.set("radius",e/2),e},getter:function(){var e=this.get("radius"),t=e&&e>0?e*2:0;return t}},height:{setter:function(e){return this.set("radius",e/2),e},getter:function(){var e=this.get("radius"),t=e&&e>0?e*2:0;return t}}}),e.VMLCircle=d,b=function(){b.superclass.constructor.apply(this,arguments)},b.NAME="vmlPieSlice",e.extend(b,e.VMLShape,e.mix({_type:"shape",_draw:function(){var e=this.get("cx"),t=this.get("cy"),n=this.get("startAngle"),r=this.get("arc"),i=this.get("radius");this.clear(),this.drawWedge(e,t,n,r,i),this.end()}},e.VMLDrawing.prototype)),b.ATTRS=e.mix({cx:{value:0},cy:{value:0},startAngle:{value:0},arc:{value:0},radius:{value:0}},e.VMLShape.ATTRS),e.VMLPieSlice=b,y=function(){y.superclass.constructor.apply(this,arguments)},y.NAME="vmlGraphic",y.ATTRS={render:{},id:{valueFn:function(){return e.guid()},setter:function(e){var t=this._node;return t&&t.setAttribute("id",e),e}},shapes:{readOnly:!0,getter:function(){return this._shapes}},contentBounds:{readOnly:!0,getter:function(){return this._contentBounds}},node:{readOnly:!0,getter:function(){return this._node}},width:{setter:function(e){return this._node&&(this._node.style.width=e+"px"),e}},height:{setter:function(e){return this._node&&(this._node.style.height=e+"px"),e}},autoSize:{value:!1},preserveAspectRatio:{value:"xMidYMid"},resizeDown:{resizeDown:!1},x:{getter:function(){return this._x},setter:function(e){return this._x=e,this._node&&(this._node.style.left=e+"px"),e}},y:{getter:function(){return this._y},setter:function(e){return this._y=e,this._node&&(this._node.style.top=e+"px"),e}},autoDraw:{value:!0},visible:{value:!0,setter:function(e){return this._toggleVisible(e),e}}},e.extend(y,e.GraphicBase,{set:function(){var t=this,n=arguments[0],r={autoDraw:!0,autoSize:!0,preserveAspectRatio:!0,resizeDown:!0},i,s=!1;h.prototype.set.apply(t,arguments);if(t._state.autoDraw===!0&&e.Object.size(this._shapes)>0)if(o.isString&&r[n])s=!0;else if(o.isObject(n))for(i in r)if(r.hasOwnProperty(i)&&n[i]){s=!0;break}s&&t._redraw()},_x:0,_y:0,getXY:function(){var t=this.parentNode,n=this.get("x"),r=this.get("y"),i;return t?(i=e.DOM.getXY(t),i[0]+=n,i[1]+=r):i=e.DOM._getOffset(this._node),i},initializer:function(){var e=this.get("render"),t=this.get("visible")?"visible":"hidden";this._shapes={},this._contentBounds={left:0,top:0,right:0,bottom:0},this._node=this._createGraphic(),this._node.style.left=this.get("x")+"px",this._node.style.top=this.get("y")+"px",this._node.style.visibility=t,this._node.setAttribute("id",this.get("id")),e&&this.render(e)},render:function(t){var n=t||c.body,r=this._node,i,s;return t instanceof e.Node?n=t._node:e.Lang.isString(t)&&(n=e.Selector.query(t,c.body,!0)),i=this.get("width")||parseInt(e.DOM.getComputedStyle(n,"width"),10),s=this.get("height")||parseInt(e.DOM.getComputedStyle(n,"height"),10),n.appendChild(r),this.parentNode=n,this.set("width",i),this.set("height",s),this},destroy:function(){this.removeAllShapes(),this._node&&(this._removeChildren(this._node),this._node.parentNode&&this._node.parentNode.removeChild(this._node),this._node=null)},addShape:function(e){e.graphic=this,this.get("visible")||(e.visible=!1);var t=this._getShapeClass(e.type),n=new t(e);return this._appendShape(n),n._appendStrokeAndFill(),n},_appendShape:function(e){var t=e.node,n=this._frag||this._node;this.get("autoDraw")||this.get("autoSize")==="sizeContentToGraphic"?n.appendChild(t):this._getDocFrag().appendChild(t)},removeShape:function(e){e instanceof p||o.isString(e)&&(e=this._shapes[e]),e&&e instanceof p&&(e._destroy(),this._shapes[e.get("id")]=null,delete this._shapes[e.get("id")]),this.get("autoDraw")&&this._redraw()},removeAllShapes:function(){var e=this._shapes,t;for(t in e)e.hasOwnProperty(t)&&e[t].destroy();this._shapes={}},_removeChildren:function(e){if(e.hasChildNodes()){var t;while(e.firstChild)t=e
.firstChild,this._removeChildren(t),e.removeChild(t)}},clear:function(){this.removeAllShapes(),this._removeChildren(this._node)},_toggleVisible:function(e){var t,n=this._shapes,r=e?"visible":"hidden";if(n)for(t in n)n.hasOwnProperty(t)&&n[t].set("visible",e);this._node&&(this._node.style.visibility=r),this._node&&(this._node.style.visibility=r)},setSize:function(e,t){e=Math.round(e),t=Math.round(t),this._node.style.width=e+"px",this._node.style.height=t+"px"},setPosition:function(e,t){e=Math.round(e),t=Math.round(t),this._node.style.left=e+"px",this._node.style.top=t+"px"},_createGraphic:function(){var e=c.createElement('<group xmlns="urn:schemas-microsft.com:vml" style="behavior:url(#default#VML);padding:0px 0px 0px 0px;display:block;position:absolute;top:0px;left:0px;zoom:1;"/>');return e},_createGraphicNode:function(e){return c.createElement("<"+e+' xmlns="urn:schemas-microsft.com:vml"'+' style="behavior:url(#default#VML);display:inline-block;zoom:1;"'+"/>")},getShapeById:function(e){return this._shapes[e]},_getShapeClass:function(e){var t=this._shapeClass[e];return t?t:e},_shapeClass:{circle:e.VMLCircle,rect:e.VMLRect,path:e.VMLPath,ellipse:e.VMLEllipse,pieslice:e.VMLPieSlice},batch:function(e){var t=this.get("autoDraw");this.set("autoDraw",!1),e.apply(),this.set("autoDraw",t)},_getDocFrag:function(){return this._frag||(this._frag=c.createDocumentFragment()),this._frag},addToRedrawQueue:function(e){var t,n;this._shapes[e.get("id")]=e,this.get("resizeDown")||(t=e.getBounds(),n=this._contentBounds,n.left=n.left<t.left?n.left:t.left,n.top=n.top<t.top?n.top:t.top,n.right=n.right>t.right?n.right:t.right,n.bottom=n.bottom>t.bottom?n.bottom:t.bottom,n.width=n.right-n.left,n.height=n.bottom-n.top,this._contentBounds=n),this.get("autoDraw")&&this._redraw()},_redraw:function(){var t=this.get("autoSize"),n,r=this.parentNode,i=parseFloat(e.DOM.getComputedStyle(r,"width")),s=parseFloat(e.DOM.getComputedStyle(r,"height")),o=0,u=0,a=this.get("resizeDown")?this._getUpdatedContentBounds():this._contentBounds,f=a.left,l=a.right,c=a.top,h=a.bottom,p=l-f,d=h-c,v,m,g,y,b,w=this.get("visible");this._node.style.visibility="hidden",t?(t==="sizeContentToGraphic"?(n=this.get("preserveAspectRatio"),n==="none"||p/d===i/s?(o=f,u=c,m=p,g=d):p*s/d>i?(v=s/i,m=p,g=p*v,b=i*(d/p)*(g/s),u=this._calculateCoordOrigin(n.slice(5).toLowerCase(),b,g),u=c+u,o=f):(v=i/s,m=d*v,g=d,y=s*(p/d)*(m/i),o=this._calculateCoordOrigin(n.slice(1,4).toLowerCase(),y,m),o+=f,u=c),this._node.style.width=i+"px",this._node.style.height=s+"px",this._node.coordOrigin=o+", "+u):(m=p,g=d,this._node.style.width=p+"px",this._node.style.height=d+"px",this._state.width=p,this._state.height=d),this._node.coordSize=m+", "+g):(this._node.style.width=i+"px",this._node.style.height=s+"px",this._node.coordSize=i+", "+s),this._frag&&(this._node.appendChild(this._frag),this._frag=null),w&&(this._node.style.visibility="visible")},_calculateCoordOrigin:function(e,t,n){var r;switch(e){case"min":r=0;break;case"mid":r=(t-n)/2;break;case"max":r=t-n}return r},_getUpdatedContentBounds:function(){var e,t,n,r=this._shapes,i={};for(t in r)r.hasOwnProperty(t)&&(n=r[t],e=n.getBounds(),i.left=o.isNumber(i.left)?Math.min(i.left,e.left):e.left,i.top=o.isNumber(i.top)?Math.min(i.top,e.top):e.top,i.right=o.isNumber(i.right)?Math.max(i.right,e.right):e.right,i.bottom=o.isNumber(i.bottom)?Math.max(i.bottom,e.bottom):e.bottom);return i.left=o.isNumber(i.left)?i.left:0,i.top=o.isNumber(i.top)?i.top:0,i.right=o.isNumber(i.right)?i.right:0,i.bottom=o.isNumber(i.bottom)?i.bottom:0,this._contentBounds=i,i},_toFront:function(t){var n=this._node;t instanceof e.VMLShape&&(t=t.get("node")),n&&t&&n.appendChild(t)},_toBack:function(t){var n=this._node,r;t instanceof e.VMLShape&&(t=t.get("node")),n&&t&&(r=n.firstChild,r?n.insertBefore(t,r):n.appendChild(t))}}),e.VMLGraphic=y},"3.14.0",{requires:["graphics"]});
