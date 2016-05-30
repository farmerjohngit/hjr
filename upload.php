<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/upload.css" />
	<link type="text/css" rel="stylesheet" href="css/common.css" />
	<title>上传测试题系统</title>
	<script src="js/jquery.js"></script>
	<script src="js/upload.js"></script>
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
		<div class="testTitle"><span>选择题：</span></div>
		<div class="selectTestBg">
			<form action="php/uploadtest.php?category=s" method="post">
				<div class="categoryAndSubclass">
					<span>选择题类型：</span>
					<label><input type="radio" name="testcategory" value="single" checked="checked" />单选</label>
					<label><input type="radio" name="testcategory" value="multiple" />多选</label>
					<span>题目所在科目：</span>
					<input type="text" name="testsubclass" value="数据结构" />
				</div>
				<textarea class="testDetail" name="testdetail" placeholder="请输入题干"></textarea>
				<input class="answers" type="text" autocomplete="off" name="answerA" value="" placeholder="请输入选项A"/>
				<input class="answers" type="text" autocomplete="off" name="answerB" value="" placeholder="请输入选项B" />
				<input class="answers" type="text" autocomplete="off" name="answerC" value="" placeholder="请输入选项C" />
				<input class="answers" type="text" autocomplete="off" name="answerD" value="" placeholder="请输入选项D" />
				<input class="answers" type="text" autocomplete="off" name="correntanswer" value="" placeholder="请输入正确答案序号" />
				<input class="submitTest" type="submit" value="上传试题" />
			</form>
		</div>
		<div class="testTitle"><span>判断题：</span></div>
		<div class="trueOrfalseTestBg">
			<form action="php/uploadtest.php?category=t" method="post">
				<div class="categoryAndSubclass">
					<span>题目所在科目：</span>
					<input type="text" name="testsubclass" value="数据结构" />
				</div>
				<textarea class="testDetail" name="testdetail"></textarea>
				<label><input type="radio" name="correntanswer" value="T" />√</label>
				<label><input type="radio" name="correntanswer" value="F" />×</label>
				<input class="submitTest" type="submit" value="上传试题" />
			</form>
		</div>
	</div>
</body>
</html>