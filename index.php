<?php
require 'db.php';
require 'Car.php';

$carObj = new Car($conn);
$cars = $carObj->getAllCars();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="container mt-5">

<h2>Car Management</h2>

    <!-- 🚀 Car Form (Add & Edit) -->
    <form id="carForm" method="post">
        <input type="hidden" name="id" id="carId">  <!-- Hidden field for edit -->
        <div class="mb-3">
            <label class="form-label">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Model</label>
            <input type="text" name="model" id="model" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Year</label>
            <input type="number" name="year" id="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Car</button> <!-- Button text changes via JS -->
    </form>

    <!-- Search Box -->
    <input type="text" id="search" class="form-control mb-3 mt-5" placeholder="Search by Brand, Model, or Year...">


    <!-- 🚗 Car List Table -->
    <h3 class="mt-4">Car List</h3>
    <table class="table table-bordered" id="carTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $cars->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['brand']); ?></td>
                    <td><?= htmlspecialchars($row['model']); ?></td>
                    <td><?= $row['year']; ?></td>
                    <td>$<?= number_format($row['price'], 2); ?></td>
                    <td>
                        <button class="btn btn-warning edit-btn" 
                                data-id="<?= $row['id']; ?>" 
                                data-brand="<?= htmlspecialchars($row['brand']); ?>" 
                                data-model="<?= htmlspecialchars($row['model']); ?>" 
                                data-year="<?= $row['year']; ?>" 
                                data-price="<?= $row['price']; ?>">Edit</button>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger delete-btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="./asseets/js/script.js"></script>

</html>