<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/6/6
 * Time: 15:44
 */
require('../../php/conn.php');
$homeworkTime =$_GET['addtime'];
$studentNum =$_GET['studentnum'];
$arr = array();
$sql = mysql_query("select teacher.teachername, submithomework.submittime, submithomework.score, submithomework.notes from teacher, submithomework where submithomework.homeworktime = '$homeworkTime' and submithomework.studentnum = '$studentNum' and submithomework.teachernum = teacher.teachernum limit 1");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}
$str = json_encode($arr);
echo $str;