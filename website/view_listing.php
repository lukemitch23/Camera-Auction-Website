<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Retrieved Listing</title>
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
    </body>
</html>

<?php
session_start();
include 'db_connect.php';
$sql = "SELECT * FROM listings where listingID = {$_REQUEST['listingID']}";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $date1 = new DateTime("now");
        $date2 = new DateTime($row['end_date']);
        $interval = $date1->diff($date2);
        $new_interval = $interval->m." months, ".$interval->d." days ";        
        echo "<div class='listing'>
                <h2>{$row['make']} {$row['model']}</h2>
                <h3>£{$row['price']}</3>
                <p>{$row['description']}</p>
                <p>Time left: $new_interval</p>
                <img src='images/{$row['image']}' alt='{$row['make']} {$row['model']}'>
            </div>";
    $sql2 = "SELECT * FROM cameras WHERE Brand = '{$row['make']}' AND Model = '{$row['model']}'";
    $result2 = mysqli_query($link, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    echo "<div class='content'>
            <h2>{$row2['Brand']} {$row2['Model']}</h2>
            <p>{$row2['Crop_factor']}</p>
            </div>";
    if ($interval > 0) {
        echo "<form action='view_listing.php' method='post'>
                <label for='bid'>Bid</label>
                <input type='int' name='bid' id='bid'>
                <input type='hidden' name='listingID' value='{$row['listingID']}'>
                <input type='submit' value='Bid'>
            </form>";
        $userID = $_SESSION['userID'];
        $ownerID = $row['userID'];
        if ($_POST['bid'] > $row['price']) {
            $sql = "UPDATE listings SET price = {$_POST['bid']} WHERE listingID = {$row['listingID']}";
            if (mysqli_query($link, $sql)) {
                echo "<br></br>";
                echo "Bid successful, it may not show until the page is refreshed";
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }
        else {
            echo "The bid was not enough";
        }
    } else {
        echo "<p>This listing has ended</p>";
        }
    }
}
?>



