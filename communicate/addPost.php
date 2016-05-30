<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/5/26
 * Time: 20:21
 */
date_default_timezone_set('prc');
require('../php/conn.php');
$host = $_GET['host'];
$postcategory = $_GET['postcategory'];
$posttitle = $_GET['posttitle'];
$time = date("YmdHis",time());
mysql_query("insert into post(time, host, postname, postcategory) values ('$time','$host','$posttitle','$postcategory')");
if (mysql_error() == "") {
    $arr = array();
    $sql = mysql_query("select postid, postname from post where host = '$host' and postcategory = '$postcategory' and postname = '$posttitle' limit 1");
    while($row = mysql_fetch_array($sql,MYSQL_ASSOC)) {
        $arr[] = $row;
    }
    $str = json_encode($arr);
    echo $str;
}else {
    echo "fail";
}


