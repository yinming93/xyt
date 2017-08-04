<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>邀请函</title>
	<script src="jquery.js"></script>
</head>
<body>
<input type="text" id="msg"><br>
<input type="text" id="msg2"><br>
<input type="button" value="祝福" onclick="tz();">
</body>
</html>
<script>
 function tz(){
 	var m =$("#msg").val();
 	var n =$("#msg2").val();
 	window.location="ghost.php?m="+m+"&n="+n;
 	// alert(m);
 }


//  $.get("ghost.php?m="+m+"&n="+n, null, function(data) {

// });
</script>