<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Camera auction site</title>
        <link rel="stylesheet" href="stylesheet.css">
        <!--link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" /> -->
        <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
    </head>
    <body>
        <div class="header">
            <div class="navbar">
                <a href="home.php">Home</a>
                <a href="search.php">Search</a>
                <a href="camera_listing.php">Create Listing</a>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
                <a href="index.php">Sign out</a>
            </div>
            <br><br>
            <break>
            <h1>Camera auction site</h1>
        </div>
        <div class="content">
            <h2>Home</h2>
            <p>Welcome to the camera auction site, here you can view and bid on cameras</p>
            <button onclick="location.href='search.php'">Search a listing</button>
            <button onclick="location.href='camera_listing.php'">Create a listing</button>
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
        echo $listing_id;
        /*
        $sql = "SELECT * FROM users WHERE userID = {$row['userID']}";
        $result2 = mysqli_query($link, $sql);
        $row2 = mysqli_fetch_assoc($result2);
        $to = $row2['email'];
        $subject = "You've won a listing";
        $message = "You've won a listing on the camera auction site. Please visit the website to view the listing.";
        $headers = "From:
        " . $to;
        mail($to, $subject, $message, $headers); */
        $sql = "DELETE FROM listings WHERE listingID = {$row['listingID']}";
        unlink('images/' . $row['image']);
        mysqli_query($link, $sql);
        $sql = "INSERT INTO sold (make, model, price) VALUES ('{$row['make']}', '{$row['model']}', '{$row['price']}')";
        mysqli_query($link, $sql);
    }
}
?>