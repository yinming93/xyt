<?php    
include 'db.php';
$sql="select * from $tbname order by time asc limit 0 ,850";
//echo $sql;
$a=0;
$query=mysql_query($sql);
//var_dump($row);
//载入jssdk类
    require_once "jssdk.php";
    $jssdk = new JSSDK( APPID, APPSECRET );
    $signPackage = $jssdk->GetSignPackage();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	        <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	<style>
		#sel{
			background:#abcdef;
      margin: 0;

		}
		.sel_main{
			width: 96%;
      
			margin: 0 auto;
      
      position: absolute;
      top: 24%;
      left: 5%;
		}
		h2{
			width: 100%;
			text-align: center;
			margin-top: 10px;
		}
	</style>
</head>
<body id='sel'>
<!-- <p style="font-size: 14px;color:white;font-weight:bold;">
&nbsp;一等奖1名:iPhone 7 Plus<br>
&nbsp;二等奖5名:apple watch<br>   
&nbsp;三等奖20名:韩国圣诞毛巾礼盒<br>
&nbsp;四等奖800名:10元话费（3个工作日内充值）<br>
</p> -->

	<div class="sel_main">
<!-- <h2>排行榜查询</h2> -->
	<table border='1' width="100%"cellpadding="2" cellspacing="0" style="color:white;border:1px solid #E3C46C;color: red;">
	
		<tr style="color:black;">
			<td align='center' width="100px">序号</td>
			<td align='center' width="100px">姓名</td>
			<td align='center' width="100px">电话</td>
			<td align='center' width="100px">房号</td>
			<td align='center' width="100px">满意度1</td>
			<td align='center' width="100px">满意度2</td>
			<td align='center' width="100px">满意度3</td>
			<td align='center' width="100px">满意度4</td>
			<td align='center' width="100px">满意度5</td>
			<td align='center' width="100px">满意度6</td>
			<td align='center' width="100px">满意度7</td>
			<td align='center' >满意度8</td>
		</tr>
	
		<?php
			while ($row=mysql_fetch_assoc($query)) {
	# code...
	$a++;

	?>
	<tr border='1px'>
		<td align='center'><?php echo $a ?>号</td>
		<td align='center'><?php echo $row['name']?></td>
		<td align='center'><?php echo $row['tel']?></td>
		<td align='center'><?php echo $row['fang']?></td>
		<td align='center'><?php echo $row['a']?></td>
		<td align='center'><?php echo $row['b']?></td>
		<td align='center'><?php echo $row['b3']?></td>
		<td align='center'><?php echo $row['b4']?></td>
		<td align='center'><?php echo $row['b5']?></td>
		<td align='center'><?php echo $row['b6']?></td>
		<td align='center'><?php echo $row['b7']?></td>
		<td align='center'><?php echo $row['b8']?></td>
	</tr>
	<?php
	}
		?>
	
	</table>
  </div>
</body>
</html>