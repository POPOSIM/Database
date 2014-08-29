<?php
require("../global.php");


if($_POST){
	$user_name = trim($_POST['user_name']);
	$user_pwd = trim($_POST['user_pwd']);
	$sql = "select * from tb_user WHERE name = '$user_name'";
	
	$DB->query($sql);
	$note  = $DB->fetch_one_array($sql);
	
	
	if($note['password']==$user_pwd&&$note['name']==$user_name){
		
		warn("輸入帳號或密碼重複","./apply.php");
		
	}
	else{
		$now=date("Y-m-d H:i:s");
		$sql="insert into tb_user (Uid,name,password,time) Values ('0','$user_name','$user_pwd','$now')";
$DB->query($sql);
		warn("創新帳號密碼成功","./login.php");
	}
}
else{
?>

<HTML>
<HEAD>

<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/css.css">
<TITLE>帳號密碼申請</TITLE>
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
  <form name='login' method='post' action='apply.php'>
  <tr height='34px'>
	<td height="30"></td>
	<td width='52' height="30">申請名稱：</td>
	<td width="421" height="30"><input type='text' id='user_name' name='user_name' size=25></td>
  </tr>
  <tr height='34px'>
	<td height="30"></td>
	<td height="30">申請密碼：</td>
	<td height="30"><input type='password' name='user_pwd' size=25></td>
  </tr>
  <tr height='34px'>
	<td height="30"></td>
	<td height="30"></td>
	<td height="30">
	<input name="submit" type='submit' class="btn1" id="submit" style="line-height:18px;height:20px" value=' 申請 '>
&nbsp;    <input name="Submit1" type="reset" class="btn1" id="Submit1" style="line-height:18px;height:20px" value=" 清除 "></td>
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
