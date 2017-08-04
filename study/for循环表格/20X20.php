<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>无标题</title>
</head>
<style>
	td{
		width: 100px;
		height: 30px;
		background-color: #abcdef;
	}
</style>
<body>
<table style="width:70%;margin-left:15%;">
<?php for ($x=0; $x<20; $x++): ?>
	<tr>
	<?php for ($y=0; $y<20; $y++): ?>
		<td>
		<?php echo($x*20+$y); ?>
		</td>
	<?php endfor; ?>
	</tr>
<?php endfor; ?>
</table>
</body>
</html>