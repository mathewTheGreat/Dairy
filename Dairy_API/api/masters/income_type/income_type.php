<?php

class IncomeType {
    protected $db;

    public $id;
    public $name;

    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM income_type");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM income_type WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            return true;
        }

        return false;
        
    }

    public function create() {
        $stmt = $this->db->prepare("INSERT INTO income_type (name) VALUES (:name)");
        $result = $stmt->execute(['name' => $this->name]);
        return $result;
    }

    public function update() {
        
        $stmt = $this->db->prepare("UPDATE income_type SET name = :name WHERE id = :id");
        $result = $stmt->execute(['id' => $this->id, 'name' => $this->name]);
        return $result;
    }

    public function delete() {
        $stmt = $this->db->prepare("DELETE FROM income_type WHERE id = :id");
        $result = $stmt->execute(['id' => $this->id]);
        return $result;
    }
}
?>