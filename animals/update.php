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
require_once "../components/db_connect.php";
$animal_id = $_GET["id"];
$animal_sql = "SELECT * from animals WHERE animalid = $animal_id";
$res = mysqli_query($connect, $animal_sql);
$animal = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Update Animal</title>
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
        <legend class='h2'>Update Animal</legend>
        <form action="../actions/a_update.php" method="post" enctype="multipart/form-data">
        <input type='hidden' name='id' value="<?php echo $animal['animalid'];?>"/>
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Animal Name" value="<?php echo $animal['name'];?>" /></td>
                </tr>
                <tr>
                    <th>Species</th>
                    <td><input class='form-control' type="text" name="species" placeholder="Species" value="<?php echo $animal['species'];?>" /></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input class='form-control' type="text" name="gender" placeholder="Gender"value="<?php echo $animal['gender'];?>"/></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Size"value="<?php echo $animal['size'];?>"/></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" placeholder="Age"value="<?php echo $animal['age'];?>"/></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="short_description" placeholder="Description"value="<?php echo $animal['short_description'];?>"/></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><input class='form-control' type="file" name="image"/></td>
                </tr>
                <tr>
                    <th>Nutrition</th>
                    <td><input class='form-control' type="text" name="nutrition" placeholder="Nutrition"value="<?php echo $animal['nutrition'];?>"/></td>
                </tr>
                <tr>
                    <th>Color</th>
                    <td><input class='form-control' type="text" name="color" placeholder="Color"value="<?php echo $animal['color'];?>"/></td>
                </tr>
                <tr>
                    <th>Family friendly</th>
                    <td><input class='form-control' type="text" name="family_friendly" placeholder="Family friendly"value="<?php echo $animal['familyfriendly'];?>"/></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input class='form-control' type="text" name="location" placeholder="Location"value="<?php echo $animal['location'];?>"/></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Update Animal</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>