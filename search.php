<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/search.css" />
	<link type="text/css" rel="stylesheet" href="css/common.css" />
	<title>搜索</title>
	<script src="js/jquery.js"></script>
	<script src="js/common.js"></script>
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
								if (substr($check,0,1) == 'T') {
									echo "<a href=tusercenter.php?menujump=1>";
									echo "个人中心";
									echo "</a>";
								}elseif (substr($check,0,1) == 'U') {
									echo "<a href=usercenter.php?menujump=1>";
									echo "个人中心";
									echo "</a>";
								}
							}
						?>
					</li>
					<li>欢迎来到HJR--ONLINE！
					<?php
						require('php/conn.php');
						@$check = $_SESSION['account'];
						if (!$check) {
							echo "<a class=loginOrsignup>登录/注册</a>";
						}else {
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
							echo "<a href=php/sessiondestroy.php>";
							echo "&nbsp;&nbsp;注销！";
							echo "</a>";
						}
					?>
					</li>
				</ul>
			</nav>
		</div>
		<div class="loginBg">
			<div class="loginAndSignup">
				<div class="closeTheDiv">
					<span>登 录</span>
					<img src="image/common/close.png" />
				</div>
				<form action="php/login.php" method="post" onsubmit="return check()">
					<div class="selectTeOrStu">
						<label><input type="radio" name="selectTeOrStu" value="teacher"/> 教师</label>
						<label><input type="radio" name="selectTeOrStu" value="student" checked="checked"/> 学生</label>
					</div>
					<div class="userName">
						<img src="image/index/account.png" />
						<input type="text" name="userAccount" placeholder="用户名/邮箱" />
						<span class="accountWarn">账号不能为空！</span>
					</div>
					<div class="userPwd">
						<img src="image/index/password.png" />
						<input type="password" name="userPassword" placeholder="请输入密码" />
						<span class="passwordWarn">密码不能为空！</span>
					</div>
					<div class="login">
						<input type="submit" name="submit" value="登 录" />
						<span class="loginWarn">账号或密码错误！</span>
					</div>
				</form>
				<span class="signup"><a href="">没有账号？立即注册></a></span>
			</div>
		</div>
		<div class="searchBg">
			<form action="search.php?page=1" method="post">
				<div class="searchContent">
					<?php
						echo "<input type=text name=searchcontent value=".@$_POST['searchcontent']." >";
					?>
				</div>
				<div class="searchForButton">
					<input type="submit" value="搜 索" />
				</div>
			</form>
		</div>
	</header>
	<div class="searchResultBg">
		<?php
			require('php/conn.php');
			@$content = $_POST['searchcontent'];
			$query = "SELECT * FROM class WHERE classname LIKE '%$content%' || classcategory LIKE '%$content%' || classdescription LIKE '%$content%' order by classupdatetime";
			$result = mysql_query($query,$conn);
			$totalnum = mysql_num_rows($result);
			$pagesize = 10;
			$page = $_GET["page"];
			if ($page == "") {
				$page = 1;
			}
			$begin = ($page - 1) * $pagesize;
			$totalpage = ceil($totalnum / $pagesize);
			$datanum = mysql_num_rows($result);
			$query = "SELECT * FROM class WHERE classname LIKE '%$content%' || classcategory LIKE '%$content%' || classdescription LIKE '%$content%' order by classupdatetime limit $begin,$pagesize";
			$result = mysql_query($query,$conn);
			$datanum = mysql_num_rows($result);
			for ($j = 0; $j < $datanum; $j++) {
				$info = mysql_fetch_array($result,MYSQL_ASSOC);
				echo "<div class=resultClass>";// TODO need to change classid style
				echo "<a href=class.php?classid=".$info['classid']."><img class=imageDisplay src=".$info['classimagepath']." />" ;
				echo "<span class=classCategory>【".$info['classcategory']."】".$info['classname']."</span></a>";
				echo "<span class=classTeachBy>主讲：".$info['classteachby']."</span>";
				echo "<span class=classClickNum>点击量：".$info['classclicknum']."</span>";
				echo "<span class=classCommentNum>评论：".$info['classclicknum']."条</span>";
				echo "<span class=classUpdateDate>更新日期：";
				echo substr($info['classupdatetime'],0,4);
				echo "-";
				echo substr($info['classupdatetime'],4,2);
				echo "-";
				echo substr($info['classupdatetime'],6,2);
				echo "</span>";
				echo "<span class=classDescription>".$info['classdescription']."</span>";
				echo "</div>";
			}
			echo "<div class=pageInfor>";
			for ($i = $totalpage; $i >= 1; $i--) {
				echo "<span class=pageButton><a href=search.php?page=".$i.">[".$i."]</a></span>";
			}
			echo "<span class=pageAndDate>共".$totalpage."页/".$totalnum."个数据</span>";
			echo "</div>";
			mysql_close($conn);
		?>
	</div>
</body>
</html>