<?php
include "db.php";

class Query {
    private $db;

    public function __construct() {
        $this->db = (new Database())->dbConnect();
    }

    // Register a new user
    public function register($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$username, $email, $hashedPassword]);
    }

    // Check if a username already exists
    public function isUsernameExists($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch() !== false;
    }

    // Authenticate user
    public function login($username, $password) {
        $sql = "SELECT password FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        if ($row && password_verify($password, $row['password'])) {
            return true;
        }
        return false;
    }

    // Log out user (clear session)
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php"); // Redirect to the login page after logout
        exit();
    }

    // View a single row of stock data
    public function searchStock($keyword) {
        $sql = "SELECT * FROM stock WHERE name LIKE ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get stock entry by ID
    public function getStockEntryById($id) {
        $sql = "SELECT * FROM stock WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update stock entry
    public function updateStock($id, $name, $category, $quantity, $ratio) {
        $sql = "UPDATE stock SET name = ?, category = ?, quantity = ?, ratio = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name, $category, $quantity, $ratio, $id]);
    }

    // Add stock entry
    public function addStock($name, $category, $quantity, $ratio) {
        $sql = "INSERT INTO stock (name, category, quantity, ratio) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name, $category, $quantity, $ratio]);
    }

    // Delete stock entry
    public function deleteStock($id) {
        $sql = "DELETE FROM stock WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
