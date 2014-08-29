<?php
require("../global_manage_2.php");
$note_id = $_GET['note_id'];	//得到超鏈結中參數
//根據$note_id不同情況進行查詢
$sql = "select * from tb_note where note_id='".$note_id."' and  note_flag=1 ";
$DB->query($sql);
$note = $DB->get_rows_array($sql);
?>
<HTML>
<HEAD>
<TITLE>版主瀏覽悄悄話</TITLE>
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
.STYLE14 {color: #FF0000}
</style>
</HEAD>
<BODY>
<?php
	foreach($note as $v){
		$id = $v['note_id'];					//留言ID號
		$note_title = $v['note_title'];			//留言標題
		$note_content = $v['note_content'];		//留言內容
		$note_user = $v['note_user'];			//留言人
		$note_time = $v['note_time'];			//留言時間
		$note_user_pic=$v['note_user_pic'];		//留言人頭像
?>
<table width="778px" align="center"	cellpadding="0" cellspacing="0" bgcolor="" style="border:0;margin:10;align:center;">
  <tr height='32px' class='toptitle1' bgcolor='#ccddee'>
    <td width='11' bgcolor="#D9EBB9"></td>
    <td height="27" colspan="2" bgcolor="#D9EBB9"><!--回復相對留言的縮進距離-->
      <strong><font color="#559380"><?php echo $note_user; ?></font></strong>&nbsp;&nbsp;<span class="style1 STYLE14">給版主的悄悄話</span> </td>
    <td width="23" bgcolor="#D9EBB9">&nbsp;</td>
  </tr>
  <tr height='26px'>
    <!-- 標題行 -->
    <td bgcolor="#F9F8EF"></td>
    <td colspan="2" bgcolor="#F9F8EF"><span class="style1"><?php echo $note_title;?></span> </td>
    <td bgcolor="#F9F8EF"><span class="style2"> <a href="note_answer.php?note_id=<?php echo $id;?>"></a> </span> </td>
  </tr>
  <tr height='26px'>
    <!-- 內容行 -->
    <td bgcolor="#F9F8EF"></td>
    <td width="683" valign="top" bgcolor="#F9F8EF"><?php echo $note_content; ?> </td>
    <td width="59" bgcolor="#F9F8EF" style="padding-bottom:10px"><img src="../images/face/pic/<?php echo $note_user_pic;?>"><br>
    </td>
    <td bgcolor="#F9F8EF">&nbsp;</td>
  </tr>
  <tr class="bg_author">
    <!-- 留言人信息 -->
    <td></td>
    <td colspan="2" align="right">留言時間：&nbsp;<?php echo $note_time; ?></td>
    <td align="right">&nbsp;</td>
  </tr>
</table>
<?php }?>
</BODY>
</HTML>
