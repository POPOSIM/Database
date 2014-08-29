<?php 
require("global.php");
$sql = "select tb_note.*,answ.* from tb_note left join";
$sql .= " (select noan_note_id,noan_content,noan_time from tb_note_answer) as answ ";
$sql .= " on answ.noan_note_id = tb_note.note_id ";
$sql .= " order by note_time desc ";
if($_GET){
	//得到要提取的頁碼
	$page_num = $_GET['page_num']? $_GET['page_num']: 1;
}
else{
	//首次進入時,頁碼為1
	$page_num = 1;
}
	//得到總記錄數
	$DB->query($sql);
	$row_count_sum = $DB->get_rows();
	//每頁記錄數,可以使用預設值或者直接指定值
	$row_per_page = 10;
	//總頁數
	$page_count = ceil($row_count_sum/$row_per_page);
	//判斷是否為第一頁或者最後一頁
	$is_first = (1 == $page_num) ? 1 : 0;
	$is_last = ($page_num == $page_count) ? 1 : 0;
	//查詢起始行位置
	$start_row = ($page_num-1) * $row_per_page;
	//為SQL語句添加limit子句
	$sql .= " limit $start_row,$row_per_page";
	//執行查詢
	$DB->query($sql);
	$res = $DB->get_rows_array();
	//結果集行數
	$rows_count=count($res);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
