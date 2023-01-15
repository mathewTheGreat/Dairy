<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/eventType/eventType.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $eventType = new EventType($pdo);
    $eventType->id = $id;
    $eventType->event_name = $_POST["event_name"];
    $saved = $eventType->update();
    if ($saved) {
        http_response_code(200);
        echo json_encode($eventType);
    } else {
        http_response_code(400);
        echo "An error occurred while updating the event type";
    }
?>