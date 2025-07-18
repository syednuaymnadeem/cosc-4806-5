<?php
class Report {
    protected $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function getAllReminders() {
        $sql = "
          SELECT r.id, u.username, r.reminder, r.created_at
          FROM reminders r
          JOIN users u ON r.user_id = u.id
          ORDER BY r.created_at DESC
        ";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
