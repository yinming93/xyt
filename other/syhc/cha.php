<?php
header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	//include 'function.php';
   $t = date('Y-m-d');
    // 今天日期
   $y = date('Y-m-d',strtotime('-15 day'));
    // 十五天前日期
    $m = date('Y-m-d',strtotime('+15 day'));
    // 十五天后日期
    $sql="select * from $tbname where ri between '$y' and '$m'";
    // 查询30天内的数据
	// var_dump($sql);
	$query = mysql_query($sql);
	 if( $query && mysql_num_rows($query)>0 ){
        $qu = array();

        while($row = mysql_fetch_assoc($query)){
            $qu[] = $row;
        }
    }
    //echo "$qu";
    // echo "<pre>";
    //    print_r($query);
    // echo "</pre>";
     //var_dump($qu);
    //$row   = mysql_fetch_assoc($query);
?>
<style>
	*{
    margin:0;
    padding:0;
    list-style:none;
}

h3{
    color:black;
}
#top li{
    float:left;
    margin:20px 0px 0 30px;

}
    #top li a{
        text-decoration: none;
        color: blue;
    }
    #lll ul li a:hover{
        color:orange;
    }

.admin_table{
    width:1200px;
    border:1px #abcdef dashed;
    border-collapse:collapse;
    
    
}

.admin_table1{
    width:1024px;
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
</style>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" href="css/admin.css" type="text/css" media="screen" charset="utf-8">
	<title>水漾花城 花苑</title>
</head>
<body>
 <div id="yh">
        <center><h1>水漾花城 花苑——运动场预约管理系统后台</h1></center><br/><br>
        <a style="text-decoration: none;color:grey;" href="http://szxytang.com/yin/xyt/"><div style="width:200px;height:40px;background:;margin-top:1%;margin-left:10%;line-height:40px;">技术支持：信玉堂</div></a>

        <div id="sousuo">
        <!-- 搜索框框 -->
        <!-- <form action="index.php" method="get">
            <font color="blue">用户名:</font><input type="text" name="name" /><br/>
            <font color="blue">性别:</font>
            <label><input type="radio" name="sex" value="1"/><font color="#3CA0FF">男</font></label>
            <label><input type="radio" name="sex" value="0"/><font color="#3CA0FF">女</font></label>
            <label><input type="radio" name="sex" value="2"/><font color="#3CA0FF">妖</font></label><br/><br/>
            <input id="ss" type="submit" value="搜索" />
        </form> -->
        </div><br/>
        <table class="admin_table" style="width:100%;">
            <tr>
                <td class="table_header">id</td>
                <td class="table_header">预约人</td>
                <td class="table_header">电话</td>
                <td class="table_header">预约场地</td>
                <td class="table_header">预约日期</td>
              	<td class="table_header">预约时间段</td>
            </tr>

            <?php if(!empty($query)): ?>
            <?php foreach($qu as $val): ?>

            <tr class="table_content">
            

            <td ><?php echo $val['id'] ?></td>
            <td ><?php echo $val['name'] ?></td>
            <td ><?php echo $val['tel'] ?></td>
            <td ><?php 
                        if($val['cd'] == 'yu'){
                            echo '羽毛球';
                        }elseif($val['cd'] == 'pp1'){
                            echo '乒乓球一';
                        }else{  
                            echo '乒乓球二';
                        }
                     ?></td>
            <td ><?php echo $val['ri'] ?></td>
            <td ><?php echo $val['hour'] ?>点</td>
           
            <!-- <td ><?php echo preg_replace('/(1[358]{1}[0-9])[0-9]{5}([0-9]{2})/i','$1*****$2',$val['tel'])?></td> -->
            
            </tr>

            <?php endforeach; ?>
            <?php endif; ?>

        </table>
        <div class="num_links">
        <?php echo $links; ?>
        </div>
    </div>
</body>
</html>
