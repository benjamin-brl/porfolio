(() => {
    var Q = Object.create,
    p = Object.defineProperty,
    V = Object.getPrototypeOf,
    E = Object.prototype.hasOwnProperty,
    A = Object.getOwnPropertyNames,
    P = Object.getOwnPropertyDescriptor;
    var q = r => p(r, "__esModule", { value: !0 });
    var D = (r, s) => () => (s || r((s = { exports: {} }).exports, s), s.exports);
    var H = (r, s, o) => {
        if (s && typeof s == "object" || typeof s == "function") for (let n of A(s)) !E.call(r, n) && n !== "default" && p(r, n, { get: () => s[n], enumerable: !(o = P(s, n)) || o.enumerable }); return r }, L = r => H(q(p(r != null ? Q(V(r)) : {}, "default", r && r.__esModule && "default" in r ? { get: () => r.default, enumerable: !0 } : { value: r, enumerable: !0 })), r); var v = D((j, g) => {
            function S(r, s, o) {
                let n = document.createElement("span"); n.innerHTML = o.cursor || "_", n.style = `
                color: currentColor; 
                position: relative; 
                width: 1ch;
                `, n.animate([{ opacity: 0 }, { opacity: 1 }], { duration: o.cursorSpeed || 400, iterations: Infinity, direction: "alternate", easing: "ease-in-out" }); let h = (e, t, { cursor: a }) => { e.innerText = t, e.appendChild(n) }, c = (e, t, a) => new Promise(i => { let d = a.speed * (a.speedVariation ? Math.random() * a.speedVariation : 1); setTimeout(() => (h(e, t, a), i()), d) }), w = (e = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789") => { let t = [...e]; return [...Array(1)].map(a => t[Math.random() * t.length | 0]).join`` }, l = async (e, t, a, i) => new Promise(async d => { let y = t.split(""); if (a === "write") for (let u = 0; u <= y.length; u++) { if (!!i.errorQuota && Math.random() <= i.errorQuota) { let T = w(i.errorCharacterMap); await c(e, t.substr(0, u - 1) + T, i), await c(e, t.substr(0, u - 1), i) } await c(e, t.substr(0, u), i) } if (a === "delete") { h(e, t, i); for (let u = y.length; u >= 0; u--)await c(e, t.substr(0, u), i) } return d() }); function* f(e, t, a) { for (let i = 0; i < t.length; i++)yield () => l(e, t[i], "write", a), (i + 1 < t.length || a.loop) && (yield () => l(e, t[i], "delete", a)) } let m = e => new Promise(t => setTimeout(() => t(), e)), b = async (e, t, a) => { let i = typeof e == "string" ? document.querySelector(e) : e; for (let d of f(i, t, a)) await d(), await m(a.timeout); if (a.loop) return b(e, t, a) }; b(r, s, o)
            } g.exports = S
        });
    var C = L(v()), M = class extends HTMLElement { connectedCallback() { let s = this.innerText.split(","); this.innerText = ""; let o = this.attributes.timeout ? this.attributes.timeout.value : 1e3, n = this.attributes.loop ? this.attributes.loop.value : !0, h = this.attributes.speed ? this.attributes.speed.value : 300, c = this.attributes.speedVariation ? this.attributes.speedVariation.value : void 0, w = this.attributes.errorQuota ? this.attributes.errorQuota.value : 0, l = this.attributes.errorCharacterMap ? this.attributes.errorCharacterMap.value : void 0, f = this.attributes.cursor ? this.attributes.cursor.value : "_", m = this.attributes.cursorSpeed ? this.attributes.cursorSpeed.value : void 0; (0, C.default)(this, s.map(b => b.trim()), { speed: h, timeout: o, loop: n, speedVariation: c, errorQuota: w, errorCharacterMap: l, cursor: f, cursorSpeed: m }) } }; window.customElements.define("write-and-delete", M);
})();