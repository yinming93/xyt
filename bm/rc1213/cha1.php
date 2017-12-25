<?php
header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	//include 'function.php';
	$sql="select * from $tbname where pro=1";
	// var_dump($sql);
	$query = mysql_query($sql);
	 if( $query && mysql_num_rows($query)>0 ){
        $qu = array();

        while($row = mysql_fetch_assoc($query)){
            $qu[] = $row;
        }
    }
    $a=0;
    //echo "$qu";
    // echo "<pre>";
    //    print_r($query);
    // echo "</pre>";
     //var_dump($qu);
    //$row   = mysql_fetch_assoc($query);
    $sq1 = "select sum(`age`) from $tbname where pro=1";
    $qu1 = mysql_query($sq1);
    $qq1 = mysql_fetch_row($qu1);
    $qqq1 = $qq1[0];

    $sq2 = "select sum(`age`) from $tbname where pro=2";
    $qu2 = mysql_query($sq2);
    $qq2 = mysql_fetch_row($qu2);
    $qqq2 = $qq2[0];

    $sq3 = "select sum(`age`) from $tbname where pro=3";
    $qu3 = mysql_query($sq3);
    $qq3 = mysql_fetch_row($qu3);
    $qqq3 = $qq3[0];

    $sq4 = "select sum(`age`) from $tbname where pro=4";
    $qu4 = mysql_query($sq4);
    $qq4 = mysql_fetch_row($qu4);
    $qqq4 = $qq4[0];

    $sq5 = "select sum(`age`) from $tbname where pro=5";
    $qu5 = mysql_query($sq5);
    $qq5 = mysql_fetch_row($qu5);
    $qqq5 = $qq5[0];

    $sq6 = "select sum(`age`) from $tbname where pro=6";
    $qu6 = mysql_query($sq6);
    $qq6 = mysql_fetch_row($qu6);
    $qqq6 = $qq6[0];
?>
<style>
	*{
    margin:0;
    padding:0;
    list-style:none;
}
h3{
    color:blue;
}
.admin_table{
    width:1200px;
    border:1px #abcdef dashed;
    border-collapse:collapse;   
}
.admin_table tr {
    height:35px;
}
.admin_table td {
    border:1px #abcdef dashed;
}
.table_header{
    text-align:center;
    background:#abcdef;
}
.table_content{
    text-align: center;
}
.table_content:hover {
    background:pink;
}
#yh{
   /*display: none; */
}
#yzm{
    width:300px;
    height:150px;
    background:#CCCCCC;
    position:absolute;
    top:10%;
    left:50%;
    margin-left:-150px;
    border-radius: 5px;
}
</style>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<script src="js/jquery-1.8.3.min.js"></script>
	<title>查询通用</title>
</head>
<body>
<!--  <div id="yzm">
     <h3 style="width:100%;height:30px;background:grey;color:white;text-align:center;">验证码</h3>
     <input id="miyao" type="text" style="width:50%;height:25px;border-radius:5px;border:none;margin-left:25%;margin-top:10%;" placeholder="请输入验证码">
     <input type="button" style="width:50%;height:25px;margin-left:25%;margin-top:5%;" value="确定" onclick="qr()">
 </div> -->

 <div id="yh">
        <h3>用户列表</h3><br/>
        <div id="sousuo">
        <lable>东方御园：<?php echo $qqq1;?></lable><br>
        <lable>玉兰公馆：<?php echo $qqq2;?></lable><br>
        <lable>玉兰璟园：<?php echo $qqq3;?></lable><br>
        <lable>森邻森邻：<?php echo $qqq4;?></lable><br>
        <lable>运河壹号府：<?php echo $qqq5;?></lable><br>
        <lable>瑷颐湾：<?php echo $qqq6;?></lable>
        </div><br/>
        <table class="admin_table" style="width:100%;">
            <tr>
                <td class="table_header">id</td>
                <td class="table_header">姓名</td>
                <td class="table_header">电话</td>
                <td class="table_header">人数</td>
                <td class="table_header">项目</td>
            </tr>

            <?php if(!empty($query)): ?>
            <?php foreach($qu as $val): ?>
			<?php $a++; ?>

            <tr class="table_content">
            <td ><?php echo $a ?></td>
            <td ><?php echo $val['name'] ?></td>
            <td ><?php echo $val['tel'] ?></td>
            <td ><?php echo $val['age'] ?></td>
            
            <td >
                <?php 
                     if($val['pro'] == 1){
                        echo '东方御园';
                        }elseif($val['pro'] == 2){
                        echo "玉兰公馆";  
                        }elseif($val['pro'] == 3){
                        echo "玉兰璟园";  
                        }elseif($val['pro'] == 4){
                        echo "森邻森邻";  
                        }elseif($val['pro'] == 5){
                        echo "运河壹号府";  
                        }elseif($val['pro'] == 6){
                        echo "瑷颐湾";
                        }
                ?>
            </td>
           
            </tr>

            <?php endforeach; ?>
            <?php endif; ?>

        </table>
    </div>
</body>
</html>
<script>
    function qr(){
        var yzm = $("#miyao").val();
        if (yzm!='ld888'){
            alert('验证码错误')
        }else{
            $("#yh").css('display','block');
            $("#yzm").css('display','none');
        }
    }
</script>