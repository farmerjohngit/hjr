表名： 课程（class）：
（课程ID，课程名称，课程类别，讲课老师，课程描述，课程资源路径，课程展示图片路径，课程更新时间，课程点击数量）
（classid，classname，classcategory，classteachby，classdescription，classsourcepath，classimagepath，classupdatetime，classclicknum）；






create table class
(classid int primary key auto_increment,
classname varchar(40),
classcategory varchar(8),
subclasscategory varchar(20),
classteachby varchar(20),
classdescription varchar(400),
classsourcepath varchar(100),
classimagepath varchar(100),
classupdatetime char(14),
classclicknum int
) charset = utf8;



insert


into class


values('计算机组成原理第七章','工学','计算机组成原理第七章————计算机系列教材，清华大学出版社','ppt/gx/jsjzcyl/num7.pptx','image/class/zcyl1.png','20150319192524','1000');



表名：学生（student）：
（学生ID，学号，密码，姓名，班级）
（studentid，studentnum，stupassword，studentname，studentclass）



create table student
(studentid int primary key auto_increment,
studentnum char(10),
stupassword varchar(16),
studentname varchar(20),
studentclass varchar(10)
) charset = utf8;



INSERT INTO student (`studentnum`, `stupassword`, `studentname`, `studentclass`)


VALUES ('U201110001','123456','张三','CS1107')



表名：评论（comment）：
（评论人账号，评论课程id，评论内容，评论日期）
（useraccount，commentclassid，content，commenttime）
create table comment
(useraccount char(10),
commentclassid int,
content varchar(400),
commenttime char(14),
primary key(useraccount,commenttime))charset = utf8;



$result = mysql_query("SELECT studentname FROM student WHERE studentnum = '$theuseraccount'");
$studentname = mysql_result($result,0,"studentname");



表名：收藏（collection）：
（课程id，收藏者学号，收藏日期）
（classid，studentnum，collecttime）
create table collection
(classid int,
studentnum char(10),
collecttime char(14),
primary key (studentnum,collecttime))charset = utf8;



测试系统题库：
表名：选择题（selecttest）：
（题号，题型，题目所在科目，题干，答案备选A，答案备选B，答案备选C，答案备选D，正确答案）
（testnum，testcategory，testsubclass，testcontent，selecta，selectb，selectc，selectd，correctanswer）



create table selecttest
(testnum int primary key auto_increment,
testcategory varchar(8),
testsubclass varchar(20),
testcontent varchar(400),
selecta varchar(100),
selectb varchar(100),
selectc varchar(100),


selectd varchar(100),


correntanswer varchar(4))charset = utf8;



表名：判断题（trueorfalse）：
（题号，题目所在科目，题干，正确答案）
（testnum，testsubclass，testcontent，correntanswer）



create table trueorfalse
(testnum int primary key auto_increment,
testsubclass varchar(20),
testcontent varchar(400),


correntanswer char(1))charset = utf8;



表名：答题记录（testrecord）：
（提交时间，题型，题号，答题人学号，答题人答案）
（time，testcategory，testnum，studentnum，answer）



create table testrecord
(time char(14),
testcategory char(1),
testnum int,
studentnum char(10),
answer varchar(4),
primary key (time,testcategory,testnum,studentnum))charset = utf8;



表名：老师（teacher）：
（教师ID，教工号，密码，姓名）
（teacherid，teachernum，tepassword，teachername）



create table teacher
(teachertid int primary key auto_increment,
teachernum char(10),
tepassword varchar(16),
teachername varchar(20)
) charset = utf8;



INSERT INTO `teacher`(`teachernum`, `tepassword`, `teachername`) VALUES ('T201110001','1234567890','王杰')





表名：师生绑定表（testulink）：
（教工号，班级名称，课程名称，添加日期）
（teacherid，stuclassname，coursename，addtime）



create table testulink
(teacherid char(10),
stuclassname varchar(10),
coursename varchar(40),
addtime char(14),
primary key (teacherid,addtime))charset = utf8;



表名：老师作业表（thomework）：
（时间，教师号，班级，作业路径）
（addtime，teachernum，class，homeworkpath）
create table thomework
(addtime char(14),
teachernum char(10),
class varchar(50),
homeworkpath varchar(100),
primary key(addtime,teachernum))charset=utf8;



表名：提交作业表（submithomework）
（作业时间，教师编号，学生学号，提交时间，提交内容，作业分数，作业评语）
（homeworktime，teachernum，studentnum，submittime，homeworkfile，score，notes）
create table submithomework
(homeworktime char(14),
teachernum char(10),
studentnum char(10),
submittime char(14),
homeworkfile varchar(100),
score varchar(3),
notes varchar(400),
primary key(homeworktime,teachernum,studentnum))charset=utf8;



表名：交流帖信息表（post）
（帖ID，帖名称，帖分类）
（postid，postname，postcategory）
create table post
(postid int auto_increment primary key,
time char(14),
host char(10),
postname varchar(100),
postcategory varchar(40))charset=utf8;



表名：跟帖信息表（postmessage）
（帖ID，内容，时间，跟帖人，@信息）
（postid，content，time，usernum，atinfor）
create table postmessage
(postid int,
content varchar(400),
time char(14),
usernum char(10),
atinfor char(24),
primary key(postid,usernum,time))charset=utf8;