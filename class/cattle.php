<?php
    class Cattle {
        // class properties and constructor

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function create() {
            $stmt = $this->pdo->prepare('INSERT INTO cattle (breed, name, tag_no, gender, weight, birth_date, arrival_date, source, mother_tag_no, father_tag_no, notes, from_group, source_method) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $result = $stmt->execute([$this->breed, $this->name, $this->tag_no, $this->gender, $this->weight, $this->birth_date, $this->arrival_date, $this->source, $this->mother_tag_no, $this->father_tag_no, $this->notes, $this->from_group, $this->source_method]);
            return $result;
        }

        public function find($id) {
            $stmt = $this->pdo->prepare('SELECT * FROM cattle WHERE id = ?');
            $stmt->execute([$id]);
            $cattle = $stmt->fetch();
            if($cattle) {
                $this->breed = $cattle['breed'];
                $this->name = $cattle['Name'];
                $this->tag_no = $cattle['tag_no'];
                $this->gender = $cattle['gender'];
                $this->weight = $cattle['weight'];
                $this->birth_date = $cattle['birth_date'];
                $this->arrival_date = $cattle['arrival_date'];
                $this->source = $cattle['source'];
                $this->mother_tag_no = $cattle['mother_tag_no'];
                $this->father_tag_no = $cattle['father_tag_no'];
                $this->notes = $cattle['notes'];
                $this->from_group = $cattle['from_group'];
                $this->source_method = $cattle['source_method'];
                return true;
            }
            return false;
        }

        public function update($id) {
            $stmt1 = $this->pdo->prepare('SELECT * FROM cattle WHERE id = ?');
            $stmt1->execute([$id]);
            if (!$stmt1->fetch()) {
                return false;
            }
            $stmt = $this->pdo->prepare('UPDATE cattle SET breed=?, name=?, tag_no=?, gender=?, weight=?, birth_date=?, arrival_date=?, source=?, mother_tag_no=?, father_tag_no=?, notes=?, from_group=?, source_method=? WHERE id = ?');
            $result = $stmt->execute([$this->breed, $this->name, $this->tag_no, $this->gender, $this->weight, $this->birth_date, $this->arrival_date, $this->source, $this->mother_tag_no, $this->father_tag_no, $this->notes, $this->from_group, $this->source_method, $id]);
            return $result;
        }

        public function delete($id) {
            $stmt = $this->pdo->prepare('DELETE FROM cattle WHERE id = ?');
            $result = $stmt->execute([$id]);
            return $result;
        }

        public static function getAll($pdo) {
            $stmt = $pdo->prepare('SELECT * FROM cattle');
            $stmt->execute();
            $cattles = $stmt->fetchAll();
            return $cattles;
        }
    }
?>