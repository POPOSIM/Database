<?php
require("global_manage_1.php");
if($_POST){
	if (is_file("./filterwords.txt")){			//判斷給定檔案名是否為一個正常的檔
	    $filter_word = file("./filterwords.txt");		//把整個檔讀入一個陣列中
		$str=$_POST['content'];
		for($i=0;$i<count($filter_word);$i++){			//應用For迴圈語句對敏感詞進行判斷
		   if(@preg_match("/".trim($filter_word[$i])."/i",$str)){		//應用正則運算式，判斷傳遞的留言資訊中是否含有敏感詞
			  echo "<script> alert('留言資訊中包含敏感詞！');history.back(-1);</script>";
			  exit;
			}
		}
	}
    $uname=$_SESSION['user_name'];
	$content =$_POST['content'];
	$user_name = $_POST['user_name1'];
	$title = $_POST['title']; 
	$mood=$_POST['mood'];
	$head = $_POST['head'].".gif";
	$note_flag=$_POST['checkbox'];
	
	if($note_flag!=1){$note_flag=0;}
	$datetime=date("Y-m-d H:i:s");
	$sql = "insert into tb_note (note_user,note_title,note_content,note_mood,note_time,note_user_pic,note_flag,uname) values('".$user_name."','".$title."','".$content."','".$mood."','".$datetime."','".$head."','".$note_flag."','".$uname."')";
	//echo $sql;exit;
	$DB->query($sql);
	$url = "./index.php";
	redirect_once($url);
}	
?>
