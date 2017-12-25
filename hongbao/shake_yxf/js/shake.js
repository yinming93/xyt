//摇一摇部分
        var SHAKE_THRESHOLD = 1000;
        var last_update = 0;
        var last_time = 0;
        var x;
        var y;
        var z;
        var last_x;
        var last_y;
        var last_z;
        var sound = new Howl({ urls: ['../shake/sound/shake_sound.mp3'] }).load();
        var findsound = new Howl({ urls: ['../shake/sound/shake_match.mp3'] }).load();
        var curTime;
        var isShakeble = true; 

        function init() {
            if (window.DeviceMotionEvent) {
                window.addEventListener('devicemotion', deviceMotionHandler, false);
            } else {
                $("#cantshake").show();
            }
        }

        function deviceMotionHandler(eventData) {
            curTime = new Date().getTime();
            var diffTime = curTime - last_update;
            if (diffTime > 100) {
                var acceleration = eventData.accelerationIncludingGravity;
                last_update = curTime;
                x = acceleration.x;
                y = acceleration.y;
                z = acceleration.z;
                var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000;

                if (speed > SHAKE_THRESHOLD && curTime - last_time > 1100 && $("#loading").attr('class') == "loading" && isShakeble) {
                    shake();
                }
                last_x = x;
                last_y = y;
                last_z = z;
            }
        }

        function shake() {
            last_time = curTime;
            $("#loading").attr('class','loading loading-show');

			sound.play();
			
            $("#shakeup").animate({ top: "55%" }, 700, function () {
                $("#shakeup").animate({ top: "70%" }, 700, function () {
                    $("#loading").attr('class','loading');
                    
                   findsound.play();
				  // alert(123)
//---------------------------------------------------------------------------------- 
	/*
	setTimeout(function(){
		alert(123)
		//第一轮
	//window.location.href="http://menu.suzhouxyt.com/active/xinyutang?ename=hongbao_dhzg1606301";
		
	},1000)
	*/
/*
获取openid
是否领取过
是否还有
领取奖品




*/
	//执行发红包程序
	var openid = <?php echo $openid ?>
	alert(openid)
/*
	$.post("ajax.php",data,function(res){
		//alert(res)
		var obj = JSON.parse(res)
		
		if(obj.msg=="sorry"){
			alert("红包已抢光")
		}else if(obj.msg=="error"){
			alert("系统繁忙，请稍后再试！")
		}else{
			alert("恭喜您抢到 "+obj.sum+" 元红包！请到微信服务通知中查收！")
		}
	})
*/
//----------------------------------------------------------------------------------
			   
				   
                });
            });
			
            $("#shakedown").animate({ top: "55%" }, 700, function (){
                $("#shakedown").animate({ top: "70%" }, 700, function (){
                });
            });
			
            //sound.play();
			
        }
		
		//各种初始化
        $(document).ready(function (){
            Howler.iOSAutoEnable = false;
            FastClick.attach(document.body);
            init();
        });
		