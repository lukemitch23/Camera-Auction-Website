<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View listing</title>
        <link rel="stylesheet" href="viewstylesheet.css">
        <link href="camera.ico" rel="icon" type="image/x-icon" />
    </head>
    <body>
        <?php include 'navbar.php'; ?>
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
        echo "<div class='homecontent'>
            <div class='messagecontent'>
                <h2>{$row['make']} {$row['model']}</h2>           
            </div>
            <div class='listing'>
                <div class='listingimage'>
                <img src='{$row['image']}' alt='{$row['make']} {$row['model']}'>
                </div>
                <div class='listingcontent'>
                    <h3>Price: £{$row['price']}</h3> 
                    <br>
                    <h3>Time left: $new_interval</h3>
                    <br>
                    <p>Item description: {$row['description']}</p>
                    <br>
                    <div class='biddingform'>
                        <form action='view_listing.php' method='post'>
                            <label for='bid'>Bid:</label>
                            <input type='int' name='bid' id='bid'>
                            <input type='hidden' name='listingID' value='{$row['listingID']}'>
                            <input type='submit' value='Bid' class='submitbutton'>
                        </form>
                        <br>
                    </div>
                    <div class='sellermessage'>
                        <form action='messageseller.php' method='post'>
                            <input type='text' name='message'>
                            <div class='messagesubmit'>
                                <input type='submit' value='Message the seller'>
                            </div>
                            <input type='hidden' name='postowner' value='{$row['postowner']}'>
                            <input type='hidden' name='listingID' value='{$_REQUEST['listingID']}'>
                        </form>
                    </div>
                    </div>
                </div>
            </div>";
    // $sql2 = "SELECT * FROM cameras WHERE Brand = '{$row['make']}' AND Model = '{$row['model']}'";
    // $result2 = mysqli_query($link, $sql2);
    // $camerarow = mysqli_fetch_assoc($result2);
    // echo "<div class=camerainfo>
    //     <h3>{$camerarow['brand']} {$camerarow['model']} Information </h3>
    //     <div class="cameraleft">
    //         <p>Crop factor: {$camerarow['crop_factor']}</p>
    //         <p>Crop factor: {$camerarow['total_megapixels']}</p>
    //         <p>Crop factor: {$camerarow['effective_megapixels']}</p>
    //         <p>Crop factor: {$camerarow['optical_zoom']}</p>
    //         <p>Crop factor: {$camerarow['digital_zoom']}</p>
    //         <p>Crop factor: {$camerarow['digital_zoom']}</p>
    //         <p>Crop factor: {$camerarow['digital_zoom']}</p>
    //     </div>
    //     <div class="cameraright">
    //     <div>
    // </div>"
    if ($interval > 0) {
        $userID = $_SESSION['userID'];
        $ownerID = $row['userID'];
        If($_POST['bid']){
            if ($_POST['bid'] == ""){
                echo "<div class='content'>
                        <h2> </h2>
                        <h2>No bid entered</h2>
                    </div>"; 
            } else {
                if (is_numeric($_POST['bid'])){
                    if ($_POST['bid'] > $row['price']) {
                        $sql = "UPDATE listings SET price = {$_POST['bid']} WHERE listingID = {$row['listingID']}";
                        if (mysqli_query($link, $sql)) {
                            echo "<br></br>";
                            echo "Bid successful, it may not show until the page is refreshed";
                            header("Location: view_listing.php?listingID={$row['listingID']}");
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($link);
                        }
                    }
                    else {
                        echo "The bid was not enough";
                    }
                } else {
                    echo "<div class='content'>
                    <h3>Your bid is not a number</h3>
                </div>";
                }
            
            }
        }
    }
    }

}
?>



