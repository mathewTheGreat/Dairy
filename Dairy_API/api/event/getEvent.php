<?php
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");

 include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
 include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/event.php';
 
 $database = new DairyDatabase();
 $pdo = $database->getPDO();

 $event = new Events($pdo);
 $data = $event->find($id);
 
 if($data) {
    http_response_code(200);
    echo json_encode($event);
 }else {
    http_response_code(400);
    echo "No event found matching the supplied id";
 }

?>