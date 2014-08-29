<link href="css/css.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function check_form(form1){
		if(form1.user_name.value==""){
			alert("名稱不能為空！");form1.user_name.focus();return false;
		}
		if(form1.title.value==""){
			alert("標題不能為空!");form1.title.focus();return false;
		}
		if(form1.content.value=="")	{
			alert("內容不能為空!");form1.content.focus();return false;
		}		
}
//-->
</script>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("header.html");?></td>
  </tr>
  <tr>
    <td valign="top"><table width="950" align="center"cellpadding="0" cellspacing="0" style="border:0;align:center;">
        <!-- 顯示文章內容 -->
        <tr>
          <td width="949" align="right"  bgcolor="#FFFFFF"><table width="950" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
              <tr>
                <td><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
              <tr>
                <td height="44" background="images/a_11.jpg">&nbsp;</td>
              </tr></table>
                  <table width="761" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FEFEFE" bgcolor="#FFFFFF">
                    <form action="note_check.php"  method="post" name="form1" id="form1">
                      <tr>
                        <td width="761" height="40" bgcolor="#FFFFFF" style="BACKGROUND-IMAGE: url(image/bar_pink.gif); COLOR: #000000; BACKGROUND-COLOR: #FFFFFF"><marquee scrollamount="2" scrolldelay="100">
                          留下您珍貴的留言是對本站最大的幫助!感謝您的留言！
                          </marquee>
                          <hr color="#8AA925" size="2" style="width:750px; "></td>
                      </tr>
                      <tr>
                        <td align="center" bgcolor="#F9F8EF"><table width="749" border="0" align="center" cellpadding="0"  cellspacing="0"  style="BORDER-COLLAPSE: collapse">
                            <tr>
                              <td width="749" height="57" background="images/a_03.jpg">&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="36" colspan="3" align="left" background="images/a_05.jpg" bgcolor="#F9F8EF" scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓&nbsp;&nbsp;名：
                                <input  name="user_name" id="user_name" value=" 匿名" maxlength="64" type="text" />
                                  <span 
            style="COLOR: #ff0000">*</span></td>
                            </tr>
                            <tr>
                              <td height="36" colspan="3" align="left" background="images/a_05.jpg" bgcolor="#F9F8EF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;標&nbsp;&nbsp;題：
                                <input maxlength="64" size="30" name="title"  type="text"/>
                                  <span style="COLOR: #ff0000">*</span></td>
                            </tr>
                            <tr>
                              <td height="126" colspan="3" align="left" background="images/a_05.jpg" bgcolor="#F9F8EF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;內&nbsp;&nbsp;容：
                                <textarea name="content" cols="60" rows="8" id="content" ></textarea>
                                  <span style="COLOR: #ff0000">*</span></td>
                            </tr>
                            <tr>
                              <td height="40" colspan="3" align="left" background="images/a_05.jpg" bgcolor="#F9F8EF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您現在的心情：
                                <input name="mood" type="radio" value="&lt;img src='images/face/1.gif'&gt;" checked="checked" />
                                  <img src="images/face/1.gif" width="20" height="20" />&nbsp;
                                  <input name="mood" type="radio" value="&lt;img src='images/face/2.gif'&gt;" />
                                  <img src="images/face/2.gif" width="20" height="20" />&nbsp;
                                  <input name="mood" type="radio" value="&lt;img src='images/face/3.gif'&gt;" />
                                  <img src="images/face/3.gif" width="20" height="20" />&nbsp;
                                  <input name="mood" type="radio" value="&lt;img src='images/face/4.gif'&gt;" />
                                  <img src="images/face/4.gif" width="20" height="20" />&nbsp;
                                  <input name="mood" type="radio" value="&lt;img src='images/face/5.gif'&gt;" />
                                  <img src="images/face/5.gif" width="20" height="20" />&nbsp;
                                  <input name="mood" type="radio" value="&lt;img src='images/face/6.gif'&gt;" />
                                  <img src="images/face/6.gif" width="20" height="20" />&nbsp;
                                  <input name="mood" type="radio" value="&lt;img src='images/face/7.gif'&gt;" />
                                  <img src="images/face/7.gif" width="20" height="20" />&nbsp;
                                  <input name="mood" type="radio" value="&lt;img src='images/face/8.gif'&gt;" />
                                  <img src="images/face/8.gif" width="20" height="20" />&nbsp;
                                  <input name="mood" type="radio" value="&lt;img src='images/face/9.gif'&gt;" />
                                  <img src="images/face/9.gif" width="38" height="26" />&nbsp;
                                  <input name="mood" type="radio" value="&lt;img src='images/face/10.gif'&gt;"/>
                                  <img src="images/face/10.gif" width="25" height="20" />&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="40" colspan="3" align="left" background="images/a_05.jpg" bgcolor="#F9F8EF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <img src="images/whisper.gif" width="16" height="16" /> &nbsp;
                                  <input type="checkbox" name="checkbox" value="1" />
                                給版主的悄悄話</td>
                            </tr>
                            <tr>
                              <td height="35" background="images/a_07.jpg">&nbsp;&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="center" bgcolor="#F9F8EF"><table width="754" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="58" background="images/a_08.jpg"></td>
                            </tr>
                            <tr>
                              <td height="76" align="center" background="images/a_09.jpg"><table width="534" height="100" border="0"   cellpadding="0" cellspacing="0">
                                  <tr style="VERTICAL-ALIGN: bottom">
                                    <td width="132" 
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid"><input  type="radio"  checked="checked" value="01" name="head" />
                                        <img  src="images/face/pic/01.gif" width="90" height="90" /></td>
                                    <td width="134" 
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid"><input  type="radio" value="02" name="head" />
                                        <img   src="images/face/pic/02.gif" width="90" height="90" /></td>
                                    <td width="134" 
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid"><input  type="radio" value="03" name="head" />
                                        <img  src="images/face/pic/03.gif" width="90" height="90" /></td>
                                    <td width="134"  style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid"><input type="radio" value="04" name="head" />
                                     	<img  src="images/face/pic/04.gif" width="90" height="90"></td>
                                        <td width="134"  
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input type="radio" value="05" name="head" />
                <img  src="images/face/pic/05.gif" width="90" height="90"  /></td>
                              </tr>
                            </table></td>
                          </tr>
                       
                            
                            <tr>
                            <td height="76" align="center" background="images/a_09.jpg"><table width="534" height="100" border="0"   cellpadding="0" cellspacing="0">
                              <tr style="VERTICAL-ALIGN: bottom">
                                <td width="132" 
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input  type="radio"  checked="checked" value="06" name="head" />
                   <img  src="images/face/pic/06.gif" width="90" height="90" /></td>
                                <td width="134" 
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input  type="radio" value="07" name="head" />
                 <img   src="images/face/pic/07.gif" width="90" height="90" /></td>
                                <td width="134" 
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input  type="radio" value="08" name="head" />
                  <img  src="images/face/pic/08.gif" width="90" height="90" /></td>
             					<td width="134"  
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input type="radio" value="09" name="head" />
                <img  src="images/face/pic/09.gif" width="90" height="90"  /></td>
                				<td width="134"  
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input type="radio" value="10" name="head" />
                <img  src="images/face/pic/10.gif" width="90" height="90"  /></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="20" background="images/a_10.jpg">&nbsp;</td>
                          </tr>
                        </table>
                            <table width="734" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="703" height="40" align="center"><input name="submit" type="submit" class="btn1" id="submit" value="簽寫留言" onclick="return check_form(form1);"/>
                                  &nbsp;&nbsp;
                                  <input name="reset" type="reset" class="btn1" value="清除留言" /></td>
                              </tr>
                          </table></td>
                      </tr>
                    </form>
                  </table></td>
              </tr>
            </table></td>
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