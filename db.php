<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "goodfood";

    public function dbConnect() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>
