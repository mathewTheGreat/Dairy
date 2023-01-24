<?php
   header("Access-Control-Allow-Origin: *");
   header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Expose-Headers: Location");
header("Access-Control-Max-Age: 86400");
header("Access-Control-Allow-Credentials: true");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self'");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/event.php';

    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    $event = new Events($pdo);

    $allEvents = $event->getAll();
    http_response_code(200);
    echo json_encode($allEvents);
?>