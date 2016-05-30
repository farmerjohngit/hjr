<!DOCTYPE html>
<html>
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	date_default_timezone_set('prc');
	session_start();
	require('conn.php');
	$teachernum = $_SESSION['account'];
	$addtime = date('YmdHis',time());
	$classname = $_POST['classname'];
	$classcategory = $_POST['classcategory'];
	$check = mysql_query("SELECT * FROM `testulink` WHERE teacherid = '$teachernum' AND stuclassname = '$classname' AND coursename = '$classcategory' limit 1");
	$checknum = mysql_num_rows($check);
	if ($checknum) {
		echo "记录已存在，请勿重复提交！";
		echo "<script language='javascript' type='text/javascript'>";
		echo "function jump() {location='../tusercenter.php?menujump=2'}";
		echo "setTimeout('jump()',2000);";
		echo "</script>";
	}
	mysql_query("INSERT INTO `testulink`(`teacherid`, `stuclassname`, `coursename`, `addtime`) VALUES ('$teachernum','$classname','$classcategory','$addtime')");
	if (mysql_error() == "") {
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='../tusercenter.php?menujump=2'";
		echo "</script>";
	}else{
		echo "添加失败，请尝试重新添加!";
		echo "<script language='javascript' type='text/javascript'>";
		echo "function jump() {location='../tusercenter.php?menujump=2'}";
		echo "setTimeout('jump()',2000);";
		echo "</script>";
	}
?>
</body>
</html>