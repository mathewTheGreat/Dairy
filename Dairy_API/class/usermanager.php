<?php

    require __DIR__ . '\vendor\autoload.php';
    use \Firebase\JWT\JWT;
    use \Firebase\JWT\Key;
    class UserManager {
        private $db;
    
        public function __construct($db) {
            $this->db = $db;
        }
    
        public function login($username, $password) {
            // Retrieve user from database
            $stmt = $this->db->prepare("SELECT * FROM users WHERE name = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();
    
            // Verify password
            if (!password_verify($password, $user['password'])) {
                return false;
            }
    
            // Get token expiration and secret
            $tokenExpiration = 3600; // 1 hour
            $tokenSecret = 'PUT_YOUR_SECRET_KEY_HERE';
            // Generate token
            $payload = [
                'user_id' => $user['id'],
                'exp' => time() + $tokenExpiration
            ];
            $token = JWT::encode($payload, $tokenSecret, 'HS256');

            $timezone = new DateTimeZone('Africa/Nairobi');
            $date = new DateTime('now', $timezone);
            $offset = '+2 hours';
            $date->modify($offset);
            $timestamp = $date->getTimestamp();

            $d=strtotime("now");
            $issuedAt =  date("Y-m-d h:i:sa", $timestamp);
            $expires = date("Y-m-d h:i:sa", $timestamp+$tokenExpiration);
            return array('token' => $token, 'user_id' => $user['id'], 'user_name' => $user['name'], 'expiration' => time() + $tokenExpiration, 'issuedAt' => $issuedAt, 'expires' => $expires);
        }
        public function register($username, $password, $email) {
            // Hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);
    
            // Insert the user into the database
            $stmt = $this->db->prepare("INSERT INTO users (name, password, email) VALUES (?, ?, ?)");
            $stmt->execute([$username, $password, $email]);
    
            return true;
        }
    
        public function authenticate($token, $tokenSecret) {
            try {
                $decoded = JWT::decode($token, new Key($tokenSecret, 'HS256'));
                return $decoded->user_id;
            } catch (Exception $e) {;
                return false;
            }
        }
    }
?>