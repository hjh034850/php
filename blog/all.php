<a href="index.php">回到主页</a>
<?php
include "conn.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql  = "update blog set hits = hits +1 where bid='$id'";
	$query = mysqli_query($link,$sql);
	if(query){
		$sql = "select * from blog where bid='$id'";
		$query = mysqli_query($link,$sql);
		$rs = mysqli_fetch_array($query);
	}else{
		
	}
	
}



?>
<meta charset="UTF-8">
<h3>标题:<?php echo $rs['title']?></h3>
<li>时间:<?php echo $rs['time']?></li>
<li>访问数:<?php echo $rs['hits']?></li>
<p>内容:<?php echo $rs['content']?></p>
<hr />