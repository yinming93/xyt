<?php
header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	//include 'function.php';
	$sql="select * from $tbname";
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
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" href="css/admin.css" type="text/css" media="screen" charset="utf-8">
	<title>查询通用</title>
</head>
<body>
 <div id="yh">
        <h3>用户列表</h3><br/>

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
        <table class="admin_table">
            <tr>
                <td class="table_header">id</td>
                <td class="table_header">姓名</td>
                
              	<td class="table_header">电话</td>
              	<td class="table_header">作品名</td>
                <td class="table_header">作品描述</td>
              	<td class="table_header">图片</td>
                <td class="table_header">操作</td>
            </tr>

            <?php if(!empty($query)): ?>
            <?php foreach($qu as $val): ?>

            <tr class="table_content">
            <!-- <td ><?php echo $val['id'] ?></td>
            <td ><?php echo $val['uname'] ?></td>
            <td ><?php echo $val['date'] ?></td>
            <td ><?php echo $val['uname2'] ?></td>
            <td ><?php echo $val['tel'] ?></td>
            <td ><?php echo $val['school'] ?></td>
            <td ><?php echo $val['qm'] ?></td> -->

            <td ><?php echo $val['id'] ?></td>
            <td ><?php echo $val['name'] ?></td>
           
           
            <td ><?php echo $val['jtel'] ?></td>
            <td ><?php echo $val['zpm'] ?></td>
            <td ><?php echo $val['miaoshu'] ?></td>
           
            
            <?php 
            // 处理图片路径 
            $img_path = 'uploads/';
            $img_path .= substr($val['filename'], 0, 4).'/';
            $img_path .= substr($val['filename'], 4, 2).'/';
            $img_path .= substr($val['filename'], 6, 2).'/';
            $img_path .= $val['filename'];
            ?>
            <td><img  style="width:100px;height:100px;" src="<?php echo $img_path ?>"/></td>
           
            
            <td >
               <!--  <?php if($val['type'] != 1): ?>  -->
                
                <a href="#">你无权限</a>
              <!--   <?php endif; ?> -->
            </td>
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
