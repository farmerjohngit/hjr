<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/signup.css" />
	<link type="text/css" rel="stylesheet" href="css/common.css" />
	<title>个人中心</title>
	<script src="js/jquery.js"></script>
	<script src="js/newpwd.js"></script>
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
				</ul>
			</nav>
		</div>
	</header>
	 
	<div class="userInform">
		<div class="message">
			<span class="topic">修改密码：</span>
		</div>

							
			<form action="php/changepwd.php" method="post" onsubmit="return check()">
			 	<?php
							@$usernum = $_SESSION['usernum']; 
							echo "<input type='hidden' name='usernum' value='$usernum' />" 
							?>
			<div class="message">
		
				<span class="theNote">请输入您新密码：</span>
				<input type="text" id="origin" class="usernumInput" name="newpwd" />
				<span id="warn1" class="theWarning">× 此处不能为空！</span>
			</div>
			<div class="message">
				<span class="theNote">再输入一遍：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
				<input type="text" id="again" class="usernumInput" name="newpwd" />
				<span id="warn2" class="theWarning">× 此处不能为空！</span>
			</div>
			<div class="message" style='margin-left: 412px;'>
			<span id="warn3" class="theWarning" style='text-align:auto;	float: none;
margin-left:auto;margin-right:auto;'>密码不一致 ！</span>
			</div>
			<div class="message">
				<input type="submit" class="nextStep" value="确定" />
			</div>
		</form>		
		<!-------------------------------------------------------------------------------------------------丢了 a.php   数据库补充字段 -------------------------------------------------------------------------------------------------->	
	 
	</div>
</body>
</html>