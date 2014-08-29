<?php
	require("global_manage_1.php");
	 $note_id = $_GET['id'];	//得到超鏈結中參數
	 $sql = "select note.*,noan.* from tb_note as note left join tb_note_answer as noan on note.note_id = noan.noan_note_id";
	 if($note_id!="-1"){
	 $sql.=" where note.note_id = ".$note_id;
	 }
	//最後加上排序語句,按note_time降冪,按noan_time降冪
	$sql .= " order by note.note_time desc";
	$DB->query($sql);
	$note = $DB->get_rows_array($sql);
?>
<HTML>
<HEAD>
<TITLE>留言瀏覽</TITLE>
<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/css.css">
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
		$note_answer=$v['note_answer'];
		$note_flag=$v['note_flag'];

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
    <td height="27" colspan="2" bgcolor="#D9EBB9" style="padding-left:10px"><!--回復相對留言的縮進距離-->
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="93%" bgcolor="D9EBB9"><span class="style1"><?php if($note_flag==1){echo "(給版主的悄悄話...)";} else{ echo $note_title;}?></span></td>
          <td align="right"><img src="images/face/pic/<?php echo $note_user_pic;?>" width="24" height="24"></td>
        </tr>
    </table></td>
  </tr>
  <tr height='26px'>
    <!-- 標題行 -->
    <td colspan="2" bgcolor="#F9F8EF" style="padding-left:10px"><span class="style1"><?php if($note_flag!=1){ echo $note_user;?>：說<?php }?></span></td>
  </tr>
  <tr height='26px'>
    <!-- 內容行 -->
    <td colspan="2" bgcolor="#FFF6F8"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top" bgcolor="#F9F8EF" style="padding-left:25px; padding-right:10px;padding-top:6px;padding-bottom:2px;line-height:18px;width:710px">&nbsp;&nbsp;&nbsp;&nbsp;<?php if($note_flag==1){ echo "<img src='images/whisper.gif'>&nbsp;(給版主的悄悄話...)";}else{ echo $note_content; }?> <br>
            <?php if($note_flag==0 and $note_answer==1){?><br>
            <TABLE width="700" align="center" cellPadding=2 cellSpacing=1 bgcolor="#064727" class=embedbox>
              <TBODY>
                <TR>
                  <TD width="700" bgcolor="#FFFFFF" style="padding-top:6px; padding-left:10px; padding-bottom:2px; padding-right:10px;line-height:18px"><SPAN 
                  style="FONT-WEIGHT: bold; COLOR: #000000">&nbsp;版主回覆：</SPAN> <SPAN style="COLOR: #000000">(<?php echo $noan_time;?>)</SPAN>&nbsp;
                    <hr color=#064727 size=1 style="width:700px; " >
                    <IMG 
                  src="images/face/pic/01.gif" width="90" height="90" class=face style="FLOAT: left; MARGIN: 2px 5px 5px 2px">&nbsp;&nbsp;<SPAN 
                  style="COLOR: #000000"><?php echo $noan_content;?></SPAN> </TD>
                </TR>
              </TBODY>
            </TABLE>
			<?php } ?>
          <br></td>
        </tr>
    </table></td>
  </tr>
  <tr class="bg_author">
    <!-- 留言人信息 -->
    <td align="right" style="padding-left:10px">留言時間：&nbsp;<?php echo $note_time; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
<?php 
}
?> 
</BODY>
</HTML>
