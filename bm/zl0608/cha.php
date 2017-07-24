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
<style>
	*{
    margin:0;
    padding:0;
    list-style:none;
}

h3{
    color:blue;
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
        <table class="admin_table" style="width:100%;">
            <tr>
                <td class="table_header">id</td>
                <td class="table_header">姓名</td>
               <!--  <td class="table_header">性别</td> -->
               <!--  <td class="table_header">作品名</td>
                <td class="table_header">作品描述</td> -->
              	<td class="table_header">电话</td>
              	<!-- <td class="table_header">工作</td>
              	<td class="table_header">年龄</td> -->
              	<!-- <td class="table_header">图片</td> -->
                <td class="table_header">时间</td>
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
            <td ><?php echo $val['tel'] ?></td>
            <!-- <td ><?php echo mb_substr($val['name'],0,3) ?>xx</td> -->
            <!-- <td >
                <?php 
                if($val['sex'] == 1){
                    echo '男';
                }elseif($val['sex'] == 0){
                    echo '女';
                
                }

            ?>
            </td> -->
           <!--  <td ><?php echo $val['zpm'] ?></td>
            <td ><?php echo $val['miaoshu'] ?></td> -->
            <!-- <td ><?php echo preg_replace('/(1[358]{1}[0-9])[0-9]{5}([0-9]{2})/i','$1*****$2',$val['tel'])?></td> -->
            <!-- <td >
                <?php 
                if($val['job'] == 1){
                    echo '企业管理';
                }elseif($val['job'] == 0){
                    echo '公司职员';
                
                }elseif ($val['job'] == 2) {
                    echo "私营企业主";
                }elseif ($val['job'] == 3) {
                    echo "事业单位";
                }elseif ($val['job'] == 4) {
                    echo "自由职业";
                }

            ?>
            </td>
            <td ><?php echo $val['age'] ?></td> -->
           <!--  
            <?php 
            // 处理图片路径 
            $img_path = 'uploads/';
            $img_path .= substr($val['filename'], 0, 4).'/';
            $img_path .= substr($val['filename'], 4, 2).'/';
            $img_path .= substr($val['filename'], 6, 2).'/';
            $img_path .= $val['filename'];
            ?>
            <td><img  style="width:100px;height:100px;" src="<?php echo $img_path ?>"/></td> -->
           
            
            <td >
               <!--  <?php if($val['type'] != 1): ?>  -->
                
                <?php echo $val['time'] ?>
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
