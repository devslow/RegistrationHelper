<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once "connect.php";
include_once "major.php";

$connection = new Database();
$db = $connection->connect();


$major = new Major($db);


//$data = json_decode(file_get_contents("php://input"));
//$data = $_POST["name"];
$major->name= $_POST["name"];


 //$title = "Science1";

//$major->name= "CompSci Test";

//$major->studentTable_name = $title +"_studentTable";

//echo $major->template_name;

if($major->create()){
	echo json_encode(
		array(
			'success' => true,
			'return' => array(
				'name' => $major->name
			)
		);
		
	);
} else {
	echo json_encode(
		array('success' => false)
	);
}


?>