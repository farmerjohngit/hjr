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
	$studentnum = $_SESSION['account'];
	$submittesttime = $_POST['submittesttime'];
	$singleselecttestnum = $_POST['singleselecttestnum'];
	$multipleselecttestnum = $_POST['multipleselecttestnum'];
	$trueorfalsenum = $_POST['trueorfalsenum'];
	if ($singleselecttestnum != 0) {
		for ($i=1; $i <= $singleselecttestnum; $i++) { 
			$testnum = 'stestnum'.$i;
			$answer = 'sanswer'.$i;
			$stestnum = $_POST[$testnum];
			$sanswer = $_POST[$answer];
			mysql_query("INSERT INTO `testrecord` VALUES ('$submittesttime','s','$stestnum','$studentnum','$sanswer')");
		}
	}
	if ($multipleselecttestnum != 0) {
		for ($i=1; $i <= $multipleselecttestnum; $i++) { 
			$testnum = 'mtestnum'.$i;
			$mtestnum = $_POST[$testnum];
			$arr=$_POST['manswer'.$i];
			$str='';
			$len=count($arr);
			echo $len;
			for ($j=0;$j<$len;$j++){
        $str=$str.$arr[$j];
         
        if($j!=$len-1){$str=$str.',';}
		 }
		 echo $str;
			mysql_query("INSERT INTO `testrecord` VALUES ('$submittesttime','s','$mtestnum','$studentnum','$str')");
		}
	}
	if ($trueorfalsenum != 0) {
		for ($i=1; $i <= $trueorfalsenum; $i++) { 
			$testnum = 'ttestnum'.$i;
			$answer = 'tanswer'.$i;
			$ttestnum = $_POST[$testnum];
			$tanswer = $_POST[$answer];
			mysql_query("INSERT INTO `testrecord` VALUES ('$submittesttime','t','$ttestnum','$studentnum','$tanswer')");
		}
	}
	if (mysql_error() == "") {
			echo "<script language='javascript' type='text/javascript'>";
		  echo "location='../usercenter.php?menujump=4'";
			echo "</script>";
		}
?>
</body>
</html>