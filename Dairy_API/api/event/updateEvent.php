<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/event.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    $event = new Event($pdo);
    $event->cattle_id = $_POST["cattle_id"];
    $event->event_type = $_POST["event_type"];
    $event->event_specification = $_POST["event_specification"];
    $event->notes = $_POST["notes"];
    $event->date = $_POST["date"];
    $saved = $event->create();
    if ($saved) {
        echo "Event was saved successfully";
    } else {
        echo "An error occurred while saving the event";
    }
?>