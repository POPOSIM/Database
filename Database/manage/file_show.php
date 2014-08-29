<?php
require("../global_manage.php");
if($_GET){
	//查詢留言內容
	$id = $_GET['file_id'];
	$sql = "select * from tb_file where file_id = ".$id;
	$note = $DB->fetch_one_array($sql);
}
?>

<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("m_header.html");?></td>
  </tr>
  <tr>
    <td valign="top"><table width="950" align="center"cellpadding="0" cellspacing="0" style="border:0;align:center;">
        <tr>
          <td width="36" background="../images/right_1.jpg" bgcolor="#F4F4F4"></td>
          <!-- 顯示文章標題 -->
          <th width="890" height="24" align="left" background="../images/right_2.jpg" bgcolor="#F4F4F4" >&nbsp;<?php echo $note['file_title'];?></th>
          <td width="17" background="../images/right_3.jpg" bgcolor="#F4F4F4"></td>
        </tr>
        <!-- 顯示文章內容 -->
        <tr>
          <td colspan="4" align="right"  bgcolor="#FFFFFF"><div style="width:940px;"><br />
              <textarea name="file" rows="40"  id="file" style="border:1px;width:920px"><?php echo $note['file_content']; ?> </textarea>
            </div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <table width="954" border="0" cellspacing="0" cellpadding="0" 	align="center">
  <tr>
    <td bgcolor="F1F1F1">&nbsp;</td>
  </tr>
</table>
<table width="954" height='68' border="0" 	align="center" cellpadding="0" cellspacing="0">
  <tr height="4px" align="center">
	<td width="100%"></td>
  </tr>
  <tr height="18px" align="center">
	
  </tr>
  <tr height="18px" align="center">
	
  </tr>
</table>
  
</table>
