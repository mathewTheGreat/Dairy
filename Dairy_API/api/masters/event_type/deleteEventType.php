<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/eventType/eventType.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    $eventType = new EventType($pdo);
    $eventType->id = $id;
    $deleted = $eventType->delete();
    if ($deleted) {
        echo "Event Type was deleted successfully";
    } else {
        echo "An error occurred while deleting the event type";
    }
?>