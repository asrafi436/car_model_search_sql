<?php
class Car
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addCar($brand, $model, $year, $price)
    {
        $stmt = $this->conn->prepare("INSERT INTO cars (brand, model, year, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $brand, $model, $year, $price);
        return $stmt->execute();
    }

    public function getAllCars()
    {
        return $this->conn->query("SELECT * FROM cars");
    }

    public function updateCar($id, $brand, $model, $year, $price)
    {
        $stmt = $this->conn->prepare("UPDATE cars SET brand=?, model=?, year=?, price=? WHERE id=?");
        $stmt->bind_param("ssiii", $brand, $model, $year, $price, $id);
        return $stmt->execute();
    }

    public function deleteCar($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM cars WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
