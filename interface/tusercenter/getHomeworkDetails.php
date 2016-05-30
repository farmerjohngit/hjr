<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/6/7
 * Time: 16:08
 */
require('../../php/conn.php');
$teachernum =$_GET['teachernum'];
$addtime =$_GET['addtime'];
$arr = array();
$sql = mysql_query("select * from submithomework where teachernum = '$teachernum' and homeworktime = '$addtime ' order by score");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}
$str = json_encode($arr);
echo $str;




