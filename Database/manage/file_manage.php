<?php
require("../global_manage_2.php");
//檢索資料資訊
$sql="select * from tb_file order by file_date desc";
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
<script language="JavaScript">
<!--
//反選表單中checkbox
function inverse(form){
	for (var i=0;i<form.elements.length-2;i++){
		var e = form.elements[i];
		e.checked == true ? e.checked = false : e.checked = true;
	}
}
//選擇表單中所有check_box
function check_all(form){
	for(var i=0;i<form.elements.length-2;i++){
		var e=form.elements[i];
		e.checked=true;
	}
}
//-->
</script>
<html>
<head>
<title>↙資科‧異言堂↗</title>
<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><?php include("m_header.html");?></td>
  </tr>
  <tr>
    <td width="190" valign="top" bgcolor="#EEEEEE"><?php include("m_left.php");?></td>
    <td width="757" valign="top" bgcolor="#FFFFFF"><table width="757" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
        <tr align="left">
          <td class="border"><table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" >
              <tr height="24">
                <td height="59" background="../images/gfile2.jpg">&nbsp;</td>
              </tr>
            </table>
            <table width="757" border="0" align="center" cellpadding="0" cellspacing="0" class="tb1">
              <form action="./file_del.php" method="post" name="note" id="note">
                <tr align="left">
                  <td class="border"></td>
                </tr>
                <tr class='style1'>
                  <td width='45' height="26" align="center" bgcolor="D9EBB9">選擇</td>
                  <td width='335' align="center" bgcolor="D9EBB9">文章標題</td>
                  <td width='198' align="center" bgcolor="D9EBB9">發佈心情</td>
                  <td width='179' align="center" bgcolor="D9EBB9">發佈時間</td>
                </tr>
                <?php
				$col1 = "#ffffff";			//設置記錄行背景顏色為白色
				$col2 = "#f0f0f0";			//設置記錄行背景顏色為灰色
				$col = $col2;
				for($i=0;$i<$rows_count;$i++){
				//記錄行背景色交替
				if($col == $col1)
					$col = $col2;
				else
					$col = $col1;
				$title=$res[$i]['file_title'];	//標題
				$file_face=$res[$i]['file_face'];		//發佈文章時的心情
				$time = $res[$i]['file_date'];	//時間
				$id = $res[$i]['file_id'];	//當前行file_id
				?>
                <tr valign="middle" bgcolor="<?php echo $col;?>" height="24">
                  <td align="center"><input type="checkbox" name="file_id[]"	value="<?php echo $id;?>" /></td>
                  <td><!-- 在標題上添加連接 -->
                    <a href="file_show.php?file_id=<?php echo $id?>" target="_blank"> <?php echo $title;?>
                    <!-- 標題 -->
                    </a></td>
                  <!-- 作者 -->
                  <td align="center"><?php echo $file_face;?></td>
                  <td><?php echo $time;?></td>
                </tr>
                <?php
				}
				if($rows_count==0){
				?>
				 <tr valign="middle"  height="30">
                   <td height="25" colspan="5" align="center" bgcolor="#F0F0F0">  暫無文章！</td>
                </tr>

				<?php
				}
				?>
				
                <tr align="right" bgcolor="#F0F0F0" valign="middle">
                  <td height="28" colspan="2" align="left" bgcolor="F8F7EB">&nbsp;&nbsp;<img src="../images/arrow_ltr.gif" width="38" height="22" />
                    <input type="checkbox" name="select_all" onClick="check_all(this.form)" />
                    <span class="style1">全選</span>&nbsp;&nbsp;
                    <input type="checkbox" name="select_reverse" onClick="inverse(this.form)" />
                    <span class="style1">反選</span>&nbsp;&nbsp;
                  <input name="submit" type="submit" value = " 刪除 " class="btn1" /></td>
                  <td colspan="3" align="right" bgcolor="F8F7EB">共[<strong><?php echo $rows_count;?></strong>]篇&nbsp;每頁顯示[<strong><?php echo $row_per_page;?></strong>]篇&nbsp;
                    <!--  分頁顯示控制鏈結 -->
                    <?php
					if(!$is_first){
					?>
                    <a href="./file_manage.php?page_num=1"> 第一頁</a> <a href="./file_manage.php?page_num=	<?php echo ($page_num-1) ?>">上一頁</a>
                    <?php
					}
					else{
					?>
					第一頁&nbsp;上一頁
					<?php
					}
					if(!$is_last){
					?>
                    <a href="./file_manage.php?page_num=<?php echo ($page_num+1) ?>">下一頁</a> <a href="./file_manage.php?page_num=<?php echo $page_count ?>">最後一頁</a>
                    <?php
					}
					else{
					?>
                    下一頁&nbsp;&nbsp;最後一頁
                    <?php
					}
					?>                    </td>
                </tr>
                <tr>
                  <td ></td>
                  <td colspan="4" height="5"></td>
                </tr>
              </form>
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
