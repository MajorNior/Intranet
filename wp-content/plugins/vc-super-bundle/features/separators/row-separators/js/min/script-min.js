!function(){var t=function(){var t=navigator.userAgent,e=t.indexOf("MSIE ");if(e>0)return parseInt(t.substring(e+5,t.indexOf(".",e)),10);var a=t.indexOf("Trident/");if(a>0){var i=t.indexOf("rv:");return parseInt(t.substring(i+3,t.indexOf(".",i)),10)}return!1},e=function(t){var e=t.parentNode;if(e.classList)for(;!e.classList.contains("vc_row")&&!e.classList.contains("wpb_row");){if("HTML"===e.tagName){e=!1;break}e=e.parentNode}if(e!==!1)return e;e=t.parentNode;for(var a=!1;!a;){if(Array.prototype.forEach.call(e.classList,function(t){if(!a)return t.match(/row/g)?void(a=!0):void 0}),a)return e;if("HTML"===e.tagName)break;e=e.parentNode}return t.parentNode},a=function(t){var e=t.parentNode;if(e.classList)for(;!e.classList.contains("vc_column_container")&&!e.classList.contains("wpb_column");){if("HTML"===e.tagName){e=!1;break}e=e.parentNode}if(e!==!1)return e;e=t.parentNode;for(var a=!1;!a;){if(Array.prototype.forEach.call(e.classList,function(t){if(!a)return t.match(/column/g)?void(a=!0):void 0}),a)return e;if("HTML"===e.tagName)break;e=e.parentNode}return t.parentNode};window.gambitLoadRowSeparators=function(){var i;if(!document.querySelector("body").classList.contains("vc_editor")){i=document.querySelectorAll(".gambit_separator"),Array.prototype.forEach.call(i,function(i){if(t()&&t()<10)return void i.parentNode.removeChild(i);var s=a(i);s.classList.contains("vc_hidden-xs")&&i.classList.add("vc_hidden-xs"),s.classList.contains("vc_hidden-sm")&&i.classList.add("vc_hidden-sm"),s.classList.contains("vc_hidden-md")&&i.classList.add("vc_hidden-md"),s.classList.contains("vc_hidden-lg")&&i.classList.add("vc_hidden-lg");var r=e(i),n=i.getAttribute("class").indexOf("gambit_sep_top")!==-1;r.appendChild(i),r.classList.add("gambit_sep_parent"),r.classList.add(n?"gambit_sep_parent_top":"gambit_sep_parent_bottom"),r.style[n?"marginTop":"marginBottom"]=0;var o=i.querySelectorAll(".gambit_sep_main");Array.prototype.forEach.call(o,function(t){var e=t.parentNode.getAttribute("data-bg-color");if(e?fill=e:fill=getComputedStyle(r).backgroundColor,"rgba(0, 0, 0, 0)"===fill||"transparent"===fill)fill="#fff";else{var a=fill.match(/rgba\(\s?\d+\s?,\s?\d+\s?,\s?\d+\s?,\s?(\d+)\s?\)/);a&&(a=parseFloat(a[1]),0===a&&(fill="#fff"))}t.style.fill=fill});var l,d,c=n?r.previousElementSibling:r.nextElementSibling,p=n?"padding-bottom":"padding-top",f=parseInt(i.getAttribute("data-height"),10)||200,m=parseInt(r.offsetWidth,10)/1600,u=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth,g=u-parseInt(r.offsetWidth,10);l=g<100?f:f*m,c&&c.classList&&c.classList.contains("vc_row-full-width")&&(c=n?c.previousElementSibling:c.nextElementSibling),c&&(d=parseInt(getComputedStyle(c)[p],10)||0,c.style.cssText=p+": calc("+l+" / 1600 * 100vw + "+d+"px) !important;"+c.style.cssText,c.style[n?"marginBottom":"marginTop"]=0),i.setAttribute("class",i.getAttribute("class")+" gambit_sep_loaded"),i.style.display="block";var b=i.getAttribute("style");b=b.replace(/(display:\s?block)(\s*!\s?important)?(\s*[;"']?)/g,"$1 !important$3"),i.setAttribute("style",b);var v="display:block";t()&&t()<=11&&(v="display:block; overflow-y:hidden;"),i.style.cssText=v}),i=document.querySelectorAll(".gambit_sep_parent_bottom");var s=i.length+3;Array.prototype.forEach.call(i,function(t,e){t.style.cssText="z-index: "+(s-e)+" !important;"+t.style.cssText})}},"loading"!==document.readyState?window.gambitLoadRowSeparators():document.addEventListener("DOMContentLoaded",window.gambitLoadRowSeparators)}();