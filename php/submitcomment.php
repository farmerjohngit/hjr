<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<?php
	require('conn.php');
	$theuseraccount = $_POST['theuseraccount'];
	$yourcomments = $_POST['yourComments'];
	$thetime = $_POST['thetime'];
	$thisclassid = $_POST['thisclassid'];
	@$check = $_SESSION['account'];
	if (!$check) {
		echo "<script language='javascript' type='text/javascript'>";
		echo "history.back(-1);";
		echo "alert('请先登录，再发表评论！')";
		echo "</script>";
	}else {
		mysql_query("INSERT INTO `comment`(`useraccount`, `commentclassid`, `content`, `commenttime`) VALUES ('$theuseraccount',$thisclassid,'$yourcomments','$thetime')");
		echo "<script language='javascript' type='text/javascript'>";
		echo "history.back(-1);";
		echo "</script>";
	}
?>
</body>
</html>

