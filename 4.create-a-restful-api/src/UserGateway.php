<?php

class UserGateway
{
    private $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getByAPIKey(string $key): array
    {
        $sql = "SELECT *
                FROM user
                WHERE api_key = :api_key";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":api_key", $key, PDO::PARAM_STR);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == false) {

            return [];
        }

        return $data;
    }

    public function getByUsername(string $username): array
    {
        $sql = "SELECT *
                FROM user
                WHERE username = :username";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":username", $username, PDO::PARAM_STR);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == false) {

            return [];
        }

        return $data;
    }

    public function getByID(int $id): array
    {
        $sql = "SELECT *
                FROM user
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == false) {

            return [];
        }

        return $data;
    }
}
