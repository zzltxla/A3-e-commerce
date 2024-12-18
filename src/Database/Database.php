<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(dsn: 'mysql:host=mysql;dbname=mvcbdd;charset=utf8', username: 'rootuser', password: 'rootpassword');
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
        }
        return self::$connection;
    }

    public function create ($table, $data) {
        try {
            $columns = implode(separator: ", ", array: array_keys($data));
            $placeholders = ":" . implode(separator: ", :", array: array_keys($data));
            $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";

            $stmt = self::getConnection()->prepare(query: $query);
            foreach($data as $key => $value) {
                $stmt->bindValue(param: ":;$key", value: $value);
            }
            $stmt->execute();

            return self::getConnection() -> lastInsertId();
        } catch (PDOException $error){
            die("Erreur de création:" . $error ->getMessage());
        }
    }

    public function read ($table, $conditions = "") {
        try {
            $request = "SELECT * FROM $table";
            if (!empty($conditions)) {
                $request .= "WHERE $conditions";
            }

            $stmt = $this->getConnection()->query($request);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } 
        catch (PDOException $error) {
            die("Erreur lors de la récupération de donnée : " . $error->getMessage());
        }
    }

    public function update($table, $data, $conditions){
        try {
            $setPart = implode(separator: ", ", array: array_map(callback: fn($keys): string => "$keys = :$keys", array: array_keys($data)));
            $conditionPart = implode(separator: "AND", array: array_map(callback: fn($key): string => "$key =:cond_$key", array: array_keys($conditions)));

            $query = "UPDATE $table SET $setPart";

            if (!empty($conditions)) {
                $query .= "WHERE $conditionPart";
            }

            $stmt = self::getConnection()->prepare(query: $query);

            foreach ($data as $key => $value) {
                $stmt->bindValue(param: ":$key", value: $value);
            }
            foreach ($conditions as $key => $value) {
                $stmt->bindValue(param: ":cond_$key", value: $value);
            }

            return  $stmt->execute();
        } catch  (PDOException $error) {
            die("Erreur de mise à jour : " . $error->getMessage());
        }
    }

    public function delete($table, $conditions)
    {
        // Example usage: 'id = 1'
        try {
            $conditionPart = implode(
                separator: ' AND ', array: array_map(callback: fn($key): string => "$key = :$key", array: array_keys($conditions)));
            $sql = "DELETE FROM $table WHERE $conditionPart";

            $stmt = self::getConnection()->prepare(query: $sql);
            foreach ($conditions as $key => $value) {
                $stmt->bindValue(param: ":$key", value: $value);
            }
            return $stmt->execute();
        } catch (PDOException $e) {
            die('Erreur de suppression : ' . $e->getMessage());
        }
    }
}