<?php
session_start();
	$studentnum = $_POST['studentnum'];
	$classid = $_POST['classid'];
	require('conn.php');
	mysql_query("DELETE FROM collection WHERE studentnum = '$studentnum' AND classid = '$classid'");
	$url = "../usercenter.php?menujump=2";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
?>