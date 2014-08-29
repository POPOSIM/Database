<?php 
//檢查用戶名及密碼
function login_check($name,$pwd){
	
	$dbhost = '1.34.6.116';
    $dbuser = 'h129875230';
    $dbpassword = '29813844';
    $dbname = 'android';
	$temp=0;
    $link = mysql_connect($dbhost, $dbuser, $dbpassword);
	
	
	
	
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("use db_leaveword");
    $result = mysql_query("select * from tb_user WHERE name = '$name'",$link);
	$row = mysql_fetch_row($result);
	
	if($row[0]==1&&$row[1]==$name&&$row[2]==$pwd&&$name!="")
		return 1;
	else if($row[0]==0&&$row[1]==$name&&$row[2]==$pwd&&$name!="")
	    return 0;
	else
		return false;
	
	/*if('h129875230' == $name && '29813844' == $pwd)
		return true;
	else
		return false;*/
}
//提示指定資訊並跳轉到指定頁面
function warn($info,$url = ""){
	?>
	<script language="JavaScript">
	alert("<?=$info;?>");
	if("<?=$url;?>" != ""){
		window.location.href = "<?=$url;?>";
	}
	else history.back();
	</script>
    <?
	exit();
}

function redirect_once($url){
	echo "<meta http-equiv='refresh' content='0;url=$url'>";
}

function redirect($info,$url){ 
	echo $info;
	echo "<meta http-equiv='refresh' content='2;url=$url'>";
}
?>
