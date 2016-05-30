<?php
	session_start();
	echo "<input type=hidden class=usernum value=".@$_SESSION['account']." />";
?>
<!DOCTYPE html>
<html data-ng-app="myApp">
<head  lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/usercenter.css" />
	<link type="text/css" rel="stylesheet" href="css/common.css" />
	<title>个人中心</title>
	<script src="js/angular.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/usercenter.js"></script>
</head>
<body data-ng-controller="userCenter">
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
		<?php
			$menujump = $_GET['menujump'];
			echo "<div class=leftMenu>";
			echo "<input type=hidden class=jump value=$menujump />";
		?>
			<div class="menuTitle">
				<div class="bookImage"></div>
				<span>用户中心</span>
			</div>
			<div class="menuNum" id="menuNo1">
				<span>主页</span>
			</div>
			<div class="menuNum" id="menuNo2">
				<span>收藏夹</span>
			</div>
			<div class="menuNum" id="menuNo3">
				<span>作业&老师</span>
			</div>
			<div class="menuNum" id="menuNo4">
				<span>答题记录</span>
			</div>
			<div class="menuNum" id="menuNo5">
				<span>账号</span>
			</div>
		</div>
		<div class="rightContent">
			<div class="usercenterIndex">
				<div class="theTitle">
					<span>我的信息</span>
				</div>
				<div class="userInform">
					<?php
						require('php/conn.php');
						$studentnum = $_SESSION['account'];
						$collection = mysql_query("SELECT class.*,collection.* FROM class,collection WHERE class.classid = collection.classid AND studentnum = '$studentnum'",$conn);
						$totalnum = mysql_num_rows($collection);
						$nameandclass = mysql_query("SELECT studentname,studentclass FROM student WHERE studentnum = '$studentnum'",$conn);
						$info = mysql_fetch_array($nameandclass,MYSQL_ASSOC);
						echo "<span>账号：$studentnum</span>";
						echo "<span>姓名：".$info['studentname']."</span>";
						echo "<span>班级：".$info['studentclass']."</span>";
						echo "<span>收藏：$totalnum</span>";
					?>
					<span>作业：0</span>
				</div>
			</div>
			<div class="collection">
				<div class="theTitle">
					<span>我的收藏</span>
				</div>
					<?php
						require('php/conn.php');
						$studentnum = $_SESSION['account'];
						$collection = mysql_query("SELECT class.*,collection.* FROM class,collection WHERE class.classid = collection.classid AND studentnum = '$studentnum' order by collecttime desc",$conn);
						$totalnum = mysql_num_rows($collection);
						if ($totalnum == 0) {
							echo "<span class=noCollection>你还没有收藏任何课程，快去收藏点吧~*^ _ ^*</span>";
						}else {
							for ($j = 0; $j < $totalnum; $j++) {
								$info = mysql_fetch_array($collection,MYSQL_ASSOC);
								echo "<div class=classCollection>";
								echo "<a href=class.php?classid=".$info['classid']."><img src=".$info['classimagepath']." />";
								echo "<span class=classInform>【".$info['classcategory']."】</span>";
								echo "<span class=classInform>".$info['classname']."</span></a>";
								echo "<span class=collectTime>收藏时间：";
								echo substr($info['collecttime'],0,4);
								echo "-";
								echo substr($info['collecttime'],4,2);
								echo "-";
								echo substr($info['collecttime'],6,2);
								echo " ";
								echo substr($info['collecttime'],8,2);
								echo ":";
								echo substr($info['collecttime'],10,2);
								echo ":";
								echo substr($info['collecttime'],12,2);
								echo "</span>";
								echo "<form method=post action=php/deletecollection.php>";
								echo "<input type=hidden name=classid value=".$info['classid']." />";
								echo "<input type=hidden name=studentnum value=$studentnum />";
								echo "<input type=image class=deletecollection src=image/common/close.png />";
								echo "</form>";
								echo "</div>";
							}
						}
					?>
			</div>
			<div class="homeworkAndTeacher">
				<div class="theTitle">
					<span>作业&老师</span>
				</div>
				<div class="addHomeworkBg">
					<div class="addMes">
						<form action="php/studentuploadhomework.php" method="post" enctype="multipart/form-data">
							<div class="theTitle title2">
								<span>选择作业文件</span>
								<button class="close">X</button>
							</div>
							<input type="file" name="userfile" class="fileUpload" required />
							<input type="text" hidden="hidden" name="time" class="homeworkTime"/>
							<input type="text" hidden="hidden" name="teachernum" class="homeworkTeachernum"/>
							<input type="submit" class="comfirm" value="确认并提交" />
						</form>
					</div>
				</div>
				<div class="homeworkDetailBg">
					<div class="homeworkDetail">
						<div class="theTitle title2">
							<span>作业详情:</span>
							<button class="close">X</button>
						</div>
						<div class="details">
							<span>作业老师：</span><span>{{teacherName}}</span>
						</div>
						<div class="details">
							<span>作业时间：</span><span>{{homeworkTime}}</span>
						</div>
						<div class="details">
							<span>作业状态：</span><span>{{state}}</span>
						</div>
						<div class="details">
							<span>提交时间：</span><span>{{submitTime}}</span>
						</div>
						<div class="details">
							<span>作业分数：</span><span>{{score}}</span>
						</div>
						<div class="details">
							<span>备注：</span><span>{{notes}}</span>
						</div>
					</div>
				</div>
				<?php
					require('php/conn.php');
					$studentnum = $_SESSION['account'];
					$result = mysql_query("SELECT student.studentclass,teachernum,teachername,coursename FROM student,teacher,testulink WHERE teacher.teachernum = testulink.teacherid AND testulink.stuclassname = student.studentclass AND student.studentnum = '$studentnum'");
					$resultnum = mysql_num_rows($result);
					if ($resultnum) {
						for ($i=1; $i <= $resultnum; $i++) { 
							$info = mysql_fetch_array($result,MYSQL_ASSOC);
							$class = $info['studentclass'];
							$teachernum = $info['teachernum'];
							$total = mysql_query("SELECT * FROM thomework WHERE teachernum = '$teachernum' AND class LIKE '%$class%' ORDER BY addtime desc");
							$totalnum = mysql_num_rows($total);
							$finished = mysql_query("SELECT * FROM submithomework WHERE teachernum = '$teachernum' AND studentnum = '$studentnum'");
							$finishednum =mysql_num_rows($finished);
							$unfinishednum = (int)$totalnum - (int)$finishednum;
							echo "<div class=myTeacherAndHomework>";
							echo "<span class=class1 data-ng-click='clicknum($i)'>课程老师：".$info['teachername']."</span>";
							echo "<span class=class1 data-ng-click='clicknum($i)'>课程名称：".$info['coursename']."</span>";
							echo "<span class=class1 data-ng-click='clicknum($i)'>作业总数：<span class='fontclass'>$totalnum</span></span>";
							echo "<span data-ng-click='clicknum($i)'>未完成作业：<span class='fontclass'>$unfinishednum</span></span>";
							echo "<div class='totalHomework num$i'>";
							echo "<table class=homeworkList>";
							echo "<tr><th>作业时间</th><th>作业文件</th><th>作业状态</th><th>作业详情</th></tr>";
							if ($totalnum) {
								for ($j=0; $j < $totalnum; $j++) {
									$info = mysql_fetch_array($total,MYSQL_ASSOC);
									$addtime = $info['addtime'];
									$teachernum = $info['teachernum'];
									$state = mysql_query("SELECT * FROM submithomework WHERE teachernum = '$teachernum' AND studentnum = '$studentnum' AND homeworktime = '$addtime' limit 1");
									$statenum = mysql_num_rows($state);
									if ($statenum == "0") {
										$homeworkstate = "未提交";
										$stateclass= "redFont";
									}elseif ($statenum == "1") {
										$homeworkstate = "已提交";
										$stateclass= "greenFont";
									}
									echo "<tr>";
									echo "<td>";
									echo substr($addtime,0,4);
									echo "年";
									echo substr($addtime,4,2);
									echo "月";
									echo substr($addtime,6,2);
									echo "日";
									echo "</td>";
									echo "<td><a href=".$info['homeworkpath'].">点此下载</a></td>";
									echo "<td><span class=$stateclass data-ng-click='submitHomework($addtime,$statenum)'>$homeworkstate</span></td>";
									echo "<td><a href='javascript:;' data-ng-click='getDetail($addtime,$statenum)'>点击查看</a></td>";
									echo "</tr>";
								}
							}
							echo "</table>";
							echo "</div>";
							echo "</div>";
						}
					}else{
						echo "<span class=noCollection>没有绑定的老师以及课程，请联系任课老师</span>";

					}
				?>
			</div>
			<div class="testRecord">
				<div class="theTitle">
					<span>我的答题记录</span>
				</div>
				<?php
					require('php/conn.php');
					$useraccount = $_SESSION['account'];
					$result = mysql_query("SELECT DISTINCT time FROM testrecord WHERE studentnum = '$useraccount' order by time desc");
					$datanum = mysql_num_rows($result);
					if ($datanum) {
						for ($i=0; $i < $datanum; $i++) { 
							$info = mysql_fetch_array($result,MYSQL_ASSOC);
							$time = $info['time'];
							$count1 = mysql_query("SELECT * FROM testrecord WHERE time = '$time' AND testcategory = 's'");
							$count1num = mysql_num_rows($count1);
							$count2 = mysql_query("SELECT * FROM testrecord WHERE time = '$time' AND testcategory = 't'");
							$count2num = mysql_num_rows($count2);
							if ($count1num > 0) {
								$testnum = mysql_result($count1,0,"testnum");
								$category = mysql_query("SELECT testsubclass FROM selecttest WHERE testnum = $testnum limit 1");
								$testcategory = mysql_result($category,0,"testsubclass");
							}else if ($count2num > 0) {
								$testnum = mysql_result($count2,0,"testnum");
								$category = mysql_query("SELECT testsubclass FROM trueorfalse WHERE testnum = $testnum limit 1");
								$testcategory = mysql_result($category,0,"testsubclass");
							}
							$rightcount1 = mysql_query("SELECT * FROM testrecord,selecttest WHERE time = '$time' AND testrecord.testcategory = 's' AND testrecord.testnum = selecttest.testnum AND answer = correntanswer");
							$rightcount1num = mysql_num_rows($rightcount1);
							$rightcount2 = mysql_query("SELECT * FROM testrecord,trueorfalse WHERE time = '$time' AND testrecord.testnum = trueorfalse.testnum AND answer = correntanswer");
							$rightcount2num = mysql_num_rows($rightcount2);
							echo "<div class=recordBg>";
							echo "<span class=testTime>答题时间：";
							echo substr($time,0,4);
							echo "-";
							echo substr($time,4,2);
							echo "-";
							echo substr($time,6,2);
							echo " ";
							echo substr($time,8,2);
							echo ":";
							echo substr($time,10,2);
							echo ":";
							echo substr($time,12,2);
							echo "</span>";
							echo "<span class=testCaregory>答题科目：$testcategory</span>";
							echo "<a href=showmethedetails.php?testtime=".$time." ><span class=viewMore>查看详情</span></a>";
							echo "<span class=count>答题数量——选择题：$count1num 道，判断题：$count2num 道</span>";
							echo "<span class=count>正确数量——选择题：$rightcount1num 道，判断题：$rightcount2num 道</span>";
							echo "</div>";
						}
					}else{
						echo "<span class=noCollection>没有答题记录，<a href=test.php>点击此处答题</a></span>";
					}
					
				?>

			</div>
			<div class="accountSetting">
				<div class="theTitle">
					<span>我的账号信息</span>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>