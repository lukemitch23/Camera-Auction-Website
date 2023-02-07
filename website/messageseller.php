<?php
include 'db_connect.php';
session_start();

if (isset($_POST['message'])) {
    $messagecontnt = $_POST['message'];
    if (is_null($messagecontnt)) {
        echo "No message has been entered";
        header("Location: home.php");
        exit;
    }
    $postowner = $_POST['postowner'];
    $username = $_SESSION['username'];
    $listingID = $_POST['listingID'];
    $sql = "INSERT INTO messages (sendinguser, receivinguser, messagecontent) VALUES ('$username', '$postowner', '$messagecontnt')";
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo "Message sent";
        header("Location: view_listing.php?listingID=$listingID");
        exit;
    }
    echo "Message not sent to database";
}


