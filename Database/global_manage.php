<?
require dirname(__FILE__)."/common/db_mysql.class.php";
require dirname(__FILE__)."/common/function.php";
$DB = new DB_MySQL; 
//檢測請求中session
@session_start();
if(!isset($_SESSION['user_name'])){
	warn('您尚未登入 請先登入!',"../manage/login.php");
}
?>
