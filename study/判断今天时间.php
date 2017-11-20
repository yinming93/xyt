<?php
/**
 * PHP判断一个日期是不是今天
 * 琼台博客
 */
echo '<meta charset="utf-8" />';
// 拟设一个日期
$a = '2016-07-27 10:10:10';
// 截取日期部分，摒弃时分秒
$b = substr($a,0,10);
// 获取今天的日期，格式为 YYYY-MM-DD
$c = date('Y-m-d');
// 使用IF当作字符串判断是否相等
if($b==$c){
    echo '今天已经吃过';
}else{
    echo '没吃过，来吧！';
}
?>
<!-- 第二种：
<?php
/**
 * PHP判断一个日期是不是今天
 * 琼台博客
 */
echo '<meta charset="utf-8" />';
// 拟设一个日期
$a = '2012-06-28 10:10:10';
// 转换为时间戳
$a_ux = strtotime($a);
// 转换为 YYYY-MM-DD 格式
$a_date = date('Y-m-d',$a_ux);
// 获取今天的 YYYY-MM-DD 格式
$b_date = date('Y-m-d');
// 使用IF当作字符串判断是否相等
if($a_date==$b_date){
    echo '是今天';
}else{
    echo '不是今天';
}
?> -->