<link href="css/css.css" rel="stylesheet" type="text/css" />
	<table width="199" border="0" align="center"   valign="top"  cellpadding="0" cellspacing="0">
      <tr valign="top">
        <td><table width="199" height="89" border="0" align="center" valign="top" cellpadding="0" cellspacing="1">
          <tr>
            <td height="220" align="center" valign="top" bgcolor="#FFFFFF"><table width="199" height="24" border="0" align="center" valign="top" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="199" height="47" valign="top" background="images/file.jpg">&nbsp;&nbsp;</td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="199" height="12" background="images/topline1.jpg"></td>
                  </tr>
                  <tr>
                    <td align="center" valign="top" background="images/middleline.jpg">
					 <marquee id='notice' direction='up' width='100%' 	height='180px' scrollamount='2' scrolldelay='100' 	onmouseover='this.stop()' onmouseout='this.start()'>
					<table width="180" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" scope="col"><span class="tdbottom">
                          <?php
		$sql = "select * from tb_file order by file_date desc limit 15";
		$DB->query($sql);
		$res_notice = $DB->get_rows_array();
		foreach($res_notice as $v){
			$file_id = $v['file_id'];
			$file_title = $v['file_title'];
		?>
                          &nbsp; <a href="file_show.php?file_id=<?php echo $file_id?>" target="_blank"> <?php echo $file_title; ?> </a><br />
                          <?php
		}
		?>
                        </span></td>
                      </tr>
                    </table>
					  </marquee>
					</td>
                  </tr>
                  <tr>
                    <td height="14" background="images/bottomline.jpg">&nbsp;</td>
                  </tr>
                </table>
            </td>
          </tr>
        </table>
          <table width="199" height="80" border="0" align="center" cellpadding="0" cellspacing="1">
            <tr>
              <td height="80" align="center" valign="top" background="images/so_line.jpg" bgcolor="#FFFFFF"><table width="199" height="52" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td background="images/so.jpg">&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                </table>
				<br />
                  可按標題、內容、姓名、時間檢視
				  <form target="_blank" method="post" action="search.php">
                    <table width="180" height="40" border="0" align="center" cellpadding="0" cellspacing="1">
                      <tr>
                        <td align="center" valign="middle" bgcolor="#FFFFFF"><input name="key_words" type="text" class="btn1" value=" 搜尋關鍵字" size='19' />&nbsp;
                        <input name="submit" type="submit" class="btn1" value="檢視" />
						</td>
					</tr>
                    </table>
              </form></td>
            </tr>
          </table>
          <table width="199" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="199" background="images/so_bottom.jpg"></td>
            </tr>
          </table>
          <table width="199" height="183" border="0" align="center" cellpadding="0" cellspacing="1">
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><table width="199" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="37" background="images/leave_line.jpg">&nbsp;</td>
                  </tr>
                </table>
                  <table width="199" height="32" border="0" align="center" cellpadding="0" cellspacing="0">
                    <?php
				require ("function.php");
			   $sql=mysql_query("select note_title ,note_id ,note_time from tb_note order by note_id desc limit 0,30");
			   $info=mysql_fetch_array($sql); 
			   if($info==false){
			 ?>
                    <tr>
                      <td height="22"><div align="center">暫無留言！</div></td>
                    </tr>
                    <?php
			  }else{
			   do{
			  ?>
                    <tr>
                      <td height="32" background="images/leave_line2.jpg"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="user_note_read.php?id=<?php echo $info["note_id"];?>" class="a1" target="_blank">
             	
             	 <?php 
				 echo unhtml(msubstr($info["note_title"],0,14));
				 if(strlen(unhtml($info["note_title"]))>14){
			          echo ".";
			       }
				  echo "&nbsp;<font color=blue>[".str_replace("-","/",substr($info[note_time],2,8))."]</font>";
				?>
                      </a></td>
                    </tr>
              <?php
			   }while($info=mysql_fetch_array($sql));
			  }
			  ?>
                </table></td>
            </tr>
          </table>
       
          
	<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