<link href="css/css.css" rel="stylesheet" type="text/css">
<title>　↙資科‧異言堂↗　</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	text-align:center

}
.STYLE13 {color: #FF3399}
.STYLE16 {color: #FF0000}
.STYLE20 {color: #0066FF}
.STYLE21 {color: #006600}
-->
</style>
</head>
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
		if(form1.checkcode.value==""){
			alert("驗證碼不能為空！");form1.checkcode.focus();return false;
		}
		if(form1.checkcode.value!=num){
			alert("您輸入的驗證碼不正確，重新輸入！");form1.checkcode.focus();return false;
		}
}
//-->
</script>
<body>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><?php include("header.html");?></td>
  </tr>
  <tr>
    <td width="190" height="631"  valign="top" bgcolor="#FFFFFF"><?php include("left.php");?></td>
    <td width="3" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="757" valign="top" bgcolor="#F9F8EF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" valign="top" scope="col"><table width="748" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="755" height="47" background="images/lyb.jpg" scope="col">&nbsp;</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td><br>
                  <table width="100%"  border="0" cellpadding="2" cellspacing="2" bgcolor="#D9EBB9">
                    <tr>
                      <th align="left" bgcolor="#FFFFFF" scope="col">&nbsp;<img src="images/notice.gif" width="20" height="20"> <span class="style12">溫馨小提醒：</span> </th>
                    </tr>
                    <tr>
                      <td height="40" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;歡迎光臨　↙資科‧異言堂↗　，希望您在這裏渡過開心快樂的每一刻！！</td>
                    </tr>
                  </table></td>
              </tr>
              <tr valign="top">
                <td align="center">
			<?php
			for($i=0;$i<$rows_count;$i++){
				$title=$res[$i]['note_title'];				//標題
				$author = $res[$i]['note_user'];			//作者
				$note_content=$res[$i]['note_content'];		//內容
				$mood=$res[$i]['note_mood'];				//心情
				$datetime = $res[$i]['note_time'];			//時間
				$note_pic=$res[$i]['note_user_pic'];		//頭像
				$id = $res[$i]['note_id'];					//當前行note_id
				$note_flag=$res[$i]['note_flag'];			//是否是版主悄悄話
				$note_answer=$res[$i]['note_answer'];		//顯示版主是否回復標識
															//版主回復的留言信息
				$noan_content=$res[$i]['noan_content'];
				$noan_time=$res[$i]['noan_time'];
			?>
                  <br>
                  <table width="100%"  border="0" cellpadding="2" cellspacing="1" bgcolor="#205401">
                    <tr bgcolor="#F9F8EF">
                      <td rowspan="2" align="center" valign="top" scope="col" width="23%"><br>
                        <?php echo "<font color=#205401>".$author."</font>";?><br>
                        <img src="images/face/pic/<?php echo $note_pic;?>" width="90" height="90"><br>
                        <br>
                        <img src="images/time.jpg" width="15" height="15">&nbsp;<?php echo $datetime;?><br>
                        <br></td>
                      <th width="61%" height="24" align="left" scope="col">&nbsp;&nbsp;
                        <?php if($note_flag==1){echo "(給版主的悄悄話...)";} else{ echo $title;}?></th>
                      <td width="16%" align="left" scope="col"><span class="STYLE13">留</span><span class="STYLE21">言</span><span class="STYLE16">心</span><span class="STYLE20">情</span>：&nbsp;<?php echo $mood;?></td>
                    </tr>
                    <tr bgcolor="#F9F8EF">
                      <td height="113" colspan="2" align="left" valign="top" bgcolor="#F9F8EF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="39" style="padding-left:10px; padding-right:10px; line-height:18px">&nbsp;&nbsp;&nbsp;&nbsp;
                              <?php if($note_flag==1){ echo "<img src='images/whisper.gif'>&nbsp;(給版主的悄悄話...)";}else{ echo $note_content; }?>
                              <br></td>
                          </tr>
                          <tr>
                            <td align="center"><TABLE 
      style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; WIDTH: 100%; BORDER-COLLAPSE: collapse; BORDER-RIGHT-WIDTH: 0px" 
      cellSpacing=0 cellPadding=2>
                              </TABLE>
                              <?php
						   if($note_flag==0 and $note_answer==1){ 
							?>
                                <TABLE width="500" cellPadding=2 cellSpacing=1 bgcolor="#205401" >
                                  <TBODY>
                                    <TR>
                                      <TD width="500" bgcolor="#FFFFFF" style="padding-top:10px; padding-left:10px; padding-bottom:10px; padding-right:10px;line-height:18px"><SPAN 
                  style="FONT-WEIGHT: bold; COLOR: #000000">&nbsp;版主回覆：</SPAN> <SPAN style="COLOR: #000000">(<?php echo $noan_time;?>)</SPAN>&nbsp;
                                        <hr color=#205401 size=1 style="width:500px; " >
                                      <IMG 
                  src="images/face/pic/01.gif" width="90" height="90" class=face style="FLOAT: left; MARGIN: 2px 5px 5px 2px">&nbsp;&nbsp;<SPAN 
                  style="COLOR: #000000"><?php echo $noan_content;?></SPAN> </TD>
                                    </TR>
                                  </TBODY>
                                </TABLE>
                                <br>
                            <?php } ?>                            </td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                  <?php
			}
			?>
              <tr>
                <td><table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#205401">
                    <tr height='26px' align="right">
                      <th align="center" bgcolor="#F9F8EF"><!--  分頁顯示控制鏈結 -->
                        &nbsp;&nbsp; [留言分頁]</th>
                    </tr>
                    <tr height='26px'>
                      <td align="center" bgcolor="#F9F8EF">『&nbsp;當前第&nbsp;<font color="#AA0066"><?php echo $page_num;?></font>&nbsp;頁/共&nbsp;<font color="#AA0066"><?php echo $page_count;?>&nbsp;</font>頁&nbsp;』&nbsp;&nbsp;每頁『&nbsp;<font  color="#AA0066"><?php echo $row_per_page;?></font>&nbsp;』筆&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
						if(!$is_first){
						?>
                        <a href="./index.php?page_num=1">第一頁</a> <a href="./index.php?page_num=<?php echo ($page_num-1) ?>">上一頁</a>
                        <?php
						}
						else{
						?>
                        第一頁&nbsp;&nbsp;上一頁
                        <?php
						}
						if(!$is_last){
						?>
                        <a href="./index.php?page_num=<?php echo ($page_num+1) ?>">下一頁</a> <a href="./index.php?page_num=<?php echo $page_count ?>">最後一頁</a>
                        <?php
						}
						else
						{
						?>
                        下一頁&nbsp;&nbsp;最後一頁
                        <?php
						}
						?>
                        &nbsp; <a href="./user_note_read.php?id=-1" target="_blank"> <span class="style2">全部留言</span> </a></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <br>
				<table width="761" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FEFEFE" bgcolor="#FFFFFF">
                    <form action="note_check.php"  method="post" name="form1">
                      <tr>
                        <td width="761" height="40" bgcolor="#F9F8EF" style="BACKGROUND-IMAGE: url(image/bar_pink.gif); COLOR: #000000; BACKGROUND-COLOR: #F9F8EF"><marquee scrollamount="2" scrolldelay="100">
                          留下您珍貴的一筆是對本站最大的幫助!感謝您留言！
                          </marquee><hr color=#8AA925 size=2 style="width:750px; " ></td>
                      </tr>
                      <tr>
                        <td align="center" bgcolor="#F9F8EF"><table width="749" border="0" align="center" cellpadding="0"  cellspacing="0"  style="BORDER-COLLAPSE: collapse">
                          <tr>
                            <td width="749" height="57" background="images/a_03.jpg">&nbsp;&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="36" colspan="3" align="left" background="images/a_05.jpg" bgcolor="#F9F8EF" scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓&nbsp;&nbsp;名：
                              <input  name="user_name1" id="user_name" value=" 匿名" maxlength="64" />
                                <span 
            style="COLOR: #ff0000">*</span></td>
                          </tr>
                          <tr>
                            <td height="36" colspan="3" align="left" background="images/a_05.jpg" bgcolor="#F9F8EF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;標&nbsp;&nbsp;題：
                              <input maxlength="64" size="30" name="title" />
                                <span style="COLOR: #ff0000">*</span></td>
                          </tr>
                          <tr>
                            <td height="126" colspan="3" align="left" background="images/a_05.jpg" bgcolor="#F9F8EF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;內&nbsp;&nbsp;容：
                              <textarea name="content" cols="60" rows="8" id="content" ></textarea>
                                <span 
            style="COLOR: #ff0000">*</span></td>
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
                                <input name="mood" type="radio" value="&lt;img src='images/face/10.gif'&gt;" />
                                <img src="images/face/10.gif" width="25" height="20" />&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" colspan="3" align="left" background="images/a_05.jpg" bgcolor="#F9F8EF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <img src="images/whisper.gif" width="16" height="16" /> &nbsp;
                                <input type="checkbox" name="checkbox" value="1">
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
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input  type="radio"  checked="checked" value="01" name="head" />
                   <img  src="images/face/pic/01.gif" width="90" height="90" /></td>
                                <td width="134" 
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input  type="radio" value="02" name="head" />
                 <img   src="images/face/pic/02.gif" width="90" height="90" /></td>
                                <td width="134" 
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input  type="radio" value="03" name="head" />
                  <img  src="images/face/pic/03.gif" width="90" height="90" /></td>
             					<td width="134"  
                style="BORDER-RIGHT: #D9D2B6 1px solid; BORDER-TOP: #D9D2B6 1px solid; BORDER-LEFT: #D9D2B6 1px solid; BORDER-BOTTOM: #D9D2B6 1px solid">
				<input type="radio" value="04" name="head" />
                <img  src="images/face/pic/04.gif" width="90" height="90"  /></td>
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
                              <td width="703" height="40" align="center"><input name="submit" type="submit" class="btn1" id="submit2" value="簽寫留言" onClick="return check_form(form1);"/>
                                &nbsp;&nbsp;
                                <input name="reset" type="reset" class="btn1" value="清除留言" /></td>
                            </tr>
                            
                          </table></td>
                      </tr>
                    </form>
                  </table>
		  </td>
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
</body>
