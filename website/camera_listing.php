<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Camera auction site</title>
        <link rel="stylesheet" href="stylesheet_old.css">
    </head>
    <body>
        <div class="header">
            <h1>Camera auction site</h1>
            <div class="navbar">
                <a href="home.php">Home</a>
                <a href="search.php">Search</a>
                <a href="camera_listing.php">Create Listing</a>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
                <a href="index.php">Sign out</a>
            </div>
        </div>
        <div class="content">
            <h2>Create a listings</h2>
            <form action="camera_listing.php" method="post" enctype="multipart/form-data">
                <label for="make">Make</label>
                <input type="text" name="make" id="make">
                <label for="model">Model</label>
                <input type="text" name="model" id="model">
                <label for="price">Price</label>
                <input type="int" name="price" id="price">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                <label for="end_date">End date</label>
                <input type="date" name="end_date" id="end_date" value= <?php echo date('Y-m-d', strtotime('+1 week')); ?>>
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>


<?php
session_start();
include 'db_connect.php';

If($_POST){
    if ($_POST['make'] == "" or $_POST['model'] == "" or $_POST['price'] == "" or $_POST['description'] == "" or $_POST['end_date'] == ""){
        echo "<div class='content'>
                <h2> </h2>
                <h2>One or more fields are empty</h2>
            </div>";
    } else {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $image_path = 'images/' . uniqid() . '.' . $image_ext;
        $sql = "INSERT INTO listings (make, model, price, description, end_date, image, postowner) VALUES ('{$_POST['make']}', '{$_POST['model']}', 
            '{$_POST['price']}', '{$_POST['description']}', '{$_POST['end_date']}', '{$image_path}', '{$_SESSION['username']}')";
        if (mysqli_query($link, $sql)) {
            if (move_uploaded_file($image_tmp, $image_path)) {
                echo "File is valid, and was successfully uploaded. Your listing has been created.\n";
                $command = escapeshellcmd('./gitupdate.sh');
                $output = shell_exec($command);
            } else {
                echo "Upload failed";
            }
        }
    }
}
?>

