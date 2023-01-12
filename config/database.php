<?php 
   class DairyDatabase
   {
       private $host = 'localhost';
       private $db = 'dairy';
       private $user = 'root';
       private $pass = '';
       private $charset = 'utf8mb4';
       private $options = [
           PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
           PDO::ATTR_EMULATE_PREPARES   => false,
       ];
   
       private $pdo;
   
       public function __construct()
       {
           try {
               $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
               $this->pdo = new PDO($dsn, $this->user, $this->pass, $this->options);
           } catch (\PDOException $e) {
               throw new \PDOException($e->getMessage(), (int)$e->getCode());
           }
       }
   
       public function getPDO()
       {
           return $this->pdo;
       }
   }
?>