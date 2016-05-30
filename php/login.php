<?php
session_start();

$selectTable = $_POST['selectTeOrStu'];

$username = $_POST['userAccount'];

$userpwd = $_POST['userPassword'];

require('conn.php');

if ($selectTable == 'student') {
	
	$check_query = mysql_query("SELECT * FROM $selectTable WHERE studentnum = '$username' AND stupassword = '$userpwd' limit 1");
	
	if($result = mysql_fetch_array($check_query)){
		
		$_SESSION['account'] = $username;
		
		echo "<script language='javascript' type='text/javascript'>";
		
		echo "history.back(-1);";
		
		echo "</script>";
		
		exit;
		
	}
	else {
		
		echo "<script language='javascript' type='text/javascript'>";
		
		echo "history.back(-1);";
		
		echo "alert('帐号或密码错误！');";
		
		echo "</script>";
		
	}
	
}

if ($selectTable == 'teacher') {
	
	$check_query = mysql_query("SELECT * FROM $selectTable WHERE teachernum = '$username' AND tepassword = '$userpwd' limit 1");
	
	if($result = mysql_fetch_array($check_query)){
		
		$_SESSION['account'] = $username;
		
		echo "<script language='javascript' type='text/javascript'>";
		
		echo "history.back(-1);";
		
		echo "</script>";
		
		exit;
		
	}
	else {
		
		echo "<script language='javascript' type='text/javascript'>";
		
		echo "history.back(-1);";
		
		echo "alert('帐号或密码错误！');";
		
		echo "</script>";
		
	}
	
}

?>