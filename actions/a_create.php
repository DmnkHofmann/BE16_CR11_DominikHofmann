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
require_once '../components/file_upload.php';

if ($_POST) {
    $name = $_POST['name'];
    $species = $_POST['species'];
    $gender = $_POST['gender'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $description = $_POST['short_description'];
    $nutrition = $_POST['nutrition'];
    $color = $_POST['color'];
    $familyfriendly = $_POST['family_friendly'];
    $location = $_POST['location'];
    $uploadError = '';
    //this function exists in the service file upload.
    $image = file_upload($_FILES['image'], 'animals');

    $sql = "INSERT INTO animals (name, species, gender, size, age, short_description, nutrition, color, familyfriendly, location, image) VALUES ('$name','$species', '$gender', '$size', '$age', '$description', '$nutrition', '$color', '$familyfriendly', '$location', '$image->fileName')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $description </td>
            </tr></table><hr>";
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
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
    <title>Update</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../animals/index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>
</html>