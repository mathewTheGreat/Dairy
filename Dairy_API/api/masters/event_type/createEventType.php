<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/event_type/event_type.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $eventType = new EventType($pdo);
    $eventType->event_name = $_POST["event_name"];
    $saved = $eventType->create();
    if ($saved) {
        echo json_encode($eventType);
    } else {
        echo "An error occurred while saving the event type";
    }
?>