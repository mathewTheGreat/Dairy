<?php
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");

 include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
 include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/income.php';
 
 $database = new DairyDatabase();
 $pdo = $database->getPDO();
 $income = new Income($pdo);
 $data = $income->find($id);
 
 if($data) {
    http_response_code(200);
    echo json_encode($income);
 }else {
    http_response_code(400);
    echo "No income found matching the supplied id";
 }

?>