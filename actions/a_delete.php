<?php
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ../../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../../index.php");
    exit;
}

require_once '../components/db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
    $animal_sql = "SELECT * from animals WHERE animalid = $id";
    $res = mysqli_query($connect, $animal_sql);
    $animal = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $picture = $animal['image'];
    if(file_exists("../pictures/$picture")) {
        unlink("../pictures/$picture");
    }

    $sql = "DELETE FROM animals WHERE animalid = {$id}";
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Delete request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= $message; ?></p>
            <a href='../animals/index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>
</html>