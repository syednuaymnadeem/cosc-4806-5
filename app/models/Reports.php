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

    public function getTopReminderUser() {
        $sql = "
          SELECT u.username, COUNT(r.id) AS cnt
          FROM reminders r
          JOIN users u ON r.user_id = u.id
          GROUP BY u.username
          ORDER BY cnt DESC
          LIMIT 1
        ";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
}
