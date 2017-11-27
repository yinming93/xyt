var title='';
var desc='';
var link='';
var imgUrl='';
var timetitle= '';
function share(title,desc,link,imgUrl,timetitle)
{
    title=title;
    desc=desc;
    link=link;
    imgUrl=imgUrl;
    timetitle=timetitle;
    $.ajax({
      type:"post",
      url:'http://q.cntv.cn/wx/jssdk.lua',
      dataType:"jsonp",
      jsonp:"callback",
      jsonpCallback:"sharecallback",
      data:({
          mpid:'45',
          url:window.location.href,
      }),
     });
}

function sharecallback(sharedata)
{
          appId=sharedata.appId;
          timestamp=sharedata.timestamp;
          nonceStr=sharedata.nonceStr;
          signature=sharedata.signature;

          wx.config({
              debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
              'appId':appId, // 必填，公众号的唯一标识
              'timestamp':timestamp,
              'nonceStr':nonceStr,
              'signature':signature,
              jsApiList: [
              	//'checkJsApi',
            	'onMenuShareTimeline',
            	'onMenuShareAppMessage',
            	'onMenuShareQQ',
            	'onMenuShareWeibo',
              ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
          });

          wx.ready(function () {
          	/*
          	wx.checkJsApi({
		      jsApiList: [
		        'getNetworkType',
		        'previewImage'
		      ],
		      success: function (res) {
		        //alert(JSON.stringify(res));
		      }
		    });
			*/
            wx.onMenuShareAppMessage({
                title: title,
                desc: desc,
                link: link,
                imgUrl: imgUrl,
                trigger: function (res) {
                  //alert('用户点击发送给朋友');
                },
                success: function (res) {
                  //alert('已分享');
                },
                cancel: function (res) {
                  //alert('已取消');
                },
                fail: function (res) {
                  //alert(JSON.stringify(res));
                }
           });
           wx.onMenuShareTimeline({
		      title: timetitle,
		      link: link,
		      imgUrl: imgUrl,
		      trigger: function (res) {
		        //alert('已取消');
		      },
		      success: function (res) {
		        //alert('已分享');
		      },
		      cancel: function (res) {
		        //alert('已取消');
		      },
		      fail: function (res) {
		        //alert(JSON.stringify(res));
		      }
		    });
		    
		   wx.onMenuShareQQ({
			title: title,
			desc: desc,
			link: link,
			imgUrl: imgUrl,
			trigger: function (res) {
			 // alert('用户点击分享到QQ');
			 return true;
			},
			complete: function (res) {
			 //alert(JSON.stringify(res));
			 return true;
			},
			success: function (res) {
			  //alert('谢谢分享');
			},
			cancel: function (res) {
			 // alert('已取消');
			 return true;
			},
			fail: function (res) {
			 // alert(JSON.stringify(res));
			 return true;
			}
		  });
		  wx.onMenuShareWeibo({
			title: title,
			desc: desc,
			link: link,
			imgUrl: imgUrl,
			trigger: function (res) {
			 // alert('用户点击分享到微博');
			 return true;
			},
			complete: function (res) {
			 // alert(JSON.stringify(res));
			 return true;
			},
			success: function (res) {
			  //alert('谢谢分享');
			},
			cancel: function (res) {
			 // alert('已取消');
			},
			fail: function (res) {
			  //alert(JSON.stringify(res));
			}
		  });
        });
}

