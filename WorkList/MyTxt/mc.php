<?php
header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	//include 'function.php';
	$sql2="select * from $tbname where level='2' order by time desc";
	// var_dump($sql);
	$a=0;
	$query2 = mysql_query($sql2);


?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="stylesheet" href="./css/index.css">
    <title>业绩</title>
    <!-- Bootstrap -->
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
	<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "微软雅黑";
		background-color: #D1D1D1;
		}

	.box{
    	width: 90%;
    	height: 600px;
    	margin-top: 100px;
    	margin-left: 5%;
		background-color: white;
		overflow-y:auto;
		}

	.admin_table tr {
    	height:35px;
		}

	.admin_table td {
		border:1px #abcdef dashed;
		}
	.table_content:hover {
		background:#abcdef;
		}
	.ann{
		width:60px;
		height:30px;
		text-align:center;
		line-height:30px;
		background:#abcdef;
		color:white;
		box-shadow:1px 1px grey;
		position:absolute;
		right:5%;
		top:10px;
	}
	.ann2{
		width:60px;
		height:30px;
		text-align:center;
		line-height:30px;
		background:#abcdef;
		color:white;
		box-shadow:1px 1px grey;
		position:absolute;
		top:10px;
	}
	.ann:hover{
		cursor: pointer;
	}
	.ann2:hover{
		cursor: pointer;
	}
	.modal-dialog{
		margin-top:20%;
	}
	.bm,.bm2{
		display: none;
		width: 30%;
		height: 300px;
		margin-left: 30%;
		background: #abcdef;
		position: absolute;
	}
	.pro{
		width: 70%;
		height: 30px;
		margin-left: 15%;
		margin-top: 20px;
		border-radius: 5px;
	}
	.link,.price{
		width: 70%;
		height: 30px;
		margin-left: 15%;
		margin-top: 10px;
		border-radius: 5px;
	}
	.editor{
		width: 70%;
		height: 30px;
		margin-left: 15%;
		margin-top: 10px;
		border-radius: 5px;
	}
	.bn{
		width: 70%;
		height: 30px;
		margin-left: 15%;
		margin-top: 30px;
		border-radius: 5px;
	}
	</style>
<body>
<center><h2 style="color:white;">清单后台</h2></center>




	<div class="box" id="mc" style="display:block;">

	<table class="admin_table" style="width:100%;">
            <tr>
                <td class="table_header" style="width:5%;font-weight:bold;background:grey;color:white;">ID</td>
                <td class="table_header" style="width:10%;font-weight:bold;background:grey;color:white;">项目</td>
                <td class="table_header" style="width:65%;font-weight:bold;background:grey;color:white;">链接</td>
                <td class="table_header" style="width:10%;font-weight:bold;background:grey;color:white;">对接人</td>
                <td class="table_header" style="width:10%;font-weight:bold;background:grey;color:white;">时间</td>
            </tr>
           <?php
			while ($row2=mysql_fetch_assoc($query2)) {
			# code...
			$a2++;
			?>
            <tr class="table_content">
            <td ><?php echo $a2 ?></td>
            <td ><?php echo $row2['project'] ?></td>
            <td ><?php echo $row2['link'] ?></td>
            <td ><?php echo $row2['editor'] ?></td>
            <td ><?php echo $row2['time'] ?></td>
            </tr>
            <?php
			}
			?>
    </table>
	</div>
</body>
<script src="./lib/jquery/jquery.min.js"></script>
<script src="./lib/bootstrap/js/bootstrap.js"></script>
<script src="js/dialog.js"></script>
<script>
	function bm () {
		$(".bm").css("display","block");
	}
	function xs () {
		$(".bm").css("display","none");
	}
	function bm2 () {
		$(".bm2").css("display","block");
	}
	function xs2 () {
		$(".bm2").css("display","none");
	}
</script>
</html>
<script>
	$("input[name='sub']").on("click",function(){
		$.ajax({
		url:'add.php?a=xyt',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
			// Alert(m);return false;
			if(m=='chong'){
				Alert("请勿重复提交！");
			}
			if(m=='ok'){
				Alert("提交成功！");
				window.location.href="index.php";
			}  
			if(m=='m'){
				Alert("报名人数已满！");
				$("input[name='name']").val('');
				$("input[name='tel']").val('');
			}    				
			if(m=='tel'){
				Alert("手机号格式不正确！");
			}    				
			if(m=='wan'){
				Alert("请完善信息！");
			}
			if(m=='sb'){
				Alert("插入数据库失败！");
			}
		}
		})
	})


	$("input[name='sub2']").on("click",function(){
		$.ajax({
		url:'add.php?a=mc',
		data:$('form').serialize(),
		type:'POST',
		success:function(m){
			if(m=='chong'){
				Alert("请勿重复提交！");
			}
			if(m=='ok'){
				Alert("提交成功！");
				window.location.href="index.php";
			}  
			if(m=='m'){
				Alert("报名人数已满！");
				$("input[name='name']").val('');
				$("input[name='tel']").val('');
			}    				
			if(m=='tel'){
				Alert("手机号格式不正确！");
			}    				
			if(m=='wan'){
				Alert("请完善信息！");
			}
			if(m=='sb'){
				Alert("插入数据库失败！");
			}
		}
		})
	})


	function mc () {
		$("#xyt").css("display","none");
		$("#mc").css("display","block");
	}
	function xyt () {
		$("#xyt").css("display","block");
		$("#mc").css("display","none");
	}
</script>