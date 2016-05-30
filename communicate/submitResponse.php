<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/5/26
 * Time: 13:03
 */
date_default_timezone_set('prc');
require('../php/conn.php');
$atinfor = $_GET['atinfor'];
$content = $_GET['commentcontent'];
$usernum = $_GET['usernum'];
$postid = $_GET['postid'];
$time = date("YmdHis",time());
mysql_query("insert into postmessage(postid, content, time, usernum, atinfor) values ($postid,'$content','$time','$usernum','$atinfor')");
if (mysql_error() == "") {
    echo "success";
}else {
    echo "fail";
}