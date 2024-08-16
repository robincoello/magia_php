/* SCEditor v3.2.0 | (C) 2017, Sam Clarke | sceditor.com/license */
!function(t){"use strict"; var f = t.escapeEntities, o = t.escapeUriScheme, p = t.dom, e = t.utils, d = p.css, g = p.attr, b = p.is, n = e.extend, s = e.each, y = "data-sceditor-emoticon", l = t.command.get, v = {always:1, never:2, auto:3}, r = {bold:{txtExec:["[b]", "[/b]"]}, italic:{txtExec:["[i]", "[/i]"]}, underline:{txtExec:["[u]", "[/u]"]}, strike:{txtExec:["[s]", "[/s]"]}, subscript:{txtExec:["[sub]", "[/sub]"]}, superscript:{txtExec:["[sup]", "[/sup]"]}, left:{txtExec:["[left]", "[/left]"]}, center:{txtExec:["[center]", "[/center]"]}, right:{txtExec:["[right]", "[/right]"]}, justify:{txtExec:["[justify]", "[/justify]"]}, font:{txtExec:function(t){var e = this; l("font")._dropDown(e, t, function(t){e.insertText("[font=" + t + "]", "[/font]")})}}, size:{txtExec:function(t){var e = this; l("size")._dropDown(e, t, function(t){e.insertText("[size=" + t + "]", "[/size]")})}}, color:{txtExec:function(t){var e = this; l("color")._dropDown(e, t, function(t){e.insertText("[color=" + t + "]", "[/color]")})}}, bulletlist:{txtExec:function(t, e){this.insertText("[ul]\n[li]" + e.split(/\r?\n/).join("[/li]\n[li]") + "[/li]\n[/ul]")}}, orderedlist:{txtExec:function(t, e){this.insertText("[ol]\n[li]" + e.split(/\r?\n/).join("[/li]\n[li]") + "[/li]\n[/ol]")}}, table:{txtExec:["[table][tr][td]", "[/td][/tr][/table]"]}, horizontalrule:{txtExec:["[hr]"]}, code:{txtExec:["[code]", "[/code]"]}, image:{txtExec:function(t, e){var i = this; l("image")._dropDown(i, t, e, function(t, e, n){var r = ""; e && (r += " width=" + e), n && (r += " height=" + n), i.insertText("[img" + r + "]" + t + "[/img]")})}}, email:{txtExec:function(t, n){var r = this; l("email")._dropDown(r, t, function(t, e){r.insertText("[email=" + t + "]" + (e || n || t) + "[/email]")})}}, link:{txtExec:function(t, n){var r = this; l("link")._dropDown(r, t, function(t, e){r.insertText("[url=" + t + "]" + (e || n || t) + "[/url]")})}}, quote:{txtExec:["[quote]", "[/quote]"]}, youtube:{txtExec:function(t){var e = this; l("youtube")._dropDown(e, t, function(t){e.insertText("[youtube]" + t + "[/youtube]")})}}, rtl:{txtExec:["[rtl]", "[/rtl]"]}, ltr:{txtExec:["[ltr]", "[/ltr]"]}}, x = {b:{tags:{b:null, strong:null}, styles:{"font-weight":["bold", "bolder", "401", "700", "800", "900"]}, format:"[b]{0}[/b]", html:"<strong>{0}</strong>"}, i:{tags:{i:null, em:null}, styles:{"font-style":["italic", "oblique"]}, format:"[i]{0}[/i]", html:"<em>{0}</em>"}, u:{tags:{u:null}, styles:{"text-decoration":["underline"]}, format:"[u]{0}[/u]", html:"<u>{0}</u>"}, s:{tags:{s:null, strike:null}, styles:{"text-decoration":["line-through"]}, format:"[s]{0}[/s]", html:"<s>{0}</s>"}, sub:{tags:{sub:null}, format:"[sub]{0}[/sub]", html:"<sub>{0}</sub>"}, sup:{tags:{sup:null}, format:"[sup]{0}[/sup]", html:"<sup>{0}</sup>"}, font:{tags:{font:{face:null}}, styles:{"font-family":null}, quoteType:v.never, format:function(t, e){var n; return"[font=" + a(n = b(t, "font") && (n = g(t, "face"))?n:d(t, "font-family")) + "]" + e + "[/font]"}, html:'<font face="{defaultattr}">{0}</font>'}, size:{tags:{font:{size:null}}, styles:{"font-size":null}, format:function(t, e){var n = g(t, "size"), r = 2; return - 1 < (n = n || d(t, "fontSize")).indexOf("px")?((n = + n.replace("px", "")) < 12 && (r = 1), 15 < n && (r = 3), 17 < n && (r = 4), 23 < n && (r = 5), 31 < n && (r = 6), 47 < n && (r = 7)):r = n, "[size=" + r + "]" + e + "[/size]"}, html:'<font size="{defaultattr}">{!0}</font>'}, color:{tags:{font:{color:null}}, styles:{color:null}, quoteType:v.never, format:function(t, e){var n; return"[color=" + c(n = b(t, "font") && (n = g(t, "color"))?n:t.style.color || d(t, "color")) + "]" + e + "[/color]"}, html:function(t, e, n){return'<font color="' + f(c(e.defaultattr), !0) + '">' + n + "</font>"}}, ul:{tags:{ul:null}, breakStart:!0, isInline:!1, skipLastLineBreak:!0, format:"[ul]{0}[/ul]", html:"<ul>{0}</ul>"}, list:{breakStart:!0, isInline:!1, skipLastLineBreak:!0, html:"<ul>{0}</ul>"}, ol:{tags:{ol:null}, breakStart:!0, isInline:!1, skipLastLineBreak:!0, format:"[ol]{0}[/ol]", html:"<ol>{0}</ol>"}, li:{tags:{li:null}, isInline:!1, closedBy:["/ul", "/ol", "/list", "*", "li"], format:"[li]{0}[/li]", html:"<li>{0}</li>"}, "*":{isInline:!1, closedBy:["/ul", "/ol", "/list", "*", "li"], html:"<li>{0}</li>"}, table:{tags:{table:null}, isInline:!1, isHtmlInline:!0, skipLastLineBreak:!0, format:"[table]{0}[/table]", html:"<table>{0}</table>"}, tr:{tags:{tr:null}, isInline:!1, skipLastLineBreak:!0, format:"[tr]{0}[/tr]", html:"<tr>{0}</tr>"}, th:{tags:{th:null}, allowsEmpty:!0, isInline:!1, format:"[th]{0}[/th]", html:"<th>{0}</th>"}, td:{tags:{td:null}, allowsEmpty:!0, isInline:!1, format:"[td]{0}[/td]", html:"<td>{0}</td>"}, emoticon:{allowsEmpty:!0, tags:{img:{src:null, "data-sceditor-emoticon":null}}, format:function(t, e){return g(t, y) + e}, html:"{0}"}, hr:{tags:{hr:null}, allowsEmpty:!0, isSelfClosing:!0, isInline:!1, format:"[hr]{0}", html:"<hr />"}, img:{allowsEmpty:!0, tags:{img:{src:null}}, allowedChildren:["#"], quoteType:v.never, format:function(e, t){function n(t){return e.style?e.style[t]:null}var r, i = ""; return g(e, y)?t:(t = g(e, "width") || n("width"), r = g(e, "height") || n("height"), "[img" + (i = e.complete && (t || r) || t && r?"=" + p.width(e) + "x" + p.height(e):i) + "]" + g(e, "src") + "[/img]")}, html:function(t, e, n){var r = "", i = e.width, l = e.height; return e.defaultattr && (i = (e = e.defaultattr.split(/x/i))[0], l = 2 === e.length?e[1]:e[0]), void 0 !== i && (r += ' width="' + f(i, !0) + '"'), void 0 !== l && (r += ' height="' + f(l, !0) + '"'), "<img" + r + ' src="' + o(n) + '" />'}}, url:{allowsEmpty:!0, tags:{a:{href:null}}, quoteType:v.never, format:function(t, e){t = g(t, "href"); return"mailto:" === t.substr(0, 7)?'[email="' + t.substr(7) + '"]' + e + "[/email]":"[url=" + t + "]" + e + "[/url]"}, html:function(t, e, n){return e.defaultattr = f(e.defaultattr, !0) || n, '<a href="' + o(e.defaultattr) + '">' + n + "</a>"}}, email:{quoteType:v.never, html:function(t, e, n){return'<a href="mailto:' + (f(e.defaultattr, !0) || n) + '">' + n + "</a>"}}, quote:{tags:{blockquote:null}, isInline:!1, quoteType:v.never, format:function(t, e){for (var n, r = "data-author", i = "", l = t.children, o = 0; !n && o < l.length; o++)b(l[o], "cite") && (n = l[o]); return(n || g(t, r)) && (i = n && n.textContent || g(t, r), g(t, r, i), n && t.removeChild(n), e = this.elementToBbcode(t), i = "=" + i.replace(/(^\s+|\s+$)/g, ""), n && t.insertBefore(n, t.firstChild)), "[quote" + i + "]" + e + "[/quote]"}, html:function(t, e, n){return"<blockquote>" + (n = e.defaultattr?"<cite>" + f(e.defaultattr) + "</cite>" + n:n) + "</blockquote>"}}, code:{tags:{code:null}, isInline:!1, allowedChildren:["#", "#newline"], format:"[code]{0}[/code]", html:"<code>{0}</code>"}, left:{styles:{"text-align":["left", "-webkit-left", "-moz-left", "-khtml-left"]}, isInline:!1, allowsEmpty:!0, format:"[left]{0}[/left]", html:'<div align="left">{0}</div>'}, center:{styles:{"text-align":["center", "-webkit-center", "-moz-center", "-khtml-center"]}, isInline:!1, allowsEmpty:!0, format:"[center]{0}[/center]", html:'<div align="center">{0}</div>'}, right:{styles:{"text-align":["right", "-webkit-right", "-moz-right", "-khtml-right"]}, isInline:!1, allowsEmpty:!0, format:"[right]{0}[/right]", html:'<div align="right">{0}</div>'}, justify:{styles:{"text-align":["justify", "-webkit-justify", "-moz-justify", "-khtml-justify"]}, isInline:!1, allowsEmpty:!0, format:"[justify]{0}[/justify]", html:'<div align="justify">{0}</div>'}, youtube:{allowsEmpty:!0, tags:{iframe:{"data-youtube-id":null}}, format:function(t, e){return(t = g(t, "data-youtube-id"))?"[youtube]" + t + "[/youtube]":e}, html:'<iframe width="560" height="315" frameborder="0" src="https://www.youtube-nocookie.com/embed/{0}?wmode=opaque" data-youtube-id="{0}" allowfullscreen></iframe>'}, rtl:{styles:{direction:["rtl"]}, isInline:!1, format:"[rtl]{0}[/rtl]", html:'<div style="direction: rtl">{0}</div>'}, ltr:{styles:{direction:["ltr"]}, isInline:!1, format:"[ltr]{0}[/ltr]", html:'<div style="direction: ltr">{0}</div>'}, ignore:{}}; function k(t, r){return t.replace(/\{([^}]+)\}/g, function(t, e){var n = !0; return"!" === e.charAt(0) && (n = !1, e = e.substring(1)), "0" === e && (n = !1), void 0 === r[e]?t:n?f(r[e], !0):r[e]})}function w(t){return"function" == typeof t}function a(t){return t && t.replace(/\\(.)/g, "$1").replace(/^(["'])(.*?)\1$/, "$2")}var E = "open", B = "content", I = "newline", C = "close"; function u(t, e, n, r, i, l){var o = this; o.type = t, o.name = e, o.val = n, o.attrs = r || {}, o.children = i || [], o.closing = l || null}function T(t){var m = this; function o(t, e){var n, r, i; return t === E && (n = e.match(/\[([^\]\s=]+)(?:([^\]]+))?\]/)) && (i = l(n[1]), n[2] && (n[2] = n[2].trim()) && (r = function(t){var e, n = /([^\s=]+)=(?:(?:(["'])((?:\\\2|[^\2])*?)\2)|((?:.(?!\s\S+=))*.))/g, r = {}; if ("=" === t.charAt(0) && t.indexOf("=", 1) < 0)r.defaultattr = a(t.substr(1)); else for ("=" === t.charAt(0) && (t = "defaultattr" + t); e = n.exec(t); )r[l(e[1])] = a(e[3]) || e[4]; return r}(n[2]))), t === C && (n = e.match(/\[\/([^\[\]]+)\]/)) && (i = l(n[1])), (i = t === I?"#newline":i) && (t !== E && t !== C || x[i]) || (t = B, i = "#"), new u(t, i, e, r)}function d(t, e, n){for (var r = n.length; r--; )if (n[r].type === e && n[r].name === t)return 1}function h(t, e){t = (t?x[t.name]:{}).allowedChildren; return!m.opts.fixInvalidChildren || !t || - 1 < t.indexOf(e.name || "#")}function c(t, e){for (var n, r, i, l, o, a, s = "", u = function(t){return!1 !== (!t || (void 0 !== t.isHtmlInline?t.isHtmlInline:t.isInline))}; 0 < t.length; )if (n = t.shift()){if (n.type === E)a = n.children[n.children.length - 1] || {}, r = x[n.name], l = e && u(r), i = c(n.children, !1), a = r && r.html?(u(r) || !u(x[a.name]) || r.isPreFormatted || r.skipLastLineBreak || (i += "<br />"), w(r.html)?r.html.call(m, n, n.attrs, i):(n.attrs[0] = i, k(r.html, n.attrs))):n.val + i + (n.closing?n.closing.val:""); else{if (n.type === I){if (!e){s += "<br />"; continue}o || (s += "<div>"), s += "<br />", t.length || (s += "<br />"), s += "</div>\n", o = !1; continue}l = e, a = f(n.val, !0)}l && !o?(s += "<div>", o = !0):!l && o && (s += "</div>\n", o = !1), s += a}return o && (s += "</div>\n"), s}function p(t, e, n){var r = /\s|=/.test(t); return w(e)?e(t, n):e === v.never || e === v.auto && !r?t:'"' + t.replace(/\\/g, "\\\\").replace(/"/g, '\\"') + '"'}function g(t){return t.length?t[t.length - 1]:null}function l(t){return t.toLowerCase()}m.opts = n({}, T.defaults, t), m.tokenize = function(t){var e, n, r, i = [], l = [{type:B, regex:/^([^\[\r\n]+|\[)/}, {type:I, regex:/^(\r\n|\r|\n)/}, {type:E, regex:/^\[[^\[\]]+\]/}, {type:C, regex:/^\[\/[^\[\]]+\]/}]; t:for (; t.length; ){for (r = l.length; r--; )if (n = l[r].type, (e = t.match(l[r].regex)) && e[0]){i.push(o(n, e[0])), t = t.substr(e[0].length); continue t}t.length && i.push(o(B, t)), t = ""}return i}, m.parse = function(t, e){var t = function(t){function e(){return g(f)}function n(t){(e()?e().children:c).push(t)}function r(t){return e() && (l = x[e().name]) && l.closedBy && - 1 < l.closedBy.indexOf(t)}var i, l, o, a, s, u = [], c = [], f = []; for (; i = t.shift(); )switch (s = t[0], h(e(), i) || i.type === C && e() && i.name === e().name || (i.name = "#", i.type = B), i.type){case E:r(i.name) && f.pop(), n(i), (l = x[i.name]) && !l.isSelfClosing && (l.closedBy || d(i.name, C, t))?f.push(i):l && l.isSelfClosing || (i.type = B); break; case C:if (e() && i.name !== e().name && r("/" + i.name) && f.pop(), e() && i.name === e().name)e().closing = i, f.pop(); else if (d(i.name, E, f)){for (; o = f.pop(); ){if (o.name === i.name){o.closing = i; break}o = o.clone(), u.length && o.children.push(g(u)), u.push(o)}for (s && s.type === I && (l = x[i.name]) && !1 === l.isInline && (n(s), t.shift()), n(g(u)), a = u.length; a--; )f.push(u[a]); u.length = 0} else i.type = B, n(i); break; case I:e() && s && r((s.type === C?"/":"") + s.name) && (s.type === C && s.name === e().name || ((l = x[e().name]) && l.breakAfter || l && !1 === l.isInline && m.opts.breakAfterBlock && !1 !== l.breakAfter) && f.pop()), n(i); break; default:n(i)}return c}(m.tokenize(t)), n = m.opts; return n.fixInvalidNesting && function t(e, n, r, i){var l, o, a, s; var u = function(t){t = x[t.name]; return!t || !1 !== t.isInline}; n = n || []; i = i || e; for (o = 0; o < e.length; o++)if ((l = e[o]) && l.type === E){var c, f; if (r && !u(l))if (f = g(n), s = f.splitAt(l), a = 1 < n.length?n[n.length - 2].children:i, h(l, f) && ((c = f.clone()).children = l.children, l.children = [c]), - 1 < (c = a.indexOf(f)))return s.children.splice(0, 1), a.splice(c + 1, 0, l, s), void((f = s.children[0]) && f.type === I && !u(l) && (s.children.splice(0, 1), a.splice(c + 2, 0, f))); n.push(l), t(l.children, n, r || u(l), i), n.pop()}}(t), function t(e, n, r){var i, l, o, a, s, u, c, f; var d = e.length; n && (a = x[n.name]); var h = d; for (; h--; )(i = e[h]) && (i.type === I?(l = 0 < h?e[h - 1]:null, o = h < d - 1?e[h + 1]:null, f = !1, !r && a && !0 !== a.isSelfClosing && (l?u || o || (!1 === a.isInline && m.opts.breakEndBlock && !1 !== a.breakEnd && (f = !0), a.breakEnd && (f = !0), u = f):(!1 === a.isInline && m.opts.breakStartBlock && !1 !== a.breakStart && (f = !0), a.breakStart && (f = !0))), l && l.type === E && (s = x[l.name]) && (r?!1 === s.isInline && (f = !0):(!1 === s.isInline && m.opts.breakAfterBlock && !1 !== s.breakAfter && (f = !0), s.breakAfter && (f = !0))), !r && !c && o && o.type === E && (s = x[o.name]) && (!1 === s.isInline && m.opts.breakBeforeBlock && !1 !== s.breakBefore && (f = !0), s.breakBefore && (f = !0), c = f)?e.splice(h, 1):(f && e.splice(h, 1), c = !1)):i.type === E && t(i.children, i, r))}(t, null, e), n.removeEmptyTags && function t(e){var n, r; var i = function(t){for (var e = t.length; e--; ){var n = t[e].type; if (n === E || n === C)return!1; if (n === B && /\S|\u00A0/.test(t[e].val))return!1}return!0}; var l = e.length; for (; l--; )(n = e[l]) && n.type === E && (r = x[n.name], t(n.children), i(n.children) && r && !r.isSelfClosing && !r.allowsEmpty && e.splice.apply(e, [l, 1].concat(n.children)))}(t), t}, m.toHTML = function(t, e){return c(m.parse(t, e), !0)}, m.toHTMLFragment = function(t, e){return c(m.parse(t, e), !1)}, m.toBBCode = function(t, e){return function t(e){var n, r, i, l, o, a, s, u, c, f = ""; for (; 0 < e.length; )if (n = e.shift())if (i = x[n.name], c = !(!i || !1 !== i.isInline), l = i && i.isSelfClosing, a = c && m.opts.breakBeforeBlock && !1 !== i.breakBefore || i && i.breakBefore, s = c && !l && m.opts.breakStartBlock && !1 !== i.breakStart || i && i.breakStart, u = c && m.opts.breakEndBlock && !1 !== i.breakEnd || i && i.breakEnd, c = c && m.opts.breakAfterBlock && !1 !== i.breakAfter || i && i.breakAfter, o = (i?i.quoteType:null) || m.opts.quoteType || v.auto, i || n.type !== E)if (n.type === E){if (a && (f += "\n"), f += "[" + n.name, n.attrs)for (r in n.attrs.defaultattr && (f += "=" + p(n.attrs.defaultattr, o, "defaultattr"), delete n.attrs.defaultattr), n.attrs)n.attrs.hasOwnProperty(r) && (f += " " + r + "=" + p(n.attrs[r], o, r)); f += "]", s && (f += "\n"), n.children && (f += t(n.children)), l || i.excludeClosing || (u && (f += "\n"), f += "[/" + n.name + "]"), c && (f += "\n"), n.closing && l && (f += n.closing.val)} else f += n.val; else f += n.val, n.children && (f += t(n.children)), n.closing && (f += n.closing.val); return f}(m.parse(t, e))}}function i(t){return t = parseInt(t, 10), isNaN(t)?"00":(t = Math.max(0, Math.min(t, 255)).toString(16)).length < 2?"0" + t:t}function c(t){var e; return(e = (t = t || "#000").match(/rgb\((\d{1,3}),\s*?(\d{1,3}),\s*?(\d{1,3})\)/i))?"#" + i(e[1]) + i(e[2]) + i(e[3]):(e = t.match(/#([0-9a-f])([0-9a-f])([0-9a-f])\s*?$/i))?"#" + e[1] + e[1] + e[2] + e[2] + e[3] + e[3]:t}function h(){var u = this, i = (u.stripQuotes = a, {}), h = {ul:["li", "ol", "ul"], ol:["li", "ol", "ul"], table:["tr"], tr:["td", "th"], code:["br", "p", "div"]}; function m(l, o, e){function a(t){var e = t[0], t = t[1], n = p.getStyle(l, e), r = l.parentNode; return!(!n || r && p.hasStyle(r, e, n)) && (!t || t.includes(n))}function t(t){i[t] && i[t][e] && s(i[t][e], function(t, e){var n, r = x[t].strictMatch, i = (r = void 0 === r?u.opts.strictMatch:r)?"every":"some"; if (!e || e[i]((n = r, function(t){var e = t[0], t = t[1]; return("style" !== e || "CODE" !== l.nodeName) && ("style" === e && t?t[n?"every":"some"](a):(e = g(l, e)) && (!t || t.includes(e)))})))return e = x[t].format, o = w(e)?e.call(u, l, o):function(t){var n = arguments; return t.replace(/\{(\d+)\}/g, function(t, e){return void 0 !== n[ + e + 1]?n[ + e + 1]:"{" + e + "}"})}(e, o), !1})}return t("*"), t(l.nodeName.toLowerCase()), o}function c(t, e){function d(t, u, c){var f = ""; return p.traverse(t, function(t){var e = "", n = t.nodeType, r = t.nodeName.toLowerCase(), i = "code" === r, l = "img" === r && !!g(t, y), o = h[r], a = t.firstChild, s = !0; c && (s = - 1 < c.indexOf(r), (s = l?!0:s) || (o = c)), 1 === n?b(t, ".sceditor-nlf") && !a || ("iframe" !== r && (e = d(t, u || i, o)), s?(u && !l || (i || (e = m(t, e, !1)), e = m(t, e, !0)), f += function(t, e){var n = t.nodeName.toLowerCase(), r = p.isInline; if (!r(t, !0) || "br" === n){for (var i, l, o = t.previousSibling; o && 1 === o.nodeType && !b(o, "br") && r(o, !0) && !o.firstChild; )o = o.previousSibling; for (; i = ((l = t.parentNode) && l.lastChild) === t, (t = l) && i && r(l, !0); ); i && "li" !== n || (e += "\n"), "br" !== n && o && !b(o, "br") && r(o, !0) && (e = "\n" + e)}return e}(t, e)):f += e):3 === n && (f += t.nodeValue)}, !1, !0), f}return d(t, e)}function t(t, e, n){var r = new T(u.opts.parserOptions); return(t || n?r.toHTMLFragment:r.toHTML)(u.opts.bbcodeTrim?e.trim():e)}function e(t, e, n, r){n = n || document; var i, l = !!p.closest(r, "code"), o = n.createElement("div"), a = n.createElement("div"), s = new T(u.opts.parserOptions); for (a.innerHTML = e, d(o, "visibility", "hidden"), o.appendChild(a), n.body.appendChild(o), t && (o.insertBefore(n.createTextNode("#"), o.firstChild), o.appendChild(n.createTextNode("#"))), r && d(a, "whiteSpace", d(r, "whiteSpace")), i = a.getElementsByClassName("sceditor-ignore"); i.length; )i[0].parentNode.removeChild(i[0]); return p.removeWhiteSpace(o), e = c(a, l), n.body.removeChild(o), e = s.toBBCode(e, !0), e = u.opts.bbcodeTrim?e.trim():e}u.init = function(){u.opts = this.opts, u.elementToBbcode = c, s(x, function(n, t){var r = !1 === t.isInline, t = x[n].tags, e = x[n].styles; e && (i["*"] = i["*"] || {}, i["*"][r] = i["*"][r] || {}, i["*"][r][n] = [["style", Object.entries(e)]]), t && s(t, function(t, e){e && e.style && (e.style = Object.entries(e.style)), i[t] = i[t] || {}, i[t][r] = i[t][r] || {}, i[t][r][n] = e && Object.entries(e)})}), this.commands = n(!0, {}, r, this.commands), this.toBBCode = u.toSource, this.fromBBCode = u.toHtml}, u.toHtml = t.bind(null, !1), u.fragmentToHtml = t.bind(null, !0), u.toSource = e.bind(null, !1), u.fragmentToSource = e.bind(null, !0)}u.prototype = {clone:function(){var t = this; return new u(t.type, t.name, t.val, n({}, t.attrs), [], t.closing?t.closing.clone():null)}, splitAt:function(t){var e, n = this.clone(), t = this.children.indexOf(t); return - 1 < t && (e = this.children.length - t, n.children = this.children.splice(t, e)), n}}, T.QuoteType = v, T.defaults = {breakBeforeBlock:!1, breakStartBlock:!1, breakEndBlock:!1, breakAfterBlock:!0, removeEmptyTags:!0, fixInvalidNesting:!0, fixInvalidChildren:!0, quoteType:v.auto, strictMatch:!1}, h.get = function(t){return x[t] || null}, h.set = function(t, e){return t && e && ((e = n(x[t] || {}, e)).remove = function(){delete x[t]}, x[t] = e), this}, h.rename = function(t, e){return t in x && (x[e] = x[t], delete x[t]), this}, h.remove = function(t){return t in x && delete x[t], this}, h.formatBBCodeString = k, t.formats.bbcode = h, t.BBCodeParser = T}(sceditor);