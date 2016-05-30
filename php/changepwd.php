<?php
session_start();
	$usernum = $_POST['usernum'];
	$newpwd = $_POST['newpwd'];
		$selectTable = null;
		$selectField = null;
		require('conn.php');
	$selectPwd = null;
		if (substr($usernum,0,1) == 'T') {
		$selectTable='teacher';
		$selectPwd='tepassword';
		$selectField='teachernum';
		}else{
		$selectTable='student';
		$selectPwd='stupassword';
		$selectField='studentnum';
		}
	$check_query = mysql_query("UPDATE $selectTable SET $selectPwd='$newpwd' WHERE $selectField = '$usernum' ");
	 
	if($check_query){
			$url = "../index.php";
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('修改成功!');";
			echo "window.location.href='$url'";
			
			echo "</script>";
}else{
		echo "<script language='javascript' type='text/javascript'>";
			echo "history.back(-1);";
			echo "修改失败！";
			echo "</script>";
	}
?>