<?php

    class EventType {
        protected $db;
    
        public $id;
        public $event_name;
    
        public function __construct(PDO $pdo) {
            $this->db = $pdo;
        }
    
        public function getAll() {
            $stmt = $this->db->prepare("SELECT * FROM event_type");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function find($id) {
            $stmt = $this->db->prepare("SELECT * FROM event_type WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row) {
                $this->id = $row['id'];
                $this->event_name = $row['event_name'];
                return true;
            }
    
            return false;
            
        }
    
        public function create() {
            $stmt = $this->db->prepare("INSERT INTO event_type (event_name) VALUES (:event_name)");
            $result = $stmt->execute(['event_name' => $this->event_name]);
            return $result;
        }
    
        public function update() {
            
            $stmt = $this->db->prepare("UPDATE event_type SET event_name = :event_name WHERE id = :id");
            $result = $stmt->execute(['id' => $this->id, 'event_name' => $this->event_name]);
            return $result;
        }
    
        public function delete() {
            $stmt = $this->db->prepare("DELETE FROM event_type WHERE id = :id");
            $result = $stmt->execute(['id' => $this->id]);
            return $result;
        }
    }
?>