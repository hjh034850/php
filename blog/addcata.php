<?php
include 'conn.php';
if(isset($_POST['sub'])){
	$cataname = $_POST['cata'];
	$sql = "select * from catalog where catalog_name = '$cataname'";
	$query = mysqli_query($link,$sql);
	$rs = mysqli_fetch_array($query);
	if($rs){
		echo "<script>alert('已存在分类!')</script>";
		echo "<script>location = 'addcata.php'</script>";
	}else{
		$sql = "insert into catalog values(null,'$cataname')";
		$query = mysqli_query($link,$sql);
		if($query){
			header('location:add.php');
		}
	}
}




?>



<meta charset="UTF-8">
<form action="addcata.php" method="post">
添加分类：<input type="text" name="cata">
	<input type="submit" name="sub" value="添加">
</form>