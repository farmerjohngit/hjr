<?php
	date_default_timezone_set('prc');
	session_start();
	require('conn.php');
	$state = $_GET['state'];
	$classid = $_GET['classid'];
	$studentnum = $_SESSION['account'];
	$collecttime = date('YmdHis',time());
	echo $state,$classid,$studentnum,$collecttime;
	if ($state == 0) {
		mysql_query("INSERT INTO `collection`(`classid`, `studentnum`, `collecttime`) VALUES($classid,'$studentnum','$collecttime')");
		echo "<script language='javascript' type='text/javascript'>";
		echo "history.back(-1);";
		echo "</script>";
		exit;
	}
	if ($state == 1) {
		mysql_query("DELETE FROM `collection` WHERE classid = $classid AND studentnum = '$studentnum'");
		echo "<script language='javascript' type='text/javascript'>";
		echo "history.back(-1);";
		echo "</script>";
		exit;
	}
?>