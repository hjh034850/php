<?php

include "conn.php";
if(!isset($_COOKIE['uid'])){
	$url= $_SERVER['REQUEST_URI'];
	$arr = explode('/',$url);
	$len = count($arr) - 1;
	$ruri = $arr[$len];
	echo "<script>location='login.php?url=$ruri'</script>";
}

?>

<?php


	if(isset($_POST['sub'])){
		$title  = $_POST['title'];
		$con = $_POST['con'];
		$uid = $_COOKIE['uid'];
		$cid = $_POST['fenlei'];
		$sql = "insert into blog(bid,title,content,time,uid,catalog_id) values(null,'$title','$con',now(),'$uid','$cid')";
		$query = mysqli_query($link,$sql);
		if($query){
			echo "<script>location='index.php'</script>";
		}else{
			echo "error";
		}
	}
?>
<meta charset="UTF-8">
<form action="add.php" method="post">
标题:<input type="text" name="title"><select name="fenlei"><br>

<?php
	$sql = "select * from catalog";
	$query = mysqli_query($link,$sql);
	
	while($rs = mysqli_fetch_array($query)){
?>
<option value="<?php echo $rs['catalog_id']?>"><?php echo $rs['catalog_name']?></option><br>
<?php
	};
?>
</select>
<br>
内容:<textarea cols="20" rows="10" name="con"></textarea><br>
<input type="submit" name="sub" value="添加文章	">
</form>