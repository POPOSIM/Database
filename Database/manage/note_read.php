<?php
require("../global_manage_2.php");
if($_GET){
	$note_id = $_GET['note_id'];	//得到超鏈結中參數
}
else
	$note_id = -1;	//如果是非超鏈結方式進入,則$note_id為-1
//根據$note_id不同情況進行查詢
$sql = "select note.*,noan.* from tb_note as note left join tb_note_answer as noan on note.note_id = noan.noan_note_id ";
//如果是查詢指定留言,則加上where子句
if($note_id != -1){	//查詢指定留言
	$sql .= " where note.note_id = ".$note_id;
}
//最後加上排序語句,按note_time降冪,按noan_time降冪
$sql .= " order by note.note_time desc,noan.noan_time desc";
$DB->query($sql);
$note = $DB->get_rows_array($sql);
?>
<HTML>
<HEAD>
<TITLE> 留言瀏覽 </TITLE>
<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/css.css">
<style>
.bg_author
{
	background-color:#eeeeee;
	height:24px;
}
.generalwindow {	MARGIN-TOP: 20px; WIDTH: 100%; BORDER-COLLAPSE: collapse
}
.outerborder {	BORDER-RIGHT: #ff9cbf 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #ff9cbf 1px solid; PADDING-LEFT: 2px; BACKGROUND-IMAGE: none; PADDING-BOTTOM: 2px; MARGIN: 0px auto; BORDER-LEFT: #ff9cbf 1px solid; WIDTH: 778px; PADDING-TOP: 2px; BORDER-BOTTOM: #ff9cbf 1px solid
}
</style>
</HEAD>
<BODY>
<?php
	foreach($note as $v){
		$id = $v['note_id'];
		$note_title = $v['note_title'];
		$note_content = $v['note_content'];
		$note_user = $v['note_user'];
		$note_time = $v['note_time'];
		$note_user_pic = $v['note_user_pic'];

		//回復資訊表中的資料
		$noan_id = $v['noan_id'];
		$noan_note_id =$v['noan_note_id '];
		$noan_content = $v['noan_content'];
		$noan_user = $v['noan_user_name'];
		$noan_time = $v['noan_time'];
	?>
<table width="778px" align="center"
			cellpadding="0" cellspacing="0" bgcolor="" style="border:0;margin:10;align:center;">
	<tr height='32px' class='toptitle1' bgcolor='#ccddee'>
	<td width='11' bgcolor="#D9EBB9"></td>
	<td height="27" bgcolor="#D9EBB9">	<!--回復相對留言的縮進距離-->
	  <span class="style1"><?php echo $note_title;?></span></td>
	<td width="15" bgcolor="#D9EBB9">&nbsp;</td>
  </tr>

  <tr height='26px'><!-- 標題行 -->
	<td bgcolor="#F9F8EF"></td>
	<td bgcolor="#F9F8EF"><span class="style1">
	  <?php if($note_flag!=1){ echo $note_user;?>
	  ：說
	  <?php }?>
	</span></td>
	<td bgcolor="#F9F8EF">
	<span class="style2">
	<a href="note_answer.php?note_id=<?php echo $id;?>"></a></span></td>
  </tr>
  <tr height='26px'><!-- 內容行 -->
	<td bgcolor="#F9F8EF"></td>
	<td bgcolor="#F9F8EF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="93%" valign="top" style="padding-left:10px; padding-right:10px;line-height:18px">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $note_content; ?></td>
        <td width="7%" align="right" valign="middle" style="padding-bottom:10px"><img src="../images/face/pic/<?php echo $note_user_pic;?>"></td>
      </tr>
    </table></td>
    <td width="15" bgcolor="#F9F8EF">&nbsp;</td>
  </tr>
  <tr class="bg_author"><!-- 留言人信息 -->
	<td></td>
	<td align="right">留言時間：&nbsp;<?php echo $note_time; ?></td>
    <td width="15" align="right">&nbsp;</td>
  </tr>
	<!--  回復信息 -->
		<?php
			if($noan_id){	//表示有回復
		?>
		<tr height='26px'>
		<td height="26px" bgcolor="#F9F8EF"></td>
		<td rowspan="2" align="center" bgcolor="#F9F8EF"><br>
		  <TABLE width="700" align="center" cellPadding=2 cellSpacing=1 bgcolor="#D9D2B6" class=embedbox >
          <TBODY>
            <TR>
              <TD width="700" bgcolor="#FFFFFF" style="padding-top:6px; padding-left:10px; padding-bottom:2px; padding-right:10px;line-height:18px"><SPAN 
                  style="FONT-WEIGHT: bold; COLOR: #000000">&nbsp;版主回覆：</SPAN> <SPAN style="COLOR: #000000">(<?php echo $noan_time;?>)</SPAN>&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="answer_del.php?id=<?php echo $noan_id;?>&note_id=<?php echo $id;?>">刪除</a>
                  <hr color=#D9D2B6 size=1 style="width:700px; " >
              <IMG 
                  src="../images/face/pic/01.gif" width="90" height="90" class=face style="FLOAT: left; MARGIN: 2px 5px 5px 2px">&nbsp;&nbsp;<SPAN 
                  style="COLOR: #000000"><?php echo $noan_content;?></SPAN> </TD>
            </TR>
          </TBODY>
        </TABLE>
	      <br>
	      <br></td>	
		<td width="15" height="26px" bgcolor="#F9F8EF">&nbsp;</td>
		</tr>
		<tr>	<!-- 版主回復信息 -->
		<td bgcolor="#F9F8EF"></td>
		<td bgcolor="#F9F8EF">&nbsp;</td>
		</tr>
	<?php
		}
	}
	?>
