<?php
class MilkProduction
{
    private $pdo;
    public $id;
    public $cattle_ID;
    public $date;
    public $morning_quantity;
    public $afternoon_quantity;
    public $evening_quantity;
    public $quality;
    public $milk_consumed_by_calf;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create()
    {
        $stmt = $this->pdo->prepare('INSERT INTO milk_production (cattle_ID, date, morning_quantity, afternoon_quantity, evening_quantity, quality, milk_consumed_by_calf) VALUES(?,?,?,?,?,?,?)');
        $result = $stmt->execute([$this->cattle_ID, $this->date, $this->morning_quantity, $this->afternoon_quantity, $this->evening_quantity, $this->quality, $this->milk_consumed_by_calf]);
        return $result;
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM milk_production WHERE id = ?');
        $stmt->execute([$id]);
        $milk_production = $stmt->fetch();
        if ($milk_production) {
            $this->id = $milk_production['id'];
            $this->cattle_ID = $milk_production['cattle_ID'];
            $this->date = $milk_production['date'];
            $this->morning_quantity = $milk_production['morning_quantity'];
            $this->afternoon_quantity = $milk_production['afternoon_quantity'];
            $this->evening_quantity = $milk_production['evening_quantity'];
            $this->quality = $milk_production['quality'];
            $this->milk_consumed_by_calf = $milk_production['milk_consumed_by_calf'];
            return true;
        }
        return false;
    }
    public function update($id)
    {
        $stmt1 = $this->pdo->prepare('SELECT * FROM milk_production WHERE id = ?');
        $stmt1->execute([$id]);
        if (!$stmt1->fetch()) {
            return false;
        }
        $stmt = $this->pdo->prepare('UPDATE milk_production SET cattle_ID=?, date=?, morning_quantity=?, afternoon_quantity=?, evening_quantity=?, quality=?, milk_consumed_by_calf=? WHERE id = ?');
        $result = $stmt->execute([$this->cattle_ID, $this->date, $this->morning_quantity, $this->afternoon_quantity, $this->evening_quantity, $this->quality, $this->milk_consumed_by_calf, $id]);
        return $result;
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM milk_production WHERE id = ?");
        $stmt->execute([$id]);
        return true;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM milk_production");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}