<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/usermanager.php';

$database = new DairyDatabase();
$pdo = $database->getPDO();
$userManager = new UserManager($pdo);

$username = $_POST["username"];
$password = $_POST["password"];
$token = $userManager->login($username, $password);

if ($token) {
    echo json_encode($token);
} else {
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(array("message" => "Invalid username or password."));
}
?>