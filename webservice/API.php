<?php

class API{

	protected $server = "localhost";
	protected $user = "root";
	protected $password = "laurens23";
	protected $dbname = "db_mitigasi";

	function __construct(){
		header('Content-Type: json');
		$this->connection_driver = mysqli_connect(
			$this->server,
			$this->user,
			$this->password);
		if($this->connection_driver){
			mysqli_select_db(
			$this->connection_driver,
			$this->dbname);	
		}else{
			echo "Fatal Error";
			die();
		}
		
	}

	function android_service(){
		$query_info_bencana = "Select count(*) as jumlah, (select id_info from tbl_info_bencana order by id_info desc limit 1) as recent_id from tbl_info_bencana";
		$query_peringatan_dini = "Select count(*) as jumlah, (select id_dini from tbl_peringatan_dini order by id_dini desc limit 1) as recent_id  from tbl_peringatan_dini";
		$execute_info_bencana = mysqli_query($this->connection_driver,$query_info_bencana);
		$execute_peringatan_dini = mysqli_query($this->connection_driver,$query_peringatan_dini);
		$data = array(
			"info_bencana" => mysqli_fetch_array($execute_info_bencana),
			"peringatan_dini" => mysqli_fetch_array($execute_peringatan_dini));
		return $data;
	}

	function detail(){
	}
}

if(isset($_GET['query'])){
	$api = new API;
	$query = $_GET['query'];
	if($query == "android_service"){
		$code = "OK";
		$message = "Sukses";
		$data = $api->android_service();	
	}else
	if($query == null || $query == ""){
		$code = "ERROR";
		$message = "Error, parameter query tidak boleh diksongkan!";
		$data = "NULL";
	}else{
		$code = "ERROR";
		$message = "Fatal error, periksa struktur URL!";
		$data = "NULL";
	}
}else{
	$code = "ERROR";
	$message = "Fatal error, periksa struktur URL!";
	$data = "NULL";
}

$response = array(
	"code" => $code,
	"message" => $message,
	"data" => $data);
echo json_encode($response,JSON_PRETTY_PRINT);
?>