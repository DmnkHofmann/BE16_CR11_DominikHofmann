<?php
session_start();

require_once "../components/db_connect.php";

if (isset($_POST["submit"])) {
    $animal_id = $_POST["id"];
    $user_id = $_SESSION["user"];
    $date_start = $_POST["adoption_date_start"];

    $sql = "INSERT INTO animal_adoption (fk_user_id, fk_animal_id, adoption_date_start) VALUES ($user_id, $animal_id, '$date_start' )";
    // $sql2 = "UPDATE products set status = 'reserved' WHERE id = $animal_id";
    // $result2 = mysqli_query($connect, $sql2);
    $result = mysqli_query($connect, $sql);
    if ($result) {
        mysqli_close($connect);
        header("refresh:5; ../home.php");
    } else {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <link rel="stylesheet" href="../css/style.scss">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    </head>
    <body>
            <div class="row text-center justify-content-center">
                <div class="nsl"></div>
                <div class="col-12 nsl">
                    <h3>Adoption succesfully!</h3>
                </div>
                <div class="col-6 nsl">
                    <div class="dimgbox">
                        
                    </div>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>