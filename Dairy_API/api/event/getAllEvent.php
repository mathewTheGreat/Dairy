<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/event.php';

    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    $event = new Events($pdo);

    $allEvents = $event->getAll();
    http_response_code(200);
    echo json_encode($allEvents);
?>