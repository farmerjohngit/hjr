<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/showmethedetails.css" />
	<link type="text/css" rel="stylesheet" href="css/common.css" />
	<title>测试记录</title>
	<script src="js/jquery.js"></script>
</head>
<body>
	<header><!--公用首部-->
		<div class="bg0">
			<nav class="topInfor">
				<ul class="outsideLink">
					<li><a href="index.php">网站首页</a></li>
					<li><a href="http://jwc.csuft.edu.cn/" target="_blank">教务处系统</a></li>
					<li><a href="http://www.csuft.edu.cn/" target="_blank">中南林业科技大学</a></li>
				</ul>
				<ul class="userLink">
					<li><a href=""><span class="download">下载客户端</span></a></li>
					<li>
						<?php
							@$check = $_SESSION['account'];
							if ($check) {
								echo "<a href=usercenter.php?menujump=1>";
								echo "个人中心";
								echo "</a>";
							}
						?>
					</li>
					<li>欢迎来到HJR--ONLINE！
					<?php
						require('php/conn.php');
						@$check = $_SESSION['account'];
						if ($check) {
							if (substr($check,0,1) == 'T') {
								$result = mysql_query("SELECT teachername FROM teacher WHERE teachernum = '$check'");
								$teachername = mysql_result($result,0,"teachername");
								echo $teachername;
								echo "老师";
							}elseif (substr($check,0,1) == 'U') {
								$result = mysql_query("SELECT studentname FROM student WHERE studentnum = '$check'");
								$studentname = mysql_result($result,0,"studentname");
								echo $studentname;
								echo "同学";
							}
						}
					?>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="mainContent">
		<div class="displayOrHideMenu">
		</div>
		<?php
			require('php/conn.php');
			$testtime = $_GET['testtime'];
			$record1 = mysql_query("SELECT * FROM testrecord WHERE time = '$testtime' AND testcategory = 's'");
			$datanum1 = mysql_num_rows($record1);
			$record2 = mysql_query("SELECT * FROM testrecord WHERE time = '$testtime' AND testcategory = 't'");
			$datanum2 = mysql_num_rows($record2);
			if ($datanum1 > 0) {
				echo "<div class=testTitle><span>选择题：</span></div>";
				for ($i=1; $i <= $datanum1; $i++) { 
					$info = mysql_fetch_array($record1,MYSQL_ASSOC);
					$testnum = $info['testnum'];
					$testresult = mysql_query("SELECT * FROM selecttest WHERE testnum = '$testnum' limit 1");
					$testinform = mysql_fetch_array($testresult,MYSQL_ASSOC);
					echo "<div class=selectTestBg>";
					echo "<span class=testDetail>".$i."、".$testinform['testcontent']."</span>";
					echo "<span class=answer>A：".$testinform['selecta']."</span>";
					echo "<span class=answer>B：".$testinform['selectb']."</span>";
					echo "<span class=answer>C：".$testinform['selectc']."</span>";
					echo "<span class=answer>D：".$testinform['selectd']."</span>";
					echo "<span class=answer>你的答案：".$info['answer']."&nbsp;&nbsp;&nbsp;正确答案：".$testinform['correntanswer']."";
					if ($info['answer'] == $testinform['correntanswer']) {
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=#FF0000>√</font>";
					}else {
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=#FF0000>×</font>";
					}
					echo "</span>";
					echo "</div>";
				}
			}
			if ($datanum2 > 0) {
				echo "<div class=testTitle><span>判断题：</span></div>";
				for ($i=1; $i <= $datanum2; $i++) { 
					$info = mysql_fetch_array($record2,MYSQL_ASSOC);
					$testnum = $info['testnum'];
					$testresult = mysql_query("SELECT * FROM trueorfalse WHERE testnum = '$testnum' limit 1");
					$testinform = mysql_fetch_array($testresult,MYSQL_ASSOC);
					echo "<div class=trueOrfalseTestBg>";
					echo "<span class=testDetail>".$i."、".$testinform['testcontent']."</span>";
					echo "<span class=answer>你的答案：".$info['answer']."&nbsp;&nbsp;&nbsp;正确答案：".$testinform['correntanswer']."";
					if ($info['answer'] == $testinform['correntanswer']) {
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=#FF0000>√</font>";
					}else {
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=#FF0000>×</font>";
					}
					echo "</span>";
					echo "</div>";
				}
			}
		?>
		<a href="usercenter.php?menujump=4"><div class="backToUsercenter">
				<span>返回个人中心</span>
			</div>
		</a>
	</div>
</body>
</html>