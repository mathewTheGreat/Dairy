<?php
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");

 include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/config/database.php';
 include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/class/cattle.php';
 
 $database = new DairyDatabase();
 $pdo = $database->getPDO();
 $cattle = new Cattle($pdo);
 $data = $cattle->find($id);
 
 if($data) {
    http_response_code(200);
    echo json_encode($cattle);
 }else {
    http_response_code(400);
    echo "No cattle found matching the supplied id";
 }

 
?>