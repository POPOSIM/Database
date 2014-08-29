<?php
require("../global_manage.php");		//連接資料源
if($_POST["btn_tj"]!=""){
$uname=$_SESSION['user_name'];
$title=$_POST[txt_title];
$face=$_POST[atc_iconid];
$content=$_POST[file];
$now=date("Y-m-d H:i:s");
$sql="insert into tb_file (file_title,file_face,file_content,file_date,uname) Values ('$title','$face','$content','$now','$uname')";
$DB->query($sql);
echo "<script>alert('恭喜發表佳作!!!');</script>";
$url = '../index.php';
redirect_once($url);			//頁面跳轉
}
?>
