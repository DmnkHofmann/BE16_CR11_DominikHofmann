<?php
session_start();


if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

require_once "components/db_connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="actions/a_adopt.php" method="POST">
    <input type= "hidden" name= "id" value= "<?php echo $_GET['id'] ?>" />
        <p>Adoption start</p>
        <input type="date" name="adoption_date_start">
        <input type="submit" name="submit">
    </form>
</body>

</html>