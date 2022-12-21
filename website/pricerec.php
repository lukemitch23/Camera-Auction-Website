<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Price recommendation</title>
        <link rel="stylesheet" href="stylesheet_old.css">
        <!-- <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" /> -->
        <!-- <script defer src="https://pyscript.net/alpha/pyscript.js"></script> -->
    </head>
    <body>
    <div class="header">
        <div class="navbar">
                <a href="home.php">Home</a>
                <a href="camera_listing.php">Create Listing</a>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
                <a href="index.php">Sign out</a>
            </div>
            <h1>Camera auction site</h1>
        </div>
        <div class="content">
            <h2>Price recommendation</h2>
            <h4>Enter the camera that you want the recommendation for</h4>
            <form action="pricerec.php" method="post" enctype="multipart/form-data">
                <label for="search">Enter the model that you would like:</label>
                <input type="text" name="search" id="search">
                <input type="submit" value="Search">
            </form>
        </div>
    </body>
</html>


<?php
include 'db_connect.php';

$command = escapeshellcmd('python3 priceupdating.py');
$output = shell_exec($command);

If($_POST){
    if ($_POST['search'] == ""){
        echo "<div class='content'>
                <br></br>
                <h2>No text entered</h2>
            </div>"; 
    } else {
        $sql = "SELECT * FROM prices WHERE make LIKE '%{$_POST['search']}%' OR model LIKE '%{$_POST['search']}%'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='listing'>
                        <br></br>
                        <h2>Recommended price</h2>
                        <h3>{$row['make']} {$row['model']}</h3>
                        <h3>£{$row['recprice']}</3>
                    </div>";
            }
        } else {
            echo "<div class='content'>
                    <h2>No results found</h2>
                </div>";
        }
    }
    
}
?>

