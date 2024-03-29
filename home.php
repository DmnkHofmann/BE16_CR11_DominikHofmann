<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row2 = mysqli_fetch_array($res, MYSQLI_ASSOC);
if (array_key_exists('seniors', $_GET)) {
    $sql = "SELECT * FROM animals WHERE age >= 8";
  } else {
    $sql = "SELECT * FROM animals";
  }
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr class ='align-middle'>
            <td class = 'text-center d-flex justify-content-center'><img class='img-thumbnail' style = 'width: 10rem' src='pictures/" . $row['image'] . "'</td>
            <td class = 'text-center'>" .$row['name'] . "</td>
            <td class = 'text-center'>" .$row['species']."</td>
            <td class = 'text-center'>" .$row['gender']."</td>
            <td class = 'text-center'>" .$row['age']."</td>
            <td class = 'text-center'>" .$row['size'] . "</td>
            <td class = 'text-center'>" .$row['nutrition'] . "</td>
            <td class = 'text-center'>" .$row['color'] . "</td>
            <td class = 'text-center'>" .$row['familyfriendly'] . "</td>
            <td class = 'text-center'>" .$row['location'] . "</td>
            <td class = 'text-center'><a class='btn btn-primary' href='details.php?id=" . $row['animalid'] . "'>View more</a></td>
            <td class = 'text-center'><a class='btn btn-success' href='adopt.php?id=" . $row['animalid'] . "'>Take me home</a></td>
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
    <title>Welcome - <?php echo $row2['first_name']; ?></title>
    <?php require_once 'components/boot.php' ?>
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
<?php require_once 'components/navigation.php' ?>
    <div class="container">
        <div class="hero">
            <img class="userImage" src="pictures/<?php echo $row2['picture']; ?>" alt="<?php echo $row2['first_name']; ?>">
            <p class="text-white">Hi <?php echo $row2['first_name']; ?></p>
        </div>
        <a href="logout.php?logout" class="btn btn-danger">Sign Out</a>
        <a href="update.php?id=<?php echo $_SESSION['user'] ?>" class="btn btn-primary">Update your profile</a>
    </div>
    <p class='h2'>Animals</p>
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
                    <th class = "text-center">Description</th>
                    <th class = "text-center">Action</th>

                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
</body>
</html>