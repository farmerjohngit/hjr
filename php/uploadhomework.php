<?php
	session_start();
?>
<?php
	require('conn.php');
	date_default_timezone_set('prc');
	$file = $_FILES ['userfile'];
	@$extName=strtolower(end(explode('.',$file['name'])));
	$filename=date("YmdHis").".".$extName;
	$dest = '../homework/teacher/'.$filename;
	move_uploaded_file($file ['tmp_name'], $dest);
	$class = $_POST['classyouchoose'];
	$classstr =implode(',',$class);
	$teachernum = $_SESSION['account'];
	$addtime = date("YmdHis");
	mysql_query("INSERT INTO thomework VALUES ('$addtime','$teachernum','$classstr','$dest')");
	if (mysql_error() == "") {
		echo "<script language='javascript' type='text/javascript'>";
		echo "history.back(-1);";
		echo "</script>";
	}
?>