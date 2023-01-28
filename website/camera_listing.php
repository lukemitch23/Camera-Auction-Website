<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create a listing</title>
        <link rel="stylesheet" href="camerastylesheet.css">
        <link rel="icon" type="image/x-icon" href="camera.ico">
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="homecontent">
            <div class="messagecontent">
                <h2>Create a listing</h2>
                <p>Fill in the form below to create a listing for the site</p>
            </div>
            <div class="listingform">
                <form action="camera_listing.php" method="post" enctype="multipart/form-data">
                    <label for="make">Make:</label>
                    <input type="text" name="make" id="make">
                    <label for="model">Model:</label>
                    <input type="text" name="model" id="model">
                    <br>
                    <label for="price">Price:</label>
                    <input type="int" name="price" id="price">
                    <label for="end_date">End date:</label>
                    <input type="date" name="end_date" id="end_date">
                    <br>
                    <div class="description">
                        <label for="description">Description:</label>
                        <input name="description" id="description"></input>
                    </div>
                    <br>
                    <div class="imageupload">
                        <label for="image">Image:</label>
                        <input type="file" accept="image/*" name="image" id="image">
                    </div>
                    <br>
                    <div class="listingsubmit">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
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
        if (is_numeric($_POST['price'])){
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            ## check that the image extension is valid
            if ($image_ext == "jpg" or $image_ext == "jpeg" or $image_ext == "png"){
                $image_path = 'images/' . uniqid() . '.' . $image_ext;
                $sql = "INSERT INTO listings (make, model, price, description, end_date, image, postowner) VALUES ('{$_POST['make']}', '{$_POST['model']}', 
                '{$_POST['price']}', '{$_POST['description']}', '{$_POST['end_date']}', '{$image_path}', '{$_SESSION['username']}')";
                if (mysqli_query($link, $sql)) {
                    if (copy($image_tmp, $image_path)) {
                        echo "File is valid, and was successfully uploaded. Your listing has been created.\n";
                        $command = escapeshellcmd('./gitupdate.sh');
                        $output = shell_exec($command);
                    } else {
                        echo "Upload failed";
                    }
                }
            } else {
                echo "<div class='content'>
                    <h3>Error! File type is incorrect</h3>
                </div>";
            }
        } else {
            echo "<div class='content'>
                    <h3>Price is not a number!</h3>
                </div>";
        }
    }
}
?>

