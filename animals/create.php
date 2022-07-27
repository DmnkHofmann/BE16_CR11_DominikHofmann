<?php
session_start();
require_once '../components/db_connect.php';

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>PHP CRUD | Add Product</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add Animal</legend>
        <form action="../actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Animal Name" /></td>
                </tr>
                <tr>
                    <th>Species</th>
                    <td><input class='form-control' type="text" name="species" placeholder="Species"/></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input class='form-control' type="text" name="gender" placeholder="Gender"/></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Size"/></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" placeholder="Age"/></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="short_description" placeholder="Description"/></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><input class='form-control' type="file" name="image" /></td>
                </tr>
                <tr>
                    <th>Nutrition</th>
                    <td><input class='form-control' type="text" name="nutrition" placeholder="Nutrition"/></td>
                </tr>
                <tr>
                    <th>Color</th>
                    <td><input class='form-control' type="text" name="color" placeholder="Color"/></td>
                </tr>
                <tr>
                    <th>Family friendly</th>
                    <td><input class='form-control' type="text" name="family_friendly" placeholder="Family friendly"/></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input class='form-control' type="text" name="location" placeholder="Location"/></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Animal</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>