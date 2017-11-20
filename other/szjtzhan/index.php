<?php
include 'db.php';
$sql="select * from $tbname where shen='2' order by time desc";
$query=mysql_query($sql);
?>
<!doctype html>
<html>
<head>
	<title>我的交通 我的心愿</title>
	<meta charset="utf-8" />
	<script src="js/slider.js"></script>	
	<script src="js/jquery-1.8.3.min.js"></script>	
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<script>
	setInterval(
		function(){
			// body...
		$.ajax({
			url:'add.php',
			data:$('form').serialize(),
			type:'POST',
			success:function(m){
				$("#slider").html(m);
				// alert(1);
			}
		})
		},10000)
</script>
<body>
<img class="bg" src="images/bg.png" />
<div class="wp">
	<ul id="slider" class="slider">
	<?php
			while ($row=mysql_fetch_assoc($query)) {
	?>
	  <li>
		<a class="fl" href="javascript:;"><img width="50px" height="50px" src="<?php echo $row['tou']?>" alt="" /></a>
	    <p style="font-size:20px;"><?php echo substr($row['xy'],0,164)?>...</p>
		<br>
		<p><span style="font-size: 18px;color: red;">♥</span> <?php echo $row['zan']?></p>
	  </li>
	<?php
	}
	?>
	</ul>
</div>
<script type="text/javascript">
	new slider({id:'slider'})
</script>
</body>
</html>