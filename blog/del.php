<?php
include "conn.php";

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql  = "delete from blog where bid = '$id'";
	$query = mysqli_query($link,$sql);
	if($query){
		header('location:index.php');
	}else{
		echo "<script>alert('删除失败!')</script>";
	}
}
?>