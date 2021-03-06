<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/common.css" />
	<link type="text/css" rel="stylesheet" href="css/index.css" />
	<title>主页</title>
	<script src="js/jquery.js"></script>
	<script src="js/index.js"></script>
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
							echo "<a class=loginOrsignup>点击登录</a>";
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
		<div class="searchAndDisplay">
		</div>
		<div class="bg1">	
			<div class="category">
				<ul>
					<li class="otherLink">
							<?php
							if (substr($check,0,1) == 'T') {
								echo "<a href=upload.php>模拟测试传送门</a>";
							 
								}elseif (substr($check,0,1) == 'U') {
									echo "<a href=test.php>模拟测试传送门</a>";
								} 
									?>
								</li>
								
					<li class="otherLink">
						<?php
							@$check = $_SESSION['account'];
							if (substr($check,0,1) == 'T') {
									echo "<a href=tusercenter.php?menujump=3>课程&作业</a>";
								}elseif (substr($check,0,1) == 'U') {
									echo "<a href=usercenter.php?menujump=3>课程&作业</a>";
								}

						?>
					</li>
					<li class="otherLink"><a href="communicate.php" >交流学习与吐槽</a></li>
					<li class="searchFor">
						<form method="post" action="search.php?page=1">
							<input class="searchTxt" type="text" name="searchcontent" value=""/>
							<input class="submitSearch" type="image" src="image/index/searchFor.png" />
						</form>
					</li>
				</ul>
			</div>
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
				<span class="signup"><a href="signup.php">忘密码？点此找回></a></span>
			</div>
		</div>
	</header>
	<div class="asideMenu0" id="asideMenu0">
		<ul>
			<li class="asideMenu1 asideMenu" value='1000'  >法学</li>
			<li class="asideMenu2 asideMenu"  >管理</li>
			<li class="asideMenu3 asideMenu"  >工学</li>
			<li class="asideMenu4 asideMenu"  >经济</li>
			<li class="asideMenu5 asideMenu" >教育</li>
			<li class="asideMenu6 asideMenu" >历史</li>
			<li class="asideMenu7 asideMenu"  >理学</li>
			<li class="asideMenu8 asideMenu"  >文学</li>
			<li class="asideMenu9 asideMenu"  >医学</li>
			<li class="asideMenu10 asideMenu" >哲学</li>
			<li class="asideMenux backToTop asideMenu" value="0"><img src="image/index/backToTop.png"/></li>
		</ul>
	</div>
	<div class="todayRecommend">
		<div class="newestClass">
			<img src="image/class/zcyl1.png" />
		</div>
		<div class="clickMostClass">
			<div class="classMostNo1 classMostNum">
				<img src="image/class/zcyl2.png" />
			</div>
			<div class="classMostNo2 classMostNum">
				<img src="image/class/zcyl3.png" />
			</div>
			<div class="classMostNo3 classMostNum">
				<img src="image/class/zcyl4.png" />
			</div>
			<div class="classMostNo4 classMostNum">
				<img src="image/class/zcyl5.png" />
			</div>
			<div class="classMostNo5 classMostNum">
				<img src="image/class/zcyl6.png" />
			</div>
			<div class="classMostNo6 classMostNum">
				<img src="image/class/zcyl7.png" />
			</div>
		</div>
	</div>
	<div class="fxTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag0' ><a href="">法学</a></li>
				<li class="titleHeaderMenu">
					<input type="button" value="最新课程" id="theNewestClass1" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular1" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest1">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '法学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click1" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '法学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div class="glTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag1' ><a href="">管理学</a></li>
				<li class="titleHeaderMenu" >
					<input type="button" value="最新课程" id="theNewestClass2" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular2" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest2">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '管理学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click2" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '管理学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div class="gxTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag2'><a href="">工学</a></li>
				<li class="titleHeaderMenu">
					<input type="button" value="最新课程" id="theNewestClass3" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular3" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest3">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '工学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click3" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '工学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div class="jjTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag3'><a href="">经济学</a></li>
				<li class="titleHeaderMenu">
					<input type="button" value="最新课程" id="theNewestClass4" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular4" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest4">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '经济学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click4" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '经济学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div class="jyTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag4' ><a href="">教育学</a></li>
				<li class="titleHeaderMenu">
					<input type="button" value="最新课程" id="theNewestClass5" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular5" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest5">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '教育学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click5" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '教育学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div class="lsTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag5' ><a href="">历史学</a></li>
				<li class="titleHeaderMenu">
					<input type="button" value="最新课程" id="theNewestClass6" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular6" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest6">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '历史学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click6" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '历史学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div class="lxTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag6' ><a href="">理学</a></li>
				<li class="titleHeaderMenu">
					<input type="button" value="最新课程" id="theNewestClass7" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular7" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest7">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '理学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click7" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '理学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div class="wxTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag7'><a href="">文学</a></li>
				<li class="titleHeaderMenu">
					<input type="button" value="最新课程" id="theNewestClass8" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular8" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest8">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '文学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click8" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '文学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div class="yxTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag8'><a href="">医学</a></li>
				<li class="titleHeaderMenu">
					<input type="button" value="最新课程" id="theNewestClass9" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular9" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest9">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '医学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click9" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '医学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div class="zxTop10 top10">
		<div class="titleHeader">
			<ul>
				<li class="titleHeaderMenu"><img class="bookImage" src="image/common/book.png" /></li>
				<li class="titleHeaderMenu titleName" id='sideBarFlag9'><a href="">哲学</a></li>
				<li class="titleHeaderMenu">
					<input type="button" value="最新课程" id="theNewestClass10" class="buttonBg menuFocus"/>
				</li>
				<li class="titleHeaderMenu">
					<input type="button" value="播放最多" id="theMostPopular10" class="buttonBg"/>
				</li>
			</ul>
		</div>
		<div class="classTop10" id="top10Newest10">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '哲学' order by classupdatetime desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="classTop10" id="top10Click10" style="display:none">
			<?php
				require('php/conn.php');
				$result = mysql_query("SELECT classid,classdescription,classimagepath FROM class WHERE classcategory = '哲学' order by classclicknum desc limit 10", $conn);
				while($row = mysql_fetch_array($result)){
				echo "<a href=class.php?classid=".$row['classid'].">";
				echo '<div class="classTop10Num">';
				echo '<div class="imageDisplay">';
				echo '<img src="'.$row['classimagepath'].'" />';
				echo '</div>';
				echo '<div class="classIntroduction">';
				echo $row['classdescription'];
				echo '</div>';
				echo '</div>';
				echo "</a>";
				}
			?>
		</div>
		<div class="getMoreClass">
			<input type="button" value="查看更多>"/>
		</div>
	</div>
	<div  class="top10 autherTop10 g-ft m-yktFoot" style="height:200px">
		 
		 <div class="foot-top" >
			 <div class="logo"></div>
			 <p class="txt f-fs0"> 网易公司(163.com)旗下实用技能学习平台。与顶级机构、院校和优秀讲师合作，为您提供海量优质课程，以及创新的在线学习体验，帮助您获得全新的个人发展和能力提升。</p>
			 <div class="copy">©<span>1997-2016</span> 网易公司 版权所有</div>
		 
		 
		</div>
	</div>
</body>
</html>