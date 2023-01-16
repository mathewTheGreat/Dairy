<?php
class Events
{
    protected $db;
    public $id;
    public $cattle_id;
    public $event_type;
    public $event_specification;
    public $notes;
    public $date;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM events");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->id = $row['id'];
            $this->cattle_id = $row['cattle_id'];
            $this->event_type = $row['event_type'];
            $this->event_specification = $row['event_specification'];
            $this->notes = $row['notes'];
            $this->date = $row['date'];
            return true;
        }
        return false;
    }

    public function create()
    {
        $stmt = $this->db->prepare("INSERT INTO events (cattle_id, event_type, event_specification, notes, date) VALUES (?,?,?,?,?)");
        $stmt->execute([$this->cattle_id, $this->event_type, $this->event_specification, $this->notes, $this->date]);
        $this->id = $this->db->lastInsertId();
        return true;
    }
    public function update($id)
    {
        $stmt = $this->db->prepare("UPDATE events SET cattle_id = ?, event_type = ?, event_specification = ?, notes = ?, date = ? WHERE id = ?");
        $stmt->execute([$this->cattle_id, $this->event_type, $this->event_specification, $this->notes, $this->date, $id]);
        return true;
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM events WHERE id = ?");
        $stmt->execute([$id]);
        return true;
    }
}