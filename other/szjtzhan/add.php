<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';		
	$sql="select * from $tbname where shen='2' order by time desc";
	$query=mysql_query($sql);

	while ($row=mysql_fetch_assoc($query)) {
	?>
	  <li>
		<a class="fl" href="javascript:;"><img width="50px" height="50px" src="<?php echo $row['tou']?>" alt="" /></a>
	    <p><?php echo substr($row['xy'],0,164)?>...</p>
		<br>
		<p><span style="font-size: 18px;color: red;">♥</span> <?php echo $row['zan']?></p>
	  </li>
	<?php
	}
?>