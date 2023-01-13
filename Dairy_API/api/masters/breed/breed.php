<?php

class CattleBreed {
    protected $db;

    public $id;
    public $name;
    public $description;
    public $image;
    public $popularity;
    public $milk_production;
    public $meat_production;
    public $adaptability;
    public $comments;

    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM breed");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM breed WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->image = $row['image'];
            //$this->popularity = $row['popularity'];
            $this->milk_production = $row['milk_production'];
            $this->meat_production = $row['meat_production'];
            $this->adaptability = $row['adaptability'];
            $this->comments = $row['comments'];

            return true;
        }

        return false;
        
    }

    public function create() {
        $stmt = $this->db->prepare("INSERT INTO breed (name, description, image, milk_production, meat_production, adaptability, comments) VALUES (:name, :description, :image, :milk_production, :meat_production, :adaptability, :comments)");
        $result = $stmt->execute(['name' => $this->name, 'description' => $this->description, 'image' => $this->image,'milk_production' => $this->milk_production, 'meat_production' => $this->meat_production, 'adaptability' => $this->adaptability, 'comments' => $this->comments]);
        return $result;
    }

    public function update() {
        
        $stmt = $this->db->prepare("UPDATE breed SET name = :name, description = :description, image = :image, milk_production = :milk_production, meat_production = :meat_production, adaptability = :adaptability, comments = :comments WHERE id = :id");
        $result = $stmt->execute(['id' => $this->id, 'name' => $this->name, 'description' => $this->description, 'image' => $this->image, 'milk_production' => $this->milk_production, 'meat_production' => $this->meat_production, 'adaptability' => $this->adaptability, 'comments' => $this->comments]);
        return $result;
    }

    public function delete() {
        $stmt = $this->db->prepare("DELETE FROM breed WHERE id = :id");
        $result = $stmt->execute(['id' => $this->id]);
        return $result;
    }
}
