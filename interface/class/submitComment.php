<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/6/6
 * Time: 17:03
 */
date_default_timezone_set('prc');
require('../../php/conn.php');
$classid = $_GET['classid'];
$usernum = $_GET['usernum'];
$content = $_GET['content'];
$time = date("YmdHis",time());
mysql_query("insert into comment values ('$usernum', $classid, '$content', '$time')");
if (mysql_error() == "") {
    echo "success";
}else {
    echo "fail";
}