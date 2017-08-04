<!-- 判断是否为微信浏览器 -->
<script type="text/javascript">

function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
        
    }else{
        document.write("请用微信浏览器打开");
        return false;
    }
}
window.onload = function(){
    if(isWeiXin()){
        return false;
    }else{
        return false;
    }
}
</script>