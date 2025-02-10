<?php
class ConnectDataBase {
    public function connectDB () {
        try {
            $server = "localhost";
            $dbname = "projectweb2";
            $username = "root";
            $password = "";
            $connect = new PDO ("mysql:host=$server;dbname=$dbname", $username, $password);
            return $connect;
        } catch (PDOException $e) {
            echo "Error!: " .$e->getMessage();
        }
    }
}
?>