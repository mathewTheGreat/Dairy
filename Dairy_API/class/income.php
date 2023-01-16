<?php
    class Income {
        private $pdo;
        public $id;
        public $date;
        public $type_id;
        public $income_specification;
        public $value;
        public $receipt_no;
        public $notes;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function create() {
            $stmt = $this->pdo->prepare('INSERT INTO income (date, type_id, income_specification, value, receipt_no, notes) VALUES(?,?,?,?,?,?)');
            $result = $stmt->execute([$this->date, $this->type_id, $this->income_specification, $this->value, $this->receipt_no, $this->notes]);
            return $result;
        }

        public function find($id) {
            $stmt = $this->pdo->prepare('SELECT * FROM income WHERE id = ?');
            $stmt->execute([$id]);
            $income = $stmt->fetch();
            if($income) {
                $this->id = $income['id'];
                $this->date = $income['date'];
                $this->type_id = $income['type_id'];
                $this->income_specification = $income['income_specification'];
                $this->value = $income['value'];
                $this->receipt_no = $income['receipt_no'];
                $this->notes = $income['notes'];
                return true;
            }
            return false;
        }

        public function update($id) {
            $stmt1 = $this->pdo->prepare('SELECT * FROM income WHERE id = ?');
            $stmt1->execute([$id]);
            if (!$stmt1->fetch()) {
                return false;
            }
            $stmt = $this->pdo->prepare('UPDATE income SET date=?, type_id=?, income_specification=?, value=?, receipt_no=?, notes=? WHERE id = ?');
            $result = $stmt->execute([$this->date, $this->type_id, $this->income_specification, $this->value, $this->receipt_no, $this->notes, $id]);
            return $result;
        }

        public function getAll()
        {
            $stmt = $this->pdo->prepare("SELECT * FROM income");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM income WHERE id = ?");
        $stmt->execute([$id]);
        return true;
    }
}