</table>

<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="778px" style="border:0;align:center;" cellpadding="0" cellspacing="0" bgcolor="">
      <tr height='32px' class='toptitle1' bgcolor='#ccddee'>
        <td width='10' height="27" bgcolor="#D9EBB9"></td>
        <td width="100" height="27" bgcolor="#D9EBB9"><!--回復相對留言的縮進距離-->
              <span class="style1">版主回覆</span> </td>
        <td width="500" height="27" bgcolor="#D9EBB9">&nbsp;</td>
        <td width="60" height="27" bgcolor="#D9EBB9">&nbsp;</td>
      </tr>
      <tr height='26px'>
        <!-- 標題行 -->
        <td height="13" colspan="4" bgcolor="#F9F8EF"></td>
      </tr>
    </table>
        <table width="778px" style="border:0;margin:0;"cellpadding="0" cellspacing="0" bgcolor="#FFF6F8">
          <form name="note" action="" method="post"
				onsubmit="return(check_form())">
            <tr>
              <td width="111" height="24" align="center" bgcolor="F9F8EF">回覆內容：<br></td>
              <td width="661" height="24" bgcolor="F9F8EF"><textarea name="content" rows="8" cols="80"></textarea>
              </td>
            </tr>
            <tr>
              <td height="35" colspan="2" align="center" bgcolor="F9F8EF"><input name="submit" type="submit" class="btn1" value=" 回覆 " size="8">
                &nbsp;&nbsp;
                <input name="button" type="reset" class="btn1" onClick="clear_form('note')" value=" 清除 "size="8">
              </td>
            </tr>
          </form>
      </table></td>
  </tr>
</table>
<?php
require("user.php");
if($_POST){
	$content = $_POST['content'];
	$datetime=date("Y-m-d H:i:s");
	$sql = "insert tb_note_answer (noan_note_id,noan_content,noan_time,noan_user_name)";
	$sql .= " values(".$note_id.",'".$content."','".$datetime."','".$default_user_name."')";
	$DB->query($sql);
	$sql1= "update tb_note set note_answer=1 where note_id='".$note_id."'";
	$DB->query($sql1);
?>
<script language="javascript">alert("留言資訊回覆成功！");</script>
<?php
	//跳轉
	$url = "note_read.php?note_id=".$note_id;
	redirect_once($url);
}
?>
</BODY>
</HTML>
