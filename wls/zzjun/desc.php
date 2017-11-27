<?php
$title = $_GET['title'];
$img = $_GET['img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<style>
		body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
	}
	.box{
    	width: 100%;
        margin: 0px;
        padding: 0px;
		position: absolute;
		top:0px;
		left:0px;
	}
	.fh{
		width: 100%;
		height: 90px;
		/*border:1px solid blue;*/
		position: absolute;
		bottom: 0%;
	}
</style>
<body>
	<div id="box" class="box">
	<img style="width:100%;position:relative;" src="desc/<?php echo $img; ?>.jpg" alt="">
	<a href="index.php"><div class="fh"></div></a>
	</div>
</body>
</html>