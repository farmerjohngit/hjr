<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/5/24
 * Time: 12:37
 */
require('../php/conn.php');
$arr = array();
$sql = mysql_query("select postid, time, postname, postcategory, studentname as name from post, student where post.host = student.studentnum order by time desc limit 10");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}
$sql = mysql_query("select postid, time, postname, postcategory, teachername as name  from post, teacher where post.host = teacher.teachernum order by time desc limit 10");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}
$str = json_encode($arr);
echo $str;
