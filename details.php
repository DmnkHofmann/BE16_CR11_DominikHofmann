<?php
session_start();

// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

require_once "components/db_connect.php";
$animal_id = $_GET["id"];
$animal_sql = "SELECT * from animals WHERE animalid = $animal_id";
$res = mysqli_query($connect, $animal_sql);
$animal = mysqli_fetch_array($res, MYSQLI_ASSOC);

$result = mysqli_query($connect, $animal_sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
$tbody .= "

<div class='card' style='width: 35rem;'>
  <img src='pictures/" . $row['image'] . "'>
  <div class='card-body'>
    <p class='card-title'>".$row['short_description'] ."</p>
  </div>
</div>

";
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'components/boot.php' ?>
    <style>
        .container{
            height:100vh
        }
    </style>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center">
                <?= $tbody; ?>
</div>
</body>
</html>