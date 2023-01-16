<?php
    class Farm {
            private $pdo;
            public $id;
            public $farm_name;
            public $location;
            public $size;
            public $contact_person;
            public $contact_number;
            public $email;

            public function __construct($pdo) {
                $this->pdo = $pdo;
            }

            public function create() {
                $stmt = $this->pdo->prepare('INSERT INTO farm (farm_name, location, size, contact_person, contact_number, email) VALUES(?,?,?,?,?,?)');
                $result = $stmt->execute([$this->farm_name, $this->location, $this->size, $this->contact_person, $this->contact_number, $this->email]);
                return $result;
            }

            public function find($id)
            {
                $stmt = $this->pdo->prepare('SELECT * FROM farm WHERE id = ?');
                $stmt->execute([$id]);
                $farm = $stmt->fetch();
                if ($farm) {
                    $this->id = $farm['id'];
                    $this->farm_name = $farm['farm_name'];
                    $this->location = $farm['location'];
                    $this->size = $farm['size'];
                    $this->contact_person = $farm['contact_person'];
                    $this->contact_number = $farm['contact_number'];
                    $this->email = $farm['email'];
                    return true;
                }

            }
            public function update($id) {
                $stmt = $this->pdo->prepare('UPDATE farm SET farm_name = ?, location = ?, size = ?, contact_person = ?, contact_number = ?, email = ? WHERE id = ?');
                $result = $stmt->execute([$this->farm_name, $this->location, $this->size, $this->contact_person, $this->contact_number, $this->email, $id]);
                return $result;
            }
        
            public function delete($id) {
                $stmt = $this->pdo->prepare('DELETE FROM farm WHERE id = ?');
                $result = $stmt->execute([$id]);
                return $result;
            }
        
            public function getAll() {
                $stmt = $this->pdo->prepare('SELECT * FROM farm');
                $stmt->execute();
                $farms = $stmt->fetchAll();
                return $farms;
            }
        }
?>