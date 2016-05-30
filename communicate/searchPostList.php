<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/5/24
 * Time: 12:37
 */
require('../php/conn.php');
$keyWords = $_GET['keywords'];
$arr = array();
$sql = mysql_query("select postid, time, postname, studentname, postcategory from post, student where post.host = student.studentnum and (postname like '%$keyWords%' || postcategory like '%$keyWords%') order by time desc");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}

$sql = mysql_query("select postid, time, postname, teachername, postcategory from post, teacher where post.host = teacher.teachernum and (postname like '%$keyWords%' || postcategory like '%$keyWords%') order by time desc");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}
$str = json_encode($arr);
echo $str;
