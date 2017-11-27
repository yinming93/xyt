var share_title = ''
var share_link = ''
var share_imgUrl = ''
var share_desc = ''

wx.ready(function () {


    if(document.getElementById('imgUrl')){
        share_imgUrl = document.getElementById('imgUrl').src
    }

    if (document.getElementById('title')) {
        share_title = document.getElementById('title').value
    } else {
        share_title = document.title
    }


    if (document.getElementById('link')) {
        share_link = document.getElementById('link').value
    } else {
        share_link = document.URL
    }


    if (document.getElementById('desc')) {
        share_desc = document.getElementById('desc').value
    } else {
        share_desc = document.URL
    }

    set_share_info(share_title, share_desc, share_link, share_imgUrl)

})

wx.error(function (res) {
  alert(res.errMsg);
});

function on_share_success(share_type) {
}


//动态设置分享信息
function set_share_info(new_title, new_desc, new_link, new_imgUrl){
    new_title = new_title ? new_title: share_title
    new_desc = new_desc ? new_desc:share_desc
    new_link = new_link ? new_link:share_link
    new_imgUrl = new_imgUrl ? new_imgUrl:share_imgUrl



    wx.onMenuShareTimeline({
        title: new_title, // 分享标题
        link: new_link, // 分享链接
        imgUrl: new_imgUrl, // 分享图标
        success: function () {
//            alert('i am wx.js pengyouquan')
            // 用户确认分享后执行的回调函数
            on_share_success('TL')
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });

    wx.onMenuShareAppMessage({
        title: new_title, // 分享标题
        desc: new_desc, // 分享描述
        link: new_link, // 分享链接
        imgUrl: new_imgUrl, // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function () {
            // 用户确认分享后执行的回调函数
            on_share_success('AM')
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });

    wx.onMenuShareQQ({
        title: new_title, // 分享标题
        desc: new_desc, // 分享描述
        link: new_link, // 分享链接
        imgUrl: new_imgUrl, // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
            on_share_success('QQ')
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });

    wx.onMenuShareWeibo({
        title: new_title, // 分享标题
        desc: new_desc, // 分享描述
        link: new_link, // 分享链接
        imgUrl: new_imgUrl, // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
            on_share_success('WB')
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });
}

function post(url, data, success) {
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded;charset=UTF-8");//www-form-urlencoded
    xmlhttp.timeout = 4000;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 504) {
                console.log("服务器请求超时..");
                xmlhttp.abort();
            } else if (xmlhttp.status == 200) {
                success(xmlhttp.responseText);
            }
            xmlhttp = null;
        }
    }

    xmlhttp.send(data);
}


//定位接口
function get_location() {
    wx.getLocation({
        success: function (res) {
            var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
            var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
            var speed = res.speed; // 速度，以米/每秒计
            var accuracy = res.accuracy; // 位置精度

            doGetLocationSuccess(latitude, longitude)
        }
    });
}

function doGetLocationSuccess(latitude, longitude){
    console.log(latitude)
    console.log(longitude)
}


//图片上传接口
var images = {
    localId: [],
    serverId: []
};

var local_id_len =0;

//选择图片, 若需要修改行为，请重写doChooseImageSuccess()
function chooseImage() {
    //alert('bbb')
    local_id_len = images.localId.length
    wx.chooseImage({
        success: function(res) {
            for(var i=0;i< res.localIds.length;i++){
                images.localId.push(res.localIds[i])
            }
            doChooseImageSuccess()
        }
    });
}

function doChooseImageSuccess() {
}

function uploadImage() {
    if (images.localId.length == 0) {
        alert('请先选择图片');
        return;
    }

    var i = 0, length = images.localId.length;
    images.serverId = [];
    function upload() {
        wx.uploadImage({
            localId: images.localId[i],
            isShowProgressTips: 1, // 默认为1，显示进度提示
            success: function (res) {
                i++;
                images.serverId.push(res.serverId);
                if (i < length) {
                    upload();
                } else {
                    doUploadImageSuccess()
                }
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });
    }
    upload()
}

function doUploadImageSuccess() {
    downloadImage()
}

function downloadImage() {
    if (images.serverId.length == 0) {
        alert('请先上传图片')
        return;
    }

    post('/wechat/images/download/', 'media_id_list=' + images.serverId, downloadImageCallBack)
}

function downloadImageCallBack(data) {
    console.log(data)
}