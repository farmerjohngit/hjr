<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/6/7
 * Time: 16:58
 */
require('../../php/conn.php');
$homeworktime =$_GET['homeworktime'];
$teachernum =$_GET['teachernum'];
$studentnum =$_GET['studentnum'];
$score =$_GET['score'];
mysql_query("update submithomework set score = '$score' where homeworktime = '$homeworktime' and teachernum = '$teachernum' and studentnum = '$studentnum'");
if (mysql_error() == "") {
    echo "success";
}else {
    echo "fail";
}