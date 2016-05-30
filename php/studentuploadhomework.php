<?php
session_start();
?>
<?php
require('conn.php');
date_default_timezone_set('prc');
$file = $_FILES ['userfile'];
$submittime = $_POST ['time'];
@$extName=strtolower(end(explode('.',$file['name'])));
$filename=date("YmdHis").".".$extName;
$dest = '../homework/submit/'.$filename;
move_uploaded_file($file ['tmp_name'], $dest);
$studentnum = $_SESSION['account'];
$addtime = date("YmdHis");
mysql_query("INSERT INTO submithomework (homeworktime, teachernum, studentnum, submittime, homeworkfile) VALUES ('$submittime','T20120001','$studentnum','$addtime','$dest')");
if (mysql_error() == "") {
    echo "<script language='javascript' type='text/javascript'>";
    echo "history.back(-1);";
    echo "</script>";
}else {
    echo mysql_error();
}
?>