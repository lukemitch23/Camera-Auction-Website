<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Search</title>
        <link rel="stylesheet" href="stylesheet.css">
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
            <h2>Search</h2>
            <h4>Search for the camera you want</h4>
            <form action="search.php" method="post" enctype="multipart/form-data">
                <label for="search">Enter the model that you would like:</label>
                <input type="text" name="search" id="search">
                <input type="submit" value="Search">
            </form>
        </div>
    </body>
</html>
<?php
include 'db_connect.php';

If($_POST){
    $sql = "SELECT * FROM listings WHERE make LIKE '%{$_POST['search']}%' OR model LIKE '%{$_POST['search']}%'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $date1 = new DateTime("now");
            $date2 = new DateTime($row['end_date']);
            $interval = $date1->diff($date2);
            $interval = $interval->format('%R%a days');
            echo "<div class='listing'>
                    <h2>{$row['make']} {$row['model']}</h2>
                    <h3>£{$row['price']}</3>
                    <p>{$row['description']}</p>
                    <p>Time left: $interval</p>
                    <img src='images/{$row['image']}' alt='{$row['make']} {$row['model']}'>
                    <a href='view_listing.php?listingID={$row['listingID']}'>View</a>
                </div>";
        }
    } else {
        echo "<div class='content'>
                <h2>No results found</h2>
            </div>";
    }
    if (isset($_POST['view'])) {
        $_COOKIE['listingID'] = $row['listingID'];
    }
}
?>