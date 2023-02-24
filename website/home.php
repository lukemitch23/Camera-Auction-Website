<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CAW | Buy and sell gear</title>
        <link rel="stylesheet" href="stylesheet.css">
        <link rel="icon" type="image/x-icon" href="camera.ico">
    </head>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="homecontent">
            <div class="messagecontent">
                <h2>Home</h2>
                <p>Welcome to the home page, here you can navigate to any of the sites functions</p>
            </div>
            <div class="leftbanner">
                <button onclick="location.href='camera_listing.php'">
                    <h2>Get started with selling your camera gear and create a listing</h2>
                    <div class="mainimage">
                        <img src="banner1.jpeg" alt="camera">
                    </div>
                </button>
            </div>

            <div class="righttop">
                <button onclick="location.href='search.php'"> 
                <h2>Your next camera is just a search away</h2>
                <span class="icon arrow"></span>
                <div class="rightimage">
                    <img src="banner2.jpeg" alt="camera">
                </div>
                </button>
            </div>

            <div class="bottomleft">
                <button onclick="location.href='pricerec.php'"> 
                    <h2>Price quote</h2>
                    <span class="icon arrow"></span>
                    <div class="bottomleftimage">
                        <img src="banner3.jpeg" alt="camera">
                    </div>
                </button>
            </div>

            <div class="bottomright">
                <button onclick="location.href='messages.php'"> 
                    <h2>Messages</h2>
                    <span class="icon arrow"></span>
                    <div class="bottomrightimage">
                        <img src="banner4.jpeg" alt="camera">
                    </div>
                </button>
            </div>
        </div>
    </body>
</html>

<?php
include 'db_connect.php';
$sql = "SELECT * FROM listings WHERE end_date <= CURRENT_DATE()";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $notifysoldcommand = escapeshellcmd('python3 notifysold.py ' . $row['listingID']);
        $notifysoldoutput = shell_exec($notifysoldcommand);
        $listing_id = $row['listingID'];
        $sql = "DELETE FROM listings WHERE listingID = {$row['listingID']}";
        unlink($row['image']);
        mysqli_query($link, $sql);
        $sql = "INSERT INTO sold (make, model, price) VALUES ('{$row['make']}', '{$row['model']}', '{$row['price']}')";
        mysqli_query($link, $sql);
    }
}
?>


