<?php
/********************************************
*資料庫訪問類
*********************************************/
class DB_MySQL{
//==========================
var $Host = "1.34.6.116";			//伺服器地址
var $Database = "db_leaveword";		//資料庫名稱
var $User = "h129875230";					//用戶名
var $Password = "29813844";				//用戶密碼
//==========================
var $Link_ID = 0;					//資料庫連接	
var $Query_ID = 0;					//查詢結果	
var $Row_Result = array();			//結果集組成的陣列	
var $Field_Result = array();		//結果集欄位名組成的陣列
var $Affected_Rows;					//影響的行數
var $Rows;							//結果集中記錄行數
var $Fields;						//結果集中欄位個數
var $Row_Position = 0;				//記錄指標位置索引

//*******************************************************
	/*** 構造函數 */
	function __construct(){
		$this->connect();
	}

	/*** 解析函數 */
	function __destruct(){
		mysql_close($this->Link_ID);
	}

	/*** 連接伺服器,選擇資料庫 */
	function connect($Database = "",$Host = "",$User = "",$Password = ""){
		if ("" == $Database){
		  $Database = $this->Database;
		}
		if ("" == $Host){
		  $Host     = $this->Host;
		}
		if ("" == $User){
		  $User     = $this->User;
		}
		if ("" == $Password){
		  $Password = $this->Password;
		}
		
		if ( 0 == $this->Link_ID ) 
		{
			$this->Link_ID=@mysql_pconnect($Host, $User, $Password);
			if (!$this->Link_ID) 
			{
			$this->halt("連接資料庫服務端失敗!");
			}
			if (!mysql_select_db($this->Database,$this->Link_ID))
			{
			$this->halt("不能打開指定的資料庫:".$this->Database);
			}
		} 
		return $this->Link_ID;
	}

	/*** 釋放記憶體 */
	function free(){
		if ( @mysql_free_result($this->Query_ID) )
		unset ($this->Row_Result);
		$this->Query_ID = 0;
	}

	/*** 執行查詢 */
	function query($Query_String){
		/* 釋放上次查詢佔用的記憶體 */
		if ($this->Query_ID){
			$this->free();
		}
		if(0 == $this->Link_ID){
			$this->connect();
		}
		//設置中文字元集
		@mysql_query("set names utf8",$this->Link_ID);
		$this->Query_ID = @mysql_query($Query_String,$this->Link_ID);
		if (!$this->Query_ID){
		$this->halt("SQL查詢語句出錯: ".$Query_String);
		}
		return $this->Query_ID;
	}
	
	/*** 返回結果集記錄組成的陣列 */
	function get_rows_array(){
		$this->get_rows();
		for($i=0;$i<$this->Rows;$i++){
			if(!mysql_data_seek($this->Query_ID,$i)){
				$this->halt("mysql_data_seek查詢語句出錯");		//調用自定義函數
			}
			$this->Row_Result[$i] = mysql_fetch_array($this->Query_ID);
		}
		return $this->Row_Result;
	}

	/*** 返回結果集欄位組成的陣列 */
	function get_fields_array(){
		$this->get_fields();
		for($i=0;$i<$this->Fields;$i++){
			$obj = mysql_fetch_field($this->Query_ID,$i);
			$this->Field_Result[$i] = $obj->name;
		}
		return $this->Field_Result;
	}

	/*** 返回結果集中記錄行數 */
	function get_rows(){
		$this->Rows = mysql_num_rows($this->Query_ID); 
		return $this->Rows;
	}

	/*** 返回結果集中欄位個數 */
	function get_fields(){
		$this->Fields = mysql_num_fields($this->Query_ID);
		return $this->Fields;
	}

	/*** 執行SQL語句並返回由查詢結果中第一行記錄組成的陣列 */
	function fetch_one_array($sql){
		$this->query($sql);
		return mysql_fetch_array($this->Query_ID);
	}

	/*** 列印錯誤資訊 */
	function halt($msg){
		$this->Error=mysql_error();
		printf("<BR><b>資料庫發生錯誤:</b> %s<br>\n", $msg);
		printf("<b>MySQL 返回錯誤資訊:</b> %s <br>\n",	$this->Error);
	}
}
?>
<meta http-equiv="Content-Type" content="text/html;	charset=utf-8">
