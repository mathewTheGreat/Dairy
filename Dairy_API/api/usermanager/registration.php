<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/usermanager.php';

    // Connect to the database
    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    // Instantiate the UserManager class
    $tokenExpiration = 3600; // 1 hour
    $tokenSecret = 'PUT_YOUR_SECRET_KEY_HERE';
    $userManager = new UserManager($pdo);

    // Get the registration data from the request
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Register the user
    $result = $userManager->register($username, $password, $email);
    if ($result === true) {
        echo "User was registered successfully";
    } else {
        echo $result;
    }
?>
