<?php
//require("./user.php");
require("../common/function.php");
//創建session
@session_start();
if($_POST){
	$user_name = trim($_POST['user_name']);
	$user_pwd = trim($_POST['user_pwd']);
	if(login_check($user_name,$user_pwd)==1){
		//向session中存儲值
		$_SESSION['user_name']=$user_name;
		
		$url = './index.php';
		redirect_once($url);
	}
	else if(login_check($user_name,$user_pwd)==0){
		//向session中存儲值
		$_SESSION['user_name']=$user_name;
		
		$url = './index.php';
		redirect_once($url);
	}
	else{
		warn("Sign Error,Please Sign Again","./login.php");
	}
}
else{
?>

<HTML>
<HEAD>

<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/css.css">
<TITLE>使用者登入</TITLE>
</HEAD>
<BODY>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="520" height='360' border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ccddee" background="../images/login.jpg"> 
  <tr class='toptitle1'> 
	<td width='47' height="157">&nbsp;</td>
	<!--  調節左側間隔 -->
	<td colspan=2>&nbsp;</td>
  </tr>
  <tr height='10px'><td colspan=3></td></tr>
  <form name='login' method='post' action='login.php'>
  <tr height='34px'>
	<td height="30"></td>
	<td width='52' height="30">使用者名稱：</td>
	<td width="421" height="30"><input type='text' id='user_name' name='user_name' size=25></td>
  </tr>
  <tr height='34px'>
	<td height="30"></td>
	<td height="30">密&nbsp;&nbsp;碼：</td>
	<td height="30"><input type='password' name='user_pwd' size=25></td>
  </tr>
  <tr height='34px'>
	<td height="30"></td>
	<td height="30"></td>
	<td height="30">
	<input name="submit" type='submit' class="btn1" id="submit" style="line-height:18px;height:20px" value=' 確定 '>
&nbsp;    <input name="Submit1" type="reset" class="btn1" id="Submit1" style="line-height:18px;height:20px" value=" 清除 ">&nbsp;&nbsp;&nbsp;<input type="button" value="申請帳號" name="B4" onClick="window.location='apply.php'"></td>
  </tr>
  </form>
  <tr></tr>
</table>
<script language='JavaScript'>
//焦點定位到使用者名稱輸入框
login.user_name.focus();
</script>
</BODY>
</HTML>
<?php
}
?>
