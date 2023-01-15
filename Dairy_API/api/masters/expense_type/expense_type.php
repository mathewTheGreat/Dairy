<?php
class ExpenseType
{
    protected $db;

    public $id;
    public $expense_name;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM expense_type");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM expense_type WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->id = $row['id'];
            $this->expense_name = $row['expense_name'];

            return true;
        }

        return false;

    }

    public function create()
    {
        $stmt = $this->db->prepare("INSERT INTO expense_type (expense_name) VALUES (:expense_name)");
        $result = $stmt->execute(['expense_name' => $this->expense_name]);
        return $result;
    }

    public function update()
    {
        $stmt = $this->db->prepare("UPDATE expense_type SET expense_name = :expense_name WHERE id = :id");
        $result = $stmt->execute(['id' => $this->id, 'expense_name' => $this->expense_name]);
        return $result;
    }

    public function delete()
    {
        $stmt = $this->db->prepare("DELETE FROM expense_type WHERE id = :id");
        $result = $stmt->execute(['id' => $this->id]);
        return $result;
    }

}
