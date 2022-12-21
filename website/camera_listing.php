<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Camera auction site</title>
        <link rel="stylesheet" href="stylesheet.css">
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
    $sql = "INSERT INTO listings (make, model, price, description, end_date, image, postowner) VALUES ('{$_POST['make']}', '{$_POST['model']}', '{$_POST['price']}', '{$_POST['description']}', '{$_POST['end_date']}', '{$_FILES['image']['name']}', '{$_SESSION['username']}')";
    if (mysqli_query($link, $sql)) {
        $uploaddir = '/images';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo "Upload failed";
        }
    }
}
?>

