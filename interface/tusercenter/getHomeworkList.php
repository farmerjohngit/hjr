<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/6/7
 * Time: 15:32
 */
require('../../php/conn.php');
$teachernum =$_GET['teachernum'];
$arr = array();
$sql = mysql_query("select addtime, class from thomework where teachernum = '$teachernum' order by addtime desc");
while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
    $arr[] = $row;
}
$str = json_encode($arr);
echo $str;


