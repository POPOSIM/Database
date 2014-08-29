<link rel="stylesheet" href="../css/css.css" />
<script language="JavaScript">
<!--
function check(myform){
		if(myform.txt_title.value==""){
			alert("文章標題不能為空");myform.txt_title.focus();	return false;
		}
		if(myform.file.value==""){
			alert("文章內容不能為空");myform.file.focus();return false;
		}
}
//-->
</script>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><?php include("m_header.html");?></td>
  </tr>
  <tr>
    <td width="190" valign="top" bgcolor="#f0f0f0"><?php include("m_left.php");?></td>
    <td width="3" background="../images/dot_bg.gif">&nbsp;</td>
    <td width="757" align="center" valign="top" bgcolor="#FFFFFF"><table width="700"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="613" height="223" align="center"><br />
            <table width="700" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"><form action="check_file.php" method="post"  name="myform" id="myform">
                    <table width="680" border="1" cellpadding="3" cellspacing="1" bordercolor="#D9EBB9">
                      <tr>
                        <td valign="middle" align="right" width="14%">文章主旨：<br /></td>
                        <td width="86%"><input name="txt_title" type="text" id="txt_title" size="85" /></td>
                      </tr>
                      <tr>
                        <td valign="middle" align="right" width="14%">心&nbsp;&nbsp;&nbsp;&nbsp;情：<br /></td>
                        <td width="86%"><input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/1.gif' >" checked="checked" />
                            <img height="19" 
            src="../images/face/1.gif" width="19" align="middle" border="0" />
                            <input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/2.gif' >" />
                            <img 
            src="../images/face/2.gif" width="21" height="21" border="0" align="middle" />
                            <input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/3.gif' >" />
                            <img height="20" 
            src="../images/face/3.gif" width="20" align="middle" border="0" />
                            <input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/4.gif' >" />
                            <img height="20" 
            src="../images/face/4.gif" width="20" align="middle" border="0" />
                            <input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/5.gif' >" />
                            <img height="21" 
            src="../images/face/5.gif" width="21" align="middle" border="0" />
                            <input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/6.gif' >" />
                            <img height="19" 
            src="../images/face/6.gif" width="19" align="middle" border="0" />
                            <input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/7.gif' >" />
                            <img height="20" 
            src="../images/face/7.gif" width="20" align="middle" border="0" />
                            <input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/8.gif' >" />
                            <img height="20" 
            src="../images/face/8.gif" width="20" align="middle" border="0" />
                            <input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/9.gif' >" />
                            <img height="26" 
            src="../images/face/9.gif" width="38" align="middle" border="0" />
                            <input name="atc_iconid" type="radio" class="noborder" value="<img src='../images/face/10.gif' >" />
                            <img height="20" 
            src="../images/face/10.gif" width="25" align="middle" border="0" /> </td>
                      </tr>
                      <tr>
                        <td width="14%" align="right" valign="middle">文章內容：</td>
                        <td width="86%"><div class="file">
                            <textarea name="file"  rows="20" id="file" style="border:1px;width:580px"></textarea>
                        </div></td>
                      </tr>
                      <tr align="center">
                        <td height="40" colspan="2"><input name="btn_tj" type="submit" class="btn1" id="btn_tj" onclick="return check(myform);" value="發表文章" />
                          &nbsp;
                        <input name="btn_cx" type="reset" class="btn1" id="btn_cx" value="重寫文章" /></td>
                      </tr>
                    </table>
                </form></td>
              </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3"></td>
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
