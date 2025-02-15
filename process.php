<?php
require 'db.php';
require 'Car.php';

$carObj = new Car($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $brand = trim($_POST["brand"]);
    $model = trim($_POST["model"]);
    $year = intval($_POST["year"]);
    $price = floatval($_POST["price"]);

    if (empty($brand) || empty($model) || empty($year) || empty($price)) {
        echo json_encode(["status" => "error", "message" => "All fields are required"]);
        exit;
    }

    if ($id > 0) {
        // Update car
        $result = $carObj->updateCar($id, $brand, $model, $year, $price);
        echo json_encode(["status" => $result ? "success" : "error", "message" => $result ? "Car updated successfully!" : "Failed to update car"]);
    } else {
        // Insert new car
        $result = $carObj->addCar($brand, $model, $year, $price);
        echo json_encode(["status" => $result ? "success" : "error", "message" => $result ? "Car added successfully!" : "Failed to add car"]);
    }
    exit;
}
