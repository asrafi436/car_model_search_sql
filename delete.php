<?php
require 'db.php';
require 'Car.php';

if (isset($_GET['id'])) {
    $carObj = new Car($conn);
    $result = $carObj->deleteCar($_GET['id']);

    if ($result) {
        header("Location: index.php?delete=success");
        exit;
    } else {
        header("Location: index.php?delete=fail");
        exit;
    }
}
?>