<?php
include 'db.php';
$sql="select * from $tbname";
//echo $sql;
$i=1;
$query=mysql_query($sql);
//var_dump($row);


?>

<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=UTF-8">
<style>
	td{text-align: center;}
</style>
</head>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>预约情况查询</title>
<meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	
</head>
	<body bgcolor="#FFFFFF">
<table border="1">
<tr>
  <td>序号</td>
  <td>姓名</td>
  <td>性别</td>
  <td>出生日期</td>
  <td>个人爱好</td>
  <td>手机</td>
  <td>所在城市</td>
  <td>Email</td>
  <td>籍贯</td>
  <td>通讯地址</td>
  <td>微信号</td>
  <td>公司名称</td>
  <td>职务</td>
  <td>所属行业</td>
  <td>公司规模</td>
  <td>教育经历</td>
  <td>工作经历</td>
  <td>公司简介</td>
  <td>我能帮助会员做什么</td>
  <td>我希望会员能帮助我什么</td>
  <td>我能帮MOC芯城汇产城联盟做什么</td>
  <td>我希望MOC芯城汇产城联盟能支持我什么</td>
  <td>擅长的专业领域</td>
  <td>意愿分享的内容</td>

</tr>
	
		<?php
			while ($row=mysql_fetch_assoc($query)) {
	# code...

	?>
	<tr>

		<td><?php echo $i++;?></td>
		<td><?php echo $row['p1']?></td>
		<td><?php echo $row['p2']?></td>
		<td><?php echo $row['p3']?></td>
		<td><?php echo $row['p4']?></td>
        <td><?php echo $row['p5']?></td>
        <td><?php echo $row['p6']?></td>
        <td><?php echo $row['p7']?></td>
        <td><?php echo $row['p8']?></td>
        <td><?php echo $row['p9']?></td>
        <td><?php echo $row['p10']?></td>
        <td><?php echo $row['p11']?></td>
        <td><?php echo $row['p12']?></td>
        <td><?php echo $row['p13']?></td>
        <td><?php echo $row['p14']?></td>
        <td><?php echo $row['p15']?></td>
        <td><?php echo $row['p16']?></td>
        <td><?php echo $row['p17']?></td>
        <td><?php echo $row['p18']?></td>
        <td><?php echo $row['p19']?></td>
        <td><?php echo $row['p20']?></td>
        <td><?php echo $row['p21']?></td>
        <td><?php echo $row['p22']?></td>
        <td><?php echo $row['p23']?></td>
	</tr>
	<?php
	}
		?>
	</table>

</body>
</html>