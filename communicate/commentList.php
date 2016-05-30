<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/5/26
 * Time: 12:31
 */
require('../php/conn.php');
$postid = $_GET['postid'];
$arr = array();
$sql = mysql_query("select content, time, studentname, usernum from postmessage, student where postmessage.usernum = student.studentnum and atinfor = '' and postid = $postid order by time");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}
$str = json_encode($arr);
echo $str;