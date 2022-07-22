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

$sql = "SELECT * FROM `animals`";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr class ='align-middle'>
            <td class = 'text-center d-flex justify-content-center'><img class='img-thumbnail' style = 'width: 10rem' src='/pictures/" . $row['image'] . "'</td>
            <td class = 'text-center'>" .$row['name'] . "</td>
            <td class = 'text-center'>" .$row['species']."</td>
            <td class = 'text-center'>" .$row['gender']."</td>
            <td class = 'text-center'>" .$row['age']."</td>
            <td class = 'text-center'>" .$row['size'] . "</td>
            <td class = 'text-center'>" .$row['nutrition'] . "</td>
            <td class = 'text-center'>" .$row['color'] . "</td>
            <td class = 'text-center'>" .$row['familyfriendly'] . "</td>
            <td class = 'text-center'>" .$row['location'] . "</td>
            <td class = 'text-center'><a class='btn btn-primary' href='/animals/update.php?id=" . $row['animalid'] . "'>Edit</a></td>
            <td class = 'text-center'>
                <form action='/actions/a_delete.php' method='post'>
                     <input type='hidden' name='id' value='".$row['animalid'] ."'/>
                    <button class='btn btn-danger' type='submit'>Delete</button>
                </form>
            </td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Animals</title>
    <?php require_once '../components/boot.php' ?>
    <style>
        .userImage {
            width: 200px;
            height: 200px;
        }

        .hero {
            background: rgb(2, 0, 36);
            background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>

<body>
    <p class='h2'>Animals</p> <a href="/animals/create.php" class="btn btn-primary">Create Animal</a>
        <table class='table table-hover'>
            <thead class='table-success'>
                <tr>
                    <th class = "text-center">Picture</th>
                    <th class = "text-center">Name</th>
                    <th class = "text-center">Species</th>
                    <th class = "text-center">Gender</th>
                    <th class = "text-center">Age</th>
                    <th class = "text-center">Size</th>
                    <th class = "text-center">Nutrition</th>
                    <th class = "text-center">Color</th>
                    <th class = "text-center">Family friendly</th>
                    <th class = "text-center">Location</th>
                    <th class = "text-center">Edit</th>
                    <th class = "text-center">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
</body>
</html>