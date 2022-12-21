<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Camera auction site</title>
        <link rel="stylesheet" href="stylesheet_old.css">
    </head>
    <body>
        <!-- <div class="hero">
            <nav>
                <img src="siteimages/logo.png" class="logo">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="camera_listing.php">Create Listing</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="pricerec.php">Price recomendation</a></li>
                    <li><a href="index.php">Sign out</a></li>
                </ul>
            </nav>
            <video id="background-video" autoplay loop muted>
            <source src="siteimages/background.mp4" type="video/mp4">
            </video>
        </div> -->
        <div class="content">
            <h2>Home</h2>
            <p>Welcome to the camera auction site, here you can view and bid on cameras</p>
            <button onclick="location.href='search.php'">Search a listing</button>
            <button onclick="location.href='camera_listing.php'">Create a listing</button>
            <button onclick="location.href='pricerec.php'">Price recommendation</button>
        </div>
    </body>
</html>

<?php
include 'db_connect.php';
$sql = "SELECT * FROM listings WHERE end_date <= CURRENT_DATE()";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $listing_id = $row['listingID'];
        $sql = "DELETE FROM listings WHERE listingID = {$row['listingID']}";
        unlink($row['image']);
        mysqli_query($link, $sql);
        $sql = "INSERT INTO sold (make, model, price) VALUES ('{$row['make']}', '{$row['model']}', '{$row['price']}')";
        mysqli_query($link, $sql);
    }
}
?>

