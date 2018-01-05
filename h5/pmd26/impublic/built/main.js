!
function(t) {
    function n(i) {
        if (e[i]) return e[i].exports;
        var r = e[i] = {
            exports: {},
            id: i,
            loaded: !1,
			
        };
		
        return t[i].call(r.exports, r, r.exports, n),
        r.loaded = !0,
        r.exports
    }
    var e = {};
    return n.m = t,
    n.c = e,
    n.p = "./impublic/built/",
    n(0)
} ([function(t, n, e) { (function(t, n) {
        e(3),
        e(1),
        e(2),
        e(7),
        e(6);
		
        var i = e(4),
		
        r = 16748073,
        a = t.extend({},
		
        t.Events, {
            init: function() {
                var t = this;
                this.bgm = $("#bgm")[0],
                this.$body = $("body"),
                this.$main = $("#main"),
                n.set(this.$main, {
                    transformOrigin: "0px 0px"
                }),
                this.pos0 = {
                    x: -257,
                    y: 0,
                    z: 410
                },
                this.scene = new THREE.Scene,
                this.scene.fog = new THREE.Fog(r, 350, 900),
                this.camera = new THREE.PerspectiveCamera(90, window.innerWidth / window.innerHeight, 1, 5e3),
                this.camera.position.set(this.pos0.x, this.pos0.y, this.pos0.z),
                this.scene.add(this.camera);
                var a = new THREE.AmbientLight(16777215, 1);
                this.scene.add(a),
                this.renderer = new THREE.WebGLRenderer({
                    antialias: !0
                }),
                this.renderer.setClearColor(r),
                this.renderer.setPixelRatio(window.devicePixelRatio),
                this.renderer.setSize(window.innerWidth, window.innerHeight),
                $("#three").append(this.renderer.domElement),
                $(window).on("resize",
                function() {
                    t.resize()
                }).on("touchmove",
                function() {
                    return ! 1
                }),
                this.resize(),
                setTimeout(function() {
                    t.resize()
                },
                500);
                var o = new THREE.Mesh(new THREE.PlaneGeometry(512, 819), new THREE.MeshPhongMaterial({
                    map: (new THREE.TextureLoader).load(e(8)),
                    fog: !1
                }));
                o.scale.set(7, 7, 1),
                o.position.set(0, 0, -2e3),
                this.scene.add(o),
                this.book = new i(512, 819),
                this.scene.add(this.book.el),
                this.drag0 = {
                    x: 0,
                    y: 0
                },
                this.drag = {
                    x: 0,
                    y: 0
                };
                var s = new Gesturer({
                    el: this.$body[0]
                });
				 
                s.onTouchStart = function(e) {
                    t.isVinish || (t.isVinish = !0),
                    t.drag0.x = e.touches[0].pageX
					
                },
                s.onTouchMove = function(n) {
					
                    t.drag.x = Math.max( - .02, Math.min(.02, 3e-4 * (n.touches[0].pageX - t.drag0.x))),
                    t.book.el.rotation.y < .1 && t.drag.x < 0 && (t.drag.x = 0),
                    t.book.el.rotation.y > t.book.angleMax - .08 && t.drag.x > 0 && (t.drag.x = 0)
					
					
                },
                s.onTouchEnd = function(n) {
                    t.drag.x = Math.max( - .02, Math.min(.02, 3e-4 * (n.changedTouches[0].pageX - t.drag0.x))),
                    t.book.el.rotation.y < .1 && t.drag.x < 0 && (t.drag.x = 0),
                    t.book.el.rotation.y > t.book.angleMax - .08 && t.drag.x > 0 && (t.drag.x = 0)
                },
                this.animate = this.animate.bind(this),
                this.animate(),
                this.book.on("preloadProgress",
                function(t) {
                    $("#preload .n1").html(Math.floor(t / 100)),
                    $("#preload .n2").html(Math.floor(t / 10) >= 10 ? 0 : Math.floor(t / 10)),
                    $("#preload .n3").html(t % 10),
                    n.set(".box1", {
                        marginTop: -30 - t / 2
                    }),
                    n.set(".cat", {
                        marginTop: 20 - t / 2
                    })
                }),
                this.book.on("preloadComplete",
                function() {
                    n.to("#preload", 1, {
                        opacity: 0,
                        onEnd: function() {
                            this.target.style.display = "none"
                        }
                    }),
                    n.to(".group", 1, {
                        rotation: 90,
                        scale: 8,
                        ease: n.Quad.InOut
                    })
                    //t.playBgm()
                     
                }),
                 
                this.isEnd = !1,
                this.isVinish = !0,
                this.isActive = !1,
                n.from(this.book.el.rotation, 5, {
                    y: 20,
                    ease: n.Quad.InOut,
                    onEnd: function() {
                        t.isActive = !0,
                        t.isVinish = !1,
                        n.to("#tip", .3, {
                            opacity: 1,
							
							
                        }),
						$("#as").val("1"),
                        s.on()
                    }
                })
            },
            resize: function() {
                var t = Math.min(window.innerWidth / 640, window.innerHeight / 1004),
                e = Math.floor(window.innerWidth / t),
                i = Math.floor(window.innerHeight / t);
                n.set(this.$main, {
                    scale: t,
                    width: e,
                    height: i
                }),
                this.camera.aspect = window.innerWidth / window.innerHeight,
                this.camera.updateProjectionMatrix(),
                this.renderer.setSize(window.innerWidth, window.innerHeight),
                window.innerWidth > window.innerHeight ? $("#tip2").css({
                    display: "block"
                }) : $("#tip2").css({
                    display: "none"
                })
            },
            animate: function() {
				
				var cj = $("#go").val();
				if(cj==1)
				{
					if(this.drag.x>0.015)
					{
						 $("#go").val('0');
						// this.drag.x = this.drag.x;
					}
					else
					{
						if(this.book.el.rotation.y>=33.69)
						{
							$("#go").val('0');
							this.drag.x = 0;
						}
						else
						{
							this.drag.x = 0.0021;
						}
					}
				}
				
                requestAnimationFrame(this.animate),
              this.isActive && (this.book.el.rotation.y < .1 && this.drag.x < 0 && (this.drag.x *= .8), this.book.el.rotation.y > this.book.angleMax - .08 && this.drag.x > 0 && (this.drag.x *= .8), this.book.el.rotation.y = this.drag.x + this.book.el.rotation.y),
                //console.log(this.book.el.rotation.y+'---'+this.drag.x),
				
                this.book.checkPlane(),
                this.renderer.render(this.scene, this.camera)
            },
            
             
        });
		//开始地方
        a.init()
    }).call(n, e(1), e(2))
},
function(t, n, e) {
    var i, r; (function(a) {
        /*!
	 * VERSION: 0.2.0
	 * DATE: 2015-03-31
	 * GIT:https://github.com/shrekshrek/bone
	 *
	 * @author: Shrek.wang, shrekshrek@gmail.com
	 **/
        !
        function(o) {
            var s = "object" == typeof self && self.self == self && self || "object" == typeof a && a.global == a && a;
            i = [e(3), n],
            r = function(t, n) {
                s.Bone = o(s, n, t)
            }.apply(n, i),
            !(void 0 !== r && (t.exports = r))
        } (function(t, n, e) {
            var i = t.Bone,
            r = [].slice;
            n.VERSION = "0.2.0",
            n.$ = e,
            n.noConflict = function() {
                return t.Bone = i,
                this
            };
            var a = function(t) {
                return "function" == typeof t || !1
            },
            o = function(t, n, e) {
                var i = null == t ? void 0 : t[n];
                return void 0 === i && (i = e),
                a(i) ? i.call(t) : i
            },
            s = function(t) {
                return Function.prototype.bind.apply(t, r.call(arguments, 1))
            };
            n.bind = s;
            var c = function(t) {
                var n = arguments.length;
                if (2 > n || null == t) return t;
                for (var e = 1; n > e; e++) for (var i = arguments[e], r = u(i), a = r.length, o = 0; a > o; o++) {
                    var s = r[o];
                    t[s] = i[s]
                }
                return t
            };
            n.extend = c;
            var u = function(t) {
                var n = [];
                for (var e in t) n.push(e);
                return n
            },
            h = function(t) {
                return null == t ? 0 : void 0 !== t.length ? t.length: u(t).length
            },
            l = function(t) {
                return null == t || (void 0 !== t.length ? 0 === t.length: 0 === u(t).length)
            },
            f = 0,
            p = function(t) {
                var n = ++f + "";
                return t ? t + n: n
            },
            g = n.Events = {},
            d = /\s+/,
            m = function(t, n, e, i, r) {
                var a, o = 0;
                if (e && "object" == typeof e) {
                    void 0 !== i && "context" in r && void 0 === r.context && (r.context = i);
                    for (a = u(e); o < a.length; o++) n = t(n, a[o], e[a[o]], r)
                } else if (e && d.test(e)) for (a = e.split(d); o < a.length; o++) n = t(n, a[o], i, r);
                else n = t(n, e, i, r);
                return n
            };
            g.on = function(t, n, e) {
                return b(this, t, n, e)
            };
            var b = function(t, n, e, i, r) {
                if (t._events = m(v, t._events || {},
                n, e, {
                    context: i,
                    ctx: t,
                    listening: r
                }), r) {
                    var a = t._listeners || (t._listeners = {});
                    a[r.id] = r
                }
                return t
            };
            g.listenTo = function(t, n, e) {
                if (!t) return this;
                var i = t._listenId || (t._listenId = p("l")),
                r = this._listeningTo || (this._listeningTo = {}),
                a = r[i];
                if (!a) {
                    var o = this._listenId || (this._listenId = p("l"));
                    a = r[i] = {
                        obj: t,
                        objId: i,
                        id: o,
                        listeningTo: r,
                        count: 0
                    }
                }
                return b(t, n, e, this, a),
                this
            };
            var v = function(t, n, e, i) {
                if (e) {
                    var r = t[n] || (t[n] = []),
                    a = i.context,
                    o = i.ctx,
                    s = i.listening;
                    s && s.count++,
                    r.push({
                        callback: e,
                        context: a,
                        ctx: a || o,
                        listening: s
                    })
                }
                return t
            };
            g.off = function(t, n, e) {
                return this._events ? (this._events = m(A, this._events, t, n, {
                    context: e,
                    listeners: this._listeners
                }), this) : this
            },
            g.stopListening = function(t, n, e) {
                var i = this._listeningTo;
                if (!i) return this;
                for (var r = t ? [t._listenId] : u(i), a = 0; a < r.length; a++) {
                    var o = i[r[a]];
                    if (!o) break;
                    o.obj.off(n, e, this)
                }
                return l(i) && (this._listeningTo = void 0),
                this
            };
            var A = function(t, n, e, i) {
                if (t) {
                    var r, a = 0,
                    o = i.context,
                    s = i.listeners;
                    if (n || e || o) {
                        for (var c = n ? [n] : u(t); a < c.length; a++) {
                            n = c[a];
                            var l = t[n];
                            if (!l) break;
                            for (var f = [], p = 0; p < l.length; p++) {
                                var g = l[p];
                                e && e !== g.callback && e !== g.callback._callback || o && o !== g.context ? f.push(g) : (r = g.listening, r && 0 === --r.count && (delete s[r.id], delete r.listeningTo[r.objId]))
                            }
                            f.length ? t[n] = f: delete t[n]
                        }
                        return h(t) ? t: void 0
                    }
                    for (var d = u(s); a < d.length; a++) r = s[d[a]],
                    delete s[r.id],
                    delete r.listeningTo[r.objId]
                }
            };
            g.once = function(t, n, e) {
                var i = m(E, {},
                t, n, s(this.off, this));
                return this.on(i, void 0, e)
            },
            g.listenToOnce = function(t, n, e) {
                var i = m(E, {},
                n, e, s(this.stopListening, this, t));
                return this.listenTo(t, i)
            };
            var E = function(t, n, e, i) {
                if (e) {
                    var r = t[n] = function() {
                        i(n, r),
                        e.apply(this, arguments)
                    };
                    r._callback = e
                }
                return t
            };
            g.trigger = function(t) {
                if (!this._events) return this;
                for (var n = Math.max(0, arguments.length - 1), e = Array(n), i = 0; n > i; i++) e[i] = arguments[i + 1];
                return m(y, this._events, t, void 0, e),
                this
            };
            var y = function(t, n, e, i) {
                if (t) {
                    var r = t[n],
                    a = t.all;
                    r && a && (a = a.slice()),
                    r && C(r, i),
                    a && C(a, [n].concat(i))
                }
                return t
            },
            C = function(t, n) {
                var e, i = -1,
                r = t.length,
                a = n[0],
                o = n[1],
                s = n[2];
                switch (n.length) {
                case 0:
                    for (; ++i < r;)(e = t[i]).callback.call(e.ctx);
                    return;
                case 1:
                    for (; ++i < r;)(e = t[i]).callback.call(e.ctx, a);
                    return;
                case 2:
                    for (; ++i < r;)(e = t[i]).callback.call(e.ctx, a, o);
                    return;
                case 3:
                    for (; ++i < r;)(e = t[i]).callback.call(e.ctx, a, o, s);
                    return;
                default:
                    for (; ++i < r;)(e = t[i]).callback.apply(e.ctx, n);
                    return
                }
            };
            c(n, g);
            var w = n.Class = function() {
                this.initialize.apply(this, arguments)
            };
            c(w.prototype, g, {
                initialize: function() {}
            });
            var B = n.View = function(t) {
                this.cid = p("view"),
                t || (t = {});
                for (var n in Q) t[Q[n]] && (this[Q[n]] = t[Q[n]]);
                this._ensureElement(),
                this.initialize.apply(this, arguments)
            },
            I = /^(\S+)\s*(.*)$/,
            Q = ["el", "id", "attributes", "className", "tagName", "events"];
            c(B.prototype, g, {
                tagName: "div",
                $: function(t) {
                    return this.$el.find(t)
                },
                initialize: function() {},
                render: function() {
                    return this
                },
                remove: function() {
                    return this._removeElement(),
                    this.stopListening(),
                    this
                },
                _removeElement: function() {
                    this.$el.remove()
                },
                setElement: function(t) {
                    return this.undelegateEvents(),
                    this._setElement(t),
                    this.delegateEvents(),
                    this
                },
                _setElement: function(t) {
                    this.$el = t instanceof n.$ ? t: n.$(t),
                    this.el = this.$el[0]
                },
                delegateEvents: function(t) {
                    if (t || (t = o(this, "events")), !t) return this;
                    this.undelegateEvents();
                    for (var n in t) {
                        var e = t[n];
                        if (a(e) || (e = this[e]), e) {
                            var i = n.match(I);
                            this.delegate(i[1], i[2], s(e, this))
                        }
                    }
                    return this
                },
                delegate: function(t, n, e) {
                    return this.$el.on(t + ".delegateEvents" + this.cid, n, e),
                    this
                },
                undelegateEvents: function() {
                    return this.$el && this.$el.off(".delegateEvents" + this.cid),
                    this
                },
                undelegate: function(t, n, e) {
                    return this.$el.off(t + ".delegateEvents" + this.cid, n, e),
                    this
                },
                _createElement: function(t) {
                    return document.createElement(t)
                },
                _ensureElement: function() {
                    if (this.el) this.setElement(o(this, "el"));
                    else {
                        var t = c({},
                        o(this, "attributes"));
                        this.id && (t.id = o(this, "id")),
                        this.className && (t.class = o(this, "className")),
                        this.setElement(this._createElement(o(this, "tagName"))),
                        this._setAttributes(t)
                    }
                },
                _setAttributes: function(t) {
                    this.$el.attr(t)
                }
            });
            var F = n.Router = function(t) {
                t || (t = {}),
                t.routes && (this.routes = t.routes),
                this._bindRoutes(),
                this.initialize.apply(this, arguments)
            },
            x = /\((.*?)\)/g,
            U = /(\(\?)?:\w+/g,
            T = /\*\w+/g,
            M = /[\-{}\[\]+?.,\\\^$|#\s]/g;
            c(F.prototype, g, {
                initialize: function() {},
                route: function(t, e, i) {
                    t = this._routeToRegExp(t),
                    a(e) && (i = e, e = ""),
                    i || (i = this[e]);
                    var r = this;
                    return n.history.route(t,
                    function(a) {
                        var o = r._extractParameters(t, a);
                        r.execute(i, o, e) !== !1 && (r.trigger.apply(r, ["route:" + e].concat(o)), r.trigger("route", e, o), n.history.trigger("route", r, e, o))
                    }),
                    this
                },
                execute: function(t, n) {
                    t && t.apply(this, n)
                },
                navigate: function(t, e) {
                    return n.history.navigate(t, e),
                    this
                },
                _bindRoutes: function() {
                    if (this.routes) for (var t, n = u(this.routes); null != (t = n.pop());) this.route(t, this.routes[t])
                },
                _routeToRegExp: function(t) {
                    return t = t.replace(M, "\\$&").replace(x, "(?:$1)?").replace(U,
                    function(t, n) {
                        return n ? t: "([^/?]+)"
                    }).replace(T, "([^?]*?)"),
                    new RegExp("^" + t + "(?:\\?([\\s\\S]*))?$")
                },
                _extractParameters: function(t, n) {
                    var e = t.exec(n).slice(1),
                    i = [];
                    for (var r in e) {
                        var a = e[r];
                        i[r] = r === e.length - 1 ? a || null: a ? decodeURIComponent(a) : null
                    }
                    return i
                }
            });
            var R = n.History = function() {
                this.handlers = [],
                this.checkUrl = s(this.checkUrl, this),
                "undefined" != typeof window && (this.location = window.location, this.history = window.history)
            },
            L = /^[#\/]|\s+$/g,
            S = /^\/+|\/+$/g,
            W = /#.*$/;
            R.started = !1,
            c(R.prototype, g, {
                atRoot: function() {
                    var t = this.location.pathname.replace(/[^\/]$/, "$&/");
                    return t === this.root && !this.getSearch()
                },
                matchRoot: function() {
                    var t = this.decodeFragment(this.location.pathname),
                    n = t.slice(0, this.root.length - 1) + "/";
                    return n === this.root
                },
                decodeFragment: function(t) {
                    return decodeURI(t.replace(/%25/g, "%2525"))
                },
                getSearch: function() {
                    var t = this.location.href.replace(/#.*/, "").match(/\?.+/);
                    return t ? t[0] : ""
                },
                getHash: function(t) {
                    var n = (t || this).location.href.match(/#(.*)$/);
                    return n ? n[1] : ""
                },
                getPath: function() {
                    var t = this.decodeFragment(this.location.pathname + this.getSearch()).slice(this.root.length - 1);
                    return "/" === t.charAt(0) ? t.slice(1) : t
                },
                getFragment: function(t) {
                    return null == t && (t = this._usePushState || !this._wantsHashChange ? this.getPath() : this.getHash()),
                    t.replace(L, "")
                },
                start: function(t) {
                    if (R.started) throw new Error("Bone.history has already been started");
                    if (R.started = !0, this.options = c({
                        root: "/"
                    },
                    this.options, t), this.root = this.options.root, this._wantsHashChange = this.options.hashChange !== !1, this._hasHashChange = "onhashchange" in window, this._useHashChange = this._wantsHashChange && this._hasHashChange, this._wantsPushState = !!this.options.pushState, this._hasPushState = !(!this.history || !this.history.pushState), this._usePushState = this._wantsPushState && this._hasPushState, this.fragment = this.getFragment(), this.root = ("/" + this.root + "/").replace(S, "/"), this._wantsHashChange && this._wantsPushState) {
                        if (!this._hasPushState && !this.atRoot()) {
                            var n = this.root.slice(0, -1) || "/";
                            return this.location.replace(n + "#" + this.getPath()),
                            !0
                        }
                        this._hasPushState && this.atRoot() && this.navigate(this.getHash(), {
                            replace: !0
                        })
                    }
                    var e = window.addEventListener ||
                    function(t, n) {
                        return attachEvent("on" + t, n)
                    };
                    return this._usePushState ? e("popstate", this.checkUrl, !1) : this._useHashChange && e("hashchange", this.checkUrl, !1),
                    this.options.silent ? void 0 : this.loadUrl()
                },
                stop: function() {
                    var t = window.removeEventListener ||
                    function(t, n) {
                        return detachEvent("on" + t, n)
                    };
                    this._usePushState ? t("popstate", this.checkUrl, !1) : this._useHashChange && t("hashchange", this.checkUrl, !1),
                    this._checkUrlInterval && clearInterval(this._checkUrlInterval),
                    R.started = !1
                },
                route: function(t, n) {
                    this.handlers.unshift({
                        route: t,
                        callback: n
                    })
                },
                checkUrl: function() {
                    var t = this.getFragment();
                    return t !== this.fragment && void this.loadUrl()
                },
                loadUrl: function(t) {
                    if (!this.matchRoot()) return ! 1;
                    t = this.fragment = this.getFragment(t);
                    for (var n in this.handlers) {
                        var e = this.handlers[n];
                        if (e.route.test(t)) return e.callback(t),
                        !0
                    }
                },
                navigate: function(t, n) {
                    if (!R.started) return ! 1;
                    n && n !== !0 || (n = {
                        trigger: !!n
                    }),
                    t = t.replace(W, "");
                    var e = this.root; ("" === t || "?" === t.charAt(0)) && (e = e.slice(0, -1) || "/");
                    var i = e + t;
                    if (t = this.decodeFragment(t.replace(W, "")), this.fragment !== t) {
                        if (this.fragment = t, this._usePushState) this.history[n.replace ? "replaceState": "pushState"]({},
                        document.title, i);
                        else {
                            if (!this._wantsHashChange) return this.location.assign(i);
                            this._updateHash(this.location, t, n.replace)
                        }
                        return n.trigger ? this.loadUrl(t) : void 0
                    }
                },
                _updateHash: function(t, n, e) {
                    if (e) {
                        var i = t.href.replace(/(javascript:|#).*$/, "");
                        t.replace(i + "#" + n)
                    } else t.hash = "#" + n
                }
            }),
            n.history = new R;
            var Y = function(t, n) {
                var e, i = this;
                e = t && Object.prototype.hasOwnProperty.call(t, "constructor") ? t.constructor: function() {
                    return i.apply(this, arguments)
                },
                c(e, i, n);
                var r = function() {
                    this.constructor = e
                };
                return r.prototype = i.prototype,
                e.prototype = new r,
                t && c(e.prototype, t),
                e.__super__ = i.prototype,
                e
            };
            return F.extend = R.extend = w.extend = B.extend = Y,
            n
        })
    }).call(n,
    function() {
        return this
    } ())
},
function(t, n, e) {
    var i, r;
    /*!
	 * VERSION: 0.7.0
	 * DATE: 2016-8-17
	 * GIT: https://github.com/shrekshrek/jstween
	 * @author: Shrek.wang
	 **/
    !
    function(e) {
        i = [n],
        r = function(t) {
            window.JT = e(t)
        }.apply(n, i),
        !(void 0 !== r && (t.exports = r))
    } (function(t) {
        function n(t, n) {
            for (var e in n) t[e] = n[e]
        }
        function e(t, n) {
            if (t.length && t.length > 0) for (var e = 0; e < t.length; e++) n.call(t[e], e, t[e]);
            else n.call(t, 0, t)
        }
        function i(t) {
            return t.replace(/([A-Z])/g, "-$1").toLowerCase()
        }
        function r(t) {
            return t.replace(/\b(\w)|\s(\w)/g,
            function(t) {
                return t.toUpperCase()
            })
        }
        function a(t) {
            return Math.round(1e3 * t) / 1e3
        }
        function o(t) {
            return t ? Y + r(t) : Y
        }
        function s(t) {
            if (!t) throw "target is undefined, can't tween!!!";
            return "string" == typeof t ? "undefined" == typeof document ? t: document.querySelectorAll ? document.querySelectorAll(t) : document.getElementById("#" === t.charAt(0) ? t.substr(1) : t) : t
        }
        function c(t, n) {
            return "rotation" == n || "scale" == n ? n: void 0 !== t._jt_obj[n] ? n: void 0 !== t.style[n] ? n: (n = o(n), void 0 !== t.style[n] ? n: void 0)
        }
        function u(t, n, e, i) {
            var r = {};
            if (n instanceof Array) {
                r.num = [];
                for (var a in n) {
                    var o = h(t, n[a]);
                    r.num[a] = o.num,
                    r.unit = o.unit
                }
                void 0 != e && (i ? r.num.push(e.num) : r.num.unshift(e.num))
            } else r = h(t, n);
            return r
        }
        function h(t, n) {
            var e = f(n);
            "rem" == t.unit && "rem" != e.unit ? (y(), t.num = a(t.num * j), t.unit = "px") : "rem" != t.unit && "rem" == e.unit && (y(), t.num = a(t.num / j), t.unit = "rem");
            var i;
            switch (e.ext) {
            case "+=":
                i = t.num + e.num;
                break;
            case "-=":
                i = t.num - e.num;
                break;
            default:
                i = e.num
            }
            return {
                num: i,
                unit: e.unit || t.unit
            }
        }
        function l(t) {
            void 0 == t._jt_obj && (t._jt_obj = {
                perspective: 0,
                x: 0,
                y: 0,
                z: 0,
                rotationX: 0,
                rotationY: 0,
                rotationZ: 0,
                scaleX: 1,
                scaleY: 1,
                scaleZ: 1,
                skewX: 0,
                skewY: 0
            })
        }
        function f(t) {
            var n = /(\+=|-=|)(-|)(\d+\.\d+|\d+)(e[+-]?[0-9]{0,2}|)(rem|px|%|)/i,
            e = n.exec(t);
            return e ? {
                num: a(e[2] + e[3] + e[4]),
                unit: e[5],
                ext: e[1]
            }: {
                num: 0,
                unit: "px",
                ext: ""
            }
        }
        function p(t) {
            return /\S\s+\S/g.test(t) || !/\d/g.test(t)
        }
        function g(t, n) {
            switch (n) {
            case "perspective":
            case "x":
            case "y":
            case "z":
            case "rotationX":
            case "rotationY":
            case "rotationZ":
            case "scaleX":
            case "scaleY":
            case "scaleZ":
            case "skewX":
            case "skewY":
                return t._jt_obj[n];
            case "rotation":
                return t._jt_obj.rotationZ;
            case "scale":
                return t._jt_obj.scaleX;
            default:
                return d(t, n)
            }
        }
        function d(t, n) {
            if (t.style[n]) return t.style[n];
            if (document.defaultView && document.defaultView.getComputedStyle) {
                var e = i(n),
                r = document.defaultView.getComputedStyle(t, "");
                return r && r.getPropertyValue(e)
            }
            return t.currentStyle ? t.currentStyle[n] : null
        }
        function m(t, n, e) {
            switch (n) {
            case "perspective":
            case "x":
            case "y":
            case "z":
            case "rotationX":
            case "rotationY":
            case "rotationZ":
            case "scaleX":
            case "scaleY":
            case "scaleZ":
            case "skewX":
            case "skewY":
                return t._jt_obj[n] = e,
                !0;
            case "rotation":
                return t._jt_obj.rotationZ = e,
                !0;
            case "scale":
                return t._jt_obj.scaleX = e,
                t._jt_obj.scaleY = e,
                !0;
            default:
                return b(t, n, e),
                !1
            }
        }
        function b(t, n, e) {
            t.style[n] = e
        }
        function v(t) {
            return "object" == typeof t && 1 === t.nodeType
        }
        function A(t) {
            var n = "";
            t._jt_obj.perspective && (n += "perspective(" + t._jt_obj.perspective + ") "),
            (t._jt_obj.x || t._jt_obj.y || t._jt_obj.z) && (n += "translate3d(" + E(t._jt_obj.x) + "," + E(t._jt_obj.y) + "," + E(t._jt_obj.z) + ") "),
            t._jt_obj.rotationX && (n += "rotateX(" + t._jt_obj.rotationX % 360 + "deg) "),
            t._jt_obj.rotationY && (n += "rotateY(" + t._jt_obj.rotationY % 360 + "deg) "),
            t._jt_obj.rotationZ && (n += "rotateZ(" + t._jt_obj.rotationZ % 360 + "deg) "),
            (1 != t._jt_obj.scaleX || 1 != t._jt_obj.scaleY || 1 != t._jt_obj.scaleZ) && (n += "scale3d(" + t._jt_obj.scaleX + ", " + t._jt_obj.scaleY + ", " + t._jt_obj.scaleZ + ") "),
            (t._jt_obj.skewX || t._jt_obj.skewY) && (n += "skew(" + t._jt_obj.skewX + "deg," + t._jt_obj.skewY + "deg) "),
            t.style[o("transform")] = n
        }
        function E(t) {
            return t + ("number" == typeof t ? "px": "")
        }
        function y() {
            V || (V = document.createElement("div"), V.style.cssText = "border:0 solid; position:absolute; line-height:0px;"),
            k || (k = document.getElementsByTagName("body")[0]),
            k.appendChild(V),
            V.style.borderLeftWidth = "1rem",
            j = parseFloat(V.offsetWidth),
            k.removeChild(V)
        }
        function C() {
            q = !0;
            var t = N.length,
            n = P.length;
            if (0 === t && 0 === n) return void(q = !1);
            var e = W(),
            i = e - O;
            O = e;
            for (var r = 0; t > r; r++) {
                var a = N[r];
                a && !a._update(i) && (a.isActive && (a.isActive = !1, N.splice(r, 1), a.onEnd && a.onEnd.apply(a, a.onEndParams)), r--, t--)
            }
            for (var o = 0; n > o; o++) {
                var s = P[o];
                s && !s._update(i) && (P.splice(o, 1), s.onEnd && s.onEnd.apply(s, s.onEndParams), o--, n--)
            }
            K(C)
        }
        function w() {
            this.initialize.apply(this, arguments)
        }
        function B(t, n) {
            var i = s(t),
            r = N.length;
            e(i,
            function(t, e) {
                for (var i = r - 1; i >= 0; i--) {
                    var a = N[i];
                    a.target === e && a[n]()
                }
            })
        }
        function I(t) {
            for (var n = N.length,
            e = n - 1; e >= 0; e--) {
                var i = N[e];
                i[t]()
            }
        }
        function Q() {
            this.initialize.apply(this, arguments)
        }
        function F(t, n) {
            var i = t,
            r = P.length;
            e(i,
            function(t, e) {
                for (var i = r - 1; i >= 0; i--) {
                    var a = P[i];
                    a.onEnd === e && a[n]()
                }
            })
        }
        function x(t) {
            for (var n = P.length,
            e = n - 1; e >= 0; e--) {
                var i = P[e];
                i[t]()
            }
        }
        function U(t) {
            t.bezier && (T(t, t.bezier), t.interpolation = R, delete t.bezier),
            t.through && (T(t, t.through), t.interpolation = L, delete t.through),
            t.linear && (T(t, t.linear), t.interpolation = M, delete t.linear)
        }
        function T(t, n) {
            for (var e in n) for (var i in n[e]) 0 == e ? t[i] = [n[e][i]] : t[i].push(n[e][i])
        }
        function M(t, n) {
            var e = t.length - 1,
            i = e * n,
            r = Math.floor(i),
            a = D.Linear;
            return 0 > n ? a(t[0], t[1], i) : n > 1 ? a(t[e], t[e - 1], e - i) : a(t[r], t[r + 1 > e ? e: r + 1], i - r)
        }
        function R(t, n) {
            var e, i = 0,
            r = t.length - 1,
            a = Math.pow,
            o = D.Bernstein;
            for (e = 0; r >= e; e++) i += a(1 - n, r - e) * a(n, e) * t[e] * o(r, e);
            return i
        }
        function L(t, n) {
            var e = t.length - 1,
            i = e * n,
            r = Math.floor(i),
            a = D.Through;
            return t[0] === t[e] ? (0 > n && (r = Math.floor(i = e * (1 + n))), a(t[(r - 1 + e) % e], t[r], t[(r + 1) % e], t[(r + 2) % e], i - r)) : 0 > n ? t[0] - (a(t[0], t[0], t[1], t[1], -i) - t[0]) : n > 1 ? t[e] - (a(t[e], t[e], t[e - 1], t[e - 1], i - e) - t[e]) : a(t[r ? r - 1 : 0], t[r], t[r + 1 > e ? e: r + 1], t[r + 2 > e ? e: r + 2], i - r)
        }
        Date.now = Date.now ||
        function() {
            return (new Date).getTime()
        };
        var S = Date.now(),
        W = function() {
            return Date.now() - S
        },
        Y = ""; !
        function() {
            var t = document.createElement("div"),
            n = ["Webkit", "Moz", "Ms", "O"];
            for (var e in n) if (n[e] + "Transform" in t.style) {
                Y = n[e];
                break
            }
        } ();
        var k, V, j, K = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        function(t) {
            window.setTimeout(t, 1e3 / 60)
        },
        N = [],
        q = !1,
        O = 0;
        n(w.prototype, {
            initialize: function(n, e, i, r, a) {
                this.fromVars = i,
                this.curVars = {},
                this.toVars = r,
                this.target = n,
                this.duration = 1e3 * Math.max(e, 0),
                this.ease = r.ease || t.Linear.None,
                this.delay = 1e3 * Math.max(r.delay || 0, 0),
                this.yoyo = r.yoyo || !1,
                this.repeat = this.curRepeat = Math.floor(r.repeat || 0),
                this.repeatDelay = 1e3 * Math.max(r.repeatDelay || 0, 0),
                this.onStart = r.onStart || null,
                this.onStartParams = r.onStartParams || [],
                this.onRepeat = r.onRepeat || null,
                this.onRepeatParams = r.onRepeatParams || [],
                this.onEnd = r.onEnd || null,
                this.onEndParams = r.onEndParams || [],
                this.onUpdate = r.onUpdate || null,
                this.onUpdateParams = r.onUpdateParams || [],
                this.isPlaying = r.isPlaying || !0,
                this.interpolation = r.interpolation || null,
                this.isActive = r.isActive || !0,
                this.isReverse = !1,
                this.isDom = a,
                this.curTime = 0,
                this.isStart = !1,
                this.startTime = this.delay,
                this.endTime = this.startTime + this.repeatDelay + this.duration,
                0 != this.delay && (this._updateProp(), this.onUpdate && this.onUpdate.apply(this, this.onUpdateParams)),
                this.isActive && this._addSelf()
            },
            _update: function(t) {
                if (!this.isPlaying) return ! 0;
                if (this.curTime += t, this.curTime < this.startTime) return ! 0;
                if (this.isStart || (this.curTime += this.repeatDelay), this.curTime < this.startTime + this.repeatDelay) return ! 0;
                if (this.curTime < this.endTime) this._updateProp(),
                this.onUpdate && this.onUpdate.apply(this, this.onUpdateParams);
                else {
                    if (0 == this.curRepeat) return this._updateProp(),
                    this.onUpdate && this.onUpdate.apply(this, this.onUpdateParams),
                    this._checkStart(),
                    !1;
                    this.yoyo && (this.isReverse = !this.isReverse);
                    var n = (this.curTime - this.endTime) % (this.duration + this.repeatDelay);
                    0 == this.repeatDelay ? (this.curTime = this.startTime + n, this._updateProp()) : (this._updateProp(), this.curTime = this.startTime + n),
                    this.onUpdate && this.onUpdate.apply(this, this.onUpdateParams),
                    this.onRepeat && this.onRepeat.apply(this, this.onRepeatParams),
                    this.curRepeat > 0 && this.curRepeat--
                }
				
                return this._checkStart(),
                !0
            },
            _checkStart: function() {
                this.isStart || (this.isStart = !0, this.onStart && this.onStart.apply(this, this.onStartParams))
            },
            _updateProp: function() {
                var t = 0 == this.duration ? 1 : (this.curTime - this.startTime - this.repeatDelay) / this.duration;
                t = Math.max(0, Math.min(1, t)),
                this.isReverse && (t = 1 - t);
                var n = this.ease(t),
                e = !1;
                for (var i in this.fromVars) {
                    var r, o = this.fromVars[i],
                    s = this.toVars[i];
                    r = s.num instanceof Array ? this.interpolation(s.num, n) : o.num + (s.num - o.num) * n,
                    r = a(r),
                    this.curVars[i] = {
                        num: r,
                        unit: s.unit
                    },
                    this.isDom ? (Math.abs(s.num - o.num) > 20 && (r = Math.round(r)), m(this.target, i, r + (s.unit || 0)) && (e = !0)) : this.target[i] = r + (s.unit || 0)
                }
                e && A(this.target)
            },
            _toEnd: function() {
                var t = !1;
                for (var n in this.fromVars) {
                    var e = this.toVars[n],
                    i = a(e.num);
                    this.curVars[n] = {
                        num: i,
                        unit: e.unit
                    },
                    this.isDom ? m(this.target, n, i + (e.unit || 0)) && (t = !0) : this.target[n] = i + (e.unit || 0)
                }
                t && A(this.target)
            },
            _addSelf: function() {
                this.isActive = !0,
                N.push(this),
                q || (O = t.now(), C())
            },
            _removeSelf: function() {
                this.isActive = !1;
                var t = N.indexOf(this); - 1 !== t && N.splice(t, 1)
            },
            active: function() {
                this._addSelf()
            },
            play: function() {
                this.isPlaying = !0
            },
            pause: function() {
                this.isPlaying = !1
            },
            kill: function(t) {
                this._removeSelf(),
                t && (this._toEnd(), this.onEnd && this.onEnd.apply(this, this.onEndParams))
            }
        }),
        n(t, {
            get: function(t, n) {
                var e = s(t);
                if (void 0 !== e.length && (e = e[0]), v(e)) {
                    l(e);
                    var i = c(e, n);
                    return i ? g(e, i) : null
                }
                return e[n]
            },
            set: function(t, n) {
                var i = s(t);
                e(i,
                function(t, e) {
                    if (v(e)) {
                        l(e);
                        var i = !1;
                        for (var r in n) {
                            var a = c(e, r);
                            if (a) if (p(n[r])) m(e, a, n[r]);
                            else {
                                var o = u(f(g(e, a)), n[r]);
                                m(e, a, o.num + (o.unit || 0)) && (i = !0)
                            }
                        }
                        i && A(e)
                    } else for (var s in n) {
                        var o = u(f(e[s]), n[s]);
                        e[s] = o.num + (o.unit || 0)
                    }
                })
            },
            fromTo: function(t, n, i, r) {
                U(r);
                var a = s(t),
                o = [];
                return e(a,
                function(t, e) {
                    var a = {},
                    s = {},
                    h = v(e);
                    if (h) {
                        l(e);
                        for (var p in r) {
                            var d = c(e, p);
                            if (d) {
                                var m = f(g(e, d));
                                a[d] = u(m, i[p]),
                                s[d] = u(m, r[p], a[d], !1)
                            } else s[p] = r[p]
                        }
                    } else for (var p in r) if (void 0 !== e[p]) {
                        var m = f(e[p]);
                        a[p] = u(m, i[p]),
                        s[p] = u(m, r[p], a[p], !1)
                    } else s[p] = r[p];
                    var b = new w(e, n, a, s, h);
                    o.push(b)
                }),
                1 == o.length ? o[0] : o
            },
            from: function(t, n, i) {
                U(i);
                var r = s(t),
                a = [];
                return e(r,
                function(t, e) {
                    var r = {},
                    o = {},
                    s = v(e);
                    if (s) {
                        l(e);
                        for (var h in i) {
                            var p = c(e, h);
                            if (p) {
                                var d = f(g(e, p));
                                r[p] = u(d, i[h], d, !0),
                                o[p] = d
                            } else o[h] = i[h]
                        }
                    } else for (var h in i) if (void 0 !== e[h]) {
                        var d = f(e[h]);
                        r[h] = u(d, i[h], d, !0),
                        o[h] = d
                    } else o[h] = i[h];
                    var m = new w(e, n, r, o, s);
                    a.push(m)
                }),
                1 == a.length ? a[0] : a
            },
            to: function(t, n, i) {
                U(i);
                var r = s(t),
                a = [];
                return e(r,
                function(t, e) {
                    var r = {},
                    o = {},
                    s = v(e);
                    if (s) {
                        l(e);
                        for (var h in i) {
                            var p = c(e, h);
                            if (p) {
                                var d = f(g(e, p));
                                r[p] = d,
                                o[p] = u(d, i[h], d, !1)
                            } else o[h] = i[h]
                        }
                    } else for (var h in i) if (void 0 !== e[h]) {
                        var d = f(e[h]);
                        r[h] = d,
                        o[h] = u(d, i[h], d, !1)
                    } else o[h] = i[h];
                    var m = new w(e, n, r, o, s);
                    a.push(m)
                }),
                1 == a.length ? a[0] : a
            },
            kill: function(t, n) {
                var i = s(t);
                e(i,
                function(t, e) {
                    for (var i = N.length,
                    r = i - 1; r >= 0; r--) {
                        var a = N[r];
                        a.target === e && a.kill(n)
                    }
                })
            },
            killAll: function(t) {
                for (var n = N.length,
                e = n - 1; e >= 0; e--) {
                    var i = N[e];
                    i.kill(t)
                }
            },
            play: function(t) {
                B(t, "play")
            },
            playAll: function() {
                I("play")
            },
            pause: function(t) {
                B(t, "pause")
            },
            pauseAll: function() {
                I("pause")
            },
            isTweening: function(t) {
                var n = s(t);
                n = n[0] || n;
                for (var e = N.length,
                i = e - 1; i >= 0; i--) {
                    var r = N[i];
                    if (r.target === n) return ! 0
                }
                return ! 1
            }
        });
        var P = [];
        n(Q.prototype, {
            initialize: function(t, n, e, i) {
                this.delay = 1e3 * t,
                this.onEnd = n || null,
                this.onEndParams = e || [],
                this.curTime = 0,
                this.endTime = this.delay,
                this.isPlaying = i || !0,
                0 != this.delay ? this._addSelf() : this.onEnd && this.onEnd.apply(this, this.onEndParams)
            },
            _update: function(t) {
                return ! this.isPlaying || (this.curTime += t, this.curTime < this.endTime)
            },
            _addSelf: function() {
                P.push(this),
                q || (O = t.now(), C())
            },
            _removeSelf: function() {
                var t = P.indexOf(this); - 1 !== t && P.splice(t, 1)
            },
            play: function() {
                this.isPlaying = !0
            },
            pause: function() {
                this.isPlaying = !1
            },
            kill: function(t) {
                this._removeSelf(),
                t && (this._toEnd(), this.onEnd && this.onEnd.apply(this, this.onEndParams))
            }
        }),
        n(t, {
            call: function(t, n, e, i) {
                return new Q(t, n, e, i)
            },
            killCall: function(t, n) {
                var i = t,
                r = P.length;
                e(i,
                function(t, e) {
                    for (var i = r - 1; i >= 0; i--) {
                        var a = P[i];
                        a.onEnd === e && a.kill(n)
                    }
                })
            },
            killAllCalls: function(t) {
                for (var n = P.length,
                e = n - 1; e >= 0; e--) {
                    var i = P[e];
                    i.kill(t)
                }
            },
            playCall: function(t) {
                F(t, "play")
            },
            playAllCalls: function() {
                x("play")
            },
            pauseCall: function(t) {
                F(t, "pause")
            },
            pauseAllCalls: function() {
                x("pause")
            }
        }),
        n(t, {
            path: function(n) {
                U(n);
                for (var e, i = n.ease || t.Linear.None,
                r = n.step || 1,
                a = [], o = 0; r >= o; o++) {
                    e = i(o / r);
                    var s = {};
                    for (var c in n) n[c] instanceof Array && (s[c] = n.interpolation(n[c], e));
                    a.push(s)
                }
                return a
            }
        });
        var D = {
            Linear: function(t, n, e) {
                return (n - t) * e + t
            },
            Bernstein: function(t, n) {
                var e = D.Factorial;
                return e(t) / e(n) / e(t - n)
            },
            Factorial: function() {
                var t = [1];
                return function(n) {
                    var e, i = 1;
                    if (t[n]) return t[n];
                    for (e = n; e > 1; e--) i *= e;
                    return t[n] = i
                }
            } (),
            Through: function(t, n, e, i, r) {
                var a = .5 * (e - t),
                o = .5 * (i - n),
                s = r * r,
                c = r * s;
                return (2 * n - 2 * e + a + o) * c + ( - 3 * n + 3 * e - 2 * a - o) * s + a * r + n
            }
        };
        return n(t, {
            Linear: {
                None: function(t) {
                    return t
                }
            },
            Quad: {
                In: function(t) {
                    return t * t
                },
                Out: function(t) {
                    return t * (2 - t)
                },
                InOut: function(t) {
                    return (t *= 2) < 1 ? .5 * t * t: -.5 * (--t * (t - 2) - 1)
                }
            },
            Cubic: {
                In: function(t) {
                    return t * t * t
                },
                Out: function(t) {
                    return--t * t * t + 1
                },
                InOut: function(t) {
                    return (t *= 2) < 1 ? .5 * t * t * t: .5 * ((t -= 2) * t * t + 2)
                }
            },
            Quart: {
                In: function(t) {
                    return t * t * t * t
                },
                Out: function(t) {
                    return 1 - --t * t * t * t
                },
                InOut: function(t) {
                    return (t *= 2) < 1 ? .5 * t * t * t * t: -.5 * ((t -= 2) * t * t * t - 2)
                }
            },
            Quint: {
                In: function(t) {
                    return t * t * t * t * t
                },
                Out: function(t) {
                    return--t * t * t * t * t + 1
                },
                InOut: function(t) {
                    return (t *= 2) < 1 ? .5 * t * t * t * t * t: .5 * ((t -= 2) * t * t * t * t + 2)
                }
            },
            Sine: {
                In: function(t) {
                    return 1 - Math.cos(t * Math.PI / 2)
                },
                Out: function(t) {
                    return Math.sin(t * Math.PI / 2)
                },
                InOut: function(t) {
                    return.5 * (1 - Math.cos(Math.PI * t))
                }
            },
            Expo: {
                In: function(t) {
                    return 0 === t ? 0 : Math.pow(1024, t - 1)
                },
                Out: function(t) {
                    return 1 === t ? 1 : 1 - Math.pow(2, -10 * t)
                },
                InOut: function(t) {
                    return 0 === t ? 0 : 1 === t ? 1 : (t *= 2) < 1 ? .5 * Math.pow(1024, t - 1) : .5 * ( - Math.pow(2, -10 * (t - 1)) + 2)
                }
            },
            Circ: {
                In: function(t) {
                    return 1 - Math.sqrt(1 - t * t)
                },
                Out: function(t) {
                    return Math.sqrt(1 - --t * t)
                },
                InOut: function(t) {
                    return (t *= 2) < 1 ? -.5 * (Math.sqrt(1 - t * t) - 1) : .5 * (Math.sqrt(1 - (t -= 2) * t) + 1)
                }
            },
            Elastic: {
                In: function(t) {
                    var n, e = .1,
                    i = .4;
                    return 0 === t ? 0 : 1 === t ? 1 : (!e || 1 > e ? (e = 1, n = i / 4) : n = i * Math.asin(1 / e) / (2 * Math.PI), -(e * Math.pow(2, 10 * (t -= 1)) * Math.sin(2 * (t - n) * Math.PI / i)))
                },
                Out: function(t) {
                    var n, e = .1,
                    i = .4;
                    return 0 === t ? 0 : 1 === t ? 1 : (!e || 1 > e ? (e = 1, n = i / 4) : n = i * Math.asin(1 / e) / (2 * Math.PI), e * Math.pow(2, -10 * t) * Math.sin(2 * (t - n) * Math.PI / i) + 1)
                },
                InOut: function(t) {
                    var n, e = .1,
                    i = .4;
                    return 0 === t ? 0 : 1 === t ? 1 : (!e || 1 > e ? (e = 1, n = i / 4) : n = i * Math.asin(1 / e) / (2 * Math.PI), (t *= 2) < 1 ? -.5 * e * Math.pow(2, 10 * (t -= 1)) * Math.sin(2 * (t - n) * Math.PI / i) : e * Math.pow(2, -10 * (t -= 1)) * Math.sin(2 * (t - n) * Math.PI / i) * .5 + 1)
                }
            },
            Back: {
                In: function(t) {
                    var n = 1.70158;
                    return t * t * ((n + 1) * t - n)
                },
                Out: function(t) {
                    var n = 1.70158;
                    return--t * t * ((n + 1) * t + n) + 1
                },
                InOut: function(t) {
                    var n = 2.5949095;
                    return (t *= 2) < 1 ? .5 * t * t * ((n + 1) * t - n) : .5 * ((t -= 2) * t * ((n + 1) * t + n) + 2)
                }
            },
            Bounce: {
                In: function(n) {
                    return 1 - t.Bounce.Out(1 - n)
                },
                Out: function(t) {
                    return 1 / 2.75 > t ? 7.5625 * t * t: 2 / 2.75 > t ? 7.5625 * (t -= 1.5 / 2.75) * t + .75 : 2.5 / 2.75 > t ? 7.5625 * (t -= 2.25 / 2.75) * t + .9375 : 7.5625 * (t -= 2.625 / 2.75) * t + .984375
                },
                InOut: function(n) {
                    return.5 > n ? .5 * t.Bounce.In(2 * n) : .5 * t.Bounce.Out(2 * n - 1) + .5
                }
            }
        }),
        t.now = W,
        t
    })
},
function(t, n) {
    var e = function() {
        function t(t) {
            return null == t ? String(t) : Z[H.call(t)] || "object"
        }
        function n(n) {
            return "function" == t(n)
        }
        function e(t) {
            return null != t && t == t.window
        }
        function i(t) {
            return null != t && t.nodeType == t.DOCUMENT_NODE
        }
        function r(n) {
            return "object" == t(n)
        }
        function a(t) {
            return r(t) && !e(t) && Object.getPrototypeOf(t) == Object.prototype
        }
        function o(t) {
            return "number" == typeof t.length
        }
        function s(t) {
            return U.call(t,
            function(t) {
                return null != t
            })
        }
        function c(t) {
            return t.length > 0 ? w.fn.concat.apply([], t) : t
        }
        function u(t) {
            return t.replace(/::/g, "/").replace(/([A-Z]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").replace(/_/g, "-").toLowerCase()
        }
        function h(t) {
            return t in R ? R[t] : R[t] = new RegExp("(^|\\s)" + t + "(\\s|$)")
        }
        function l(t, n) {
            return "number" != typeof n || L[u(t)] ? n: n + "px"
        }
        function f(t) {
            var n, e;
            return M[t] || (n = T.createElement(t), T.body.appendChild(n), e = getComputedStyle(n, "").getPropertyValue("display"), n.parentNode.removeChild(n), "none" == e && (e = "block"), M[t] = e),
            M[t]
        }
        function p(t) {
            return "children" in t ? x.call(t.children) : w.map(t.childNodes,
            function(t) {
                return 1 == t.nodeType ? t: void 0
            })
        }
        function g(t, n, e) {
            for (C in n) e && (a(n[C]) || X(n[C])) ? (a(n[C]) && !a(t[C]) && (t[C] = {}), X(n[C]) && !X(t[C]) && (t[C] = []), g(t[C], n[C], e)) : n[C] !== y && (t[C] = n[C])
        }
        function d(t, n) {
            return null == n ? w(t) : w(t).filter(n)
        }
        function m(t, e, i, r) {
            return n(e) ? e.call(t, i, r) : e
        }
        function b(t, n, e) {
            null == e ? t.removeAttribute(n) : t.setAttribute(n, e)
        }
        function v(t, n) {
            var e = t.className,
            i = e && e.baseVal !== y;
            return n === y ? i ? e.baseVal: e: void(i ? e.baseVal = n: t.className = n)
        }
        function A(t) {
            var n;
            try {
                return t ? "true" == t || "false" != t && ("null" == t ? null: /^0/.test(t) || isNaN(n = Number(t)) ? /^[\[\{]/.test(t) ? w.parseJSON(t) : t: n) : t
            } catch(n) {
                return t
            }
        }
        function E(t, n) {
            n(t);
            for (var e = 0,
            i = t.childNodes.length; i > e; e++) E(t.childNodes[e], n)
        }
        var y, C, w, B, I, Q, F = [],
        x = F.slice,
        U = F.filter,
        T = window.document,
        M = {},
        R = {},
        L = {
            "column-count": 1,
            columns: 1,
            "font-weight": 1,
            "line-height": 1,
            opacity: 1,
            "z-index": 1,
            zoom: 1
        },
        S = /^\s*<(\w+|!)[^>]*>/,
        W = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        Y = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        k = /^(?:body|html)$/i,
        V = /([A-Z])/g,
        j = ["val", "css", "html", "text", "data", "width", "height", "offset"],
        K = ["after", "prepend", "before", "append"],
        N = T.createElement("table"),
        q = T.createElement("tr"),
        O = {
            tr: T.createElement("tbody"),
            tbody: N,
            thead: N,
            tfoot: N,
            td: q,
            th: q,
            "*": T.createElement("div")
        },
        P = /complete|loaded|interactive/,
        D = /^[\w-]*$/,
        Z = {},
        H = Z.toString,
        _ = {},
        z = T.createElement("div"),
        G = {
            tabindex: "tabIndex",
            readonly: "readOnly",
            for: "htmlFor",
            class: "className",
            maxlength: "maxLength",
            cellspacing: "cellSpacing",
            cellpadding: "cellPadding",
            rowspan: "rowSpan",
            colspan: "colSpan",
            usemap: "useMap",
            frameborder: "frameBorder",
            contenteditable: "contentEditable"
        },
        X = Array.isArray ||
        function(t) {
            return t instanceof Array
        };
        return _.matches = function(t, n) {
            if (!n || !t || 1 !== t.nodeType) return ! 1;
            var e = t.webkitMatchesSelector || t.mozMatchesSelector || t.oMatchesSelector || t.matchesSelector;
            if (e) return e.call(t, n);
            var i, r = t.parentNode,
            a = !r;
            return a && (r = z).appendChild(t),
            i = ~_.qsa(r, n).indexOf(t),
            a && z.removeChild(t),
            i
        },
        I = function(t) {
            return t.replace(/-+(.)?/g,
            function(t, n) {
                return n ? n.toUpperCase() : ""
            })
        },
        Q = function(t) {
            return U.call(t,
            function(n, e) {
                return t.indexOf(n) == e
            })
        },
        _.fragment = function(t, n, e) {
            var i, r, o;
            return W.test(t) && (i = w(T.createElement(RegExp.$1))),
            i || (t.replace && (t = t.replace(Y, "<$1></$2>")), n === y && (n = S.test(t) && RegExp.$1), n in O || (n = "*"), o = O[n], o.innerHTML = "" + t, i = w.each(x.call(o.childNodes),
            function() {
                o.removeChild(this)
            })),
            a(e) && (r = w(i), w.each(e,
            function(t, n) {
                j.indexOf(t) > -1 ? r[t](n) : r.attr(t, n)
            })),
            i
        },
        _.Z = function(t, n) {
            return t = t || [],
            t.__proto__ = w.fn,
            t.selector = n || "",
            t
        },
        _.isZ = function(t) {
            return t instanceof _.Z
        },

        _.init = function(t, e) {
            var i;
            if (!t) return _.Z();
            if ("string" == typeof t) if (t = t.trim(), "<" == t[0] && S.test(t)) i = _.fragment(t, RegExp.$1, e),
            t = null;
            else {
                if (e !== y) return w(e).find(t);
                i = _.qsa(T, t)
            } else {
                if (n(t)) return w(T).ready(t);
                if (_.isZ(t)) return t;
                if (X(t)) i = s(t);
                else if (r(t)) i = [t],
                t = null;
                else if (S.test(t)) i = _.fragment(t.trim(), RegExp.$1, e),
                t = null;
                else {
                    if (e !== y) return w(e).find(t);
                    i = _.qsa(T, t)
                }
            }
            return _.Z(i, t)
        },
        w = function(t, n) {
            return _.init(t, n)
        },
        w.extend = function(t) {
            var n, e = x.call(arguments, 1);
            return "boolean" == typeof t && (n = t, t = e.shift()),
            e.forEach(function(e) {
                g(t, e, n)
            }),
            t
        },
        _.qsa = function(t, n) {
            var e, r = "#" == n[0],
            a = !r && "." == n[0],
            o = r || a ? n.slice(1) : n,
            s = D.test(o);
            return i(t) && s && r ? (e = t.getElementById(o)) ? [e] : [] : 1 !== t.nodeType && 9 !== t.nodeType ? [] : x.call(s && !r ? a ? t.getElementsByClassName(o) : t.getElementsByTagName(n) : t.querySelectorAll(n))
        },
        w.contains = T.documentElement.contains ?
        function(t, n) {
            return t !== n && t.contains(n)
        }: function(t, n) {
            for (; n && (n = n.parentNode);) if (n === t) return ! 0;
            return ! 1
        },
        w.type = t,
        w.isFunction = n,
        w.isWindow = e,
        w.isArray = X,
        w.isPlainObject = a,
        w.isEmptyObject = function(t) {
            var n;
            for (n in t) return ! 1;
            return ! 0
        },
        w.inArray = function(t, n, e) {
            return F.indexOf.call(n, t, e)
        },
        w.camelCase = I,
        w.trim = function(t) {
            return null == t ? "": String.prototype.trim.call(t)
        },
        w.uuid = 0,
        w.support = {},
        w.expr = {},
        w.map = function(t, n) {
            var e, i, r, a = [];
            if (o(t)) for (i = 0; i < t.length; i++) e = n(t[i], i),
            null != e && a.push(e);
            else for (r in t) e = n(t[r], r),
            null != e && a.push(e);
            return c(a)
        },
        w.each = function(t, n) {
            var e, i;
            if (o(t)) {
                for (e = 0; e < t.length; e++) if (n.call(t[e], e, t[e]) === !1) return t
            } else for (i in t) if (n.call(t[i], i, t[i]) === !1) return t;
            return t
        },
        w.grep = function(t, n) {
            return U.call(t, n)
        },
        window.JSON && (w.parseJSON = JSON.parse),
        w.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),
        function(t, n) {
            Z["[object " + n + "]"] = n.toLowerCase()
        }),
        w.fn = {
            forEach: F.forEach,
            reduce: F.reduce,
            push: F.push,
            sort: F.sort,
            indexOf: F.indexOf,
            concat: F.concat,
            map: function(t) {
                return w(w.map(this,
                function(n, e) {
                    return t.call(n, e, n)
                }))
            },
            slice: function() {
                return w(x.apply(this, arguments))
            },
            ready: function(t) {
                return P.test(T.readyState) && T.body ? t(w) : T.addEventListener("DOMContentLoaded",
                function() {
                    t(w)
                },
                !1),
                this
            },
            get: function(t) {
                return t === y ? x.call(this) : this[t >= 0 ? t: t + this.length]
            },
            toArray: function() {
                return this.get()
            },
            size: function() {
                return this.length
            },
            remove: function() {
                return this.each(function() {
                    null != this.parentNode && this.parentNode.removeChild(this)
                })
            },
            each: function(t) {
                return F.every.call(this,
                function(n, e) {
                    return t.call(n, e, n) !== !1
                }),
                this
            },
            filter: function(t) {
                return n(t) ? this.not(this.not(t)) : w(U.call(this,
                function(n) {
                    return _.matches(n, t)
                }))
            },
            add: function(t, n) {
                return w(Q(this.concat(w(t, n))))
            },
            is: function(t) {
                return this.length > 0 && _.matches(this[0], t)
            },
            not: function(t) {
                var e = [];
                if (n(t) && t.call !== y) this.each(function(n) {
                    t.call(this, n) || e.push(this)
                });
                else {
                    var i = "string" == typeof t ? this.filter(t) : o(t) && n(t.item) ? x.call(t) : w(t);
                    this.forEach(function(t) {
                        i.indexOf(t) < 0 && e.push(t)
                    })
                }
                return w(e)
            },
            has: function(t) {
                return this.filter(function() {
                    return r(t) ? w.contains(this, t) : w(this).find(t).size()
                })
            },
            eq: function(t) {
                return - 1 === t ? this.slice(t) : this.slice(t, +t + 1)
            },
            first: function() {
                var t = this[0];
                return t && !r(t) ? t: w(t)
            },
            last: function() {
                var t = this[this.length - 1];
                return t && !r(t) ? t: w(t)
            },
            find: function(t) {
                var n, e = this;
                return n = t ? "object" == typeof t ? w(t).filter(function() {
                    var t = this;
                    return F.some.call(e,
                    function(n) {
                        return w.contains(n, t)
                    })
                }) : 1 == this.length ? w(_.qsa(this[0], t)) : this.map(function() {
                    return _.qsa(this, t)
                }) : []
            },
            closest: function(t, n) {
                var e = this[0],
                r = !1;
                for ("object" == typeof t && (r = w(t)); e && !(r ? r.indexOf(e) >= 0 : _.matches(e, t));) e = e !== n && !i(e) && e.parentNode;
                return w(e)
            },
            parents: function(t) {
                for (var n = [], e = this; e.length > 0;) e = w.map(e,
                function(t) {
                    return (t = t.parentNode) && !i(t) && n.indexOf(t) < 0 ? (n.push(t), t) : void 0
                });
                return d(n, t)
            },
            parent: function(t) {
                return d(Q(this.pluck("parentNode")), t)
            },
            children: function(t) {
                return d(this.map(function() {
                    return p(this)
                }), t)
            },
            contents: function() {
                return this.map(function() {
                    return x.call(this.childNodes)
                })
            },
            siblings: function(t) {
                return d(this.map(function(t, n) {
                    return U.call(p(n.parentNode),
                    function(t) {
                        return t !== n
                    })
                }), t)
            },
            empty: function() {
                return this.each(function() {
                    this.innerHTML = ""
                })
            },
            pluck: function(t) {
                return w.map(this,
                function(n) {
                    return n[t]
                })
            },
            show: function() {
                return this.each(function() {
                    "none" == this.style.display && (this.style.display = ""),
                    "none" == getComputedStyle(this, "").getPropertyValue("display") && (this.style.display = f(this.nodeName))
                })
            },
            replaceWith: function(t) {
                return this.before(t).remove()
            },
            wrap: function(t) {
                var e = n(t);
                if (this[0] && !e) var i = w(t).get(0),
                r = i.parentNode || this.length > 1;
                return this.each(function(n) {
                    w(this).wrapAll(e ? t.call(this, n) : r ? i.cloneNode(!0) : i)
                })
            },
            wrapAll: function(t) {
                if (this[0]) {
                    w(this[0]).before(t = w(t));
                    for (var n; (n = t.children()).length;) t = n.first();
                    w(t).append(this)
                }
                return this
            },
            wrapInner: function(t) {
                var e = n(t);
                return this.each(function(n) {
                    var i = w(this),
                    r = i.contents(),
                    a = e ? t.call(this, n) : t;
                    r.length ? r.wrapAll(a) : i.append(a)
                })
            },
            unwrap: function() {
                return this.parent().each(function() {
                    w(this).replaceWith(w(this).children())
                }),
                this
            },
            clone: function() {
                return this.map(function() {
                    return this.cloneNode(!0)
                })
            },
            hide: function() {
                return this.css("display", "none")
            },
            toggle: function(t) {
                return this.each(function() {
                    var n = w(this); (t === y ? "none" == n.css("display") : t) ? n.show() : n.hide()
                })
            },
            prev: function(t) {
                return w(this.pluck("previousElementSibling")).filter(t || "*")
            },
            next: function(t) {
                return w(this.pluck("nextElementSibling")).filter(t || "*")
            },
            html: function(t) {
                return 0 in arguments ? this.each(function(n) {
                    var e = this.innerHTML;
                    w(this).empty().append(m(this, t, n, e))
                }) : 0 in this ? this[0].innerHTML: null
            },
            text: function(t) {
                return 0 in arguments ? this.each(function(n) {
                    var e = m(this, t, n, this.textContent);
                    this.textContent = null == e ? "": "" + e
                }) : 0 in this ? this[0].textContent: null
            },
            attr: function(t, n) {
                var e;
                return "string" != typeof t || 1 in arguments ? this.each(function(e) {
                    if (1 === this.nodeType) if (r(t)) for (C in t) b(this, C, t[C]);
                    else b(this, t, m(this, n, e, this.getAttribute(t)))
                }) : this.length && 1 === this[0].nodeType ? !(e = this[0].getAttribute(t)) && t in this[0] ? this[0][t] : e: y
            },
            removeAttr: function(t) {
                return this.each(function() {
                    1 === this.nodeType && b(this, t)
                })
            },
            prop: function(t, n) {
                return t = G[t] || t,
                1 in arguments ? this.each(function(e) {
                    this[t] = m(this, n, e, this[t])
                }) : this[0] && this[0][t]
            },
            data: function(t, n) {
                var e = "data-" + t.replace(V, "-$1").toLowerCase(),
                i = 1 in arguments ? this.attr(e, n) : this.attr(e);
                return null !== i ? A(i) : y
            },
            val: function(t) {
                return 0 in arguments ? this.each(function(n) {
                    this.value = m(this, t, n, this.value)
                }) : this[0] && (this[0].multiple ? w(this[0]).find("option").filter(function() {
                    return this.selected
                }).pluck("value") : this[0].value)
            },
            offset: function(t) {
                if (t) return this.each(function(n) {
                    var e = w(this),
                    i = m(this, t, n, e.offset()),
                    r = e.offsetParent().offset(),
                    a = {
                        top: i.top - r.top,
                        left: i.left - r.left
                    };
                    "static" == e.css("position") && (a.position = "relative"),
                    e.css(a)
                });
                if (!this.length) return null;
                var n = this[0].getBoundingClientRect();
                return {
                    left: n.left + window.pageXOffset,
                    top: n.top + window.pageYOffset,
                    width: Math.round(n.width),
                    height: Math.round(n.height)
                }
            },
            css: function(n, e) {
                if (arguments.length < 2) {
                    var i = this[0],
                    r = getComputedStyle(i, "");
                    if (!i) return;
                    if ("string" == typeof n) return i.style[I(n)] || r.getPropertyValue(n);
                    if (X(n)) {
                        var a = {};
                        return w.each(X(n) ? n: [n],
                        function(t, n) {
                            a[n] = i.style[I(n)] || r.getPropertyValue(n)
                        }),
                        a
                    }
                }
                var o = "";
                if ("string" == t(n)) e || 0 === e ? o = u(n) + ":" + l(n, e) : this.each(function() {
                    this.style.removeProperty(u(n))
                });
                else for (C in n) n[C] || 0 === n[C] ? o += u(C) + ":" + l(C, n[C]) + ";": this.each(function() {
                    this.style.removeProperty(u(C))
                });
                return this.each(function() {
                    this.style.cssText += ";" + o
                })
            },
            index: function(t) {
                return t ? this.indexOf(w(t)[0]) : this.parent().children().indexOf(this[0])
            },
            hasClass: function(t) {
                return !! t && F.some.call(this,
                function(t) {
                    return this.test(v(t))
                },
                h(t))
            },
            addClass: function(t) {
                return t ? this.each(function(n) {
                    B = [];
                    var e = v(this),
                    i = m(this, t, n, e);
                    i.split(/\s+/g).forEach(function(t) {
                        w(this).hasClass(t) || B.push(t)
                    },
                    this),
                    B.length && v(this, e + (e ? " ": "") + B.join(" "))
                }) : this
            },
            removeClass: function(t) {
                return this.each(function(n) {
                    return t === y ? v(this, "") : (B = v(this), m(this, t, n, B).split(/\s+/g).forEach(function(t) {
                        B = B.replace(h(t), " ")
                    }), void v(this, B.trim()))
                })
            },
            toggleClass: function(t, n) {
                return t ? this.each(function(e) {
                    var i = w(this),
                    r = m(this, t, e, v(this));
                    r.split(/\s+/g).forEach(function(t) { (n === y ? !i.hasClass(t) : n) ? i.addClass(t) : i.removeClass(t)
                    })
                }) : this
            },
            scrollTop: function(t) {
                if (this.length) {
                    var n = "scrollTop" in this[0];
                    return t === y ? n ? this[0].scrollTop: this[0].pageYOffset: this.each(n ?
                    function() {
                        this.scrollTop = t
                    }: function() {
                        this.scrollTo(this.scrollX, t)
                    })
                }
            },
            scrollLeft: function(t) {
                if (this.length) {
                    var n = "scrollLeft" in this[0];
                    return t === y ? n ? this[0].scrollLeft: this[0].pageXOffset: this.each(n ?
                    function() {
                        this.scrollLeft = t
                    }: function() {
                        this.scrollTo(t, this.scrollY)
                    })
                }
            },
            position: function() {
                if (this.length) {
                    var t = this[0],
                    n = this.offsetParent(),
                    e = this.offset(),
                    i = k.test(n[0].nodeName) ? {
                        top: 0,
                        left: 0
                    }: n.offset();
                    return e.top -= parseFloat(w(t).css("margin-top")) || 0,
                    e.left -= parseFloat(w(t).css("margin-left")) || 0,
                    i.top += parseFloat(w(n[0]).css("border-top-width")) || 0,
                    i.left += parseFloat(w(n[0]).css("border-left-width")) || 0,
                    {
                        top: e.top - i.top,
                        left: e.left - i.left
                    }
                }
            },
            offsetParent: function() {
                return this.map(function() {
                    for (var t = this.offsetParent || T.body; t && !k.test(t.nodeName) && "static" == w(t).css("position");) t = t.offsetParent;
                    return t
                })
            }
        },
        w.fn.detach = w.fn.remove,
        ["width", "height"].forEach(function(t) {
            var n = t.replace(/./,
            function(t) {
                return t[0].toUpperCase()
            });
            w.fn[t] = function(r) {
                var a, o = this[0];
                return r === y ? e(o) ? o["inner" + n] : i(o) ? o.documentElement["scroll" + n] : (a = this.offset()) && a[t] : this.each(function(n) {
                    o = w(this),
                    o.css(t, m(this, r, n, o[t]()))
                })
            }
        }),
        K.forEach(function(n, e) {
            var i = e % 2;
            w.fn[n] = function() {
                var n, r, a = w.map(arguments,
                function(e) {
                    return n = t(e),
                    "object" == n || "array" == n || null == e ? e: _.fragment(e)
                }),
                o = this.length > 1;
                return a.length < 1 ? this: this.each(function(t, n) {
                    r = i ? n: n.parentNode,
                    n = 0 == e ? n.nextSibling: 1 == e ? n.firstChild: 2 == e ? n: null;
                    var s = w.contains(T.documentElement, r);
                    a.forEach(function(t) {
                        if (o) t = t.cloneNode(!0);
                        else if (!r) return w(t).remove();
                        r.insertBefore(t, n),
                        s && E(t,
                        function(t) {
                            null == t.nodeName || "SCRIPT" !== t.nodeName.toUpperCase() || t.type && "text/javascript" !== t.type || t.src || window.eval.call(window, t.innerHTML)
                        })
                    })
                })
            },
            w.fn[i ? n + "To": "insert" + (e ? "Before": "After")] = function(t) {
                return w(t)[n](this),
                this
            }
        }),
        _.Z.prototype = w.fn,
        _.uniq = Q,
        _.deserializeValue = A,
        w.zepto = _,
        w
    } ();
    window.Zepto = e,
    void 0 === window.$ && (window.$ = e),
    function(t) {
        function n(t) {
            return t._zid || (t._zid = f++)
        }
        function e(t, e, a, o) {
            if (e = i(e), e.ns) var s = r(e.ns);
            return (m[n(t)] || []).filter(function(t) {
                return ! (!t || e.e && t.e != e.e || e.ns && !s.test(t.ns) || a && n(t.fn) !== n(a) || o && t.sel != o)
            })
        }
        function i(t) {
            var n = ("" + t).split(".");
            return {
                e: n[0],
                ns: n.slice(1).sort().join(" ")
            }
        }
        function r(t) {
            return new RegExp("(?:^| )" + t.replace(" ", " .* ?") + "(?: |$)")
        }
        function a(t, n) {
            return t.del && !v && t.e in A || !!n
        }
        function o(t) {
            return E[t] || v && A[t] || t
        }
        function s(e, r, s, c, h, f, p) {
            var g = n(e),
            d = m[g] || (m[g] = []);
            r.split(/\s/).forEach(function(n) {
                if ("ready" == n) return t(document).ready(s);
                var r = i(n);
                r.fn = s,
                r.sel = h,
                r.e in E && (s = function(n) {
                    var e = n.relatedTarget;
                    return ! e || e !== this && !t.contains(this, e) ? r.fn.apply(this, arguments) : void 0
                }),
                r.del = f;
                var g = f || s;
                r.proxy = function(t) {
                    if (t = u(t), !t.isImmediatePropagationStopped()) {
                        t.data = c;
                        var n = g.apply(e, t._args == l ? [t] : [t].concat(t._args));
                        return n === !1 && (t.preventDefault(), t.stopPropagation()),
                        n
                    }
                },
                r.i = d.length,
                d.push(r),
                "addEventListener" in e && e.addEventListener(o(r.e), r.proxy, a(r, p))
            })
        }
        function c(t, i, r, s, c) {
            var u = n(t); (i || "").split(/\s/).forEach(function(n) {
                e(t, n, r, s).forEach(function(n) {
                    delete m[u][n.i],
                    "removeEventListener" in t && t.removeEventListener(o(n.e), n.proxy, a(n, c))
                })
            })
        }
        function u(n, e) {
            return (e || !n.isDefaultPrevented) && (e || (e = n), t.each(B,
            function(t, i) {
                var r = e[t];
                n[t] = function() {
                    return this[i] = y,
                    r && r.apply(e, arguments)
                },
                n[i] = C
            }), (e.defaultPrevented !== l ? e.defaultPrevented: "returnValue" in e ? e.returnValue === !1 : e.getPreventDefault && e.getPreventDefault()) && (n.isDefaultPrevented = y)),
            n
        }
        function h(t) {
            var n, e = {
                originalEvent: t
            };
            for (n in t) w.test(n) || t[n] === l || (e[n] = t[n]);
            return u(e, t)
        }
        var l, f = 1,
        p = Array.prototype.slice,
        g = t.isFunction,
        d = function(t) {
            return "string" == typeof t
        },
        m = {},
        b = {},
        v = "onfocusin" in window,
        A = {
            focus: "focusin",
            blur: "focusout"
        },
        E = {
            mouseenter: "mouseover",
            mouseleave: "mouseout"
        };
        b.click = b.mousedown = b.mouseup = b.mousemove = "MouseEvents",
        t.event = {
            add: s,
            remove: c
        },
        t.proxy = function(e, i) {
            var r = 2 in arguments && p.call(arguments, 2);
            if (g(e)) {
                var a = function() {
                    return e.apply(i, r ? r.concat(p.call(arguments)) : arguments)
                };
                return a._zid = n(e),
                a
            }
            if (d(i)) return r ? (r.unshift(e[i], e), t.proxy.apply(null, r)) : t.proxy(e[i], e);
            throw new TypeError("expected function")
        },
        t.fn.bind = function(t, n, e) {
            return this.on(t, n, e)
        },
        t.fn.unbind = function(t, n) {
            return this.off(t, n)
        },
        t.fn.one = function(t, n, e, i) {
            return this.on(t, n, e, i, 1)
        };
        var y = function() {
            return ! 0
        },
        C = function() {
            return ! 1
        },
        w = /^([A-Z]|returnValue$|layer[XY]$)/,
        B = {
            preventDefault: "isDefaultPrevented",
            stopImmediatePropagation: "isImmediatePropagationStopped",
            stopPropagation: "isPropagationStopped"
        };
        t.fn.delegate = function(t, n, e) {
            return this.on(n, t, e)
        },
        t.fn.undelegate = function(t, n, e) {
            return this.off(n, t, e)
        },
        t.fn.live = function(n, e) {
            return t(document.body).delegate(this.selector, n, e),
            this
        },
        t.fn.die = function(n, e) {
            return t(document.body).undelegate(this.selector, n, e),
            this
        },
        t.fn.on = function(n, e, i, r, a) {
            var o, u, f = this;
            return n && !d(n) ? (t.each(n,
            function(t, n) {
                f.on(t, e, i, n, a)
            }), f) : (d(e) || g(r) || r === !1 || (r = i, i = e, e = l), (g(i) || i === !1) && (r = i, i = l), r === !1 && (r = C), f.each(function(l, f) {
                a && (o = function(t) {
                    return c(f, t.type, r),
                    r.apply(this, arguments)
                }),
                e && (u = function(n) {
                    var i, a = t(n.target).closest(e, f).get(0);
                    return a && a !== f ? (i = t.extend(h(n), {
                        currentTarget: a,
                        liveFired: f
                    }), (o || r).apply(a, [i].concat(p.call(arguments, 1)))) : void 0;
                }),
                s(f, n, r, i, e, u || o)
            }))
        },
        t.fn.off = function(n, e, i) {
            var r = this;
            return n && !d(n) ? (t.each(n,
            function(t, n) {
                r.off(t, e, n)
            }), r) : (d(e) || g(i) || i === !1 || (i = e, e = l), i === !1 && (i = C), r.each(function() {
                c(this, n, i, e)
            }))
        },
        t.fn.trigger = function(n, e) {
            return n = d(n) || t.isPlainObject(n) ? t.Event(n) : u(n),
            n._args = e,
            this.each(function() {
                "dispatchEvent" in this ? this.dispatchEvent(n) : t(this).triggerHandler(n, e)
            })
        },
        t.fn.triggerHandler = function(n, i) {
            var r, a;
            return this.each(function(o, s) {
                r = h(d(n) ? t.Event(n) : n),
                r._args = i,
                r.target = s,
                t.each(e(s, n.type || n),
                function(t, n) {
                    return a = n.proxy(r),
                    !r.isImmediatePropagationStopped() && void 0
                })
            }),
            a
        },
        "focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select keydown keypress keyup error".split(" ").forEach(function(n) {
            t.fn[n] = function(t) {
                return t ? this.bind(n, t) : this.trigger(n)
            }
        }),
        ["focus", "blur"].forEach(function(n) {
            t.fn[n] = function(t) {
                return t ? this.bind(n, t) : this.each(function() {
                    try {
                        this[n]()
                    } catch(t) {}
                }),
                this
            }
        }),
        t.Event = function(t, n) {
            d(t) || (n = t, t = n.type);
            var e = document.createEvent(b[t] || "Events"),
            i = !0;
            if (n) for (var r in n)"bubbles" == r ? i = !!n[r] : e[r] = n[r];
            return e.initEvent(t, i, !0),
            u(e)
        }
    } (e),
    function(t) {
        function n(n, e, i) {
            var r = t.Event(e);
            return t(n).trigger(r, i),
            !r.isDefaultPrevented()
        }
        function e(t, e, i, r) {
            return t.global ? n(e || v, i, r) : void 0
        }
        function i(n) {
            n.global && 0 === t.active++&&e(n, null, "ajaxStart")
        }
        function r(n) {
            n.global && !--t.active && e(n, null, "ajaxStop")
        }
        function a(t, n) {
            var i = n.context;
            return n.beforeSend.call(i, t, n) !== !1 && e(n, i, "ajaxBeforeSend", [t, n]) !== !1 && void e(n, i, "ajaxSend", [t, n])
        }
        function o(t, n, i, r) {
            var a = i.context,
            o = "success";
            i.success.call(a, t, o, n),
            r && r.resolveWith(a, [t, o, n]),
            e(i, a, "ajaxSuccess", [n, i, t]),
            c(o, n, i)
        }
        function s(t, n, i, r, a) {
            var o = r.context;
            r.error.call(o, i, n, t),
            a && a.rejectWith(o, [i, n, t]),
            e(r, o, "ajaxError", [i, r, t || n]),
            c(n, i, r)
        }
        function c(t, n, i) {
            var a = i.context;
            i.complete.call(a, n, t),
            e(i, a, "ajaxComplete", [n, i]),
            r(i)
        }
        function u() {}
        function h(t) {
            return t && (t = t.split(";", 2)[0]),
            t && (t == w ? "html": t == C ? "json": E.test(t) ? "script": y.test(t) && "xml") || "text"
        }
        function l(t, n) {
            return "" == n ? t: (t + "&" + n).replace(/[&?]{1,2}/, "?")
        }
        function f(n) {
            n.processData && n.data && "string" != t.type(n.data) && (n.data = t.param(n.data, n.traditional)),
            !n.data || n.type && "GET" != n.type.toUpperCase() || (n.url = l(n.url, n.data), n.data = void 0)
        }
        function p(n, e, i, r) {
            return t.isFunction(e) && (r = i, i = e, e = void 0),
            t.isFunction(i) || (r = i, i = void 0),
            {
                url: n,
                data: e,
                success: i,
                dataType: r
            }
        }
        function g(n, e, i, r) {
            var a, o = t.isArray(e),
            s = t.isPlainObject(e);
            t.each(e,
            function(e, c) {
                a = t.type(c),
                r && (e = i ? r: r + "[" + (s || "object" == a || "array" == a ? e: "") + "]"),
                !r && o ? n.add(c.name, c.value) : "array" == a || !i && "object" == a ? g(n, c, i, e) : n.add(e, c)
            })
        }
        var d, m, b = 0,
        v = window.document,
        A = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
        E = /^(?:text|application)\/javascript/i,
        y = /^(?:text|application)\/xml/i,
        C = "application/json",
        w = "text/html",
        B = /^\s*$/;
        t.active = 0,
        t.ajaxJSONP = function(n, e) {
            if (! ("type" in n)) return t.ajax(n);
            var i, r, c = n.jsonpCallback,
            u = (t.isFunction(c) ? c() : c) || "jsonp" + ++b,
            h = v.createElement("script"),
            l = window[u],
            f = function(n) {
                t(h).triggerHandler("error", n || "abort")
            },
            p = {
                abort: f
            };
            return e && e.promise(p),
            t(h).on("load error",
            function(a, c) {
                clearTimeout(r),
                t(h).off().remove(),
                "error" != a.type && i ? o(i[0], p, n, e) : s(null, c || "error", p, n, e),
                window[u] = l,
                i && t.isFunction(l) && l(i[0]),
                l = i = void 0
            }),
            a(p, n) === !1 ? (f("abort"), p) : (window[u] = function() {
                i = arguments
            },
            h.src = n.url.replace(/\?(.+)=\?/, "?$1=" + u), v.head.appendChild(h), n.timeout > 0 && (r = setTimeout(function() {
                f("timeout")
            },
            n.timeout)), p)
        },
        t.ajaxSettings = {
            type: "GET",
            beforeSend: u,
            success: u,
            error: u,
            complete: u,
            context: null,
            global: !0,
            xhr: function() {
                return new window.XMLHttpRequest
            },
            accepts: {
                script: "text/javascript, application/javascript, application/x-javascript",
                json: C,
                xml: "application/xml, text/xml",
                html: w,
                text: "text/plain"
            },
            crossDomain: !1,
            timeout: 0,
            processData: !0,
            cache: !0
        },
        t.ajax = function(n) {
            var e = t.extend({},
            n || {}),
            r = t.Deferred && t.Deferred();
            for (d in t.ajaxSettings) void 0 === e[d] && (e[d] = t.ajaxSettings[d]);
            i(e),
            e.crossDomain || (e.crossDomain = /^([\w-]+:)?\/\/([^\/]+)/.test(e.url) && RegExp.$2 != window.location.host),
            e.url || (e.url = window.location.toString()),
            f(e);
            var c = e.dataType,
            p = /\?.+=\?/.test(e.url);
            if (p && (c = "jsonp"), e.cache !== !1 && (n && n.cache === !0 || "script" != c && "jsonp" != c) || (e.url = l(e.url, "_=" + Date.now())), "jsonp" == c) return p || (e.url = l(e.url, e.jsonp ? e.jsonp + "=?": e.jsonp === !1 ? "": "callback=?")),
            t.ajaxJSONP(e, r);
            var g, b = e.accepts[c],
            v = {},
            A = function(t, n) {
                v[t.toLowerCase()] = [t, n]
            },
            E = /^([\w-]+:)\/\//.test(e.url) ? RegExp.$1: window.location.protocol,
            y = e.xhr(),
            C = y.setRequestHeader;
            if (r && r.promise(y), e.crossDomain || A("X-Requested-With", "XMLHttpRequest"), A("Accept", b || "*/*"), (b = e.mimeType || b) && (b.indexOf(",") > -1 && (b = b.split(",", 2)[0]), y.overrideMimeType && y.overrideMimeType(b)), (e.contentType || e.contentType !== !1 && e.data && "GET" != e.type.toUpperCase()) && A("Content-Type", e.contentType || "application/x-www-form-urlencoded"), e.headers) for (m in e.headers) A(m, e.headers[m]);
            if (y.setRequestHeader = A, y.onreadystatechange = function() {
                if (4 == y.readyState) {
                    y.onreadystatechange = u,
                    clearTimeout(g);
                    var n, i = !1;
                    if (y.status >= 200 && y.status < 300 || 304 == y.status || 0 == y.status && "file:" == E) {
                        c = c || h(e.mimeType || y.getResponseHeader("content-type")),
                        n = y.responseText;
                        try {
                            "script" == c ? (0, eval)(n) : "xml" == c ? n = y.responseXML: "json" == c && (n = B.test(n) ? null: t.parseJSON(n))
                        } catch(t) {
                            i = t
                        }
                        i ? s(i, "parsererror", y, e, r) : o(n, y, e, r)
                    } else s(y.statusText || null, y.status ? "error": "abort", y, e, r)
                }
            },
            a(y, e) === !1) return y.abort(),
            s(null, "abort", y, e, r),
            y;
            if (e.xhrFields) for (m in e.xhrFields) y[m] = e.xhrFields[m];
            var w = !("async" in e) || e.async;
            y.open(e.type, e.url, w, e.username, e.password);
            for (m in v) C.apply(y, v[m]);
            return e.timeout > 0 && (g = setTimeout(function() {
                y.onreadystatechange = u,
                y.abort(),
                s(null, "timeout", y, e, r)
            },
            e.timeout)),
            y.send(e.data ? e.data: null),
            y
        },
        t.get = function() {
            return t.ajax(p.apply(null, arguments))
        },
        t.post = function() {
            var n = p.apply(null, arguments);
            return n.type = "POST",
            t.ajax(n)
        },
        t.getJSON = function() {
            var n = p.apply(null, arguments);
            return n.dataType = "json",
            t.ajax(n)
        },
        t.fn.load = function(n, e, i) {
            if (!this.length) return this;
            var r, a = this,
            o = n.split(/\s/),
            s = p(n, e, i),
            c = s.success;
            return o.length > 1 && (s.url = o[0], r = o[1]),
            s.success = function(n) {
                a.html(r ? t("<div>").html(n.replace(A, "")).find(r) : n),
                c && c.apply(a, arguments)
            },
            t.ajax(s),
            this
        };
        var I = encodeURIComponent;
        t.param = function(t, n) {
            var e = [];
            return e.add = function(t, n) {
                this.push(I(t) + "=" + I(n))
            },
            g(e, t, n),
            e.join("&").replace(/%20/g, "+")
        }
    } (e),
    function(t) {
        t.fn.serializeArray = function() {
            var n, e = [];
            return t([].slice.call(this.get(0).elements)).each(function() {
                n = t(this);
                var i = n.attr("type");
                "fieldset" != this.nodeName.toLowerCase() && !this.disabled && "submit" != i && "reset" != i && "button" != i && ("radio" != i && "checkbox" != i || this.checked) && e.push({
                    name: n.attr("name"),
                    value: n.val()
                })
            }),
            e
        },
        t.fn.serialize = function() {
            var t = [];
            return this.serializeArray().forEach(function(n) {
                t.push(encodeURIComponent(n.name) + "=" + encodeURIComponent(n.value))
            }),
            t.join("&")
        },
        t.fn.submit = function(n) {
            if (n) this.bind("submit", n);
            else if (this.length) {
                var e = t.Event("submit");
                this.eq(0).trigger(e),
                e.isDefaultPrevented() || this.get(0).submit()
            }
            return this
        }
    } (e),
    function(t) {
        "__proto__" in {} || t.extend(t.zepto, {
            Z: function(n, e) {
                return n = n || [],
                t.extend(n, t.fn),
                n.selector = e || "",
                n.__Z = !0,
                n
            },
            isZ: function(n) {
                return "array" === t.type(n) && "__Z" in n
            }
        });
        try {
            getComputedStyle(void 0)
        } catch(t) {
            var n = getComputedStyle;
            window.getComputedStyle = function(t) {
                try {
                    return n(t)
                } catch(t) {
                    return null
                }
            }
        }
    } (e)
},
function(t, n, e) { (function(n) {
        var i = e(5),
        r = n.Class.extend({
            initialize: function(t, n) {
                this.preloadMax = 0,
                this.preloadId = 0,
                this.angleStep = 15,
                this.angleMax = this.angleStep * (i.page.length - 1) / 180 * Math.PI,
                this.geo = new THREE.PlaneGeometry(t, n),
                this.geo.translate( - t / 2, 0, 0),
                this.initBasic(),
                this.initPlane()
            },
            checkPreload: function() {
                this.trigger("preloadProgress", Math.floor(this.preloadId / this.preloadMax * 100)),
                this.preloadId >= this.preloadMax && this.trigger("preloadComplete")
            },
            initBasic: function() {
                this.basic = {};
                for (var t = 0,
                n = i.basic.length; t < n; t++) {
                    var e = i.basic[t];
                    this.basic[e.id] = new THREE.MeshPhongMaterial({
                        map: (new THREE.TextureLoader).load(i.root + e.img),
                        alphaTest: .5,
                        transparent: !0
                    })
                }
            },
            initPlane: function() {
                var t = this,
                n = new THREE.Group;
                this.planes = [];
                for (var e = 0,
                r = i.page.length; e < r; e++) {
                    var a = i.page[e],
                    o = null,
                    s = null;
                    a.basic && (o = this.basic[a.basic]),
                    a.img && (this.preloadMax++, s = new THREE.MeshPhongMaterial({
                        map: (new THREE.TextureLoader).load(i.root + a.img,
                        function() {
                            t.preloadId++,
                            t.checkPreload()
                        }),
                        alphaTest: .5,
                        transparent: !0
                    }));
                    var c;
                    if (o) {
                        if (c = new THREE.Mesh(this.geo, o), c.rotation.set(0, -this.angleStep * e / 180 * Math.PI, 0), s) {
                            var u = new THREE.Mesh(this.geo, s);
                            c.add(u)
                        }
                    } else s && (c = new THREE.Mesh(this.geo, s), c.rotation.set(0, -this.angleStep * e / 180 * Math.PI, 0));
                    n.add(c),
                    this.planes.push(c)
                }
                this.el = n
            },
            checkPlane: function() {
                for (var t = this.planes.length,
                n = 0; n < t; n++) {
                    var e = this.planes[n];
                    Math.abs( - e.rotation.y - this.el.rotation.y) < .7 * Math.PI ? e.parent || this.el.add(e) : e.parent && this.el.remove(e)
                }
				
				
            }
        });
        t.exports = r
    }).call(n, e(1))
},
function(t, n) {
    t.exports = {
        root: "./impublic/images/page4/",
        basic: [{
            id: "b1",
            img: "1-0.png"
        },
		{
            id: "b0",
            img: "0.png"
        },
        {
            id: "b2",
            img: "3-0.png"
        },
        {
            id: "b3",
            img: "2-0.png"
        },
        {
            id: "b4",
            img: "4-0.png"
        },
        {
            id: "b5",
            img: "5-0.png"
        },
        {
            id: "b6",
            img: "6-0.png"
        },
        {
            id: "b7",
            img: "7-0.png"
        },
        {
            id: "b8",
            img: "8-0.png"
        },
		{
            id: "b9",
            img: "9-0.png"
        },
		{
            id: "b10",
            img: "10-0.png"
        },
		{
            id: "b11",
            img: "11-0.png"
        },
		{
            id: "b12",
            img: "12-0.png"
        },
		{
            id: "b13",
            img: "13-0.png"
        },
		{
            id: "b14",
            img: "14-0.png"
        },
		],
        page: [{
            basic: "b0",
            img: "1-1.png"
        },
        {
            basic: "b4"
        },
        {
            basic: "b4"
        },
		{
            basic: "b4"
        },
        {
            basic: "b4",
            img: "4-1.png"
        },
        {
            basic: "b4"
        },
        {
            basic: "b4"
        },
		{
            basic: "b4",
            img: "4-2.png"
        },
        {
            basic: "b4"
        },
		{
            basic: "b4"
        },
		{
            basic: "b4",
            img: "4-3.png"
        },
		{
            basic: "b4"
        },
		{
            basic: "b4"
        },
		{
            basic: "b4",
            img: "4-4.png"
        },
		{
            basic: "b4"
        },
		{
            basic: "b4"
        },
		{
            basic: "b4",
            img: "4-5.png"
        },
        {
            basic: "b2"
        },
        {
            basic: "b2"
        },
		{
            basic: "b2",
            img: "2-1.png"
        },
        {
            basic: "b2"
        },
        {
            basic: "b2"
        },
        {
            basic: "b2",
            img: "2-2.png"
        },
        {
            basic: "b3"
        },
        {
            basic: "b3"
        },
        {
            basic: "b3",
			img:"3-1.png"
        },
        {
            basic: "b3"
        },
		{
            basic: "b3"
        },
        {
            basic: "b3",
            img: "3-2.png"
        },
        {
            basic: "b1"
        },
        {
            basic: "b1"
        },
        {
            basic: "b1",
			img:"1-2.png"
        },
        {
            basic: "b1"
        },
        {
            basic: "b1"
        },
        {
            basic: "b1",
			img:"1-3.png"
        },
        {
            basic: "b1"
        },
        {
            basic: "b1"
        },
        {
            basic: "b1",
            img: "1-4.png"
        },
		{
            basic: "b1"
        },
        {
            basic: "b1"
        },
        {
            basic: "b1",
            img: "1-5.png"
        },
        {
            basic: "b5"
           
        },
        {
            basic: "b5"
        },
        {
            basic: "b5",
            img: "5-1.png"
        },
		 {
            basic: "b5"
           
        },
        {
            basic: "b5"
        },
        {
            basic: "b5",
            img: "5-2.png"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6",
            img: "6-1.png"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6",
			img:"6-2.png"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6",
			img:"6-3.png"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7",
            img: "7-1.png"
        },
		{
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7",
            img: "7-2.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8",
			img:"8-1.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8",
			img:"8-2.png"
        },
        {
            basic: "b9"
        },
        {
            basic: "b9"
        },
        {
            basic: "b9",
            img: "9-1.png"
        },
        {
            basic: "b9"
        },
        {
            basic: "b9"
        },
        {
			basic: "b9",
            img: "9-2.png"
        },
        {
            basic: "b10"
        },
        {
            basic: "b10"
        },
        {
            basic: "b10",
            img: "10-1.png"
        },
        {
            basic: "b10"
        },
        {
            basic: "b10"
        },
        {
            basic: "b10",
            img: "10-2.png"
        },
        {
            basic: "b11"
        },
        {
            basic: "b9"
        },
        {
            basic: "b11",
            img: "11-1.png"
        },
        {
            basic: "b11" 
        },
        {
            basic: "b9"
        },
        {
            basic: "b11",
            img: "11-2.png"
        },
        {
            basic: "b11"
        },
        {
            basic: "b11" 
        },
        {
            basic: "b11",
            img: "11-3.png"
        },
        {
            basic: "b9"
        },
        {
            basic: "b12"
        },
        {
            basic: "b12",
            img: "12-1.png"
        },
        {
            basic: "b12"
        },
        {
            basic: "b9"
        },
        {
            basic: "b12",
            img: "12-2.png"
        },
		{
            basic: "b12"
        },
        {
            basic: "b12"
        },
        {
            basic: "b12",
            img: "12-3.png"
        },
        {
            basic: "b8" 
        },
        {
            basic: "b1"
        },
        {
            basic: "b13",
            img: "13-1.png"
        },
        {
            basic: "b13"
        },
        {
            basic: "b8"
        },
        {
            basic: "b13",
            img: "13-2.png"
        },
        {
            basic: "b13"
        },
        {
            basic: "b8"
        },
        {
            basic: "b13",
            img: "13-3.png"
        },
        {
            basic: "b1" 
        },
        {
            basic: "b8"
        },
        {
            basic: "b13",
            img: "13-4.png"
        },
        {
            basic: "b13"
        },
        {
            basic: "b8" 
        },
        {
            basic: "b13",
            img: "13-5.png"
        },
		{
            basic: "b13"
        },
        {
            basic: "b8" 
        },
        {
            basic: "b13",
            img: "13-6.png"
        },
        {
            basic: "b1"
        },
        {
            basic: "b8"
        },
        {
            basic: "b14",
            img: "14-3.png"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6" 
        },
        {
            basic: "b14",
            img: "14-2.png"
        },
		{
            basic: "b6" 
        },
		{
            basic: "b6" 
        },
		{
            basic: "b14",
            img: "14-1.png"
        },
		{
            basic: "b6" 
        },
		{
            basic: "b14" 
        },
		{
            basic: "b14" 
        },
		{
            basic: "b14" 
        },
        /*{
            basic: "b6"
        },
        {
            basic: "b6",
            img: "30.png"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6",
            img: "31.png"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6"
        },
        {
            basic: "b6"
        },
        {
            basic: "b2",
            img: "32.png"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7",
            img: "33.png"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7",
            img: "34.png"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            img: "35.png"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7",
            img: "36.png"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7",
            img: "37.png"
        },
        {
            basic: "b7",
            img: "38.png"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7",
            img: "39.png"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b7"
        },
        {
            basic: "b2",
            img: "40.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8",
            img: "41.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8",
            img: "42.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8",
            img: "43.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8",
            img: "44.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            img: "45.png"
        },
        {
            img: "46.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b2",
            img: "47.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b2",
            img: "48.png"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },
        {
            basic: "b8"
        },*/
        {
            img: "49.png"
        }]
    }
},
function(t, n, e) {
    var i, r;
    /*!
	 * VERSION: 0.1.0
	 * DATE: 2016-7-7
	 * GIT: https://github.com/shrekshrek/components
	 * @author: Shrek.wang
	 **/
    !
    function(e) {
        i = [n],
        r = function(t) {
            window.Gesturer = e(t)
        }.apply(n, i),
        !(void 0 !== r && (t.exports = r))
    } (function(t) {
        function n(t) {
            return Math.sqrt(t.x * t.x + t.y * t.y)
        }
        function e(t, n) {
            return t.x * n.x + t.y * n.y
        }
        function i(t, i) {
            var r = n(t) * n(i);
            if (0 === r) return 0;
            var a = e(t, i) / r;
            return a > 1 && (a = 1),
            Math.acos(a)
        }
        function r(t, n) {
            return t.x * n.y - n.x * t.y
        }
        function a(t, n) {
            var e = i(t, n);
            return r(t, n) > 0 && (e *= -1),
            180 * e / Math.PI
        }
        return t = function() {
            this.initialize.apply(this, arguments)
        },
        t.prototype = {
            initialize: function(t) {
                this.el = t.el,
                this.preV = {
                    x: null,
                    y: null
                },
                this.pinchStartLen = null,
                this.scale = 1,
                this.isDoubleTap = !1,
                this.onRotate = t.onRotate ||
                function() {},
                this.onTouchStart = t.onTouchStart ||
                function() {},
                this.onMultipointStart = t.onMultipointStart ||
                function() {},
                this.onMultipointEnd = t.onMultipointEnd ||
                function() {},
                this.onPinch = t.onPinch ||
                function() {},
                this.onSwipe = t.onSwipe ||
                function() {},
                this.onTap = t.onTap ||
                function() {},
                this.onDoubleTap = t.onDoubleTap ||
                function() {},
                this.onLongTap = t.onLongTap ||
                function() {},
                this.onSingleTap = t.onSingleTap ||
                function() {},
                this.onPressMove = t.onPressMove ||
                function() {},
                this.onTouchMove = t.onTouchMove ||
                function() {},
                this.onTouchEnd = t.onTouchEnd ||
                function() {},
                this.onTouchCancel = t.onTouchCancel ||
                function() {},
                this.delta = null,
                this.last = null,
                this.now = null,
                this.tapTimeout = null,
                this.touchTimeout = null,
                this.longTapTimeout = null,
                this.swipeTimeout = null,
                this.x1 = this.x2 = this.y1 = this.y2 = null,
                this.preTapPosition = {
                    x: null,
                    y: null
                },
                this._touchStart = this._touchStart.bind(this),
                this._touchMove = this._touchMove.bind(this),
                this._touchEnd = this._touchEnd.bind(this),
                this._touchCancel = this._touchCancel.bind(this)
            },
            on: function() {
                this.el.addEventListener("touchstart", this._touchStart, !1),
                this.el.addEventListener("touchmove", this._touchMove, !1),
                this.el.addEventListener("touchend", this._touchEnd, !1),
                this.el.addEventListener("touchcancel", this._touchCancel, !1)
            },
            off: function() {
                this.el.removeEventListener("touchstart", this._touchStart, !1),
                this.el.removeEventListener("touchmove", this._touchMove, !1),
                this.el.removeEventListener("touchend", this._touchEnd, !1),
                this.el.removeEventListener("touchcancel", this._touchCancel, !1)
            },
            destroy: function() {},
            _touchStart: function(t) {
                if (t.touches) {
                    this.now = Date.now(),
                    this.x1 = t.touches[0].pageX,
                    this.y1 = t.touches[0].pageY,
                    this.delta = this.now - (this.last || this.now),
                    this.onTouchStart(t),
                    null !== this.preTapPosition.x && (this.isDoubleTap = this.delta > 0 && this.delta <= 250 && Math.abs(this.preTapPosition.x - this.x1) < 30 && Math.abs(this.preTapPosition.y - this.y1) < 30),
                    this.preTapPosition.x = this.x1,
                    this.preTapPosition.y = this.y1,
                    this.last = this.now;
                    var e = this.preV,
                    i = t.touches.length;
                    if (i > 1) {
                        this._cancelLongTap();
                        var r = {
                            x: t.touches[1].pageX - this.x1,
                            y: t.touches[1].pageY - this.y1
                        };
                        e.x = r.x,
                        e.y = r.y,
                        this.pinchStartLen = this.pinchLen = n(e),
                        this.onMultipointStart(t)
                    }
                    this.longTapTimeout = setTimeout(function() {
                        this.onLongTap(t)
						
                    }.bind(this), 750)
                }
            },
            _touchMove: function(t) {
                if (t.touches) {
                    var e = this.preV,
                    i = t.touches.length,
                    r = t.touches[0].pageX,
                    o = t.touches[0].pageY;
                    if (this.isDoubleTap = !1, i > 1) {
                        var s = {
                            x: t.touches[1].pageX - r,
                            y: t.touches[1].pageY - o
                        };
                        if (null !== e.x) {
                            if (this.pinchStartLen > 0) {
                                var c = n(s);
                                t.scale = c / this.pinchStartLen,
                                t.deltaLen = c - this.pinchLen,
                                this.pinchLen = c,
                                this.onPinch(t)
								
                            }
                            t.angle = a(s, e),
                            this.onRotate(t)
                        }
                        e.x = s.x,
                        e.y = s.y
                    } else null !== this.x2 ? (t.deltaX = r - this.x2, t.deltaY = o - this.y2) : (t.deltaX = 0, t.deltaY = 0),
                    this.onPressMove(t);
                    this.onTouchMove(t),
                    this._cancelLongTap(),
                    this.x2 = r,
                    this.y2 = o,
					
                    t.touches.length > 1 && (this._cancelLongTap(), t.preventDefault())
					
					
					
                }
            },
            _touchEnd: function(t) {
                if (t.changedTouches) {
                    this._cancelLongTap();
                    var n = this;
                    t.touches.length < 2 && this.onMultipointEnd(t),
                    this.onTouchEnd(t),
                    this.x2 && Math.abs(this.x1 - this.x2) > 30 || this.y2 && Math.abs(this.preV.y - this.y2) > 30 ? (t.direction = this._swipeDirection(this.x1, this.x2, this.y1, this.y2), this.swipeTimeout = setTimeout(function() {
                        n.onSwipe(t)
                    },
                    0)) : this.tapTimeout = setTimeout(function() {
                        n.onTap(t),
                        n.isDoubleTap ? (n.onDoubleTap(t), clearTimeout(n.touchTimeout), n.isDoubleTap = !1) : n.touchTimeout = setTimeout(function() {
                            n.onSingleTap(t)
                        },
                        250)
                    },
                    0),
                    this.preV.x = 0,
                    this.preV.y = 0,
                    this.scale = 1,
                    this.pinchStartLen = null,
                    this.x1 = this.x2 = this.y1 = this.y2 = null
                }
            },
            _touchCancel: function(t) {
                clearTimeout(this.touchTimeout),
                clearTimeout(this.tapTimeout),
                clearTimeout(this.longTapTimeout),
                clearTimeout(this.swipeTimeout),
                this.onTouchCancel(t)
            },
            _cancelLongTap: function() {
                clearTimeout(this.longTapTimeout)
            },
            _swipeDirection: function(t, n, e, i) {
                return Math.abs(t - n) >= Math.abs(e - i) ? t - n > 0 ? "Left": "Right": e - i > 0 ? "Up": "Down"
            }
        },
        t
    })
},
function(t, n, e) {
    var i, r;
    /*!
	 * VERSION: 0.3.0
	 * DATE: 2016-8-17
	 * GIT: https://github.com/shrekshrek/jstween
	 * @author: Shrek.wang
	 **/
    !
    function(a) {
        i = [e(2), n],
        r = function(t, n) {
            window.JTL = a(n, t)
        }.apply(n, i),
        !(void 0 !== r && (t.exports = r))
    } (function(t, n) {
        function e(t, n) {
            for (var e in n) t[e] = n[e]
        }
        function i(t) {
            var n = /(^[a-zA-Z]\w*|)(\+=|-=|)(\d*\.\d*|\d*)/,
            e = n.exec(t);
            return {
                label: e[1],
                ext: e[2],
                num: parseFloat(e[3])
            }
        }
        function r() {
            c = !0;
            var t = s.length;
            if (0 === t) return void(c = !1);
            var e = n.now(),
            i = e - u;
            u = e;
            for (var a = t - 1; a >= 0; a--) s[a]._update(i);
            o(r)
        }
        function a() {
            this.initialize.apply(this, arguments)
        }
        var o = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        function(t) {
            window.setTimeout(t, 1e3 / 60)
        },
        s = [],
        c = !1,
        u = 0;
        return e(a.prototype, {
            initialize: function() {
                this.labels = [],
                this.labelTime = 0,
                this.anchors = [],
                this.anchorId = 0,
                this.tweens = [],
                this.isPlaying = !1,
                this.curTime = 0
            },
            _update: function(t) {
                this.isPlaying && (this.curTime += t, this._checkHandler())
            },
            _addSelf: function() {
                s.push(this),
                c || (u = n.now(), r())
            },
            _removeSelf: function() {
                var t = s.indexOf(this); - 1 !== t && s.splice(t, 1)
            },
            _checkHandler: function() {
                var t = this.anchors.length;
                if (this.anchorId >= t) return this._removeSelf(),
                void(this.isPlaying = !1);
                var n = this.anchors[this.anchorId];
                this.curTime >= 1e3 * n.time && (this.anchorId == t - 1 ? (this._removeSelf(), this.isPlaying = !1, n.handler.apply()) : (n.handler.apply(), this.anchorId++, this._checkHandler()))
            },
            _parseTweenTime: function(t, n, e) {
                var i = Math.max(t, 0),
                r = Math.max(n.delay || 0, 0),
                a = Math.max(0, Math.floor(n.repeat || 0)),
                o = Math.max(n.repeatDelay || 0, 0),
                s = r + i + (o + i) * a,
                c = this._parsePosition(e);
                return this.labelTime = Math.max(this.labelTime, c + s),
                c
            },
            _parsePosition: function(t) {
                if (void 0 == t) return this.labelTime;
                var n = i(t),
                e = 0;
                if (n.label) switch (e = this.getLabelTime(n.label), n.ext) {
                case "+=":
                    e += n.num;
                    break;
                case "-=":
                    e -= n.num
                } else e = n.num;
                return e
            },
            _addAnchor: function(t, n) {
                var e = this.anchors.length;
                if (0 == e) return void this.anchors.push({
                    time: n,
                    handler: t
                });
                if (e > 0) for (var i = e - 1; i >= 0; i--) {
                    var r = this.anchors[i];
                    if (n >= r.time) return void this.anchors.splice(i + 1, 0, {
                        time: n,
                        handler: t
                    })
                }
            },
            _addTween: function(t) {
                if (void 0 != t.length) for (var n in t) this.tweens.push(t[n]);
                else this.tweens.push(t)
            },
            _removeTween: function(t) {
                var n = this.tweens.indexOf(t); - 1 !== n && this.tweens.splice(n, 1)
            },
            fromTo: function(t, e, i, r, a) {
                var o = this,
                s = r.onEnd;
                r.onEnd = function(t) {
                    o._removeTween(this),
                    s && s.apply(this, t)
                };
                var c = function() {
                    var a = n.fromTo(t, e, i, r);
                    o._addTween(a)
                },
                u = this._parseTweenTime(e, r, a);
                return this._addAnchor(c, u),
                this
            },
            from: function(t, e, i, r) {
                var a = this,
                o = i.onEnd;
                i.onEnd = function(t) {
                    a._removeTween(this),
                    o && o.apply(this, t)
                };
                var s = function() {
                    var r = n.from(t, e, i);
                    a._addTween(r)
                },
                c = this._parseTweenTime(e, i, r);
                return this._addAnchor(s, c),
                this
            },
            to: function(t, e, i, r) {
                var a = this,
                o = i.onEnd;
                i.onEnd = function(t) {
                    a._removeTween(this),
                    o && o.apply(this, t)
                };
                var s = function() {
                    var r = n.to(t, e, i);
                    a._addTween(r)
                },
                c = this._parseTweenTime(e, i, r);
                return this._addAnchor(s, c),
                this
            },
            kill: function(t, e) {
                var i = function() {
                    n.kill(t, !0)
                },
                r = this._parseTweenTime(0, {},
                e);
                return this._addAnchor(i, r),
                this
            },
            add: function(t, n) {
                var e = this._parsePosition(n);
                switch (typeof t) {
                case "function":
                    this._addAnchor(t, e);
                    break;
                case "string":
                    this.addLabel(t, e);
                    break;
                default:
                    throw "add action is wrong!!!"
                }
                return this
            },
            addLabel: function(t, n) {
                this.removeLabel(t);
                var e = this._parsePosition(n);
                return this.labels.push({
                    name: t,
                    time: e
                }),
                this
            },
            removeLabel: function(t) {
                for (var n = this.labels.length,
                e = n - 1; e >= 0; e--) {
                    var i = this.labels[e];
                    if (t == i.name) return this.labels.splice(e, 1),
                    this
                }
                return this
            },
            getLabelTime: function(t) {
                for (var n = this.labels.length,
                e = n - 1; e >= 0; e--) {
                    var i = this.labels[e];
                    if (t == i.name) return i.time
                }
                return this.labelTime
            },
            totalTime: function() {
                return this.labelTime
            },
            play: function(t) {
                this.isPlaying && this.pause();
                for (var n = this.tweens.length,
                e = n - 1; e >= 0; e--) this.tweens[e].play();
                this._addSelf(),
                this.isPlaying = !0,
                void 0 !== t && this.seek(t)
            },
            pause: function() {
                if (this.isPlaying) {
                    for (var t = this.tweens.length,
                    n = t - 1; n >= 0; n--) this.tweens[n].pause();
                    this._removeSelf(),
                    this.isPlaying = !1
                }
            },
            seek: function(t) {
                var n = this._parsePosition(t);
                this.curTime = 1e3 * n;
                for (var e = this.anchors.length,
                i = 0; e > i; i++) {
                    var r = this.anchors[i];
                    if (1e3 * r.time >= this.curTime) return void(this.anchorId = i)
                }
            },
            clear: function() {
                for (var t = this.tweens.length,
                n = t - 1; n >= 0; n--) this.tweens[n].kill();
                this.tweens = [],
                this.curTime = 0,
                this.labels = [],
                this.labelTime = 0,
                this.anchors = [],
                this.anchorId = 0
            }
        }),
        e(t, {
            create: function() {
                return new a
            },
            kill: function(t) {
                t.clear()
            }
        }),
        t
    })
},
function(t, n) {
    t.exports = "data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QOPaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzA2NyA3OS4xNTc3NDcsIDIwMTUvMDMvMzAtMjM6NDA6NDIgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZjgwZDlmN2YtM2E1Zi00NmI4LWEzMjgtN2MwMTdjMWMxOWYzIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkM3QTUzQjM1Q0M0RjExRTY4NkRDOUQ0NjRGM0YzMUVFIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkM3QTUzQjM0Q0M0RjExRTY4NkRDOUQ0NjRGM0YzMUVFIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE1IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MWRiZGJiNjItODQ0Ny00YWVmLTg1NmUtM2VmYTY4NmE2OWVhIiBzdFJlZjpkb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6YjcxNWI0NmYtMTQ3OS0xMTdhLWJkMDgtYmM2ODkzNThkZGY2Ii8+IDwv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"
}]);