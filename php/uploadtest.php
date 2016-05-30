<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>课程测试系统</title>
</head>
	<body>
	<?php
		$category = $_GET['category'];
		if ($category == 's') {
			$testcategory = $_POST['testcategory'];
			$testsubclass = $_POST['testsubclass'];
			$testcontent = $_POST['testdetail'];
			$answerA = $_POST['answerA'];
			$answerB = $_POST['answerB'];
			$answerC = $_POST['answerC'];
			$answerD = $_POST['answerD'];
			$correntanswer = $_POST['correntanswer'];
			require('conn.php');
			mysql_query("INSERT INTO `selecttest`(`testcategory`, `testsubclass`, `testcontent`, `selecta`, `selectb`, `selectc`, `selectd`, `correntanswer`) VALUES ('$testcategory','$testsubclass','$testcontent','$answerA','$answerB','$answerC','$answerD','$correntanswer')");
			if (mysql_error() == "") {
				echo "<script language='javascript' type='text/javascript'>";
				echo "history.back(-1);";
				echo "</script>";
			}else {
				echo "<a href='../upload.php'>上传题目失败，请尝试重新上传</a>";
			}
		}
		if ($category == 't') {
			$testsubclass = $_POST['testsubclass'];
			$testcontent = $_POST['testdetail'];
			$correntanswer = $_POST['correntanswer'];
			require('conn.php');
			mysql_query("INSERT INTO `trueorfalse`(`testsubclass`, `testcontent`, `correntanswer`) VALUES ('$testsubclass','$testcontent','$correntanswer')");
			if (mysql_error() == "") {
				echo "<script language='javascript' type='text/javascript'>";
				echo "history.back(-1);";
				echo "</script>";
			}else {
				echo "<a href='../upload.php'>上传题目失败，请尝试重新上传</a>";
			}
		}
	?>
	</body>
</html>
