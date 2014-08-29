<?php
require("../global_manage_2.php");
	//獲取傳遞來的file_id及查詢條件
	$id = $_GET['id'];
	$note_id=$_GET['note_id'];
	$sql = "delete from tb_note_answer where noan_id = ".$id;
	$DB->query($sql);
	?>
	<script language="javascript">alert("成功刪除版主回復的留言資訊！");</script>
	<?php
		//將原來的查詢條件返回
		$url = "./note_read.php?note_id=$note_id";
		redirect_once($url);
?>
<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
