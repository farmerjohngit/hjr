<?php
/**
 * Created by IntelliJ IDEA.
 * User: AshBringer
 * Date: 2015/6/7
 * Time: 14:43
 */
require('../../php/conn.php');
$category = $_GET['testCategory'];
$single = $_GET['single'];
$multiple = $_GET['multiple'];
$tf = $_GET['tf'];
$arr = array();
if ($single) {
    $sql1 = mysql_query("SELECT * FROM selecttest WHERE testcategory = 'single' AND testsubclass LIKE '%$category%' order by rand() limit $single");
    while($row = mysql_fetch_array($sql1,MYSQL_ASSOC)) {
        $arr[] = $row;
    }
}
/*if ($multiple) {
    $sql2 = mysql_query("SELECT * FROM selecttest WHERE testcategory = 'multiple' AND testsubclass LIKE '%$category%' order by rand() limit $multiple");
    while($row = mysql_fetch_array($sql2,MYSQL_ASSOC)) {
        $arr[] = $row;
    }
}
if ($tf) {
    $sql3 = mysql_query("SELECT * FROM trueorfalse WHERE testsubclass LIKE '%$category%' order by rand() limit $multiple");
    while($row = mysql_fetch_array($sql3,MYSQL_ASSOC)) {
        $arr[] = $row;
    }
}*/
$str = json_encode($arr);
echo $str;


