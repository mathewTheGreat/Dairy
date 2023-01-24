<?php
class CattleGroup
{
    protected $db;
    public $id;
    public $name;
    public $description;
    public $cattle_count;
    public $type;
    public $feeding_schedule;
    public $comments;
    public $movement;
    public $movement_date;
    public $movement_location;
    public $employee_id;
    public $farm_id;
    public $health_status;
    public $vaccination_date;
    public $medication;
    public $milk_production;
    public $milk_quality;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM cattle_group");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM cattle_group WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->cattle_count = $row['cattle_count'];
            $this->type = $row['type'];
            $this->feeding_schedule = $row['feeding_schedule'];
            $this->comments = $row['comments'];
            $this->movement = $row['movement'];
            $this->movement_date = $row['movement_date'];
            $this->movement_location = $row['movement_location'];
            $this->employee_id = $row['employee_id'];
            $this->farm_id = $row['farm_id'];
            $this->health_status = $row['health_status'];
            $this->vaccination_date = $row['vaccination_dates'];
            $this->medication = $row['medication'];
            $this->milk_production = $row['milk_production'];
            $this->milk_quality = $row['milk_quality'];
            return true;
        }
        return false;
    }

    public function create()
    {
        $stmt = $this->db->prepare("INSERT INTO cattle_group (name, description, cattle_count, type, feeding_schedule, comments, movement, movement_date, movement_location, employee_id, farm_id, health_status, vaccination_date, medication, milk_production, milk_quality) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$this->name, $this->description, $this->cattle_count, $this->type, $this->feeding_schedule, $this->comments, $this->movement, $this->movement_date, $this->movement_location, $this->employee_id, $this->farm_id, $this->health_status, $this->vaccination_date, $this->medication, $this->milk_production, $this->milk_quality]);
        $this->id = $this->db->lastInsertId();
        return true;
    }

    public function update()
    {
        $stmt = $this->db->prepare("UPDATE cattle_group SET name = ?, description = ?, cattle_count = ?, type = ?, feeding_schedule = ?, comments = ?, movement = ?, movement_date = ?, movement_location = ?, employee_id = ?, farm_id = ?, health_status = ?, vaccination_dates = ?, medication = ?, milk_production = ?, milk_quality = ? WHERE id = ?");
        $stmt->execute([$this->name, $this->description, $this->cattle_count, $this->type, $this->feeding_schedule, $this->comments, $this->movement, $this->movement_date, $this->movement_location, $this->employee_id, $this->farm_id, $this->health_status, $this->vaccination_date, $this->medication, $this->milk_production, $this->milk_quality, $this->id]);
        return true;
    }

    public function delete()
    {
        $stmt = $this->db->prepare("DELETE FROM cattle_group WHERE id = ?");
        $stmt->execute([$this->id]);
        return true;
    }
}
?>