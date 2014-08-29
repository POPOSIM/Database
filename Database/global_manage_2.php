<?
require dirname(__FILE__)."/common/db_mysql.class.php";
require dirname(__FILE__)."/common/function.php";
$DB = new DB_MySQL; 
//檢測請求中session
@session_start();
if($_SESSION['user_name']!="h129875230"){
	warn('您並非版主!',"http://1.34.6.116/Database/index.php");
	
}
?>
