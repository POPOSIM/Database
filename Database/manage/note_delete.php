<?php
require("../global_manage_2.php");
if($_POST){
	//獲取傳遞來的news_id及查詢條件
	$note_id = $_POST['note_id'];
	$note_id_str = "";
	$sql = "delete from tb_note";				//刪除留言資訊表中的資料
	$sql1="delete from tb_note_answer";			//刪除留言回復資訊表中的資料
	if(count($note_id)>1){	//當選擇多個留言時
	 while(list($name,$value)=each($note_id)){			//遍歷數組
	  $a.="$value".",";
	 }
		$a= substr($a,0,-1);
		//使用in關鍵字刪除所有被選擇留言
	$sql .= " where note_id in(".$a.")";			//指定多個條件值	
	$sql1.= " where noan_note_id in(".$a.")";		//指定多個條件值	
	}
	//只刪除一條留言
	else{
	 $sql .= " where note_id = ".$note_id[0];			//指定單個條件
	 $sql1.="  where noan_note_id=".$note_id[0];		//指定單個條件
	}
	$DB->query($sql);
	$DB->query($sql1);
	?>
	<script language="javascript">alert("留言資訊刪除成功！");</script>
	<?php
		//將原來的查詢條件返回
		$url = "./index.php";
		redirect_once($url);
}
?>
<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
