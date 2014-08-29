<?php
require("../global_manage_2.php");
if($_POST){
	//獲取傳遞來的file_id及查詢條件
	$file_id = $_POST['file_id'];
	$a = "";
	$sql = "delete from tb_file";
	if(count($file_id)>1){	//當選擇多個文章時
	 while(list($name,$value)=each($file_id)){			//遍歷數組
	  $a.="$value".",";
	 }
		$a= substr($a,0,-1);
		//使用in關鍵字刪除所有被選擇文章
	 $sql .= " where file_id in(".$a.")";
	}
	//只刪除一篇文章
	else
	$sql .= " where file_id = ".$file_id[0];
	$DB->query($sql);
	?>
	<script language="javascript">alert("文章刪除成功！");</script>
	<?php
		//將原來的查詢條件返回
		$url = "./file_manage.php";
		redirect_once($url);
}
?>
<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
