<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/event.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    $event = new Events($pdo);
    $deleted = $event->delete($id);
    if ($deleted) {
        echo "Event was deleted successfully";
    } else {
        echo "An error occurred while deleting the event";
    }
?>