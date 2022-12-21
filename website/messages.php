<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Messages</title>
        <link rel="stylesheet" href="messagestylesheet.css">
        <link href="camera.ico" rel="icon" type="image/x-icon" />
    </head>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="homecontent">
            <div class="messagecontent">
                <h2>Messages</h2>            
            </div>
        </div>
    </body>
</html>

<?php
session_start();
include 'db_connect.php';
$uname = $_SESSION['username'];
$sql = "SELECT * FROM messages WHERE receivinguser='$uname'";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='messagebox'>
        <div class='fromuser'>
            <h3>From: $uname</h3>
        </div>
        <div class='usermessage'>
            <h3>Message:</h3>
            <p>{$row['messagecontent']}</p>
        </div>
    </div>";
    }
} else {
    echo "<div class='content'>
            <h2>No results found</h2>
        </div>";
}
?>

