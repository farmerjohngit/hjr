<?php
	session_start();
	echo "<input type=hidden class=classid value=".@$_GET['classid']." />";
	echo "<input type=hidden class=usernum value=".@$_SESSION['account']." />";
?>
<!DOCTYPE html>
<html data-ng-app="myApp">
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/common.css" />
	<link type="text/css" rel="stylesheet" href="css/class.css" />
	<title></title>
	<script src="js/angular.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/class.js"></script>
	<script src="js/common.js"></script>
</head>
<body data-ng-controller="class">
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
	</header>
	<div class="mainContent">
		<div class="classTopicEtc">
			<?php
				require('php/conn.php');
				$classid = $_GET["classid"];
				$query = "SELECT * FROM class WHERE classid = $classid";
				$result = mysql_query($query,$conn);
				$info = mysql_fetch_array($result,MYSQL_ASSOC);
				echo "<div class=classTopic>";
				echo "<span>".$info['classcategory']." ></span>";
				echo "<span>".$info['classteachby']."：</span>";
				echo "<span>".$info['classname']."</span>";
				echo "</div>";
				echo "<div class=collectClass>";
				@$check = $_SESSION['account'];
				$collectstate = mysql_query("SELECT * FROM `collection` WHERE classid = $classid AND studentnum = '$check'",$conn);
				@$totalnum = mysql_num_rows($collectstate);
				if (!$totalnum) {
					echo "<a href=php/dealwithcollection.php?state=0&classid=".$classid."><span class=note>收藏课程</span></a>";
				}else {
					echo "<a href=php/dealwithcollection.php?state=1&classid=".$classid."><span class=note>取消收藏</span></a>";
				};
				echo "</div>";
				echo "<div class=notebook>";
				echo "<span class=note>笔记</span>";
				echo "</div>";
				echo "<div class=classTopic2>";
				echo "<span>".$info['classteachby']."：</span>";
				echo "<span>".$info['classname']."</span>";
				echo "</div>";
			?>
		</div>

		<div class="classVideoAndNote">		
			<object class="classVideo">
  				<param name="movie" value="vcastr22.swf">
  				<param name="quality" value="high">
  				<param name="allowFullScreen" value="true">
  				<?php
  					require('php/conn.php');
					$classid = $_GET["classid"];
					echo "<param name=FlashVars value=vcastr_file=video/".$classid.".flv&BufferTime=3&IsAutoPlay=0>";
					  				?>
			</object>
		</div>
		<div class="theComments">
			<div class="commentTitle">
				<span>评论 </span><span>{{commentList.leng}}</span>
			</div>
			<div class="commentsInput">
				<span class="warning">请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。</span>
					<textarea class="yourComments" name="yourComments" maxlength="200" placeholder="在这里输入你的评论" onfocus="adddate()"></textarea>
					<input type="hidden" value="" class="thetime" name="thetime" />
					<input type="button" data-ng-click="submitComment()" value="提交评论" />
			</div>
			<div class=classComments data-ng-repeat="_v in commentList">
				<img src=image/user/assna.png />
				<span class=floor>{{commentList.leng - $index}}</span>
				<span class=userName>{{_v.name}}</span>
				<span class=commentContent>{{_v.content}}</span>
				<span class=commentTime>{{_v.timetrans}}</span>
			</div>
		</div>
	</div>
</body>
</html>