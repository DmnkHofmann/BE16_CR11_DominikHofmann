<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);


require_once '../components/db_connect.php';
require_once '../components/file_upload.php';

if ($_POST) { 
    $id = $_POST ['id']; 
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

    $animal_sql = "SELECT * from animals WHERE animalid = $id";
    $res = mysqli_query($connect, $animal_sql); 
    $animal = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $oldimage = $animal['image'];

    $image = file_upload($_FILES['image'], "animals");
    if($image->error===0){
        if(file_exists("../pictures/$oldimage")) {
            unlink("../pictures/$oldimage");
        }          
        $sql = "UPDATE animals SET name = '$name', image = '$image->fileName', species = '$species', gender = '$gender', size = '$size', age = '$age', short_description = '$description', nutrition = '$nutrition', color = '$color', familyfriendly = '$familyfriendly', location = '$location'  WHERE animalid = {$id}";
    }else{
        $sql = "UPDATE animals SET name = '$name', species = '$species', gender = '$gender', size = '$size', age = '$age', short_description = '$description', nutrition = '$nutrition', color = '$color', familyfriendly = '$familyfriendly', location = '$location' WHERE animalid = {$id}";
    }    
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../animals/index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>