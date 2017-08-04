//统计人数
$sq = "select * from $tbname";
$qu = mysql_query($sq);
$qq = mysql_num_rows($qu);

if($qq>19){
	echo "m";exit;
}