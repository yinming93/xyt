// Set configuration
seajs.config({
    base: "../dist",
    alias: {
      "jquery": "modules/jquery/jquery.js",
      "device": "modules/device/device.js",
      "carousel": "modules/jquery/jquery.carousel.js",
      "circleMenu": "modules/jquery/jquery.circleMenu.js",
      "bootstrap": "modules/jquery/jquery.bootstrap.js"
    }
})

var hideTime,modalHtml = '<div class="modal fade" id="modal" >'
            +'<div class="modal-dialog">'
            +'<div class="modal-content" id="modal-content">'
            +'</div>'
            +'</div>'
            +'</div>'

function showalert(alertstring) {
    seajs.use(["jquery","bootstrap"], function($){
        if(!$("#modal").html()) {
            $('body').append(modalHtml)
        }

         $(".modal-content").removeClass("modal-content-opacity")
         $("#modal").modal("show")
         $("#modal-content").html(alertstring)
         hideTime = setTimeout(function(){$("#modal").modal("hide")},3000)
    });
}

function showhtml(htmlstring) {
    seajs.use(["jquery","bootstrap"], function($){
        if(!$("#modal").html()) {
            $('body').append(modalHtml)
        }

        clearTimeout(hideTime)

        // 弹出大图
        $(".modal-content").removeClass("modal-content-opacity")
        $("#modal").modal("show")
        $("#modal-content").html(htmlstring)
    });
}

function showpic(htmlstring) {
    seajs.use(["jquery","bootstrap"], function($){
        if(!$("#modal").html()) {
            $('body').append(modalHtml)
        }

        clearTimeout(hideTime)

        // 弹出大图
        $("#modal").modal("show")
        $(".modal-content").addClass("modal-content-opacity")
        $(".modal-backdrop").addClass("modal-backdrop-opacity")
        $("#modal-content").html(htmlstring)
    });
}

function parseURL(url) {

    var a =  document.createElement("a")
    a.href = url
    return {
        source: url,
        protocol: a.protocol.replace(":",""),
        host: a.hostname,
        port: a.port,
        query: a.search,
        params: (function(){
            var ret = {},
                seg = a.search.replace(/^\?/,"").split("&"),
                len = seg.length, i = 0, s
            for (;i<len;i++) {
                if (!seg[i]) { continue }
                s = seg[i].split("=")
                ret[s[0]] = s[1]
            }
            return ret
        })(),
        file: (a.pathname.match(/\/([^\/?#]+)$/i) || [,""])[1],
        hash: a.hash.replace("#",""),
        path: a.pathname.replace(/^([^\/])/,"/$1"),
        relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [,""])[1],
        segments: a.pathname.replace(/^\//,"").split("/")
    };
}

function rnd(start, end){
    return Math.floor(Math.random() * (end - start) + start);
}