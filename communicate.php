<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/5/24
 * Time: 0:14
 */
session_start();
echo "<input type=hidden class=usernum value=".@$_SESSION['account']." />";
?>
<!DOCTYPE html>
<html data-ng-app="myCommunication">
<head  lang="zh-CN">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="css/communicate.css" />
    <link type="text/css" rel="stylesheet" href="css/common.css" />
    <title>学习交流吧</title>
    <script src="js/angular.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/communicate.js"></script>
    <script src="js/common.js"></script>

</head>
<body data-ng-controller="communicateController">
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
        <div class="searchAndAdd">
            <div class="addButton">
                <button data-ng-click="addPostView()">我要发帖</button>
            </div>
            <div class="searchContent">
                <input type="text" data-ng-model="postKeyWords" placeholder="请输入搜索关键字" />
            </div>
            <div class="searchForButton">
                <button data-ng-click="searchPost(postKeyWords)">搜帖</button>
            </div>
            <div data-ng-include="'communicate/addPost.html'"></div>
        </div>
        <div data-ng-include="'communicate/newestPost.html'" data-ng-show="pageName == 'postIndex'"></div>
        <div data-ng-include="'communicate/postDetail.html'" data-ng-show="pageName == 'postDetail'"></div>
    </div>
</body>
</html>