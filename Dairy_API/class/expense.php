<?php
    class Expense {
        private $pdo;
        public $id;
        public $date;
        public $type_id;
        public $expense_specification;
        public $value;
        public $receipt_no;
        public $notes;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function create() {
            $stmt = $this->pdo->prepare('INSERT INTO expense (date, type_id, expense_specification, value, receipt_no, notes) VALUES(?,?,?,?,?,?)');
            $result = $stmt->execute([$this->date, $this->type_id, $this->expense_specification, $this->value, $this->receipt_no, $this->notes]);
            return $result;
        }

        public function getAll()
        {
            $stmt = $this->pdo->prepare("SELECT * FROM expense");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function find($id) {
            $stmt = $this->pdo->prepare('SELECT * FROM expense WHERE id = ?');
            $stmt->execute([$id]);
            $expense = $stmt->fetch();
            if($expense) {
                $this->id = $expense['id'];
                $this->date = $expense['date'];
                $this->type_id = $expense['type_ID'];
                $this->expense_specification = $expense['expense_specification'];
                $this->value = $expense['value'];
                $this->receipt_no = $expense['receipt_no'];
                $this->notes = $expense['notes'];
                return true;
            }
            return false;
        }

        public function update($id) {
            $stmt1 = $this->pdo->prepare('SELECT * FROM expense WHERE id = ?');
            $stmt1->execute([$id]);
            if (!$stmt1->fetch()) {
                return false;
            }
            $stmt = $this->pdo->prepare('UPDATE expense SET date=?, type_ID=?, expense_specification=?, value=?, receipt_no=?, notes=? WHERE id = ?');
            $result = $stmt->execute([$this->date, $this->type_id, $this->expense_specification, $this->value, $this->receipt_no, $this->notes, $id]);
            return $result;
        }

        public function delete($id)
        {
            $stmt = $this->pdo->prepare("DELETE FROM expense WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        }
    }
?>