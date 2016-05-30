<?php
	session_start();
?>
<!DOCTYPE html>
<html data-ng-app="test">
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/test.css" />
	<link type="text/css" rel="stylesheet" href="css/common.css" />
	<title>课程测试系统</title>
	<script src="js/angular.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/test.js"></script>
</head>
<body data-ng-controller="testController">
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
					<li><a href="upload.php">测试题上传系统</a></li>
					
				</ul>
			</nav>
		</div>
	</header>
	<div class="mainContent">
		<div class="menu">
			<form action="test.php" method="post">
				<span>请输入测试课程名称：</span>
				<input type="text" class="selectTestCategory" name="selectTestCategory" data-ng-model="testCategory" autocomplete="off" />
				<span>请输入试卷题量：</span>
				<span>单选题：</span>
				<input type="text" class="selectTestnum" name="singleselecttestnum" data-ng-model="singleSelectTestNum" value="10" autocomplete="off" />
				<span>多选题：</span>
				<input type="text" class="selectTestnum" name="multipleselecttestnum" data-ng-model="multipleSelectTestNum" value="0" autocomplete="off" />
				<span>判断题：</span>
				<input type="text" class="trueorfalsenum" name="trueorfalsenum" data-ng-model="trueOrFalseNum" value="5" autocomplete="off" />
				<input type="submit" class="submitTestCategory" value="确认组卷" data-ng-click="setTest(testCategory, singleSelectTestNum, multipleSelectTestNum, trueOrFalseNum)" />
			</form>
		</div>
		<div class="displayOrHideMenu">
		</div>
		<?php
			@$selectTestCategory = $_POST['selectTestCategory'];
			@$singleselecttestnum = $_POST['singleselecttestnum'];
			@$multipleselecttestnum = $_POST['multipleselecttestnum'];
			@$trueorfalsenum = $_POST['trueorfalsenum'];
			require('php/conn.php');
			echo "<form action=php/recordtest.php onsubmit=adddate() method=post>";
			echo "<input type=hidden name=singleselecttestnum value='$singleselecttestnum' />";
			echo "<input type=hidden name=multipleselecttestnum value='$multipleselecttestnum' />";
			echo "<input type=hidden name=trueorfalsenum value='$trueorfalsenum' />";
			if ($singleselecttestnum != 0) {
				echo "<div class=testTitle><span>单选题：</span></div>";
				$singleselectdata = mysql_query("SELECT * FROM `selecttest` WHERE testcategory = 'single' AND testsubclass LIKE '%$selectTestCategory%' order by rand() limit $singleselecttestnum",$conn);
				for ($i=1; $i <= $singleselecttestnum; $i++) {
					$info = mysql_fetch_array($singleselectdata,MYSQL_ASSOC);
					echo "<div class=selectTestBg>";
					echo "<span class=testDetail>".$i."、".$info['testcontent']."</span>";
					echo "<input type=hidden name=stestnum$i value=".$info['testnum']." />";
					echo "<label><input type=radio name=sanswer$i value=A />A：".$info['selecta']."</label>";
					echo "<label><input type=radio name=sanswer$i value=B />B：".$info['selectb']."</label>";
					echo "<label><input type=radio name=sanswer$i value=C />C：".$info['selectc']."</label>";
					echo "<label><input type=radio name=sanswer$i value=D />D：".$info['selectd']."</label>";
					echo "</div>";
				}
			}
			if ($multipleselecttestnum != 0) {
				echo "<div class=testTitle><span>多选题：</span></div>";
				$multipleselectdata = mysql_query("SELECT * FROM `selecttest` WHERE testcategory = 'multiple' AND testsubclass LIKE '%$selectTestCategory%' order by rand() limit $multipleselecttestnum",$conn);
				for ($i=1; $i <= $multipleselecttestnum; $i++) {
					$info = mysql_fetch_array($multipleselectdata,MYSQL_ASSOC);
					$arr_symbol='[]';
					echo "<div class=selectTestBg>";
					echo "<span class=testDetail>".$i."、".$info['testcontent']."</span>";
					echo "<input type=hidden name=mtestnum$i value=".$info['testnum']." />";
					echo "<label><input type=checkbox name=manswer$i$arr_symbol value=A />A：".$info['selecta']."</label>";
					echo "<label><input type=checkbox name=manswer$i$arr_symbol value=B />B：".$info['selectb']."</label>";
					echo "<label><input type=checkbox name=manswer$i$arr_symbol value=C />C：".$info['selectc']."</label>";
					echo "<label><input type=checkbox name=manswer$i$arr_symbol value=D />D：".$info['selectd']."</label>";
					echo "</div>";
				}
			}
			if ($trueorfalsenum != 0) {
				echo "<div class=testTitle><span>判断题：</span></div>";
				$trueorfalsedata = mysql_query("SELECT * FROM `trueorfalse` WHERE testsubclass LIKE '%$selectTestCategory%' order by rand() limit $trueorfalsenum",$conn);
				for ($i=1; $i <= $trueorfalsenum; $i++) {
					$info = mysql_fetch_array($trueorfalsedata,MYSQL_ASSOC);
					echo "<div class=trueOrfalseTestBg>";
					echo "<span class=testDetail>".$i."、".$info['testcontent']."</span>";
					echo "<input type=hidden name=ttestnum$i value=".$info['testnum']." />";
					echo "<label><input type=radio name=tanswer$i value=T />√</label>";
					echo "<label><input type=radio name=tanswer$i value=F />×</label>";
					echo "</div>";
				}
			}
			if ($singleselecttestnum != 0 || $multipleselecttestnum != 0 || $trueorfalsenum != 0) {
				echo "<div class=submitYourTest>";
				echo "<input type=hidden class=submitTestTime name=submittesttime />";
				echo "<input type=submit value=提交试卷 />";
				echo "</div>";
				echo "</form>";
			}
		?>
	</div>
</body>
</html>