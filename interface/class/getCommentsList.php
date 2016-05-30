<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/6/6
 * Time: 16:25
 */
require('../../php/conn.php');
$classid =$_GET['classid'];
$arr = array();
$sql = mysql_query("select comment.content, comment.commenttime, student.studentname as name from comment, student where commentclassid = $classid and student.studentnum = comment.useraccount order by commenttime desc");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}
$sql = mysql_query("select comment.content, comment.commenttime, teacher.teachername as name from comment, teacher where commentclassid = $classid and teacher.teachernum = comment.useraccount order by commenttime desc");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}
 
$str = json_encode($arr);
 
echo $str
?>